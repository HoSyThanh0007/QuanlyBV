<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "csdlbv";
$con = mysqli_connect($host, $user, $password, $database);

$con -> set_charset('utf8');
if (mysqli_connect_errno()) {
    echo "Connection Fail: " . mysqli_connect_errno();
    exit;
}

function connect($query){ 
    $connection = new PDO("mysql:host=localhost;dbname=csdlbv;charset=utf8","root","");
    $stmt = $connection -> prepare($query);
    $stmt -> execute(); 
    return $stmt; 
}

 function getOne($query){
    $data = connect($query) -> fetch();
    return $data; 
}
function getAll($query){ 
    $data = connect($query) -> fetchAll();
    return $data; 
}
?>