<?php

require_once '../config/config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Truy cập dữ liệu sử dụng $_POST
  $data = $_POST;

  // Xử lý và xác thực dữ liệu
  $errors = validate_data($data);

  // Nếu có lỗi, trả về thông báo lỗi
  if (!empty($errors)) {
    $response['success'] = false;
    $response['errors'] = $errors;
    echo json_encode($response);
    exit;
  }

  // Chuẩn bị và thực thi câu lệnh SQL
  $sql = "INSERT INTO project (service, specific_service, job_title, 
    job_description, attached_file, required_skills, deadline, 
    work_type, workplace, payment_method, budget, employment_type)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

  $stmt = $conn->prepare($sql);

  // Xử lý giá trị employment_type
  $employment_type = ($data['employment_type'] === '0') ? 1 : 0;

  // Bind các biến tương ứng với '?' trong câu lệnh SQL
  $stmt->bind_param('ssssssssssssss', $data['service'], $data['specific_service'], 
    $data['job_title'], $data['job_description'], 
    $data['attached_file'], $data['required_skills'], 
    $data['deadline'], $data['work_type'], $data['workplace'], 
    $data['payment_method'], $data['budget'], $employment_type);

  // Thực thi câu lệnh SQL
  $stmt->execute();

  // Xử lý kết quả
  $response = array();
  if ($stmt->affected_rows === 1) {
    $response['success'] = true;
    $response['message'] = 'Dự án đã được thêm thành công!';
    $response['id_project'] = $stmt->insert_id;
  } else {
    $response['success'] = false;
    $response['errors'] = array('message' => 'Lỗi khi thêm dự án!');
  }

  // Đóng kết nối database
  $stmt->close();
  $conn->close();

  // Trả về kết quả dưới dạng JSON
  echo json_encode($response);
  exit;
}

// Hàm kiểm tra dữ liệu
function validate_data($data) {
  $errors = array();

  // Kiểm tra các trường bắt buộc
  if (empty($data['service'])) {
    $errors['service'] = 'Vui lòng chọn lĩnh vực dịch vụ.';
  }
  if (empty($data['job_title'])) {
    $errors['job_title'] = 'Vui lòng nhập tiêu đề công việc.';
  }
  if (empty($data['job_description'])) {
    $errors['job_description'] = 'Vui lòng nhập mô tả công việc.';
  }
  if (empty($data['required_skills'])) {
    $errors['required_skills'] = 'Vui lòng nhập kỹ năng yêu cầu.';
  }
  if (empty($data['deadline'])) {
    $errors['deadline'] = 'Vui lòng chọn hạn chót.';
  }
  if (empty($data['work_type'])) {
    $errors['work_type'] = 'Vui lòng chọn loại hình công việc.';
  }
  if (empty($data['workplace'])) {
    $errors['workplace'] = 'Vui lòng nhập địa điểm làm việc.';
  }
  if (empty($data['payment_method'])) {
    $errors['payment_method'] = 'Vui lòng chọn phương thức thanh toán.';
  }
  if (empty($data['budget'])) {
    $errors['budget'] = 'Vui lòng nhập ngân sách.';
  }

  // Kiểm tra giá trị employment_type
  if (!isset($data['employment_type']) || !is_numeric($data['employment_type'])) {
    $errors['employment_type'] = 'Lỗi dữ liệu loại hình tuyển dụng.';
  } else {
    $employment_type = ($data['employment_type'] === '0') ? 1 : 0;
  }

  // Kiểm tra định dạng


  return $errors;
}

?>