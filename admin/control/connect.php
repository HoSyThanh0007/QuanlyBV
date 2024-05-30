<?php
// connect.php
$host = "localhost";
$user = "root";
$password = "";
$database = "csdlbv";
$con = mysqli_connect($host, $username, $password, $database);

// Kiểm tra kết nối
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
?>
