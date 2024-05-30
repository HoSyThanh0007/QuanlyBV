<?php 
// Kết nối đến cơ sở dữ liệu
require "./conet.php";

// Nhận dữ liệu từ biểu mẫu
$maBN = $_POST["maBN"];
$trangThai = $_POST["trangThai"];

// Tạo câu truy vấn UPDATE để cập nhật trạng thái của bệnh nhân
$query = "UPDATE `tsbn` SET `trangThai`='$trangThai' WHERE maBN='$maBN'"; 

// Thực thi câu truy vấn
connect($query);

// Chuyển hướng người dùng về trang danh sách khám bệnh sau khi cập nhật trạng thái
header("location: ../danhsachkhambenh.php");
?>  
