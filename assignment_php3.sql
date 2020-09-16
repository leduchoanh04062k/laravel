-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 22, 2020 lúc 07:35 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `assignment_php3`
--

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
-- Cấu trúc bảng cho bảng `vp_categories`
--

CREATE TABLE `vp_categories` (
  `cate_id` int(10) UNSIGNED NOT NULL,
  `cate_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cate_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vp_categories`
--

INSERT INTO `vp_categories` (`cate_id`, `cate_name`, `cate_slug`, `created_at`, `updated_at`) VALUES
(15, 'iPhone', 'iPhone', NULL, '2020-06-02 03:28:11'),
(17, 'Sam Sung', 'Sam Sung', '2020-06-02 01:59:47', '2020-06-02 01:59:47'),
(18, 'Apple', 'Apple', '2020-06-02 02:01:01', '2020-06-03 23:32:38'),
(19, 'HTC', 'HTC', '2020-06-02 02:01:55', '2020-06-02 02:01:55'),
(20, 'Oppo', 'Oppo', '2020-06-02 02:02:11', '2020-06-02 02:02:11'),
(21, 'Xeomi', 'Xeomi', '2020-06-02 02:02:28', '2020-06-02 02:02:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vp_comment`
--

CREATE TABLE `vp_comment` (
  `com_id` int(10) UNSIGNED NOT NULL,
  `com_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `com_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `com_content` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `com_product` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vp_products`
--

CREATE TABLE `vp_products` (
  `prod_id` int(10) UNSIGNED NOT NULL,
  `prod_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prod_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prod_price` int(11) NOT NULL,
  `prod_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prod_accessories` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prod_condition` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prod_promotion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prod_status` tinyint(4) NOT NULL,
  `prod_description` text COLLATE utf8_unicode_ci NOT NULL,
  `prod_cate` int(10) UNSIGNED NOT NULL,
  `prod_featured` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vp_products`
--

INSERT INTO `vp_products` (`prod_id`, `prod_name`, `prod_slug`, `prod_price`, `prod_img`, `prod_accessories`, `prod_condition`, `prod_promotion`, `prod_status`, `prod_description`, `prod_cate`, `prod_featured`, `created_at`, `updated_at`) VALUES
(59, 'iPhone 8', 'iPhone 8', 5050000, '5.png', 'đẹp', 'Máy đẹp 100%', '10% có người nào nhanh tay nhất', 1, '<p>M&aacute;y mới được nhập khẩu nguy&ecirc;n 1000% bao mới được bảo h&agrave;ng v&agrave; đổi mới khi thiết bị lỗi do nh&agrave; sản suất</p>', 15, 1, '2020-06-14 05:39:50', '2020-06-14 05:39:50'),
(60, 'iPhone 7', 'iPhone 7', 10000000, '7.jpg', 'đẹp tuyệt vời', 'Máy đẹp 100% mua 1 tặng phụ kiện cho những bạn nahnh nhất', '20%', 1, '<p>đẹp qu&aacute; bất ngờ</p>', 15, 1, '2020-06-14 05:44:17', '2020-06-14 05:44:17'),
(61, 'Sam Sung A50', 'Sam Sung A50', 12000000, 'samsung-galaxy-a50-055920-045942-600x600.jpg', 'mới cứng', 'Máy đẹp 100% mới cứng', '10% cho các bạn mua 2 sản phẩm tại của hàng', 1, '<p>mua m&aacute;y tặng phụ kiện đang c&oacute; chương tr&igrave;nh khuyến m&atilde;i chất lượng cao</p>', 17, 1, '2020-06-14 05:46:55', '2020-06-14 05:46:55'),
(62, 'Sam Sung A71', 'Sam Sung A71', 12000000, 'galaxy-a71-trang-didongviet_1_1_1.jpg', 'đẹp không còn gì bằng', 'Máy đẹp 100% mua 1 tặng phụ kiện cho những bạn nahnh nhất tịa của hàng', 'ưu đãi mọi khách hàng mua máy tại của hàng', 1, '<p>Ph&acirc;n kh&uacute;c điện thoại tầm trung sẽ c&agrave;ng nhộn nhịp hơn nữa với sự ra mắt của Samsung Galaxy A71. Điện thoại hấp dẫn người d&ugrave;ng bởi thiết kế độc đ&aacute;o, ..</p>', 17, 1, '2020-06-14 05:49:12', '2020-06-14 05:49:12'),
(63, 'Sam Sung A31', 'Sam Sung A31', 6290000, 'samsung-galaxy-a31-600x600-1-600x600.jpg', 'tuyệt vời', 'Máy đẹp 100% 12', '5000000', 1, '<p>TH&Ocirc;NG SỐ KỸ THUẬT , M&agrave;n h&igrave;nh , Super AMOLED, 6.4, Full HD+ , Hệ điều h&agrave;nh , Android 10 , Camera sau: , Ch&iacute;nh 48 MP &amp; Phụ 8 MP, 5 MP, 5 MP , Camera ...</p>', 17, 1, '2020-06-14 05:51:55', '2020-06-14 05:51:55'),
(64, 'Oppo A91', 'Oppo A91', 7000000, 'oppo-a91-trang-600x600-600x600.jpg', 'tuyệt ông mặt trời', 'Máy đẹp 100% 67', '10% cho các bạn mua 2 sản phẩm tại của hàng 1', 1, '<p>Điện thoại OPPO A91 ch&iacute;nh h&atilde;ng tại TGDĐ giao trong 1h, bảo h&agrave;nh tại hơn 2000 điểm to&agrave;n quốc. 1 đổi 1 th&aacute;ng đầu. C&agrave; thẻ tại nh&agrave;, trả g&oacute;p 0%.</p>', 20, 1, '2020-06-14 05:54:52', '2020-06-14 05:54:52'),
(65, 'Oppo A5S', 'Oppo A5S', 3000000, 'oppo-a5s-do-600x600-1-600x600.jpg', 'đẹp12', 'Máy đẹp 100% mua 1 tặng phụ kiện cho những bạn nahnh nhất2', '10%22', 1, '<p>Điện thoại OPPO A5s ch&iacute;nh h&atilde;ng l&agrave; smartphone 2 sim, gi&aacute; rẻ, c&oacute; trả g&oacute;p. Giao h&agrave;ng miễn ph&iacute; trong 1 giờ, 1 đổi 1 th&aacute;ng đầu nếu lỗi. MUA NGAY!</p>', 20, 1, '2020-06-14 05:56:12', '2020-06-14 05:56:12'),
(66, 'Oppo Remi5', 'Oppo Remi5', 50000000, '9.jpg', 'đẹp trên hết', 'máy ngon sịn', 'giảm giá 10%', 1, '<p>mua 1 tạng 1sp ch&aacute;t lượng tại của h&agrave;ng</p>', 20, 1, '2020-06-16 01:18:10', '2020-06-16 01:25:11'),
(71, 'iPhone 11 Pro', 'iPhone 11 Pro', 10000000, '11pro-vna-500x500.jpg', 'Máy mới còn đẹp', 'Mua kèm thêm Airpods giảm ngay 100.000VND', 'Giảm 100.000 VND cho khách đặt mua hàng Online', 1, '<ul>\r\n	<li>Hỗ trợ trả g&oacute;p 0% l&atilde;i suất qua thẻ t&iacute;n dụng, li&ecirc;n kết với 24 ng&acirc;n h&agrave;ng</li>\r\n	<li>Chỉ cần bằng l&aacute;i xe &amp; chứng minh thư</li>\r\n	<li>Trả trước từ 20% nhận m&aacute;y sau 15 ph&uacute;t</li>\r\n</ul>', 15, 0, '2020-06-16 22:35:45', '2020-06-16 22:35:45'),
(72, 'Samsung Galaxy A01', 'Samsung Galaxy A01', 2080000, 'images.jpg', 'HD+ Hệ điều hành: Android 10 Camera sau: Chính 13 MP & Phụ 2 MP', 'Màn hình: PLS TFT LCD, 5.7\"', 'Hàng chính hãng, Nguyên seal, Mới 100%, Đã kích hoạt bảo hành điện tử', 1, '<ul>\r\n	<li>Đ&atilde; k&iacute;ch hoạt bảo h&agrave;nh điện tử</li>\r\n	<li>M&agrave;n h&igrave;nh: PLS TFT LCD, 5.7&quot;, HD+</li>\r\n	<li>Hệ điều h&agrave;nh: Android 10</li>\r\n	<li>Camera sau: Ch&iacute;nh 13 MP &amp; Phụ 2 MP</li>\r\n	<li>Camera trước: 5 MP</li>\r\n	<li>CPU: Snapdragon 439 8 nh&acirc;n</li>\r\n	<li>RAM: 2 GB</li>\r\n	<li>Bộ nhớ trong: 16 GB</li>\r\n	<li>Thẻ nhớ: MicroSD, hỗ trợ tối đa 512 GB</li>\r\n	<li>Thẻ SIM: 2 Nano SIM, Hỗ trợ 4G</li>\r\n	<li>Dung lượng pin: 3000 mAh</li>\r\n	<li>Bảo mật: Mở kho&aacute; khu&ocirc;n mặt</li>\r\n</ul>', 17, 0, '2020-06-16 22:44:47', '2020-06-16 22:44:47'),
(82, 'Apple Iphone7', 'Apple Iphone7', 2400000, '6de16207f67d5249ab290540d386a0a6.jpg', 'đẹp lung linh', 'máy mới an toàn', 'đặc biệt khi mua trực tuyến', 1, '<p>iPhone 7&nbsp;mới 100% chưa active h&agrave;ng HOT v&agrave; độc dịp đầu năm, iPhone 5S mới 100% chưa active l&agrave; model đang được nhiều người săn đ&oacute;n hiện nay bởi iPhone .</p>', 18, 0, '2020-06-18 08:19:39', '2020-06-18 08:19:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vp_sliders`
--

CREATE TABLE `vp_sliders` (
  `id` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `vp_sliders`
--

INSERT INTO `vp_sliders` (`id`, `img`, `status`, `created_at`, `updated_at`) VALUES
(5, '22.jpg', 1, '2020-06-07 06:50:02', '2020-06-10 06:53:55'),
(8, 'slide-1.png', 1, '2020-06-07 06:50:51', '2020-06-07 06:50:51'),
(9, 'slide-3.png', 1, '2020-06-07 06:51:02', '2020-06-07 06:51:02'),
(10, '17.jpg', 1, '2020-06-14 22:32:03', '2020-06-18 03:41:36'),
(11, '23.jpg', 1, '2020-06-18 03:42:09', '2020-06-18 03:42:09'),
(12, '14.png', 0, '2020-06-18 03:42:22', '2020-06-18 03:42:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vp_users`
--

CREATE TABLE `vp_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vp_users`
--

INSERT INTO `vp_users` (`id`, `name`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'lehoanh', 'lehoanhtro@gmail.com', '$2y$10$LGjdVuUGJSKCsWu6zYS.s.zVuoaerH836gPIMMrf8u/sI2jKtlssO', 1, 'f4djSxc6bg2UHyTPohcIvfFFWoJfFAY8MG8gakHgvOgBLmwHZx7KOlUMB35s', NULL, NULL),
(6, 'admin', 'admin@gmail.com', '$2y$10$t1QMCMFX/UHNhUtDmK/6Ru91MoA3RLcOK6/gjI/Qi9YyoMsHLOgmS', 2, 'Ozq6xeTVSHYy9SdbSDsDLMFcFhvKpLvskvTTNr5fsilvw2NgQBl91LrdKWqI', NULL, '2020-06-12 04:22:46');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Chỉ mục cho bảng `vp_categories`
--
ALTER TABLE `vp_categories`
  ADD PRIMARY KEY (`cate_id`);

--
-- Chỉ mục cho bảng `vp_comment`
--
ALTER TABLE `vp_comment`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `vp_comment_com_product_foreign` (`com_product`);

--
-- Chỉ mục cho bảng `vp_products`
--
ALTER TABLE `vp_products`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `vp_products_prod_cate_foreign` (`prod_cate`);

--
-- Chỉ mục cho bảng `vp_sliders`
--
ALTER TABLE `vp_sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vp_users`
--
ALTER TABLE `vp_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `vp_categories`
--
ALTER TABLE `vp_categories`
  MODIFY `cate_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `vp_comment`
--
ALTER TABLE `vp_comment`
  MODIFY `com_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `vp_products`
--
ALTER TABLE `vp_products`
  MODIFY `prod_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT cho bảng `vp_sliders`
--
ALTER TABLE `vp_sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `vp_users`
--
ALTER TABLE `vp_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `vp_comment`
--
ALTER TABLE `vp_comment`
  ADD CONSTRAINT `vp_comment_com_product_foreign` FOREIGN KEY (`com_product`) REFERENCES `vp_products` (`prod_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `vp_products`
--
ALTER TABLE `vp_products`
  ADD CONSTRAINT `vp_products_prod_cate_foreign` FOREIGN KEY (`prod_cate`) REFERENCES `vp_categories` (`cate_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
