-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 26, 2024 at 07:41 AM
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
-- Database: `do_an_csn`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admins`
--

CREATE TABLE `Admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Admins`
--

INSERT INTO `Admins` (`admin_id`, `username`, `password`, `email`) VALUES
(1, 'hoanggiakiet', 'kiet', 'giakiethoang07102004@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `Applicants`
--

CREATE TABLE `Applicants` (
  `applicant_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Applicants`
--

INSERT INTO `Applicants` (`applicant_id`, `name`, `email`, `phone`, `resume`) VALUES
(1, 'John Doe', 'john.doe@email.com', '123-456-7890', '/resumes/john_doe_resume.pdf'),
(2, 'Jane Smith', 'jane.smith@email.com', '987-654-3210', '/resumes/jane_smith_resume.pdf'),
(3, 'Michael Johnson', 'michael.johnson@email.com', '111-222-3333', '/resumes/michael_johnson_resume.pdf'),
(4, 'Emily Davis', 'emily.davis@email.com', '444-555-6666', '/resumes/emily_davis_resume.pdf'),
(5, 'Robert Brown', 'robert.brown@email.com', '777-888-9999', '/resumes/robert_brown_resume.pdf'),
(6, 'Sophia Miller', 'sophia.miller@email.com', '222-333-4444', '/resumes/sophia_miller_resume.pdf'),
(7, 'William Wilson', 'william.wilson@email.com', '555-666-7777', '/resumes/william_wilson_resume.pdf'),
(8, 'Emma Anderson', 'emma.anderson@email.com', '888-999-0000', '/resumes/emma_anderson_resume.pdf'),
(9, 'Daniel Martinez', 'daniel.martinez@email.com', '333-444-5555', '/resumes/daniel_martinez_resume.pdf'),
(10, 'Olivia Taylor', 'olivia.taylor@email.com', '999-000-1111', '/resumes/olivia_taylor_resume.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `Applications`
--

CREATE TABLE `Applications` (
  `application_id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT NULL,
  `applicant_id` int(11) DEFAULT NULL,
  `application_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Applications`
--

INSERT INTO `Applications` (`application_id`, `job_id`, `applicant_id`, `application_date`) VALUES
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
-- Table structure for table `Companies`
--

CREATE TABLE `Companies` (
  `company_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Companies`
--

INSERT INTO `Companies` (`company_id`, `name`, `industry`, `location`, `website`) VALUES
(1, 'TechCorp', 'Technology', 'Silicon Valley', 'http://www.techcorp.com'),
(2, 'HealthTech', 'Healthcare', 'New York', 'http://www.healthtech.com');

-- --------------------------------------------------------

--
-- Table structure for table `Jobs`
--

CREATE TABLE `Jobs` (
  `job_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `requirements` text DEFAULT NULL,
  `posted_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Jobs`
--

INSERT INTO `Jobs` (`job_id`, `title`, `company_id`, `location`, `description`, `requirements`, `posted_date`) VALUES
(1, 'Software Engineer', 1, 'Silicon Valley', 'Develop cutting-edge software solutions.', 'Bachelor\'s degree in Computer Science.', '2024-01-01'),
(2, 'Data Analyst', 1, 'Silicon Valley', 'Analyze and interpret complex data sets.', 'Bachelor\'s degree in Statistics or related field.', '2024-01-02'),
(3, 'Product Manager', 1, 'Silicon Valley', 'Lead the development of new products.', '5+ years of product management experience.', '2024-01-03'),
(4, 'Nurse Practitioner', 2, 'New York', 'Provide healthcare services to patients.', 'Nurse Practitioner certification.', '2024-01-04');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`user_id`, `username`, `password`, `email`) VALUES
(1, 'phuoc', 'phuoc123', 'phuoc123@gmail.com'),
(2, 'day', 'day123', 'day123@gmail.com'),
(3, 'kiet', 'kiet123', 'kiet123gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admins`
--
ALTER TABLE `Admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `Applicants`
--
ALTER TABLE `Applicants`
  ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `Applications`
--
ALTER TABLE `Applications`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `applicant_id` (`applicant_id`);

--
-- Indexes for table `Companies`
--
ALTER TABLE `Companies`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `Jobs`
--
ALTER TABLE `Jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Applications`
--
ALTER TABLE `Applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `Jobs` (`job_id`),
  ADD CONSTRAINT `applications_ibfk_2` FOREIGN KEY (`applicant_id`) REFERENCES `Applicants` (`applicant_id`);

--
-- Constraints for table `Jobs`
--
ALTER TABLE `Jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `Companies` (`company_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
