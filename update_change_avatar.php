<?php
session_start();
require 'connect.php';

$user_id = $_SESSION['khid']; // Lấy ID người dùng từ session
if (!$user_id) {
    echo "Bạn cần đăng nhập để thay đổi ảnh đại diện.";
    exit;
}

// Kiểm tra và xử lý tệp ảnh mới
if (isset($_FILES['staffImg']) && $_FILES['staffImg']['error'] == 0) {
    $fileTmpPath = $_FILES['staffImg']['tmp_name'];
    $fileName = $_FILES['staffImg']['name'];
    $fileSize = $_FILES['staffImg']['size'];
    $fileType = $_FILES['staffImg']['type'];
    
    // Lấy phần mở rộng của tệp
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    
    // Kiểm tra tệp có phải là ảnh hợp lệ không
    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
    if (in_array($fileExtension, $allowedExtensions)) {
        // Tạo tên mới cho ảnh
        $newFileName = "avatar_" . $user_id . "." . $fileExtension;
        
        // Đường dẫn lưu ảnh
        $uploadPath = 'assets/img/cus_img/' . $newFileName;
        
        // Di chuyển tệp vào thư mục lưu trữ
        if (move_uploaded_file($fileTmpPath, $uploadPath)) {
            // Cập nhật ảnh đại diện mới vào cơ sở dữ liệu
            $update_sql = "UPDATE khach_hang SET KH_AVATAR = ? WHERE KH_MA = ?";
            $stmt = $conn->prepare($update_sql);
            $stmt->bind_param("si", $newFileName, $user_id);
            if ($stmt->execute()) {
                // Cập nhật ảnh trong session
                $_SESSION['avt'] = $newFileName; // Lưu tên ảnh mới vào session
                header("Location: profilekh.php"); // Chuyển hướng đến trang profilekh.php để cập nhật ảnh mới
                exit;
            } else {
                echo "Lỗi cập nhật ảnh đại diện.";
            }
        } else {
            echo "Lỗi tải ảnh lên.";
        }
    } else {
        echo "Tệp tải lên không phải là ảnh hợp lệ.";
    }
} else {
    echo "Không có tệp nào được chọn.";
}
?>
