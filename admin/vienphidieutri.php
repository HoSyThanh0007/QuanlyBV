<?php
include './connect_db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Bệnh viện đa khoa - Quản lý bệnh nhân</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../logo/logo.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="plugins/node-waves/waves.css" rel="stylesheet">
    <link href="plugins/animate-css/animate.css" rel="stylesheet">
    <link href="plugins/morrisjs/morris.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/themes/all-themes.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        .header {
            margin-top: 40px;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f4f4f4;
        }

        .form-container {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 1400px;
            margin-top: -150px;
        }

        .form-row {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-bottom: 15px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: normal;
            font-size: 16px;
            text-transform: none;
        }

        input, select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        button {
            padding: 10px 15px;
            background: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            margin-left: 1290px;
            margin-top: -20px;
            width: 70px;
        }

        .form-group input,
        .form-group select {
            height: 30px;
            font-family: Arial, sans-serif;
            font-size: 16px;
            border: 1px solid #ccc;
            padding: 5px;
            margin: 5px;
        }

        button:hover {
            background: #0056b3;
        }
    </style>
</head>

<body class="theme-red">
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.php">Bệnh viện đa khoa - Quản lý bệnh nhân</a>
            </div>
        </div>
    </nav>
    <section>
        <aside id="leftsidebar" class="sidebar">
            <?php include "info.php"; ?>
            <?php include "menu.php"; ?>
        </aside>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="form-container">
            <form method="POST" action="./control/themvienphidieutri.php">
    <!-- Tạo một form gửi dữ liệu bằng phương thức POST tới trang themvienphidieutri.php -->
    <div class="form-row">
        <!-- Bắt đầu một hàng của form -->
        <div class="form-group" style="width: 300px;">
            <h3>Viện phí Điều Trị</h3>
            <!-- Tiêu đề của form -->
        </div>
        <div class="form-group" style="width: 300px;">
            <label for="maBN">Mã bệnh nhân</label>
            <!-- Nhãn cho trường chọn mã bệnh nhân -->
            <select name="maBN" id="maBN" style="width: 300px;">
                <!-- Tạo danh sách chọn mã bệnh nhân -->
                <option value="">Chọn mã bệnh nhân</option>
                <!-- Tùy chọn mặc định -->
                <?php
                // PHP để lấy mã bệnh nhân từ cơ sở dữ liệu
                $query = "SELECT maBN FROM bennhandieutri";
                $results = mysqli_query($con, $query);
                if ($results) {
                    while ($data = mysqli_fetch_assoc($results)) {
                        // Duyệt qua kết quả và tạo các tùy chọn cho danh sách chọn
                        echo "<option value='{$data['maBN']}'>{$data['maBN']}</option>";
                    }
                } else {
                    // Nếu không có dữ liệu thì hiển thị tùy chọn không có dữ liệu
                    echo "<option value=''>Không có dữ liệu</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group" style="width: 300px; margin-left:-300px">
            <label for="patient-name">Tên bệnh nhân</label>
            <!-- Nhãn cho trường tên bệnh nhân -->
            <input type="text" id="patient-name" name="patient-name" required readonly>
            <!-- Trường nhập tên bệnh nhân, chỉ đọc -->
        </div>
    </div>
    <div class="form-row">
        <!-- Bắt đầu một hàng khác của form -->
        <div class="form-group" style="width: 250px;">
            <label for="checkup-general">Ngày điều trị </label>
            <!-- Nhãn cho trường ngày điều trị -->
            <input type="text" id="ngayDieuTri" name="ngayDieuTri" required readonly>
            <!-- Trường nhập ngày điều trị, chỉ đọc -->
        </div>
        <div class="form-group" style="width: 250px;">
            <label for="checkup-ent">Ngày xuất viện</label>
            <!-- Nhãn cho trường ngày xuất viện -->
            <input type="text" id="ngayXuatVien" name="ngayXuatVien" required readonly>
            <!-- Trường nhập ngày xuất viện, chỉ đọc -->
        </div>
        <div class="form-group" style="width: 100px;">
            <label for="checkup-ent">Tổng ngày</label>
            <!-- Nhãn cho trường tổng số ngày điều trị -->
            <input type="text" id="tongNgay" name="tongNgay" required>
            <!-- Trường nhập tổng số ngày điều trị -->
        </div>
        <div class="form-group" style="width: 300px;">
            <label for="checkup-general">Khoa điều trị </label>
            <!-- Nhãn cho trường khoa điều trị -->
            <select name="tenKhoa" id="tenKhoa" style="width: 300px;">
                <!-- Tạo danh sách chọn khoa điều trị -->
                <option value="">Chọn khoa điều trị</option>
                <!-- Tùy chọn mặc định -->
                <?php
                // PHP để lấy tên khoa từ cơ sở dữ liệu
                $query = "SELECT tenKhoa FROM khoa";
                $results = mysqli_query($con, $query);
                if ($results) {
                    while ($data = mysqli_fetch_assoc($results)) {
                        // Duyệt qua kết quả và tạo các tùy chọn cho danh sách chọn
                        echo "<option value='{$data['tenKhoa']}'>{$data['tenKhoa']}</option>";
                    }
                } else {
                    // Nếu không có dữ liệu thì hiển thị tùy chọn không có dữ liệu
                    echo "<option value=''>Không có dữ liệu</option>";
                }
                ?>
            </select>
        </div>
        <div class="form-group" style="width: 150px;">
            <label for="checkup-ent">số tiền</label>
            <!-- Nhãn cho trường số tiền viện phí -->
            <input type="text" id="vienphi" name="vienphi" required>
            <!-- Trường nhập số tiền viện phí -->
        </div>
        <div class="form-group" style="width: 150px;">
            <label for="BHYT">BHYT(%)</label>
            <!-- Nhãn cho trường BHYT -->
            <select name="BHYT" id="BHYT" style="width: 150px;">
                <!-- Tạo danh sách chọn tỷ lệ BHYT -->
                <option value="0">0</option>
                <option value="10">10</option>
                <option value="20">20</option>
                <option value="50">50</option>
            </select>
        </div>
    </div>
    <button type="submit">Lưu</button>
    <!-- Nút để gửi form -->
</form>

            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h3>Thông tin viện phí</h3>
                        </div>
                        <div class="body">
                            <!-- danh sách hiển thị viện phí điều trị  -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                   
                                        <tr>
                                            <td>Mã bệnh nhân</td>
                                            <td>Tên bệnh nhân</td>
                                            <td>Ngày điều trị </td>
                                            <td>Ngày xuất viện</td>
                                            <td>Khoa điều trị</td>
                                            <td>Tổng ngày </td>
                                            <td>tiền viện</td>
                                            <td>BHYT</td>
                                            <td>Tổng tiền</td>
                                            <td>Hành động</td>
                                        </tr>
                                    </thead>
                                    <tbody id="patient-info">
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#maBN').change(function() {
        var maBN = $(this).val();
        if (maBN) {
            $.ajax({
                type: 'POST',
                url: 'thanh4.php',
                data: { maBN: maBN },
                dataType: 'json',
                success: function(response) {
                    if (response.error) {
                        console.error(response.error);
                        $('#patient-name').val('');
                        $('#ngayDieuTri').val('');
                        $('#ngayXuatVien').val('');
                        $('#tongNgay').val('');
                    } else {
                        $('#patient-name').val(response.TenBN);
                        $('#ngayDieuTri').val(response.ngayDT);
                        $('#ngayXuatVien').val(response.ngayXuat);
                        $('#tongNgay').val(response.tongNgay);
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        } else {
            $('#patient-name').val('');
            $('#ngayDieuTri').val('');
            $('#ngayXuatVien').val('');
            $('#tongNgay').val('');

        }
    });
});
</script>
 <script>
        $(document).ready(function() {
            $('#tenKhoa').change(function() {
                var tenKhoa = $(this).val();
                $.ajax({ 
                    type: 'post',
                    url: 'thanh5.php',
                    data: { tenKhoa: tenKhoa },
                    success: function(response) {
                        $('#vienphi').val(response);
                    }
                });
            });
        });
 </script>
    <script>
        $(document).ready(function() {
    $('#maBN').change(function() {
        var maBN = $(this).val();
        if (maBN) {
            $.ajax({
                url: 'thanh3.php',
                type: 'GET',
                data: { maBN: maBN },
                success: function(response) {
                    var data = JSON.parse(response);
                    $('#patient-info').html(data.tableRow);
                    
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        } else {
            $('#patient-info').html('');
         
        }
    });
});
    </script>
</body>
<script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="plugins/node-waves/waves.js"></script>
    <script src="plugins/jquery-countto/jquery.countTo.js"></script>
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/morrisjs/morris.js"></script>
    <script src="plugins/chartjs/Chart.bundle.js"></script>
    <script src="plugins/flot-charts/jquery.flot.js"></script>
    <script src="plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="plugins/flot-charts/jquery.flot.time.js"></script>
    <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>
    <script src="js/admin.js"></script>
    <script src="js/pages/index.js"></script>
    <script src="js/demo.js"></script>
</html>
