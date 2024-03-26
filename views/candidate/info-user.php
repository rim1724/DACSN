<?php include('header_can.php') ?>
        <div class="bulkhead-container">
            <p>Nhà tuyển dụng đăng dự án <i class="fa-solid fa-caret-right" style="padding-right: 15px; padding-left: 15px;"></i> Nhân sự vào tìm kiếm <i class="fa-solid fa-caret-right" style="padding-right: 15px; padding-left: 15px;"></i> Nhận công việc từ nhà tuyển dụng</p>
        </div>
  




<!--Đổi thông tin cá nhân-->
<div class="change-all">
<div class="listall">
    <ul>
        <li class="see"><a href="info-user.html">Tài khoản</a></li>
        <li class="hover"><a href="setting.html">Cài đặt chung</a></li>
        <li class="hover"><a href="change-password.html">Đổi mật khẩu</a></li>
    </ul>
</div>
<div class="change">
    <div class="listmini">
        <ul>
            <li class="see2"><a href="info-user.html">Thông tin cá nhân</a></li>
            <li class="hover2"><a href="cv.html">Hồ sơ năng lực(CV)</a></li>
            <li class="hover2"><a href="apply-list.html">Danh sách công việc ứng tuyển</a></li>
            <li class="hover2"><a href="verified-phonenumber.html">Xác thực thông tin</a></li>
        </ul>
    </div>
 <form action="../../API/add_candidate.php" method="post" enctype="multipart/form-data">   
    <div class="doithongtin">
<div class="phan1">
    <h1>Thông tin chung</h1>
</div>
<dl>
    <dt>
        Ảnh đại diện <span class="redtext">*</span>
    </dt>
    <dd>
        <div class="img">
            <img src="../../assets/img/user.jpg" alt="">
        </div>
        <div class="upload">
            <input type="file" id="img-uploader" name="img">
        </div>
    </dd>
    <dt>
        Họ và tên <span class="redtext">*</span>
    </dt>
    <dd>
        <input type="text" name="fullname" placeholder="Nguyễn Văn A">
    </dd>
    <dt>
        Email <span class="redtext">*</span>
    </dt>
    <dd>
        <input type="text" name="email" placeholder="A@vaa.edu.vn">
    </dd>
    <dt>
        Sđt <span class="redtext">*</span>
    </dt>
    <dd>
        <input type="text" name="phone" placeholder="0000000000">
    </dd>
    <dt>
        Thành phố <span class="redtext">*</span>
    </dt>
    <dd>
        <input type="text" name="city"  placeholder="Huế">
    </dd>
    <dt>
        Địa chỉ <span class="redtext">*</span>
    </dt>
    <dd>
        <input type="text" name="address" placeholder="1 Đ. Cộng Hòa, Phường 4">
    </dd>
</dl>
<div class="phan2">
    <h1>Thông tin xác thực</h1>
</div>
<dl>
    <dt>
        Họ tên trên CCCD <span class="redtext">*</span>
    </dt>
    <dd>
        <input type="text" name="realfullname" placeholder="Nguyễn Văn A">
    </dd>
    <dt>
        Số CCCD <span class="redtext">*</span>
    </dt>
    <dd>
        <input type="text" name="id_identify" placeholder="000000000000">
    </dd>
    <dt>
        Ngày nhận <span class="redtext">*</span>
    </dt>
    <dd>
        <input type="date" name="received_date" placeholder="14/01/2024">
    </dd>
    <dt>
        Ngày sinh <span class="redtext">*</span>
    </dt>
    <dd>
        <input type="date" name="birthday" placeholder="14/01/2024">
    </dd>
</dl>
<div class="submit">
    <input type="submit" name="submit-form" value="Lưu thay đổi" >
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


<!--Script upload files-->
<script src="../../js/upload-info-user.js"></script>
            
                
        </html>