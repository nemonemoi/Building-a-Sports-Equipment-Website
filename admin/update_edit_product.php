<?php
require 'connect.php';

// Kiểm tra xem các dữ liệu có được gửi qua POST hay không
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Lấy dữ liệu từ form
    $idsp = $_POST["idsp"];
    $lsp = $_POST["lsp"];
    $tensp = $_POST["tensp"];
    $colorsp = $_POST["colorsp"];
    $motasp = $_POST["motasp"];
    $chatlieusp = $_POST["chatlieusp"];
    $slsp = $_POST["slsp"];
    $kichthuocsp = $_POST["kichthuocsp"];
    $giasp = $_POST["giasp"];
    
    // Xử lý ảnh nếu có tải lên ảnh mới
    if (isset($_FILES["productImg"]) && $_FILES["productImg"]["error"] == 0) {
        $target_dir = "../assets/img/product_img/";
        $target_file = $target_dir . basename($_FILES["productImg"]["name"]);
        
        // Kiểm tra nếu file ảnh hợp lệ, sau đó upload ảnh
        if (move_uploaded_file($_FILES["productImg"]["tmp_name"], $target_file)) {
            $anhsp = basename($_FILES["productImg"]["name"]);
        } else {
            $anhsp = $_POST["old_productImg"];
        }
    } else {
        $anhsp = $_POST["old_productImg"];
    }
    
    // Thực hiện câu truy vấn cập nhật
    $sql = "UPDATE san_pham SET 
            LSP_MA = '$lsp',
            SP_TEN = '$tensp',
            SP_MAUSAC = '$colorsp',
            SP_MOTA = '$motasp',
            SP_CHATLIEU = '$chatlieusp',
            SP_SOLUONGTON = '$slsp',
            SP_KICHTHUOC = '$kichthuocsp',
            SP_GIA = '$giasp',
            SP_HINHANH = '$anhsp'
            WHERE SP_MA = '$idsp'";

    if ($conn->query($sql) === TRUE) {
        echo "Sản phẩm đã được cập nhật thành công.";
        header("Location: products.php?pdid=$idsp&success=1");
        exit();
    } else {
        echo "Lỗi cập nhật: " . $conn->error;
    }
}
$conn->close();
?>
