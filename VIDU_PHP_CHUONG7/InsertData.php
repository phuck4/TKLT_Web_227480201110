<?php
    $username = "student";
    $password = "123456";
    $server = "localhost";
    $dbname = "sinhvien";

    // connect db sinhvien
    $connect = mysqli_connect($server, $username, $password, $dbname);
    // neu loi thi xuat tb loi va thoat
    if (!$connect) {
        die("Khong ket noi: " . mysqli_connect_error());
        exit();
    }
    // khai bao gia tri ban dau, khi chua submit cau lenh insert se bao loi
    $msv = "";
    $hoten = "";
    $nganhhoc = "";
    $tongdiem = "";

    // lay gi tri post tu form vua submit 
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["txtMsv"])) {
            $msv = $_POST['txtMsv'];
        }
        if (isset($_POST["txtHoten"])) {
            $hoten = $_POST['txtHoten'];
        }
        if (isset($_POST["txtNganhhoc"])) {
            $nganhhoc = $_POST['txtNganhhoc'];
        }
        if (isset($_POST["txtTongdiem"])) {
            $tongdiem = $_POST['txtTongdiem'];
        }
        // xu ly insert du lieu vao table danhsach
        $sql = "INSERT INTO danhsach (msv, hoten, nganhhoc, tongdiem) VALUES ('$msv', '$hoten', '$nganhhoc', '$tongdiem')";
        if (mysqli_query($connect, $sql)) {
            echo "Them du lieu thanh cong";
        } else {
            echo "Error: " . $sql . "<br>" . mysql_error($connect);
        }
    }
    // Dong ket noi  database
    mysqli_close($connect);
?>