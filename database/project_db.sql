-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 26, 2020 lúc 03:11 AM
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
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `BannerId` int(11) NOT NULL,
  `image` varchar(225) DEFAULT NULL,
  `content` varchar(225) DEFAULT NULL,
  `link` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`BannerId`, `image`, `content`, `link`) VALUES
(1, 'img/banner/S20-800-300-800x300-3.png', 'Galaxy S20 series<br>Giảm Ngay 4 Triệu', '#'),
(2, 'img/banner/reno3-800-300-800x300.png', 'Mua OPPO Reno3<br>Tặng Tiền Cước 500.000đ', '#'),
(3, 'img/banner/60749522-6C82-4FF3-BEF0-76FD21BB4D25-800x300.png', 'iPhone 7 Plus<br>Giảm Online 3 Triệu', '#'),
(4, 'img/banner/800-300-800x300-27.png', 'Redmi 9 4GB|64GB<br>Giảm Ngay 300 Ngàn', '#'),
(5, 'img/banner/800-300-800x300-18.png', 'Đồng Hồ Thời Trang<br> Giảm Ngay 20%', '#'),
(6, 'img/banner/800-300-800x300-15.png', 'Realme 6 4GB|128GB<br>Tặng Cước 300 Ngàn', '#'),
(7, 'img/banner/800-300-800x300-12.png', 'Lễ Hội SmartWatch<br>Giảm Đến 40%', '#'),
(8, 'img/banner/800-300-800x300-1.png', 'Phụ Kiện Online<br>Đồng Giá 199.000đ', '#');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `CustomID` int(11) NOT NULL,
  `FullName` varchar(225) DEFAULT NULL,
  `Gender` varchar(10) DEFAULT NULL,
  `PhoneNumber` int(11) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Address` varchar(225) DEFAULT NULL,
  `NoteCart` varchar(225) NOT NULL,
  `TotalPay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`CustomID`, `FullName`, `Gender`, `PhoneNumber`, `Email`, `Address`, `NoteCart`, `TotalPay`) VALUES
(1, 'Nguyễn Văn Khảnh', 'nam', 389021327, '', '', '', 16280000),
(2, 'Nguyễn Văn Khảnh', 'nam', 389021327, '', '', '', 169950000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detail`
--

CREATE TABLE `detail` (
  `DetailId` int(11) NOT NULL,
  `Display` varchar(50) DEFAULT NULL,
  `OS` varchar(50) DEFAULT NULL,
  `RearCamera` varchar(225) DEFAULT NULL,
  `FrontCamera` varchar(225) DEFAULT NULL,
  `CPU` varchar(50) DEFAULT NULL,
  `RAM` varchar(50) DEFAULT NULL,
  `ROM` varchar(50) DEFAULT NULL,
  `battery` varchar(50) DEFAULT NULL,
  `ProductId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `detail`
--

INSERT INTO `detail` (`DetailId`, `Display`, `OS`, `RearCamera`, `FrontCamera`, `CPU`, `RAM`, `ROM`, `battery`, `ProductId`) VALUES
(1, 'Super AMOLED, 6.5\", Full HD+', 'Android 10', 'Chính 48 MP & Phụ 12 MP, 5 MP, 5 MP', '32 MP', 'Exynos 9611 8 nhân', '8GB', '128GB', '4000 mAh, có sạc nhanh', 1),
(2, 'AMOLED, 6.4\", Full HD+', 'Android 10', 'Chính 48 MP & Phụ 13 MP, 8 MP, 2 MP', '44 MP', 'MediaTek Helio P90 8 nhân', '8 GB', '128 GB', '4025 mAh, có sạc nhanh', 2),
(3, 'OLED, 6.5\", Super Retina XDR', 'iOS 13', '3 camera 12 MP', '12 MP', 'Apple A13 Bionic 6 nhân', '4GB', '64GB', '3969 mAh, có sạc nhanh', 3),
(4, 'IPS LCD, 6.5\", HD+', 'Android 9.0 (Pie)', 'Chính 13 MP & Phụ 8 MP, 2 MP', '8MP', 'Snapdragon 632 8 nhân', '4GB', '64GB', '5000 mAh, có sạc nhanh', 4),
(5, '	AMOLED, 6.5\", Full HD+', 'Android 9.0 (Pie)', 'Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP', '16MP', 'MediaTek Helio P70 8 nhân', '8GB', '128GB', '4000 mAh, có sạc nhanh', 5),
(6, 'Super AMOLED, 6.7\", Full HD+', 'Android 10', 'Chính 48 MP & Phụ 12 MP, 5 MP', '32 MP', 'Snapdragon 855 8 nhân', '8GB', '128GB', '4500 mAh, có sạc nhanh', 6),
(7, 'IPS LCD, 6.5\", Full HD+', 'Android 10', 'Chính 64 MP & Phụ 8 MP, 2 MP, 2 MP', '16 MP', 'Mediatek Helio G90T 8 nhân', '4GB', '128GB', '4300 mAh, có sạc nhanh', 7),
(8, 'IPS LCD, 6.35\", HD+', 'Android 9.0 (Pie)', 'Chính 13 MP & Phụ 8 MP, 2 MP', '8MP', 'Snapdragon 665 8 nhân', '4GB', '64GB', '5000 mAh, có sạc nhanh', 8),
(9, 'LED-backlit IPS LCD, 5.5\", Retina HD', 'iOS 12', 'Chính 12 MP & Phụ 12 MP', '7 MP', 'Apple A11 Bionic 6 nhân', '3GB', '64GB', '2691 mAh, có sạc nhanh', 9),
(10, 'AMOLED, 6.4\", Full HD+', 'ColorOS 6.1 (Android 9.0)', 'Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP', '16MP', 'MediaTek Helio P70 8 nhân', '8GB', '128GB', '4025 mAh, có sạc nhanh', 10);

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
  `Quantity` int(11) DEFAULT NULL,
  `TotalPay` int(11) DEFAULT NULL,
  `CustomID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`OrderID`, `Product`, `Image`, `PriceUnit`, `PricePromote`, `Quantity`, `TotalPay`, `CustomID`) VALUES
(1, 'Samsung Galaxy A51 (8GB/128GB)', 'img/product/smartphones/samsung-galaxy-a51-8gb-blue-600x600-400x400.jpg', 8390000, 7790000, 1, 16280000, 1),
(2, 'OPPO Reno3', 'img/product/smartphones/oppo-reno3-trang-600x600-400x400.jpg', 8990000, 8490000, 1, 16280000, 1),
(3, 'iPhone 11 Pro Max 64GB', 'img/product/smartphones/iphone-11-pro-max-green-400x400.jpg', 33990000, 0, 5, 169950000, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotion`
--

CREATE TABLE `promotion` (
  `PromotionId` int(11) NOT NULL,
  `Promo1` varchar(225) DEFAULT NULL,
  `Promo2` varchar(225) DEFAULT NULL,
  `Promo3` varchar(225) DEFAULT NULL,
  `Promo4` varchar(225) DEFAULT NULL,
  `Promo5` varchar(225) DEFAULT NULL,
  `ProductId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `promotion`
--

INSERT INTO `promotion` (`PromotionId`, `Promo1`, `Promo2`, `Promo3`, `Promo4`, `Promo5`, `ProductId`) VALUES
(1, 'Tặng tiền cước 400.000đ (áp dụng đặt và nhận hàng từ 16 - 30/6) (đã trừ vào giá)', 'Phiếu mua hàng Samsung 250.000đ (áp dụng đặt và nhận hàng từ 16 - 30/6)', 'Tặng 2 suất mua Đồng hồ thời trang giảm 40% (không áp dụng thêm khuyến mãi khác)', NULL, NULL, 1),
(2, 'Tặng tiền cước 500.000đ (đã trừ vào giá)', 'Tặng 2 suất mua Đồng hồ thời trang giảm 40% (không áp dụng thêm khuyến mãi khác)', NULL, NULL, NULL, 2),
(3, 'Giảm ngay 2 triệu *', 'Tặng 2 suất mua Đồng hồ thời trang giảm 40% (không áp dụng thêm khuyến mãi khác)', NULL, NULL, NULL, 3),
(4, 'Tặng tiền cước 200.000đ (áp dụng đặt và nhận hàng từ 20 - 30/6) (đã trừ vào giá)', 'Tặng thêm 01 tháng bảo hành chính hãng', 'Tặng 2 suất mua Đồng hồ thời trang giảm 40% (không áp dụng thêm khuyến mãi khác)', NULL, NULL, 4),
(5, 'Tặng tiền cước 1.5 triệu', 'Tặng 2 suất mua Đồng hồ thời trang giảm 40% (không áp dụng thêm khuyến mãi khác)', NULL, NULL, NULL, 5),
(6, 'Tặng tiền cước 1.5 triệu (áp dụng đặt và nhận hàng từ 22 - 25/6) (đã trừ vào giá)', 'Trả góp 0% thẻ tín dụng', 'Tặng 2 suất mua Đồng hồ thời trang giảm 40% (không áp dụng thêm khuyến mãi khác)', 'Tặng suất mua đồng hồ Samsung Active 2 giảm đến 3.000.000đ (Đồng hồ mua kèm không áp dụng KM khác)', NULL, 6),
(7, 'Tặng tiền cước 300.000đ (áp dụng đặt và nhận hàng từ 17 - 30/6) (đã trừ vào giá)', 'Tặng 2 suất mua Đồng hồ thời trang giảm 40% (không áp dụng thêm khuyến mãi khác)', NULL, NULL, NULL, 7),
(8, 'Tặng tiền cước 200.000đ (đã trừ vào giá)', 'Tặng 2 suất mua Đồng hồ thời trang giảm 40% (không áp dụng thêm khuyến mãi khác)', NULL, NULL, NULL, 8),
(9, 'Giảm ngay 500.000đ *', 'Tặng 2 suất mua Đồng hồ thời trang giảm 40% (không áp dụng thêm khuyến mãi khác)', NULL, NULL, NULL, 9),
(10, 'Tặng tiền cước 1 triệu (đã trừ vào giá)', 'Tặng 2 suất mua Đồng hồ thời trang giảm 40% (không áp dụng thêm khuyến mãi khác)', NULL, NULL, NULL, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `smartphone`
--

CREATE TABLE `smartphone` (
  `ProductId` int(11) NOT NULL,
  `ProductName` varchar(225) DEFAULT NULL,
  `ProductImage` varchar(225) DEFAULT NULL,
  `PriceCurrent` int(11) DEFAULT NULL,
  `PricePromo` varchar(225) DEFAULT NULL,
  `Brand` varchar(225) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `GroupProduct` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `smartphone`
--

INSERT INTO `smartphone` (`ProductId`, `ProductName`, `ProductImage`, `PriceCurrent`, `PricePromo`, `Brand`, `Quantity`, `GroupProduct`) VALUES
(1, 'Samsung Galaxy A51 (8GB/128GB)', 'img/product/smartphones/samsung-galaxy-a51-8gb-blue-600x600-400x400.jpg', 8390000, '7790000', 'Samsung', 999, 'Điện thoại'),
(2, 'OPPO Reno3', 'img/product/smartphones/oppo-reno3-trang-600x600-400x400.jpg', 8990000, '8490000', 'OPPO', 999, 'Điện thoại'),
(3, 'iPhone 11 Pro Max 64GB', 'img/product/smartphones/iphone-11-pro-max-green-400x400.jpg', 33990000, '0', 'iPhone (Apple)', 999, 'Điện thoại'),
(4, 'Vsmart Joy 3 (4GB/64GB)', 'img/product/smartphones/vsmart-joy-3-4gb-den-600x600-400x400.jpg', 3290000, '3090000', 'Vsmart', 999, 'Điện thoại'),
(5, 'OPPO Reno2 F', 'img/product/smartphones/oppo-reno2-f-600x600-200x200.jpg', 8990000, '0', 'OPPO', 999, 'Điện thoại'),
(6, 'Samsung Galaxy S10 Lite', 'img/product/smartphones/samsung-galaxy-s10-lite-blue-thumb-400x400.jpg', 14990000, '12990000', 'Samsung', 999, 'Điện thoại'),
(7, 'Realme 6 (4GB/128GB)', 'img/product/smartphones/realme-6-xanh-600x600-400x400.jpg', 5990000, '5690000', 'Realme', 999, 'Điện thoại'),
(8, 'Vivo U10', 'img/product/smartphones/vivo-u10-1-400x400.jpg', 3990000, '3790000', 'Vivo', 999, 'Điện thoại'),
(9, 'iPhone 8 Plus 64GB', 'img/product/smartphones/iphone-8-plus-hh-600x600-400x400.jpg', 15990000, '0', 'iPhone (Apple)', 999, 'Điện thoại'),
(10, 'OPPO A91', 'img/product/smartphones/oppo-a91-trang-600x600-600x600.jpg', 6990000, '5990000', 'OPPO', 999, 'Điện thoại');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`BannerId`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomID`);

--
-- Chỉ mục cho bảng `detail`
--
ALTER TABLE `detail`
  ADD PRIMARY KEY (`DetailId`),
  ADD KEY `ProductId` (`ProductId`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustomID` (`CustomID`);

--
-- Chỉ mục cho bảng `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`PromotionId`),
  ADD KEY `ProductId` (`ProductId`);

--
-- Chỉ mục cho bảng `smartphone`
--
ALTER TABLE `smartphone`
  ADD PRIMARY KEY (`ProductId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `BannerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `detail`
--
ALTER TABLE `detail`
  MODIFY `DetailId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `promotion`
--
ALTER TABLE `promotion`
  MODIFY `PromotionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `smartphone`
--
ALTER TABLE `smartphone`
  MODIFY `ProductId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `detail`
--
ALTER TABLE `detail`
  ADD CONSTRAINT `detail_ibfk_1` FOREIGN KEY (`ProductId`) REFERENCES `smartphone` (`ProductId`),
  ADD CONSTRAINT `detail_ibfk_2` FOREIGN KEY (`ProductId`) REFERENCES `smartphone` (`ProductId`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CustomID`) REFERENCES `customer` (`CustomID`);

--
-- Các ràng buộc cho bảng `promotion`
--
ALTER TABLE `promotion`
  ADD CONSTRAINT `promotion_ibfk_1` FOREIGN KEY (`ProductId`) REFERENCES `smartphone` (`ProductId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
