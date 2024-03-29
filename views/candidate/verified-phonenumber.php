<?php include('header_can.php') ?>

<link rel="stylesheet" href="../../assets/css/verified-phonenumber.css">

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
                                <li class="hover2"><a href="apply-list.php">Danh sách công việc đã tuyển</a></li>
                                <li class="see2"><a href="verified-phonenumber.php">Xác thực thông tin</a></li>

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

<div class="verify">
    <div class="title">
        <h2>Xác thực ID tài khoản</h2>
        <p>Xác thực chính xác thông tin cá nhân là cách giúp bạn nhận được sự tin tưởng từ những nhà tuyển dụng.</p>
    </div>
    <div class="verify-main">
        <div class="type">
            <i class="fa-solid fa-circle-check" style="margin-left: 15px;margin-right: 15px;margin-top: 10px;"></i> Xác thực số điện thoại
        </div>
        <div class="sdt">
            <p>Lợi ích của việc xác thực thông tin bằng số điện thoại</p>
            <ul>
                <li>Tăng độ tin cậy khi thực hiện việc đăng tin tuyển dụng hay tìm công việc</li>
                <li>Có thể liên hệ trực tiếp bằng số điện thoại đã xác minh</li>
                <li>Giúp mọi người tránh mất thời gian, tiền bạc khi gặp những đơn tuyển dụng giả</li>
            </ul>
            <input type="text" placeholder="0000000000">
            <div class="button-sdt">
                <a href="">Xác thực SĐT</a>
            </div>
            
        </div>
    </div>
</div> 
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



            
                
        </html>