<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quản lí người dùng</title>
<style>
    body {
        font-family: Arial, sans-serif;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    a {
        text-decoration: none;
        color: #2bcfcd;
        font-size: 20px;

    }
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    tr:hover {
        background-color: #f5f5f5;
    }
    form {
        margin-bottom: 20px;
    }
    input[type=text], input[type=password] {
        width: 100%;
        padding: 8px;
        margin: 5px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    input[type=submit]:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>
    
    <h2>Quản lí người dùng</h2>
    <a href="trangadmin.html">Quay lại</a>
    <form action="process.php" method="post">
        <label for="username">Tên người dùng:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Thêm người dùng" name="addUser">
    </form>
    <table>
        <tr>
            <th>Tên người dùng</th>
            <th>Mật khẩu</th>
            <th>Thao tác</th>
        </tr>
        <?php
        // Kết nối vào database
        $conn = mysqli_connect("localhost", "root", "", "dacsn-n12");
        // Kiểm tra kết nối
        if (!$conn) {
            die("Kết nối thất bại: " . mysqli_connect_error());
        }

        // Lấy dữ liệu từ database
        $sql = "SELECT * FROM users";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Hiển thị dữ liệu trên bảng
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>".$row["username"]."</td><td>".$row["password"]."</td><td><a href='process.php?username=".$row["username"]."&password=".$row["password"]."'>Xóa</a></td></tr>";
            }
        } else {
            echo "0 kết quả";
        }
        mysqli_close($conn);
        ?>
    </table>
</body>
</html>
