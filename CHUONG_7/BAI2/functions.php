<?php
    // Làm sạch dữ liệu đầu vào
    function clean_input_data($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Xử lý escape string cho các truy vấn SQL
    function escapestring($conn,$input){
        return mysqli_real_escape_string($conn,$input);
    }

    // Hiển thị thông báo
    // Hàm hiển thị thông báo ở giữa màn hình
function showMessage($message, $type = 'success', $duration = 1000){
    $class = ($type == 'success') ? 'alert-success' : 'alert-danger';
    echo '<div class="alert '.$class.' auto-close-message" style="position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); padding: 15px; border-radius: 5px; box-shadow: 0 4px 8px rgba(0,0,0,0.2); z-index: 1000; min-width: 300px; text-align: center;">';
    echo $message;
    echo '</div>';

    // Script tự động đóng sau vài giây
    echo "<script>
            document.addEventListener('DOMContentLoaded', function(){
                var alertBox = document.querySelector('.auto-close-message');

                setTimeout(function(){
                    alertBox.style.opacity = '0';
                    alertBox.style.transition = 'opacity 0.5s';

                    setTimeout(function(){
                        if(alertBox && alertBox.parentNode) {
                            alertBox.parentNode.removeChild(alertBox);
                        }
                    }, 500);
                }, ".$duration.");
            });
          </script>";
}
?>