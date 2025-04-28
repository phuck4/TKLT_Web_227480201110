<?php
    include "connect_DB.php";
    include "functions.php"; // Thêm include functions.php để sử dụng hàm showMessage

    // Xử lý xóa nhân viên
    if(isset($_GET['delete_id'])){
        $manv = $_GET['delete_id'];
        
        $stmt = $conn->prepare("DELETE FROM lylich WHERE manv = ?");
        $stmt->bind_param("s", $manv);
        $result = $stmt->execute();

        if($result){
            showMessage("Xoá nhân viên có mã số '".$manv."' thành công!","success",1000);
        }else{
            showMessage("Thao tác thất bại".$conn->error,"danger",1000);
        }
    }

    // Lấy danh sách nhân viên
    $sql = "SELECT * FROM lylich";
    $result = mysqli_query($conn, $sql);
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
    
    <!-- Employee List -->
    <article>
        <section id="content" class="content p-3">
            <h2 class="mb-3 text-center">Danh sách nhân viên</h2>
            
            <?php if(mysqli_num_rows($result) > 0): ?>
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>Mã nhân viên</th>
                            <th>Tên nhân viên</th>
                            <th>Chức vụ</th>
                            <th>Số điện thoại</th>
                            <th>E-mail</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?php echo $row['manv']; ?></td>
                                <td><?php echo $row['tennv']; ?></td>
                                <td><?php echo $row['chucvu']; ?></td>
                                <td><?php echo $row['sdt']; ?></td>
                                <td><?php echo $row['mail']; ?></td>
                                <td>
                                    <a href="employee_delete.php?delete_id=<?php echo $row['manv']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa nhân viên này?');">Xóa</a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <div class="alert alert-info">Không có nhân viên trong CSDL.</div>
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
    // Đóng kết nối
    mysqli_close($conn);
?>