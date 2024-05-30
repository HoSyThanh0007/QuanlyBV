<!DOCTYPE html>
<?php
require './connect_db.php';
session_start();

$id = $_GET['maBN'];

// Truy vấn thông tin bệnh nhân từ cơ sở dữ liệu dựa trên id
$query = "SELECT * FROM benhnhandt WHERE maBN = '$id'";
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

<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/admin_style.css">
    <script src="resources/ckeditor/ckeditor.js"></script>
    <style>
        .danhmuc {
            min-width: 200px;
            height: 30px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        h2 {
            font-size: 30px;
            text-align: center;
        }
        form input[type="text"],
        form input[type="date"] {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s;
        }
        form input[type="text"]:focus,
        form input[type="date"]:focus {
            border-color: #007bff;
            outline: none;
        }
        form input[type="submit"] {
            width: 100%;
            padding: 20px;
            font-size: 20px;
            border: none;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        form input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .clear-both {
            clear: both;
        }
        .back-button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 0;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s, transform 0.3s;
            font-size: 16px;
            text-align: center;
            margin-left: 770px;
        }

        .back-button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .back-button:active {
            background-color: #004494;
            transform: scale(1);
        }

        select {
            width: 100%;
            padding: 8px;
            margin-top: 20px;
            box-sizing: border-box;
        }
            
        label {
            margin-top: 25px;
        }
    </style>
</head>
<body>
<div class="main-content">
    <h2>Sửa thông tin điều trị bệnh nhân</h2>
    <?php if ($message): ?>
        <div class="message"><?= $message ?></div>
        <?php endif; ?>
    <div id="content-box">
        <form id="product-form" method="POST" action="./control/suabndt.php">
            <div class="wrap-file">
                <input type="submit" title="Lưu thông tin" value="Lưu thông tin">
            </div>
            <div class="wrap-field">
                <label>Mã bệnh nhân: </label>
                <input type="text" name="maBN" value="<?= $benhnhan['maBN'] ?>" readonly>
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>Họ và tên: </label>
                <input type="text" name="tenBN" value="<?= $benhnhan['tenBN'] ?>" required>
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>Ngày điều trị: </label>
                <input type="date" name="ngayDieuTri" value="<?= $benhnhan['ngayDieuTri'] ?>" required>
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label for="khoa">Khoa</label>
                <select name="Khoa" id="khoa" style="width: 300px; font-size:16px">
                    <option value="">Chọn khoa điều trị</option>
                    <?php
                    $query = "SELECT tenKhoa FROM khoa";
                    $results = mysqli_query($con, $query);
                    if ($results) {
                        while ($data = mysqli_fetch_assoc($results)) {
                            $selected = $data['tenKhoa'] == $benhnhan['khoa'] ? 'selected' : '';
                            echo "<option value='{$data['tenKhoa']}' $selected>{$data['tenKhoa']}</option>";
                        }
                    } else {
                        echo "<option value=''>Không có dữ liệu</option>";
                    }
                    ?>
                </select>
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label for="phong">Phòng</label>
                <select name="Phong" id="phong" style="width: 300px; font-size:16px">
                    <option value="">Chọn phòng điều trị</option>
                    <?php
                    $query = "SELECT tenPhong FROM phong";
                    $results = mysqli_query($con, $query);
                    if ($results) {
                        while ($data = mysqli_fetch_assoc($results)) {
                            $selected = $data['tenPhong'] == $benhnhan['phong'] ? 'selected' : '';
                            echo "<option value='{$data['tenPhong']}' $selected>{$data['tenPhong']}</option>";
                        }
                    } else {
                        echo "<option value=''>Không có dữ liệu</option>";
                    }
                    ?>
                </select>
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label for="giuong">Giường:</label>
                <select name="Giuong" id="giuong" style="width: 300px; font-size:16px">
                    <option value="">Chọn giường điều trị</option>
                    <?php
                    $query = "SELECT tenGiuong FROM giuong";
                    $results = mysqli_query($con, $query);
                    if ($results) {
                        while ($data = mysqli_fetch_assoc($results)) {
                            $selected = $data['tenGiuong'] == $benhnhan['giuong'] ? 'selected' : '';
                            echo "<option value='{$data['tenGiuong']}' $selected>{$data['tenGiuong']}</option>";
                        }
                    } else {
                        echo "<option value=''>Không có dữ liệu</option>";
                    }
                    ?>
                </select>
                <div class="clear-both"></div>
            </div>
            <div class="wrap-field">
                <label>Ngày xuất viện: </label>
                <input type="date" name="ngayXuatVien" value="<?= $benhnhan['ngayXuatVien'] ?>" required>
                <div class="clear-both"></div>
            </div>
        </form>
        <a href="./quanlybenhnhandieutri.php" class="back-button">Quay lại</a>
    </div>

</div>
</body>
</html>
