<?php
require_once('../../config/config.php'); // Assuming config.php contains database connection details

$session_user_id = $_SESSION['user_id'];

// Chuẩn bị câu lệnh truy vấn
$sql = "SELECT skills.technical_skills
FROM skills
INNER JOIN cv ON skills.cv_id = cv.cv_id
INNER JOIN users ON cv.user_id = users.user_id
WHERE users.user_id = :session_user_id";

// Tạo prepared statement
$stmt = $conn->prepare($sql);

// Gán giá trị cho tham số
$stmt->bindParam(':session_user_id', $session_user_id);

// Thực thi truy vấn
$stmt->execute();

// Lấy kết quả
$skills = $stmt->fetchAll(PDO::FETCH_ASSOC); // Assuming the query returns results

?>

<ul>
  <?php if (!empty($skills)) { // Check if $skills is not empty before iterating ?>
    <?php foreach ($skills as $skill) { ?>
      <li><?php echo $skill['technical_skills']; ?></li>
    <?php } ?>
  <?php } else { ?>
    <li>No skills found.</li> <?php } ?>
</ul>
