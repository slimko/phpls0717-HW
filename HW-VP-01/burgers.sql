-- Adminer 4.2.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` char(50) COLLATE utf8_bin NOT NULL,
  `name` char(50) COLLATE utf8_bin DEFAULT NULL,
  `telephone` char(11) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `users` (`id`, `email`, `name`, `telephone`) VALUES
(42,	'slimko2008@yandex.ru',	'Иван',	'71232142343'),
(43,	'asdasd@mail.ru',	'adadsas',	'71232131231'),
(45,	'demo@mail.ru',	'Демо',	'71231231233'),
(47,	'sfdsfsf@mail.ru',	'Иван',	'73423424234');

DROP TABLE IF EXISTS `zakaz`;
CREATE TABLE `zakaz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `address` varchar(100) COLLATE utf8_bin NOT NULL,
  `comment` tinytext COLLATE utf8_bin,
  `payment` enum('1','2') COLLATE utf8_bin DEFAULT NULL,
  `callback` set('1') COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `zakaz` (`id`, `user_id`, `address`, `comment`, `payment`, `callback`) VALUES
(65,	43,	'Улица fДом fКорпус fКвартира fЭтажf',	'sdfsf',	'1',	NULL),
(67,	42,	' Улица Молодежная, дом 54, корпус а, квартира 18, этаж9',	'Это комментарий',	'1',	'1'),
(68,	42,	'Улица Улица, дом 23, корпус , квартира , этаж ',	'фывфвы',	NULL,	'1'),
(69,	45,	'Улица Молодежная, дом 32, корпус , квартира , этаж ',	'фывфыв',	'1',	NULL),
(71,	47,	'Улица это улица, дом домчик',	'Коммент',	NULL,	NULL),
(72,	42,	'Улица sdfdsfsd, дом 23, корпус 234, квартира 234, этаж 423',	'asdasdasd',	'1',	'1');

-- 2017-08-23 13:16:11
