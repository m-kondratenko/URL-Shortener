-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Янв 04 2017 г., 17:43
-- Версия сервера: 5.5.25
-- Версия PHP: 5.6.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `test_umbrella`
--

-- --------------------------------------------------------

--
-- Структура таблицы `urls`
--

CREATE TABLE IF NOT EXISTS `urls` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `longurl` varchar(256) NOT NULL,
  `shorturl` varchar(256) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `count` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Дамп данных таблицы `urls`
--

INSERT INTO `urls` (`id`, `longurl`, `shorturl`, `date`, `count`) VALUES
(5, 'http://redirekt.info/article/pis', 'http://short/rrrg', '2016-12-26 11:51:40', 0),
(2, 'http://php.net/manual/ru/functio', 'http://short/x2', '2016-12-25 14:13:08', 0),
(3, 'http://php.net/manual/ru/functio', 'http://short/9i', '2016-12-26 11:26:18', 0),
(4, 'http://php.net/manual/ru/functio', 'http://short/x5ro', '2016-12-26 11:32:18', 0),
(6, 'http://php.net/manual/ru/reserve', 'http://short/dn2l', '2016-12-27 07:15:33', 0),
(7, 'http://php.net/manual/ru/reserved.variables.server.php', 'http://short/7zb', '2016-12-27 07:28:48', 0),
(8, 'http://php.net/manual/ru/reserved.variables.server.php', 'http://short/cz1jbw', '2016-12-27 07:38:32', 2),
(9, 'http://php.net/manual/ru/reserved.variables.server.php', 'http://short/pips', '2016-12-27 07:54:44', 0),
(10, 'http://php.net/manual/ru/reserved.variables.server.php', 'http://short/0', '2016-12-27 07:56:47', 0),
(11, 'http://php.net/manual/ru/reserved.variables.server.php', 'http://short/f0h5', '2016-12-27 07:57:09', 0),
(12, 'http://php.net/manual/ru/reserved.variables.server.php', 'http://short/a;f;isnvl;asm''al', '2016-12-27 07:58:11', 0),
(13, 'http://php.net/manual/ru/reserved.variables.server.php', 'http://short/ngjlf', '2016-12-27 08:14:55', 0),
(14, 'http://htmlbook.ru/html/input/maxlength', 'http://short/GH', '2016-12-27 08:19:48', 2),
(15, 'http://php.net/manual/ru/errorfunc.configuration.php#ini.log-errors', 'http://short/slrrcrq', '2016-12-27 11:08:10', 0),
(16, 'http://php.net/manual/ru/errorfunc.configuration.php#ini.log-errors', 'http://short/fg', '2016-12-27 11:12:11', 0),
(17, 'http://php.net/manual/ru/language.oop5.decon.php', 'http://short/s', '2016-12-27 12:36:07', 0),
(18, 'http://php.net/manual/ru/language.oop5.decon.php', 'http://short/9psw', '2016-12-27 12:36:12', 0),
(19, 'http://php.net/manual/ru/language.oop5.decon.php', 'http://short/jk', '2016-12-27 12:36:26', 0),
(20, 'http://php.net/manual/ru/language.oop5.decon.php', 'http://short/ghj', '2016-12-27 12:39:23', 0),
(21, 'http://php.net/manual/ru/language.oop5.decon.php', 'http://short/hdff', '2016-12-27 12:40:05', 0),
(22, 'http://forum.ru-board.com/topic.cgi?forum=28&topic=1832', 'http://Short/y7y', '2016-12-29 11:35:13', 0),
(23, 'http://www.cyberforum.ru/javascript-jquery/thread898239.html', 'http://short/oywesi', '2016-12-29 14:53:11', 0),
(24, 'http://ru.stackoverflow.com/questions/334379/post-ajax-%D0%B7%D0%B0%D0%BF%D1%80%D0%BE%D1%81-%D0%BD%D0%B5-%D1%80%D0%B0%D0%B1%D0%BE%D1%82%D0%B0%D0%B5%D1%82', 'http://short/kg8', '2016-12-29 15:07:41', 0),
(25, 'http://hhrd.ru/php5apache/', 'http://short/825u', '2017-01-03 09:41:42', 0),
(26, 'http://hhrd.ru/php5apache/', 'http://short/fgh', '2017-01-03 09:43:30', 1),
(27, 'http://php.net/manual/ru/migration54.incompatible.php', 'http://short/pra0pr', '2017-01-03 10:01:21', 1),
(28, '', 'http://short/enu6', '2017-01-03 10:07:55', 0),
(29, 'http://php.net/manual/ru/migration56.deprecated.php', 'http://short/o4pr1', '2017-01-03 10:08:54', 1),
(30, '', 'http://short/gy', '2017-01-03 10:24:18', 0),
(31, 'http://php.net/manual/ru/migration56.incompatible.php', 'http://short/znkf', '2017-01-03 10:25:58', 1),
(32, 'http://php.net/manual/ru/migration56.incompatible.php', 'http://short/123', '2017-01-04 08:26:51', 1),
(33, 'http://php.net/', '7', '2017-01-04 11:46:22', 0),
(34, 'http://php.net/', 'zz', '2017-01-04 12:13:40', 0),
(35, 'http://dayzrussia.com/wiki/index.php?title=DayZ_Russia_Wiki', '22l', '2017-01-04 14:42:25', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
