<?php

$host = "localhost"; // Địa chỉ máy chủ của cơ sở dữ liệu, trong trường hợp này là máy chủ cục bộ.
$user = "root"; // Tên người dùng để kết nối tới cơ sở dữ liệu, thường là 'root' trong môi trường phát triển cục bộ.
$password = ""; // Mật khẩu để kết nối tới cơ sở dữ liệu. Mặc định thường là trống cho XAMPP hoặc LAMP.
$database = "csdlbv"; // Tên của cơ sở dữ liệu mà bạn muốn kết nối.

$con = mysqli_connect($host, $user, $password, $database); // Tạo kết nối tới cơ sở dữ liệu sử dụng thông tin trên.

$con->set_charset('utf8'); // Thiết lập mã hóa ký tự là UTF-8 để đảm bảo dữ liệu tiếng Việt được hiển thị đúng.
if (mysqli_connect_errno()) { // Kiểm tra xem kết nối có thành công không.
    echo "Connection Fail: " . mysqli_connect_errno(); // Nếu kết nối thất bại, in ra thông báo lỗi.
    exit; // Kết thúc chương trình nếu kết nối thất bại.
}

?>
