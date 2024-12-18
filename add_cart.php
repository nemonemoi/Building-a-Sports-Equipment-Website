<?php
session_start();
require 'connect.php';

if (!isset($_SESSION["khid"])) {
    $message = "Vui lòng đăng nhập để thêm vào giỏ hàng!";
    echo "<script type='text/javascript'>alert('$message'); window.location.href = 'registration.php';</script>";
    exit(); // Kết thúc script để tránh xử lý tiếp
} else {
    $spid = $_POST["idsp"];
    $slsp = intval($_POST["slsp"]);
    $khid = $_SESSION["khid"];

    // Kiểm tra sản phẩm đã tồn tại trong giỏ hàng chưa
    $check_exist = "SELECT COUNT(*) AS tontai 
                    FROM chitiet_gh ct 
                    JOIN gio_hang gh ON ct.GH_MA = gh.GH_MA 
                    WHERE gh.KH_MA = {$khid} AND ct.SP_MA = {$spid}";
    $rs_chk = $conn->query($check_exist);
    $r = mysqli_fetch_assoc($rs_chk);

    if ($r["tontai"] > 0) {
        // Nếu sản phẩm đã tồn tại, cập nhật số lượng
        $sql_gh = "SELECT gh.GH_MA 
                   FROM gio_hang gh 
                   JOIN chitiet_gh ctgh ON ctgh.GH_MA = gh.GH_MA 
                   WHERE gh.KH_MA = {$khid} AND ctgh.SP_MA = {$spid}";
        $result_magh = $conn->query($sql_gh);
        $row = $result_magh->fetch_assoc();
        $ghma = $row["GH_MA"];

        $sql = "UPDATE chitiet_gh 
                SET CTGH_SOLUONG = CTGH_SOLUONG + {$slsp} 
                WHERE GH_MA = {$ghma} AND SP_MA = {$spid}";

        if ($conn->query($sql) === true) {
            $message = "Cập nhật giỏ hàng thành công!";
        } else {
            $message = "Đã xảy ra lỗi khi cập nhật giỏ hàng!";
        }
    } else {
        // Nếu sản phẩm chưa tồn tại, thêm mới
        $sql_maxgh = "SELECT MAX(GH_MA) AS maxgh FROM gio_hang;";
        $result_maxgh = $conn->query($sql_maxgh);
        $maxgh = $result_maxgh->fetch_assoc()["maxgh"];
        $idgh = $maxgh + 1;

        $sql_insert = "INSERT INTO gio_hang (GH_MA, KH_MA, GH_TONGSP, GH_TONGTIEN) 
                       VALUES ('{$idgh}', '{$khid}', 0, 0)";

        if ($conn->query($sql_insert) === true) {
            $sql_ctgh = "INSERT INTO chitiet_gh (SP_MA, GH_MA, CTGH_SOLUONG) 
                         VALUES ('{$spid}', '{$idgh}', '{$slsp}')";

            if ($conn->query($sql_ctgh) === true) {
                $message = "Thêm vào giỏ hàng thành công!";
            } else {
                $message = "Đã xảy ra lỗi khi thêm sản phẩm vào giỏ hàng!";
            }
        } else {
            $message = "Đã xảy ra lỗi khi tạo giỏ hàng!";
        }
    }

    // Gửi thông báo và giữ lại trên trang hiện tại
    echo "<script type='text/javascript'>
            alert('$message');
            window.history.back(); // Quay lại trang trước đó
          </script>";
    exit(); // Dừng script
}
?>
