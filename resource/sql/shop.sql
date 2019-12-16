-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 16 2019 г., 19:30
-- Версия сервера: 5.7.25
-- Версия PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `user-cart`
--

CREATE TABLE `user-cart` (
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `product_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user-cart`
--

INSERT INTO `user-cart` (`id_user`, `id_product`, `product_count`) VALUES
(1, 40, 123),
(1, 59, 1),
(1, 18, 1),
(1, 22, 1),
(1, 13, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user-favoutite`
--

CREATE TABLE `user-favoutite` (
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user-favoutite`
--

INSERT INTO `user-favoutite` (`id_user`, `id_product`) VALUES
(1, 18),
(1, 22),
(1, 15),
(1, 13),
(1, 59);

-- --------------------------------------------------------

--
-- Структура таблицы `users_all`
--

CREATE TABLE `users_all` (
  `id_user` int(11) NOT NULL,
  `role` bigint(20) NOT NULL,
  `fio` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `work_number` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `additional_address1` varchar(255) DEFAULT NULL,
  `additional_address2` text,
  `additional_address3` text,
  `additional_address4` text,
  `additional_address5` text,
  `mailing` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_all`
--

INSERT INTO `users_all` (`id_user`, `role`, `fio`, `password`, `email`, `phone_number`, `work_number`, `address`, `additional_address1`, `additional_address2`, `additional_address3`, `additional_address4`, `additional_address5`, `mailing`) VALUES
(1, 0, 'Александр Манисов', '$2y$10$AZMQJL4O9LhR5RKdDq1Lm.zmbkGV2.w9Pgl6pVpq8x3QY.OIZDsYS', 'test@test.ru', ' 7999999999', '', 'z', 'x', 'c', 'v', 'b', 'n', 0),
(2, 0, 'asd asd', '$2y$10$x28cR9hS6aYkwHCoV9H/Le1HIQuRrcO8chz9qODGTqCjdKQCCHiqG', 'te1st@test.ru', '+7999999999', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(3, 0, 'asd asd', '$2y$10$yUe.KjvT8BTtqxAIjxghCOniTQvqQTxCftGBcNi3b/qAJxrv570Bu', 'dfghdfghh22@asd.ru', '+7959199399', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users_entities`
--

CREATE TABLE `users_entities` (
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users_individuals`
--

CREATE TABLE `users_individuals` (
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_individuals`
--

INSERT INTO `users_individuals` (`id_user`) VALUES
(1),
(2),
(3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `user-cart`
--
ALTER TABLE `user-cart`
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `user-favoutite`
--
ALTER TABLE `user-favoutite`
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `users_all`
--
ALTER TABLE `users_all`
  ADD PRIMARY KEY (`id_user`,`role`);

--
-- Индексы таблицы `users_entities`
--
ALTER TABLE `users_entities`
  ADD KEY `users_entities_fk0` (`id_user`);

--
-- Индексы таблицы `users_individuals`
--
ALTER TABLE `users_individuals`
  ADD KEY `users_individuals_fk0` (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users_all`
--
ALTER TABLE `users_all`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `user-cart`
--
ALTER TABLE `user-cart`
  ADD CONSTRAINT `user-cart_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users_all` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user-favoutite`
--
ALTER TABLE `user-favoutite`
  ADD CONSTRAINT `user-favoutite_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users_all` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users_entities`
--
ALTER TABLE `users_entities`
  ADD CONSTRAINT `users_entities_fk0` FOREIGN KEY (`id_user`) REFERENCES `users_all` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users_individuals`
--
ALTER TABLE `users_individuals`
  ADD CONSTRAINT `users_individuals_fk0` FOREIGN KEY (`id_user`) REFERENCES `users_all` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
