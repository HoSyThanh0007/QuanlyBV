<?php
// Kết nối đến cơ sở dữ liệu
include './connect_db.php';

// Kiểm tra kết nối đã thành công chưa
if (!$con) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    // Lấy mã bệnh nhân từ biểu mẫu
    $ma_benh_nhan = $_POST['search'];

    // Chuẩn bị câu truy vấn
    $query = "SELECT maBN, tenBN, ngayDieuTri, ngayXuatVien, tongNgay, tenKhoa, soTien FROM vienphidieutri WHERE maBN LIKE '%$ma_benh_nhan%'";

    // Thực hiện truy vấn
    $result = mysqli_query($con, $query);

    // Kiểm tra kết quả
    if ($result && mysqli_num_rows($result) > 0) {
        // Hiển thị kết quả
        while ($row = mysqli_fetch_assoc($result)) {
            // Hiển thị thông tin của bệnh nhân
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['maBN']) . "</td>";
            echo "<td>" . htmlspecialchars($row['tenBN']) . "</td>";
            echo "<td>" . htmlspecialchars($row['ngayDieuTri']) . "</td>";
            echo "<td>" . htmlspecialchars($row['ngayXuatVien']) . "</td>";
            echo "<td>" . htmlspecialchars($row['tenKhoa']) . "</td>";
            echo "<td>" . htmlspecialchars($row['tongNgay']) . "</td>";
            echo "<td>" . htmlspecialchars($row['soTien']) . "</td>";
            echo "<td>" . htmlspecialchars($row['tongNgay'] * $row['soTien']) . "</td>";
            echo "<td>";
            echo "<a href='./edit_user_admin.php?id=" . $row['maBN'] . "' class='btn btn-danger'>Sửa</a>";
            echo "<a href='./delete_admin.php?id=" . $row['maBN'] . "' class='btn btn-danger'>Xóa</a>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        // Xử lý khi không tìm thấy kết quả
        echo "<tr><td colspan='9'>Không tìm thấy kết quả.</td></tr>";
    }
} else {
    // Xử lý khi không có yêu cầu POST hoặc không có dữ liệu tìm kiếm được gửi đi
    echo "<tr><td colspan='9'>Vui lòng nhập mã bệnh nhân để tìm kiếm.</td></tr>";
}

// Đóng kết nối cơ sở dữ liệu
mysqli_close($con);

?>
