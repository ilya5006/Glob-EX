-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 30 2019 г., 11:06
-- Версия сервера: 8.0.15
-- Версия PHP: 7.3.2

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
-- Структура таблицы `brands`
--

CREATE TABLE `brands` (
  `id_brand` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE `country` (
  `id_country` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id_good` int(11) NOT NULL,
  `id_country` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `good_specs`
--

CREATE TABLE `good_specs` (
  `id_good` int(11) NOT NULL,
  `id_spec` int(11) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `partitions`
--

CREATE TABLE `partitions` (
  `id_partition` int(11) NOT NULL,
  `top_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `technical_name` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `partition_specs`
--

CREATE TABLE `partition_specs` (
  `id_partition` int(11) NOT NULL,
  `id_spec` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `specs`
--

CREATE TABLE `specs` (
  `id_spec` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `users_all`
--

CREATE TABLE `users_all` (
  `id_user` int(11) NOT NULL,
  `role` bigint(20) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id_brand`);

--
-- Индексы таблицы `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id_country`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id_good`),
  ADD KEY `goods_fk0` (`id_country`),
  ADD KEY `goods_fk1` (`id_brand`);

--
-- Индексы таблицы `good_specs`
--
ALTER TABLE `good_specs`
  ADD KEY `good_specs_fk0` (`id_good`),
  ADD KEY `good_specs_fk1` (`id_spec`);

--
-- Индексы таблицы `partitions`
--
ALTER TABLE `partitions`
  ADD PRIMARY KEY (`id_partition`);

--
-- Индексы таблицы `partition_specs`
--
ALTER TABLE `partition_specs`
  ADD KEY `partition_specs_fk0` (`id_partition`),
  ADD KEY `partition_specs_fk1` (`id_spec`);

--
-- Индексы таблицы `specs`
--
ALTER TABLE `specs`
  ADD PRIMARY KEY (`id_spec`);

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
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id_good` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users_all`
--
ALTER TABLE `users_all`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `goods`
--
ALTER TABLE `goods`
  ADD CONSTRAINT `goods_fk0` FOREIGN KEY (`id_country`) REFERENCES `country` (`id_country`),
  ADD CONSTRAINT `goods_fk1` FOREIGN KEY (`id_brand`) REFERENCES `brands` (`id_brand`);

--
-- Ограничения внешнего ключа таблицы `good_specs`
--
ALTER TABLE `good_specs`
  ADD CONSTRAINT `good_specs_fk0` FOREIGN KEY (`id_good`) REFERENCES `goods` (`id_good`),
  ADD CONSTRAINT `good_specs_fk1` FOREIGN KEY (`id_spec`) REFERENCES `specs` (`id_spec`);

--
-- Ограничения внешнего ключа таблицы `partition_specs`
--
ALTER TABLE `partition_specs`
  ADD CONSTRAINT `partition_specs_fk0` FOREIGN KEY (`id_partition`) REFERENCES `partitions` (`id_partition`),
  ADD CONSTRAINT `partition_specs_fk1` FOREIGN KEY (`id_spec`) REFERENCES `specs` (`id_spec`);

--
-- Ограничения внешнего ключа таблицы `users_entities`
--
ALTER TABLE `users_entities`
  ADD CONSTRAINT `users_entities_fk0` FOREIGN KEY (`id_user`) REFERENCES `users_all` (`id_user`);

--
-- Ограничения внешнего ключа таблицы `users_individuals`
--
ALTER TABLE `users_individuals`
  ADD CONSTRAINT `users_individuals_fk0` FOREIGN KEY (`id_user`) REFERENCES `users_all` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
