<?php

require_once '../config/config.php';

if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  $stmt = $conn->prepare("SELECT * FROM `dacsn-n12`.`users` WHERE username = ?");
  $stmt->bind_param("s", $username);
  $stmt->execute();

  $result = $stmt->get_result();

  // Kiểm tra kết quả
  if ($result->num_rows > 0) {
    // Tìm thấy người dùng
    $user = $result->fetch_assoc();

    // Xác thực mật khẩu
    if (password_verify($password, $user['password'])) {
      // Mật khẩu chính xác
      // Bắt đầu phiên
      session_start();

      // Lưu trữ user_id trong phiên
      $_SESSION['user_id'] = $user['user_id'];

      // Chuyển hướng đến trang chủ
      header('Location:../views/index-main.php');
      exit;
    } else {
      // Mật khẩu không chính xác
      echo json_encode([
        'success' => false,
        'message' => 'Mat khau khong chinh xac',
      ]);
    }
  } else {
    // Không tìm thấy người dùng
    echo json_encode([
      'success' => false,
      'message' => 'Ten dang nhap sai',
    ]);
  }

  $conn->close();
} else {
  // Thiếu dữ liệu
  echo json_encode([
    'success' => false,
    'message' => 'Thieu du lieu dang nhap',
  ]);
}