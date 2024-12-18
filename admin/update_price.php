<?php
require 'connect.php';

// Lấy dữ liệu từ AJAX
$data = json_decode(file_get_contents("php://input"), true);
$lsp_ma = $data['lsp_ma'];
$kv_ma = $data['kv_ma'];
$dongia = $data['dongia'];

// Kiểm tra dữ liệu
if (!is_numeric($dongia)) {
    echo json_encode(['success' => false, 'message' => 'Đơn giá không hợp lệ']);
    exit;
}

// Cập nhật cơ sở dữ liệu
$sql = "UPDATE don_gia_van_chuyen SET DGVC_DONGIA = ? WHERE LSP_MA = ? AND KV_MA = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("dis", $dongia, $lsp_ma, $kv_ma);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Cập nhật thất bại']);
}
?>