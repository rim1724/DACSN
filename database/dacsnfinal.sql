-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 29, 2024 at 03:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dacsnfinal`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `achievement` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `password`, `email`) VALUES
(1, 'hoanggiakiet', 'kiet', 'giakiethoang07102004@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `application_id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `applicant_id` int(11) DEFAULT NULL,
  `application_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
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
-- Table structure for table `candidate`
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
-- Dumping data for table `candidate`
--

INSERT INTO `candidate` (`id_candidate`, `img`, `id_identify`, `fullname`, `email`, `phone`, `city`, `address`, `realfullname`, `user_id`, `received_date`, `birthday`) VALUES
(2, '[value-2]', 0, '[value-4]', '[value-5]', 0, '[value-7]', '[value-8]', '[value-9]', 30, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `name`, `industry`, `location`, `website`) VALUES
(1, 'TechCorp', 'Technology', 'Silicon Valley', 'http://www.techcorp.com'),
(2, 'HealthTech', 'Healthcare', 'New York', 'http://www.healthtech.com');

-- --------------------------------------------------------

--
-- Table structure for table `cv`
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
-- Dumping data for table `cv`
--

INSERT INTO `cv` (`cv_id`, `user_id`, `full_name`, `img`, `email`, `phone`, `dob`, `gender`, `city`, `address`, `myseo`, `career_objective`) VALUES
(3, 29, '19 nguyễn hồng phước', NULL, 'connguaho@gmail.com', '+84382578576', '0001-11-11', 'male', 'hcm', '84/5z ấp xuân thới đông 3', '1', '1'),
(4, 29, '19 nguyễn hồng phước', NULL, 'connguaho@gmail.com', '+84382578576', '0001-11-11', 'male', 'hcm', '84/5z ấp xuân thới đông 3', '1', '1'),
(5, 29, '19 nguyễn hồng phước', NULL, 'connguaho@gmail.com', '+84382578576', '0001-11-11', 'male', 'hcm', '84/5z ấp xuân thới đông 3', '1', '1'),
(6, 29, '19 nguyễn hồng phước', NULL, 'connguaho@gmail.com', '+84382578576', '0001-11-11', 'male', 'hcm', '84/5z ấp xuân thới đông 3', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `education`
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
-- Dumping data for table `education`
--

INSERT INTO `education` (`id`, `cv_id`, `school`, `degree`, `start_date`, `end_date`) VALUES
(1, 3, 'h', '', '0000-00-00', '0000-00-00'),
(2, 3, '?', '', '0000-00-00', '0000-00-00'),
(3, 3, '?', '', '0000-00-00', '0000-00-00'),
(4, 3, '?', '', '0000-00-00', '0000-00-00'),
(5, 3, 'c', '', '0000-00-00', '0000-00-00'),
(6, 3, ' ', '', '0000-00-00', '0000-00-00'),
(7, 3, 'v', '', '0000-00-00', '0000-00-00'),
(8, 3, 'i', '', '0000-00-00', '0000-00-00'),
(9, 3, '?', '', '0000-00-00', '0000-00-00'),
(10, 3, '?', '', '0000-00-00', '0000-00-00'),
(11, 3, '?', '', '0000-00-00', '0000-00-00'),
(12, 3, 'n', '', '0000-00-00', '0000-00-00'),
(13, 3, ' ', '', '0000-00-00', '0000-00-00'),
(14, 3, 'h', '', '0000-00-00', '0000-00-00'),
(15, 3, '?', '', '0000-00-00', '0000-00-00'),
(16, 3, '?', '', '0000-00-00', '0000-00-00'),
(17, 3, 'n', '', '0000-00-00', '0000-00-00'),
(18, 3, 'g', '', '0000-00-00', '0000-00-00'),
(19, 3, ' ', '', '0000-00-00', '0000-00-00'),
(20, 3, 'k', '', '0000-00-00', '0000-00-00'),
(21, 3, 'h', '', '0000-00-00', '0000-00-00'),
(22, 3, '?', '', '0000-00-00', '0000-00-00'),
(23, 3, '?', '', '0000-00-00', '0000-00-00'),
(24, 3, 'n', '', '0000-00-00', '0000-00-00'),
(25, 3, 'g', '', '0000-00-00', '0000-00-00'),
(26, 4, 'h', '', '0000-00-00', '0000-00-00'),
(27, 4, '?', '', '0000-00-00', '0000-00-00'),
(28, 4, '?', '', '0000-00-00', '0000-00-00'),
(29, 4, '?', '', '0000-00-00', '0000-00-00'),
(30, 4, 'c', '', '0000-00-00', '0000-00-00'),
(31, 4, ' ', '', '0000-00-00', '0000-00-00'),
(32, 4, 'v', '', '0000-00-00', '0000-00-00'),
(33, 4, 'i', '', '0000-00-00', '0000-00-00'),
(34, 4, '?', '', '0000-00-00', '0000-00-00'),
(35, 4, '?', '', '0000-00-00', '0000-00-00'),
(36, 4, '?', '', '0000-00-00', '0000-00-00'),
(37, 4, 'n', '', '0000-00-00', '0000-00-00'),
(38, 4, ' ', '', '0000-00-00', '0000-00-00'),
(39, 4, 'h', '', '0000-00-00', '0000-00-00'),
(40, 4, '?', '', '0000-00-00', '0000-00-00'),
(41, 4, '?', '', '0000-00-00', '0000-00-00'),
(42, 4, 'n', '', '0000-00-00', '0000-00-00'),
(43, 4, 'g', '', '0000-00-00', '0000-00-00'),
(44, 4, ' ', '', '0000-00-00', '0000-00-00'),
(45, 4, 'k', '', '0000-00-00', '0000-00-00'),
(46, 4, 'h', '', '0000-00-00', '0000-00-00'),
(47, 4, '?', '', '0000-00-00', '0000-00-00'),
(48, 4, '?', '', '0000-00-00', '0000-00-00'),
(49, 4, 'n', '', '0000-00-00', '0000-00-00'),
(50, 4, 'g', '', '0000-00-00', '0000-00-00'),
(51, 5, 'h', '', '0000-00-00', '0000-00-00'),
(52, 5, '?', '', '0000-00-00', '0000-00-00'),
(53, 5, '?', '', '0000-00-00', '0000-00-00'),
(54, 5, '?', '', '0000-00-00', '0000-00-00'),
(55, 5, 'c', '', '0000-00-00', '0000-00-00'),
(56, 5, ' ', '', '0000-00-00', '0000-00-00'),
(57, 5, 'v', '', '0000-00-00', '0000-00-00'),
(58, 5, 'i', '', '0000-00-00', '0000-00-00'),
(59, 5, '?', '', '0000-00-00', '0000-00-00'),
(60, 5, '?', '', '0000-00-00', '0000-00-00'),
(61, 5, '?', '', '0000-00-00', '0000-00-00'),
(62, 5, 'n', '', '0000-00-00', '0000-00-00'),
(63, 5, ' ', '', '0000-00-00', '0000-00-00'),
(64, 5, 'h', '', '0000-00-00', '0000-00-00'),
(65, 5, '?', '', '0000-00-00', '0000-00-00'),
(66, 5, '?', '', '0000-00-00', '0000-00-00'),
(67, 5, 'n', '', '0000-00-00', '0000-00-00'),
(68, 5, 'g', '', '0000-00-00', '0000-00-00'),
(69, 5, ' ', '', '0000-00-00', '0000-00-00'),
(70, 5, 'k', '', '0000-00-00', '0000-00-00'),
(71, 5, 'h', '', '0000-00-00', '0000-00-00'),
(72, 5, '?', '', '0000-00-00', '0000-00-00'),
(73, 5, '?', '', '0000-00-00', '0000-00-00'),
(74, 5, 'n', '', '0000-00-00', '0000-00-00'),
(75, 5, 'g', '', '0000-00-00', '0000-00-00'),
(76, 6, 'h', '', '0000-00-00', '0000-00-00'),
(77, 6, '?', '', '0000-00-00', '0000-00-00'),
(78, 6, '?', '', '0000-00-00', '0000-00-00'),
(79, 6, '?', '', '0000-00-00', '0000-00-00'),
(80, 6, 'c', '', '0000-00-00', '0000-00-00'),
(81, 6, ' ', '', '0000-00-00', '0000-00-00'),
(82, 6, 'v', '', '0000-00-00', '0000-00-00'),
(83, 6, 'i', '', '0000-00-00', '0000-00-00'),
(84, 6, '?', '', '0000-00-00', '0000-00-00'),
(85, 6, '?', '', '0000-00-00', '0000-00-00'),
(86, 6, '?', '', '0000-00-00', '0000-00-00'),
(87, 6, 'n', '', '0000-00-00', '0000-00-00'),
(88, 6, ' ', '', '0000-00-00', '0000-00-00'),
(89, 6, 'h', '', '0000-00-00', '0000-00-00'),
(90, 6, '?', '', '0000-00-00', '0000-00-00'),
(91, 6, '?', '', '0000-00-00', '0000-00-00'),
(92, 6, 'n', '', '0000-00-00', '0000-00-00'),
(93, 6, 'g', '', '0000-00-00', '0000-00-00'),
(94, 6, ' ', '', '0000-00-00', '0000-00-00'),
(95, 6, 'k', '', '0000-00-00', '0000-00-00'),
(96, 6, 'h', '', '0000-00-00', '0000-00-00'),
(97, 6, '?', '', '0000-00-00', '0000-00-00'),
(98, 6, '?', '', '0000-00-00', '0000-00-00'),
(99, 6, 'n', '', '0000-00-00', '0000-00-00'),
(100, 6, 'g', '', '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

CREATE TABLE `hobbies` (
  `id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `hobby` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
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
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `title`, `company_id`, `location`, `description`, `requirements`, `posted_date`) VALUES
(1, 'Software Engineer', 1, 'Silicon Valley', 'Develop cutting-edge software solutions.', 'Bachelor\'s degree in Computer Science.', '2024-01-01'),
(2, 'Data Analyst', 1, 'Silicon Valley', 'Analyze and interpret complex data sets.', 'Bachelor\'s degree in Statistics or related field.', '2024-01-02'),
(3, 'Product Manager', 1, 'Silicon Valley', 'Lead the development of new products.', '5+ years of product management experience.', '2024-01-03'),
(4, 'Nurse Practitioner', 2, 'New York', 'Provide healthcare services to patients.', 'Nurse Practitioner certification.', '2024-01-04');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `language` varchar(255) NOT NULL,
  `proficiency` enum('basic','intermediate','advanced') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `cv_id`, `language`, `proficiency`) VALUES
(1, 3, '1', ''),
(2, 4, '1', ''),
(3, 5, '1', ''),
(4, 6, '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `project`
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
-- Dumping data for table `project`
--

INSERT INTO `project` (`id_project`, `service`, `specific_service`, `job_title`, `job_description`, `required_skills`, `deadline`, `work_type`, `workplace`, `payment_method`, `budget`, `employment_type`, `attached_file`) VALUES
(1, '[value-2]', '[value-3]', '[value-4]', '[value-5]', '[value-6]', '0000-00-00', '[value-8]', '[value-9]', '[value-10]', 0, 0, '[value-13]'),
(5, 'web', '1', 'web chơi', 'full code', 'php', '0000-00-00', 'ads', 'sàu gòn', 'tháng', 20, 0, '../uploads/65f9031d7177e.pdf'),
(6, 'check', 'chek', 'check', 'chek', 'check', '0000-00-00', 'check', 'check', 'check', 0, 0, '../uploads/65f9058e6f7d2.docx'),
(7, 'check', 'chek', 'check', 'chek', 'check', '0000-00-00', 'check', 'check', 'check', 0, 0, '../uploads/65f9062516d2c.docx');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `technical_skills` text NOT NULL,
  `soft_skills` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `cv_id`, `technical_skills`, `soft_skills`) VALUES
(1, 3, '11', '11'),
(2, 4, '11', '11'),
(3, 5, '11', '11'),
(4, 6, '11', '11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `re_password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `re_password`, `email`) VALUES
(20, 'test', '$argon2id$v=19$m=65536,t=4,p=1$L21DUnlQTU9lZm14SHZOVw$ipbXN/YgHTPi0bktkJTctVCAWfzHWXnWxknieYOoyA0', '', 'test@gmail.com'),
(29, 'phuoc', '$argon2id$v=19$m=65536,t=4,p=1$RWxhYjVaMjhDNjdLLkJvTw$VSBzsECaka+mh9Gy7kBELnLxEPAJnQLTF+s9ip/yI7M', '', 'phuoc@gmail.com'),
(30, 'moi', '$argon2id$v=19$m=65536,t=4,p=1$RlhoYmpJNTdzYzYzSFF3Wg$2/A4WHxNkokn1GzT8owV4LTqVJLIIqR+9reI5NJFsGA', '', 'moi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `work_experience`
--

CREATE TABLE `work_experience` (
  `id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `work_experience`
--

INSERT INTO `work_experience` (`id`, `cv_id`, `company`, `position`, `start_date`, `end_date`, `description`) VALUES
(1, 3, 'p', '', '0000-00-00', '0000-00-00', ''),
(2, 3, 'u', '', '0000-00-00', '0000-00-00', ''),
(3, 3, 's', '', '0000-00-00', '0000-00-00', ''),
(4, 3, 'h', '', '0000-00-00', '0000-00-00', ''),
(5, 3, 'e', '', '0000-00-00', '0000-00-00', ''),
(6, 3, 'e', '', '0000-00-00', '0000-00-00', ''),
(7, 3, 'n', '', '0000-00-00', '0000-00-00', ''),
(8, 3, '1', '', '0000-00-00', '0000-00-00', ''),
(9, 3, '2', '', '0000-00-00', '0000-00-00', ''),
(10, 3, '2', '', '0000-00-00', '0000-00-00', ''),
(11, 4, 'p', '', '0000-00-00', '0000-00-00', ''),
(12, 4, 'u', '', '0000-00-00', '0000-00-00', ''),
(13, 4, 's', '', '0000-00-00', '0000-00-00', ''),
(14, 4, 'h', '', '0000-00-00', '0000-00-00', ''),
(15, 4, 'e', '', '0000-00-00', '0000-00-00', ''),
(16, 4, 'e', '', '0000-00-00', '0000-00-00', ''),
(17, 4, 'n', '', '0000-00-00', '0000-00-00', ''),
(18, 4, '1', '', '0000-00-00', '0000-00-00', ''),
(19, 4, '2', '', '0000-00-00', '0000-00-00', ''),
(20, 4, '2', '', '0000-00-00', '0000-00-00', ''),
(21, 5, 'p', '', '0000-00-00', '0000-00-00', ''),
(22, 5, 'u', '', '0000-00-00', '0000-00-00', ''),
(23, 5, 's', '', '0000-00-00', '0000-00-00', ''),
(24, 5, 'h', '', '0000-00-00', '0000-00-00', ''),
(25, 5, 'e', '', '0000-00-00', '0000-00-00', ''),
(26, 5, 'e', '', '0000-00-00', '0000-00-00', ''),
(27, 5, 'n', '', '0000-00-00', '0000-00-00', ''),
(28, 5, '1', '', '0000-00-00', '0000-00-00', ''),
(29, 5, '2', '', '0000-00-00', '0000-00-00', ''),
(30, 5, '2', '', '0000-00-00', '0000-00-00', ''),
(31, 6, 'p', '', '0000-00-00', '0000-00-00', ''),
(32, 6, 'u', '', '0000-00-00', '0000-00-00', ''),
(33, 6, 's', '', '0000-00-00', '0000-00-00', ''),
(34, 6, 'h', '', '0000-00-00', '0000-00-00', ''),
(35, 6, 'e', '', '0000-00-00', '0000-00-00', ''),
(36, 6, 'e', '', '0000-00-00', '0000-00-00', ''),
(37, 6, 'n', '', '0000-00-00', '0000-00-00', ''),
(38, 6, '1', '', '0000-00-00', '0000-00-00', ''),
(39, 6, '2', '', '0000-00-00', '0000-00-00', ''),
(40, 6, '2', '', '0000-00-00', '0000-00-00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cv_id` (`cv_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `applicant_id` (`applicant_id`);

--
-- Indexes for table `candidate`
--
ALTER TABLE `candidate`
  ADD PRIMARY KEY (`id_candidate`),
  ADD KEY `FK_candidate_users` (`user_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`cv_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cv_id` (`cv_id`);

--
-- Indexes for table `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cv_id` (`cv_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cv_id` (`cv_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id_project`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cv_id` (`cv_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `work_experience`
--
ALTER TABLE `work_experience`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cv_id` (`cv_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `candidate`
--
ALTER TABLE `candidate`
  MODIFY `id_candidate` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cv`
--
ALTER TABLE `cv`
  MODIFY `cv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id_project` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `achievements`
--
ALTER TABLE `achievements`
  ADD CONSTRAINT `achievements_ibfk_1` FOREIGN KEY (`id`) REFERENCES `languages` (`id`);

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`);

--
-- Constraints for table `candidate`
--
ALTER TABLE `candidate`
  ADD CONSTRAINT `candidate_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `cv`
--
ALTER TABLE `cv`
  ADD CONSTRAINT `cv_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`cv_id`) REFERENCES `languages` (`cv_id`);

--
-- Constraints for table `hobbies`
--
ALTER TABLE `hobbies`
  ADD CONSTRAINT `hobbies_ibfk_1` FOREIGN KEY (`id`) REFERENCES `education` (`id`),
  ADD CONSTRAINT `hobbies_ibfk_2` FOREIGN KEY (`cv_id`) REFERENCES `education` (`cv_id`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`company_id`);

--
-- Constraints for table `languages`
--
ALTER TABLE `languages`
  ADD CONSTRAINT `languages_ibfk_1` FOREIGN KEY (`id`) REFERENCES `skills` (`id`),
  ADD CONSTRAINT `languages_ibfk_2` FOREIGN KEY (`cv_id`) REFERENCES `skills` (`cv_id`);

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `skills_ibfk_1` FOREIGN KEY (`id`) REFERENCES `work_experience` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
