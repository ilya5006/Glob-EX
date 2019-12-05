-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 05 2019 г., 22:12
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
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `brands`
--

INSERT INTO `brands` (`id_brand`, `name`, `image`) VALUES
(1, 'IQ Allround', 'C:/Картинки и баннеры/Логотипы/1.jpg'),
(2, 'Svetocopy', 'C:/Картинки и баннеры/Логотипы/2.jpg'),
(3, 'Nota', 'C:/Картинки и баннеры/Логотипы/3.jpg'),
(4, 'Lamark', 'C:/Картинки и баннеры/Логотипы/4.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE `country` (
  `id_country` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`id_country`, `name`) VALUES
(1, 'Россия');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id_good` int(11) NOT NULL,
  `id_country` int(11) DEFAULT NULL,
  `id_brand` int(11) DEFAULT NULL,
  `top_id` int(11) DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `old_price` float DEFAULT NULL,
  `discount` int(11) DEFAULT NULL,
  `unit` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `image4` varchar(255) DEFAULT NULL,
  `image5` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id_good`, `id_country`, `id_brand`, `top_id`, `name`, `sort`, `price`, `old_price`, `discount`, `unit`, `image1`, `image2`, `image3`, `image4`, `image5`, `quantity`, `description`) VALUES
(5, 1, 1, 3, 'Бумага А4 \"IQ ALLROUND\" 80г,162%CIE пачка (500л/пач)', 3, 286, NULL, NULL, 'пач', 'C:/Картинки и баннеры/Фото/5.jpg', 'C:/Картинки и баннеры/Фото/5-2.jpg', '', '', '', 3172, ''),
(10, 1, 2, 3, 'Бумага А3 \"SVETO COPY\" 80гр/м2 Ярк.94% ISO, 146% CIE (500л/пач)', 4, 471.13, NULL, NULL, 'пач', 'C:/Картинки и баннеры/Фото/10.jpg', 'C:/Картинки и баннеры/Фото/10-2.jpg', '', '', '', 181, ''),
(11, 1, 3, 3, 'Бумага А4 \"NOTA\" 80гр/м2 95% CIE 150% (500л/пач)', 1, 209, 220, 5, 'пач', 'C:/Картинки и баннеры/Фото/11.jpg', '', '', '', '', 3988, ''),
(12, 1, 2, 3, 'Бумага А4 \"SVETO COPY\" 80гр/м2 95% CIE 146% (500л/пач)', 2, 235.554, NULL, NULL, 'пач', 'C:/Картинки и баннеры/Фото/12.jpg', 'C:/Картинки и баннеры/Фото/12-2.jpg', '', '', '', 5390, ''),
(15, 1, 4, 14, 'Блок для заметок 9*9*9cм LAMARK белый в пластиковом боксе NT0070', 100, 101.842, NULL, NULL, 'шт', 'C:/Картинки и баннеры/Фото/15.jpg', '', '', '', '', 6, ''),
(16, 1, 4, 14, 'Блок для заметок 9*9*9см LAMARK белый NT0075', 100, 78.767, NULL, NULL, 'шт', 'C:/Картинки и баннеры/Фото/16.jpg', '', '', '', '', 128, '');

-- --------------------------------------------------------

--
-- Структура таблицы `good_specs`
--

CREATE TABLE `good_specs` (
  `id_good` int(11) NOT NULL,
  `id_spec` int(11) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `good_specs`
--

INSERT INTO `good_specs` (`id_good`, `id_spec`, `value`) VALUES
(15, 6, '900'),
(15, 2, '80 гр./кв.м'),
(15, 8, 'Белый'),
(15, 9, '90*90'),
(15, 10, 'Да'),
(16, 6, '900'),
(16, 2, '80 гр./кв.м'),
(16, 8, 'Белый'),
(16, 9, '90*90'),
(16, 10, 'Нет'),
(10, 1, 'C'),
(10, 2, '80 гр./кв.м'),
(10, 3, '104'),
(10, 4, 'A3'),
(10, 5, '146 %'),
(10, 6, '500'),
(10, 7, '5 шт.'),
(5, 1, 'B'),
(5, 2, '80 гр./кв.м'),
(5, 3, '104'),
(5, 4, 'A4'),
(5, 5, '162 %'),
(5, 6, '500'),
(5, 7, '5 шт.'),
(11, 1, 'B+'),
(11, 2, '80 гр./кв.м'),
(11, 3, '105'),
(11, 4, 'A4'),
(11, 5, '150 %'),
(11, 6, '500'),
(11, 7, '5 шт.'),
(12, 1, 'C'),
(12, 2, '80 гр./кв.м'),
(12, 3, '104'),
(12, 4, 'A4'),
(12, 5, '146 %'),
(12, 6, '500'),
(12, 7, '5 шт.');

-- --------------------------------------------------------

--
-- Структура таблицы `partitions`
--

CREATE TABLE `partitions` (
  `id_partition` int(11) NOT NULL,
  `top_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `partitions`
--

INSERT INTO `partitions` (`id_partition`, `top_id`, `name`, `sort`, `banner`, `image1`, `image2`, `description`, `icon`) VALUES
(1, NULL, 'Канцелярские товары', 1, '', '', '', '', ''),
(2, NULL, 'Бумажная продукция', 0, '', '', '', '', ''),
(3, 2, 'Бумага для оргтехники', 0, '', 'C:/Картинки и баннеры/Фото/3.jpg', '', '', ''),
(6, 1, 'Калькуляторы', 100, '', '', '', '', ''),
(7, 1, 'Клей', 100, '', '', '', '', ''),
(14, 2, 'Блоки для записей', 100, '', 'C:/Картинки и баннеры/Фото/14.jpg', '', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `partition_specs`
--

CREATE TABLE `partition_specs` (
  `id_partition` int(11) NOT NULL,
  `id_spec` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `partition_specs`
--

INSERT INTO `partition_specs` (`id_partition`, `id_spec`) VALUES
(14, 6),
(14, 2),
(14, 8),
(14, 9),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7);

-- --------------------------------------------------------

--
-- Структура таблицы `specs`
--

CREATE TABLE `specs` (
  `id_spec` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `specs`
--

INSERT INTO `specs` (`id_spec`, `name`) VALUES
(1, 'Марка бумаги'),
(2, 'Плотность бумаги (г/кв.м)'),
(3, 'Толщина (мкм)'),
(4, 'Формат листов'),
(5, 'Белизна (%)'),
(6, 'Количество листов в пачке'),
(7, 'Штук в коробке'),
(8, 'Цвет бумаги'),
(9, 'Размер изделия (мм)'),
(10, 'Наличие бокса');

-- --------------------------------------------------------

--
-- Структура таблицы `users_all`
--

CREATE TABLE `users_all` (
  `id_user` int(11) NOT NULL,
  `role` bigint(20) NOT NULL,
  `fio` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `mailing` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_all`
--

INSERT INTO `users_all` (`id_user`, `role`, `fio`, `password`, `email`, `phone_number`, `address`, `mailing`) VALUES
(1, 0, 'Да Да Да', '$2y$10$58adI2iM5PEp7y2pZcZHJeboEvDkbhFEmjb/vmG2dcLLnWBhtvciu', 'dada@dada.dada', '88005553535', NULL, 0),
(2, 0, 'Яяя Ааа Ддд', '$2y$10$ZOcqE7WwwClqNHMNMLmKHuHShokrUCYvdqZIpy.rNIZ8D43G5vmAW', 'yaya@yaya.yaya', '85025698756', NULL, 0),
(3, 0, 'Яяя Ааа Aaa', '$2y$10$HMoWHpOkdETsiSH2unzCtuyEULHXaHcHu.Eydx9az5nu6WG9VIdSC', 'yaya@yaya.yaya', '85025698756', NULL, 1),
(4, 1, 'Яяя Ааа Aaa', '$2y$10$ZdAidiOGlOv77fSYRAIw.eNHYZA2jwuapeK.nQkFoRz.kAp5JfKke', 'yaya@yaya.yaya', '85025698756', NULL, 1),
(5, 1, 'Яяя Ааа Aaa', '$2y$10$eJqj1a5ZlMmpXX3s1IB/seU3LGyLmdXyzC4ENyRD/GZ0uIcf/CSEO', 'yaya@yaya.yaya', '85025698756', NULL, 0),
(6, 1, '123', '$2y$10$OmGVARGpFTRfJKwMk/kOee3l9jvydKfAB2Bbz8omlXsqlBJORelpa', '123@123.123', '123', NULL, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users_entities`
--

CREATE TABLE `users_entities` (
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_entities`
--

INSERT INTO `users_entities` (`id_user`) VALUES
(4),
(5),
(6);

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
  MODIFY `id_good` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `users_all`
--
ALTER TABLE `users_all`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
