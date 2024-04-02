<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <script src="https://kit.fontawesome.com/8aa3156f32.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
            <nav class="container">
            <a href="../index-main.php" id="logo">
            <img src="../../assets/img/logo-web.png" alt="Unitop.vn"> </a>
            <ul id="main-menu">
        <li><a href="../index-main.php">Trang chủ</a></li>
        <li><a href="../full-search.php">Tìm kiếm <i class="fa-solid fa-caret-down" style="padding-left: 5px;"></i></a>
            <ul class="sub-menu">
                <li><a href="../full-search.php">Chức vụ <i class="fa-solid fa-caret-right" style="padding-left: 5px;"></i></a>
                <ul class="sub-menu">
                    <li><a href="../full-search.php">Intern</a></li>
                    <li><a href="../full-search.php">Junior</a></li>
                    <li><a href="../full-search.php">Senior</a></li>
                    <li><a href="../full-search.php">Trưởng nhóm</a></li>
                    <li><a href="../full-search.php">Trưởng phòng</a></li>
                </ul></li>
                <li><a href="../full-search.php">Loại hình <i class="fa-solid fa-caret-right" style="padding-left: 5px;"></i></a>
                    <ul class="sub-menu">
                        <li><a href="../full-search.php">Full-Time</a></li>
                        <li><a href="../full-search.php">Part-Time</a></li>
                    </ul>
                </li>
                <li><a href="../full-search.php">Địa điểm <i class="fa-solid fa-caret-right" style="padding-left:  5px;"></i></a>
                    <ul class="sub-menu">
                        <li><a href="../full-search.php">Hồ Chí Minh</a></li>
                        <li><a href="../full-search.php">Hà nội</a></li>
                        <li><a href="../full-search.php">Huế</a></li>
                    </ul>
                </li>
                <li><a href="../full-search.php">Ngôn ngữ <i class="fa-solid fa-caret-right" style="padding-left: 5px ;"></i></a>
                    <ul class="sub-menu">
                        <li><a href="../full-search.php">Java</a></li>
                        <li><a href="../full-search.php">JavaScript</a></li>
                        <li><a href="../full-search.php">C#</a></li>
                        <li><a href="../full-search.php">PHP</a></li>
                        <li><a href="../full-search.php">C++</a></li>
        
                    </ul>
                </li>
                <li><a href="../full-search.php">Chức năng<i class="fa-solid fa-caret-right" style="padding-left: 5px;"></i></a>
                    <ul class="sub-menu">
                        <li><a href="../full-search.php">Font-End</a></li>
                        <li><a href="../full-search.php">Back-End</a></li>
                        <li><a href="../full-search.php">Database</a></li>
                        <li><a href="../full-search.php">IT Security</a></li>
                        <li><a href="../full-search.php">Wordpress</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="../index-main.php">Nhà tuyển dụng <i class="fa-solid fa-caret-down" style="padding-left: 5px;"></i></a>
            <ul class="sub-menu">
                <li><a href="../employer/post-project.php">Đổi dự án</a></li>
                <li><a href="apply-list.php">Danh sách ứng tuyển</a></li>
            </ul>
            </li>  
        <li><a href="../candidate/info-user.php"><i class="fa-solid fa-user" style="padding-right:5px ;"></i> Tên người dùng <i class="fa-solid fa-caret-down" style="padding-left: 5px;"></i></a>
            <ul class="sub-menu2">
                <?php
                 if (session_status() === PHP_SESSION_NONE) {
                     session_start(); // Start session if not already started
                 }
 
                 if (!isset($_SESSION['user_id'])) {
                     // User is not logged in, show login link
                     ?>
                     <li><a href="sign-in.php">Đăng nhập</a></li>
                     <?php
                 } else {
                     // User is logged in, check role and display options
                     if (isset($_SESSION['user_id']) && $_SESSION['role'] === 0) {
                     // User is logged in as a candidate (role = 0)
                     ?>
                     <li><a href="info-user.php" style="padding-left: 67px;">Đổi thông tin</a></li>
                     <li><a href="../employer/view_cv.php" style="padding-left: 67px;">CV đã tạo</a></li>
                     <li><a href="change-password.php" style="padding-left: 63px; width: 108px;">Đổi mật khẩu</a></li>
                     <?php
                     } else {
                     // User is logged in with a different role (not candidate)
                     // You can add conditional logic here to display specific options based on other roles
                     ?>
                     <li><a href="info-user.php"style="padding-left: 67px;">Đổi thông tin</a></li>
                     <?php
                     }
                     ?>
                     <li><a href="../../php/sign-out.php">Đăng xuất</a></li>
                     <?php
                 }
                 ?>
             </ul>
            </li>
            </ul>     
            <div class="button" >
            <?php 
            if(!isset($_SESSION['user_id'])){
             ?>
            <a href="../sign-in.html">Đăng nhập</a>
            <?php
            }else{ 
                if (isset($_SESSION['user_id']) && $_SESSION['role'] === 0) {
             ?>
                <a href="../employer/post-project.php">Tạo CV</a>
            <?php
             }else{
            ?> 
                <a href="../employer/post-project.php">Đăng dự án</a>
            <?php
            }}?>
            </div>   
            </nav>
            </div>
            </div>



        <!--vach ngan-->


        