<?php
    include "connect_DB.php";
    include "functions.php";

    // Khởi tạo biến result
    $result = null;
    $search = "";

    // Xử lý khi form được submit
    if(isset($_POST['search'])){    
        $search = mysqli_real_escape_string($conn,$_POST['search']);

        $sql = "SELECT * FROM lylich WHERE
                manv LIKE '%$search%' OR
                tennv LIKE '%$search%' OR
                chucvu LIKE '%$search%'";
        
        $result = mysqli_query($conn,$sql);

        if(!$result){
            showMessage("Lỗi, không tìm thấy kết quả!".$conn->error,"danger",1000);
        }
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tìm kiếm</title>
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
            <form action="employee_search.php" method="POST">
                <h1 style="text-align:center;">Tìm kiếm nhân viên</h1>
                <input class="form-control mb-2" type="text" name="search" placeholder="Tìm theo MNV, Tên, Chức vụ" required>
                <button class="btn btn-primary" type="search" name="add">Tìm</button>
            </form>
            <?php if(isset($_POST['search'])): ?>
                <div class="mt-3">
                    <h5>Kết quả tìm kiếm cho <?php htmlspecialchars($_POST['search']); ?></h5>
                </div>
            <?php endif; ?>

            <?php if(isset($result) && mysqli_num_rows($result) > 0): ?>
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th style="border:1px solid green; text-align:center;">Mã nhân viên</th>
                            <th style="border:1px solid green; text-align:center;">Tên nhân viên</th>
                            <th style="border:1px solid green; text-align:center;">Chức vụ</th>
                            <th style="border:1px solid green; text-align:center;">Số điện thoại</th>
                            <th style="border:1px solid green; text-align:center;">E-mail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td style="border:1px solid green;"><?php echo $row['manv']; ?></td>
                                <td style="border:1px solid green;"><?php echo $row['tennv']; ?></td>
                                <td style="border:1px solid green;"><?php echo $row['chucvu']; ?></td>
                                <td style="border:1px solid green;"><?php echo $row['sdt']; ?></td>
                                <td style="border:1px solid green;"><?php echo $row['mail'] ?></td>
                            </tr>
                            <?php endwhile; ?>
                    </tbody>
                </table>
                 <?php elseif($result !== null && mysqli_num_rows($result) === 0): ?>
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