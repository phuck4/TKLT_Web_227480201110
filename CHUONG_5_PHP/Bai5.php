<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 5 PHP</title>
</head>
<body>
    <h2>TÍNH USCLN VÀ BSCNN</h2>
    <div class="container">
    <form method="POST">
            <label>Số thứ 1:</label>
            <input type="number" name="so1" value="<?= isset($_POST['so1']) ? $_POST['so1'] : '' ?>" required> <br>

            <label>Số thứ 2:</label>
            <input type="number" name="so2" value="<?= isset($_POST['so2']) ? $_POST['so2'] : '' ?>" required> <br>

            <label>Kết quả:</label>
            <input type="text" name="ketqua" value="<?= htmlspecialchars($ketqua) ?>" readonly> <br>

            <button type="submit" name="uscln">USCLN</button>
            <button type="submit" name="bscnn">BSCNN</button>
        </form>
    </div>

    <?php
        $ketqua = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['so1']) && isset($_POST['so2'])) {
                $so1 = intval($_POST['so1']);
                $so2 = intval($_POST['so2']);

                function USCLN($a, $b) {
                    while ($b != 0) {
                        $temp = $b;
                        $b = $a % $b;
                        $a = $temp;
                    }
                    return $a;
                }

                function BSCNN($a, $b) {
                    return ($a * $b) / USCLN($a, $b);
                }

                if ($so1 > 0 && $so2 > 0) {
                    if (isset($_POST['uscln'])) {
                        $ketqua = "USCLN: " . USCLN($so1, $so2);
                    } elseif (isset($_POST['bscnn'])) {
                        $ketqua = "BSCNN: " . BSCNN($so1, $so2);
                    }
                } else {
                    $ketqua = "Vui lòng nhập số nguyên dương.";
                }
            }
        }
        ?>
</body>
</html>