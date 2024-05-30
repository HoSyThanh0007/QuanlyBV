<?php 
// Yêu cầu tập tin kết nối cơ sở dữ liệu
require './conet.php';

// Bắt đầu phiên làm việc
session_start();

// Nhận và làm sạch dữ liệu từ biểu mẫu
$maBN = $_POST['maBN'];
$tenBN = $_POST['tenBN'];
$lyDo = $_POST['lyDo'];
$quaTrinh = $_POST['quaTrinh'];
$tieuSu = $_POST['tieuSu'];
$dacDiem = $_POST['dacDiem'];
$giaDinh = $_POST['giaDinh'];

// Tạo câu truy vấn
$query = "UPDATE tsbn 
          SET tenBN='$tenBN', lydovaovien='$lyDo', quatrinhbenhly='$quaTrinh', tieusubenhnhan='$tieuSu', dacdiem='$dacDiem', giadinh='$giaDinh' 
          WHERE maBN='$maBN'";

// Thực thi câu truy vấn
connect($query);

// Đặt thông báo thành công trong phiên làm việc
$_SESSION['message'] = 'Cập nhật thông tin bệnh nhân thành công';

// Chuyển hướng người dùng trở lại trang chỉnh sửa
header("Location: ../suabenhandau.php?id=$maBN");
exit();
?>
