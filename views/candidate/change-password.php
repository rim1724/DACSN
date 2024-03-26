<?php include('header_can.php') ?>
<link rel="stylesheet" href="../../assets/css/change-password.css">
        <!--vach ngan-->


        
        <div class="bulkhead-container">
            <p>Nhà tuyển dụng đăng dự án <i class="fa-solid fa-caret-right" style="padding-right: 15px; padding-left: 15px;"></i> Nhân sự vào tìm kiếm <i class="fa-solid fa-caret-right" style="padding-right: 15px; padding-left: 15px;"></i> Nhận công việc từ nhà tuyển dụng</p>
        </div>
  




<!--Đổi Password-->
<div class="change-all">
<div class="listall">
    <ul>
        <li class="hover"><a href="info-user.php">Tài khoản</a></li>
        <li class="hover"><a href="setting.php">Cài đặt chung</a></li>
        <li class="see"><a href="change-password.php">Đổi mật khẩu</a></li>
    </ul>
</div>
<form action="../../API/changepassword.php" method="post">
    <div class="change-password">
      <div class="tittle">
        <h3>Thay đổi mật khẩu của bạn</h3>
      </div>
      <div class="change">
        <p>Thay đổi mật khẩu ở mức độ giúp bạn tăng độ bảo mật tài khoản của bạn</p>
        <input type="text" name="old_password" placeholder="Mật khẩu cũ">
        <input type="text" name="new_password" placeholder="Nhập lại mật khẩu cũ">
        <input type="text" name="confirm_password" placeholder="Mật khẩu mới">
        <button class="button-password" type="submit"><a href="">Đổi mật khẩu</a></button>
      </div>
    </div>
  </form>
  
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



            
                
        </html>