-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2022 at 11:18 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_electi_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id_brand` int(11) NOT NULL,
  `name_brand` varchar(50) NOT NULL,
  `desc_brand` varchar(200) NOT NULL,
  `img_brand` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id_brand`, `name_brand`, `desc_brand`, `img_brand`) VALUES
(1, 'ASUS', 'Asus is a Taiwan-based company that manufactures computer components such as motherboards, graphics cards, and notebooks.', 'asus.jpg'),
(2, 'ACER', 'Acer is a brand of the world\'s top five personal computers. Acer\'s products include desktops, notebooks, servers, data storage, screens, and peripherals.', 'acer.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id_product` int(11) NOT NULL,
  `name_product` varchar(50) NOT NULL,
  `desc_product` varchar(200) NOT NULL,
  `price_product` int(11) NOT NULL,
  `img_product` varchar(50) NOT NULL,
  `brand_product` varchar(50) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id_product`, `name_product`, `desc_product`, `price_product`, `img_product`, `brand_product`, `item_quantity`, `total_price`) VALUES
(1, 'Keyboard', 'The Gaming Keyboard from Lokai comes with a cool gamer-style design with glowing RGB LEDs.', 125000, 'keyboard.jpg', 'ACER', 2, 250000),
(2, 'RAM SODIMM', 'Capacity: 2 GB / 4 GB / 8 GB Kecepatan : PC-12800 (1600Mhz) Chipset : V-GeN / Rescue', 450000, 'ram-sodimm.jpg', 'ACER', 4, 1800000),
(6, 'ROG Phone 5', 'WTS Rog 8/128 warranty until August 2022 complete original full set Normal functions have been installed anti-scratch free case Xunood premium.', 7950000, 'rog.jpg', 'ASUS', 2, 15900000);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `name_product` varchar(50) NOT NULL,
  `desc_product` varchar(200) NOT NULL,
  `price_product` int(11) NOT NULL,
  `img_product` varchar(50) NOT NULL,
  `brand_product` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `name_product`, `desc_product`, `price_product`, `img_product`, `brand_product`) VALUES
(1, 'Keyboard', 'The Gaming Keyboard from Lokai comes with a cool gamer-style design with glowing RGB LEDs.', 125000, 'keyboard.jpg', 'ACER'),
(2, 'RAM SODIMM', 'Capacity: 2 GB / 4 GB / 8 GB Kecepatan : PC-12800 (1600Mhz) Chipset : V-GeN / Rescue', 450000, 'ram-sodimm.jpg', 'ACER'),
(3, 'Joystick Gamepad', 'USB interface ( for USB 1.0 or 2.0 ) Plug and Play\n- Fully compatible with windows win9x / 2000 / XP / VISTA system', 70000, 'stick.jpg', 'ASUS'),
(4, 'Monitor', 'Office 19 inch / black\nRespon time 3ms/ HDMI / VGA\n1440 h X 900 v / HD Clear display\nLED display\n60HZ high refresh / 1.98kg.', 1320000, 'computer.jpg', 'ASUS'),
(5, 'Adaptop Charger', 'Output: DC 19V 3.42A 65W\r\nInput: AC 100 240V 50-60Hz\r\nSize Konektor : 5.5 * 1.7mm\r\nWarna : hitam', 55000, 'charger.jpg', 'ACER'),
(6, 'ROG Phone 5', 'WTS Rog 8/128 warranty until August 2022 complete original full set Normal functions have been installed anti-scratch free case Xunood premium.', 7950000, 'rog.jpg', 'ASUS');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(9) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jurusan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`id`, `nim`, `nama`, `jurusan`) VALUES
(5, 'E1E120001', 'Atika Nurfadilah', 'Teknik Informatika'),
(6, '124298198', 'Akbar Maulana', 'Pendidikan Biologi'),
(7, 'E1E120011', 'Ilmi Faizan', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `email`) VALUES
(1, 'admin', '$2y$10$htdC1VpZOWTwJh2/a.1KTO7ol/shvmWuZZFSoyIZi6phc0NJ41dva', 'admin@gmail.com'),
(2, 'icang', '$2y$10$3TtmbnnWu045QmsEmU9ABOYYP3J6X6ywPVpz89SqL5Pgpk2t/7gSK', 'icang@gmail.com'),
(3, 'opop', '$2y$10$qu.pidLzuN8xtiXh4GT6CuhOXkgFH3m04DeFyWjwzwZd5V9WZ6wgG', ''),
(4, 'iop', '$2y$10$kwiv1rZwcNfzI2RWbRxekOVM6CFp2ULi7X0L7g9Sd1xnnmPGz2hPy', ''),
(5, 'esy', '$2y$10$MJihQxsd00pnPZIOlqtyQ.BJKQZjRgPf0vLIj5XrL4jAYCCHVuPRi', ''),
(6, 'user', '$2y$10$OH4KQIwCc4oNxuDvI8NHk.hyJ3eRd5LjGq/gIJ6B8EenYtr56XKh6', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
