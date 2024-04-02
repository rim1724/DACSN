<?php
session_start();
session_status();
require_once('../../config/config.php');
function getPersonalInfo($field) {
  global $conn; // Assuming $conn is established elsewhere

  $user_id = $_SESSION['user_id'];
	// $cv_id = $_SESSION['cv_id'];

  $sql = "SELECT $field FROM cv WHERE user_id = $user_id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); 
    return $row[$field];
  } else {
    return "Information not found"; // Handle case where information is missing
  }
}
$career_objective = getPersonalInfo('career_objective');
 ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="../../assets/css/view-cv.css" />
		<title>My Profile</title>
	</head>
	<body>
		<header>
			<div class="img-container">
				<img src="../../assets/img/logo-web.png" alt="" class="img avatar" />
			</div>
			<div class="title-container">
				<h1>JOB FINDING</h1>
				<h2>Hồ sơ thông tin cá nhân</h2>
			</div>
		</header>

		<div class="container">
			<div class="sider">
				<div class="sider-content">
				<h1 class="tag-fill">Thông tin cá nhân</h1>
					<div class="tag-content">
						<ul>
							<li>Họ và tên: <?php echo getPersonalInfo('full_name'); ?></li>
							<li>Giới tính: <?php echo getPersonalInfo('gender'); ?></li>
							<li>Ngày sinh: <?php echo getPersonalInfo('dob'); ?></li>
							<li>Email: <?php echo getPersonalInfo('email'); ?></li>
							<li>Số điện thoại: <?php echo getPersonalInfo('phone'); ?></li>
							</ul>
					</div>

				</div>
				<div class="sider-content">
					<h1 class="tag-fill">Kĩ năng</h1>
					<div class="tag-content progress-container">
						<p class="progress-title">Ngoại ngữ</p>
						<ul>
							<li><?php include('../../php/languages.php') ?></li>
							</ul>
				
					</div>
					<div class="tag-content progress-container">
						<p class="progress-title">Chuyên môn</p>
						<ul>
							<li><?php include('../../php/skills.php') ?></li>
							</ul>
					</div>
					<div class="tag-content progress-container">
						<p class="progress-title">Làm việc nhóm</p>
						<ul>
							<li><?php include('../../php/soft_skills.php') ?></li>
							</ul>
					</div>
					<div class="tag-content progress-container">
						<p class="progress-title">Thuyết trình</p>
						<div class="progress-wrap">
							<div class="progress" style="width: 30%"></div>
						</div>
					</div>
				</div>
				<div class="sider-content">
					<h1 class="tag-fill">Bằng cấp và thành tích</h1>
					<div class="tag-content">
						<p>
							Bằng cấp hiện có:
						</p>
						<ul class="text-content">
							<li>Bằng đại học</li>
							<li>Bằng tiếng anh</li>
						</ul>
                        <p>
							Thành tích tiêu biếu:
						</p>
						<ul class="text-content">
							<li>Đạt sinh viên 5 tốt</li>
							<li>Đạt giải nghiên cứu khoa học trẻ</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="content">
				<div>
					<h1 class="tag">Giới thiệu về bản thân </h1>
                    <div class="textandimg">
                        <img src="../../assets/img/user.jpg" alt="">
                        <p class="text-content">
						Giới thiệu sơ qua về bản thân
					</p>
                    
                </div>
					
				</div>
				<div class="description-content">
					<h1 class="tag">Mục tiêu nghề nghiệp</h1>
					<ul>
					<p>Mục tiêu nghề nghiệp: <?php echo $career_objective; ?></p>
					</ul>
				</div>
				<div class="description-content">
					<h1 class="tag">Kinh nghiệm làm việc</h1>
					<ul>
						<li>
							<div class="tabbar-title">
								<p class="text-content">Thời gian làm việc</p>
								<p class="text-date">01/2024 - 02/2024</p>
							</div>
							<h3>Các dự án:</h3>
							<p class="text-content">
								Các dự án đã thực hiện
							</p>
							<ul>
								<li>
									đồ án 1
								</li>
								<li>
									đồ án 2
								</li>
								<li>
									đồ án ra trường
								</li>
								<li>
									Dự án 1
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</body>
</html>