<?php
include('header.php');
require_once('../config/config.php');

// Kiểm tra xem session đã được khởi tạo chưa
if (session_status() == PHP_SESSION_NONE) {
    session_start(); // Bắt đầu phiên làm việc
}

// Kiểm tra xem id_project được chuyển từ trang trước không
if(isset($_GET['id_project'])) {
    // Lưu id_project vào session
    $_SESSION['id_project'] = $_GET['id_project'];
}
// Kiểm tra xem có id_project trong session hay không
if(isset($_SESSION['id_project'])) {
    // Truy vấn cơ sở dữ liệu để lấy thông tin chi tiết của công việc tương ứng
    $id_project = $_SESSION['id_project'];
    $sql = "SELECT * FROM project WHERE id_project = $id_project";
    $result = mysqli_query($conn, $sql);

    // Kiểm tra kết quả truy vấn
    if($result && mysqli_num_rows($result) > 0) {
        // Lấy thông tin chi tiết của công việc và hiển thị
        $row = mysqli_fetch_assoc($result);
        // Hiển thị thông tin chi tiết của công việc
    } else {
        echo "<script>alert('Không tìm thấy công việc phù hợp.'); window.location.href = 'index.php';</script>";
        exit; // Dừng xử lý script
    }
} else {
    echo "<script>alert('Không có id_project được chuyển từ trang trước.'); window.location.href = 'index.php';</script>";
    exit; // Dừng xử lý script
}

// Xử lý khi người dùng nhấn vào nút "Ứng tuyển ngay"
if(isset($_GET['apply'])) {
    // Kiểm tra xem người dùng đã đăng nhập chưa (nếu cần)
    // Ví dụ: session_start(); và kiểm tra xem $_SESSION['id_user'] có tồn tại không

    // Lấy id_user từ session hoặc bất kỳ cách nào khác phù hợp
    if(isset($_SESSION['user_id'])) {
        $id_user = $_SESSION['user_id'];
    } else {
        // Thông báo lỗi hoặc chuyển hướng đến trang đăng nhập
        // Ví dụ: header('Location: login.php');
        echo '<script>alert("Vui lòng đăng nhập trước khi ứng tuyển."); window.location.href = "login.php";</script>';
        exit;
    }

    $id_project = $_SESSION['id_project'];

    // Thực hiện truy vấn để kiểm tra xem người dùng đã ứng tuyển công việc này chưa
    $check_sql = "SELECT * FROM user_apply WHERE user_id = $id_user AND id_project = $id_project";
    $check_result = mysqli_query($conn, $check_sql);

    if(mysqli_num_rows($check_result) > 0) {
        // Người dùng đã ứng tuyển công việc này rồi
        echo '<script>alert("Bạn đã ứng tuyển công việc này rồi!");</script>';
    } else {
        // Người dùng chưa ứng tuyển, tiến hành thêm vào cơ sở dữ liệu
        $insert_sql = "INSERT INTO user_apply (user_id, id_project) VALUES ('$id_user', '$id_project')";
        $insert_result = mysqli_query($conn, $insert_sql);

        if($insert_result) {
            // Thông báo cho người dùng biết rằng họ đã ứng tuyển thành công
            echo '<script>alert("Bạn đã ứng tuyển thành công!");</script>';
        } else {
            // Xử lý khi có lỗi xảy ra trong quá trình lưu vào cơ sở dữ liệu
            echo '<script>alert("Có lỗi xảy ra khi ứng tuyển!");</script>';
        }
    }
}
?>

<link rel="stylesheet" href="../assets/css/info-job.css ">
        <div class="bulkhead-container">
            <p>Nhà tuyển dụng đăng dự án <i class="fa-solid fa-caret-right" style="padding-right: 15px; padding-left: 15px;"></i> Nhân sự vào tìm kiếm <i class="fa-solid fa-caret-right" style="padding-right: 15px; padding-left: 15px;"></i> Nhận công việc từ nhà tuyển dụng</p>
        </div>
  

        <!-- Thoong tin chi tiết của công việc-->
        <div class="container-information">
            <section class="info-job-company">
                <section class="location-logo">
                    <div class="logo-company">
                    <?php  echo "<img src='" . $row['attached_file'] . "' alt=''>"; ?>
                    </div>
                    <div class="info-location">
                        <?php  echo "<p> " . $row['job_title'] . " </p>"; ?>
                        <p>TopDev's Client</p>
                        <div class="address-wage">
                            <i class="fa-solid fa-location-dot" style="margin-top: 8px; color: rgb(194 194 194);"></i>
                            <p>Tầng 12A, Toà nhà AP Tower, 518B Điện Biên Phủ, Phường 21, Quận Bình Thạnh, Thành phố Hồ Chí Minh</p>
                        </div>
                        <div class="address-wage">
                            <i class="fa-solid fa-money-bill-1-wave" style="margin-top: 3px; color: rgb(194 194 194)"></i>
                            <?php  echo "<p>Mức lương: " . $row['budget'] . " triệu đồng</p>"; ?>
                        </div>
                    </div>
                </section>
                <section class="content">
                    <section class="content-job">
                        <div class="onclick">
                            <div class="onclick-scroll" style="border-right:1px solid #dbdbdb ;"><p>Mô tả công việc</p></div>
                            <div class="onclick-scroll"><p>Giới thiệu về công ty</p></div>
                        </div>
                        <div class="about-job">
                            <div class="respon">
                                <h2>Trách nhiệm công việc</h2>
                                <ul>
                                    <li>Lập trình phần mềm, website và các ứng dụng trên mobile và web.</li>
                                    <li>Làm quen phần mềm CRM Salesforce CRM.</li>
                                </ul>
                            </div>
                            <div class="expert-interests">
                                <div class="expert">
                                    <h2>Kỹ năng & Chuyên môn</h2>
                                    <ul>
                                        <?php  echo "<li>" . $row['required_skills'] . "</li>"; ?>
                                        
                                    </ul>
                                </div>
                                <div class="interests">
                                    <h2>Quyền lợi:</h2>
                                    <ul>
                                        <li>Được trải nghiệm môi trường và quy trình làm việc tại công ty Nhật.</li>
                                        <li>Được cung cấp tài liệu và hỗ trợ làm khóa luận tốt nghiệp (nếu cần)</li>
                                        <li>Được hỗ trợ phí di chuyển và ăn cơm trưa.</li>
                                        <li>Được training các kỹ năng lập trình, kiến thức thực tế.</li>
                                        <li>Được hỗ trợ lệ phí thi chứng chỉ Salesforce</li>
                                        <li>Môi trường làm việc trẻ, năng động và thân thiện</li>
                                        <li>Cơ hội trở thành nhân viên chính thức (kèm theo bonus)</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="welfare">
                                <h2>Phúc lợi dành cho bạn</h2>
                                <ul>
                                    <li><i class="fa-solid fa-graduation-cap" style="padding-right: 5px;"></i>Build solid foundation for IT career path through an accelerate 12-month development</li>
                                    <li><i class="fa-solid fa-laptop" style="padding-right: 5px;"></i>Acquire strong technical and soft skills</li>
                                    <li><i class="fa-solid fa-rss" style="padding-right: 9px;"></i>Work in cutting edge technology projects</li>
                                    <li><i class="fa-solid fa-child-reaching" style="padding-right: 12px;"></i>Buddy with friendly colleagues and learn from senior experts</li>
                                    <li><i class="fa-solid fa-martini-glass-empty" style="padding-right: 8px;"></i>Develop a strong sense of business insight</li>
                                    <li><i class="fa-solid fa-book-bookmark" style="padding-right: 10px;"></i>Development journey come along with growing benefits</li>
                                    <li><i class="fa-brands fa-angellist" style="padding-right: 10px;"></i>Receive attractive benefits (meal allowance, 13th month salary, performance bonus, healthcare insurance,...)</li>
                                </ul>
                            </div>
                        </div>
                        <div class="about-company">
                            <h2>Công ty</h2>
                            <p>TopDev's Client</p>
                            <div class="icon-company">
                                <div class="icon-text">
                                    <i class="fa-solid fa-city fa-2xl"></i>
                                    <h3>Ngành nghề</h3>
                                    <p>Dịch vụ doanh nghiệp, Nhân sự,</p>
                                    <p>Triển Khai Phần Mềm</p>
                                </div>
                                <div class="icon-text">
                                    <i class="fa-solid fa-user-group fa-2xl"></i>
                                    <h3>Quy mô công ty</h3>
                                    <p>25-99</p>
                                </div>
                                <div class="icon-text">
                                    <i class="fa-solid fa-flag fa-2xl"></i>
                                    <h3>Quốc tịch công ty</h3>
                                    <p>Vietnam</p>
                                </div>
                            </div>
                            <div class="introduce">
                                <h2>Về chúng tôi</h2>
                                <p>We are American company that specializes in developing software for the music industry. The programs we develop help record labels and artists market and monetize their music. We have offices in US and Europe, and we opened our Hanoi office in 2018.</p>
                            </div>
                            <div class="img-slide">
                                <img src="../assets/img/company-1.png" alt="">
                                <img src="../assets/img/company-2.png" alt="">
                                <img src="../assets/img/company-3.png" alt="">
                            </div>
                        </div>
                    </section>
                    <section class="offer-job">
                        <h2>Việc làm khác tại TopDev's Client</h2>
                        <div class="another-job">
                            <h3>.NET Developer (All Levels)</h3>
                            <div class="code-language">
                                <div class="c-language"><a href="">C#</a></div>
                                <div class="c-language"><a href="">.NET</a></div>
                                <div class="c-language"><a href="">.NET Core</a></div>
                            </div>
                        </div>
                        <div class="another-job">
                            <h3>Fresher/Junior - Software Engineer C/C++</h3>
                            <div class="code-language">
                                <div class="c-language"><a href="">C++</a></div>
                                <div class="c-language"><a href="">Analyst</a></div>
                            </div>
                        </div>
                    </section>
                </section>
            </section>
            <section class="button-request">
            <form method="get" action="">
    <button type="submit" class="apply" name="apply">Ứng tuyển ngay</button>
</form>
                <section class="info-request">
                    <div class="general-info">
                        <div class="text-request">
                            <h2>Thông tin chung</h2>
                        </div>
                        <div class="request">
                            
                            <div class="request-list">
                                <h3>Dịch vụ</h3>
                                <?php  echo "<p>" . $row['service'] . "</p>"; ?>
                            </div>
                            <div class="request-list">
                                <h3>Loại hợp đồng</h3>
                                <?php  echo "<p>" . $row['work_type'] . "</p>"; ?>
                            </div>  
                            <div class="request-list">
                                <h3>Các công nghệ sử dụng</h3>
                                <div class="code-language">
                                    <div class="c-language"><a href="">PHP</a></div>
                                    <div class="c-language"><a href="">JAVA</a></div>
                                    <div class="c-language"><a href="">.NET</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="tech">
                            <h3>Quy trình phỏng vấn</h3>
                            <div class="programming-language">
                                <ul>
                                    <li>Vòng 1: Sàng lọc CV</li>
                                    <li>Vòng 2: Phỏng vấn trực tiếp với Nhân Sự</li>
                                    <li>Vòng 3: Phỏng vấn trực tiếp với Trưởng Bộ phận</li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </section>
            </section>
        </div>
        















                <!--footer-->
                <div class="footer">
                    <img src="../assets/img/logo-web.png" alt="">
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
        <script src="../js/back-top.js"></script>




<!--phân trang-->
<script src="../js/pagination-full-search.js"></script>





     

<!--Ứng tuyển thành công-->
<script src="../js/apply-fullsearch.js"></script>
           
                
</html>