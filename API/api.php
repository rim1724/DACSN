<?php
require_once "../config/config.php";

// Lấy dữ liệu
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

// Chuyển dữ liệu sang dạng JSON
$data = array();
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Gửi dữ liệu JSON
header('Content-Type: application/json');
echo json_encode($data);
?>
