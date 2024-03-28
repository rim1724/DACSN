<?php
require_once '../config/config.php'; 

function getAllcandidate() {
  global $conn;

  $query = 'SELECT * FROM candidate';
  $result = $conn->query($query);

  if (!$result) {
    die('Lấy dữ liệu thất bại!');
  }

  $candidate = array();
  while ($row = $result->fetch_assoc()) {
    $candidate[] = $row;
  }

  return $candidate;
}

function getcandidatesByPage($page, $pageSize) {
  global $conn;

  // Check if the 'id_project' column exists (skipped for brevity)

  $query = 'SELECT * FROM candidate ORDER BY `id_candidate` DESC LIMIT ? OFFSET ?';
  $stmt = $conn->prepare($query);

  // Assign values to variables for binding
  $offset = ($page - 1) * $pageSize;

  $stmt->bind_param('ii', $pageSize, $offset);
  $stmt->execute();

  $result = $stmt->get_result();

  if (!$result) {
    die('Lấy dữ liệu thất bại!');
  }

  $candidate = array();
  while ($row = $result->fetch_assoc()) {
    $candidate[] = $row;
  }

  return $candidate;
}

function getcandidatesByService($service) {
  global $conn;

  $query = 'SELECT * FROM candidate WHERE service = ?';
  $stmt = $conn->prepare($query);
  $stmt->bind_param('s', $service);
  $stmt->execute();

  $result = $stmt->get_result();

  if (!$result) {
    die('Lấy dữ liệu thất bại!');
  }

  $candidate = array();
  while ($row = $result->fetch_assoc()) {
    $candidate[] = $row;
  }

  return $candidate;
}

// Lấy dữ liệu theo yêu cầu
$candidate = getAllcandidate(); // Lấy tất cả dữ liệu

// $projects = getProjectsByPage(2, 10); // Lấy theo trang
// $projects = getProjectsByService('Lập trình web'); // Lấy theo dịch vụ

header('Content-Type: application/json');
echo json_encode($candidate);

$conn->close(); // Đóng kết nối database
?>
