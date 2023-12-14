-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 13 2023 г., 22:30
-- Версия сервера: 10.4.28-MariaDB
-- Версия PHP: 8.2.4

SET
SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET
time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `server`
--

-- --------------------------------------------------------

--
-- Структура таблицы `disciplines`
--

CREATE TABLE `disciplines`
(
    `id`         int(11) NOT NULL,
    `title`      varchar(255) NOT NULL,
    `csrf_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `disciplines`
--

INSERT INTO `disciplines` (`id`, `title`, `csrf_token`)
VALUES (4, 'Чурковедение', NULL),
       (5, 'Хохлятко-убиватко', NULL),
       (6, 'Негроисповедание', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `disciplines_users`
--

CREATE TABLE `disciplines_users`
(
    `id`            int(11) NOT NULL,
    `id_discipline` int(11) DEFAULT NULL,
    `id_user`       int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `disciplines_users`
--

INSERT INTO `disciplines_users` (`id`, `id_discipline`, `id_user`)
VALUES (1, 5, 2),
       (2, 4, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `divisions`
--

CREATE TABLE `divisions`
(
    `id`         int(11) NOT NULL,
    `title`      varchar(255) NOT NULL,
    `type`       varchar(255) NOT NULL,
    `csrf_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `divisions`
--

INSERT INTO `divisions` (`id`, `title`, `type`, `csrf_token`)
VALUES (1, 'Томский ТТИТ-сука', 'Информационные что-то там', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `divisions_disciplines`
--

CREATE TABLE `divisions_disciplines`
(
    `id`            int(11) NOT NULL,
    `id_division`   int(11) DEFAULT NULL,
    `id_discipline` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `divisions_disciplines`
--

INSERT INTO `divisions_disciplines` (`id`, `id_division`, `id_discipline`)
VALUES (1, 1, 6),
       (2, 1, 5),
       (3, 1, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `divisions_users`
--

CREATE TABLE `divisions_users`
(
    `id`          int(11) NOT NULL,
    `id_division` int(11) DEFAULT NULL,
    `id_user`     int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `divisions_users`
--

INSERT INTO `divisions_users` (`id`, `id_division`, `id_user`)
VALUES (1, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `positions`
--

CREATE TABLE `positions`
(
    `id`         int(11) NOT NULL,
    `title`      varchar(255) NOT NULL,
    `csrf_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `positions`
--

INSERT INTO `positions` (`id`, `title`, `csrf_token`)
VALUES (1, 'Замминистра', NULL),
       (2, 'Боженька', NULL),
       (3, 'Миша', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles`
(
    `id`         int(11) NOT NULL,
    `title`      varchar(255) NOT NULL,
    `csrf_token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id`, `title`, `csrf_token`)
VALUES (1, 'admin', NULL),
       (2, 'user', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users`
(
    `id`          int(11) NOT NULL,
    `login`       varchar(255) NOT NULL,
    `password`    varchar(255) NOT NULL,
    `role`        int(11) NOT NULL DEFAULT 2,
    `token`       varchar(255) DEFAULT NULL,
    `img`         longblob     DEFAULT NULL,
    `surname`     varchar(255) DEFAULT NULL,
    `name`        varchar(255) DEFAULT NULL,
    `patronymic`  varchar(255) DEFAULT NULL,
    `gender`      varchar(255) DEFAULT NULL,
    `address`     varchar(255) DEFAULT NULL,
    `date`        date         DEFAULT NULL,
    `id_position` int(11) DEFAULT NULL,
    `csrf_token`  varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `role`, `token`, `img`, `surname`, `name`, `patronymic`, `gender`,
                     `address`, `date`, `id_position`, `csrf_token`)
VALUES (1, 'root', '63a9f0ea7bb98050796b649e85481845', 1, '6005c79770013117b7c8aa70a840a2dd', NULL, NULL, NULL, NULL,
        NULL, NULL, NULL, NULL, NULL),
       (2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 2, NULL, NULL, 'qwe', 'qwe', 'qwe', 'qwe', 'qwe', '2023-12-01',
        3, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `disciplines`
--
ALTER TABLE `disciplines`
    ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `disciplines_users`
--
ALTER TABLE `disciplines_users`
    ADD PRIMARY KEY (`id`),
  ADD KEY `id_discipline` (`id_discipline`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `divisions`
--
ALTER TABLE `divisions`
    ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `divisions_disciplines`
--
ALTER TABLE `divisions_disciplines`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_discipline` (`id_discipline`),
  ADD KEY `id_division` (`id_division`);

--
-- Индексы таблицы `divisions_users`
--
ALTER TABLE `divisions_users`
    ADD PRIMARY KEY (`id`),
  ADD KEY `id_division` (`id_division`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `positions`
--
ALTER TABLE `positions`
    ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
    ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
    ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD KEY `id_division` (`id_position`),
  ADD KEY `role` (`role`),
  ADD KEY `id_position` (`id_position`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `disciplines`
--
ALTER TABLE `disciplines`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `disciplines_users`
--
ALTER TABLE `disciplines_users`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `divisions`
--
ALTER TABLE `divisions`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `divisions_disciplines`
--
ALTER TABLE `divisions_disciplines`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `divisions_users`
--
ALTER TABLE `divisions_users`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `positions`
--
ALTER TABLE `positions`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `disciplines_users`
--
ALTER TABLE `disciplines_users`
    ADD CONSTRAINT `disciplines_users_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `disciplines_users_ibfk_2` FOREIGN KEY (`id_discipline`) REFERENCES `disciplines` (`id`);

--
-- Ограничения внешнего ключа таблицы `divisions_disciplines`
--
ALTER TABLE `divisions_disciplines`
    ADD CONSTRAINT `divisions_disciplines_ibfk_1` FOREIGN KEY (`id_discipline`) REFERENCES `disciplines` (`id`),
  ADD CONSTRAINT `divisions_disciplines_ibfk_2` FOREIGN KEY (`id_division`) REFERENCES `divisions` (`id`);

--
-- Ограничения внешнего ключа таблицы `divisions_users`
--
ALTER TABLE `divisions_users`
    ADD CONSTRAINT `divisions_users_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `divisions_users_ibfk_2` FOREIGN KEY (`id_division`) REFERENCES `divisions` (`id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
    ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_position`) REFERENCES `positions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
