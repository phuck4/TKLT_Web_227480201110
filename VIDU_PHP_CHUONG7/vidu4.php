<?php
    include "connectDb.php";
    $sql = "UPDATE hanghoa SET tenhang='vivobook Hp' WHERE mahang='HP01'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "Update thành công";
    }
    else {
        echo "Update thất bại";
    }
?>
