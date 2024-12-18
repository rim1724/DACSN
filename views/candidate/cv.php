<?php include('header_can.php') ?>
<link rel="stylesheet" href="../../assets/css/cv.css">
<link rel="stylesheet" href="../../assets/css/test.css">
        <div class="bulkhead-container">
            <p>Nhà tuyển dụng đăng dự án <i class="fa-solid fa-caret-right" style="padding-right: 15px; padding-left: 15px;"></i> Nhân sự vào tìm kiếm <i class="fa-solid fa-caret-right" style="padding-right: 15px; padding-left: 15px;"></i> Nhận công việc từ nhà tuyển dụng</p>
        </div>
<!--Đổi thông tin hồ sơ CV cá nhân-->
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
                                <li class="see2"><a href="cv.php">Hồ sơ năng lực(CV)</a></li>
                                <li class="hover2"><a href="apply-list.php">Danh sách công việc đã ứng tuyển</a></li>
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
    <div class="cv-all">
    

    <main>
        <form action="../../API/add_cv.php" method="POST" enctype="multipart/form-data">
            <section class="sec" id="thong-tin-ca-nhan">
                <h3>Thông tin cá nhân</h3>
                <ul>
                    <li>
                        <label class="la" for="fullname">Họ và tên:</label>
                        <input class="in"  type="text" id="fullname" name="fullname" required>
                    </li>
                    <li>
                      <label class="la"  for="photo">Ảnh :</label>
                      <input class="in" type="file" name="img" id="img"required accept="image/png, image/jpeg, image/jpm, image/jpx">
                  </li>
                    <li>
                        <label class="la"  for="email">Email:</label>
                        <input class="in"  type="email" id="email" name="email" required>
                    </li>
                    <li>
                        <label class="la"  for="phone">Số điện thoại:</label>
                        <input class="in"  type="tel" id="phone" name="phone" required>
                    </li>
                    <li>
                        <label class="la"  for="dob">Ngày sinh:</label>
                        <input class="in"  type="date" id="dob" name="dob" required>
                    </li>
                    <li>
                        <label class="la"  for="gender">Giới tính:</label>
                        <select class="in" id="gender" name="gender" required>
                            <option value="">Chọn giới tính</option>
                            <option value="male">Nam</option>
                            <option value="female">Nữ</option>
                        </select>
                    </li>
                    <li>
                      <label class="la"  for="city">Thành Phố:</label>
                      <input class="in"  type="text" id="city" name="city" required>
                  </li>
                    <li>
                        <label class="la"  for="address">Địa chỉ cụ thể:</label>
                        <input class="in"  type="text" id="address" name="address" required>
                    </li>
                    <li>
                      <label class="la"  for="myseo">Giới thiệu bản thân</label>
                      <textarea class="in"  id="" name="myseo" required></textarea>
                    </li>
                    
                </ul>
            </section>

            <section class="sec" id="muc-tieu-nghe-nghiep">
                <h3>Mục tiêu nghề nghiệp</h3>
                <textarea class="in" id="career-objective" name="career-objective" required></textarea>
            </section>

            <section class="sec" id="kinh-nghiem-lam-viec">
                <h3>Kinh nghiệm làm việc</h3>
                <ul id="work-experience">
                    <li>
                        <label class="la"  for="company-1">Công ty:</label>
                        <input class="in"  type="text" id="company-1" name="company-1">
                        <label class="la"  for="position-1">Chức vụ:</label>
                        <input class="in"  type="text" id="position-1" name="position-1">
                        <label class="la"  for="start-date-1">Thời gian bắt đầu:</label>
                        <input class="in"  type="date" id="start-date-1" name="start-date-1">
                        <label  class="la" for="end-date-1">Thời gian kết thúc:</label>
                        <input class="in"  type="date" id="end-date-1" name="end-date-1">
                        <textarea class="in" id="description-1" name="description-1"></textarea>
                    </li>
                </ul>
                <button class="but" type="button" id="add-work-experience">Thêm kinh nghiệm làm việc</button>
            </section>

            <section class="sec" id="trinh-do-hoc-van">
                <h3>Trình độ học vấn</h3>
                <ul id="education">
                    <li>
                        <label  class="la" for="school-1">Trường học:</label>
                        <input class="in"  type="text" id="school-1" name="school-1">
                        <label class="la"  for="degree-1">Bằng cấp:</label>
                        <input class="in"  type="text" id="degree-1" name="degree-1">
                        <label class="la"  for="start-date-2">Thời gian bắt đầu:</label>
                        <input class="in"  type="date" id="start-date-2" name="start-date-2">
                        <label class="la" for="end-date-2">Thời gian kết thúc:</label>
                        <input class="in"  type="date" id="end-date-2" name="end-date-2">
                      </li>
                    </ul>
                    <button class="but" type="button" id="add-education">Thêm trình độ học vấn</button>
                </section>
    
                <section class="sec" id="ky-nang">
                    <h3>Kỹ năng</h3>
                    <ul>
                        <li>
                            <label class="la"  for="skills">Kỹ năng chuyên môn:</label>
                            <textarea class="in" id="skills" name="skills" required></textarea>
                        </li>
                        <li>
                            <label  class="la" for="soft-skills">Kỹ năng mềm:</label>
                            <textarea  class="in" id="soft-skills" name="soft-skills" required></textarea>
                        </li>
                        <li>
                            <label class="la" for="languages">Ngoại ngữ:</label>
                            <ul id="languages">
                                <li>
                                    <input  class="in" type="text" id="language-1" name="language-1" placeholder="Tên ngôn ngữ">
                                    <select class="in"id="proficiency-1" name="proficiency-1">
                                        <option value="">Chọn trình độ</option>
                                        <option value="basic">Cơ bản</option>
                                        <option value="intermediate">Trung cấp</option>
                                        <option value="advanced">Nâng cao</option>
                                    </select>
                                    
                                </li>
                            </ul>
                            <button class="but" type="button" id="add-language">Thêm ngôn ngữ</button>
                        </li>
                    </ul>
                </section>
    
                <section class="sec"  id="thanh-tuu-va-giai-thuong">
                    <h3>Thành tựu và giải thưởng</h3>
                    <ul id="achievements">
                        <li>
                            <input class="in"  type="text" id="achievement-1" name="achievement-1">
                        </li>
                    </ul>
                    <button class="but" type="button" id="add-achievement">Thêm thành tựu</button>
                </section>
    
                <section class="sec" id="so-thich">
                    <h3>Sở thích</h3>
                    <ul id="hobbies">
                        <li>
                            <input class="in"  type="text" id="hobby-1" name="hobby-1">
                        </li>
                    </ul>
                    <button class="but" type="button" id="add-hobby">Thêm sở thích</button>
                </section>
    
                <button class="but" type="submit" style="margin-left: 440px;">Gửi thông tin</button>
            </form>
           
        </main>
    </div>
</div>
</div>
                <!--footer-->
              
                <!-- Trở lại đầu trang-->
                <div class="back-top" style="display: grid; grid-template-rows: 1fr auto;">
                        <i class="fa-solid fa-circle-arrow-up" style=" font-size: 30px;"></i>
                      </div> 
                      <div class="footer">
                    <img src="../../assets/img/logo-web.png" alt="">
                    <div class="col">
                        <p><i class="fa-solid fa-envelope" style="padding-right: 15px;"></i>Email: <a href="">123@gmail.com</a></p>
                        <p><i class="fa-solid fa-phone" style="padding-right: 15px;"></i>Hotline: 0999999999</p>
                        <p><i class="fa-solid fa-location-dot" style="padding-right: 15px;"></i>Địa chỉ: <a href="https://www.google.com/maps/place/H%E1%BB%8Dc+vi%E1%BB%87n+H%C3%A0ng+kh%C3%B4ng+Vi%E1%BB%87t+Nam+-+CS2/@10.8000211,106.6518413,17z/data=!3m1!4b1!4m6!3m5!1s0x3175292976c117ad:0x5b3f38b21051f84!8m2!3d10.8000211!4d106.6544162!16s%2Fg%2F1td1mcc1?hl=vi-VN&entry=ttu">1 Đ. Cộng Hòa, Phường 4, Tân Bình, Thành phố Hồ Chí Minh, Việt Nam</a></p>
                    </div>
            
                  </div>
             
 </body> 
        <!--Script back top-->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="../../js/back-top.js"></script>
 <script src="../../js/cv.js"> </script>            
</html>