-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 21, 2025 at 04:28 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color` varchar(50) DEFAULT 'Default',
  `size` varchar(50) DEFAULT 'Default',
  `quantity` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'thusitha', 'thusitha@gmail.com', 'idk', 'jhjhjihb', '2025-09-21 06:33:03');

-- --------------------------------------------------------

--
-- Table structure for table `faq_questions`
--

CREATE TABLE `faq_questions` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `status` enum('pending','processing','completed','cancelled') DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total`, `status`, `created_at`) VALUES
(1, 3, 995.00, '', '2025-09-21 05:30:40'),
(2, 3, 7500.00, '', '2025-09-21 06:30:53'),
(3, 3, 250.00, '', '2025-09-21 06:32:51'),
(4, 3, 995.00, 'pending', '2025-09-21 07:36:21'),
(5, 3, 995.00, 'pending', '2025-09-21 14:06:31');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `color` varchar(50) DEFAULT 'Default',
  `size` varchar(50) DEFAULT 'Default'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `color`, `size`) VALUES
(1, 1, 2, 1, 995.00, '0', 'S'),
(2, 2, 6, 3, 2500.00, '0', 'XS'),
(3, 3, 11, 1, 250.00, '0', 'S'),
(4, 4, 2, 1, 995.00, '0', 'S'),
(5, 5, 2, 1, 995.00, '0', 'S');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `colors` varchar(255) NOT NULL,
  `sizes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `description`, `price`, `image`, `colors`, `sizes`) VALUES
(1, 'Belly Chain', 'Accessories', 'A stylish waist accessory designed to add sparkle to your outfit. Lightweight and adjustable.', 350.00, 'belly_chain.jpg', 'Silver,Gold', 'S,M,L'),
(2, 'Blouse', 'Womens', 'A soft, comfortable blouse with a flattering fit. Perfect for everyday or occasions.', 995.00, 'blouse.webp', 'Red,Blue,Yellow,Pink,Green', 'S,M,L,XL'),
(3, 'Bottom', 'Mens', 'Comfortable and stylish pants designed for everyday wear with durable fabric.', 645.00, 'bottom.jpg', 'Red,Blue,Black,White', 'S,M,L,XL'),
(4, 'Boys Denim Shorts', 'Kids', 'Durable and comfy denim shorts made for active little ones.', 350.00, 'boys_denim_shorts.jpeg', 'Blue,White,Black', 'XS,S,M'),
(5, 'Boys Denim', 'Kids', 'Stylish and durable denim designed for everyday comfort.', 1700.00, 'boys_denim.jpg', 'Blue,Dark Blue,Black', 'XS,S,M'),
(6, 'Boys Hoodie', 'Kids', 'A cozy hoodie for everyday comfort. Soft fabric and perfect for layering.', 2500.00, 'boys_hoodie.avif', 'Blue,Black,White', 'XS,S,M'),
(7, 'Boys Pants', 'Kids', 'Durable pants made for active boys. Relaxed fit and soft fabric.', 1450.00, 'boys_pants.webp', 'White,Black,Blue', 'XS,S,M'),
(8, 'Boys Shirt', 'Kids', 'Breathable cotton shirt made for school or casual wear.', 1270.00, 'boys_shirt.webp', 'Red,Blue,Green,White,Black', 'XS,S,M,L'),
(9, 'Boys Short', 'Kids', 'Lightweight and comfortable shorts made for active days.', 2600.00, 'boys_short.webp', 'Blue,Black', 'XS,S,M'),
(10, 'Boys T-Shirt', 'Kids', 'Soft and breathable t-shirt for everyday comfort.', 1460.00, 'boys_tshirt.webp', 'Red,Blue,White,Black', 'XS,S,M'),
(11, 'Bracelets', 'Accessories', 'Elegant and easy-to-wear wrist accessories. Perfect for casual and special occasions.', 250.00, 'bracelets.webp', 'Silver,Gold', 'S,M,L'),
(12, 'Caps', 'Accessories', 'Classic and comfortable caps with adjustable fit.', 650.00, 'caps.jpg', 'Blue,Red,Black', 'S,M'),
(13, 'Crop Tops', 'Womens', 'Stylish and lightweight tops designed for a trendy, casual look.', 2300.00, 'crop_tops.jpg', 'Pink,Black,Red,Blue,White', 'S,M,L,XL'),
(14, 'Denim Shorts', 'Mens', 'Classic denim shorts designed for everyday comfort.', 2900.00, 'denim_shorts.jpg', 'Black,Blue', 'S,M,L,XL,XXL'),
(15, 'Denim', 'Mens', 'Durable denim fabric made for everyday wear.', 3400.00, 'denim.webp', 'Black,Blue', 'S,M,L,XL,XXL,XXXL'),
(16, 'Earrings', 'Accessories', 'Elegant lightweight earrings to add sparkle to any look.', 250.00, 'earings.jpg', 'Silver,Gold', 'S,M'),
(17, 'Girl Denim Shorts', 'Womens', 'Stylish and comfortable denim shorts for casual outings.', 3400.00, 'girl_denim_shorts.jpg', 'Black,Blue,White', 'S,M,L,XL,XXL'),
(18, 'Girls Denim', 'Womens', 'Durable denim for casual or everyday wear.', 4670.00, 'girls_denim.jpg', 'Blue,Black,White', 'S,M,L,XL,XXL'),
(19, 'Girls Frock', 'Kids', 'A charming dress for playful days and special moments.', 1500.00, 'girls_frock.jpg', 'Red,Pink,Blue', 'XS,S,M'),
(20, 'Girls Hoodie', 'Kids', 'Soft and cozy hoodie designed for cooler days.', 3450.00, 'girls_hoodie.jpg', 'Pink,Red,White,Black', 'XS,S,M'),
(21, 'Girls Pants', 'Kids', 'Comfortable pants designed for active girls.', 2300.00, 'girls_pants.webp', 'Pink,Red,Blue', 'XS,S,M'),
(22, 'Girls Shirt', 'Kids', 'Playful and stylish shirt made with breathable fabric.', 2470.00, 'girls_shirt.jpg', 'Blue,Black,Red', 'XS,S,M'),
(23, 'Girls Shorts', 'Kids', 'Comfy shorts designed for active days.', 3470.00, 'girls_shorts.jpg', 'Black,Blue', 'XS,S,M'),
(24, 'Girls T-Shirt', 'Kids', 'Soft cotton t-shirt with a playful design.', 1450.00, 'girls_tshirt.jpg', 'Pink,White,Blue', 'XS,S,M,L'),
(25, 'Hand Bags', 'Accessories', 'Trendy handbags made with durable material.', 5600.00, 'hand_bags.webp', 'Brown,Black,Beige', 'One Size'),
(26, 'Hats', 'Accessories', 'Classic sun hats with breathable fabric.', 1900.00, 'hats.jpg', 'White,Beige,Black', 'One Size'),
(27, 'Heels', 'Luxury', 'Elegant high heels with premium design.', 7200.00, 'heels.jpg', 'Black,Red,Beige', '36,37,38,39,40'),
(28, 'High Heels', 'Luxury', 'Stylish heels designed for formal wear.', 8900.00, 'high_heels.avif', 'Black,Gold,Silver', '36,37,38,39,40'),
(29, 'Hoodie Women', 'Womens', 'Cozy women’s hoodie for casual outings.', 3400.00, 'hoodie_women.webp', 'Pink,Grey,Black', 'S,M,L'),
(30, 'Hoodie', 'Mens', 'Classic men’s hoodie designed for comfort.', 3600.00, 'hoodie.webp', 'Grey,Black,Blue', 'M,L,XL'),
(31, 'Jeans', 'Mens', 'Durable jeans for men in slim and regular fit.', 4800.00, 'jeans.avif', 'Blue,Black,Grey', 'M,L,XL'),
(32, 'Jewelleries', 'Luxury', 'Premium jewellery collection with elegant designs.', 15000.00, 'jewelleries.webp', 'Gold,Silver,Rose Gold', 'One Size'),
(33, 'Legging', 'Womens', 'Comfortable leggings for workouts and casual wear.', 1800.00, 'legging.avif', 'Black,Grey,Navy', 'S,M,L'),
(34, 'Long Dress', 'Womens', 'Elegant long dress suitable for special occasions.', 7600.00, 'long_dress.jpg', 'Red,Blue,Green', 'S,M,L'),
(35, 'Long Skirts', 'Womens', 'Stylish long skirts with modern prints.', 4200.00, 'longs_skirts.jpg', 'Multi-color', 'S,M,L'),
(36, 'Mens Chain', 'Accessories', 'Trendy men’s chain made of premium metal.', 3200.00, 'mens_chain.jpg', 'Silver,Gold', 'One Size'),
(37, 'Mens Cork Slippers', 'Accessories', 'Durable cork slippers designed for men.', 2200.00, 'mens_cork_slippers.jpg', 'Brown,Black', 'M,L,XL'),
(38, 'Mens Shoes', 'Accessories', 'Comfortable men’s shoes for casual wear.', 5800.00, 'mens_shoes.webp', 'Black,White,Brown', '40,41,42,43,44'),
(39, 'Mens Suit', 'Mens', 'Formal suit tailored for professional and occasion wear.', 12500.00, 'mens_suit.jpg', 'Black,Navy,Grey', 'M,L,XL'),
(40, 'Necklace', 'Luxury', 'Elegant necklace with timeless design.', 8700.00, 'necklace.jpg', 'Gold,Silver,Rose Gold', 'One Size'),
(41, 'Pant', 'Mens', 'Classic pants made for casual and office wear.', 3500.00, 'pant.webp', 'Beige,Black,Blue', 'M,L,XL'),
(42, 'Rings', 'Luxury', 'Premium rings made with elegant craftsmanship.', 4500.00, 'rings.webp', 'Gold,Silver', '6,7,8'),
(43, 'Sandals', 'Accessories', 'Comfortable sandals for daily wear.', 2800.00, 'sandals.jpg', 'Pink,Beige,Black', '36,37,38,39,40'),
(44, 'Sarong', 'Garments', 'Traditional sarong made with high-quality fabric.', 2500.00, 'sarong.webp', 'Red,Orange,Blue', 'One Size'),
(45, 'Shirt', 'Mens', 'Classic cotton shirt suitable for work and casual wear.', 3900.00, 'shirt.jpg', 'Blue,White,Grey', 'M,L,XL'),
(46, 'Short Dress', 'Womens', 'Trendy short dress for casual outings.', 5200.00, 'shorst_dress.webp', 'Pink,Red,Black', 'S,M,L'),
(47, 'Short Skirt', 'Womens', 'Modern mini skirt for a trendy look.', 3100.00, 'short_skirt.webp', 'Green,Black,Blue', 'S,M,L'),
(48, 'Shorts', 'Mens', 'Comfortable cotton shorts designed for casual use.', 2700.00, 'shorts.webp', 'Black,Grey,Blue', 'M,L,XL'),
(49, 'Slippers', 'Accessories', 'Casual slippers made for everyday comfort.', 1600.00, 'slippers.jpg', 'Black,Blue,Grey', 'M,L,XL'),
(50, 'Sports Shorts', 'Garments', 'Breathable sports shorts designed for workouts.', 2300.00, 'sports_shorts.jpg', 'Black,White,Blue', 'S,M,L'),
(51, 'Sports T-Shirt', 'Garments', 'Lightweight sports t-shirt with quick-dry fabric.', 2600.00, 'sports_tshirt.jpg', 'Black,Blue,White', 'S,M,L,XL'),
(52, 'Sports Wrist Bands', 'Accessories', 'Soft and absorbent wristbands for sports activities.', 1200.00, 'sports_wrist_bands.jpg', 'Pink,Red,Yellow,Black', 'One Size'),
(53, 'Sunglasses', 'Luxury', 'Stylish sunglasses with UV protection.', 6800.00, 'sunglasses.jpg', 'Brown,Black,Gold', 'One Size'),
(54, 'Tie', 'Mens', 'Classic silk ties for formal occasions.', 2200.00, 'tie.webp', 'Blue,Black,Red', 'One Size'),
(55, 'Trouser', 'Mens', 'Slim-fit trousers suitable for formal and casual wear.', 4200.00, 'trouser.webp', 'Grey,Black,Navy', 'M,L,XL'),
(56, 'T-Shirt', 'Mens', 'Everyday men’s t-shirt with modern fit.', 2000.00, 'tshirt.webp', 'Black,White,Blue', 'M,L,XL'),
(57, 'Watches', 'Luxury', 'Premium watches with stylish designs and durability.', 15500.00, 'watches.png', 'Silver,Black,Gold', 'One Size'),
(58, 'Women Denim', 'Womens', 'Skinny-fit denim for women with stretch comfort.', 4900.00, 'women_denim.jpg', 'Blue,Black', 'S,M,L'),
(59, 'Women Pants', 'Womens', 'Formal women’s pants with modern tailoring.', 4300.00, 'women_pants.jpg', 'Beige,Black,Navy', 'S,M,L'),
(60, 'Women Short', 'Womens', 'Trendy shorts for women, perfect for summer.', 3100.00, 'women_short.webp', 'Black,Blue,Pink', 'S,M,L'),
(61, 'Women T-Shirt', 'Womens', 'Casual cotton t-shirt for women.', 2300.00, 'women_tshirt.jpg', 'White,Grey,Pink', 'S,M,L'),
(62, 'Womens Gown', 'Womens', 'Elegant gown with flowy silhouette and premium fabric.', 9200.00, 'womens_gown.avif', 'Green,Red,Black', 'S,M,L'),
(63, 'Womens Shoes', 'Accessories', 'Comfortable casual shoes with stylish design.', 4500.00, 'womens_shoes.jpg', 'Pink,White,Black', '36,37,38,39,40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('customer','admin') DEFAULT 'customer',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Thusini', 'thusini@gmail.com', 'e0bc4f30e7985b200b343a20da564491172b01e3786aab8d0b1138dcbc85b47b', 'admin', '2025-09-21 05:11:10'),
(2, 'Bhagya', 'bhagya@gmail.com', '91d84e47c17cfead08721b03fce94def86f381871da0dbbacbb58c4e3aaecbb8', 'customer', '2025-09-21 05:11:10'),
(3, 'Sheyma Mariyam', 'sheyma@gmail.com', '968ce8935701c3e1a8424a5de8bcfa5f5155a74f63e62956aea2cf8bb4984bf1', 'customer', '2025-09-21 05:11:10'),
(4, 'Alice', 'alice@gmail.com', 'a5ef9ccc5c60d2ae3c52f0f65decbc05a38c90d3942ab37d319aa2568a445b90', 'customer', '2025-09-21 05:11:10'),
(5, 'Bob', 'bob@gmail.com', 'dd5a5cc2c8cf737fa6d06cf4a910188ad5a007d17f5e6f14ea96fc590c50e93a', 'customer', '2025-09-21 05:11:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_questions`
--
ALTER TABLE `faq_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `faq_questions`
--
ALTER TABLE `faq_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
