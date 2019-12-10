-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 10 2019 г., 14:53
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
(6, 1, '123', '$2y$10$OmGVARGpFTRfJKwMk/kOee3l9jvydKfAB2Bbz8omlXsqlBJORelpa', '123@123.123', '123', NULL, 0),
(7, 1, 'AAa AAa AaA', '$2y$10$WN6n42g/nlMPBy/ynF9XEOQ1lRyLoIQXpNIPgt7Q2JMS9MsAEmynG', 'email@email.email', '8 999 555 12 22', NULL, 0);

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
(6),
(7);

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
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

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
