<?php
// Kết nối cơ sở dữ liệu (giả định bạn đã có file kết nối)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Phân trang
$items_per_page = 2;
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $items_per_page;

// Lấy tổng số sản phẩm
$total_query = "SELECT COUNT(*) as total FROM hanghoa";
$total_result = $conn->query($total_query);
$total_row = $total_result->fetch_assoc();
$total_items = $total_row['total'];
$total_pages = ceil($total_items / $items_per_page);

// Lấy dữ liệu cho trang hiện tại
$sql = "SELECT * FROM hanghoa LIMIT $offset, $items_per_page";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh Sách Hàng Hóa</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <h2>Danh Sách Hàng Hóa</h2>
        <table border="1">
            <tr>
                <th>Mã hàng</th>
                <th>Tên hàng</th>
                <th>Nhà sản xuất</th>
                <th>Năm sản xuất</th>
                <th>Giá</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['mahang'] . "</td>";
                    echo "<td>" . $row['tenhang'] . "</td>";
                    echo "<td>" . $row['mansx'] . "</td>";
                    echo "<td>" . $row['namsx'] . "</td>";
                    echo "<td>" . $row['gia'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Không có dữ liệu</td></tr>";
            }
            ?>
        </table>

        <!-- Phân trang -->
        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="?page=<?php echo $page - 1; ?>">&larr;</a>
            <?php else: ?>
                <span>&larr;</span>
            <?php endif; ?>

            <span>Trang <?php echo $page; ?> / <?php echo $total_pages; ?></span>

            <?php if ($page < $total_pages): ?>
                <a href="?page=<?php echo $page + 1; ?>">&rarr;</a>
            <?php else: ?>
                <span>&rarr;</span>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>