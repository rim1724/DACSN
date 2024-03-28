<?php
require_once('../config/config.php');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($conn->connect_error) {
  die("Kết nối thất bại: " . $conn->connect_error);
}

function db_close($conn) {
  $conn->close();
}

return $conn;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Xử lý thông tin cá nhân
  $fullName = mysqli_real_escape_string($conn, $_POST['fullname']);
  $img = mysqli_real_escape_string($conn, $_POST['img']); // Lưu ý bảo mật khi xử lý ảnh
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $dob = mysqli_real_escape_string($conn, $_POST['dob']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $city = mysqli_real_escape_string($conn, $_POST['city']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $myseo = mysqli_real_escape_string($conn, $_POST['myseo']);
  $careerObjective = mysqli_real_escape_string($conn, $_POST['career-objective']);

  // Xử lý ảnh (upload và lưu trữ)
  $image_uploaded = false;
  $image_path = null;

  if (isset($_FILES['img']) && $_FILES['img']['error'] === 0) {
    $image_name = $_FILES['img']['name'];
    $image_type = $_FILES['img']['type'];
    $image_tmp_name = $_FILES['img']['tmp_name'];
    $image_size = $_FILES['img']['size'];

    // Validate image type
    $allowed_mime_types = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($image_type, $allowed_mime_types)) {
      echo json_encode([
        'success' => false,
        'message' => 'Định dạng ảnh không hợp lệ. Chỉ hỗ trợ JPG, PNG và GIF.'
      ]);
      exit;
    }

    // Validate image size
    if ($image_size > 5000000) { // Giới hạn 5 MB
      echo json_encode([
        'success' => false,
        'message' => 'Kích thước ảnh vượt quá 5 MB.'
      ]);
      exit;
    }

    // Tạo tên file ảnh duy nhất
    $image_filename = uniqid() . '.' . pathinfo($image_name, PATHINFO_EXTENSION);

    // Lưu trữ ảnh
    if (defined('IMAGE_UPLOAD_PATH')) {
      $image_path = IMAGE_UPLOAD_PATH . $image_filename;
    } else {
      $image_path = $image_filename;
    }

    if (move_uploaded_file($image_tmp_name, $image_path)) {
      $image_uploaded = true;
    } else {
      echo json_encode([
        'success' => false,
        'message' => 'Tải ảnh lên thất bại.'
      ]);
      exit;
    }
  }

  // Lưu trữ thông tin cá nhân
  $stmt = mysqli_prepare($conn, "INSERT INTO cv (full_name, img, email, phone, dob, gender, city, address, myseo, career_objective)
                                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
  $stmt->bind_param('sssssssssss', $fullName, $img, $email, $phone, $dob, $gender, $city, $address, $myseo, $careerObjective);
  $stmt->execute();
  $cvId = mysqli_insert_id($conn);
  $stmt->close();

  // Xử lý kinh nghiệm làm việc
  if (isset($_POST['company-1'])) {
    $workExperiences = $_POST['company-1'];
    for ($i = 0; isset($workExperiences[$i]); $i++) {
      $company = mysqli_real_escape_string($conn, $workExperiences[$i]);
$position = mysqli_real_escape_string($conn, $_POST['position-' . ($i + 1)]);
$startDate = mysqli_real_escape_string($conn, $_POST['start-date-' . ($i + 1)]);
$endDate = mysqli_real_escape_string($conn, isset($_POST['end-date-' . ($i + 1)]) ? $_POST['end-date-' . ($i + 1)] : null);
$description = mysqli_real_escape_string($conn, $_POST['description-' . ($i + 1)]);

$stmt = mysqli_prepare($conn, "INSERT INTO work_experience (cv_id, company, position, start_date, end_date, description)
                                 VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param('issssss', $cvId, $company, $position, $startDate, $endDate, $description);
$stmt->execute();
$stmt->close();
    }
  }

  // Xử lý học vấn
  if (isset($_POST['school-1'])) {
    $schools = $_POST['school-1'];
    for ($i = 0; isset($schools[$i]); $i++) {
      $school = mysqli_real_escape_string($conn, $schools[$i]);
      $degree = mysqli_real_escape_string($conn, $_POST['degree-' . ($i + 1)]);
      $startDate = mysqli_real_escape_string($conn, $_POST['start-date-2' . ($i + 1)]);
      $endDate = mysqli_real_escape_string($conn, isset($_POST['end-date-2' . ($i + 1)]) ? $_POST['end-date-2' . ($i + 1)] : null);

      $stmt = mysqli_prepare($conn, "INSERT INTO education (cv_id, school, degree, start_date, end_date)
                                 VALUES (?, ?, ?, ?, ?)");
      $stmt->bind_param('issss', $cvId, $school, $degree, $startDate, $endDate);
      $stmt->execute();
      $stmt->close();
    }
  }

  // Xử lý kỹ năng
  $technicalSkills = mysqli_real_escape_string($conn, $_POST['skills']);
  $softSkills = mysqli_real_escape_string($conn, $_POST['soft-skills']);

  $stmt = mysqli_prepare($conn, "INSERT INTO skills (cv_id, technical_skills, soft_skills)
                                 VALUES (?, ?, ?)");
  $stmt->bind_param('iss', $cvId, $technicalSkills, $softSkills);
  $stmt->execute();
  $stmt->close();

  // Xử lý ngôn ngữ
  if (isset($_POST['language-1'])) {
    $languages = $_POST['language-1'];
    $proficiencies = $_POST['proficiency-1'];
    for ($i = 0; isset($languages[$i]); $i++) {
      $language = mysqli_real_escape_string($conn, $languages[$i]);
      $proficiency = mysqli_real_escape_string($conn, $proficiencies[$i]);

      $stmt = mysqli_prepare($conn, "INSERT INTO languages (cv_id, language, proficiency)
                                 VALUES (?, ?, ?)");
      $stmt->bind_param('iss', $cvId, $language, $proficiency);
      $stmt->execute();
      $stmt->close();
    }
  }

  // Xử lý thành tích
  if (isset($_POST['achievement-1'])) {
    $achievements = $_POST['achievement-1'];
    for ($i = 0; isset($achievements[$i]); $i++) {
      $achievement = mysqli_real_escape_string($conn, $achievements[$i]);

      $stmt = mysqli_prepare($conn, "INSERT INTO achievements (cv_id, achievement)
                                 VALUES (?, ?)");
      $stmt->bind_param('is', $cvId, $achievement);
      $stmt->execute();
      $stmt->close();
    }
  }

  // Xử lý sở thích
  if (isset($_POST['hobby-1'])) {
    $hobbies = $_POST['hobby-1'];
    for ($i = 0; isset($hobbies[$i]); $i++) {
      $hobby = mysqli_real_escape_string($conn, $hobbies[$i]);

      $stmt = mysqli_prepare($conn, "INSERT INTO hobbies (cv_id, hobby)
                                 VALUES (?, ?)");
      $stmt->bind_param('is', $cvId, $hobby);
      $stmt->execute();
      $stmt->close();
    }
  }

  // Xử lý phản hồi
  if ($image_uploaded) {
    echo json_encode([
      'success' => true,
      'message' => 'CV đã được gửi thành công!',
      'image_path' => $image_path
    ]);
  } else {
    echo json_encode([
      'success' => true,
      'message' => 'CV đã được gửi thành công!',
      'image_path' => null
    ]);
  }

  db_close($conn); // Đóng kết nối
}



?>
