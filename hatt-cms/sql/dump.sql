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
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `categories_group_id` int(11) unsigned DEFAULT NULL,
  `name` varchar(128) NOT NULL DEFAULT '',
  `is_main` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Показывать на главной',
  `is_show` tinyint(1) NOT NULL DEFAULT '1',
  `sort_index` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_categories_categories_group` (`categories_group_id`),
  CONSTRAINT `FK_categories_categories_group` FOREIGN KEY (`categories_group_id`) REFERENCES `categories_group` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Категории';

-- Дамп данных таблицы hatt.categories: ~4 rows (приблизительно)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `categories_group_id`, `name`, `is_main`, `is_show`, `sort_index`) VALUES
	(1, 1, 'Российские', 1, 1, 0),
	(2, 1, 'Зарубежные', 1, 1, 1),
	(3, 2, 'Российские', 0, 1, 0),
	(4, 2, 'Зарубежные', 0, 1, 0);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Дамп структуры для таблица hatt.categories_group
CREATE TABLE IF NOT EXISTS `categories_group` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `sort_index` int(11) NOT NULL DEFAULT '0',
  `is_show` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы hatt.categories_group: ~3 rows (приблизительно)
/*!40000 ALTER TABLE `categories_group` DISABLE KEYS */;
INSERT INTO `categories_group` (`id`, `name`, `sort_index`, `is_show`) VALUES
	(1, 'Фильмы', 0, 1),
	(2, 'Сериалы', 1, 1),
	(3, 'Музыка', -1, 1);
/*!40000 ALTER TABLE `categories_group` ENABLE KEYS */;


-- Дамп структуры для процедура hatt.create@users
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `create@users`()
BEGIN
	DECLARE _max int unsigned default 5;
	DECLARE _counter int unsigned default 0;
	DECLARE _rnd int unsigned default 1;
--   DECLARE _rnd = FLOOR(0 + (rand() * 65535));


  START TRANSACTION;
  WHILE _counter < _max DO
  	 set _rnd = FLOOR(0 + (rand() * 65535));
    INSERT into users (users.login, users.email, users.pass, users.reg_date, users.level, users.gender, users.birthday)
	 VALUES (CONCAT('user', _rnd), CONCAT('test', _rnd, '@mail.com'), MD5(_rnd), NOW() - INTERVAL 20 YEAR, 0, 0, NOW());
    set _counter=_counter+1;
  end while;
  commit;
END//
DELIMITER ;


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


-- Дамп структуры для таблица hatt.ranks
CREATE TABLE IF NOT EXISTS `ranks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `img_path` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы hatt.ranks: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `ranks` DISABLE KEYS */;
/*!40000 ALTER TABLE `ranks` ENABLE KEYS */;


-- Дамп структуры для таблица hatt.topics
CREATE TABLE IF NOT EXISTS `topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) unsigned DEFAULT NULL,
  `categories_id` int(11) unsigned DEFAULT NULL,
  `name` varchar(255) NOT NULL DEFAULT '',
  `text` text NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `modify_date` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `mod_comment` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_topics_users` (`users_id`),
  KEY `FK_topics_categories` (`categories_id`),
  CONSTRAINT `FK_topics_categories` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `FK_topics_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы hatt.topics: ~5 rows (приблизительно)
/*!40000 ALTER TABLE `topics` DISABLE KEYS */;
INSERT INTO `topics` (`id`, `users_id`, `categories_id`, `name`, `text`, `created_date`, `modify_date`, `status`, `mod_comment`) VALUES
	(1, 1, 1, 'sdfdsf', 'dczdvvdv', NULL, NULL, 1, ''),
	(2, 1, 2, 'sdfdsf', 'dczdvvdv', NULL, NULL, 1, ''),
	(3, 1, 3, 'sdfdsf', 'dczdvvdv', NULL, NULL, 1, ''),
	(4, 1, 1, 'sdfdsf', 'dczdvvdv', NULL, NULL, 1, ''),
	(5, 1, 3, 'sdfdsf', 'dczdvvdv', NULL, NULL, 1, '');
/*!40000 ALTER TABLE `topics` ENABLE KEYS */;


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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы hatt.users: ~1 rows (приблизительно)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `auth_token`, `login`, `email`, `pass`, `reg_date`, `level`, `reg_ip`, `avatar`, `gender`, `birthday`) VALUES
	(1, '59681d9d13ea8da22b0ae003d0152363', 'dimka3210', 'dimka3210@gmail.com', '202cb962ac59075b964b07152d234b70', '2013-12-05 23:47:19', 1, 0, '', '1', '2013-12-05 23:47:28');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;


-- Дамп структуры для таблица hatt.users_groups
CREATE TABLE IF NOT EXISTS `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `color` char(6) NOT NULL DEFAULT 'FFFFFF',
  `ranks_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Группы пользователей';

-- Дамп данных таблицы hatt.users_groups: ~0 rows (приблизительно)
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
