-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2024 at 09:48 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laptops`
--

-- --------------------------------------------------------

--
-- Table structure for table `favorite_products_users`
--

CREATE TABLE `favorite_jewellery_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `jewellery` (
  `id` int(11) NOT NULL COMMENT 'Първичен ключ',
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `image`, `price`) VALUES
(1, 'Колие + гривна', 'https://swanpearls.com/uploads/product-image/image/420x420/kolie-s-beli-perli-mica1040%20%283%29.webp', '99.99'),
(2, 'Колие с бяла перла', 'https://swanpearls.com/uploads/product-image/image/420x420/kolie-s-beli-perli-mica1040%20%282%29-1.webp', '69.99'),
(3, 'Гривна с бели перли', 'https://swanpearls.com/uploads/product-image/image/420x420/grivna-s-beli-perli-mica1019%20%281%29-1.webp', '79.99'),
(4, 'Обеци с розови перли', 'https://swanpearls.com/uploads/product-image/image/420x420/CA638EP.webp', '49.99'),
(5, 'Обеци с бели перли', 'https://swanpearls.com/uploads/product-image/image/420x420/CA638EW.webp', '49.99'),
(6, 'Дървото на живота', 'https://swanpearls.com/uploads/product-image/image/420x420/END189N.webp', '109.99'),
(7, 'Златно колие зодия', 'https://swanpearls.com/uploads/product-image/image/420x420/M09N7-srebarno-kolie-vezni-1.webp', '359.99'),
(8, 'Сребърно колие пеперуда', 'https://swanpearls.com/uploads/product-image/image/420x420/MD2009N-dvuredovo-sreburno-koliepeperudi_1.webp', '99.99'),
(9, 'Сребърно колие снежинка', 'https://swanpearls.com/uploads/product-image/image/420x420/MD2013N-sreburno-kolie-snevinka-vurtqchto_1.webp', '70.99');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `names` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `names`, `email`, `password`) VALUES
(6, 'Симеон', 'simeon@abv.bg', '$argon2i$v=19$m=65536,t=4,p=1$QndnNTB3b0RmdUhTV2VVZQ$QfKHIMfaObI+KUoAMDhyxVKnxTQ3QvMBD+YYvy3Niks'),
(16, 'simeon', 'simeon2@abv.bg', '$argon2i$v=19$m=65536,t=4,p=1$YVVlU2x1b1dXVExaMmxiZQ$mlrDv6NwGJy10RN/uSLUjcko12TCTRg/Qvg0LaHVUSk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorite_products_users`
--
ALTER TABLE `favorite_products_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favorite_products_users`
--
ALTER TABLE `favorite_jewellery_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `jewellery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Първичен ключ', AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
