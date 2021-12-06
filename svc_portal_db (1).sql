-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2021 at 10:11 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `svc_portal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `uname` varchar(16) NOT NULL,
  `pass` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `student_id`, `uname`, `pass`) VALUES
(1, 1, 'bugz.ryan15', '$2y$10$u6YHOrLPBpwpB6eYIs/rIeokmYsRfQnwrA9KSMDfW7NdWWkepVQvu'),
(2, 2, 'corinthians', '$2y$10$ROB53Az7CqzRY2I2rYjSkOmICE7eQG/QjDQvmiTToC76MuCCByEpm');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `uname` varchar(60) NOT NULL,
  `pass` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `uname`, `pass`) VALUES
(1, 'admin', '$2y$10$eVV9uh4AbYAIZHL1GEsa9.IrzlNSNeE/PslVZ.GurXCmxIuJKsTfq');

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `candidate_id` int(11) NOT NULL,
  `fname` varchar(64) NOT NULL,
  `mname` varchar(64) NOT NULL,
  `lname` varchar(64) NOT NULL,
  `suffix` varchar(10) NOT NULL,
  `position_id` int(11) NOT NULL,
  `registered_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `voting_session_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`candidate_id`, `fname`, `mname`, `lname`, `suffix`, `position_id`, `registered_at`, `voting_session_id`) VALUES
(1, 'Enrique', 'Gwapo', 'Gil', '', 1, '2021-10-23 13:46:26', 1),
(2, 'John', 'Middle', 'Wick', '', 1, '2021-10-23 13:54:04', 1),
(4, 'Chris', 'Mano', 'Cea', '', 2, '2021-10-23 13:54:55', 1),
(5, 'John', 'Mud', 'Doe', 'Jr', 3, '2021-10-23 13:55:17', 1),
(6, 'Jake', 'Vargas', 'Del Castillo', '', 3, '2021-12-03 16:10:36', 1),
(7, 'Ryan Czar', 'Vargas', 'Abugao', '', 1, '2021-12-06 08:47:14', 4);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `section` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `grade`, `section`) VALUES
(1, 7, 'A-GENESIS'),
(2, 7, 'B-EXODUS'),
(3, 8, 'A-EZRA'),
(4, 8, 'B-NEHEMIAH'),
(5, 9, 'A-ISAIAH'),
(6, 9, 'B-JEREMIAH'),
(7, 10, 'A-CHRONICLES'),
(8, 10, 'B-KINGS');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `position_id` int(11) NOT NULL,
  `position` varchar(32) NOT NULL,
  `allowed_candidate` int(11) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`position_id`, `position`, `allowed_candidate`, `added_at`) VALUES
(1, 'President', 10, '2021-10-23 13:45:42'),
(2, 'Secretary', 7, '2021-10-23 13:45:50'),
(3, 'Vice-President', 12, '2021-10-23 13:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `fname` varchar(60) NOT NULL,
  `mname` varchar(60) NOT NULL,
  `lname` varchar(60) NOT NULL,
  `suffix` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `email` varchar(80) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `image`, `fname`, `mname`, `lname`, `suffix`, `gender`, `email`, `class_id`) VALUES
(1, 'http://svc-portal.ph/dist/images/avatar.png', 'Ryan Czar', 'Vargas', 'Abugao', '', 'Male', 'ryan.abugao@gmail.com', 1),
(2, 'https://svc-portal.ph/dist/images/avatar.png', 'ryan czar', 'vargas', 'abugao', '', 'Male', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `voter_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `qr_code` varchar(32) NOT NULL,
  `registered_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`voter_id`, `student_id`, `qr_code`, `registered_at`) VALUES
(1, 1, 'SV-1635043132', '2021-10-23 13:38:52'),
(5, 2, 'SV-1638735341', '2021-12-05 06:15:41');

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `vote_id` int(11) NOT NULL,
  `voted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `voter_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `voting_session_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `votes`
--

INSERT INTO `votes` (`vote_id`, `voted_at`, `voter_id`, `candidate_id`, `voting_session_id`) VALUES
(30, '2021-12-04 05:40:19', 1, 1, 1),
(31, '2021-12-04 05:40:19', 1, 4, 1),
(32, '2021-12-04 05:40:19', 1, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `voting_session`
--

CREATE TABLE `voting_session` (
  `voting_session_id` int(11) NOT NULL,
  `scope` varchar(60) NOT NULL,
  `session_start` date NOT NULL,
  `session_end` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voting_session`
--

INSERT INTO `voting_session` (`voting_session_id`, `scope`, `session_start`, `session_end`, `created_at`) VALUES
(1, 'Voting For The Year 2020', '2021-12-01', '2021-12-04', '2021-12-03 08:49:01'),
(4, 'Grade 6', '2021-12-05', '2021-12-10', '2021-12-06 08:47:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`candidate_id`),
  ADD KEY `position_id` (`position_id`),
  ADD KEY `voting_session_id` (`voting_session_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `class_id` (`class_id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`voter_id`),
  ADD UNIQUE KEY `student_id_2` (`student_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`vote_id`),
  ADD KEY `voters_id` (`voter_id`),
  ADD KEY `candidate_id` (`candidate_id`),
  ADD KEY `voting_session_id` (`voting_session_id`);

--
-- Indexes for table `voting_session`
--
ALTER TABLE `voting_session`
  ADD PRIMARY KEY (`voting_session_id`),
  ADD KEY `term_scope` (`scope`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `candidate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `voter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `vote_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `voting_session`
--
ALTER TABLE `voting_session`
  MODIFY `voting_session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `candidates`
--
ALTER TABLE `candidates`
  ADD CONSTRAINT `candidates_ibfk_1` FOREIGN KEY (`position_id`) REFERENCES `positions` (`position_id`),
  ADD CONSTRAINT `candidates_ibfk_2` FOREIGN KEY (`voting_session_id`) REFERENCES `voting_session` (`voting_session_id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `class` (`class_id`);

--
-- Constraints for table `voters`
--
ALTER TABLE `voters`
  ADD CONSTRAINT `voters_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `votes`
--
ALTER TABLE `votes`
  ADD CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`voter_id`) REFERENCES `voters` (`voter_id`),
  ADD CONSTRAINT `votes_ibfk_2` FOREIGN KEY (`candidate_id`) REFERENCES `candidates` (`candidate_id`),
  ADD CONSTRAINT `votes_ibfk_3` FOREIGN KEY (`voting_session_id`) REFERENCES `voting_session` (`voting_session_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
