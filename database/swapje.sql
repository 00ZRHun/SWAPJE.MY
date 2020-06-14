-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 14, 2020 at 11:54 AM
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
  `images` varchar(255) DEFAULT NULL,
  `isBoost` varchar(120) DEFAULT '0',
  `updationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delmode` varchar(100) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ads`
--

INSERT INTO `ads` (`id`, `userId`, `title`, `category`, `companyName`, `payPalBusinessAccount`, `contactNo`, `description`, `images`, `isBoost`, `updationDate`, `delmode`) VALUES
(1, 3, 'z', 2, 'z', 'z@gmail.com', '602220105040', 'zzz', ':Vimage1', '0', '2020-06-06 07:26:37', '0'),
(2, 1, 'a', 4, 'a', 'a@gmail.com', '1', 'ssa', 'Screenshot 2020-06-01 at 5.09.21 PM.png', '0', '2020-06-06 07:26:45', '1'),
(3, 1, ':title', 1, ':companyName', ':payPalBusinessAccount', '123', ':description', ':Vimage1', '0', '2020-06-06 12:31:10', '0'),
(4, 3, 'd1', 3, 'd1', 'd1@gmail.com', '601110604062', 'dddddddddd1\r\ndddddddddd1\r\nddddd1', 'Screenshot 2020-06-01 at 5.09.21 PM.png', '0', '2020-06-06 13:29:18', '0'),
(5, 1, 'r', 4, 'r', 'r@gmail.com', '123123123123', 'qweqwewqeqwe', 'Screenshot 2020-06-01 at 10.54.16 PM.png', '0', '2020-06-06 14:24:47', '0'),
(6, 1, 'r123', 4, 'r', 'r@gmail.com', '123123123123', 'qweqwewqeqwe', '', '0', '2020-06-06 14:41:18', '0'),
(7, 1, 'f', 3, 'f', 'f@gmail.com', '123123123123', 'fff', 'Screenshot 2020-06-01 at 10.54.42 PM.png', '0', '2020-06-06 14:41:45', '0'),
(8, 1, 'abc', 4, 'f', 'f@gmail.com', '321', 'fff', '', '0', '2020-06-06 14:47:38', '0'),
(9, 1, 'rasdasd', 4, 'rasdasd', 'rasdasd@gmail.com', '321321', 'qweqwewqeqwe32131', '', '0', '2020-06-06 14:48:01', '1'),
(10, 1, 'm', 4, 'm', 'm@gmail.com', '12312312312312', 'adsfdsafasdfasdfa', 'Screenshot 2020-05-28 at 5.45.32 PM.png', '0', '2020-06-07 06:48:29', '1'),
(11, 1, 'm123', 1, 'm123', 'm123@gmail.com', '311231312', 'adsfdsafasdfasdfa123', 'Screenshot 2020-05-28 at 5.45.32 PM.png', '0', '2020-06-07 06:49:29', '0'),
(12, 1, 'j', 3, 'j', 'j@gmail.com', '123123123123', 'adfadsfasdfsadf', 'Screenshot 2020-06-05 at 10.37.14 AM.png', '0', '2020-06-07 08:03:07', '0'),
(13, 1, 'abc', 5, 'abc', 'abc@gmail.com', '123123123132', 'adsfsdfasdf\r\nasdf\r\nadsf', 'Screenshot 2020-06-05 at 1.27.49 PM.png', '0', '2020-06-09 09:39:29', '0'),
(14, 1, 'h', 4, 'h', 'h7@gmail.com', '456456456456', 'asfdasdfdsafsdaf\r\nasdfasdfas\r\nasfdasdfdsafsdaf\r\nasdfasdfas', 'Screenshot 2020-06-05 at 1.56.24 PM.png', '0', '2020-06-09 09:46:21', '0'),
(15, 1, 'h', 4, 'h', 'h7@gmail.com', '456456456456', 'asfdasdfdsafsdaf\r\nasdfasdfas\r\nasfdasdfdsafsdaf\r\nasdfasdfas', 'Screenshot 2020-06-05 at 1.56.24 PM.png', '0', '2020-06-09 10:04:02', '0'),
(16, 1, 'abc', 4, 'a', 'a@gmail.com', '123', 'asdf', 'Array', '0', '2020-06-09 10:05:54', '0'),
(17, 1, 'hzz', 4, 'zz', 'zz@gmail.com', '21343254', 'sssz', 'Array', '0', '2020-06-09 11:41:36', '0'),
(18, 1, 'sadf', 4, 'asdf', 'adsf@gmail.com', '123123123123', 'sdfsdf\r\nasdfasdf\r\nsdf', 'Screenshot 2020-06-01 at 2.43.06 PM.png', '0', '2020-06-09 16:27:58', '0'),
(19, 1, 'lkj', 3, 'lkj', 'lkj@abc.com', '132141341', 'asd\r\nasdf\r\nca', NULL, '0', '2020-06-09 16:31:49', '0'),
(20, 1, 'rty', 4, 'ery', 'erty@a.com', '23463452', 'asdf\r\nqe\r\nZc', NULL, '0', '2020-06-09 16:32:05', '0'),
(21, 1, 'p', 2, 'p', 'p@c.com', '1231341231231', 'ac as\r\navc\r\nb aa', NULL, '0', '2020-06-09 16:39:53', '0'),
(22, 1, 'p', 2, 'p', 'p@c.com', '1231341231231', 'ac as\r\navc\r\nb aa', NULL, '0', '2020-06-09 16:41:36', '0'),
(23, 1, 'p', 2, 'p', 'p@c.com', '1231341231231', 'ac as\r\navc\r\nb aa', NULL, '0', '2020-06-09 16:42:48', '0'),
(24, 1, 'p', 2, 'p', 'p@c.com', '1231341231231', 'ac as\r\navc\r\nb aa', NULL, '0', '2020-06-09 16:42:51', '0'),
(25, 1, 'p', 2, 'p', 'p@c.com', '1231341231231', 'ac as\r\navc\r\nb aa', NULL, '0', '2020-06-09 16:43:23', '0'),
(26, 1, 'p', 2, 'p', 'p@c.com', '1231341231231', 'ac as\r\navc\r\nb aa', NULL, '0', '2020-06-09 16:43:35', '0'),
(27, 1, 'p', 2, 'p', 'p@c.com', '1231341231231', 'ac as\r\navc\r\nb aa', NULL, '0', '2020-06-09 16:44:00', '0'),
(28, 1, 's', 4, 's', 's@c.com', '123213', 'sqw', NULL, '0', '2020-06-09 16:44:36', '0'),
(29, 1, 'a', 4, 'a', 'a@a.com', '324', 'adc', 'Array', '0', '2020-06-09 16:46:52', '0'),
(30, 1, 'f', 4, '123', 'f@f.vom', '23423', 'safdcs', NULL, '0', '2020-06-09 16:49:13', '0'),
(31, 1, 'as', 4, 'asd', 'as@ad.cm', '13', 'asd', NULL, '0', '2020-06-09 16:53:20', '0'),
(32, 1, 'dfa', 4, 'sdfasd', 'casd@ads.cacd', '132123123123', 'vzvasd\r\nadsf\r\ncasdfa', NULL, '0', '2020-06-10 01:26:15', '0'),
(33, 1, 'n', 4, 'n', 'n@n.v', '123123123123', 'dsfa\r\nasdf\r\nga\r\n ag', NULL, '0', '2020-06-10 01:32:49', '0'),
(34, 1, 'f', 4, 'asfvasdfvaagas', 'f@f.f', '12312312312', 'as', NULL, '0', '2020-06-10 01:35:37', '0'),
(35, 1, 'f', 4, 'asfvasdfvaagas', 'f@f.f', '12312312312', 'as', NULL, '0', '2020-06-10 01:36:08', '0'),
(36, 1, 'f', 4, 'asfvasdfvaagas', 'f@f.f', '12312312312', 'as', NULL, '0', '2020-06-10 01:36:09', '0'),
(37, 1, 'f', 4, 'asfvasdfvaagas', 'f@f.f', '12312312312', 'as', NULL, '0', '2020-06-10 01:36:45', '0'),
(38, 1, 'f', 4, 'asfvasdfvaagas', 'f@f.f', '12312312312', 'as', NULL, '0', '2020-06-10 01:36:46', '0'),
(39, 1, 'f', 4, 'asfvasdfvaagas', 'f@f.f', '12312312312', 'as', NULL, '0', '2020-06-10 01:36:55', '0'),
(40, 1, 'f', 4, 'asfvasdfvaagas', 'f@f.f', '12312312312', 'as', NULL, '0', '2020-06-10 01:37:27', '0'),
(41, 1, 'f', 4, 'asfvasdfvaagas', 'f@f.f', '12312312312', 'as', NULL, '0', '2020-06-10 01:37:34', '0'),
(42, 1, 'g', 4, 'g', 'g@g.g', '123123123123', 'asd', NULL, '0', '2020-06-10 02:47:24', '0'),
(43, 1, 'F12', 4, 'ASDAFCA2', 'F2@F.F', '4235345435345', 'CASCADS AC3452\r\n5352', 'Screenshot 2020-06-01 at 10.54.16 PM.png', '0', '2020-06-10 02:49:02', '0'),
(44, 1, 'gg1', 4, 'gg', 'gg@gg.gg', '123456678879', 'asf\r\ncas', NULL, '0', '2020-06-10 02:59:32', '0'),
(45, 1, 'as456', 4, 'as456', 'as456@as.as', '45609809808', 'as456\r\nsa456\r\nassa456', 'Screenshot 2020-05-28 at 7.20.53 PM.png, Screenshot 2020-06-01 at 2.43.06 PM.png, Screenshot 2020-06-01 at 5.09.21 PM.png, Screenshot 2020-06-01 at 10.54.16 PM.png', '0', '2020-06-10 03:36:33', '0'),
(46, 1, '1234', 4, '1234', '1234@123.123', '1234', '1234', 'Screenshot 2020-06-01 at 5.09.21 PM.png, Screenshot 2020-06-01 at 10.54.16 PM.png, Screenshot 2020-06-01 at 10.54.42 PM.png', '0', '2020-06-10 04:04:06', '0'),
(47, 1, '1234', 4, '1234', '1234@123.123', '1234', '1234', 'Screenshot 2020-06-01 at 5.09.21 PM.png, Screenshot 2020-06-01 at 10.54.16 PM.png, Screenshot 2020-06-01 at 10.54.42 PM.png', '0', '2020-06-10 04:05:09', '0'),
(48, 1, '1234', 4, '1234', '1234@123.123', '1234', '1234', 'Screenshot 2020-06-01 at 5.09.21 PM.png, Screenshot 2020-06-01 at 10.54.16 PM.png, Screenshot 2020-06-01 at 10.54.42 PM.png', '0', '2020-06-10 04:05:44', '0'),
(49, 1, '1234', 4, '1234', '1234@123.123', '1234', '1234', 'Screenshot 2020-06-01 at 5.09.21 PM.png, Screenshot 2020-06-01 at 10.54.16 PM.png, Screenshot 2020-06-01 at 10.54.42 PM.png', '0', '2020-06-10 04:06:22', '0'),
(50, 1, '1234', 4, '1234', '1234@123.123', '1234', '1234', 'Screenshot 2020-06-01 at 5.09.21 PM.png, Screenshot 2020-06-01 at 10.54.16 PM.png, Screenshot 2020-06-01 at 10.54.42 PM.png', '0', '2020-06-10 04:06:32', '0'),
(51, 1, '1234', 4, '1234', '1234@123.123', '1234', '1234', 'Screenshot 2020-06-01 at 5.09.21 PM.png, Screenshot 2020-06-01 at 10.54.16 PM.png, Screenshot 2020-06-01 at 10.54.42 PM.png', '0', '2020-06-10 04:07:57', '0'),
(52, 1, '1234', 4, '1234', '1234@123.123', '1234', '1234', 'Screenshot 2020-06-01 at 5.09.21 PM.png, Screenshot 2020-06-01 at 10.54.16 PM.png, Screenshot 2020-06-01 at 10.54.42 PM.png', '0', '2020-06-10 04:08:01', '0'),
(53, 1, 'as', 4, 'as', 'as@as.as', '09809809808', 'as\r\nsa\r\nassa', 'Screenshot 2020-05-28 at 7.20.53 PM.png, Screenshot 2020-06-01 at 2.43.06 PM.png, Screenshot 2020-06-01 at 5.09.21 PM.png, Screenshot 2020-06-01 at 10.54.16 PM.png', '0', '2020-06-10 04:13:36', '0'),
(54, 1, 's', 4, 's', 's@s.s', '234234234234', 's', 'Screenshot 2020-06-01 at 2.43.06 PM.png', '0', '2020-06-10 04:14:13', '0'),
(55, 1, 't', 3, 't', 't@t.t', '2342342342', 'da\r\n13\r\ndaqe13', 'Screenshot 2020-05-28 at 7.20.53 PM.png, Screenshot 2020-06-01 at 2.43.06 PM.png, Screenshot 2020-06-01 at 5.09.21 PM.png', '0', '2020-06-10 04:18:36', '0'),
(56, 1, 'vbn', 4, 'vbn', 'vbn@vbn.vbn', '123123123123', 'vbn\r\nvbn\r\nvbn', '', '0', '2020-06-10 09:47:26', '0'),
(57, 1, 'vbn', 4, 'vbn', 'vbn@vbn.vbn', '123123123123', 'vbn\r\nvbn\r\nvbn', '', '0', '2020-06-10 09:47:38', '0'),
(58, 1, 'sdf', 5, 'asdf', 'asdf@sadf.com', '123123123', 'asdf', 'Screenshot 2020-06-01 at 5.09.21 PM.png, Screenshot 2020-06-01 at 10.54.16 PM.png, Screenshot 2020-06-01 at 10.54.42 PM.png', '0', '2020-06-10 09:48:25', '0'),
(59, 1, 'bnm', 5, 'bnm', 'bnm@das.csa', '123123123345', 'bnm\\b\r\nbnmb\r\nbnm<b>\r\n<b>dsf</b>', 'Array', '0', '2020-06-10 09:53:49', '0'),
(60, 1, 'adsf', 4, 'dfgh', 'sdf@dfs.c', '345133465', 'etsdf', 'Array', '0', '2020-06-10 09:55:02', '0'),
(61, 1, 'adsf', 4, 'dfgh', 'sdf@dfs.c', '345133465', 'etsdf', '5ee0ae263d63e.png, 5ee0ae263db81.png, Screenshot 2020-05-28 at 7.20.53 PM.png, Screenshot 2020-06-01 at 10.54.42 PM.png', '0', '2020-06-10 09:55:50', '0'),
(62, 1, 'adsf', 4, 'dfgh', 'sdf@dfs.c', '345133465', 'etsdf', '5ee0ae27320be.png, 5ee0ae273246f.png, Screenshot 2020-05-28 at 7.20.53 PM.png, Screenshot 2020-06-01 at 10.54.42 PM.png', '0', '2020-06-10 09:55:51', '0'),
(63, 1, 'f', 4, 'f', 'f@f.f', '12314324123', 'fa\r\nvas\r\nacwe', 'Screenshot 2020-06-01 at 5.09.21 PM.png, Screenshot 2020-06-01 at 10.54.16 PM.png', '0', '2020-06-10 09:56:28', '0'),
(64, 1, 'g', 1, 'g', 'g@g.g', '12312312312', 'g\r\nsdf\r\ngg\r\n', '5ee0ae7a3aaf1.png, 5ee0ae7a3aee9.png, Screenshot 2020-06-01 at 5.09.21 PM.png, Screenshot 2020-06-01 at 10.54.16 PM.png', '0', '2020-06-10 09:57:14', '0'),
(65, 1, 'cba123', 3, 'cba123', 'cba@cba.cba123', '123', 'cbacba cba123\r\ncba cba123\r\ncbacbacba123', 'Screenshot 2020-06-01 at 10.54.16 PM.png', '0', '2020-06-10 10:01:08', '0'),
(66, 1, 'WER', 5, 'WER', 'WER@WER.WER', '123123123123', 'WER', 'Screenshot 2020-06-01 at 5.09.21 PM.png, Screenshot 2020-06-01 at 10.54.16 PM.png', '0', '2020-06-10 10:12:13', '0'),
(67, 1, 'REW', 4, 'REW', 'REW@REW.REW', '2434534535', 'REW', '5ee0b2589095b.png, 5ee0b25890ee4.png, 5ee0b258914db.png', '0', '2020-06-10 10:13:44', '0'),
(68, 1, 'asdads', 4, 'asdads', 'asdads@asdads.asdads', '1234154351', 'ghj\r\nghj ghj123\r\nasdads', '5ee0b67645234.png, 5ee0b676457fc.png, 5ee0b67645b89.png, Screenshot 2020-06-01 at 5.09.21 PM.png, Screenshot 2020-06-01 at 10.54.16 PM.png, Screenshot 2020-06-01 at 10.54.42 PM.png', '0', '2020-06-10 10:18:16', '0'),
(69, 1, 'ghj', 2, 'ghj', 'ghj@ghj.ghj', '12334553467', 'ghj\r\nghj ghj\r\nghjghjghj', '5ee0b4832fc73.png, 5ee0b483303c1.png, 5ee0b483306df.png, Screenshot 2020-05-28 at 7.20.53 PM.png, Screenshot 2020-06-01 at 5.09.21 PM.png, Screenshot 2020-06-01 at 10.54.42 PM.png', '0', '2020-06-10 10:22:59', '0');

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
(237, 1, 12, '2020-06-08 06:35:18'),
(238, 1, 12, '2020-06-08 06:35:53'),
(239, 1, 12, '2020-06-08 06:36:45'),
(240, 1, 12, '2020-06-08 06:36:49'),
(242, 1, 20, '2020-06-08 13:40:16'),
(243, 1, 20, '2020-06-08 13:40:24'),
(244, 1, 20, '2020-06-08 13:40:28'),
(245, 1, 20, '2020-06-08 13:40:32'),
(252, 1, 6, '2020-06-09 07:14:21'),
(253, 1, 25, '2020-06-14 09:36:53');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `category_id` varchar(120) NOT NULL,
  `image_big` varchar(120) NOT NULL,
  `image_type` varchar(120) DEFAULT NULL,
  `id_album` varchar(120) NOT NULL,
  `updationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delmode` varchar(100) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `category_id`, `image_big`, `image_type`, `id_album`, `updationDate`, `delmode`) VALUES
(1, ':categoria_img', ':data', ':img_type', ':id_album', '2020-06-09 11:19:37', '0');

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
  `value` int(12) DEFAULT NULL,
  `payPalBusinessAccount` varchar(100) DEFAULT NULL,
  `contactNo` varchar(15) DEFAULT NULL,
  `images` varchar(225) DEFAULT NULL,
  `updationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `favorite` int(11) NOT NULL DEFAULT '0',
  `delmode` varchar(100) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `user_id`, `productName`, `itemCondition`, `usedYear`, `category`, `overview`, `sell`, `rent`, `swap`, `totalPrice`, `pricePerDay`, `value`, `payPalBusinessAccount`, `contactNo`, `images`, `updationDate`, `favorite`, `delmode`) VALUES
(1, 7, 'a7', 0, 1, 1, 'b', 1, 1, 1, 2, 3, 4, 'jobbusiness@gmail.com', '601110604061', ':vimage1', '2020-05-26 18:56:55', 0, '0'),
(2, 8, 'b8', 0, 1, 3, 'b', 1, 1, 1, 2, 3, 4, 'c@gmail.com', '601110604061', 'Screenshot 2020-05-26 at 9.44.49 PM.png', '2020-05-26 18:57:22', 0, '0'),
(3, 7, '123123', 0, 123123, 2, '123123', NULL, NULL, NULL, 123123, 123123, 123123, 'jobbusiness123123@gmail.com', '123123', ':vimage1', '2020-05-26 10:56:55', 0, '1'),
(4, 8, 'd8', 0, 1, 5, 'b', 1, 1, 1, 2, 3, 4, 'c@gmail.com', '601110604061', 'Screenshot 2020-05-26 at 9.44.49 PM.png', '2020-05-26 10:57:22', 0, '0'),
(5, 7, '71', 0, 1, 2, 'b', 1, 1, 1, 2, 3, 4, 'jobbusiness@gmail.com', '601110604061', ':vimage1', '2020-05-26 10:56:55', 0, '1'),
(6, 7, '72', 0, 1, 4, 'b', 1, 1, 1, 2, 3, 4, 'c@gmail.com', '601110604061', 'Screenshot 2020-05-26 at 9.44.49 PM.png', '2020-05-26 10:57:22', 0, '0'),
(7, 7, ':productName:', 0, 1, 3, ':overview', 1, 1, 1, 1, 1, 1, 'payPalBusinessAccount@gmail.com', '11234', ':Vimage1', '2020-05-26 02:56:55', 0, '1'),
(8, 8, '82', 0, 1, 4, 'b', 1, 1, 1, 2, 3, 4, 'c@gmail.com', '601110604061', 'Screenshot 2020-05-26 at 9.44.49 PM.png', '2020-05-26 02:57:22', 0, '1'),
(9, 7, 'bag', 0, 1, 3, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 1, 1, 1, 20, 3, 50, 'jobbusiness@gmail.com', '123', '1.webp', '2020-05-27 08:06:48', 0, '0'),
(10, 7, ':productName', 0, 9, 2, ':overview', 1, 1, 1, 19, 19, 19, 'payPalBusinessAccount@gmail.com', '123123123123', ':Vimage1', '2020-05-27 16:00:14', 0, '0'),
(11, 7, 'bag', 0, 1, 1, 'knsdbfcka\r\nsdfcnjaks', NULL, 1, NULL, 3, 2, 10, 'jobbusiness@gmail.com', '601110604061', 'WhatsApp Image 2020-05-23 at 12.05.06 PM.jpeg', '2020-05-28 07:54:33', 0, '0'),
(12, 7, 'ff', 0, 1000, 2, 'uu', 1, 1, 1, 3567, 3455, 6575, 'jobbusiness@gmail.com', '6543248', 'screencapture-sc-edu-my-as-register-php-2020-05-27-21_42_12.png', '2020-05-28 10:47:51', 0, '0'),
(13, 2, 'p', 0, 0, 5, 'p', 1, 1, 1, 10, 10, 10, 'jobbusiness@gmail.com', '601110604061', 'Screenshot 2020-05-28 at 5.45.32 PM.png', '2020-06-02 14:57:27', 0, '0'),
(14, 7, ':productName', 10, 5, 2, ':overview', 1, 1, 1, 2, 3, 4, 'payPalBusinessAccount@gmail.com', '1110604061', ':vimage1', '2020-06-03 16:51:10', 0, '0'),
(15, 7, 'productNam', 2, 3, 3, 'asdas:overview', 1, 1, 1, 1, 2, 3, 'payPalBusinessAccou@gmail.com', '601110604061', ':vimage1', '2020-06-03 16:55:51', 0, '0'),
(16, 2, 'e', 10, 1, 2, 'd', 1, 1, 1, 1, 2, 3, 'businesspersonal@gmail.com', '123', 'Screenshot 2020-05-28 at 7.20.53 PM.png', '2020-06-03 16:58:14', 0, '0'),
(17, 1, 'd123', 10, 3123, 4, 'd123', 1, 1, 1, 3123, 33213, 333123, 'd123@gmail.com', '601110604061123', 'Screenshot 2020-06-01 at 10.54.42 PM.png', '2020-06-06 09:48:46', 0, '0'),
(18, 1, 'm', 7, 123, 4, 'm123', 1, 1, 1, 456, 564, 645, 'm456@gmail.com', '456456456456', 'Screenshot 2020-06-01 at 5.09.21 PM.png', '2020-06-07 06:51:58', 0, '1'),
(19, 1, 'm', 7, 0, 4, 'm', 1, 1, 1, 123, 231, 312, 'm@gmail.com', '12123123123123', 'Screenshot 2020-06-01 at 5.09.21 PM.png', '2020-06-07 06:57:32', 0, '0'),
(20, 1, 'm1', 7, 0, 4, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 1, 1, 1, 123, 231, 312, 'm@gmail.com', '12123123123123', 'Screenshot 2020-06-01 at 5.09.21 PM.png', '2020-06-07 06:59:37', 0, '0'),
(21, 1, 'p123', 10, 1123, 4, 'p1p1p1p123', 1, 1, 1, 11123, 111123, 1111123, 'p123@gmail.com', '456456456456', 'Screenshot 2020-06-05 at 11.07.04 AM.png', '2020-06-07 08:00:41', 0, '1'),
(22, 1, '3', 10, 3, 3, '3', 1, 1, 1, 3, 3, 3, '3@gmail.com', '3', 'Screenshot 2020-06-01 at 2.43.06 PM.png', '2020-06-07 16:23:33', 0, '0'),
(23, 1, 'ipo', 10, 123, 4, 'ipo', 1, 1, 1, 123, 123, 123, 'iop@iop.iop', '123123123213', 'Screenshot 2020-06-01 at 5.09.21 PM.png', '2020-06-10 10:51:51', 0, '0'),
(24, 1, 'ipo', 10, 123, 4, 'ipo', 1, 1, 1, 123, 123, 123, 'iop@iop.iop', '123123123213', 'Screenshot 2020-06-01 at 5.09.21 PM.png', '2020-06-10 10:53:43', 0, '0'),
(25, 1, 'a', 10, 1, 4, 'a', 1, 1, 1, 1, 1, 1, 'a@a.a', '123123123123', '5ee0bf6142fee.png, 5ee0bf61439dc.png, Screenshot 2020-05-28 at 7.20.53 PM.png, Screenshot 2020-06-01 at 5.09.21 PM.png, Screenshot 2020-06-01 at 10.54.16 PM.png', '2020-06-10 11:09:21', 0, '0'),
(26, 1, 'a', 10, 1, 4, 'a', 1, 1, 1, 1, 1, 1, 'jobbusiness@gmail.com', '123123123123', '5ee0c0bbc57a2.png, 5ee0c0bbc5c41.png, Screenshot 2020-05-28 at 7.20.53 PM.png, Screenshot 2020-06-01 at 5.09.21 PM.png, Screenshot 2020-06-01 at 10.54.16 PM.png', '2020-06-10 11:15:07', 0, '0'),
(27, 1, 'z123', 10, 2123, 4, 'z123', 1, 1, 1, 2123, 11123, 111123, 'jobbusiness@gmail.com', '123123123123123', '5ee0ca49e98ed.png, 5ee0ca49ea1c9.png, Screenshot 2020-05-28 at 7.20.53 PM.png, Screenshot 2020-06-01 at 10.54.16 PM.png', '2020-06-10 11:39:13', 0, '0'),
(28, 1, 'qwe', 10, 123, 4, 'qwe', 1, 0, 0, 123, 123, 123, '00zrhun@gmail.com', '601110604061', '5ee60217a2957.png, 5ee60217a2957.png, Screenshot 2020-06-01 at 10.54.42 PM.png', '2020-06-14 11:01:32', 0, '0'),
(29, 1, 'qwe', 10, 123, 4, 'qwe', 1, NULL, NULL, 123, NULL, NULL, '00zrhun@gmail.com', '601110604061', '5ee6039566034.png, Screenshot 2020-06-01 at 10.54.42 PM.png', '2020-06-14 11:01:41', 0, '0'),
(30, 1, 'qwe', 10, 123, 4, 'qwe', 1, NULL, NULL, 123, NULL, NULL, '00zrhun@gmail.com', '601110604061', '5ee604a3f09fd.png, Screenshot 2020-06-01 at 10.54.42 PM.png', '2020-06-14 11:06:11', 0, '0'),
(31, 1, 'qwe', 10, 123, 4, 'qwe', 1, NULL, NULL, 123, NULL, NULL, '00zrhun@gmail.com', '601110604061', '5ee6055a08630.png, Screenshot 2020-06-01 at 10.54.42 PM.png', '2020-06-14 11:09:14', 0, '0'),
(32, 1, 'zxc', 1, 456, 4, 'zxc', 1, 1, 1, 123, 567, 890, 'jobbusinessun@gmail.com', '601110604061', '5ee6066e11e23.png, 5ee6066e12251.png, Screenshot 2020-06-01 at 5.09.21 PM.png, Screenshot 2020-06-01 at 10.54.16 PM.png', '2020-06-14 11:13:50', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL DEFAULT '1',
  `itemId` int(11) NOT NULL,
  `star` int(2) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `userId`, `itemId`, `star`, `timestamp`) VALUES
(1, 1, 20, 5, '2020-06-08 13:40:30'),
(23, 30, 17, 5, '2020-06-08 03:05:21'),
(24, 1, 12, 1, '2020-06-08 06:37:42'),
(25, 1, 6, 4, '2020-06-09 07:13:01'),
(26, 1, 25, 5, '2020-06-14 09:36:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `profile` varchar(120) DEFAULT NULL,
  `firstName` varchar(120) DEFAULT NULL,
  `lastName` varchar(120) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `contactNo` char(13) DEFAULT NULL,
  `dob` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `profile`, `firstName`, `lastName`, `email`, `password`, `contactNo`, `dob`, `address`, `city`, `country`, `regDate`, `updationDate`) VALUES
(1, 'Screenshot 2020-06-01 at 10.54.16 PM.png', 'Zu Rong', 'Hun', '00zrhun@gmail.com', 'e99a18c428cb38d5f260853678922e03', '601110604061', '11/22/16667', 'S-23B, Bukit Batu, 81020 Kulai, Johor.', 'Kulai', 'Malaysia', '2020-06-01 15:39:33', '2020-06-12 13:25:41'),
(2, NULL, 'bc', 'a', 'abc@gmail.com', 'e99a18c428cb38d5f260853678922e03', NULL, NULL, NULL, NULL, NULL, '2020-06-02 00:41:59', '2020-06-02 12:54:06'),
(3, '1.png', ':firstName', ':lastName', 'email@gmail.com', ':password', NULL, NULL, NULL, NULL, NULL, '2020-06-13 14:09:00', NULL),
(4, '7.png', 'trytry', 'try553', 'trytrytry553@gmail.com', 'f1c3744bf6e5c0f5e9985efddbe158f9', NULL, NULL, NULL, NULL, NULL, '2020-06-13 14:09:45', '2020-06-13 14:11:59');

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
-- Indexes for table `images`
--
ALTER TABLE `images`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ads`
--
ALTER TABLE `ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=254;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
