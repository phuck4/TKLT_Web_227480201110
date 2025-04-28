<?php
include('../php/connection.php');

$makh = $_POST['makh'];
$tenkh = $_POST['tenkh'];
$namsinh = $_POST['namsinh'];
$dienthoai = $_POST['dienthoai'];
$diachi = $_POST['diachi'];

$sql = "UPDATE khachhang
        SET tenkh='$tenkh', namsinh='$namsinh', dienthoai='$dienthoai', diachi='$diachi'
        WHERE makh='$makh'";

if (mysqli_query($conn, $sql)) {
    echo "Cập nhật khách hàng thành công!";
} else {
    echo "Lỗi: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
