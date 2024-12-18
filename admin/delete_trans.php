<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nvc_ma = $_POST['nvc_ma'];

    // Bắt đầu transaction
    $conn->begin_transaction();

    try {
        // Xóa đơn giá vận chuyển liên quan
        $sql_delete_dgvc = "DELETE FROM don_gia_van_chuyen WHERE NVC_MA = '$nvc_ma'";
        if ($conn->query($sql_delete_dgvc) === FALSE) {
            throw new Exception("Lỗi khi xóa đơn giá: " . $conn->error);
        }

        // Xóa nhà vận chuyển
        $sql_delete_nvc = "DELETE FROM nha_van_chuyen WHERE NVC_MA = '$nvc_ma'";
        if ($conn->query($sql_delete_nvc) === FALSE) {
            throw new Exception("Lỗi khi xóa nhà vận chuyển: " . $conn->error);
        }

        // Commit transaction nếu không có lỗi
        $conn->commit();
        echo "<script>alert('Xóa nhà vận chuyển thành công!'); window.location.href = 'transporter.php';</script>";
    } catch (Exception $e) {
        // Rollback transaction nếu có lỗi
        $conn->rollback();
        echo $e->getMessage();
    }
}

$conn->close();
?>
