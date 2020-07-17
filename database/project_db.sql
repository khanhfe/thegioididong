-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 17, 2020 lúc 07:04 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `Product` varchar(225) DEFAULT NULL,
  `Image` varchar(225) NOT NULL,
  `PriceUnit` int(11) DEFAULT NULL,
  `PricePromote` int(11) DEFAULT NULL,
  `Color` varchar(50) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `TotalPay` int(11) DEFAULT NULL,
  `OrderDate` varchar(225) NOT NULL,
  `EstimatedDeliveryTime` varchar(225) NOT NULL,
  `CustomID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`OrderID`, `Product`, `Image`, `PriceUnit`, `PricePromote`, `Color`, `Quantity`, `TotalPay`, `OrderDate`, `EstimatedDeliveryTime`, `CustomID`) VALUES
(1, 'iPhone 11 Pro Max 64GB', 'img/product/iphone-11-pro-max-green-400x400.jpg', 33990000, 31990000, 'Bạc', 1, 107470000, 'Friday, 2020-07-17', '11:06:37 , Saturday, 2020-07-18', 1),
(2, 'iPad Pro 12.9 inch Wifi 128GB (2020)', 'img/product/ipad-pro-12-9-inch-wifi-128gb-2020-xam-400x460-1-400x460.png', 27990000, 27490000, 'Xám', 1, 107470000, 'Friday, 2020-07-17', '11:06:37 , Saturday, 2020-07-18', 1),
(3, 'Apple MacBook Pro Touch 2020', 'img/product/apple-macbook-pro-touch-2020-i5-mwp72sa-a-221914-600x600.jpg', 47990000, 0, 'bạc', 1, 107470000, 'Friday, 2020-07-17', '11:06:37 , Saturday, 2020-07-18', 1),
(4, 'Samsung Galaxy A51(8GB/128GB) ', 'img/product/samsung-galaxy-a51-8gb-blue-600x600-400x400.jpg', 8990000, 8490000, 'Xanh ngọc', 5, 142450000, 'Friday, 2020-07-17', '11:08:19 , Saturday, 2020-07-18', 2),
(5, 'Samsung Galaxy Fold', 'img/product/samsung-galaxy-fold-black-400x400.jpg', 50000000, 0, 'Đen', 2, 142450000, 'Friday, 2020-07-17', '11:08:19 , Saturday, 2020-07-18', 2),
(6, 'Realme 6i', 'img/product/realme-6i-(11).jpg', 4990000, 0, 'Trắng', 1, 8980000, 'Friday, 2020-07-17', '11:53:01 , Saturday, 2020-07-18', 3),
(7, 'Vsmart Active 3 (6GB/64GB)', 'img/product/vsmart-active-3-6gb-emerald-green-600x600-600x600.jpg', 3990000, 0, 'Tím', 1, 8980000, 'Friday, 2020-07-17', '11:53:01 , Saturday, 2020-07-18', 3),
(8, 'Vsmart Active 3 (6GB/64GB)', 'img/product/vsmart-active-3-6gb-emerald-green-600x600-600x600.jpg', 3990000, 0, 'Tím', 5, 19950000, 'Friday, 2020-07-17', '11:55:34 , Saturday, 2020-07-18', 4);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustomID` (`CustomID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CustomID`) REFERENCES `customer` (`CustomID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
