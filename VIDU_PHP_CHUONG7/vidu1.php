<?php
    include "connectDb.php";
    // echo "<br>";
    $sql = "SELECT * FROM hanghoa";

    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo $row['mahang'] . "&nbsp;";
                echo $row['tenhang'] . "&nbsp;";
                echo $row['mansx'] . "&nbsp;";
                echo $row['namsx'] . "&nbsp;";
                echo $row['gia'] . "&nbsp;";
                echo "<br>";
            }
            // Giải phóng bộ nhớ
            mysqli_free_result($result);
        } else {
            echo "No Records";
        }
    } else {
        echo "Truy vấn thất bại: " . mysqli_error($conn);
    }

    mysqli_close($conn);
?>
