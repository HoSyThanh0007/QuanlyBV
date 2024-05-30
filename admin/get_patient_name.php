<?php
include './connect_db.php';
if (isset($_GET['maBN'])) {
    $maBN = $_GET['maBN'];
    $query = "SELECT tenBN FROM benhnhan1 WHERE maBN = '$maBN'";
    $result = mysqli_query($con, $query);
    if ($row = mysqli_fetch_assoc($result)) {
        echo $row['tenBN'];
    } else {
        echo "Không tìm thấy tên bệnh nhân";
    }
}
mysqli_close($con);
?>
