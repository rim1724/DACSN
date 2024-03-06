<?php
require_once '../config/config.php';
session_start();

// Lấy dữ liệu từ form
$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];

// Kiểm tra tính hợp lệ của dữ liệu
if (empty($old_password) || empty($new_password) || empty($confirm_password)) {
    echo "<script>alert('Vui lòng nhập đầy đủ thông tin!');</script>";
    exit;
}

// Kiểm tra độ dài mật khẩu mới
if (strlen($new_password) < 1) {
    echo "<script>alert('Mật khẩu mới phải có ít nhất 8 ký tự!');</script>";
    exit;
}

// Kiểm tra mật khẩu mới và mật khẩu xác nhận
if ($new_password != $confirm_password) {
    echo "<script>alert('Mật khẩu mới và mật khẩu xác nhận không khớp!');</script>";
    exit;
}

// Gọi API để kiểm tra mật khẩu cũ
$data = array(
    'username' => $_SESSION['username'],
    'password' => $old_password
);

$headers = array(
    'Content-Type: application/json'
);

$url = "https://api.example.com/kiem-tra-mat-khau";

$options = array(
    'http' => array(
        'header' => $headers,
        'method' => 'POST',
        'content' => json_encode($data)
    )
);

$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);

$response = json_decode($result, true);

// Kiểm tra kết quả trả về từ API
if ($response['status'] != 200) {
    echo "<script>alert('Mật khẩu cũ không chính xác!');</script>";
    exit;
}

// Gọi API để đổi mật khẩu
$data = array(
    'username' => $_SESSION['username'],
    'password' => $new_password
);

$headers = array(
    'Content-Type: application/json'
);

$url = "https://api.example.com/doi-mat-khau";

$options = array(
    'http' => array(
        'header' => $headers,
        'method' => 'POST',
        'content' => json_encode($data)
    )
);

$context = stream_context_create($options);
$result = file_get_contents($url, false, $context);

$response = json_decode($result, true);

// Kiểm tra kết quả trả về từ API
if ($response['status'] != 200) {
    echo "<script>alert('Đổi mật khẩu thất bại!');</script>";
    exit;
}

// Thông báo thành công
echo "<script>alert('Đổi mật khẩu thành công!');</script>";

// Redirects to home page
header("Location: index.php");
?>
