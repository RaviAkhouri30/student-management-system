-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2021 at 06:48 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stud_mang`
--

-- --------------------------------------------------------

--
-- Table structure for table `city_dt`
--

CREATE TABLE `city_dt` (
  `city_id` int(10) NOT NULL,
  `city_name` varchar(100) DEFAULT NULL,
  `del_flg` varchar(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city_dt`
--

INSERT INTO `city_dt` (`city_id`, `city_name`, `del_flg`) VALUES
(0, 'Bangalore', '1'),
(0, 'Bangalore', '1'),
(0, 'Bangalore', '0');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `sl_no` bigint(20) UNSIGNED NOT NULL,
  `stu_id` int(11) NOT NULL,
  `semistar` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `theory` tinyint(4) DEFAULT NULL,
  `practical` tinyint(4) DEFAULT NULL,
  `del_flg` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mst_student`
--

CREATE TABLE `mst_student` (
  `stu_id` int(11) UNSIGNED NOT NULL,
  `stu_name` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `roll_no` int(11) DEFAULT NULL,
  `reg_no` int(11) DEFAULT NULL,
  `reg_date` date DEFAULT NULL,
  `trade_id` tinyint(4) DEFAULT '0',
  `del_flg` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mst_subject`
--

CREATE TABLE `mst_subject` (
  `subject_id` int(11) UNSIGNED NOT NULL,
  `trade_id` int(11) NOT NULL,
  `subject_name` varchar(50) DEFAULT NULL,
  `semistar` int(11) NOT NULL,
  `theory` tinyint(1) DEFAULT NULL,
  `practical` tinyint(1) DEFAULT NULL,
  `del_flg` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mst_trade`
--

CREATE TABLE `mst_trade` (
  `trade_id` int(11) UNSIGNED NOT NULL,
  `trade_name` varchar(50) DEFAULT NULL,
  `del_flg` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reg_db`
--

CREATE TABLE `reg_db` (
  `roll` int(12) NOT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `father` varchar(30) DEFAULT NULL,
  `mother` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `mob` varchar(30) DEFAULT NULL,
  `marks_10` varchar(30) DEFAULT NULL,
  `marks_12` varchar(30) DEFAULT NULL,
  `stream_id` varchar(30) DEFAULT NULL,
  `addrs` varchar(300) DEFAULT NULL,
  `city_id` varchar(30) DEFAULT NULL,
  `state_id` varchar(30) DEFAULT NULL,
  `pin_code` varchar(30) DEFAULT NULL,
  `del_flg` varchar(30) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `state_dt`
--

CREATE TABLE `state_dt` (
  `state_id` int(10) NOT NULL,
  `state_name` varchar(100) DEFAULT NULL,
  `del_flg` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stream_tbl`
--

CREATE TABLE `stream_tbl` (
  `stream_id` int(10) NOT NULL,
  `stream_name` varchar(100) DEFAULT NULL,
  `del_flg` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stream_tbl`
--

INSERT INTO `stream_tbl` (`stream_id`, `stream_name`, `del_flg`) VALUES
(1, 'E.C.E', 0),
(2, 'C.S.E', 0),
(3, 'E.E.E', 0),
(4, 'M.E', 0),
(5, 'C.E', 1),
(6, 'Civil', 0);

-- --------------------------------------------------------

--
-- Table structure for table `the_college`
--

CREATE TABLE `the_college` (
  `college_name` varchar(50) DEFAULT NULL,
  `college_phone` varchar(20) DEFAULT NULL,
  `college_email` varchar(50) DEFAULT NULL,
  `college_address` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_dt`
--

CREATE TABLE `user_dt` (
  `uid` int(10) NOT NULL,
  `user_id` varchar(30) DEFAULT NULL,
  `pwd` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_dt`
--

INSERT INTO `user_dt` (`uid`, `user_id`, `pwd`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`username`, `password`) VALUES
('admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `mst_student`
--
ALTER TABLE `mst_student`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `mst_subject`
--
ALTER TABLE `mst_subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `mst_trade`
--
ALTER TABLE `mst_trade`
  ADD PRIMARY KEY (`trade_id`);

--
-- Indexes for table `stream_tbl`
--
ALTER TABLE `stream_tbl`
  ADD PRIMARY KEY (`stream_id`);

--
-- Indexes for table `user_dt`
--
ALTER TABLE `user_dt`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `sl_no` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `mst_student`
--
ALTER TABLE `mst_student`
  MODIFY `stu_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `mst_subject`
--
ALTER TABLE `mst_subject`
  MODIFY `subject_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `mst_trade`
--
ALTER TABLE `mst_trade`
  MODIFY `trade_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `stream_tbl`
--
ALTER TABLE `stream_tbl`
  MODIFY `stream_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user_dt`
--
ALTER TABLE `user_dt`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
