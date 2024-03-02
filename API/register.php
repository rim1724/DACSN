<?php

// Connect to the database using PDO (recommended)
require_once '../config/config.php';  // Assuming your configuration file exists

// Error handling for potential connection issues
try {
    $conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Set error reporting mode

    // Process data
    if (isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['re_password'])) {
        // Extract data
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $re_password = trim($_POST['re_password']);

        // Validate data
        if (empty($username) || empty($email) || empty($password) || empty($re_password)) {
            echo json_encode([
                'success' => false,
                'message' => 'Vui lòng nhập đầy đủ thông tin'
            ]);
            exit;
        }

        if ($password !== $re_password) {
            echo json_encode([
                'success' => false,
                'message' => 'Mật khẩu và nhập lại mật khẩu không trùng khớp'
            ]);
            exit;
        }

        // Secure password hashing with password_hash (strongly recommended)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and execute SQL statement
        $stmt = $conn->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?)');
        $stmt->execute([$username, $email, $hashed_password]);

        // Process result
        if ($stmt->rowCount() > 0) {
            echo json_encode([
                'success' => true,
                'message' => 'Dang ky thanh cong'
                header('Location:../views/sign-in.html');

            ]);
        } else {
            echo json_encode([
                'success' => false,
                'message' => 'Đăng ký thất bại'
            ]);
        }
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Dữ liệu không hợp lệ'
        ]);
    }
} catch (PDOException $e) {
    echo json_encode([
        'success' => false,
        'message' => 'Lỗi database: ' . $e->getMessage()
    ]);
}

// Close connection (not strictly necessary in this case due to PDO garbage collection)
unset($conn);
?>
