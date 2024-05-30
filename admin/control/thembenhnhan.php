<?php 
// Bao gồm tệp kết nối cơ sở dữ liệu
require './conet.php';
 
// Lấy dữ liệu từ biểu mẫu POST
$maBN = $_POST['maBN'];
$tenBN = $_POST['tenBN'];
$GT = $_POST['gioiTinh'];
$DC = $_POST['diaChi'];
$NS = $_POST['ngaySinh'];
$danToc = $_POST['danToc'];
$cccd = $_POST['cccd'];
$sotheBHYT = $_POST['sotheBHYT'];
$thoiHan = $_POST['thoihanBHYT'];
$nghenghiep = $_POST['ngheNghiep'];
$ngay = $_POST['ngayVaoVien'];

// Tạo truy vấn SQL để chèn dữ liệu vào bảng benhnhan1
$query = "INSERT INTO benhnhan1 (maBN, tenBN, gioiTinh, diaChi, ngaySinh, danToc, CCCD, soTheBHYT, thoiHaTheBHYT, ngheNghiep, ngayVaoVien) 
          VALUES ('$maBN', '$tenBN', '$GT', '$DC', '$NS', '$danToc', '$cccd', '$sotheBHYT', '$thoiHan', '$nghenghiep', '$ngay')";

// Kết nối và thực hiện truy vấn SQL
connect($query);

// Chuyển hướng người dùng đến trang  sau khi thêm bệnh nhân thành công
header("location:../nhanvien.php");
?>
