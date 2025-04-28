<?php
    include "connectDb.php";
    $sql = "INSERT INTO hanghoa VALUES ('HP01', 'Hp vivobook', 'HP', '2024', '800')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Mẫu tin đã được thêm.";
    }
    else {
        echo "Không thêm được.";
    }
?>
