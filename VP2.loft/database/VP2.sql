-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 05 2018 г., 11:42
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
-- База данных: `VP2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `files`
--

CREATE TABLE `files` (
  `idFile` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `fileName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `files`
--

INSERT INTO `files` (`idFile`, `user`, `fileName`) VALUES
(1, 3, '53782.jpg'),
(2, 1, '53782.jpg'),
(3, 2, 'tmb_145037_6611.jpg'),
(4, 1, '53782.jpg'),
(5, 3, 'tmb_145037_6611.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `idUser` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `about` varchar(255) NOT NULL DEFAULT 'No info',
  `photo` varchar(255) NOT NULL DEFAULT 'noPhoto.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`idUser`, `name`, `email`, `password`, `age`, `about`, `photo`) VALUES
(1, 'Admin', 'admin@mail.ru', 'c4ca4238a0b923820dcc509a6f75849b', 30, 'ADMIN', 'noPhoto.jpg'),
(2, 'Svetlana', 'svetlana_d87@mail.ru', 'c4ca4238a0b923820dcc509a6f75849b', 30, 'Hello', 'noPhoto.jpg'),
(3, 'Irina', 'irina@mail.ru', 'c4ca4238a0b923820dcc509a6f75849b', 15, 'testIrina', 'noPhoto.jpg'),
(4, 'Petro', 'gwendolyn35@hotmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 16, 'qui', 'Рыжая-девушка-6.jpg'),
(5, 'Marfa', 'iwunsch@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 16, 'sint', 'Рыжая-девушка-6.jpg'),
(6, 'Marfa', 'pdavis@hotmail.com', 'c81e728d9d4c2f636f067f89cc14862c', 44, 'et', 'Рыжая-девушка-6.jpg'),
(7, 'Marfa', 'ymante@gmail.com', 'c81e728d9d4c2f636f067f89cc14862c', 22, 'est', 'maxresdefault.jpg'),
(8, 'Petro', 'delia24@hotmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 44, 'optio', 'Красивые-арт-рисунки-картинки-подборка-невероятных-и-удивительных-1.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`idFile`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `files`
--
ALTER TABLE `files`
  MODIFY `idFile` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
