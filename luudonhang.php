<?php 
session_start();
require 'connect.php';

if(isset($_SESSION["khid"])) {
    $total = intval($_POST['total']);
    $email = $_SESSION["email"];
    $khid = $_SESSION["khid"];
    $tenkh = $_SESSION["name"];
    $diachi_cu_the = isset($_POST['diachi_cu_the']) ? $_POST['diachi_cu_the'] : ''; // Nếu không có giá trị, trả về chuỗi rỗng
    $xa_ma = $_POST["xa"]; // Lấy mã xã từ form
    $huyen_ma = $_POST["huyen"]; // Lấy mã huyện từ form
    $tinh_ma = $_POST["tinh"]; // Lấy mã tỉnh từ form
    $ghma = $_POST['ghma'];
    $nvc_ma = $_POST['nhavanchuyen']; // Nhận giá trị nhà vận chuyển
    $hinhthucthanhtoan = $_POST['hinhthuctt']; 
    $shipping_fee = $_POST['shipping_fee'];
    $final_total = $_POST['final_total'];

// Sau đó sử dụng $shipping_fee và $final_total để lưu đơn hàng vào cơ sở dữ liệu


    // Tạo mã hóa đơn mới
    $sql = "SELECT MAX(HD_STT)+1 AS maxid FROM hoa_don";
    $rs = $conn->query($sql);
    $r = mysqli_fetch_assoc($rs);
    $new_id = $r["maxid"];

    $array = array();
    if (isset($_POST['sparray'])) {
        parse_str($_POST['sparray'], $array);
    }

    $array_sl = array();
    if (isset($_POST['slarray'])) {
        parse_str($_POST['slarray'], $array_sl);
    }

    // Kiểm tra nếu nhà vận chuyển không rỗng
    if (!empty($nvc_ma)) {
        // Chèn dữ liệu vào bảng don_van_chuyen
        $sql_dvc = "INSERT INTO don_van_chuyen (KH_MA, NVC_MA, XA_MA, HUYEN_MA, TINH_MA, DVC_DIACHI, DVC_TGBATDAU, DVC_TGHOANTHANH)
                    VALUES ($khid, $nvc_ma, $xa_ma, $huyen_ma, $tinh_ma, '$diachi_cu_the', sysdate(), sysdate())";

        if ($conn->query($sql_dvc) === true) {
            // Lấy giá trị DVC_MA vừa được chèn vào
            $dvc_ma = $conn->insert_id;

            // Chèn dữ liệu vào bảng hoa_don
            
           //  $sql_hd = "INSERT INTO hoa_don (HD_STT, KH_MA, TT_MA, NV_MA, PTTT_MA, KM_MA, GH_MA, DVC_MA, HD_NGAYLAP, HD_TONGTIEN) 
           // VALUES ($new_id, $khid, 1, 3, $hinhthucthanhtoan, NULL, $ghma, $dvc_ma, sysdate(), $total)";
           $sql_hd = "INSERT INTO hoa_don (HD_STT, KH_MA, TT_MA, NV_MA, PTTT_MA, KM_MA, GH_MA, DVC_MA, HD_NGAYLAP, HD_TONGTIEN) 
           VALUES ($new_id, $khid, 1, 1, $hinhthucthanhtoan, NULL, $ghma, $dvc_ma, sysdate(), $final_total)";



            if ($conn->query($sql_hd) === true) {
                // Lưu từng sản phẩm trong giỏ hàng vào chi_tiet_hd
                foreach ($array as $spid) {
                    $sql_ct = "INSERT INTO chi_tiet_hd (SP_MA, HD_STT, CTHD_SLB, CTHD_DONGIA) 
                               SELECT ct.SP_MA, $new_id, ct.CTGH_SOLUONG, sp.SP_GIA 
                               FROM gio_hang gh 
                               JOIN chitiet_gh ct ON ct.GH_MA = gh.GH_MA 
                               JOIN san_pham sp ON sp.SP_MA = ct.SP_MA
                               WHERE gh.KH_MA = $khid AND ct.SP_MA = $spid";

                    if ($conn->query($sql_ct) === true) {
                        // Xóa sản phẩm khỏi giỏ hàng
                        $sql_delete = "DELETE FROM chitiet_gh WHERE SP_MA = $spid AND GH_MA = $ghma";
                        if ($conn->query($sql_delete) === false) {
                            echo "Error: " . $sql_delete . "<br>" . $conn->error;
                        }
                    } else {
                        echo "Error: " . $sql_ct . "<br>" . $conn->error;
                    }
                }
                $message = "Đặt hàng thành công!";
                echo "<script type='text/javascript'>alert('$message');</script>";
            } else {
                echo "Error: " . $sql_hd . "<br>" . $conn->error;
            }
        } else {
            echo "Error: " . $sql_dvc . "<br>" . $conn->error;
        }
    } else {
        echo "Nhà vận chuyển không hợp lệ!";
        exit();
    }

     header('Refresh: 0;url=index.php');
}
?>
