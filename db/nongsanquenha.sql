-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2024 at 06:20 PM
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
-- Table structure for table `add_logo`
--

CREATE TABLE `add_logo` (
  `id` int(10) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_logo`
--

INSERT INTO `add_logo` (`id`, `img`) VALUES
(3, 'logo-test.png');

-- --------------------------------------------------------

--
-- Table structure for table `baiviet`
--

CREATE TABLE `baiviet` (
  `id_bv` int(11) NOT NULL,
  `nguoidang` int(11) NOT NULL,
  `tieude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaydang` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `baiviet`
--

INSERT INTO `baiviet` (`id_bv`, `nguoidang`, `tieude`, `noidung`, `hinhanh`, `ngaydang`) VALUES
(3, 2, '\r\nTiêu dùng nông sản sạch: Một xu hướng bền vững đang lan tỏa', 'Trong thời đại hiện đại ngày nay, việc chú trọng vào sức khỏe và an toàn thực phẩm đang trở thành một trong những ưu tiên hàng đầu của mọi người. Trong bối cảnh đó, nông sản sạch - những sản phẩm được trồng trọt và chế biến một cách tự nhiên, không sử dụng hóa chất độc hại - đang thu hút sự quan tâm và lựa chọn ngày càng nhiều từ người tiêu dùng.\r\n\r\nNông sản sạch không chỉ đảm bảo về mặt an toàn thực phẩm mà còn mang lại nhiều lợi ích cho sức khỏe của con người và môi trường. Khi tiêu dùng nông sản sạch, người dùng có thể yên tâm về nguồn gốc, cách trồng trọt và chế biến của sản phẩm mình sử dụng, từ đó giảm thiểu rủi ro về các chất độc hại có thể gây hại cho sức khỏe. Đồng thời, việc ủng hộ nông sản sạch cũng đồng nghĩa với việc hỗ trợ các nông dân và nhà sản xuất áp dụng các phương pháp canh tác và chế biến bền vững, thân thiện với môi trường.', 'M1.jpg', '2024-04-05 06:54:33'),
(5, 2, 'Website truy xuất nguồn gốc nông sản sạch', 'Nhằm giúp người nông dân, hợp tác xã, doanh nghiệp, các tổ chức và cá nhân trong và ngoài tỉnh đưa nông sản, sản phẩm lên website để tăng cường công tác quảng bá sản phẩm; đồng thời xây dựng vùng nguyên liệu nông sản theo chuỗi sản xuất gắn với truy xuất nông sản đáp ứng thị trường trong và ngoài nước trong thời gian tới.\r\nTrang web truy xuất nguồn gốc \"Nông sản Quê Nhà\" bắt đầu được vận hành bởi sinh viên Trường Đại học Công nghiệp Thành phố Hồ Chí Minh. Tất cả các tổ chức, cá nhân đều có thể đăng ký tài khoản tham gia vào website này. Một số tính năng cơ bản của website như sau:\r\n- Tất cả các tổ chức, cá nhân đã đăng ký tài khoản trên website này đều có thể ghi nhật ký điện tử gắn với việc truy xuất nguồn gốc sản phẩm.\r\n- Mỗi tổ chức, cá nhân có thể tạo mã truy xuất cho sản phẩm của mình thông qua mã QR Code, thông quá đó đưa sản phẩm lên website để tiếp cận đơn vị thu mua sản phẩm được nhiều hơn. Sản phẩm đến tay người tiêu dùng có thể kiểm tra được nguồn gốc sản phẩm khi quét mã QR - Code qua điện thoại thông minh.\r\n- Xây dựng vùng nguyên liệu từng cây trồng, vật nuôi gắn với truy xuất vị trí địa lý để các doanh nghiệp có thể liên hệ hợp tác nhiều hơn.\r\n- Các tổ chức có thể tạo ra các thành viên trực thuộc từ đó giúp cho công tác quản lý cũng như điều hành công việc được tốt hơn.\r\n- Có thể liên kết với các tổ chức chứng nhận các tiêu chuẩn sản phẩm (VietGAP, GlobalGAP, ...) được dễ dàng hơn, ...\r\nĐể đăng ký tài khoản tham gia Sàn giao dịch này, bà con nông dân, các tổ chức, cá nhân có thể vào trang Web với địa chỉ sau: https://nongsanquenha.000webhostapp.com\r\nHoặc liên hệ số điện thoại bên dưới để được hướng dẫn.\r\nMọi chi tiết liên hệ: Ông Huỳnh Quốc Tiến - Nhà quản trị Website Truy xuất nguồn gốc nông sản sạch. Điện thoại: 0795972514, Email: huynhtien050602@gmail.com.\r\nChúc quý bà con nông dân, các tổ chức, cá nhân thành công!\r\nTrân trọng.', 'gioithieu.png', '2024-04-05 07:46:21');

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
-- Table structure for table `customer_feedback`
--

CREATE TABLE `customer_feedback` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `pdt_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_feedback`
--

INSERT INTO `customer_feedback` (`id`, `user_id`, `user_name`, `pdt_id`, `comment`, `comment_date`) VALUES
(1, 1, 'saiful', 4, 'This product is very good', '2021-09-11'),
(4, 5, 'karim', 6, 'Good product', '2021-09-15');

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
(6, 'Trái cây', 'hoatdong', '2024-03-13 04:04:47'),
(8, 'Rau', 'hoatdong', '2024-03-14 04:16:50'),
(9, 'Nho', 'hoatdong', '2024-03-17 01:50:24'),
(10, 'Ổi', 'hoatdong', '2024-03-19 09:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc_dn`
--

CREATE TABLE `danhmuc_dn` (
  `id_dmdn` int(11) NOT NULL,
  `tendanhnghiep` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `danhmuc_dn`
--

INSERT INTO `danhmuc_dn` (`id_dmdn`, `tendanhnghiep`) VALUES
(1, 'Nhà cung cấp giống'),
(2, 'Nhà sản xuất'),
(3, 'Nhà vận chuyển'),
(4, 'Nhà xuất khẩu'),
(5, 'Nhà nhập khẩu'),
(6, 'Nhà phân phối'),
(7, 'Nhà bán lẻ'),
(8, 'Công ty dịch vụ'),
(9, 'Cơ quan quản lý'),
(10, 'Cơ quan kiểm định'),
(11, 'Cơ quan chứng nhận');

-- --------------------------------------------------------

--
-- Table structure for table `doanhnghiep`
--

CREATE TABLE `doanhnghiep` (
  `id_dn` int(11) NOT NULL,
  `danhmuc_dn` int(11) NOT NULL,
  `nguoidaidien` int(11) DEFAULT NULL,
  `tendoanhnghiep` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdt` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Địa chỉ` text COLLATE utf8mb4_unicode_ci,
  `masothue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `giayphepkinhdoanh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `giaychungnhan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `giaykiemdinh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thongtinchung` text COLLATE utf8mb4_unicode_ci,
  `ngaytao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `header_info`
--

CREATE TABLE `header_info` (
  `id` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `tweeter` varchar(500) NOT NULL,
  `fb_link` varchar(500) NOT NULL,
  `pinterest` varchar(500) NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `header_info`
--

INSERT INTO `header_info` (`id`, `email`, `tweeter`, `fb_link`, `pinterest`, `phone`) VALUES
(10, 'followme403@gmail.com', 'https://twitter.com/', 'https://facebook.com/', 'https://pinerest.com/', '0795972514');

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
  `caygiong` int(11) NOT NULL,
  `vungsanxuat` int(11) NOT NULL,
  `tensanpham` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `masanpham` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gia` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xuatxu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maqr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci,
  `congdung` text COLLATE utf8mb4_unicode_ci,
  `hdsd` text COLLATE utf8mb4_unicode_ci,
  `dieukienbaoquan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaytao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `trangthai` enum('dangchoxetduyet','daxetduyet','tuchoi') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'dangchoxetduyet'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `taikhoan`, `danhmuc`, `caygiong`, `vungsanxuat`, `tensanpham`, `masanpham`, `hinhanh`, `gia`, `xuatxu`, `maqr`, `mota`, `congdung`, `hdsd`, `dieukienbaoquan`, `ngaytao`, `trangthai`) VALUES
(1, 2, 1, 0, 0, 'Táo Newzeland', 'OHD-25550', '2901141.jpg', 'Từ 110.000 - 150.000 vnđ/kg', 'Vĩnh Long', 'jakshdkjhad.png', 'Táo đẹp', 'Bổ sung vitamin ABCDEFGHIKLMNO', '25/12/2024', 'Bảo quan nơi có ánh tối', '2024-03-13 03:07:04', 'daxetduyet'),
(5, 2, 10, 1, 0, 'Ổi Đài Loan', 'NSQN-6589860', 'oi-dai-loan.jpg', '10.000 - 12.000đ/kg', 'Ấp Hiếu Trung A, Xã Hiếu Nghĩa, Vũng Liêm, Vĩnh Long', 'aaa', 'Ăn tươi khi thu hoạch', 'Có tác dụng hạ huyết áp, và giảm cholesterol trong máu.', 'Dùng ăn tươi', 'Bảo quản nơi khô mát', '2024-03-19 09:57:14', 'daxetduyet'),
(6, 2, 10, 1, 0, 'Ổi trung quốc', 'NSQN-6589822', 'oi-dai-loan.jpg', NULL, NULL, NULL, 'Giống ổi Lê có nguồn gốc từ Đài Loan, được trồng ở Việt Nam mấy năm gần đây, với đặc điểm sinh trưởng và phát triển tốt, quả mẫu mã đẹp, chất lượng có thể ngon nhất trong các loại ổi hiện có. Hiện nay đã có nhiều nhà vườn phát triển với quy mô lớn đem lại hiệu quả kinh tế cao, nhất là những nhà vườn ở vùng Bến cát - Bình Dương. Giống ổi Lê Đài Loan có năng suất cao ngay từ năm thứ nhất đã đạt trên 10tấn quả/ha cho thu nhập hàng trăm triệu đồng/ha đến năm thứ 3 đã lên tới 60 tấn quả/ha.', 'Trồng cây ổi trong vườn cây có múi sẽ tạo nên hiệu ứng “xua đuổi được rầy chổng cánh là tác nhân gây bệnh vàng lá Greening”. Trên cơ sở đó người ta có thể hình thành hệ sinh thái mới thật sự bền vững và kinh tế để đầu tư trồng cây có múi (không bị nhiễm bệnh vàng lá Greening) và xây dựng qui trình công nghệ sản xuất cây có múi sạch bệnh ngoài trời (không bị rầy chổng cánh xâm nhập gây hại).\r\n\r\nTrái ổi Nữ Hoàng có chất lượng ngon nhất hiện nay. Trái chủ yếu dùng để ăn tươi, hay làm mứt, sấy khô, chế biến nước giải khát, thạch jelly... Đây là loại trái nhiều chất bổ dưỡng, dễ tiêu hoá, giàu Vitamine C nhưng nghèo năng lượng nên là loại trái cây rất tốt cho người không muốn tăng cân hay cần giảm cân. Với nữ giới ăn ổi thường xuyên sẽ giúp cho làn da mịn màng và xinh đẹp hơn.\r\n\r\nDịch chiết các bộ phận của cây ổi như búp non, lá non, vỏ rễ và vỏ thân còn được dùng làm thuốc chửa bệnh nhiễm vi khuẩn và siêu vi khuẩn. Ăn ổi thường xuyên giúp hạ đường huyết, phòng trị đái tháo đường, cải thiện chức năng tim mạch...', 'Dùng tươi', 'Bảo quản nơi khô ráo thoáng mát', '2024-03-19 16:11:12', 'daxetduyet');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `first_line` varchar(255) NOT NULL,
  `second_line` varchar(255) NOT NULL,
  `third_line` varchar(255) NOT NULL,
  `btn_left` varchar(25) NOT NULL,
  `btn_right` varchar(25) NOT NULL,
  `slider_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `first_line`, `second_line`, `third_line`, `btn_left`, `btn_right`, `slider_img`) VALUES
(1, 'Website', 'Truy xuất nguồn gốc nông sản sạch', 'Áp dụng QR CODE', 'Khám phá ngay', '', 'green-slide-01.jpg'),
(2, 'Nông sản sạch', 'Trải nghiệm nông sản nguyên chất', '100% từ thiên nhiên', 'Xem ngay', '', 'green-slide-02.jpg');

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
  `role` enum('Admin','Nongdan','Khachhang') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Khachhang',
  `trangthai` enum('hoatdong','khonghoatdong') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'hoatdong',
  `ngaytao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id_acc`, `hoten`, `email`, `matkhau`, `dienthoai`, `diachi`, `hinhdaidien`, `role`, `trangthai`, `ngaytao`) VALUES
(1, 'Admin', 't@gmail.com', 'e358efa489f58062f10dd7316b65649e', '1', NULL, 'WIN_20240123_22_25_18_Pro.jpg', 'Admin', 'hoatdong', '2024-03-07 16:38:45'),
(2, 'Huỳnh Quốc Tiến', 'followme403@gmail.com', '7ab64083d8ff71645fd0bb3ce7e73418', '0795972514', 'Vĩnh Long', '2a2e42361e7fb321ea6e.jpg', 'Nongdan', 'hoatdong', '2024-03-07 16:51:16'),
(3, 'Nguyễn Hoàng Minh', 'minhok3699@gmail.com', '73882ab1fa529d7273da0db6b49cc4f3', '0983761510', 'Ấp Hiếu Trung A, Xã Hiếu Nghĩa, Vũng Liêm', '334673087_204077125634904_7023339784759206835_n.jpg', 'Khachhang', 'hoatdong', '2024-03-07 17:08:47');

-- --------------------------------------------------------

--
-- Table structure for table `vungsanxuat`
--

CREATE TABLE `vungsanxuat` (
  `id_vung` int(11) NOT NULL,
  `nguoidang` int(11) NOT NULL,
  `tenvung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mavung` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dientich` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thongtin` text COLLATE utf8mb4_unicode_ci,
  `ngaytao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vungsanxuat`
--

INSERT INTO `vungsanxuat` (`id_vung`, `nguoidang`, `tenvung`, `mavung`, `hinhanh`, `sdt`, `diachi`, `dientich`, `thongtin`, `ngaytao`) VALUES
(2, 2, 'Mô hình trồng Mít ruột đỏ theo tiêu chuẩn GlobalGAP gắn với liên kết chuỗi nâng cao giá trị sản phẩm', 'VL-2023-Mít ruột đỏ', 'daafe7ca3be567c74a8bcb192de89b8d.jpg', ' 093844954', 'Ấp Hiếu Trung A, Xã Hiếu Nghĩa, Huyện Vũng Liêm, Vĩnh Long', '15 ha', NULL, '2024-03-16 08:04:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_logo`
--
ALTER TABLE `add_logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`id_bv`),
  ADD KEY `nguoidang` (`nguoidang`) USING BTREE;

--
-- Indexes for table `caygiong`
--
ALTER TABLE `caygiong`
  ADD PRIMARY KEY (`id_cg`);

--
-- Indexes for table `customer_feedback`
--
ALTER TABLE `customer_feedback`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `danhmuc_dn`
--
ALTER TABLE `danhmuc_dn`
  ADD PRIMARY KEY (`id_dmdn`);

--
-- Indexes for table `doanhnghiep`
--
ALTER TABLE `doanhnghiep`
  ADD PRIMARY KEY (`id_dn`),
  ADD KEY `danhmuc_dn` (`danhmuc_dn`),
  ADD KEY `nguoidaidien` (`nguoidaidien`);

--
-- Indexes for table `header_info`
--
ALTER TABLE `header_info`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `taikhoan` (`taikhoan`) USING BTREE,
  ADD KEY `danhmuc` (`danhmuc`) USING BTREE,
  ADD KEY `caygiong` (`caygiong`),
  ADD KEY `vungsanxuat` (`vungsanxuat`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id_acc`);

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
-- AUTO_INCREMENT for table `add_logo`
--
ALTER TABLE `add_logo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `id_bv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id_dm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `danhmuc_dn`
--
ALTER TABLE `danhmuc_dn`
  MODIFY `id_dmdn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `doanhnghiep`
--
ALTER TABLE `doanhnghiep`
  MODIFY `id_dn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `nhatkysanpham`
--
ALTER TABLE `nhatkysanpham`
  MODIFY `id_nk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id_acc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vungsanxuat`
--
ALTER TABLE `vungsanxuat`
  MODIFY `id_vung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
