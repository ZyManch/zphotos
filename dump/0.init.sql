-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 09 2014 г., 18:58
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- База данных: `zphotos`
--

-- --------------------------------------------------------

--
-- Структура таблицы `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `address` int(11) NOT NULL,
  `comment` text NOT NULL,
  `status` enum('Active','Blocked','Deleted') NOT NULL DEFAULT 'Active',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `good_id` int(10) unsigned NOT NULL,
  `name` varchar(64) NOT NULL,
  `status` enum('Active','Blocked','Deleted') NOT NULL DEFAULT 'Active',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `good_id` (`good_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Дамп данных таблицы `album`
--

INSERT INTO `album` (`id`, `user_id`, `good_id`, `name`, `status`, `changed`) VALUES
(7, 1, 1, 'Фотографии 2014-06-07', 'Active', '2014-08-03 15:10:16'),
(8, 1, 1, 'Фотографии 2014-06-07', 'Active', '2014-08-03 15:10:16'),
(9, 1, 1, 'Фотографии 2014-06-07', 'Active', '2014-08-03 15:10:16'),
(10, 1, 1, 'Фотографии 2014-06-07', 'Active', '2014-08-03 15:10:16'),
(11, 1, 1, 'Фотографии 2014-06-07', 'Active', '2014-08-03 15:10:16'),
(12, 1, 1, 'Фотографии 2014-06-07', 'Active', '2014-08-03 15:10:16'),
(13, 1, 1, 'Фотографии 2014-06-07', 'Active', '2014-08-03 15:10:16'),
(14, 1, 1, 'Фотографии 2014-06-07', 'Active', '2014-08-03 15:10:16'),
(15, 1, 1, 'Фотографии 2014-06-07', 'Active', '2014-08-03 15:10:16'),
(16, 1, 1, 'Фотографии 2014-06-07', 'Active', '2014-08-03 15:10:16'),
(17, 1, 1, 'Фотографии 2014-06-08', 'Active', '2014-08-03 15:10:16'),
(18, 1, 1, 'Фотографии 2014-06-08', 'Active', '2014-08-03 15:10:16'),
(19, 1, 1, 'Фотографии 2014-06-08', 'Active', '2014-08-03 15:10:16'),
(20, 1, 1, 'Фотографии 2014-06-08', 'Active', '2014-08-03 15:10:16'),
(21, 1, 1, 'Фотографии 2014-06-08', 'Active', '2014-08-03 15:10:16'),
(22, 1, 1, 'Фотографии 2014-06-10', 'Active', '2014-08-03 15:10:16'),
(23, 1, 1, 'Фотографии 2014-06-11', 'Active', '2014-08-03 15:10:16'),
(24, 1, 1, 'Фотографии 2014-06-17', 'Active', '2014-08-03 15:10:16'),
(25, 1, 1, 'Фотографии 2014-06-17', 'Active', '2014-08-03 15:10:16'),
(26, 1, 1, 'Фотографии 2014-06-17', 'Active', '2014-08-03 15:10:16'),
(27, 1, 1, 'Фотографии 2014-06-17', 'Active', '2014-08-03 15:10:16'),
(28, 1, 1, 'Фотографии 2014-06-17', 'Active', '2014-08-03 15:10:16'),
(29, 1, 1, 'Фотографии 2014-06-17', 'Active', '2014-08-03 15:10:16'),
(30, 1, 1, 'Фотографии 2014-06-17', 'Active', '2014-08-03 15:10:16'),
(31, 1, 1, 'Фотографии 2014-06-17', 'Active', '2014-08-03 15:10:16'),
(32, 1, 1, 'Фотографии 2014-06-22', 'Active', '2014-08-03 15:10:16'),
(33, 2, 1, 'Фотографии 2014-06-22', 'Active', '2014-08-03 15:10:16'),
(34, 2, 1, 'Фотографии 2014-07-06', 'Active', '2014-08-03 15:10:16'),
(35, 2, 1, 'Фотографии 2014-07-13', 'Active', '2014-08-03 15:10:16'),
(36, 3, 1, 'Фотографии 2014-08-02', 'Active', '2014-08-03 15:10:16'),
(37, 3, 4, 'Фотографии 2014-08-02', 'Active', '2014-08-03 15:10:16'),
(38, 3, 1, 'Фотографии 2014-08-03', 'Active', '2014-08-03 15:10:16'),
(39, 3, 1, 'Фотографии 2014-08-03', 'Active', '2014-08-03 15:49:46'),
(40, 3, 1, 'Фотографии 2014-08-03', 'Active', '2014-08-03 15:50:18'),
(41, 3, 1, 'Фотографии 2014-08-03', 'Active', '2014-08-03 15:51:49'),
(42, 3, 1, 'Фотографии 2014-08-03', 'Active', '2014-08-03 17:07:05'),
(43, 3, 1, 'Фотографии 2014-08-03', 'Active', '2014-08-03 17:08:51'),
(44, 3, 6, 'Фотографии 2014-08-03', 'Active', '2014-08-03 17:09:42'),
(45, 4, 1, 'Фотографии 2014-09-08', 'Active', '2014-09-08 06:25:00'),
(46, 7, 2, 'Фотографии 2014-09-08', 'Active', '2014-11-03 06:31:11'),
(47, 7, 1, 'Фотографии 2014-09-08', 'Active', '2014-11-03 06:31:11'),
(48, 7, 1, 'Фотографии 2014-09-17', 'Active', '2014-11-03 06:31:11');

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(128) NOT NULL,
  `progress` enum('Filling','Purchased','Printing','Printed','Postage','Finished') NOT NULL DEFAULT 'Filling',
  `address_id` int(10) unsigned DEFAULT NULL,
  `status` enum('Active','Blocked','Deleted') NOT NULL DEFAULT 'Active',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `address_id` (`address_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `title`, `progress`, `address_id`, `status`, `changed`) VALUES
(1, 3, 'Покупка от 2014-08-16', 'Purchased', NULL, 'Active', '2014-08-23 10:11:45'),
(3, 3, 'Покупка от 2014-08-23', 'Filling', NULL, 'Active', '2014-08-23 10:43:57'),
(4, 7, 'Покупка от 2014-09-08', 'Purchased', NULL, 'Active', '2014-11-03 06:31:20'),
(5, 7, 'Покупка от 2014-09-08', 'Purchased', NULL, 'Active', '2014-11-03 06:31:20'),
(6, 7, 'Покупка от 2014-09-13', 'Purchased', NULL, 'Active', '2014-11-03 06:31:20');

-- --------------------------------------------------------

--
-- Структура таблицы `cart_has_good`
--

CREATE TABLE IF NOT EXISTS `cart_has_good` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cart_id` int(10) unsigned NOT NULL,
  `good_id` int(10) unsigned NOT NULL,
  `resource_id` int(10) unsigned DEFAULT NULL,
  `count` int(10) unsigned NOT NULL,
  `total_price` decimal(6,2) NOT NULL,
  `status` enum('Active','Blocked','Deleted') NOT NULL DEFAULT 'Active',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `cart_id` (`cart_id`),
  KEY `good_id` (`good_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `cart_has_good`
--

INSERT INTO `cart_has_good` (`id`, `cart_id`, `good_id`, `resource_id`, `count`, `total_price`, `status`, `changed`) VALUES
(2, 1, 13, NULL, 15, '30.00', 'Active', '2014-08-23 07:54:13'),
(3, 3, 1, 36, 1, '28.80', 'Active', '2014-08-23 11:25:12'),
(4, 3, 1, 38, 2, '9.60', 'Active', '2014-08-23 11:26:01'),
(5, 3, 13, NULL, 2, '4.00', 'Active', '2014-08-23 14:56:04'),
(6, 4, 1, 47, 1, '2.40', 'Active', '2014-09-08 08:11:23'),
(8, 5, 2, 46, 2, '28.80', 'Active', '2014-09-13 05:42:02'),
(9, 6, 1, 48, 1, '9.60', 'Active', '2014-09-17 07:21:48');

-- --------------------------------------------------------

--
-- Структура таблицы `cart_has_good_count`
--

CREATE TABLE IF NOT EXISTS `cart_has_good_count` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cart_has_good_id` int(10) unsigned NOT NULL,
  `good_count_id` int(10) unsigned NOT NULL,
  `count` int(10) unsigned NOT NULL,
  `status` enum('Active','Blocked','Deleted') NOT NULL DEFAULT 'Active',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `cart_has_good_id` (`cart_has_good_id`),
  KEY `good_count_id` (`good_count_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Дамп данных таблицы `cart_has_good_count`
--

INSERT INTO `cart_has_good_count` (`id`, `cart_has_good_id`, `good_count_id`, `count`, `status`, `changed`) VALUES
(2, 2, 1, 3, 'Deleted', '2014-08-23 07:34:49'),
(10, 2, 1, 1, 'Active', '2014-08-23 07:44:41'),
(11, 2, 1, 3, 'Active', '2014-08-23 07:45:05'),
(12, 2, 1, 3, 'Active', '2014-08-23 07:54:29'),
(13, 2, 1, 3, 'Active', '2014-08-23 07:55:06'),
(14, 2, 1, 3, 'Active', '2014-08-23 07:57:18'),
(15, 2, 1, 1, 'Active', '2014-08-23 07:58:11'),
(16, 2, 1, 1, 'Active', '2014-08-23 07:58:58'),
(17, 3, 3, 1, 'Deleted', '2014-08-23 11:25:12'),
(18, 4, 3, 1, 'Active', '2014-08-23 11:26:01'),
(19, 3, 3, 1, 'Deleted', '2014-08-23 14:20:59'),
(20, 3, 3, 1, 'Deleted', '2014-08-23 14:31:23'),
(21, 4, 3, 1, 'Active', '2014-08-23 14:43:16'),
(22, 5, 1, 1, 'Active', '2014-08-23 14:56:04'),
(23, 5, 1, 1, 'Active', '2014-08-23 14:56:14'),
(24, 3, 3, 1, 'Active', '2014-08-23 14:58:17'),
(25, 6, 3, 1, 'Active', '2014-09-08 08:11:23'),
(27, 8, 4, 1, 'Active', '2014-09-13 05:42:02'),
(28, 8, 4, 1, 'Active', '2014-09-13 05:42:02'),
(29, 9, 3, 1, 'Active', '2014-09-17 07:21:48');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `image` varchar(128) DEFAULT NULL,
  `description` text NOT NULL,
  `parent_id` int(10) unsigned DEFAULT NULL,
  `status` enum('Active','Blocked','Deleted') NOT NULL DEFAULT 'Active',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`, `image`, `description`, `parent_id`, `status`, `changed`) VALUES
(1, 'Товары для офиса', 'office.png', 'Различные товары необходимые для офиса: папки, бумага для печати и другие мелкие канцелярские предметы', NULL, 'Active', '2014-08-02 06:43:28'),
(2, 'Товары для школы', 'school.png', 'Различные товары которые могут пригодиться вашему ребенку в школе: тетради, дневники, ручки, карандаши итд', NULL, 'Active', '2014-08-02 06:42:27'),
(3, 'Папки', 'folder.png', 'Папки картонные, на кольцах, с вкладышами, скоросшиватели и папки-регистраторы', 1, 'Active', '2014-08-02 07:51:41'),
(4, 'Бумага', 'paper.png', 'Бумага для печати на принтерах', 1, 'Active', '2014-08-02 06:51:53'),
(5, 'Ножницы, ножи', 'cut.png', 'Ножи и ножницы для бумаги и картона', 1, 'Active', '2014-08-02 07:29:07'),
(6, 'Блокноты', 'notepad.png', 'Различные блокноты и бумаги для заметок', 1, 'Active', '2014-08-02 07:53:53'),
(7, 'Степлеры, скобы, антистеплеры', 'stapler.png', 'Степлеры различной мощности, скобы для них и антистеплеры', 1, 'Active', '2014-08-02 07:23:59'),
(8, 'Скрепки, кнопки, зажимы', 'clip.png', 'Мелкие канцтовары для скрепления листов', 1, 'Active', '2014-08-02 07:31:32'),
(9, 'Клей', 'glue.png', 'Клей ПВА, \nклеящие карандаши, \nклей жидкий канцелярский', 1, 'Active', '2014-08-02 06:53:30'),
(10, 'Ручки', 'pen.png', 'Шариковые и гелевые ручки', 1, 'Active', '2014-08-02 07:29:31'),
(11, 'Карандаши', 'pencil.png', 'Карандаши для черчения и рисования', 1, 'Active', '2014-08-02 07:27:22'),
(12, 'Тетради', 'notebook.png', 'Тетради в клетку, линейку, общие и блочные тетради, обложки для них', 2, 'Active', '2014-08-02 07:26:01'),
(13, 'Дневники', 'diary.png', 'Различные школные дневники', 2, 'Active', '2014-08-02 07:28:10'),
(14, 'Клей', 'glue.png', 'Клей ПВА, \nклеящие карандаши, \nклей жидкий канцелярский', 2, 'Active', '2014-08-02 06:53:32'),
(15, 'Ручки', 'pen.png', 'Шариковые и гелевые ручки', 2, 'Active', '2014-08-02 07:29:33'),
(16, 'Карандаши', 'pencil.png', 'Карандаши для черчения и рисования', 2, 'Active', '2014-08-02 07:27:34'),
(17, 'Фломастеры', 'marker.png', 'Фломастеры для рисования и маркеры', 2, 'Active', '2014-08-02 07:34:44'),
(18, 'Печать', 'printer.png', 'Печать на бумаге: фотографии, дипломы, рефераты, документы', NULL, 'Active', '2014-08-02 06:51:01'),
(19, 'Фотографии', 'photos.png', 'Печать фотографий 10х15, 13x18, 15x21, 21x29,7 в глянцевом и матовом формате', 18, 'Active', '2014-08-02 14:16:03'),
(20, 'Обычная печать', 'print_easy.png', 'Печать рефератов, дипломных работ на листах А4,А5 в цвете и в черно белом формате', 18, 'Active', '2014-08-02 07:34:03'),
(21, 'Визитки', 'cutaway.png', 'Различные визитки', 18, 'Active', '2014-10-04 12:58:46');

-- --------------------------------------------------------

--
-- Структура таблицы `category_has_good`
--

CREATE TABLE IF NOT EXISTS `category_has_good` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `good_id` int(10) unsigned NOT NULL,
  `status` enum('Active','Blocked','Deleted') NOT NULL DEFAULT 'Active',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `good_id` (`good_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Дамп данных таблицы `category_has_good`
--

INSERT INTO `category_has_good` (`id`, `category_id`, `good_id`, `status`, `changed`) VALUES
(1, 19, 1, 'Active', '2014-08-02 08:11:31'),
(2, 19, 2, 'Active', '2014-08-02 14:10:15'),
(3, 19, 3, 'Active', '2014-08-02 14:10:15'),
(4, 19, 4, 'Active', '2014-08-02 14:10:15'),
(5, 19, 5, 'Active', '2014-08-02 14:10:15'),
(6, 19, 6, 'Active', '2014-08-02 14:10:15'),
(7, 19, 7, 'Active', '2014-08-02 14:10:15'),
(8, 19, 8, 'Active', '2014-08-02 14:10:15'),
(9, 20, 9, 'Active', '2014-08-02 15:12:00'),
(10, 20, 10, 'Active', '2014-08-02 15:12:00'),
(11, 20, 11, 'Active', '2014-08-02 15:12:10'),
(12, 20, 12, 'Active', '2014-08-02 15:12:10'),
(13, 12, 13, 'Active', '2014-08-05 15:39:56'),
(14, 21, 14, 'Active', '2014-09-13 04:15:48'),
(15, 21, 15, 'Active', '2014-10-04 13:23:33'),
(16, 21, 16, 'Active', '2014-10-04 13:23:33'),
(17, 21, 17, 'Active', '2014-10-04 13:23:33'),
(18, 21, 18, 'Active', '2014-10-04 13:23:33'),
(19, 21, 19, 'Active', '2014-10-04 13:23:33'),
(20, 21, 20, 'Active', '2014-10-04 13:23:33'),
(21, 21, 21, 'Active', '2014-10-04 13:23:33'),
(22, 21, 22, 'Active', '2014-10-04 13:23:33'),
(23, 21, 23, 'Active', '2014-10-04 13:23:33'),
(24, 21, 24, 'Active', '2014-10-04 13:23:33'),
(25, 21, 25, 'Active', '2014-10-04 13:23:33'),
(26, 21, 26, 'Active', '2014-10-04 13:23:33'),
(27, 21, 27, 'Active', '2014-10-04 13:23:33'),
(28, 21, 28, 'Active', '2014-10-04 13:23:33'),
(29, 21, 29, 'Active', '2014-10-04 13:23:33'),
(30, 21, 30, 'Active', '2014-10-04 13:23:33'),
(31, 21, 31, 'Active', '2014-10-04 13:23:33'),
(32, 21, 32, 'Active', '2014-10-04 13:23:33'),
(33, 21, 33, 'Active', '2014-10-04 13:23:33'),
(34, 21, 34, 'Active', '2014-10-04 13:23:33'),
(35, 21, 35, 'Active', '2014-10-04 13:23:33'),
(36, 21, 36, 'Active', '2014-10-04 13:23:33'),
(37, 21, 37, 'Active', '2014-10-04 13:23:33'),
(38, 21, 38, 'Active', '2014-10-04 13:23:33'),
(39, 21, 39, 'Active', '2014-10-04 13:23:33'),
(40, 21, 40, 'Active', '2014-10-04 13:23:33'),
(41, 21, 41, 'Active', '2014-10-04 13:23:33'),
(42, 21, 42, 'Active', '2014-10-04 13:23:33'),
(43, 21, 43, 'Active', '2014-10-04 13:23:33'),
(44, 21, 44, 'Active', '2014-10-04 13:24:01'),
(45, 21, 45, 'Active', '2014-10-04 13:24:20'),
(46, 21, 46, 'Active', '2014-10-04 13:24:20'),
(47, 21, 47, 'Active', '2014-10-04 13:24:30'),
(48, 21, 48, 'Active', '2014-10-04 13:24:30'),
(49, 21, 49, 'Active', '2014-10-04 14:20:58');

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `status` enum('Active','Blocked','Deleted') NOT NULL DEFAULT 'Active',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `city`
--

INSERT INTO `city` (`id`, `name`, `status`, `changed`) VALUES
(1, 'Набережные Челны', 'Active', '2014-11-09 12:39:00');

-- --------------------------------------------------------

--
-- Структура таблицы `coupon`
--

CREATE TABLE IF NOT EXISTS `coupon` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hash` varchar(64) NOT NULL,
  `cart_id` int(10) unsigned DEFAULT NULL,
  `expired` timestamp NULL DEFAULT NULL,
  `status` enum('Active','Blocked','Deleted') NOT NULL DEFAULT 'Active',
  `Active` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `cart_id` (`cart_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `coupon`
--

INSERT INTO `coupon` (`id`, `hash`, `cart_id`, `expired`, `status`, `Active`) VALUES
(1, 'asdasdasdwerqwerqwerqwerqw', NULL, '2014-06-22 08:04:25', 'Active', '2014-06-22 08:04:25');

-- --------------------------------------------------------

--
-- Структура таблицы `cutaway`
--

CREATE TABLE IF NOT EXISTS `cutaway` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `good_id` int(10) unsigned NOT NULL,
  `cutaway_template_id` int(10) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `status` enum('Active','Blocked','Deleted') NOT NULL DEFAULT 'Active',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `cutaway_template_id` (`cutaway_template_id`),
  KEY `user_id` (`user_id`),
  KEY `good_id` (`good_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `cutaway`
--

INSERT INTO `cutaway` (`id`, `good_id`, `cutaway_template_id`, `user_id`, `status`, `changed`) VALUES
(1, 14, 1, 7, 'Active', '2014-11-03 06:30:53'),
(2, 22, 9, 7, 'Active', '2014-11-03 06:30:53'),
(3, 15, 2, 7, 'Active', '2014-11-03 06:30:53'),
(4, 16, 3, 7, 'Active', '2014-11-03 06:30:53'),
(5, 17, 4, 7, 'Active', '2014-11-03 06:30:53'),
(6, 18, 5, 7, 'Active', '2014-11-03 06:30:53'),
(7, 19, 6, 7, 'Active', '2014-11-03 06:30:53'),
(8, 20, 7, 7, 'Active', '2014-11-03 06:30:53'),
(9, 21, 8, 7, 'Active', '2014-11-03 06:30:53'),
(10, 23, 10, 7, 'Active', '2014-11-03 06:30:53'),
(11, 24, 11, 7, 'Active', '2014-11-03 06:30:53'),
(12, 25, 12, 7, 'Active', '2014-11-03 06:30:53');

-- --------------------------------------------------------

--
-- Структура таблицы `cutaway_template`
--

CREATE TABLE IF NOT EXISTS `cutaway_template` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `filename` varchar(128) NOT NULL,
  `second_filename` varchar(128) DEFAULT NULL,
  `width` mediumint(9) NOT NULL,
  `height` mediumint(9) NOT NULL,
  `status` enum('Active','Blocked','Deleted') NOT NULL DEFAULT 'Active',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Дамп данных таблицы `cutaway_template`
--

INSERT INTO `cutaway_template` (`id`, `filename`, `second_filename`, `width`, `height`, `status`, `changed`) VALUES
(1, 'art1/001.jpg', NULL, 1050, 600, 'Active', '2014-10-04 12:06:36'),
(2, 'art1/002.png', NULL, 1570, 897, 'Active', '2014-10-04 12:09:27'),
(3, 'art1/003.png', NULL, 1570, 897, 'Active', '2014-10-04 12:09:27'),
(4, 'art1/004.png', NULL, 1556, 886, 'Active', '2014-10-04 12:10:50'),
(5, 'art1/005.png', NULL, 1561, 888, 'Active', '2014-10-04 12:10:50'),
(6, 'art1/006.png', NULL, 1561, 888, 'Active', '2014-10-04 12:11:22'),
(7, 'art1/007.png', NULL, 1562, 888, 'Active', '2014-10-04 12:11:22'),
(8, 'art1/008.png', NULL, 1567, 897, 'Active', '2014-10-04 12:12:09'),
(9, 'art1/009.png', NULL, 896, 1568, 'Active', '2014-10-04 12:12:09'),
(10, 'art1/010.png', NULL, 1568, 896, 'Active', '2014-10-04 12:12:43'),
(11, 'art1/011.png', NULL, 892, 1565, 'Active', '2014-10-04 12:12:43'),
(12, 'art1/012.png', NULL, 897, 1569, 'Active', '2014-10-04 12:13:09'),
(13, 'art1/013.png', NULL, 899, 1571, 'Active', '2014-10-04 12:13:09'),
(14, 'light1/001.png', NULL, 2409, 1558, 'Active', '2014-10-04 12:15:13'),
(15, 'light1/002.png', NULL, 2409, 1558, 'Active', '2014-10-04 12:15:13'),
(16, 'light1/003.png', NULL, 2409, 1558, 'Active', '2014-10-04 12:15:55'),
(17, 'light1/004.png', NULL, 2409, 1558, 'Active', '2014-10-04 12:15:55'),
(18, 'light1/005.png', NULL, 2409, 1559, 'Active', '2014-10-04 12:16:41'),
(19, 'light1/006.png', NULL, 2409, 1559, 'Active', '2014-10-04 12:16:41'),
(20, 'solid1/001.png', NULL, 1544, 885, 'Active', '2014-10-04 12:18:19'),
(21, 'solid1/002.png', NULL, 1544, 885, 'Active', '2014-10-04 12:18:19'),
(22, 'solid1/003.png', NULL, 1544, 885, 'Active', '2014-10-04 12:18:49'),
(23, 'solid1/004.png', NULL, 1544, 885, 'Active', '2014-10-04 12:18:49'),
(24, 'solid1/005.png', NULL, 1544, 885, 'Active', '2014-10-04 12:19:02'),
(25, 'tehno1/001.png', NULL, 2518, 1438, 'Active', '2014-10-04 12:19:52'),
(26, 'tehno1/002.png', NULL, 2518, 1438, 'Active', '2014-10-04 12:19:52'),
(27, 'tehno1/003.png', NULL, 2518, 1438, 'Active', '2014-10-04 12:20:22'),
(28, 'tehno1/004.png', NULL, 2518, 1438, 'Active', '2014-10-04 12:20:22'),
(29, 'tehno1/005.png', NULL, 2518, 1438, 'Active', '2014-10-04 12:21:00'),
(30, 'tehno1/006.png', NULL, 2518, 1438, 'Active', '2014-10-04 12:21:00'),
(31, 'solid2/001.png', NULL, 2453, 1333, 'Active', '2014-10-04 12:29:49'),
(32, 'solid2/002.png', NULL, 2454, 1335, 'Active', '2014-10-04 12:29:49'),
(33, 'solid2/003.png', NULL, 2443, 1331, 'Active', '2014-10-04 12:30:17'),
(34, 'solid2/004.png', NULL, 2451, 1332, 'Active', '2014-10-04 12:30:17'),
(35, 'solid2/005.png', NULL, 2449, 1333, 'Active', '2014-10-04 12:30:42'),
(36, 'solid2/006.png', NULL, 2451, 1331, 'Active', '2014-10-04 12:30:42');

-- --------------------------------------------------------

--
-- Структура таблицы `cutaway_template_text`
--

CREATE TABLE IF NOT EXISTS `cutaway_template_text` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `side` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `cutaway_template_id` int(10) unsigned NOT NULL,
  `label` text NOT NULL,
  `fontsize` mediumint(8) unsigned NOT NULL,
  `color` char(6) NOT NULL,
  `font_id` int(10) unsigned NOT NULL,
  `x` mediumint(8) unsigned NOT NULL,
  `y` mediumint(8) unsigned NOT NULL,
  `orientation` enum('left','right','center') NOT NULL DEFAULT 'left',
  `status` enum('Active','Blocked','Deleted') NOT NULL DEFAULT 'Active',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `cutaway_template_id` (`cutaway_template_id`),
  KEY `font_id` (`font_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

--
-- Дамп данных таблицы `cutaway_template_text`
--

INSERT INTO `cutaway_template_text` (`id`, `side`, `cutaway_template_id`, `label`, `fontsize`, `color`, `font_id`, `x`, `y`, `orientation`, `status`, `changed`) VALUES
(1, 0, 1, 'Моя Компания', 80, '07091c', 1, 357, 21, 'left', 'Active', '2014-09-13 06:43:23'),
(2, 0, 9, 'КАФЕ', 100, '000000', 2, 113, 84, 'left', 'Active', '2014-10-04 15:30:41'),
(3, 0, 9, 'УЮТ', 100, '000000', 2, 182, 229, 'left', 'Active', '2014-10-04 15:37:31'),
(4, 0, 9, 'РОМАНОВ РОМАН', 60, '000000', 2, 312, 670, 'left', 'Active', '2014-10-04 15:34:19'),
(5, 0, 9, 'РОМАНОВИЧ', 60, '000000', 2, 473, 749, 'left', 'Active', '2014-10-04 15:54:48'),
(6, 0, 9, 'Email: roman@mail.ru', 60, '000000', 2, 155, 891, 'left', 'Active', '2014-10-04 15:54:48'),
(7, 0, 9, 'Телефон: +7(123)123-12-12', 60, '000000', 2, 65, 964, 'left', 'Active', '2014-10-04 15:54:48'),
(8, 0, 1, 'менеджер', 60, '35374a', 2, 715, 170, 'left', 'Active', '2014-10-04 15:58:56'),
(9, 0, 1, 'Иванов Иван Иванович', 60, '35374a', 2, 331, 244, 'left', 'Active', '2014-10-04 15:58:56'),
(10, 0, 1, 'Телефон: +7(987)123-12-12', 60, '35374a', 2, 282, 392, 'left', 'Active', '2014-10-04 15:58:56'),
(11, 0, 1, 'e-mail: ivan@gmail.com', 60, '35374a', 2, 332, 483, 'left', 'Active', '2014-10-04 15:58:56'),
(12, 0, 2, 'Ведущий', 120, 'ff00b8', 2, 454, 48, 'left', 'Active', '2014-10-04 16:07:12'),
(13, 0, 2, 'Ведущий', 120, '000000', 2, 450, 43, 'left', 'Active', '2014-10-04 16:07:13'),
(14, 0, 2, 'Иван Иванович Иванов', 100, '000000', 2, 172, 241, 'left', 'Active', '2014-10-04 16:07:13'),
(15, 0, 2, 'e-mail: ivan@gmail.com', 80, '000000', 2, 560, 612, 'left', 'Active', '2014-10-04 16:07:13'),
(16, 0, 2, 'Телефон: +8(987)123-12-12', 80, '000000', 2, 497, 734, 'left', 'Active', '2014-10-04 16:07:13'),
(17, 0, 3, 'Моя компания', 120, '000000', 2, 601, 41, 'left', 'Active', '2014-10-04 16:11:57'),
(18, 0, 3, 'менеджер', 100, '00e0ff', 2, 978, 203, 'left', 'Active', '2014-10-04 16:11:57'),
(19, 0, 3, 'Иванов Иван', 100, 'ff9900', 2, 853, 337, 'left', 'Active', '2014-10-04 16:11:57'),
(20, 0, 3, 'Иванович', 100, 'ff9900', 2, 1015, 443, 'left', 'Active', '2014-10-04 16:11:57'),
(21, 0, 3, '+7(987)123-12-12', 80, '000000', 2, 910, 629, 'left', 'Active', '2014-10-04 16:11:57'),
(22, 0, 3, 'ivan@gmail.com', 80, '000000', 2, 897, 753, 'left', 'Active', '2014-10-04 16:11:57'),
(23, 0, 4, 'МОЯ КОМПАНИЯ', 100, 'ff7a00', 2, 106, 47, 'left', 'Active', '2014-10-04 16:17:36'),
(24, 0, 4, 'диджей', 80, 'ffffff', 2, 106, 241, 'left', 'Active', '2014-10-04 16:17:36'),
(25, 0, 4, 'Иванов Иван Иванович', 80, 'ffffff', 2, 101, 347, 'left', 'Active', '2014-10-04 16:17:36'),
(26, 0, 4, 'Телефон: +7(987)123-12-12', 80, '00c2ff', 2, 62, 710, 'left', 'Active', '2014-10-04 16:17:36'),
(27, 0, 4, 'e-mail: ivan@gmail.com', 80, '00c2ff', 2, 62, 605, 'left', 'Active', '2014-10-04 16:17:36'),
(28, 0, 5, 'МОЯ ГРУППА', 100, '8f8f8f', 1, 335, 218, 'left', 'Active', '2014-10-04 16:20:58'),
(29, 0, 5, 'музыкант', 70, '8f8f8f', 1, 556, 453, 'left', 'Active', '2014-10-04 16:20:58'),
(30, 0, 5, 'Иванов Иван Иванович', 70, '8f8f8f', 1, 298, 527, 'left', 'Active', '2014-10-04 16:20:59'),
(31, 0, 5, '+7(987)123-12-12', 70, '8f8f8f', 1, 619, 761, 'left', 'Active', '2014-10-04 16:20:59'),
(32, 0, 6, 'Военная амуниция', 100, 'ffffff', 1, 270, 135, 'left', 'Active', '2014-10-04 16:27:49'),
(33, 0, 6, 'консультант', 80, 'ffffff', 1, 512, 284, 'left', 'Active', '2014-10-04 16:27:49'),
(34, 0, 6, 'Иванов Иван Иванович', 80, 'ffffff', 1, 270, 374, 'left', 'Active', '2014-10-04 16:27:49'),
(35, 0, 6, '+7(987)123-12-12', 80, 'ffffff', 1, 673, 756, 'left', 'Active', '2014-10-04 16:27:49'),
(36, 0, 7, 'ГРУППА', 120, '000000', 1, 640, 34, 'left', 'Active', '2014-10-04 16:34:15'),
(37, 0, 7, 'ГРУППА', 120, 'ffffff', 1, 635, 26, 'left', 'Active', '2014-10-04 16:34:15'),
(38, 0, 7, 'Музыкант', 80, '000000', 1, 749, 178, 'left', 'Active', '2014-10-04 16:34:15'),
(39, 0, 7, 'Иванов Иван Иванович', 80, 'b300ab', 1, 154, 434, 'left', 'Active', '2014-10-04 16:34:15'),
(40, 0, 7, 'Иванов Иван Иванович', 80, 'ffffff', 1, 159, 436, 'left', 'Active', '2014-10-04 16:34:15'),
(41, 0, 7, '+7(987)123-12-12', 60, 'fa00ff', 1, 138, 640, 'left', 'Active', '2014-10-04 16:34:15'),
(42, 0, 7, 'ivan@gmail.com', 60, 'fa00ff', 1, 190, 716, 'left', 'Active', '2014-10-04 16:34:15'),
(43, 0, 8, 'МОЯ ГРУППА', 100, 'ffffff', 1, 278, 38, 'left', 'Active', '2014-10-04 16:37:59'),
(44, 0, 8, 'музыкант', 100, 'adff00', 1, 597, 160, 'left', 'Active', '2014-10-04 16:37:59'),
(45, 0, 8, 'Иванов Иван', 100, 'ffffff', 1, 376, 330, 'left', 'Active', '2014-10-04 16:38:00'),
(46, 0, 8, 'Иванович', 100, 'ffffff', 1, 559, 440, 'left', 'Active', '2014-10-04 16:38:00'),
(47, 0, 8, '+7(987)123-12-12', 70, 'ffd1fd', 1, 854, 762, 'left', 'Active', '2014-10-04 16:38:00'),
(48, 0, 10, 'МОЯ КОМПАНИЯ', 60, '000000', 2, 83, 146, 'left', 'Active', '2014-10-04 16:47:09'),
(49, 0, 10, 'разработчик', 60, 'e0fa78', 2, 80, 271, 'left', 'Active', '2014-10-04 16:47:09'),
(50, 0, 10, 'Иванов Иван', 60, '000000', 2, 80, 414, 'left', 'Active', '2014-10-04 16:47:10'),
(51, 0, 10, 'Иванович', 60, '000000', 2, 82, 483, 'left', 'Active', '2014-10-04 16:47:10'),
(52, 0, 10, 'ivan@gmail.com', 60, 'f5ff87', 2, 79, 593, 'left', 'Active', '2014-10-04 16:47:10'),
(53, 0, 10, '+7(987)123-12-12', 50, 'f5ff87', 2, 79, 678, 'left', 'Active', '2014-10-04 16:47:10'),
(54, 0, 10, 'ремонт pc\nчистка dvd\nразработка по\nсоздание сайтов\nудаление вирусов\nпечать фото\nраскрутка сайтов\nseo-оптимизация', 50, 'f5ff87', 2, 703, 150, 'left', 'Active', '2014-10-04 16:47:10'),
(55, 0, 11, 'САЛОН МАССАЖА', 60, 'eb0707', 1, 105, 348, 'left', 'Active', '2014-10-04 16:52:52'),
(56, 0, 11, 'массажистка', 60, 'ffffff', 1, 209, 688, 'left', 'Active', '2014-10-04 16:52:52'),
(57, 0, 11, 'Романова Роза', 60, 'e8e482', 1, 186, 775, 'left', 'Active', '2014-10-04 16:52:52'),
(58, 0, 11, 'Алексеевна', 60, 'e8e482', 1, 227, 860, 'left', 'Active', '2014-10-04 16:52:52'),
(59, 0, 11, '+7(987)123-12-12', 50, 'eb0707', 1, 170, 991, 'left', 'Active', '2014-10-04 16:52:52');

-- --------------------------------------------------------

--
-- Структура таблицы `cutaway_text`
--

CREATE TABLE IF NOT EXISTS `cutaway_text` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `side` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `cutaway_id` int(10) unsigned NOT NULL,
  `cutaway_template_text_id` int(10) unsigned DEFAULT NULL,
  `label` text NOT NULL,
  `fontsize` mediumint(8) unsigned NOT NULL,
  `color` char(6) NOT NULL,
  `font_id` int(10) unsigned NOT NULL,
  `x` mediumint(8) unsigned NOT NULL,
  `y` mediumint(8) unsigned NOT NULL,
  `orientation` enum('left','right','center') NOT NULL DEFAULT 'left',
  `status` enum('Active','Blocked','Deleted') NOT NULL DEFAULT 'Active',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `cutaway_id` (`cutaway_id`),
  KEY `cutaway_template_text_id` (`cutaway_template_text_id`),
  KEY `font_id` (`font_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=64 ;

--
-- Дамп данных таблицы `cutaway_text`
--

INSERT INTO `cutaway_text` (`id`, `side`, `cutaway_id`, `cutaway_template_text_id`, `label`, `fontsize`, `color`, `font_id`, `x`, `y`, `orientation`, `status`, `changed`) VALUES
(1, 0, 1, 1, 'Моя Компания', 80, '07091c', 2, 420, 36, 'left', 'Active', '2014-09-13 06:47:04'),
(2, 0, 1, 8, 'менеджер', 60, '35374a', 2, 715, 170, 'left', 'Active', '2014-09-27 09:22:38'),
(3, 0, 1, 9, 'Иванов Иван Иванович', 60, '35374a', 2, 331, 244, 'left', 'Active', '2014-09-27 09:32:21'),
(4, 0, 2, 2, 'КАФЕ', 100, '000000', 2, 113, 84, 'left', 'Active', '2014-10-04 15:31:09'),
(5, 0, 2, 3, 'УЮТ', 100, '000000', 2, 182, 229, 'left', 'Active', '2014-10-04 15:37:27'),
(6, 0, 2, 4, 'РОМАНОВ РОМАН', 60, '000000', 2, 312, 670, 'left', 'Active', '2014-10-04 15:32:07'),
(7, 0, 2, 5, 'РОМАНОВИЧ', 60, '000000', 2, 473, 749, 'left', 'Active', '2014-10-04 15:41:55'),
(8, 0, 2, 6, 'Email: roman@mail.ru', 60, '000000', 2, 155, 891, 'left', 'Active', '2014-10-04 15:42:57'),
(9, 0, 2, 7, 'Телефон: +7(123)123-12-12', 60, '000000', 2, 65, 964, 'left', 'Active', '2014-10-04 15:43:36'),
(10, 0, 1, 10, 'Телефон: +7(987)123-12-12', 60, '35374a', 2, 282, 392, 'left', 'Active', '2014-10-04 15:57:33'),
(11, 0, 1, 11, 'e-mail: ivan@gmail.com', 60, '35374a', 2, 332, 483, 'left', 'Active', '2014-10-04 15:58:02'),
(12, 0, 3, 12, 'Ведущий', 120, 'ff00b8', 2, 454, 48, 'left', 'Active', '2014-10-04 15:59:21'),
(13, 0, 3, 13, 'Ведущий', 120, '000000', 2, 450, 43, 'left', 'Active', '2014-10-04 16:00:44'),
(14, 0, 3, 14, 'Иван Иванович Иванов', 100, '000000', 2, 172, 241, 'left', 'Active', '2014-10-04 16:01:26'),
(15, 0, 3, 15, 'e-mail: ivan@gmail.com', 80, '000000', 2, 560, 612, 'left', 'Active', '2014-10-04 16:01:49'),
(16, 0, 3, 16, 'Телефон: +8(987)123-12-12', 80, '000000', 2, 497, 734, 'left', 'Active', '2014-10-04 16:06:30'),
(17, 0, 4, 17, 'Моя компания', 120, '000000', 2, 601, 41, 'left', 'Active', '2014-10-04 16:07:26'),
(18, 0, 4, 18, 'менеджер', 100, '00e0ff', 2, 978, 203, 'left', 'Active', '2014-10-04 16:07:46'),
(19, 0, 4, 19, 'Иванов Иван', 100, 'ff9900', 2, 853, 337, 'left', 'Active', '2014-10-04 16:09:08'),
(20, 0, 4, 20, 'Иванович', 100, 'ff9900', 2, 1015, 443, 'left', 'Active', '2014-10-04 16:09:58'),
(21, 0, 4, 21, '+7(987)123-12-12', 80, '000000', 2, 910, 629, 'left', 'Active', '2014-10-04 16:10:29'),
(22, 0, 4, 22, 'ivan@gmail.com', 80, '000000', 2, 897, 753, 'left', 'Active', '2014-10-04 16:10:40'),
(23, 0, 5, 23, 'МОЯ КОМПАНИЯ', 100, 'ff7a00', 2, 106, 47, 'left', 'Active', '2014-10-04 16:12:34'),
(24, 0, 5, 24, 'диджей', 80, 'ffffff', 2, 106, 241, 'left', 'Active', '2014-10-04 16:13:05'),
(25, 0, 5, 25, 'Иванов Иван Иванович', 80, 'ffffff', 2, 101, 347, 'left', 'Active', '2014-10-04 16:15:30'),
(26, 0, 5, 26, 'Телефон: +7(987)123-12-12', 80, '00c2ff', 2, 62, 710, 'left', 'Active', '2014-10-04 16:16:24'),
(27, 0, 5, 27, 'e-mail: ivan@gmail.com', 80, '00c2ff', 2, 62, 605, 'left', 'Active', '2014-10-04 16:16:39'),
(28, 0, 6, 28, 'МОЯ ГРУППА', 100, '8f8f8f', 1, 335, 218, 'left', 'Active', '2014-10-04 16:17:59'),
(29, 0, 6, 29, 'музыкант', 70, '8f8f8f', 1, 556, 453, 'left', 'Active', '2014-10-04 16:18:54'),
(30, 0, 6, 30, 'Иванов Иван Иванович', 70, '8f8f8f', 1, 298, 527, 'left', 'Active', '2014-10-04 16:19:08'),
(31, 0, 6, 31, '+7(987)123-12-12', 70, '8f8f8f', 1, 619, 761, 'left', 'Active', '2014-10-04 16:20:10'),
(32, 0, 7, 32, 'Военная амуниция', 100, 'ffffff', 1, 270, 135, 'left', 'Active', '2014-10-04 16:21:45'),
(33, 0, 7, 33, 'консультант', 80, 'ffffff', 1, 512, 284, 'left', 'Active', '2014-10-04 16:22:52'),
(34, 0, 7, 34, 'Иванов Иван Иванович', 80, 'ffffff', 1, 270, 374, 'left', 'Active', '2014-10-04 16:25:33'),
(35, 0, 7, 35, '+7(987)123-12-12', 80, 'ffffff', 1, 673, 756, 'left', 'Active', '2014-10-04 16:26:22'),
(36, 0, 8, 36, 'ГРУППА', 120, '000000', 1, 640, 34, 'left', 'Active', '2014-10-04 16:28:05'),
(37, 0, 8, 37, 'ГРУППА', 120, 'ffffff', 1, 635, 26, 'left', 'Active', '2014-10-04 16:28:33'),
(38, 0, 8, 38, 'Музыкант', 80, '000000', 1, 749, 178, 'left', 'Active', '2014-10-04 16:28:46'),
(39, 0, 8, 39, 'Иванов Иван Иванович', 80, 'b300ab', 1, 154, 434, 'left', 'Active', '2014-10-04 16:30:03'),
(40, 0, 8, 40, 'Иванов Иван Иванович', 80, 'ffffff', 1, 159, 436, 'left', 'Active', '2014-10-04 16:30:40'),
(41, 0, 8, 41, '+7(987)123-12-12', 60, 'fa00ff', 1, 138, 640, 'left', 'Active', '2014-10-04 16:32:14'),
(42, 0, 8, 42, 'ivan@gmail.com', 60, 'fa00ff', 1, 190, 716, 'left', 'Active', '2014-10-04 16:33:22'),
(43, 0, 9, 43, 'МОЯ ГРУППА', 100, 'ffffff', 1, 278, 38, 'left', 'Active', '2014-10-04 16:34:49'),
(44, 0, 9, 44, 'музыкант', 100, 'adff00', 1, 597, 160, 'left', 'Active', '2014-10-04 16:35:21'),
(45, 0, 9, 45, 'Иванов Иван', 100, 'ffffff', 1, 376, 330, 'left', 'Active', '2014-10-04 16:35:48'),
(46, 0, 9, 46, 'Иванович', 100, 'ffffff', 1, 559, 440, 'left', 'Active', '2014-10-04 16:36:11'),
(47, 0, 9, 47, '+7(987)123-12-12', 70, 'ffd1fd', 1, 854, 762, 'left', 'Active', '2014-10-04 16:36:42'),
(48, 0, 10, 48, 'МОЯ КОМПАНИЯ', 60, '000000', 2, 83, 146, 'left', 'Active', '2014-10-04 16:38:26'),
(49, 0, 10, 49, 'разработчик', 60, 'e0fa78', 2, 80, 271, 'left', 'Active', '2014-10-04 16:38:40'),
(50, 0, 10, 50, 'Иванов Иван', 60, '000000', 2, 80, 414, 'left', 'Active', '2014-10-04 16:39:10'),
(51, 0, 10, 51, 'Иванович', 60, '000000', 2, 82, 483, 'left', 'Active', '2014-10-04 16:39:37'),
(52, 0, 10, 52, 'ivan@gmail.com', 60, 'f5ff87', 2, 79, 593, 'left', 'Active', '2014-10-04 16:40:44'),
(53, 0, 10, 53, '+7(987)123-12-12', 50, 'f5ff87', 2, 79, 678, 'left', 'Active', '2014-10-04 16:41:31'),
(54, 0, 10, 54, 'ремонт pc\nчистка dvd\nразработка по\nсоздание сайтов\nудаление вирусов\nпечать фото\nраскрутка сайтов\nseo-оптимизация', 50, 'f5ff87', 2, 703, 150, 'left', 'Active', '2014-10-04 16:43:40'),
(55, 0, 11, 55, 'САЛОН МАССАЖА', 60, 'eb0707', 1, 105, 348, 'left', 'Active', '2014-10-04 16:47:59'),
(56, 0, 11, 56, 'массажистка', 60, 'ffffff', 1, 209, 688, 'left', 'Active', '2014-10-04 16:49:15'),
(57, 0, 11, 57, 'Романова Роза', 60, 'e8e482', 1, 186, 775, 'left', 'Active', '2014-10-04 16:49:34'),
(58, 0, 11, 58, 'Алексеевна', 60, 'e8e482', 1, 227, 860, 'left', 'Active', '2014-10-04 16:50:01'),
(59, 0, 11, 59, '+7(987)123-12-12', 50, 'eb0707', 1, 170, 991, 'left', 'Active', '2014-10-04 16:51:52'),
(60, 0, 12, NULL, 'МОЯ КОМПАНИЯ', 60, 'ff8b03', 1, 127, 89, 'left', 'Active', '2014-10-04 16:53:06'),
(61, 0, 12, NULL, 'МОЯ КОМПАНИЯ', 60, 'ffffff', 1, 123, 86, 'left', 'Active', '2014-10-04 16:53:27'),
(62, 0, 12, NULL, 'менеджер', 60, 'ffffff', 1, 270, 186, 'left', 'Active', '2014-10-04 16:57:06'),
(63, 0, 12, NULL, 'менеджер', 60, 'ffffff', 1, 481, 536, 'left', 'Active', '2014-10-12 07:41:14');

-- --------------------------------------------------------

--
-- Структура таблицы `delivery`
--

CREATE TABLE IF NOT EXISTS `delivery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `status` enum('Active','Blocked','Deleted') NOT NULL DEFAULT 'Active',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `delivery`
--

INSERT INTO `delivery` (`id`, `title`, `description`, `price`, `status`, `changed`) VALUES
(1, 'Доставка на дом', 'Курьер доставит товар прямо вам домой', '100.00', 'Active', '2014-11-09 14:47:00'),
(2, 'Самовызов', 'Получение товара в наших <a href="/office/index" target="_blank">пунктах</a> выдачи товара.', '0.00', 'Active', '2014-11-09 14:47:00');

-- --------------------------------------------------------

--
-- Структура таблицы `effect`
--

CREATE TABLE IF NOT EXISTS `effect` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL,
  `title` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `params` text,
  `group` int(10) unsigned NOT NULL,
  `can_delete` enum('Yes','No') NOT NULL DEFAULT 'Yes',
  `status` enum('Active','Blocked','Deleted') NOT NULL DEFAULT 'Active',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `effect`
--

INSERT INTO `effect` (`id`, `name`, `title`, `description`, `params`, `group`, `can_delete`, `status`, `changed`) VALUES
(1, 'crop', 'Срез', 'Срез непечатываемых областей', NULL, 0, 'No', 'Active', '2014-11-04 05:49:29'),
(2, 'rotate', 'Поворот', 'поворот против часовой стрелки', '{"angle":90}', 1, 'Yes', 'Active', '2014-11-03 12:53:15'),
(3, 'rotate', 'Поворот', 'поворот по часовой стрелки', '{"angle":-90}', 1, 'Yes', 'Active', '2014-11-03 12:53:21'),
(4, 'colorize', 'Градация серого', 'сделать фотографию черно-белой', '{"grayscale":true}', 2, 'Yes', 'Active', '2014-11-03 12:59:39'),
(5, 'colorize', 'Легкая сепия', 'применить легкую сепию', '{"grayscale":true,"colorize":{"red":100, "greeb":70, "blue":50}}', 2, 'Yes', 'Active', '2014-11-04 06:28:44'),
(6, 'picture', 'Эффект рисунка', 'применить эффект рисунка', NULL, 3, 'Yes', 'Active', '2014-11-03 12:53:58');

-- --------------------------------------------------------

--
-- Структура таблицы `font`
--

CREATE TABLE IF NOT EXISTS `font` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(64) NOT NULL,
  `filename` varchar(64) NOT NULL,
  `status` enum('Active','Blocked','Deleted') NOT NULL DEFAULT 'Active',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп данных таблицы `font`
--

INSERT INTO `font` (`id`, `title`, `filename`, `status`, `changed`) VALUES
(1, 'Times New Roman', 'times.ttf', 'Active', '2014-09-13 06:37:00'),
(2, 'Cuprum', 'cuprum.ttf', 'Active', '2014-09-27 07:50:30'),
(3, 'Lobster', 'lobster.ttf', 'Active', '2014-11-09 06:40:15'),
(4, 'Ubuntu', 'ubuntu.ttf', 'Active', '2014-11-09 06:40:15'),
(5, 'Future', 'future.ttf', 'Active', '2014-11-09 06:42:52'),
(6, 'Veselka', 'veselka.ttf', 'Active', '2014-11-09 06:42:52'),
(9, 'Banana Brick', 'banana_brick.ttf', 'Active', '2014-11-09 06:49:11');

-- --------------------------------------------------------

--
-- Структура таблицы `good`
--

CREATE TABLE IF NOT EXISTS `good` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `type` enum('print','simple','cutaway') NOT NULL DEFAULT 'simple',
  `source_id` int(10) unsigned DEFAULT NULL,
  `description` text NOT NULL,
  `good_media_id` int(10) unsigned DEFAULT NULL,
  `status` enum('Active','Blocked','Deleted') NOT NULL DEFAULT 'Active',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `good_avatar_id` (`good_media_id`),
  KEY `print_id` (`source_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=50 ;

--
-- Дамп данных таблицы `good`
--

INSERT INTO `good` (`id`, `title`, `type`, `source_id`, `description`, `good_media_id`, `status`, `changed`) VALUES
(1, 'Стандартные глянец 10x15', 'print', 1, 'Глянцевая бумага плотностью 170г/м2 и размеров 10х15 см  (А6)', 1, 'Active', '2014-08-03 06:33:36'),
(2, 'Стандартные матовый 10x15', 'print', 2, 'Глянцевая бумага плотностью 170г/м2 и размеров 10х15 см (А6)', 2, 'Active', '2014-08-03 06:33:38'),
(3, 'Стандартные глянец 13x18', 'print', 3, 'Глянцевая бумага плотностью 170г/м2 и размеров 13х18 см', 3, 'Active', '2014-08-03 06:33:41'),
(4, 'Стандартные матовый 13x18', 'print', 4, 'Глянцевая бумага плотностью 170г/м2 и размеров 13х18 см', 4, 'Active', '2014-08-03 06:34:05'),
(5, 'Стандартные глянец 15x21', 'print', 5, 'Глянцевая бумага плотностью 170г/м2 и размеров 15х21 см (А5)', 5, 'Active', '2014-08-03 06:34:02'),
(6, 'Стандартные матовый 15x21', 'print', 6, 'Глянцевая бумага плотностью 170г/м2 и размеров 15х21 см (А5)', 6, 'Active', '2014-08-03 06:34:00'),
(7, 'Стандартные глянец 21x29,7', 'print', 7, 'Глянцевая бумага плотностью 170г/м2 и размеров 21x29,7 см (А4)', 7, 'Active', '2014-08-03 06:33:58'),
(8, 'Стандартные матовый 21x29,7', 'print', 8, 'Глянцевая бумага плотностью 170г/м2 и размеров 21x29,7 см (А4)', 8, 'Active', '2014-08-03 06:33:56'),
(9, 'Черно-белый матовый А4', 'print', 9, 'Черно-белая печать на матовой бумаге плотностью 80г/м2 и размеров 21x29,7 см (А4)', 9, 'Active', '2014-08-03 06:33:53'),
(10, 'Цветной матовый А4', 'print', 10, 'Цветная печать на матовой бумаге плотностью 80г/м2 и размеров 21x29,7 см (А4)', 10, 'Active', '2014-08-03 06:33:50'),
(11, 'Черно-белый глянцевый А4', 'print', 11, 'Черно-белая печать на глянцевой бумаге бумага плотностью 80г/м2 и размеров 21x29,7 см (А4)', 11, 'Active', '2014-08-03 06:33:47'),
(12, 'Цветной глянцевый А4', 'print', 12, 'Цветная печать на глянцевой бумаге бумага плотностью 80г/м2 и размеров 21x29,7 см (А4)', 12, 'Active', '2014-08-03 06:33:44'),
(13, 'Тетрадь в клетку 12 листов', 'simple', NULL, 'Стандартная тетрадь в клетку 12 листов', NULL, 'Active', '2014-08-05 15:39:40'),
(14, 'Визитка Капри', 'cutaway', 1, '', 13, 'Active', '2014-10-04 13:19:19'),
(15, 'Визитка Сплеш 1', 'cutaway', 2, '', 14, 'Active', '2014-10-04 13:31:11'),
(16, 'Визитка Сплеш 2', 'cutaway', 3, '', 15, 'Active', '2014-10-04 13:31:11'),
(17, 'Визитка Роад 1', 'cutaway', 4, '', 16, 'Active', '2014-10-04 13:31:11'),
(18, 'Визитка Мьюзик 1', 'cutaway', 5, '', 17, 'Active', '2014-10-04 13:31:11'),
(19, 'Визитка Солдер 1', 'cutaway', 6, '', 18, 'Active', '2014-10-04 13:31:11'),
(20, 'Визитка Агро 1', 'cutaway', 7, '', 19, 'Active', '2014-10-04 13:31:11'),
(21, 'Визитка Агро 2', 'cutaway', 8, '', 20, 'Active', '2014-10-04 13:31:11'),
(22, 'Визитка Тии 1', 'cutaway', 9, '', 21, 'Active', '2014-10-04 13:31:11'),
(23, 'Визитка Грин 1', 'cutaway', 10, '', 22, 'Active', '2014-10-04 13:31:11'),
(24, 'Визитка Грин 2', 'cutaway', 11, '', 23, 'Active', '2014-10-04 13:31:11'),
(25, 'Визитка Романтик 1', 'cutaway', 12, '', 24, 'Active', '2014-10-04 13:31:11'),
(26, 'Визитка Три 1', 'cutaway', 13, '', 25, 'Active', '2014-10-04 13:31:11'),
(27, 'Визитка Грин 2', 'cutaway', 14, '', 26, 'Active', '2014-10-04 13:31:11'),
(28, 'Визитка Лайт 1', 'cutaway', 15, '', 27, 'Active', '2014-10-04 13:31:11'),
(29, 'Визитка Лайт 2', 'cutaway', 16, '', 28, 'Active', '2014-10-04 13:31:11'),
(30, 'Визитка Лайт 3', 'cutaway', 17, '', 29, 'Active', '2014-10-04 13:31:11'),
(31, 'Визитка Лайт 4', 'cutaway', 18, '', 30, 'Active', '2014-10-04 13:31:11'),
(32, 'Визитка Лайт 5', 'cutaway', 19, '', 31, 'Active', '2014-10-04 13:31:11'),
(33, 'Визитка Лайт 6', 'cutaway', 20, '', 32, 'Active', '2014-10-04 13:31:11'),
(34, 'Визитка Солид 1', 'cutaway', 21, '', 33, 'Active', '2014-10-04 13:31:11'),
(35, 'Визитка Солид 2', 'cutaway', 22, '', 34, 'Active', '2014-10-04 13:31:11'),
(36, 'Визитка Солид 3', 'cutaway', 23, '', 35, 'Active', '2014-10-04 13:31:11'),
(37, 'Визитка Солид 4', 'cutaway', 24, '', 36, 'Active', '2014-10-04 13:31:11'),
(38, 'Визитка Солид 5', 'cutaway', 25, '', 37, 'Active', '2014-10-04 13:31:11'),
(39, 'Визитка Техно 1', 'cutaway', 26, '', 38, 'Active', '2014-10-04 13:31:11'),
(40, 'Визитка Техно 2', 'cutaway', 27, '', 39, 'Active', '2014-10-04 13:31:11'),
(41, 'Визитка Техно 3', 'cutaway', 28, '', 40, 'Active', '2014-10-04 13:31:11'),
(42, 'Визитка Техно 4', 'cutaway', 29, '', 41, 'Active', '2014-10-04 13:31:11'),
(43, 'Визитка Техно 5', 'cutaway', 30, '', 42, 'Active', '2014-10-04 13:31:11'),
(44, 'Визитка Градиент 1', 'cutaway', 31, '', 43, 'Active', '2014-10-04 13:31:11'),
(45, 'Визитка Градиент 2', 'cutaway', 32, '', 44, 'Active', '2014-10-04 13:31:11'),
(46, 'Визитка Градиент 3', 'cutaway', 33, '', 45, 'Active', '2014-10-04 13:31:11'),
(47, 'Визитка Градиент 4', 'cutaway', 34, '', 46, 'Active', '2014-10-04 13:31:11'),
(48, 'Визитка Градиент 5', 'cutaway', 35, '', 47, 'Active', '2014-10-04 13:31:11'),
(49, 'Визитка Градиент 6', 'cutaway', 36, '', NULL, 'Active', '2014-10-04 14:19:40');

-- --------------------------------------------------------

--
-- Структура таблицы `good_count`
--

CREATE TABLE IF NOT EXISTS `good_count` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `good_id` int(10) unsigned NOT NULL,
  `count_total` int(11) DEFAULT NULL,
  `count_available` int(11) DEFAULT NULL,
  `count_locked` int(11) DEFAULT NULL,
  `cost` decimal(8,2) DEFAULT NULL,
  `status` enum('Active','Blocked','Deleted') NOT NULL DEFAULT 'Active',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `good_id` (`good_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `good_count`
--

INSERT INTO `good_count` (`id`, `good_id`, `count_total`, `count_available`, `count_locked`, `cost`, `status`, `changed`) VALUES
(1, 13, 20, 3, 17, '1.50', 'Active', '2014-08-23 07:35:12'),
(2, 13, 100, 100, 0, '1.60', 'Active', '2014-08-23 07:35:18'),
(3, 1, NULL, NULL, NULL, '10.00', 'Active', '2014-08-23 11:23:37'),
(4, 2, NULL, NULL, NULL, '10.00', 'Active', '2014-08-23 11:23:37'),
(5, 3, NULL, NULL, NULL, '10.00', 'Active', '2014-08-23 11:23:37'),
(6, 4, NULL, NULL, NULL, '10.00', 'Active', '2014-08-23 11:23:37'),
(7, 5, NULL, NULL, NULL, '10.00', 'Active', '2014-08-23 11:23:37'),
(8, 6, NULL, NULL, NULL, '10.00', 'Active', '2014-08-23 11:23:37'),
(9, 7, NULL, NULL, NULL, '10.00', 'Active', '2014-08-23 11:23:37'),
(10, 8, NULL, NULL, NULL, '10.00', 'Active', '2014-08-23 11:23:37'),
(11, 9, NULL, NULL, NULL, '10.00', 'Active', '2014-08-23 11:23:37'),
(12, 10, NULL, NULL, NULL, '10.00', 'Active', '2014-08-23 11:23:37'),
(13, 11, NULL, NULL, NULL, '10.00', 'Active', '2014-08-23 11:23:37'),
(14, 12, NULL, NULL, NULL, '10.00', 'Active', '2014-08-23 11:23:37'),
(15, 14, NULL, NULL, NULL, '0.70', 'Active', '2014-09-13 04:20:52'),
(16, 13, 100, NULL, NULL, '1.20', 'Active', '2014-09-13 04:21:19');

-- --------------------------------------------------------

--
-- Структура таблицы `good_media`
--

CREATE TABLE IF NOT EXISTS `good_media` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `good_id` int(11) unsigned NOT NULL,
  `title` varchar(128) DEFAULT NULL,
  `filename` varchar(128) NOT NULL,
  `preview_filename` varchar(128) DEFAULT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `status` enum('Active','Blocked','Deleted') NOT NULL DEFAULT 'Active',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `good_id` (`good_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=92 ;

--
-- Дамп данных таблицы `good_media`
--

INSERT INTO `good_media` (`id`, `good_id`, `title`, `filename`, `preview_filename`, `width`, `height`, `status`, `changed`) VALUES
(1, 1, NULL, 'photos.png', 'photos.png', 128, 128, 'Active', '2014-08-03 08:41:10'),
(2, 2, NULL, 'photos.png', 'photos.png', 128, 128, 'Active', '2014-08-03 08:41:21'),
(3, 3, NULL, 'photos.png', 'photos.png', 128, 128, 'Active', '2014-08-03 08:41:18'),
(4, 4, NULL, 'photos.png', 'photos.png', 128, 128, 'Active', '2014-08-03 08:41:17'),
(5, 5, NULL, 'photos.png', 'photos.png', 128, 128, 'Active', '2014-08-03 08:41:16'),
(6, 6, NULL, 'photos.png', 'photos.png', 128, 128, 'Active', '2014-08-03 08:41:14'),
(7, 7, NULL, 'photos.png', 'photos.png', 128, 128, 'Active', '2014-08-03 08:41:13'),
(8, 8, NULL, 'photos.png', 'photos.png', 128, 128, 'Active', '2014-08-03 08:41:12'),
(9, 9, NULL, 'photos-a4-black.png', 'photos-a4-black.png', 128, 128, 'Active', '2014-08-03 08:41:23'),
(10, 10, NULL, 'photos-a4-color.png', 'photos-a4-color.png', 128, 128, 'Active', '2014-08-03 08:41:27'),
(11, 11, NULL, 'photos-a4-black.png', 'photos-a4-black.png', 128, 128, 'Active', '2014-08-03 08:41:30'),
(12, 12, NULL, 'photos-a4-color.png', 'photos-a4-color.png', 128, 128, 'Active', '2014-08-03 08:41:33'),
(13, 14, 'Визитка капри', 'cutaway1.png', 'cutaway1_preview.png', 128, 73, 'Active', '2014-09-13 04:19:12'),
(14, 15, 'Визитка Сплеш 1', 'cutaway2.png', 'cutaway2_preview.png', 128, 73, 'Active', '2014-10-04 13:28:35'),
(15, 16, 'Визитка Сплеш 2', 'cutaway3.png', 'cutaway3_preview.png', 128, 73, 'Active', '2014-10-04 13:28:35'),
(16, 17, 'Визитка Роад 1', 'cutaway4.png', 'cutaway4_preview.png', 128, 73, 'Active', '2014-10-04 13:28:35'),
(17, 18, 'Визитка Мьюзик 1', 'cutaway5.png', 'cutaway5_preview.png', 128, 73, 'Active', '2014-10-04 13:28:35'),
(18, 19, 'Визитка Солдер 1', 'cutaway6.png', 'cutaway6_preview.png', 128, 73, 'Active', '2014-10-04 13:28:35'),
(19, 20, 'Визитка Агро 1', 'cutaway7.png', 'cutaway7_preview.png', 128, 73, 'Active', '2014-10-04 13:28:35'),
(20, 21, 'Визитка Агро 2', 'cutaway8.png', 'cutaway8_preview.png', 128, 73, 'Active', '2014-10-04 13:28:35'),
(21, 22, 'Визитка Тии 1', 'cutaway9.png', 'cutaway9_preview.png', 73, 128, 'Active', '2014-10-04 13:28:35'),
(22, 23, 'Визитка Грин 1', 'cutaway10.png', 'cutaway10_preview.png', 128, 73, 'Active', '2014-10-04 13:28:35'),
(23, 24, 'Визитка Грин 2', 'cutaway11.png', 'cutaway11_preview.png', 73, 128, 'Active', '2014-10-04 13:28:35'),
(24, 25, 'Визитка Романтик 1', 'cutaway12.png', 'cutaway12_preview.png', 73, 128, 'Active', '2014-10-04 13:28:35'),
(25, 26, 'Визитка Три 1', 'cutaway13.png', 'cutaway13_preview.png', 73, 128, 'Active', '2014-10-04 13:28:35'),
(26, 27, 'Визитка Грин 2', 'cutaway14.png', 'cutaway14_preview.png', 128, 83, 'Active', '2014-10-04 13:28:35'),
(27, 28, 'Визитка Лайт 1', 'cutaway15.png', 'cutaway15_preview.png', 128, 83, 'Active', '2014-10-04 13:28:35'),
(28, 29, 'Визитка Лайт 2', 'cutaway16.png', 'cutaway16_preview.png', 128, 83, 'Active', '2014-10-04 13:28:35'),
(29, 30, 'Визитка Лайт 3', 'cutaway17.png', 'cutaway17_preview.png', 128, 83, 'Active', '2014-10-04 13:28:35'),
(30, 31, 'Визитка Лайт 4', 'cutaway18.png', 'cutaway18_preview.png', 128, 83, 'Active', '2014-10-04 13:28:35'),
(31, 32, 'Визитка Лайт 5', 'cutaway19.png', 'cutaway19_preview.png', 128, 83, 'Active', '2014-10-04 13:28:35'),
(32, 33, 'Визитка Лайт 6', 'cutaway20.png', 'cutaway20_preview.png', 128, 73, 'Active', '2014-10-04 13:28:35'),
(33, 34, 'Визитка Солид 1', 'cutaway21.png', 'cutaway21_preview.png', 128, 73, 'Active', '2014-10-04 13:28:35'),
(34, 35, 'Визитка Солид 2', 'cutaway22.png', 'cutaway22_preview.png', 128, 73, 'Active', '2014-10-04 13:28:35'),
(35, 36, 'Визитка Солид 3', 'cutaway23.png', 'cutaway23_preview.png', 128, 73, 'Active', '2014-10-04 13:28:35'),
(36, 37, 'Визитка Солид 4', 'cutaway24.png', 'cutaway24_preview.png', 128, 73, 'Active', '2014-10-04 13:28:35'),
(37, 38, 'Визитка Солид 5', 'cutaway25.png', 'cutaway25_preview.png', 128, 73, 'Active', '2014-10-04 13:28:35'),
(38, 39, 'Визитка Техно 1', 'cutaway26.png', 'cutaway26_preview.png', 128, 73, 'Active', '2014-10-04 13:28:35'),
(39, 40, 'Визитка Техно 2', 'cutaway27.png', 'cutaway27_preview.png', 128, 73, 'Active', '2014-10-04 13:28:35'),
(40, 41, 'Визитка Техно 3', 'cutaway28.png', 'cutaway28_preview.png', 128, 73, 'Active', '2014-10-04 13:28:35'),
(41, 42, 'Визитка Техно 4', 'cutaway29.png', 'cutaway29_preview.png', 128, 73, 'Active', '2014-10-04 13:28:35'),
(42, 43, 'Визитка Техно 5', 'cutaway30.png', 'cutaway30_preview.png', 128, 73, 'Active', '2014-10-04 13:28:35'),
(43, 44, 'Визитка Градиент 1', 'cutaway31.png', 'cutaway31_preview.png', 128, 70, 'Active', '2014-10-04 13:28:35'),
(44, 45, 'Визитка Градиент 2', 'cutaway32.png', 'cutaway32_preview.png', 128, 70, 'Active', '2014-10-04 13:28:35'),
(45, 46, 'Визитка Градиент 3', 'cutaway33.png', 'cutaway33_preview.png', 128, 70, 'Active', '2014-10-04 13:28:35'),
(46, 47, 'Визитка Градиент 4', 'cutaway34.png', 'cutaway34_preview.png', 128, 70, 'Active', '2014-10-04 13:28:35'),
(47, 48, 'Визитка Градиент 5', 'cutaway35.png', 'cutaway35_preview.png', 128, 70, 'Active', '2014-10-04 13:28:35'),
(77, 49, NULL, 'cutaway36.png', 'cutaway36_preview.png', 128, 70, 'Active', '2014-10-04 14:25:39'),
(78, 49, NULL, 'cutaway36.png', 'cutaway36_preview.png', 128, 70, 'Active', '2014-10-04 14:28:27'),
(79, 49, NULL, 'cutaway36.png', 'cutaway36_preview.png', 128, 70, 'Active', '2014-10-04 14:32:51'),
(80, 49, NULL, 'cutaway36.png', 'cutaway36_preview.png', 128, 70, 'Active', '2014-10-04 14:34:19'),
(81, 49, NULL, 'cutaway36.png', 'cutaway36_preview.png', 128, 70, 'Active', '2014-10-04 14:34:48'),
(82, 49, NULL, 'cutaway36.png', 'cutaway36_preview.png', 128, 70, 'Active', '2014-10-04 14:35:38'),
(83, 49, NULL, 'cutaway36.png', 'cutaway36_preview.png', 128, 70, 'Active', '2014-10-04 14:37:08'),
(84, 49, NULL, 'cutaway36.png', 'cutaway36_preview.png', 128, 70, 'Active', '2014-10-04 15:54:29'),
(85, 49, NULL, 'cutaway36.png', 'cutaway36_preview.png', 128, 70, 'Active', '2014-10-04 15:55:09'),
(86, 49, NULL, 'cutaway36.png', 'cutaway36_preview.png', 128, 70, 'Active', '2014-10-04 16:12:15'),
(87, 49, NULL, 'cutaway36.png', 'cutaway36_preview.png', 128, 70, 'Active', '2014-10-04 16:17:56'),
(88, 49, NULL, 'cutaway36.png', 'cutaway36_preview.png', 128, 70, 'Active', '2014-10-04 16:21:19'),
(89, 49, NULL, 'cutaway36.png', 'cutaway36_preview.png', 128, 70, 'Active', '2014-10-04 16:34:35'),
(90, 49, NULL, 'cutaway36.png', 'cutaway36_preview.png', 128, 70, 'Active', '2014-10-04 16:47:28'),
(91, 49, NULL, 'cutaway36.png', 'cutaway36_preview.png', 128, 70, 'Active', '2014-10-06 06:36:05');

-- --------------------------------------------------------

--
-- Структура таблицы `good_price`
--

CREATE TABLE IF NOT EXISTS `good_price` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `good_id` int(11) unsigned NOT NULL,
  `count` int(11) DEFAULT NULL,
  `price` decimal(6,2) NOT NULL DEFAULT '0.00',
  `status` enum('Active','Blocked','Deleted') NOT NULL DEFAULT 'Active',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `good_id` (`good_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=157 ;

--
-- Дамп данных таблицы `good_price`
--

INSERT INTO `good_price` (`id`, `good_id`, `count`, `price`, `status`, `changed`) VALUES
(2, 1, 99, '2.60', 'Active', '2014-08-03 08:03:41'),
(3, 1, 299, '2.50', 'Active', '2014-08-03 08:03:44'),
(4, 1, NULL, '2.40', 'Active', '2014-08-02 12:57:28'),
(5, 2, 99, '2.60', 'Active', '2014-08-03 08:03:46'),
(6, 2, 299, '2.50', 'Active', '2014-08-03 08:03:51'),
(7, 2, NULL, '2.40', 'Active', '2014-08-02 14:12:51'),
(8, 3, 99, '2.60', 'Active', '2014-08-03 08:03:54'),
(9, 3, 299, '2.50', 'Active', '2014-08-03 08:03:57'),
(10, 3, NULL, '2.40', 'Active', '2014-08-02 14:12:51'),
(11, 4, 99, '2.60', 'Active', '2014-08-03 08:04:01'),
(12, 4, 299, '2.50', 'Active', '2014-08-03 08:04:04'),
(13, 4, NULL, '2.40', 'Active', '2014-08-02 14:12:51'),
(14, 5, 99, '2.60', 'Active', '2014-08-03 08:04:07'),
(15, 5, 299, '2.50', 'Active', '2014-08-03 08:04:10'),
(16, 5, NULL, '2.40', 'Active', '2014-08-02 14:12:51'),
(17, 6, 99, '2.60', 'Active', '2014-08-03 08:04:12'),
(18, 6, 299, '2.50', 'Active', '2014-08-03 08:04:22'),
(19, 6, NULL, '2.40', 'Active', '2014-08-02 14:12:51'),
(20, 7, 99, '2.60', 'Active', '2014-08-03 08:04:19'),
(21, 7, 299, '2.50', 'Active', '2014-08-03 08:04:28'),
(22, 7, NULL, '2.40', 'Active', '2014-08-02 14:12:51'),
(23, 8, 99, '2.60', 'Active', '2014-08-03 08:04:16'),
(24, 8, 299, '2.50', 'Active', '2014-08-03 08:04:25'),
(25, 8, NULL, '2.40', 'Active', '2014-08-02 14:12:51'),
(26, 13, NULL, '2.00', 'Active', '2014-08-16 10:03:28'),
(27, 14, 99, '1.50', 'Active', '2014-09-13 04:20:14'),
(28, 14, NULL, '1.00', 'Active', '2014-09-13 04:20:14'),
(29, 15, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(30, 16, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(31, 17, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(32, 18, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(33, 19, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(34, 20, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(35, 21, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(36, 22, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(37, 23, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(38, 24, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(39, 25, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(40, 26, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(41, 27, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(42, 28, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(43, 29, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(44, 30, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(45, 31, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(46, 32, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(47, 33, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(48, 34, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(49, 35, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(50, 36, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(51, 37, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(52, 38, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(53, 39, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(54, 40, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(55, 41, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(56, 42, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(57, 43, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(58, 44, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(59, 45, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(60, 46, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(61, 47, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(62, 48, 99, '1.50', 'Active', '2014-10-04 13:33:48'),
(92, 15, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(93, 16, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(94, 17, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(95, 18, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(96, 19, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(97, 20, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(98, 21, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(99, 22, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(100, 23, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(101, 24, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(102, 25, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(103, 26, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(104, 27, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(105, 28, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(106, 29, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(107, 30, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(108, 31, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(109, 32, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(110, 33, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(111, 34, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(112, 35, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(113, 36, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(114, 37, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(115, 38, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(116, 39, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(117, 40, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(118, 41, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(119, 42, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(120, 43, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(121, 44, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(122, 45, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(123, 46, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(124, 47, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(125, 48, NULL, '1.00', 'Active', '2014-10-04 13:33:54'),
(155, 49, 99, '1.00', 'Active', '2014-10-04 14:20:33'),
(156, 49, NULL, '1.50', 'Active', '2014-10-04 14:20:33');

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `album_id` int(10) unsigned NOT NULL,
  `name` varchar(64) NOT NULL,
  `filename` varchar(128) NOT NULL,
  `orientation` enum('Horizontal','Vertical') NOT NULL DEFAULT 'Horizontal',
  `width` mediumint(8) unsigned NOT NULL,
  `height` mediumint(8) unsigned NOT NULL,
  `progress` enum('Filling','Purchased','Printing','Printed','Finished') NOT NULL DEFAULT 'Filling',
  `status` enum('Active','Blocked','Deleted') NOT NULL DEFAULT 'Active',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `album_id` (`album_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=99 ;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id`, `album_id`, `name`, `filename`, `orientation`, `width`, `height`, `progress`, `status`, `changed`) VALUES
(1, 7, 'IMG_9687.jpg', '5393280013e5a.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-07 14:56:00'),
(2, 7, 'IMG_9688.jpg', '539328001e4e2.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-07 14:56:00'),
(3, 8, 'IMG_9687.jpg', '53932a528a211.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-07 15:05:54'),
(4, 8, 'IMG_9688.jpg', '53932a52929d2.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-07 15:05:54'),
(5, 9, 'IMG_9687.jpg', '5393315af1946.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-07 15:35:54'),
(6, 9, 'IMG_9688.jpg', '5393315b07994.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-07 15:35:55'),
(7, 10, 'IMG_9687.jpg', '539331d9aa31c.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-07 15:38:01'),
(8, 10, 'IMG_9688.jpg', '539331d9cbc09.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-07 15:38:01'),
(9, 11, 'IMG_9687.jpg', '5393328787c7a.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-07 15:40:55'),
(10, 11, 'IMG_9688.jpg', '5393328790416.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-07 15:40:55'),
(11, 12, 'IMG_9687.jpg', '539332a8bf036.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-07 15:41:28'),
(12, 12, 'IMG_9688.jpg', '539332a8c7582.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-07 15:41:28'),
(13, 13, 'IMG_9687.jpg', '5393335ad9851.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-07 15:44:26'),
(14, 13, 'IMG_9688.jpg', '5393335ae1a58.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-07 15:44:26'),
(15, 14, 'IMG_9687.jpg', '5393338aab49e.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-07 15:45:14'),
(16, 14, 'IMG_9688.jpg', '5393338ab387d.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-07 15:45:14'),
(17, 15, 'IMG_9687.jpg', '539333bb2fefe.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-07 15:46:03'),
(18, 15, 'IMG_9688.jpg', '539333bb3a70e.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-07 15:46:03'),
(19, 16, 'IMG_9687.jpg', '539333dc457d6.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-07 15:46:36'),
(20, 16, 'IMG_9688.jpg', '539333dc51c0f.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-07 15:46:36'),
(21, 19, 'IMG_9687.jpg', '539417092e6ec.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-08 07:55:53'),
(22, 19, 'IMG_9688.jpg', '53941709383ca.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-08 07:55:53'),
(23, 21, 'IMG_9687.jpg', '539479011ba07.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-21 07:54:51'),
(24, 21, 'IMG_9688.jpg', '5394790134a70.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-08 14:53:53'),
(25, 22, 'IMG_9687.jpg', '5396dc4676cac.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-10 10:21:58'),
(26, 22, 'IMG_9688.jpg', '5396dc469398c.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-10 10:21:58'),
(27, 23, 'IMG_9687.jpg', '53987a214df67.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-11 15:47:46'),
(28, 23, 'IMG_9688.jpg', '53987a2211c55.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-11 15:47:46'),
(29, 24, 'IMG_9687.jpg', '539f80fc2bbd5.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-16 23:42:52'),
(30, 24, 'IMG_9688.jpg', '539f80fc3c6d5.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-16 23:42:52'),
(31, 25, 'IMG_9687.jpg', '539f812c54a7c.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-16 23:43:40'),
(32, 25, 'IMG_9688.jpg', '539f812c5ed6c.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-16 23:43:40'),
(33, 26, 'IMG_9687.jpg', '539f8174759dc.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-16 23:44:52'),
(34, 26, 'IMG_9688.jpg', '539f81747f111.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-16 23:44:52'),
(35, 27, 'IMG_9687.jpg', 'im539f8244abf3f.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-16 23:48:20'),
(36, 27, 'IMG_9688.jpg', 'im539f8244b47e3.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-16 23:48:20'),
(37, 29, 'IMG_9687.jpg', 'im539f8290532ba.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-16 23:49:36'),
(38, 29, 'IMG_9688.jpg', 'im539f82905d664.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-17 00:11:47'),
(39, 30, 'IMG_9695.jpg', 'im539f945c67354.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-17 01:05:32'),
(40, 30, 'IMG_9696.jpg', 'im539f945c71704.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-17 01:05:32'),
(41, 31, 'IMG_9695.jpg', 'im539f94958b9f3.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-17 01:06:29'),
(42, 29, 'IMG_9695.jpg', 'im539f94d105763.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-17 01:07:29'),
(43, 29, 'SDC10453.JPG', 'im539f9562b4ab5.jpg', 'Horizontal', 3264, 2448, 'Filling', 'Active', '2014-06-17 01:09:54'),
(46, 29, 'Фото0750.jpg', 'im539f974594e6c.jpg', 'Vertical', 1944, 2592, 'Filling', 'Active', '2014-06-17 01:17:57'),
(47, 21, 'SDC14377.JPG', 'im53a6816b9a764.jpg', 'Horizontal', 3264, 2448, 'Filling', 'Active', '2014-06-22 07:10:35'),
(48, 21, 'SDC14390.JPG', 'im53a6816bb02d0.jpg', 'Vertical', 2448, 3264, 'Filling', 'Active', '2014-06-22 07:10:35'),
(49, 32, 'SDC14375.JPG', 'im53a68265172a9.jpg', 'Horizontal', 3264, 2448, 'Filling', 'Active', '2014-06-22 07:14:45'),
(50, 32, 'SDC14376.JPG', 'im53a6826526855.jpg', 'Horizontal', 3264, 2448, 'Filling', 'Active', '2014-06-22 07:14:45'),
(51, 33, 'IMG_9687.jpg', 'im53a68cfeb11b2.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-22 07:59:58'),
(52, 33, 'IMG_9688.jpg', 'im53a68cfebf5e3.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-22 07:59:58'),
(53, 33, 'IMG_9695.jpg', 'im53a68cfec78a7.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-06-22 07:59:58'),
(54, 34, 'IMG_9687.jpg', 'im53b92b9eabb79.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-07-06 10:57:34'),
(55, 34, 'IMG_9688.jpg', 'im53b92b9f19d45.jpg', 'Horizontal', 5184, 3456, 'Filling', 'Active', '2014-07-06 10:57:35'),
(56, 34, 'IMG_9691.jpg', 'im53b92b9f2605b.jpg', 'Vertical', 3456, 5184, 'Filling', 'Active', '2014-07-06 10:57:35'),
(57, 34, 'liliya.png', 'im53b92bf11e59b.png', 'Vertical', 538, 1207, 'Filling', 'Active', '2014-07-06 10:58:57'),
(58, 35, 'chelny.jpg', 'im53c2c0af3447f.jpg', 'Horizontal', 1280, 960, 'Filling', 'Active', '2014-07-13 17:23:59'),
(59, 35, 'default.jpeg', 'im53c2c0af52ccc.jpeg', 'Horizontal', 720, 631, 'Filling', 'Active', '2014-07-13 17:23:59'),
(60, 35, 'ins01_(1).jpg', 'im53c2c0af5bfae.jpg', 'Horizontal', 380, 240, 'Filling', 'Active', '2014-07-13 17:23:59'),
(61, 36, 'folder.png', 'im53dd019679244.png', 'Vertical', 128, 128, 'Filling', 'Active', '2014-08-02 15:19:50'),
(62, 37, 'empty.png', 'im53dd0269b98b9.png', 'Vertical', 128, 128, 'Filling', 'Active', '2014-08-02 15:23:21'),
(63, 37, 'folder.png', 'im53dd0269c300e.png', 'Vertical', 128, 128, 'Filling', 'Active', '2014-08-02 15:23:21'),
(64, 37, 'photos.png', 'im53dd0269cb3eb.png', 'Vertical', 128, 128, 'Filling', 'Active', '2014-08-02 15:23:21'),
(65, 37, 'photos-a4-black.png', 'im53dd0269db75e.png', 'Vertical', 128, 128, 'Filling', 'Active', '2014-08-02 15:23:21'),
(66, 37, 'photos-a4-color.png', 'im53dd0269e44cb.png', 'Vertical', 128, 128, 'Filling', 'Active', '2014-08-02 15:23:21'),
(67, 38, 'empty.png', 'im53de48999ae55.png', 'Vertical', 128, 128, 'Filling', 'Active', '2014-08-03 14:35:05'),
(68, 40, 'photos-a4-color.png', 'im53de5a3b08c60.png', 'Vertical', 128, 128, 'Filling', 'Active', '2014-08-03 15:50:19'),
(69, 41, 'photos.png', 'im53de5a95c1490.png', 'Vertical', 128, 128, 'Filling', 'Active', '2014-08-03 15:51:49'),
(70, 42, 'photos-a4-black.png', 'im53de6c3930fed.png', 'Vertical', 128, 128, 'Filling', 'Active', '2014-08-03 17:07:05'),
(71, 43, 'photos-a4-color.png', 'im53de6ca33e131.png', 'Vertical', 128, 128, 'Filling', 'Active', '2014-08-03 17:08:51'),
(72, 44, 'photos-a4-color.png', 'im53de6cd623a31.png', 'Vertical', 128, 128, 'Filling', 'Active', '2014-08-03 17:09:42'),
(73, 44, 'photos-a4-black.png', 'im53de844da54dc.png', 'Vertical', 128, 128, 'Filling', 'Active', '2014-08-03 18:49:49'),
(74, 36, '53i2Av1ZVfg.jpg', 'im53e1cb0c57d47.jpg', 'Vertical', 605, 807, 'Filling', 'Active', '2014-08-06 06:28:28'),
(75, 37, 'avatar.jpg', 'im53f886cbb9ec6.jpg', 'Vertical', 683, 1024, 'Filling', 'Active', '2014-08-23 12:19:23'),
(76, 36, 'avatar.jpg', 'im53f8a33a42f8c.jpg', 'Vertical', 683, 1024, 'Filling', 'Active', '2014-08-23 14:20:42'),
(77, 36, 'chelny.jpg', 'im53f8a4ae29c2b.jpg', 'Horizontal', 1280, 960, 'Filling', 'Active', '2014-08-23 14:26:54'),
(78, 36, '2014-05-21-20-56-44.png', 'im53f8a59b9d823.png', 'Horizontal', 1350, 768, 'Filling', 'Active', '2014-08-23 14:30:51'),
(79, 36, 'black_2.png', 'im53f8a84b935c0.png', 'Horizontal', 766, 670, 'Filling', 'Active', '2014-08-23 14:42:19'),
(80, 38, 'clearing-assets.png', 'im53f8a879890d4.png', 'Horizontal', 1260, 642, 'Filling', 'Active', '2014-08-23 14:43:05'),
(81, 36, 'config-manager.png', 'im53f8ac1c0c6eb.png', 'Horizontal', 806, 449, 'Filling', 'Active', '2014-08-23 14:58:36'),
(82, 36, 'black_2.png', 'im53f8ac294a745.png', 'Horizontal', 766, 670, 'Filling', 'Active', '2014-08-23 14:58:49'),
(83, 36, 'black_2.png', 'im53f8ac4fc88eb.png', 'Horizontal', 766, 670, 'Filling', 'Active', '2014-08-23 14:59:27'),
(84, 36, 'black_2.png', 'im53f8ad08d47cd.png', 'Horizontal', 766, 670, 'Filling', 'Active', '2014-08-23 15:02:32'),
(85, 36, '24669.png', 'im53f8ada81e999.png', 'Horizontal', 1012, 690, 'Filling', 'Active', '2014-08-23 15:05:12'),
(86, 36, 'black_2.png', 'im53f8adaf35e83.png', 'Horizontal', 766, 670, 'Filling', 'Active', '2014-08-23 15:05:19'),
(87, 45, '53i2Av1ZVfg.jpg', 'im540d4bbcc5579.jpg', 'Vertical', 605, 807, 'Filling', 'Active', '2014-09-08 06:25:00'),
(88, 46, '53i2Av1ZVfg.jpg', 'im540d4c0650437.jpg', 'Vertical', 605, 807, 'Filling', 'Active', '2014-09-08 06:26:14'),
(89, 46, '2014-05-21-20-56-44.png', 'im540d4d455dd0c.png', 'Horizontal', 1350, 768, 'Filling', 'Active', '2014-09-08 06:31:33'),
(90, 46, 'example-tool.png', 'im540d4d536f3d4.png', 'Horizontal', 616, 420, 'Filling', 'Active', '2014-09-08 06:31:47'),
(91, 46, 'deployed.png', 'im540d4d5f85bb5.png', 'Vertical', 360, 546, 'Filling', 'Active', '2014-09-08 06:31:59'),
(92, 46, 'default.jpeg', 'im540d4d7f1751a.jpeg', 'Horizontal', 720, 631, 'Filling', 'Active', '2014-09-08 06:32:31'),
(93, 46, 'default.jpeg', 'im540d4f295693e.jpeg', 'Horizontal', 720, 631, 'Filling', 'Active', '2014-09-08 06:39:37'),
(94, 47, 'default.jpeg', 'im540d5c4588298.jpeg', 'Horizontal', 720, 631, 'Filling', 'Active', '2014-09-08 07:35:33'),
(95, 48, '2014-05-21-20-56-44.png', 'im5419368630816.png', 'Horizontal', 1350, 768, 'Filling', 'Active', '2014-09-17 07:21:42'),
(96, 48, 'att.png', 'im541936865a493.png', 'Horizontal', 1920, 912, 'Filling', 'Active', '2014-09-17 07:21:42'),
(97, 48, 'avatar.jpg', 'im541936866801c.jpg', 'Vertical', 683, 1024, 'Filling', 'Active', '2014-09-17 07:21:42'),
(98, 48, 'big.jpg', 'im5458e2e5a14b9.jpg', 'Horizontal', 424, 400, 'Filling', 'Active', '2014-11-04 14:29:57');

-- --------------------------------------------------------

--
-- Структура таблицы `image_effect`
--

CREATE TABLE IF NOT EXISTS `image_effect` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image_id` int(10) unsigned NOT NULL,
  `effect_id` int(10) unsigned NOT NULL,
  `params` text,
  `status` enum('Active','Blocked','Deleted') NOT NULL DEFAULT 'Active',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `image_id` (`image_id`),
  KEY `effect_id` (`effect_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=160 ;

--
-- Дамп данных таблицы `image_effect`
--

INSERT INTO `image_effect` (`id`, `image_id`, `effect_id`, `params`, `status`, `changed`) VALUES
(1, 95, 5, NULL, 'Deleted', '2014-11-04 06:35:09'),
(2, 95, 5, NULL, 'Deleted', '2014-11-04 06:51:31'),
(3, 95, 4, NULL, 'Deleted', '2014-11-04 06:51:32'),
(4, 95, 6, NULL, 'Deleted', '2014-11-04 06:51:52'),
(5, 95, 4, NULL, 'Deleted', '2014-11-04 06:51:55'),
(6, 95, 4, NULL, 'Deleted', '2014-11-04 06:57:26'),
(7, 95, 5, NULL, 'Deleted', '2014-11-04 06:57:28'),
(8, 95, 4, NULL, 'Deleted', '2014-11-04 06:57:29'),
(9, 95, 5, NULL, 'Deleted', '2014-11-04 07:01:04'),
(10, 96, 5, NULL, 'Deleted', '2014-11-04 13:32:13'),
(11, 96, 4, NULL, 'Deleted', '2014-11-04 13:32:16'),
(12, 96, 5, NULL, 'Deleted', '2014-11-04 13:32:18'),
(13, 97, 5, NULL, 'Deleted', '2014-11-04 13:32:24'),
(14, 97, 5, NULL, 'Deleted', '2014-11-04 13:32:27'),
(15, 97, 6, NULL, 'Deleted', '2014-11-04 13:32:35'),
(16, 1, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(17, 2, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(18, 3, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(19, 4, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(20, 5, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(21, 6, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(22, 7, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(23, 8, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(24, 9, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(25, 10, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(26, 11, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(27, 12, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(28, 13, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(29, 14, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(30, 15, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(31, 16, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(32, 17, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(33, 18, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(34, 19, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(35, 20, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(36, 21, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(37, 22, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(38, 23, 1, '{"left":389,"right":1701,"top":142,"bottom":1262}', 'Active', '2014-11-04 13:36:13'),
(39, 24, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(40, 25, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(41, 26, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(42, 27, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(43, 28, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(44, 29, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(45, 30, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(46, 31, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(47, 32, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(48, 33, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(49, 34, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(50, 35, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(51, 36, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(52, 37, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(53, 38, 1, '{"left":333,"right":444,"top":220,"bottom":555}', 'Active', '2014-11-04 13:36:13'),
(54, 39, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(55, 40, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(56, 41, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(57, 42, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(58, 43, 1, '{"left":0,"right":0,"top":136,"bottom":136}', 'Active', '2014-11-04 13:36:13'),
(59, 46, 1, '{"left":108,"right":108,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(60, 47, 1, '{"left":0,"right":0,"top":0,"bottom":272}', 'Active', '2014-11-04 13:36:13'),
(61, 48, 1, '{"left":301,"right":718,"top":327,"bottom":798}', 'Active', '2014-11-04 13:36:13'),
(62, 49, 1, '{"left":0,"right":0,"top":136,"bottom":136}', 'Active', '2014-11-04 13:36:13'),
(63, 50, 1, '{"left":559,"right":1796,"top":1082,"bottom":768}', 'Active', '2014-11-04 13:36:13'),
(64, 51, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(65, 52, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(66, 53, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(67, 54, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(68, 55, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(69, 56, 1, '{"left":0,"right":0,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(70, 57, 1, '{"left":84,"right":233,"top":50,"bottom":827}', 'Active', '2014-11-04 13:36:13'),
(71, 58, 1, '{"left":0,"right":0,"top":54,"bottom":54}', 'Active', '2014-11-04 13:36:13'),
(72, 59, 1, '{"left":366,"right":26,"top":278,"bottom":135}', 'Active', '2014-11-04 13:36:13'),
(73, 60, 1, '{"left":10,"right":10,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(74, 61, 1, '{"left":51,"right":24,"top":0,"bottom":49}', 'Active', '2014-11-04 13:36:13'),
(75, 62, 1, '{"left":18,"right":18,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(76, 63, 1, '{"left":18,"right":18,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(77, 64, 1, '{"left":18,"right":18,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(78, 65, 1, '{"left":18,"right":18,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(79, 66, 1, '{"left":18,"right":18,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(80, 67, 1, '{"left":22,"right":22,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(81, 68, 1, '{"left":43,"right":53,"top":39,"bottom":41}', 'Active', '2014-11-04 13:36:13'),
(82, 69, 1, '{"left":32,"right":62,"top":15,"bottom":62}', 'Active', '2014-11-04 13:36:13'),
(83, 70, 1, '{"left":22,"right":22,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(84, 71, 1, '{"left":22,"right":22,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(85, 72, 1, '{"left":22,"right":22,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(86, 73, 1, '{"left":22,"right":22,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(87, 74, 1, '{"left":34,"right":34,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(88, 75, 1, '{"left":0,"right":0,"top":40,"bottom":40}', 'Active', '2014-11-04 13:36:13'),
(89, 76, 1, '{"left":1,"right":1,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(90, 77, 1, '{"left":0,"right":0,"top":54,"bottom":54}', 'Active', '2014-11-04 13:36:13'),
(91, 78, 1, '{"left":99,"right":99,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(92, 79, 1, '{"left":0,"right":0,"top":80,"bottom":80}', 'Active', '2014-11-04 13:36:13'),
(93, 80, 1, '{"left":149,"right":149,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(94, 81, 1, '{"left":67,"right":67,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(95, 82, 1, '{"left":0,"right":0,"top":80,"bottom":80}', 'Active', '2014-11-04 13:36:13'),
(96, 83, 1, '{"left":0,"right":0,"top":80,"bottom":80}', 'Active', '2014-11-04 13:36:13'),
(97, 84, 1, '{"left":0,"right":0,"top":80,"bottom":80}', 'Active', '2014-11-04 13:36:13'),
(98, 85, 1, '{"left":0,"right":0,"top":8,"bottom":8}', 'Active', '2014-11-04 13:36:13'),
(99, 86, 1, '{"left":0,"right":0,"top":80,"bottom":80}', 'Active', '2014-11-04 13:36:13'),
(100, 87, 1, '{"left":34,"right":34,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(101, 88, 1, '{"left":34,"right":34,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(102, 89, 1, '{"left":330,"right":453,"top":120,"bottom":271}', 'Active', '2014-11-04 13:36:13'),
(103, 90, 1, '{"left":0,"right":0,"top":5,"bottom":5}', 'Active', '2014-11-04 13:36:13'),
(104, 91, 1, '{"left":0,"right":0,"top":3,"bottom":3}', 'Active', '2014-11-04 13:36:13'),
(105, 92, 1, '{"left":0,"right":0,"top":76,"bottom":76}', 'Active', '2014-11-04 13:36:13'),
(106, 93, 1, '{"left":0,"right":0,"top":76,"bottom":76}', 'Active', '2014-11-04 13:36:13'),
(107, 94, 1, '{"left":122,"right":103,"top":143,"bottom":158}', 'Active', '2014-11-04 13:36:13'),
(108, 95, 1, '{"top":"38","bottom":"275","right":"581","left":"86"}', 'Active', '2014-11-04 13:36:13'),
(109, 96, 1, '{"left":276,"right":276,"top":0,"bottom":0}', 'Active', '2014-11-04 13:36:13'),
(110, 97, 1, '{"top":"117","bottom":"239","right":"82","left":"156"}', 'Active', '2014-11-04 13:36:13'),
(143, 98, 1, '{"top":"59","bottom":"90","right":"48","left":"0"}', 'Active', '2014-11-04 14:29:57'),
(144, 95, 6, NULL, 'Deleted', '2014-11-04 15:00:17'),
(145, 95, 5, NULL, 'Deleted', '2014-11-04 15:02:33'),
(146, 95, 4, NULL, 'Deleted', '2014-11-04 15:02:51'),
(147, 95, 5, NULL, 'Deleted', '2014-11-04 15:02:52'),
(148, 95, 6, NULL, 'Deleted', '2014-11-04 15:02:54'),
(149, 98, 4, NULL, 'Deleted', '2014-11-05 08:55:12'),
(150, 98, 5, NULL, 'Deleted', '2014-11-05 08:55:15'),
(151, 98, 6, NULL, 'Deleted', '2014-11-05 08:55:21'),
(152, 98, 5, NULL, 'Deleted', '2014-11-05 08:55:25'),
(153, 98, 5, NULL, 'Active', '2014-11-05 08:55:27'),
(154, 95, 6, NULL, 'Deleted', '2014-11-05 08:55:30'),
(155, 95, 6, NULL, 'Deleted', '2014-11-05 08:55:35'),
(156, 95, 4, NULL, 'Deleted', '2014-11-05 08:57:05'),
(157, 95, 6, NULL, 'Deleted', '2014-11-05 08:57:30'),
(158, 95, 5, NULL, 'Deleted', '2014-11-05 08:57:31'),
(159, 95, 4, NULL, 'Deleted', '2014-11-05 08:57:32');

-- --------------------------------------------------------

--
-- Структура таблицы `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `cart_id` int(10) unsigned NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `paid` timestamp NULL DEFAULT NULL,
  `progress` enum('paying','paid') NOT NULL DEFAULT 'paying',
  `status` enum('Active','Blocked','Deleted') NOT NULL DEFAULT 'Active',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `cart_id` (`cart_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `invoice`
--

INSERT INTO `invoice` (`id`, `user_id`, `cart_id`, `amount`, `description`, `paid`, `progress`, `status`, `changed`) VALUES
(7, 3, 1, '30.00', NULL, '2014-08-23 10:12:08', 'paid', 'Active', '2014-08-23 10:12:02'),
(8, 6, 4, '2.40', NULL, '2014-09-08 08:11:43', 'paid', 'Active', '2014-09-08 08:11:35'),
(9, 6, 5, '28.80', NULL, '2014-09-13 05:42:19', 'paid', 'Active', '2014-09-13 05:42:18'),
(10, 7, 6, '9.60', NULL, '2014-11-05 08:58:47', 'paid', 'Active', '2014-11-05 08:58:39');

-- --------------------------------------------------------

--
-- Структура таблицы `office`
--

CREATE TABLE IF NOT EXISTS `office` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city_id` int(10) unsigned NOT NULL,
  `address` varchar(128) NOT NULL,
  `phone` varchar(64) NOT NULL,
  `work_day_start` tinyint(3) unsigned NOT NULL,
  `work_day_end` tinyint(3) unsigned NOT NULL,
  `work_time_start` time NOT NULL,
  `work_time_end` time NOT NULL,
  `lunch` time DEFAULT NULL,
  `x` decimal(9,6) NOT NULL,
  `y` decimal(9,6) NOT NULL,
  `status` enum('Active','Blocked','Deleted') NOT NULL DEFAULT 'Active',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `city_id` (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `office`
--

INSERT INTO `office` (`id`, `city_id`, `address`, `phone`, `work_day_start`, `work_day_end`, `work_time_start`, `work_time_end`, `lunch`, `x`, `y`, `status`, `changed`) VALUES
(1, 1, 'Ул. Ак.Рубаненко,4 (1/06)', '+7(987)277-66-26', 0, 4, '09:00:00', '17:00:00', '13:00:00', '55.742280', '52.423798', 'Active', '2014-11-09 14:12:08');

-- --------------------------------------------------------

--
-- Структура таблицы `office_delivery`
--

CREATE TABLE IF NOT EXISTS `office_delivery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `office_id` int(10) unsigned NOT NULL,
  `delivery_id` int(10) unsigned NOT NULL,
  `status` enum('Active','Blocked','Deleted') NOT NULL DEFAULT 'Active',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `office_id` (`office_id`),
  KEY `delivery_id` (`delivery_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `office_delivery`
--

INSERT INTO `office_delivery` (`id`, `office_id`, `delivery_id`, `status`, `changed`) VALUES
(1, 1, 2, 'Active', '2014-11-09 14:50:37');

-- --------------------------------------------------------

--
-- Структура таблицы `office_payment`
--

CREATE TABLE IF NOT EXISTS `office_payment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `office_id` int(10) unsigned NOT NULL,
  `payment_id` int(10) unsigned NOT NULL,
  `status` enum('Active','Blocked','Deleted') NOT NULL DEFAULT 'Active',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `office_id` (`office_id`),
  KEY `payment_id` (`payment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `office_payment`
--

INSERT INTO `office_payment` (`id`, `office_id`, `payment_id`, `status`, `changed`) VALUES
(1, 1, 1, 'Active', '2014-11-09 14:50:49'),
(2, 1, 2, 'Active', '2014-11-09 14:50:49');

-- --------------------------------------------------------

--
-- Структура таблицы `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `status` enum('Active','Blocked','Deleted') NOT NULL DEFAULT 'Active',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `payment`
--

INSERT INTO `payment` (`id`, `title`, `description`, `status`, `changed`) VALUES
(1, 'Online-платежи', 'Банковская карта позволяет оплатить заказ из любой точки страны при доступе в Интернет. Безопасность обеспечивает система электронных плaтежей RoboKassa.', 'Active', '2014-11-09 14:43:35'),
(2, 'Наличными', 'Оплачивайте свои заказы наличными на пунктах выдачи либо курьеру\r\n', 'Active', '2014-11-09 14:43:35');

-- --------------------------------------------------------

--
-- Структура таблицы `print_format`
--

CREATE TABLE IF NOT EXISTS `print_format` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `type` enum('a1','a2','a3','a4','a5','a6','other') NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `weight` mediumint(8) unsigned NOT NULL,
  `paper_type` enum('glossy','matte') NOT NULL DEFAULT 'matte',
  `color` enum('rgb','black') NOT NULL,
  `status` enum('Active','Blocked','Deleted') NOT NULL DEFAULT 'Active',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `print_format`
--

INSERT INTO `print_format` (`id`, `title`, `type`, `width`, `height`, `weight`, `paper_type`, `color`, `status`, `changed`) VALUES
(1, 'Стандартные глянец 10x15', 'a6', 100, 150, 170, 'glossy', 'rgb', 'Active', '2014-08-03 06:29:34'),
(2, 'Стандартные матовый 10x15', 'a6', 100, 150, 170, 'matte', 'rgb', 'Active', '2014-08-03 06:29:34'),
(3, 'Стандартные глянец 13x18', 'other', 130, 180, 170, 'glossy', 'rgb', 'Active', '2014-08-03 06:30:26'),
(4, 'Стандартные матовый 13x18', 'other', 130, 180, 170, 'matte', 'rgb', 'Active', '2014-08-03 06:30:26'),
(5, 'Стандартные глянец 15x21', 'a5', 150, 210, 170, 'glossy', 'rgb', 'Active', '2014-08-03 06:31:08'),
(6, 'Стандартные матовый 15x21', 'a5', 150, 210, 170, 'matte', 'rgb', 'Active', '2014-08-03 06:31:08'),
(7, 'Стандартные глянец 21x29,7', 'a4', 210, 297, 170, 'glossy', 'rgb', 'Active', '2014-08-03 06:31:46'),
(8, 'Стандартные матовый 21x29,7', 'a4', 210, 297, 170, 'matte', 'rgb', 'Active', '2014-08-03 06:31:46'),
(9, 'Черно-белый матовый А4', 'a4', 210, 297, 80, 'matte', 'black', 'Active', '2014-08-03 06:32:37'),
(10, 'Цветной матовый А4', 'a4', 210, 297, 80, 'matte', 'rgb', 'Active', '2014-08-03 06:32:37'),
(11, 'Черно-белый глянцевый А4', 'a4', 210, 297, 80, 'matte', 'black', 'Active', '2014-08-03 06:33:16'),
(12, 'Цветной глянцевый А4', 'a4', 210, 297, 80, 'glossy', 'rgb', 'Active', '2014-08-03 06:33:16'),
(13, 'Черно-белая матовый визитка', 'other', 150, 100, 2000, 'matte', 'black', 'Active', '2014-09-13 04:14:09'),
(14, 'Цветная матовая визитка', 'other', 150, 100, 2000, 'matte', 'rgb', 'Active', '2014-09-13 04:14:09');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `email` varchar(64) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `type` enum('Guest','User','Admin') NOT NULL DEFAULT 'Guest',
  `status` enum('Active','Blocked','Deleted') NOT NULL DEFAULT 'Active',
  `changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `type`, `status`, `changed`) VALUES
(1, NULL, NULL, NULL, 'Guest', 'Active', '2014-06-07 14:11:19'),
(2, NULL, NULL, NULL, 'Guest', 'Active', '2014-06-22 07:59:15'),
(3, NULL, NULL, NULL, 'Guest', 'Active', '2014-08-01 15:00:11'),
(4, NULL, NULL, NULL, 'Guest', 'Active', '2014-09-08 06:24:10'),
(5, NULL, NULL, NULL, 'Guest', 'Active', '2014-09-08 06:25:14'),
(6, NULL, NULL, NULL, 'Guest', 'Active', '2014-09-08 06:26:14'),
(7, 'Юсупов Ренат', 'zymanch@gmail.com', '2816703bc50f5ac3bccd1c8e20f6e95f', 'User', 'Active', '2014-11-03 06:29:57');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`good_id`) REFERENCES `good` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `album_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`address_id`) REFERENCES `address` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `cart_has_good`
--
ALTER TABLE `cart_has_good`
  ADD CONSTRAINT `cart_has_good_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_has_good_ibfk_2` FOREIGN KEY (`good_id`) REFERENCES `good` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `cart_has_good_count`
--
ALTER TABLE `cart_has_good_count`
  ADD CONSTRAINT `cart_has_good_count_ibfk_1` FOREIGN KEY (`cart_has_good_id`) REFERENCES `cart_has_good` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_has_good_count_ibfk_2` FOREIGN KEY (`good_count_id`) REFERENCES `good_count` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `category_has_good`
--
ALTER TABLE `category_has_good`
  ADD CONSTRAINT `category_has_good_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_has_good_ibfk_2` FOREIGN KEY (`good_id`) REFERENCES `good` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `coupon`
--
ALTER TABLE `coupon`
  ADD CONSTRAINT `coupon_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `album` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `cutaway`
--
ALTER TABLE `cutaway`
  ADD CONSTRAINT `cutaway_ibfk_1` FOREIGN KEY (`cutaway_template_id`) REFERENCES `cutaway_template` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cutaway_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cutaway_ibfk_3` FOREIGN KEY (`good_id`) REFERENCES `good` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `cutaway_template_text`
--
ALTER TABLE `cutaway_template_text`
  ADD CONSTRAINT `cutaway_template_text_ibfk_1` FOREIGN KEY (`cutaway_template_id`) REFERENCES `cutaway_template` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cutaway_template_text_ibfk_2` FOREIGN KEY (`font_id`) REFERENCES `font` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `cutaway_text`
--
ALTER TABLE `cutaway_text`
  ADD CONSTRAINT `cutaway_text_ibfk_1` FOREIGN KEY (`cutaway_id`) REFERENCES `cutaway` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cutaway_text_ibfk_2` FOREIGN KEY (`cutaway_template_text_id`) REFERENCES `cutaway_template_text` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cutaway_text_ibfk_3` FOREIGN KEY (`font_id`) REFERENCES `font` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `good`
--
ALTER TABLE `good`
  ADD CONSTRAINT `good_ibfk_3` FOREIGN KEY (`good_media_id`) REFERENCES `good_media` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `good_count`
--
ALTER TABLE `good_count`
  ADD CONSTRAINT `good_count_ibfk_1` FOREIGN KEY (`good_id`) REFERENCES `good` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `good_media`
--
ALTER TABLE `good_media`
  ADD CONSTRAINT `good_media_ibfk_1` FOREIGN KEY (`good_id`) REFERENCES `good` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `good_price`
--
ALTER TABLE `good_price`
  ADD CONSTRAINT `good_price_ibfk_1` FOREIGN KEY (`good_id`) REFERENCES `good` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `image_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `album` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `image_effect`
--
ALTER TABLE `image_effect`
  ADD CONSTRAINT `image_effect_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `image_effect_ibfk_2` FOREIGN KEY (`effect_id`) REFERENCES `effect` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `invoice_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `invoice_ibfk_2` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `office`
--
ALTER TABLE `office`
  ADD CONSTRAINT `office_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `office_delivery`
--
ALTER TABLE `office_delivery`
  ADD CONSTRAINT `office_delivery_ibfk_2` FOREIGN KEY (`delivery_id`) REFERENCES `delivery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `office_delivery_ibfk_1` FOREIGN KEY (`office_id`) REFERENCES `office` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `office_payment`
--
ALTER TABLE `office_payment`
  ADD CONSTRAINT `office_payment_ibfk_2` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `office_payment_ibfk_1` FOREIGN KEY (`office_id`) REFERENCES `office` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
