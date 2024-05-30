<?php
require './connect_db.php';
session_start();

$id = $_GET['id'];

// Truy vấn thông tin khám bệnh từ cơ sở dữ liệu dựa trên id
$query = "SELECT * FROM khambenh WHERE MaBN = '$id'";
$result = mysqli_query($con, $query);
$khambenh = mysqli_fetch_assoc($result);

if (!$khambenh) {
    echo "Khám bệnh không tồn tại.";
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
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sửa thông tin khám bệnh</title>
    <!-- Favicon-->
    <link rel="icon" type="image/png" sizes="32x32" href="../logo/logo.png">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />

    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            padding: 20px;
        }

        .grid-left,
        .grid-right {
            flex: 0 0 calc(50% - 20px);
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
        }

        .wrap-field {
            margin-bottom: 20px;
        }

        label {
            font-size: 20px;
            display: block;
            font-weight: normal;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s;
            font-size: 16px;
        }

        input[type="text"]:focus,
        input[type="date"]:focus {
            border-color: #007bff;
            outline: none;
        }

        input[type="submit"] {
            margin-left: 1110px;
            width: 150px;
            padding: 15px;
            border: none;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .message{
            font-size: 24px;
            color: #007bff;
        }
    </style>
</head>

<body class="theme-red">
    <!-- Page Loader -->

    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->

    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.php">Bệnh viện đa khoa_ Quản lý bệnh nhân </a>
            </div>

        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <?php
            include "info.php";
            ?>
            <!-- #User Info -->
            <!-- Menu -->
            <?php
            include "menu.php";
            ?>

        </aside>

    </section>

    <section class="content">
        <div class="container-fluid">

            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h1>
                                Sửa thông tin khám bệnh
                              
                            </h1>
                            
                            <?php if ($message): ?>
        <div class="message"><?= $message ?></div>
        <?php endif; ?>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
    <form id="product-for" method="POST" action="./control/suakhambenh.php" enctype="multipart/form-data">
    <!-- Form để cập nhật thông tin khám bệnh, gửi dữ liệu đến suakhambenh.php khi submit -->
    <div class="container">
        <!-- Phần trái của grid -->
        <div class="grid-left">
            <!-- Input cho Mã bệnh nhân, không cho phép chỉnh sửa -->
            <div class="wrap-field">
                <label>Mã bệnh nhân: </label>
                <input type="text" name="maBN" value="<?= $khambenh['MaBN'] ?>" readonly>
            </div>
            <!-- Input cho Ngày khám bệnh -->
            <div class="wrap-field">
                <label>Ngày khám bệnh : </label>
                <input type="date" name="ngayKham" value="<?= $khambenh['ngayKham'] ?>">
                <div class="clear-both"></div>
            </div>
            <!-- Input cho Khám tổng quát -->
            <div class="wrap-field">
                <label>Khám tổng quát: </label>
                <input type="text" name="khamtongquat" value="<?= $khambenh['khamTongQuat'] ?>">
                <div class="clear-both"></div>
            </div>
            <!-- Input cho Khám toàn thân -->
            <div class="wrap-field">
                <label>Khám toàn thân: </label>
                <input type="text" name="khamtoanthan" value="<?= $khambenh['khamToanThan'] ?>">
                <div class="clear-both"></div>
            </div>
        </div>
        <!-- Phần phải của grid -->
        <div class="grid-right">
            <!-- Input cho Xét nghiệm -->
            <div class="wrap-field">
                <label>xét nghiệm: </label>
                <input type="text" name="xetnghiem" value="<?= $khambenh['xetNghiem'] ?>">
                <div class="clear-both"></div>
            </div>
            <!-- Input cho Tóm tắt kết quả xét nghiệm -->
            <div class="wrap-field">
                <label>tóm tắt kết quả xét nghiệm: </label>
                <input type="text" name="tomtatxn" value="<?= $khambenh['tomtatXN'] ?>">
                <div class="clear-both"></div>
            </div>
            <!-- Input cho Chuẩn đoán hình ảnh -->
            <div class="wrap-field">
                <label>chuẩn đoán hình ảnh: </label>
                <input type="text" name="chuandoan" value="<?= $khambenh['chuandoan'] ?>">
                <div class="clear-both"></div>
            </div>

            <!-- Input cho Tóm tắt bệnh -->
            <div class="wrap-field">
                <label>Tóm tắt bệnh: </label>
                <input type="text" name="tomtatbenh" value="<?= $khambenh['tomTatBenh'] ?>">
                <div class="clear-both"></div>
            </div>
        </div>
    </div>

    <!-- Nút "Lưu thông tin" để gửi form đi -->
    <input type="submit" title="Lưu sản phẩm" value="Lưu thông tin" />
</form>

</div>
</div>
</div>
</div>
<!-- #END# Basic Examples -->

</div>
</section>

<!-- Jquery Core Js -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>

<!-- Jquery CountTo Plugin Js -->
<script src="plugins/jquery-countto/jquery.countTo.js"></script>

<!-- Morris Plugin Js -->
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/morrisjs/morris.js"></script>

<!-- ChartJs -->
<script src="plugins/chartjs/Chart.bundle.js"></script>

<!-- Flot Charts Plugin Js -->
<script src="plugins/flot-charts/jquery.flot.js"></script>
<script src="plugins/flot-charts/jquery.flot.resize.js"></script>
<script src="plugins/flot-charts/jquery.flot.pie.js"></script>
<script src="plugins/flot-charts/jquery.flot.categories.js"></script>
<script src="plugins/flot-charts/jquery.flot.time.js"></script>

<!-- Sparkline Chart Plugin Js -->
<script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/index.js"></script>

<!-- Demo Js -->
<script src="js/demo.js"></script>

</body>

</html>
