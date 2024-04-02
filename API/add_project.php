<?php
require_once '../config/config.php';
// Hàm để thực thi truy vấn SQL
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Kiểm tra các trường bắt buộc
  $required_fields = ['service', 'specific_service', 'job_title', 'job_description', 'required_skills', 'deadline', 'work_type', 'workplace', 'payment_method', 'budget', 'employment_type'];
  foreach ($required_fields as $field) {
    if (!isset($_POST[$field])) {
      $response = array('message' => "Thiếu trường bắt buộc '$field' trong yêu cầu POST.");
      echo json_encode($response);
      exit;
    }
  }

  // Xử lý tải tệp
  if (!isset($_FILES['attached_file']) || $_FILES['attached_file']['error'] !== UPLOAD_ERR_OK) {
    $response = array('message' => 'Lỗi khi tải tệp lên.');
    echo json_encode($response);
    exit;
  }

  // Xử lý thư mục tải lên
  $upload_dir = '../uploads/';
  if (!file_exists($upload_dir) && !mkdir($upload_dir, 0777, true)) {
    $response = array('message' => 'Lỗi khi tạo thư mục tải lên.');
    echo json_encode($response);
    exit;
  }

  $file_extension = pathinfo($_FILES['attached_file']['name'], PATHINFO_EXTENSION);
  $allowed_extensions = array('doc', 'docx', 'pdf', 'jpg', 'jpeg', 'png', 'gif');

  if (!in_array($file_extension, $allowed_extensions)) {
    $response = array('message' => 'Loại tệp không được hỗ trợ.');
    echo json_encode($response);
    exit;
  }

  $uploaded_file = $upload_dir . uniqid() . '.' . $file_extension;
  if (!move_uploaded_file($_FILES['attached_file']['tmp_name'], $uploaded_file)) {
    $response = array('message' => 'Lỗi khi di chuyển tệp đã tải lên đến thư mục đích.');
    echo json_encode($response);
    exit;
  }

  // Kết nối cơ sở dữ liệu
  try {
    $pdo = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    $response = array('message' => 'Lỗi kết nối: ' . $e->getMessage());
    echo json_encode($response);
    exit;
  }

  // Lấy user_id từ session
  if (session_status() === PHP_SESSION_NONE) {
    session_start();
  }
  $user_id = $_SESSION['user_id'];

  // Chuẩn bị truy vấn SQL với tham số được đặt tên để đảm bảo an toàn
  $sql = "INSERT INTO project (
    user_id, 
    service,
    specific_service,
    job_title,
    job_description,
    attached_file,
    required_skills,
    deadline,
    work_type,
    workplace,
    payment_method,
    budget,
    employment_type
  )
  VALUES (
    :user_id,
    :service,
    :specific_service,
    :job_title,
    :job_description,
    :attached_file,
    :required_skills,
    :deadline,
    :work_type,
    :workplace,
    :payment_method,
    :budget,
    :employment_type
  )";

  // Xác định loại công việc (Full-Time hoặc Part-Time)
  $employment_type = isset($_POST['employment_type']) && $_POST['employment_type'] == '1' ? 'Full-Time' : 'Part-Time';

  // Gán tham số với giá trị từ form
  $stmt = $pdo->prepare($sql);
  $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);  // Bind user_id with retrieved value
  $stmt->bindParam(':service', $_POST['service'], PDO::PARAM_STR);
  $stmt->bindParam(':specific_service', $_POST['specific_service'], PDO::PARAM_STR);
  $stmt->bindParam(':job_title', $_POST['job_title'], PDO::PARAM_STR);
  $stmt->bindParam(':job_description', $_POST['job_description'], PDO::PARAM_STR);
  $stmt->bindParam(':attached_file', $uploaded_file, PDO::PARAM_STR);
  $stmt->bindParam(':required_skills', $_POST['required_skills'], PDO::PARAM_STR);
  $stmt->bindParam(':deadline', $_POST['deadline'], PDO::PARAM_STR);
  $stmt->bindParam(':work_type', $_POST['work_type'], PDO::PARAM_STR);
  $stmt->bindParam(':workplace', $_POST['workplace'], PDO::PARAM_STR);
  $stmt->bindParam(':payment_method', $_POST['payment_method'], PDO::PARAM_STR);
  $stmt->bindParam(':budget', $_POST['budget'], PDO::PARAM_INT);
  $stmt->bindParam(':employment_type', $employment_type, PDO::PARAM_STR);
  
  // Thực thi truy vấn
  try {
    $stmt->execute();
    $response = array('message' => 'Lưu thành công');
    header('location:../views/index-main.php');
  } catch (PDOException $e) {
    $response = array('message' => 'Loi khi thuc thi truy van: ' . $e->getMessage());
  }
  
  // Đóng kết nối cơ sở dữ liệu
  $pdo = null;
  
  echo json_encode($response);
  exit;
}
