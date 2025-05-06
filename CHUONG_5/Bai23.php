<!DOCTYPE html>
<html>
<head>
    <title>Upload 1 file</title>
</head>
<body>
<h3>Upload một file</h3>
<form method="POST" enctype="multipart/form-data">
    Chọn file: <input type="file" name="fileUpload"><br><br>
    <input type="submit" name="upload" value="Tải lên">
</form>

<?php
if (isset($_POST['upload'])) {
    $thuMuc = "Tailieu/";
    if (!file_exists($thuMuc)) {
        mkdir($thuMuc); // tạo thư mục nếu chưa có
    }

    $duongDan = $thuMuc . basename($_FILES["fileUpload"]["name"]);
    if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $duongDan)) {
        echo "Tải file thành công: " . htmlspecialchars($_FILES["fileUpload"]["name"]);
    } else {
        echo "Tải file thất bại.";
    }
}
?>
</body>
</html>
