-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2024 at 05:19 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nongsanquenha`
--

-- --------------------------------------------------------

--
-- Table structure for table `baiviet`
--

CREATE TABLE `baiviet` (
  `id_bv` int(11) NOT NULL,
  `nguoidang` int(11) NOT NULL,
  `sanpham` int(11) NOT NULL,
  `tieude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaydang` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `caygiong`
--

CREATE TABLE `caygiong` (
  `id_cg` int(11) NOT NULL,
  `tencaygiong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `macaygiong` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nhasanxuat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaysanxuat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hansudung` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phuongphaptrong` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lienhe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaytao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhgia`
--

CREATE TABLE `danhgia` (
  `id_dg` int(11) NOT NULL,
  `nguoidang` int(11) NOT NULL,
  `sanpham` int(11) NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sosao` enum('1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '5',
  `ngaydang` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_dm` int(11) NOT NULL,
  `tendanhmuc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai` enum('hoatdong','khonghoatdong','','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'hoatdong',
  `ngaytao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`id_dm`, `tendanhmuc`, `trangthai`, `ngaytao`) VALUES
(1, 'Táo', 'hoatdong', '2024-03-13 03:04:41'),
(6, 'Bá dái bù dù', 'hoatdong', '2024-03-13 04:04:47'),
(7, 'Ai vậy', 'hoatdong', '2024-03-13 04:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `nhatkysanpham`
--

CREATE TABLE `nhatkysanpham` (
  `id_nk` int(11) NOT NULL,
  `sanpham` int(11) NOT NULL,
  `nguoidang` int(11) NOT NULL,
  `tennhatky` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chitiet` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoigiantao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(11) NOT NULL,
  `taikhoan` int(11) NOT NULL,
  `danhmuc` int(11) NOT NULL,
  `tensanpham` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `masanpham` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gia` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `xuatxu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maqr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `congdung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hdsd` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dieukienbaoquan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaytao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `trangthai` enum('dangchoxetduyet','daxetduyet','','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'dangchoxetduyet'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `taikhoan`, `danhmuc`, `tensanpham`, `masanpham`, `hinhanh`, `gia`, `xuatxu`, `maqr`, `mota`, `congdung`, `hdsd`, `dieukienbaoquan`, `ngaytao`, `trangthai`) VALUES
(1, 2, 1, 'Táo Newzeland', 'OHD-25550', '', 'Khoảng từ 110.000 - 150.000 vnđ/kg tùy từng thời điểm', 'Vĩnh Long', 'jakshdkjhad.png', 'Táo đẹp', 'Bổ sung vitamin ABCDEFGHIKLMNO', '25/12/2024', 'Bảo quan nơi có ánh tối', '2024-03-13 03:07:04', 'dangchoxetduyet'),
(2, 0, 0, '', '', NULL, '', '', '', '', '', '', '', '2024-03-13 03:37:48', 'dangchoxetduyet');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id_acc` int(11) NOT NULL,
  `hoten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matkhau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dienthoai` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinhdaidien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('Admin','Nongdan','Khachhang','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Khachhang',
  `trangthai` enum('hoatdong','khonghoatdong') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'hoatdong',
  `ngaytao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id_acc`, `hoten`, `email`, `matkhau`, `dienthoai`, `diachi`, `hinhdaidien`, `role`, `trangthai`, `ngaytao`) VALUES
(1, 't', 't@gmail.com', 'e358efa489f58062f10dd7316b65649e', '1', NULL, NULL, 'Admin', 'hoatdong', '2024-03-07 16:38:45'),
(2, 'Huỳnh Trần Quốc Tiến', 'followme403@gmail.com', '7ab64083d8ff71645fd0bb3ce7e73418', '0795972514', 'Vĩnh Long', NULL, 'Nongdan', 'hoatdong', '2024-03-07 16:51:16'),
(3, 'Nguyễn Hoàng Minh', 'minhok3699@gmail.com', '73882ab1fa529d7273da0db6b49cc4f3', '0983761510', 'Ấp Hiếu Trung A, Xã Hiếu Nghĩa, Vũng Liêm', NULL, 'Khachhang', 'hoatdong', '2024-03-07 17:08:47');

-- --------------------------------------------------------

--
-- Table structure for table `vanchuyen`
--

CREATE TABLE `vanchuyen` (
  `id_vc` int(11) NOT NULL,
  `tendonvi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giayphepkinhdoanh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giaykiemdinh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giaychungnhan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thongtinchung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vungsanxuat`
--

CREATE TABLE `vungsanxuat` (
  `id_vung` int(11) NOT NULL,
  `mavung` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nguoidang` int(11) NOT NULL,
  `sdt` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`id_bv`),
  ADD UNIQUE KEY `nguoidang` (`nguoidang`),
  ADD UNIQUE KEY `sanpham` (`sanpham`);

--
-- Indexes for table `caygiong`
--
ALTER TABLE `caygiong`
  ADD PRIMARY KEY (`id_cg`);

--
-- Indexes for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`id_dg`),
  ADD UNIQUE KEY `nguoidang` (`nguoidang`),
  ADD UNIQUE KEY `sanpham` (`sanpham`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_dm`);

--
-- Indexes for table `nhatkysanpham`
--
ALTER TABLE `nhatkysanpham`
  ADD PRIMARY KEY (`id_nk`),
  ADD UNIQUE KEY `sanpham` (`sanpham`),
  ADD UNIQUE KEY `nguoidang` (`nguoidang`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD UNIQUE KEY `taikhoan` (`taikhoan`),
  ADD UNIQUE KEY `danhmuc` (`danhmuc`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id_acc`);

--
-- Indexes for table `vanchuyen`
--
ALTER TABLE `vanchuyen`
  ADD PRIMARY KEY (`id_vc`);

--
-- Indexes for table `vungsanxuat`
--
ALTER TABLE `vungsanxuat`
  ADD PRIMARY KEY (`id_vung`),
  ADD UNIQUE KEY `nguoidang` (`nguoidang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `id_bv` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `caygiong`
--
ALTER TABLE `caygiong`
  MODIFY `id_cg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `id_dg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_dm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `nhatkysanpham`
--
ALTER TABLE `nhatkysanpham`
  MODIFY `id_nk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id_acc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vanchuyen`
--
ALTER TABLE `vanchuyen`
  MODIFY `id_vc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vungsanxuat`
--
ALTER TABLE `vungsanxuat`
  MODIFY `id_vung` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
