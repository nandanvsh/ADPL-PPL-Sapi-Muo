-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2023 at 03:38 PM
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
-- Database: `sapi_mou`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

create table users(
	id_users int(11) primary key,
	nama_user varchar(70) not null,
	email varchar(70) not null,
	password varchar(100) not null,
	no_telp varchar(20) not null,
	kota varchar(50) not null,
	rules varchar(50) not null
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

insert into users(id_users, nama_user, email, password, no_telp, kota, rules)
values
(1, 'Sukadi','sukadi9090@gmail.com', 'sapi1', '082113452567', 'Jember', 'peternak sapi'),
(2, 'Bambang','bambang80@gmail.com', 'tahuku1', '081234567890', 'Jember', 'produsen tahu'),
(3, 'Anna','anna123@gmail.com', 'frozen1', '082223339011', 'Jember', 'dokter hewan')
--
-- Indexes for dumped tables
--

-- --------------------------------------------------------

--
-- Table structure for table `pencatatan_data_susu`
--
CREATE TABLE pencatatan_data_susu(
	id_susu int(11) primary key,
	jumlah_volume_susu int not null,
	tanggal_pengambilan date not null,
	tanggal_penjualan date not null,
	id_users int not null
);

--
-- Dumping data for table `customer`
--
insert into pencatatan_data_susu(id_susu, jumlah_volume_susu,tanggal_pengambilan,tanggal_penjualan,id_users)
VALUES ( 1, 100, 14-03-2023, 15-03-2023, 1 )

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- Indexes for table `users`
--
ALTER TABLE `pencatatan_data_susu`
  ADD PRIMARY KEY (`id_susu`);
--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `pencatatan_data_susu`
--
ALTER TABLE `pencatatan_data_susu`
  MODIFY `id_susu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

