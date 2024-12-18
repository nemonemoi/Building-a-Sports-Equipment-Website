<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nvc_ten = $_POST['nvc_ten'];
    $nvc_mota = $_POST['nvc_mota'];
    $don_gia = $_POST['don_gia'];

    echo "<pre>";
    print_r($don_gia); // In ra để kiểm tra cấu trúc mảng đơn giá
    echo "</pre>";

    $sql_insert_nvc = "INSERT INTO nha_van_chuyen (NVC_TEN, NVC_MOTA) VALUES ('$nvc_ten', '$nvc_mota')";
    if ($conn->query($sql_insert_nvc) === TRUE) {
        $nvc_ma = $conn->insert_id;

        // Kiểm tra giá trị LSP_MA trong bảng loai_sp
        $valid_lsp_mas = [];
        $sql_check_lsp = "SELECT LSP_MA FROM loai_sp";
        $result_check_lsp = $conn->query($sql_check_lsp);
        while ($row = $result_check_lsp->fetch_assoc()) {
            $valid_lsp_mas[] = $row['LSP_MA'];
        }
        echo "Valid LSP_MA values: ";
        print_r($valid_lsp_mas);

        foreach ($don_gia as $kv_ma => $lsp_dongia) {
            foreach ($lsp_dongia as $lsp_ma => $dgvc_dongia) {
                if (in_array($lsp_ma, $valid_lsp_mas)) {
                    $sql_don_gia = "INSERT INTO don_gia_van_chuyen (NVC_MA, KV_MA, LSP_MA, DGVC_DONGIA)
                                    VALUES ('$nvc_ma', '$kv_ma', '$lsp_ma', '$dgvc_dongia')";
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

        echo "<script>alert('Thêm nhà vận chuyển thành công!'); window.location.href = 'transporter.php';</script>";
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Nhà Vận Chuyển</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Thêm Nhà Vận Chuyển Mới</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="nvc_ten" class="form-label">Tên nhà vận chuyển</label>
            <input type="text" class="form-control" id="nvc_ten" name="nvc_ten" required>
        </div>
        <div class="mb-3">
            <label for="nvc_mota" class="form-label">Mô tả</label>
            <textarea class="form-control" id="nvc_mota" name="nvc_mota" rows="3"></textarea>
        </div>
        <h4 class="mt-4">Thiết lập Đơn Giá Vận Chuyển</h4>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="table-success text-center">
                    <tr>
                        <th>Loại Sản Phẩm</th>
                        <th>Khu vực Bắc</th>
                        <th>Khu vực Trung</th>
                        <th>Khu vực Nam</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($lsp = $result_lsp->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $lsp['LSP_TEN']; ?></td>
                        <td>
                            <input type="number" class="form-control" name="don_gia[BAC][<?php echo $lsp['LSP_MA']; ?>]" placeholder="Nhập giá (VND)">
                        </td>
                        <td>
                            <input type="number" class="form-control" name="don_gia[TRUNG][<?php echo $lsp['LSP_MA']; ?>]" placeholder="Nhập giá (VND)">
                        </td>
                        <td>
                            <input type="number" class="form-control" name="don_gia[NAM][<?php echo $lsp['LSP_MA']; ?>]" placeholder="Nhập giá (VND)">
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Lưu Nhà Vận Chuyển</button>
        </div>
    </form>
</div>
</body>
</html>
