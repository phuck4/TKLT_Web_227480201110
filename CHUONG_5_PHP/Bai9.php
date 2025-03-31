<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 9 PHP</title>
</head>
<body>
    <h2>Bảng cửu chương</h2>
    <table border="1" cellspacing="0" cellpadding="5">
        <tr>
            <?php
                for ($i = 1; $i <= 10; $i++) {
                    echo "<td valign='top'>";
                    echo "<b>Bảng $i</b> <br>";
                    for ($j = 1; $j <= 10; $j++) {
                        echo "$i x $j = " . ($i * $j) ."<br>";
                    }
                    echo "</td>";
                }
            ?>
        </tr>
    </table>
</body>
</html>