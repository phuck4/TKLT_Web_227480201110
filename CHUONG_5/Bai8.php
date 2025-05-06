<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 8 PHP</title>
</head>
<body>
    <h2>Chọn năm</h2>
    <form method="post">
        <label for="nam">Chọn năm:</label>
        <select name="nam" id="nam">
            <?php
                $namHienTai = date("Y");
                for ($i = 1990; $i <= $namHienTai; $i++) {
                    echo "<option value='$i'>$i</option>";
                }
            ?>
        </select>
        <button type="submit">Xác nhận</button>
    </form>
    
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<P>Bạn đã chọn năm: <strong>". $_POST['nam'] ."</strong></p>";
        }
    ?>
</body>
</html>