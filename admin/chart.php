<?php
session_start();
if(!isset($_SESSION['admin'])){
    header('location: login.php');
    exit;
}

include 'database_connection.php'; // Đảm bảo bạn đã kết nối CSDL

$days = 30;
$query = "SELECT ngaythanhtoan, SUM((khamtongquat + khamtoanthan + xetnghiem + chuandoan) - ((khamtongquat + khamtoanthan + xetnghiem + chuandoan) * bhyt / 100)) as total_fee
          FROM payments
          WHERE ngaythanhtoan >= CURDATE() - INTERVAL $days DAY
          GROUP BY ngaythanhtoan";

$result = $conn->query($query);

$fees = [];
while($row = $result->fetch_assoc()) {
    $fees[] = $row;
}

header('Content-Type: application/json');
echo json_encode($fees);
?>
