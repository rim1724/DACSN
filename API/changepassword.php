<?php

// Lấy dữ liệu từ form
$username = $_POST['username'];
$old_password = $_POST['old_password'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];

// Kiểm tra tính hợp lệ của mật khẩu cũ
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$old_password'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 0) {
  echo "Mật khẩu cũ không chính xác!";
  exit;
}

// Kiểm tra tính hợp lệ của mật khẩu mới
if ($new_password != $confirm_password) {
  echo "Mật khẩu mới và mật khẩu xác nhận không khớp!";
  exit;
}

// Mã hóa mật khẩu mới
$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

// Cập nhật mật khẩu mới vào database
$sql = "UPDATE users SET password = '$hashed_password' WHERE username = '$username'";
mysqli_query($conn, $sql);

// Gửi dữ liệu đến API đổi mật khẩu
$data = array(
  'username' => $username,
  'password' => $hashed_password
);

$headers = array(
  'Content-Type: application/json'
);

$url = "https://api.example.com/doi-mat-khau";

$response = axios.post($url, $data, $headers);

if ($response->status == 200) {
  echo "Đổi mật khẩu thành công!";
} else {
  echo "Đổi mật khẩu thất bại!";
}

?>
