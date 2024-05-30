<!DOCTYPE html>
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
    margin-left: 770px;;
}

.back-button:hover {
    background-color: #0056b3;
    transform: scale(1.05);
}

.back-button:active {
    background-color: #004494;
    transform: scale(1);
}

    </style>
</head>
<body>
    <div class="main-content">
        <h2>Thêm điều trị bệnh nhân</h2>
        <div id="content-box">
        <form id="product-form" method="POST" action="./control/themdieutri.php">
    <!-- Form để thêm thông tin điều trị -->
    <div class="wrap-file">
        <!-- Nút "Lưu thông tin" để gửi form -->
        <input type="submit" title="Lưu thông tin" value="Lưu thông tin">
    </div>
    <!-- Input để nhập mã bệnh nhân -->
    <div class="wrap-field">
        <label>Mã bệnh nhân: </label>
        <input type="text" name="maBN" required>
        <div class="clear-both"></div>
    </div>
    <!-- Input để nhập họ và tên bệnh nhân -->
    <div class="wrap-field">
        <label>Họ và tên: </label>
        <input type="text" name="tenBN" required>
        <div class="clear-both"></div>
    </div>
    <!-- Input để nhập bệnh chính -->
    <div class="wrap-field">
        <label>Bệnh chính: </label>
        <input type="text" name="benhChinh" required>
        <div class="clear-both"></div>
    </div>
    <!-- Input để nhập bệnh kèm theo -->
    <div class="wrap-field">
        <label>Bệnh kèm theo: </label>
        <input type="text" name="benhKemTheo">
        <div class="clear-both"></div>
    </div>
    <!-- Input để nhập phương hướng điều trị -->
    <div class="wrap-field">
        <label>Phương hướng điều trị: </label>
        <input type="text" name="phuongHuong" required>
        <div class="clear-both"></div>
    </div>
    <!-- Nút "Quay lại" để quay về trang trước -->
    <a href="./tieusubn.php" class="back-button">quay lại</a>
</form>

        </div>
    </div>
</body>
</html>
