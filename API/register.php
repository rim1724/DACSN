<?php

require_once '../config/config.php';

// Xử lý dữ liệu
if (isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['re_password'])) {

  // Xác thực dữ liệu
  $username = trim(strip_tags($_POST['username']));
  $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
  $password = trim($_POST['password']);
  $re_password = trim($_POST['re_password']);

  $errors = [];

  if (empty($username)) {
    $errors[] = 'Tên đăng nhập không được phép trống';
  } else if (strlen($username) < 2) {
    $errors[] = 'Tên đăng nhập phải ít nhất 4 ký tự';
  }

  if (empty($email)) {
    $errors[] = 'Email không được phép trống';
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Email không hợp lệ';
  }

  if (empty($password)) {
    $errors[] = 'Mật khẩu không được phép trống';
  } else if (strlen($password) < 2) {
    $errors[] = 'Mật khẩu phải ít nhất 6 ký tự';
  }

  if ($password !== $re_password) {
    $errors[] = 'Mật khẩu và nhập lại mật khẩu không trùng khớp';
  }

  if (count($errors) > 0) {
    echo json_encode([
      'success' => false,
      'errors' => $errors
    ]);
    exit;
  }

  // Mã hóa mật khẩu
  $hashed_password = password_hash($password, PASSWORD_ARGON2ID); // Sử dụng Argon2id

  // Thêm dữ liệu vào database
  $stmt = $conn->prepare('INSERT INTO users (username, email, password) VALUES (?, ?, ?)');
  $stmt->execute([$username, $email, $hashed_password]);

  // Kiểm tra số lượng hàng bị ảnh hưởng
  if ($stmt->affected_rows > 0) {
    echo json_encode([
      'success' => true,
      'message' => 'Đăng ký thành công'
    ]);
    header('Location:../views/sign-in.html');
    exit;
  } else {
    echo json_encode([
      'success' => false,
      'message' => 'Đăng ký thất bại. Vui lòng thử lại.'
    ]);
  }

}

// Đóng kết nối
unset($conn);

?>