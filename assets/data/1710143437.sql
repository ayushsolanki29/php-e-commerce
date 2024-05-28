-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2024 at 11:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php-kuiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `qid` int(11) NOT NULL,
  `qno` int(11) NOT NULL,
  `question` text NOT NULL,
  `ans1` text NOT NULL,
  `ans2` text NOT NULL,
  `ans3` text NOT NULL,
  `ans4` text NOT NULL,
  `correct_answer` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`qid`, `qno`, `question`, `ans1`, `ans2`, `ans3`, `ans4`, `correct_answer`) VALUES
(9, 1, 'For an advertiser focused on branding, what are the key success metrics on Google Display Network?', 'Click Through Rate', 'CPC', 'Reach & Frequency', 'Clicks', '3'),
(8, 2, 'Which would contribute to a higher Quality Score for a display ad?:', 'Higher CPM bid', 'Fast landing page load time', 'How old is the ad', 'Creativity of the ad', '2'),
(15, 5, 'In Google Analytics to recognize users across different devices, what is required for User ID?', 'Attribution Models', 'Google Ads Linking', 'User ID', 'Audience Definitions', '3'),
(14, 4, 'Ads on YouTube are bought and sold on an auction basis as well as on a reservation basis. What placements on Youtube.lk you can buy ad placements on reservation basis?', 'You can\'t buy reservation based ads on Youtube in Sri Lanka', 'Youtube Masthead Ads', 'Youtube Pre-Roll Ads', 'Youtube Watch Page Ads', '2'),
(13, 3, 'If a display ad has been disapproved, how does an advertiser submit a request for another review?', 'Call Google Help', 'Create a new ad group and upload the ad there', 'Save the edited ad or upload a new ad in AdWords', 'Click \"Request a Review Again\" button', '3'),
(16, 6, 'What Google Analytics report shows the percent of site traffic that visited previously?', 'Sales Performance report', 'Frequency & Recency report', 'Referrals report', 'New vs Returning report', '4'),
(17, 7, 'When will Google Analytics be unable to identify sessions from the same user by default?', 'When the sessions happen in the same browser on the same device', 'When the sessions happen in the same browser on the same day', 'When the sessions share the same browser cookie', 'When the sessions happen in different browsers on the same device', '4'),
(18, 8, 'When does the tracking code send an event hit to Google Analytics?', 'Every time a user adds an event to their calendar', 'Every time a user makes a reservation', 'Every time a user performs an action with event tracking implemented', 'Every time a user performs an action with pageview tracking implemented', '3'),
(19, 9, 'Which of these is not a Programmatic Media Buying Method?', 'Adobe Marketing Cloud', 'Rubicon Project', 'SimillarWeb', 'DoubleClick', '3'),
(20, 10, 'Which of these is a Social Media Analytics tool?', 'Google Analytics', 'Eskimi', 'SocialBakers', 'Social Media Examiner', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`qid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
