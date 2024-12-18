-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 09, 2023 lúc 10:17 PM
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
-- Cơ sở dữ liệu: `smartphone`
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
(1, 1, 5),
(4, 2, 4),
(5, 4, 1),
(6, 3, 2);

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
(2, 2, 1, 1, 20, 9690000),
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
(1, 1, 'Tp.Cần Thơ', '2023-09-29', '2023-09-30'),
(2, 2, 'Xuân Khánh, Ninh Kiều, Cần Thơ', '2023-10-02', '2023-10-02'),
(3, 2, 'Tp - Cần Thơ', '2023-10-02', '2023-10-02'),
(4, 1, 'Bạc Liêu', '2023-10-08', '2023-10-08');

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
(1, 1, 4, 79960000),
(2, 1, 4, 79960000),
(3, 2, 2, 19980000),
(4, 2, 1, 5990000);

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
  `GH_MA` int(11) NOT NULL,
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
(1, 'Trần Văn Thành', 'An Khánh, Ninh Kiều, Cần Thơ', '0356465656', 'tvthanh@gmail.com', 'm', '2023-09-01', 'tvthanh', 'tvthanh', 'team-2.jpg', '2004-09-14'),
(2, 'Nguyễn Thị Khách', 'Xuân Khánh, Ninh Kiều, Cần Thơ', '0909564825', 'ttkhach@gmail.com', 'f', '2023-09-01', 'ttkhach', 'ttkhach', 'marie.jpg', '2007-09-12'),
(3, 'Đỗ Thị Hương', 'Bình Thủy, Cần Thơ', '0356926445', 'dthuong@gmail.com', 'f', '2023-10-01', 'dthuong', 'dthuong', 'team-1.jpg', '1995-08-23'),
(4, 'Trần Văn Hải', 'Bạc Liêu', '0909782566', 'tvhai@gmail.com', 'm', '2023-10-01', 'tvhai', 'tvhai', 'pic-1.jpg', '1998-10-15'),
(5, 'Nguyễn Hoài Nam', 'Sóc Trăng', '0976254665', 'nhnam@gmail.com', 'm', '2023-10-01', 'nhnam', 'nhnam', 'macdinh.jpg', '2000-05-20');

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
(1, 'Android', ''),
(2, 'iPhone (iOS)', ''),
(3, 'Điện thoại thông dụng', '');

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
(1, 1, 'Nguyễn Thanh Liêm', 'Cần Thơ', '0398585897', 'admin@gmail.com', 'm', '2002-10-10', 'admin', 'admin', 'team-4.jpg', '2023-09-01'),
(2, 2, 'Đỗ Thanh Viên', 'Cần Thơ', '0364925451', 'dtvien@gmail.com', 'm', '1999-04-28', 'dtvien', 'dtvien', 'pic-1.jpg', '2023-09-15'),
(3, 2, 'Trần Thị Thùy Trang', 'Cần Thơ', '0939526566', 'ttttrang@gmail.com', 'm', '2000-06-15', 'ttttrang', 'ttttrang', 'marie.jpg', '2023-09-15'),
(4, 3, 'Cao Thị Yến Nhi', 'Cần Thơ', '0933902312', 'ctynhi@gmail.com', 'm', '2001-12-09', 'ctynhi', 'ctynhi', 'team-4.jpg', '2023-09-15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha_phan_phoi`
--

CREATE TABLE `nha_phan_phoi` (
  `NPP_MASO` int(11) NOT NULL,
  `NPP_TEN` varchar(150) NOT NULL,
  `NPP_DIACHI` text NOT NULL,
  `NPP_SDT` varchar(10) NOT NULL,
  `NPP_EMAIL` varchar(150) NOT NULL,
  `NPP_WEBSITE` varchar(250) NOT NULL,
  `NPP_MOTA` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nha_phan_phoi`
--

INSERT INTO `nha_phan_phoi` (`NPP_MASO`, `NPP_TEN`, `NPP_DIACHI`, `NPP_SDT`, `NPP_EMAIL`, `NPP_WEBSITE`, `NPP_MOTA`) VALUES
(1, 'Thế giới di động', 'Nguyễn Văn Linh, An Khánh, Ninh Kiều, TPCT', '0902326326', 'tgddcn1@gmail.com', 'thegioididong.com', 'Tập đoàn thế giới di động chi nhánh 1'),
(2, 'FPT', 'Nguyễn Văn Linh, Ninh Kiều, Cần Thơ', '0921515615', 'fpt@gmail.com', 'fptshop.com', 'Tập đoàn FPT shop');

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
(1, 'iPhone'),
(2, 'SAMSUNG'),
(3, 'OPPO'),
(4, 'VIVO'),
(5, 'REALME'),
(6, 'NOKIA'),
(7, 'Xiaomi'),
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
(2, 'Giao hÃ ng nhanh', 15000, 'Nhanh, an toÃ n, giÃ¡ hop lÃ½\r\n'),
(3, 'J&T Express', 18000, 'Chuyển phát đơn hàng nhanh chóng.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phan_hoi`
--

CREATE TABLE `phan_hoi` (
  `PH_MA` int(11) NOT NULL,
  `DG_MA` int(11) NOT NULL,
  `NV_MA` int(11) NOT NULL,
  `PH_NOIDUNG` text NOT NULL,
  `PH_NGAYGIO` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phieu_bao_hanh`
--

CREATE TABLE `phieu_bao_hanh` (
  `PBH_SOPHIEU` int(11) NOT NULL,
  `SP_MA` int(11) NOT NULL,
  `PBH_NGAYBANHANG` date NOT NULL,
  `PBH_NGAYHETHAN` date NOT NULL,
  `PBH_NOIDUNGBH` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `SP_IMEI` int(11) NOT NULL,
  `SP_TEN` varchar(200) NOT NULL,
  `SP_MAUSAC` varchar(50) NOT NULL,
  `SP_TINHNANG` text NOT NULL,
  `SP_TGBH` varchar(100) NOT NULL,
  `SP_HINHANH` char(200) NOT NULL,
  `SP_SOLUONGTON` int(11) NOT NULL,
  `SP_MANHINH` varchar(150) NOT NULL,
  `SP_HDH` varchar(150) NOT NULL,
  `SP_CAMTRUOC` varchar(100) NOT NULL,
  `SP_CAMSAU` varchar(100) NOT NULL,
  `SP_CPU` varchar(100) NOT NULL,
  `SP_RAM` varchar(50) NOT NULL,
  `SP_ROOM` varchar(50) NOT NULL,
  `SP_SIM` varchar(80) NOT NULL,
  `SP_PIN` varchar(80) NOT NULL,
  `SP_GIA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`SP_MA`, `NSX_MA`, `LSP_MA`, `SP_IMEI`, `SP_TEN`, `SP_MAUSAC`, `SP_TINHNANG`, `SP_TGBH`, `SP_HINHANH`, `SP_SOLUONGTON`, `SP_MANHINH`, `SP_HDH`, `SP_CAMTRUOC`, `SP_CAMSAU`, `SP_CPU`, `SP_RAM`, `SP_ROOM`, `SP_SIM`, `SP_PIN`, `SP_GIA`) VALUES
(1, 1, 2, 1021202020, 'Điện thoại IPHONE 14 PROMAX', 'Tím', 'Phát hiện va chạm (Crash Detection)<br/>Màn hình luôn hiển thị AOD<br/>Chạm 2 lần sáng màn hình<br/>Apple Pay<br/>Loa kép', '1 năm', 'iphone-14-pro-max-tim-thumb-600x600.jpg', 50, 'OLED, 6.7, Full HD+', ' iOS 16', ' 12 MP', ' Chính 48 MP & Phụ 12 MP, 12 MP', 'Apple A16 Bionic', '6 GB', '128 GB', '1 Nano SIM & 1 eSIM, Hỗ trợ 5G', '4323 mAh, 20 W', 26490000),
(2, 3, 1, 1215404211, 'Điện thoại OPPO Reno10 5G 128GB ', 'Xanh', 'Mở khoá vân tay dưới màn hình<br/>\r\nMở khoá khuôn mặt<br/>\r\nChế độ đơn giản (Giao diện đơn giản)<br/>\r\nCử chỉ thông minh<br/>\r\nMở rộng bộ nhớ RAM<br/>\r\nMàn hình luôn hiển thị AOD<br/>\r\nỨng dụng kép (Nhân bản ứng dụng)<br/>', '1 năm', 'oppo-reno10-blue-thumbnew-600x600.jpg', 20, 'AMOLED, 6.7\", Full HD+', 'Android 13', '32 MP', ' Chính 64 MP & Phụ 32 MP, 8 MP', ' MediaTek Dimensity 7050 5G 8 nhân', '8 GB', '128 GB', '2 Nano SIM (SIM 2 chung khe thẻ nhớ), Hỗ trợ 5G', ' 5000 mAh, 67 W', 9690000),
(3, 7, 1, 1022006535, 'Điện thoại Xiaomi Redmi 12 4GB', 'Bạc', 'Mở khoá vân tay cạnh viền<br/>\r\nMở khoá khuôn mặtCử chỉ thông minh<br/>\r\nMở rộng bộ nhớ RAM<br/>\r\nChặn cuộc gọi<br/>\r\nChặn tin nhắn<br/>\r\nChạm 2 lần tắt/sáng màn hình<br/>\r\nThu nhỏ màn hình sử dụng một tay<br/>\r\nĐa cửa sổ (chia đôi màn hình)<br/>\r\nKhông gian thứ hai<br/>\r\nTrợ lý ảo Google Assis<br/>', '1 năm', 'xiaomi-redmi-12-bac-thumb-600x600.jpg', 38, 'IPS LCD, 6.79\", Full HD+', 'Android 13', '8 MP', 'Chính 50 MP & Phụ 8 MP, 2 MP', 'MediaTek Helio G88', '4 GB', '128 GB', '2 Nano SIM (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G', '5000 mAh, 18 W', 3790000),
(4, 3, 1, 1252351223, 'Điện thoại OPPO Find N2 Flip 5G', 'Tím', 'Mở khoá vân tay cạnh viền<br/>\r\nMở khoá khuôn mặt<br/>\r\nCử chỉ thông minh<br/>\r\nMở rộng bộ nhớ RAM<br/>\r\nỨng dụng kép (Nhân bản ứng dụng)<br/>\r\nThu nhỏ màn hình sử dụng một tay<br/>\r\nĐa cửa sổ (chia đôi màn hình)<br/>\r\nChế độ trẻ em (Không gian trẻ em)<br/>', '1 năm', 'oppo-find-n2-flip-purple-thumb-1-600x600-1-600x600.jpg', 20, 'AMOLED, Chính 6.8\" & Phụ 3.26\", Full HD+', 'Android 13', '32 MP', 'Chính 50 MP & Phụ 8 MP', 'MediaTek Dimensity 9000+ 8 nhân', '8 GB', '256 GB', '2 Nano SIM, Hỗ trợ 5G', '4300 mAh, 44 W', 19990000),
(5, 4, 1, 1030503030, 'Điện thoại vivo Y36 128GB', 'Xanh dương', 'Mở khoá vân tay cạnh viền<br/>\r\nMở khoá khuôn mặt<br/>\r\nCử chỉ thông minh<br/>\r\nMở rộng bộ nhớ RAM<br/>\r\nMở rộng bộ nhớ RAM<br/>\r\nÂm thanh Hi-Res Audio<br/>\r\nChặn cuộc gọi<br/>\r\nChặn tin nhắn<br/>\r\nChế độ đơn giản (Giao diện đơn giản)<br/>\r\nCử chỉ thông minh<br/>\r\nChạm 2 lần tắt/sáng màn<br/>', '1 năm', 'vivo-y36-xanh-thumbnew-600x600.jpg', 32, '\r\nIPS LCD, 6.64\", Full HD+', 'Android 13', '16 MP', 'Chính 50 MP & Phụ 2 MP', '\r\nSnapdragon 680', '8 GB', '128 GB', '2 Nano SIM, Hỗ trợ 4G', '5000 mAh, 44 W', 5990000),
(6, 2, 1, 1205462504, 'Điện thoại Samsung Galaxy S21 FE 5G (6GB/128GB)', 'Xanh lá nhạt', 'Mở khoá vân tay dưới màn hình<br/>\r\nMở khoá khuôn mặt<br/>\r\nSamsung Pay<br/>\r\nÂm thanh AKG<br/>\r\nSamsung <br/>\r\nMàn hình luôn hiển thị AOD<br/>\r\nChạm 2 lần sáng màn hình<br/>\r\nÂm thanh Dolby Audio<br/>\r\nChặn cuộc gọi<br/>\r\nChặn tin nhắn<br/>\r\nTrợ lý ảo Samsung Bixby<br/>\r\nThu nhỏ màn hình sử dụng một tay<br/>\r\n', '1 năm', 'Samsung-Galaxy-S21-FE-vang-1-2-600x600.jpg', 28, 'Dynamic AMOLED 2X, 6.4\", Full HD+', 'Android 12', '32 MP', 'Chính 12 MP & Phụ 12 MP, 8 MP', 'Exynos 2100', '6 GB', '128 GB', '2 Nano Sim, Hỗ trợ 5G', '4500 mAh, 25W', 9990000),
(7, 1, 2, 1020302020, 'Điện thoại IPHONE 14', 'Tím nhạt', 'Mở khoá khuôn mặt Face ID<br/>\r\nPhát hiện va chạm (Crash Detection)<br/>\r\nChạm 2 lần sáng màn hình<br/>\r\nApple Pay<br/>\r\nLoa kép<br/>', '1 năm', 'iPhone-14-thumb-tim-1-600x600.jpg', 23, 'OLED, 6.1\", Super Retina XDR', 'iOS 16', '12 MP', '2 camera 12MP', 'Apple A15 Bionic', '6 GB', '128GB', '1 Nano SIM & 1 eSIM, Hỗ trợ 5G', '3279 mAh, 20W', 19190000),
(8, 1, 2, 1020302222, 'Điện thoại IPHONE 12 64GB', 'Xanh lá', 'Mở khoá khuôn mặt Face ID<br/>\r\nKháng nước bụi IP68<br/>\r\nGhi âm có microphone chuyên dụng chống ồn<br/>', '1 năm', 'iphone-12-xanh-la-new-2-600x600.jpg', 20, 'OLED, 6.1\", Super Retina XDR', 'iOS 15', '12 MP', '2 camera 12MP', 'Apple A14 Bionic', '4 GB', '64 GB', '1 Nano SIM & 1 eSIM, Hỗ trợ 5G', '2815 mAh, 20W', 15490000),
(9, 1, 2, 1020336549, 'Điện thoại IPHONE 14 Pro', 'Vàng', 'Mở khoá khuôn mặt Face ID<br/>\r\nPhát hiện va chạm (Crash Detection)<br/>\r\nMàn hình luôn hiển thị AOD<br/>\r\nChạm 2 lần sáng màn hình<br/>\r\nApple Pay<br/>\r\nLoa kép<br/>', '1 năm', 'iphone-14-pro-vang-thumb-600x600.jpg', 23, 'OLED, 6.1\", Super Retina XDR', 'iOS 16', '12 MP', 'Chính 48 MP & Phụ 12 MP, 12 MP', 'Apple A16 Bionic', '6 GB', '128GB', '1 Nano SIM & 1 eSIM, Hỗ trợ 5G', '3200 mAh, 20W', 24190000),
(10, 1, 2, 1020495349, 'Điện thoại IPHONE 14 Plus 128GB', 'Đen', 'Mở khoá khuôn mặt Face ID<br/>\r\nPhát hiện va chạm (Crash Detection)<br/>\r\nChạm 2 lần sáng màn hình<br/>\r\nApple Pay<br/>\r\nLoa kép<br/>', '1 năm', 'iPhone-14-plus-thumb-den-600x600.jpg', 20, 'OLED, 6.7\", Super Retina XDR', 'iOS 16', '12 MP', '2 camera 12 MP', 'Apple A15 Bionic', '6 GB', '128GB', '1 Nano SIM & 1 eSIM, Hỗ trợ 5G', '4325 mAh, 20W', 21790000),
(11, 1, 2, 1020325609, 'Điện thoại IPHONE 13 128GB', 'Hồng', 'Mở khoá khuôn mặt Face ID<br/>\r\nPhát hiện va chạm (Crash Detection)<br/>\r\nMàn hình luôn hiển thị AOD<br/>\r\nChạm 2 lần sáng màn hình<br/>\r\nApple Pay<br/>\r\nLoa kép<br/>', '1 năm', 'iphone-13-pink-2-600x600.jpg', 31, 'OLED, 6.1\", Super Retina XDR', 'iOS 15', '12 MP', '2 camera 12 MP', 'Apple A15 Bionic', '4 GB', '128GB', '1 Nano SIM & 1 eSIM, Hỗ trợ 5G', '3240 mAh, 20W', 16690000),
(12, 1, 2, 1230525222, 'Điện thoại iPhone 11 128GB', 'Đen', 'Mở khoá khuôn mặt Face ID<br/>\r\nApple Pay<br/>\r\nÂm thanh<br/>\r\nDolby Audio<br/>\r\nKháng bụi nước IP68<br/>\r\nGhi âm có microphone chuyên dụng chống ồn<br/>', '1 năm', 'iphone-11-den-600x600.jpg', 15, 'IPS LCD, 6.1\", Liquid Retina', 'iOS 15', '12 MP', '2 camera 12 MP', 'Apple A13 Bionic', '4 GB', '128GB', '1 Nano SIM & 1 eSIM, Hỗ trợ 4G', '3110 mAh, 18', 12290000),
(13, 2, 1, 1002023452, 'Điện thoại Samsung Galaxy Z Fold5 5G 512GB', 'Đen', 'Mở khoá vân tay cạnh viền<br/>\r\nMở khoá khuôn mặt<br/>\r\n\r\nCử chỉ thông minh<br/>\r\n\r\nKhông gian thứ hai (Thư mục bảo mật)<br/>\r\n\r\nỨng dụng kép (Dual Messenger)<br/>\r\n\r\nMở rộng bộ nhớ RAM<br/>\r\n\r\nMàn hình luôn hiển thị AOD<br/>\r\n\r\nBáo rung khi kết nối cuộc gọi<br/>\r\n\r\nChặn cuộc gọi<br/>\r\n\r\nChạm 2 sáng màn hình<br/>', '1 năm', 'samsung-galaxy-z-fold5- den-600x600.jpg', 15, 'Dynamic AMOLED 2X, Chính 7.6\" & Phụ 6.2\", Quad HD+ (2K+)', 'Android 13', '10 MP & 4 MP', 'Chính 50 MP & Phụ 12 MP, 10 MP', 'Snapdragon 8 Gen 2 for Galaxy', '12 GB', '512 GB', '2 Nano SIM hoặc 1 Nano SIM + 1 eSIM, Hỗ trợ 5G', '4400 mAh, 25 W', 40990000),
(14, 2, 1, 102342520, 'Điện thoại Samsung Galaxy S23 Ultra 5G 256GB', 'Xanh rêu', 'Mở khoá vân tay dưới màn hình, Mở khoá khuôn mặt<br/>\r\n\r\nĐa cửa sổ (chia đôi màn hình)<br/>\r\n\r\nKhông gian thứ hai (Thư mục bảo mật)<br/>\r\n\r\nMàn hình luôn hiển thị AOD<br/>\r\n\r\nMở rộng bộ nhớ RAM<br/>\r\n\r\nMàn hình luôn hiển thị AOD<br/>\r\n\r\nÂm thanh Dolby Atmos<br/>\r\n\r\nChặn cuộc gọi<br/>\r\n\r\nChạm 2 lần tắt/sáng màn hình<br/>\r\n\r\nTrợ lý ảo Samsung Bixby<br/>\r\n\r\nSamsung Pay<br/>\r\n\r\nLoa kép<br/>\r\n', '1 năm', 'samsung-galaxy-s23-ultra-thumb-xanh-600x600.jpg', 10, 'Dynamic AMOLED 2X, 6.8\", Quad HD+ (2K+)', 'Android 13', '10 MP & 4 MP', 'Chính 200 MP & Phụ 12 MP, 10 MP, 10 MP', 'Snapdragon 8 Gen 2 for Galaxy', '8 GB', '256 GB', '2 Nano SIM hoặc 1 Nano SIM + 1 eSIM, Hỗ trợ 5G', '5000 mAh, 45 W', 23990000),
(15, 2, 1, 102342520, 'Điện thoại Samsung Galaxy S23+ 5G 256GB', 'Xanh rêu', 'Mở khoá vân tay dưới màn hình, Mở khoá khuôn mặt<br/>\r\n\r\nĐa cửa sổ (chia đôi màn hình)<br/>\r\n\r\nKhông gian thứ hai (Thư mục bảo mật)<br/>\r\n\r\nMàn hình luôn hiển thị AOD<br/>\r\n\r\nMở rộng bộ nhớ RAM<br/>\r\n\r\nMàn hình luôn hiển thị AOD<br/>\r\n\r\nÂm thanh Dolby Atmos<br/>\r\n\r\nChặn cuộc gọi<br/>\r\n\r\nChạm 2 lần sáng/tắt màn hình<br/>', '1 năm', 'samsung-galaxy-s23-plus-3-600x600.jpg', 10, 'Dynamic AMOLED 2X, 6.6\", Full HD+', 'Android 13', '12 MP', 'Chính 50 MP & Phụ 12 MP, 10 MP', 'Snapdragon 8 Gen 2 for Galaxy', '8 GB', '256 GB', '2 Nano SIM hoặc 1 Nano SIM + 1 eSIM, Hỗ trợ 5G', '4700 mAh, 45 W', 19990000);

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
-- Chỉ mục cho bảng `nha_phan_phoi`
--
ALTER TABLE `nha_phan_phoi`
  ADD PRIMARY KEY (`NPP_MASO`);

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
-- Chỉ mục cho bảng `phan_hoi`
--
ALTER TABLE `phan_hoi`
  ADD PRIMARY KEY (`PH_MA`),
  ADD KEY `FK_CUA_DG` (`DG_MA`),
  ADD KEY `FK_DO_NV` (`NV_MA`);

--
-- Chỉ mục cho bảng `phieu_bao_hanh`
--
ALTER TABLE `phieu_bao_hanh`
  ADD PRIMARY KEY (`PBH_SOPHIEU`),
  ADD KEY `FK_CO_BH` (`SP_MA`);

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
-- Các ràng buộc cho bảng `phan_hoi`
--
ALTER TABLE `phan_hoi`
  ADD CONSTRAINT `FK_CUA_DG` FOREIGN KEY (`DG_MA`) REFERENCES `danh_gia` (`DG_MA`),
  ADD CONSTRAINT `FK_DO_NV` FOREIGN KEY (`NV_MA`) REFERENCES `nhan_vien` (`NV_MA`);

--
-- Các ràng buộc cho bảng `phieu_bao_hanh`
--
ALTER TABLE `phieu_bao_hanh`
  ADD CONSTRAINT `FK_CO_BH` FOREIGN KEY (`SP_MA`) REFERENCES `san_pham` (`SP_MA`);

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
