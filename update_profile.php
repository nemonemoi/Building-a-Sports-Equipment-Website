<?php
session_start();
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kh_id = $_SESSION["khach_hang_id"];
    $ten = $_POST['KH_TEN'];
    $email = $_POST['KH_EMAIL'];
    $sdt = $_POST['KH_SDT'];
    $diachi = $_POST['KH_DIACHI'];
    $ngaysinh = $_POST['KH_NGAYSINH'];
    $gioitinh = $_POST['KH_GIOITINH'];

    $sql = "UPDATE khach_hang 
            SET KH_TEN = '$ten', KH_EMAIL = '$email', KH_SDT = '$sdt', KH_DIACHI = '$diachi', KH_NGAYSINH = '$ngaysinh', KH_GIOITINH = '$gioitinh' 
            WHERE KH_ID = $kh_id";

    if ($conn->query($sql) === TRUE) {
        echo "Cập nhật thông tin thành công!";
        header("Location: profilekh.php");
    } else {
        echo "Lỗi: " . $conn->error;
    }
}
?>
