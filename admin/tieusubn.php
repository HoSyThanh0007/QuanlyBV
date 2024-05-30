<!DOCTYPE html>
<html>
<?php
    // Kết nối đến cơ sở dữ liệu và truy vấn dữ liệu bệnh nhân
    include './connect_db.php';
    $result = mysqli_query($con, "SELECT maBN, tenBN, lydovaovien, quatrinhbenhly, tieusubenhnhan, dacdiem, giadinh FROM tsbn");
    mysqli_close($con);
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Trang quản lý bệnh nhân | Giao diện quản trị Bootstrap - Thiết kế vật liệu</title>
    <!-- Favicon-->
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

    <!-- AdminBSB Themes. Bạn có thể chọn một chủ đề từ css/themes thay vì tải tất cả các chủ đề -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <!-- Loader trang -->
   
    <!-- #END# Loader trang -->
    <!-- Lớp phủ cho thanh bên -->
    <div class="overlay"></div>
    <!-- #END# Lớp phủ cho thanh bên -->
    <!-- Thanh tìm kiếm -->
    
    <!-- #END# Thanh tìm kiếm -->
    <!-- Thanh đầu trang -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.php">Bệnh viện đa khoa_ Quản lý bệnh nhân </a>
            </div>
        </div>
    </nav>
    <!-- #Thanh đầu trang -->
    <section>
        <!-- Thanh bên trái -->
        <aside id="leftsidebar" class="sidebar">
            <!-- Thông tin người dùng -->
            <?php
                include "info.php";
            ?>
            <!-- #Thông tin người dùng -->
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
        .them {
            display: inline-block;
            margin-top: -10px;
            padding: 10px 20px;
            background-color: #007bff; /* Thay đổi màu nền khi cần */
            color: #fff; /* Màu chữ */
            text-decoration: none;
            border-radius: 5px; /* Góc bo tròn */
            float: right;
        }

        .them:hover {
            background-color: #0056b3; /* Thay đổi màu nền khi di chuột qua */
        }

        table th, table td {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
  
    <section class="content">
       
    <div class="container-fluid">
            
            <!-- Các ví dụ cơ bản -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Quản lý thông tin vào viện
                                <a class="them" href="./thembenhandau.php">Lý do vào viện</a>
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
                            <?php
                                // Kết nối đến cơ sở dữ liệu
                                include './connect_db.php';
                                // Kiểm tra xem đã gửi form tìm kiếm theo thời gian chưa
                                if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
                                    $start_date = $_POST['start_date'];
                                    $end_date = $_POST['end_date'];
                                    // Tạo câu truy vấn SQL với điều kiện thời gian
                                    $query = "SELECT maBN, tenBN, ngayDieuTri, ngayXuatVien, tongNgay, tenKhoa, soTien FROM vienphidieutri WHERE ngayXuatVien BETWEEN '$start_date' AND '$end_date'";
                                    $result = mysqli_query($con, $query);
                                }

                                // Kiểm tra xem đã gửi form tìm kiếm theo mã bệnh nhân chưa
                                if(isset($_POST['maBN'])) {
                                    // Lấy mã bệnh nhân từ form
                                    $maBN = $_POST['maBN'];
                                    // Xử lý truy vấn SQL với điều kiện tìm kiếm theo mã bệnh nhân
                                    $query="SELECT maBN, tenBN, lydovaovien, quatrinhbenhly, tieusubenhnhan, dacdiem, giadinh FROM tsbn WHERE maBN = '$maBN'";
                                    $result = mysqli_query($con, $query);
                                }
                            ?>
                            <!-- Hiển thị kết quả tìm kiếm -->
                            <?php if(isset($result)): ?>
                                <!-- hàm hiển thị danh sách lý do vào viện của các bệnh nhân -->
                                <div class="table">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <td>Mã bệnh nhân</td>
                                                <td>Tên bệnh nhân</td>
                                                <td>Lý do vào viện</td>
                                                <td>Quá trình bệnh lý</td>
                                                <td>Tiểu sử bệnh nhân (bản thân)</td>
                                                <td>Đặc điểm</td>
                                                <td>Tiểu sử bệnh nhân (gia đình)</td>
                                                <td>Hành động</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while($row = mysqli_fetch_array($result)): ?>
                                                <tr>
                                                    <td><?= $row['maBN'] ?></td>
                                                    <td><?= $row['tenBN'] ?></td>
                                                    <td><?= $row['lydovaovien'] ?></td>
                                                    <td><?= $row['quatrinhbenhly'] ?></td>
                                                    <td><?= $row['tieusubenhnhan'] ?></td>
                                                    <td><?= $row['dacdiem'] ?></td>
                                                    <td><?= $row['giadinh'] ?></td>
                                                    <td>
                                                        <a href="./suabenhandau.php?id=<?= $row['maBN'] ?>" class="btn btn-danger">Sửa</a>
                                                    </td>
                                                    <style>
                                                        .btn-danger {
                                                            margin-left: 10px;
                                                            width: 70px;
                                                        }
                                                    </style>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #Các ví dụ cơ bản -->
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
