-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 15, 2024 lúc 08:13 AM
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
(3, 1, '\r\nTiêu dùng nông sản sạch: Một xu hướng bền vững đang lan tỏa', 'Trong thời đại hiện đại ngày nay, việc chú trọng vào sức khỏe và an toàn thực phẩm đang trở thành một trong những ưu tiên hàng đầu của mọi người. Trong bối cảnh đó, nông sản sạch - những sản phẩm được trồng trọt và chế biến một cách tự nhiên, không sử dụng hóa chất độc hại - đang thu hút sự quan tâm và lựa chọn ngày càng nhiều từ người tiêu dùng.\r\n\r\nNông sản sạch không chỉ đảm bảo về mặt an toàn thực phẩm mà còn mang lại nhiều lợi ích cho sức khỏe của con người và môi trường. Khi tiêu dùng nông sản sạch, người dùng có thể yên tâm về nguồn gốc, cách trồng trọt và chế biến của sản phẩm mình sử dụng, từ đó giảm thiểu rủi ro về các chất độc hại có thể gây hại cho sức khỏe. Đồng thời, việc ủng hộ nông sản sạch cũng đồng nghĩa với việc hỗ trợ các nông dân và nhà sản xuất áp dụng các phương pháp canh tác và chế biến bền vững, thân thiện với môi trường.', 'M1.jpg', '2024-04-05 06:54:33'),
(5, 2, 'Website truy xuất nguồn gốc nông sản sạch', 'Nhằm giúp người nông dân, hợp tác xã, doanh nghiệp, các tổ chức và cá nhân trong và ngoài tỉnh đưa nông sản, sản phẩm lên website để tăng cường công tác quảng bá sản phẩm; đồng thời xây dựng vùng nguyên liệu nông sản theo chuỗi sản xuất gắn với truy xuất nông sản đáp ứng thị trường trong và ngoài nước trong thời gian tới.\r\nTrang web truy xuất nguồn gốc \"Nông sản Quê Nhà\" bắt đầu được vận hành bởi sinh viên Trường Đại học Công nghiệp Thành phố Hồ Chí Minh. Tất cả các tổ chức, cá nhân đều có thể đăng ký tài khoản tham gia vào website này. Một số tính năng cơ bản của website như sau:\r\n- Tất cả các tổ chức, cá nhân đã đăng ký tài khoản trên website này đều có thể ghi nhật ký điện tử gắn với việc truy xuất nguồn gốc sản phẩm.\r\n- Mỗi tổ chức, cá nhân có thể tạo mã truy xuất cho sản phẩm của mình thông qua mã QR Code, thông quá đó đưa sản phẩm lên website để tiếp cận đơn vị thu mua sản phẩm được nhiều hơn. Sản phẩm đến tay người tiêu dùng có thể kiểm tra được nguồn gốc sản phẩm khi quét mã QR - Code qua điện thoại thông minh.\r\n- Xây dựng vùng nguyên liệu từng cây trồng, vật nuôi gắn với truy xuất vị trí địa lý để các doanh nghiệp có thể liên hệ hợp tác nhiều hơn.\r\n- Các tổ chức có thể tạo ra các thành viên trực thuộc từ đó giúp cho công tác quản lý cũng như điều hành công việc được tốt hơn.\r\n- Có thể liên kết với các tổ chức chứng nhận các tiêu chuẩn sản phẩm (VietGAP, GlobalGAP, ...) được dễ dàng hơn, ...\r\nĐể đăng ký tài khoản tham gia Sàn giao dịch này, bà con nông dân, các tổ chức, cá nhân có thể vào trang Web với địa chỉ sau: https://nongsanquenha.000webhostapp.com\r\nHoặc liên hệ số điện thoại bên dưới để được hướng dẫn.\r\nMọi chi tiết liên hệ: Ông Huỳnh Quốc Tiến - Nhà quản trị Website Truy xuất nguồn gốc nông sản sạch. Điện thoại: 0795972514, Email: huynhtien050602@gmail.com.\r\nChúc quý bà con nông dân, các tổ chức, cá nhân thành công!\r\nTrân trọng.', 'gioithieu.png', '2024-04-05 07:46:21'),
(6, 65, 'Giống Dưa lưới mới ở tỉnh Sóc Trăng làm điên đảo cộng đồng nông nghiệp cả nước', '### Giống Dưa Lưới Mới ở Sóc Trăng: Bước Đột Phá Trong Nông Nghiệp Địa Phương\r\n\r\nTrong những năm gần đây, Sóc Trăng đã chứng kiến sự phát triển mạnh mẽ của nông nghiệp, đặc biệt là việc nghiên cứu và ứng dụng các giống cây trồng mới nhằm nâng cao hiệu quả kinh tế và chất lượng sản phẩm. Một trong những thành tựu đáng chú ý nhất là sự ra đời của giống dưa lưới mới, hứa hẹn mang lại nhiều lợi ích cho nông dân và người tiêu dùng.\r\n\r\n#### Đặc Điểm Nổi Bật Của Giống Dưa Lưới Mới\r\n\r\nGiống dưa lưới mới ở Sóc Trăng có nhiều đặc điểm nổi bật so với các giống truyền thống. Đầu tiên, giống dưa này có khả năng chống chịu tốt với điều kiện khí hậu và sâu bệnh, giúp giảm thiểu rủi ro trong quá trình canh tác. Ngoài ra, thời gian sinh trưởng của giống dưa này ngắn hơn, cho phép nông dân thu hoạch sớm hơn và tăng số vụ trong năm.\r\n\r\nVề mặt chất lượng, dưa lưới mới có hương vị thơm ngon, độ ngọt cao và thịt quả giòn, mịn. Những đặc điểm này không chỉ làm hài lòng người tiêu dùng mà còn tạo lợi thế cạnh tranh cho nông sản Sóc Trăng trên thị trường trong nước và quốc tế.\r\n\r\n#### Lợi Ích Kinh Tế Và Xã Hội\r\n\r\nViệc triển khai giống dưa lưới mới đã mang lại nhiều lợi ích kinh tế cho nông dân Sóc Trăng. Với năng suất cao và chất lượng ổn định, thu nhập của người trồng dưa đã được cải thiện đáng kể. Nhiều hộ gia đình đã thoát nghèo và vươn lên làm giàu nhờ giống cây trồng này.\r\n\r\nBên cạnh đó, mô hình trồng dưa lưới cũng tạo ra nhiều việc làm cho lao động địa phương, từ khâu trồng trọt, chăm sóc đến thu hoạch và chế biến. Điều này góp phần giảm tỷ lệ thất nghiệp và nâng cao mức sống cho người dân trong khu vực.\r\n\r\n#### Hướng Đi Tương Lai\r\n\r\nNhằm phát huy tối đa tiềm năng của giống dưa lưới mới, các cơ quan chức năng và nhà nghiên cứu tại Sóc Trăng đang tiếp tục đẩy mạnh công tác nghiên cứu và phát triển. Các chương trình đào tạo, hội thảo và chuyển giao kỹ thuật trồng dưa lưới hiện đại được tổ chức thường xuyên, giúp nông dân nắm vững kỹ thuật canh tác và áp dụng hiệu quả vào thực tế.\r\n\r\nNgoài ra, việc xây dựng hệ thống thu mua, chế biến và tiêu thụ sản phẩm cũng được quan tâm đầu tư. Các hợp tác xã và doanh nghiệp nông nghiệp đang hợp tác chặt chẽ để đảm bảo đầu ra ổn định cho sản phẩm dưa lưới, giúp nông dân yên tâm sản xuất.\r\n\r\n#### Kết Luận\r\n\r\nGiống dưa lưới mới ở Sóc Trăng không chỉ là một bước đột phá trong nông nghiệp địa phương mà còn mở ra nhiều cơ hội phát triển kinh tế và nâng cao đời sống cho người dân. Với sự hỗ trợ từ chính quyền và các cơ quan chức năng, giống dưa lưới này chắc chắn sẽ tiếp tục phát triển mạnh mẽ và đóng góp tích cực vào sự phát triển bền vững của nông nghiệp Sóc Trăng trong tương lai.', 'dualuoi.jpg', '2024-05-15 03:34:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `caygiong`
--

CREATE TABLE `caygiong` (
  `id_cg` int(11) NOT NULL,
  `nguoidang` int(11) NOT NULL,
  `nhasanxuat` int(11) DEFAULT NULL,
  `nhaphanphoi` int(11) DEFAULT NULL,
  `tencaygiong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `macaygiong` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci,
  `xuatxu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaysanxuat` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hansudung` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hdsd` text COLLATE utf8mb4_unicode_ci,
  `phuongphaptrong` text COLLATE utf8mb4_unicode_ci,
  `hinhanh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lienhe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaytao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `caygiong`
--

INSERT INTO `caygiong` (`id_cg`, `nguoidang`, `nhasanxuat`, `nhaphanphoi`, `tencaygiong`, `macaygiong`, `mota`, `xuatxu`, `gia`, `ngaysanxuat`, `hansudung`, `hdsd`, `phuongphaptrong`, `hinhanh`, `lienhe`, `ngaytao`) VALUES
(1, 1, 0, 0, 'Vú sữa lò rèn', 'MCG003', ' Cây giống \"Vú sữa lò rèn\" có nguồn gốc từ khu vực núi lò rèn, có đặc điểm lá dày, hình dáng cây cao vươn mạnh, phát triển tốt trong điều kiện ẩm ướt.', NULL, '', '2024-04-22', '2025-04-22', NULL, 'Trồng từ cành', 'cay_giong_vu_sua_lo_ren.jpg', 'minh@gmail.com', '2024-04-22 17:27:39'),
(2, 2, 0, 0, 'Mít Thái', 'MITT-2123', ' Đặc điểm nổi bật của cây mít Thái là dễ trồng, năng suất cao, đậu trái quanh năm. Song, bà con có thể sẽ phải bất ngờ khi biết thêm về những dưỡng chất mà quả của nó bổ sung cho cơ thể. Quả mít Thái siêu sớm tự thân nó đã rất dồi dào chất dinh dưỡng. Nó là một loại quả nhiệt đới được thống kê với rất nhiều loại vitamin như vitamin A, C, canxi, sắt, kali, ma-giê… rất có lợi cho sức khỏe người dùng. Đây là phương pháp cho rất nhiều chị em phụ nữ muốn sở hữu một làn da căng bóng không tì vết. Ngoài ra, nó cũng xuất hiện trong những chế độ ăn healthy (chế độ ăn lành mạnh) ở nhiều người.', NULL, '', '22/4/2024', '22/9/2026', NULL, 'Đào hố rồi trồng vào sao đó lấp đất tưới cây vào rồi đợi nó lớn thôi', 'caymitthaigiong-4091.jpeg', 'tienchos@gmail.com', '2024-04-29 21:16:29'),
(3, 3, 1, 1, 'Chanh không hạt', 'CHANHKH-1', ' Chanh không hạt là cây không gai, thích hợp và sinh trưởng tốt với khí hậu Việt Nam Hoa chanh không hạt mọc thành chùm, cánh hoa có màu trắng, dạng quả hơi dài, có vị chua và thơm.\r\nGiống chanh không hạt ít gai ở thân và quả giống với quả chanh truyền thống. Khi cành ở giai đoạn thành thục thì các gai bị thoái hóa, cây cho quả sai, một chùm cho 7-8 quả. Từ năm thứ 3 – 4 sẽ cho năng suất cao hơn. Chanh không hạt sẽ cho thu hoạch trên 10 năm mới bị thoái hóa\r\nCây có thể mọc cao đến 6m, thân cây không có gai, có tán lá tròn, trái chùm, không có hạt (hoặc chỉ có vài hạt).\r\nChanh không hạt là cho trái quanh năm. Cây còn có sức kháng bệnh rất mạnh, nhất là không thấy bị nhiễm bệnh vàng lá gân xanh như các loại cây có múi khác', '111111', '19000', '23/1/2023', '21/2/2025', '1111111111111', 'Trồng trực tiếp', 'cahnh0hat.jpg', 'anhhao@gmail.com', '2024-04-29 21:21:24'),
(4, 5, 0, 0, 'Giống lúa ST25', 'ST25-2', '   - Đặc sản Sóc Trăng\r\n- Gạo ngon giá tốt dành cho người có điều kiện bình dân. \r\n- Gạo thơm ngon dẻo vừa dễ nấu', NULL, '', '23/1/2023', '21/2/2030', NULL, 'Xạ lên cánh đồng lúa', 'gaost25.jpg', 'anhcuong@gmail.com', '2024-04-29 21:25:50'),
(5, 6, 6, 7, 'Giống đậu bắp 5 cạnh STAR 05', NULL, 'THỜI GIAN SINH TRƯỞNG (NGÀY): 32-35, thu hoạch kéo dài 50-55 ngày\r\nĐẶC TÍNH:\r\n- Sinh trưởng khỏe, dễ trồng, trồng quanh năm.\r\n- Chống chịu sâu bệnh tốt.\r\n- Thấp cây, lóng ngắn, trái thon dài 10-12 cm, năm cạnh, thẳng, xanh nhạt, ít xơ, ăn giòn ngon, ít nhớt, để lâu được.\r\n- Năng suất cao: 25-30 tấn/ha.', NULL, NULL, NULL, NULL, 'Giống đậu bắp dùng để gieo trồng (có hướng dẫn sử dụng ghi trên bao bì)', NULL, '15322a5c9ba9bef26eb1388393e25a01.png', NULL, '2024-05-01 01:55:46'),
(6, 9, 6, 7, 'Sầu riêng 4 mùa - Mùa nào cũng có', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'caymitthaigiong-4091.jpeg', NULL, '2024-05-01 02:12:39'),
(7, 65, 1, 1, '1', '1', '1', '1', '1', '1', '1', '1', '1', '662bfc4bf00c0_2901100.jpg', '111111', '2024-05-14 18:04:32');

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
(1, 1, 'hehe', 3, 'This product is very good', '2021-09-11'),
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
(1, 'Thực phẩm đồ uống', 'hoatdong', '2024-03-13 03:04:41'),
(6, 'Trồng trọt', 'hoatdong', '2024-03-13 04:04:47'),
(8, 'Chăn nuôi', 'hoatdong', '2024-03-14 04:16:50'),
(9, 'Thủy hải sản', 'hoatdong', '2024-03-17 01:50:24'),
(14, 'Các loại nông sản khác', 'hoatdong', '2024-05-04 13:24:32');

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
(6, 'Xưởng đóng gói khô'),
(7, 'XƯởng 12'),
(8, 'Xưởng 03'),
(9, 'Xưởng 09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `doanhnghiep`
--

CREATE TABLE `doanhnghiep` (
  `id_dn` int(11) NOT NULL,
  `nguoidang` int(11) NOT NULL,
  `danhmuc_dn` int(11) DEFAULT NULL,
  `nguoidaidien` int(11) DEFAULT NULL,
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

INSERT INTO `doanhnghiep` (`id_dn`, `nguoidang`, `danhmuc_dn`, `nguoidaidien`, `tendoanhnghiep`, `hinhanh`, `sdt`, `email`, `diachi`, `masothue`, `giayphepkinhdoanh`, `giaychungnhan`, `giaykiemdinh`, `thongtinchung`, `ngaytao`) VALUES
(1, 1, 1, 1, 'Cơ sở sản xuất Trà Mãng cầu Ánh Nguyệt', '5c2e785e2265042f842c4c4a583c5bb3.jpg', '0795972514', 'huynhquoctien.10a3.2017@gmail.com', 'Ấp Hiếu Trung A, Xã Hiếu Nghĩa, Vũng Liêm, Vĩnh Long', 'TPVT-P.4-NX01', '6626b5848e389_2901051_19.jpg', '6626b5848e486_2901099.jpg', '6626b5848e534_a0741c15180fc9d2c0d16a879f87598e.jpg', 'Tieens chos', '2024-04-22 16:23:25'),
(4, 2, 9, 6, 'MinhJet Ali', '371399452_1009194440311955_3419208062698528689_n.jpg', '1111111111', '1111@1111111112', '1111111112', '11111111112', '662bfc4bf00c0_2901100.jpg', '6626b406c5144_2901051_19.jpg', 'apple1.jpg', 'ok', '2024-04-22 18:38:56'),
(5, 3, 6, 4, 'Hợp tác xã Mãng Cầu xiêm Thuận Hoà', '6626b406c5144_2901051_19.jpg', '11111111', '111@1111', '11111111', '111', '6626b5848e389_2901051_19.jpg', '6626b5848e486_2901099.jpg', '2901459.jpg', '1111111111', '2024-04-23 10:52:25');

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
-- Cấu trúc bảng cho bảng `nhatky`
--

CREATE TABLE `nhatky` (
  `id_nk` int(11) NOT NULL,
  `sanpham` int(11) NOT NULL,
  `vungsanxuat` int(11) DEFAULT NULL,
  `doanhnghiep` int(11) DEFAULT NULL,
  `nguoidang` int(11) NOT NULL,
  `tennhatky` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chitiet` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thoigiantao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `thanhvien` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhatky`
--

INSERT INTO `nhatky` (`id_nk`, `sanpham`, `vungsanxuat`, `doanhnghiep`, `nguoidang`, `tennhatky`, `chitiet`, `hinhanh`, `thoigiantao`, `thanhvien`) VALUES
(1, 13, NULL, NULL, 1, 'Thăm vườn ổi', 'Vip nhe', 'vngoods_69_466816.jpg', '2024-04-22 02:48:06', NULL),
(2, 16, NULL, NULL, 9, 'Nuôi trồng dừa', 'Thông báo này là một lỗi từ PHP, cụ thể là một lỗi \"unlink\". Hàm \"unlink\" được sử dụng để xóa một tệp (file) từ hệ thống tệp của máy chủ. Tuy nhiên, trong trường hợp này, PHP đã gặp vấn đề khi cố gắng xóa tệp \"uploads/WIN_20240123_22_25_18_Pro.jpg\" vì không tìm thấy tệp đó trong thư mục được chỉ định.\r\n\r\nCó thể có một số lý do dẫn đến lỗi này:\r\n\r\n1. **Tệp không tồn tại:** Có thể rằng tệp đã bị xóa hoặc đã được di chuyển sang một vị trí khác trước khi hàm \"unlink\" được gọi.\r\n  \r\n2. **Quyền truy cập không đúng:** PHP không có quyền truy cập để xóa tệp đó. Đảm bảo rằng quyền truy cập (permissions) cho tệp và thư mục đó được cấu hình đúng.\r\n\r\n3. **Đường dẫn không chính xác:** Có thể đã xảy ra lỗi khi tạo đường dẫn đến tệp.\r\n\r\nĐể khắc phục lỗi này, bạn có thể:\r\n\r\n- Kiểm tra xem tệp có tồn tại trong thư mục \"uploads\" không.\r\n- Đảm bảo rằng bạn đang sử dụng đúng đường dẫn tệp.\r\n- Đảm bảo rằng PHP có quyền truy cập để xóa tệp từ thư mục đó.\r\n- Kiểm tra xem có bất kỳ vấn đề nào với quyền truy cập hoặc phân quyền tệp.\r\n\r\nNếu không tìm thấy vấn đề nào trong các điều kiện trên, bạn có thể cần xem xét cách gọi hàm \"unlink\" để đảm bảo rằng nó được gọi đúng cách và với đúng đối số.', 'cay-giong-dua-sap-2.png', '2024-04-25 06:21:09', NULL),
(4, 1, NULL, NULL, 6, 'Thăm lúa trên đồng', 'Nơi này, dưới bức trời xanh thẳm của miền quê, đồng lúa mênh mông mở ra như một bức tranh sống động của sự sống và mùa màng. Cánh đồng bát ngát, xanh mướt lan tỏa đến tận chân trời, như một biển cỏ uốn lượn theo làn gió êm đềm.\r\n\r\nÁnh nắng mặt trời len lỏi qua từng cọng lúa, tạo nên những đường nét sáng tối đan xen trên mặt đất, nhấp nhô theo nhịp sinh học của tự nhiên. Dưới bức tranh màu xanh của lúa chín, những đám mây trắng bồng bềnh trôi qua, làm cho không gian trở nên phong phú và sống động hơn bao giờ hết.\r\n\r\nÂm thanh của gió thổi qua, đào thải không gian với tiếng xào xạc nhẹ nhàng của lá cây. Tiếng ve kêu liên tục, như những nốt nhạc êm đềm của mùa hạ. Cảm giác thời gian dường như chậm lại, mỗi khoảnh khắc trở nên đầy ắp và trọn vẹn, khiến lòng người thấm đẫm hòa mình vào vẻ đẹp bình yên của đồng lúa.', '662bfc4bf00c0_2901100.jpg', '2024-04-28 08:34:28', NULL),
(6, 19, NULL, NULL, 3, 'Thăm vườn ổi', 'Thông báo này là một lỗi từ PHP, cụ thể là một lỗi \"unlink\". Hàm \"unlink\" được sử dụng để xóa một tệp (file) từ hệ thống tệp của máy chủ. Tuy nhiên, trong trường hợp này, PHP đã gặp vấn đề khi cố gắng xóa tệp \"uploads/WIN_20240123_22_25_18_Pro.jpg\" vì không tìm thấy tệp đó trong thư mục được chỉ định.\r\n\r\nCó thể có một số lý do dẫn đến lỗi này:\r\n\r\n1. **Tệp không tồn tại:** Có thể rằng tệp đã bị xóa hoặc đã được di chuyển sang một vị trí khác trước khi hàm \"unlink\" được gọi.\r\n  \r\n2. **Quyền truy cập không đúng:** PHP không có quyền truy cập để xóa tệp đó. Đảm bảo rằng quyền truy cập (permissions) cho tệp và thư mục đó được cấu hình đúng.\r\n\r\n3. **Đường dẫn không chính xác:** Có thể đã xảy ra lỗi khi tạo đường dẫn đến tệp.\r\n\r\nĐể khắc phục lỗi này, bạn có thể:\r\n\r\n- Kiểm tra xem tệp có tồn tại trong thư mục \"uploads\" không.\r\n- Đảm bảo rằng bạn đang sử dụng đúng đường dẫn tệp.\r\n- Đảm bảo rằng PHP có quyền truy cập để xóa tệp từ thư mục đó.\r\n- Kiểm tra xem có bất kỳ vấn đề nào với quyền truy cập hoặc phân quyền tệp.\r\n\r\nNếu không tìm thấy vấn đề nào trong các điều kiện trên, bạn có thể cần xem xét cách gọi hàm \"unlink\" để đảm bảo rằng nó được gọi đúng cách và với đúng đối số.', '9f07a85d7ff0087c7795b88a1de12c94.jpg', '2024-05-03 14:25:36', NULL),
(7, 15, NULL, NULL, 39, 'Thăm vườn cam', 'Thông báo này là một lỗi từ PHP, cụ thể là một lỗi \"unlink\". Hàm \"unlink\" được sử dụng để xóa một tệp (file) từ hệ thống tệp của máy chủ. Tuy nhiên, trong trường hợp này, PHP đã gặp vấn đề khi cố gắng xóa tệp \"uploads/WIN_20240123_22_25_18_Pro.jpg\" vì không tìm thấy tệp đó trong thư mục được chỉ định.\r\n\r\nCó thể có một số lý do dẫn đến lỗi này:\r\n\r\n1. **Tệp không tồn tại:** Có thể rằng tệp đã bị xóa hoặc đã được di chuyển sang một vị trí khác trước khi hàm \"unlink\" được gọi.\r\n  \r\n2. **Quyền truy cập không đúng:** PHP không có quyền truy cập để xóa tệp đó. Đảm bảo rằng quyền truy cập (permissions) cho tệp và thư mục đó được cấu hình đúng.\r\n\r\n3. **Đường dẫn không chính xác:** Có thể đã xảy ra lỗi khi tạo đường dẫn đến tệp.\r\n\r\nĐể khắc phục lỗi này, bạn có thể:\r\n\r\n- Kiểm tra xem tệp có tồn tại trong thư mục \"uploads\" không.\r\n- Đảm bảo rằng bạn đang sử dụng đúng đường dẫn tệp.\r\n- Đảm bảo rằng PHP có quyền truy cập để xóa tệp từ thư mục đó.\r\n- Kiểm tra xem có bất kỳ vấn đề nào với quyền truy cập hoặc phân quyền tệp.\r\n\r\nNếu không tìm thấy vấn đề nào trong các điều kiện trên, bạn có thể cần xem xét cách gọi hàm \"unlink\" để đảm bảo rằng nó được gọi đúng cách và với đúng đối số.', 'mae-mu-U1iYwZ8Dx7k-unsplash.jpg', '2024-05-08 20:01:28', NULL),
(24, 5, 3, 1, 65, '1', '1', '6626b5848e389_2901051_19.jpg', '2024-05-15 05:37:27', '[\"2\",\"3\",\"6\",\"9\"]');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhaxuong`
--

CREATE TABLE `nhaxuong` (
  `id_nx` int(11) NOT NULL,
  `nguoidang` int(11) NOT NULL,
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

INSERT INTO `nhaxuong` (`id_nx`, `nguoidang`, `danhmuc_nx`, `nguoidaidien`, `doanhnghiep`, `vungsanxuat`, `tennhaxuong`, `manhaxuong`, `hinhanh`, `dienthoai`, `email`, `diachi`, `dientichtongthe`, `giayphepkinhdoanh`, `giaychungnhan`, `giaykiemdinh`, `thongtin`) VALUES
(1, 1, 1, 1, 1, 3, 'Nhà xưởng tháng 2', 'NXT2', 'cf5fdedad7bccb40548c043704eae196.jpg', '086421212', 'MinhJet@12112', '16 lê thi thập', '12 m2', '662c0341d4b04_662c03041f4cc_2901099.jpg', '662e040cb9ba1_662bfc4bf00c0_2901100.jpg', '662c0341d4e9c_Black apple.jpg', ' Liên hệ anh tiến chó'),
(2, 2, 4, 9, 5, 8, 'Xưởng 03', '03NX', '371399452_1009194440311955_3419208062698528689_n.jpg', '0867512314', 'Alicia@gmail.com', 'Long Xuyên, An Giang', '120 m2', '662c03041f4cc_2901099.jpg', '662c03041f726_2901459.jpg', '662c03041f94b_tijana-drndarski-SJxDhVZR30I-unsplash.jpg', 'Liên hệ chị Alicia Meow'),
(3, 3, 3, 5, 4, 8, 'Nhà xưởng bán tạp hóa', 'TQPHOA1', 'monika-grabkowska-qSkWlOBHia0-unsplash.jpg', '075145271', 'nhuthao@gmail.com', 'Hựu thành, Trà Ôn, Vĩnh Long', '120 m2', '6626b5848e486_2901099.jpg', '6626b5848e534_a0741c15180fc9d2c0d16a879f87598e.jpg', '2901460.jpg', 'Liên hệ hào nguyễn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(11) NOT NULL,
  `taikhoan` int(11) DEFAULT NULL,
  `danhmuc` int(11) DEFAULT NULL,
  `caygiong` int(11) DEFAULT NULL,
  `vungsanxuat` int(11) DEFAULT NULL,
  `nhaxuong` int(11) DEFAULT NULL,
  `nhasanxuat` int(11) DEFAULT NULL,
  `nhaxuatkhau` int(11) DEFAULT NULL,
  `nhanhapkhau` int(11) DEFAULT NULL,
  `nhaphanphoi` int(11) DEFAULT NULL,
  `nhavanchuyen` int(11) DEFAULT NULL,
  `tensanpham` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mavach` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinhanh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gia` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `xuatxu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maqr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mota` text COLLATE utf8mb4_unicode_ci,
  `congdung` text COLLATE utf8mb4_unicode_ci,
  `hdsd` text COLLATE utf8mb4_unicode_ci,
  `thanhphan` text COLLATE utf8mb4_unicode_ci,
  `dieukienbaoquan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinhchungnhan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinhkiemdinh` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaytao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `trangthai` enum('dangchoxetduyet','daxetduyet') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'daxetduyet'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `taikhoan`, `danhmuc`, `caygiong`, `vungsanxuat`, `nhaxuong`, `nhasanxuat`, `nhaxuatkhau`, `nhanhapkhau`, `nhaphanphoi`, `nhavanchuyen`, `tensanpham`, `mavach`, `hinhanh`, `gia`, `xuatxu`, `maqr`, `mota`, `congdung`, `hdsd`, `thanhphan`, `dieukienbaoquan`, `hinhchungnhan`, `hinhkiemdinh`, `ngaytao`, `trangthai`) VALUES
(1, 2, 8, 1, 8, 1, 1, 5, 1, 5, 1, 'Táo Newzeland', 'OHD-25550', '2901141.jpg', 'Từ 110.000 - 150.000 vnđ/kg', 'Vĩnh Long', 'jakshdkjhad.png', 'Táo đẹp    ', '    Bổ sung vitamin ABCDEFGHIKLMNO', '25/12/2024', '', 'Bảo quan nơi có ánh tối', NULL, NULL, '2024-03-13 03:07:04', 'daxetduyet'),
(5, 2, 10, 1, 2, NULL, NULL, NULL, NULL, NULL, NULL, 'Ổi Đài Loan', 'NSQN-6589860', 'oi-dai-loan.jpg', '10.000 - 12.000đ/kg', 'Ấp Hiếu Trung A, Xã Hiếu Nghĩa, Vũng Liêm, Vĩnh Long', 'aaa', 'Ăn tươi khi thu hoạch', 'Có tác dụng hạ huyết áp, và giảm cholesterol trong máu.', 'Dùng ăn tươi', '', 'Bảo quản nơi khô mát', NULL, NULL, '2024-03-19 09:57:14', 'daxetduyet'),
(6, 2, 6, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, 'Ổi trung quốc', 'NSQN-6589822', 'oi-dai-loan.jpg', '40.000-50.000đ/1kg', 'Vĩnh Long', NULL, 'Giống ổi Lê có nguồn gốc từ Đài Loan, được trồng ở Việt Nam mấy năm gần đây, với đặc điểm sinh trưởng và phát triển tốt, quả mẫu mã đẹp, chất lượng có thể ngon nhất trong các loại ổi hiện có. Hiện nay đã có nhiều nhà vườn phát triển với quy mô lớn đem lại hiệu quả kinh tế cao, nhất là những nhà vườn ở vùng Bến cát - Bình Dương. Giống ổi Lê Đài Loan có năng suất cao ngay từ năm thứ nhất đã đạt trên 10tấn quả/ha cho thu nhập hàng trăm triệu đồng/ha đến năm thứ 3 đã lên tới 60 tấn quả/ha.  ', '  Trồng cây ổi trong vườn cây có múi sẽ tạo nên hiệu ứng “xua đuổi được rầy chổng cánh là tác nhân gây bệnh vàng lá Greening”. Trên cơ sở đó người ta có thể hình thành hệ sinh thái mới thật sự bền vững và kinh tế để đầu tư trồng cây có múi (không bị nhiễm bệnh vàng lá Greening) và xây dựng qui trình công nghệ sản xuất cây có múi sạch bệnh ngoài trời (không bị rầy chổng cánh xâm nhập gây hại).Trái ổi Nữ Hoàng có chất lượng ngon nhất hiện nay. Trái chủ yếu dùng để ăn tươi, hay làm mứt, sấy khô, chế biến nước giải khát, thạch jelly... Đây là loại trái nhiều chất bổ dưỡng, dễ tiêu hoá, giàu Vitamine C nhưng nghèo năng lượng nên là loại trái cây rất tốt cho người không muốn tăng cân hay cần giảm cân. Với nữ giới ăn ổi thường xuyên sẽ giúp cho làn da mịn màng và xinh đẹp hơn.Dịch chiết các bộ phận của cây ổi như búp non, lá non, vỏ rễ và vỏ thân còn được dùng làm thuốc chửa bệnh nhiễm vi khuẩn và siêu vi khuẩn. Ăn ổi thường xuyên giúp hạ đường huyết, phòng trị đái tháo đường, cải thiện chức năng tim mạch...', 'Ăn trực tiếp', '', 'Bảo quản nơi khô ráo thoáng mát', NULL, NULL, '2024-03-19 16:11:12', 'daxetduyet'),
(11, 0, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, ' Vú sữa', 'đâsdas', '371399452_1009194440311955_3419208062698528689_n.jpg', '', '', NULL, ' ', NULL, NULL, '', NULL, NULL, NULL, '2024-04-11 17:52:53', 'daxetduyet'),
(13, 0, 9, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'Vú sữa', 'đá', '371399452_1009194440311955_3419208062698528689_n.jpg', '', NULL, NULL, '', NULL, NULL, '', NULL, NULL, NULL, '2024-04-11 17:54:31', 'daxetduyet'),
(15, 3, 6, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 'Cam sành 1', '', 'xiaolong-wong-nibgG33H0F8-unsplash.jpg', '20.000 - 25.000đ/1kg', 'vĩnh Long', '1', 'Cam ngọt cam ngon cam vừa ý bạn  ', '   Bổ sung vitamin C', '', '', 'Khô ráo thoáng mát', NULL, NULL, '2024-04-22 17:47:25', 'daxetduyet'),
(16, 1, 6, 1, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'Vú sữa lò rèn', '<br /><b>Notice</b>:  Undefined index: masanpham i', 'vu_sua_lo_ren_vinh_kim.jpg', ' Từ 20.000đ đến 40.000đ tùy khu vực', 'Vĩnh long', '1', 'Cây giống \"Vú sữa lò rèn\" có nguồn gốc từ khu vực núi lò rèn, có đặc điểm lá dày, hình dáng cây cao vươn mạnh, phát triển tốt trong điều kiện ẩm   ', ' Ăn ngon, ăn vừa phải vì đây là trai cây có tính nóng', 'Ăn khi chín', '', 'Khô ráo thoáng mát', NULL, NULL, '2024-04-22 18:00:07', 'daxetduyet'),
(19, 5, 6, 1, 7, NULL, NULL, NULL, NULL, NULL, NULL, 'Chuối Tá quạ', 'NSQN000', '662bfc4bf00c0_2901100.jpg', ' Từ 200.000 - 250.000đ/1kg', 'Vĩnh Xuân', '1', 'Quả chuối to ngon ngọt nước', '   Ăn ngon', 'Nấu trước khi ăn', '', 'Nơi khô ráo', NULL, NULL, '2024-04-28 09:02:36', 'daxetduyet'),
(10000, 2, 11, 1, 11, NULL, NULL, NULL, NULL, NULL, NULL, 'Vú sữa', 'NSQN000', 'vu_sua_lo_ren_vinh_kim.jpg', ' tầm 300 - 500', '', '1', '', '', '', '', '', NULL, NULL, '2024-05-01 03:29:28', 'daxetduyet'),
(10931, 1, 1, 1, 2, 1, 1, 5, 5, 4, 1, 'Vú sữa', 'NSQN000', '371399452_1009194440311955_3419208062698528689_n.jpg', ' 120k', 'LONG AN', '1', '  Mo ta', '  1', '1', '', '1', NULL, NULL, '2024-05-03 14:28:42', 'daxetduyet'),
(10935, 2, 6, 1, 12, 1, 1, 1, 1, 5, 1, 'Khóm Cầu Đúc Hậu Giang', 'KhomCauDucHauGiang', '4189088_fdd4d556d7459fabcbbc4257e2d8146b.jpg', '14.000 đồng', 'Tỉnh Hậu Giang', NULL, 'Khóm Cầu Đúc thuộc giống Queen (Nữ Hoàng). Nét riêng của giống khóm này là trái có hình dáng thanh nhã, cuống ngắn, lõi nhỏ, mắt lồi, hố mắt hơi sâu, thịt màu vàng sậm, ít xơ, ít nước, ăn giòn và ngọt. Đặc biệt, trái khóm Cầu Đúc có thể để khoảng 10-15 ngày không bị thối. Cây khóm Cầu Đúc cao trên 1 mét, trọng lượng trung bình từ 1,5 - 2kg/trái.\r\nCây khóm xuất hiện trên mảnh đất Hậu Giang vào năm 1930, người dân Hỏa Tiến thấy giống tốt bắt đầu nhân giống ra trồng cặp bờ sông Cái Lớn. Từ đó cây khóm bám rễ và trụ vững cho đến ngày nay. Cái tên khóm Cầu Đúc được hình thành do lúc đó ở địa phương có cây cầu đúc bằng xi măng bắt ngang sông Cái Lớn tại xã Hỏa Tiến, bà con mang khóm ra đó để bán. Thương lái từ khắp nơi đến tập kết tại Cầu Đúc để mua khóm và tên “ Khóm Cầu Đúc” được hình thành. ', ' - Chứa nhiều chất chống oxy hóa, Vitamin… Tốt cho thị lực và giảm nguy cơ mắc các bệnh về mắt.- Giàu Vitamin C giúp tăng cường hệ miễn dịch, chống ho và phòng tránh cảm lạnh.- Giàu Vitamin C giúp giữ nướu răng khỏe mạnh, duy trì xương chắc khỏe.- Giàu chất xơ giúp cải thiện các vấn đề về tiêu hóa.- Giàu chất chống oxy hóa giúp chống lại các tế bào tự do, ngăn ngừa bệnh ung thư.- Nước ép và các món ăn từ khóm giúp chống viêm khớp và giảm viêm đau cơ bắp.- Khóm tốt cho sức khỏe tim mạch, ngăn ngừa xơ vữa động mạch và cải thiện lưu thông máu.', 'Sản phẩm dùng để ăn tươi hoặc chế biến thành nhiều mặt hàng khác. Có thể kể đến như: nước khóm ép, khóm sấy khô, kẹo, mứt, nước giải khát…Ngoài ra, khóm là nguyên liệu nấu ăn quen thuộc với nhiều người. Những món ăn từ khóm Cầu Đúc như: canh chua cá rô, thịt ba rọi xào khóm, khóm kho cá…BẢO QUẢN KHÓM CẦU ĐÚCĐặt nơi khô ráo thoáng sạch, tránh để ngoài nắng/mưa.Quả khóm có thể để ở nhiệt độ phòng 1 – 2 ngày. Tuy nhiên, tốt nhất là các bạn nên dùng sớm để tránh quả chín quá, dễ hư.Có thể sơ chế khóm rồi bọc trong hộp và giữ trong tủ lạnh 2 – 3 ngày.', 'Thành phần khóm Cầu Đúc chứa nhiều dưỡng chất có lợi cho sức khỏe. Đó là: nước, Calo, chất đạm, tinh bột, chất xơ, Glucid, Vitamin C, Canxi, Sắt, Photpho…', '1', NULL, NULL, '2024-05-04 15:33:38', 'daxetduyet');

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
  `doanhnghiep` int(11) DEFAULT NULL,
  `vungsanxuat` int(11) DEFAULT NULL,
  `nhaxuong` int(11) DEFAULT NULL,
  `hoten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matkhau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dienthoai` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinhdaidien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thongtin` text COLLATE utf8mb4_unicode_ci,
  `role` enum('Admin','Nongdan','Nguoidanhgia','Chuyengia','Chuyenvien','Kythuatvien','Nguoikiemdinh') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Nongdan',
  `trangthai` enum('hoatdong','khonghoatdong') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'hoatdong',
  `token` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `xacthuc` tinyint(4) NOT NULL,
  `ngaytao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id_acc`, `doanhnghiep`, `vungsanxuat`, `nhaxuong`, `hoten`, `email`, `matkhau`, `dienthoai`, `diachi`, `hinhdaidien`, `thongtin`, `role`, `trangthai`, `token`, `xacthuc`, `ngaytao`) VALUES
(1, 5, 2, 2, 'Nhà Quản Trị', 't@gmail.com', 'e358efa489f58062f10dd7316b65649e', '0795972514', 'Ấp Hiếu Trung A, Xã Hiếu Nghĩa, Vũng Liêm, Vĩnh Long', '1dd675404761933fca70.jpg', 'Liên hệ: followme403@gmail.com', 'Admin', 'hoatdong', '', 1, '2024-03-07 16:38:45'),
(2, NULL, NULL, NULL, 'Huỳnh Quốc Tiến', 'followme403@gmail.com', '7ab64083d8ff71645fd0bb3ce7e73418', '0795972514', 'Vĩnh Long', '2a2e42361e7fb321ea6e.jpg', NULL, 'Nongdan', 'hoatdong', '', 1, '2024-03-07 16:51:16'),
(3, NULL, NULL, NULL, 'Nguyễn Hoàng Minh', 'minh@gmail.com', '73882ab1fa529d7273da0db6b49cc4f3', '0983761510', 'Ấp Hiếu Trung A, Xã Hiếu Nghĩa, Vũng Liêm', '334673087_204077125634904_7023339784759206835_n.jpg', NULL, 'Admin', 'hoatdong', '', 0, '2024-03-07 17:08:47'),
(5, NULL, NULL, NULL, 'Ali', 'ly@gmail.com', '202cb962ac59075b964b07152d234b70', '1234511', '12312412', 'ali.jpg', NULL, 'Chuyengia', 'hoatdong', '', 0, '2024-04-25 04:08:11'),
(6, NULL, NULL, NULL, 'Tiens Chos', 'aa@gmail.com', '202cb962ac59075b964b07152d234b70', '11', '11', '371399452_1009194440311955_3419208062698528689_n.jpg', NULL, 'Chuyenvien', 'hoatdong', '', 0, '2024-04-25 04:08:28'),
(9, NULL, NULL, NULL, 'Trương Thị Lý', 'ly@gmail.com', '202cb962ac59075b964b07152d234b70', '0345128645', 'Gành Hào , Đông Hải. Bạc Liêu', 'ali.jpg', NULL, 'Nguoikiemdinh', 'hoatdong', '', 0, '2024-04-26 20:13:03'),
(10, NULL, NULL, NULL, 'Hào Nguyên', 'hao@gmail.com', '202cb962ac59075b964b07152d234b70', '075652', 'Hựu Thành', 'vngoods_69_466816.jpg', NULL, 'Kythuatvien', 'hoatdong', '', 0, '2024-04-28 07:58:29'),
(12, 1, 1, 1, 'Nguyễn Văn B', 'A@gmail.com', '202cb962ac59075b964b07152d234b70', '1230723', 'Tây Hồ,Hà Nội', 'vngoods_69_466816.jpg', '1', 'Nguoidanhgia', 'hoatdong', '', 0, '2024-05-05 01:37:33'),
(39, 0, 0, 0, 'Nguyễn Hoàng Minhh', 'hoangminh1701hn@gmail.com', '22bad0924c98e7d022dc3bd6c58ab6ef', '0795972514', 'Vĩnh Long', 'jisoo.jpg', '', 'Chuyengia', 'hoatdong', '', 1, '2024-05-06 10:50:29'),
(65, 5, 2, 2, 'Minh Jet', 'minhok3699@gmail.com', '202cb962ac59075b964b07152d234b70', '043212312', 'Vĩnh Long A', '53f46a097f18de468709.jpg', 'Đẹp trai', 'Nongdan', 'hoatdong', '', 1, '2024-05-08 21:55:26');

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
(2, 2, 1, 'Mô hình trồng Mít ruột đỏ', 'VL-2023-Mít ruột đỏ', 'mitruotdo.png', '', ' 093844954', 'Ấp Hiếu Trung A, Xã Hiếu Nghĩa, Huyện Vũng Liêm, Vĩnh Long', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1237.776886035251!2d106.08852555390523!3d9.959266065139339!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1713787442693!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '', '15 ha', 'haha', '2024-03-16 08:04:25'),
(3, 1, 1, 'Vùng sản xuất khóm MD222222222', 'MD2- Phụng Hiệp', 'vsxKhom.jpg', '', '0795972514', 'Ấp Phương Thạnh, xã Phương Bình, huyện Phụng Hiệp, tỉnh Hậu Giang', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1237.7702665847064!2d106.08586575078246!3d9.961010901923773!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a06d5f8d77fd9f%3A0xee6d7593a02651dd!2zQ-G6plUgxJDDjE5IIFRI4bqmTiBI4buwVSBUSMOATkg!5e0!3m2!1svi!2s!4v1713787466618!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '', '120 ha', 'Liên hệ: Trần Trung Tính, Trưởng Trạm KN huyện Phụng Hiệp Điện Thoại: 0907404946', '2024-04-22 03:20:51'),
(7, 65, 1, 'Vựa dừa bến tre phân phối dừa trên toàn quốc ', 'KSA-12723', '6626b5848e486_2901099.jpg', '', '07512341', 'X37P+QW5, Ấp Hiếu Văn, Vũng Liêm, Vĩnh Long, Việt Nam', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1717.0766420031216!2d106.08700955856811!3d9.963501837977656!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a06c0d4f7dff9f%3A0x79c5eaf721ac022f!2zQ8OieSB4xINuZyBHaWFuZyBTxqFuIDEgLSBQRVRJTUVY!5e0!3m2!1svi!2s!4v1714023710674!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '1 ngày không xa đâu', '12', 'Liên hệ anh tiến', '2024-04-25 05:25:21'),
(8, 1, 1, 'Tạp Hoá Út Sương - Chuyên bán các loại mỹ phẩm', 'THUS-1251', 'utsuong.jpg', '', '012375211', 'Số 5, tổ 1, ấp, vĩnh thiện, Trà Ôn, Vĩnh Long, Việt Nam', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1124.141955884011!2d106.07149964794027!3d9.967819253515213!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a06dd1c2bacd5f%3A0x2705079268ffe1fb!2zVOG6oXAgSG_DoSDDmnQgU8awxqFuZw!5e0!3m2!1svi!2s!4v1714023975897!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '1 ngày nào đó sẽ đi đâu về đâu', '1ha', 'Nhà anh Hào Nguyễn', '2024-04-25 05:46:54'),
(11, 1, 2, 'Nông sản Yến Vĩnh Long 1', '12SAX 1', '371399452_1009194440311955_3419208062698528689_n.jpg', '', '1222222222', '14/7 A Tân Hưng, Tân Hạnh, Long Hồ, Vĩnh Long, Việt Nam1', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d155249.6170494607!2d105.72595698583741!3d10.298768509094236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a07996002d2559%3A0xf6626c089c06849!2zTsO0bmcgc-G6o24gWeG6v24gVsSpbmggTG9uZw!5e0!3m2!1svi!2s!4v1714062449664!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '10 năm1', '121', 'Không có1', '2024-04-25 16:28:20'),
(12, 2, 2, 'Khóm Hậu Giang', 'Khom-HG22442', 'a9b29e6fa2f417dad34928434b0de2eb.jpg', '', '0795972514', 'WQVX+W8R, Phú An, Châu Thành, Hậu Giang, Vietnam', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14004.668593110046!2d105.78340003394524!3d9.940135132861137!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0618fbcd87ad1%3A0x3d8555fe376fb5bb!2zVsaw4budbiBNYWkgVsOgbmcgSOG6rXUgR2lhbmc!5e0!3m2!1sen!2sus!4v1714834352087!5m2!1sen!2sus\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', ' Quanh năm', ' 2285 ha', '', '2024-05-04 14:53:11');

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
  ADD PRIMARY KEY (`id_cg`),
  ADD KEY `nhasanxuat` (`nhasanxuat`),
  ADD KEY `nhanphanphoi` (`nhaphanphoi`),
  ADD KEY `nguoidang` (`nguoidang`);

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
  ADD KEY `danhmuc_dn` (`danhmuc_dn`) USING BTREE,
  ADD KEY `nguoidang` (`nguoidang`);

--
-- Chỉ mục cho bảng `header_info`
--
ALTER TABLE `header_info`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nhatky`
--
ALTER TABLE `nhatky`
  ADD PRIMARY KEY (`id_nk`),
  ADD UNIQUE KEY `sanpham` (`sanpham`),
  ADD UNIQUE KEY `nguoidang` (`nguoidang`),
  ADD KEY `vungsanxuat` (`vungsanxuat`),
  ADD KEY `doanhnghiep` (`doanhnghiep`);

--
-- Chỉ mục cho bảng `nhaxuong`
--
ALTER TABLE `nhaxuong`
  ADD PRIMARY KEY (`id_nx`),
  ADD KEY `nguoidaidien` (`nguoidaidien`),
  ADD KEY `doanhnghiep` (`doanhnghiep`),
  ADD KEY `vungsanxuat` (`vungsanxuat`),
  ADD KEY `danhmuc_nx` (`danhmuc_nx`) USING BTREE,
  ADD KEY `nguoidang` (`nguoidang`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `taikhoan` (`taikhoan`) USING BTREE,
  ADD KEY `danhmuc` (`danhmuc`) USING BTREE,
  ADD KEY `caygiong` (`caygiong`),
  ADD KEY `vungsanxuat` (`vungsanxuat`),
  ADD KEY `nhavanchuyen` (`nhavanchuyen`),
  ADD KEY `nhaphanphoi` (`nhaphanphoi`),
  ADD KEY `nhanhapkhau` (`nhanhapkhau`),
  ADD KEY `nhaxuatkhau` (`nhaxuatkhau`),
  ADD KEY `nhasanxuat` (`nhasanxuat`),
  ADD KEY `nhaxuong` (`nhaxuong`);

--
-- Chỉ mục cho bảng `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id_acc`),
  ADD KEY `doanhnghiep` (`doanhnghiep`),
  ADD KEY `vungsanxuat` (`vungsanxuat`),
  ADD KEY `nhaxuong` (`nhaxuong`);

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
  MODIFY `id_bv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `caygiong`
--
ALTER TABLE `caygiong`
  MODIFY `id_cg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `id_dg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id_dm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `danhmuc_dn`
--
ALTER TABLE `danhmuc_dn`
  MODIFY `id_dmdn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `danhmuc_nx`
--
ALTER TABLE `danhmuc_nx`
  MODIFY `id_dmnx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `doanhnghiep`
--
ALTER TABLE `doanhnghiep`
  MODIFY `id_dn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `nhatky`
--
ALTER TABLE `nhatky`
  MODIFY `id_nk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `nhaxuong`
--
ALTER TABLE `nhaxuong`
  MODIFY `id_nx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10936;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id_acc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT cho bảng `vungsanxuat`
--
ALTER TABLE `vungsanxuat`
  MODIFY `id_vung` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
