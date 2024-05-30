<?php 
// Import file kết nối CSDL
require './conet.php';

// Lấy và làm sạch dữ liệu từ form
$maBN = $_POST['maBN'];
$tenBN = $_POST['tenBN'];
$benhChinh = $_POST['benhChinh'];
$benhKemTheo = $_POST['benhKemTheo'];
$phuongHuong = $_POST['phuongHuong'];

// Tạo câu truy vấn SQL để thêm dữ liệu vào bảng dieutri
$query = "INSERT INTO dieutri (maBN, tenBN, benhChinh, benhKemTheo, phuongHuong) 
          VALUES ('$maBN', '$tenBN', '$benhChinh', '$benhKemTheo', '$phuongHuong')";

// Thực thi câu truy vấn
connect($query);

// Chuyển hướng người dùng về trang quản lý sản phẩm
header("location:../dieutri.php");
?>
