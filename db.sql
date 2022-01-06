-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 06, 2022 lúc 02:18 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `web_shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cates`
--

CREATE TABLE `cates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cates`
--

INSERT INTO `cates` (`id`, `name`, `order`, `alias`, `created_at`, `updated_at`) VALUES
(2, 'Sản Phẩm', 2, 'san-pham', '2017-01-10 19:03:11', '2021-11-23 14:54:37'),
(3, 'Khuyến Mại', 3, 'khuyen-mai', '2017-01-10 19:04:40', '2021-11-23 14:54:59'),
(4, 'Giỏ Quà Tặng', 4, 'gio-qua-tang', '2017-01-11 05:10:47', '2021-11-23 14:55:11'),
(5, 'Liên Hệ', 5, 'lien-he', '2017-01-11 05:11:45', '2021-11-23 14:55:23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cates_lv1`
--

CREATE TABLE `cates_lv1` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) DEFAULT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_cate` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cates_lv1`
--

INSERT INTO `cates_lv1` (`id`, `name`, `order`, `alias`, `id_cate`, `created_at`, `updated_at`) VALUES
(1, 'Hàng mới ', 2, 'hang-moi', 2, '2021-11-24 22:41:53', '2021-11-25 07:11:25'),
(3, 'Trái cây tươi', 6, 'trai-cay-tuoi', 2, '2021-11-24 22:43:01', '2021-11-25 07:09:17'),
(6, 'Trái cây khô', 7, 'trai-cay-kho', 2, '2021-11-25 05:21:05', '2021-11-25 07:09:45'),
(7, 'Hàng giảm giá', 8, 'hang-giam-gia', 2, '2021-11-25 05:21:23', '2021-11-25 07:12:10'),
(17, 'Hàng chạy date', 13, 'hang-chay-date', 3, '2021-11-24 22:33:13', '2021-11-25 07:14:54'),
(20, 'Chương trình giảm giá', 16, 'chuong-trinh-giam-gia', 3, '2021-11-24 22:33:53', '2021-11-25 07:14:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cates_lv2`
--

CREATE TABLE `cates_lv2` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_cate_lv1` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cates_lv2`
--

INSERT INTO `cates_lv2` (`id`, `name`, `alias`, `id_cate_lv1`, `created_at`, `updated_at`) VALUES
(18, 'Dưa Hấu', 'dua-hau', 3, '2021-11-13 07:11:00', '2021-11-25 07:20:57'),
(19, 'Mận Hậu', 'man-hau', 3, '2021-11-11 22:25:19', '2021-11-25 07:20:43'),
(20, 'Bơ Boot Daklak', 'bo-boot-daklak', 3, '2021-11-11 22:25:32', '2021-11-25 07:20:19'),
(21, 'Xoài', 'xoai', 3, '2021-11-11 22:25:49', '2021-11-25 07:19:56'),
(22, 'Nho Ninh Thuận', 'nho-ninh-thuan', 3, '2021-11-24 22:26:08', '2021-11-25 07:19:42'),
(23, 'Sầu Riêng', 'sau-rieng', 3, '2021-11-24 22:26:24', '2021-11-25 07:19:28'),
(24, 'Vải', 'vai', 3, '2021-11-24 22:26:39', '2021-11-25 07:19:17'),
(27, 'Khổ Qua sấy', 'kho-qua-say', 6, '2021-11-24 22:27:43', '2021-11-25 07:18:53'),
(28, 'Chuối sấy', 'chuoi-say', 6, '2021-11-24 22:27:59', '2021-11-25 07:18:33'),
(29, 'Vải khô', 'vai-kho', 6, '2021-11-24 22:28:13', '2021-11-25 07:18:03'),
(30, 'Mít sấy', 'mit-say', 6, '2021-11-24 22:28:30', '2021-11-25 07:17:48'),
(31, 'Ổi', 'oi', 7, '2021-11-24 22:29:23', '2021-11-25 07:17:29'),
(32, 'Mít', 'mit', 7, '2021-11-24 22:29:38', '2021-11-25 07:17:18'),
(34, 'Ổi tứ quý', 'oi-tu-quy', 3, '2021-11-25 12:28:52', '2021-11-25 12:28:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ct_hoadon`
--

CREATE TABLE `ct_hoadon` (
  `id` int(10) UNSIGNED NOT NULL,
  `ma_hd` int(10) UNSIGNED NOT NULL,
  `id_product` int(11) NOT NULL,
  `soluong` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ct_hoadon`
--

INSERT INTO `ct_hoadon` (`id`, `ma_hd`, `id_product`, `soluong`, `created_at`, `updated_at`) VALUES
(19, 11, 62, 1, '2021-11-25 13:13:16', '2021-11-25 13:13:16'),
(20, 12, 68, 4, '2021-11-25 14:21:52', '2021-11-25 14:21:52'),
(21, 13, 73, 1, '2021-11-29 13:30:55', '2021-11-29 13:30:55'),
(22, 14, 70, 16, '2021-11-30 14:53:50', '2021-11-30 14:53:50'),
(23, 15, 70, 1, '2021-12-03 01:33:52', '2021-12-03 01:33:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id` int(10) UNSIGNED NOT NULL,
  `hoten` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sdt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `tongtien` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id`, `hoten`, `sdt`, `diachi`, `email`, `ghichu`, `tongtien`, `status`, `created_at`, `updated_at`) VALUES
(11, 'Trần Thị Thanh', '0393232905', 'quảng xương - thanh hóa', 'ttt2kqx2@gmail.com', 'sầu chưa chín,hàng hạt lép', 85000, 0, '2021-11-25 13:13:16', '2021-11-25 13:13:16'),
(12, 'Trần Thị Thanh', '0393232905', 'thanh hóa', 'ttt2kqx2@gmail.com', 'hạt lép', 400000, 1, '2021-11-25 14:21:52', '2021-11-29 14:20:49'),
(13, 'Trần Thị Thanh', '0393232905', 'thanh hóa', 'ttt2kqx2@gmail.com', 'hàng ngon', 15000, 1, '2021-11-29 13:30:55', '2021-11-29 14:16:31'),
(14, 'Đinh Thị Thùy Trang', '0393232905', 'th', 'ttt2kqx2@gmail.com', 'h', 720000, 0, '2021-11-30 14:53:50', '2021-11-30 14:53:50'),
(15, 'Trần Thị Thanh', '0393232905', 'th', 'ttt2kqx2@gmail.com', 'ok', 45000, 0, '2021-12-03 01:33:52', '2021-12-03 01:33:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2017_01_10_230335_theloai', 1),
(12, '2017_01_10_230704_loaiSP1', 1),
(13, '2017_01_10_230801_loaiSP2', 1),
(14, '2017_01_10_230853_sanpham', 1),
(15, '2017_01_10_231029_hinh_sanpham', 1),
(16, '2017_01_10_231136_slide', 1),
(17, '2017_01_15_112134_Hoadon', 2),
(18, '2017_01_15_112603_Ct_Hoadon', 3),
(19, '2021_11_29_210119_AddColumnStatusDonHang', 4),
(20, '2021_11_29_212236_AddColumnDescriptionToProducts', 5),
(21, '2021_11_29_214755_AddColumnQuantityToProducts', 6),
(23, '2021_11_29_224605_CreateOtp', 7),
(24, '2021_11_29_225150_AddColumnVerifiedToUsers', 8),
(25, '2021_11_30_003130_AddColumnOtpTokenToUsers', 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `otp`
--

CREATE TABLE `otp` (
  `id` int(10) UNSIGNED NOT NULL,
  `public_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `otp_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `time_create` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `otp`
--

INSERT INTO `otp` (`id`, `public_key`, `otp_code`, `time_create`, `created_at`, `updated_at`) VALUES
(1, '$2y$10$jkNHMaeFSas.z.TixClULeuEWmKLXMl71x8htLcudss3RYQb4VYmC', '42902095', '1638202200', NULL, NULL),
(2, '$2y$10$DufvsVlFC7CVCmNliLc6b.InehEGOyHHq0PkIPxXbMZHimco2xI1a', '37408200', '1638202200', NULL, NULL),
(3, '$2y$10$IidYRYvm4TFIU5PwMQSyFO9C8tdq8AcJq1xUxLupPs1ZWoFJl7VRS', '93854770', '2021-11-30 00:07:00', NULL, NULL),
(4, '$2y$10$Bth5BmV5eV8NfP4uI.qFq.cbaTm1hUwvCJ3D0eDwLbZebjHZl05bW', '57705864', '2021-11-30 00:21:58', NULL, NULL),
(5, '$2y$10$oqVu/BymAyiNIXmZRrSvnungZWA/S5UJpXa8YcC/HAt3hEG/UbCyy', '83287014', '2021-11-30 00:12:19', NULL, NULL),
(6, '$2y$10$tsKcIkmJ37NYOP/frP.iBO0wXY32Ur8l8HZnoJkLl36Vi9RcpqLW2', '46329776', '2021-11-30 00:18:27', NULL, NULL),
(8, '$2y$10$ukDE9z.gqhZp4mrn8otdWuviMBwTVXYoYJB5lJYQ3JItwtIaOitay', '46370740', '2021-11-30 00:45:21', NULL, NULL),
(9, '$2y$10$hayTu/LlLjpXQtwIJ5Vvr.qboPzBXP2pXd1sjRjL/J0Vrhxc2xv7q', '90426324', '2021-11-30 00:48:52', NULL, NULL),
(10, '$2y$10$2Q9BMc7Zno6pLf4spT9aEOzdefLpkC6CV6w1DO7mYVaNgYafLuC.C', '75285486', '2021-11-30 00:52:31', NULL, NULL),
(15, '$2y$10$JhkarSGFYD/ALdChCH7qD.Qy/DBpzD0obo2hUaJUZ7C0/7wpFaKUG', '233917', '2021-11-30 01:19:34', NULL, NULL),
(17, '$2y$10$66b/yCwwxPIPkon179pioum0jhqSRMfjdxjCdNWYt5SVJJM.7SeCW', '718468', '2021-12-02 09:31:53', NULL, NULL),
(18, '$2y$10$FhG3SEMPon2qK9lMy.UXueaqIfTven8iUfXf9/W9DmOlRn78bRs1q', '347444', '2021-12-02 09:43:11', NULL, NULL),
(19, '$2y$10$CrwQn5WpdEfSnjllxwO88.bzG.iVJ2hDsHdyG94zSPuKDZUxAwexe', '426744', '2021-12-02 09:46:08', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `sale` int(11) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `quantity` int(11) NOT NULL DEFAULT 0,
  `noibat` int(11) NOT NULL,
  `id_cate` int(10) UNSIGNED NOT NULL,
  `id_cate_lv1` int(11) DEFAULT NULL,
  `id_cate_lv2` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `alias`, `price`, `sale`, `image`, `description`, `quantity`, `noibat`, `id_cate`, `id_cate_lv1`, `id_cate_lv2`, `created_at`, `updated_at`) VALUES
(62, 'Sầu Riêng Ri6', 'sau-rieng-ri6', 85000, NULL, 'oeKg_thái sầu.jpg', '', 0, 0, 2, 3, 23, '2021-11-25 12:25:11', '2021-11-28 13:42:52'),
(63, 'Ổi tứ quý', 'oi-tu-quy', 30000, NULL, 'ibVJ_ổi tứ quý.jpg', '', 0, 0, 2, 3, 34, '2021-11-25 12:40:33', '2021-11-28 13:42:26'),
(64, 'Dưa hấu', 'dua-hau', 10000, NULL, 'ycUV_dưa.jpg', '', 0, 0, 2, 3, 18, '2021-11-25 13:09:58', '2021-11-25 13:09:58'),
(66, 'Nho', 'nho', 190000, 30000, 'pZxC_nho tím.png', '', 0, 0, 2, 3, 22, '2021-11-25 13:56:53', '2021-11-28 13:41:23'),
(67, 'Ổi tứ quý', 'oi-tu-quy', 30000, 10, 'h57e_ổi tứ quý.jpg', '', 0, 0, 4, NULL, 34, '2021-11-25 13:59:15', '2021-11-28 13:42:04'),
(68, 'Sầu Riêng Ri6', 'sau-rieng-ri6', 100000, 20000, 'J98o_sầu.jpg', '', 0, 1, 3, 20, NULL, '2021-11-25 14:03:51', '2021-11-25 14:04:34'),
(70, 'Mận Hậu Sơn La', 'man-hau-son-la', 45000, NULL, '2OJZ_mận.jpg', 'Mận hậu Mộc Châu Sơn La là đặc sản của cao nguyên Mộc Châu tươi đẹp,mận hậu Sơn La giòn giòn,chua thanh chấm muối tôm hặc chẩm cheo thì ngon tuyệt hảo Gía mận vào vụ mùa là 40 đến 45k/1kg và đặc biệt quan trọng nhất là khách hàng sẽ được hút chân không để bảo quả được lâu hơn nhé còn mận đầu vụ với trái là từ 90k đến 120k/1kg nhé\r\nLiên Hệ ZaLo/FB SĐT: 0393232905', 10, 1, 2, 3, 19, '2021-11-25 16:35:59', '2021-11-30 14:52:13'),
(71, 'Bơ Boot DakLak', 'bo-boot-daklak', 30000, NULL, 'zf1a_bơ2.jpg', '', 0, 1, 2, 1, NULL, '2021-11-25 16:37:05', '2021-11-25 16:37:05'),
(72, 'Vải Hưng Yên', 'vai-hung-yen', 15000, NULL, 'iueo_v.png', '', 0, 1, 2, 1, NULL, '2021-11-25 16:41:54', '2021-11-26 07:43:51'),
(73, 'Xoài Bình Thuận', 'xoai-binh-thuan', 15000, NULL, 'Lpqe_xoài đồng tháp.jpg', '', 0, 1, 2, 3, 21, '2021-11-25 16:43:49', '2021-11-28 13:40:49'),
(74, 'Nho Xanh', 'nho-xanh', 75000, NULL, 'e3sp_nho xanh.jpg', '', 0, 1, 2, 3, 22, '2021-11-28 13:43:46', '2021-11-29 09:19:43'),
(78, 'Mvtest', 'mvtest', 100201, 12, 'WWiM_dua hau dai.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 1, 0, 2, 3, 18, '2021-11-29 14:35:29', '2021-11-29 14:52:24'),
(79, 'Dưa hấuhh', 'dua-hauhh', 2222222, 2, 'SMmb_z2972667337558_0a52e146146d863cc9c91f389300a0d3.jpg', 'ggggggggg', 0, 0, 2, 3, 18, '2022-01-04 16:23:20', '2022-01-04 16:23:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_product` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `id_product`, `created_at`, `updated_at`) VALUES
(39, 'DAqZ_5.jpg', 3, '2021-11-13 07:11:00', '2021-11-13 07:11:00'),
(40, 'byey_7.jpg', 3, '2021-11-13 07:11:00', '2021-11-13 07:11:00'),
(41, 'mLZl_1.jpg', 60, '2021-11-13 07:11:00', '2021-11-13 07:11:00'),
(42, 'mLZl_1.jpg', 59, '2021-11-13 07:11:00', '2021-11-13 07:11:00'),
(45, 'mLZl_1.jpg', 57, '2021-11-13 07:11:00', '2021-11-13 07:11:00'),
(46, 'mLZl_1.jpg', 56, '2021-11-13 07:11:00', '2021-11-13 07:11:00'),
(47, 'mLZl_1.jpg', 55, '2021-11-13 07:11:00', '2021-11-13 07:11:00'),
(48, 'mLZl_1.jpg', 54, '2021-11-13 07:11:00', '2021-11-13 07:11:00'),
(49, 'mLZl_1.jpg', 53, '2021-11-13 07:11:00', '2021-11-13 07:11:00'),
(50, 'mLZl_1.jpg', 51, '2021-11-13 07:11:00', '2021-11-13 07:11:00'),
(51, 'mLZl_1.jpg', 58, '2021-11-13 07:11:00', '2021-11-13 07:11:00'),
(52, 'mLZl_1.jpg', 50, '2021-11-13 07:11:00', '2021-11-13 07:11:00'),
(53, 'mLZl_1.jpg', 49, '2021-11-13 07:11:00', '2021-11-13 07:11:00'),
(54, 'mLZl_1.jpg', 48, '2021-11-13 07:11:00', '2021-11-13 07:11:00'),
(55, 'mLZl_1.jpg', 47, '2021-11-13 07:11:00', '2021-11-13 07:11:00'),
(56, 'mLZl_1.jpg', 46, '2021-11-13 07:11:00', '2021-11-13 07:11:00'),
(57, 'mLZl_1.jpg', 45, '2021-11-13 07:11:00', '2021-11-13 07:11:00'),
(58, 'mLZl_1.jpg', 44, '2021-11-13 07:11:00', '2021-11-13 07:11:00'),
(59, 'mLZl_1.jpg', 43, '2021-11-13 07:11:00', '2021-11-13 07:11:00'),
(63, 'DAqZ_5.jpg', 60, '2021-11-28 13:56:11', '2021-11-28 13:56:11'),
(64, 'DAqZ_5.jpg', 60, NULL, NULL),
(65, 'DAqZ_5.jpg', 59, NULL, NULL),
(66, 'DAqZ_5.jpg', 58, NULL, NULL),
(67, 'DAqZ_5.jpg', 57, NULL, NULL),
(68, 'DAqZ_5.jpg', 56, NULL, NULL),
(69, 'DAqZ_5.jpg', 55, NULL, NULL),
(70, 'DAqZ_5.jpg', 54, NULL, NULL),
(71, 'DAqZ_5.jpg', 53, NULL, NULL),
(72, 'DAqZ_5.jpg', 52, NULL, NULL),
(73, 'DAqZ_5.jpg', 51, NULL, NULL),
(80, 'DAqZ_5.jpg', 50, NULL, NULL),
(82, 'DAqZ_5.jpg', 50, NULL, NULL),
(83, 'DAqZ_5.jpg', 49, NULL, NULL),
(84, 'DAqZ_5.jpg', 48, NULL, NULL),
(85, 'DAqZ_5.jpg', 47, NULL, NULL),
(86, 'DAqZ_5.jpg', 46, NULL, NULL),
(87, 'DAqZ_5.jpg', 47, NULL, NULL),
(88, 'DAqZ_5.jpg', 46, NULL, NULL),
(89, 'DAqZ_5.jpg', 45, NULL, NULL),
(90, 'DAqZ_5.jpg', 44, NULL, NULL),
(91, 'DAqZ_5.jpg', 43, NULL, NULL),
(92, 'DAqZ_5.jpg', 42, NULL, NULL),
(93, 'DAqZ_5.jpg', 41, NULL, NULL),
(94, 'DAqZ_5.jpg', 40, NULL, NULL),
(96, 'byey_7.jpg', 60, NULL, NULL),
(97, 'byey_7.jpg', 59, NULL, NULL),
(98, 'byey_7.jpg', 58, NULL, NULL),
(99, 'byey_7.jpg', 57, NULL, NULL),
(100, 'byey_7.jpg', 56, NULL, NULL),
(101, 'byey_7.jpg', 55, NULL, NULL),
(102, 'byey_7.jpg', 54, NULL, NULL),
(103, 'byey_7.jpg', 53, NULL, NULL),
(104, 'byey_7.jpg', 52, NULL, NULL),
(105, 'byey_7.jpg', 51, NULL, NULL),
(106, 'byey_7.jpg', 50, NULL, NULL),
(119, 'byey_7.jpg', 60, NULL, NULL),
(120, 'byey_7.jpg', 60, NULL, NULL),
(121, 'byey_7.jpg', 40, NULL, NULL),
(122, 'byey_7.jpg', 41, NULL, NULL),
(123, 'byey_7.jpg', 42, NULL, NULL),
(124, 'byey_7.jpg', 43, NULL, NULL),
(125, 'byey_7.jpg', 44, NULL, NULL),
(126, 'byey_7.jpg', 45, NULL, NULL),
(127, 'byey_7.jpg', 46, NULL, NULL),
(128, 'byey_7.jpg', 47, NULL, NULL),
(129, 'byey_7.jpg', 48, NULL, NULL),
(130, 'byey_7.jpg', 49, NULL, NULL),
(131, 'FwbA_1.jpg', 61, '2017-01-14 04:36:37', '2017-01-14 04:36:37'),
(132, 'DPAa_2.jpg', 61, '2017-01-13 21:36:37', '2017-01-13 21:36:37'),
(133, 'Ix6X_1.jpg', 61, '2017-01-15 14:56:01', '2017-01-15 14:56:01'),
(134, 'HIjp_sầu.jpg', 62, '2021-11-25 12:26:04', '2021-11-25 12:26:04'),
(135, 'ZwNk_sầu 2.jpg', 62, '2021-11-25 12:26:04', '2021-11-25 12:26:04'),
(136, 'YbxG_sầu 3.jpg', 62, '2021-11-25 12:26:04', '2021-11-25 12:26:04'),
(137, 'Dggq_sầu 4.jpg', 62, '2021-11-25 12:26:04', '2021-11-25 12:26:04'),
(138, 'thNx_ổi.jpg', 63, '2021-11-25 12:40:33', '2021-11-25 12:40:33'),
(139, '1HXQ_ổi2.jpg', 63, '2021-11-25 12:40:33', '2021-11-25 12:40:33'),
(140, 't8Ya_ổi3.jpg', 63, '2021-11-25 12:40:33', '2021-11-25 12:40:33'),
(141, 'l82w_ôi4.jpg', 63, '2021-11-25 12:40:33', '2021-11-25 12:40:33'),
(142, 'Kctd_dưa 3.jpg', 64, '2021-11-25 13:09:58', '2021-11-25 13:09:58'),
(143, 'iCh6_dưa2.jpg', 64, '2021-11-25 13:09:58', '2021-11-25 13:09:58'),
(144, '5ODw_dưa4.jpg', 64, '2021-11-25 13:09:58', '2021-11-25 13:09:58'),
(145, 'MgsX_dưa1.jpg', 64, '2021-11-25 13:09:58', '2021-11-25 13:09:58'),
(146, 'oMRg_ổi.jpg', 65, '2021-11-25 13:11:20', '2021-11-25 13:11:20'),
(147, 'yisZ_ổi2.jpg', 65, '2021-11-25 13:11:20', '2021-11-25 13:11:20'),
(148, 'jdD3_ổi3.jpg', 65, '2021-11-25 13:11:20', '2021-11-25 13:11:20'),
(149, 'r3g7_ôi4.jpg', 65, '2021-11-25 13:11:20', '2021-11-25 13:11:20'),
(150, 'CEE9_nho1.jpg', 66, '2021-11-25 13:56:53', '2021-11-25 13:56:53'),
(151, 'HDsa_nho2.jpg', 66, '2021-11-25 13:56:53', '2021-11-25 13:56:53'),
(152, 'id0j_nho3.jpeg', 66, '2021-11-25 13:56:53', '2021-11-25 13:56:53'),
(153, '31df_nho4.jpg', 66, '2021-11-25 13:56:53', '2021-11-25 13:56:53'),
(154, 'AQIP_ổi.jpg', 67, '2021-11-25 13:59:15', '2021-11-25 13:59:15'),
(155, '5I0P_ổi2.jpg', 67, '2021-11-25 13:59:15', '2021-11-25 13:59:15'),
(156, 'EMUP_ổi3.jpg', 67, '2021-11-25 13:59:15', '2021-11-25 13:59:15'),
(157, '6mjl_mận.jpg', 70, '2021-11-25 16:35:59', '2021-11-25 16:35:59'),
(158, 'Fz8M_mận1.jpg', 70, '2021-11-25 16:35:59', '2021-11-25 16:35:59'),
(159, 'sLIz_mận2.jpg', 70, '2021-11-25 16:35:59', '2021-11-25 16:35:59'),
(160, 'IotM_mận3.jpg', 70, '2021-11-25 16:35:59', '2021-11-25 16:35:59'),
(161, 'zYaz_mận 4.jpg', 70, '2021-11-25 16:35:59', '2021-11-25 16:35:59'),
(162, 'OKf7_bơ2.jpg', 71, '2021-11-25 16:37:05', '2021-11-25 16:37:05'),
(163, 'pp8y_bơ.jpg', 71, '2021-11-25 16:37:05', '2021-11-25 16:37:05'),
(164, '652m_bơ1.jpg', 71, '2021-11-25 16:37:05', '2021-11-25 16:37:05'),
(165, '5184_bơ4.jpg', 71, '2021-11-25 16:37:05', '2021-11-25 16:37:05'),
(166, 'WEvv_bơ3.jpg', 71, '2021-11-25 16:37:05', '2021-11-25 16:37:05'),
(167, '8FrC_vải.jpg', 72, '2021-11-25 16:42:37', '2021-11-25 16:42:37'),
(168, 'oI8a_vải1.jpg', 72, '2021-11-25 16:42:37', '2021-11-25 16:42:37'),
(169, '3leF_vải2.jpg', 72, '2021-11-25 16:42:37', '2021-11-25 16:42:37'),
(170, 'btCM_vải3.jpg', 72, '2021-11-25 16:42:37', '2021-11-25 16:42:37'),
(171, '3yy3_vải4.jpg', 72, '2021-11-25 16:42:37', '2021-11-25 16:42:37'),
(172, 'Q6Uu_xoài.jpg', 73, '2021-11-25 16:43:49', '2021-11-25 16:43:49'),
(173, 'gWvG_xoài1.jpg', 73, '2021-11-25 16:43:49', '2021-11-25 16:43:49'),
(174, 'thGV_xoài2.jpg', 73, '2021-11-25 16:43:49', '2021-11-25 16:43:49'),
(175, 'kLsx_xoài3.jpg', 73, '2021-11-25 16:43:49', '2021-11-25 16:43:49'),
(176, '5Wki_xoài4.jpg', 73, '2021-11-25 16:43:49', '2021-11-25 16:43:49'),
(177, 'mLZl_1.jpg', 58, '2021-11-13 07:11:00', '2021-11-13 07:11:00'),
(184, 'd3yp_dua hau dai.jpg', 78, '2021-11-29 14:43:09', '2021-11-29 14:43:09'),
(185, 'nWcZ_dua_hau_khong_hat_2f444fc8525449fb9fd75b3dba455c70_grande.jpg', 78, '2021-11-29 14:43:09', '2021-11-29 14:43:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slides`
--

INSERT INTO `slides` (`id`, `name`, `link`, `content`, `image`, `created_at`, `updated_at`) VALUES
(6, '', '', '', 'xnxq_1.jpg', '2021-11-22 14:18:18', '2021-11-22 14:18:18'),
(7, '', '', '', 'E3Nr_3.jpg', '2021-11-22 14:18:31', '2021-11-22 14:18:31'),
(8, '', '', '', 'glKT_5.jpeg', '2021-11-22 14:18:42', '2021-11-22 14:18:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `verified` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `otp_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `level`, `password`, `verified`, `remember_token`, `otp_token`, `created_at`, `updated_at`) VALUES
(4, 'Member', '', 'member@gmail.com', 0, '$2y$10$aWTWMUATmcB6O0wTeu5e5uZ.Fzv8Po7CQIZ9gbRedyvtbyyQO1Ife', 0, 'mbleowpIGfY6iN5lg7StkttkAUXMDb12REYP2lYqskD1E1JanfyJcO2ZoHkE', '', '2017-01-13 05:23:09', '2017-01-15 03:42:23'),
(6, 'Trần Thị Thanh', '0393232905', 'tranthithanh01@gmail.com', 1, '$2y$10$g8PuZr34Dvxijjdv5RiwqO/7xArCsJI5aVY/Tn72oftryvz8BinBW', 1, 'zf40syNZhzHfaq3ztJKGee06wXCfJIdwHSl31SmSx0F24WFx9zZSM4EYMWDC', '', '2021-11-22 13:50:39', '2022-01-04 15:38:19'),
(12, 'Minh Viet', '0123456789', 'saoxa37@gmail.com', 0, '$2y$10$P832gQ.3vWdyO8bpPHX/gORYoxCFEZSwBZfepRV2u9euRBJbeInqW', 1, 'gIrOflD9U96tKJX1EpB59SyZXhOONJybUlpT6eH0PRvrxBU9L5L8JExEMwQa', '', '2021-11-29 17:57:31', '2021-11-29 18:07:11'),
(13, 'thanh', '0987612343', 'tranthanh01@gmail.com', 0, '$2y$10$XbQR/OCoUIAIaLY1MH67jeSC7AlHlJiHkLUK63RaVH4hXijHZznue', 1, NULL, '', '2021-11-29 18:08:07', '2021-11-29 18:08:55'),
(16, '23', '0393232905', 'ttt2kqx2@gmail.com', 0, '$2y$10$MK7GAhIh9WhEtgfSf5eTB.1qZEMi6avOxW0.ysc5LRaJuhcBp5qeK', 1, NULL, '', '2021-11-29 18:25:36', '2021-11-29 18:26:22'),
(19, 'đinh thị thùy trang', '0987612343', 'dtttrang.18it3@vku.udn.vn', 0, '$2y$10$ydGKRheSpmpWSrdTNR.lMOxsyUAAwuHUdhc6jCnYZo4LmznsFFKm2', 0, NULL, '$2y$10$CrwQn5WpdEfSnjllxwO88.bzG.iVJ2hDsHdyG94zSPuKDZUxAwexe', '2021-12-02 02:46:08', '2021-12-02 02:46:08');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cates`
--
ALTER TABLE `cates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cates_name_unique` (`name`);

--
-- Chỉ mục cho bảng `cates_lv1`
--
ALTER TABLE `cates_lv1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cates_lv1_name_unique` (`name`),
  ADD KEY `cates_lv1_id_cate_foreign` (`id_cate`);

--
-- Chỉ mục cho bảng `cates_lv2`
--
ALTER TABLE `cates_lv2`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cates_lv2_name_unique` (`name`),
  ADD KEY `cates_lv2_id_cate_lv1_foreign` (`id_cate_lv1`),
  ADD KEY `name` (`name`);

--
-- Chỉ mục cho bảng `ct_hoadon`
--
ALTER TABLE `ct_hoadon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ct_hoadon_ma_hd_foreign` (`ma_hd`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_cate_foreign` (`id_cate`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_id_product_foreign` (`id_product`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cates`
--
ALTER TABLE `cates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `cates_lv1`
--
ALTER TABLE `cates_lv1`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `cates_lv2`
--
ALTER TABLE `cates_lv2`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `ct_hoadon`
--
ALTER TABLE `ct_hoadon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `otp`
--
ALTER TABLE `otp`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cates_lv1`
--
ALTER TABLE `cates_lv1`
  ADD CONSTRAINT `cates_lv1_id_cate_foreign` FOREIGN KEY (`id_cate`) REFERENCES `cates` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `ct_hoadon`
--
ALTER TABLE `ct_hoadon`
  ADD CONSTRAINT `ct_hoadon_ibfk_1` FOREIGN KEY (`ma_hd`) REFERENCES `hoadon` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
