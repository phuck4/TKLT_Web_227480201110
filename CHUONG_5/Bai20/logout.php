<?php
    setcookie("loggedin", "", time() - 1200);
    setcookie("user", "", time() - 1200);
    header("Location: login.html");
?>
