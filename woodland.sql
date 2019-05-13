-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2019 at 06:43 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `woodland`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `first_name`, `surname`, `password`) VALUES
(16000000, 'admin1', 'admin', '$2y$10$BjLet3F/ZSdJQ8cimOmnz.3HGsu7sldUAz6EsbZxvrJXAmrc4cPJm');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `assignment_id` int(11) NOT NULL,
  `submit_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Not Graded'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `assignment_brief`
--

CREATE TABLE `assignment_brief` (
  `brief_id` int(11) NOT NULL,
  `title` varchar(120) NOT NULL,
  `mcode` varchar(30) NOT NULL,
  `word_file` varchar(550) NOT NULL,
  `rubric` varchar(550) NOT NULL,
  `submission_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment_brief`
--

INSERT INTO `assignment_brief` (`brief_id`, `title`, `mcode`, `word_file`, `rubric`, `submission_date`) VALUES
(1, 'Assignment 1', 'C1001', '../assignments/brief/CSY2027 Appendix 2 (2017-2018).doc', '../assignments/rubric/CSY2027 Group Project Brief Body and Appendix 1 (2017-2018).doc', '2019-04-30'),
(2, 'Assignment 1', 'C1002', '../assignments/brief/SQL_2_Object_Definition - typestables(2).doc', '../assignments/rubric/SQL_13_MoreFunctions.doc', '2019-05-06');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_submit`
--

CREATE TABLE `assignment_submit` (
  `submit_id` int(11) NOT NULL,
  `student_id` int(50) NOT NULL,
  `brief_id` int(11) NOT NULL,
  `zip` varchar(500) NOT NULL,
  `code` varchar(500) NOT NULL,
  `doc` varchar(500) NOT NULL,
  `video_link` varchar(500) NOT NULL,
  `submitDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignment_submit`
--

INSERT INTO `assignment_submit` (`submit_id`, `student_id`, `brief_id`, `zip`, `code`, `doc`, `video_link`, `submitDate`) VALUES
(1, 11, 2, '', '../../staff/submits/code/rojen-tamang-18413711(source-code).docx', '../../staff/submits/doc/rojen-tamang-18413711(report).docx', 'https://youtu.be/UPEpBGHe28Q ', '2019-04-27');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `at_id` int(11) NOT NULL,
  `student_id` int(50) NOT NULL,
  `mcode` varchar(30) NOT NULL,
  `semester` int(3) NOT NULL,
  `days` int(8) NOT NULL,
  `total` int(10) NOT NULL DEFAULT '24'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`at_id`, `student_id`, `mcode`, `semester`, `days`, `total`) VALUES
(1, 11, 'C1002', 1, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `courseleader`
--

CREATE TABLE `courseleader` (
  `leader_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `image` varchar(500) NOT NULL DEFAULT 'images/courseLeader/def.png',
  `archive` varchar(3) NOT NULL DEFAULT 'no',
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courseleader`
--

INSERT INTO `courseleader` (`leader_id`, `first_name`, `middle_name`, `surname`, `email`, `address`, `password`, `phone_number`, `image`, `archive`, `course_id`) VALUES
(106, 'Dhirenda', 'lal', 'Baduwal', 'poshan@gmail.com', 'Boudha', '$2y$10$YrKRVzvEU0IDG8gQabMj5.W5wIlW4Yp8WRnS7CsgYHg.KYPTWqJWG', '9801293938', 'images/courseLeader/def.png', 'no', 1),
(108, 'Adam', '', 'Cole', 'Poshan21tamang@yahoo.com', 'Boudha', '$2y$10$iKBei6.HiAioBCIUF1td1uplODtYf1jcDqhA/w5SsYqVBWe7X217e', '9803006660', 'images/courseLeader/def.png', 'no', 1);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `course_name`) VALUES
(1, 'Computing'),
(3, 'BBA'),
(4, 'ENV Science');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `g_id` int(11) NOT NULL,
  `submit_id` int(11) NOT NULL,
  `grade` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`g_id`, `submit_id`, `grade`) VALUES
(1, 1, 'A+');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(1) NOT NULL,
  `yr` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `yr`) VALUES
(1, 'First'),
(2, 'Second'),
(3, 'Third');

-- --------------------------------------------------------

--
-- Table structure for table `lvlstudent`
--

CREATE TABLE `lvlstudent` (
  `Lv_ID` int(100) NOT NULL,
  `student_id` int(50) NOT NULL,
  `level_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lvlstudent`
--

INSERT INTO `lvlstudent` (`Lv_ID`, `student_id`, `level_id`) VALUES
(1, 11, 1),
(2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `m_id` int(11) NOT NULL,
  `student_id` int(50) NOT NULL,
  `subject` varchar(200) NOT NULL DEFAULT '(no subject)',
  `msg_date` date NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`m_id`, `student_id`, `subject`, `msg_date`, `message`) VALUES
(1, 11, '(No Subject)', '2019-04-27', 'I will be more regular');

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `mcode` varchar(30) NOT NULL,
  `course_id` int(11) NOT NULL,
  `level_id` int(1) NOT NULL,
  `title` varchar(255) NOT NULL,
  `archive` varchar(30) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`mcode`, `course_id`, `level_id`, `title`, `archive`) VALUES
('B1001', 3, 1, 'Accounts', 'no'),
('C1001', 1, 1, 'Computer System', 'no'),
('C1002', 1, 1, 'Database 1', 'no'),
('C1003', 1, 1, 'Problem Solving and Programming', 'no'),
('C1004', 1, 1, 'Computer Communications ', 'no'),
('C2001', 1, 2, 'Software Design and Development', 'no'),
('C2002', 1, 2, 'Database 2', 'no'),
('C2003', 1, 1, 'Software Engeneering II', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `module_files`
--

CREATE TABLE `module_files` (
  `file_id` int(11) NOT NULL,
  `mcode` varchar(30) NOT NULL,
  `week` int(3) NOT NULL,
  `title` varchar(200) NOT NULL,
  `file1` varchar(500) NOT NULL,
  `file2` varchar(500) NOT NULL,
  `file3` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_files`
--

INSERT INTO `module_files` (`file_id`, `mcode`, `week`, `title`, `file1`, `file2`, `file3`) VALUES
(5, 'B1001', 1, 'Object Inserting ', '../moduleFiles/FSSS Notes V2006.pdf', '../moduleFiles/lecture18_design_by_contract_and_testing.pdf', '../moduleFiles/Solution_08.pdf'),
(7, 'C1001', 1, 'Logic Gates', '../moduleFiles/L1-Introduction.pptx', '../moduleFiles/SQL_1_Review.doc', '../moduleFiles/SQL_2_Object_Definition - typestables(2).doc'),
(8, 'C1002', 2, 'Objcy editing', '../moduleFiles/L1-Introduction.pptx', '../moduleFiles/SQL_2_Object_Definition - typestables(2).doc', '../moduleFiles/SQL_2_Object_Definition - typestables(2).doc');

-- --------------------------------------------------------

--
-- Table structure for table `module_leader`
--

CREATE TABLE `module_leader` (
  `mod_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `password` varchar(500) NOT NULL DEFAULT 'dummy',
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `image` varchar(500) NOT NULL DEFAULT 'images\\moduleLeader\\def.png',
  `archive` varchar(50) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_leader`
--

INSERT INTO `module_leader` (`mod_id`, `first_name`, `middle_name`, `surname`, `password`, `address`, `phone_number`, `email`, `image`, `archive`) VALUES
(19000000, 'Jems', 'Cadburry', 'Chocolate', '$2y$10$1sDkUrJLum6ax0oeR7ilkutQZ9IltSFoWd/.5Iwm.MzZXRWLvoc9e', 'Kumaripati,lalitpur', '+977-9812547850', 'jems@gmail.com', 'images/moduleLeader/Hacker.jpg', 'no'),
(19000004, 'Elon', '', 'White', '$2y$10$SXXMdLcuHNM/GYEWzSdT7uCi3CmIE2fWU/pUWh7as.V7UfyStGTwO', 'Boudha', '9803006660', 'Poshan21tamang@yahoo.com', 'images\\moduleLeader\\def.png', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `module_teachers`
--

CREATE TABLE `module_teachers` (
  `teach_id` int(11) NOT NULL,
  `mod_id` int(11) NOT NULL,
  `mcode` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_teachers`
--

INSERT INTO `module_teachers` (`teach_id`, `mod_id`, `mcode`) VALUES
(1, 19000000, 'B1001'),
(5, 19000004, 'C1002');

-- --------------------------------------------------------

--
-- Table structure for table `personal_tutor`
--

CREATE TABLE `personal_tutor` (
  `tutor_id` int(11) NOT NULL,
  `student_id` int(50) NOT NULL,
  `mod_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `reply_id` int(11) NOT NULL,
  `student_id` int(50) NOT NULL,
  `subject` varchar(255) NOT NULL DEFAULT '(No Subject)',
  `receive_date` date NOT NULL,
  `message` text NOT NULL,
  `toUser` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`reply_id`, `student_id`, `subject`, `receive_date`, `message`, `toUser`) VALUES
(1, 11, 'Admission Letter', '2019-04-27', '\n	<p class=\"let-head\">Woodland\'s university</p>\n\n	<p>Dear Adam Wright,</p>\n	  \n    <p class=\"let-body\"> \n	Congratulations! On behalf of woodland university. It is with great pleasure that you have been offered\n	conditional acceptance to BSc. Computing program. Through this email you have been offered an admission for the class of 2019/2022.\n	<br><br>\n	We are here to help you with your academic goals in the days to come. To run in the path of achievement you must complete the steps needed to be officially enrolled as a student in the woodland university.\n	<br><br>\n	In order to get enrolled you are requested to provide your remaining details. You should provide your +2 documents, your percentage should to be above 70%. You should provide your marks on English subject if it is below 60 you must have given the ilets/toefl exam and result must be above 5.5.\n	<br><br>\n	I congratulate again on your conditional letter and request to provide the required details as soon as possible.\n	</p>\n	Sincerely,\n	WUC Administration\n	\n', 16000000),
(2, 11, 'Failure to attend P.T.M.', '2019-04-27', '27-Apr-2019\n\nDear Adam Wright\nYour name has been referred as a possible cause for concern by your module co-ordinator because you are recorded as: Not attending a personal tutorial meeting.\n\nIt is essential that you see me as soon as possible.  You must do this by 02-May-2019. The meeting will check and review your progress and find a means of resolving any difficulties you may be experiencing. The Student Code details the implications of \'failure to attend personal tutor meetings\' and whilst there may be mitigating circumstances not known to us at this time, you should regard this letter as an informal warning that your continuation on the course may be at risk. \n\nIf for any reason you are experiencing difficulties which impact on your academic work, you should contact your personal tutor for advice. You must however see me as instructed by the Elon White. \n\nYours sincerely,\nAdministrator\n', 16000000);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(50) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `perm_address` varchar(255) NOT NULL,
  `temp_address` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `course_id` int(11) NOT NULL,
  `image` varchar(550) NOT NULL DEFAULT 'images/General/default.png',
  `archive` varchar(4) NOT NULL DEFAULT 'no',
  `exit_year` date NOT NULL,
  `entry_qualification` varchar(255) NOT NULL,
  `record_status` varchar(255) NOT NULL DEFAULT 'Provisional',
  `dormant` varchar(100) NOT NULL DEFAULT 'Null'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `first_name`, `middle_name`, `surname`, `password`, `email`, `perm_address`, `temp_address`, `phone_number`, `course_id`, `image`, `archive`, `exit_year`, `entry_qualification`, `record_status`, `dormant`) VALUES
(1, 'Christopher', '', 'Edwards', '$2y$10$CqwRYak6wFqKWc3no4HDEeUk8Np8Z3BKsSSeEpS0FZbGGtHDocVqq', 'edchris@gmail.com', 'Baker Street-11, Northampton', 'Baker Street-11, Northampton', '(451) 248-9654', 1, 'images/General/default.png', 'no', '0000-00-00', 'A-Levels', 'Live', 'Null'),
(2, 'Graham', 'Matteus', 'Vinitchaikul', '$2y$10$1qiSr0JgL8lnS7/7KHt5M.0pPl3WRWfmn/PcAlOSoBmRmCEtmfJ6O', 'Graham@gmail.com', 'Wall Street-9, Wolverhampton', 'Wall Street-9, Wolverhampton', '(545) 454-5455', 1, 'images/General/default.png', 'no', '0000-00-00', 'A-Levels', 'Provisional', 'Null'),
(3, 'Asad', '', 'Cox', '$2y$10$mgYGC86gWGRrYHUkS0E7wO5RYcU3h9aCLlVwHpHJjJCMya2t0blW.', 'Asad@gmail.com', '	Canal Street-08, Manchester', '	Canal Street-08, Manchester', '(556) 454-5145', 1, 'images/General/default.png', 'no', '0000-00-00', 'A-Levels', 'Provisional', 'Null'),
(4, 'Andrew', '', 'Carpenter ', '$2y$10$yvaJLi3obQuda5cKqFS1V.xCSyhyCbrBdOxNnxWD75fGTYzmxEi9m', 'Andrew@gmail.com', 'King Street-08, Manchester', 'King Street-08, Manchester', '(545) 454-5454', 1, 'images/General/default.png', 'no', '0000-00-00', '+2', 'Provisional', 'Null'),
(5, 'Alexander', 'Dimittri', 'Begum', '$2y$10$LpKsX9vHmPsAOEJaXum4t.YVGurYZeSbHWThJHlWRm/u.mKu6/pBm', 'Alexander@gmail.com', 'Oxford Road, Manchester', 'Oxford Road, Manchester', '(874) 115-1544', 1, 'images/General/default.png', 'no', '0000-00-00', '+2', 'Provisional', 'Null'),
(6, 'Adam', '', 'Stevenson', '$2y$10$iUunkll8vDbefF7a6uFhXODt/rPTuqQfSlaSKR7IsFmvs8dQI78CK', 'Adam@gmail.com', 'Westgate, Gloucester', 'Westgate, Gloucester', '(887) 878-7878', 1, 'images/General/default.png', 'no', '0000-00-00', '+2', 'Provisional', 'Null'),
(7, 'Benjamin', '', 'Corke', '$2y$10$LZmScugUBdCRB0J9GRZgP.Ods64GVrfmmnt2hVRfNmxCi.W0HZs6G', 'Benjamin@gmail.com', 'Lombard Street, Petworth', 'Lombard Street, Petworth', '(878) 454-5121', 1, 'images/General/default.png', 'yes', '0000-00-00', 'A-Levels', 'Provisional', 'Null'),
(8, 'Andrew', '', 'Brown', '$2y$10$x0c.4fsqr8Qmm7tbK1XYTu.XzmD4qrRtidEPYQW21S.5IIhgZVm6G', 'Andrew@gmail.com', 'Baker Street-14, Northampton', 'Baker Street-14, Northampton', '(989) 302-1012', 1, 'images/General/default.png', 'yes', '0000-00-00', 'A-Levels', 'Provisional', 'Null'),
(9, 'David', 'Archimedes', 'O\'toole', '$2y$10$ut3R4QNoLj.0W9jlN2AQCutlj80mGr8VqnOGg0GdF0Cb1gNhcog5C', 'David@gmail.com', 'Wall Street-7, Wolverhampton', 'Wall Street-7, Wolverhampton', '(888) 521-2100', 1, 'images/General/default.png', 'yes', '0000-00-00', 'A-Levels', 'Provisional', 'Null'),
(10, 'Darren', 'Douglas', 'Mathoo', '$2y$10$m69yjudEMccDODOGUCacmud7JZKDwzdWHwQuomGLAyT7yfQUS5FgW', 'Darren@gmail.com', 'Canal Street-03, Manchester', 'Canal Street-03, Manchester', '(787) 871-0215', 1, 'images/General/default.png', 'no', '0000-00-00', 'A-Levels', 'Provisional', 'Null'),
(11, 'Adam', '', 'Wright', '$2y$10$cR0vE3M/XBjyUWZlgjRp1e/8LgUgdlfLXVgIx5yDXuFD/OycRvEJy', 'Adam@gmail.com', 'King Street-2, Manchester', 'King Street-2, Manchester', '(545) 412-1545', 1, 'images/Student/Elon_Musk.jpg', 'no', '2022-06-16', 'A-Levels', 'Live', 'Null'),
(12, 'Andrew', '', 'Bonney', '$2y$10$0m3fqRwOYZbgXU0XqfcBRehQDCixvqTHtkgXNCf0CGSWXoeyUQ1pK', 'Andrew@gmail.com', 'Oxford Road, Manchester', 'Oxford Road, Manchester', '(784) 821-2232', 1, 'images/General/default.png', 'yes', '0000-00-00', 'A-Levels', 'Provisional', 'Null'),
(13, 'Japhet', 'Darius', 'Horton', '$2y$10$GEmIDmR7KN0KUXDWuLlCH.drwvNQCRXAXKDqymsRwC0jhz9dpk81y', 'Japhet@gmail.com', 'Westgate, Gloucester', 'Westgate, Gloucester', '(545) 202-1202', 1, 'images/General/default.png', 'yes', '0000-00-00', 'A-Levels', 'Provisional', 'Null'),
(14, 'Anesley', '', 'Bowers', '$2y$10$GO9EH.HjxbCPs.dAoa37Z.scpL/7pnfEbnZJ6tcvJRjKVuSM/WnKC', 'Anesley@gmail.com', 'Lombard Street, Petworth', 'Lombard Street, Petworth', '(452) 021-5454', 1, 'images/General/default.png', 'yes', '0000-00-00', 'A-Levels', 'Provisional', 'Null'),
(15, 'Francisco', 'Amos', 'Ruffell', '$2y$10$xvmzcGCb0./m5KTdvBlVV.T8jAIOq.IaN3ZUF6CAB8nWGDHJGBI2e', 'Francisco@gmail.com', 'Oxford Road, Manchester', 'Oxford Road, Manchester', '(878) 452-0200', 1, 'images/General/default.png', 'yes', '0000-00-00', 'A-Levels', 'Provisional', 'Null'),
(16, 'Benjamin', '', 'Dempster', '$2y$10$xYMDz011E/mFFQFY85WvNOB.QiP.HzrNKAJCxZ87nWtHwns4vS0ly', 'Benjamin@gmail.com', 'Westgate, Gloucester', 'Westgate, Gloucester', '(544) 222-6597', 1, 'images/General/default.png', 'no', '0000-00-00', '2', 'Provisional', 'Null'),
(17, 'Daniel', 'Myles', 'Girdlestone', '$2y$10$eRdO7PMxlkhPIj5xjk3H.uEL04soWm0o5TlCIQ1wAPHO5933DgZeK', 'Daniel@gmail.com', 'Lombard Street, Petworth', 'Lombard Street, Petworth', '(875) 122-0895', 1, 'images/General/default.png', 'no', '0000-00-00', '2', 'Provisional', 'Null'),
(18, 'Ian', '', 'Riggs', '$2y$10$N0xy84NCHm2VCjVpdDjmRujuJF61/Ag7Y/GIHNL1X51of9C/nr2uS', 'Ian@gmail.com', 'Baker Street-14, Northampton', 'Baker Street-14, Northampton', '(784) 113-5455', 1, 'images/General/default.png', 'no', '0000-00-00', '2', 'Provisional', 'Null'),
(19, 'Hiren', 'Damien', 'Stevens', '$2y$10$ES53OEoUWU.vmFXPjd7NZuksHwFxANE27r/mGTkOd3JNFyAcsZa/O', 'Hiren@gmail.com', 'Wall Street-7, Wolverhampton', 'Wall Street-7, Wolverhampton', '(885) 112-2121', 1, 'images/General/default.png', 'no', '0000-00-00', '2', 'Provisional', 'Null'),
(20, 'Benjamin', '', 'Dzialoszynski', '$2y$10$pL4sKrgUWLa9YcG4KikH2.uIu.R3da9/14Wp2SYVlvWuZxT7lojr6', 'Benjamin@gmail.com', 'Canal Street-03, Manchester', 'Canal Street-03, Manchester', '(788) 455-4112', 1, 'images/General/default.png', 'no', '0000-00-00', '2', 'Provisional', 'Null'),
(21, 'Gerrad', 'James', 'Swallow', '$2y$10$oPMCHG16clOh6zMwZqbwy.ZH.AjIMnVMsnPddMGANch9ui7uWf9Yy', 'Gerrad.swa@rocketmail.com', 'Baker Street-15, Northampton', 'Baker Street-15, Northampton', '(145) 789-6325', 1, 'images/General/default.png', 'no', '0000-00-00', '2', 'Provisional', 'Null'),
(22, 'Guiseppe', '', 'Tipper', '$2y$10$dvGC/KNdmwTIxjy9t0o96u37mF5gF.PM11W8YstofxAV9zUzX/DVK', 'Guiseppe.tip@rocketmail.com', 'Wall Street-8, Wolverhampton', 'Wall Street-8, Wolverhampton', '(478) 596-3214', 1, 'images/General/default.png', 'no', '0000-00-00', '2', 'Provisional', 'Null'),
(23, 'Jayne', '', 'Dodd', '$2y$10$Kw35EQ4Y3175On.mNibS1.AZdqvYTXBEtfVx5krKKUS9EwbuL6lJO', 'Jayne.dod@gmail.com', '	Canal Street-08, Manchester', '	Canal Street-08, Manchester', '(789) 654-1236', 1, 'images/General/default.png', 'no', '0000-00-00', '2', 'Provisional', 'Null'),
(24, 'Jaime', '', 'Mcrae', '$2y$10$3svG.0lpLPYLwakr12CtjO/hoIM0fFZ6opjNMbUMESLQAcEYAfo8O', 'Jaime.mcr12@gmail.com', 'King Street-08, Manchester', 'King Street-08, Manchester', '(785) 412-3658', 1, 'images/General/default.png', 'no', '0000-00-00', '2', 'Provisional', 'Null'),
(25, 'Imrab', '', 'Muna', '$2y$10$MEKBBKHrkiMaQCYj7MQf9u1eYNG830M.4eZIWr8sq8FrnhJbS/fH.', 'Imrab.mun@rocketmail.com', 'Oxford Road-3, Manchester', 'Oxford Road-3, Manchester', '(456) 321-5896', 1, 'images/General/default.png', 'no', '0000-00-00', '2', 'Provisional', 'Null'),
(26, 'Julie', 'Demetrios', 'Calvert', '$2y$10$UTynb8/9nsqhJlYa1sFxCuMRlJ6uMtLAlo7W9bgLi8zBQaWhw7Z7a', 'Julie.cal@rocketmail.com', 'Westgate-6, Gloucester', 'Westgate-6, Gloucester', '(987) 456-3214', 1, 'images/General/default.png', 'no', '0000-00-00', '2', 'Provisional', 'Null'),
(27, 'Matthew', 'Durmus', 'Whitworth', '$2y$10$xZwWCNAkk/v/MGDCTaLMH.8wvyIFazJ0uk0zoT4EFD2n1w89nbAcS', 'Matthew.whi@rocketmail.com', 'Lombard Street-7, Petworth', 'Lombard Street-7, Petworth', '(478) 965-2314', 1, 'images/General/default.png', 'no', '0000-00-00', '2', 'Provisional', 'Null'),
(28, 'Lalita', '', 'Hunt', '$2y$10$YsXopEquJ62Ueru//3F/5.JcHSKSdfd59Kx.FpEJQZ.w/tYyCpPYm', 'Lalita.hun@rocketmail.com', 'Baker Street-4, Northampton', 'Baker Street-4, Northampton', '(102) 547-8963', 1, 'images/General/default.png', 'no', '0000-00-00', '2', 'Provisional', 'Null'),
(29, 'Michael', '', 'Su', '$2y$10$0y0erELc3PyFwc2EDEzNkOe1uNau1hYahq7PLIuWg4OwfsOaYjGyu', 'Michael.us34@gmail.com', 'Wall Street-17, Wolverhampton', 'Wall Street-17, Wolverhampton', '(102) 320-2458', 1, 'images/General/default.png', 'no', '0000-00-00', 'A-Levels', 'Provisional', 'Null'),
(30, 'Peter', '', 'Gornall', '$2y$10$Tw.suEkIDdkwyH0pIsxTCeIAEI2MWor3XWcq.1NS/93J.gjZs3D7G', 'Peter.gor@rocketmail.com', 'Canal Street-13, Manchester', 'Canal Street-13, Manchester', '(154) 780-3698', 1, 'images/General/default.png', 'no', '0000-00-00', '2', 'Provisional', 'Null'),
(31, 'Kapil', '', 'Wells', '$2y$10$2UcbUrKVYRbjb3l4m6fNJOKSz0fch6MLBh.pvuZZzGDHpB/ir090q', 'Kapil.wel@rocketmail.com', 'King Street-12, Manchester', 'King Street-12, Manchester', '(458) 796-2103', 1, 'images/General/default.png', 'no', '0000-00-00', 'A-Levels', 'Provisional', 'Null'),
(32, 'Laura', 'Diemantas', 'Clark', '$2y$10$j.wzm.NsDQbt7INR6bz37eE7n4G6O7wJdE10iRTvtdAqyFPUDsDES', 'Laura.cla@rocketmail.com', 'Oxford Road-8, Manchester', 'Oxford Road-8, Manchester', '(545) 854-4555', 1, 'images/General/default.png', 'no', '0000-00-00', 'A-Levels', 'Provisional', 'Null'),
(33, 'Miles', '', 'Broughton', '$2y$10$LLDu.kwHS96rnQp0Ru1de.1IlF.V9MMomuCaLYipgMoKk7JF2Dviq', 'Miles.bro@rocketmail.com', 'Westgate-9, Gloucester', 'Westgate-9, Gloucester', '(457) 895-6876', 1, 'images/General/default.png', 'no', '0000-00-00', 'A-Levels', 'Provisional', 'Null'),
(34, 'Mark', '', 'Goss', '$2y$10$M5.miF.MkopbjrQend8uherLBLeDQnQLsNqaooVTbWL1XJ35HuG7G', 'Mark.gos@rocketmail.com', 'Lombard Street-9, Petworth', 'Lombard Street-9, Petworth', '(211) 452-0335', 1, 'images/General/default.png', 'no', '0000-00-00', 'A-Levels', 'Provisional', 'Null'),
(35, 'Paul', '', 'Neal', '$2y$10$.cQDSAZBihNiwX62zidQsukGvylaA.C4Mzksib18oSKpooo1x2lEG', 'Paul.nea@rocketmail.com', 'Oxford Road-7, Manchester', 'Oxford Road-7, Manchester', '(102) 365-4788', 1, 'images/General/default.png', 'no', '0000-00-00', 'A-Levels', 'Provisional', 'Null'),
(36, 'Mario', '', 'Abdillah', '$2y$10$kts5psOHez1rODWlFiIgx.rTdFaqjrs8TMZauYExvsyYRAom.Uble', 'Mario.abd@rocketmail.com', 'Westgate-5, Gloucester', 'Westgate-5, Gloucester', '(122) 544-5652', 1, 'images/General/default.png', 'no', '0000-00-00', 'A-Levels', 'Provisional', 'Null'),
(37, 'Melissa', 'James', 'Broughton', '$2y$10$6p.nCWu/Q.RgowESpfdeL.ItbKyJhQqsO6o899jXyuFDRl0zrsQkG', 'Melissa.bro@rocketmail.com', 'Lombard Street-12, Petworth', 'Lombard Street-12, Petworth', '(457) 801-2547', 1, 'images/General/default.png', 'no', '0000-00-00', 'A-Levels', 'Provisional', 'Null'),
(38, 'Peter', 'Marquis', 'Vinitchaikul', '$2y$10$/H8nvmoadMRIF16V/Gum2.GBhxwzZ08yaRmESzhbKhFxKLk/klBAm', 'Peter.vin@rocketmail.com', 'Baker Street-4, Northampton', 'Baker Street-4, Northampton', '(102) 325-6567', 1, 'images/General/default.png', 'no', '0000-00-00', '2', 'Provisional', 'Null'),
(39, 'Justin', '', 'Brown', '$2y$10$eAgH53T1N0ghkQGpIaCiye06XP3NHS1.6viHJ74u.gnECJDEkuDli', 'Justin.bro@rocketmail.com', 'Wall Street-17, Wolverhampton', 'Wall Street-17, Wolverhampton', '(102) 365-4789', 1, 'images/General/default.png', 'no', '0000-00-00', '2', 'Provisional', 'Null'),
(40, 'Mohammad', 'Damek', 'Albert', '$2y$10$6KtzJIHJ2OLryWmMvkeGXulu13UNCBcAErs1dCu.8jnPUM0NA44lK', 'Mohammad.alb@rocketmail.com', 'Canal Street-13, Manchester', 'Canal Street-13, Manchester', '(457) 656-5464', 1, 'images/General/default.png', 'no', '0000-00-00', '2', 'Provisional', 'Null');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `submit_id` (`submit_id`);

--
-- Indexes for table `assignment_brief`
--
ALTER TABLE `assignment_brief`
  ADD PRIMARY KEY (`brief_id`),
  ADD KEY `mcode` (`mcode`);

--
-- Indexes for table `assignment_submit`
--
ALTER TABLE `assignment_submit`
  ADD PRIMARY KEY (`submit_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `brief_id` (`brief_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`at_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `mcode` (`mcode`);

--
-- Indexes for table `courseleader`
--
ALTER TABLE `courseleader`
  ADD PRIMARY KEY (`leader_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`g_id`),
  ADD KEY `submit_id` (`submit_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `lvlstudent`
--
ALTER TABLE `lvlstudent`
  ADD PRIMARY KEY (`Lv_ID`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `level_id` (`level_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`m_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`mcode`),
  ADD KEY `level_id` (`level_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `module_files`
--
ALTER TABLE `module_files`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `mcode` (`mcode`);

--
-- Indexes for table `module_leader`
--
ALTER TABLE `module_leader`
  ADD PRIMARY KEY (`mod_id`);

--
-- Indexes for table `module_teachers`
--
ALTER TABLE `module_teachers`
  ADD PRIMARY KEY (`teach_id`),
  ADD KEY `mod_id` (`mod_id`),
  ADD KEY `mcode` (`mcode`);

--
-- Indexes for table `personal_tutor`
--
ALTER TABLE `personal_tutor`
  ADD PRIMARY KEY (`tutor_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `mod_id` (`mod_id`);

--
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `course_id` (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16000001;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assignment_brief`
--
ALTER TABLE `assignment_brief`
  MODIFY `brief_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assignment_submit`
--
ALTER TABLE `assignment_submit`
  MODIFY `submit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `at_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courseleader`
--
ALTER TABLE `courseleader`
  MODIFY `leader_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lvlstudent`
--
ALTER TABLE `lvlstudent`
  MODIFY `Lv_ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `module_files`
--
ALTER TABLE `module_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `module_leader`
--
ALTER TABLE `module_leader`
  MODIFY `mod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19000005;

--
-- AUTO_INCREMENT for table `module_teachers`
--
ALTER TABLE `module_teachers`
  MODIFY `teach_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_tutor`
--
ALTER TABLE `personal_tutor`
  MODIFY `tutor_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `fk_a_submit` FOREIGN KEY (`submit_id`) REFERENCES `assignment_submit` (`submit_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assignment_brief`
--
ALTER TABLE `assignment_brief`
  ADD CONSTRAINT `fk_m_brief` FOREIGN KEY (`mcode`) REFERENCES `module` (`mcode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assignment_submit`
--
ALTER TABLE `assignment_submit`
  ADD CONSTRAINT `fk_a_brief` FOREIGN KEY (`brief_id`) REFERENCES `assignment_brief` (`brief_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_s_assignment` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `fk_a_mod` FOREIGN KEY (`mcode`) REFERENCES `module` (`mcode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_att_student` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courseleader`
--
ALTER TABLE `courseleader`
  ADD CONSTRAINT `fk_C_course` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grade`
--
ALTER TABLE `grade`
  ADD CONSTRAINT `fk_s_grade` FOREIGN KEY (`submit_id`) REFERENCES `assignment_submit` (`submit_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lvlstudent`
--
ALTER TABLE `lvlstudent`
  ADD CONSTRAINT `fk_lvl_id` FOREIGN KEY (`level_id`) REFERENCES `level` (`level_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_s_mod` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_m_student` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `fk_c_mod` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`),
  ADD CONSTRAINT `fk_l_mood` FOREIGN KEY (`level_id`) REFERENCES `level` (`level_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `module_files`
--
ALTER TABLE `module_files`
  ADD CONSTRAINT `fk_f_modeule` FOREIGN KEY (`mcode`) REFERENCES `module` (`mcode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `module_teachers`
--
ALTER TABLE `module_teachers`
  ADD CONSTRAINT `fk_t_leader` FOREIGN KEY (`mod_id`) REFERENCES `module_leader` (`mod_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_t_mod` FOREIGN KEY (`mcode`) REFERENCES `module` (`mcode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `personal_tutor`
--
ALTER TABLE `personal_tutor`
  ADD CONSTRAINT `fk_p_module` FOREIGN KEY (`mod_id`) REFERENCES `module_leader` (`mod_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_p_student` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reply`
--
ALTER TABLE `reply`
  ADD CONSTRAINT `fk_r_student` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_c_student` FOREIGN KEY (`course_id`) REFERENCES `courses` (`course_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
