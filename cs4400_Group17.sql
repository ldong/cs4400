-- phpMyAdmin SQL Dump
-- version 2.11.11.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 05, 2012 at 11:47 AM
-- Server version: 5.0.95
-- PHP Version: 5.1.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cs4400_Group17`
--

-- --------------------------------------------------------

--
-- Table structure for table `Administrator`
--

CREATE TABLE IF NOT EXISTS `Administrator` (
  `Username` varchar(16) NOT NULL,
  PRIMARY KEY  (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Administrator`
--

INSERT INTO `Administrator` (`Username`) VALUES
('admin');

-- --------------------------------------------------------

--
-- Table structure for table `Applied_To_Tutor_For`
--

CREATE TABLE IF NOT EXISTS `Applied_To_Tutor_For` (
  `Username` varchar(16) NOT NULL,
  `Title` varchar(30) NOT NULL,
  PRIMARY KEY  (`Username`,`Title`),
  KEY `Title` (`Title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Applied_To_Tutor_For`
--

INSERT INTO `Applied_To_Tutor_For` (`Username`, `Title`) VALUES
('s14', 'Microelectronic Circuits');

-- --------------------------------------------------------

--
-- Table structure for table `CCode`
--

CREATE TABLE IF NOT EXISTS `CCode` (
  `Title` varchar(30) NOT NULL,
  `Code` varchar(9) NOT NULL,
  PRIMARY KEY  (`Title`,`Code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `CCode`
--

INSERT INTO `CCode` (`Title`, `Code`) VALUES
('Biomedical Systems & Modeling', 'BMED 3510'),
('Cell and Molecular Biology', 'BIOL 3450'),
('Cell and Molecular Biology', 'BMED 3450'),
('Electromagnetics', 'ECE 3025'),
('General Ecology', 'BIOL 2335'),
('High Speed Aerodynamics', 'AE 3021'),
('Intro-Perception&Robotic', 'CS 3630'),
('Low Speed Aerodynamics', 'AE 2020'),
('Math Foundations of CmpE', 'ECE 3020'),
('Mathematical Biology', 'BIOL 4755'),
('Mathematical Biology', 'BMED 4755'),
('Microelectronic Circuits', 'ECE 3040'),
('Systems Analysis& Design', 'CS 4052'),
('Thermodynamics & Compressible ', 'AE 3350');

-- --------------------------------------------------------

--
-- Table structure for table `Course`
--

CREATE TABLE IF NOT EXISTS `Course` (
  `Title` varchar(30) NOT NULL,
  PRIMARY KEY  (`Title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Course`
--

INSERT INTO `Course` (`Title`) VALUES
('Biomedical Systems & Modeling'),
('Cell and Molecular Biology'),
('Electromagnetics'),
('General Ecology'),
('High Speed Aerodynamics'),
('Intro-Perception&Robotic'),
('Low Speed Aerodynamics'),
('Math Foundations of CmpE'),
('Mathematical Biology'),
('Microelectronic Circuits'),
('Systems Analysis& Design'),
('Thermodynamics & Compressible ');

-- --------------------------------------------------------

--
-- Table structure for table `Department`
--

CREATE TABLE IF NOT EXISTS `Department` (
  `Dept_Id` int(1) NOT NULL auto_increment,
  `Name` varchar(33) NOT NULL,
  PRIMARY KEY  (`Dept_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `Department`
--

INSERT INTO `Department` (`Dept_Id`, `Name`) VALUES
(1, 'Aerospace Engineering'),
(2, 'Biology'),
(3, 'Biomedical Engineering'),
(4, 'Computer Science'),
(5, 'Electrical & Computer Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `Department_Offers_Course`
--

CREATE TABLE IF NOT EXISTS `Department_Offers_Course` (
  `Dept_Id` int(1) NOT NULL,
  `Title` varchar(30) NOT NULL,
  PRIMARY KEY  (`Dept_Id`,`Title`),
  KEY `Title` (`Title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Department_Offers_Course`
--

INSERT INTO `Department_Offers_Course` (`Dept_Id`, `Title`) VALUES
(3, 'Biomedical Systems & Modeling'),
(2, 'Cell and Molecular Biology'),
(3, 'Cell and Molecular Biology'),
(5, 'Electromagnetics'),
(2, 'General Ecology'),
(1, 'High Speed Aerodynamics'),
(4, 'Intro-Perception&Robotic'),
(1, 'Low Speed Aerodynamics'),
(5, 'Math Foundations of CmpE'),
(2, 'Mathematical Biology'),
(3, 'Mathematical Biology'),
(5, 'Microelectronic Circuits'),
(4, 'Systems Analysis& Design'),
(1, 'Thermodynamics & Compressible ');

-- --------------------------------------------------------

--
-- Table structure for table `Education_History`
--

CREATE TABLE IF NOT EXISTS `Education_History` (
  `Username` varchar(16) NOT NULL,
  `Year_Of_Grad` year(4) NOT NULL,
  `Name_Of_School` varchar(40) NOT NULL,
  `Major` varchar(33) NOT NULL,
  `Degree` varchar(4) NOT NULL,
  `GPA` decimal(2,1) NOT NULL,
  PRIMARY KEY  (`Username`,`Year_Of_Grad`,`Name_Of_School`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Education_History`
--

INSERT INTO `Education_History` (`Username`, `Year_Of_Grad`, `Name_Of_School`, `Major`, `Degree`, `GPA`) VALUES
('213', 0000, '', '', 'BS', 0.0),
('lin', 2011, 'GT', 'comps', 'BS', 0.0),
('s1', 2009, 'UGA', 'Electrical & Computer Engineering', 'BS', 3.0),
('s10', 2009, 'UGA', 'Computer Science', 'BS', 3.0),
('s11', 2010, 'UGA', 'Computer Science', 'BS', 3.0),
('s12', 2011, 'UGA', 'Computer Science', 'MS', 3.0),
('s13', 2009, 'UGA', 'Electrical & Computer Engineering', 'BS', 3.0),
('s14', 2010, 'UGA', 'Electrical & Computer Engineering', 'BS', 3.0),
('s15', 2011, 'UGA', 'Electrical & Computer Engineering', 'MS', 3.0),
('s2', 2010, 'UGA', 'Electrical & Computer Engineering', 'BS', 3.0),
('s3', 2011, 'UGA', 'Electrical & Computer Engineering', 'MS', 3.0),
('s4', 2009, 'UGA', 'Electrical & Computer Engineering', 'BS', 3.0),
('s5', 2010, 'UGA', 'Electrical & Computer Engineering', 'BS', 3.0),
('s6', 2011, 'UGA', 'Electrical & Computer Engineering', 'MS', 3.0),
('s7', 2009, 'UGA', 'Aerospace Engineering', 'BS', 3.0),
('s8', 2010, 'UGA', 'Biology', 'BS', 3.0),
('s9', 2011, 'UGA', 'Biomedical Engineering', 'MS', 3.0),
('sfd', 2032, 'asdf', 'asdf', 'BS', 0.0);

-- --------------------------------------------------------

--
-- Table structure for table `Faculty`
--

CREATE TABLE IF NOT EXISTS `Faculty` (
  `Username` varchar(16) NOT NULL,
  `Instructor_Id` int(2) NOT NULL auto_increment,
  `Position` varchar(19) NOT NULL,
  `Dept_Id` int(1) NOT NULL,
  PRIMARY KEY  (`Username`),
  UNIQUE KEY `Instructor_Id` (`Instructor_Id`),
  KEY `Dept_Id` (`Dept_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `Faculty`
--

INSERT INTO `Faculty` (`Username`, `Instructor_Id`, `Position`, `Dept_Id`) VALUES
('p1', 1, 'Professor', 1),
('p10', 10, 'Professor', 4),
('p11', 11, 'Associate Professor', 4),
('p12', 12, 'Assistant Professor', 4),
('p13', 13, 'Professor', 5),
('p14', 14, 'Associate Professor', 5),
('p15', 15, 'Assistant Professor', 5),
('p2', 2, 'Associate Professor', 1),
('p3', 3, 'Assistant Professor', 1),
('p4', 4, 'Professor', 2),
('p5', 5, 'Associate Professor', 2),
('p6', 6, 'Assistant Professor', 2),
('p7', 7, 'Professor', 3),
('p8', 8, 'Associate Professor', 3),
('p9', 9, 'Assistant Professor', 3),
('wq', 16, 'Professor', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Logs_Visit`
--

CREATE TABLE IF NOT EXISTS `Logs_Visit` (
  `Student` varchar(16) NOT NULL,
  `Tutor` varchar(16) NOT NULL,
  `CRN` int(11) NOT NULL,
  `DateTime` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`Student`,`Tutor`,`CRN`,`DateTime`),
  KEY `Tutor` (`Tutor`),
  KEY `CRN` (`CRN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Logs_Visit`
--

INSERT INTO `Logs_Visit` (`Student`, `Tutor`, `CRN`, `DateTime`) VALUES
('s1', 's14', 19, '2012-11-02 20:04:19'),
('s1', 's14', 19, '2012-11-12 20:04:19'),
('s1', 's14', 19, '2012-11-22 20:04:19'),
('s1', 's14', 19, '2012-12-03 20:04:19'),
('s2', 's14', 19, '2012-11-02 21:04:19'),
('s2', 's14', 19, '2012-11-12 21:04:19'),
('s2', 's14', 19, '2012-11-22 21:04:19'),
('s2', 's14', 19, '2012-12-03 20:04:38'),
('s3', 's14', 19, '2012-12-03 20:03:22'),
('s4', 's14', 19, '2012-12-03 20:03:36'),
('s1', 's13', 21, '2012-11-01 20:04:19'),
('s1', 's13', 21, '2012-11-11 20:04:19'),
('s1', 's13', 21, '2012-11-21 20:04:19'),
('s1', 's13', 21, '2012-12-03 20:02:09'),
('s1', 's13', 21, '2012-12-04 23:49:39'),
('s2', 's13', 21, '2012-11-01 21:04:19'),
('s2', 's13', 21, '2012-11-11 21:04:19'),
('s2', 's13', 21, '2012-11-21 21:04:19'),
('s2', 's13', 21, '2012-12-03 20:02:28'),
('s3', 's13', 21, '2012-12-03 20:02:38'),
('s4', 's13', 21, '2012-12-03 20:02:46'),
('s1', 's15', 23, '2012-11-03 20:04:19'),
('s1', 's15', 23, '2012-11-13 20:04:19'),
('s1', 's15', 23, '2012-11-23 20:04:19'),
('s1', 's15', 23, '2012-12-03 20:04:28'),
('s2', 's15', 23, '2012-11-03 21:04:19'),
('s2', 's15', 23, '2012-11-13 21:04:19'),
('s2', 's15', 23, '2012-11-23 21:04:19'),
('s2', 's15', 23, '2012-12-03 20:04:44'),
('s3', 's15', 23, '2012-12-03 20:04:11'),
('s4', 's15', 23, '2012-12-03 20:04:03');

-- --------------------------------------------------------

--
-- Table structure for table `Registers`
--

CREATE TABLE IF NOT EXISTS `Registers` (
  `Username` varchar(16) NOT NULL,
  `Grade` char(1) default NULL,
  `Grade_Mode` varchar(10) NOT NULL,
  `CRN` int(11) NOT NULL,
  PRIMARY KEY  (`Username`,`CRN`),
  KEY `CRN` (`CRN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Registers`
--

INSERT INTO `Registers` (`Username`, `Grade`, `Grade_Mode`, `CRN`) VALUES
('s1', NULL, 'Registered', 15),
('s1', NULL, 'Registered', 19),
('s1', NULL, 'Registered', 21),
('s1', NULL, 'Registered', 23),
('s13', 'A', 'Registered', 19),
('s13', 'A', 'Registered', 21),
('s13', 'A', 'Registered', 23),
('s14', 'A', 'Registered', 19),
('s14', 'A', 'Registered', 22),
('s14', 'A', 'Registered', 24),
('s15', 'A', 'Registered', 20),
('s15', 'A', 'Registered', 21),
('s15', 'A', 'Registered', 23),
('s2', NULL, 'Registered', 19),
('s2', NULL, 'Registered', 21),
('s2', NULL, 'Registered', 23),
('s3', NULL, 'Registered', 19),
('s3', NULL, 'Registered', 21),
('s3', NULL, 'Registered', 23);

-- --------------------------------------------------------

--
-- Table structure for table `Regular_User`
--

CREATE TABLE IF NOT EXISTS `Regular_User` (
  `Username` varchar(16) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Email_Id` varchar(30) NOT NULL,
  `DOB` date NOT NULL,
  `Permanent_Address` varchar(30) NOT NULL,
  `Gender` char(1) NOT NULL,
  `Contact_No` char(10) NOT NULL,
  PRIMARY KEY  (`Username`),
  UNIQUE KEY `Email_Id` (`Email_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Regular_User`
--

INSERT INTO `Regular_User` (`Username`, `Address`, `Name`, `Email_Id`, `DOB`, `Permanent_Address`, `Gender`, `Contact_No`) VALUES
('213', '1', 'name', '12', '2001-01-01', '1', 'M', '1'),
('a2a', 'a2a', 'name', 'a2a', '1991-08-23', 'a2a', 'm', 'a2a'),
('f1', 'f1', 'name', 'f1', '1991-08-23', 'f1', 'm', 'f1'),
('lin', '124', 'name', '123', '2011-11-10', '123', 'M', '123'),
('p1', '1 south ave atlanta ga', 'Loree Briganti', 'lbriganti@gatech.edu', '1961-01-01', '1 peach rd atlanta ga', 'F', '4044050001'),
('p10', '10 south ave atlanta ga', 'Tu Hysell', 'thysell@gatech.edu', '1961-01-10', '10 peach rd atlanta ga', 'M', '4044050010'),
('p11', '11 south ave atlanta ga', 'Felice Loew', 'floew@gatech.edu', '1961-01-11', '11 peach rd atlanta ga', 'F', '4044050011'),
('p12', '12 south ave atlanta ga', 'Daniela Mcmanis', 'dmcmanis@gatech.edu', '1961-01-12', '12 peach rd atlanta ga', 'F', '4044050012'),
('p13', '13 south ave atlanta ga', 'Reed Vandemark', 'rvandemark@gatech.edu', '1961-01-13', '13 peach rd atlanta ga', 'M', '4044050013'),
('p14', '14 south ave atlanta ga', 'Mirna Sparano', 'msparano@gatech.edu', '1961-01-14', '14 peach rd atlanta ga', 'F', '4044050014'),
('p15', '15 south ave atlanta ga', 'Flor Pyle', 'fpyle@gatech.edu', '1961-01-15', '15 peach rd atlanta ga', 'F', '4044050015'),
('p2', '2 south ave atlanta ga', 'Rogelio Edlund', 'redlund@gatech.edu', '1962-02-02', '2 peach rd atlanta ga', 'M', '4044050002'),
('p3', '3 south ave atlanta ga', 'Lamonica Farabaugh', 'lfarabaugh@gatech.edu', '1963-03-03', '3 peach rd atlanta ga', 'F', '4044050003'),
('p4', '4 south ave atlanta ga', 'Chester Vandoren', 'cvandoren@gatech.edu', '1964-04-04', '4 peach rd atlanta ga', 'M', '4044050004'),
('p5', '5 south ave atlanta ga', 'Eustolia Rabe', 'erabe@gatech.edu', '1965-05-05', '5 peach rd atlanta ga', 'F', '4044050005'),
('p6', '6 south ave atlanta ga', 'Lang Sease', 'lsease@gatech.edu', '1966-06-06', '6 peach rd atlanta ga', 'F', '4044050006'),
('p7', '7 south ave atlanta ga', 'Arla Schillaci', 'aschillaci@gatech.edu', '1967-07-07', '7 peach rd atlanta ga', 'F', '4044050007'),
('p8', '8 south ave atlanta ga', 'Grace Mcwilliam', 'gmcwilliam@gatech.edu', '1968-08-08', '8 peach rd atlanta ga', 'F', '4044050008'),
('p9', '9 south ave atlanta ga', 'Roslyn Sainz', 'rsainz@gatech.edu', '1969-09-09', '9 peach rd atlanta ga', 'F', '4044050009'),
('s1', '1 north ave atlanta ga', 'Garland Knarr', 'gknarr@gatech.edu', '1991-01-01', '1 peachtree rd atlanta ga', 'M', '4044040001'),
('s10', '10 north ave atlanta ga', 'Mallory Sumners', 'msumbers@gatech.edu', '0000-00-00', '10 peachtree rd atlanta ga', 'F', '4044040010'),
('s11', '11 north ave atlanta ga', 'Lenora Berthold', 'lberthold@gatech.edu', '1991-01-11', '11 peachtree rd atlanta ga', 'F', '4044040011'),
('s12', '12 north ave atlanta ga', 'Christi Mongeau', 'cmongeau@gatech.edu', '1991-01-12', '12 peachtree rd atlanta ga', 'F', '4044040012'),
('s13', '13 north ave atlanta ga', 'Valorie Plumb', 'vplumb@gatech.edu', '1991-01-13', '13 peachtree rd atlanta ga', 'F', '4044040013'),
('s14', '14 north ave atlanta ga', 'Oscar Hanks', 'ohanks@gatech.edu', '1991-01-14', '14 peachtree rd atlanta ga', 'M', '4044040014'),
('s15', '15 north ave atlanta ga', 'Adrian Core', 'acore@gatech.edu', '1991-01-15', '15 peachtree rd atlanta ga', 'M', '4044040015'),
('s2', '2 north ave atlanta ga', 'Sofia Gillan', 'sgillan@gatech.edu', '1991-01-02', '2 peachtree rd atlanta ga', 'F', '4044040002'),
('s3', '3 north ave atlanta ga', 'Brendon Burriss', 'bburriss@gatech.edu', '1991-01-03', '3 peachtree rd atlanta ga', 'M', '4044040003'),
('s4', '4 north ave atlanta ga', 'Ladawn Oldenburg', 'lodlenburg@gatech.edu', '1991-01-04', '4 peachtree rd atlanta ga', 'F', '4044040004'),
('s5', '5 north ave atlanta ga', 'Hal Sant', 'hsant@gatech.edu', '1991-01-05', '5 peachtree rd atlanta ga', 'M', '4044040005'),
('s6', '6 north ave atlanta ga', 'Spring Heidenreich', 'sheidenreich@gatech.edu', '1991-01-06', '6 peachtree rd atlanta ga', 'F', '4044040006'),
('s7', '7 north ave atlanta ga', 'Kirstie Walkins', 'kwalkins@gatech.edu', '1991-01-07', '7 peachtree rd atlanta ga', 'F', '4044040007'),
('s8', '8 north ave atlanta ga', 'Shaina Havis', 'shavis@gatech.edu', '1991-01-08', '8 peachtree rd atlanta ga', 'F', '4044040008'),
('s9', '9 north ave atlanta ga', 'Richie Krenz', 'rkrenz@gatech.edu', '1991-01-09', '9 peachtree rd atlanta ga', 'M', '4044040009'),
('sfd', 'asdf', 'name', 'adf', '2012-12-12', 'adf', 'M', 'adf'),
('Ste', '12 Mo', 'name', 'sf', '2001-12-19', '12 m', 'M', '11111'),
('stu', '', 'name', '', '0000-00-00', '', '', ''),
('wq', 'wq', 'name', 'wqwq', '1991-08-23', 'wq', 'm', 'wq'),
('y', '1', 'name', '1', '1991-08-23', '1', 'M', '1');

-- --------------------------------------------------------

--
-- Table structure for table `Research_Interests`
--

CREATE TABLE IF NOT EXISTS `Research_Interests` (
  `Username` varchar(16) NOT NULL,
  `Interest` varchar(20) NOT NULL,
  PRIMARY KEY  (`Username`,`Interest`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Research_Interests`
--

INSERT INTO `Research_Interests` (`Username`, `Interest`) VALUES
('p1', 'Low Speed Aerodynami'),
('p10', 'Systems Analysis& De'),
('p11', 'Systems Analysis& De'),
('p12', 'Intro-Perception&Rob'),
('p13', 'Math Foundations of '),
('p14', 'Electromagnetics'),
('p15', 'Microelectronic Circ'),
('p2', 'High Speed Aerodynam'),
('p3', 'Thermodynamics & Com'),
('p4', 'Cell and Molecular B'),
('p5', 'Mathematical Biology'),
('p6', 'General Ecology'),
('p7', 'Cell and Molecular B'),
('p8', 'Mathematical Biology'),
('p9', 'Biomedical Systems &'),
('wq', 'wq');

-- --------------------------------------------------------

--
-- Table structure for table `Section`
--

CREATE TABLE IF NOT EXISTS `Section` (
  `CRN` int(2) NOT NULL auto_increment,
  `Term` varchar(6) NOT NULL,
  `Letter` char(1) NOT NULL,
  `Location` varchar(9) NOT NULL,
  `Day` varchar(3) NOT NULL,
  `Time` varchar(19) NOT NULL,
  `Instructor_Username` varchar(16) NOT NULL,
  `Title` varchar(30) NOT NULL,
  PRIMARY KEY  (`CRN`),
  KEY `Instructor_Username` (`Instructor_Username`),
  KEY `Title` (`Title`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `Section`
--

INSERT INTO `Section` (`CRN`, `Term`, `Letter`, `Location`, `Day`, `Time`, `Instructor_Username`, `Title`) VALUES
(1, 'Spring', 'A', 'IC 101', 'MWF', '8:05 am – 8:55 am', 'p1', 'Low Speed Aerodynamics'),
(2, 'Spring', 'B', 'IC 101', 'MWF', '9:05 am – 9:55 am', 'p1', 'Low Speed Aerodynamics'),
(3, 'Spring', 'A', 'IC 102', 'MWF', '8:05 am – 8:55 am', 'p2', 'High Speed Aerodynamics'),
(4, 'Spring', 'B', 'IC 102', 'MWF', '9:05 am – 9:55 am', 'p2', 'High Speed Aerodynamics'),
(5, 'Spring', 'A', 'IC 103', 'MWF', '8:05 am – 8:55 am', 'p3', 'Thermodynamics & Compressible '),
(6, 'Spring', 'B', 'IC 103', 'MWF', '9:05 am – 9:55 am', 'p3', 'Thermodynamics & Compressible '),
(7, 'Spring', 'A', 'IC 104', 'MWF', '8:05 am – 8:55 am', 'p4', 'Cell and Molecular Biology'),
(8, 'Spring', 'A', 'IC 105', 'MWF', '8:05 am – 8:55 am', 'p5', 'Mathematical Biology'),
(9, 'Spring', 'A', 'IC 106', 'MWF', '8:05 am – 8:55 am', 'p6', 'General Ecology'),
(10, 'Spring', 'B', 'IC 106', 'MWF', '9:05 am – 9:55 am', 'p6', 'General Ecology'),
(11, 'Spring', 'B', 'IC 104', 'MWF', '9:05 am – 9:55 am', 'p7', 'Cell and Molecular Biology'),
(12, 'Spring', 'B', 'IC 105', 'MWF', '9:05 am – 9:55 am', 'p8', 'Mathematical Biology'),
(13, 'Spring', 'A', 'IC 107', 'MWF', '8:05 am – 8:55 am', 'p9', 'General Ecology'),
(14, 'Spring', 'B', 'IC 107', 'MWF', '9:05 am – 9:55 am', 'p9', 'General Ecology'),
(15, 'Spring', 'A', 'IC 108', 'MWF', '8:05 am – 8:55 am', 'p10', 'Systems Analysis& Design'),
(16, 'Spring', 'B', 'IC 108', 'MWF', '9:05 am – 9:55 am', 'p11', 'Systems Analysis& Design'),
(17, 'Spring', 'A', 'IC 109', 'MWF', '8:05 am – 8:55 am', 'p12', 'Intro-Perception&Robotic'),
(18, 'Spring', 'B', 'IC 109', 'MWF', '9:05 am – 9:55 am', 'p12', 'Intro-Perception&Robotic'),
(19, 'Spring', 'A', 'IC 201', 'MWF', '8:05 am – 8:55 am', 'p13', 'Math Foundations of CmpE'),
(20, 'Spring', 'B', 'IC 201', 'MWF', '9:05 am – 9:55 am', 'p13', 'Math Foundations of CmpE'),
(21, 'Spring', 'A', 'IC 202', 'MWF', '8:05 am – 8:55 am', 'p14', 'Electromagnetics'),
(22, 'Spring', 'B', 'IC 202', 'MWF', '9:05 am – 9:55 am', 'p14', 'Electromagnetics'),
(23, 'Spring', 'A', 'IC 203', 'MWF', '8:05 am – 8:55 am', 'p15', 'Microelectronic Circuits'),
(24, 'Spring', 'B', 'IC 203', 'MWF', '9:05 am – 9:55 am', 'p15', 'Microelectronic Circuits');

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE IF NOT EXISTS `Student` (
  `Username` varchar(16) NOT NULL,
  `Student_Id` int(11) NOT NULL auto_increment,
  `Major` varchar(33) NOT NULL,
  `Degree` varchar(4) NOT NULL,
  PRIMARY KEY  (`Username`),
  UNIQUE KEY `Student_Id` (`Student_Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`Username`, `Student_Id`, `Major`, `Degree`) VALUES
('213', 19, 'Aerospace Engineering', 'BS'),
('lin', 18, 'Biomedical Engineering', 'BS'),
('s1', 1, 'Electrical & Computer Engineering', 'BS'),
('s10', 10, 'Computer Science', 'BS'),
('s11', 11, 'Computer Science', 'MS'),
('s12', 12, 'Computer Science', 'Ph.D'),
('s13', 13, 'Electrical & Computer Engineering', 'BS'),
('s14', 14, 'Electrical & Computer Engineering', 'MS'),
('s15', 15, 'Electrical & Computer Engineering', 'Ph.D'),
('s2', 2, 'Electrical & Computer Engineering', 'MS'),
('s3', 3, 'Electrical & Computer Engineering', 'Ph.D'),
('s4', 4, 'Electrical & Computer Engineering', 'BS'),
('s5', 5, 'Electrical & Computer Engineering', 'MS'),
('s6', 6, 'Electrical & Computer Engineering', 'Ph.D'),
('s7', 7, 'Aerospace Engineering', 'BS'),
('s8', 8, 'Biology', 'MS'),
('s9', 9, 'Biomedical Engineering', 'Ph.D'),
('sfd', 20, 'Aerospace Engineering', 'BS'),
('Ste', 17, 'Biomedical Engineering', 'BS'),
('y', 16, 'Aerospace Engineering', 'BS');

-- --------------------------------------------------------

--
-- Stand-in structure for view `temp`
--
CREATE TABLE IF NOT EXISTS `temp` (
`Code` varchar(9)
,`Title` varchar(30)
,`Grade` int(0)
);
-- --------------------------------------------------------

--
-- Table structure for table `Tutor`
--

CREATE TABLE IF NOT EXISTS `Tutor` (
  `Username` varchar(16) NOT NULL,
  PRIMARY KEY  (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Tutor`
--

INSERT INTO `Tutor` (`Username`) VALUES
('s13'),
('s14'),
('s15');

-- --------------------------------------------------------

--
-- Table structure for table `Tutors_For`
--

CREATE TABLE IF NOT EXISTS `Tutors_For` (
  `Username` varchar(16) NOT NULL,
  `Title` varchar(30) NOT NULL,
  PRIMARY KEY  (`Username`,`Title`),
  KEY `Title` (`Title`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Tutors_For`
--

INSERT INTO `Tutors_For` (`Username`, `Title`) VALUES
('s13', 'Electromagnetics'),
('s14', 'Math Foundations of CmpE'),
('s15', 'Microelectronic Circuits');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE IF NOT EXISTS `User` (
  `Username` varchar(16) NOT NULL,
  `Password` varchar(16) NOT NULL,
  PRIMARY KEY  (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`Username`, `Password`) VALUES
('213', '213'),
('a', 'a'),
('a2a', 'a2a'),
('admin', 'admin'),
('ax', 'ax'),
('c2', 'c2'),
('f', 'f'),
('f1', 'f1'),
('hello', 'b'),
('la', 'la'),
('lin', 'a'),
('p1', 'p1'),
('p10', 'p10'),
('p11', 'p11'),
('p12', 'p12'),
('p13', 'p13'),
('p14', 'p14'),
('p15', 'p15'),
('p2', 'p2'),
('p3', 'p3'),
('p4', 'p4'),
('p5', 'p5'),
('p6', 'p6'),
('p7', 'p7'),
('p8', 'p8'),
('p9', 'p9'),
('prox', 'x'),
('s1', 's1'),
('s10', 's10'),
('s11', 's11'),
('s12', 's12'),
('s13', 's13'),
('s14', 's14'),
('s15', 's15'),
('s2', 's2'),
('s3', 's3'),
('s4', 's4'),
('s5', 's5'),
('s6', 's6'),
('s7', 's7'),
('s8', 's8'),
('s9', 's9'),
('sfd', 'sdf'),
('Ste', 'as'),
('stu', 'stu'),
('what', 'what'),
('wq', 'wq'),
('x', 'x'),
('x3', 'x3'),
('y', '');

-- --------------------------------------------------------

--
-- Structure for view `temp`
--
DROP TABLE IF EXISTS `temp`;
-- in use(#1142 - SHOW VIEW command denied to user 'cs4400_Group17'@'localhost' for table 'temp')

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Administrator`
--
ALTER TABLE `Administrator`
  ADD CONSTRAINT `Administrator_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `User` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Applied_To_Tutor_For`
--
ALTER TABLE `Applied_To_Tutor_For`
  ADD CONSTRAINT `Applied_To_Tutor_For_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `Student` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Applied_To_Tutor_For_ibfk_2` FOREIGN KEY (`Title`) REFERENCES `Course` (`Title`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `CCode`
--
ALTER TABLE `CCode`
  ADD CONSTRAINT `CCode_ibfk_1` FOREIGN KEY (`Title`) REFERENCES `Course` (`Title`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Department_Offers_Course`
--
ALTER TABLE `Department_Offers_Course`
  ADD CONSTRAINT `Department_Offers_Course_ibfk_1` FOREIGN KEY (`Dept_Id`) REFERENCES `Department` (`Dept_Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Department_Offers_Course_ibfk_2` FOREIGN KEY (`Title`) REFERENCES `Course` (`Title`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Education_History`
--
ALTER TABLE `Education_History`
  ADD CONSTRAINT `Education_History_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `Student` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Faculty`
--
ALTER TABLE `Faculty`
  ADD CONSTRAINT `Faculty_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `Regular_User` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Faculty_ibfk_2` FOREIGN KEY (`Dept_Id`) REFERENCES `Department` (`Dept_Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Logs_Visit`
--
ALTER TABLE `Logs_Visit`
  ADD CONSTRAINT `Logs_Visit_ibfk_1` FOREIGN KEY (`Student`) REFERENCES `Student` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Logs_Visit_ibfk_2` FOREIGN KEY (`Tutor`) REFERENCES `Tutor` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Logs_Visit_ibfk_3` FOREIGN KEY (`CRN`) REFERENCES `Section` (`CRN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Registers`
--
ALTER TABLE `Registers`
  ADD CONSTRAINT `Registers_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `Student` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Registers_ibfk_2` FOREIGN KEY (`CRN`) REFERENCES `Section` (`CRN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Regular_User`
--
ALTER TABLE `Regular_User`
  ADD CONSTRAINT `Regular_User_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `User` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Research_Interests`
--
ALTER TABLE `Research_Interests`
  ADD CONSTRAINT `Research_Interests_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `Faculty` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Section`
--
ALTER TABLE `Section`
  ADD CONSTRAINT `Section_ibfk_1` FOREIGN KEY (`Instructor_Username`) REFERENCES `Faculty` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Section_ibfk_2` FOREIGN KEY (`Title`) REFERENCES `Course` (`Title`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Student`
--
ALTER TABLE `Student`
  ADD CONSTRAINT `Student_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `Regular_User` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Tutor`
--
ALTER TABLE `Tutor`
  ADD CONSTRAINT `Tutor_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `Student` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Tutors_For`
--
ALTER TABLE `Tutors_For`
  ADD CONSTRAINT `Tutors_For_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `Tutor` (`Username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Tutors_For_ibfk_2` FOREIGN KEY (`Title`) REFERENCES `Course` (`Title`) ON DELETE CASCADE ON UPDATE CASCADE;
