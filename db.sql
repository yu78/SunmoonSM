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
SET time_zone = "+00:00";


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
(1, 'admin', '4월 23일', '4월 23일', '2018-05-02', 69, NULL),
(2, 'admin', '게시판 댓글 카운트', '게시판 댓글 카운트', '2018-05-02', 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `idx` int(11) NOT NULL,
  `id` varchar(100) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `student_idx` int(10) NOT NULL,
  `college_name` varchar(45) NOT NULL,
  `major_name` varchar(45) NOT NULL,
  `m_level` tinyint(1) NOT NULL default '0',
  `m_date` datetime NOT NULL default CURRENT_TIMESTAMP,
  `m_updated_date` datetime NOT NULL default CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`idx`, `id`, `pw`, `name`, `email`, `student_idx`, `college_name`, `major_name`, `m_date`, `m_level`) VALUES
(1, 'admin', '$2y$10$DTx4VUTjqKQgMBPLotpUKex9VhXSdK0O70BeFMqighRfih2w52IjW', '관리자', 'admin@sunmoon.ac.kr', 1234567899,'관리자', '관리자', '2018-05-04', 5),
(2, '1234', '$2y$10$XWOIe/NMV3/9JyXFLSXhvupq4FWTKyxzlG7yDJh.yeXVqHyh5dfZi', '1234', '1234@sunmoon.ac.kr', 1234567898, '공과대학', '컴퓨터공학부', '2018-05-14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `free_reply`
--

CREATE TABLE `free_reply` (
  `idx` int(11) NOT NULL,
  `con_num` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `free_reply`
--

INSERT INTO `free_reply` (`idx`, `con_num`, `name`, `content`, `date`) VALUES
(1, 1, 'admin', '댓글!', '2018-05-02 01:04:23'),
(2, 1, 'admin', '카운트!', '2018-05-02 01:04:26'),
(3, 2, 'admin', '5월 2일', '2018-05-02 01:04:01');

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
(1, '원해요', 'admin', '강의교환', 'test', '2018-05-02', 69),
(2, '드려요', 'admin', '게시판테스트', 'test', '2018-05-02', 10),
(3, '교환해요', 'admin', '게시판테스트', 'test', '2018-05-02', 10);

-- --------------------------------------------------------

--
-- Table structure for table `trade_reply`
--

CREATE TABLE `trade_reply` (
  `idx` int(11) NOT NULL,
  `con_num` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trade_reply`
--

INSERT INTO `trade_reply` (`idx`, `con_num`, `name`, `content`, `date`) VALUES
(1, 1, 'admin', '댓글!', '2018-05-02 01:04:23'),
(2, 1, 'admin', '카운트!', '2018-05-02 01:04:26'),
(3, 2, 'admin', '5월 2일', '2018-05-02 01:04:01');

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
(1, 'admin', '종합프로젝트', '김봉재', 2018, '1학기', '전공', '최고에요', '갓봉짱짱맨', 'A', 'A', 'A', 'A');

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


--
-- AUTO_INCREMENT for table `trade_reply`
--
ALTER TABLE `trade_reply`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;
COMMIT;


-- AUTO_INCREMENT for table `trade_board`
--
ALTER TABLE `evaluation`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
