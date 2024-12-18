<?php include('header.php') ;
require_once('../config/config.php')?>
<link rel="stylesheet" href="../assets/css/full-search.css">



        <!--vach ngan-->


        
        <div class="bulkhead-container">
            <p>Nhà tuyển dụng đăng dự án <i class="fa-solid fa-caret-right" style="padding-right: 15px; padding-left: 15px;"></i> Nhân sự vào tìm kiếm <i class="fa-solid fa-caret-right" style="padding-right: 15px; padding-left: 15px;"></i> Nhận công việc từ nhà tuyển dụng</p>
        </div>
  

        <!-- phan tim kiem va hien danh sach tim kiem -->
        <div class="find-all">
            <div class="recommend">
                <h3>Tìm kiếm công việc phù hợp với yêu cầu và khả năng của bạn</h3>
                <p>Công việc mới cập nhật liên tục mỗi ngày</p>
            </div>
            <div class="list-show">
            <div class="list-info">
                <div class="list-find">
                    <div class="find">
                        <form action="" class="find-box">
                            <input type="text" name="ok" class="search-text">
                            <button class="search-icon"><i class="fa-solid fa-magnifying-glass fa-xl" ></i></button>
                        </form>
                    </div>
                    <div class="list">
                        <?php
// Kết nối với cơ sở dữ liệu
$conn = new mysqli(DB_HOST, DB_USER, getenv('DB_PASSWORD'), DB_NAME);

// Kiểm tra kết nối
if (!$conn) {
  die("Kết nối thất bại: " . mysqli_connect_error());
}

// Truy vấn dữ liệu
$sql = "SELECT * FROM project";
$result = mysqli_query($conn, $sql);

// Kiểm tra kết quả truy vấn
if (!$result) {
  die("Truy vấn thất bại: " . mysqli_error($conn));
}

// Duyệt qua kết quả và hiển thị dữ liệu
while ($row = mysqli_fetch_assoc($result)) {
  echo "<div class='congviec1'>";
  echo "<div class='img-1'>";
  echo "<img src='" . $row['attached_file'] . "' alt=''>";
  echo "</div>";
  echo "<div class='info-1'>";
  echo "<a href='info-job.php?id_project=" . $row['id_project'] . "' style='font-size: 18px;'>" . $row['job_title'] . "</a>";
  echo "<p>Mức lương: " . $row['budget'] . " triệu đồng</p>";
  echo "<a href='info-job.php?id_project=" . $row['id_project'] . "'>Eupfin Việt Nam</a>";
  echo "<p>Địa điểm: <a href=''>" . $row['workplace'] . "</a></p>";
  echo "</div>";
  echo "<div class='to-infojob'>";
  echo "<a href='info-job.php?id_project=" . $row['id_project'] . "'> Xem thông tin </a>";
  echo "</div>";
  echo "</div>";
}
// Đóng kết nối với cơ sở dữ liệu
mysqli_close($conn);
?>
                    </div>
            </div>
        </div>
        </div>
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