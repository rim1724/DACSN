<?php
include('header_can.php');
require_once('../../config/config.php');
?>
<link rel="stylesheet" href="../../assets/css/apply-list.css">
<!--vach ngan-->


<div class="bulkhead-container">
    <p>Nhà tuyển dụng đăng dự án <i class="fa-solid fa-caret-right" style="padding-right: 15px; padding-left: 15px;"></i> Nhân sự vào tìm kiếm <i class="fa-solid fa-caret-right" style="padding-right: 15px; padding-left: 15px;"></i> Nhận công việc từ nhà tuyển dụng</p>
</div>




<!--Đổi thông tin cá nhân-->
<div class="change-all">
    <div class="listall">
        <ul>
            <li class="see"><a href="info-user.php">Tài khoản</a></li>
            <li class="hover"><a href="setting.php">Cài đặt chung</a></li>
            <li class="hover"><a href="change-password.php">Đổi mật khẩu</a></li>
        </ul>
    </div>
    <div class="change">
        <div class="listmini">
            <ul>
                <?php
                if (session_status() === PHP_SESSION_NONE) {
                    session_start(); // Start session if not already started
                }

                if (!isset($_SESSION['user_id'])) {
                    // User is not logged in, show login link
                    ?>
                    <?php
                } else {
                    // User is logged in, check role and display options
                    if (isset($_SESSION['user_id']) && $_SESSION['role'] === 0) {
                        // User is logged in as a candidate (role = 0)
                        ?>
                        <li class="hover2"><a href="info-user.php">Thông tin cá nhân</a></li>
                        <li class="hover2"><a href="cv.php">Hồ sơ năng lực(CV)</a></li>
                        <li class="see2"><a href="apply-list.php">Danh sách công việc đã ứng tuyển</a></li>
                        <li class="hover2"><a href="cv-list.php">Xác thực thông tin</a></li>

                    <?php
                    } else {
                        // User is logged in with a different role (not candidate)
                        // You can add conditional logic here to display specific options based on other roles
                        ?>
                        <li class="hover2"><a href="info-user.php">Thông tin công ty</a></li>
                        <li class="see2"><a href="apply-list.php">Danh sách người ứng tuyển công việc</a></li>
                        <li class="hover2"><a href="verified-phonenumber.php">Xác thực thông tin</a></li>

                <?php
                    }
                    ?>
                <?php
                }
                ?>

            </ul>
        </div>
        <?php
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Kiểm tra đăng nhập
        if (!isset($_SESSION['user_id'])) {
            // Nếu chưa đăng nhập, có thể điều hướng đến trang đăng nhập hoặc hiển thị thông báo lỗi
            header("Location: login.php");
            exit;
        }

        // Nếu đã đăng nhập, thực hiện kiểm tra vai trò
        if ($_SESSION['role'] === 0) {
            // Role 0: ứng viên

            // Truy vấn để lấy thông tin từ bảng user_apply và bảng project
            $sql = "SELECT * FROM user_apply INNER JOIN project ON user_apply.id_project = project.id_project WHERE user_apply.user_id = ?";
        } else {
            // Role khác 0: nhà tuyển dụng hoặc các vai trò khác

            // Truy vấn để lấy thông tin từ bảng users và bảng candidate
            $sql = "SELECT users.user_id, users.username, candidate.*, project.* FROM users INNER JOIN candidate ON users.user_id = candidate.user_id INNER JOIN user_apply ON users.user_id = user_apply.user_id INNER JOIN project ON user_apply.id_project = project.id_project WHERE users.user_id = ?";
        }

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $_SESSION['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();

        // Hiển thị thông tin từ kết quả truy vấn
        while ($row = $result->fetch_assoc()) {
            // Hiển thị thông tin của từng bản ghi từ cơ sở dữ liệu
            if ($_SESSION['role'] === 0) {
                // Hiển thị thông tin cho ứng viên
                echo "<div class='cancel'>";
                echo "<div class='img-cancel'>";
                echo "<img src='../" . $row['attached_file'] . "' alt=''>";
                echo "</div>";
                echo "<div class='info-cancel'>";
                echo "<a href='../info-job.php?id_project=" . $row['id_project'] . "' style='font-size: 20px; color:blue'>Tên ứng viên:" . $row['job_title'] . "</a>";
                echo "<div class='non-click'>";
                echo "<p>Địa điểm: " . $row['workplace'] . "</p>";
                echo "<p style='margin-left: auto;'>Fresher, Intern, Junior, Senior</p>";
                echo "</div>";
                echo "<a href='info-job.php?id_project=" . $row['id_project'] . "' style='color:red;'> Xem thêm thông tin </a>";
                echo "<div class='btn-cancel'>";
                echo "<button>Hủy ứng tuyển</button>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "<div id='pagination'></div>";
                echo "</div>";
            } else {
                // Hiển thị thông tin cho nhà tuyển dụng
                echo "<div class='cancel'>";
                echo "<div class='img-cancel-1'>";
                echo "<img src='../" . $row['img'] . "' alt=''>";
                echo "</div>";
                echo "<div class='info-cancel'>";
                echo "<a href='../info-job.php?id_project=" . $row['id_project'] . "' style='font-size: 20px; color:blue'>Tên ứng viên:" . $row['fullname'] . "</a>";
                echo "<a href='../info-job.php?id_project=" . $row['id_project'] . "'>Công việc ứng tuyển:" . $row['job_title'] . "</a>";
                echo "<div class='non-click'>";
                echo "<p>Địa điểm: " . $row['workplace'] . "</p>";
                echo "</div>";
                echo "<a href='info-job.php?id_project=" . $row['id_project'] . "' style='color:red;'> Xem sơ yếu lí lịch ứng viên (CV) </a>";
                echo "<div class='btn-cancel'>";
                echo "<button>Xóa ứng viên</button>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "<div id='pagination'></div>";
                echo "</div>";
            }
        }

        // Đóng kết nối
        $stmt->close();
        $conn->close();
        ?>



    </div>
</div>

<!--footer-->
<div class="footer">
    <img src="../../assets/img/logo-web.png" alt="">
    <div class="col">
        <p><i class="fa-solid fa-envelope" style="padding-right: 15px;"></i>Email: <a href="">123@gmail.com</a></p>
        <p><i class="fa-solid fa-phone" style="padding-right: 15px;"></i>Hotline: 0999999999</p>
        <p><i class="fa-solid fa-location-dot" style="padding-right: 15px;"></i>Địa chỉ: <a href="https://www.google.com/maps/place/H%E1%BB%8Dc+vi%E1%BB%87n+H%C3%A0ng+kh%C3%B4ng+Vi%E1%BB%87t+Nam+-+CS2/@10.8000211,106.6518413,17z/data=!3m1!4b1!4m6!3m5!1s0x3175292976c117ad:0x5b3f38b21051f84!8m2!3d10.8000211!4d106.6544162!16s%2Fg%2F1td1mcc1?hl=vi-VN&entry=ttu">1 Đ. Cộng Hòa, Phường 4, Tân Bình, Thành phố Hồ Chí Minh, Việt Nam</a></p>
    </div>

</div>

<!-- Trở lại đầu trang-->
<div class="back-top">
    <i class="fa-solid fa-circle-arrow-up" style=" font-size: 30px;"></i>

</div>


</body>



<!--Script back top-->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="../../js/back-top.js"></script>



<script src="../../js/pagination-applylist.js"></script>


</html>