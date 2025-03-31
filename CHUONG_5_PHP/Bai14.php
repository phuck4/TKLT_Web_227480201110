<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai 14 PHP</title>
</head>
<body>
    <h2>Xử Lý Ma Trận</h2>
    <form method="post">
        <label for="matran">Nhập ma trận (cách nhau bằng dấu phẩy, xuống dòng cách dấu ';'):</label><br>
        <textarea name="matran" rows="5" cols="50"><?php echo isset($_POST['matran']) ? $_POST['matran'] : ''; ?></textarea><br><br>
        <button type="submit" name="tim_max">Tìm số lớn nhất</button>
        <button type="submit" name="tim_min">Tìm số nhỏ nhất</button>
        <button type="submit" name="tong">Tính tổng</button>
        <button type="submit" name="phan_tu">Hiển thị ma trận</button>
    </form>

    <?php
        function chuyenDoiMaTran($input) {
            $rows = explode(";", $input);
            $matrix = [];
            foreach ($rows as $row) {
                $matrix[] = array_map('floatval', explode(",", trim($row)));
            }
            return $matrix;
        }
        
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['matran'])) {
            $matrix = chuyenDoiMaTran($_POST['matran']);
        
            if (isset($_POST['tim_max'])) {
                $max = max(array_map('max', $matrix));
                echo "<p>Số lớn nhất trong ma trận: <strong>$max</strong></p>";
            }
            
            if (isset($_POST['tim_min'])) {
                $min = min(array_map('min', $matrix));
                echo "<p>Số nhỏ nhất trong ma trận: <strong>$min</strong></p>";
            }
        
            if (isset($_POST['tong'])) {
                $tong = array_sum(array_map('array_sum', $matrix));
                echo "<p>Tổng các phần tử trong ma trận: <strong>$tong</strong></p>";
            }
            
            if (isset($_POST['phan_tu'])) {
                echo "<h3>Ma Trận:</h3><table border='1' cellpadding='5'>";
                foreach ($matrix as $row) {
                    echo "<tr>";
                    foreach ($row as $value) {
                        echo "<td>$value</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            }
        }
    ?>
</body>
</html>