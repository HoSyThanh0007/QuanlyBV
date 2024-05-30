<?php
require './conet.php'; // Kết nối đến cơ sở dữ liệu
session_start();
// Kiểm tra xem phương thức gửi dữ liệu có phải là POST không
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nhận dữ liệu từ biểu mẫu sửa thông tin điều trị
    $maBN = $_POST['maBN'];
    $tenBN = $_POST['tenBN'];
    $benhChinh = $_POST['benhChinh'];
    $benhKemTheo = $_POST['benhKemTheo'];
    $phuongHuong = $_POST['phuongHuong'];

    // Kiểm tra dữ liệu nhập vào
    if (empty($maBN) || empty($tenBN) || empty($benhChinh) || empty($phuongHuong)) {
        // Nếu dữ liệu không hợp lệ, điều hướng người dùng trở lại trang sửa thông tin với thông báo lỗi
        header("Location: ./suadieutri.php?error=Vui lòng nhập đầy đủ thông tin.");
        exit();
    }

    // Tạo truy vấn cập nhật để sửa thông tin trong cơ sở dữ liệu
    $query = "UPDATE dieutri 
              SET tenBN='$tenBN', benhChinh='$benhChinh', benhKemTheo='$benhKemTheo', phuongHuong='$phuongHuong' 
              WHERE maBN='$maBN'";

    // Thực hiện truy vấn cập nhật
    connect($query);
    $_SESSION['message'] = 'Cập nhật thông tin bệnh nhân thành công';
    // Điều hướng người dùng đến trang sửa thông tin với thông báo thành công
    header("Location: ../suadieutri.php?id=$maBN");
    exit();
}

?>
