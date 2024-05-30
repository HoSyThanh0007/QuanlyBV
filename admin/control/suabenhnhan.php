<?php 
// Bao gồm tệp kết nối cơ sở dữ liệu
require './conet.php';
// Bắt đầu phiên làm việc
session_start();

// Lấy và làm sạch dữ liệu từ biểu mẫu
$maBN = $_POST['maBN'];
$tenBN = $_POST['tenBN'];
$gioiTinh = $_POST['gioiTinh'];
$diaChi = $_POST['diaChi'];
$ngaySinh = $_POST['ngaySinh'];
$danToc = $_POST['danToc'];
$cccd = $_POST['cccd'];
$soTheBHYT = $_POST['soTheBHYT'];
$thoihanBHYT = $_POST['thoihanBHYT'];
$ngheNghiep = $_POST['ngheNghiep'];
$ngayVaoVien = $_POST['ngayVaoVien'];

// Tạo truy vấn SQL
$query = "UPDATE benhnhan1 
          SET tenBN='$tenBN', gioiTinh='$gioiTinh', diaChi='$diaChi', ngaySinh='$ngaySinh', danToc='$danToc', CCCD='$cccd', soTheBHYT='$soTheBHYT', thoiHaTheBHYT='$thoihanBHYT', ngheNghiep='$ngheNghiep', ngayVaoVien='$ngayVaoVien' 
          WHERE maBN='$maBN'";

// Thực thi truy vấn SQL
connect($query);

// Thiết lập thông báo thành công trong phiên làm việc
$_SESSION['message'] = 'Cập nhật thông tin bệnh nhân thành công';

// Chuyển hướng người dùng về trang chỉnh sửa
header("Location: ../suabenhnhan.php?id=$maBN");
exit();
?>
