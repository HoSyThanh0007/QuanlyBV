<?php 
// Bao gồm tệp conet.php để sử dụng hàm kết nối cơ sở dữ liệu
require './conet.php';
    
// Lấy dữ liệu từ form gửi qua phương thức POST
$maBN = $_POST['maBN']; // Mã bệnh nhân
$tenBN = $_POST['patient-name']; // Tên bệnh nhân
$ngayDieuTri = $_POST['ngayDieuTri']; // Ngày điều trị
$ngayXuatVien = $_POST['ngayXuatVien']; // Ngày xuất viện
$tongNgay = $_POST['tongNgay']; // Tổng số ngày điều trị
$tenKhoa = $_POST['tenKhoa']; // Tên khoa điều trị
$vienphi = $_POST['vienphi']; // Viện phí
$BHYT = $_POST["BHYT"]; // Tỷ lệ bảo hiểm y tế (BHYT)

// Tạo truy vấn SQL để chèn dữ liệu vào bảng vienphidieutri
$query = "INSERT INTO vienphidieutri (maBN, tenBN, ngayDieuTri, ngayXuatVien, tongNgay, tenkhoa, soTien, bhyt) 
          VALUES ('$maBN', '$tenBN', '$ngayDieuTri', '$ngayXuatVien', '$tongNgay', '$tenKhoa', '$vienphi', '$BHYT')";

// Gọi hàm connect() để thực hiện truy vấn
connect($query);

// Chuyển hướng trình duyệt về trang vienphidieutri.php sau khi chèn dữ liệu thành công
header("location:../vienphidieutri.php");
?>
