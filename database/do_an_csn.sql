-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 02, 2024 lúc 01:04 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dacsn-n12`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `achievements`
--

CREATE TABLE `achievements` (
  `id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `achievement` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `achievements`
--

INSERT INTO `achievements` (`id`, `cv_id`, `achievement`) VALUES
(1, 27, 'd co');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `password`, `email`) VALUES
(1, 'hoanggiakiet', 'kiet', 'giakiethoang07102004@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `applications`
--

CREATE TABLE `applications` (
  `application_id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `applicant_id` int(11) DEFAULT NULL,
  `application_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `applications`
--

INSERT INTO `applications` (`application_id`, `job_id`, `applicant_id`, `application_date`) VALUES
(1, 1, 1, '2024-01-02'),
(2, 2, 2, '2024-01-03'),
(3, 3, 3, '2024-01-04'),
(4, 4, 4, '2024-01-05'),
(5, 1, 5, '2024-01-06'),
(6, 2, 6, '2024-01-07'),
(7, 3, 7, '2024-01-08'),
(8, 4, 8, '2024-01-09'),
(9, 1, 9, '2024-01-10'),
(10, 2, 10, '2024-01-11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `candidate`
--

CREATE TABLE `candidate` (
  `id_candidate` int(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `id_identify` int(20) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `realfullname` varchar(100) NOT NULL,
  `user_id` int(255) NOT NULL,
  `received_date` date NOT NULL,
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `candidate`
--

INSERT INTO `candidate` (`id_candidate`, `img`, `id_identify`, `fullname`, `email`, `phone`, `city`, `address`, `realfullname`, `user_id`, `received_date`, `birthday`) VALUES
(2, '[value-2]', 0, '[value-4]', '[value-5]', 0, '[value-7]', '[value-8]', '[value-9]', 30, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `companies`
--

CREATE TABLE `companies` (
  `company_id` int(11) NOT NULL,
  `name_company` varchar(255) NOT NULL,
  `company_industry` varchar(255) DEFAULT NULL,
  `address_company` varchar(255) DEFAULT NULL,
  `phone_company` varchar(255) NOT NULL,
  `nation_company` varchar(255) NOT NULL,
  `img_company` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `companies`
--

INSERT INTO `companies` (`company_id`, `name_company`, `company_industry`, `address_company`, `phone_company`, `nation_company`, `img_company`) VALUES
(1, 'TechCorp', 'Technology', 'Silicon Valley', '0', '0', ''),
(2, 'HealthTech', 'Healthcare', 'New York', '0', '0', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cv`
--

CREATE TABLE `cv` (
  `cv_id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `myseo` text NOT NULL,
  `career_objective` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cv`
--

INSERT INTO `cv` (`cv_id`, `user_id`, `full_name`, `img`, `email`, `phone`, `dob`, `gender`, `city`, `address`, `myseo`, `career_objective`) VALUES
(27, 29, 'viet hung', 'C:\\xampp\\htdocs\\dacsn-n12\\API/../uploads/660be55618ee2.jpg', 'rim1724@gmail.com', '0690012346', '2004-06-03', 'male', 'hue', 'hue', 'alo', 'alo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `education`
--

CREATE TABLE `education` (
  `id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `school` varchar(255) NOT NULL,
  `degree` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `education`
--

INSERT INTO `education` (`id`, `cv_id`, `school`, `degree`, `start_date`, `end_date`) VALUES
(101, 27, 'thpt abc', 'thạc sĩ', '1212-04-21', '2555-03-06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hobbies`
--

CREATE TABLE `hobbies` (
  `id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `hobby` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hobbies`
--

INSERT INTO `hobbies` (`id`, `cv_id`, `hobby`) VALUES
(0, 27, 'game');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `requirements` text DEFAULT NULL,
  `posted_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `jobs`
--

INSERT INTO `jobs` (`job_id`, `title`, `company_id`, `location`, `description`, `requirements`, `posted_date`) VALUES
(1, 'Software Engineer', 1, 'Silicon Valley', 'Develop cutting-edge software solutions.', 'Bachelor\'s degree in Computer Science.', '2024-01-01'),
(2, 'Data Analyst', 1, 'Silicon Valley', 'Analyze and interpret complex data sets.', 'Bachelor\'s degree in Statistics or related field.', '2024-01-02'),
(3, 'Product Manager', 1, 'Silicon Valley', 'Lead the development of new products.', '5+ years of product management experience.', '2024-01-03'),
(4, 'Nurse Practitioner', 2, 'New York', 'Provide healthcare services to patients.', 'Nurse Practitioner certification.', '2024-01-04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `language` varchar(255) NOT NULL,
  `proficiency` enum('basic','intermediate','advanced') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `languages`
--

INSERT INTO `languages` (`id`, `cv_id`, `language`, `proficiency`) VALUES
(0, 27, 'tieng trung cua', 'advanced');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `project`
--

CREATE TABLE `project` (
  `id_project` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `service` varchar(50) NOT NULL,
  `specific_service` varchar(1000) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `job_description` varchar(1000) NOT NULL,
  `required_skills` varchar(1000) NOT NULL,
  `deadline` date NOT NULL,
  `work_type` varchar(100) NOT NULL,
  `workplace` varchar(150) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `budget` float NOT NULL,
  `employment_type` tinyint(1) NOT NULL,
  `attached_file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `project`
--

INSERT INTO `project` (`id_project`, `user_id`, `service`, `specific_service`, `job_title`, `job_description`, `required_skills`, `deadline`, `work_type`, `workplace`, `payment_method`, `budget`, `employment_type`, `attached_file`) VALUES
(29, 35, 'IT', 'Phát triển và bảo trì các ứng dụng phần mềm, tham gia vào quá trình thiết kế và triển khai hệ thống.', 'Nhà Phát triển Phần mềm', 'Đánh giá hệ thống phần mềm mới ra mắt và hiện có, cải thiện chất lượng cho hệ thống máy tính hiện có, xác định và sửa chữa các lỗi và lỗ hổng xuất hiện để bảo trì cho hệ thống hiện có, viết mã cho phần mềm và tạo bản cập nhật mới, viết bản hướng dẫn về cách vận hành và thông số kỹ thuật của hệ thống, tham vấn với người quản lý dự án hoặc khách hàng về tiến độ phát triển phần mềm để cùng xem xét các đề xuất, cải tiến hoặc yêu cầu có thể được đưa ra, gửi báo cáo về tiến độ của dự án', ',Có khả năng làm việc với máy tính hiệu quả, hiểu rõ và sử dụng thành thạo một số ngôn ngữ lập trình khác nhau, kỹ năng giải quyết vấn đề, kỹ năng xã hội, khả năng định hướng chi tiết, kỹ năng giao tiếp, kỹ năng phân tích.', '0000-00-00', 'Full-Time', 'Hồ Chí Minh', 'Theo tháng', 45, 0, '../uploads/660bd6ec6878f.png'),
(30, 35, 'IT', 'Đảm bảo an ninh và bảo mật thông tin hệ thống, phát hiện và ngăn chặn các cuộc tấn công mạng.', 'Chuyên viên An toàn Thông tin', 'Cài đặt, cấu hình và quản trị các thiết bị bảo mật (Firewall, WAF, IPS, DLP, v.v) theo chính sách nhằm đảm bảo an toàn cho hạ tầng CNTT, phối hợp quản trị hệ thống phòng chống mã độc, hỗ trợ giải quyết các vấn đề liên quan đến mã độc trên máy chủ, máy trạm, dò quét điểm yếu kỹ thuật; kiểm thử an ninh mạng, hệ thống máy chủ và tìm kiếm phương án khắc cụ các điểm yếu, tham gia xây dựng, và hỗ trợ triển khai các chính sách, quy trình, tiêu chuẩn kỹ thuật liên quan đến an toàn thông tin, giám sát, quản trị vận hành và khắc phục các vấn đề về an toàn thông tin.', 'Có khả năng giao tiếp tốt bằng tiếng Anh, có kỹ năng làm việc nhóm, thuyết trình.', '0000-00-00', 'Full-Time', 'Hà Nội', 'Theo tháng', 35, 0, '../uploads/660bd80173412.png'),
(31, 29, 'IT', 'Phát triển phần mềm nhúng cho các thiết bị điện tử, thiết kế và triển khai các hệ thống nhúng.', 'Kỹ sư Phần mềm Nhúng', 'Viết code, test code, viết các document, v.vv.. cho sản phẩm, thực hiện test board mạch và thiết kế PCB', 'Thành thạo các loại ngôn ngữ lập trình, quan trọng là ngôn ngữ C, đây được xem là ngôn ngữ hàng đầu của ngành lập trình nhúng, có kiến thức về cấu trúc dữ liệu, giải thuật, hệ điều hành linux, có kiến thức về điều khiển, vi xử lý, Timer, logic, Adc, v.vv..', '0000-00-00', 'Part-Time', 'Đà Nẵng', 'Theo job', 10, 0, '../uploads/660bda30b8cde.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `technical_skills` text NOT NULL,
  `soft_skills` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `skills`
--

INSERT INTO `skills` (`id`, `cv_id`, `technical_skills`, `soft_skills`) VALUES
(0, 27, 'dfsfsdg', 'fgythryj');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `re_password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `re_password`, `email`, `role`) VALUES
(20, 'test', '$argon2id$v=19$m=65536,t=4,p=1$L21DUnlQTU9lZm14SHZOVw$ipbXN/YgHTPi0bktkJTctVCAWfzHWXnWxknieYOoyA0', '', 'test@gmail.com', 0),
(29, 'phuoc', '$argon2id$v=19$m=65536,t=4,p=1$RWxhYjVaMjhDNjdLLkJvTw$VSBzsECaka+mh9Gy7kBELnLxEPAJnQLTF+s9ip/yI7M', '', 'phuoc@gmail.com', 0),
(30, 'moi', '$argon2id$v=19$m=65536,t=4,p=1$RlhoYmpJNTdzYzYzSFF3Wg$2/A4WHxNkokn1GzT8owV4LTqVJLIIqR+9reI5NJFsGA', '', 'moi@gmail.com', 0),
(31, 'hung', '$argon2id$v=19$m=65536,t=4,p=1$Y01PSUNHcnNnZHRkemNadg$0KZsbh7IesJ5yOu+fLU7I4BKvB1KlnpHzwRvcOjwdaA', '', 'hung@gmail.com', 0),
(32, 'catlo', '$argon2id$v=19$m=65536,t=4,p=1$NkVoTDJ1WlFCdlEza09ydg$w6iG6mIYEpILEIwhTLBlEU2sHHIGDth0X17RCLDqePQ', '', 'catlo@gmail.com', 1),
(33, 'rim', '$argon2id$v=19$m=65536,t=4,p=1$ajNZZEVreFNSTWVYZWp3cg$Nz+kgjgVCvzq44Iss7bFAHFU130wguZsjvCgVWrGxQ8', '', 'rim@gmail.com', 0),
(34, 'hungrim', '$argon2id$v=19$m=65536,t=4,p=1$cUprSGVUZndWRUhSUWZrSQ$yg0NuLqHiXkBSJT5NLeFyACr1Bo0ga71Qw8RbYAcGeI', '', 'hungrim@gmail.com', 1),
(35, 'phuoccat', '$argon2id$v=19$m=65536,t=4,p=1$YVUyNFlIbWNBcG44OG1OWQ$/uDo/WlycVHqPOJzfQve4tvlLax/9WCMLWJXNF1XX44', '', 'phuoccat@gmail.com', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_apply`
--

CREATE TABLE `user_apply` (
  `user_id` int(2) NOT NULL,
  `id_project` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_apply`
--

INSERT INTO `user_apply` (`user_id`, `id_project`) VALUES
(29, 29);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `work_experience`
--

CREATE TABLE `work_experience` (
  `id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `company` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci NOT NULL,
  `position` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `work_experience`
--

INSERT INTO `work_experience` (`id`, `cv_id`, `company`, `position`, `start_date`, `end_date`, `description`) VALUES
(0, 27, 'cnms', 'ádsadsa', '2023-04-12', '2030-02-13', 'hung');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cv_id` (`cv_id`);

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `applicant_id` (`applicant_id`);

--
-- Chỉ mục cho bảng `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id_candidate`),
  ADD KEY `FK_candidate_users` (`user_id`);

--
-- Chỉ mục cho bảng `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`);

--
-- Chỉ mục cho bảng `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`cv_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cv_id` (`cv_id`);

--
-- Chỉ mục cho bảng `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cv_id` (`cv_id`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Chỉ mục cho bảng `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cv_id` (`cv_id`);

--
-- Chỉ mục cho bảng `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`),
  ADD KEY `fk_project_users` (`user_id`);

--
-- Chỉ mục cho bảng `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cv_id` (`cv_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Chỉ mục cho bảng `user_apply`
--
ALTER TABLE `user_apply`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_user_apply_project` (`id_project`);

--
-- Chỉ mục cho bảng `work_experience`
--
ALTER TABLE `work_experience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cv_id` (`cv_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `candidate`
--
ALTER TABLE `candidate`
  MODIFY `id_candidate` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `cv`
--
ALTER TABLE `cv`
  MODIFY `cv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT cho bảng `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `user_apply`
--
ALTER TABLE `user_apply`
  MODIFY `user_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `achievements`
--
ALTER TABLE `achievements`
  ADD CONSTRAINT `achievements_ibfk_1` FOREIGN KEY (`cv_id`) REFERENCES `cv` (`cv_id`);

--
-- Các ràng buộc cho bảng `cv`
--
ALTER TABLE `cv`
  ADD CONSTRAINT `fk_cv_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `fk_education_cv` FOREIGN KEY (`cv_id`) REFERENCES `cv` (`cv_id`);

--
-- Các ràng buộc cho bảng `hobbies`
--
ALTER TABLE `hobbies`
  ADD CONSTRAINT `hobbies_ibfk_2` FOREIGN KEY (`cv_id`) REFERENCES `cv` (`cv_id`);

--
-- Các ràng buộc cho bảng `languages`
--
ALTER TABLE `languages`
  ADD CONSTRAINT `languages_ibfk_1` FOREIGN KEY (`cv_id`) REFERENCES `cv` (`cv_id`);

--
-- Các ràng buộc cho bảng `project`
--
ALTER TABLE `project`
  ADD CONSTRAINT `fk_project_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_2` FOREIGN KEY (`cv_id`) REFERENCES `cv` (`cv_id`);

--
-- Các ràng buộc cho bảng `user_apply`
--
ALTER TABLE `user_apply`
  ADD CONSTRAINT `fk_user_apply_project` FOREIGN KEY (`id_project`) REFERENCES `project` (`id_project`),
  ADD CONSTRAINT `fk_user_apply_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `work_experience`
--
ALTER TABLE `work_experience`
  ADD CONSTRAINT `work_experience_ibfk_1` FOREIGN KEY (`cv_id`) REFERENCES `cv` (`cv_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
