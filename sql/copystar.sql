-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 30 2022 г., 00:00
-- Версия сервера: 5.7.33
-- Версия PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `copystar`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Струйные принтеры'),
(2, 'Лазерные принтеры'),
(3, 'Термопринтеры');

-- --------------------------------------------------------

--
-- Структура таблицы `custom_products`
--

CREATE TABLE `custom_products` (
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `countnumber` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `custom_products`
--

INSERT INTO `custom_products` (`order_id`, `product_id`, `countnumber`) VALUES
(1, 3, 5),
(1, 7, 4),
(1, 4, 4),
(1, 2, 5),
(1, 3, 7),
(1, 2, 7),
(2, 3, 4),
(2, 4, 4),
(3, 3, 5),
(3, 7, 4),
(3, 4, 4),
(3, 2, 5),
(3, 3, 7),
(3, 2, 7),
(4, 3, 4),
(4, 4, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `cause` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `name`, `status`, `cause`, `time`) VALUES
(1, 2, '12345-001', 1, '', '2022-05-16 20:18:34'),
(2, 2, '12346-023', 2, '', '2022-05-17 20:18:34'),
(3, 2, '12345-8456', 0, '', '2022-05-16 17:18:34'),
(4, 2, '12346-6457', 3, '', '2022-05-17 17:18:34');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) NOT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` date NOT NULL,
  `model` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int(10) NOT NULL,
  `countnumbers` int(10) NOT NULL,
  `timestamp` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `photo`, `price`, `country`, `year`, `model`, `category`, `countnumbers`, `timestamp`) VALUES
(1, 'Epson L805', 'image.png', 26700, 'Китай', '2019-05-09', 'L805', 1, 23, '2022-04-01 18:22:12'),
(2, 'Epson L845', 'image.png', 24700, 'Китай', '2019-05-10', 'L845', 1, 23, '2022-04-24 18:22:12'),
(3, 'Epson L345', 'image.png', 23700, 'Китай', '2019-05-13', 'L345', 1, 33, '2022-04-23 18:22:12'),
(4, 'Xerox Phaser', 'image.png', 13700, 'Китай', '2019-05-03', '3020Bl', 2, 13, '2022-04-17 18:22:12'),
(5, 'Xerox Phaser2', 'image.png', 15700, 'Китай', '2019-05-05', '3025Bl', 2, 15, '2022-04-15 18:22:12'),
(6, 'Brother', 'image.png', 11700, 'Корея', '2019-05-25', '3225B2', 3, 35, '2022-04-12 18:22:12'),
(7, 'Brother5', 'image.png', 11500, 'Корея', '2019-05-25', '3555B2', 3, 5, '2022-04-15 18:22:12');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `patronymic`, `login`, `email`, `password`) VALUES
(1, 'Иван', 'Иванов', 'Иванович', 'Admin', 'admin@mail.ru', 'c4ca4238a0b923820dcc509a6f75849b'),
(2, 'Петр', 'Петров', 'Петрович', 'User', 'user@mail.ru', 'c4ca4238a0b923820dcc509a6f75849b');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `custom_products`
--
ALTER TABLE `custom_products`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `custom_products`
--
ALTER TABLE `custom_products`
  ADD CONSTRAINT `order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
