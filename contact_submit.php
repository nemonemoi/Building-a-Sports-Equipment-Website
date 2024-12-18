<?php
// Kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sportstore"; // Thay bằng tên cơ sở dữ liệu của bạn

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra nếu form đã được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ten = $_POST['name'];
    $email = $_POST['email'];
    $loi_nhan = $_POST['message'];

    // Chuẩn bị câu lệnh SQL để thêm dữ liệu
    $sql = "INSERT INTO lien_he (ten, email, loi_nhan) VALUES (?, ?, ?)";

    // Sử dụng prepared statement để tránh SQL Injection
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $ten, $email, $loi_nhan);

    if ($stmt->execute()) {
        // Sau khi thực hiện thành công, chuyển hướng về trang contact1.php với thông báo thành công
        header("Location: contact1.php?status=success");
        exit(); // Đảm bảo script dừng lại sau khi chuyển hướng
    } else {
        // Chuyển hướng về contact1.php với thông báo lỗi nếu có vấn đề
        header("Location: contact1.php?status=error");
        exit(); // Đảm bảo script dừng lại sau khi chuyển hướng
    }

    // Đóng statement và kết nối
    $stmt->close();
    $conn->close();
}
?>
