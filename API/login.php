<?php

require_once '../config/config.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        // Kết nối an toàn đến cơ sở dữ liệu sử dụng PDO
        $conn = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Chuẩn bị câu lệnh SQL với tham số để ngăn chặn SQL injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bindParam(1, $username, PDO::PARAM_STR); // Gán username kiểu string

        // Thực thi câu lệnh đã chuẩn bị với xử lý lỗi
        if ($stmt->execute()) {
            $userRow = $stmt->fetch(PDO::FETCH_ASSOC); // Lấy thông tin người dùng

            if ($userRow && password_verify($password, $userRow['password'])) {
                // Tìm thấy người dùng và mật khẩu khớp

                // Bắt đầu phiên an toàn
                session_start();

                // Lưu ID người dùng trong phiên
                $_SESSION['user_id'] = $userRow['user_id'];

                // Chuyển hướng đến trang chính
                header('Location: ../views/index-main.php');
                exit;
            } else {
                // Không tìm thấy người dùng hoặc mật khẩu không chính xác
                echo json_encode([
                    'success' => false,
                    'message' => 'Tên đăng nhập hoặc mật khẩu không hợp lệ'
                ]);
                header('Location: ../views/sign-in.html');
            }
        } else {
            // Lỗi trong quá trình thực thi
            throw new PDOException("Lỗi thực thi câu lệnh đã chuẩn bị: " . $stmt->errorInfo()[2]);
        }
    } catch (PDOException $e) {
        // Xử lý lỗi cơ sở dữ liệu một cách tinh tế
        echo json_encode([
            'success' => false,
            'message' => 'Lỗi cơ sở dữ liệu: ' . $e->getMessage()
        ]);
        header('Location: ../views/sign-in.html');
        // Ghi nhật ký lỗi để điều tra thêm (tùy chọn)
    } finally {
        // Đóng kết nối nếu đang mở (khuyến khích)
        if (isset($conn)) {
            $conn = null;
        }
    }
} else {
    // Thiếu thông tin đăng nhập
    echo json_encode([
        'success' => false,
        'message' => 'Thiếu thông tin đăng nhập'
    ]);
    header('Location: ../views/sign-in.html');
}
