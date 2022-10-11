-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2022 at 12:17 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homifydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `administrator_id` int(11) NOT NULL,
  `lastname` varchar(60) COLLATE utf8_bin NOT NULL,
  `firstname` varchar(60) COLLATE utf8_bin NOT NULL,
  `email` varchar(45) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `keylogin` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`administrator_id`, `lastname`, `firstname`, `email`, `password`, `keylogin`) VALUES
(1, 'Oladipupo', 'Bunmi', 'bunmidavids194@gmail.com', '123456', 'JKL194LA');

-- --------------------------------------------------------

--
-- Table structure for table `apartments`
--

CREATE TABLE `apartments` (
  `apartments_id` int(11) NOT NULL,
  `title` varchar(60) COLLATE utf8_bin NOT NULL,
  `address` varchar(255) COLLATE utf8_bin NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` enum('Paid','Available') COLLATE utf8_bin DEFAULT 'Available',
  `description` varchar(255) COLLATE utf8_bin NOT NULL,
  `landlords_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `category_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `apartments`
--

INSERT INTO `apartments` (`apartments_id`, `title`, `address`, `price`, `status`, `description`, `landlords_id`, `date`, `category_id`, `location_id`) VALUES
(1, '1 Bedroom', '300890', '300890.00', 'Available', 'Fully serviced with toilet and kitchen', 17, '2022-10-08 13:27:15', 1, 30),
(2, '2 Bed', '30, Oba Akran', '500000.00', 'Available', 'fyghio', 17, '2022-10-08 13:31:03', 4, 3),
(3, 'New Phase', 'Lekki', '600000.00', 'Available', 'Fully serviced', 17, '2022-10-08 13:41:21', 2, 11),
(4, 'New Phase II', 'Ikoyi', '10000000.00', 'Available', 'Fully serviced', 17, '2022-10-08 13:44:58', 2, 11),
(5, 'New Phase II', 'Ikoyi', '10000000.00', 'Available', 'Fully serviced', 17, '2022-10-08 13:45:43', 2, 11),
(6, 'TEst', 'Agbon', '200.00', 'Available', 'Fully serviced', 17, '2022-10-08 13:46:16', 2, 11),
(7, '4 Bedroom Apartment', '273, Herbert Macaulay Road, Yaba', '800000.00', 'Available', 'Fully serviced apartment', 17, '2022-10-09 22:38:02', 1, 37),
(10, 'New testing 123', 'Alade', '400000.00', 'Available', 'Fully', 17, '2022-10-10 14:25:05', 5, 9),
(11, 'Monday Test', 'Rta', '560000.00', 'Available', 'Yes', 17, '2022-10-10 14:27:25', 5, 9),
(12, '2 Monday', 'Der', '600089.00', 'Available', 'Ertr', 17, '2022-10-10 14:28:30', 5, 1),
(13, 'Second Mon', 'Der', '600089.00', 'Available', 'Ertr', 17, '2022-10-10 14:33:20', 5, 1),
(14, '5 gttjh', 'hkj', '56789.00', 'Available', 'hi', 17, '2022-10-10 14:36:55', 5, 13),
(15, '5 BEDROOM', 'hk', '600000.00', 'Available', 'hij', 17, '2022-10-10 14:39:44', 5, 2),
(16, '5 Bedroom', 'Allen', '1200000.00', 'Available', 'Serviced', 17, '2022-10-10 14:44:26', 1, 11),
(17, 'jkl', 'bjkhj', '67.00', 'Available', 'hioj', 17, '2022-10-10 14:47:07', 5, 11),
(18, 'nkl', 'fyguhi', '6789.00', 'Available', 'fygu', 17, '2022-10-10 14:48:53', 1, 16),
(19, 'bjnklm', 'fyguhi', '576879.00', 'Available', 'gvhbjnk', 17, '2022-10-10 14:50:53', 1, 10),
(20, 'hjlk', 'ghiojp', '6780.00', 'Available', 'ghioj', 17, '2022-10-10 14:52:21', 1, 12),
(21, 'guhiojpk', 'fyguhi', '567.00', 'Available', 'fguhi', 17, '2022-10-10 14:53:40', 1, 12),
(22, 'fyguhi', 'fghk', '567.00', 'Available', 'fyguhi', 17, '2022-10-10 14:54:50', 1, 3),
(23, 'guhijo', 'gyuhk', '67.00', 'Available', 'chvjbkn', 17, '2022-10-10 14:56:26', 1, 10),
(24, '4fhgjk', 'hgjhk', '5768.00', 'Available', 'guhjp', 17, '2022-10-10 15:14:10', 1, 18),
(25, 'TUE TEST', 'Ogba', '570000.00', 'Available', 'Serviced', 17, '2022-10-10 21:05:32', 1, 2),
(26, 'dfg', 'cvhbj', '4576.00', 'Available', 'fhgjhk', 17, '2022-10-10 21:12:10', 1, 6),
(27, 'rytuyi', 'fughk', '5768.00', 'Available', 'hvjbk', 17, '2022-10-10 21:13:08', 1, 18),
(28, 'dfg', 'fgghjh', '568.00', 'Available', 'gfhgjb', 17, '2022-10-10 21:14:29', 1, 10),
(29, 'fgu', 'yfugi', '7586.00', 'Available', 'fgjkh', 17, '2022-10-10 21:15:13', 1, 16);

-- --------------------------------------------------------

--
-- Table structure for table `apartment_category`
--

CREATE TABLE `apartment_category` (
  `category_id` int(11) NOT NULL,
  `category` varchar(255) COLLATE utf8_bin NOT NULL,
  `image` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `apartment_category`
--

INSERT INTO `apartment_category` (`category_id`, `category`, `image`) VALUES
(1, 'FLATS', 'flat.jpg'),
(2, 'DUPLEXES', 'duplex.jpg'),
(3, 'BUNGALOWS', 'bungalow.jpg'),
(4, 'PENTHOUSES', 'penthouse.jpg'),
(5, 'TERRACED HOUSES', 'terraced.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `apartment_location`
--

CREATE TABLE `apartment_location` (
  `location_id` int(11) NOT NULL,
  `location` varchar(255) COLLATE utf8_bin NOT NULL,
  `image` varchar(255) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `apartment_location`
--

INSERT INTO `apartment_location` (`location_id`, `location`, `image`) VALUES
(1, 'Agbado-Oke Odo', ''),
(2, 'Ketu', ''),
(3, 'Apapa-Iganmu', ''),
(4, 'Ayobo-Ipaja', ''),
(5, 'Badagry West', ''),
(6, 'Bariga', ''),
(7, 'Coker-Aguda', ''),
(8, 'Egbe-Idimu', ''),
(9, 'Ejigbo', 'oshodi.jpg'),
(10, 'Eredo', ''),
(11, 'Eti-Osa East', ''),
(12, 'Iba', ''),
(13, 'Ifelodun', ''),
(14, 'Igando-Ikotun', ''),
(15, 'Igbogbo Baiyeku', ''),
(16, 'Ijede', ''),
(17, 'Ikorodu North', ''),
(18, 'Ikorodu West', ''),
(19, 'Ikosi Ejinrin', ''),
(20, 'Ikosi/Isheri', ''),
(21, 'Ikoyi/Obalende', ''),
(22, 'Imota', ''),
(23, 'Victoria Island', 'marina.jpg'),
(24, 'Isolo', ''),
(25, 'Itire-Ikate', ''),
(26, 'Lagos Island East', ''),
(27, 'Lekki', ''),
(28, 'Mosan-Okunola', ''),
(29, 'Odi-Olowo', ''),
(30, 'Ojodu', 'ikeja.jpg'),
(31, 'Ojokoro', ''),
(32, 'Olorunda', ''),
(33, 'Onigbongbo', ''),
(34, 'Oriade', ''),
(35, 'Orile Agege', ''),
(36, 'Oto Awori', ''),
(37, 'Yaba', 'yaba.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `apartment_id` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `images_apartments`
--

CREATE TABLE `images_apartments` (
  `images_id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_bin NOT NULL,
  `apartments_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `images_apartments`
--

INSERT INTO `images_apartments` (`images_id`, `url`, `apartments_id`, `date`) VALUES
(1, 'Oladipupopenthouse.jpg', 4, '2022-10-08 13:09:10'),
(2, 'Oladipupoduplex.jpg', 4, '2022-10-08 13:09:10'),
(3, 'Oladipupoduplex.jpg', 5, '2022-10-08 13:16:46'),
(4, 'Oladipupoflat.jpg', 5, '2022-10-08 13:16:46'),
(5, 'Oladipupoduplex.jpg', 6, '2022-10-08 13:21:27'),
(6, 'Oladipupoflat.jpg', 6, '2022-10-08 13:21:27'),
(7, 'Oladipupolocation.png', 1, '2022-10-08 13:27:15'),
(8, 'Oladipuposearch.png', 1, '2022-10-08 13:27:15'),
(9, 'OladipupoPhotos-2022-09-30-17-24-13.mp4', 2, '2022-10-08 13:31:03'),
(10, 'Oladipupohappy-family-with-house-concept-illustration-mortgage-buying-house-real-estate_113065-211.jpg', 2, '2022-10-08 13:31:03'),
(11, 'Oladipupopenthouse.jpg', 3, '2022-10-08 13:41:21'),
(12, 'Oladipupobungalow.jpg', 3, '2022-10-08 13:41:21'),
(13, 'Oladipupoduplex.jpg', 3, '2022-10-08 13:41:21'),
(14, 'Oladipupoliv.png', 3, '2022-10-08 13:41:21'),
(15, 'OladipupoPhotos-2022-09-30-17-20-53-1.mp4', 3, '2022-10-08 13:41:21'),
(16, 'Oladipupopenthouse.jpg', 4, '2022-10-08 13:44:58'),
(17, 'Oladipupobungalow.jpg', 4, '2022-10-08 13:44:58'),
(18, 'Oladipupopenthouse.jpg', 4, '2022-10-08 13:44:58'),
(19, 'Oladipupoterraced.jpg', 4, '2022-10-08 13:44:58'),
(20, 'Oladipupoflat.jpg', 4, '2022-10-08 13:44:58'),
(21, 'Oladipupopenthouse.jpg', 5, '2022-10-08 13:45:43'),
(22, 'Oladipupobungalow.jpg', 5, '2022-10-08 13:45:43'),
(23, 'Oladipupopenthouse.jpg', 6, '2022-10-08 13:46:16'),
(24, 'Oladipupobungalow.jpg', 6, '2022-10-08 13:46:16'),
(25, 'Oladipupoyaba.jpg', 7, '2022-10-09 22:38:02'),
(26, 'Oladipupoflat.jpg', 7, '2022-10-09 22:38:02'),
(27, 'Oladipupocolorful-g28a6101e7_1280.png', 7, '2022-10-09 22:38:02'),
(28, 'Oladipupopenthouse.jpg', 10, '2022-10-10 14:25:05'),
(29, 'Oladipupoduplex.jpg', 11, '2022-10-10 14:27:25'),
(30, 'Oladipupoterraced.jpg', 12, '2022-10-10 14:28:30'),
(31, 'Oladipupoterraced.jpg', 13, '2022-10-10 14:33:20'),
(32, 'Oladipupoflat.jpg', 14, '2022-10-10 14:36:55'),
(33, 'Oladipupoterraced.jpg', 15, '2022-10-10 14:39:44'),
(34, 'Oladipupoduplex.jpg', 16, '2022-10-10 14:44:26'),
(35, 'Oladipupopenthouse.jpg', 17, '2022-10-10 14:47:07'),
(36, 'Oladipupobungalow.jpg', 18, '2022-10-10 14:48:53'),
(37, 'Oladipupoduplex.jpg', 19, '2022-10-10 14:50:53'),
(38, 'Oladipupopenthouse.jpg', 20, '2022-10-10 14:52:21'),
(39, 'Oladipupoterraced.jpg', 21, '2022-10-10 14:53:40'),
(40, 'Oladipupopenthouse.jpg', 22, '2022-10-10 14:54:50'),
(41, 'Oladipupoduplex.jpg', 23, '2022-10-10 14:56:26'),
(42, 'Oladipupopenthouse.jpg', 24, '2022-10-10 15:14:10'),
(43, 'Oladipupobungalow.jpg', 25, '2022-10-10 21:05:32'),
(44, 'Oladipupoduplex.jpg', 25, '2022-10-10 21:05:32'),
(45, 'Oladipupopenthouse.jpg', 25, '2022-10-10 21:05:32'),
(46, 'Oladipupoflat.jpg', 25, '2022-10-10 21:05:32'),
(47, 'Oladipupopenthouse.jpg', 26, '2022-10-10 21:12:10'),
(48, 'Oladipupoterraced.jpg', 27, '2022-10-10 21:13:08'),
(49, 'Oladipupobungalow.jpg', 28, '2022-10-10 21:14:30'),
(50, 'Oladipupobungalow.jpg', 29, '2022-10-10 21:15:13');

-- --------------------------------------------------------

--
-- Table structure for table `inspection`
--

CREATE TABLE `inspection` (
  `inspection_id` int(11) NOT NULL,
  `type` enum('Onsite','Remote') COLLATE utf8_bin NOT NULL,
  `tenants_id` int(11) NOT NULL,
  `apartments_id` int(11) NOT NULL,
  `inspection_date` datetime NOT NULL,
  `booked_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `landlords`
--

CREATE TABLE `landlords` (
  `landlord_id` int(11) NOT NULL,
  `lastname` varchar(60) COLLATE utf8_bin NOT NULL,
  `firstname` varchar(60) COLLATE utf8_bin NOT NULL,
  `address` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(60) COLLATE utf8_bin NOT NULL,
  `phone` varchar(45) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `property_validity_number` varchar(60) COLLATE utf8_bin NOT NULL,
  `account_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `account_number` varchar(20) COLLATE utf8_bin NOT NULL,
  `bank_name` varchar(45) COLLATE utf8_bin NOT NULL,
  `nin` varchar(45) COLLATE utf8_bin NOT NULL,
  `admin_id` int(11) NOT NULL,
  `keylogin` varchar(255) COLLATE utf8_bin NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `landlords`
--

INSERT INTO `landlords` (`landlord_id`, `lastname`, `firstname`, `address`, `email`, `phone`, `password`, `property_validity_number`, `account_name`, `account_number`, `bank_name`, `nin`, `admin_id`, `keylogin`, `date_registered`) VALUES
(17, 'Oladipupo', 'Bunmi', '19, Omotola Street\r\nOjodu Berger', 'bunmidavids194@gmail.com', '07038250132', '$2y$10$PflWF0GJtkGvsqnEhsquLO8KC/Fm3T1lphXu79OJtL/m7OptPIOW.', '2344553445LAGP45', 'Oladipupo Bunmi David', '2093450123', 'Zenith Bank', '328394829394', 1, 'JKL194LA', '2022-10-08 10:50:27');

-- --------------------------------------------------------

--
-- Table structure for table `messages_apartment`
--

CREATE TABLE `messages_apartment` (
  `message_id` int(11) NOT NULL,
  `apartment_id` int(11) NOT NULL,
  `tenant_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `payments_apartments`
--

CREATE TABLE `payments_apartments` (
  `payments_id` int(11) NOT NULL,
  `tenants_id` int(11) NOT NULL,
  `apartments_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `amount` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `property_validity_number`
--

CREATE TABLE `property_validity_number` (
  `number_id` int(11) NOT NULL,
  `landlord_id` int(11) NOT NULL,
  `property_validity_number` varchar(250) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `tenant_id` int(11) NOT NULL,
  `lastname` varchar(60) COLLATE utf8_bin NOT NULL,
  `firstname` varchar(60) COLLATE utf8_bin NOT NULL,
  `address` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(60) COLLATE utf8_bin NOT NULL,
  `phone` varchar(45) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `nin` varchar(45) COLLATE utf8_bin NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`tenant_id`, `lastname`, `firstname`, `address`, `email`, `phone`, `password`, `nin`, `date_registered`) VALUES
(2, 'Oladipupo', 'Bunmi', '19, Omotola Street\r\nOjodu Berger', 'bunmidavids194@gmail.com', '07038250132', '$2y$10$WmHN11lSGLbPbEDMSHIn7ud5Gl4JmJN1TV8Hm3bhH4clSIAhFkmyu', '2345665432', '2022-10-03 18:11:17');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE `withdrawals` (
  `withdrawals_id` int(11) NOT NULL,
  `tenant_id` int(11) DEFAULT NULL,
  `landlord_id` int(11) DEFAULT NULL,
  `type` enum('Landlord','Tenant') COLLATE utf8_bin NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `amount` varchar(45) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`administrator_id`),
  ADD UNIQUE KEY `administrator_id_UNIQUE` (`administrator_id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `key` (`keylogin`);

--
-- Indexes for table `apartments`
--
ALTER TABLE `apartments`
  ADD PRIMARY KEY (`apartments_id`),
  ADD UNIQUE KEY `apartments_id_UNIQUE` (`apartments_id`),
  ADD KEY `fk_apartments_landlord_id_idx` (`landlords_id`),
  ADD KEY `fk_apartments_category_id_idx` (`category_id`),
  ADD KEY `fk_apartments_location_id_idx` (`location_id`);

--
-- Indexes for table `apartment_category`
--
ALTER TABLE `apartment_category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_id_UNIQUE` (`category_id`),
  ADD UNIQUE KEY `category_UNIQUE` (`category`);

--
-- Indexes for table `apartment_location`
--
ALTER TABLE `apartment_location`
  ADD PRIMARY KEY (`location_id`),
  ADD UNIQUE KEY `location_id_UNIQUE` (`location_id`),
  ADD UNIQUE KEY `location_UNIQUE` (`location`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD UNIQUE KEY `comment_id_UNIQUE` (`comment_id`),
  ADD KEY `fk_comments_apartment_id_idx` (`apartment_id`),
  ADD KEY `fk_comments_tenant_id_idx` (`tenant_id`);

--
-- Indexes for table `images_apartments`
--
ALTER TABLE `images_apartments`
  ADD PRIMARY KEY (`images_id`),
  ADD UNIQUE KEY `images_id_UNIQUE` (`images_id`),
  ADD KEY `fk_images_apartments_apartment_id_idx` (`apartments_id`);

--
-- Indexes for table `inspection`
--
ALTER TABLE `inspection`
  ADD PRIMARY KEY (`inspection_id`),
  ADD UNIQUE KEY `inspection_id_UNIQUE` (`inspection_id`),
  ADD KEY `fk_inspection_tenants_id_idx` (`tenants_id`),
  ADD KEY `fk_inspection_apartments_id_idx` (`apartments_id`);

--
-- Indexes for table `landlords`
--
ALTER TABLE `landlords`
  ADD PRIMARY KEY (`landlord_id`),
  ADD UNIQUE KEY `landlord_id_UNIQUE` (`landlord_id`),
  ADD UNIQUE KEY `nin_UNIQUE` (`nin`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_landlords_admin_id_idx` (`admin_id`),
  ADD KEY `fk_landlords_keylogin` (`keylogin`);

--
-- Indexes for table `messages_apartment`
--
ALTER TABLE `messages_apartment`
  ADD PRIMARY KEY (`message_id`),
  ADD UNIQUE KEY `message_id_UNIQUE` (`message_id`),
  ADD KEY `fk_messages_apartment_apartment_id_idx` (`apartment_id`),
  ADD KEY `fk_messages_apartment_tenant_id_idx` (`tenant_id`);

--
-- Indexes for table `payments_apartments`
--
ALTER TABLE `payments_apartments`
  ADD PRIMARY KEY (`payments_id`),
  ADD UNIQUE KEY `payments_id_UNIQUE` (`payments_id`),
  ADD KEY `fk_payments_apartments_tenant_id_idx` (`tenants_id`),
  ADD KEY `fk_payments_apartments_apartments_id_idx` (`apartments_id`);

--
-- Indexes for table `property_validity_number`
--
ALTER TABLE `property_validity_number`
  ADD PRIMARY KEY (`number_id`),
  ADD UNIQUE KEY `number_id_UNIQUE` (`number_id`),
  ADD UNIQUE KEY `landlord_id_UNIQUE` (`landlord_id`),
  ADD UNIQUE KEY `property_validity_number_UNIQUE` (`property_validity_number`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`tenant_id`),
  ADD UNIQUE KEY `tenant_id_UNIQUE` (`tenant_id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `phone_UNIQUE` (`phone`),
  ADD UNIQUE KEY `nin_UNIQUE` (`nin`);

--
-- Indexes for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD PRIMARY KEY (`withdrawals_id`),
  ADD UNIQUE KEY `withdrawals_id_UNIQUE` (`withdrawals_id`),
  ADD KEY `fk_withdrawals_tenant_id_idx` (`tenant_id`),
  ADD KEY `fk_withdrawals_landlord_id_idx` (`landlord_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `administrator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `apartments`
--
ALTER TABLE `apartments`
  MODIFY `apartments_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `apartment_category`
--
ALTER TABLE `apartment_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `apartment_location`
--
ALTER TABLE `apartment_location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images_apartments`
--
ALTER TABLE `images_apartments`
  MODIFY `images_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `inspection`
--
ALTER TABLE `inspection`
  MODIFY `inspection_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `landlords`
--
ALTER TABLE `landlords`
  MODIFY `landlord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `messages_apartment`
--
ALTER TABLE `messages_apartment`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments_apartments`
--
ALTER TABLE `payments_apartments`
  MODIFY `payments_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `property_validity_number`
--
ALTER TABLE `property_validity_number`
  MODIFY `number_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `tenant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `withdrawals`
--
ALTER TABLE `withdrawals`
  MODIFY `withdrawals_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apartments`
--
ALTER TABLE `apartments`
  ADD CONSTRAINT `fk_apartments_category_id` FOREIGN KEY (`category_id`) REFERENCES `apartment_category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartments_landlord_id` FOREIGN KEY (`landlords_id`) REFERENCES `landlords` (`landlord_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_apartments_location_id` FOREIGN KEY (`location_id`) REFERENCES `apartment_location` (`location_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_apartment_id` FOREIGN KEY (`apartment_id`) REFERENCES `apartments` (`apartments_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comments_tenant_id` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`tenant_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `images_apartments`
--
ALTER TABLE `images_apartments`
  ADD CONSTRAINT `fk_images_apartments_apartment_id` FOREIGN KEY (`apartments_id`) REFERENCES `apartments` (`apartments_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `inspection`
--
ALTER TABLE `inspection`
  ADD CONSTRAINT `fk_inspection_apartments_id` FOREIGN KEY (`apartments_id`) REFERENCES `apartments` (`apartments_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_inspection_tenants_id` FOREIGN KEY (`tenants_id`) REFERENCES `tenants` (`tenant_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `landlords`
--
ALTER TABLE `landlords`
  ADD CONSTRAINT `fk_landlords_admin_id` FOREIGN KEY (`admin_id`) REFERENCES `administrators` (`administrator_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_landlords_keylogin` FOREIGN KEY (`keylogin`) REFERENCES `administrators` (`keylogin`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `messages_apartment`
--
ALTER TABLE `messages_apartment`
  ADD CONSTRAINT `fk_messages_apartment_apartment_id` FOREIGN KEY (`apartment_id`) REFERENCES `apartments` (`apartments_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_messages_apartment_tenant_id` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`tenant_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `payments_apartments`
--
ALTER TABLE `payments_apartments`
  ADD CONSTRAINT `fk_payments_apartments_apartments_id` FOREIGN KEY (`apartments_id`) REFERENCES `apartments` (`apartments_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_payments_apartments_tenant_id` FOREIGN KEY (`tenants_id`) REFERENCES `tenants` (`tenant_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `property_validity_number`
--
ALTER TABLE `property_validity_number`
  ADD CONSTRAINT `fk_property_validity_number_landlord_id` FOREIGN KEY (`landlord_id`) REFERENCES `landlords` (`landlord_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD CONSTRAINT `fk_withdrawals_landlord_id` FOREIGN KEY (`landlord_id`) REFERENCES `landlords` (`landlord_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_withdrawals_tenant_id` FOREIGN KEY (`tenant_id`) REFERENCES `tenants` (`tenant_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
