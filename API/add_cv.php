<?php
session_start();
session_status();
require_once('../config/config.php');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

function db_close($conn) {
    if ($conn) {
        $conn->close();
    }
    return $conn;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Kiểm tra xem user_id đã được đặt trong phiên và có giá trị hợp lệ không
    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        // Xử lý dữ liệu POST
        $data = array();
        foreach ($_POST as $key => $value) {
            $data[$key] = mysqli_real_escape_string($conn, $value);
        }

        $img = isset($data['img']) ? $data['img'] : null;

        // Xử lý ảnh
        $image_uploaded = false;
        $image_path = null;

        if (isset($_FILES['img']) && $_FILES['img']['error'] === 0) {
            // Kiểm tra định dạng ảnh
            $allowedExtensions = array('jpg', 'jpeg', 'png');
            $fileExtension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
            if (!in_array($fileExtension, $allowedExtensions)) {
                echo json_encode([
                    'success' => false,
                    'message' => 'Định dạng ảnh không hợp lệ.'
                ]);
                exit;
            }

            // Kiểm tra kích thước ảnh
            $maxFileSize = 2097152; // 2MB
            if ($_FILES['img']['size'] > $maxFileSize) {
                echo json_encode([
                    'success' => false,
                    'message' => 'Kích thước ảnh vượt quá giới hạn cho phép.'
                ]);
                exit;
            }

            // Tạo tên file duy nhất
            $image_name = uniqid() . '.' . $fileExtension;

            // Xác định đường dẫn lưu trữ
            $uploadDir = '../uploads/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }

            // Lưu chuyển file ảnh
            if (move_uploaded_file($_FILES['img']['tmp_name'], $uploadDir . $image_name)) {
                $image_uploaded = true;
                $image_path = $uploadDir . $image_name;
            } else {
                echo json_encode([
                    'success' => false,
                    'message' => 'Tải ảnh lên thất bại.'
                ]);
                exit;
            }
        }

        // Lưu trữ thông tin cá nhân
        $sql = "INSERT INTO cv (user_id, full_name, img, email, phone, dob, gender, city, address, myseo, career_objective)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);
        $stmt->bind_param('issssssssss', $user_id, $data['fullname'], $image_path, $data['email'], $data['phone'], $data['dob'], $data['gender'], $data['city'], $data['address'], $data['myseo'], $data['career-objective']);

        if ($stmt->execute()) {
            $cvId = mysqli_insert_id($conn);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Lưu trữ thông tin cá nhân thất bại. Vui lòng thử lại.'
            ]);
            $stmt->close();
            db_close($conn);
            exit;
        }

        // Lưu trữ kinh nghiệm làm việc
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
              $stmt->bind_param('isssss', $cvId, $company, $position, $startDate, $endDate, $description);
              $stmt->execute();
              $stmt->close();
          }
      }
  
      // Lưu trữ học vấn
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
  
      // Lưu trữ kỹ năng
      $technicalSkills = mysqli_real_escape_string($conn, $_POST['skills']);
      $softSkills = mysqli_real_escape_string($conn, $_POST['soft-skills']);
  
      $stmt = mysqli_prepare($conn, "INSERT INTO skills (cv_id, technical_skills, soft_skills)
                                      VALUES (?, ?, ?)");
      $stmt->bind_param('iss', $cvId, $technicalSkills, $softSkills);
      $stmt->execute();
      $stmt->close();
  
      // Lưu trữ ngôn ngữ
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
  
  // Lưu trữ thành tích
  if (isset($_POST['achievement-1'])) {
    $achievements = $_POST['achievement-1'];
    $years = $_POST['year-' . (count($achievements) + 1)]; // Assuming year comes after achievement in the form
    for ($i = 0; isset($achievements[$i]); $i++) {
        $achievement = mysqli_real_escape_string($conn, $achievements[$i]);
  
        // Check if year is provided for the current achievement
        if (isset($years[$i])) {
            $year = mysqli_real_escape_string($conn, $years[$i]);
        } else {
            // Handle missing year (optional, you can set a default year here)
            $year = null; // Or $year = date("Y"); (current year)
        }
  
        $stmt = mysqli_prepare($conn, "INSERT INTO achievements (cv_id, achievement, year)
                                        VALUES (?, ?, ?)");
        $stmt->bind_param('iss', $cvId, $achievement, $year);
        $stmt->execute();
        $stmt->close();
    }
  }
  
  // Lưu trữ sở thích
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
        db_close($conn);

        echo json_encode([
            'success' => true,
            'message' => 'Lưu trữ thông tin cá nhân thành công.'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Không tìm thấy thông tin phiên đăng nhập. Vui lòng đăng nhập lại.'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Phương thức yêu cầu không hợp lệ.'
    ]);
}

?>


