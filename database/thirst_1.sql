-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2019 at 12:34 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thirst_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`) VALUES
(38, 13, 20, 1),
(40, 9, 2, 1),
(41, 13, 2, 2),
(42, 13, 3, 1),
(44, 13, 14, 5);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Fruity Crush'),
(2, 'Thirsty Milkshake'),
(3, 'Fairy Tale'),
(4, 'Thirsty Treats'),
(5, 'Local Heroes'),
(6, 'Testing');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(50) NOT NULL,
  `placed_at` date NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `pickup_date` datetime NOT NULL,
  `card_num` bigint(20) NOT NULL,
  `card_cvc` int(5) NOT NULL,
  `card_exp_month` varchar(2) NOT NULL,
  `card_exp_year` varchar(5) NOT NULL,
  `txn_id` varchar(100) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `pickup_status` varchar(50) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `placed_at`, `payment_method`, `pickup_date`, `card_num`, `card_cvc`, `card_exp_month`, `card_exp_year`, `txn_id`, `payment_status`, `pickup_status`) VALUES
(2, 9, '2019-12-09', 'Pay at Counter', '2019-12-10 11:00:00', 0, 0, '', '', '', 'Pending', 'Pending'),
(3, 9, '2019-12-11', 'Pay at Counter', '2019-12-12 10:30:00', 0, 0, '', '', '', 'Pending', 'Pending'),
(4, 9, '2019-12-11', 'Pay at Counter', '2019-12-12 10:30:00', 0, 0, '', '', '', 'Pending', 'Pending'),
(13, 9, '2019-12-11', 'Pay at Counter', '2019-12-12 11:00:00', 0, 0, '', '', '', 'Pending', 'Pending'),
(14, 9, '2019-12-11', 'Pay at Counter', '2019-12-14 11:00:00', 0, 0, '', '', '', 'Pending', 'Pending'),
(15, 9, '2019-12-15', 'Pay using Card', '2019-12-16 10:30:00', 0, 0, '', '', '', 'Paid', 'Pending'),
(16, 9, '2019-12-15', 'Pay using Card', '2019-12-16 12:00:00', 0, 0, '', '', '', 'Paid', 'Pending'),
(17, 9, '2019-12-15', 'Pay using Card', '2019-12-16 11:00:00', 0, 0, '', '', '', 'Paid', 'Pending'),
(18, 9, '2019-12-15', 'Pay using Card', '2019-12-16 12:00:00', 0, 0, '', '', '', 'Paid', 'Pending'),
(19, 9, '2019-12-15', 'Pay using Card', '2019-12-16 11:00:00', 4242424242424242, 100, '08', '2021', 'txn_1Fq2n3DpKpcZFFS6KhaNpt8D', 'Paid', 'Pending'),
(20, 13, '2019-12-17', 'Pay at Counter', '2019-12-17 16:00:00', 0, 0, '', '', '', 'Pending', 'Pending'),
(21, 13, '2019-12-17', 'Pay at Counter', '2019-12-17 15:30:00', 0, 0, '', '', '', 'Pending', 'Pending'),
(22, 13, '2019-12-17', 'Pay at Counter', '2019-12-17 15:30:00', 0, 0, '', '', '', 'Pending', 'Collected'),
(23, 13, '2019-12-17', 'Pay at Counter', '2019-12-17 15:30:00', 0, 0, '', '', '', 'Cancelled', 'Cancelled'),
(24, 13, '2019-12-17', 'Pay at Counter', '2019-12-17 15:30:00', 0, 0, '', '', '', 'Cancelled', 'Cancelled'),
(25, 13, '2019-12-17', 'Pay at Counter', '2019-12-17 15:30:00', 0, 0, '', '', '', 'Cancelled', 'Cancelled'),
(26, 9, '2019-12-17', 'Pay using Card', '2019-12-18 11:30:00', 4242424242424242, 100, '08', '2020', 'txn_1FqkOfDpKpcZFFS6uT7rtfrS', 'Paid', 'Pending'),
(27, 9, '2019-12-17', 'Pay using Card', '2019-12-18 12:00:00', 4242424242424242, 100, '08', '2020', 'txn_1FqkRNDpKpcZFFS679dSXqQq', 'Paid', 'Pending'),
(28, 9, '2019-12-17', 'Pay using Card', '2019-12-18 12:30:00', 4242424242424242, 100, '08', '2020', 'txn_1FqkSxDpKpcZFFS688yUGiMD', 'Paid', 'Pending'),
(29, 9, '2019-12-17', 'Pay using Card', '2019-12-18 12:30:00', 4242424242424242, 199, '08', '2020', 'txn_1Fqkj8DpKpcZFFS6FSqGG6v8', 'Paid', 'Pending'),
(30, 9, '2019-12-17', 'Pay using Card', '2019-12-20 11:30:00', 4242424242424242, 181, '08', '2020', 'txn_1FqkmzDpKpcZFFS6xUYyvs5d', 'Paid', 'Pending'),
(31, 9, '2019-12-17', 'Pay using Card', '2019-12-20 12:00:00', 4242424242424242, 100, '08', '2020', 'txn_1FqkqPDpKpcZFFS6GmZVTLgS', 'Paid', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(1, 2, 22, 1),
(2, 3, 2, 2),
(3, 3, 12, 2),
(4, 4, 3, 3),
(5, 4, 7, 1),
(6, 13, 12, 1),
(7, 14, 25, 2),
(8, 15, 2, 1),
(9, 16, 7, 1),
(10, 17, 10, 1),
(11, 18, 2, 1),
(12, 19, 15, 2),
(13, 20, 2, 1),
(14, 21, 2, 1),
(15, 22, 20, 1),
(16, 26, 3, 1),
(17, 26, 22, 2),
(18, 27, 15, 2),
(19, 27, 24, 1),
(20, 28, 20, 1),
(21, 28, 24, 3),
(22, 29, 20, 1),
(23, 29, 23, 3),
(24, 30, 18, 2),
(25, 30, 5, 1),
(26, 31, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(8) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cat_id` int(5) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `description` text NOT NULL,
  `avail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `cat_id`, `image`, `price`, `description`, `avail`) VALUES
(1, 'Purple Pill', 1, 'thirstMenu/fruityCrush/Purple Pill.jpg', 7.50, '<p>Blueberry + Apple Crush</p>\r\n', 0),
(2, 'Pink Flamingo', 1, 'thirstMenu/fruityCrush/Pink Flamingo.jpg', 7.50, 'Strawberry + Lychee Crush', 1),
(3, 'Pineapple Sunrise', 1, 'thirstMenu/fruityCrush/Pineapple Sunrise.jpg', 7.50, 'Pineapple + Soda Crush', 1),
(4, 'Ocean Water', 1, 'thirstMenu/fruityCrush/Ocean Water.jpg', 7.50, 'Curacao Blue Syrup + Soda Crush', 1),
(5, 'Guava Tanamera', 1, 'thirstMenu/fruityCrush/Guava Tanamera.jpg', 7.50, 'Sour Plum + Guava Crush', 1),
(6, 'Mango Madness', 2, 'thirstMenu/thirstyMilkshake/Mango Madness.jpg', 9.50, 'Mango', 1),
(7, 'Smashing Strawberry', 2, 'thirstMenu/thirstyMilkshake/Smashing Strawberry.jpg', 9.50, 'Strawberry', 1),
(8, 'Bandung Asmara', 2, 'thirstMenu/thirstyMilkshake/Bandung Asmara.jpg', 9.50, 'Rose Syrup', 1),
(9, 'Aloha Pineapple', 2, 'thirstMenu/thirstyMilkshake/Aloha Pineapple.jpg', 9.50, '<p>Pineapple</p>\r\n', 1),
(10, 'Blue Ivy', 2, 'thirstMenu/thirstyMilkshake/Blue Ivy.jpg', 9.50, 'Blueberry', 1),
(11, 'Mermaid', 3, 'thirstMenu/fairyTale/Mermaid.jpg', 9.50, 'Blueberry + Pineapple', 1),
(12, 'Red Riding Hood', 3, 'thirstMenu/fairyTale/Red Riding Hood.jpg', 9.50, 'Strawberry + Caramel', 1),
(13, 'Double Dragon', 3, 'thirstMenu/fairyTale/Double Dragon.jpg', 9.50, 'Orange & Mango', 1),
(14, 'Fruity Zubri', 3, 'thirstMenu/fairyTale/Fruity Zubri.jpg', 9.50, 'Blueberry & Strawberry', 1),
(15, 'Unicorn', 3, 'thirstMenu/fairyTale/Unicorn.jpg', 9.50, 'Strawberry + Mango', 1),
(16, 'Vanilla Abdul', 4, 'thirstMenu/thirstyTreats/Vanilla Abdul.jpg', 10.50, 'Vanilla Syrup + Oreo', 1),
(17, 'Matcha Ozawa', 4, 'thirstMenu/thirstyTreats/Matcha Ozawa.jpg', 10.50, 'Matcha Powder + Corn Syrup', 1),
(18, 'Syed Caramel', 4, 'thirstMenu/thirstyTreats/Syed Caramel.jpg', 10.50, 'Caramel Syrup + Cookies', 1),
(19, 'Hana Banana', 4, 'thirstMenu/thirstyTreats/Hana Banana.jpg', 10.50, 'Banana Syrup + Cookies', 1),
(20, 'Choco Loco', 4, 'thirstMenu/thirstyTreats/Choco Loco.jpg', 10.50, 'Chocolate Sauce + Oreo', 1),
(21, 'Gula Apong', 5, 'thirstMenu/localHeroes/Gula Apong.jpg', 10.50, 'Vanilla + Palm Sugar', 1),
(22, 'Wonder Cendol', 5, 'thirstMenu/localHeroes/Wonder Cendol.jpg', 10.50, 'Palm Sugar + Sago', 1),
(23, 'Horlick Freak', 5, 'thirstMenu/localHeroes/Horlick Freak.jpg', 10.50, 'Horlick + Cookies', 1),
(24, 'Chill Coconut', 5, 'thirstMenu/localHeroes/Chill Coconut.jpg', 10.50, 'Vanilla Ice Cream + Coconut Crush', 1),
(25, 'Milo Godzilla', 5, 'thirstMenu/localHeroes/Milo Godzilla.jpg', 10.50, 'Milo + Oreo', 1),
(26, 'test', 6, '', 7.00, '<p>hello</p>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(60) NOT NULL,
  `type` int(1) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `reset_code` varchar(15) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `firstname`, `lastname`, `address`, `contact_info`, `photo`, `reset_code`, `created_on`) VALUES
(1, 'admin@admin.com', '$2y$10$0SHFfoWzz8WZpdu9Qw//E.tWamILbiNCX7bqhy3od0gvK5.kSJ8N2', 1, 'Admin', '', '', '', 'thanos1.jpg', '', '2018-05-01'),
(9, 'harry@den.com', '$2y$10$Oongyx.Rv0Y/vbHGOxywl.qf18bXFiZOcEaI4ZpRRLzFNGKAhObSC', 0, 'Harry', 'Den', 'Silay City, Negros Occidental test', '09092735719', 'male2.png', '6Pgs7AYkMNhouDn', '2018-05-09'),
(12, 'christine@gmail.com', '$2y$10$ozW4c8r313YiBsf7HD7m6egZwpvoE983IHfZsPRxrO1hWXfPRpxHO', 0, 'Christine', 'becker', 'demo', '7542214500', 'female3.jpg', '', '2018-07-09'),
(13, 'zettyboyd@hotmail.com', '$2y$10$HHpEQT8VNe3OyqDHyjpERevSGlwOlhlHatmGCZEeFwLBzYZh0g1Rq', 0, 'Zetty', 'Philip', '', '', 'female3.jpg', '3r1wSjkDy7MPtpm', '2019-12-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_OrderID` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Cat` (`cat_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_CustomerID` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `FK_OrderID` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_Cat` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
