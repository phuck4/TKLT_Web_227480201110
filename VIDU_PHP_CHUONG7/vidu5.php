<?php
    include "connectDb.php";
    $sql = "DELETE FROM hanghoa WHERE mahang='HP01'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Xóa thành công";
    }
    else {
        echo "Xóa thất bại";
    }
?>