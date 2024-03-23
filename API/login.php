<?php

// Yêu cầu thư viện
require_once '../config/config.php';

// Lấy dữ liệu đăng nhập
$username = $_POST['username'];
$password = $_POST['password'];

// Kết nối cơ sở dữ liệu
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Kiểm tra tên đăng nhập
$sql = "SELECT * FROM users WHERE username = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Xử lý kết quả
if (mysqli_num_rows($result) === 1) {
  $user = mysqli_fetch_assoc($result);

  // So sánh mật khẩu
  if (password_verify($password, $user['password'])) {
    // Đăng nhập thành công
    session_start();

    // Lưu ID người dùng trong phiên
    $_SESSION['user_id'] = $user['user_id'];
    $_SESSION['role'] = $user['role'];

    // Chuyển hướng đến trang chủ
    header("location: ../views/index-main.php");
  } else {
    // Mật khẩu không chính xác
    echo json_encode([
      'success' => false,
      'message' => 'Mật khẩu không chính xác',
    ]);
  }
} else {
  // Tên đăng nhập không tồn tại
  echo json_encode([
    'success' => false,
    'message' => 'Tên đăng nhập không tồn tại',
  ]);
}

// Đóng kết nối
mysqli_close($conn);

?>
