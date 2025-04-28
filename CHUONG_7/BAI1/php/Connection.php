<?php
    $servername = "localhost";
    $port = "3333";
    $dbname = "quanlybanhang";
    $username = "root";
    $password = "";

    // create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname, $port);

    // check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // echo "Connection successfully";
?>