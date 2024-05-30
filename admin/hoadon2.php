<?php

require("../fpdf186/fpdf.php"); // Bao gồm thư viện FPDF, một thư viện cho phép tạo và tùy chỉnh các tệp PDF.

// Kết nối đến cơ sở dữ liệu của bạn
include './connect_db.php'; // Bao gồm tệp kết nối cơ sở dữ liệu.

// Lấy mã bệnh nhân từ URL
$maBN = $_GET['maBN']; // Lấy giá trị mã bệnh nhân từ tham số GET của URL.

// Truy vấn dữ liệu từ cơ sở dữ liệu
$query = "SELECT maBN, tenBN, ngayDieuTri, ngayXuatVien, tongNgay, tenKhoa, soTien, bhyt FROM vienphidieutri WHERE `maBN` = '$maBN'"; 
$result = mysqli_query($con, $query); // Thực hiện truy vấn SQL để lấy thông tin bệnh nhân.

if (!$result) {
    die("Truy vấn thất bại: " . mysqli_error($con)); // Kiểm tra lỗi truy vấn và dừng chương trình nếu có lỗi.
}

class PDF extends FPDF
{
    function Header()
    {
        // Set font to Arial
        $this->AddFont('Arial', '', 'arial.php'); // Thêm font Arial.
        $this->SetFont('Arial', '', 12); // Đặt font là Arial, kích thước 12.
    }
}

$pdf = new PDF(); // Tạo đối tượng PDF mới.
$pdf->AddPage(); // Thêm trang mới vào PDF.
$pdf->AddFont('Arial', '', 'arial.php'); // Thêm font Arial.
$pdf->SetFont('Arial', '', 12); // Đặt font là Arial, kích thước 12.

// Tiêu đề hóa đơn
$pdf->SetFont('Arial', 'B', 14); // Đặt font là Arial, in đậm, kích thước 14.
$pdf->Cell(0, 10, "Benh vien da khoa", 0, 1, 'C'); // Tạo ô có nội dung "Benh vien da khoa Hong Ngoc" và căn giữa.
$pdf->Cell(0, 10, "Hoa don vien phi dieu tri", 0, 1, 'C'); // Tạo ô có nội dung "Hoa don vien phi" và căn giữa.
$pdf->SetFont('Arial', '', 12); // Đặt lại font là Arial, kích thước 12.
$pdf->Cell(0, 10, "Dia chi: 123 Duong Phan Chau Chinh, Nam Tu Liem, TP.Ha Noi", 0, 1, 'C'); // Tạo ô có nội dung địa chỉ và căn giữa.
$pdf->Cell(0, 10, "Dien thoai: 098 586 5678", 0, 1, 'C'); // Tạo ô có nội dung điện thoại và căn giữa.
$pdf->Ln(10); // Xuống dòng 10 đơn vị.

// Điều chỉnh kích thước của các ô trong bảng
$widths = array(24, 32, 32, 28, 27, 25, 25); // Mảng chứa độ rộng của từng cột trong bảng.

if ($result->num_rows > 0) {
    // In tiêu đề của bảng
    $pdf->SetFont('Arial', 'B', 12); // Đặt font là Arial, in đậm, kích thước 12.
    $pdf->Cell($widths[0], 10, "Ma BN", 1); // Tạo ô tiêu đề "Ma BN".
    $pdf->Cell($widths[1], 10, "Ngay dieu tri", 1); // Tạo ô tiêu đề "Ngay dieu tri".
    $pdf->Cell($widths[2], 10, "Ngay Xuat Vien", 1); // Tạo ô tiêu đề "Ngay Xuat Vien".
    $pdf->Cell($widths[3], 10, "tong ngay", 1); // Tạo ô tiêu đề "tong ngay".
    $pdf->Cell($widths[4], 10, "so tien", 1); // Tạo ô tiêu đề "so tien".
    $pdf->Cell($widths[5], 10, "BHYT", 1); // Tạo ô tiêu đề "BHYT".
    $pdf->Cell($widths[6], 10, "Tong Tien", 1); // Tạo ô tiêu đề "Tong Tien".
    $pdf->Ln(); // Xuống dòng

    // In dữ liệu từ cơ sở dữ liệu
    $pdf->SetFont('Arial', '', 12); // Đặt lại font là Arial, kích thước 12.
    while ($row = mysqli_fetch_assoc($result)) {
        $pdf->Cell($widths[0], 10, $row["maBN"], 1); // Tạo ô chứa mã bệnh nhân.
        $pdf->Cell($widths[1], 10, $row["ngayDieuTri"], 1); // Tạo ô chứa ngày điều trị.
        $pdf->Cell($widths[2], 10, $row["ngayXuatVien"], 1); // Tạo ô chứa ngày xuất viện.
        $pdf->Cell($widths[3], 10, $row["tongNgay"], 1); // Tạo ô chứa tổng ngày điều trị.
        $pdf->Cell($widths[4], 10, $row["soTien"], 1); // Tạo ô chứa số tiền mỗi ngày.
        $pdf->Cell($widths[5], 10, $row["bhyt"], 1); // Tạo ô chứa BHYT.
        $total = ($row['tongNgay'] * $row['soTien']) - (($row['tongNgay'] * $row['soTien']) * ($row["bhyt"]) / 100); // Tính tổng tiền sau khi trừ BHYT.
        $pdf->Cell($widths[6], 10, $total, 1); // Tạo ô chứa tổng tiền.
        $pdf->Ln(); // Xuống dòng
    }
} else {
    $pdf->Cell(0, 10, "Khong co du lieu", 1); // Tạo ô thông báo không có dữ liệu.
}

// Tính tổng tiền cần thanh toán
$totalPayment = 0;
$result->data_seek(0); // Đặt con trỏ dữ liệu về vị trí đầu tiên.
while ($row = mysqli_fetch_assoc($result)) {
    $totalPayment += ($row['tongNgay'] * $row['soTien']) - (($row['tongNgay'] * $row['soTien']) * ($row["bhyt"]) / 100); // Cộng dồn tổng tiền.
}

// Xuất thông tin số tiền cần thanh toán
$pdf->Ln(10); // Xuống dòng
$pdf->Cell(0, 10, "Tong tien ban can thanh toan la: " . $totalPayment, 0, 1, 'C'); // Tạo ô hiển thị tổng tiền cần thanh toán và căn giữa.
$pdf->Cell(0, 10, "Nguoi thanh toan:", 0, 1, 'C'); // Tạo ô hiển thị thông tin người thanh toán và căn giữa.
$pdf->Cell(0, 10, "Ky ten:", 0, 1, 'C'); // Tạo ô hiển thị thông tin ký tên và căn giữa.

// Đóng kết nối
mysqli_close($con); // Đóng kết nối cơ sở dữ liệu.

// Lưu file PDF về máy
$pdf->Output('D', 'hoadon.pdf'); // Lưu file PDF với tên 'hoadon.pdf' và gửi nó tới trình duyệt để tải xuống.
?>
