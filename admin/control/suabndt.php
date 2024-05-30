<?php
require './conet.php';

// Start session
session_start();

// Kiểm tra xem dữ liệu đã được gửi từ form sửa hay chưa
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy và kiểm tra dữ liệu từ form
    $maBN = $_POST['maBN'];
    $tenBN = $_POST['tenBN'];
    $lyDo = $_POST['ngayDieuTri'];
    $quaTrinh = $_POST['Khoa'];
    $tieuSu = $_POST['Phong'];
    $dacDiem = $_POST['Giuong'];
    $giaDinh = $_POST['ngayXuatVien'];
    
    // Tạo câu lệnh SQL để cập nhật thông tin bệnh nhân
    $query = "UPDATE benhnhandt 
              SET tenBN='$tenBN', 
                  ngayDieuTri='$lyDo', 
                  khoa='$quaTrinh', 
                  phong='$tieuSu', 
                  giuong='$dacDiem', 
                  ngayXuatVien='$giaDinh' 
              WHERE maBN='$maBN'";
connect($query);
$_SESSION['message'] = 'Cập nhật thông tin bệnh nhân thành công';
// Điều hướng người dùng đến trang sửa thông tin với thông báo thành công
header("Location: ../suabndt.php?maBN=$maBN");
exit();
}
?>
