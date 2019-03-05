-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2019 at 12:42 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineexam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(11) NOT NULL,
  `userid` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `userid`, `password`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `qid` text NOT NULL,
  `ansid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`qid`, `ansid`) VALUES
('5c50b7e4b7197', '5c50b7e4dbe7a'),
('5c51b3049b3cd', '5c51b304bf987'),
('5c52ec6c1d805', '5c52ec6c5e678'),
('5c5349e7bcd23', '5c5349e7e9489'),
('5c5349e86235c', '5c5349e86ce6a'),
('5c540785582ba', '5c5407858e027'),
('5c540785e801d', '5c54078600e8f'),
('5c56b161ccc9a', '5c56b1622e406'),
('5c56b16287361', '5c56b16291e45'),
('5c56b162f38fc', '5c56b1630fddb'),
('5c56b16366815', '5c56b163718ef'),
('5c56b163ad0d5', '5c56b163b810d'),
('5c7171bb18be4', '5c7171bb32d87'),
('5c7171bb68d46', '5c7171bb77884'),
('5c717aa28e6aa', '5c717aa2b107b'),
('5c717aa30aa7f', '5c717aa3121e5'),
('5c723dd798b22', '5c723dd7a965c'),
('5c723dd80661b', '5c723dd80e097'),
('5c723e54ccef7', '5c723e54d86b7'),
('5c727de1ed40b', '5c727de204f9e'),
('5c727de22a327', '5c727de231a2d');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `cid` int(11) NOT NULL,
  `desg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`cid`, `desg`) VALUES
(1, 'Java'),
(2, 'Web Development'),
(3, 'Python'),
(5, 'Machine Learning'),
(6, 'Android'),
(7, 'Laravel'),
(8, 'IOT'),
(9, 'ai');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `email` varchar(50) NOT NULL,
  `eid` text NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`email`, `eid`, `score`, `level`, `sahi`, `wrong`, `date`) VALUES
('abcd@gmail.com', '5c56b0aeaa265', -6, 5, 0, 6, '2019-02-03 09:33:00'),
('jg@gmail.com', '5c54072a6d383', 4, 2, 2, 0, '2019-02-07 13:03:37'),
('sar@gmail.com', '5c56b0aeaa265', 5, 1, 1, 0, '2019-02-08 19:23:24'),
('sar@gmail.com', '5c54072a6d383', 1, 2, 1, 1, '2019-02-08 19:23:55'),
('sar@gmail.com', '5c52ec3f60f95', -1, 1, 0, 1, '2019-02-09 09:24:15'),
('jg@gmail.com', '5c52ec3f60f95', 1, 1, 1, 0, '2019-02-09 10:16:46'),
('sar@gmail.com', '5c51b2c094cf0', 1, 1, 1, 0, '2019-02-09 11:00:34'),
('rajamrit.18@gmail.co', '5c52ec3f60f95', 1, 1, 1, 0, '2019-02-13 21:30:58'),
('rajamrit.18@gmail.co', '5c53490c3ee40', -2, 2, 0, 2, '2019-02-13 22:42:01'),
('rajamrit.18@gmail.co', '5c56b0aeaa265', -5, 5, 0, 5, '2019-02-13 22:42:28'),
('naresh@gmail.com', '5c53490c3ee40', 4, 2, 2, 0, '2019-02-14 16:22:41'),
('jg@gmail.com', '5c51b2c094cf0', -1, 1, 0, 1, '2019-02-15 10:55:55'),
('rj@gmail.com', '5c717a74545eb', 2, 2, 2, 0, '2019-02-24 06:24:34'),
('admin@admin.com', '5c71714191af3', -1, 1, 0, 1, '2019-02-24 10:01:50'),
('manoj12@gamil.com', '5c717a74545eb', 1, 1, 1, 0, '2019-02-24 11:03:33'),
('admin@admin.com', '5c727d84e527f', 1, 2, 1, 1, '2019-02-24 11:20:26'),
('raju@gmail.com', '5c727d84e527f', 4, 2, 2, 0, '2019-02-24 11:27:53');

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `qid` varchar(50) NOT NULL,
  `option` varchar(5000) NOT NULL,
  `optionid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`qid`, `option`, `optionid`) VALUES
('5c50b7e4b7197', 'Database Management System', '5c50b7e4dbe7a'),
('5c50b7e4b7197', 'Database Management Systems', '5c50b7e4dbe91'),
('5c50b7e4b7197', 'Database Nanagement System', '5c50b7e4dbe98'),
('5c50b7e4b7197', 'Data Management System', '5c50b7e4dbe9e'),
('5c51b3049b3cd', 'data base management system', '5c51b304bf987'),
('5c51b3049b3cd', 'data base management system', '5c51b304bf9a2'),
('5c51b3049b3cd', '', '5c51b304bf9ae'),
('5c51b3049b3cd', '', '5c51b304bf9ba'),
('5c52ec6c1d805', 'comp net', '5c52ec6c5e678'),
('5c52ec6c1d805', 'b', '5c52ec6c5e694'),
('5c52ec6c1d805', 'c', '5c52ec6c5e6a0'),
('5c52ec6c1d805', 'd', '5c52ec6c5e6aa'),
('5c5349e7bcd23', 'Java', '5c5349e7e9489'),
('5c5349e7bcd23', 'machine learning', '5c5349e7e9492'),
('5c5349e7bcd23', 'c++', '5c5349e7e9495'),
('5c5349e7bcd23', 'python', '5c5349e7e9498'),
('5c5349e86235c', 'objct oriented programming', '5c5349e86ce51'),
('5c5349e86235c', 'object oriented programming', '5c5349e86ce6a'),
('5c5349e86235c', 'class oriented programming', '5c5349e86ce72'),
('5c5349e86235c', 'none of these', '5c5349e86ce78'),
('5c540785582ba', 'iot', '5c5407858e027'),
('5c540785582ba', 'iop', '5c5407858e041'),
('5c540785582ba', 'ipd', '5c5407858e04e'),
('5c540785582ba', 'iof', '5c5407858e05a'),
('5c540785e801d', 'python', '5c54078600e8f'),
('5c540785e801d', 'rasbery', '5c54078600ea4'),
('5c540785e801d', 'sev', '5c54078600eb1'),
('5c540785e801d', 'none of these', '5c54078600ebc'),
('5c56b161ccc9a', 'Scripting languageee', '5c56b1622e3ec'),
('5c56b161ccc9a', 'markup language', '5c56b1622e406'),
('5c56b161ccc9a', 'Programming language', '5c56b1622e412'),
('5c56b161ccc9a', 'Regular language', '5c56b1622e41f'),
('5c56b16287361', 'scripting language', '5c56b16291e45'),
('5c56b16287361', 'markup language', '5c56b16291e61'),
('5c56b16287361', 'programming language', '5c56b16291e6d'),
('5c56b16287361', 'regular language', '5c56b16291e78'),
('5c56b162f38fc', 'scripting language', '5c56b1630fdc1'),
('5c56b162f38fc', 'markup language', '5c56b1630fdd5'),
('5c56b162f38fc', 'programming language', '5c56b1630fddb'),
('5c56b162f38fc', 'regular language', '5c56b1630fde1'),
('5c56b16366815', 'a', '5c56b163718dc'),
('5c56b16366815', 'b', '5c56b163718ef'),
('5c56b16366815', 'c', '5c56b163718f5'),
('5c56b16366815', 'd', '5c56b163718fb'),
('5c56b163ad0d5', 'l', '5c56b163b80dc'),
('5c56b163ad0d5', 'o', '5c56b163b80f6'),
('5c56b163ad0d5', 'k', '5c56b163b8102'),
('5c56b163ad0d5', 'j', '5c56b163b810d'),
('5c7171bb18be4', 'Scripting languageee', '5c7171bb32d87'),
('5c7171bb18be4', 's', '5c7171bb32d90'),
('5c7171bb18be4', 'd', '5c7171bb32d92'),
('5c7171bb18be4', 'd', '5c7171bb32d9a'),
('5c7171bb68d46', 'g', '5c7171bb7787b'),
('5c7171bb68d46', 'j', '5c7171bb77884'),
('5c7171bb68d46', 'k', '5c7171bb77887'),
('5c7171bb68d46', 'k', '5c7171bb7788b'),
('5c717aa28e6aa', 'a', '5c717aa2b107b'),
('5c717aa28e6aa', 'b', '5c717aa2b1085'),
('5c717aa28e6aa', 'c', '5c717aa2b1087'),
('5c717aa28e6aa', 'd', '5c717aa2b108c'),
('5c717aa30aa7f', 'a', '5c717aa3121db'),
('5c717aa30aa7f', 'b', '5c717aa3121e5'),
('5c717aa30aa7f', 'c', '5c717aa3121e9'),
('5c717aa30aa7f', 'd', '5c717aa3121eb'),
('5c723dd798b22', 'ml', '5c723dd7a965c'),
('5c723dd798b22', 'b', '5c723dd7a9664'),
('5c723dd798b22', 'c', '5c723dd7a9665'),
('5c723dd798b22', 'd', '5c723dd7a9666'),
('5c723dd80661b', 'a', '5c723dd80e089'),
('5c723dd80661b', 'b', '5c723dd80e095'),
('5c723dd80661b', 'AI', '5c723dd80e097'),
('5c723dd80661b', 'd', '5c723dd80e099'),
('5c723e54ccef7', 'd', '5c723e54d86b7'),
('5c723e54ccef7', 'f', '5c723e54d86c1'),
('5c723e54ccef7', 'd', '5c723e54d86c2'),
('5c723e54ccef7', 'f', '5c723e54d86c6'),
('5c727de1ed40b', 'a', '5c727de204f96'),
('5c727de1ed40b', 'b', '5c727de204f9c'),
('5c727de1ed40b', 'c', '5c727de204f9d'),
('5c727de1ed40b', 'artificial intelligence', '5c727de204f9e'),
('5c727de22a327', 'machine learning', '5c727de231a2d'),
('5c727de22a327', 'm', '5c727de231a37'),
('5c727de22a327', 'c', '5c727de231a39'),
('5c727de22a327', 'd', '5c727de231a3c');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `eid` text NOT NULL,
  `qid` text NOT NULL,
  `qns` text NOT NULL,
  `choice` int(10) NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`eid`, `qid`, `qns`, `choice`, `sn`) VALUES
('5c50b7c69ecc5', '5c50b7e4b7197', 'jazas', 4, 1),
('5c51b2c094cf0', '5c51b3049b3cd', 'what is dbms?', 4, 1),
('5c52ec3f60f95', '5c52ec6c1d805', 'What is cn?', 4, 1),
('5c53490c3ee40', '5c5349e7bcd23', 'What is Javaa?', 4, 1),
('5c53490c3ee40', '5c5349e86235c', 'what is oops?', 4, 2),
('5c54072a6d383', '5c540785582ba', 'what is iot?', 4, 1),
('5c54072a6d383', '5c540785e801d', 'what is pi?', 4, 2),
('5c56b0aeaa265', '5c56b161ccc9a', 'what is Html?', 4, 1),
('5c56b0aeaa265', '5c56b16287361', 'what is javascript', 4, 2),
('5c56b0aeaa265', '5c56b162f38fc', 'what is c/c++?', 4, 3),
('5c56b0aeaa265', '5c56b16366815', 'asdf', 4, 4),
('5c56b0aeaa265', '5c56b163ad0d5', 'lkjh', 4, 5),
('5c71714191af3', '5c7171bb18be4', 'what', 4, 1),
('5c71714191af3', '5c7171bb68d46', 'g', 4, 2),
('5c717a74545eb', '5c717aa28e6aa', 'web', 4, 1),
('5c717a74545eb', '5c717aa30aa7f', 'dev', 4, 2),
('5c723d975b1fe', '5c723dd798b22', 'What is ML?', 4, 1),
('5c723d975b1fe', '5c723dd80661b', 'what is AI?', 4, 2),
('5c723e284d9ee', '5c723e54ccef7', 'w', 4, 1),
('5c727d84e527f', '5c727de1ed40b', 'wha is ai?', 4, 1),
('5c727d84e527f', '5c727de22a327', 'what is ml?', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `eid` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `sahi` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `time` bigint(20) NOT NULL,
  `intro` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`eid`, `title`, `sahi`, `wrong`, `total`, `time`, `intro`, `date`) VALUES
('5c51b2c094cf0', 'Dbms', 1, 1, 1, 1, 'dsc', '2019-01-30 14:20:48'),
('5c52ec3f60f95', 'Cn', 1, 1, 1, 1, 'sde', '2019-01-31 12:38:23'),
('5c53490c3ee40', 'Java', 2, 1, 2, 2, 'java concept', '2019-01-31 19:14:20'),
('5c54072a6d383', 'Iot', 2, 1, 2, 1, 'sd', '2019-02-01 08:45:30'),
('5c56b0aeaa265', 'Html', 5, 1, 5, 2, 'asd', '2019-02-03 09:13:18'),
('5c71714191af3', 'Ws', 1, 1, 2, 1, 'hqd', '2019-02-23 16:13:53'),
('5c717a74545eb', 'Web Development', 1, 1, 2, 1, 'web', '2019-02-23 16:53:08'),
('5c727d84e527f', 'Ai', 2, 1, 2, 1, 'ai', '2019-02-24 11:18:28');

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `email` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rank`
--

INSERT INTO `rank` (`email`, `score`, `time`) VALUES
('jg@gmail.com', 11, '2019-02-15 10:55:53'),
('suvm@suvm.com', 1, '2019-01-30 10:58:42'),
('akru@gmail.com', 3, '2019-01-30 11:09:50'),
('abcd@gmail.com', -6, '2019-02-03 09:33:00'),
('sar@gmail.com', -5, '2019-02-24 10:51:26'),
('syed@gmail.com', 0, '2019-02-09 19:08:11'),
('rajamrit.18@gmail.co', -6, '2019-02-13 22:42:28'),
('rj@gmail.com', 2, '2019-02-24 06:24:34'),
('naresh@gmail.com', 4, '2019-02-14 16:22:41'),
('manoj12@gamil.com', 0, '2019-02-24 10:58:07');

-- --------------------------------------------------------

--
-- Table structure for table `studregister`
--

CREATE TABLE `studregister` (
  `sid` int(11) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contactno` varchar(10) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `cpas` varchar(20) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `teacher` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studregister`
--

INSERT INTO `studregister` (`sid`, `fname`, `lname`, `email`, `contactno`, `pass`, `cpas`, `Gender`, `subject`, `address`, `teacher`) VALUES
(24, 'Jaggu', 'jgii', 'jg@gmail.com', '1234242', 'amFnZ3U=', 'amFnZ3U=', '', 'Web Development', 'Bmsit Boys Hostel,Avahalli,Bangalore', 'Roshan Jagwani'),
(30, 'Sarthak', 'Gupta', 'sar@gmail.com', '1234242', 'c2FyMTIz', 'c2FyMTIz', '', 'Java', 'Bmsit Boys Hostel,Avahalli,Bangalore', 'parth'),
(33, 'roshan', 'jagwani', 'rjroshanjagwani.rj@gmail.com', '7619378243', 'YWFh', 'YWFh', 'Male', 'Java', 'nnnn', 'parth'),
(38, 'Jagwani', 'Sons', 'jagwani@gmail.com', '8101192390', 'YWFhYA==', 'YWFhYQ==', 'Male', 'Java', 'aaaa', NULL),
(51, 'a', 'b', 'rjroshanjagwani.rj@gmail.com', '7619378243', 'Um9zaGFuOTYxNDE=', 'Um9zaGFuOTYxNDE=', 'Male', 'Web Development', 'ssst', 'parth'),
(52, 'Roshan', 'Jagwani', 'rj@gmail.com', '7619378243', 'Um9zaGFuOTYxNDE=', 'Um9zaGFuOTYxNDE=', 'Male', 'Web Development', 'avalahalli,yehlanka,bangalore', 'Rohit'),
(53, 'Roshan', 'Jagwani', 'rjroshanjagwani.rj@gmail.com', '7619378243', 'Um9zaGFuOTYxNDE=', 'Um9zaGFuOTYxNDE=', 'Male', 'Java', 'avalahalli,yehlanka,bangalore', 'parth'),
(54, 'Naresh', 'Jagwani', 'naresh@gmail.com', '7438463844', 'TmFyZXNoMTIz', 'TmFyZXNoMTIz', 'Male', 'Java', 'yes\r\n', NULL),
(59, 'Manoj', 'Kumar', 'manoj12@gamil.com', '7619378243', 'TWFub2oxMjM=', 'TWFub2oxMjM=', 'Male', 'Web Development', 'avalahalli,yehlanka,bangalore', NULL),
(60, 'raju', 'kumar', 'raju@gmail.com', '9108396116', 'Um9zaGFuMTIz', 'Um9zaGFuMTIz', 'Male', 'ai', 'avalahalli,yehlanka,bangalore', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subansw`
--

CREATE TABLE `subansw` (
  `ansid` text NOT NULL,
  `user` varchar(20) NOT NULL,
  `quest` varchar(255) NOT NULL,
  `ans` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subansw`
--

INSERT INTO `subansw` (`ansid`, `user`, `quest`, `ans`) VALUES
('5c5f56fc7f981', 'Sarthak', 'What is Java?', 'Java is a general-purpose computer-programming language that is concurrent, class-based, object-oriented, and specifically designed to have as few implementation dependencies as possible.'),
('5c5f577023dca', 'Sarthak', 'What is Object?', 'A Java object is a combination of data and procedures working on the available data. An object has a state and behavior. '),
('5c5f57d76e062', 'Syed Bilal', 'What is class?', 'A Java class file is a file containing Java bytecode that can be executed on the Java Virtual Machine. A Java class file is usually produced by a Java compiler from Java programming language source files containing Java classes.'),
('5c60972364956', 'Jaggu', 'What is Java?', 'Java is a programming language that produces software for multiple platforms. When a programmer writes a Java application, the compiled code (known as bytecode) runs on most operating systems (OS), including Windows, Linux and Mac OS. Java derives much of its syntax from the C and C++ programming languages.\r\n\r\nJava was developed in the mid-1990s by James A. Gosling, a former computer scientist with Sun Microsystems.\r\nJava produces applets (browser-run programs), which facilitate graphical user interface (GUI) and object interaction by Internet users. Prior to Java applets, Web pages were typically static and non-interactive. Java applets have diminished in popularity with the release of competing products, such as Adobe Flash and Microsoft Silverlight.\r\n\r\nJava applets run in a Web browser with Java Virtual Machine (JVM), which translates Java bytecode into native processor instructions and allows indirect OS or platform program execution. JVM provides the majority of components needed to run bytecode, which is usually smaller than executable programs written through other programming languages. Bytecode cannot run if a system lacks required JVM.'),
('5c6595fede652', 'Naresh', 'What is class?', 'class'),
('5c6f0251493ca', '', 'whit is css?', 'Cascading Style Sheet'),
('5c6f0327a9959', 'Roshan', 'whit is css?', 'Cascading Style Sheet'),
('5c6f0478a954c', 'Roshan', 'whit is css?', 'Cascading Style Sheet'),
('5c727ff632286', 'raju', 'what is ai?', 'Arificial intelligence\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `subques`
--

CREATE TABLE `subques` (
  `sqid` text NOT NULL,
  `quest` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subques`
--

INSERT INTO `subques` (`sqid`, `quest`) VALUES
('5c5f382ce699f', 'What is Java?'),
('5c5f3854a8428', 'What is Object?'),
('5c5f3860e672d', 'What is class?'),
('5c6efba733618', 'whit is css?'),
('5c727e1d26dfa', 'what is ai?');

-- --------------------------------------------------------

--
-- Table structure for table `teacherreg`
--

CREATE TABLE `teacherreg` (
  `tid` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `desg` varchar(25) NOT NULL,
  `contactno` varchar(10) NOT NULL,
  `bio` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacherreg`
--

INSERT INTO `teacherreg` (`tid`, `name`, `email`, `desg`, `contactno`, `bio`) VALUES
(10, 'Rohit', 'ro@ros.com', 'Python', '131194988', 'fzdhltg'),
(12, 'parth', 'pk@pk.com', 'Machine Learning', '1311949999', 'sads'),
(14, 'Roshan Jagwani', 'rjroshanjagwani.rj@g', 'Java', '7619378243', 'mmm'),
(16, 'syed', 'bilal@gmail.com', 'Java', '6326707977', 'html');

-- --------------------------------------------------------

--
-- Table structure for table `upload_pdf_file`
--

CREATE TABLE `upload_pdf_file` (
  `id` int(11) NOT NULL,
  `courses` varchar(55) NOT NULL,
  `pdf_file` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upload_pdf_file`
--

INSERT INTO `upload_pdf_file` (`id`, `courses`, `pdf_file`) VALUES
(6, 'Web Development', 'Case Study on Regular Expression - Test2-2018.pdf'),
(7, 'Java', 'ai.pdf'),
(10, 'Web Development', 'SpiceJet_E-ticket_PNR UDI7WQ - 01 Aug 2018 Mumbai-Kolkata for MR. JAGWANI.pdf'),
(12, 'Web Development', 'vtu5thsemcomputernetworknotes15cs52-170820143749.pdf'),
(16, 'Machine Learning', 'ProjectFinal (1).pdf'),
(17, 'Machine Learning', 'ProjectFinal (1).pdf'),
(18, 'Java', 'DBMS LAB MANUAL.pdf'),
(19, 'Web Development', 'ai (3).pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `studregister`
--
ALTER TABLE `studregister`
  ADD PRIMARY KEY (`sid`,`email`);

--
-- Indexes for table `teacherreg`
--
ALTER TABLE `teacherreg`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `upload_pdf_file`
--
ALTER TABLE `upload_pdf_file`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `studregister`
--
ALTER TABLE `studregister`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `teacherreg`
--
ALTER TABLE `teacherreg`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `upload_pdf_file`
--
ALTER TABLE `upload_pdf_file`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
