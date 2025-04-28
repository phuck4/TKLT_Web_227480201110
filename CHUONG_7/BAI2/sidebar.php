<!-- Menu Sidebar -->
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
    <!-- Sidebar + Content -->
    <aside>
      <nav class="nav-menu">
        <ul class="list-unstyled mb-0">
        <!-- Trang chủ -->
          <li><a href="https://blu.edu.vn/gioi-thieu-11540">Trang chủ</a></li>
        <!-- Đơn vị trực thuộc -->
          <li class="has-submenu">
            <a href="#" class="submenu-toggle">Đơn vị trực thuộc</a>
            <ul class="submenu list-unstyled ps-3">
              <li><a href="https://kythuatcongnghe.blu.edu.vn/">Khoa KT & CN</a></li>
              <li><a href="https://supham.blu.edu.vn/">Khoa Sư phạm</a></li>
              <li><a href="https://nongnghiepthuysan.blu.edu.vn/">Khoa NN & TS</a></li>
              <li><a href="https://kinhteluat.blu.edu.vn/">Khoa Kinh tế & Luật</a></li>
            </ul>
          </li>
        <!-- Hồ sơ nhân viên -->
          <li class="has-submenu">
            <a href="#" class="submenu-toggle">Hồ sơ nhân viên</a>
            <ul class="submenu list-unstyled ps-3">
              <li><a href="https://drive.google.com/file/d/1tB3Kes5rHua3FhYffws4Me7jzTyO78ir/view">Danh sách</a></li>
              <li><a href="employee_list.php">Xem hồ sơ</a></li>
              <li><a href="employee_add.php">Thêm hồ sơ</a></li>
              <li><a href="employee_list.php">Sửa hồ sơ</a></li>
              <li><a href="employee_delete.php">Xoá hồ sơ</a></li>
              <li><a href="employee_search.php">Tìm hồ sơ</a></li>
            </ul>
          </li>
        <!-- Quản lý tiền lương -->
          <li class="has-submenu">
            <a href="#" class="submenu-toggle">Quản lý tiền lương</a>
            <ul class="submenu list-unstyled ps-3">
              <li><a href="salary_list.php">Bảng lương</a></li>
              <li><a href="salary_update.php">Cập nhật hồ sơ</a></li>
              <li><a href="salary_search.php">Tìm kiếm</a></li>
              <li><a href="salary_calculate.php">Tính lương</a></li>
              <li><a href="#">Tính thưởng</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </aside>

    

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    //toggles (có “s”) là biến chứa mảng các nút cần lắng nghe sự kiện.
    //toggle (không “s”) là tên phương thức để bật/tắt một class trên classList.
    var toggles = document.querySelectorAll('.submenu-toggle');
    for (var i = 0; i < toggles.length; i++){
        toggles[i].addEventListener('click', function(event){
            event.preventDefault(); //ngăn hành vi mặc định (ví dụ link nhảy trang).
            this.parentElement.classList.toggle('submenu-active'); //this.parentElement là thẻ cha (ví dụ <li> chứa link).
        });
    }
  </script>
</body>
</html>
