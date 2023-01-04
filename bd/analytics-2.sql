-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: mysql
-- Время создания: Дек 29 2022 г., 14:27
-- Версия сервера: 8.0.31
-- Версия PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
--
-- База данных: `analytics`
--

-- --------------------------------------------------------

--
-- Структура таблицы `countNewUsers`
--

CREATE TABLE `countNewUsers` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `date` date NOT NULL
)  ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `count_new_phones` (
    `id` int(11) NOT NULL,
    `phone` int(11) NOT NULL,
    `date` date NOT NULL
)  ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `count_active_tariff` (
    `id` int(11) NOT NULL,
    `tariff` int(11) NOT NULL,
    `date` date NOT NULL
)  ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `count_disabled_tariff` (
     `id` int(11) NOT NULL,
     `tariff` int(11) NOT NULL,
      `date` date NOT NULL
)  ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE `count_payments` (
  `id` int(11) NOT NULL,
  `first_payment` int(11) NOT NULL,
  `next_payment` int(11) NOT NULL,
  `date` date NOT NULL
)  ENGINE=MyISAM DEFAULT CHARSET=utf8;
--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `countNewUsers`
--
ALTER TABLE `countNewUsers`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `date` (`date`);

ALTER TABLE `count_new_phones`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `date` (`date`);

ALTER TABLE `count_active_tariff`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `date` (`date`);

ALTER TABLE `count_disabled_tariff`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `date` (`date`);

ALTER TABLE `count_payments`
    ADD PRIMARY KEY (`id`),
    ADD UNIQUE KEY `date` (`date`);
--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `countNewUsers`
--
ALTER TABLE `countNewUsers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

ALTER TABLE `count_new_phones`
    MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

ALTER TABLE `count_active_tariff`
    MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

ALTER TABLE `count_disabled_tariff`
    MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

ALTER TABLE `count_payments`
    MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

INSERT INTO analytics.countNewUsers (id, user, date) VALUES (1, 1, '2023-01-01');
INSERT INTO analytics.countNewUsers (id, user, date) VALUES (2, 2, '2022-12-01');
INSERT INTO analytics.countNewUsers (id, user, date) VALUES (3, 3, '2022-12-02');
INSERT INTO analytics.countNewUsers (id, user, date) VALUES (4, 4, '2022-12-03');
INSERT INTO analytics.countNewUsers (id, user, date) VALUES (5, 5, '2022-12-04');
INSERT INTO analytics.countNewUsers (id, user, date) VALUES (6, 6, '2022-12-05');
INSERT INTO analytics.countNewUsers (id, user, date) VALUES (7, 7, '2022-12-06');
INSERT INTO analytics.countNewUsers (id, user, date) VALUES (8, 8, '2022-12-07');
INSERT INTO analytics.countNewUsers (id, user, date) VALUES (9, 9, '2022-12-08');
INSERT INTO analytics.countNewUsers (id, user, date) VALUES (10, 10, '2022-12-09');
INSERT INTO analytics.countNewUsers (id, user, date) VALUES (11, 11, '2022-12-10');
INSERT INTO analytics.countNewUsers (id, user, date) VALUES (12, 12, '2022-12-11');
INSERT INTO analytics.countNewUsers (id, user, date) VALUES (13, 13, '2022-12-12');
INSERT INTO analytics.countNewUsers (id, user, date) VALUES (14, 14, '2022-12-13');
INSERT INTO analytics.countNewUsers (id, user, date) VALUES (15, 15, '2022-12-14');
INSERT INTO analytics.countNewUsers (id, user, date) VALUES (16, 16, '2022-12-15');
INSERT INTO analytics.countNewUsers (id, user, date) VALUES (17, 17, '2022-12-16');
INSERT INTO analytics.countNewUsers (id, user, date) VALUES (18, 18, '2022-12-17');
INSERT INTO analytics.countNewUsers (id, user, date) VALUES (19, 19, '2022-12-18');
INSERT INTO analytics.countNewUsers (id, user, date) VALUES (20, 20, '2022-12-19');
INSERT INTO analytics.countNewUsers (id, user, date) VALUES (21, 21, '2022-12-20');
INSERT INTO analytics.countNewUsers (id, user, date) VALUES (22, 22, '2022-12-21');
INSERT INTO analytics.countNewUsers (id, user, date) VALUES (23, 23, '2022-12-22');
INSERT INTO analytics.countNewUsers (id, user, date) VALUES (24, 24, '2022-12-23');
INSERT INTO analytics.countNewUsers (id, user, date) VALUES (25, 25, '2022-12-24');
INSERT INTO analytics.countNewUsers (id, user, date) VALUES (26, 26, '2022-12-25');
INSERT INTO analytics.countNewUsers (id, user, date) VALUES (27, 27, '2022-12-26');
INSERT INTO analytics.countNewUsers (id, user, date) VALUES (28, 28, '2022-12-27');
INSERT INTO analytics.countNewUsers (id, user, date) VALUES (29, 29, '2022-12-28');
INSERT INTO analytics.countNewUsers (id, user, date) VALUES (30, 30, '2022-12-29');
INSERT INTO analytics.countNewUsers (id, user, date) VALUES (31, 31, '2022-12-30');
INSERT INTO analytics.countNewUsers (id, user, date) VALUES (32, 32, '2022-12-31');
INSERT INTO analytics.countNewUsers (id, user, date) VALUES (76, 90, '2022-11-30');


INSERT INTO analytics.count_new_phones (id, phone, date) VALUES (1, 1, '2022-12-01');
INSERT INTO analytics.count_new_phones (id, phone, date) VALUES (2, 2, '2022-12-02');
INSERT INTO analytics.count_new_phones (id, phone, date) VALUES (3, 3, '2022-12-03');
INSERT INTO analytics.count_new_phones (id, phone, date) VALUES (4, 4, '2022-12-04');
INSERT INTO analytics.count_new_phones (id, phone, date) VALUES (5, 5, '2022-12-05');
INSERT INTO analytics.count_new_phones (id, phone, date) VALUES (6, 6, '2022-12-06');
INSERT INTO analytics.count_new_phones (id, phone, date) VALUES (7, 7, '2022-12-07');
INSERT INTO analytics.count_new_phones (id, phone, date) VALUES (8, 8, '2022-12-08');
INSERT INTO analytics.count_new_phones (id, phone, date) VALUES (9, 9, '2022-12-09');
INSERT INTO analytics.count_new_phones (id, phone, date) VALUES (10, 10, '2022-12-10');
INSERT INTO analytics.count_new_phones (id, phone, date) VALUES (11, 11, '2022-12-11');
INSERT INTO analytics.count_new_phones (id, phone, date) VALUES (12, 12, '2022-12-12');
INSERT INTO analytics.count_new_phones (id, phone, date) VALUES (13, 13, '2022-12-13');
INSERT INTO analytics.count_new_phones (id, phone, date) VALUES (14, 14, '2022-12-14');
INSERT INTO analytics.count_new_phones (id, phone, date) VALUES (15, 15, '2022-12-15');
INSERT INTO analytics.count_new_phones (id, phone, date) VALUES (16, 16, '2022-12-16');
INSERT INTO analytics.count_new_phones (id, phone, date) VALUES (17, 17, '2022-12-17');
INSERT INTO analytics.count_new_phones (id, phone, date) VALUES (18, 18, '2022-12-18');
INSERT INTO analytics.count_new_phones (id, phone, date) VALUES (19, 19, '2022-12-19');
INSERT INTO analytics.count_new_phones (id, phone, date) VALUES (20, 20, '2022-12-20');
INSERT INTO analytics.count_new_phones (id, phone, date) VALUES (21, 21, '2022-12-21');
INSERT INTO analytics.count_new_phones (id, phone, date) VALUES (22, 22, '2022-12-22');
INSERT INTO analytics.count_new_phones (id, phone, date) VALUES (23, 23, '2022-12-23');
INSERT INTO analytics.count_new_phones (id, phone, date) VALUES (24, 24, '2022-12-24');
INSERT INTO analytics.count_new_phones (id, phone, date) VALUES (25, 24, '2022-12-25');
INSERT INTO analytics.count_new_phones (id, phone, date) VALUES (26, 24, '2022-12-26');
INSERT INTO analytics.count_new_phones (id, phone, date) VALUES (27, 24, '2022-12-28');
INSERT INTO analytics.count_new_phones (id, phone, date) VALUES (28, 24, '2022-12-29');
INSERT INTO analytics.count_new_phones (id, phone, date) VALUES (29, 24, '2022-12-30');



INSERT INTO analytics.count_active_tariff (id, tariff, date) VALUES (1, 1, '2022-12-01');
INSERT INTO analytics.count_active_tariff (id, tariff, date) VALUES (2, 2, '2022-12-02');
INSERT INTO analytics.count_active_tariff (id, tariff, date) VALUES (3, 3, '2022-12-03');
INSERT INTO analytics.count_active_tariff (id, tariff, date) VALUES (4, 4, '2022-12-04');
INSERT INTO analytics.count_active_tariff (id, tariff, date) VALUES (5, 5, '2022-12-05');
INSERT INTO analytics.count_active_tariff (id, tariff, date) VALUES (6, 6, '2022-12-06');
INSERT INTO analytics.count_active_tariff (id, tariff, date) VALUES (7, 7, '2022-12-07');
INSERT INTO analytics.count_active_tariff (id, tariff, date) VALUES (8, 8, '2022-12-08');
INSERT INTO analytics.count_active_tariff (id, tariff, date) VALUES (9, 9, '2022-12-09');
INSERT INTO analytics.count_active_tariff (id, tariff, date) VALUES (10, 10, '2022-12-10');
INSERT INTO analytics.count_active_tariff (id, tariff, date) VALUES (11, 11, '2022-12-11');
INSERT INTO analytics.count_active_tariff (id, tariff, date) VALUES (12, 12, '2022-12-12');
INSERT INTO analytics.count_active_tariff (id, tariff, date) VALUES (13, 13, '2022-12-13');
INSERT INTO analytics.count_active_tariff (id, tariff, date) VALUES (13, 14, '2022-12-14');
INSERT INTO analytics.count_active_tariff (id, tariff, date) VALUES (14, 15, '2022-12-15');
INSERT INTO analytics.count_active_tariff (id, tariff, date) VALUES (15, 16, '2022-12-16');
INSERT INTO analytics.count_active_tariff (id, tariff, date) VALUES (16, 17, '2022-12-17');
INSERT INTO analytics.count_active_tariff (id, tariff, date) VALUES (17, 18, '2022-12-18');
INSERT INTO analytics.count_active_tariff (id, tariff, date) VALUES (18, 19, '2022-12-19');
INSERT INTO analytics.count_active_tariff (id, tariff, date) VALUES (19, 1, '2022-12-20');
INSERT INTO analytics.count_active_tariff (id, tariff, date) VALUES (20, 12, '2022-12-21');
INSERT INTO analytics.count_active_tariff (id, tariff, date) VALUES (21, 12, '2022-12-22');
INSERT INTO analytics.count_active_tariff (id, tariff, date) VALUES (22, 12, '2022-12-23');
INSERT INTO analytics.count_active_tariff (id, tariff, date) VALUES (23, 12, '2022-12-24');
INSERT INTO analytics.count_active_tariff (id, tariff, date) VALUES (24, 12, '2022-12-25');
INSERT INTO analytics.count_active_tariff (id, tariff, date) VALUES (26, 12, '2022-12-26');
INSERT INTO analytics.count_active_tariff (id, tariff, date) VALUES (27, 12, '2022-12-27');
INSERT INTO analytics.count_active_tariff (id, tariff, date) VALUES (28, 12, '2022-12-28');
INSERT INTO analytics.count_active_tariff (id, tariff, date) VALUES (29, 12, '2022-12-29');
INSERT INTO analytics.count_active_tariff (id, tariff, date) VALUES (30, 12, '2022-12-30');


INSERT INTO analytics.count_disabled_tariff (id, tariff, date) VALUES (1, 1, '2022-12-01');
INSERT INTO analytics.count_disabled_tariff (id, tariff, date) VALUES (2, 2, '2022-12-02');
INSERT INTO analytics.count_disabled_tariff (id, tariff, date) VALUES (3, 3, '2022-12-03');
INSERT INTO analytics.count_disabled_tariff (id, tariff, date) VALUES (4, 4, '2022-12-04');
INSERT INTO analytics.count_disabled_tariff (id, tariff, date) VALUES (5, 5, '2022-12-05');
INSERT INTO analytics.count_disabled_tariff (id, tariff, date) VALUES (6, 6, '2022-12-06');
INSERT INTO analytics.count_disabled_tariff (id, tariff, date) VALUES (7, 7, '2022-12-07');
INSERT INTO analytics.count_disabled_tariff (id, tariff, date) VALUES (8, 8, '2022-12-08');
INSERT INTO analytics.count_disabled_tariff (id, tariff, date) VALUES (9, 9, '2022-12-09');
INSERT INTO analytics.count_disabled_tariff (id, tariff, date) VALUES (10, 10, '2022-12-10');
INSERT INTO analytics.count_disabled_tariff (id, tariff, date) VALUES (11, 11, '2022-12-11');
INSERT INTO analytics.count_disabled_tariff (id, tariff, date) VALUES (12, 12, '2022-12-12');
INSERT INTO analytics.count_disabled_tariff (id, tariff, date) VALUES (13, 13, '2022-12-13');
INSERT INTO analytics.count_disabled_tariff (id, tariff, date) VALUES (13, 14, '2022-12-14');
INSERT INTO analytics.count_disabled_tariff (id, tariff, date) VALUES (14, 15, '2022-12-15');
INSERT INTO analytics.count_disabled_tariff (id, tariff, date) VALUES (15, 16, '2022-12-16');
INSERT INTO analytics.count_disabled_tariff (id, tariff, date) VALUES (16, 17, '2022-12-17');
INSERT INTO analytics.count_disabled_tariff (id, tariff, date) VALUES (17, 18, '2022-12-18');
INSERT INTO analytics.count_disabled_tariff (id, tariff, date) VALUES (18, 19, '2022-12-19');
INSERT INTO analytics.count_disabled_tariff (id, tariff, date) VALUES (19, 1, '2022-12-20');
INSERT INTO analytics.count_disabled_tariff (id, tariff, date) VALUES (20, 12, '2022-12-21');
INSERT INTO analytics.count_disabled_tariff (id, tariff, date) VALUES (21, 12, '2022-12-22');
INSERT INTO analytics.count_disabled_tariff (id, tariff, date) VALUES (22, 12, '2022-12-23');
INSERT INTO analytics.count_disabled_tariff (id, tariff, date) VALUES (23, 12, '2022-12-24');
INSERT INTO analytics.count_disabled_tariff (id, tariff, date) VALUES (24, 12, '2022-12-25');
INSERT INTO analytics.count_disabled_tariff (id, tariff, date) VALUES (26, 12, '2022-12-26');
INSERT INTO analytics.count_disabled_tariff (id, tariff, date) VALUES (27, 12, '2022-12-27');
INSERT INTO analytics.count_disabled_tariff (id, tariff, date) VALUES (28, 12, '2022-12-28');
INSERT INTO analytics.count_disabled_tariff (id, tariff, date) VALUES (29, 12, '2022-12-29');
INSERT INTO analytics.count_disabled_tariff (id, tariff, date) VALUES (30, 12, '2022-12-30');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;