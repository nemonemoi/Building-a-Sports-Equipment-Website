-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 03, 2024 lúc 07:00 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sportstore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_gh`
--

CREATE TABLE `chitiet_gh` (
  `SP_MA` int(11) NOT NULL,
  `GH_MA` int(11) NOT NULL,
  `CTGH_SOLUONG` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiet_gh`
--

INSERT INTO `chitiet_gh` (`SP_MA`, `GH_MA`, `CTGH_SOLUONG`) VALUES
(2, 6, 1),
(3, 8, 2),
(4, 2, 1),
(5, 4, 1),
(6, 3, 2),
(9, 7, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_pn`
--

CREATE TABLE `chitiet_pn` (
  `SP_MA` int(11) NOT NULL,
  `PN_STT` int(11) NOT NULL,
  `NV_MA` int(11) NOT NULL,
  `NPP_MASO` int(11) NOT NULL,
  `CTPN_SOLUONG` int(11) DEFAULT NULL,
  `CTPN_DONGIA` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiet_pn`
--

INSERT INTO `chitiet_pn` (`SP_MA`, `PN_STT`, `NV_MA`, `NPP_MASO`, `CTPN_SOLUONG`, `CTPN_DONGIA`) VALUES
(1, 1, 1, 1, 50, 26490000),
(2, 2, 1, 1, 20, 270000),
(3, 1, 1, 1, 38, 3790000),
(4, 4, 1, 1, 20, 19990000),
(5, 5, 1, 2, 32, 5990000),
(6, 6, 1, 2, 28, 9990000),
(7, 7, 1, 1, 23, 19190000),
(8, 8, 1, 1, 20, 15490000),
(9, 9, 1, 1, 23, 24190000),
(10, 10, 1, 1, 20, 21790000),
(11, 11, 1, 1, 31, 16690000),
(12, 12, 1, 1, 15, 12290000),
(13, 13, 1, 1, 15, 40990000),
(14, 14, 1, 1, 10, 23990000),
(15, 15, 1, 1, 10, 19990000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_hd`
--

CREATE TABLE `chi_tiet_hd` (
  `SP_MA` int(11) NOT NULL,
  `HD_STT` int(11) NOT NULL,
  `CTHD_SLB` int(11) DEFAULT NULL,
  `CTHD_DONGIA` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_hd`
--

INSERT INTO `chi_tiet_hd` (`SP_MA`, `HD_STT`, `CTHD_SLB`, `CTHD_DONGIA`) VALUES
(1, 1, 1, 26490000),
(4, 2, 1, 19990000),
(5, 4, 1, 5990000),
(6, 3, 2, 9990000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chuc_vu`
--

CREATE TABLE `chuc_vu` (
  `CV_MA` int(11) NOT NULL,
  `CV_TEN` varchar(100) NOT NULL,
  `CV_CALAMVIEC` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chuc_vu`
--

INSERT INTO `chuc_vu` (`CV_MA`, `CV_TEN`, `CV_CALAMVIEC`) VALUES
(1, 'admin', 'Fulltime'),
(2, 'Nhân viên bán hàng', 'Fulltime'),
(3, 'Nhân viên kế toán', 'Fulltime');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_gia`
--

CREATE TABLE `danh_gia` (
  `DG_MA` int(11) NOT NULL,
  `KH_MA` int(11) NOT NULL,
  `SP_MA` int(11) DEFAULT NULL,
  `DG_NOIDUNG` text NOT NULL,
  `DG_PHANHOI` text NOT NULL,
  `DG_SOSAO` int(11) NOT NULL,
  `DG_NGAYGIO` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_van_chuyen`
--

CREATE TABLE `don_van_chuyen` (
  `DVC_MA` int(11) NOT NULL,
  `NVC_MA` int(11) NOT NULL,
  `DVC_DIACHI` varchar(250) NOT NULL,
  `DVC_TGBATDAU` date NOT NULL,
  `DVC_TGHOANTHANH` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `don_van_chuyen`
--

INSERT INTO `don_van_chuyen` (`DVC_MA`, `NVC_MA`, `DVC_DIACHI`, `DVC_TGBATDAU`, `DVC_TGHOANTHANH`) VALUES
(1, 1, 'Tp.Cần Thơ', '2024-09-01', '2024-09-01'),
(2, 2, 'Xuân Khánh, Ninh Kiều, Cần Thơ', '2024-08-02', '2024-08-02'),
(3, 2, 'Tp - Cần Thơ', '2024-09-02', '2024-09-02'),
(4, 1, 'Sài Gòn', '2024-10-08', '2024-10-09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gio_hang`
--

CREATE TABLE `gio_hang` (
  `GH_MA` int(11) NOT NULL,
  `KH_MA` int(11) NOT NULL,
  `GH_TONGSP` int(11) NOT NULL,
  `GH_TONGTIEN` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `gio_hang`
--

INSERT INTO `gio_hang` (`GH_MA`, `KH_MA`, `GH_TONGSP`, `GH_TONGTIEN`) VALUES
(1, 1, 1, 26490000),
(2, 2, 1, 19990000),
(3, 3, 2, 19980000),
(4, 4, 1, 5990000),
(5, 1, 1, 9690000),
(6, 1, 1, 9690000),
(7, 7, 0, 0),
(8, 7, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don`
--

CREATE TABLE `hoa_don` (
  `HD_STT` int(11) NOT NULL,
  `TT_MA` int(11) NOT NULL,
  `DVC_MA` int(11) NOT NULL,
  `NV_MA` int(11) NOT NULL,
  `PTTT_MA` int(11) NOT NULL,
  `KM_MA` int(11) DEFAULT NULL,
  `GH_MA` int(11) DEFAULT NULL,
  `HD_NGAYLAP` date NOT NULL,
  `HD_TONGTIEN` float NOT NULL,
  `HD_LIDOHUY` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoa_don`
--

INSERT INTO `hoa_don` (`HD_STT`, `TT_MA`, `DVC_MA`, `NV_MA`, `PTTT_MA`, `KM_MA`, `GH_MA`, `HD_NGAYLAP`, `HD_TONGTIEN`, `HD_LIDOHUY`) VALUES
(1, 3, 1, 1, 2, NULL, 1, '2023-09-28', 26490000, ''),
(2, 3, 2, 1, 1, NULL, 2, '2023-10-02', 19990000, NULL),
(3, 3, 3, 1, 3, NULL, 3, '2023-10-02', 19980000, ''),
(4, 3, 2, 1, 1, NULL, 4, '2023-10-02', 5990000, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `KH_MA` int(11) NOT NULL,
  `KH_TEN` varchar(100) NOT NULL,
  `KH_DIACHI` text NOT NULL,
  `KH_SDT` varchar(10) NOT NULL,
  `KH_EMAIL` varchar(150) NOT NULL,
  `KH_GIOITINH` char(1) NOT NULL,
  `KH_NGAYDK` date NOT NULL,
  `KH_TENDANGNHAP` varchar(50) NOT NULL,
  `KH_MATKHAU` varchar(50) NOT NULL,
  `KH_AVATAR` varchar(200) NOT NULL,
  `KH_NGAYSINH` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`KH_MA`, `KH_TEN`, `KH_DIACHI`, `KH_SDT`, `KH_EMAIL`, `KH_GIOITINH`, `KH_NGAYDK`, `KH_TENDANGNHAP`, `KH_MATKHAU`, `KH_AVATAR`, `KH_NGAYSINH`) VALUES
(1, 'Lê Quang Minh', 'An Khánh, Ninh Kiều, Cần Thơ', '012345678', 'qminh@gmail.com', 'm', '2024-08-08', 'qminh', '123', 'qminh.jpg', '2004-09-14'),
(2, 'Lâm Như', 'Xuân Khánh, Ninh Kiều, Cần Thơ', '0909123456', 'lnhu@gmail.com', 'f', '2024-07-03', 'lnhu', '123', 'lnhu.jpg', '2002-09-12'),
(3, 'Bảo Khanh', 'Ninh Kiều, Cần Thơ', '0789643333', 'bkhanh@gmail.com', 'f', '2024-07-01', 'bkhanh', '123', 'bkhanh.jpg', '2002-08-23'),
(4, 'Nguyễn Hải', 'Hải Phòng', '0789643633', 'nguyenhai@gmail.com', 'm', '2024-09-01', 'nhai', '123', 'hai.jpg', '2003-10-15'),
(7, 'Ngô Tử Cá', 'CT', '0789643633', 'ca@gmail.com', 'm', '2024-08-12', 'cango', '123', '0ac91dcf60eac5b49cfb.jpg', '2002-10-10'),
(8, 'mit', 'CT', '0789643631', 'mit1@gmail.com', 'm', '2024-08-28', 'mit', '123', 'GOmGSEuaUAAwHyQ.jpg', '1993-06-24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khuyen_mai`
--

CREATE TABLE `khuyen_mai` (
  `KM_MA` int(11) NOT NULL,
  `KM_TGBD` date DEFAULT NULL,
  `KM_TGKT` date DEFAULT NULL,
  `KM_GIATRI` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_sp`
--

CREATE TABLE `loai_sp` (
  `LSP_MA` int(11) NOT NULL,
  `LSP_TEN` varchar(150) NOT NULL,
  `LSP_GHICHU` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loai_sp`
--

INSERT INTO `loai_sp` (`LSP_MA`, `LSP_TEN`, `LSP_GHICHU`) VALUES
(1, 'Bóng', ''),
(2, 'Phụ kiện thể thao', ''),
(3, 'Dụng cụ thể thao', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `NV_MA` int(11) NOT NULL,
  `CV_MA` int(11) NOT NULL,
  `NV_TEN` varchar(100) NOT NULL,
  `NV_DIACHI` text NOT NULL,
  `NV_SDT` varchar(10) NOT NULL,
  `NV_EMAIL` varchar(150) NOT NULL,
  `NV_GIOITINH` char(1) NOT NULL,
  `NV_NGAYSINH` date NOT NULL,
  `NV_TENDANGNHAP` varchar(50) NOT NULL,
  `NV_MATKHAU` varchar(50) NOT NULL,
  `NV_AVATAR` varchar(200) NOT NULL,
  `NV_NGAYTUYEN` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhan_vien`
--

INSERT INTO `nhan_vien` (`NV_MA`, `CV_MA`, `NV_TEN`, `NV_DIACHI`, `NV_SDT`, `NV_EMAIL`, `NV_GIOITINH`, `NV_NGAYSINH`, `NV_TENDANGNHAP`, `NV_MATKHAU`, `NV_AVATAR`, `NV_NGAYTUYEN`) VALUES
(1, 1, 'Ngô Tử Cá', 'Cần Thơ', '0789643631', 'admin@gmail.com', 'm', '2002-10-14', 'admin', '123', 'ntc-3.jpg', '2024-08-17'),
(2, 2, 'Trần Văn A', 'Cần Thơ', '0364925451', 'tva@gmail.com', 'm', '1999-04-28', 'tva', '123', '2.jpg', '2024-08-03'),
(3, 2, 'Trần Thị Yến Nhi', 'Cần Thơ', '0939526566', 'ttynhi@gmail.com', 'f', '2002-03-27', 'ttynhi', '123', 'marie.jpg', '2024-08-08'),
(4, 3, 'Trần Văn B', 'Cần Thơ', '0789643633', 'tvb@gmail.com', 'm', '2001-12-09', 'tvb', '123', 'ntc-2.jpg', '2024-08-10'),
(5, 2, 'Trần Văn D', 'SG', '0789643699', 'd@gmail.com', 'm', '0000-00-00', '123', 'sg-11134201-22110-qmazawgpjhkvc8.jpg', '3-1.jpg', '2024-09-03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha_san_xuat`
--

CREATE TABLE `nha_san_xuat` (
  `NSX_MA` int(11) NOT NULL,
  `NSX_TEN` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nha_san_xuat`
--

INSERT INTO `nha_san_xuat` (`NSX_MA`, `NSX_TEN`) VALUES
(1, 'Nike'),
(2, 'Juicemoo'),
(3, 'Spalding'),
(4, 'Li-ning'),
(5, 'Wilson'),
(6, 'Asics'),
(7, 'Jordan'),
(8, 'Mobell'),
(9, 'Itel'),
(10, 'Masstel');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha_van_chuyen`
--

CREATE TABLE `nha_van_chuyen` (
  `NVC_MA` int(11) NOT NULL,
  `NVC_TEN` varchar(100) NOT NULL,
  `NVC_CHIPHI` int(11) NOT NULL,
  `NVC_MOTA` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nha_van_chuyen`
--

INSERT INTO `nha_van_chuyen` (`NVC_MA`, `NVC_TEN`, `NVC_CHIPHI`, `NVC_MOTA`) VALUES
(1, 'Giao hàng tiết kiệm', 10000, 'Tốc độ nhanh, tiết kiệm chi phí, an toàn.'),
(2, 'Giao hàng nhanh', 15000, 'Nhanh, an toàn, giá hợp lý.\r\n'),
(3, 'J&T Express', 18000, 'Chuyển phát đơn hàng nhanh chóng.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieu_nhap`
--

CREATE TABLE `phieu_nhap` (
  `PN_STT` int(11) NOT NULL,
  `PN_NGAYNHAP` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phieu_nhap`
--

INSERT INTO `phieu_nhap` (`PN_STT`, `PN_NGAYNHAP`) VALUES
(1, '2023-09-30'),
(2, '2023-09-29'),
(3, '2023-09-29'),
(4, '2023-10-01'),
(5, '2023-10-01'),
(6, '2023-10-02'),
(7, '2023-10-04'),
(8, '2023-10-04'),
(9, '2023-10-05'),
(10, '2023-10-05'),
(11, '2023-10-05'),
(12, '2023-10-05'),
(13, '2023-10-05'),
(14, '2023-10-05'),
(15, '2023-10-05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phuong_thuc_thanh_toan`
--

CREATE TABLE `phuong_thuc_thanh_toan` (
  `PTTT_MA` int(11) NOT NULL,
  `PTTT_TEN` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phuong_thuc_thanh_toan`
--

INSERT INTO `phuong_thuc_thanh_toan` (`PTTT_MA`, `PTTT_TEN`) VALUES
(1, 'Tiền mặt.'),
(2, 'Chuyển khoản qua ngân hàng.'),
(3, 'Thẻ Visa/Mastercard/Amex/JCB');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `SP_MA` int(11) NOT NULL,
  `NSX_MA` int(11) NOT NULL,
  `LSP_MA` int(11) NOT NULL,
  `SP_TEN` varchar(200) NOT NULL,
  `SP_MAUSAC` varchar(50) NOT NULL,
  `SP_MOTA` text NOT NULL,
  `SP_TGBH` varchar(100) NOT NULL,
  `SP_HINHANH` char(200) NOT NULL,
  `SP_SOLUONGTON` int(11) NOT NULL,
  `SP_CHATLIEU` varchar(150) NOT NULL,
  `SP_KICHTHUOC` varchar(150) NOT NULL,
  `SP_GIA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`SP_MA`, `NSX_MA`, `LSP_MA`, `SP_TEN`, `SP_MAUSAC`, `SP_MOTA`, `SP_TGBH`, `SP_HINHANH`, `SP_SOLUONGTON`, `SP_CHATLIEU`, `SP_KICHTHUOC`, `SP_GIA`) VALUES
(1, 6, 2, 'Băng gối Asics 1 cái', 'Đen', 'Được thiết kế để cải thiện khả năng vận động và bảo vệ chấn thương tốt hơn. Miếng đệm đầu gối ASICS Ace Low Profile không chỉ tuyệt vời mà còn có kiểu dáng gọn gàng, thoải mái.', '', 'asics.jpg', 14, '‎43% Cotton /33% Rubber/ 24% Nylon', '‎12.7 x 12.7 x 1.78 cm', 200000),
(2, 3, 1, 'Quả Bóng Rổ NBA Spalding size 7', 'Cam', 'Dùng trong nhà / ngoài trời. Được sản xuất theo tiêu chuẩn NBA, chất liệu độc đáo của nó có thể làm cho nó trở nên phổ biến trong tất cả các hình thức trò chơi trong nhà và ngoài trời. Độ bám tuyệt vời, rê bóng tự tin giúp bạn phá vỡ mọi phòng thủ.', '1 năm', 'spalding.jpg', 20, 'Da PU', 'Size 7, chu vi bóng 75cm', 270000),
(3, 3, 1, 'Quả bóng rổ Chicago Bulls ', 'Đỏ', 'Bóng rổ Chicago Bulls team sử dụng cách phối màu đơn giản nhưng độc đáo. Bóng rổ đường phố dòng Spalding nổi tiếng, sử dụng chất liệu da có công thức hút ẩm cho cảm giác cầm trên tay tốt, độ đàn hồi và giữ khí tốt.', '1 năm', 'spalding-red.jpg', 38, 'Da PU', 'Size 7 ', 300000),
(4, 4, 1, 'Quả bóng rổ Bad Five', 'Đen', 'Bóng rổ số 7 BADFIVE sử dụng cách phối màu đơn giản và giản dị. Bóng rổ đường phố dòng Anti-Wood, màu sắc độc đáo, sử dụng chất liệu da có công thức hút ẩm cho cảm giác cầm trên tay tốt, độ đàn hồi và giữ khí tốt, đồng thời có thể sử dụng ở nhiều địa điểm khác nhau.', '1 năm', 'lining.jpg', 10, 'Da PU hút ẩm', 'Size 7', 800000),
(5, 3, 1, 'Quả bóng rổ SPALDING Street NEON BLUE', 'Xanh dương', 'Quả bóng rổ từ nhà Spalding với cách phối màu độc đáo.', '1 năm', 'spalding-blue.jpg', 5, 'Da PU', 'Size 7', 600000),
(6, 5, 1, 'Bóng tennis Wilson 1', 'Xanh lá', 'Bóng Tennis Wilson là một lựa chọn tuyệt vời cho những người chơi ở trình độ trung bình và chuyên nghiệp. Bóng có độ nảy tốt, bay đều và mang lại cảm giác êm ái khi đánh bóng. Bóng được kết hợp cảm giác tuyệt vời và độ bền cho mọi bề mặt sân. Đây là một quả bóng tuyệt vời cho những người chơi đang tìm kiếm phong độ ổn định.\r\n', '', 'wilson.jpg', 28, 'Cao su', 'Đường kính 6,25cm', 20000),
(7, 6, 2, '1 đôi vớ Asics cổ cao', 'Đen', 'Tất thể thao đệm toàn phần này hoàn hảo cho nhiều môn thể thao. Màu sắc đơn giản của tất làm cho chúng trở thành sự bổ sung tuyệt vời cho bất kỳ đồng phục đội nào.', '', 'asics-socks.jpg', 23, '93% Polyester, 5% cao su, 2% Spandex', '‎2.54 x 7.62 x 15.24 cm', 140000),
(8, 6, 2, 'Băng trán ngăn mồ hôi Asics', 'Đỏ', 'Băng trán Asics là phụ kiện không thể thiếu trong quá trình vận động liên tục như bóng rổ, cầu lông. Băng đô Asics giúp thấm hút mồ hôi chảy ra ở vùng trán hoặc ở đầu chảy xuống, thường được các VĐV sử dụng nhiều trong việc luyện tập và thi đấu. ', '', 'asics-headband.jpg', 74, '100% polyester', '24.5×9.5 cm', 140000),
(9, 1, 2, 'Băng tay ngăn mồ hôi Nike (1 cái)', 'Xanh dương', 'Có khả năng co giãn và điều chỉnh, Nike Guard Stay 2 Sleeve được thiết kế để giúp ngăn mồ hôi xuống tay—để bạn có thể tập trung vào trò chơi.', '', 'nike-armband.jpg', 20, 'Cotton', '21,6 - 22,0 cm', 100000),
(10, 7, 2, 'Băng bảo vệ khuỷu tay Jordan 1 cái', 'Đen', 'Sử dụng Giúp bảo vệ toàn bộ khuỷu tay, cánh tay và bắp tay hạn chế những chấn thương cơ khi tập luyện, thi đấu thể thao. Chống tia UV 98%  . Phần ống tay được thiết kế với lực ép tăng dần lý tưởng giúp hỗ trợ cánh tay giảm mỏi.', '', 'jordan.jpg', 20, 'Sợi: Nylon, Elastane', '25-29cm', 240000),
(11, 1, 2, 'Dụng Cụ Hỗ Trợ Mắt Cá Chân Nike Accessories Prowith Strap', 'Đen', 'Nike Accessories Pro là sản phẩm được thiết kế chuyên biệt bảo vệ mắt cá chân của bạn khi tập luyện, với các lỗ thông gió nhiều lớp ở phía sau kết hợp cùng vật liệu chắc chắn, thêm dây quai dán nâng cấp, hỗ trợ tối ưu trong từng di chuyển, giúp bạn luôn cảm thấy yên tâm khi tập luyện.', '', 'nike-ankle.jpg', 34, '30% polyester, cao su tổng hợp 30%, cao su nhiệt dẻo 20%, nylon 10%, 10% spandex', 'Chu vi 23-25cm', 500000),
(12, 1, 2, 'Đai hỗ trợ, bảo vệ cổ tay Nike Wrist Wrap', 'Đen', 'Băng cổ tay Nike Wrist Wrap chuyên dùng để tập gym, chơi võ thuật, đánh golf, chơi tennis, chơi bóng rổ... Đai hỗ trợ bảo vệ cổ tay Nike có độ đàn hồi tốt, dễ cử động, mang lại sự thoải mái nhất cho người dùng.', '', 'nike-wrist.jpg', 15, 'Sợi Polyester, Nylon, Elastane', 'Chu vi 15cm - 21cm ', 200000),
(13, 2, 1, 'Quả bóng đá Juicemoo classic đen trắng', 'Trắng', 'Quả bóng sử dụng vật liệu PVC chất lượng cao, được chế tạo bằng tay nghề thủ công tinh xảo, để sử dụng lâu dài. Bề mặt bóng mượt với ít lực cản hơn khi bay trên không, có thể cải thiện độ ổn định và khả năng ném. Đường khâu đẹp đảm bảo áp lực đều vào quả bóng, phần nào bị đá sẽ không ảnh hưởng đến khả năng ném. Thiết kế cổ điển, thiết bị đẹp để luyện tập bóng đá ở trường và cũng là món quà tuyệt vời cho trẻ em.', '1 năm', 'juicemoo.jpg', 15, 'PVC', 'Size 5', 200000),
(14, 1, 1, 'Quả bóng đá Nike Academy phối màu vàng xanh', 'Vàng xanh', 'Bóng đá Nike Academy Team sử dụng bóng cao su gia cố để duy trì áp suất không khí và hình dạng, đồng thời sử dụng đồ họa có độ tương phản cao để bạn có thể theo dõi bóng và độ xoáy của bóng.', '1 năm', 'nike.jpg', 10, 'PVC', 'Size 4', 400000),
(15, 1, 1, 'Quả bóng chuyền Nike Skills', 'Xanh dương', 'Bóng chuyền Nike Skills có thiết kế nhẹ và bền, lý tưởng cho việc luyện tập và phát triển trò chơi của bạn. Thiết kế 12 tấm giúp bạn dễ dàng quan sát độ xoáy của bóng. Các vết lõm giúp bạn căn chỉnh tay nhanh chóng.', '1 năm', 'nikevoley.jpg', 14, 'Da PVC', 'Chu vi 66cm', 500000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `trang_thai`
--

CREATE TABLE `trang_thai` (
  `TT_MA` int(11) NOT NULL,
  `TT_TEN` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `trang_thai`
--

INSERT INTO `trang_thai` (`TT_MA`, `TT_TEN`) VALUES
(0, 'Đã hủy'),
(1, 'Chờ xác nhận.'),
(2, 'Đang giao hàng.'),
(3, 'Hoàn thành.'),
(4, 'Trả hàng.');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiet_gh`
--
ALTER TABLE `chitiet_gh`
  ADD PRIMARY KEY (`SP_MA`,`GH_MA`),
  ADD KEY `FK_CTGH_GH` (`GH_MA`);

--
-- Chỉ mục cho bảng `chitiet_pn`
--
ALTER TABLE `chitiet_pn`
  ADD PRIMARY KEY (`SP_MA`,`PN_STT`,`NV_MA`,`NPP_MASO`),
  ADD KEY `FK_CTPN_NPP` (`NPP_MASO`),
  ADD KEY `FK_CTPN_PN` (`PN_STT`),
  ADD KEY `FK_DO_NV_LAP` (`NV_MA`);

--
-- Chỉ mục cho bảng `chi_tiet_hd`
--
ALTER TABLE `chi_tiet_hd`
  ADD PRIMARY KEY (`SP_MA`,`HD_STT`),
  ADD KEY `FK_MUASP` (`HD_STT`);

--
-- Chỉ mục cho bảng `chuc_vu`
--
ALTER TABLE `chuc_vu`
  ADD PRIMARY KEY (`CV_MA`);

--
-- Chỉ mục cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD PRIMARY KEY (`DG_MA`),
  ADD KEY `FK_CODANHGIA` (`KH_MA`),
  ADD KEY `FK_DG_SP` (`SP_MA`);

--
-- Chỉ mục cho bảng `don_van_chuyen`
--
ALTER TABLE `don_van_chuyen`
  ADD PRIMARY KEY (`DVC_MA`),
  ADD KEY `FK_DO` (`NVC_MA`);

--
-- Chỉ mục cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD PRIMARY KEY (`GH_MA`),
  ADD KEY `FK_COGH` (`KH_MA`);

--
-- Chỉ mục cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD PRIMARY KEY (`HD_STT`),
  ADD KEY `FK_COKM` (`KM_MA`),
  ADD KEY `FK_DUOCLAPBOI` (`NV_MA`),
  ADD KEY `FK_DVC_HD` (`DVC_MA`),
  ADD KEY `FK_RELATIONSHIP_25` (`GH_MA`),
  ADD KEY `FK_THANHTOANBANG` (`PTTT_MA`),
  ADD KEY `FK_TT_HD` (`TT_MA`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`KH_MA`);

--
-- Chỉ mục cho bảng `khuyen_mai`
--
ALTER TABLE `khuyen_mai`
  ADD PRIMARY KEY (`KM_MA`);

--
-- Chỉ mục cho bảng `loai_sp`
--
ALTER TABLE `loai_sp`
  ADD PRIMARY KEY (`LSP_MA`);

--
-- Chỉ mục cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`NV_MA`),
  ADD KEY `FK_COCHUCVU` (`CV_MA`);

--
-- Chỉ mục cho bảng `nha_san_xuat`
--
ALTER TABLE `nha_san_xuat`
  ADD PRIMARY KEY (`NSX_MA`);

--
-- Chỉ mục cho bảng `nha_van_chuyen`
--
ALTER TABLE `nha_van_chuyen`
  ADD PRIMARY KEY (`NVC_MA`);

--
-- Chỉ mục cho bảng `phieu_nhap`
--
ALTER TABLE `phieu_nhap`
  ADD PRIMARY KEY (`PN_STT`);

--
-- Chỉ mục cho bảng `phuong_thuc_thanh_toan`
--
ALTER TABLE `phuong_thuc_thanh_toan`
  ADD PRIMARY KEY (`PTTT_MA`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`SP_MA`),
  ADD KEY `FK_DUOCSX` (`NSX_MA`),
  ADD KEY `FK_THUOCLOAI` (`LSP_MA`);

--
-- Chỉ mục cho bảng `trang_thai`
--
ALTER TABLE `trang_thai`
  ADD PRIMARY KEY (`TT_MA`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiet_gh`
--
ALTER TABLE `chitiet_gh`
  ADD CONSTRAINT `FK_CTGH_GH` FOREIGN KEY (`GH_MA`) REFERENCES `gio_hang` (`GH_MA`),
  ADD CONSTRAINT `FK_CTGH_SP` FOREIGN KEY (`SP_MA`) REFERENCES `san_pham` (`SP_MA`);

--
-- Các ràng buộc cho bảng `chitiet_pn`
--
ALTER TABLE `chitiet_pn`
  ADD CONSTRAINT `FK_CTPN_NPP` FOREIGN KEY (`NPP_MASO`) REFERENCES `nha_phan_phoi` (`NPP_MASO`),
  ADD CONSTRAINT `FK_CTPN_PN` FOREIGN KEY (`PN_STT`) REFERENCES `phieu_nhap` (`PN_STT`),
  ADD CONSTRAINT `FK_CTPN_SP` FOREIGN KEY (`SP_MA`) REFERENCES `san_pham` (`SP_MA`),
  ADD CONSTRAINT `FK_DO_NV_LAP` FOREIGN KEY (`NV_MA`) REFERENCES `nhan_vien` (`NV_MA`);

--
-- Các ràng buộc cho bảng `chi_tiet_hd`
--
ALTER TABLE `chi_tiet_hd`
  ADD CONSTRAINT `FK_MUABOIHD` FOREIGN KEY (`SP_MA`) REFERENCES `san_pham` (`SP_MA`),
  ADD CONSTRAINT `FK_MUASP` FOREIGN KEY (`HD_STT`) REFERENCES `hoa_don` (`HD_STT`);

--
-- Các ràng buộc cho bảng `danh_gia`
--
ALTER TABLE `danh_gia`
  ADD CONSTRAINT `FK_CODANHGIA` FOREIGN KEY (`KH_MA`) REFERENCES `khach_hang` (`KH_MA`),
  ADD CONSTRAINT `FK_DG_SP` FOREIGN KEY (`SP_MA`) REFERENCES `san_pham` (`SP_MA`);

--
-- Các ràng buộc cho bảng `don_van_chuyen`
--
ALTER TABLE `don_van_chuyen`
  ADD CONSTRAINT `FK_DO` FOREIGN KEY (`NVC_MA`) REFERENCES `nha_van_chuyen` (`NVC_MA`);

--
-- Các ràng buộc cho bảng `gio_hang`
--
ALTER TABLE `gio_hang`
  ADD CONSTRAINT `FK_COGH` FOREIGN KEY (`KH_MA`) REFERENCES `khach_hang` (`KH_MA`);

--
-- Các ràng buộc cho bảng `hoa_don`
--
ALTER TABLE `hoa_don`
  ADD CONSTRAINT `FK_COKM` FOREIGN KEY (`KM_MA`) REFERENCES `khuyen_mai` (`KM_MA`),
  ADD CONSTRAINT `FK_DUOCLAPBOI` FOREIGN KEY (`NV_MA`) REFERENCES `nhan_vien` (`NV_MA`),
  ADD CONSTRAINT `FK_DVC_HD` FOREIGN KEY (`DVC_MA`) REFERENCES `don_van_chuyen` (`DVC_MA`),
  ADD CONSTRAINT `FK_RELATIONSHIP_25` FOREIGN KEY (`GH_MA`) REFERENCES `gio_hang` (`GH_MA`),
  ADD CONSTRAINT `FK_THANHTOANBANG` FOREIGN KEY (`PTTT_MA`) REFERENCES `phuong_thuc_thanh_toan` (`PTTT_MA`),
  ADD CONSTRAINT `FK_TT_HD` FOREIGN KEY (`TT_MA`) REFERENCES `trang_thai` (`TT_MA`);

--
-- Các ràng buộc cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD CONSTRAINT `FK_COCHUCVU` FOREIGN KEY (`CV_MA`) REFERENCES `chuc_vu` (`CV_MA`);

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `FK_DUOCSX` FOREIGN KEY (`NSX_MA`) REFERENCES `nha_san_xuat` (`NSX_MA`),
  ADD CONSTRAINT `FK_THUOCLOAI` FOREIGN KEY (`LSP_MA`) REFERENCES `loai_sp` (`LSP_MA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
