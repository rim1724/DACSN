<?php

// Database connection
require_once '../config/config.php';

function connect_to_database() {
  $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  return $conn;
}

// Process form data
if (isset($_POST['submit-form'])) {
  $conn = connect_to_database();

  // Validate required fields (adjust as needed)
  $required_fields = ['fullname', 'email', 'phone', 'city', 'address', 'realfullname', 'id_identify', 'received_date', 'birthday'];
  $missing_fields = [];
  foreach ($required_fields as $field) {
    if (empty($_POST[$field])) {
      $missing_fields[] = $field;
    }
  }

  if (!empty($missing_fields)) {
    echo json_encode([
      'success' => false,
      'message' => 'Missing required fields: ' . implode(', ', $missing_fields)
    ]);
    exit;
  }

  // Extract form data
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $city = $_POST['city'];
  $address = $_POST['address'];
  $realfullname = $_POST['realfullname'];
  $id_identify = $_POST['id_identify'];
  $received_date = $_POST['received_date'];
  $birthday = $_POST['birthday'];

  // Image Upload Handling (Optional)
  $image_uploaded = false;
  $image_path = null;

  if (isset($_FILES['img']) && $_FILES['img']['error'] === 0) {
    $image_name = $_FILES['img']['name'];
    $image_type = $_FILES['img']['type'];
    $image_tmp_name = $_FILES['img']['tmp_name'];
    $image_size = $_FILES['img']['size'];

    // Validate image type (adjust as needed)
    $allowed_mime_types = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($image_type, $allowed_mime_types)) {
      echo json_encode([
        'success' => false,
        'message' => 'Invalid image type. Only JPG, PNG, and GIF allowed.'
      ]);
      exit;
    }

    // Validate image size (optional)
    if ($image_size > 5000000) { // 1 MB limit (adjust as needed)
      echo json_encode([
        'success' => false,
        'message' => 'Image size exceeds 1 MB limit.'
      ]);
      exit;
    }

    // Generate a unique filename
    $image_filename = uniqid() . '.' . pathinfo($image_name, PATHINFO_EXTENSION);

    // Define upload path (optional)
    if (defined('IMAGE_UPLOAD_PATH')) {
      $image_path = IMAGE_UPLOAD_PATH . $image_filename;
    } else {
      // If no upload path defined, store in the same directory as this script
      $image_path = $image_filename;
    }

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

  // **Fix: Check if table exists before inserting**
  $sql = "SHOW TABLES LIKE 'candidate'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Table exists, proceed with insert
    $stmt = $conn->prepare("INSERT INTO candidate (fullname, email, phone, city, address, realfullname, id_identify, received_date, birthday, img) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssssssss', $fullname, $email, $phone, $city, $address, $realfullname, $id_identify, $received_date, $birthday, $image_path); // Removed one 's'
    // Execute SQL statement
    if ($stmt->execute()) {
      echo json_encode([
        'success' => true,
        'message' => 'Candidate added successfully.'
      ]);
      header('location: ../views/index-main.php');
      ;
    } else {
      echo json_encode([
        'success' => false,
        'message' => 'Failed to add candidate. Error: ' . $stmt->error
      ]);
    }
  } else {
    // Table doesn't exist, handle the error
    echo json_encode([
      'success' => false,
      'message' => 'The table \'candidate\' does not exist in the database.'
    ]);
  }

  // Close database connection
  $conn->close();
} else {
  echo json_encode([
    'success' => false,
    'message' => 'Invalid request.'
  ]);
}

