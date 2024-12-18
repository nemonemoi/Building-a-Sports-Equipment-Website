<?php
session_start();
require 'connect.php';

if (isset($_POST['update'])) { // Kiểm tra nút 'Cập nhật'
    // Lấy thông tin từ form
    $spid = $_POST['idsprm']; // Lấy mã sản phẩm
    $quantity = $_POST['qty']; // Đổi từ 'quantity' sang 'qty' cho đúng với form
    $khid = $_SESSION['khid']; // Lấy mã khách hàng từ session

    // Kiểm tra số lượng hợp lệ
    if ($quantity <= 0) {
        echo "Số lượng không hợp lệ!";
        exit;
    }

    // Lấy mã giỏ hàng từ CSDL
    $sql = "SELECT gh.GH_MA 
            FROM gio_hang gh
            JOIN chitiet_gh ctgh ON ctgh.GH_MA = gh.GH_MA
            WHERE gh.KH_MA = {$khid} AND ctgh.SP_MA = {$spid}";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $ghma = $row["GH_MA"];

        // Cập nhật số lượng trong bảng chitiet_gh
        $update_sql = "UPDATE chitiet_gh SET CTGH_SOLUONG = $quantity WHERE SP_MA = $spid AND GH_MA = $ghma";
        if ($conn->query($update_sql) === TRUE) {
            // Chuyển hướng về trang giỏ hàng
            header("Location: cart.php");
            exit;
        } else {
            echo "Lỗi khi cập nhật số lượng: " . $conn->error;
        }
    } else {
        echo "Không tìm thấy giỏ hàng hoặc sản phẩm!";
    }
} else {
    echo "Yêu cầu không hợp lệ!";
}
?>
