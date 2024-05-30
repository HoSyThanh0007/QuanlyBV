<?php
// Kiểm tra nếu có yêu cầu xóa từ form
if(isset($_GET['id'])) {
    // Bao gồm file kết nối CSDL
    include './connect_db.php';
    
    // Lấy mã bệnh nhân từ tham số truyền vào
    $maBN = $_GET['id'];
    
    // Xây dựng câu truy vấn lấy thông tin bệnh nhân để hiển thị
    $query_select = "SELECT * FROM vienphikhambenh WHERE maBN = '$maBN'";
    $result_select = mysqli_query($con, $query_select);
    $patient = mysqli_fetch_assoc($result_select);
    //Hàm xóa viện phí bệnh nhân theo viện phí
    // Kiểm tra nếu có yêu cầu xác nhận xóa
    if(isset($_GET['confirm']) && $_GET['confirm'] == 'yes') {
        // Xây dựng câu truy vấn xóa dữ liệu
        $query_delete = "DELETE FROM vienphikhambenh WHERE maBN = '$maBN'";
        
        // Thực thi câu truy vấn
        $result_delete = mysqli_query($con, $query_delete);
        
        // Kiểm tra xem xóa thành công hay không
        if($result_delete) {
            // Nếu thành công, hiển thị thông báo và chuyển hướng về trang danh sách thông tin viện phí khám bệnh
            echo "<script>alert('Xóa thông tin thành công!');</script>";
            header('Location:dsvienphikhambenh.php');
            exit;
        } else {
            // Nếu không thành công, hiển thị thông báo lỗi
            echo "Xóa thông tin không thành công. Vui lòng thử lại.";
        }
    } else {
        // Nếu chưa xác nhận xóa, hiển thị form xác nhận
        echo "<script>
                var result = confirm('Bạn có chắc chắn muốn xóa thông tin viện phí khám bệnh của bệnh nhân " . $patient['tenBN'] . " không?');
                if(result) {
                    window.location.href = 'xoakhambenh.php?id=" . $maBN . "&confirm=yes';
                } else {
                    window.location.href = 'dsvienphikhambenh.php';
                }
            </script>";
    }
    
    // Đóng kết nối CSDL
    mysqli_close($con);
}
?>

