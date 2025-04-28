<?php
include('../php/connection.php');

// Lấy dữ liệu
$mahd = $_POST['mahd'];

// Sử dụng prepared statement
$sql = "SELECT h.mahd, h.makh, k.tenkh, h.mahang, hh.tenhang, h.soluong, h.thanhtien 
        FROM hoadon h 
        JOIN khachhang k ON h.makh = k.makh 
        JOIN hanghoa hh ON h.mahang = hh.mahang 
        WHERE h.mahd = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $mahd);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết quả tìm hóa đơn</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h2>Kết quả tìm kiếm hóa đơn</h2>
        <?php if ($result->num_rows > 0): ?>
        <table class="table">
            <tr>
                <th>Mã hóa đơn</th>
                <th>Mã khách hàng</th>
                <th>Tên khách hàng</th>
                <th>Mã hàng</th>
                <th>Tên hàng</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['mahd'] ?></td>
                <td><?= $row['makh'] ?></td>
                <td><?= $row['tenkh'] ?></td>
                <td><?= $row['mahang'] ?></td>
                <td><?= $row['tenhang'] ?></td>
                <td><?= $row['soluong'] ?></td>
                <td><?= number_format($row['thanhtien']) ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
        <?php else: ?>
            <p>Không tìm thấy hóa đơn.</p>
        <?php endif; ?>
        <a href="../html/SearchHoadon.html" class="button">Quay lại</a>
    </div>
</body>
</html>

<?php
$stmt->close();
mysqli_close($conn);
?>