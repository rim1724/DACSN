-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 19, 2024 lúc 08:19 AM
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
  `name` varchar(255) NOT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `companies`
--

INSERT INTO `companies` (`company_id`, `name`, `industry`, `location`, `website`) VALUES
(1, 'TechCorp', 'Technology', 'Silicon Valley', 'http://www.techcorp.com'),
(2, 'HealthTech', 'Healthcare', 'New York', 'http://www.healthtech.com');

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
-- Cấu trúc bảng cho bảng `project`
--

CREATE TABLE `project` (
  `id_project` int(255) NOT NULL,
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

INSERT INTO `project` (`id_project`, `service`, `specific_service`, `job_title`, `job_description`, `required_skills`, `deadline`, `work_type`, `workplace`, `payment_method`, `budget`, `employment_type`, `attached_file`) VALUES
(1, '[value-2]', '[value-3]', '[value-4]', '[value-5]', '[value-6]', '0000-00-00', '[value-8]', '[value-9]', '[value-10]', 0, 0, '[value-13]'),
(5, 'web', '1', 'web chơi', 'full code', 'php', '0000-00-00', 'ads', 'sàu gòn', 'tháng', 20, 0, '../uploads/65f9031d7177e.pdf'),
(6, 'check', 'chek', 'check', 'chek', 'check', '0000-00-00', 'check', 'check', 'check', 0, 0, '../uploads/65f9058e6f7d2.docx'),
(7, 'check', 'chek', 'check', 'chek', 'check', '0000-00-00', 'check', 'check', 'check', 0, 0, '../uploads/65f9062516d2c.docx');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `re_password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `re_password`, `email`) VALUES
(20, 'test', '$argon2id$v=19$m=65536,t=4,p=1$L21DUnlQTU9lZm14SHZOVw$ipbXN/YgHTPi0bktkJTctVCAWfzHWXnWxknieYOoyA0', '', 'test@gmail.com'),
(29, 'phuoc', '$argon2id$v=19$m=65536,t=4,p=1$RWxhYjVaMjhDNjdLLkJvTw$VSBzsECaka+mh9Gy7kBELnLxEPAJnQLTF+s9ip/yI7M', '', 'phuoc@gmail.com'),
(30, 'moi', '$argon2id$v=19$m=65536,t=4,p=1$RlhoYmpJNTdzYzYzSFF3Wg$2/A4WHxNkokn1GzT8owV4LTqVJLIIqR+9reI5NJFsGA', '', 'moi@gmail.com');

--
-- Chỉ mục cho các bảng đã đổ
--

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
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Chỉ mục cho bảng `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `candidate`
--
ALTER TABLE `candidate`
  MODIFY `id_candidate` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`),
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`applicant_id`);

--
-- Các ràng buộc cho bảng `candidate`
--
ALTER TABLE `candidate`
  ADD CONSTRAINT `FK_candidate_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
