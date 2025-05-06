<?php
    $servername = "localhost";
    $user = "root";
    $pass = "";
    $databasename = "hosonhanvien";
    $port = "3333";

    // Connect database
    $conn = mysqli_connect($servername, $user, $pass, $databasename, $port);

    // Check Connect database
    if(!$conn){
        echo "Kết nối THẤT BẠI! ".mysqli_connect_error();
    }
    // else{
    //     echo "Kết nối THÀNH CÔNG!";
    // }
?>
