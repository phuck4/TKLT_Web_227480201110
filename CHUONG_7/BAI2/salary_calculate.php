<?php
  include "connect_DB.php";
  include "functions.php";

//   Lương trong tháng = Lương thỏa thuận / số ngày làm việc trong tháng x số ngày công thực tế
    if(isset($_POST['submit'])){
        $manv = $_POST['manv'];
        $luongcoban = $_POST['luongcoban'];
        $ngaylamchuan = $_POST['ngaylamchuan'];
        $congthucte = $_POST['congthucte'];

        $luong = $luongcoban / $ngaylamchuan * $congthucte;

        // Kiểm tra mã nhân viên có tồn tại hay không
        $check_manv = "SELECT * FROM lylich WHERE manv='$manv'";
        $check_result = mysqli_query($conn,$check_manv);

        if(mysqli_num_rows($check_result) > 0){
            // Nếu mã nhân viên có tồn tại thì cập nhật lương
            $sql = "UPDATE lylich SET luong = $luong WHERE manv = '$manv'";
            $result = mysqli_query($conn,$sql);

            if($result){
                showMessage("Cập nhật lương cho nhân viên có mã ".$manv." thành công!", "success",1000);
                
                //Reset dữ liệu trong Form
                unset($_POST['manv']);
                unset($_POST['luongcoban']);
                unset($_POST['ngaylamchuan']);
                unset($_POST['congthucte']);
                unset($luong);
            }else{
                showMessage("Tính lương THẤT BẠI! ".$conn->error,"danger",1000);
            }
        }else{
            showMessage("Mã nhân viên ".$manv." không tồn tại","danger",1000);
        }

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
    
    <!-- Form add employee -->
    <article>
        <section id="content" class="content p-3">
            <form action="salary_calculate.php" method="POST">
                <h1 style="text-align:center;">Tính lương</h1>
                <input class="form-control mb-2" type="text" name="manv" placeholder="Mã nhân viên" required>
                <input class="form-control mb-2" type="text" name="luongcoban" placeholder="Lương cơ bản" required value="<?php echo isset($_POST['luongcoban']) ? htmlspecialchars($_POST['luongcoban']) : '' ?>">
                <input class="form-control mb-2" type="text" name="ngaylamchuan" placeholder="Số ngày làm làm việc chuẩn" required value="<?php echo isset($_POST['ngaylamchuan']) ? htmlspecialchars($_POST['ngaylamchuan']) : ''; ?>">
                <input class="form-control mb-2" type="text" name="congthucte" placeholder="Số ngày công thực tế" required value="<?php echo isset($_POST['congthucte']) ? htmlspecialchars($_POST['congthucte']) : ''; ?>">
                <input class="form-control mb-2" type="text" name="luong" placeholder="Lương" readonly value="<?php echo isset($luong) && $luong > 0 ? number_format($luong,0,',','.') : '';?>">
                <button class="btn btn-primary" type="submit" name="submit" >Tính</button>
            </form>
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
  // Close database
  mysqli_close($conn);
?>