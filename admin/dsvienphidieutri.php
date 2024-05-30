<!DOCTYPE html>
<html>
<?php
    include './connect_db.php';
    $result = mysqli_query($con, "SELECT maBN, tenBN, ngayDieuTri, ngayXuatVien, tongNgay, tenKhoa, soTien, bhyt FROM vienphidieutri");
    mysqli_close($con);
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To | Bootstrap Based Admin Template - Material Design</title>
    <!-- Favicon -->
    <link rel="icon" type="../logo/png" sizes="32x32" href="../logo/logo.png">
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />
    <!-- Morris Chart Css-->
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
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
    <style>
        .timkiem{
            margin-top: -10px;
            margin-bottom: 10px;
        }
        .thongke{
            margin-left: 800px;
            margin-top: -20px;
        }

        input, select {
            width: 100%;
            padding: 4px;
            box-sizing: border-box;
            border: 1 solid #0056b3;
            font-size: 16px;
        }
        .btn{
            margin-left: 20px;
            width: 60px;
        }
    </style>
  
    <section class="content">
        <div class="container-fluid">
            
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Quản lý thông tin viện phí điều trị  
                                <form action="" method="POST">
                                    <div class="flex gap-6 thongke">
                                        <div>
                                            <input type="date" name="start_date" class="border-[1px] border-[black] ">
                                        </div>
                                        <div>
                                            <input type="date" name="end_date" class="border-[1px] border-[black] ">
                                        </div>
                                        <div>
                                            <button type="submit" class="border-[1px] border-[#38A169] h-[30px] w-[90px] rounded text-[white] font-bold bg-[#38A169]">Thống kê</button>
                                        </div>
                                    </div>
                                </form>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="my-[-1px]">
                                <form action="" method="POST">
                                    <div class="flex gap-2 timkiem">
                                        <div>
                                            <input class="border-[1px] border-[black] rounded pl-[30px] h-[30px]" placeholder="Nhập mã bệnh nhân" type="text" name="maBN">
                                        </div>
                                        <div>
                                            <button class="border-[1px] border-[#38A169] h-[30px] rounded text-[white] font-bold bg-[#38A169]">Tìm kiếm</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- hàm thống kê viện phí theo ngày -->
                            <?php
                                include './connect_db.php';
                                if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
                                    $start_date = $_POST['start_date'];
                                    $end_date = $_POST['end_date'];
                                    // Tạo câu truy vấn SQL với điều kiện thời gian
                                    $query = "SELECT maBN, tenBN, ngayDieuTri, ngayXuatVien, tongNgay, tenKhoa, soTien, bhyt FROM vienphidieutri WHERE ngayXuatVien BETWEEN '$start_date' AND '$end_date'";
                                    $result = mysqli_query($con, $query);
                                }
                            ?>
                            <?php
                                // hàm tìm kiếm viện phí theo mã bệnh nhân
                                include './connect_db.php';
                                if(isset($_POST['maBN'])) {
                                    // Lấy mã bệnh nhân từ form
                                    $maBN = $_POST['maBN'];
                                    // Xử lý truy vấn SQL với điều kiện tìm kiếm theo mã bệnh nhân
                                    $query = "SELECT maBN, tenBN, ngayDieuTri, ngayXuatVien, tongNgay, tenKhoa, soTien, bhyt FROM vienphidieutri WHERE maBN = '$maBN'";
                                    $result = mysqli_query($con, $query);
                                }
                            ?>
                            <!-- Hiển thị kết quả tìm kiếm -->
                            <?php if(isset($result)): ?>
                                <div class="table">
                                    <!-- Hiện thị danh sách viện phí bệnh nhân điều trị  -->
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th>Mã bệnh nhân</th>
                                                <th>Tên bệnh nhân</th>
                                                <th>Ngày điều trị</th>
                                                <th>Ngày Xuất viện</th>
                                                <th>Khoa điều trị</th>
                                                <th>Số ngày</th>
                                                <th>Số tiền</th>
                                                <th>BHYT</th>
                                                <th>Tổng Tiền</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                // Khởi tạo biến tổng tiền
                                                $totalAmount = 0;
                                                while($row = mysqli_fetch_array($result)): 
                                                    // Tính tổng tiền cho từng dòng dữ liệu
                                                    $subtotal = ($row['tongNgay'] * $row['soTien']) - (($row['tongNgay'] * $row['soTien']) * $row['bhyt'] / 100);
                                                    // Cộng vào tổng tiền
                                                    $totalAmount += $subtotal;
                                            ?>
                                                <tr>
                                                    <td><?= $row['maBN'] ?></td>
                                                    <td><?= $row['tenBN'] ?></td>
                                                    <td><?= $row['ngayDieuTri'] ?></td>
                                                    <td><?= $row['ngayXuatVien'] ?></td>
                                                    <td><?= $row['tenKhoa'] ?></td>
                                                    <td><?= $row['tongNgay'] ?></td>
                                                    <td><?= $row['soTien'] ?></td>
                                                    <td><?= $row['bhyt'] ?>%</td>
                                                    <td><?=number_format($subtotal) ?></td>
                                                    <td>
                                                        <a href="./xoavienphibenhnhan.php?id=<?= $row['maBN'] ?>" class="btn btn-danger">xóa</a>
                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                            <!-- Hiển thị tổng tiền sau khi lặp xong -->
                                            <tr>
                                                <td colspan="8">Tổng tiền : <?= number_format($totalAmount) ?> vnđ</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>
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
