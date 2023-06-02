-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2023 at 01:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amaqazi`
--

-- --------------------------------------------------------

--
-- Table structure for table `productcategories`
--

CREATE TABLE `productcategories` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productcategories`
--

INSERT INTO `productcategories` (`CategoryID`, `CategoryName`) VALUES
(1, 'Dresses'),
(2, 'Shirts'),
(3, 'Jeans'),
(4, 'Swimwear'),
(5, 'Sleepwear'),
(6, 'Sportswear'),
(7, 'Jumpsuits'),
(8, 'Blazers'),
(9, 'Jackets'),
(10, 'Shoes');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `ID` int(11) NOT NULL,
  `Code` varchar(20) DEFAULT NULL,
  `Name` varchar(100) DEFAULT NULL,
  `Qty` int(11) DEFAULT NULL,
  `SalePrice` decimal(10,2) DEFAULT NULL,
  `PurchasePrice` decimal(10,2) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Image` varchar(100) DEFAULT NULL,
  `Size` varchar(10) DEFAULT NULL,
  `Color` varchar(20) DEFAULT NULL,
  `CreatedAt` date DEFAULT NULL,
  `UpdatedAt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`ID`, `Code`, `Name`, `Qty`, `SalePrice`, `PurchasePrice`, `CategoryID`, `Description`, `Image`, `Size`, `Color`, `CreatedAt`, `UpdatedAt`) VALUES
(1, 'P001', 'T-Shirt', 10, 19.99, 15.99, 1, 'Comfortable cotton t-shirt', 'tshirt.jpg', 'M', 'Blue', '2023-06-02', '2023-06-02'),
(2, 'P002', 'Jeans', 5, 29.99, 24.99, 2, 'Classic denim jeans', 'jeans.jpg', 'L', 'Black', '2023-06-02', '2023-06-02'),
(3, 'P003', 'Sneakers', 20, 49.99, 39.99, 3, 'Stylish and comfortable sneakers', 'sneakers.jpg', '8', 'White', '2023-06-02', '2023-06-02'),
(4, 'P004', 'Dress', 15, 39.99, 34.99, 1, 'Elegant evening dress', 'dress.jpg', 'S', 'Red', '2023-06-02', '2023-06-02'),
(5, 'P005', 'Swimwear', 8, 24.99, 19.99, 4, 'Fashionable swimsuit for women', 'swimwear.jpg', 'M', 'Purple', '2023-06-02', '2023-06-02'),
(6, 'P006', 'Jacket', 12, 59.99, 49.99, 5, 'Warm and stylish jacket', 'jacket.jpg', 'XL', 'Black', '2023-06-02', '2023-06-02'),
(7, 'P007', 'Sports Shoes', 18, 44.99, 34.99, 3, 'High-performance sports shoes', 'sportsshoes.jpg', '9', 'Blue', '2023-06-02', '2023-06-02'),
(8, 'P008', 'Blouse', 7, 29.99, 24.99, 1, 'Elegant and trendy blouse', 'blouse.jpg', 'L', 'Pink', '2023-06-02', '2023-06-02'),
(9, 'P009', 'Shorts', 25, 19.99, 15.99, 2, 'Comfortable and casual shorts', 'shorts.jpg', 'M', 'Khaki', '2023-06-02', '2023-06-02'),
(10, 'P010', 'Running Shoes', 14, 54.99, 44.99, 3, 'Lightweight running shoes for athletes', 'runningshoes.jpg', '8.5', 'Gray', '2023-06-02', '2023-06-02'),
(11, 'P011', 'Sweater', 9, 39.99, 29.99, 1, 'Warm and cozy sweater', 'sweater.jpg', 'S', 'Green', '2023-06-02', '2023-06-02'),
(12, 'P012', 'Skirt', 6, 34.99, 28.99, 2, 'Fashionable skirt for any occasion', 'skirt.jpg', 'M', 'Black', '2023-06-02', '2023-06-02'),
(13, 'P013', 'Sandals', 18, 24.99, 19.99, 3, 'Comfortable and stylish sandals', 'sandals.jpg', '7', 'Brown', '2023-06-02', '2023-06-02'),
(14, 'P014', 'Suit', 4, 149.99, 129.99, 5, 'Elegant formal suit', 'suit.jpg', 'L', 'Navy', '2023-06-02', '2023-06-02'),
(15, 'P015', 'Hoodie', 10, 29.99, 24.99, 1, 'Casual hoodie for everyday wear', 'hoodie.jpg', 'XL', 'Gray', '2023-06-02', '2023-06-02'),
(16, 'P016', 'Pants', 15, 34.99, 28.99, 2, 'Versatile and comfortable pants', 'pants.jpg', 'S', 'Beige', '2023-06-02', '2023-06-02'),
(17, 'P017', 'Flip Flops', 22, 14.99, 9.99, 3, 'Casual and lightweight flip flops', 'flipflops.jpg', '9', 'Red', '2023-06-02', '2023-06-02'),
(18, 'P018', 'Blazer', 8, 59.99, 49.99, 5, 'Stylish blazer for formal occasions', 'blazer.jpg', 'M', 'Gray', '2023-06-02', '2023-06-02'),
(19, 'P019', 'Sweatshirt', 12, 39.99, 29.99, 1, 'Cozy and warm sweatshirt', 'sweatshirt.jpg', 'L', 'Purple', '2023-06-02', '2023-06-02'),
(20, 'P020', 'Leggings', 20, 19.99, 15.99, 2, 'Stretchy and comfortable leggings', 'leggings.jpg', 'M', 'Black', '2023-06-02', '2023-06-02'),
(21, 'P021', 'Running Shorts', 16, 24.99, 19.99, 3, 'Breathable running shorts', 'runningshorts.jpg', 'S', 'Blue', '2023-06-02', '2023-06-02'),
(22, 'P022', 'Formal Dress', 6, 79.99, 69.99, 1, 'Sophisticated formal dress', 'formaldress.jpg', 'M', 'Red', '2023-06-02', '2023-06-02'),
(23, 'P023', 'Hiking Boots', 10, 89.99, 79.99, 3, 'Durable hiking boots for outdoor adventures', 'hikingboots.jpg', '8', 'Brown', '2023-06-02', '2023-06-02'),
(24, 'P024', 'Cardigan', 14, 34.99, 28.99, 1, 'Lightweight and stylish cardigan', 'cardigan.jpg', 'L', 'Navy', '2023-06-02', '2023-06-02'),
(25, 'P025', 'Skate Shoes', 8, 54.99, 44.99, 3, 'Trendy skate shoes for skateboard enthusiasts', 'skateshoes.jpg', '9.5', 'Black', '2023-06-02', '2023-06-02'),
(26, 'P026', 'Polo Shirt', 18, 24.99, 19.99, 1, 'Classic and versatile polo shirt', 'poloshirt.jpg', 'M', 'White', '2023-06-02', '2023-06-02'),
(27, 'P027', 'Cargo Pants', 12, 39.99, 34.99, 2, 'Functional and stylish cargo pants', 'cargopants.jpg', 'L', 'Olive', '2023-06-02', '2023-06-02'),
(28, 'P028', 'Sweatpants', 20, 29.99, 24.99, 1, 'Relaxed and comfortable sweatpants', 'sweatpants.jpg', 'XL', 'Gray', '2023-06-02', '2023-06-02'),
(29, 'P029', 'Sandals', 16, 19.99, 14.99, 3, 'Casual and comfortable sandals', 'sandals.jpg', '7', 'Black', '2023-06-02', '2023-06-02'),
(30, 'P030', 'Maxi Dress', 8, 49.99, 39.99, 1, 'Flowy and elegant maxi dress', 'maxidress.jpg', 'M', 'Purple', '2023-06-02', '2023-06-02'),
(31, 'P031', 'Oxford Shoes', 10, 69.99, 59.99, 3, 'Classic and sophisticated Oxford shoes', 'oxfordshoes.jpg', '8.5', 'Brown', '2023-06-02', '2023-06-02'),
(32, 'P032', 'Turtleneck', 12, 34.99, 28.99, 1, 'Cozy and stylish turtleneck sweater', 'turtleneck.jpg', 'L', 'Black', '2023-06-02', '2023-06-02'),
(33, 'P033', 'Cargo Shorts', 18, 24.99, 19.99, 2, 'Functional and trendy cargo shorts', 'cargoshorts.jpg', 'M', 'Camouflage', '2023-06-02', '2023-06-02'),
(34, 'P034', 'Running Jacket', 10, 59.99, 49.99, 5, 'Lightweight and water-resistant running jacket', 'runningjacket.jpg', 'XL', 'Yellow', '2023-06-02', '2023-06-02'),
(35, 'P035', 'Blouse', 8, 29.99, 24.99, 1, 'Fashionable blouse for any occasion', 'blouse.jpg', 'S', 'White', '2023-06-02', '2023-06-02'),
(36, 'P036', 'Chinos', 15, 34.99, 28.99, 2, 'Versatile and stylish chinos', 'chinos.jpg', 'M', 'Navy', '2023-06-02', '2023-06-02'),
(37, 'P037', 'Flip Flops', 20, 14.99, 9.99, 3, 'Comfortable and casual flip flops', 'flipflops.jpg', '9', 'Blue', '2023-06-02', '2023-06-02'),
(38, 'P038', 'Suit', 6, 149.99, 129.99, 5, 'Elegant and tailored suit', 'suit.jpg', 'L', 'Black', '2023-06-02', '2023-06-02'),
(39, 'P039', 'Hoodie', 12, 39.99, 29.99, 1, 'Warm and cozy hoodie', 'hoodie.jpg', 'XL', 'Gray', '2023-06-02', '2023-06-02'),
(40, 'P040', 'Leggings', 25, 19.99, 15.99, 2, 'Stretchy and comfortable leggings', 'leggings.jpg', 'S', 'Black', '2023-06-02', '2023-06-02'),
(41, 'P041', 'Running Shorts', 16, 24.99, 19.99, 3, 'Lightweight and breathable running shorts', 'runningshorts.jpg', 'M', 'Blue', '2023-06-02', '2023-06-02'),
(42, 'P042', 'Maxi Dress', 8, 49.99, 39.99, 1, 'Flowy and stylish maxi dress', 'maxidress.jpg', 'L', 'Pink', '2023-06-02', '2023-06-02'),
(43, 'P043', 'Ankle Boots', 10, 79.99, 69.99, 3, 'Trendy and versatile ankle boots', 'ankleboots.jpg', '8', 'Tan', '2023-06-02', '2023-06-02'),
(44, 'P044', 'Sweater', 14, 34.99, 28.99, 1, 'Cozy and warm sweater', 'sweater.jpg', 'S', 'Brown', '2023-06-02', '2023-06-02'),
(45, 'P045', 'Skirt', 6, 29.99, 24.99, 2, 'Stylish and fashionable skirt', 'skirt.jpg', 'M', 'Gray', '2023-06-02', '2023-06-02'),
(46, 'P046', 'Running Shoes', 18, 54.99, 44.99, 3, 'High-performance running shoes', 'runningshoes.jpg', '9', 'Red', '2023-06-02', '2023-06-02'),
(47, 'P047', 'Polo Shirt', 10, 24.99, 19.99, 1, 'Classic and timeless polo shirt', 'poloshirt.jpg', 'L', 'Blue', '2023-06-02', '2023-06-02'),
(48, 'P048', 'Cargo Pants', 12, 39.99, 34.99, 2, 'Durable and functional cargo pants', 'cargopants.jpg', 'M', 'Olive', '2023-06-02', '2023-06-02'),
(49, 'P049', 'Sweatpants', 20, 29.99, 24.99, 1, 'Comfortable and relaxed sweatpants', 'sweatpants.jpg', 'XL', 'Black', '2023-06-02', '2023-06-02'),
(50, 'P050', 'Sandals', 16, 19.99, 14.99, 3, 'Casual and comfortable sandals', 'sandals.jpg', '7', 'Brown', '2023-06-02', '2023-06-02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `password`) VALUES
(1, 'admin@amaqazi.com', 'amaqazi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productcategories`
--
ALTER TABLE `productcategories`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `productcategories` (`CategoryID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
