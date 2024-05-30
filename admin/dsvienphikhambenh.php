<!DOCTYPE html>
<html>
<head>
    <!-- Thiết lập ký tự UTF-8 và các thông số khác cho trình duyệt -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Quản lý bệnh nhân | Bệnh viện đa khoa</title>
    <!-- Icon cho trang web -->
    <link rel="icon" type="image/png" sizes="32x32" href="../logo/logo.png">
    <!-- Đường dẫn tới thư viện Tailwind CSS -->
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
    <!-- CSS tùy chỉnh -->
    <style>
        /* CSS cho ô tìm kiếm */
        .timkiem {
            margin-top: -10px;
            margin-bottom: 10px;
        }
        /* CSS cho nút thống kê */
        .thongke {
            margin-left: 850px;
            margin-top: -20px;
        }
        /* CSS cho input và select */
        input, select {
            width: 100%;
            padding: 4px;
            box-sizing: border-box;
            border: 1px solid #0056b3;
            font-size: 16px;
        }
        /* CSS cho các thẻ <th> và <td> trong bảng */
        table th, table td {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .btn{
            margin-left: 20px;
            width: 60px;
        }
    </style>
</head>

<body class="theme-red">
    <!-- Navbar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <!-- Nút toggle cho thanh điều hướng trên thiết bị di động -->
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <!-- Biểu tượng "bars" -->
                <a href="javascript:void(0);" class="bars"></a>
                <!-- Tiêu đề trang -->
                <a class="navbar-brand" href="index.php">Bệnh viện đa khoa | Quản lý bệnh nhân</a>
            </div>
        </div>
    </nav>
    <!-- Phần sidebar -->
    <section>
        <aside id="leftsidebar" class="sidebar">
            <!-- Thông tin người dùng -->
            <?php include "info.php"; ?>
            <!-- Menu -->
            <?php include "menu.php"; ?>
        </aside>
    </section>
    <!-- Phần nội dung -->
    <section class="content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <!-- Tiêu đề -->
                                Quản lý danh sách viện phí khám bệnh
                                <!-- Form thống kê -->
                                <form action="" method="POST">
                                    <div class="flex gap-6 thongke">
                                        <div>
                                            <!-- Input ngày bắt đầu -->
                                            <input type="date" name="start_date" class="border-[1px] border-[black]">
                                        </div>
                                        <div>
                                            <!-- Input ngày kết thúc -->
                                            <input type="date" name="end_date" class="border-[1px] border-[black]">
                                        </div>
                                        <div>
                                            <!-- Nút thống kê -->
                                            <button type="submit" class="border-[1px] border-[#38A169] h-[30px] w-[90px] rounded text-[white] font-bold bg-[#38A169]">Thống kê</button>
                                        </div>
                                    </div>
                                </form>
                            </h2>
                        </div>
                        <div class="body">
                            <div class="my-[-1px]">
                                <!-- Form tìm kiếm -->
                                <form action="" method="POST">
                                    <div class="flex gap-2 timkiem">
                                        <div>
                                            <!-- Input nhập mã bệnh nhân -->
                                            <input class="border-[1px] border-[black] rounded pl-[30px] h-[30px]" placeholder="Nhập mã bệnh nhân" type="text" name="maBN">
                                        </div>
                                        <div>
                                            <!-- Nút tìm kiếm -->
                                            <button class="border-[1px] border-[#38A169] h-[30px] rounded text-[white] font-bold bg-[#38A169]">Tìm kiếm</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- HÀM tìm kiếm và thống kê viện phí -->
                            <?php
                            include './connect_db.php';
                            // Truy vấn lấy thông tin bệnh nhân từ bảng vienphikhambenh
                            $query = "SELECT maBN, tenBN, ngaythanhtoan, khamtongquat, khamtoanthan, xetnghiem, chuandoan, bhyt FROM vienphikhambenh";
                            $tong=0;
                            // Kiểm tra nếu có dữ liệu nhập cho việc thống kê hoặc tìm kiếm
                            if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
                                $start_date = $_POST['start_date'];
                                $end_date = $_POST['end_date'];
                                // Thêm điều kiện WHERE vào truy vấn nếu có dữ liệu nhập cho việc thống kê theo ngày
                                $query .= " WHERE ngaythanhtoan BETWEEN '$start_date' AND '$end_date'";
                            } elseif (isset($_POST['maBN'])) {
                                $maBN = $_POST['maBN'];
                                // Thêm điều kiện WHERE vào truy vấn nếu có dữ liệu nhập cho việc tìm kiếm theo mã bệnh nhân
                                $query .= " WHERE maBN = '$maBN'";
                            }
                            // Thực thi truy vấn
                            $result = mysqli_query($con, $query);
                            ?>
                            <!-- Bảng hiển thị thông tin bệnh nhân -->
                            <div class="table">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <!-- Tiêu đề các cột -->
                                            <th>Mã bệnh nhân</th>
                                            <th>Tên bệnh nhân</th>
                                            <th>Ngày thanh toán</th>
                                            <th>Khám tổng quát</th>
                                            <th>Khám toàn thân</th>
                                            <th>Xét nghiệm</th>
                                            <th>Chuẩn đoán hình ảnh</th>
                                            <th>BHYT</th>
                                            <th>Tổng tiền</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <!-- PHP để hiển thị dữ liệu -->
                                    <?php 
                                    // Kiểm tra nếu có dữ liệu trả về và số dòng lớn hơn 0
                                    if ($result && mysqli_num_rows($result) > 0) { // Khởi tạo biến tổng tiền        
                                        $totalAmount = 0;
                                        // Lặp qua từng dòng dữ liệu
                                        while ($row = mysqli_fetch_assoc($result)) { // Tính tổng tiền cho từng bệnh nhân
                                            $total = ($row['khamtongquat'] + $row['khamtoanthan'] + $row['xetnghiem'] + $row['chuandoan']) - (($row['khamtongquat'] + $row['khamtoanthan'] + $row['xetnghiem'] + $row['chuandoan']) * $row['bhyt'] / 100);
                                            // Cộng vào tổng tổng tiền của tất cả các bệnh nhân
                                            $totalAmount += $total; ?>
                                        <!-- Dòng dữ liệu trong bảng -->
                                        <tr>
                                            <!-- Cột mã bệnh nhân -->
                                            <td><?= $row['maBN'] ?></td>
                                            <td><?= $row['tenBN'] ?></td>
                                            <td><?= $row['ngaythanhtoan'] ?></td>
                                            <td><?= $row['khamtongquat'] ?></td>
                                            <td><?= $row['khamtoanthan'] ?></td>
                                            <td><?= $row['xetnghiem'] ?></td>
                                            <td><?= $row['chuandoan'] ?></td>
                                            <td><?= $row['bhyt'] ?>%</td>
                                            <td><?= number_format($total) ?></td>
                                            <td>
                                                <!-- Nút xoa -->
                                                <a href="./xoakhambenh.php?id=<?= $row['maBN'] ?>" class="btn btn-danger">Xóa</a>
                                            </td>
                                        </tr>
                                    <!-- Kết thúc vòng lặp -->
                                    <?php 
                                        }
                                        // Hiển thị tổng tiền sau khi lặp xong
                                        echo "<tr><td colspan='8'>Tổng tiền " . number_format($totalAmount) . "</td></tr>";
                                    } else {
                                        // Hiển thị thông báo nếu không có dữ liệu
                                        echo "<tr><td colspan='10'>Không có dữ liệu</td></tr>";
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Đóng kết nối cơ sở dữ liệu -->
                            <?php mysqli_close($con); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>
    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>
    <!-- Custom Js -->
    <script src="js/admin.js"></script>
</body>
</html>
