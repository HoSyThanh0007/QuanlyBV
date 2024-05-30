<?php
include './connect_db.php';
if (isset($_GET["maBN"])) {
    $maBN = $_GET["maBN"];
    $query = "SELECT * FROM vienphidieutri WHERE maBN='$maBN'";
    $result = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $patientData = mysqli_fetch_assoc($result);
        $total = ($patientData['tongNgay']* $patientData['soTien'])- (($patientData['tongNgay']* $patientData['soTien'])*$patientData['bhyt']/100);
        $response = [
            "tableRow" => "<tr>
                <td>{$patientData['maBN']}</td>
                <td>{$patientData['tenBN']}</td>
                <td>{$patientData['ngayDieuTri']}</td>
                <td>{$patientData['ngayXuatVien']}</td>
                <td>{$patientData['tenKhoa']}</td>
                <td>{$patientData['tongNgay']}</td>
                <td>{$patientData['soTien']}</td>
                <td>{$patientData['bhyt']}%</td>
                <td>{$total}</td>
                <td><a href='./hoadon2.php?maBN={$patientData['maBN']}' class='btn btn-danger'>Hóa đơn</a></td>
            </tr>",
            "tenBN" => $patientData['tenBN']
        ];
    } else {
        $response = ["tableRow" => "", "tenBN" => ""];
    }
    echo json_encode($response);
    mysqli_close($con);
}
?>
