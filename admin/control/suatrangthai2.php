<?php 
// echo 1;die;
    require "./conet.php";
    $maBN = $_POST["maBN"];
    $trangThai = $_POST["trangThai"];
    $query = "UPDATE `benhnhandt` SET `trangThai`='$trangThai' WHERE maBN='$maBN'"; 
    connect($query);
    // var_dump($query);die;
    header("location: ../quanlybenhnhandieutri.php");
?>  