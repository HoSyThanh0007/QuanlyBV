<?php
require './conet.php';
session_start();
// sửa thông tin khám bệnh vào csdl
// Lấy thông tin từ form
$maBN= $_POST['maBN'];

$khamtongquat= $_POST['khamtongquat'];
$khamtoanthan= $_POST['khamtoanthan'];
$xetnghiem= $_POST['xetnghiem'];
$tomtatxn= $_POST['tomtatxn'];
$chuandoan= $_POST['chuandoan'];
$tomtatbenh= $_POST['tomtatbenh'];
// Cập nhật thông tin vào cơ sở dữ liệu
$query = "UPDATE khambenh SET khamTongQuat='$khamtongquat', khamToanThan='$khamtoanthan', xetNghiem='$xetnghiem', tomtatXN='$tomtatxn', chuandoan='$chuandoan', tomTatBenh='$tomtatbenh' WHERE MaBN='$maBN'";
//  var_dump($query);die;
connect($query);

// Set success message in session
$_SESSION['message'] = 'Cập nhật thông tin bệnh nhân thành công';

// Redirect the user back to the edit page
header("Location: ../suakhambenh.php?id=$maBN");
exit();
?>