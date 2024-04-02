<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quản lí tin tuyển dụng</title>
<style>
    body {
        font-family: Arial, sans-serif;
    }
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    tr:hover {
        background-color: #f5f5f5;
    }
    .edit-btn, .delete-btn {
        padding: 6px 12px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .edit-btn {
        background-color: #4CAF50;
        color: white;
        margin-right: 5px;
    }
    .delete-btn {
        background-color: #f44336;
        color: white;
    }
    .edit-form {
        display: none;
    }
</style>
</head>
<body>
    
    <h2>Quản lí tin tuyển dụng</h2>
    <a href="trangadmin.html">Quay lại</a>
    <table>
        <tr>
            <th>ID Dự án</th>
            <th>Dịch vụ</th>
            <th>Dịch vụ cụ thể</th>
            <th>Tiêu đề công việc</th>
            <th>Mô tả công việc</th>
            <th>Kỹ năng yêu cầu</th>
            <th>Deadline</th>
            <th>Loại công việc</th>
            <th>Nơi làm việc</th>
            <th>Phương thức thanh toán</th>
            <th>Ngân sách</th>
            <th>Loại hình làm việc</th>
            <th>File đính kèm</th>
            <th>Thao tác</th>
        </tr>
        <?php
        // Kết nối vào database
        $conn = mysqli_connect("localhost", "root", "", "dacsn-n12");

        // Kiểm tra kết nối
        if (!$conn) {
            die("Kết nối thất bại: " . mysqli_connect_error());
        }

        // Lấy dữ liệu từ bảng project
        $sql = "SELECT * FROM project";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            // Hiển thị dữ liệu trên bảng
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row["id_project"]."</td>";
                echo "<td>".$row["service"]."</td>";
                echo "<td>".$row["specific_service"]."</td>";
                echo "<td>".$row["job_title"]."</td>";
                echo "<td>".$row["job_description"]."</td>";
                echo "<td>".$row["required_skills"]."</td>";
                echo "<td>".$row["deadline"]."</td>";
                echo "<td>".$row["work_type"]."</td>";
                echo "<td>".$row["workplace"]."</td>";
                echo "<td>".$row["payment_method"]."</td>";
                echo "<td>".$row["budget"]."</td>";
                echo "<td>".$row["employment_type"]."</td>";
                echo "<td>".$row["attached_file"]."</td>";
                echo "<td>";
                echo "<button class='edit-btn' onclick='openEditForm(".$row["id_project"].")'>Sửa</button>";
                echo "<button class='delete-btn'><a href='trangsuatin.php?id_project=".$row["id_project"]."' onclick='return confirm(\"Bạn có chắc chắn muốn xoá dự án này không?\")'>Xoá</a></button>";
                echo "</td>";
                echo "</tr>";
                echo "<tr class='edit-form' id='edit-form-".$row["id_project"]."'>";
                echo "<td colspan='13'>";
                echo "<form action='trangsuatin.php' method='post'>";
                echo "<input type='hidden' name='id_project' value='".$row["id_project"]."'>";
                echo "<label for='service'>Dịch vụ:</label>";
                echo "<input type='text' id='service' name='service' value='".$row["service"]."' required>";
                echo "<label for='specific_service'>Dịch vụ cụ thể:</label>";
                echo "<input type='text' id='specific_service' name='specific_service' value='".$row["specific_service"]."'>";
                echo "<label for='job_title'>Tiêu đề công việc:</label>";
                echo "<input type='text' id='job_title' name='job_title' value='".$row["job_title"]."'>";
                echo "<label for='job_description'>Mô tả công việc:</label>";
                echo "<input type='text' id='job_description' name='job_description' value='".$row["job_description"]."'>";
                echo "<label for='required_skills'>Kỹ năng yêu cầu:</label>";
                echo "<input type='text' id='required_skills' name='required_skills' value='".$row["required_skills"]."'>";
                echo "<label for='deadline'>Deadline:</label>";
                echo "<input type='date' id='deadline' name='deadline' value='".$row["deadline"]."'>";
                echo "<label for='work_type'>Loại công việc:</label>";
                echo "<input type='text' id='work_type' name='work_type' value='".$row["work_type"]."'>";
                echo "<label for='workplace'>Nơi làm việc:</label>";
                echo "<input type='text' id='workplace' name='workplace' value='".$row["workplace"]."'>";
                echo "<label for='payment_method'>Phương thức thanh toán:</label>";
                echo "<input type='text' id='payment_method' name='payment_method' value='".$row["payment_method"]."'>";
                echo "<label for='budget'>Ngân sách:</label>";
                echo "<input type='text' id='budget' name='budget' value='".$row["budget"]."'>";
                echo "<label for='employment_type'>Loại hình làm việc:</label>";
                echo "<input type='text' id='employment_type' name='employment_type' value='".$row["employment_type"]."'>";
                echo "<label for='attached_file'>File đính kèm:</label>";
                echo "<input type='text' id='attached_file' name='attached_file' value='".$row["attached_file"]."'>";
                echo "<input type='submit' name='submit' value='Lưu'>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='14'>0 kết quả</td></tr>";
        }

        mysqli_close($conn);
        ?>
    </table>

    <script>
        function openEditForm(projectId) {
            var editForm = document.getElementById("edit-form-" + projectId);
            if (editForm.style.display === "none") {
                editForm.style.display = "table-row";
            } else {
                editForm.style.display = "none";
            }
        }
    </script>
</body>
</html>
