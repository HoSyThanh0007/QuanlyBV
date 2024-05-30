<!DOCTYPE html>
<html>
<?php
        include './connect_db.php';
        $query=
        $result = mysqli_query($con, "SELECT * FROM dieutri ORDER BY `maBN` ASC");
        mysqli_close($con);
?>
<!DOCTYPE html>
<html>

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
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
       
        <!-- #END# Right Sidebar -->
    </section>


    <section class="content">
        <div class="container-fluid">
            
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Điều trị bệnh nhân
                                <a class="them"
                                     href="./themdieutri.php">Thêm điều trị bệnh nhân</a>
                            </h2>

                           
                        </div>
                        <div class="body">
                        <div class="my-[-1px]">
                    <form action="" method="POST">
                            <div class="flex gap-2">
                                <div>
                                     <input class="border-[1px] border-[black] rounded pl-[30px] h-[30px]" placeholder="" type="text" name="maBN">
                                 </div>
                                <div>
                                     <button class="border-[1px] border-[#38A169] h-[30px] rounded text-[white] font-bold bg-[#38A169]">Search</button>
                                 </div>
                            </div>
                        </form>
                    </div>
                    <?php
// Kiểm tra xem đã gửi form tìm kiếm chưa
include './connect_db.php';
if(isset($_POST['maBN'])) {
 // Lấy mã bệnh nhân từ form
$maBN = $_POST['maBN'];
// Xử lý truy vấn SQL với điều kiện tìm kiếm theo mã bệnh nhân
$query="SELECT * FROM dieutri 
WHERE maBN = '$maBN'";
$result = mysqli_query($con, $query);
}
?>
                         <!-- Hiển thị danh sách điều trị bệnh nhân-->
                         <?php if(isset($result)): ?>
                            <div class="table">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                        <td>Mã bệnh nhân</td>
                                        <td>Tên bệnh nhân</td>
                                        <td>Bệnh chính</td>
                                        <td>Bệnh kèm theo </td>
                                        <td>Phương hướng điều trị</td>
                                        <td>
                                        hành động
                                        </td>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                 
                                         <?php while($row = mysqli_fetch_array($result)): ?>
                                        <tr>
                                            <td><?= $row['maBN'] ?></td>
                                            <td><?= $row['tenBN'] ?></td>
                                            <td><?= $row['benhChinh'] ?></td>
                                            <td><?= $row['benhKemTheo'] ?></td>
                                            <td><?= $row['phuongHuong'] ?></td>
                                           <td>
                                           <a href="./suadieutri.php?id=<?= $row['maBN'] ?> " class="btn btn-danger">Sửa</a>
                                         
                                           </td>
                                          
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
            <!-- #END# Basic Examples -->
            
        </div>
    </section>
    <style>
                                            .btn-danger{
                                                margin-left: 20px;
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
table th, table td {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.them:hover {
    background-color: #0056b3; /* Change background color on hover */
}
                                           </style>
                                            
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
