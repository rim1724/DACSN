<?php

require_once '../config/config.php';

$errors = [];

if (isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['re_password'], $_POST['role'])) {

  $username = trim(strip_tags($_POST['username']));
  $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
  $password = trim($_POST['password']);
  $re_password = trim($_POST['re_password']);
  $role = isset($_POST['role']) ? (int) $_POST['role'] : 0;

  // Kiểm tra dữ liệu
  if (empty($username)) {
    $errors[] = 'Tên đăng nhập không được phép trống';
  } else if (strlen($username) < 2) {
    $errors[] = 'Tên đăng nhập phải ít nhất 2 ký tự';
  }

  if (empty($email)) {
    $errors[] = 'Email không được phép trống';
  } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Email không hợp lệ';
  }

  if (empty($password)) {
    $errors[] = 'Mật khẩu không được phép trống';
  } else if (strlen($password) < 4) {
    $errors[] = 'Mật khẩu phải ít nhất 6 ký tự';
  }

  if ($password !== $re_password) {
    $errors[] = 'Mật khẩu và nhập lại mật khẩu không trùng khớp';
  }

  // Lưu trữ dữ liệu
  if (count($errors) === 0) {

    // Hash mật khẩu
    $hashed_password = password_hash($password, PASSWORD_ARGON2ID);

    // Chuẩn bị câu lệnh INSERT
    $stmt = $conn->prepare('INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)');

    // Thực thi câu lệnh
    $stmt->execute([$username, $email, $hashed_password, $role]);

    // Xử lý kết quả
    if ($stmt->affected_rows > 0) {
      echo json_encode([
        'success' => true,
        'message' => 'Đăng ký thành công'
      ]);
      header('Location: ../views/sign-in.html');
      exit;
    } else {
      $errors[] = 'Đăng ký thất bại. Vui lòng thử lại.';
    }
  }

}

?>