-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2024 at 11:00 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `btl`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblalbumanh`
--

CREATE TABLE `tblalbumanh` (
  `maanh` int(11) NOT NULL,
  `tenanh` varchar(255) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `lienket` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblbaiviet`
--

CREATE TABLE `tblbaiviet` (
  `mabaiviet` int(11) NOT NULL,
  `tenbaiviet` varchar(255) NOT NULL,
  `machuyenmuccon` int(11) NOT NULL,
  `noidung` text NOT NULL,
  `luotxem` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `mataikhoan` int(11) NOT NULL,
  `ngaydang` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblcauhoi`
--

CREATE TABLE `tblcauhoi` (
  `macauhoi` int(11) NOT NULL,
  `cauhoi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblchuyenmuccha`
--

CREATE TABLE `tblchuyenmuccha` (
  `machuyenmuccha` int(11) NOT NULL,
  `tenchuyenmuccha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblchuyenmuccon`
--

CREATE TABLE `tblchuyenmuccon` (
  `machuyenmuccon` int(11) NOT NULL,
  `tenchuyenmuccon` varchar(50) NOT NULL,
  `machuyenmuccha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblhotro`
--

CREATE TABLE `tblhotro` (
  `mahotro` int(11) NOT NULL,
  `macauhoi` int(11) NOT NULL,
  `noidung` text NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `sodienthoai` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `thoigian` datetime NOT NULL DEFAULT current_timestamp(),
  `trangthai` bit(1) NOT NULL DEFAULT b'0',
  `mataikhoan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblslidealbum`
--

CREATE TABLE `tblslidealbum` (
  `maslideshow` int(11) NOT NULL,
  `tenslideshow` varchar(50) NOT NULL,
  `maanh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblslidehome`
--

CREATE TABLE `tblslidehome` (
  `maslideshow` int(11) NOT NULL,
  `tenslideshow` varchar(50) NOT NULL,
  `maanh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbltaikhoan`
--

CREATE TABLE `tbltaikhoan` (
  `mataikhoan` int(11) NOT NULL,
  `tentaikhoan` varchar(50) NOT NULL,
  `tendangnhap` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `quyen` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `sodienthoai` varchar(10) NOT NULL,
  `chucvu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbltaikhoan`
--

INSERT INTO `tbltaikhoan` (`mataikhoan`, `tentaikhoan`, `tendangnhap`, `matkhau`, `quyen`, `email`, `sodienthoai`, `chucvu`) VALUES
(1, 'Nguyễn Văn A', 'thaya', '123', 'Quản trị viên', 'thaygiaoa@hau.edu.vn', '0123456788', 'Trưởng khoa');

-- --------------------------------------------------------

--
-- Table structure for table `tblvideo`
--

CREATE TABLE `tblvideo` (
  `mavideo` int(11) NOT NULL,
  `tenvideo` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `luotxem` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblykien`
--

CREATE TABLE `tblykien` (
  `maykien` int(11) NOT NULL,
  `mabaiviet` int(11) NOT NULL,
  `noidung` text NOT NULL,
  `hoten` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `thoigian` datetime NOT NULL DEFAULT current_timestamp(),
  `trangthai` bit(1) NOT NULL DEFAULT b'0',
  `mataikhoan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblalbumanh`
--
ALTER TABLE `tblalbumanh`
  ADD PRIMARY KEY (`maanh`);

--
-- Indexes for table `tblbaiviet`
--
ALTER TABLE `tblbaiviet`
  ADD PRIMARY KEY (`mabaiviet`),
  ADD KEY `machuyenmuccon` (`machuyenmuccon`),
  ADD KEY `mataikhoan` (`mataikhoan`);

--
-- Indexes for table `tblcauhoi`
--
ALTER TABLE `tblcauhoi`
  ADD PRIMARY KEY (`macauhoi`);

--
-- Indexes for table `tblchuyenmuccha`
--
ALTER TABLE `tblchuyenmuccha`
  ADD PRIMARY KEY (`machuyenmuccha`);

--
-- Indexes for table `tblchuyenmuccon`
--
ALTER TABLE `tblchuyenmuccon`
  ADD PRIMARY KEY (`machuyenmuccon`),
  ADD KEY `machuyenmuccha` (`machuyenmuccha`);

--
-- Indexes for table `tblhotro`
--
ALTER TABLE `tblhotro`
  ADD PRIMARY KEY (`mahotro`),
  ADD KEY `macauhoi` (`macauhoi`),
  ADD KEY `mataikhoan` (`mataikhoan`);

--
-- Indexes for table `tblslidealbum`
--
ALTER TABLE `tblslidealbum`
  ADD PRIMARY KEY (`maslideshow`),
  ADD KEY `maanh` (`maanh`);

--
-- Indexes for table `tblslidehome`
--
ALTER TABLE `tblslidehome`
  ADD PRIMARY KEY (`maslideshow`),
  ADD KEY `maanh` (`maanh`);

--
-- Indexes for table `tbltaikhoan`
--
ALTER TABLE `tbltaikhoan`
  ADD PRIMARY KEY (`mataikhoan`);

--
-- Indexes for table `tblvideo`
--
ALTER TABLE `tblvideo`
  ADD PRIMARY KEY (`mavideo`);

--
-- Indexes for table `tblykien`
--
ALTER TABLE `tblykien`
  ADD PRIMARY KEY (`maykien`),
  ADD KEY `mabaiviet` (`mabaiviet`),
  ADD KEY `mataikhoan` (`mataikhoan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblalbumanh`
--
ALTER TABLE `tblalbumanh`
  MODIFY `maanh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblbaiviet`
--
ALTER TABLE `tblbaiviet`
  MODIFY `mabaiviet` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcauhoi`
--
ALTER TABLE `tblcauhoi`
  MODIFY `macauhoi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblchuyenmuccha`
--
ALTER TABLE `tblchuyenmuccha`
  MODIFY `machuyenmuccha` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblchuyenmuccon`
--
ALTER TABLE `tblchuyenmuccon`
  MODIFY `machuyenmuccon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblhotro`
--
ALTER TABLE `tblhotro`
  MODIFY `mahotro` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblslidealbum`
--
ALTER TABLE `tblslidealbum`
  MODIFY `maslideshow` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblslidehome`
--
ALTER TABLE `tblslidehome`
  MODIFY `maslideshow` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbltaikhoan`
--
ALTER TABLE `tbltaikhoan`
  MODIFY `mataikhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblvideo`
--
ALTER TABLE `tblvideo`
  MODIFY `mavideo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblykien`
--
ALTER TABLE `tblykien`
  MODIFY `maykien` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblbaiviet`
--
ALTER TABLE `tblbaiviet`
  ADD CONSTRAINT `tblbaiviet_ibfk_1` FOREIGN KEY (`machuyenmuccon`) REFERENCES `tblchuyenmuccon` (`machuyenmuccon`),
  ADD CONSTRAINT `tblbaiviet_ibfk_2` FOREIGN KEY (`mataikhoan`) REFERENCES `tbltaikhoan` (`mataikhoan`);

--
-- Constraints for table `tblchuyenmuccon`
--
ALTER TABLE `tblchuyenmuccon`
  ADD CONSTRAINT `tblchuyenmuccon_ibfk_1` FOREIGN KEY (`machuyenmuccha`) REFERENCES `tblchuyenmuccha` (`machuyenmuccha`);

--
-- Constraints for table `tblhotro`
--
ALTER TABLE `tblhotro`
  ADD CONSTRAINT `tblhotro_ibfk_1` FOREIGN KEY (`macauhoi`) REFERENCES `tblcauhoi` (`macauhoi`),
  ADD CONSTRAINT `tblhotro_ibfk_2` FOREIGN KEY (`mataikhoan`) REFERENCES `tbltaikhoan` (`mataikhoan`);

--
-- Constraints for table `tblslidealbum`
--
ALTER TABLE `tblslidealbum`
  ADD CONSTRAINT `tblslidealbum_ibfk_1` FOREIGN KEY (`maanh`) REFERENCES `tblalbumanh` (`maanh`);

--
-- Constraints for table `tblslidehome`
--
ALTER TABLE `tblslidehome`
  ADD CONSTRAINT `tblslidehome_ibfk_1` FOREIGN KEY (`maanh`) REFERENCES `tblalbumanh` (`maanh`);

--
-- Constraints for table `tblykien`
--
ALTER TABLE `tblykien`
  ADD CONSTRAINT `tblykien_ibfk_1` FOREIGN KEY (`mabaiviet`) REFERENCES `tblbaiviet` (`mabaiviet`),
  ADD CONSTRAINT `tblykien_ibfk_2` FOREIGN KEY (`mataikhoan`) REFERENCES `tbltaikhoan` (`mataikhoan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
