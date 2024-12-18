<?php

// Database connection (assuming 'config.php' is in the same directory)
require_once '../config/config.php';  // Adjust path if necessary

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
  $required_fields = [
    'name_company',
    'company_industry',
    'address_company',
    'phone_company',
    'nation_company',
  ];
  $missing_fields = [];
  foreach ($required_fields as $field) {
    if (empty($_POST[$field])) {
      $missing_fields[] = $field;
    }
  }

  if (!empty($missing_fields)) {
    echo json_encode([
      'success' => false,
      'message' => 'Missing required fields: ' . implode(', ', $missing_fields),
    ]);
    exit;
  }

  // Extract form data
  $name_company = $_POST['name_company'];
  $company_industry = $_POST['company_industry'];
  $address_company = $_POST['address_company'];
  $phone_company = $_POST['phone_company'];
  $nation_company = $_POST['nation_company'];

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
        'message' => 'Invalid image type. Only JPG, PNG, and GIF allowed.',
      ]);
      exit;
    }

    // Validate image size (optional)
    if ($image_size > 5000000) { // 1 MB limit (adjust as needed)
      echo json_encode([
        'success' => false,
        'message' => 'Image size exceeds 5 MB limit.',
      ]);
      exit;
    }

    // Generate a unique filename
    $image_filename = uniqid() . '.' . pathinfo($image_name, PATHINFO_EXTENSION);

    // Define upload path (optional)
    if (defined('IMAGE_UPLOAD_PATH')) {
      $image_path = IMAGE_UPLOAD_PATH . $image_filename;
    } else {
      // If no upload path defined, store in the same directory as this script (not recommended for production)
      $image_path = $image_filename;
    }

    if (move_uploaded_file($image_tmp_name, $image_path)) {
      $image_uploaded = true;
    } else {
      echo json_encode([
        'success' => false,
        'message' => 'Failed to upload image.',
      ]);
      exit;
    }
  }

  $image_to_bind = $image_uploaded ? $image_path : null;

  // **Fix: Check if table exists before inserting**
  $sql = "SHOW TABLES LIKE 'companies'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // Table exists, proceed with insert
    $stmt = $conn->prepare("INSERT INTO companies (name_company, company_industry, address_company, phone_company, nation_company, img_company) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('ssssss', $name_company, $company_industry, $address_company, $phone_company, $nation_company, $image_to_bind);

    // Execute SQL statement
    if ($stmt->execute()) {
      echo json_encode([
        'success' => true,
        'message' => 'Company added successfully.',
      ]);
      header('location: ../views/index-main.php');
      exit;
    } else {
      echo json_encode([
        'success' => false,
        'message' => 'Failed to add company. Error: ' . $stmt->error,
      ]);
    }
    
    // Close database connection
    $conn->close();
  }}