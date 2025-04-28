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
    <article>
      <section id="content" class="content p-3">
        <p><strong>Tên tiếng Anh:</strong> BAC LIEU UNIVERSITY</p>
        <p><strong>Tên viết tắt:</strong> ĐHBL (VN) - BLU (EN)</p>
        <p>
            Trường ĐHBL (ĐHBL) là trường đại học công lập, là cơ sở giáo dục đại học đa ngành, đa hệ, 
            được thành lập theo Quyết định số 1558/QĐ-TTg ngày 24/11/2006 của Thủ tướng Chính phủ. 
            Việc thành lập Trường ĐHBL là phù hợp theo ý chí, 
            nguyện vọng của Đảng bộ và nhân dân tỉnh Bạc Liêu, 
            đáp ứng yêu cầu đào tạo và phát triển nguồn nhân lực chất lượng cao, 
            phục Vụ SỰ nghiệp công nghiệp hóa, hiện đại hóa của Bạc Liêu và vùng Bán đảo Cà Mau.
        </p>
        <h5>II. CHỨC NĂNG NHIỆM VỤ</h5>
        <p>
            Về đào tạo: Tổ chức đào tạo đa dạng các cấp trình độ từ cao đẳng, 
            đại học đến sau đại học và tổ chức các loại hình liên thông, vừa học vừa làm, 
            liên kết, v.v. nhằm đáp ứng nhu cầu đào tạo ngày càng cao và đa dạng của xã hội, 
            đặc biệt là nguồn nhân lực có chất lượng, phục vụ phát triển kinh tế, 
            xã hội (KT-XH) của vùng Bán đảo Cà Mau và khu vực Đồng bằng sông Cửu Long.

            Về khoa học công nghệ: Tổ chức nghiên cứu khoa học định hướng ứng dụng, 
            chú trọng giải quyết các vấn đề cấp bách và lâu dài trong phát triển kinh tế xã hội của địa phương và vùng. 
            Tập trung nghiên cứu và chuyển giao công nghệ, 
            ưu tiên giải quyết các vấn đề được xã hội đặc biệt quan tâm và thực hiện các dịch vụ khoa học phục vụ cộng đồng.
        </p>
      </section>
    </article>

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
