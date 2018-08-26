-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 26 2018 г., 03:23
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
  `id_order` int(11) NOT NULL,
  `buyer` int(11) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `payment` varchar(15) DEFAULT NULL,
  `callback` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id_order`, `buyer`, `delivery_address`, `comment`, `payment`, `callback`) VALUES
(1, 1, ' street : Lenina, home : 92', 'no_coment', 'on', 'on'),
(2, 1, ' street : Mira, home : 99', '-', '-', '-'),
(3, 2, ' street : Not_found, home : 33', '-', '-', 'on'),
(4, 3, ' street : Lenina, home : 44, part : 5, appt : 6, floor : 12', '-', 'on', 'on'),
(5, 1, ' street : Lenina, home : 92', '-', '-', '-'),
(6, 1, ' street : Lenina, home : 92', '-', '-', '-'),
(7, 1, ' street : Mira, home : 32', '-', '-', '-');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `name_user` varchar(255) NOT NULL,
  `phone_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `email_user`, `name_user`, `phone_user`) VALUES
(1, 'svetlana_d87@mail.ru', 'Svetlana', '+7 (000) 000 00 00'),
(2, 'v@mail.ru', 'Gurman', '+7 (000) 000 00 00'),
(3, 'dima@mail.ru', 'Dima', '+7 (000) 000 00 00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
