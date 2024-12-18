<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["orderId"])) {
    $orderId = intval($_POST["orderId"]); // Đảm bảo an toàn dữ liệu
    
    require 'connect.php'; // Kết nối cơ sở dữ liệu
    
    $sql = "SELECT * FROM hoa_don WHERE HD_STT = $orderId";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        // Xuất thông tin chi tiết hóa đơn
        echo "<h6>Mã hóa đơn: {$row['HD_STT']}</h6>";
        echo "<p>Tổng tiền: " . number_format($row['HD_TONGTIEN'], 0) . " VNĐ</p>";
        echo "<p>Ngày đặt hàng: " . date('d/m/Y', strtotime($row['HD_NGAYLAP'])) . "</p>";
    } else {
        echo "<p class='text-danger'>Không tìm thấy hóa đơn.</p>";
    }
} else {
    echo "<p class='text-danger'>Yêu cầu không hợp lệ.</p>";
}
?>
