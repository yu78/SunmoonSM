-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 23, 2018 at 02:59 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `producesm`
--
CREATE DATABASE IF NOT EXISTS `producesm` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `producesm`;

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `free_board` (
  `idx` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `hit` int(11) NOT NULL,
  `file` varchar(100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `board`
--

INSERT INTO `free_board` (`idx`, `name`, `title`, `content`, `date`, `hit`, `file`) VALUES
(1, 'admin', '공지사항', '공지사항입니다.', '2018-06-10', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `idx` int(11) NOT NULL,
  `id` varchar(100) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `student_idx` int(10) NOT NULL,
  `college_name` varchar(45) NOT NULL,
  `major_name` varchar(45) NOT NULL,
  `state` varchar(1) NOT NULL DEFAULT '0',
  `hashkey` varchar(100) NULL,
  `m_level` tinyint(1) NOT NULL default '0',
  `m_date` datetime NOT NULL default CURRENT_TIMESTAMP,
  `m_updated_date` datetime NOT NULL default CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`idx`, `id`, `pw`, `email`, `student_idx`, `college_name`, `major_name`, `state`, `m_date`, `m_level`) VALUES
(1, 'admin', '$2y$10$DTx4VUTjqKQgMBPLotpUKex9VhXSdK0O70BeFMqighRfih2w52IjW', 'admin@sunmoon.ac.kr', 1234567899,'관리자', '관리자', '1', '2018-05-04', 5),
(2, '1234', '$2y$10$XWOIe/NMV3/9JyXFLSXhvupq4FWTKyxzlG7yDJh.yeXVqHyh5dfZi', '1234@sunmoon.ac.kr', 1234567898, '공과대학', '컴퓨터공학부', '1', '2018-05-14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `free_reply`
--

CREATE TABLE `free_reply` (
  `idx` int(11) NOT NULL,
  `con_num` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------


--
-- Table structure for table `trade_board`
--

CREATE TABLE `trade_board` (
  `idx` int(11) NOT NULL,
  `trade_header` varchar(45) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `hit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trade_board`
--

INSERT INTO `trade_board` (`idx`, `trade_header`, `name`, `title`, `content`, `date`, `hit`) VALUES
(1, '원해요', 'admin', '공지사항', '공지사항입니다.', '2018-06-10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `trade_reply`
--

CREATE TABLE `trade_reply` (
  `idx` int(11) NOT NULL,
  `con_num` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `evaluation`
--

CREATE TABLE `evaluation` (
  `idx` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lectureName` varchar(50) NOT NULL,
  `professorName` varchar(50) NOT NULL,
  `lectureYear` int(11) NOT NULL,
  `semesterDivide` varchar(20) NOT NULL,
  `lectureDivide` varchar(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `content` varchar(2048) NOT NULL,
  `totalScore` varchar(10) NOT NULL,
  `creditScore` varchar(10) NOT NULL,
  `comfortableScore` varchar(10) NOT NULL,
  `lectureScore` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `evaluation`
--

INSERT INTO `evaluation` (`idx`, `name`, `lectureName`, `professorName`, `lectureYear`, `semesterDivide`, `lectureDivide`, `title`, `content`, `totalScore`, `creditScore`, `comfortableScore`, `lectureScore`) VALUES
(1, 'admin', '종합프로젝트', '김봉재', 2018, '1학기', '전공', '최고예요', '갓봉짱짱맨', 'A+', 'A+', 'A+', 'A+');

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `idx` int(11) NOT NULL,
  `college_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`idx`, `college_name`) VALUES
(1, '인문사회대학'),
(2, '글로벌비즈니스대학'),
(3, '신학순결대학'),
(4, '건강보건대학'),
(5, '공과대학');
-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE `major` (
  `idx` int(11) NOT NULL,
  `college_name` varchar(50) NOT NULL,
  `major_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`idx`, `college_name`, `major_name`) VALUES
(1, '인문사회대학', '국어국문학과'),
(2, '인문사회대학', '상담심리사회복지학과'),
(3, '인문사회대학', '역사문화콘텍츠학과'),
(4, '인문사회대학', '미디어커뮤니케이션학과'),
(5, '인문사회대학', '법.경찰학과'),
(6, '인문사회대학', '글로벌한국학과'),
(7, '인문사회대학', '시각디자인학과'),

(8, '글로벌비즈니스대학', '외국어자율전공학부'),
(9, '글로벌비즈니스대학', '글로벌경영학과'),
(10, '글로벌비즈니스대학', 'IT경영학과'),
(11, '글로벌비즈니스대학', '국제경제통상학과'),
(12, '글로벌비즈니스대학', '국제레저관광학과'),
(13, '글로벌비즈니스대학', '국제관계.행정학부'),
(14, '글로벌비즈니스대학', '글로벌행정학과(주)'),
(15, '글로벌비즈니스대학', '글로벌행정학과(야)'),
(16, '글로벌비즈니스대학', '영어학과'),
(17, '글로벌비즈니스대학', '러시아어학과'),
(18, '글로벌비즈니스대학', '일어일본학과'),
(19, '글로벌비즈니스대학', '중어중국학과'),
(20, '글로벌비즈니스대학', '스페인어중남미학과'),

(21, '신학순결대학', '신학순결학과'),

(22, '건강보건대학', '제약생명공학과'),
(23, '건강보건대학', '식품과학.수산생명의학부'),
(24, '건강보건대학', '간호학과'),
(25, '건강보건대학', '물리치료학과'),
(26, '건강보건대학', '치위생학과'),
(27, '건강보건대학', '응급구조학과'),
(28, '건강보건대학', '스포츠과학부'),

(29, '공과대학', '건축사회환경공학부'),
(30, '공과대학', '기계ICT융합공학부'),
(31, '공과대학', '스마트자동차공학부'),
(32, '공과대학', '전자공학과'),
(33, '공과대학', '컴퓨터공학부'),
(34, '공과대학', '글로벌소프트웨어학과'),
(35, '공과대학', '신소재공학과'),
(36, '공과대학', '환경생명화학공학과'),
(37, '공과대학', '산업경영공학과'),
(38, '공과대학', '3D창의융합학과');

-- --------------------------------------------------------

--
-- Indexes for dumped tables
--

--
-- Indexes for table `free_board`
--
ALTER TABLE `free_board`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `free_reply`
--
ALTER TABLE `free_reply`
  ADD PRIMARY KEY (`idx`);


-- Indexes for table `trade_board`
--
ALTER TABLE `trade_board`
  ADD PRIMARY KEY (`idx`);

--
-- Indexes for table `trade_reply`
--
ALTER TABLE `trade_reply`
  ADD PRIMARY KEY (`idx`);


-- Indexes for table `evaluation`
--
ALTER TABLE `evaluation`
  ADD PRIMARY KEY (`idx`);


--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`idx`);


-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`idx`);
-- ALTER TABLE `major`
--   ADD FOREIGN KEY (`college_name`) REFERENCES college (`idx`) on delete cascade;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `free_board`
--
ALTER TABLE `free_board`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT for table `free_reply`
--
ALTER TABLE `free_reply`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
COMMIT;


-- AUTO_INCREMENT for table `trade_board`
--
ALTER TABLE `trade_board`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;


-- AUTO_INCREMENT for table `trade_reply`
--
ALTER TABLE `trade_reply`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
COMMIT;


-- AUTO_INCREMENT for table `trade_board`
--
ALTER TABLE `evaluation`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
