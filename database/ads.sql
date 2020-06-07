CREATE TABLE `ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `delmode` varchar(100) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;