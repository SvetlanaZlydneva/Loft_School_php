-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 28 2018 г., 19:57
-- Версия сервера: 5.7.20
-- Версия PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `VP1`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `buyer` int(11) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `comment` text,
  `payment` varchar(15) DEFAULT NULL,
  `callback` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`order_id`, `buyer`, `delivery_address`, `comment`, `payment`, `callback`) VALUES
(19, 13, ' street : Metallyrgov, home : 265, part : 7, appt : 23, floor : 4', 'O_O', 'on', 'on'),
(20, 14, ' street : Pupkina, home : 234', NULL, 'on', NULL),
(21, 1, ' street : Mira, home : 92, floor : 5', NULL, NULL, 'on'),
(22, 1, ' street : Mira, home : 56', NULL, NULL, NULL),
(23, 1, ' street : Pupkina, home : 32', NULL, NULL, NULL),
(24, 1, ' street : Metallyrgov, home : 92', NULL, NULL, NULL),
(25, 1, ' street : Lenina, home : 92', NULL, NULL, NULL),
(26, 1, ' street : Metallyrgov, home : 92', NULL, NULL, NULL),
(27, 1, ' street : Lenina, home : 32', NULL, NULL, NULL),
(28, 1, ' street : Lenina, home : 32', NULL, NULL, NULL),
(29, 14, ' street : Lenina, home : 32', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `email`, `name`, `phone`) VALUES
(1, 'svetlana_d87@mail.ru', 'Svetlana', '+7 (000) 000 00 00'),
(13, 'dima@mail.ru', 'Dima', '+7 (000) 000 00 00'),
(14, 'vera@mail.ru', 'Vera', '+7 (000) 000 00 00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
