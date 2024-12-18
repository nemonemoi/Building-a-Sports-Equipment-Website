<?php
session_start();
require 'connect.php';

// Kiểm tra xem dữ liệu từ form và thông tin người dùng có hợp lệ không
if (!isset($_POST["idsprm"]) || !isset($_SESSION["khid"])) {
    echo "Thiếu thông tin sản phẩm hoặc người dùng.";
    exit;
}

$spid = intval($_POST["idsprm"]); // Chuyển đổi sang số nguyên
$khid = intval($_SESSION["khid"]); // Chuyển đổi mã khách hàng sang số nguyên

// Lấy mã giỏ hàng liên quan đến khách hàng và sản phẩm
$sql = "SELECT gh.GH_MA 
        FROM gio_hang gh
        JOIN chitiet_gh ctgh ON ctgh.GH_MA = gh.GH_MA 
        WHERE gh.KH_MA = ? AND ctgh.SP_MA = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $khid, $spid);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $ghma = intval($row["GH_MA"]); // Lấy mã giỏ hàng

    // Kiểm tra nếu người dùng muốn xóa sản phẩm
    if (isset($_POST['remove'])) {
        $delete_sql = "DELETE FROM chitiet_gh WHERE SP_MA = ? AND GH_MA = ?";
        $delete_stmt = $conn->prepare($delete_sql);
        $delete_stmt->bind_param("ii", $spid, $ghma);

        if ($delete_stmt->execute()) {
            // Sau khi xóa thành công, chuyển hướng về cart.php
            header('Location: cart.php');
            exit; // Đảm bảo không có nội dung nào khác được xử lý sau đây
        } else {
            echo "Lỗi khi xóa sản phẩm: " . $conn->error; // Trả về thông báo lỗi
        }
        $delete_stmt->close();
    } else {
        echo "Yêu cầu không hợp lệ.";
    }
} else {
    echo "Không tìm thấy giỏ hàng hoặc sản phẩm.";
}

$stmt->close();
$conn->close();
?>
