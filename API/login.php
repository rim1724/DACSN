<?php

require_once '../config/config.php'; // Include configuration file once


if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Hash the password before comparison
  $hashedPassword = md5($password);

  // Connect to the database
  $conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

  // Check for connection errors
  if ($conn->connect_error) {
    echo json_encode([
      'success' => false,
      'message' => 'Lỗi kết nối cơ sở dữ liệu: ' . $conn->connect_error,
    ]);
    exit;
  }

  // Prepare and execute the SQL statement (recommended for security)
  try {
    $stmt = $conn->prepare("SELECT * FROM `dacsn-n12`.`users` WHERE username = ? AND password = ?"); // Added backticks
    $stmt->bind_param("ss", $username, $hashedPassword);

    // **Log for debugging:**
    error_log("Username: " . $username . ", Hashed Password: " . $hashedPassword . "\n", 3, "errors.log");

    $stmt->execute();
  } catch (mysqli_sql_exception $e) {
    error_log("SQL Error: " . $e->getMessage() . "\n", 3, "errors.log");
    echo json_encode([
      'success' => false,
      'message' => 'Lỗi thực thi truy vấn: ' . $e->getMessage(),
    ]);
    exit;
  }

  $result = $stmt->get_result();

  // Check for query execution errors
  if ($stmt->error) {
    error_log("Query Execution Error: " . $stmt->error . "\n", 3, "errors.log");
    echo json_encode([
      'success' => false,
      'message' => 'Lỗi thực thi truy vấn: ' . $stmt->error,
    ]);
    exit;
  }

  if ($result->num_rows > 0) {
    // Login successful
    echo json_encode([
      'success' => true,
      'message' => 'thanh cong',
    ]);
    // Redirect to index.html
  header('Location:../views/index-main.html');
  exit;
  } else {
    // Login failed
    echo json_encode([
      'success' => false,
      'message' => 'Không chính xác tên đăng nhập hoặc mật khẩu',
    ]);
    header('location:../views/sign-in.html');
  }

  $conn->close();
  $stmt->close(); // Close the prepared statement
} else {
  // Handle missing data case
  echo json_encode([
    'success' => false,
    'message' => 'ten dang nhap hoac mat khau bi thieu',
  ]);
  exit;
}
