<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doanh Thu Viện Phí</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="plugins/morrisjs/morris.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/themes/all-themes.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
        .navbar {
            background-color: #009688;
        }
        .navbar-brand {
            color: #ffffff !important;
        }
        .card {
            margin-top: 20px;
        }
        .card-header {
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
        }
        .card-header h6 {
            margin: 0;
        }
        .card-body {
            padding: 1.5rem;
        }
        .chart-area {
            position: relative;
            height: 320px;
            width: 100%;
        }
        .card-header{
            
            text-align: center;
            
        
        }
        p{
margin-top: 30px;
        }
    </style>
</head>
<body class="theme-red">
    <div class="overlay"></div>
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.php">ADMIN PAGE</a>
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
            <div class="block-header">
                <h2>QUẢN LÝ</h2>
            </div>
            <?php
            include "quanly.php";
            ?>
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <p class="thanh">Thống kê doanh thu viện phí khám bệnh 15 ngày gần nhất</p>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myBarChart" style="height: 320px; width: 100%;"></canvas>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('myBarChart').getContext('2d');
            const data = {
                labels: [
                    "2023-05-01", "2023-05-02", "2023-05-03", "2023-05-04", "2023-05-05", 
                    "2023-05-06", "2023-05-07", "2023-05-08", "2023-05-09", "2023-05-10", 
                    "2023-05-11", "2023-05-12", "2023-05-13", "2023-05-14", "2023-05-15"
                ],
                datasets: [{
                    label: 'Doanh thu (đ)',
                    data: [
                        5000000, 4500000, 5200000, 4800000, 4700000, 
                        4900000, 5100000, 5300000, 4800000, 5000000, 
                        4700000, 4900000, 5100000, 4500000, 4700000
                    ],
                    backgroundColor: 'rgba(78, 115, 223, 1)',
                    borderColor: 'rgba(78, 115, 223, 1)',
                    borderWidth: 1
                }]
            };
            const options = {
                scales: {
                    x: {
                        beginAtZero: true,
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value.toLocaleString() + ' đ';
                            }
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                return context.dataset.label + ': ' + context.raw.toLocaleString() + ' đ';
                            }
                        }
                    }
                }
            };
            const myBarChart = new Chart(ctx, {
                type: 'bar',
                data: data,
                options: options
            });
        });
    </script>
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

<!-- Flot Charts Plugin Js -->


<!-- Sparkline Chart Plugin Js -->


<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/index.js"></script>
<!-- Demo Js -->
<script src="js/demo.js"></script>
</body>
</html>
