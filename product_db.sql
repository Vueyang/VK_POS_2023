-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2023 at 06:01 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `barcode`
--

CREATE TABLE `barcode` (
  `id` int(11) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `product` varchar(50) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `units` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `barcode`
--

INSERT INTO `barcode` (`id`, `code`, `product`, `price`, `units`) VALUES
(1, '373343328-9', 'Crab - Meat', 46, 'PGH'),
(2, '476988663-2', 'Chicken - Wieners', 37, 'TPVG'),
(3, '986716735-X', 'Flower - Commercial Bronze', 23, 'UBND'),
(4, '304731212-5', 'Bulgar', 100, 'NXPI'),
(5, '268711160-0', 'Milk - Buttermilk', 35, 'SSYS'),
(6, '203075759-4', 'Veal - Heart', 40, 'EOT'),
(7, '513220011-7', 'Soup - Knorr, Veg / Beef', 60, 'TSRO'),
(8, '719168560-3', 'Squash - Sunburst', 30, 'LHCG'),
(9, '532894227-2', 'Arizona - Green Tea', 56, 'BFO'),
(10, '784923698-X', 'Dill - Primerba, Paste', 78, 'CFRX');

-- --------------------------------------------------------

--
-- Table structure for table `product_image`
--

CREATE TABLE `product_image` (
  `img_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `pro_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `type_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `img_name` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_new`
--

CREATE TABLE `product_new` (
  `pro_id` int(6) UNSIGNED ZEROFILL NOT NULL COMMENT 'ລະຫັດສີນຄ້າ',
  `pro_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ຊື່',
  `type_id` int(7) UNSIGNED ZEROFILL NOT NULL COMMENT 'ລະຫັດປະເພດສີນຄ້າ',
  `price` float(10,2) NOT NULL COMMENT 'ລາຄາ',
  `amount` int(11) NOT NULL COMMENT 'ຈຳນວນ',
  `detail` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'ລາຍລະອຽດ',
  `image` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ຮູບ',
  `inser_date` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ເວລາມື້ເພີ່ມສີນຄ້າ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product_new`
--

INSERT INTO `product_new` (`pro_id`, `pro_name`, `type_id`, `price`, `amount`, `detail`, `image`, `inser_date`) VALUES
(000001, 'Canon', 0000004, 8500000.00, 50, 'dkjfiogkdfsgdf\r\ngsfdgfdsg\r\nsdgdsfget', 'pro_6484917b131a1.jpg', '2023-07-23 14:15:41'),
(000003, 'Iphone 12', 0000005, 15000000.00, 50, 'hhhhhhhhhhhhhhhh\r\nlkkkkkkkkk\r\nuuuuuuuuuuuu', 'pro_648491bac0509.jpg', '2023-07-18 15:07:47'),
(000005, 'mouse', 0000001, 150000.00, 51, 'khhhhhhhhhhhkdfgh\r\ngtgorektphdhglfdhd\r\nerhtgdfhet\r\ngdhtehdf\r\nsgdgtrehrtdy\r\ndgfgtreyhjwregs\r\negteryhetr', 'pro_6484920937ef2.jpg', '2023-08-05 15:58:12'),
(000007, 'keybroad', 0000002, 180000.00, 5, 'frrghgdfdgsdfg\r\nsfgsdgtr\r\nfsdfdsg\r\nasdfrtgse\r\nfsdfwrtr\r\ngsdfg', 'pro_6484931234dde.jpg', '2023-07-23 13:22:50'),
(000008, 'lanovo', 0000007, 5400000.00, 48, '', 'pro_6484934787797.jpg', '2023-07-24 14:43:25'),
(000009, 'Iphone 13', 0000005, 15000000.00, 2, '', 'pro_64856ba6635ad.jpg', '2023-08-01 14:59:52'),
(000010, 'Canon', 0000004, 5000000.00, 43, '', 'pro_64856db86802d.jpg', '2023-08-01 14:57:44'),
(000011, 'dell', 0000007, 5400000.00, 48, 'dell core i7', 'pro_6491ab30dc7fe.jpg', '2023-07-20 15:17:25'),
(000012, 'LED', 0000003, 2000000.00, 49, 'tieojfsdgiuregmls\r\n', 'pro_6499b3983cffa.jpg', '2023-07-20 14:35:28'),
(000013, 'Aser', 0000007, 5000000.00, 57, 'test meiaafkfdgilksjgdssgsdgsdf', 'pro_649fe87e308ec.jpg', '2023-08-07 14:36:44'),
(000014, 'Asu', 0000007, 6000000.00, 46, 'iytryiyoirjhkdjhtiod', 'pro_649fe8afdd14e.jpg', '2023-07-17 13:11:52'),
(000016, 'laptops', 0000007, 8000000.00, 29, 'jlhkopkpfgplhryt', 'pro_649fe94e88a1b.jpg', '2023-07-24 14:39:43'),
(000017, 'lenovo', 0000007, 5000000.00, 35, 'toioodugopguigsfgls', 'pro_649fecfcd538b.jpg', '2023-08-05 16:27:30'),
(000018, 'dell 1', 0000007, 5800000.00, 48, 'gfhfgjfgdgdfgjfjuty', 'pro_649fed487d4ab.jpg', '2023-08-05 16:29:13'),
(000019, 'dell 2', 0000007, 5000000.00, 50, 'trefsfdfhdgfgdfgdgdg', 'pro_649fed7d080ee.jpg', '2023-08-06 03:09:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `cus_id` int(6) UNSIGNED ZEROFILL NOT NULL COMMENT 'ລະຫັດລູກຄ້າ',
  `cus_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ຊື່',
  `cus_lastname` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ນາມສະກຸນ',
  `gender` int(1) NOT NULL COMMENT 'ເພດ',
  `cus_phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ເບີໂທ',
  `cus_village` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ບ້ານ',
  `cus_district` int(100) NOT NULL COMMENT 'ເມືອງ',
  `cus_provice` int(100) NOT NULL COMMENT 'ແຂວງ',
  `login_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `en_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `gender` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `en_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `en_lastname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date of birth` date NOT NULL,
  `en_phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `en_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `village` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `provice` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `responsible` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `en_image` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `insert_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`en_id`, `gender`, `en_name`, `en_lastname`, `date of birth`, `en_phone`, `en_email`, `village`, `district`, `provice`, `position`, `responsible`, `en_image`, `insert_date`) VALUES
(000004, 'ຊາຍ', 'ທ້າວ ວືຢ່າງ', 'ໄຊມົວ', '1996-06-21', '02078665114', 'nkaujkiabvang20212022@gmail.com', 'ຍອດງື່ມ', 'ແປກ', 'ຊຽງຂວາງ', 'ຜູ້ຈັດການ', 'ຜູ້ຈັດການ', '', '2023-08-08 22:58:37'),
(000005, 'ຍິງ', 'ນ່າງ ເກ້ຍວ່າງ', 'ເຍ່ຍລົ່ງວ່າງ', '1996-06-21', '02059673954', 'nkaujkiabvang20212022@gmail.com', 'ຍອດງື່ມ', 'ແປກ', 'ຊຽງຂວາງ', 'HR', 'HR', '', '2023-08-08 22:58:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `mem_id` int(6) UNSIGNED ZEROFILL NOT NULL COMMENT 'ລະຫັດພະນັກງານ',
  `en_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `ref_l_id` int(1) NOT NULL COMMENT 'ສະຖານະ',
  `mem_username` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'ຊື່ເຂົ້າໃຊ້ລະບົບ',
  `mem_password` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'ລະຫັດ',
  `date_insert` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'ເວລາ'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`mem_id`, `en_id`, `ref_l_id`, `mem_username`, `mem_password`, `date_insert`) VALUES
(000029, 000000, 2, 'Admin2024', '284762cb4151b016102311af00f6ab735ec50f33', '2023-06-05 14:33:08'),
(000030, 000000, 1, 'Admin2025', '32a44abb7a66e19ef716f60478e030165c233aea', '2023-06-05 14:40:14'),
(000039, 000000, 1, 'Admin2011', '336f3fa51e95e81d00ec230af62abc325a750cc8', '2023-06-07 13:35:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `mem_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `receive_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `order_status` int(1) NOT NULL,
  `b_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `member_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `member_phone` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `member_address` text COLLATE utf8_unicode_ci NOT NULL,
  `pay_amount` float(10,2) NOT NULL,
  `pay_amount2` float(10,2) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `confirm_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `mem_id`, `receive_name`, `order_status`, `b_name`, `member_name`, `member_phone`, `member_address`, `pay_amount`, `pay_amount2`, `order_date`, `confirm_date`) VALUES
(00000102, 000030, 'ລູກຄ້າໜ້າຮ້ານ', 4, 'ຊຳລະໜ້າຮ້ານ', '', '', '', 5000000.00, 5000000.00, '2023-07-24 21:38:47', '0000-00-00 00:00:00'),
(00000103, 000030, 'ລູກຄ້າໜ້າຮ້ານ', 4, 'ຊຳລະໜ້າຮ້ານ', '', '', '', 8000000.00, 8000000.00, '2023-07-24 21:39:43', '0000-00-00 00:00:00'),
(00000104, 000030, 'ລູກຄ້າໜ້າຮ້ານ', 4, 'ຊຳລະໜ້າຮ້ານ', '', '', '', 10800000.00, 10800000.00, '2023-07-24 21:43:25', '0000-00-00 00:00:00'),
(00000101, 000030, 'ລູກຄ້າໜ້າຮ້ານ', 4, 'ຊຳລະໜ້າຮ້ານ', '', '', '', 15000000.00, 15000000.00, '2023-07-24 21:11:25', '0000-00-00 00:00:00'),
(00000100, 000030, 'ລູກຄ້າໜ້າຮ້ານ', 4, 'ຊຳລະໜ້າຮ້ານ', '', '', '', 5000000.00, 5000000.00, '2023-07-24 20:55:38', '0000-00-00 00:00:00'),
(00000082, 000030, 'ລູກສັ່ງຊື້ອອນລາຍ', 0, 'M-MOney', 'lee vang', '2028182917', '55/88/66', 21600000.00, 0.00, '2023-07-18 22:27:39', '2023-07-26 22:09:48'),
(00000092, 000030, 'ລູກສັ່ງຊື້ອອນລາຍ', 1, 'BCEL ONE', 'longyang', '2078666666', '99/88/222', 5400000.00, 0.00, '2023-07-20 22:12:45', '2023-07-26 21:26:41'),
(00000098, 000030, 'ລູກສັ່ງຊື້ອອນລາຍ', 0, 'BCEL ONE', 'boumi', '2078665114', '999/88/555', 5250000.00, 0.00, '2023-07-23 20:23:56', '2023-07-31 20:21:48'),
(00000097, 000030, 'ລູກສັ່ງຊື້ອອນລາຍ', 2, 'BCEL ONE', 'jengli', '2059673954', '0088//9955', 5000000.00, 0.00, '2023-07-23 20:22:16', '2023-07-30 22:09:42'),
(00000096, 000030, 'ລູກສັ່ງຊື້ອອນລາຍ', 2, 'BCEL ONE', 'ong yang', '2078666666', '333/55/66', 1200000.00, 0.00, '2023-07-23 20:21:12', '2023-07-31 20:06:24'),
(00000095, 000030, 'ລູກສັ່ງຊື້ອອນລາຍ', 0, 'BCEL ONE', 'lar xyooj', '2059673954', '000/888/666', 40000000.00, 0.00, '2023-07-23 20:19:45', '2023-07-26 21:50:48'),
(00000094, 000030, 'ລູກສັ່ງຊື້ອອນລາຍ', 2, 'BCEL ONE', 'pheng yang', '2028182917', '000/88/222', 5400000.00, 0.00, '2023-07-20 22:17:25', '2023-07-31 20:34:33'),
(00000093, 000030, 'ລູກສັ່ງຊື້ອອນລາຍ', 2, 'BCEL ONE', 'khan lor', '2028182917', '33/88/55', 8000000.00, 0.00, '2023-07-20 22:15:45', '2023-08-01 20:45:18'),
(00000099, 000030, 'ລູກຄ້າໜ້າຮ້ານ', 4, 'ຊຳລະໜ້າຮ້ານ', '', '', '', 10000000.00, 10000000.00, '2023-07-24 20:46:35', '0000-00-00 00:00:00'),
(00000090, 000030, 'ລູກສັ່ງຊື້ອອນລາຍ', 1, 'BCEL ONE', 'kiagvang', '2059673954', '2222/111/888', 2000000.00, 0.00, '2023-07-20 21:35:28', '2023-07-26 21:12:52'),
(00000086, 000030, 'ລູກຄ້າໜ້າຮ້ານ', 4, 'ຊຳລະໜ້າຮ້ານ', '', '', '', 5000000.00, 5000000.00, '2023-07-20 20:24:27', '0000-00-00 00:00:00'),
(00000085, 000030, 'ລູກຄ້າໜ້າຮ້ານ', 4, 'ຊຳລະໜ້າຮ້ານ', '', '', '', 15000000.00, 15000000.00, '2023-07-20 14:51:01', '0000-00-00 00:00:00'),
(00000105, 000000, 'ລູກສັ່ງຊື້ອອນລາຍ', 1, 'BCEL ONE', 'ວື ຢ່າງ', '2078665114', 'ຍອດງື່ມ/ແປກ/ຊຽງຂວາງ', 15000000.00, 0.00, '2023-08-01 21:51:32', '0000-00-00 00:00:00'),
(00000106, 000000, 'ລູກສັ່ງຊື້ອອນລາຍ', 1, 'BCEL ONE', 'ນາງ ລິວ່າງ', '2078665555', '66/88/99', 5000000.00, 0.00, '2023-08-01 21:56:09', '0000-00-00 00:00:00'),
(00000107, 000000, 'ລູກສັ່ງຊື້ອອນລາຍ', 1, 'BCEL ONE', 'ທ້າວ ຈັນຢ່າງ', '2078665555', '55/88/11', 15000000.00, 0.00, '2023-08-01 21:59:52', '0000-00-00 00:00:00'),
(00000108, 000000, 'ລູກສັ່ງຊື້ອອນລາຍ', 1, 'BCEL ONE', 'ທ້າວ ເຕ້ຍ', '2078666666', '66/22/11', 5000000.00, 0.00, '2023-08-01 22:06:41', '0000-00-00 00:00:00'),
(00000109, 000030, 'ລູກສັ່ງຊື້ອອນລາຍ', 0, 'BCEL ONE', 'test', '2028182917', 'trt', 5000000.00, 0.00, '2023-08-05 23:27:30', '2023-08-05 23:28:02'),
(00000110, 000000, 'ລູກສັ່ງຊື້ອອນລາຍ', 1, 'BCEL ONE', 'ມາຢ່າງ', '2028182917', '2222/999/5555', 5000000.00, 0.00, '2023-08-07 21:36:44', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `d_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `order_id` int(8) UNSIGNED ZEROFILL NOT NULL,
  `pro_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `p_c_qty` float NOT NULL,
  `total_price` float NOT NULL COMMENT 'ລາຄາສີນຄ້າ',
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`d_id`, `order_id`, `pro_id`, `p_c_qty`, `total_price`, `total`) VALUES
(000089, 00000083, 000021, 2, 6000000, 12000000),
(000090, 00000083, 000020, 2, 5600000, 11200000),
(000091, 00000082, 000017, 2, 5000000, 10000000),
(000092, 00000082, 000018, 2, 5800000, 11600000),
(000093, 00000084, 000021, 1, 6000000, 6000000),
(000094, 00000085, 000009, 1, 15000000, 15000000),
(000095, 00000086, 000017, 1, 5000000, 5000000),
(000096, 00000090, 000012, 1, 2000000, 2000000),
(000097, 00000000, 000010, 1, 5000000, 5000000),
(000098, 00000092, 000011, 1, 5400000, 5400000),
(000099, 00000093, 000016, 1, 8000000, 8000000),
(000100, 00000000, 000015, 10, 250000, 2500000),
(000101, 00000094, 000011, 1, 5400000, 5400000),
(000102, 00000095, 000010, 2, 5000000, 10000000),
(000103, 00000095, 000009, 2, 15000000, 30000000),
(000104, 00000000, 000018, 1, 5800000, 5800000),
(000105, 00000096, 000005, 8, 150000, 1200000),
(000106, 00000000, 000013, 2, 5000000, 10000000),
(000107, 00000097, 000010, 1, 5000000, 5000000),
(000108, 00000000, 000007, 5, 180000, 900000),
(000109, 00000098, 000019, 1, 5000000, 5000000),
(000110, 00000098, 000015, 1, 250000, 250000),
(000111, 00000099, 000017, 2, 5000000, 10000000),
(000112, 00000100, 000010, 1, 5000000, 5000000),
(000113, 00000101, 000009, 1, 15000000, 15000000),
(000114, 00000102, 000017, 1, 5000000, 5000000),
(000115, 00000103, 000016, 1, 8000000, 8000000),
(000116, 00000104, 000008, 2, 5400000, 10800000),
(000119, 00000105, 000009, 1, 15000000, 15000000),
(000120, 00000000, 000010, 1, 5000000, 5000000),
(000121, 00000106, 000013, 1, 5000000, 5000000),
(000122, 00000000, 000010, 1, 5000000, 5000000),
(000123, 00000107, 000009, 1, 15000000, 15000000),
(000124, 00000000, 000017, 1, 5000000, 5000000),
(000125, 00000108, 000013, 1, 5000000, 5000000),
(000126, 00000109, 000017, 1, 5000000, 5000000),
(000127, 00000000, 000018, 1, 5800000, 5800000),
(000128, 00000110, 000013, 1, 5000000, 5000000);

-- --------------------------------------------------------

--
-- Table structure for table `type_product`
--

CREATE TABLE `type_product` (
  `type_id` int(7) UNSIGNED ZEROFILL NOT NULL,
  `type_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type_img` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `insert_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type_product`
--

INSERT INTO `type_product` (`type_id`, `type_name`, `type_img`, `insert_date`) VALUES
(0000001, 'Mouse', 'pro_6487277465169.jpg', '2023-08-07 15:29:41'),
(0000002, 'Keybroand', 'pro_6487278b07e31.jpg', '2023-08-07 15:29:41'),
(0000003, 'LED', 'pro_6487279777527.jpg', '2023-08-07 15:29:41'),
(0000004, 'ກ້ອງຖ່າຍຮູບ', 'pro_648727a3e6626.jpg', '2023-08-07 15:29:41'),
(0000005, 'ໂທລະສັບ', 'pro_648727b13884e.jpg', '2023-08-07 15:29:41'),
(0000007, 'ຄອນພີວເຕີ', 'pro_648727bdb77f6.jpg', '2023-08-07 15:29:41'),
(0000010, ' ກ້ອງວົງຈອນປິດ', 'pro_64bcc5c630669.jpg', '2023-08-07 15:29:41'),
(0000011, ' monitor', 'pro_64bcc6b21c9e7.jpg', '2023-08-07 15:29:41'),
(0000013, ' ສາຍສາກ', 'pro_64bd41c919bbf.jpg', '2023-08-07 15:29:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barcode`
--
ALTER TABLE `barcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `product_new`
--
ALTER TABLE `product_new`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`en_id`);

--
-- Indexes for table `tbl_member`
--
ALTER TABLE `tbl_member`
  ADD PRIMARY KEY (`mem_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `type_product`
--
ALTER TABLE `type_product`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barcode`
--
ALTER TABLE `barcode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_image`
--
ALTER TABLE `product_image`
  MODIFY `img_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_new`
--
ALTER TABLE `product_new`
  MODIFY `pro_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'ລະຫັດສີນຄ້າ', AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `cus_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'ລະຫັດລູກຄ້າ';

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `en_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_member`
--
ALTER TABLE `tbl_member`
  MODIFY `mem_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT 'ລະຫັດພະນັກງານ', AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `d_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `type_product`
--
ALTER TABLE `type_product`
  MODIFY `type_id` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
