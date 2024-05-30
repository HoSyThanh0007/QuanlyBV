<?php 
// Kết nối đến cơ sở dữ liệu
require './conet.php';

// Nhận và làm sạch dữ liệu từ biểu mẫu
$maBN = $_POST['maBN'];
$tenBN = $_POST['tenBN'];
$ngayKham = $_POST['ngayKham'];
$khamtoanthan = $_POST['khamtoanthan'];
$khamtongquat = $_POST['khamtongquat'];
$xetNghiem = $_POST['xetnghiem'];
$tomTatXn = $_POST['tomtatxn'];
$chuanDoan = $_POST['chuandoan'];
$tomTat = $_POST['tomtatbenh'];

// Tạo câu truy vấn
$query = "INSERT INTO khambenh (maBN, tenBN, ngayKham, khamTongQuat, khamToanThan, xetNghiem, tomtatXN, chuandoan, tomTatBenh) 
          VALUES ('$maBN', '$tenBN', '$ngayKham', '$khamtoanthan', '$khamtongquat', '$xetNghiem', '$tomTatXn', '$chuanDoan', '$tomTat')";

// Thực thi câu truy vấn
connect($query);

// Chuyển hướng người dùng về trang quản lý khám bệnh
header("location:../khambenh.php");
?>
