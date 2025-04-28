<?php
    include "connect_DB.php";
    include "functions.php";

            
    $row = null;
    $error_message = "";

    // Xử lý cập nhật nếu có POST
    if(isset($_POST['update'])){
        $manv = $_POST['manv'];
        $tennv = $_POST['tennv'];
        $chucvu = $_POST['chucvu'];
        $sdt = $_POST['sdt'];
        $mail = $_POST['mail'];

        $update_sql = "UPDATE lylich SET tennv='$tennv', chucvu='$chucvu', sdt='$sdt', mail='$mail' WHERE manv='$manv'";
        
        $update_result = mysqli_query($conn, $update_sql);

        if($update_result){
            echo "<script>alert('Cập nhật thành công!');</script>";
        } else {
            echo "<script>alert('Cập nhật thất bại! Lỗi: " . mysqli_error($conn) . "');</script>";
        }
    }

    // Lấy dữ liệu nhân viên từ id trên URL
    if(isset($_GET['id']) && !empty($_GET['id'])){
        $manv = $_GET['id'];
        
        // Truy vấn dữ liệu
        $sql = "SELECT * FROM lylich WHERE manv = '$manv'";
        $result = mysqli_query($conn, $sql);
        
        if($result && mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
        } else {
            $error_message = "Không tìm thấy nhân viên với mã $manv!";
        }
    } else {
        $error_message = "Không có mã nhân viên được cung cấp!";
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Quản Lý Nhân Sự - ĐH Bạc Liêu</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <main class="main-container d-grid">
    <!-- Header -->
    <?php include "header.php"; ?>

    <!-- Sidebar + Content -->
    <?php include "sidebar.php"; ?>
    
    <!-- Form edit employee -->
    <article>
        <section id="content" class="content p-3">
        <?php if(!empty($error_message)): ?>
            <div class="alert alert-danger">
                <?php echo $error_message; ?>
                <br>
                <a href="employee_list.php" class="btn btn-primary mt-2">Quay lại danh sách</a>
            </div>
        <?php elseif($row): ?>
            <form action="employee_edit.php?id=<?php echo $row['manv'];?>" method="POST">
                <h1 style="text-align:center;">Sửa thông tin nhân viên</h1>
                
                <!-- Truyền mã nhân viên ẩn để xử lý -->
                <input type="hidden" name="manv" value="<?php echo $row['manv']; ?>">

                <input class="form-control mb-2" type="text" name="tennv" placeholder="Tên nhân viên" value="<?php echo $row['tennv']; ?>" required>
                <input class="form-control mb-2" type="text" name="chucvu" placeholder="Chức vụ" value="<?php echo $row['chucvu']; ?>" required>
                <input class="form-control mb-2" type="text" name="sdt" placeholder="Số điện thoại" value="<?php echo $row['sdt']; ?>" required>
                <input class="form-control mb-2" type="email" name="mail" placeholder="E-Mail" value="<?php echo $row['mail']; ?>" required>
                
                <button class="btn btn-primary" type="submit" name="update">Cập nhật</button>
                <a href="employee_list.php" class="btn btn-secondary">Quay lại</a>
            </form>
        <?php endif; ?>
        </section>
    </article>

    <!-- Footer -->
    <?php include "footer.php"; ?>
  </main>
  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
    // Đóng kết nối ở cuối file
    mysqli_close($conn);
?>