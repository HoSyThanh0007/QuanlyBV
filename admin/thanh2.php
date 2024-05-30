<?php
include './connect_db.php';

if (isset($_GET["maBN"])) {
    $maBN = $_GET["maBN"];
    $query = "SELECT * FROM vienphikhambenh WHERE maBN='$maBN'";
    $result = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $patientData = mysqli_fetch_assoc($result);
        $total = $patientData['khamtongquat'] + $patientData['khamtoanthan']  + $patientData['xetnghiem'] + $patientData['chuandoan'];
        $total2=$total-($total*($patientData['bhyt'])/100);
        $response = [
            "tableRow" => "<tr>
                <td>{$patientData['maBN']}</td>
                <td>{$patientData['tenBN']}</td>
                <td>{$patientData['ngaythanhtoan']}</td>
                <td>{$patientData['khamtongquat']}</td>
                <td>{$patientData['khamtoanthan']}</td>
                <td>{$patientData['xetnghiem']}</td>
                <td>{$patientData['chuandoan']}</td>
                <td>{$patientData['bhyt']}%</td>
                <td>{$total2}</td>
            
                <td><a href='./hoadon.php?maBN={$patientData['maBN']}' class='btn btn-danger'>Hóa đơn</a></td>
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
