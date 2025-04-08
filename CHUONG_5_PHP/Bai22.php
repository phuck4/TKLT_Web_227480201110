<?php
    // kiểm tra nếu đã đăng nhập form
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ten = $_POST['$tenKhachHang'];
        $sdt = $_POST['sms'];
        //set time cookie 10p
        setcookie("tenKhachHang", $ten, time() + 600);
        setcookie("sms", $sdt, time() + 600);

        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập khách hàng</title>
</head>
<body>
    <?php
        // nếu có cookie --> hiển thị thông tin
        if(isset($_COOKIE['tenKhachHang']) && isset($_COOKIE['sms'])) {
            echo "<h2>Thông tin khách hàng từ cookie</h2>";
            echo "<p>Tên khách hàng: " . htmlspecialchars($_COOKIE['tenKhachHang']) . "</p>";
            echo "<p>Số điện thoại: " . htmlspecialchars($_COOKIE['sms']) . "</p>";
            echo "<hr>";
        }
    ?>

    <form method="post" action="">
        <input type="text" name="tenKhachHang" placeholder="Tên khách hàng" required>
        <input type="text" name="sms" placeholder="Số điện thoại" required>
        <button type="submit">Đăng nhập</button>
    </form>
</body>
</html>