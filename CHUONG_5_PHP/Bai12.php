<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bai 12 PHP</title>
    <style>
        table {
            border-collapse: collapse;
        }

        td {
            width: 50px;
            height: 50px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Bàn cờ vua</h2>
    <table border="1">
        <?php
            for ($i = 0; $i < 8; $i++) {
                echo "<tr>";
                for ($j = 0; $j < 8; $j++) {
                    $mau = ($i + $j) % 2 == 0 ? "black" : "white";
                    echo "<td style='background-color: $mau;'></td>";
                }
                echo "</tr>";
            }
        ?>
    </table>
</body>
</html>
