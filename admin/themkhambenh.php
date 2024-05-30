<!DOCTYPE html>
<?php
include './connect_db.php';
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
            margin-top: 10px;
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
            margin-left: 760px;
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
            margin-top: 10px;
            box-sizing: border-box;}
            
        label{
            margin-top: 8px;
        }
    </style>
</head>
<body>
<div class="main-content">
    <h2>Thêm thông tin khám bệnh nhân</h2>
    <div id="content-box">
    <form id="product-form" method="POST" action="./control/themkhambenh.php">
    <!-- Form để nhập thông tin khám bệnh, sẽ gửi dữ liệu đến themkhambenh.php khi submit -->

    <!-- Nút "Lưu thông tin" để gửi form đi -->
    <div class="wrap-file">
        <input type="submit" title="Lưu thông tin" value="Lưu thông tin">
    </div>

    <!-- Input để nhập Mã bệnh nhân -->
    <div class="wrap-field">
        <label>Mã bệnh nhân: </label>
        <input type="text" name="maBN" >
    </div>

    <!-- Input để nhập Tên bệnh nhân -->
    <div class="wrap-field">
        <label>Tên bệnh nhân: </label>
        <input type="text" name="tenBN" >
        <div class="clear-both"></div>
    </div>

    <!-- Input để chọn Ngày khám bệnh -->
    <div class="wrap-field">
        <label>Ngày khám bệnh : </label>
        <input type="date" name="ngayKham" >
        <div class="clear-both"></div>
    </div>

    <!-- Input để nhập thông tin Khám tổng quát -->
    <div class="wrap-field">
        <label>Khám tổng quát: </label>
        <input type="text" name="khamtongquat" >
        <div class="clear-both"></div>
    </div>

    <!-- Input để nhập thông tin Khám toàn thân -->
    <div class="wrap-field">
        <label>Khám toàn thân: </label>
        <input type="text" name="khamtoanthan" >
        <div class="clear-both"></div>
    </div>
   
    <!-- Input để nhập thông tin xét nghiệm -->
    <div class="wrap-field">
        <label>xét nghiệm: </label>
        <input type="text" name="xetnghiem" >
        <div class="clear-both"></div>
    </div>

    <!-- Input để nhập thông tin tóm tắt kết quả xét nghiệm -->
    <div class="wrap-field">
        <label>tóm tắt kết quả xét nghiệm: </label>
        <input type="text" name="tomtatxn" >
        <div class="clear-both"></div>
    </div>

    <!-- Input để nhập thông tin chuẩn đoán hình ảnh -->
    <div class="wrap-field">
        <label>chuẩn đoán hình ảnh: </label>
        <input type="text" name="chuandoan" >
        <div class="clear-both"></div>
    </div>

    <!-- Input để nhập thông tin tóm tắt bệnh -->
    <div class="wrap-field">
        <label>Tóm tắt bệnh: </label>
        <input type="text" name="tomtatbenh" >
        <div class="clear-both"></div>
    </div>

    <!-- Nút "Quay lại" để chuyển hướng người dùng về trang tieusubn.php -->
    <a href="./tieusubn.php" class="back-button">Quay lại</a>
</form>

    </div>
</div>
</body>
</html>
