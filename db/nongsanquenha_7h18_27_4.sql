-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 27, 2024 lúc 02:18 AM
-- Phiên bản máy phục vụ: 10.1.38-MariaDB
-- Phiên bản PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nongsanquenha`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `add_logo`
--

CREATE TABLE `add_logo` (
  `id` int(10) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `add_logo`
--

INSERT INTO `add_logo` (`id`, `img`) VALUES
(3, 'logo-test.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baiviet`
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
-- Đang đổ dữ liệu cho bảng `baiviet`
--

INSERT INTO `baiviet` (`id_bv`, `nguoidang`, `tieude`, `noidung`, `hinhanh`, `ngaydang`) VALUES
(3, 2, '\r\nTiêu dùng nông sản sạch: Một xu hướng bền vững đang lan tỏa', 'Trong thời đại hiện đại ngày nay, việc chú trọng vào sức khỏe và an toàn thực phẩm đang trở thành một trong những ưu tiên hàng đầu của mọi người. Trong bối cảnh đó, nông sản sạch - những sản phẩm được trồng trọt và chế biến một cách tự nhiên, không sử dụng hóa chất độc hại - đang thu hút sự quan tâm và lựa chọn ngày càng nhiều từ người tiêu dùng.\r\n\r\nNông sản sạch không chỉ đảm bảo về mặt an toàn thực phẩm mà còn mang lại nhiều lợi ích cho sức khỏe của con người và môi trường. Khi tiêu dùng nông sản sạch, người dùng có thể yên tâm về nguồn gốc, cách trồng trọt và chế biến của sản phẩm mình sử dụng, từ đó giảm thiểu rủi ro về các chất độc hại có thể gây hại cho sức khỏe. Đồng thời, việc ủng hộ nông sản sạch cũng đồng nghĩa với việc hỗ trợ các nông dân và nhà sản xuất áp dụng các phương pháp canh tác và chế biến bền vững, thân thiện với môi trường.', 'M1.jpg', '2024-04-05 06:54:33'),
(5, 2, 'Website truy xuất nguồn gốc nông sản sạch', 'Nhằm giúp người nông dân, hợp tác xã, doanh nghiệp, các tổ chức và cá nhân trong và ngoài tỉnh đưa nông sản, sản phẩm lên website để tăng cường công tác quảng bá sản phẩm; đồng thời xây dựng vùng nguyên liệu nông sản theo chuỗi sản xuất gắn với truy xuất nông sản đáp ứng thị trường trong và ngoài nước trong thời gian tới.\r\nTrang web truy xuất nguồn gốc \"Nông sản Quê Nhà\" bắt đầu được vận hành bởi sinh viên Trường Đại học Công nghiệp Thành phố Hồ Chí Minh. Tất cả các tổ chức, cá nhân đều có thể đăng ký tài khoản tham gia vào website này. Một số tính năng cơ bản của website như sau:\r\n- Tất cả các tổ chức, cá nhân đã đăng ký tài khoản trên website này đều có thể ghi nhật ký điện tử gắn với việc truy xuất nguồn gốc sản phẩm.\r\n- Mỗi tổ chức, cá nhân có thể tạo mã truy xuất cho sản phẩm của mình thông qua mã QR Code, thông quá đó đưa sản phẩm lên website để tiếp cận đơn vị thu mua sản phẩm được nhiều hơn. Sản phẩm đến tay người tiêu dùng có thể kiểm tra được nguồn gốc sản phẩm khi quét mã QR - Code qua điện thoại thông minh.\r\n- Xây dựng vùng nguyên liệu từng cây trồng, vật nuôi gắn với truy xuất vị trí địa lý để các doanh nghiệp có thể liên hệ hợp tác nhiều hơn.\r\n- Các tổ chức có thể tạo ra các thành viên trực thuộc từ đó giúp cho công tác quản lý cũng như điều hành công việc được tốt hơn.\r\n- Có thể liên kết với các tổ chức chứng nhận các tiêu chuẩn sản phẩm (VietGAP, GlobalGAP, ...) được dễ dàng hơn, ...\r\nĐể đăng ký tài khoản tham gia Sàn giao dịch này, bà con nông dân, các tổ chức, cá nhân có thể vào trang Web với địa chỉ sau: https://nongsanquenha.000webhostapp.com\r\nHoặc liên hệ số điện thoại bên dưới để được hướng dẫn.\r\nMọi chi tiết liên hệ: Ông Huỳnh Quốc Tiến - Nhà quản trị Website Truy xuất nguồn gốc nông sản sạch. Điện thoại: 0795972514, Email: huynhtien050602@gmail.com.\r\nChúc quý bà con nông dân, các tổ chức, cá nhân thành công!\r\nTrân trọng.', 'gioithieu.png', '2024-04-05 07:46:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `caygiong`
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

--
-- Đang đổ dữ liệu cho bảng `caygiong`
--

INSERT INTO `caygiong` (`id_cg`, `tencaygiong`, `macaygiong`, `mota`, `nhasanxuat`, `ngaysanxuat`, `hansudung`, `phuongphaptrong`, `hinhanh`, `lienhe`, `ngaytao`) VALUES
(1, 'Vú sữa lò rèn', 'MCG003', 'Cây giống \"Vú sữa lò rèn\" có nguồn gốc từ khu vực núi lò rèn, có đặc điểm lá dày, hình dáng cây cao vươn mạnh, phát triển tốt trong điều kiện ẩm ướt.', 'Đại học Nông nghiệp', '2024-04-22', '2025-04-22', 'Trồng từ cành', 'cf5fdedad7bccb40548c043704eae196.jpg', 'info@agriuni.edu.vn', '2024-04-22 17:27:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer_feedback`
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
-- Đang đổ dữ liệu cho bảng `customer_feedback`
--

INSERT INTO `customer_feedback` (`id`, `user_id`, `user_name`, `pdt_id`, `comment`, `comment_date`) VALUES
(1, 1, 'saiful', 4, 'This product is very good', '2021-09-11'),
(4, 5, 'karim', 6, 'Good product', '2021-09-15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgia`
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
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id_dm` int(11) NOT NULL,
  `tendanhmuc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai` enum('hoatdong','khonghoatdong','','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'hoatdong',
  `ngaytao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id_dm`, `tendanhmuc`, `trangthai`, `ngaytao`) VALUES
(1, 'Táo', 'hoatdong', '2024-03-13 03:04:41'),
(6, 'Trái cây', 'hoatdong', '2024-03-13 04:04:47'),
(8, 'Rau', 'hoatdong', '2024-03-14 04:16:50'),
(9, 'Nho', 'hoatdong', '2024-03-17 01:50:24'),
(10, 'Ổi', 'hoatdong', '2024-03-19 09:54:59'),
(11, 'Vú sữa', 'hoatdong', '2024-04-25 04:10:00'),
(12, 'Chuối', 'hoatdong', '2024-04-25 04:10:16'),
(13, 'Dừa ', 'hoatdong', '2024-04-25 04:10:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc_dn`
--

CREATE TABLE `danhmuc_dn` (
  `id_dmdn` int(11) NOT NULL,
  `tendoanhnghiep` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc_dn`
--

INSERT INTO `danhmuc_dn` (`id_dmdn`, `tendoanhnghiep`) VALUES
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
-- Cấu trúc bảng cho bảng `danhmuc_nx`
--

CREATE TABLE `danhmuc_nx` (
  `id_dmnx` int(11) NOT NULL,
  `loainhaxuong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc_nx`
--

INSERT INTO `danhmuc_nx` (`id_dmnx`, `loainhaxuong`) VALUES
(1, 'Nhà máy chế biến đóng gói'),
(2, 'Nhà máy sơ chế nguyên liệu'),
(3, 'Nhà máy đóng gói'),
(4, 'Nhà máy sơ chế đóng gói'),
(6, 'Xưởng đóng gói khô');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doanhnghiep`
--

CREATE TABLE `doanhnghiep` (
  `id_dn` int(11) NOT NULL,
  `danhmuc_dn` int(11) NOT NULL,
  `nguoidaidien` int(11) NOT NULL,
  `tendoanhnghiep` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sdt` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diachi` text COLLATE utf8mb4_unicode_ci,
  `masothue` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `giayphepkinhdoanh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `giaychungnhan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `giaykiemdinh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thongtinchung` text COLLATE utf8mb4_unicode_ci,
  `ngaytao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `doanhnghiep`
--

INSERT INTO `doanhnghiep` (`id_dn`, `danhmuc_dn`, `nguoidaidien`, `tendoanhnghiep`, `hinhanh`, `sdt`, `email`, `diachi`, `masothue`, `giayphepkinhdoanh`, `giaychungnhan`, `giaykiemdinh`, `thongtinchung`, `ngaytao`) VALUES
(1, 1, 1, 'Cơ sở sản xuất Trà Mãng cầu Ánh Nguyệt', 'dca46a5c23573ae5801307bf80dc8b48.png', '0795972514', 'huynhquoctien.10a3.2017@gmail.com', 'Ấp Hiếu Trung A, Xã Hiếu Nghĩa, Vũng Liêm, Vĩnh Long', 'TPVT-P.4-NX01', '6626b5848e389_2901051_19.jpg', '6626b5848e486_2901099.jpg', '6626b5848e534_a0741c15180fc9d2c0d16a879f87598e.jpg', 'Tieens chos', '2024-04-22 16:23:25'),
(4, 9, 6, 'MinhJet Ali', '371399452_1009194440311955_3419208062698528689_n.jpg', '1111111111', '1111@1111111112', '1111111112', '11111111112', '662bfc4bf00c0_2901100.jpg', '6626b406c5144_2901051_19.jpg', 'apple1.jpg', 'ok', '2024-04-22 18:38:56'),
(5, 6, 4, 'Doanh nghiệp 01', '6626b406c5144_2901051_19.jpg', '11111111', '111@1111', '11111111', '111', '6626b5848e389_2901051_19.jpg', '6626b5848e486_2901099.jpg', '2901459.jpg', '1111111111', '2024-04-23 10:52:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `header_info`
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
-- Đang đổ dữ liệu cho bảng `header_info`
--

INSERT INTO `header_info` (`id`, `email`, `tweeter`, `fb_link`, `pinterest`, `phone`) VALUES
(10, 'followme403@gmail.com', 'https://twitter.com/', 'https://facebook.com/', 'https://pinerest.com/', '0795972514');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhatkysanpham`
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

--
-- Đang đổ dữ liệu cho bảng `nhatkysanpham`
--

INSERT INTO `nhatkysanpham` (`id_nk`, `sanpham`, `nguoidang`, `tennhatky`, `chitiet`, `hinhanh`, `thoigiantao`) VALUES
(1, 6, 1, 'Thăm vườn ổi', 'Vip nhe', 'vngoods_69_466816.jpg', '2024-04-22 02:48:06'),
(2, 16, 4, 'Nuôi trồng dừa', 'abc', 'WIN_20240123_22_25_18_Pro.jpg', '2024-04-25 06:21:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhaxuong`
--

CREATE TABLE `nhaxuong` (
  `id_nx` int(11) NOT NULL,
  `danhmuc_nx` int(11) NOT NULL,
  `nguoidaidien` int(11) NOT NULL,
  `doanhnghiep` int(11) DEFAULT NULL,
  `vungsanxuat` int(11) DEFAULT NULL,
  `tennhaxuong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manhaxuong` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinhanh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dienthoai` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `diachi` text COLLATE utf8mb4_unicode_ci,
  `dientichtongthe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `giayphepkinhdoanh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `giaychungnhan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `giaykiemdinh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thongtin` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhaxuong`
--

INSERT INTO `nhaxuong` (`id_nx`, `danhmuc_nx`, `nguoidaidien`, `doanhnghiep`, `vungsanxuat`, `tennhaxuong`, `manhaxuong`, `hinhanh`, `dienthoai`, `email`, `diachi`, `dientichtongthe`, `giayphepkinhdoanh`, `giaychungnhan`, `giaykiemdinh`, `thongtin`) VALUES
(1, 1, 1, 1, 3, 'Nhà xưởng tháng 2', 'NXT2', '662c03041f726_2901459.jpg', '086421212', 'MinhJet@12112', '16 lê thi thập', '12 m2', '662c0341d4b04_662c03041f4cc_2901099.jpg', '662c0341d4d4d_cf5fdedad7bccb40548c043704eae196.jpg', '662c0341d4e9c_Black apple.jpg', ' Liên hệ anh tiến chó'),
(2, 4, 4, 5, 8, 'Xưởng 03', '03NX', '371399452_1009194440311955_3419208062698528689_n.jpg', '0867512314', 'Alicia@gmail.com', 'Long Xuyên, An Giang', '120 m2', '662c03041f4cc_2901099.jpg', '662c03041f726_2901459.jpg', '662c03041f94b_tijana-drndarski-SJxDhVZR30I-unsplash.jpg', 'Liên hệ chị Alicia Meow'),
(3, 3, 5, 4, 8, 'Nhà xưởng bán tạp hóa', 'TQPHOA1', '6626b5848e389_2901051_19.jpg', '075145271', 'nhuthao@gmail.com', 'Hựu thành, Trà Ôn, Vĩnh Long', '120 m2', '6626b5848e486_2901099.jpg', '6626b5848e534_a0741c15180fc9d2c0d16a879f87598e.jpg', '2901460.jpg', 'Liên hệ hào nguyễn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(11) NOT NULL,
  `taikhoan` int(11) NOT NULL,
  `danhmuc` int(11) NOT NULL,
  `caygiong` int(11) NOT NULL,
  `vungsanxuat` int(11) NOT NULL,
  `tensanpham` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mavach` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `taikhoan`, `danhmuc`, `caygiong`, `vungsanxuat`, `tensanpham`, `mavach`, `hinhanh`, `gia`, `xuatxu`, `maqr`, `mota`, `congdung`, `hdsd`, `dieukienbaoquan`, `ngaytao`, `trangthai`) VALUES
(1, 2, 8, 1, 8, 'Táo Newzeland', 'OHD-25550', '2901141.jpg', 'Từ 110.000 - 150.000 vnđ/kg', 'Vĩnh Long', 'jakshdkjhad.png', 'Táo đẹp   ', '   Bổ sung vitamin ABCDEFGHIKLMNO', '25/12/2024', 'Bảo quan nơi có ánh tối', '2024-03-13 03:07:04', 'daxetduyet'),
(5, 2, 10, 1, 2, 'Ổi Đài Loan', 'NSQN-6589860', 'oi-dai-loan.jpg', '10.000 - 12.000đ/kg', 'Ấp Hiếu Trung A, Xã Hiếu Nghĩa, Vũng Liêm, Vĩnh Long', 'aaa', 'Ăn tươi khi thu hoạch', 'Có tác dụng hạ huyết áp, và giảm cholesterol trong máu.', 'Dùng ăn tươi', 'Bảo quản nơi khô mát', '2024-03-19 09:57:14', 'daxetduyet'),
(6, 2, 6, 1, 3, 'Ổi trung quốc', 'NSQN-6589822', 'oi-dai-loan.jpg', '40.000-50.000đ/1kg', 'Vĩnh Long', NULL, 'Giống ổi Lê có nguồn gốc từ Đài Loan, được trồng ở Việt Nam mấy năm gần đây, với đặc điểm sinh trưởng và phát triển tốt, quả mẫu mã đẹp, chất lượng có thể ngon nhất trong các loại ổi hiện có. Hiện nay đã có nhiều nhà vườn phát triển với quy mô lớn đem lại hiệu quả kinh tế cao, nhất là những nhà vườn ở vùng Bến cát - Bình Dương. Giống ổi Lê Đài Loan có năng suất cao ngay từ năm thứ nhất đã đạt trên 10tấn quả/ha cho thu nhập hàng trăm triệu đồng/ha đến năm thứ 3 đã lên tới 60 tấn quả/ha.  ', '  Trồng cây ổi trong vườn cây có múi sẽ tạo nên hiệu ứng “xua đuổi được rầy chổng cánh là tác nhân gây bệnh vàng lá Greening”. Trên cơ sở đó người ta có thể hình thành hệ sinh thái mới thật sự bền vững và kinh tế để đầu tư trồng cây có múi (không bị nhiễm bệnh vàng lá Greening) và xây dựng qui trình công nghệ sản xuất cây có múi sạch bệnh ngoài trời (không bị rầy chổng cánh xâm nhập gây hại).Trái ổi Nữ Hoàng có chất lượng ngon nhất hiện nay. Trái chủ yếu dùng để ăn tươi, hay làm mứt, sấy khô, chế biến nước giải khát, thạch jelly... Đây là loại trái nhiều chất bổ dưỡng, dễ tiêu hoá, giàu Vitamine C nhưng nghèo năng lượng nên là loại trái cây rất tốt cho người không muốn tăng cân hay cần giảm cân. Với nữ giới ăn ổi thường xuyên sẽ giúp cho làn da mịn màng và xinh đẹp hơn.Dịch chiết các bộ phận của cây ổi như búp non, lá non, vỏ rễ và vỏ thân còn được dùng làm thuốc chửa bệnh nhiễm vi khuẩn và siêu vi khuẩn. Ăn ổi thường xuyên giúp hạ đường huyết, phòng trị đái tháo đường, cải thiện chức năng tim mạch...', 'Ăn trực tiếp', 'Bảo quản nơi khô ráo thoáng mát', '2024-03-19 16:11:12', 'daxetduyet'),
(11, 0, 1, 0, 0, ' Vú sữa', 'đâsdas', '371399452_1009194440311955_3419208062698528689_n.jpg', '', '', NULL, ' ', NULL, NULL, NULL, '2024-04-11 17:52:53', 'daxetduyet'),
(13, 0, 9, 0, 0, 'Vú sữa', 'đá', '371399452_1009194440311955_3419208062698528689_n.jpg', '', NULL, NULL, '', NULL, NULL, NULL, '2024-04-11 17:54:31', 'daxetduyet'),
(15, 3, 6, 0, 0, 'Cam sành 1', '', 'xiaolong-wong-nibgG33H0F8-unsplash.jpg', '20.000 - 25.000đ/1kg', 'vĩnh Long', '1', 'Cam ngọt cam ngon cam vừa ý bạn  ', '   Bổ sung vitamin C', '', 'Khô ráo thoáng mát', '2024-04-22 17:47:25', 'daxetduyet'),
(16, 1, 6, 1, 7, 'Vú sữa lò rèn', '<br /><b>Notice</b>:  Undefined index: masanpham i', 'vu_sua_lo_ren_vinh_kim.jpg', ' Từ 20.000đ đến 40.000đ tùy khu vực', 'Vĩnh long', '1', 'Cây giống \"Vú sữa lò rèn\" có nguồn gốc từ khu vực núi lò rèn, có đặc điểm lá dày, hình dáng cây cao vươn mạnh, phát triển tốt trong điều kiện ẩm   ', ' Ăn ngon, ăn vừa phải vì đây là trai cây có tính nóng', 'Ăn khi chín', 'Khô ráo thoáng mát', '2024-04-22 18:00:07', 'daxetduyet'),
(18, 4, 2, 0, 0, '1', 'NSQN000', '6626b406c5144_2901051_19.jpg', ' 11', '1', '1', '1', '1', '1', '1', '2024-04-25 03:49:50', 'dangchoxetduyet');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slider`
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
-- Đang đổ dữ liệu cho bảng `slider`
--

INSERT INTO `slider` (`slider_id`, `first_line`, `second_line`, `third_line`, `btn_left`, `btn_right`, `slider_img`) VALUES
(1, 'Website', 'Truy xuất nguồn gốc nông sản sạch', 'Áp dụng QR CODE', 'Khám phá ngay', '', 'green-slide-01.jpg'),
(2, 'Nông sản sạch', 'Trải nghiệm nông sản nguyên chất', '100% từ thiên nhiên', 'Xem ngay', '', 'green-slide-02.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
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
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id_acc`, `hoten`, `email`, `matkhau`, `dienthoai`, `diachi`, `hinhdaidien`, `role`, `trangthai`, `ngaytao`) VALUES
(1, 'Admin', 't@gmail.com', 'e358efa489f58062f10dd7316b65649e', '0795972514', 'Ấp Hiếu Trung A, Xã Hiếu Nghĩa, Vũng Liêm, Vĩnh Long', 'WIN_20240123_22_25_18_Pro.jpg', 'Admin', 'hoatdong', '2024-03-07 16:38:45'),
(2, 'Huỳnh Quốc Tiến', 'followme403@gmail.com', '7ab64083d8ff71645fd0bb3ce7e73418', '0795972514', 'Vĩnh Long', '2a2e42361e7fb321ea6e.jpg', 'Khachhang', 'hoatdong', '2024-03-07 16:51:16'),
(3, 'Nguyễn Hoàng Minh', 'minhok3699@gmail.com', '73882ab1fa529d7273da0db6b49cc4f3', '0983761510', 'Ấp Hiếu Trung A, Xã Hiếu Nghĩa, Vũng Liêm', '334673087_204077125634904_7023339784759206835_n.jpg', 'Admin', 'hoatdong', '2024-03-07 17:08:47'),
(4, '  MinhJet', 'minh@gmail.com', '202cb962ac59075b964b07152d234b70', '0342579411', 'Dương Quảng Hàm', 'jisoo.jpg', 'Admin', 'hoatdong', '2024-04-22 19:15:33'),
(5, 'Ali', 'ly@gmail.com', '202cb962ac59075b964b07152d234b70', '1234511', '12312412', '662c03041f4cc_2901099.jpg', 'Khachhang', 'hoatdong', '2024-04-25 04:08:11'),
(6, 'Tiens Chos', 'aa@gmail.com', '202cb962ac59075b964b07152d234b70', '11', '11', '371399452_1009194440311955_3419208062698528689_n.jpg', 'Nongdan', 'hoatdong', '2024-04-25 04:08:28'),
(7, '1 người đàn ông', 'male@gmail.com', '202cb962ac59075b964b07152d234b70', '123571223', '123', '662c0341d4e9c_Black apple.jpg', 'Khachhang', 'hoatdong', '2024-04-25 04:08:56'),
(8, '12 người phụ nữ', 'female@gmail.com1', '202cb962ac59075b964b07152d234b70', '0125675001', '2112341', '1', 'Nongdan', 'hoatdong', '2024-04-25 04:09:24'),
(9, 'Trương Thị Lý', 'ly@gmail.com', '202cb962ac59075b964b07152d234b70', '0345128645', 'Gành Hào , Đông Hải. Bạc Liêu', 'ali.jpg', 'Khachhang', 'hoatdong', '2024-04-26 20:13:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vungsanxuat`
--

CREATE TABLE `vungsanxuat` (
  `id_vung` int(11) NOT NULL,
  `nguoidang` int(11) NOT NULL,
  `nhatky` int(11) NOT NULL,
  `tenvung` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mavung` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maqr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bando` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoigiannuoitrong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dientich` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thongtin` text COLLATE utf8mb4_unicode_ci,
  `ngaytao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vungsanxuat`
--

INSERT INTO `vungsanxuat` (`id_vung`, `nguoidang`, `nhatky`, `tenvung`, `mavung`, `hinhanh`, `maqr`, `sdt`, `diachi`, `bando`, `thoigiannuoitrong`, `dientich`, `thongtin`, `ngaytao`) VALUES
(2, 2, 1, 'Mô hình trồng Mít ruột đỏ theo tiêu chuẩn GlobalGAP gắn với liên kết chuỗi nâng cao giá trị sản phẩm', 'VL-2023-Mít ruột đỏ', 'mitruotdo.png', '', ' 093844954', 'Ấp Hiếu Trung A, Xã Hiếu Nghĩa, Huyện Vũng Liêm, Vĩnh Long', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1237.776886035251!2d106.08852555390523!3d9.959266065139339!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1713787442693!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '', '15 ha', 'haha', '2024-03-16 08:04:25'),
(3, 1, 1, 'Vùng sản xuất khóm MD2', 'MD2- Phụng Hiệp', 'vsxKhom.jpg', '', '0795972514', 'Ấp Phương Thạnh, xã Phương Bình, huyện Phụng Hiệp, tỉnh Hậu Giang', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1237.7702665847064!2d106.08586575078246!3d9.961010901923773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a06d5f8d77fd9f%3A0xee6d7593a02651dd!2zQ-G6plUgxJDDjE5IIFRI4bqmTiBI4buwVSBUSMOATkg!5e0!3m2!1svi!2s!4v1713787466618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '', '120 ha', 'Liên hệ: Trần Trung Tính, Trưởng Trạm KN huyện Phụng Hiệp Điện Thoại: 0907404946', '2024-04-22 03:20:51'),
(7, 4, 0, 'Vựa dừa', 'KSA-12723', '6626b5848e486_2901099.jpg', '', '07512341', 'X37P+QW5, Ấp Hiếu Văn, Vũng Liêm, Vĩnh Long, Việt Nam', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1717.0766420031216!2d106.08700955856811!3d9.963501837977656!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a06c0d4f7dff9f%3A0x79c5eaf721ac022f!2zQ8OieSB4xINuZyBHaWFuZyBTxqFuIDEgLSBQRVRJTUVY!5e0!3m2!1svi!2s!4v1714023710674!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '1 ngày không xa đâu', '12', 'Liên hệ anh tiến', '2024-04-25 05:25:21'),
(8, 4, 1, 'Tạp Hoá Út Sương', 'THUS-1251', 'WIN_20240123_22_25_18_Pro.jpg', '', '012375211', 'Số 5, tổ 1, ấp, vĩnh thiện, Trà Ôn, Vĩnh Long, Việt Nam', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1124.141955884011!2d106.07149964794027!3d9.967819253515213!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a06dd1c2bacd5f%3A0x2705079268ffe1fb!2zVOG6oXAgSG_DoSDDmnQgU8awxqFuZw!5e0!3m2!1svi!2s!4v1714023975897!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '1 ngày nào đó sẽ đi đâu về đâu', '1ha', 'Nhà anh Hào Nguyễn', '2024-04-25 05:46:54'),
(11, 5, 2, 'Nông sản Yến Vĩnh Long', '12SAX', '6626b5848e534_a0741c15180fc9d2c0d16a879f87598e.jpg', '', '1222222222', '14/7 A Tân Hưng, Tân Hạnh, Long Hồ, Vĩnh Long, Việt Nam', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d155249.6170494607!2d105.72595698583741!3d10.298768509094236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a07996002d2559%3A0xf6626c089c06849!2zTsO0bmcgc-G6o24gWeG6v24gVsSpbmggTG9uZw!5e0!3m2!1svi!2s!4v1714062449664!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '10 năm', '12', 'Không có', '2024-04-25 16:28:20');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `add_logo`
--
ALTER TABLE `add_logo`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`id_bv`),
  ADD KEY `nguoidang` (`nguoidang`) USING BTREE;

--
-- Chỉ mục cho bảng `caygiong`
--
ALTER TABLE `caygiong`
  ADD PRIMARY KEY (`id_cg`);

--
-- Chỉ mục cho bảng `customer_feedback`
--
ALTER TABLE `customer_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`id_dg`),
  ADD UNIQUE KEY `nguoidang` (`nguoidang`),
  ADD UNIQUE KEY `sanpham` (`sanpham`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id_dm`);

--
-- Chỉ mục cho bảng `danhmuc_dn`
--
ALTER TABLE `danhmuc_dn`
  ADD PRIMARY KEY (`id_dmdn`);

--
-- Chỉ mục cho bảng `danhmuc_nx`
--
ALTER TABLE `danhmuc_nx`
  ADD PRIMARY KEY (`id_dmnx`);

--
-- Chỉ mục cho bảng `doanhnghiep`
--
ALTER TABLE `doanhnghiep`
  ADD PRIMARY KEY (`id_dn`),
  ADD KEY `nguoidaidien` (`nguoidaidien`),
  ADD KEY `danhmuc_dn` (`danhmuc_dn`) USING BTREE;

--
-- Chỉ mục cho bảng `header_info`
--
ALTER TABLE `header_info`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhatkysanpham`
--
ALTER TABLE `nhatkysanpham`
  ADD PRIMARY KEY (`id_nk`),
  ADD UNIQUE KEY `sanpham` (`sanpham`),
  ADD UNIQUE KEY `nguoidang` (`nguoidang`);

--
-- Chỉ mục cho bảng `nhaxuong`
--
ALTER TABLE `nhaxuong`
  ADD PRIMARY KEY (`id_nx`),
  ADD KEY `nguoidaidien` (`nguoidaidien`),
  ADD KEY `doanhnghiep` (`doanhnghiep`),
  ADD KEY `vungsanxuat` (`vungsanxuat`),
  ADD KEY `danhmuc_nx` (`danhmuc_nx`) USING BTREE;

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `taikhoan` (`taikhoan`) USING BTREE,
  ADD KEY `danhmuc` (`danhmuc`) USING BTREE,
  ADD KEY `caygiong` (`caygiong`),
  ADD KEY `vungsanxuat` (`vungsanxuat`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id_acc`);

--
-- Chỉ mục cho bảng `vungsanxuat`
--
ALTER TABLE `vungsanxuat`
  ADD PRIMARY KEY (`id_vung`),
  ADD KEY `nguoidang` (`nguoidang`) USING BTREE,
  ADD KEY `nhatky` (`nhatky`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `add_logo`
--
ALTER TABLE `add_logo`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `id_bv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `caygiong`
--
ALTER TABLE `caygiong`
  MODIFY `id_cg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `id_dg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_dm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `danhmuc_dn`
--
ALTER TABLE `danhmuc_dn`
  MODIFY `id_dmdn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `danhmuc_nx`
--
ALTER TABLE `danhmuc_nx`
  MODIFY `id_dmnx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `doanhnghiep`
--
ALTER TABLE `doanhnghiep`
  MODIFY `id_dn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `nhatkysanpham`
--
ALTER TABLE `nhatkysanpham`
  MODIFY `id_nk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `nhaxuong`
--
ALTER TABLE `nhaxuong`
  MODIFY `id_nx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id_acc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `vungsanxuat`
--
ALTER TABLE `vungsanxuat`
  MODIFY `id_vung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
