<br />
<b>Warning</b>:  "continue" targeting switch is equivalent to "break". Did you mean to use "continue 2"? in <b>C:\laragon\etc\apps\adminer\index.php</b> on line <b>1170</b><br />
-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `my_first_db` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `my_first_db`;

DROP TABLE IF EXISTS `contact_info`;
CREATE TABLE `contact_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `whatsapp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discord` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `contact_info` (`id`, `user_id`, `phone`, `email`, `whatsapp`, `discord`, `instagram`, `facebook`, `twitter`) VALUES
(1,	'VisuardPlus_3',	'08115747001',	'irvingtans@iclub.com',	'08115747001',	'iping#1386 ',	'@irvingtandra',	'irvingtandra',	'irvingtan'),
(2,	'VisuardPlus_1',	'087725062002',	'trypaanjagi@gmail.com',	'087725062002',	'agilelo#2506',	'@aditya.t.a',	'sensor art',	'visuard_plus'),
(3,	'VisuardPlus_2',	'08882926992',	'christiansenbrian99@gmail.com',	'08882926992',	'Brian_tjan#4190',	'b_tjan',	'brian tjan',	'brian tjan');

DROP TABLE IF EXISTS `master_tbl_nationality`;
CREATE TABLE `master_tbl_nationality` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nationality` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `master_tbl_nationality` (`id`, `nationality`) VALUES
(1,	'Alfheim'),
(2,	'Asgard'),
(3,	'Centuri-Six'),
(4,	'Conjunction'),
(5,	'Drez-Lar'),
(6,	'Earth'),
(7,	'Ego'),
(8,	'Harokin'),
(9,	'Jotunheim'),
(10,	'Korbin'),
(11,	'Leitner'),
(12,	'Xandar'),
(13,	'Vanaheim'),
(14,	'Terma'),
(15,	'Titan'),
(16,	'Sakaar'),
(17,	'Sivos'),
(18,	'Skrullos'),
(19,	'Svartalfheim'),
(20,	'Orex ll');

DROP TABLE IF EXISTS `master_tbl_race`;
CREATE TABLE `master_tbl_race` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `race` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `master_tbl_race` (`id`, `race`) VALUES
(1,	'Alflololian'),
(2,	'Aspan'),
(3,	'Bagoulin'),
(4,	'Boulan-Bathor'),
(5,	'Bromosaur'),
(6,	'Furutz'),
(7,	'Glamopod'),
(8,	'Goumon'),
(9,	'Groubos'),
(10,	'K-Tron'),
(11,	'Woloch'),
(12,	'Tüm Tüm de Lüm'),
(13,	'Talam'),
(14,	'Zypanon'),
(15,	'Zool'),
(16,	'Shingouz'),
(17,	'Schamil'),
(18,	'Rour'),
(19,	'Omelite'),
(20,	'Marmaka');

DROP TABLE IF EXISTS `my_classmate`;
CREATE TABLE `my_classmate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_character` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(2) NOT NULL,
  `height` decimal(42,0) NOT NULL,
  `race` int(11) NOT NULL,
  `nationality` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `my_classmate` (`id`, `first_character`, `last_name`, `age`, `height`, `race`, `nationality`) VALUES
(1,	'Thanos',	'son of A\'lars',	65,	211,	6,	5),
(2,	'Peter',	'Son of Ego',	30,	180,	4,	7),
(3,	'Nebula',	'Son of Thanos',	46,	186,	15,	11),
(4,	'Gamora',	'Son of Thanos',	66,	181,	15,	11),
(5,	'Peter',	'Parker',	18,	181,	19,	5),
(6,	'Ben',	'Grimm',	45,	176,	12,	6),
(7,	'Susan',	'Storm',	30,	175,	16,	6),
(8,	'Johnny',	'Storm',	30,	184,	11,	6),
(9,	'Kevin',	'Feige',	45,	182,	18,	6),
(10,	'Johnny',	'Blaze',	43,	180,	17,	6),
(11,	'Charlex',	'Xavier',	65,	174,	14,	6),
(12,	'Kitty',	'Pride',	25,	165,	11,	6),
(13,	'Kang',	'The Conqueror',	99,	183,	9,	6),
(14,	'Arnim',	'Zola',	58,	170,	3,	5),
(15,	'Cull',	'Obsidian',	99,	185,	2,	4);

DROP TABLE IF EXISTS `personal_data`;
CREATE TABLE `personal_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `profession` int(11) NOT NULL,
  `born` date NOT NULL,
  `base` int(11) NOT NULL,
  `height` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `blood` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `achievement` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quote` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bg_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `personal_data` (`id`, `user_id`, `name`, `profession`, `born`, `base`, `height`, `blood`, `achievement`, `quote`, `bg_image`) VALUES
(1,	'VisuardPlus_3',	'Irving Tandra',	12,	'2002-10-31',	26,	'180 cm / 6ft 9in',	'O',	'Gold Medalist #SamaSamaBelajar',	'Work hard and be brave',	'13'),
(2,	'VisuardPlus_1',	'Agilelo',	5,	'2002-06-25',	6,	'175 cm / 5ft 9in',	'B',	'West Java Short Movie Winner',	'With money we\'re happy',	'2'),
(3,	'VisuardPlus_2',	'Brian Christiansen',	17,	'1999-01-01',	15,	'178 cm / 6ft',	'B',	'Being a human',	'Murphy\'s law: anything that can go wrong will go wrong',	'6');

DROP TABLE IF EXISTS `user_base`;
CREATE TABLE `user_base` (
  `number` int(11) NOT NULL AUTO_INCREMENT,
  `City` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`number`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `user_base` (`number`, `City`) VALUES
(1,	'Jakarta'),
(2,	'Depok'),
(3,	'Tangerang'),
(4,	'Bekasi'),
(5,	'Bogor'),
(6,	'Bandung'),
(7,	'Garut'),
(8,	'Tasikmalaya'),
(9,	'Sumedang'),
(10,	'Sukabumi'),
(11,	'Cirebon'),
(12,	'Plotot'),
(13,	'Sumur'),
(14,	'Semarang'),
(15,	'Solo'),
(16,	'Magelang'),
(17,	'Kendal'),
(18,	'Pekalongan'),
(19,	'Sukoharjo'),
(20,	'Kartasura'),
(21,	'Yogyakarta'),
(22,	'Surabayar'),
(23,	'Banyumas'),
(24,	'Pubalingga'),
(25,	'Madura'),
(26,	'Pontianak'),
(27,	'Ketapang'),
(28,	'Singkawang'),
(29,	'Sambas'),
(30,	'Purun'),
(31,	'Kakap'),
(32,	'Punggur'),
(33,	'Kubu Raya');

DROP TABLE IF EXISTS `user_portfolio`;
CREATE TABLE `user_portfolio` (
  `id` int(11) NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `user_portfolio` (`id`, `user_id`, `image`, `date`, `title`, `description`) VALUES
(1,	'VisuardPlus_1',	'assets/2 Sided Fear.jpeg',	'2022-08-08',	'2 Sided Fear',	'Many of people have fears inside of them but not knowing how to show them or even cover their fears, they just afraid to let the fear take control of them'),
(2,	'VisuardPlus_1',	'assets/Nevermind.jpeg',	'2022-08-08',	'Nevermind',	'Honestly just nevermind about the meaning, enjoy the visual tho'),
(3,	'VisuardPlus_1',	'assets/Inner demon.jpeg',	'2022-08-08',	'Inner demon',	'Inner demon can be violent but also can be useful to other people, including yourself'),
(4,	'VisuardPlus_1',	'assets/Three Formats.jpeg',	'2022-08-08',	'Three Formats',	'Not only one thing can be one, but it can be multiple things in a different formats and style to it'),
(5,	'VisuardPlus_1',	'assets/Old modern.jpeg',	'2022-08-08',	'Old modern',	'The same time but capture in the past time'),
(6,	'VisuardPlus_2',	'assets/brian 1.jpg',	'2022-08-08',	'Skeleton concept',	'my portfolio consists of some image from my previous project with friends. this one is a concept of skeleton and inner organs of a species from the fictional world we made.'),
(7,	'VisuardPlus_2',	'assets/brian 2.jpg',	'2022-08-08',	'Scene 4-best moment',	'as the title said, it\'s the best moment for the 3 characters, it\'e the last time they hang out together before the catasthrope comes. this is scene 4, or the beginning of the story.'),
(8,	'VisuardPlus_2',	'assets/brian 3.jpg',	'2022-08-08',	'Big city',	'yes, it IS a big city, it\'s where the main character lives.'),
(9,	'VisuardPlus_2',	'assets/brian 4.jpg',	'2022-08-08',	'Cover-my best work',	'this is my best work, and because of it, i put it in the cover to show people what is this story about. it\'s about a murder of the highest leader of the universe.'),
(10,	'VisuardPlus_2',	'assets/brian 5.jpg',	'2022-08-08',	'Running scene',	'running scene is very common in any other story, here too, the story requires one action scene, so here it is... ta da!'),
(11,	'VisuardPlus_3',	'assets/beach.jpg',	'Bali, July 2022',	'Chill',	'A beach is a narrow, gently sloping strip of land that lies along the edge of an ocean, lake, or river. Materials such as sand, pebbles, rocks, and seashell fragments cover beaches.'),
(12,	'VisuardPlus_3',	'assets/deepinside.jpg',	'Pontianak, July 2020',	'extraterrestrial',	'This is a macro photo of a bubble in soap created. The idea from this photo originated from the time of the pandemic, people were required to wash their hands all the time.'),
(13,	'VisuardPlus_3',	'assets/foam.jpg',	'Pontianak, August 2020',	'Abstract',	'This photo is taken 1 month after I took the hand soap bubbles. The vibrant blue color is generated by the UV flashing through the window and that is a rare event right there.'),
(14,	'VisuardPlus_3',	'assets/ricefields.jpg',	'Bali, July 2022',	'Nature',	'The rice field is usually a successor of shallow marshes or a lowland area which can be supplied with adequate water.'),
(15,	'VisuardPlus_3',	'assets/Sunset.jpg',	'Pontianak, february 2018',	'Every sunset brings the promise of a new dawn.',	'Sundown, is the daily disappearance of the Sun below the horizon due to Earth\'s rotation. As viewed from everywhere on Earth (except the North and South poles), the equinox Sun sets due west at the moment of both the Spring and Autumn equinox.');

DROP TABLE IF EXISTS `user_profession`;
CREATE TABLE `user_profession` (
  `number` int(11) NOT NULL AUTO_INCREMENT,
  `profession` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`number`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `user_profession` (`number`, `profession`) VALUES
(1,	'Slave'),
(2,	'UI/UX Designer'),
(3,	'Photographer'),
(4,	'Graphic Designer'),
(5,	'Motion Graphic Designer'),
(6,	'Video Editor'),
(7,	'VFX Editor'),
(8,	'Military Officer'),
(9,	'Interior Designer'),
(10,	'Wendy\'s Cashier'),
(11,	'Janitor'),
(12,	'Tank Driver'),
(13,	'Esport Athlete'),
(14,	'Sleeping Athlete'),
(15,	'Baskin Robbin tester'),
(16,	'Part time Traveler'),
(17,	'Professional Killer'),
(18,	'Pest Controller'),
(19,	'OLX seller'),
(20,	'Tiktoker'),
(21,	'CEO of Heartbroken'),
(22,	'Part time Navy'),
(23,	'Pirates');

-- 2022-09-12 02:20:05
