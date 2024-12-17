-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Време на генериране: 17 дек 2024 в 16:00
-- Версия на сървъра: 10.4.32-MariaDB
-- Версия на PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данни: `deliveries`
--

-- --------------------------------------------------------

--
-- Структура на таблица `favorite_jewellery_users`
--

CREATE TABLE `favorite_jewellery_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Схема на данните от таблица `favorite_jewellery_users`
--

INSERT INTO `favorite_jewellery_users` (`id`, `user_id`, `product_id`) VALUES
(36, 0, 0),
(37, 0, 0),
(38, 1, 1),
(39, 0, 1),
(41, 1, 11),
(42, 1, 5);

-- --------------------------------------------------------

--
-- Структура на таблица `jewellery`
--

CREATE TABLE `jewellery` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Схема на данните от таблица `jewellery`
--

INSERT INTO `jewellery` (`id`, `title`, `image`, `price`) VALUES
(6, 'Кристали със син камък', '1734444932_blue.webp', 89.99),
(7, 'Колие Пеперуди', '1734444950_butterflies.webp', 78.99),
(8, 'Колие Коте', '1734444968_cat.webp', 67.99),
(9, 'Колие Детелина', '1734444982_detelina.webp', 89.99),
(10, 'Дървото на живота', '1734444998_durvoto.webp', 109.99),
(11, 'Колие Фея', '1734445012_fairy.webp', 36.99),
(12, 'Колие Цвете', '1734445026_flower.webp', 78.99),
(13, 'Колие Сърца', '1734445040_hearts.webp', 78.99);

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `names` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `names`, `email`, `password`) VALUES
(1, 'Teodora', 'tmindizova@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$c3VVNWZDUnV5Zm53SFRqTQ$5LbTuYGI8whlTfRqKj2SfGUzcN7cBJ1XiIQtBd/hteM'),
(0, 'Ralitsa', 'tmindizova1@gmail.com', '$argon2i$v=19$m=65536,t=4,p=1$Umx5a2wvMEM3VWI2a1loRw$WpvGoMtL+5GDq2B6c7XK719VaY0e2qdmmQo77rmYUsQ');

--
-- Indexes for dumped tables
--

--
-- Индекси за таблица `favorite_jewellery_users`
--
ALTER TABLE `favorite_jewellery_users`
  ADD PRIMARY KEY (`id`);

--
-- Индекси за таблица `jewellery`
--
ALTER TABLE `jewellery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favorite_jewellery_users`
--
ALTER TABLE `favorite_jewellery_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `jewellery`
--
ALTER TABLE `jewellery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
