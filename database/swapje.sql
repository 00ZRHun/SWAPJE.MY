-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 07, 2020 at 04:19 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `swapje`
--

-- --------------------------------------------------------

--
-- Table structure for table `ads`
--

CREATE TABLE `ads` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `companyName` varchar(225) DEFAULT NULL,
  `payPalBusinessAccount` varchar(100) DEFAULT NULL,
  `contactNo` varchar(15) DEFAULT NULL,
  `description` longtext,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `Vimage5` varchar(120) DEFAULT NULL,
  `isBoost` varchar(120) DEFAULT '0',
  `updationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delmode` varchar(100) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `userId`, `title`, `category`, `companyName`, `payPalBusinessAccount`, `contactNo`, `description`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `Vimage5`, `isBoost`, `updationDate`, `delmode`) VALUES
(1, 3, 'z', 2, 'z', 'z@gmail.com', '602220105040', 'zzz', ':Vimage1', ':Vimage2', ':Vimage3', ':Vimage4', ':Vimage5', '0', '2020-06-06 07:26:37', '0'),
(2, 1, 'a', 4, 'a', 'a@gmail.com', '1', 'ssa', 'Screenshot 2020-06-01 at 5.09.21 PM.png', '', '', '', '', '0', '2020-06-06 07:26:45', '1'),
(3, 1, ':title', 1, ':companyName', ':payPalBusinessAccount', '123', ':description', ':Vimage1', ':Vimage2', ':Vimage3', ':Vimage4', ':Vimage5', '0', '2020-06-06 12:31:10', '0'),
(4, 3, 'd1', 3, 'd1', 'd1@gmail.com', '601110604062', 'dddddddddd1\r\ndddddddddd1\r\nddddd1', 'Screenshot 2020-06-01 at 5.09.21 PM.png', '', '', '', '', '0', '2020-06-06 13:29:18', '0'),
(5, 1, 'r', 4, 'r', 'r@gmail.com', '123123123123', 'qweqwewqeqwe', 'Screenshot 2020-06-01 at 10.54.16 PM.png', '', '', '', '', '0', '2020-06-06 14:24:47', '0'),
(6, 1, 'r123', 4, 'r', 'r@gmail.com', '123123123123', 'qweqwewqeqwe', '', '', '', '', '', '0', '2020-06-06 14:41:18', '0'),
(7, 1, 'f', 3, 'f', 'f@gmail.com', '123123123123', 'fff', 'Screenshot 2020-06-01 at 10.54.42 PM.png', '', '', '', '', '0', '2020-06-06 14:41:45', '0'),
(8, 1, 'abc', 4, 'f', 'f@gmail.com', '321', 'fff', '', '', '', '', '', '0', '2020-06-06 14:47:38', '0'),
(9, 1, 'rasdasd', 4, 'rasdasd', 'rasdasd@gmail.com', '321321', 'qweqwewqeqwe32131', '', '', '', '', '', '0', '2020-06-06 14:48:01', '1'),
(10, 1, 'm', 4, 'm', 'm@gmail.com', '12312312312312', 'adsfdsafasdfasdfa', 'Screenshot 2020-05-28 at 5.45.32 PM.png', '', '', '', '', '0', '2020-06-07 06:48:29', '1'),
(11, 1, 'm123', 1, 'm123', 'm123@gmail.com', '311231312', 'adsfdsafasdfasdfa123', 'Screenshot 2020-05-28 at 5.45.32 PM.png', '', '', '', '', '0', '2020-06-07 06:49:29', '0'),
(12, 1, 'j', 3, 'j', 'j@gmail.com', '123123123123', 'adfadsfasdfsadf', 'Screenshot 2020-06-05 at 10.37.14 AM.png', '', '', '', '', '0', '2020-06-07 08:03:07', '0');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(225) DEFAULT NULL,
  `delmode` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `delmode`) VALUES
(1, 'clothes', 0),
(2, 'shoes', 0),
(3, 'jewelry', 0),
(4, 'beauty', 0),
(5, 'personal care', 0);

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `favorite`
--

INSERT INTO `favorite` (`id`, `userId`, `itemId`, `date_created`) VALUES
(177, 1, 17, '2020-06-06 12:19:50'),
(178, 1, 17, '2020-06-06 12:20:05'),
(179, 1, 17, '2020-06-06 12:20:07'),
(180, 1, 17, '2020-06-06 12:20:07'),
(181, 1, 17, '2020-06-06 12:20:08');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `productName` varchar(100) DEFAULT NULL,
  `itemCondition` int(11) NOT NULL DEFAULT '0',
  `usedYear` int(4) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `overview` longtext,
  `sell` int(11) DEFAULT '0',
  `rent` int(11) DEFAULT '0',
  `swap` int(11) DEFAULT '0',
  `totalPrice` int(12) DEFAULT NULL,
  `pricePerDay` int(12) DEFAULT NULL,
  `value` int(12) NOT NULL,
  `payPalBusinessAccount` varchar(100) DEFAULT NULL,
  `contactNo` varchar(15) DEFAULT NULL,
  `Vimage1` varchar(120) DEFAULT NULL,
  `Vimage2` varchar(120) DEFAULT NULL,
  `Vimage3` varchar(120) DEFAULT NULL,
  `Vimage4` varchar(120) DEFAULT NULL,
  `Vimage5` varchar(120) DEFAULT NULL,
  `updationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `favorite` int(11) NOT NULL DEFAULT '0',
  `delmode` varchar(100) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `user_id`, `productName`, `itemCondition`, `usedYear`, `category`, `overview`, `sell`, `rent`, `swap`, `totalPrice`, `pricePerDay`, `value`, `payPalBusinessAccount`, `contactNo`, `Vimage1`, `Vimage2`, `Vimage3`, `Vimage4`, `Vimage5`, `updationDate`, `favorite`, `delmode`) VALUES
(1, 7, 'a7', 0, 1, 1, 'b', 1, 1, 1, 2, 3, 4, 'jobbusiness@gmail.com', '601110604061', ':vimage1', ':vimage2', ':vimage3', ':vimage4', ':vimage5', '2020-05-26 18:56:55', 0, '0'),
(2, 8, 'b8', 0, 1, 3, 'b', 1, 1, 1, 2, 3, 4, 'c@gmail.com', '601110604061', 'Screenshot 2020-05-26 at 9.44.49 PM.png', '', '', '', '', '2020-05-26 18:57:22', 0, '0'),
(3, 7, '123123', 0, 123123, 2, '123123', NULL, NULL, NULL, 123123, 123123, 123123, 'jobbusiness123123@gmail.com', '123123', ':vimage1', ':vimage2', ':vimage3', ':vimage4', ':vimage5', '2020-05-26 10:56:55', 0, '1'),
(4, 8, 'd8', 0, 1, 5, 'b', 1, 1, 1, 2, 3, 4, 'c@gmail.com', '601110604061', 'Screenshot 2020-05-26 at 9.44.49 PM.png', '', '', '', '', '2020-05-26 10:57:22', 0, '0'),
(5, 7, '71', 0, 1, 2, 'b', 1, 1, 1, 2, 3, 4, 'jobbusiness@gmail.com', '601110604061', ':vimage1', ':vimage2', ':vimage3', ':vimage4', ':vimage5', '2020-05-26 10:56:55', 0, '1'),
(6, 7, '72', 0, 1, 4, 'b', 1, 1, 1, 2, 3, 4, 'c@gmail.com', '601110604061', 'Screenshot 2020-05-26 at 9.44.49 PM.png', '', '', '', '', '2020-05-26 10:57:22', 0, '0'),
(7, 7, ':productName:', 0, 1, 3, ':overview', 1, 1, 1, 1, 1, 1, 'payPalBusinessAccount@gmail.com', '11234', ':Vimage1', ':Vimage2', ':Vimage3', ':Vimage4', ':Vimage5', '2020-05-26 02:56:55', 0, '1'),
(8, 8, '82', 0, 1, 4, 'b', 1, 1, 1, 2, 3, 4, 'c@gmail.com', '601110604061', 'Screenshot 2020-05-26 at 9.44.49 PM.png', '', '', '', '', '2020-05-26 02:57:22', 0, '1'),
(9, 7, 'bag', 0, 1, 3, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 1, 1, 1, 20, 3, 50, 'jobbusiness@gmail.com', '123', '1.webp', '', '', '', '', '2020-05-27 08:06:48', 0, '0'),
(10, 7, ':productName', 0, 9, 2, ':overview', 1, 1, 1, 19, 19, 19, 'payPalBusinessAccount@gmail.com', '123123123123', ':Vimage1', ':Vimage2', ':Vimage3', ':Vimage4', ':Vimage5', '2020-05-27 16:00:14', 0, '0'),
(11, 7, 'bag', 0, 1, 1, 'knsdbfcka\r\nsdfcnjaks', NULL, 1, NULL, 3, 2, 10, 'jobbusiness@gmail.com', '601110604061', 'WhatsApp Image 2020-05-23 at 12.05.06 PM.jpeg', '', '', '', '', '2020-05-28 07:54:33', 0, '0'),
(12, 7, 'ff', 0, 1000, 2, 'uu', 1, 1, 1, 3567, 3455, 6575, 'jobbusiness@gmail.com', '6543248', 'screencapture-sc-edu-my-as-register-php-2020-05-27-21_42_12.png', 'screencapture-sc-edu-my-as-register-php-2020-05-27-21_42_12.png', 'screencapture-sc-edu-my-as-index-php-2020-05-27-21_46_19.png', 'WhatsApp Image 2020-05-23 at 12.05.06 PM.jpeg', '', '2020-05-28 10:47:51', 0, '0'),
(13, 2, 'p', 0, 0, 5, 'p', 1, 1, 1, 10, 10, 10, 'jobbusiness@gmail.com', '601110604061', 'Screenshot 2020-05-28 at 5.45.32 PM.png', 'Screenshot 2020-05-28 at 5.45.32 PM.png', 'Screenshot 2020-06-01 at 5.09.21 PM.png', 'Screenshot 2020-06-01 at 10.54.42 PM.png', '', '2020-06-02 14:57:27', 0, '0'),
(14, 7, ':productName', 10, 5, 2, ':overview', 1, 1, 1, 2, 3, 4, 'payPalBusinessAccount@gmail.com', '1110604061', ':vimage1', ':vimage2', ':vimage3', ':vimage4', ':vimage5', '2020-06-03 16:51:10', 0, '0'),
(15, 7, 'productNam', 2, 3, 3, 'asdas:overview', 1, 1, 1, 1, 2, 3, 'payPalBusinessAccou@gmail.com', '601110604061', ':vimage1', ':vimage2', ':vimage3', ':vimage4', ':vimage5', '2020-06-03 16:55:51', 0, '0'),
(16, 2, 'e', 10, 1, 2, 'd', 1, 1, 1, 1, 2, 3, 'businesspersonal@gmail.com', '123', 'Screenshot 2020-05-28 at 7.20.53 PM.png', '', '', '', '', '2020-06-03 16:58:14', 0, '0'),
(17, 1, 'd123', 10, 3123, 4, 'd123', 1, 1, 1, 3123, 33213, 333123, 'd123@gmail.com', '601110604061123', 'Screenshot 2020-06-01 at 10.54.42 PM.png', 'Screenshot 2020-06-01 at 2.43.06 PM.png', 'Screenshot 2020-05-28 at 7.20.53 PM.png', 'Screenshot 2020-06-05 at 10.48.40 AM.png', 'Screenshot 2020-06-01 at 5.09.21 PM.png', '2020-06-06 09:48:46', 0, '0'),
(18, 1, 'm', 7, 123, 4, 'm123', 1, 1, 1, 456, 564, 645, 'm456@gmail.com', '456456456456', 'Screenshot 2020-06-01 at 5.09.21 PM.png', '', '', '', '', '2020-06-07 06:51:58', 0, '1'),
(19, 1, 'm', 7, 0, 4, 'm', 1, 1, 1, 123, 231, 312, 'm@gmail.com', '12123123123123', 'Screenshot 2020-06-01 at 5.09.21 PM.png', '', '', '', '', '2020-06-07 06:57:32', 0, '0'),
(20, 1, 'm1', 7, 0, 4, 'm', 1, 1, 1, 123, 231, 312, 'm@gmail.com', '12123123123123', 'Screenshot 2020-06-01 at 5.09.21 PM.png', '', '', '', '', '2020-06-07 06:59:37', 0, '0'),
(21, 1, 'p123', 10, 1123, 4, 'p1p1p1p123', 1, 1, 1, 11123, 111123, 1111123, 'p123@gmail.com', '456456456456', 'Screenshot 2020-06-05 at 11.07.04 AM.png', '', '', '', '', '2020-06-07 08:00:41', 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL DEFAULT '1',
  `itemId` int(11) NOT NULL,
  `star` int(2) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `userId`, `itemId`, `star`, `timestamp`) VALUES
(1, 1, 20, 1, '2020-06-07 16:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(120) DEFAULT NULL,
  `lastName` varchar(120) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `ContactNo` char(13) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(100) DEFAULT NULL,
  `Country` varchar(100) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `ContactNo`, `dob`, `Address`, `City`, `Country`, `RegDate`, `UpdationDate`) VALUES
(1, 'a', 'a', '00ZRHun@gmail.com', 'e99a18c428cb38d5f260853678922e03', NULL, NULL, NULL, NULL, NULL, '2020-06-01 15:39:33', '2020-06-02 12:54:03'),
(2, 'bc', 'a', 'abc@gmail.com', 'e99a18c428cb38d5f260853678922e03', NULL, NULL, NULL, NULL, NULL, '2020-06-02 00:41:59', '2020-06-02 12:54:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=205;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
