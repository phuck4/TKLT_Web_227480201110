<!DOCTYPE html>
<html>
<head>
    <title>Upload nhiều file</title>
</head>
<body>
<h3>Upload nhiều file</h3>
<form method="POST" enctype="multipart/form-data">
    Chọn file: <input type="file" name="filesUpload[]" multiple><br><br>
    <input type="submit" name="upload" value="Tải lên">
</form>

<?php
if (isset($_POST['upload'])) {
    $thuMuc = "BoSuuTap/";
    if (!file_exists($thuMuc)) {
        mkdir($thuMuc);
    }

    $soFile = count($_FILES['filesUpload']['name']);
    for ($i = 0; $i < $soFile; $i++) {
        $tenFile = $_FILES['filesUpload']['name'][$i];
        $tam = $_FILES['filesUpload']['tmp_name'][$i];
        $duongDan = $thuMuc . basename($tenFile);

        if (move_uploaded_file($tam, $duongDan)) {
            echo "Đã tải: " . htmlspecialchars($tenFile) . "<br>";
        } else {
            echo "Lỗi tải file: " . htmlspecialchars($tenFile) . "<br>";
        }
    }
}
?>
</body>
</html>
