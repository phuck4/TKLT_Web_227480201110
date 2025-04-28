<?php
include('../php/connection.php');

// Lấy dữ liệu từ form
$mahd = $_POST['mahd'];
$makh = $_POST['makh'];
$mahang = $_POST['mahang'];
$soluong = $_POST['soluong'];

// Kiểm tra dữ liệu đầu vào
if (empty($mahd) || empty($makh) || empty($mahang) || !is_numeric($soluong) || $soluong <= 0) {
    die("Dữ liệu không hợp lệ. Vui lòng kiểm tra lại.");
}

// Kiểm tra khách hàng tồn tại
$stmt_check_kh = $conn->prepare("SELECT makh FROM khachhang WHERE makh = ?");
$stmt_check_kh->bind_param("s", $makh);
$stmt_check_kh->execute();
if ($stmt_check_kh->get_result()->num_rows == 0) {
    die("Mã khách hàng không tồn tại.");
}
$stmt_check_kh->close();

// Kiểm tra hàng hóa tồn tại và lấy giá
$stmt_check_hh = $conn->prepare("SELECT gia FROM hanghoa WHERE mahang = ?");
$stmt_check_hh->bind_param("s", $mahang);
$stmt_check_hh->execute();
$result_hh = $stmt_check_hh->get_result();
if ($result_hh->num_rows == 0) {
    die("Mã hàng hóa không tồn tại.");
}
$gia = $result_hh->fetch_assoc()['gia'];
$stmt_check_hh->close();

// Tính thành tiền
$thanhtien = $soluong * $gia;

// Thêm hóa đơn
$sql = "INSERT INTO hoadon (mahd, makh, mahang, soluong, thanhtien) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssii", $mahd, $makh, $mahang, $soluong, $thanhtien);

if ($stmt->execute()) {
    echo "<div class='container' style='text-align: center;'>
            <h2>Thêm hóa đơn thành công!</h2>
            <p>Thành tiền: " . number_format($thanhtien) . " VNĐ</p>
            <a href='../html/InsertHoadon.html' class='button'>Quay lại</a>
          </div>";
} else {
    echo "<div class='container' style='text-align: center;'>
            <h2>Lỗi: " . mysqli_error($conn) . "</h2>
            <a href='../html/InsertHoadon.html' class='button'>Quay lại</a>
          </div>";
}

$stmt->close();
mysqli_close($conn);
?>