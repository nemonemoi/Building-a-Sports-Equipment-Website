<?php
require 'connect.php';

if (isset($_POST['nvc_ma']) && isset($_POST['tinh_ma'])) {
    $nvc_ma = intval($_POST['nvc_ma']);
    $tinh_ma = intval($_POST['tinh_ma']);

    // Truy vấn lấy đơn giá vận chuyển từ bảng don_gia_van_chuyen dựa trên nhà vận chuyển và khu vực (tỉnh)
    $sql = "SELECT DGVC_DONGIA 
            FROM don_gia_van_chuyen
            WHERE NVC_MA = $nvc_ma AND KV_MA = (SELECT KV_MA FROM khu_vuc WHERE TINH_MA = $tinh_ma)";
            
    $result = $conn->query($sql);

    if ($result && $row = $result->fetch_assoc()) {
        echo json_encode(['success' => true, 'dongia' => intval($row['DGVC_DONGIA'])]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Không tìm thấy phí vận chuyển!']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ!']);
}
?>