-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 02, 2018 at 01:31 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `honeyken_coffee`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`) VALUES
(1, 'Colorpop'),
(2, 'ELF');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_statuses`
--

CREATE TABLE `delivery_statuses` (
  `id` int(11) NOT NULL,
  `delivery_status_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_statuses`
--

INSERT INTO `delivery_statuses` (`id`, `delivery_status_name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipping'),
(4, 'Arrived'),
(5, 'Received'),
(6, 'Cancelled');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `weight` float(11,2) NOT NULL,
  `discount_binary` binary(1) NOT NULL,
  `discount_id` int(11) NOT NULL,
  `product_collection_id` int(11) NOT NULL,
  `product_category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `product_name`, `price`, `description`, `image`, `stock`, `weight`, `discount_binary`, `discount_id`, `product_collection_id`, `product_category_id`, `brand_id`, `size_id`) VALUES
(1, 'Contouring Brush', '350.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 25, 25.00, 0x31, 1, 2, 2, 2, 1),
(2, 'Highlighting Brush', '350.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 80, 25.00, 0x31, 1, 2, 2, 2, 1),
(3, 'Contour Brush', '350.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 150, 25.00, 0x31, 1, 2, 2, 2, 1),
(4, 'Ultimate Blending Brush', '250.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 500, 25.00, 0x31, 1, 3, 2, 2, 1),
(5, 'Eyeshadow \"C\" brush', '200.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 60, 25.00, 0x31, 1, 3, 2, 2, 1),
(6, 'Concealer Brush', '200.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 40, 25.00, 0x31, 1, 3, 2, 2, 1),
(7, 'Contour Brush', '200.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 125, 25.00, 0x31, 1, 3, 2, 2, 1),
(8, 'Small angled Brush', '200.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 30, 25.00, 0x31, 1, 3, 2, 2, 1),
(9, 'Eyebrow duo brush', '200.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 75, 25.00, 0x31, 1, 3, 2, 2, 1),
(10, 'Small Stipple Brush', '200.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 89, 25.00, 0x31, 1, 3, 2, 2, 1),
(11, 'Blush Brush', '200.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 25, 25.00, 0x31, 1, 3, 2, 2, 1),
(12, 'Baked highlighter - Moonlight Pearl', '250.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 80, 25.00, 0x31, 1, 4, 3, 2, 1),
(13, 'Highlighting Brush', '200.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 150, 25.00, 0x31, 1, 4, 2, 2, 1),
(14, 'Baked Highlighter _ Blush Gems', '270.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 500, 25.00, 0x31, 1, 5, 3, 2, 1),
(15, 'Shimmering Facial Whip _ Lilac Petal', '120.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 60, 25.00, 0x31, 1, 5, 4, 2, 1),
(16, 'Blush Brush', '250.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 40, 25.00, 0x31, 1, 5, 3, 2, 1),
(17, 'Small Stipple Brush', '210.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 125, 25.00, 0x31, 1, 5, 3, 2, 1),
(18, 'Rose Gold Eyeshadow Palette', '700.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 30, 25.00, 0x31, 1, 6, 5, 2, 1),
(19, 'Baked Highlighter _ Blush Gems', '270.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 75, 25.00, 0x31, 1, 6, 3, 2, 1),
(20, 'Lip Lacquer _ Natural', '250.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 89, 25.00, 0x31, 1, 6, 6, 2, 1),
(21, 'Bronzed Peach', '450.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 125, 25.00, 0x31, 1, 7, 7, 2, 1),
(22, 'Bronzed Pink Beige', '450.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 30, 25.00, 0x31, 1, 7, 7, 2, 1),
(23, 'Contouring blush & bronzing powder - Fiji', '350.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 75, 25.00, 0x31, 1, 7, 7, 2, 1),
(24, 'Contouring blush & bronzing cream - St. Lucia', '300.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 89, 25.00, 0x31, 1, 7, 8, 2, 1),
(25, 'Makeup mist & set', '300.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 33, 25.00, 0x31, 1, 7, 1, 2, 1),
(26, 'High definition undereye setting powder', '250.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 45, 25.00, 0x31, 1, 8, 9, 2, 1),
(27, 'Moisturizing lipstick - Bordeaux Beauty', '200.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 66, 25.00, 0x31, 1, 9, 6, 2, 1),
(28, 'Moisturizing lipstick - Razzle Dazzle red', '200.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 123, 25.00, 0x31, 1, 9, 6, 2, 1),
(29, '3-in1 mascara - very black', '200.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 98, 25.00, 0x31, 1, 9, 10, 2, 1),
(30, 'Intense Ink eyeliner - Blackest Black', '200.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 10, 25.00, 0x31, 1, 9, 11, 2, 1),
(31, 'Top 8', '410.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 100, 25.00, 0x31, 1, 1, 12, 1, 1),
(32, 'Aventurine', '450.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 25, 25.00, 0x31, 1, 1, 13, 1, 1),
(33, 'Dark Brown', '200.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 80, 25.00, 0x31, 1, 1, 14, 1, 1),
(34, 'Baracuda', '410.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 150, 25.00, 0x31, 1, 1, 12, 1, 1),
(35, 'Bumble', '410.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 500, 25.00, 0x31, 1, 1, 12, 1, 1),
(36, 'Chi', '410.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 60, 25.00, 0x31, 1, 1, 12, 1, 1),
(37, 'Double Play', '1000.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 40, 25.00, 0x31, 1, 1, 7, 1, 1),
(38, 'Echo Park', '410.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 125, 25.00, 0x31, 1, 1, 12, 1, 1),
(39, 'Extra Toppings', '410.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 30, 25.00, 0x31, 1, 1, 12, 1, 1),
(40, 'Frick n Frack', '820.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 75, 25.00, 0x31, 1, 1, 12, 1, 1),
(41, 'Likely', '410.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 100, 25.00, 0x31, 1, 1, 12, 1, 1),
(42, 'Sizzle', '410.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 25, 25.00, 0x31, 1, 1, 12, 1, 1),
(43, 'Topaz', '1000.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 80, 25.00, 0x31, 1, 1, 7, 1, 1),
(44, 'Trouble Maker', '410.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 150, 25.00, 0x31, 1, 1, 12, 1, 1),
(45, 'Bare Necessities', '410.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 500, 25.00, 0x31, 1, 1, 12, 1, 1),
(46, 'Echo Park', '410.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 60, 25.00, 0x31, 1, 1, 12, 1, 1),
(47, 'Goal Digger', '350.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 40, 25.00, 0x31, 1, 1, 15, 1, 1),
(48, 'Likely', '410.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 125, 25.00, 0x31, 1, 1, 12, 1, 1),
(49, 'Lyin\' King', '410.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 30, 25.00, 0x31, 1, 1, 12, 1, 1),
(50, 'Monday', '410.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 75, 25.00, 0x31, 1, 1, 12, 1, 1),
(51, 'Mrs.', '410.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 89, 25.00, 0x31, 1, 1, 12, 1, 1),
(52, 'Mwah', '410.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 33, 25.00, 0x31, 1, 1, 12, 1, 1),
(53, 'Top 8', '410.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 45, 25.00, 0x31, 1, 1, 12, 1, 1),
(54, 'Brink', '350.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 66, 25.00, 0x31, 1, 1, 1, 1, 1),
(55, 'Kapish', '410.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 123, 25.00, 0x31, 1, 1, 15, 1, 1),
(56, 'Frick n Fack', '410.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 98, 25.00, 0x31, 1, 1, 12, 1, 1),
(57, 'Medium 30', '400.00', 'NONE', './assets/img/Colorpop/DoublePlay.jpg', 10, 25.00, 0x31, 1, 1, 16, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `location_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `location_name`) VALUES
(1, 'Metro Manila'),
(2, 'Luzon'),
(3, 'Visayas'),
(4, 'Mindanao');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `transaction_date` datetime(6) NOT NULL,
  `reference_number` varchar(255) NOT NULL,
  `total` decimal(11,2) NOT NULL,
  `delivery_status_id` int(11) NOT NULL,
  `paymend_status_id` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `staff_verifier_id` int(11) NOT NULL,
  `payment_proof` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` decimal(11,2) NOT NULL,
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `packaging_modes`
--

CREATE TABLE `packaging_modes` (
  `id` int(11) NOT NULL,
  `packaging_mode_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packaging_modes`
--

INSERT INTO `packaging_modes` (`id`, `packaging_mode_name`) VALUES
(1, 'XEND');

-- --------------------------------------------------------

--
-- Table structure for table `packaging_types`
--

CREATE TABLE `packaging_types` (
  `id` int(11) NOT NULL,
  `packaging_type_name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `packaging_size` varchar(255) NOT NULL,
  `shipping_price` decimal(11,2) NOT NULL,
  `shipping_schedule` varchar(255) NOT NULL,
  `location_id` int(11) NOT NULL,
  `packaging_mode_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packaging_types`
--

INSERT INTO `packaging_types` (`id`, `packaging_type_name`, `description`, `packaging_size`, `shipping_price`, `shipping_schedule`, `location_id`, `packaging_mode_id`) VALUES
(1, 'Option 1', '9\" by 14\" (Unliweight)', 'Large', '89.00', '1  day', 1, 1),
(2, 'Option 2', '1st Kg', 'Large', '139.00', '3-4 days', 2, 1),
(3, 'Option 3', '1st Kg', 'Large', '139.00', '3-4 days', 3, 1),
(4, 'Option 4', '1st Kg', 'Large', '139.00', '3-4 days', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_statuses`
--

CREATE TABLE `payment_statuses` (
  `id` int(11) NOT NULL,
  `payment_status_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_statuses`
--

INSERT INTO `payment_statuses` (`id`, `payment_status_name`) VALUES
(1, 'Not Paid'),
(2, 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` int(11) NOT NULL,
  `product_category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `product_category_name`) VALUES
(1, 'NONE'),
(2, 'Brush'),
(3, 'Highlighter'),
(4, 'Whip'),
(5, 'Eyeshadow'),
(6, 'Lipstick'),
(7, 'Bronzer'),
(8, 'Blush'),
(9, 'Powder'),
(10, 'Mascara'),
(11, 'Eyeliner'),
(12, 'L'),
(13, 'Face spray'),
(14, 'Brow'),
(15, 'Stix'),
(16, 'Concealear');

-- --------------------------------------------------------

--
-- Table structure for table `product_collections`
--

CREATE TABLE `product_collections` (
  `id` int(11) NOT NULL,
  `product_collection_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_collections`
--

INSERT INTO `product_collections` (`id`, `product_collection_name`) VALUES
(1, 'NONE'),
(2, 'Sculpt & Shine Brush Collection'),
(3, 'Luxe Brush Collection'),
(4, 'Baked Highlighter & Brush Duo'),
(5, 'Highlighting Set'),
(6, 'Rose Gold Beauty Set'),
(7, 'Aqua Beauty Blush & Bronzer'),
(8, 'Shadow Lock Eyelid Primer'),
(9, 'Free Fall Stuff'),
(10, ''),
(11, ''),
(12, ''),
(13, ''),
(14, '');

-- --------------------------------------------------------

--
-- Table structure for table `product_discounts`
--

CREATE TABLE `product_discounts` (
  `id` int(11) NOT NULL,
  `discount_value` float(11,2) NOT NULL,
  `discount_value_percent` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_discounts`
--

INSERT INTO `product_discounts` (`id`, `discount_value`, `discount_value_percent`) VALUES
(1, 0.00, '0%'),
(2, 0.10, '10%'),
(3, 0.15, '15%'),
(4, 0.20, '20%'),
(5, 0.25, '25%'),
(6, 0.30, '30%'),
(7, 0.35, '35%'),
(8, 0.40, '40%'),
(9, 0.45, '45%'),
(10, 0.50, '50%');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` int(11) NOT NULL,
  `product_size_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_size_name`) VALUES
(1, 'Small'),
(2, 'Medium'),
(3, 'Large');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'admin'),
(2, 'staff'),
(3, 'consumer');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history_log`
--

CREATE TABLE `transaction_history_log` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `location_id` int(11) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `present_address` varchar(255) NOT NULL,
  `cellphone_number` int(15) NOT NULL,
  `telephone_number` int(15) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `image`, `first_name`, `last_name`, `email`, `username`, `password`, `location_id`, `delivery_address`, `present_address`, `cellphone_number`, `telephone_number`, `role_id`) VALUES
(1, 'http://lorempixel.com/400/400/', 'admin', 'admin', 'admin@gmail.com', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'Diliman Quezon City', 'Diliman Quezon City', 912, 912, 1),
(2, 'http://lorempixel.com/400/400/', 'red', 'red', 'red@gmail.com', 'red', '78988010b890ce6f4d2136481f392787ec6d610', 2, 'Ocampo Camarines Sur', 'Ocampo Camarines Sur', 934, 934, 2),
(3, 'http://lorempixel.com/400/400/', 'user1', 'user1', 'user1@gmail.com', 'user1', 'b3daa77b4c04a9551b8781d03191fe098f325e67', 3, 'Ocampo Camarines Sur', 'Ocampo Camarines Sur', 985, 985, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_statuses`
--
ALTER TABLE `delivery_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_fk0` (`discount_id`),
  ADD KEY `items_fk1` (`product_collection_id`),
  ADD KEY `items_fk2` (`product_category_id`),
  ADD KEY `items_fk3` (`brand_id`),
  ADD KEY `items_fk4` (`size_id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reference_number` (`reference_number`),
  ADD KEY `orders_fk0` (`delivery_status_id`),
  ADD KEY `orders_fk1` (`paymend_status_id`),
  ADD KEY `orders_fk2` (`payment_method_id`),
  ADD KEY `orders_fk3` (`user_id`),
  ADD KEY `orders_fk4` (`staff_verifier_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_fk0` (`item_id`),
  ADD KEY `order_items_fk1` (`order_id`);

--
-- Indexes for table `packaging_modes`
--
ALTER TABLE `packaging_modes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packaging_types`
--
ALTER TABLE `packaging_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `packaging_types_fk0` (`location_id`),
  ADD KEY `packaging_types_fk1` (`packaging_mode_id`);

--
-- Indexes for table `payment_statuses`
--
ALTER TABLE `payment_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_collections`
--
ALTER TABLE `product_collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_discounts`
--
ALTER TABLE `product_discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_history_log`
--
ALTER TABLE `transaction_history_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_history_log_fk0` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `users_fk0` (`location_id`),
  ADD KEY `users_fk1` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivery_statuses`
--
ALTER TABLE `delivery_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packaging_modes`
--
ALTER TABLE `packaging_modes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `packaging_types`
--
ALTER TABLE `packaging_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment_statuses`
--
ALTER TABLE `payment_statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_collections`
--
ALTER TABLE `product_collections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `product_discounts`
--
ALTER TABLE `product_discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction_history_log`
--
ALTER TABLE `transaction_history_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_fk0` FOREIGN KEY (`discount_id`) REFERENCES `product_discounts` (`id`),
  ADD CONSTRAINT `items_fk1` FOREIGN KEY (`product_collection_id`) REFERENCES `product_collections` (`id`),
  ADD CONSTRAINT `items_fk2` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`),
  ADD CONSTRAINT `items_fk3` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `items_fk4` FOREIGN KEY (`size_id`) REFERENCES `product_sizes` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_fk0` FOREIGN KEY (`delivery_status_id`) REFERENCES `delivery_statuses` (`id`),
  ADD CONSTRAINT `orders_fk1` FOREIGN KEY (`paymend_status_id`) REFERENCES `payment_statuses` (`id`),
  ADD CONSTRAINT `orders_fk2` FOREIGN KEY (`payment_method_id`) REFERENCES `packaging_types` (`id`),
  ADD CONSTRAINT `orders_fk3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_fk4` FOREIGN KEY (`staff_verifier_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_fk0` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `order_items_fk1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `packaging_types`
--
ALTER TABLE `packaging_types`
  ADD CONSTRAINT `packaging_types_fk0` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`),
  ADD CONSTRAINT `packaging_types_fk1` FOREIGN KEY (`packaging_mode_id`) REFERENCES `packaging_modes` (`id`);

--
-- Constraints for table `transaction_history_log`
--
ALTER TABLE `transaction_history_log`
  ADD CONSTRAINT `transaction_history_log_fk0` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_fk0` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`),
  ADD CONSTRAINT `users_fk1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
