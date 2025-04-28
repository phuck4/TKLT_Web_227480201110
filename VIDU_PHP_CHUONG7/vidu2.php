<?php
    include "connectDb.php";
    $sql = "SELECT mahang, tenhang FROM hanghoa";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)) {
        echo ("Mã hàng: ".$row['mahang'].", Tên hàng: ".$row['tenhang'])."</br>";
    }
    mysqli_free_result($result);
    mysqli_close($conn);
?>