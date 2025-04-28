<?php
include('../php/connection.php');

// Lấy dữ liệu từ form
$mahang = $_POST['mahang'];
$tenhang = $_POST['tenhang'];
$mansx = $_POST['mansx'];
$namsx = $_POST['namsx'];
$gia = $_POST['gia'];

// Kiểm tra dữ liệu đầu vào
if (empty($mahang) || empty($tenhang) || empty($mansx) || !is_numeric($namsx) || !is_numeric($gia) || $gia < 0 || $namsx < 1900 || $namsx > date("Y")) {
    die("Dữ liệu không hợp lệ. Vui lòng kiểm tra lại.");
}

// Kiểm tra mã nhà sản xuất tồn tại
$stmt_check = $conn->prepare("SELECT mansx FROM nhasanxuat WHERE mansx = ?");
$stmt_check->bind_param("s", $mansx);
$stmt_check->execute();
if ($stmt_check->get_result()->num_rows == 0) {
    die("Mã nhà sản xuất không tồn tại.");
}
$stmt_check->close();

// Thêm hàng hóa
$sql = "INSERT INTO hanghoa (mahang, tenhang, mansx, namsx, gia) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssii", $mahang, $tenhang, $mansx, $namsx, $gia);

if ($stmt->execute()) {
    echo "<div class='container' style='text-align: center;'>
            <h2>Thêm hàng hóa thành công!</h2>
            <a href='../html/InsertHangHoa.html' class='button'>Quay lại</a>
          </div>";
} else {
    echo "<div class='container' style='text-align: center;'>
            <h2>Lỗi: " . mysqli_error($conn) . "</h2>
            <a href='../html/InsertHangHoa.html' class='button'>Quay lại</a>
          </div>";
}

$stmt->close();
mysqli_close($conn);
?>