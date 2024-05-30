<?php
// Kết nối đến cơ sở dữ liệu
require './connet.php';

// Kiểm tra kết nối đã thành công chưa
if (!$con) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thời gian bắt đầu và kết thúc từ biểu mẫu
    $thoi_gian_bat_dau = $_POST['thoi_gian_bat_dau'];
    $thoi_gian_ket_thuc = $_POST['thoi_gian_ket_thuc'];

    // Chuẩn bị câu truy vấn
    $query = "SELECT * FROM vienphidieutri WHERE ngayDieuTri BETWEEN '$thoi_gian_bat_dau' AND '$thoi_gian_ket_thuc'";

    // Thực hiện truy vấn
    $result = mysqli_query($con, $query);

    // Kiểm tra kết quả
    if ($result && mysqli_num_rows($result) > 0) {
        // Hiển thị kết quả thống kê
        // Code hiển thị kết quả ở đây
    } else {
        // Xử lý khi không tìm thấy kết quả
        echo "Không tìm thấy kết quả thống kê.";
    }
} else {
    // Xử lý khi không có yêu cầu POST
    echo "Yêu cầu không hợp lệ.";
}

// Đóng kết nối cơ sở dữ liệu
mysqli_close($con);
header("location:../dsvienphikhambenh.php");
?>
