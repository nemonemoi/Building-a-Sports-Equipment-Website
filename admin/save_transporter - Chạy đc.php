<?php
include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nvc_ten = $_POST['nvc_ten'];
    $nvc_mota = $_POST['nvc_mota'];
    $don_gia = $_POST['don_gia'];

    // Kiểm tra giá trị LSP_MA trong bảng loai_sp
    $valid_lsp_mas = [];
    $sql_check_lsp = "SELECT LSP_MA FROM loai_sp";
    $result_check_lsp = $conn->query($sql_check_lsp);
    while ($row = $result_check_lsp->fetch_assoc()) {
        $valid_lsp_mas[] = $row['LSP_MA'];
    }
    echo "Valid LSP_MA values: ";
    print_r($valid_lsp_mas);

    $sql = "INSERT INTO nha_van_chuyen (NVC_TEN, NVC_MOTA) VALUES ('$nvc_ten', '$nvc_mota')";
    if ($conn->query($sql) === TRUE) {
        $new_nvc_ma = $conn->insert_id;

        foreach ($don_gia as $kv_ma => $lsp_dongia) {
            foreach ($lsp_dongia as $lsp_ma => $dgvc_dongia) {
                // Kiểm tra và in ra từng giá trị lsp_ma
                echo "Checking LSP_MA: " . $lsp_ma . "<br>";
                if (in_array($lsp_ma, $valid_lsp_mas)) {
                    $sql_don_gia = "INSERT INTO don_gia_van_chuyen (NVC_MA, KV_MA, LSP_MA, DGVC_DONGIA)
                                    VALUES ('$new_nvc_ma', '$kv_ma', '$lsp_ma', '$dgvc_dongia')";
                    if ($conn->query($sql_don_gia) === FALSE) {
                        echo "Lỗi khi lưu đơn giá: " . $conn->error . "<br>";
                        echo "SQL: " . $sql_don_gia . "<br>";
                        exit();
                    }
                } else {
                    echo "Mã loại sản phẩm không hợp lệ: " . $lsp_ma . "<br>";
                    exit();
                }
            }
        }

        header('Location: transporter.php');
        exit();
    } else {
        echo "Lỗi khi thêm nhà vận chuyển: " . $conn->error;
    }
}
?>
