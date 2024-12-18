<?php include('header_can.php') ?>

<link rel="stylesheet" href="../../assets/css/cv-list.css">

        <!--vach ngan-->


        
        <div class="bulkhead-container">
            <p>Nhà tuyển dụng đăng dự án <i class="fa-solid fa-caret-right" style="padding-right: 15px; padding-left: 15px;"></i> Nhân sự vào tìm kiếm <i class="fa-solid fa-caret-right" style="padding-right: 15px; padding-left: 15px;"></i> Nhận công việc từ nhà tuyển dụng</p>
        </div>
  




<!--Xác minh SĐT-->
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
                                <li class="hover2"><a href="apply-list.php">Danh sách công việc đã ứng tuyển</a></li>
                                <li class="see2"><a href="cv-list.php">Danh sách CV đã tạo</a></li>

                    <?php
                    } else {
                    // User is logged in with a different role (not candidate)
                    // You can add conditional logic here to display specific options based on other roles
                    ?>
                               <li class="hover2"><a href="info-user.php">Thông tin công ty</a></li>
                               <li class="hover2"><a href="apply-list.php">Danh sách người ứng tuyển công việc</a></li>
                            <li class="see2"><a href="verified-phonenumber.php">Xác thực thông tin</a></li>

                    <?php
                    }
                    ?>
                    <?php
                }
                ?>

        </ul>
        
    </div>

    <div class="list-apply">
    <div class="cancel">
        <div class="info-cancel">
        <a href="../employer/view_cv.php" style="font-size: 20px; color:blue">Hồ sơ năng lực</a> <br>
        <p>Tình trạng: Đã ứng tuyển vào <a href="../info-job.php">công ty A</a> (để if nếu có thì để tên nếu không thì không)</p>
        <div class="non-click">
        <p>Viết ngày: 30/03/2024</p>
         
        </div>
        <a href="../../views/employer/view-cv.php" style="color:red;">Thay đổi thông tin CV</a>
        </div>
        <div class="btn-cancel">
            <button>Xóa CV</button>
        </div>
    </div>
</div>
<div id="pagination"></div>
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
        <script src="../../js/back-top.js">
        </script>



<script src="../../js/pagination-applylist.js"></script>
                
        </html>