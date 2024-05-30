<?php
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Đăng nhập hệ thống</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
    body {
      display: flex;
      min-height: 100vh;
      flex-direction: column;
    }

    main {
      flex: 1 0 auto;
    }

    body {
      background: #fff;
    }

    .input-field input[type=date]:focus + label,
    .input-field input[type=text]:focus + label,
    .input-field input[type=email]:focus + label,
    .input-field input[type=password]:focus + label {
      color: #e91e63;
    }

    .input-field input[type=date]:focus,
    .input-field input[type=text]:focus,
    .input-field input[type=email]:focus,
    .input-field input[type=password]:focus {
      border-bottom: 2px solid #e91e63;
      box-shadow: none;
    }
  </style>
    </head>
    <body>
    <?php
    //xử lý đăng nhập vào hệ thống
include './connect_db.php'; // tệp kết nối cơ sở dữ liệu.
$error = false; // Khởi tạo biến $error để lưu trữ lỗi, nếu có.
if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) { 
    // Kiểm tra xem người dùng đã gửi dữ liệu qua phương thức POST và cả username và password đều không rỗng.
    
    $result = mysqli_query($con, "SELECT `id`,`username` FROM `admin` WHERE (`username` ='" . $_POST['username'] . "' AND `password` = ('" . $_POST['password'] . "'))");
    // Thực hiện truy vấn SQL để kiểm tra xem có tài khoản admin nào với username và password đã nhập hay không.
    
    if (!$result) {
        $error = mysqli_error($con); // Nếu truy vấn không thành công, lưu thông báo lỗi vào biến $error.
    } else {
        $admin = mysqli_fetch_assoc($result); // Nếu truy vấn thành công, lấy thông tin tài khoản admin.
        $_SESSION['admin'] = $admin; // Lưu thông tin tài khoản admin vào phiên làm việc (session).
    }
    mysqli_close($con); // Đóng kết nối cơ sở dữ liệu.
    
    if ($error !== false || $result->num_rows == 0) {
        // Nếu có lỗi hoặc không tìm thấy tài khoản nào khớp với thông tin đăng nhập đã nhập:
        ?>
        <div id="login-notify" class="box-content">
            <h1>Thông báo</h1>
            <h4><?= !empty($error) ? $error : "Thông tin đăng nhập không chính xác" ?></h4>
            <a href="./login.php">Quay lại</a>
        </div>
        <?php
        exit; // Kết thúc chương trình.
    }
    ?>
<?php } ?>
<?php if (empty($_SESSION['admin'])) { ?> 
// Nếu chưa có thông tin tài khoản admin trong phiên làm việc (session), thực hiện đoạn mã bên trong khối này.

            <div class="section"></div>
  <main>
    <center>
      <img class="responsive-img" style="width: 250px;" src="https://i.imgur.com/ax0NCsK.gif" />
      <div class="section"></div>

      <h5 class="indigo-text">Đăng nhập vào phần mền quản lý bệnh viện</h5>
      <div class="section"></div>

      <div class="container">
        <div class="z-depth-1 grey lighten-4 row" style="display: inline-block; padding: 32px 48px 0px 48px; border: 1px solid #EEE;">

          <form class="col s12" action="./login.php" method="post" autocomplete="off">
            <div class='row'>
              <div class='col s12'>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='text' name='username' value="" />
                <label >Tên đăng nhập</label>
              </div>
            </div>

            <div class='row'>
              <div class='input-field col s12'>
                <input class='validate' type='password' name='password' value="" />
                <label >Nhập mật khẩu</label>
              </div>
              <label style='float: right;'>
                <a class='pink-text' href='#!'><b>Quên mật khẩu ?</b></a>
              </label>
            </div>

            <br />
            <center>
              <div class='row'>
                <button type='submit' name='btn_login' class='col s12 btn btn-large waves-effect indigo'>Đăng Nhập</button>
              </div>
            </center>
          </form>
        </div>
      </div>
    
    <div class="section"></div>
    <div class="section"></div>
  </main>
            <?php
        } else {
          $_SESSION['admin'] = $admin;
            header('location:index.php');
            ?>
        
        <?php } ?>
    </body>
</html>


<html>

<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/css/materialize.min.css">
  
</head>

<body>
  

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
</body>

</html>


