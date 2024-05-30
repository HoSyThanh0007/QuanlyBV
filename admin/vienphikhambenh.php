<?php
include './connect_db.php';
// Kết nối tới cơ sở dữ liệu
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Thẻ head chứa thông tin meta, tiêu đề, và các liên kết tới các tệp CSS, font và script -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Bệnh viện đa khoa - Quản lý bệnh nhân</title>
    <!-- Favicon cho trang web -->
    <link rel="icon" type="image/png" sizes="32x32" href="../logo/logo.png">
    <!-- Liên kết tới các font từ Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Liên kết tới các tệp CSS từ thư viện và các tệp CSS tùy chỉnh -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="plugins/node-waves/waves.css" rel="stylesheet">
    <link href="plugins/animate-css/animate.css" rel="stylesheet">
    <link href="plugins/morrisjs/morris.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/themes/all-themes.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- CSS tùy chỉnh cho trang -->
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
    <!-- Navbar -->
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
        <!-- Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <?php include "info.php"; ?>
            <!-- Thông tin sidebar -->
            <?php include "menu.php"; ?>
            <!-- Menu sidebar -->
        </aside>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="form-container">
                <!-- Biểu mẫu nhập thông tin viện phí khám bệnh -->
                <form method="POST" action="./control/themvienphikhambenh.php">
                    <div class="form-row">
                        <div class="form-group" style="width: 300px;">
                            <h3>Viện phí khám bệnh</h3>
                            <!-- Tiêu đề của form -->
                        </div>
                        <div class="form-group" style="width: 300px;">
                            <label for="maBN">Mã bệnh nhân</label>
                            <!-- Nhãn cho trường chọn mã bệnh nhân -->
                            <select name="maBN" id="maBN" style="width: 300px;">
                                <option value="">Chọn mã bệnh nhân</option>
                                <!-- Tùy chọn mặc định -->
                                <?php
                                // PHP để lấy mã bệnh nhân từ cơ sở dữ liệu
                                $query = "SELECT maBN FROM khambenh";
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
                        <div class="form-group" style="width: 300px;">
                            <label for="patient-name">Tên bệnh nhân</label>
                            <!-- Nhãn cho trường tên bệnh nhân -->
                            <input type="text" id="patient-name" name="patient-name" required readonly>
                            <!-- Trường nhập tên bệnh nhân, chỉ đọc -->
                        </div>
                        <div class="form-group" style="width: 200px;">
                            <label for="treatment-date">Ngày thanh toán</label>
                            <!-- Nhãn cho trường ngày thanh toán -->
                            <input type="date" id="treatment-date" name="treatment-date" required>
                            <!-- Trường nhập ngày thanh toán -->
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group" style="width: 200px;">
                            <label for="checkup-general">Khám tổng quát</label>
                            <!-- Nhãn cho trường khám tổng quát -->
                            <input type="text" id="checkup-general" name="checkup-general" required>
                            <!-- Trường nhập phí khám tổng quát -->
                        </div>
                        <div class="form-group" style="width: 200px;">
                            <label for="checkup-ent">Khám toàn thân</label>
                            <!-- Nhãn cho trường khám toàn thân -->
                            <input type="text" id="checkup-ent" name="checkup-ent" required>
                            <!-- Trường nhập phí khám toàn thân -->
                        </div>
                        <div class="form-group" style="width: 200px;">
                            <label for="test">Xét nghiệm</label>
                            <!-- Nhãn cho trường xét nghiệm -->
                            <input type="text" id="test" name="test" required>
                            <!-- Trường nhập phí xét nghiệm -->
                        </div>
                        <div class="form-group" style="width: 200px;">
                            <label for="imaging">CĐ hình ảnh</label>
                            <!-- Nhãn cho trường chẩn đoán hình ảnh -->
                            <input type="text" id="imaging" name="imaging" required>
                            <!-- Trường nhập phí chẩn đoán hình ảnh -->
                        </div>
                        <div class="form-group" style="width: 200px;">
                            <label for="BHYT">BHYT(%)</label>
                            <!-- Nhãn cho trường BHYT -->
                            <select name="BHYT" id="BHYT" style="width: 200px;">
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
                           
                            <!-- Tiêu đề của bảng thông tin viện phí -->
                            </div>
                        <div class="body">
                            <div class="table-responsive">
                                <!-- Bảng hiển thị thông tin viện phí -->
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <td>Mã bệnh nhân</td>
                                            <td>Tên bệnh nhân</td>
                                            <td>Ngày thanh toán</td>
                                            <td>Khám tổng quát</td>
                                            <td>Khám toàn thân</td>
                                            <td>Xét nghiệm</td>
                                            <td>Chuẩn đoán hình ảnh</td>
                                            <td>BHYT</td>
                                            <td>Tổng tiền</td>
                                            <td>Hành động</td>
                                        </tr>
                                    </thead>
                                    <tbody id="patient-info">
                                        <!-- Thông tin bệnh nhân sẽ được tải động vào đây bằng JavaScript -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- JavaScript để tải tên bệnh nhân khi chọn mã bệnh nhân -->
    <script>
        $(document).ready(function() {
            $('#maBN').change(function() {
                var maBN = $(this).val();
                $.ajax({
                    type: 'post',
                    url: 'thanh.php',
                    data: { maBN: maBN },
                    success: function(response) {
                        $('#patient-name').val(response);
                    }
                });
            });
        });
    </script>
    <!-- JavaScript để tải thông tin bệnh nhân khi chọn mã bệnh nhân -->
    <script>
        $(document).ready(function() {
            $('#maBN').change(function() {
                var maBN = $(this).val();
                if (maBN) {
                    $.ajax({
                        url: 'thanh2.php',
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
<!-- Các plugin JavaScript -->
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
<!-- JavaScript tùy chỉnh -->
<script src="js/admin.js"></script>
<script src="js/pages/index.js"></script>
<script src="js/demo.js"></script>
</html>
