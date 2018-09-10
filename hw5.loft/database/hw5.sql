-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 10 2018 г., 20:28
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
-- База данных: `hw5`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `idOrder` int(11) NOT NULL,
  `buyer` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `comment` text,
  `payment` varchar(15) DEFAULT NULL,
  `callback` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`idOrder`, `buyer`, `address`, `comment`, `payment`, `callback`) VALUES
(1, 1, ' street : Lenina, home : 92', '', 'on', 'on'),
(2, 19, ' street : Metallyrgov, home : 54', 'test', NULL, 'on'),
(3, 1, ' street : Metallyrgov, home : 92', '', NULL, NULL),
(4, 1, ' street : Lenina, home : 92', '', NULL, NULL),
(5, 1, ' street : Lenina, home : 92', '', NULL, NULL),
(6, 19, ' street : Metallyrgov, home : 23', '', NULL, NULL),
(7, 1, ' street : Mira, home : 5, part : 5, appt : 63', '', 'on', 'on'),
(8, 20, ' street : Lenina, home : 44', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`idUser`, `email`, `name`, `phone`) VALUES
(1, 'svetlana_d87@mail.ru', 'Svetlana', '+7 (000) 000 00 00'),
(19, 'svetlanaderiglazova87@gmail.com', 'Svetlana', '+7 (000) 000 00 00'),
(20, 'vera@mail.ru', 'Svetlana', '+7 (000) 000 00 00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idOrder`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `idOrder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
