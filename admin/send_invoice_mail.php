<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Bao gồm các file PHPMailer (đảm bảo đường dẫn đúng)
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

// Bao gồm template hoá đơn
require 'invoice_template.php'; // Bao gồm file chứa hàm generateInvoiceHTML()

// Kết nối cơ sở dữ liệu
include 'connect.php';

if (isset($_GET['mahd'])) {
    $mahd = $_GET['mahd'];

    // Truy vấn dữ liệu hóa đơn
    $sql = "SELECT hd.*, kh.KH_EMAIL AS email, kh.KH_TEN AS tenkh, kh.KH_SDT, dv.DVC_DIACHI 
            FROM hoa_don hd 
            JOIN khach_hang kh ON hd.KH_MA = kh.KH_MA 
            LEFT JOIN don_van_chuyen dv ON hd.DVC_MA = dv.DVC_MA 
            WHERE hd.HD_STT = $mahd";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $email = $row['email'];
        $tenkh = $row['tenkh'];
        $sdt = $row['KH_SDT'];
        $diachi_giao = $row['DVC_DIACHI'];

        // Truy vấn danh sách sản phẩm
        $sql_sanpham = "SELECT sp.SP_TEN AS tensp, ct.CTHD_SLB AS slsp, sp.SP_GIA AS giasp, (ct.CTHD_SLB * sp.SP_GIA) AS tongtien
                        FROM chi_tiet_hd ct
                        JOIN san_pham sp ON ct.SP_MA = sp.SP_MA
                        WHERE ct.HD_STT = $mahd";
        $result_sanpham = $conn->query($sql_sanpham);
        $sanpham = array();
        $tongTienSanPham = 0;
        while ($row_sanpham = $result_sanpham->fetch_assoc()) {
            $sanpham[] = $row_sanpham;
            $tongTienSanPham += $row_sanpham['tongtien'];
        }

        // Tạo nội dung email
        $tongTien = $row['HD_TONGTIEN'];
        $phiVanChuyen = $tongTien - $tongTienSanPham;

        $data = array(
            "mahd" => $row['HD_STT'],
            "ngay" => $row['HD_NGAYLAP'],
            "tenkh" => $row['tenkh'],
            "mailkh" => $row['email'],
            "sdtkh" => $sdt,
            "diachi_giao" => $diachi_giao,
            "sanpham" => $sanpham,
            "thanhtien" => $tongTienSanPham,
            "phivanchuyen" => $phiVanChuyen,
            "tongtien" => $tongTien
        );

        $content = generateInvoiceHTML($data); // Gọi hàm để tạo nội dung email

        // Khởi tạo PHPMailer
        $mail = new PHPMailer(true);
        try {
            // Cấu hình mail server
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'nhib2003798@student.ctu.edu.vn'; // Email của bạn
            $mail->Password = 'spsp rfmv dlkz bowj';       // Mật khẩu email
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Thiết lập mã hóa UTF-8
            $mail->CharSet = 'UTF-8';

            // Người gửi
            $mail->setFrom('nhib2003798@student.ctu.edu.vn', 'じゃな, Sportsman');
            $mail->addAddress($email, $tenkh); // Người nhận

            // Nội dung
            $mail->isHTML(true);
            $mail->Subject = 'Xác nhận đơn hàng từ じゃな, Sportsman';
            $mail->Body = $content;

            // Gửi email
            $mail->send();

            // Hiển thị thông báo thành công và chuyển hướng
            echo "<script>
                alert('Hóa đơn đã được gửi thành công!');
                window.location.href = 'billing.php';
            </script>";
        } catch (Exception $e) {
            echo "<script>
                alert('Gửi email thất bại. Lỗi: {$mail->ErrorInfo}');
                window.location.href = 'billing.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Không tìm thấy hóa đơn!');
            window.location.href = 'billing.php';
        </script>";
    }
} else {
    echo "<script>
        alert('Không có mã hóa đơn!');
        window.location.href = 'billing.php';
    </script>";
}
?>
