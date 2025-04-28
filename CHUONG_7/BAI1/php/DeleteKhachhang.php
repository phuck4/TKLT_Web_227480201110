<?php
include('../php/connection.php');

// Lấy dữ liệu
$makh = $_POST['makh'];

// Kiểm tra khách hàng tồn tại
$stmt_check = $conn->prepare("SELECT makh FROM khachhang WHERE makh = ?");
$stmt_check->bind_param("s", $makh);
$stmt_check->execute();
if ($stmt_check->get_result()->num_rows == 0) {
    die("<div class='container' style='text-align: center;'>
            <h2>Mã khách hàng không tồn tại!</h2>
            <a href='../html/DeleteKhachhang.html' class='button'>Quay lại</a>
         </div>");
}
$stmt_check->close();

// Kiểm tra xem khách hàng có hóa đơn không
$stmt_check_hd = $conn->prepare("SELECT mahd FROM hoadon WHERE makh = ?");
$stmt_check_hd->bind_param("s", $makh);
$stmt_check_hd->execute();
if ($stmt_check_hd->get_result()->num_rows > 0) {
    die("<div class='container' style='text-align: center;'>
            <h2>Không thể xóa! Khách hàng này có hóa đơn liên quan.</h2>
            <a href='../html/DeleteKhachhang.html' class='button'>Quay lại</a>
         </div>");
}
$stmt_check_hd->close();

// Xóa khách hàng
$sql = "DELETE FROM khachhang WHERE makh = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $makh);

if ($stmt->execute()) {
    echo "<div class='container' style='text-align: center;'>
            <h2>Xóa khách hàng thành công!</h2>
            <a href='../html/DeleteKhachhang.html' class='button'>Quay lại</a>
          </div>";
} else {
    echo "<div class='container' style='text-align: center;'>
            <h2>Lỗi: " . mysqli_error($conn) . "</h2>
            <a href='../html/DeleteKhachhang.html' class='button'>Quay lại</a>
          </div>";
}

$stmt->close();
mysqli_close($conn);
?>