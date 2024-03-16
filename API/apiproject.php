<?php
require_once '../config/config.php'; // Sửa đường dẫn nếu cần

function getAllProjects() {
  global $conn;

  $query = 'SELECT * FROM project';
  $result = $conn->query($query);

  if (!$result) {
    die('Lấy dữ liệu thất bại!');
  }

  $projects = array();
  while ($row = $result->fetch_assoc()) {
    $projects[] = $row;
  }

  return $projects;
}

function getProjectsByPage($page, $pageSize) {
  global $conn;

  // Check if the 'id_project' column exists (skipped for brevity)

  $query = 'SELECT * FROM project ORDER BY `id_project` DESC LIMIT ? OFFSET ?';
  $stmt = $conn->prepare($query);

  // Assign values to variables for binding
  $offset = ($page - 1) * $pageSize;

  $stmt->bind_param('ii', $pageSize, $offset);
  $stmt->execute();

  $result = $stmt->get_result();

  if (!$result) {
    die('Lấy dữ liệu thất bại!');
  }

  $projects = array();
  while ($row = $result->fetch_assoc()) {
    $projects[] = $row;
  }

  return $projects;
}

function getProjectsByService($service) {
  global $conn;

  $query = 'SELECT * FROM project WHERE service = ?';
  $stmt = $conn->prepare($query);
  $stmt->bind_param('s', $service);
  $stmt->execute();

  $result = $stmt->get_result();

  if (!$result) {
    die('Lấy dữ liệu thất bại!');
  }

  $projects = array();
  while ($row = $result->fetch_assoc()) {
    $projects[] = $row;
  }

  return $projects;
}

// Lấy dữ liệu theo yêu cầu
$projects = getAllProjects(); // Lấy tất cả dữ liệu

// $projects = getProjectsByPage(2, 10); // Lấy theo trang
// $projects = getProjectsByService('Lập trình web'); // Lấy theo dịch vụ

header('Content-Type: application/json');
echo json_encode($projects);

$conn->close(); // Đóng kết nối database
?>
