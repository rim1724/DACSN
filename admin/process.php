<?php
// Kết nối vào database
$conn = mysqli_connect("localhost", "root", "", "dacsn-n12");

// Kiểm tra kết nối
if (!$conn) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}

// Xử lý thêm người dùng
if(isset($_POST['addUser'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

    if (mysqli_query($conn, $sql)) {
        header("Location: trangqlnd.php"); // Chuyển hướng lại trang chính
        exit();
    } else {
        echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Xử lý xóa người dùng

if(isset($_GET['username']) && isset($_GET['password'])){
    $user = $_GET['username'];
    $pass = $_GET['password'];

    $sql = "DELETE FROM users WHERE username='$user' and password='$pass'";

    if (mysqli_query($conn, $sql)) {
        header("Location: trangqlnd.php"); // Chuyển hướng lại trang chính
        exit();
    } else {
        echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

