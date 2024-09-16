-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2024 at 07:47 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `type_id` int(6) UNSIGNED ZEROFILL NOT NULL COMMENT 'ລະຫັດປະເພດສີນຄ້າ',
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
(000001, 'Canon', 000004, 8500000.00, 50, 'dkjfiogkdfsgdf\r\ngsfdgfdsg\r\nsdgdsfget', 'pro_6484917b131a1.jpg', '2023-07-23 14:15:41'),
(000003, 'Iphone 12', 000005, 15000000.00, 49, 'hhhhhhhhhhhhhhhh\r\nlkkkkkkkkk\r\nuuuuuuuuuuuu', 'pro_648491bac0509.jpg', '2023-07-18 15:07:47'),
(000005, 'mouse', 000001, 150000.00, 51, 'khhhhhhhhhhhkdfgh\r\ngtgorektphdhglfdhd\r\nerhtgdfhet\r\ngdhtehdf\r\nsgdgtrehrtdy\r\ndgfgtreyhjwregs\r\negteryhetr', 'pro_6484920937ef2.jpg', '2023-08-05 15:58:12'),
(000007, 'keybroad', 000002, 180000.00, 5, 'frrghgdfdgsdfg\r\nsfgsdgtr\r\nfsdfdsg\r\nasdfrtgse\r\nfsdfwrtr\r\ngsdfg', 'pro_6484931234dde.jpg', '2023-07-23 13:22:50'),
(000008, 'lanovo', 000007, 5400000.00, 48, '', 'pro_6484934787797.jpg', '2023-07-24 14:43:25'),
(000009, 'Iphone 13', 000005, 15000000.00, 1, '', 'pro_64856ba6635ad.jpg', '2023-08-01 14:59:52'),
(000010, 'Canon', 000004, 5000000.00, 26, '', 'pro_64856db86802d.jpg', '2023-08-01 14:57:44'),
(000011, 'dell', 000007, 5400000.00, 48, 'dell core i7', 'pro_6491ab30dc7fe.jpg', '2023-07-20 15:17:25'),
(000012, 'LED', 000003, 2000000.00, 34, 'tieojfsdgiuregmls\r\n', 'pro_6499b3983cffa.jpg', '2023-07-20 14:35:28'),
(000013, 'Aser', 000007, 5000000.00, 46, 'test meiaafkfdgilksjgdssgsdgsdf', 'pro_649fe87e308ec.jpg', '2023-08-07 14:36:44'),
(000014, 'Asu', 000007, 6000000.00, 27, 'iytryiyoirjhkdjhtiod', 'pro_649fe8afdd14e.jpg', '2023-07-17 13:11:52'),
(000016, 'laptops', 000007, 8000000.00, 13, 'jlhkopkpfgplhryt', 'pro_649fe94e88a1b.jpg', '2023-07-24 14:39:43'),
(000017, 'lenovo', 000007, 5000000.00, 20, 'toioodugopguigsfgls', 'pro_649fecfcd538b.jpg', '2023-08-05 16:27:30'),
(000018, 'dell 1', 000007, 5800000.00, 47, 'gfhfgjfgdgdfgjfjuty', 'pro_649fed487d4ab.jpg', '2023-08-05 16:29:13'),
(000019, 'dell 2', 000007, 5000000.00, 32, 'trefsfdfhdgfgdfgdgdg', 'pro_649fed7d080ee.jpg', '2023-08-06 03:09:06');

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
  `date_of_birth` date NOT NULL,
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

INSERT INTO `tbl_employee` (`en_id`, `gender`, `en_name`, `en_lastname`, `date_of_birth`, `en_phone`, `en_email`, `village`, `district`, `provice`, `position`, `responsible`, `en_image`, `insert_date`) VALUES
(000004, '0', 'ທ້າວ ວືຢ່າງ', 'ໄຊມົວ', '1996-06-21', '02078665114', 'nkaujkiabvang20212022@gmail.com', 'ຍອດງື່ມ', 'ແປກ', 'ຊຽງຂວາງ', 'ຜູ້ຈັດການ(Admin)', 'ຜູ້ຈັດການ', 'pro_66306a7f80496.jfif', '2023-08-08 22:58:37'),
(000005, '1', 'ນ່າງ ເກ້ຍວ່າງ', 'ເຍ່ຍລົ່ງວ່າງ', '1996-06-21', '02059673954', 'nkaujkiabvang20212022@gmail.com', 'ຍອດງື່ມ', 'ແປກ', 'ຊຽງຂວາງ', 'HR', 'HR', 'pro_66306a998fe96.jfif', '2023-08-08 22:58:37'),
(000006, '0', 'ທ້າວ ມາ', 'ຢ່າງ', '1998-02-03', '2078665211', 'ttttt@gmail.com', 'test1', 'test2', 'test3', 'ພະນັກງານບັນຊີ', 'ພະນັກງານບັນຊີ', '183166307320240502_135631.jfif', '2024-05-02 13:56:31'),
(000007, '0', 'ກ້ອງ', 'ຫາ', '1999-10-01', '2078665213', 'ttttt2021@gmail.com', 'test11', 'test22', 'test33', 'ພະນັກງານຂາຍໜ້າຮ້ານ', 'ພະນັກງານຂາຍໜ້າຮ້ານ', '142148596520240507_072652.jfif', '2024-05-07 07:26:52'),
(000008, '1', 'ມະນີວັນ', 'ວີໄລ', '1999-02-12', '2078665218', 'ttttt@gmail.com', 'test111', 'test222', 'test333', 'ພະນັກງານຢືນຢັນ', 'ພະນັກງານຢືນຢັນ', '115639083020240507_110806.jfif', '2024-05-07 11:08:06'),
(000009, '0', 'ຄຳດີ', 'ຄຳພົງ', '1998-02-06', '2078665217', 'ttttt2023@gmail.com', 'test1111', 'test2222', 'test3333', 'ພະນັກງານສາງ', 'ພະນັກງານສາງ', '172259723320240507_110931.jfif', '2024-05-07 11:09:31'),
(000010, '0', 'laiblau', 'yang', '1996-09-06', '2078665216', 'ttttt2021@gmail.com', 'test11111', 'test22222', 'test33333', 'ພະນັກງານຈັດຊື້', 'ພະນັກງານຈັດຊື້', '90341420120240507_111127.jfif', '2024-05-07 11:11:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_member`
--

CREATE TABLE `tbl_member` (
  `mem_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `en_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `ref_l_id` int(1) NOT NULL,
  `mem_username` varchar(100) NOT NULL,
  `mem_password` varchar(100) NOT NULL,
  `login_status` int(1) NOT NULL,
  `date_insert` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_member`
--

INSERT INTO `tbl_member` (`mem_id`, `en_id`, `ref_l_id`, `mem_username`, `mem_password`, `login_status`, `date_insert`) VALUES
(000001, 000004, 1, 'Admin', '4e7afebcfbae000b22c7c85e5560f89a2a0280b4', 1, '2024-09-14 14:04:42'),
(000002, 000005, 2, 'HR', 'f187928fdb223e7f3b7b0396e72e2d59a5f12b29', 0, '2024-09-14 14:48:24'),
(000003, 000006, 3, 'Banxi', '97ec7660dc618d22e8037bf871e6720ddccdafea', 0, '2024-09-14 15:07:37');

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

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `d_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `order_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `pro_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `p_c_qty` float NOT NULL,
  `total_price` float NOT NULL COMMENT 'ລາຄາສີນຄ້າ',
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`d_id`, `order_id`, `pro_id`, `p_c_qty`, `total_price`, `total`) VALUES
(000001, 000001, 000017, 10, 5000000, 50000000),
(000002, 000001, 000014, 15, 6000000, 90000000),
(000003, 000001, 000016, 11, 8000000, 88000000),
(000004, 000001, 000019, 10, 5000000, 50000000),
(000005, 000002, 000010, 10, 5000000, 50000000),
(000006, 000002, 000012, 15, 2000000, 30000000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_receive`
--

CREATE TABLE `tbl_order_receive` (
  `order_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `mem_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `receive_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ชื่อผู้รับ',
  `order_status` int(1) NOT NULL,
  `b_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ชื่อธนาคาร',
  `pay_amount` float(10,2) DEFAULT NULL,
  `pay_amount2` float(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `Month` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_order_receive`
--

INSERT INTO `tbl_order_receive` (`order_id`, `mem_id`, `receive_name`, `order_status`, `b_name`, `pay_amount`, `pay_amount2`, `order_date`, `Month`) VALUES
(000001, 000030, 'ລູກຄ້າໜ້າຮ້ານ', 4, 'ຊຳລະໜ້າຮ້ານ', 100000000.00, 100000000.00, '2024-06-27 23:22:19', 'June'),
(000002, 000030, 'ລູກຄ້າໜ້າຮ້ານ', 4, 'ຊຳລະໜ້າຮ້ານ', 80000000.00, 80000000.00, '2024-06-28 08:58:09', 'June');

-- --------------------------------------------------------

--
-- Table structure for table `tb_exchage`
--

CREATE TABLE `tb_exchage` (
  `exchage_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `baht_name` varchar(100) NOT NULL,
  `dola_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_exchage`
--

INSERT INTO `tb_exchage` (`exchage_id`, `baht_name`, `dola_name`) VALUES
(000003, '740', '25000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_expens1`
--

CREATE TABLE `tb_expens1` (
  `expen_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `content` varchar(100) NOT NULL,
  `amount` int(10) NOT NULL,
  `prices` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `mem_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `monthdate` datetime NOT NULL DEFAULT current_timestamp(),
  `expen_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_expens1`
--

INSERT INTO `tb_expens1` (`expen_id`, `content`, `amount`, `prices`, `total`, `mem_id`, `monthdate`, `expen_date`) VALUES
(000000, 'mouse', 12, 250000, 3000000, 000001, '0000-00-00 00:00:00', '2024-09-15 13:11:54'),
(000001, 'computer', 10, 5500000, 55000000, 000001, '0000-00-00 00:00:00', '2024-09-15 13:10:11'),
(000002, ' ເຈ້ຍ', 10, 150000, 1500000, 000001, '2024-08-01 08:01:09', '2024-08-01 15:01:09'),
(000003, 'ບີກ', 10, 100000, 1000000, 000001, '2024-07-02 08:01:09', '2024-07-02 15:01:09');

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
(0000013, ' ສາຍສາກ1', 'pro_66441d21e6236.jfif', '2023-08-07 15:29:41'),
(0000014, ' Scan Bracode', 'pro_66441d4ad5130.jfif', '2024-05-15 02:26:18');

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
-- Indexes for table `tbl_order_receive`
--
ALTER TABLE `tbl_order_receive`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tb_exchage`
--
ALTER TABLE `tb_exchage`
  ADD PRIMARY KEY (`exchage_id`);

--
-- Indexes for table `tb_expens1`
--
ALTER TABLE `tb_expens1`
  ADD PRIMARY KEY (`expen_id`);

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
  MODIFY `en_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `d_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_order_receive`
--
ALTER TABLE `tbl_order_receive`
  MODIFY `order_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_exchage`
--
ALTER TABLE `tb_exchage`
  MODIFY `exchage_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `type_product`
--
ALTER TABLE `type_product`
  MODIFY `type_id` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
