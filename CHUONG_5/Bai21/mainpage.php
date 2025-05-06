<?php
    session_start();
    if(isset($_SESSION['username']) && isset($_SESSION['email'])) {
        $username = $_SESSION['username'];
        $email = $_SESSION['email'];
        echo "<h2>Trang chính</h2>";
        echo "Người dùng đã đăng nhập với tên username <b>$username</b> và email <b>$email</b><br>";
        echo '<a href="logout.php">Đăng xuất</a>';
    } else {
        header("Location: login.html");
        exit();
    }
?>