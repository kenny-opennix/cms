-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.5.34-0ubuntu0.13.10.1 - (Ubuntu)
-- ОС Сервера:                   debian-linux-gnu
-- HeidiSQL Версия:              8.1.0.4640
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Дамп структуры базы данных hatt
CREATE DATABASE IF NOT EXISTS `hatt` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `hatt`;


-- Дамп структуры для таблица hatt.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL DEFAULT '',
  `is_main` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Показывать на главной',
  `order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Категории';

-- Дамп данных таблицы hatt.categories: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `is_main`, `order`) VALUES
	(1, 'Первая категория', 1, 0),
	(2, 'Вторая категория', 1, 1),
	(3, 'Категория с новостями', 0, 0);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Дамп структуры для таблица hatt.news
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) unsigned DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `text` varchar(255) NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_news_users` (`users_id`),
  CONSTRAINT `FK_news_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы hatt.news: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;


-- Дамп структуры для таблица hatt.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `auth_token` char(32) DEFAULT NULL,
  `login` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `reg_date` datetime NOT NULL,
  `level` tinyint(1) NOT NULL DEFAULT '0',
  `reg_ip` int(1) NOT NULL DEFAULT '0',
  `avatar` varchar(255) DEFAULT NULL,
  `gender` enum('0','1','2') NOT NULL DEFAULT '0',
  `birthday` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `auth_token` (`auth_token`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы hatt.users: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `auth_token`, `login`, `email`, `pass`, `reg_date`, `level`, `reg_ip`, `avatar`, `gender`, `birthday`) VALUES
	(1, 'adb41b6dd62ff97b50741762d2cce98e', 'dimka3210', 'dimka3210@gmail.com', '202cb962ac59075b964b07152d234b70', '2013-12-05 23:47:19', 1, 0, '', '1', '2013-12-05 23:47:28'),
	(2, NULL, '123', '', '', '0000-00-00 00:00:00', 0, 0, NULL, '0', '0000-00-00 00:00:00'),
	(4, 'cdec3d1ee82ddb07f7de11005d5f87d5', 'dimka32101', 'dimka3210@gmail.com1', '202cb962ac59075b964b07152d234b70', '2013-12-05 23:47:19', 1, 0, '', '1', '2013-12-05 23:47:28');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
