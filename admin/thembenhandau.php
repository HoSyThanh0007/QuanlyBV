<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>thông tin bệnh nhân</title>
 
    <script src="resources/ckeditor/ckeditor.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .main-content {
            width: 40%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 30px;
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .container {
            text-align: right;
            margin-bottom: 20px;
        }

        .container a {
            text-decoration: none;
            color: #007bff;
            transition: color 0.3s;
        }

        .container a:hover {
            color: #0056b3;
        }

        #product-form {
            display: flex;
            flex-direction: column;
        }

        .wrap-field {
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
        }

        .wrap-field label {
            margin-bottom: 5px;
            color: #333;
        }

        .wrap-field input[type="text"],
        .wrap-field input[type="date"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s;
            width: 100%;
            box-sizing: border-box;
            font-size:18px ;
        }
        .wrap-field input[type="text"]:focus,
        .wrap-field input[type="date"]:focus {
            border-color: #007bff;
            outline: none;
        }

        form input[type="submit"] {
            width: 20%;
            padding: 10px;
            border: none;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s;
            margin-top: 5px;
            justify-content: center;
            margin-left: 255px;
            font-size: 20px;
        }

        form input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .clear-both {
            clear: both;
        }
        .quaylai {
    font-size: 18px;
    text-align: right;
    margin-top: 10px; /* Adjust as needed */
}

.quaylai a {
    text-decoration: none;
    color: #007bff;
    transition: color 0.3s;
}

.quaylai a:hover {
    color: #0056b3;
}

    </style>
</head>
<body>
    <div class="main-content">
        <h2>Lý do vào viện</h2>
        <form id="product-form" method="POST" action="./control/thembenhandau.php" enctype="multipart/form-data">
            <div class="wrap-field">
                <label>Mã bệnh nhân: </label>
                <input type="text" name="maBN" >
            </div>
            <div class="wrap-field">
                <label>Họ và tên: </label>
                <input type="text" name="tenBN" >
            </div>
            <div class="wrap-field">
                <label>Lý do vào viện: </label>
                <input type="text" name="lyDo" >
            </div>
            <div class="wrap-field">
                <label>Quá trình bệnh lý: </label>
                <input type="text" name="quaTrinh" >
            </div>
            <div class="wrap-field">
                <label>Tiểu sử bệnh nhân(bản thân): </label>
                <input type="text" name="tieuSu">
            </div>
            <div class="wrap-field">
                <label>đặc điểm: </label>
                <input type="text" name="dacDiem">
            </div>
            <div class="wrap-field">
                <label>Tiểu sử bệnh nhân(gia đình): </label>
                <input type="text" name="giaDinh" >
            </div>
            <input type="submit" title="Lưu thông tin" value="Lưu thông tin" />
        </form>
        <div class="quaylai"> 
            <a href="./tieusubn.php">Quay lại</a>
        </div>
        <div class="clear-both"></div>
        <script>
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            // Phuchuu
            CKEDITOR.replace('product-content');
        </script>
    </div>
</body>
</html>
