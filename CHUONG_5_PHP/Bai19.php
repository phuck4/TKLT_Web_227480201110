<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 19 PHP</title>
</head>
<body>
    <?php
        echo "Chào bạn nha,<br>";
        if (isset($_COOKIE['thoiGianTruyCap'])) {
            echo "Thời gian truy cập gần đây nhất là: ".date('d/m/Y H:i:s', $_COOKIE['thoiGianTruyCap']) . "<br>";
        }
        else {
            echo "Đây là lần đầu bạn truy cập vào trang web này! <br>";
        }
        setcookie('thoiGianTruyCap', time(), time() + 600);
    ?>
</body>
</html>