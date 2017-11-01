-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 18, 2016 at 10:00 PM
-- Server version: 5.0.67
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbMBMAS`
--

-- --------------------------------------------------------

--
-- Table structure for table `dbadminuser`
--

CREATE TABLE IF NOT EXISTS `dbadminuser` (
  `Username` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dbadminuser`
--

INSERT INTO `dbadminuser` (`Username`, `Password`) VALUES
('Admin', 'password'),
('B. Programmer', 'bprogrammer');

-- --------------------------------------------------------

--
-- Table structure for table `tbldisease`
--

CREATE TABLE IF NOT EXISTS `tbldisease` (
  `DiseaseID` varchar(15) NOT NULL,
  `DiseaseName` varchar(50) NOT NULL,
  `Causes` varchar(250) NOT NULL,
  `Symptoms` text NOT NULL,
  `Treatment` varchar(250) NOT NULL,
  `RegDate` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldisease`
--

INSERT INTO `tbldisease` (`DiseaseID`, `DiseaseName`, `Causes`, `Symptoms`, `Treatment`, `RegDate`) VALUES
('Disease0001', 'Malaria', 'anophelis Mosquito', 'Fever, Yellowish urine, headache', 'Use Chloroquine, Maloxin ', '18/12/2016'),
('Disease0002', 'Typhoid Fever', 'Malnutrition', 'Headache, Abdominal-aches, stooling', 'Use Feroxilin, Panadol', '18/12/2016'),
('Disease0003', 'Dysentary', 'Lack of Exercise, Malnutrition', 'Stooling, Abdominal-aches, Blood in feaces, fever', 'Do more exercise, eat good food. take two dose of penracilon daily.', '18/12/2016');

-- --------------------------------------------------------

--
-- Table structure for table `tbldoctor`
--

CREATE TABLE IF NOT EXISTS `tbldoctor` (
  `DoctorID` varchar(15) NOT NULL,
  `DoctorName` varchar(50) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `Sex` varchar(7) NOT NULL,
  `EmailAddress` varchar(60) NOT NULL,
  `PhoneNo` varchar(15) NOT NULL,
  `RegDate` varchar(20) NOT NULL,
  `Age` int(11) NOT NULL,
  `Specialization` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbldoctor`
--

INSERT INTO `tbldoctor` (`DoctorID`, `DoctorName`, `Address`, `Sex`, `EmailAddress`, `PhoneNo`, `RegDate`, `Age`, `Specialization`) VALUES
('Doctor0001', 'Balogun Taiwo', 'Ospoly health Centre, Iree.', 'MALE', 'taiwobal0202@gmail.com', '08069018655', '18/12/2016', 30, 'Heart Surgeon'),
('Doctor0002', 'Rahmat Ahmed', 'Sokoto', 'FEMALE', 'rahmatahmed@yahoo.com', '09080162642', '18/12/2016', 23, 'Nurse'),
('Doctor0003', 'Balogun Nurudeen', 'Ospoly, Iree.', 'MALE', 'balooo123@gmail.com', '07063357001', '18/12/2016', 27, 'Dysentary, and Fever');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE IF NOT EXISTS `tbluser` (
  `UserID` varchar(15) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Address` varchar(250) NOT NULL,
  `Sex` varchar(7) NOT NULL,
  `EmailAddress` varchar(50) NOT NULL,
  `PhoneNo` varchar(15) NOT NULL,
  `RegDate` varchar(20) NOT NULL,
  `Age` int(11) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`UserID`, `UserName`, `Address`, `Sex`, `EmailAddress`, `PhoneNo`, `RegDate`, `Age`, `Password`) VALUES
('User0001', 'B. Programmer', 'Ospoly Off campus, Iree, Osun State.', 'MALE', 'bprogrammer@yahoo.com', '08088902978', '18/12/2016', 28, '123456');

-- --------------------------------------------------------

--
-- Table structure for table `tbluserfeedback`
--

CREATE TABLE IF NOT EXISTS `tbluserfeedback` (
  `UserID` varchar(15) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Feedback` text NOT NULL,
  `FeedbackDate` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluserfeedback`
--

INSERT INTO `tbluserfeedback` (`UserID`, `UserName`, `Feedback`, `FeedbackDate`) VALUES
('user0001', 'B. Programmer', 'I really like your Application.', '18/12/2016'),
('user0001', 'B. Programmer', 'I got your message. \r\nThanks.', '18/12/2016');
