<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../../assets/css/post-project.css">
        <script src="https://kit.fontawesome.com/8aa3156f32.js" crossorigin="anonymous"></script>
        <script src="../../js/upload-post-project.js"></script>
    </head>
    <body>
        <div id="wrapper">
            <div id="header">
            <nav class="container">
            <a href="../index-main.html" id="logo">
            <img src="../../assets/img/logo-web.png" alt="Unitop.vn"> </a>
            <ul id="main-menu">
        <li><a href="../index-main.html">Trang chủ</a></li>
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
                <li><a href="../candidate/info-user.html" style="padding-left: 68.975px;">Đổi thông tin</a></li>
                <li><a href="../candidate/change-password.html" style="padding-left: 64.4px;">Đổi mật khẩu</a></li>
                <li><a href="../sign-in.html">Đăng xuất</a></li>
            </ul>
            </li>
            </ul>     
            <div class="button">
                <a href="post-project.html">Đăng dự án</a>
            </div>  
            </nav>
            </div>
            </div>


        <!--vach ngan-->


        
        <div class="bulkhead-container">
            <p>Nhà tuyển dụng đăng dự án <i class="fa-solid fa-caret-right" style="padding-right: 15px; padding-left: 15px;"></i> Nhân sự vào tìm kiếm <i class="fa-solid fa-caret-right" style="padding-right: 15px; padding-left: 15px;"></i> Nhận công việc từ nhà tuyển dụng</p>
        </div>
        <!--Đăng dự án-->

        <div class="postproject">
            <h1>Đăng thông tin</h1>
            <form action="../../API/add_project.php" id="my-form" method="post" enctype="multipart/form-data">
            <div class="post-all">
              <div class="post" style="display: flex;">
                <div class="post-img">
                  <img src="../../assets/img/postproject-img/post1.png" alt="">
                </div>
                <div class="post-infomation">
                  <h2>Công việc mà bạn muốn đăng tuyển</h2>
                  <p>Chọn lĩnh vực cần tuyển</p>
                  <input type="text" class="Vidu" placeholder="VD: Lập trình web" name="service" required>
                </div>
              </div>
              <div class="post">
                <div class="post-info">
                  <p>Chọn dịch vụ phù hợp với yêu cầu tuyển free lance của bạn nhất</p>
                  <input type="text" class="Vidu" placeholder="VD: Bảo trì máy tính" name="specific_service" required>
                </div>
              </div>
              <div class="post">
                <div class="post-info">
                  <p>Tên cụ thể của công việc cần tuyển</p>
                  <input type="text" class="Vidu" placeholder="VD: Thiết kế trang web bán hàng" name="job_title" required>
                </div>
              </div>
              <div class="post" style="display: flex;">
                <div class="post-img">
                  <img src="../../assets/img/postproject-img/post2.png" alt="">
                </div>
                <div class="post-infomation">
                  <h2>Thông tin đầy đủ về yêu cầu tuyển dụng</h2>
                  <p>Nội dung chi tiết về tất cả những yêu cầu (càng chi tiết càng dễ tìm kiếm Freelancer phù hợp để thực hiện)</p>
                  <input type="text" style="word-wrap: break-word;" id="Vidu2" name="job_description" placeholder="VD: Website cần thiết kế theo mô hình như nào, giao diện gồm trang chủ, trang tìm kiếm,...">
                </div>
              </div>
              <div class="post">
                <div class="post-info">
                  <p>Thêm tệp đính kèm</p>
                  <input type="file" id="file-uploader" name="attached_file">
                </div>
              </div>
              <div class="post">
                <div class="post-info">
                  <p>Kỹ năng yêu cầu</p>
                  <input type="text" class="Vidu3" name="required_skills" placeholder="VD: Photoshop, Ngoại ngữ,...">
                </div>
              </div>
              <div class="post">
                <div class="post-info">
                  <p>Hạn cuối nhận việc (theo Part-time)</p>
                  <input type="text" class="Vidu3" name="deadline" placeholder="VD: 11/01/2024">
                </div>
              </div>
              <div class="post">
                <div class="post-info">
                  <p>Hình thức làm việc</p>
                  <input type="text" class="Vidu3" name="work_type" placeholder="VD: Full-Time or Part-Time,...">
                </div>
              </div>
              <div class="post" style="display: flex;">
                <div class="post-img">
                  <img src="../../assets/img/postproject-img/post3.png" alt="">
                </div>
                <div class="post-infomation">
                  <h2>Yêu cầu khác</h2>
                  <p>Địa điểm làm việc (chủ yếu dành cho Full-Time)</p>
                  <input type="text" class="Vidu3" name="workplace" placeholder="VD: Huế,Sài Gòn,...">
                </div>
              </div>
              <div class="post" style="display: flex;">
                <div class="post-img">
                  <img src="../../assets/img/postproject-img/post4.png" alt="">
                </div>
                <div class="post-infomation">
                  <h2>Ngân sách dự kiến</h2>
                  <p>Hình thức trả lương</p>
                  <input type="text" class="Vidu3" name="payment_method" placeholder="VD: Theo giờ, theo tháng,...">
                </div>
              </div>
              <div class="post">
                <div class="post-info">
                  <p>Mức lương dự kiến</p>
                  <input type="text" class="Vidu3" name="budget" placeholder="VD: 20-25 triệu đồng,...">
                </div>
              </div>
              <div class="post" style="display: flex;">
                <div class="post-img">
                  <img src="../../assets/img/postproject-img/post5.png" alt="">
                </div>
                <div class="post-infomation">
                  <h2>Hình thức tuyển dụng</h2>
                  <p>Bạn muốn tuyển dụng theo hình thức:</p>
                  <div class="choose">
                    <input type="radio" name="employment_type" value="1" id="myrad1" checked>
                    <label for="myrad1">Full-Time</label>
                    <input type="radio" name="employment_type" value="0" id="myrad2">
                    <label for="myrad2">Part-Time</label>
                  </div>
                </div>
              </div>
            </div>
            <div class="post-agree">
              <div class="xacnhan">
                <input type="submit" value="Đăng tin">
              </div>
              <div class="ghichu">
                <p>Vui lòng liên lạc với chúng tôi qua email @12345 để xác minh thông tin.</p>
              </div>
            </div>
          </form>
        </div> 
        <script>
          const form = document.getElementById('my-form');

          form.addEventListener('submit', (event) => {
            event.preventDefault();

            const service = form.querySelector('input[name="service"]').value;
            const jobTitle = form.querySelector('input[name="job_title"]').value;
            const jobDescription = form.querySelector('input[name="job_description"]').value;

            // Kiểm tra các trường dữ liệu bắt buộc

            if (!service || !jobTitle || !jobDescription) {
              alert('Vui lòng nhập đầy đủ các trường thông tin bắt buộc!');
              return;
            }

            // ... (kiểm tra thêm các trường dữ liệu khác)

            // Gửi dữ liệu form

            form.submit();
          });

                      // Lấy dữ liệu từ form
          var formData = {
            service: $("#service").val(),
            specific_service: $("#specific_service").val(),
            job_title: $("#job_title").val(),
            job_description: $("#job_description").val(),
            attached_file: $("#file-uploader").val(),
            required_skills: $("#required_skills").val(),
            deadline: $("#deadline").val(),
            work_type: $("#work_type").val(),
            workplace: $("#workplace").val(),
            payment_method: $("#payment_method").val(),
            budget: $("#budget").val(),
            employment_type: $('input[name="employment_type"]:checked').val(),
          };

          // Mã hóa dữ liệu theo định dạng JSON
          var jsonData = JSON.stringify(formData);

          // Gửi yêu cầu API
          $.ajax({
            url: "../../API/apiproject.php",
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            data: jsonData,
            success: function (response) {
              // Xử lý kết quả trả về từ API
              if (response.success) {
                // Hiển thị thông báo thành công
                alert("Đăng tin dự án thành công!");
              } else {
                // Hiển thị thông báo lỗi
                alert(response.error);
              }
            },
          });

        </script>

       
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


    <!--Script upload files-->








<!--Script back top-->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="../../js/back-top.js"></script>




    
        
</html>