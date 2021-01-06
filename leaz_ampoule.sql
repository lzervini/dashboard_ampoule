-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `ampoule`;
CREATE TABLE `ampoule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_changement` date NOT NULL,
  `etage` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `puissance_ampoule` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `marque_ampoule` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `ampoule` (`id`, `date_changement`, `etage`, `position`, `puissance_ampoule`, `marque_ampoule`) VALUES
(38,	'2021-01-14',	'3',	'Haut',	'60W',	'leclerc'),
(30,	'2020-07-27',	'4',	'Entrée',	'60W',	'Philipps'),
(31,	'2020-05-06',	'4',	'droite',	'40W',	'Epistar'),
(33,	'2017-02-21',	'10',	'Droite',	'65W',	'Siemens');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1,	'login',	'password');

-- 2021-01-06 17:33:25
