-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2020 at 04:31 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(100) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `admin_image` text NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_address` text NOT NULL,
  `admin_job` varchar(255) NOT NULL,
  `admin_about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_image`, `admin_contact`, `admin_address`, `admin_job`, `admin_about`) VALUES
(2, 'Farhad Hossain ', 'farhad@gmail.comm', '1234567', 'IMG_03021.jpg', '017790023011', 'uttara, dhaka', 'Admin', '  This is Farhad Hossain, Admin of ADP.   ');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `p_id` int(100) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(100) NOT NULL,
  `size` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL,
  `cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(2, 'non seasonal', '\r\nnot seasonal: such as. a : not of, relating to, or varying in occurrence according to the season nonseasonal depression. b : not affected or caused by seasonal need or availability nonseasonal employees.'),
(4, 'seasonal ', 'Seasonal commodities are products that are either. (i) not available in the marketplace during certain. seasons of the year or (ii) are available throughout. the year but there are regular fluctuations in prices. or quantities that are synchronized with the season.\r\n\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(100) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_pass` varchar(255) NOT NULL,
  `customer_district` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_district`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(20, 'Zulkar Nayin', 'zulkar@gmail.com', '1111', 'Jessore', '01521318602', 'Shymoli, Dhaka', 'zulkar.jpg', '::1'),
(22, 'Nibir', 'nibir@gmail.com', '2222', 'Kustia', '0170000000', 'Shymoli, Dhaka', '84688933_1574293306104497_6061507282082988032_n.jpg', '::1'),
(24, 'Zubayer', 'zubayer@gmail.com', '4444', 'Natore', '0190000000', 'Uttara, Dhaka', '28235099_568006870202170_4410053014180547505_o.jpg', '::1'),
(25, 'Faruk Hossain', 'faruk@gmail.com', '5555', 'Gazipur', '0160000000', 'Rampura, Dhaka', '90600554_2637173253075737_6948673991577960448_o.jpg', '::1'),
(26, 'Arifur', 'arif@gmail.com', '6666', 'Gopalganj', '0150000000', 'Dhaka Cantonment', 'arif.jpg', '::1'),
(28, 'Apon', 'apon@gmail.com', '3333', 'Kustia', '0170000000', 'Uttara, dhaka', '118416436_3223556657729867_5706726877689800336_o.jpg', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `order_id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `product_id` int(100) NOT NULL,
  `p_title` text NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `qty` int(10) NOT NULL,
  `size` text NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`order_id`, `customer_id`, `customer_name`, `product_id`, `p_title`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES
(1, 28, 'Apon', 35, 'Indian Rice', 135, 325483680, 3, 'Common', '2020-10-12 13:41:59', 'Complete'),
(2, 28, 'Apon', 32, 'Pumpkin', 240, 500195408, 4, 'Common', '2020-10-12 13:40:41', 'pending'),
(3, 28, 'Apon', 31, 'Onion Indian', 120, 1243654867, 1, 'Common', '2020-10-12 13:41:04', 'pending'),
(4, 28, 'Apon', 30, 'Tomato', 120, 968513345, 1, 'Common', '2020-10-12 13:42:23', 'Complete'),
(5, 22, 'Nibir', 31, 'Onion Indian', 360, 322442229, 3, 'Medium', '2020-10-12 13:45:17', 'Complete'),
(6, 22, 'Nibir', 31, 'Onion Indian', 120, 1145290737, 1, 'Common', '2020-10-12 13:43:53', 'pending'),
(7, 22, 'Nibir', 32, 'Pumpkin', 60, 687995844, 1, 'Large', '2020-10-12 13:44:57', 'Complete'),
(8, 22, 'Nibir', 33, 'Potato', 20, 1114308142, 1, 'Medium', '2020-10-12 13:47:27', 'Complete'),
(9, 20, 'Zulkar Nayin', 35, 'Indian Rice', 45, 2082815983, 1, 'Medium', '2020-10-12 13:48:16', 'pending'),
(10, 20, 'Zulkar Nayin', 32, 'Pumpkin', 180, 1788973123, 3, 'Common', '2020-10-12 13:50:12', 'Complete'),
(11, 20, 'Zulkar Nayin', 31, 'Onion Indian', 480, 239749436, 4, 'Medium', '2020-10-12 13:48:59', 'pending'),
(12, 20, 'Zulkar Nayin', 34, 'Red Amaranth', 60, 664059023, 3, 'Common', '2020-10-12 13:49:48', 'Complete'),
(13, 25, 'Faruk Hossain', 34, 'Red Amaranth', 20, 598268758, 1, 'Common', '2020-10-12 18:59:13', 'Complete'),
(14, 25, 'Faruk Hossain', 32, 'Pumpkin', 240, 832417229, 4, 'Medium', '2020-10-12 18:57:17', 'pending'),
(15, 25, 'Faruk Hossain', 30, 'Tomato', 600, 1669701498, 5, 'Common', '2020-10-12 18:58:01', 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `customer_name` text NOT NULL,
  `product_title` text NOT NULL,
  `invoice_id` int(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(100) NOT NULL,
  `payment_date` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `product_id`, `customer_name`, `product_title`, `invoice_id`, `amount`, `payment_mode`, `ref_no`, `payment_date`) VALUES
(1, 35, 'Apon', 'Indian Rice', 325483680, 135, 'Nagad', 2147483647, '2020-10-12'),
(2, 30, 'Apon', 'Tomato', 968513345, 120, 'Rocket', 2147483647, '2020-10-12'),
(3, 32, 'Nibir', 'Pumpkin', 687995844, 60, 'Rocket', 2147483647, '2020-10-12'),
(4, 31, 'Nibir', 'Onion Indian', 322442229, 360, 'Bkash', 2147483647, '2020-10-12'),
(5, 33, 'Nibir', 'Potato', 1114308142, 20, 'Bkash', 2147483647, '2020-10-12'),
(6, 34, 'Zulkar Nayin', 'Red Amaranth', 664059023, 60, 'Nagad', 2147483647, '2020-10-12'),
(7, 32, 'Zulkar Nayin', 'Pumpkin', 1788973123, 180, 'Bkash', 2147483647, '2020-10-12'),
(8, 30, 'Faruk Hossain', 'Tomato', 1669701498, 600, 'Nagad', 2147483647, '2020-10-13'),
(9, 34, 'Faruk Hossain', 'Red Amaranth', 598268758, 20, 'Nagad', 2147483647, '2020-10-13');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) NOT NULL,
  `p_cat_id` int(10) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_quan` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keyword` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_quan`, `product_desc`, `product_keyword`) VALUES
(29, 9, 4, '2020-10-03 19:07:05', 'Deshi Rice', 'oie_32127DPbn4pDG.jpg', 'oie_3205716I7h2kG4p.jpg', 'oie_3204046ml38J3pb.jpg', 40, 500, 'Rice is the common Food in Bangladesh, this is original deshi rice.', 'Rice1'),
(30, 10, 2, '2020-10-03 19:08:24', 'Tomato', 'oie_32104fLdK77Hy.jpg', 'oie_3204756ztapNswL.jpg', 'oie_32058296810e3Ni.jpg', 120, 300, 'Tomato is the common vegetables in bangladesh, this is very original tomato produce from bd.', 'Tomato1'),
(31, 12, 2, '2020-10-03 19:09:25', 'Onion Indian', 'oie_320421577tGRs4P.png', 'oie_3203731J7OR3Rrl.jpg', 'oie_320594HvRf5slN.jpg', 120, 300, 'This is indian onion.', 'Onion1'),
(32, 13, 4, '2020-10-03 19:10:28', 'Pumpkin', 'oie_3204648ZLbXV8Nb.jpg', 'oie_3204648ZLbXV8Nb.jpg', 'oie_3204648ZLbXV8Nb.jpg', 60, 100, 'This is pumpkin from Australia', 'Pumpkin1'),
(33, 11, 4, '2020-10-03 19:11:51', 'Potato', 'oie_320587mLleMpJj.jpg', 'oie_32048301DrQBF38.jpg', 'oie_320587mLleMpJj.jpg', 20, 120, 'This is bangladeshi potato which is common food in asia region.', 'Potato1'),
(34, 13, 4, '2020-10-03 19:13:30', 'Red Amaranth', 'oie_3205639k7FluyYA.jpg', 'oie_3205639k7FluyYA.jpg', 'oie_3205639k7FluyYA.jpg', 20, 100, 'This is common green vegetables in bangladesh. ', 'Red Amaranth1'),
(35, 0, 4, '2020-10-03 19:15:05', 'Indian Rice', 'oie_3205716I7h2kG4p.jpg', 'oie_32127DPbn4pDG.jpg', 'oie_3204046ml38J3pb.jpg', 45, 300, 'This is original indian rice.', 'rice2');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `p_cat_id` int(10) NOT NULL,
  `p_cat_title` text NOT NULL,
  `p_cat_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`p_cat_id`, `p_cat_title`, `p_cat_desc`) VALUES
(9, 'Rice', 'Rice is the seed of the grass species Oryza glaberrima or Oryza sativa'),
(10, 'Tomato', 'The tomato is the edible, often red berry of the plant Solanum lycopersicum, commonly known as a tomato plant.\r\n'),
(11, 'Potato', 'The potato is a root vegetable native to the Americas\r\n'),
(12, 'Onion', 'The onion, also known as the bulb onion or common onion, is a vegetable that is the most widely cultivated species of the genus Allium\r\n'),
(13, 'Green Vegetables ', 'Leaf vegetables, also called leafy greens, salad greens, pot herbs, vegetable greens');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(10) NOT NULL,
  `slider_name` varchar(255) NOT NULL,
  `slider_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `slider_name`, `slider_image`) VALUES
(6, 'slider1', 'Top 5 vegetables to grow for terrace gardening.jpg'),
(7, 'slider2', '152-1521982_wallpaper-rice-field-grain-rice-grain.jpg'),
(8, 'slider3', 'papers.co-ng51-flower-reed-field-rice-nature-green-yellow-35-3840x2160-4k-wallpaper.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`p_cat_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `p_cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
