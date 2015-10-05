-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Окт 05 2015 г., 09:28
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `base`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `admin`
--

INSERT INTO `admin` (`id`, `login`, `password`) VALUES
(1, 'admin', '5e82af769bc15620147d2dbc8b07111e');

-- --------------------------------------------------------

--
-- Структура таблицы `kiev`
--

CREATE TABLE IF NOT EXISTS `kiev` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `kiev`
--

INSERT INTO `kiev` (`id`, `message`, `name`) VALUES
(2, 'привет', 'admin'),
(3, 'Привет!', 'sergey'),
(4, 'Как дела?', 'admin'),
(5, 'Нормально', 'sergey'),
(6, 'А у тебя?', 'sergey'),
(7, 'Тоже ниче', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `online`
--

CREATE TABLE IF NOT EXISTS `online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `putda` datetime NOT NULL,
  `user` varchar(255) NOT NULL,
  `id_session` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `putda` (`putda`),
  KEY `putda_2` (`putda`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=45 ;

--
-- Дамп данных таблицы `online`
--

INSERT INTO `online` (`id`, `putda`, `user`, `id_session`) VALUES
(43, '2015-10-05 08:44:11', 'sergey', '20871q6er0q0ibl552c45n25u0'),
(44, '2015-10-05 09:02:35', 'admin', '6p2hm3lbfddfd8vhvtnlcub096');

-- --------------------------------------------------------

--
-- Структура таблицы `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enName` varchar(255) NOT NULL,
  `rusName` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `room`
--

INSERT INTO `room` (`id`, `enName`, `rusName`) VALUES
(4, 'kiev', 'Киев');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(11, 'sergey', '5e82af769bc15620147d2dbc8b07111e');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
