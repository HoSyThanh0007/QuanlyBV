<?php
require './connect_db.php';
session_start();

$id = $_GET['id'];

// Truy vấn thông tin bệnh nhân từ cơ sở dữ liệu dựa trên id
$query = "SELECT * FROM benhnhan1 WHERE maBN = '$id'";
$result = mysqli_query($con, $query);
$benhnhan = mysqli_fetch_assoc($result);

if (!$benhnhan) {
    echo "Bệnh nhân không tồn tại.";
    exit();
}

// Kiểm tra và hiển thị thông báo nếu có
$message = '';
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sửa thông tin bệnh nhân</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .main-content {
            width: 40%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            font-size: 30px;
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
        .message {
            margin-bottom: 20px;
            color: green;
            text-align: center;
        }
        .wrap-field {
            margin-bottom: 5px;
            display: flex;
            flex-direction: column;
        }
        .wrap-field label {
            margin-bottom: 5px;
            color: #333;
        }
        .wrap-field input[type="text"],
        .wrap-field input[type="date"] {
            font-size: 18px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s;
            width: 100%;
            box-sizing: border-box;
        }
        .wrap-field input[type="text"]:focus,
        .wrap-field input[type="date"]:focus {
            border-color: #007bff;
            outline: none;
        }
        form input[type="submit"] {
            width: 20%;
            padding: 10px;
            border: none;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
            margin-top: 5px;
            justify-content: center;
            margin-left: 265px;
        }
        form input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .quaylai {
            text-align: right;
            margin-top: 5px;
            font-size: 20px;
        }
        .quaylai a {
            text-decoration: none;
            color: #007bff;
            transition: color 0.3s;
        }
        .quaylai a:hover {
            color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="main-content">
        <h2>Sửa thông tin bệnh nhân</h2>

        <?php if ($message): ?>
        <div class="message"><?= $message ?></div>
        <?php endif; ?>

        <form id="product-form" method="POST" action="./control/suabenhnhan.php" enctype="multipart/form-data">
            <div class="wrap-field">
                <label>Mã bệnh nhân: </label>
                <input type="text" name="maBN" value="<?= $benhnhan['maBN'] ?>" readonly>
            </div>
            <div class="wrap-field">
                <label>Họ và tên: </label>
                <input type="text" name="tenBN" value="<?= $benhnhan['tenBN'] ?>">
            </div>
            <div class="wrap-field">
                <label>Giới tính: </label>
                <input type="text" name="gioiTinh" value="<?= $benhnhan['gioiTinh'] ?>">
            </div>
            <div class="wrap-field">
                <label>Địa chỉ: </label>
                <input type="text" name="diaChi" value="<?= $benhnhan['diaChi'] ?>">
            </div>
            <div class="wrap-field">
                <label>Ngày sinh: </label>
                <input type="date" name="ngaySinh" value="<?= $benhnhan['ngaySinh'] ?>">
            </div>
            <div class="wrap-field">
                <label>Dân tộc: </label>
                <input type="text" name="danToc" value="<?= $benhnhan['danToc'] ?>">
            </div>
            <div class="wrap-field">
                <label>CCCD: </label>
                <input type="text" name="cccd" value="<?= $benhnhan['CCCD'] ?>">
            </div>
            <div class="wrap-field">
                <label>Số thẻ BHYT: </label>
                <input type="text" name="soTheBHYT" value="<?= $benhnhan['soTheBHYT'] ?>">
            </div>
            <div class="wrap-field">
                <label>Thời hạn thẻ BHYT: </label>
                <input type="date" name="thoihanBHYT" value="<?= $benhnhan['thoiHaTheBHYT'] ?>">
            </div>
            <div class="wrap-field">
                <label>Nghề nghiệp: </label>
                <input type="text" name="ngheNghiep" value="<?= $benhnhan['ngheNghiep'] ?>">
            </div>
            <div class="wrap-field">
                <label>Thời gian vào viện: </label>
                <input type="date" name="ngayVaoVien" value="<?= $benhnhan['ngayVaoVien'] ?>">
            </div>
            <input type="submit" title="Lưu thông tin" value="Lưu thông tin" />
        </form>
        <div class="quaylai">
            <a href="./nhanvien.php">Quay lại</a>
        </div>
        <div class="clear-both"></div>
    </div>
</body>
</html>
