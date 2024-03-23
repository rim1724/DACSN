<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../../assets/css/info-user.css">
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
        <li><a href="../full-search.html">Tìm kiếm <i class="fa-solid fa-caret-down" style="padding-left: 5px;"></i></a>
            <ul class="sub-menu">
                <li><a href="../full-search.html">Chức vụ <i class="fa-solid fa-caret-right" style="padding-left: 5px;"></i></a>
                <ul class="sub-menu">
                    <li><a href="../full-search.html">Intern</a></li>
                    <li><a href="../full-search.html">Junior</a></li>
                    <li><a href="../full-search.html">Senior</a></li>
                    <li><a href="../full-search.html">Trưởng nhóm</a></li>
                    <li><a href="../full-search.html">Trưởng phòng</a></li>
                </ul></li>
                <li><a href="../full-search.html">Loại hình <i class="fa-solid fa-caret-right" style="padding-left: 5px;"></i></a>
                    <ul class="sub-menu">
                        <li><a href="../full-search.html">Full-Time</a></li>
                        <li><a href="../full-search.html">Part-Time</a></li>
                    </ul>
                </li>
                <li><a href="../full-search.html">Địa điểm <i class="fa-solid fa-caret-right" style="padding-left:  5px;"></i></a>
                    <ul class="sub-menu">
                        <li><a href="../full-search.html">Hồ Chí Minh</a></li>
                        <li><a href="../full-search.html">Hà nội</a></li>
                        <li><a href="../full-search.html">Huế</a></li>
                    </ul>
                </li>
                <li><a href="../full-search.html">Ngôn ngữ <i class="fa-solid fa-caret-right" style="padding-left: 5px ;"></i></a>
                    <ul class="sub-menu">
                        <li><a href="../full-search.html">Java</a></li>
                        <li><a href="../full-search.html">JavaScript</a></li>
                        <li><a href="../full-search.html">C#</a></li>
                        <li><a href="../full-search.html">PHP</a></li>
                        <li><a href="../full-search.html">C++</a></li>
        
                    </ul>
                </li>
                <li><a href="../full-search.html">Chức năng<i class="fa-solid fa-caret-right" style="padding-left: 5px;"></i></a>
                    <ul class="sub-menu">
                        <li><a href="../full-search.html">Font-End</a></li>
                        <li><a href="../full-search.html">Back-End</a></li>
                        <li><a href="../full-search.html">Database</a></li>
                        <li><a href="../full-search.html">IT Security</a></li>
                        <li><a href="../full-search.html">Wordpress</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="../index-main.html">Nhà tuyển dụng <i class="fa-solid fa-caret-down" style="padding-left: 5px;"></i></a>
            <ul class="sub-menu">
                <li><a href="../employer/post-project.html">Đổi dự án</a></li>
                <li><a href="../employer/candidate-list.html">Danh sách ứng tuyển</a></li>
            </ul>
            </li>  
        <li><a href="../candidate/info-user.html"><i class="fa-solid fa-user" style="padding-right:5px ;"></i> Tên người dùng <i class="fa-solid fa-caret-down" style="padding-left: 5px;"></i></a>
            <ul class="sub-menu2">
                <?php
                 if (session_status() === PHP_SESSION_NONE) {
                     session_start(); // Start session if not already started
                 }
 
                 if (!isset($_SESSION['user_id'])) {
                     // User is not logged in, show login link
                     ?>
                     <li><a href="sign-in.html">Đăng nhập</a></li>
                     <?php
                 } else {
                     // User is logged in, check role and display options
                     if (isset($_SESSION['user_id']) && $_SESSION['role'] === 0) {
                     // User is logged in as a candidate (role = 0)
                     ?>
                     <li><a href="candidate/info-user.html" style="padding-left: 67px;">Đổi thông tin</a></li>
                     <li><a href="candidate/change-password.html" style="padding-left: 63px; width: 193px;">Đổi mật khẩu</a></li>
                     <?php
                     } else {
                     // User is logged in with a different role (not candidate)
                     // You can add conditional logic here to display specific options based on other roles
                     ?>
                     <li><a href="#">Other Role Options</a></li>
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
            <div class="button" style="height: 43.8px;">
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


        