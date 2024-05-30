<?php

require("../fpdf186/fpdf.php");

// Kết nối đến cơ sở dữ liệu của bạn
include './connect_db.php';

// Lấy mã bệnh nhân từ URL
$maBN = $_GET['maBN'];

// Truy vấn dữ liệu từ cơ sở dữ liệu
$query = "SELECT `id`, `maBN`, `ngaythanhtoan`, `khamtongquat`, `khamtoanthan`, `xetnghiem`, `chuandoan`, `bhyt` 
          FROM `vienphikhambenh` WHERE `maBN` = '$maBN'";
$result = mysqli_query($con, $query);

if (!$result) {
    die("Truy vấn thất bại: " . mysqli_error($con));
}

class PDF extends FPDF
{
    function Header()
    {
        // Set font to Arial
        $this->AddFont('Arial', '', 'arial.php');
        $this->SetFont('Arial', '', 12);
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->AddFont('Arial', '', 'arial.php');
$pdf->SetFont('Arial', '', 12);

// Tiêu đề hóa đơn
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, "Benh vien da khoa ", 0, 1, 'C');
$pdf->Cell(0, 10, "Hoa don vien phi", 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, "Dia chi: 123 Duong Phan Chau Chinh, Nam Tu Liem, TP.Ha Noi", 0, 1, 'C');
$pdf->Cell(0, 10, "Dien thoai: 092 334 5678", 0, 1, 'C');
$pdf->Ln(10);

// Điều chỉnh kích thước của các ô trong bảng
$widths = array(24, 25, 30, 28, 30, 25, 26);
// hàm xuất hóa đơn viện phí khám bệnh theo mã bệnh nhân
if ($result->num_rows > 0) {
    // In tiêu đề của bảng
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell($widths[0], 10, "Ma BN", 1);
    $pdf->Cell($widths[1], 10, "Toan Than", 1);
    $pdf->Cell($widths[2], 10, "Tong Quat", 1);
    $pdf->Cell($widths[3], 10, "Xet Nghiem", 1);
    $pdf->Cell($widths[4], 10, "Chuan Doan", 1);
    $pdf->Cell($widths[5], 10, "BHYT", 1);
    $pdf->Cell($widths[6], 10, "Tong Tien", 1);
    $pdf->Ln(); // Xuống dòng
    // In dữ liệu từ cơ sở dữ liệu
    $pdf->SetFont('Arial', '', 12);
    while ($row = mysqli_fetch_assoc($result)) {
        $pdf->Cell($widths[0], 10, $row["maBN"], 1);
        $pdf->Cell($widths[1], 10, $row["khamtongquat"], 1);
        $pdf->Cell($widths[2], 10, $row["khamtoanthan"], 1);
        $pdf->Cell($widths[3], 10, $row["xetnghiem"], 1);
        $pdf->Cell($widths[4], 10, $row["chuandoan"], 1);
        $pdf->Cell($widths[5], 10, $row["bhyt"], 1);
        $total = ($row['khamtongquat'] + $row['khamtoanthan'] + $row['xetnghiem'] + $row['chuandoan']) - (($row['khamtongquat'] + $row['khamtoanthan'] + $row['xetnghiem'] + $row['chuandoan']) * ($row["bhyt"]) / 100);
        $pdf->Cell($widths[6], 10, $total, 1);
        $pdf->Ln(); // Xuống dòng
    }
} else {
    $pdf->Cell(0, 10, "Khong co du lieu", 1);
}

// Tính tổng tiền cần thanh toán
$totalPayment = 0;
$result->data_seek(0); // Đặt con trỏ dữ liệu về vị trí đầu tiên
while ($row = mysqli_fetch_assoc($result)) {
    $totalPayment += ($row['khamtongquat'] + $row['khamtoanthan'] + $row['xetnghiem'] + $row['chuandoan']) - (($row['khamtongquat'] + $row['khamtoanthan'] + $row['xetnghiem'] + $row['chuandoan']) * ($row["bhyt"]) / 100);
}

// Xuất thông tin số tiền cần thanh toán
$pdf->Ln(10);
$pdf->Cell(0, 10, "Tong tien ban can thanh toan la: " . $totalPayment, 0, 1, 'C');
$pdf->Cell(0, 10, "Nguoi thanh toan:", 0, 1, 'C');
$pdf->Cell(0, 10, "Ky ten:", 0, 1, 'C');

// Đóng kết nối
mysqli_close($con);

// Lưu file PDF về máy
$pdf->Output('D', 'hoadon.pdf');
?>

