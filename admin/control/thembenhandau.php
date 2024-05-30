<?php 
// Yêu cầu tập tin kết nối cơ sở dữ liệu
require './conet.php';
// Nhận và làm sạch dữ liệu từ biểu mẫu
$maBN = $_POST['maBN'];
$tenBN = $_POST['tenBN'];
$lyDo = $_POST['lyDo'];
$quaTrinh = $_POST['quaTrinh'];
$tieuSu = $_POST['tieuSu'];
$dacDiem = $_POST['dacDiem'];
$giaDinh = $_POST['giaDinh'];
// Tạo câu truy vấn
$query = "INSERT INTO tsbn (maBN, tenBN, lydovaovien, quatrinhbenhly, tieusubenhnhan, dacdiem, giadinh, trangThai) 
          VALUES ('$maBN', '$tenBN', '$lyDo', '$quaTrinh', '$tieuSu', '$dacDiem', '$giaDinh', '1')";
// Thực thi câu truy vấn
connect($query);
// Chuyển hướng người dùng
header("location:../tieusubn.php");
?>
