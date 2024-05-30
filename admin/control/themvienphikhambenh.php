<?php 
require './conet.php'; // Bao gồm tệp 'conet.php', tệp này có khả năng chứa các hàm kết nối tới cơ sở dữ liệu.

// Lấy dữ liệu từ form
$maBN = $_POST["maBN"]; // Lấy mã bệnh nhân từ dữ liệu POST.
$tenBN = $_POST["patient-name"]; // Lấy tên bệnh nhân từ dữ liệu POST.
$ngayThanhToan = $_POST["treatment-date"]; // Lấy ngày thanh toán từ dữ liệu POST.
$khamTongQuat = $_POST["checkup-general"]; // Lấy chi phí khám tổng quát từ dữ liệu POST.
$khamToanThan = $_POST["checkup-ent"]; // Lấy chi phí khám tai mũi họng từ dữ liệu POST.
$xetNghiem = $_POST["test"]; // Lấy chi phí xét nghiệm từ dữ liệu POST.
$chuanDoan = $_POST["imaging"]; // Lấy chi phí chẩn đoán hình ảnh từ dữ liệu POST.
$BHYT = $_POST["BHYT"]; // Lấy thông tin bảo hiểm y tế từ dữ liệu POST.

$TongTien = ($khamToanThan + $khamTongQuat + $xetNghiem + $chuanDoan) - (($khamToanThan + $khamTongQuat + $xetNghiem + $chuanDoan) * ($BHYT) / 100);
// Tính tổng tiền phải thanh toán. Tổng chi phí dịch vụ trừ đi phần chiết khấu BHYT.
// Tạo câu truy vấn
$query = "INSERT INTO vienphikhambenh (maBN, tenBN, ngaythanhtoan, khamtongquat, khamtoanthan, xetnghiem, chuandoan, bhyt, tongTien) 
          VALUES ('$maBN','$tenBN','$ngayThanhToan','$khamTongQuat','$khamToanThan','$xetNghiem','$chuanDoan','$BHYT','$TongTien')";
// Tạo câu lệnh SQL để chèn dữ liệu vào bảng 'vienphikhambenh'.

// Thực thi câu truy vấn
connect($query); // Gọi hàm `connect` (được định nghĩa trong 'conet.php') để thực hiện câu truy vấn.
// Chuyển hướng trình duyệt về trang 'vienphikhambenh.php' sau khi hoàn thành.
header("location:../vienphikhambenh.php");
?>
