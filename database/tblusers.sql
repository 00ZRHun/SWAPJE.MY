-- Database : swapje.sql

-- Table    : tblusers
CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)
INSERT INTO `tblusers` (`id`, `FullName`, `EmailId`, `Password`, `ContactNo`, `dob`, `Address`, `City`, `Country`, `RegDate`, `UpdationDate`) VALUES
(1, 'Anuj Kumar', 'demo@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2147483647', NULL, NULL, NULL, NULL, '2017-06-17 19:59:27', '2017-06-26 21:02:58'),
(2, 'AK', 'anuj@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '8285703354', NULL, NULL, NULL, NULL, '2017-06-17 20:00:49', '2017-06-26 21:03:09'),
(3, 'Anuj Kumar', 'webhostingamigo@gmail.com', 'f09df7868d52e12bba658982dbd79821', '09999857868', '03/02/1990', 'New Delhi', 'New Delhi', 'New Delhi', '2017-06-17 20:01:43', '2017-06-17 21:07:41'),
(4, 'Anuj Kumar', 'test@gmail.com', '5c428d8875d2948607f3e3fe134d71b4', '9999857868', '', 'New Delhi', 'Delhi', 'Delhi', '2017-06-17 20:03:36', '2017-06-26 19:18:14'),
(5, 'test', 'test1@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '9015501898', NULL, NULL, NULL, NULL, '2017-06-29 18:19:08', NULL),
(6, 'php', 'php@gmail.com', '202cb962ac59075b964b07152d234b70', '9015501898', NULL, NULL, NULL, NULL, '2017-07-05 11:06:55', '2017-07-05 11:08:02'),
(7, 'Zu Rong Hun', '00ZRHun@gmail.com', 'e99a18c428cb38d5f260853678922e03', '1110604061', '', '', '', '', '2020-05-22 11:02:12', '2020-05-27 17:33:40'),
(8, 'user1', 'user1@gmail.com', '24c9e15e52afc47c225b757e7bee1f9d', '601110604061', NULL, NULL, NULL, NULL, '2020-05-27 04:08:30', NULL),
(9, 'user1', 'user1@gmail.com', '24c9e15e52afc47c225b757e7bee1f9d', '601110604061', NULL, NULL, NULL, NULL, '2020-05-27 04:30:44', NULL);

