-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 11 2024 г., 03:26
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `kursach`
--

-- --------------------------------------------------------

--
-- Структура таблицы `application`
--

CREATE TABLE `application` (
  `id_application` int NOT NULL,
  `id_user` int NOT NULL,
  `title` text NOT NULL,
  `type_application` int NOT NULL,
  `status_application` int NOT NULL DEFAULT '2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `application`
--

INSERT INTO `application` (`id_application`, `id_user`, `title`, `type_application`, `status_application`) VALUES
(22, 5, '', 2, 1),
(23, 5, 'asdasdasdasdasd', 3, 3),
(24, 5, 'SSS', 1, 1),
(25, 5, 'SSS', 2, 2),
(26, 5, 'SSSSSSSSSSSSSSSSSSSSSSSS', 2, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `documents`
--

CREATE TABLE `documents` (
  `id_documents` int NOT NULL,
  `id_user` int NOT NULL,
  `seria_pass` varchar(255) NOT NULL,
  `number_pass` varchar(255) NOT NULL,
  `date_pass` date NOT NULL,
  `inn` varchar(255) NOT NULL,
  `snils` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `documents`
--

INSERT INTO `documents` (`id_documents`, `id_user`, `seria_pass`, `number_pass`, `date_pass`, `inn`, `snils`) VALUES
(1, 5, '8018', '908324', '2019-02-20', '482048193421', '646-059-015-24'),
(2, 4, '8018', '908345', '2019-02-18', '482027493421', '646-059-135-22');

-- --------------------------------------------------------

--
-- Структура таблицы `education`
--

CREATE TABLE `education` (
  `id_education` int NOT NULL,
  `id_user` int NOT NULL,
  `specialty` varchar(50) NOT NULL COMMENT 'Специальность',
  `qualification` varchar(50) NOT NULL COMMENT 'Квалификация',
  `city` varchar(50) NOT NULL COMMENT 'Город',
  `number_diplom` varchar(255) NOT NULL COMMENT 'Номер диплома',
  `date_start` date NOT NULL COMMENT 'Дата начала обучения',
  `date_finish` date NOT NULL COMMENT 'Дата выдачи диплома'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `education`
--

INSERT INTO `education` (`id_education`, `id_user`, `specialty`, `qualification`, `city`, `number_diplom`, `date_start`, `date_finish`) VALUES
(1, 5, 'Экономический учёт ', 'Бухгалтер / экономист', 'Москва', '12345678909234124', '2018-09-11', '2022-07-01'),
(2, 4, 'Кадровый учёт ', 'Администратор отдела кадров', 'Казань', '38593478909234124', '2015-09-11', '2019-07-01');

-- --------------------------------------------------------

--
-- Структура таблицы `job`
--

CREATE TABLE `job` (
  `id_job` int NOT NULL,
  `title` varchar(100) NOT NULL,
  `salary` varchar(50) NOT NULL,
  `staff` int NOT NULL,
  `photo_job` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `job`
--

INSERT INTO `job` (`id_job`, `title`, `salary`, `staff`, `photo_job`) VALUES
(1, 'Кадровик', '20000', 3, 'shtat1.jpg'),
(2, 'Администратор', '30000', 3, 'shtat2.jpg'),
(5, 'Планировщик', '40000', 7, 'shtat4.jpeg'),
(6, 'Архитектор', '45000', 3, 'shtat4.jpg'),
(7, 'Бухгалтер', '15000', 6, 'shtat5.jpg'),
(8, 'Секретарь', '50000', 4, 'shtat6.jpg'),
(9, 'Менеджер продаж', '70000', 2, 'shtat7.jpg'),
(10, 'Системный администратор', '45000', 2, 'shtat8.jpg'),
(11, 'Программист', '60000', 3, 'shtat9.jpg'),
(12, 'Аналитик', '30000', 5, 'shtat10.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `military`
--

CREATE TABLE `military` (
  `id_military` int NOT NULL,
  `id_user` int NOT NULL,
  `category` varchar(2) NOT NULL COMMENT 'категория',
  `structure` varchar(255) NOT NULL COMMENT 'состав',
  `category_reserve` int NOT NULL COMMENT 'категория запаса',
  `code` varchar(7) NOT NULL COMMENT 'код ВУС',
  `rank` varchar(50) NOT NULL COMMENT 'Звание',
  `military_office` varchar(255) NOT NULL COMMENT 'Воен. ком.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `military`
--

INSERT INTO `military` (`id_military`, `id_user`, `category`, `structure`, `category_reserve`, `code`, `rank`, `military_office`) VALUES
(1, 5, 'А2', 'Воздушно-десантные войска', 3, '827437А', 'Генерал', 'г. Уфа, ул. Зенцова 85/1'),
(2, 4, 'Б3', 'Морская Пехота', 2, '285034С', 'Фельдмаршал', 'г. Уфа, ул. Кирова 65');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `id_role` int NOT NULL,
  `title_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`id_role`, `title_role`) VALUES
(1, 'Администратор'),
(2, 'Пользователь');

-- --------------------------------------------------------

--
-- Структура таблицы `status`
--

CREATE TABLE `status` (
  `id_status` int NOT NULL,
  `title_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `status`
--

INSERT INTO `status` (`id_status`, `title_status`) VALUES
(1, 'Принято'),
(2, 'На рассмотрении'),
(3, 'Отказано');

-- --------------------------------------------------------

--
-- Структура таблицы `type_application`
--

CREATE TABLE `type_application` (
  `id_type` int NOT NULL,
  `type_application` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `type_application`
--

INSERT INTO `type_application` (`id_type`, `type_application`) VALUES
(1, 'Увольнение'),
(2, 'Отпуск'),
(3, 'Больничный');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int NOT NULL,
  `email` varchar(50) NOT NULL COMMENT 'Логин/почта',
  `name` varchar(50) NOT NULL COMMENT 'Имя',
  `patronymic` varchar(50) NOT NULL COMMENT 'Отчество',
  `surname` varchar(50) NOT NULL COMMENT 'Фамилия',
  `password` varchar(30) NOT NULL,
  `job` int NOT NULL,
  `adress` varchar(150) NOT NULL,
  `birthday` date NOT NULL COMMENT 'дата др',
  `gender` varchar(3) NOT NULL COMMENT 'муж/жен',
  `id_role` int NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `email`, `name`, `patronymic`, `surname`, `password`, `job`, `adress`, `birthday`, `gender`, `id_role`, `photo`) VALUES
(3, 'slava@mail.ru', 'Вячеслав', 'Уралович', 'Имангулов', '12345678', 1, 'с. Знаменка, речной переулок, д.1', '2005-07-17', 'муж', 2, 'slava.jpg'),
(4, 'Donkolns16@mail.ru', 'Даниль', 'Ильдарович', 'Давлетов', 'Donkolns16', 2, 'г. Уфа, ул. Кавказская 6/10, кв. 16', '2005-01-28', 'муж', 1, 'donkolns.jpg'),
(5, 'gribog@mail.ru', 'Радмир', 'Рустемович', 'Ардуванов', 'griboggribog', 1, 'г. Уфа, Вагонная 27', '2005-10-08', 'муж', 2, 'user.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `work_record`
--

CREATE TABLE `work_record` (
  `id_record` int NOT NULL,
  `id_user` int NOT NULL,
  `work_number` varchar(255) NOT NULL COMMENT 'номер книжки',
  `work_experience` varchar(255) NOT NULL COMMENT 'рабочий стаж',
  `work_date` date NOT NULL COMMENT 'дата трудоустройства',
  `work_place` varchar(255) NOT NULL COMMENT 'место работы'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `work_record`
--

INSERT INTO `work_record` (`id_record`, `id_user`, `work_number`, `work_experience`, `work_date`, `work_place`) VALUES
(1, 5, 'ТК 3742376', '9 лет', '2023-11-06', 'ООО “6 кадров”'),
(2, 4, 'ДЛ 7376036', '11 лет', '2011-11-06', 'ОАО \"Группа Лес\"');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id_application`),
  ADD KEY `status_application` (`status_application`),
  ADD KEY `type_application` (`type_application`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id_documents`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`id_education`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id_job`);

--
-- Индексы таблицы `military`
--
ALTER TABLE `military`
  ADD PRIMARY KEY (`id_military`),
  ADD KEY `id_user` (`id_user`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Индексы таблицы `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id_status`);

--
-- Индексы таблицы `type_application`
--
ALTER TABLE `type_application`
  ADD PRIMARY KEY (`id_type`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`),
  ADD KEY `job` (`job`),
  ADD KEY `email` (`email`);

--
-- Индексы таблицы `work_record`
--
ALTER TABLE `work_record`
  ADD PRIMARY KEY (`id_record`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `application`
--
ALTER TABLE `application`
  MODIFY `id_application` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблицы `documents`
--
ALTER TABLE `documents`
  MODIFY `id_documents` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `education`
--
ALTER TABLE `education`
  MODIFY `id_education` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `job`
--
ALTER TABLE `job`
  MODIFY `id_job` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `military`
--
ALTER TABLE `military`
  MODIFY `id_military` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `status`
--
ALTER TABLE `status`
  MODIFY `id_status` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `type_application`
--
ALTER TABLE `type_application`
  MODIFY `id_type` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `work_record`
--
ALTER TABLE `work_record`
  MODIFY `id_record` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`status_application`) REFERENCES `status` (`id_status`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `application_ibfk_2` FOREIGN KEY (`type_application`) REFERENCES `type_application` (`id_type`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `application_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `education`
--
ALTER TABLE `education`
  ADD CONSTRAINT `education_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `military`
--
ALTER TABLE `military`
  ADD CONSTRAINT `military_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id_role`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`job`) REFERENCES `job` (`id_job`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ограничения внешнего ключа таблицы `work_record`
--
ALTER TABLE `work_record`
  ADD CONSTRAINT `work_record_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
