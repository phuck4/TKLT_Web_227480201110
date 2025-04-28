<?php
  include "connect_DB.php";
  include "functions.php";

  if(isset($_POST['add'])){
    $manv = $_POST['manv'];
    $tennv = $_POST['tennv'];
    $chucvu = $_POST['chucvu'];
    $sdt = $_POST['sdt'];
    $mail = $_POST['mail'];
    $luong = $_POST['luong'];

    //Kiểm tra mã nhân viên
    $check_manv = $conn->prepare("SELECT manv FROM lylich WHERE manv = ?");
    $check_manv->bind_param("s",$manv);
    $check_manv->execute();

    $manv_result = $check_manv->get_result();

    // Kiểm tra sdt đã tồn tại hay chưa
    $check_sdt = $conn->prepare("SELECT sdt FROM lylich WHERE sdt = ?");
    $check_sdt->bind_param("s",$sdt);
    $check_sdt->execute();

    $sdt_result = $check_sdt->get_result();

    // Kiểm tra email đã tồn tại hay chưa
    $check_email = $conn->prepare("SELECT mail FROM lylich WHERE mail = ?");
    $check_email->bind_param("s",$mail);
    $check_email->execute();

    $email_result = $check_email->get_result();

    if($manv_result->num_rows > 0){
      showMessage("Mã nhân viên '".$manv."' đã tồn tại!", "danger",1000);
    }
    else if($sdt_result->num_rows > 0){
      showMessage("Số Điện thoại'".$sdt."' đã tồn tại!", "danger",1000);
    }else if($email_result->num_rows > 0){
      showMessage("E-mail '".$mail."' đã tồn tại!", "danger",1000);
    }else{
      // Prepared Statements (Câu lệnh được chuẩn bị trước) 
      $stmt = $conn->prepare("INSERT INTO lylich(manv,tennv,chucvu,sdt,mail,luong) VALUES(?,?,?,?,?,?)");
      $stmt->bind_param("sssssd",$manv, $tennv, $chucvu, $sdt, $mail, $luong);
      $result = $stmt->execute();

      if($result){
        showMessage("Thêm nhân viên thành công!","success",3000);
      }else{
        showMessage("Thêm nhân viên thất bại!".$conn->error,"danger",5000);
      }
    }

    // Đóng các statement
    if(isset($check_manv)){
      $check_manv->close();
    }

    if(isset($check_sdt)){
      $check_sdt->close();
    }

    if(isset($check_email)){
      $check_email->close();
    }

    if(isset($stmt)){
      $stmt->close();
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
            <form action="employee_add.php" method="POST">
                <h1 style="text-align:center;">Thêm nhân viên</h1>
                <input class="form-control mb-2" type="text" name="manv" placeholder="Mã số nhân viên" required>
                <input class="form-control mb-2" type="text" name="tennv" placeholder="Tên nhân viên" required>
                <input class="form-control mb-2" type="text" name="chucvu" placeholder="Chức vụ" required>
                <input class="form-control mb-2" type="text" name="sdt" placeholder="Số điện thoại" required>
                <input class="form-control mb-2" type="text" name="mail" placeholder="E-Mail" required>
                <input class="form-control mb-2" type="text" name="luong" placeholder="Lương" required>
                <button class="btn btn-primary" type="submit" name="add">Thêm</button>
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