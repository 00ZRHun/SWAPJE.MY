images (

category_id,
image_big,
image_type,
id_album)

CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` varchar(120) NOT NULL,
  `image_big` varchar(120) NOT NULL,
  `image_type` varchar(120) DEFAULT NULL,
  `id_album` varchar(120) DEFAULT NULL,
  `updationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `delmode` varchar(100) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;