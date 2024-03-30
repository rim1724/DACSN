<?php
session_start();
require_once('../config/config.php');

// Function to close database connection
function db_close($conn) {
    if ($conn) {
        $conn->close();
    }
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if user_id is set in session and has a value
    if (isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];

        // Connect to the database
        $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

        // Check connection
        if ($conn->connect_error) {
            die("Kết nối thất bại: " . $conn->connect_error);
        }

        // Process POST data
        $data = array();
        foreach ($_POST as $key => $value) {
            $data[$key] = $conn->real_escape_string($value);
        }

        // Handle image upload
        $image_uploaded = false;
        $image_path = null;

        if (isset($_FILES['img']) && $_FILES['img']['error'] === 0) {
            $image_name = $_FILES['img']['name'];
            $image_tmp_name = $_FILES['img']['tmp_name'];
            $image_type = $_FILES['img']['type'];
            $image_size = $_FILES['img']['size'];

            // Validate image type
            $allowed_mime_types = ['image/jpeg', 'image/png', 'image/gif'];
            if (!in_array($image_type, $allowed_mime_types)) {
                echo json_encode([
                    'success' => false,
                    'message' => 'Invalid image type. Only JPG, PNG, and GIF allowed.'
                ]);
                exit;
            }

            // Validate image size
            if ($image_size > 5000000) { // 5 MB limit
                echo json_encode([
                    'success' => false,
                    'message' => 'Image size exceeds 5 MB limit.'
                ]);
                exit;
            }

            // Define upload directory path
            $upload_directory = __DIR__ . '/../uploads/';

            // Generate a unique filename
            $image_filename = uniqid() . '.' . pathinfo($image_name, PATHINFO_EXTENSION);

            // Set the full path to the uploaded file
            $image_path = $upload_directory . $image_filename;

            // Move the uploaded file to the upload directory
            if (move_uploaded_file($image_tmp_name, $image_path)) {
                $image_uploaded = true;
            } else {
                echo json_encode([
                    'success' => false,
                    'message' => 'Failed to upload image.'
                ]);
                exit;
            }
        }

        // Store personal information
        $sql = "INSERT INTO cv (user_id, full_name, img, email, phone, dob, gender, city, address, myseo, career_objective)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('issssssssss', $user_id, $data['fullname'], $image_path, $data['email'], $data['phone'], $data['dob'], $data['gender'], $data['city'], $data['address'], $data['myseo'], $data['career-objective']);

        if ($stmt->execute()) {
            $cvId = $conn->insert_id;

            // Store languages
            $languages = $data['language-1'];
            $proficiencies = $data['proficiency-1'];
            $stmt = $conn->prepare("INSERT INTO languages (cv_id, language, proficiency) VALUES (?, ?, ?)");
            $stmt->bind_param('iss', $cvId, $languages, $proficiencies);
            $stmt->execute();
            $stmt->close();
          
            // Store work experience
            $company = $data['company-1'];
            $position = $data['position-1'];
            $startDate = $data['start-date-1'];
            $endDate = $data['end-date-1'];
            $description = $data['description-1'];
            $stmt = $conn->prepare("INSERT INTO work_experience (cv_id, company, position, start_date, end_date, description) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('isssss', $cvId, $company, $position, $startDate, $endDate, $description);
            $stmt->execute();
            $stmt->close();

            // Store education
            $school = $data['school-1'];
            $degree = $data['degree-1'];
            $startDate = $data['start-date-2'];
            $endDate = $data['end-date-2'];
            $stmt = $conn->prepare("INSERT INTO education (cv_id, school, degree, start_date, end_date) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param('issss', $cvId, $school, $degree, $startDate, $endDate);
            $stmt->execute();
            $stmt->close();
          
            // Store skills
            $technicalSkills = $data['skills'];
            $softSkills = $data['soft-skills'];
            $stmt = $conn->prepare("INSERT INTO skills (cv_id, technical_skills, soft_skills) VALUES (?, ?, ?)");
            $stmt->bind_param('iss', $cvId, $technicalSkills, $softSkills);
            $stmt->execute();
            $stmt->close();
        
            // Store hobbies
            for ($i = 1; isset($data['hobby-' . $i]); $i++) {
                $hobby = $data['hobby-' . $i];
                $stmt = $conn->prepare("INSERT INTO hobbies (cv_id, hobby) VALUES (?, ?)");
                $stmt->bind_param('is', $cvId, $hobby);
                $stmt->execute();
                $stmt->close();
            }

            // Store achievements
            for ($i = 1; isset($data['achievement-' . $i]); $i++) {
                $achievement = $data['achievement-' . $i];
                $stmt = $conn->prepare("INSERT INTO achievements (cv_id, achievement) VALUES (?, ?)");
                $stmt->bind_param('is', $cvId, $achievement);
                $stmt->execute();
                $stmt->close();
            }

            db_close($conn);

            echo json_encode([
                'success' => true,
                'message' => 'Lưu trữ dữ liệu thành công.'
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Lưu trữ thông tin cá nhân thất bại. Vui lòng thử lại.'
            ]);
            $stmt->close();
            db_close($conn);
        }
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Không tìm thấy phiên đăng nhập.'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Phương thức yêu cầu không hợp lệ.'
    ]);
}
?>
