-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2024 at 09:09 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csdlbv`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `benhnhan`
--

CREATE TABLE `benhnhan` (
  `maBN` int(11) NOT NULL,
  `tenBN` varchar(100) NOT NULL,
  `gioiTinh` varchar(20) NOT NULL,
  `diaChi` varchar(30) NOT NULL,
  `ngaySinh` date NOT NULL,
  `danToc` varchar(30) NOT NULL,
  `CCCD` varchar(20) NOT NULL,
  `soTheBHYT` varchar(20) NOT NULL,
  `thoiHanTheBHYT` date NOT NULL,
  `ngheNghiep` varchar(50) NOT NULL,
  `ngayVaoVien` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

-- --------------------------------------------------------

--
-- Table structure for table `benhnhan1`
--

CREATE TABLE `benhnhan1` (
  `id` int(11) NOT NULL,
  `maBN` varchar(100) NOT NULL,
  `tenBN` varchar(100) NOT NULL,
  `gioiTinh` varchar(10) NOT NULL,
  `diaChi` varchar(50) NOT NULL,
  `ngaySinh` date NOT NULL,
  `danToc` varchar(30) NOT NULL,
  `CCCD` varchar(15) NOT NULL,
  `soTheBHYT` varchar(15) NOT NULL,
  `thoiHaTheBHYT` date NOT NULL,
  `ngheNghiep` varchar(50) NOT NULL,
  `ngayVaoVien` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `benhnhan1`
--

INSERT INTO `benhnhan1` (`id`, `maBN`, `tenBN`, `gioiTinh`, `diaChi`, `ngaySinh`, `danToc`, `CCCD`, `soTheBHYT`, `thoiHaTheBHYT`, `ngheNghiep`, `ngayVaoVien`) VALUES
(4, 'BN001', 'Lê văn Minh', 'Nam', 'hà nội ', '2024-05-06', 'kinh', '0595949492293', '00399332', '2024-05-23', 'học sinh', '2024-05-20'),
(5, 'BN0002', 'Lê Văn Nam', 'nữ', 'Hà Nội', '2014-07-01', 'Thái', '094873738223', '00399532', '2024-05-03', 'học sinh', '2025-05-05'),
(7, 'BN003', 'Văn Tiến Anh', 'nam', 'thanh hóa', '2015-05-13', 'kinh', '0595949492266', '0707077777', '2024-05-31', 'học sinh', '2024-05-21'),
(8, 'BN006', 'lê văn ba', 'nam', 'hà nội', '0000-00-00', 'kinh', '8669695', '44444', '2024-05-20', 'giáo viên', '2024-05-20'),
(9, 'BN004', 'Phùng Văn Thái', 'nam', 'Vĩnh phúc', '2006-02-08', 'Thái', '396969585544', '295958744', '2024-05-15', 'kĩ sư', '2024-05-23'),
(11, 'BN008', 'Phùng Văn Lộc', 'nam', 'Vĩnh phúc', '0000-00-00', 'Thái', '396969585544', 'không có', '0000-00-00', 'kĩ sư', '2024-05-28'),
(12, 'BN002', 'Ngyễn Hùng Anh', 'nam', 'hà nội', '2024-05-06', 'kinh', '55558888', '55587777', '2024-05-31', 'kĩ sư', '2024-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `benhnhandt`
--

CREATE TABLE `benhnhandt` (
  `id` int(11) NOT NULL,
  `maBN` varchar(150) NOT NULL,
  `tenBN` varchar(150) NOT NULL,
  `ngayDieuTri` date NOT NULL,
  `khoa` varchar(150) NOT NULL,
  `phong` varchar(200) NOT NULL,
  `giuong` varchar(250) NOT NULL,
  `ngayXuatVien` date NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `benhnhandt`
--

INSERT INTO `benhnhandt` (`id`, `maBN`, `tenBN`, `ngayDieuTri`, `khoa`, `phong`, `giuong`, `ngayXuatVien`, `trangthai`) VALUES
(1, 'BN001', 'Nguyễn Văn Anh', '2024-05-21', 'Khoa nội soi', 'G102', 'G5', '2024-05-31', 2),
(2, 'BN002', 'Lê Văn Mạnh ', '2024-05-16', 'Khoa ngoại', 'G101', 'G1', '2024-05-30', 2),
(3, 'BN006', 'Phùng Văn Thái', '2024-05-15', 'Khoa Thần kinh', 'G101', 'G5', '2024-05-19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bennhandieutri`
--

CREATE TABLE `bennhandieutri` (
  `id` int(11) NOT NULL,
  `maBN` varchar(25) NOT NULL,
  `TenBN` varchar(100) NOT NULL,
  `ngayDT` date NOT NULL,
  `khoa` int(11) NOT NULL,
  `phong` int(11) NOT NULL,
  `giuong` int(11) NOT NULL,
  `ngayXuat` date NOT NULL,
  `trangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `bennhandieutri`
--

INSERT INTO `bennhandieutri` (`id`, `maBN`, `TenBN`, `ngayDT`, `khoa`, `phong`, `giuong`, `ngayXuat`, `trangThai`) VALUES
(1, 'BN001', 'Lê Văn Mạnh', '2024-05-08', 2, 1, 1, '2024-05-21', 1),
(2, 'BN002', 'Lê Văn Mạnh', '2024-05-08', 2, 2, 1, '2024-05-21', 2);

-- --------------------------------------------------------

--
-- Table structure for table `bhyt`
--

CREATE TABLE `bhyt` (
  `id` int(11) NOT NULL,
  `bhyt` varchar(50) NOT NULL,
  `giam` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `bhyt`
--

INSERT INTO `bhyt` (`id`, `bhyt`, `giam`) VALUES
(1, 'có', 0.3),
(1, 'không', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bndt`
--

CREATE TABLE `bndt` (
  `id` int(11) NOT NULL,
  `maBN` varchar(50) NOT NULL,
  `TenBN` varchar(100) NOT NULL,
  `ngayDT` date NOT NULL,
  `khoa` int(11) NOT NULL,
  `phong` int(11) NOT NULL,
  `giuong` int(11) NOT NULL,
  `ngayXuat` date NOT NULL,
  `trangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `bndt`
--

INSERT INTO `bndt` (`id`, `maBN`, `TenBN`, `ngayDT`, `khoa`, `phong`, `giuong`, `ngayXuat`, `trangThai`) VALUES
(1, 'BN001', 'Lê Văn Mạnh', '2024-05-08', 1, 1, 1, '2024-05-12', 2);

-- --------------------------------------------------------

--
-- Table structure for table `dieutri`
--

CREATE TABLE `dieutri` (
  `id` int(11) NOT NULL,
  `maBN` varchar(100) NOT NULL,
  `tenBN` varchar(100) NOT NULL,
  `benhChinh` varchar(150) NOT NULL,
  `benhKemTheo` varchar(150) NOT NULL,
  `phuongHuong` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `dieutri`
--

INSERT INTO `dieutri` (`id`, `maBN`, `tenBN`, `benhChinh`, `benhKemTheo`, `phuongHuong`) VALUES
(2, 'BN002', 'Lê Văn Mạnh', 'đau dạ dày 2', 'không có ', 'uống thuốc'),
(3, 'BN001', 'Nguyễn Văn Anh', 'đau ruột thừa', 'không ', 'năm viện và cắt ruột thừa'),
(4, 'BN006', 'Phùng Văn Thái', 'đau dạ dày', 'không có', 'uống thuốc');

-- --------------------------------------------------------

--
-- Table structure for table `giuong`
--

CREATE TABLE `giuong` (
  `id` int(11) NOT NULL,
  `tenGiuong` varchar(250) NOT NULL,
  `Phong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `giuong`
--

INSERT INTO `giuong` (`id`, `tenGiuong`, `Phong`) VALUES
(1, 'G1', 1),
(4, 'G3', 2),
(5, 'G4', 2),
(6, 'G5', 2);

-- --------------------------------------------------------

--
-- Table structure for table `khambenh`
--

CREATE TABLE `khambenh` (
  `id` int(11) NOT NULL,
  `MaBN` varchar(100) NOT NULL,
  `tenBN` varchar(255) NOT NULL,
  `ngayKham` date NOT NULL,
  `khamTongQuat` varchar(100) NOT NULL,
  `khamToanThan` varchar(255) NOT NULL,
  `xetNghiem` varchar(100) NOT NULL,
  `tomtatXN` varchar(255) NOT NULL,
  `chuandoan` varchar(255) NOT NULL,
  `tomTatBenh` varchar(155) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `khambenh`
--

INSERT INTO `khambenh` (`id`, `MaBN`, `tenBN`, `ngayKham`, `khamTongQuat`, `khamToanThan`, `xetNghiem`, `tomtatXN`, `chuandoan`, `tomTatBenh`) VALUES
(1, 'BN001', 'Phùng Văn Thái', '2024-05-23', 'không ', 'không', 'xét nghiệm máu', 'bị viêm gan B', 'không', 'chữa bệnh về răng hàm mặt'),
(2, 'BN008', 'lê văn Mạnh', '2024-05-21', 'không ', 'không', 'xét nghiệm máu', 'bị viêm gan B', 'không', 'bị viêm gan B'),
(3, 'BN002', 'Lê Văn Mạnh', '2024-05-22', 'không có', 'bị gãy chân', 'không có', 'không', 'chụp X_quang', 'Bị gãy chân phải'),
(4, 'BN003', 'Phùng Văn Thái', '2024-05-23', 'viêm ruột thừa ', 'không', 'không có', 'không', 'không', 'đau ruột thừa, cần mổ');

-- --------------------------------------------------------

--
-- Table structure for table `khoa`
--

CREATE TABLE `khoa` (
  `id` int(11) NOT NULL,
  `tenKhoa` varchar(100) NOT NULL,
  `tienvien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `khoa`
--

INSERT INTO `khoa` (`id`, `tenKhoa`, `tienvien`) VALUES
(1, 'Khoa cấp cứu', 500000),
(2, 'Khoa ngoại', 200000),
(4, 'Khoa nội soi', 300000),
(5, 'Khoa Thần kinh', 350000),
(7, 'khoa phụ sản', 300000);

-- --------------------------------------------------------

--
-- Table structure for table `phong`
--

CREATE TABLE `phong` (
  `id` int(11) NOT NULL,
  `tenPhong` varchar(250) NOT NULL,
  `Khoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `phong`
--

INSERT INTO `phong` (`id`, `tenPhong`, `Khoa`) VALUES
(1, 'G101', 1),
(2, 'G102', 2);

-- --------------------------------------------------------

--
-- Table structure for table `trangthai`
--

CREATE TABLE `trangthai` (
  `id` int(11) NOT NULL,
  `trangThai` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `trangthai`
--

INSERT INTO `trangthai` (`id`, `trangThai`) VALUES
(1, 'Đang điều trị'),
(2, 'Đã xuất viện');

-- --------------------------------------------------------

--
-- Table structure for table `tsbn`
--

CREATE TABLE `tsbn` (
  `id` int(11) NOT NULL,
  `maBN` varchar(255) NOT NULL,
  `tenBN` varchar(110) NOT NULL,
  `lydovaovien` varchar(50) NOT NULL,
  `quatrinhbenhly` varchar(100) NOT NULL,
  `tieusubenhnhan` varchar(110) NOT NULL,
  `dacdiem` varchar(100) NOT NULL,
  `giadinh` varchar(100) NOT NULL,
  `trangThai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `tsbn`
--

INSERT INTO `tsbn` (`id`, `maBN`, `tenBN`, `lydovaovien`, `quatrinhbenhly`, `tieusubenhnhan`, `dacdiem`, `giadinh`, `trangThai`) VALUES
(1, 'BN001', 'Lê Văn Mạnh', 'đau bụng', 'đau 3 ngày liên tục', 'đau dạ dày', 'đau thắt ', 'không có ', 2),
(2, 'BN002', 'Lê Văn Minh', 'đau bụng', 'đau kéo dài', 'không có ', 'đau 2 ngày', 'không có', 1),
(3, 'BN004', 'lê văn Mạnh', 'đau dạ dày', 'đau phần dưới', 'không có', 'không có ', 'đau dạ dày', 2),
(4, 'BN005', 'Nguyễn Văn A', 'đau bụng', 'đau phần dưới', 'không có', 'không có ', 'đau dạ dày', 1),
(5, 'BN006', 'Nguyễn Văn B', 'gãy chân ', 'gãy chân phải khi tai nạn giao thông', 'không có', 'không có ', 'không có', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tt`
--

CREATE TABLE `tt` (
  `id` int(11) NOT NULL,
  `trangThai` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `tt`
--

INSERT INTO `tt` (`id`, `trangThai`) VALUES
(1, 'chưa khám bệnh'),
(2, 'đã khám bệnh');

-- --------------------------------------------------------

--
-- Table structure for table `vienphidieutri`
--

CREATE TABLE `vienphidieutri` (
  `id` int(11) NOT NULL,
  `maBN` varchar(30) NOT NULL,
  `tenBN` varchar(100) NOT NULL,
  `ngayDieuTri` date NOT NULL,
  `ngayXuatVien` date NOT NULL,
  `tongNgay` int(11) NOT NULL,
  `tenKhoa` varchar(240) NOT NULL,
  `soTien` int(11) NOT NULL,
  `bhyt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `vienphidieutri`
--

INSERT INTO `vienphidieutri` (`id`, `maBN`, `tenBN`, `ngayDieuTri`, `ngayXuatVien`, `tongNgay`, `tenKhoa`, `soTien`, `bhyt`) VALUES
(11, 'BN002', 'Lê Văn Mạnh', '2024-05-08', '2024-05-21', 13, 'Khoa cấp cứu', 500000, 20),
(12, 'BN001', 'Lê Văn Mạnh', '2024-05-08', '2024-05-21', 13, 'Khoa nội soi', 300000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `vienphikhambenh`
--

CREATE TABLE `vienphikhambenh` (
  `id` int(11) NOT NULL,
  `maBN` varchar(250) NOT NULL,
  `tenBN` varchar(255) NOT NULL,
  `ngaythanhtoan` date NOT NULL,
  `khamtongquat` int(11) NOT NULL,
  `khamtoanthan` int(11) NOT NULL,
  `xetnghiem` int(11) NOT NULL,
  `chuandoan` int(11) NOT NULL,
  `bhyt` int(11) NOT NULL,
  `tongTien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `vienphikhambenh`
--

INSERT INTO `vienphikhambenh` (`id`, `maBN`, `tenBN`, `ngaythanhtoan`, `khamtongquat`, `khamtoanthan`, `xetnghiem`, `chuandoan`, `bhyt`, `tongTien`) VALUES
(95, 'BN001', 'Lê văn Minh', '2024-05-21', 300000, 0, 0, 500000, 20, 640000),
(96, 'BN008', 'Phùng Văn Lộc', '2024-05-23', 300000, 0, 200000, 0, 20, 400000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `benhnhan`
--
ALTER TABLE `benhnhan`
  ADD PRIMARY KEY (`maBN`);

--
-- Indexes for table `benhnhan1`
--
ALTER TABLE `benhnhan1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benhnhandt`
--
ALTER TABLE `benhnhandt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trangthai` (`trangthai`);

--
-- Indexes for table `bennhandieutri`
--
ALTER TABLE `bennhandieutri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `giuong` (`giuong`),
  ADD KEY `khoa` (`khoa`),
  ADD KEY `phong` (`phong`),
  ADD KEY `trangThai` (`trangThai`);

--
-- Indexes for table `bndt`
--
ALTER TABLE `bndt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `giuong` (`giuong`),
  ADD KEY `trangThai` (`trangThai`),
  ADD KEY `phong` (`phong`),
  ADD KEY `khoa` (`khoa`);

--
-- Indexes for table `dieutri`
--
ALTER TABLE `dieutri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `giuong`
--
ALTER TABLE `giuong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Phong` (`Phong`);

--
-- Indexes for table `khambenh`
--
ALTER TABLE `khambenh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Khoa` (`Khoa`);

--
-- Indexes for table `trangthai`
--
ALTER TABLE `trangthai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tsbn`
--
ALTER TABLE `tsbn`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maBN` (`tenBN`),
  ADD KEY `trangThai` (`trangThai`);

--
-- Indexes for table `tt`
--
ALTER TABLE `tt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vienphidieutri`
--
ALTER TABLE `vienphidieutri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vienphikhambenh`
--
ALTER TABLE `vienphikhambenh`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `benhnhan`
--
ALTER TABLE `benhnhan`
  MODIFY `maBN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2002;

--
-- AUTO_INCREMENT for table `benhnhan1`
--
ALTER TABLE `benhnhan1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `benhnhandt`
--
ALTER TABLE `benhnhandt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bndt`
--
ALTER TABLE `bndt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dieutri`
--
ALTER TABLE `dieutri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `giuong`
--
ALTER TABLE `giuong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `khambenh`
--
ALTER TABLE `khambenh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `khoa`
--
ALTER TABLE `khoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `phong`
--
ALTER TABLE `phong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `trangthai`
--
ALTER TABLE `trangthai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tsbn`
--
ALTER TABLE `tsbn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tt`
--
ALTER TABLE `tt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vienphidieutri`
--
ALTER TABLE `vienphidieutri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `vienphikhambenh`
--
ALTER TABLE `vienphikhambenh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `benhnhandt`
--
ALTER TABLE `benhnhandt`
  ADD CONSTRAINT `benhnhandt_ibfk_1` FOREIGN KEY (`trangthai`) REFERENCES `trangthai` (`id`);

--
-- Constraints for table `bennhandieutri`
--
ALTER TABLE `bennhandieutri`
  ADD CONSTRAINT `bennhandieutri_ibfk_1` FOREIGN KEY (`giuong`) REFERENCES `giuong` (`id`),
  ADD CONSTRAINT `bennhandieutri_ibfk_2` FOREIGN KEY (`khoa`) REFERENCES `khoa` (`id`),
  ADD CONSTRAINT `bennhandieutri_ibfk_3` FOREIGN KEY (`phong`) REFERENCES `phong` (`id`),
  ADD CONSTRAINT `bennhandieutri_ibfk_4` FOREIGN KEY (`trangThai`) REFERENCES `trangthai` (`id`);

--
-- Constraints for table `bndt`
--
ALTER TABLE `bndt`
  ADD CONSTRAINT `bndt_ibfk_1` FOREIGN KEY (`giuong`) REFERENCES `giuong` (`id`),
  ADD CONSTRAINT `bndt_ibfk_2` FOREIGN KEY (`khoa`) REFERENCES `khoa` (`id`),
  ADD CONSTRAINT `bndt_ibfk_3` FOREIGN KEY (`trangThai`) REFERENCES `trangthai` (`id`),
  ADD CONSTRAINT `bndt_ibfk_4` FOREIGN KEY (`khoa`) REFERENCES `giuong` (`id`);

--
-- Constraints for table `giuong`
--
ALTER TABLE `giuong`
  ADD CONSTRAINT `giuong_ibfk_1` FOREIGN KEY (`Phong`) REFERENCES `phong` (`id`);

--
-- Constraints for table `phong`
--
ALTER TABLE `phong`
  ADD CONSTRAINT `phong_ibfk_1` FOREIGN KEY (`Khoa`) REFERENCES `khoa` (`id`);

--
-- Constraints for table `tsbn`
--
ALTER TABLE `tsbn`
  ADD CONSTRAINT `tsbn_ibfk_2` FOREIGN KEY (`trangThai`) REFERENCES `tt` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
