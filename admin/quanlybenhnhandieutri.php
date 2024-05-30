<!DOCTYPE html>
<html>
<?php
        include './connect_db.php';
        $query=
        $result = mysqli_query($con, "SELECT benhnhandt.maBN, benhnhandt.tenBN,benhnhandt.ngayDieuTri,benhnhandt.khoa,benhnhandt.phong,benhnhandt.giuong,benhnhandt.ngayXuatVien,trangthai.trangThai FROM benhnhandt,trangthai where benhnhandt.trangthai=trangthai.id;");
       
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Welcome To | Bootstrap Based Admin Template - Material Design</title>
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
                <a class="navbar-brand" href="index.php">Bệnh viện đa khoa_ Quản lý bệnh nhân</a>
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
        .timkiem {
            margin-top: -10px;
            margin-bottom: 10px;
        }
        .thongke {
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
        table th, table td {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .thongke{
            margin-top: -40px;
            margin-left: 905px;
            margin-bottom: 10px;
        }
        .them {
    display: inline-block;
      padding: 10px 20px;
    background-color: #007bff; /* Change background color as needed */
    color: #fff; /* Text color */
    text-decoration: none;
    border-radius: 5px; /* Rounded corners */
    
}

.them:hover {
    background-color: #0056b3; /* Change background color on hover */
}
    </style>
    <section class="content">
        <div class="container-fluid">
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Quản lý thông tin viện phí điều 
                                
                            <a class="them"
                                     href="./thembndieutri.php">Thêm thông tin điều trị </a>
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
                                <form id="updateForm" action="./control/suatrangthai2.php" method="POST" >
                                
                                <div class="flex gap-2 thongke">
                                    <div>
                                    <select name="maBN" id="maBN" style="width: 200px;" class="border-[1px] border-[black]">
                                     <option value="">Chọn mã bệnh nhân</option>
                            <?php
                          $query = "SELECT benhnhandt.maBN
                          FROM benhnhandt, trangthai 
                          WHERE benhnhandt.trangThai = trangthai.id and benhnhandt.trangThai=1";              
                            $results = mysqli_query($con, $query);
                            if ($results) {
                                while ($data = mysqli_fetch_assoc($results)) {
                                    echo "<option value='{$data['maBN']}'>{$data['maBN']}</option>";
                                }
                            } else {
                                echo "<option value=''>Không có dữ liệu</option>";
                            }
                            ?>
                        </select>
                                    </div>
                                    <div>
                                    <select name="trangThai" id="trangThai" style="width: 150px;" class="border-[1px] border-[black]">
                            <option value="">Trạng thái</option>
                            <?php
                            $query = "SELECT id FROM trangthai";
                            $results = mysqli_query($con, $query);
                            if ($results) {
                                while ($data = mysqli_fetch_assoc($results)) {
                                    echo "<option value='{$data['id']}'>{$data['id']}</option>";
                                }
                            } else {
                                echo "<option value=''>Không có dữ liệu</option>";
                            }
                            ?>
                        </select>
                                    </div>
                                    <div>
        <button type="submit" class="border-[1px] border-[#38A169] h-[30px] w-[90px] rounded text-[white] font-bold bg-[#38A169]">Cập Nhật</button>
    </div>
                                </div>
                               
                            </form>
                            </div>
                            <?php
                            if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
                                $start_date = $_POST['start_date'];
                                $end_date = $_POST['end_date'];
                                // Tạo câu truy vấn SQL với điều kiện thời gian
                                $query = "SELECT maBN, tenBN, ngayDieuTri, ngayXuatVien, tongNgay, tenKhoa, soTien FROM vienphidieutri WHERE ngayXuatVien BETWEEN '$start_date' AND '$end_date'";
                                $result = mysqli_query($con, $query);
                            }

                            // Kiểm tra xem đã gửi form tìm kiếm chưa
                            if (isset($_POST['maBN'])) {
                                // Lấy mã bệnh nhân từ form
                                $maBN = $_POST['maBN'];
                                // Xử lý truy vấn SQL với điều kiện tìm kiếm theo mã bệnh nhân
                                $query ="SELECT benhnhandt.maBN, benhnhandt.tenBN,benhnhandt.ngayDieuTri,benhnhandt.khoa,benhnhandt.phong,benhnhandt.giuong,benhnhandt.ngayXuatVien,trangthai.trangThai 
                                FROM benhnhandt,trangthai 
                                where benhnhandt.trangthai=trangthai.id and benhnhandt.maBN='$maBN';";
                                $result = mysqli_query($con, $query);
                            }
                            ?>
                            <!-- Hiển thị  danh sách  thông tin bệnh nhân điều trị -->
                            <?php if (isset($result)): ?>
                                <div class="table">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>   
                                        <tr>
                                        <td>Mã bệnh nhân</td>
                                        <td>Tên bệnh nhân</td>
                                        <td>Ngày điều trị</td>
                                        <td>Khoa</td>
                                        <td>Phòng</td>
                                        <td>Giường bệnh</td>
                                        <td>Ngày xuất viện</td>
                                        <td>trạng Thái </td>
                                        <td>
                                        hành động
                                        </td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = mysqli_fetch_array($result)): ?>
                                                <tr>
                                            <td><?= $row['maBN'] ?></td>
                                            <td><?= $row['tenBN'] ?></td>
                                            <td><?= $row['ngayDieuTri'] ?></td>
                                            <td><?= $row['khoa'] ?></td>
                                            <td><?= $row['phong'] ?></td>
                                            <td><?= $row['giuong'] ?></td>
                                            <td><?= $row['ngayXuatVien'] ?></td>
                                            <td><?= $row['trangThai'] ?></td>
                                           <td>
                                           <a href="./suabndt.php?maBN=<?= $row['maBN'] ?> " class="btn btn-danger">Sửa</a>
                                           </td>
                                           <style>
                                            .btn-danger{
                                                margin-left: 10px;
                                                width: 80px;
                                        
                                             
                                            }
                                            .them {
    display: inline-block;
   margin-top: -10px;
    padding: 10px 20px;
    background-color: #007bff; /* Change background color as needed */
    color: #fff; /* Text color */
    text-decoration: none;
    border-radius: 5px; /* Rounded corners */
    float: right;
}

.them:hover {
    background-color: #0056b3; /* Change background color on hover */
}

                                            a {
                                              text-decoration: none;
                                               }
                                           </style>
                                            
                                        </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif; ?>
                            <?php mysqli_close($con); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Examples -->
        </div>
    </section>

    <script>
    function submitForm(maBN, event) {
        event.preventDefault(); // Ngăn chặn hành động mặc định của nút
        // Lấy thẻ input ẩn trong form
        var maBNInput = document.getElementById("maBNInput");
        // Đặt giá trị của input bằng giá trị maBN
        maBNInput.value = maBN;
        // Gửi form
        document.getElementById("updateForm").submit();
    }
    </script>

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



                                        