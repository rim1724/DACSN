<?php
$conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);

// Lấy user_id từ session
$session_user_id = $_SESSION['user_id'];

// Chuẩn bị câu lệnh truy vấn
$sql = "SELECT languages.language
        FROM languages
        INNER JOIN cv ON languages.cv_id = cv.cv_id
        INNER JOIN users ON cv.user_id = users.user_id
        WHERE users.user_id = :session_user_id";

// Tạo prepared statement
$stmt = $conn->prepare($sql);

// Gán giá trị cho tham số
$stmt->bindParam(':session_user_id', $session_user_id);

// Thực thi truy vấn
$stmt->execute();

// Lấy kết quả
$languages = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<ul>
  <?php foreach ($languages as $language) { ?>
    <li><?php echo $language['language']; ?></li>
  <?php } ?>
</ul>
