<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nvc_ten = $_POST['nvc_ten'];
    $nvc_mota = $_POST['nvc_mota'];
    $don_gia = $_POST['don_gia'];

    echo "<pre>";
    print_r($don_gia); // Kiểm tra mảng đơn giá
    echo "</pre>";

    $sql_insert_nvc = "INSERT INTO nha_van_chuyen (NVC_TEN, NVC_MOTA) VALUES ('$nvc_ten', '$nvc_mota')";
    if ($conn->query($sql_insert_nvc) === TRUE) {
        $nvc_ma = $conn->insert_id;

        $valid_lsp_mas = [];
        $sql_check_lsp = "SELECT LSP_MA FROM loai_sp";
        $result_check_lsp = $conn->query($sql_check_lsp);
        while ($row = $result_check_lsp->fetch_assoc()) {
            $valid_lsp_mas[] = $row['LSP_MA'];
        }
        echo "Valid LSP_MA values: ";
        print_r($valid_lsp_mas);

        // Bắt đầu transaction
        $conn->begin_transaction();

        try {
            foreach ($don_gia as $kv_ma => $lsp_dongia) {
                foreach ($lsp_dongia as $lsp_ma => $dgvc_dongia) {
                    if (in_array($lsp_ma, $valid_lsp_mas)) {
                        $sql_don_gia = "INSERT INTO don_gia_van_chuyen (NVC_MA, KV_MA, LSP_MA, DGVC_DONGIA)
                                        VALUES ('$nvc_ma', '$kv_ma', '$lsp_ma', '$dgvc_dongia')";
                        if ($conn->query($sql_don_gia) === FALSE) {
                            throw new Exception("Lỗi khi lưu đơn giá: " . $conn->error);
                        }
                    } else {
                        throw new Exception("Mã loại sản phẩm không hợp lệ: " . $lsp_ma);
                    }
                }
            }
            // Commit transaction nếu không có lỗi
            $conn->commit();
            echo "<script>alert('Thêm nhà vận chuyển thành công!'); window.location.href = 'transporter.php';</script>";
        } catch (Exception $e) {
            // Rollback transaction nếu có lỗi
            $conn->rollback();
            echo $e->getMessage();
        }
    } else {
        echo "Lỗi: " . $sql_insert_nvc . "<br>" . $conn->error;
    }
}

$sql_kv = "SELECT * FROM khu_vuc";
$result_kv = $conn->query($sql_kv);

$sql_lsp = "SELECT * FROM loai_sp";
$result_lsp = $conn->query($sql_lsp);

$conn->close();
?>
