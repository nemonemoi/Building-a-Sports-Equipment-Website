<?php
require 'connect.php';

$mahd = $_GET['mahd'];

// Truy vấn để lấy mã nhà vận chuyển từ bảng hoa_don
$sql = "SELECT dvc.NVC_MA 
        FROM don_van_chuyen dvc 
        JOIN hoa_don hd ON dvc.DVC_MA = hd.DVC_MA 
        WHERE hd.HD_STT = {$mahd}";
$result = $conn->query($sql);

if ($result === false) {
    // Hiển thị lỗi SQL nếu có
    echo "Error: " . $conn->error;
} else {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nvc_ma = $row['NVC_MA'];

        // Truy vấn để lấy tên nhà vận chuyển từ mã nhà vận chuyển
        $sql_nvc = "SELECT NVC_TEN FROM nha_van_chuyen WHERE NVC_MA = '{$nvc_ma}'";
        $result_nvc = $conn->query($sql_nvc);
        if ($result_nvc->num_rows > 0) {
            $row_nvc = $result_nvc->fetch_assoc();
            echo $row_nvc['NVC_TEN'];
        } else {
            echo "Không tìm thấy nhà vận chuyển";
        }
    } else {
        echo "Không tìm thấy nhà vận chuyển";
    }
}
$conn->close();
?>
