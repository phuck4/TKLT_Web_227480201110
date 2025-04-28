-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3307
-- Thời gian đã tạo: Th4 28, 2025 lúc 08:43 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hosonhanvien`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lylich`
--

CREATE TABLE `lylich` (
  `manv` varchar(10) NOT NULL,
  `tennv` varchar(50) NOT NULL,
  `chucvu` varchar(100) NOT NULL,
  `sdt` varchar(10) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `luong` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lylich`
--

INSERT INTO `lylich` (`manv`, `tennv`, `chucvu`, `sdt`, `mail`, `luong`) VALUES
('001', 'Nakroth', 'Chủ tịch Hội đồng quản trị', '2000000', '', 23000.00),
('1', 'Erin', 'Thư ký', '0987654321', 'erin@gmail.com', 50000000.00),
('NV001', 'Kirito', 'Trưởng phòng tài chính', '0123456789', 'kirito@gmail.com', 5000000.00),
('NV003', 'Lệ Phi Vũ', 'Trưởng phòng tài chính', '0222222222', 'lephivu@gmail.com', 10000000.00);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `lylich`
--
ALTER TABLE `lylich`
  ADD PRIMARY KEY (`manv`),
  ADD UNIQUE KEY `mail` (`mail`),
  ADD UNIQUE KEY `sdt` (`sdt`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
