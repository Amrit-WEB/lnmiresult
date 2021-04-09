-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2021 at 07:25 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lnmiresult`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `Password` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `UserName`, `Password`, `updationDate`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course` varchar(10) NOT NULL,
  `semester` varchar(10) DEFAULT NULL,
  `subject1` varchar(50) NOT NULL,
  `subject2` varchar(50) NOT NULL,
  `subject3` varchar(50) NOT NULL,
  `subject4` varchar(50) NOT NULL,
  `subject5` varchar(50) NOT NULL,
  `subject6` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course`, `semester`, `subject1`, `subject2`, `subject3`, `subject4`, `subject5`, `subject6`) VALUES
('BCA', 'First', 'Mathematical Foundation', 'Business Communication', 'Computer Fundamentals & IT', 'Programming in C', 'Lab on Window & MS Office', 'Lab on Programming in C'),
('BCA', 'Second', 'Discrete Mathematics', 'Data Structure using C', 'Database Management System', 'Business Accounting', 'Lab on Data Structure', 'Lab on DBMS (Oracle)'),
('BCA', 'Third', 'Computer Organization & Architecture', 'Statistical Methods', 'Object Oriented Programming using C', 'Fundamental  Of Management', 'Lab on Statistical Methods', 'Lab on C++'),
('BCA', 'Fourth', 'Java Programmig', 'Operating System', 'Visual Basic', 'Computer Network', 'Lab on Java', 'Lab on Visual Basic'),
('BCA', 'Fifth', 'Software Engineering', 'Computer Graphics', 'Numerical Methods', 'Web Designing', 'Lab on Web Designing', 'Lab on Computer Graphics'),
('BCA', 'Sixth', 'Project Report & Viva Voice', 'Seminar Presentation', 'N/A', 'N/A', 'N/A', 'N/A'),
('BBA', 'First', 'Business Mathematics', 'Communicative English', 'Business Accounting', 'Business Econimics', 'Fundamentals of Computer', 'N/A'),
('BBA', 'Second', 'Business Organisation', 'Principals of Management', 'Oraganisational Behaviour', 'Business Communication', 'Business Statistica', 'N/A'),
('BBA', 'Third', 'Research Methodolgy', 'Material & Production Management', 'Human Resourse Management', 'Marketing Management', 'Financial Management', 'N/A'),
('BBA', 'Fourth', 'Business Laws', 'Computer Apllications in Management', 'Fundamentals of Operations Research', 'Business Policy & Corporate Strategy', 'Indian Economy', 'N/A'),
('BBA', 'Fifth', 'Entrepreneurship', 'Business Environment', 'Tax Laws in India', 'Business Values & Ethics', 'Managenment Information Systems', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `resulttable`
--

CREATE TABLE `resulttable` (
  `semroll` varchar(15) NOT NULL,
  `rollno` int(10) NOT NULL,
  `course` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `subone` int(3) NOT NULL,
  `subtwo` int(3) NOT NULL,
  `subthree` int(3) NOT NULL,
  `subfour` int(3) NOT NULL,
  `subfive` int(3) NOT NULL,
  `subsix` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resulttable`
--

INSERT INTO `resulttable` (`semroll`, `rollno`, `course`, `semester`, `subone`, `subtwo`, `subthree`, `subfour`, `subfive`, `subsix`) VALUES
('First18606', 18606, 'BCA', 'First', 82, 71, 73, 67, 75, 86),
('Second18606', 18606, 'BCA', 'Second', 78, 74, 71, 76, 75, 89);

-- --------------------------------------------------------

--
-- Table structure for table `studenttable`
--

CREATE TABLE `studenttable` (
  `studentName` varchar(50) NOT NULL,
  `course` varchar(10) NOT NULL,
  `rollno` int(5) NOT NULL,
  `fromSession` int(4) NOT NULL,
  `toSession` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studenttable`
--

INSERT INTO `studenttable` (`studentName`, `course`, `rollno`, `fromSession`, `toSession`) VALUES
('Amritanshu Prajapati', 'BCA', 18606, 2018, 2021),
('Rahul Kumar', 'BCA', 18608, 2018, 2021),
('Sunny Kumar', 'BCA', 18612, 2018, 2021);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
