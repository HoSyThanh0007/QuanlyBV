<?php
// Import file kết nối CSDL
require './conet.php';

// Lấy dữ liệu từ form và làm sạch nó
$maBN = $_POST['maBN'];
$tenBN = $_POST['tenBN'];
$ngayDieuTri = $_POST['ngayDieuTri'];
$khoa = $_POST['Khoa'];
$phong = $_POST['Phong'];
$giuong = $_POST['Giuong'];
$ngayXuatVien = $_POST['ngayXuatVien'];

// Tạo câu truy vấn SQL để thêm dữ liệu vào bảng benhnhandt
$query= "INSERT INTO benhnhandt (maBN, tenBN, ngayDieuTri, khoa, phong, giuong, ngayXuatVien, trangthai)
         VALUES ('$maBN', '$tenBN', '$ngayDieuTri', '$khoa', '$phong', '$giuong', '$ngayXuatVien', 1)";

// Thực thi câu truy vấn
connect($query);

// Chuyển hướng người dùng về trang quản lý bệnh nhân điều trị sau khi thêm dữ liệu
header("location:../quanlybenhnhandieutri.php");
?>
