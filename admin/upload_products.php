<?php
session_start();
ob_start(); // Bật bộ đệm đầu ra
require 'connect.php';

// Xử lý upload ảnh sản phẩm
$file_name = basename($_FILES["productImg"]["name"]);
$target_dir = "../assets/img/product_img/";
$target_file = $target_dir . $file_name;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$uploadOk = 1;

// Kiểm tra có phải file ảnh không
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["productImg"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}

// Kiểm tra dung lượng file
if ($_FILES["productImg"]["size"] > 30000000) { // 30MB
    $uploadOk = 0;
}

// Kiểm tra định dạng file
if ($file_name != null) {
    if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
        $uploadOk = 0;
    }
} else {
    // Nếu không chọn file ảnh, sử dụng ảnh mặc định
    $file_name = "default.png";
    $target_file = $target_dir . $file_name;
}

// Upload file nếu không có lỗi
if ($uploadOk) {
    if (move_uploaded_file($_FILES["productImg"]["tmp_name"], $target_file)) {
        // Ảnh đã được upload
    } else {
        $file_name = "default.png"; // Nếu lỗi, dùng ảnh mặc định
    }
} else {
    $file_name = "default.png"; // Nếu không hợp lệ, dùng ảnh mặc định
}

// Lưu tên file ảnh vào cơ sở dữ liệu
$filename = $file_name;

// Lấy mã sản phẩm mới
$sql = "SELECT MAX(SP_MA) AS max_id FROM SAN_PHAM";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $max_id = $row["max_id"];
} else {
    $max_id = 0; // Nếu bảng rỗng, bắt đầu từ 0
}
$pdid = $max_id + 1;

// Lấy dữ liệu từ form
$nsxid = $_POST["nsxid"];
$lspid = $_POST["types"];
$pd_name = $_POST["pd_name"];
$color = $_POST["color"];
$mota = $_POST["mota"];
$chatlieu = $_POST["chatlieu"];
$kichthuoc = $_POST["kichthuoc"];
$monthethao = $_POST["monthethao"];
$pd_price = $_POST["pd_price"];
$pd_quantity = $_POST["pd_quantity"];

// Thực hiện thêm sản phẩm
$sql = "INSERT INTO SAN_PHAM (SP_MA, NSX_MA, LSP_MA, SP_TEN, SP_MAUSAC, SP_MOTA, SP_CHATLIEU, SP_SOLUONGTON, SP_KICHTHUOC, SP_THETHAO, SP_GIA, SP_HINHANH, SP_NGAYTAO) 
        VALUES ('$pdid', '$nsxid', '$lspid', '$pd_name', '$color', '$mota', '$chatlieu', '$pd_quantity', '$kichthuoc', '$monthethao', '$pd_price', '$filename', NOW())";

// $sql = "INSERT INTO SAN_PHAM (SP_MA, NSX_MA, LSP_MA, SP_TEN, SP_MAUSAC, SP_MOTA, SP_CHATLIEU, SP_SOLUONGTON, SP_KICHTHUOC, SP_GIA, SP_HINHANH) 
//         VALUES ('$pdid', '$nsxid', '$lspid', '$pd_name', '$color', '$mota', '$chatlieu', '$pd_quantity', '$kichthuoc', '$pd_price', '$filename')";

if ($conn->query($sql) === TRUE) {
    header('Location: products.php'); // Chuyển hướng về trang sản phẩm
    exit(); // Dừng thực thi mã sau khi chuyển hướng
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();
ob_end_flush(); // Kết thúc bộ đệm đầu ra
?>
