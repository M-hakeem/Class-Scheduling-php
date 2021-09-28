-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: April 08, 2016 at 09:18 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `schedule`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `CourseID` int(10) NOT NULL AUTO_INCREMENT,
  `CourseYrSection` varchar(20) NOT NULL,
  `Major` varchar(20) NOT NULL,
  `DeptID` int(5) NOT NULL,
  PRIMARY KEY (`CourseID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseID`, `CourseYrSection`, `Major`, `DeptID`) VALUES
(2, 'BSIS 2-A', 'Photoshop', 2),
(3, 'BSIT 3-B', 'Drafting', 2),
(5, 'DCS105', 'None', 2),
(6, 'DCS109', '', 2),
(7, 'DCS111', '', 2),
(10, 'DCS103', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `day`
--

CREATE TABLE IF NOT EXISTS `day` (
  `DayID` int(10) NOT NULL AUTO_INCREMENT,
  `Day` text NOT NULL,
  PRIMARY KEY (`DayID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `day`
--

INSERT INTO `day` (`DayID`, `Day`) VALUES
(1, 'Monday, Wednesday & Friday'),
(2, 'Tuesday & Thursday'),
(3, 'Saturday');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `DeptID` int(5) NOT NULL AUTO_INCREMENT,
  `Depart` varchar(50) NOT NULL,
  `DeptPerson` varchar(50) NOT NULL,
  `Title` varchar(50) NOT NULL,
  PRIMARY KEY (`DeptID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DeptID`, `Depart`, `DeptPerson`, `Title`) VALUES
(1, 'College of Education', 'Dr. Binales', 'Dean'),
(2, 'Iya Abubakar computer center', 'Prof. Sahlu B Junaid', 'Director, ICICt');

-- --------------------------------------------------------

--
-- Table structure for table `etime`
--

CREATE TABLE IF NOT EXISTS `etime` (
  `EtimeID` int(10) NOT NULL AUTO_INCREMENT,
  `Etime` varchar(20) NOT NULL,
  PRIMARY KEY (`EtimeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `etime`
--

INSERT INTO `etime` (`EtimeID`, `Etime`) VALUES
(1, '7:30 AM'),
(2, '8:00 AM'),
(3, '8:30 AM'),
(4, '9:00 AM'),
(5, '9:30 AM'),
(6, '10:00 AM'),
(7, '10:30 AM'),
(8, '11:00 AM'),
(9, '11:30 AM'),
(10, '12:00 PM'),
(11, '12:30 PM'),
(12, '1:00 PM'),
(13, '1:30 PM'),
(14, '2:00 PM'),
(15, '2:30 PM'),
(16, '3:00 PM'),
(17, '3:30 PM'),
(18, '4:00 PM'),
(19, '4:30 PM'),
(20, '5:00 PM'),
(21, '5:30 PM'),
(22, '6:00 PM'),
(23, '6:30 PM'),
(24, '7:00 PM'),
(25, '7:30 PM'),
(26, '8:00 PM'),
(27, '8:30 PM'),
(28, '9:00 PM'),
(29, '9:30 PM'),
(30, '10:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `UserID` int(10) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(30) NOT NULL,
  `UserPass` varchar(30) NOT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`UserID`, `UserName`, `UserPass`) VALUES
(1, 'Abdullahi', 'Group1');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `RoomID` int(10) NOT NULL AUTO_INCREMENT,
  `RoomName` varchar(20) NOT NULL,
  `Description` varchar(30) NOT NULL,
  PRIMARY KEY (`RoomID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`RoomID`, `RoomName`, `Description`) VALUES
(1, '122', 'Ground Floor'),
(2, '311', '3rd Floor'),
(3, '213', '2nd Floor'),
(7, '112', 'ddd'),
(8, '553', 'ff'),
(10, '212', 'ff'),
(15, '313', '3rd Floor');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `SchedID` int(10) NOT NULL AUTO_INCREMENT,
  `SemID` varchar(50) NOT NULL,
  `YearID` varchar(50) NOT NULL,
  `CourseID` varchar(50) NOT NULL,
  `SubjectID` varchar(50) NOT NULL,
  `TeacherID` varchar(50) NOT NULL,
  `RoomID` varchar(50) NOT NULL,
  `StimeID` varchar(50) NOT NULL,
  `EtimeID` varchar(50) NOT NULL,
  `DayID` varchar(50) NOT NULL,
  PRIMARY KEY (`SchedID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`SchedID`, `SemID`, `YearID`, `CourseID`, `SubjectID`, `TeacherID`, `RoomID`, `StimeID`, `EtimeID`, `DayID`) VALUES
(62, '1', '1', '5', '11', '1', '3', '1', '3', '1'),
(73, '1', '1', '5', '11', '1', '1', '11', '13', '2'),
(74, '1', '1', '5', '10', '1', '2', '6', '10', '3'),
(88, '2', '1', '5', '7', '1', '2', '1', '3', '1'),
(89, '1', '1', '3', '10', '1', '1', '14', '17', '2'),
(90, '1', '1', '3', '10', '1', '3', '4', '10', '3'),
(91, '1', '1', '3', '7', '1', '2', '15', '17', '1'),
(92, '1', '1', '5', '11', '1', '10', '18', '20', '2'),
(93, '1', '1', '5', '10', '1', '3', '10', '12', '2'),
(94, '1', '1', '5', '7', '2', '3', '17', '19', '1'),
(95, '1', '1', '6', '10', '2', '10', '10', '13', '2'),
(96, '1', '1', '6', '12', '2', '3', '5', '7', '3'),
(97, '1', '1', '2', '10', '2', '2', '10', '13', '1'),
(98, '1', '1', '5', '7', '2', '3', '15', '17', '2'),
(99, '1', '1', '2', '13', '2', '7', '17', '19', '2'),
(100, '1', '1', '2', '10', '2', '3', '9', '11', '1'),
(101, '1', '1', '2', '7', '1', '7', '14', '17', '1'),
(102, '1', '1', '3', '7', '2', '1', '14', '17', '1');

-- --------------------------------------------------------

--
-- Table structure for table `schoolyear`
--

CREATE TABLE IF NOT EXISTS `schoolyear` (
  `YearID` int(10) NOT NULL AUTO_INCREMENT,
  `Year` varchar(30) NOT NULL,
  PRIMARY KEY (`YearID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `schoolyear`
--

INSERT INTO `schoolyear` (`YearID`, `Year`) VALUES
(1, '2015-2016'),
(3, '2015-2016');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
  `SemID` int(10) NOT NULL AUTO_INCREMENT,
  `Semester` varchar(20) NOT NULL,
  PRIMARY KEY (`SemID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`SemID`, `Semester`) VALUES
(1, 'First Semester'),
(2, 'Second Semester');

-- --------------------------------------------------------

--
-- Table structure for table `stime`
--

CREATE TABLE IF NOT EXISTS `stime` (
  `StimeID` int(10) NOT NULL AUTO_INCREMENT,
  `Stime` varchar(20) NOT NULL,
  PRIMARY KEY (`StimeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `stime`
--

INSERT INTO `stime` (`StimeID`, `Stime`) VALUES
(1, '7:30 AM'),
(2, '8:00 AM'),
(3, '8:30 AM'),
(4, '9:00 AM'),
(5, '9:30 AM'),
(6, '10:00 AM'),
(7, '10:30 AM'),
(8, '11:00 AM'),
(9, '11:30 AM'),
(10, '12:00 PM'),
(11, '12:30 PM'),
(12, '1:00 PM'),
(13, '1:30 PM'),
(14, '2:00 PM'),
(15, '2:30 PM'),
(16, '3:00 PM'),
(17, '3:30 PM'),
(18, '4:00 PM'),
(19, '4:30 PM'),
(20, '5:00 PM'),
(21, '5:30 PM'),
(22, '6:00 PM'),
(23, '6:30 PM'),
(24, '7:00 PM'),
(25, '7:30 PM'),
(26, '8:00 PM'),
(27, '8:30 PM'),
(28, '9:00 PM'),
(29, '9:30 PM'),
(30, '10:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `SubjectID` int(10) NOT NULL AUTO_INCREMENT,
  `SubjectCode` varchar(30) NOT NULL,
  `SubjectName` varchar(200) NOT NULL,
  `SubjectLabhrprday` tinyint(10) NOT NULL,
  `SubjectLechrprday` tinyint(10) NOT NULL,
  `Prereq` varchar(50) NOT NULL,
  `SubjectCatID` int(10) NOT NULL,
  `CourseID` int(10) NOT NULL,
  `SemID` int(10) NOT NULL,
  `DeptID` int(10) NOT NULL,
  PRIMARY KEY (`SubjectID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`SubjectID`, `SubjectCode`, `SubjectName`, `SubjectLabhrprday`, `SubjectLechrprday`, `Prereq`, `SubjectCatID`, `CourseID`, `SemID`, `DeptID`) VALUES
(7, 'DCS105', 'Introduction to Programming 1', 1, 2, '0', 1, 2, 1, 2),
(10, 'DCS109', 'Web Application Engineering', 2, 0, 'None', 1, 5, 1, 2),
(11, 'DCS11', 'Computer Organization', 2, 0, 'None', 1, 5, 1, 2),
(12, 'DCS103', 'Discrete Structure 1', 2, 0, 'None', 1, 5, 1, 2),
(13, 'DCE103', 'Physics Electronics', 1, 1, '', 2, 6, 1, 2),
(14, 'STA107', 'Statistics 1', 2, 2, '', 1, 6, 1, 2),
(16, 'DGN101', ' Enlish and Communication skills', 1, 1, '', 1, 6, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `subjectcat`
--

CREATE TABLE IF NOT EXISTS `subjectcat` (
  `SubjectCatID` int(10) NOT NULL AUTO_INCREMENT,
  `SubCat` varchar(20) NOT NULL,
  PRIMARY KEY (`SubjectCatID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `subjectcat`
--

INSERT INTO `subjectcat` (`SubjectCatID`, `SubCat`) VALUES
(1, 'Major'),
(2, 'Minor');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `TeacherID` int(10) NOT NULL AUTO_INCREMENT,
  `TeacherName` text NOT NULL,
  `AcadRank` varchar(50) NOT NULL,
  `Designation` varchar(50) NOT NULL,
  `DeptID` int(10) NOT NULL,
  PRIMARY KEY (`TeacherID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`TeacherID`, `TeacherName`, `AcadRank`, `Designation`, `DeptID`) VALUES
(1, 'Mal. AS, Buhari', 'Programmer', 'Ground Floor', 1),
(2, 'Mrs. MM, Abur ', 'Instructor', '3rd Floor', 3),
(3, 'Abdulrahman, Abdul', '', 'Head CASS', 2),
(4, 'Mrs. Dr. Oj, Odengele', '', 'Instructor', 2),
(5, 'Mal., Abdullahi', '', 'Instructor', 2),
(6, 'Mal. Hamza, Muhammad', '', 'Instructor', 2),
(18, 'Mal. AA Gene', 'Head ITA', 'Ground floor', 1);
