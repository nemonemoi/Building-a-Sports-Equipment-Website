<?php
session_start();
include "db_connection.php";  // Kết nối database

// Lấy thông tin khách hàng từ session
$khid = $_SESSION["khid"];

// Lấy thông tin khách hàng
$sql_kh = "SELECT * FROM khach_hang WHERE KH_MA = {$khid}";
$rs_kh = $conn->query($sql_kh);
$row_kh = $rs_kh->fetch_assoc();

// Lấy danh sách đơn vị vận chuyển
$sql_nvc = "SELECT * FROM nha_van_chuyen";
$rs_nvc = $conn->query($sql_nvc);

// Lấy danh sách phương thức thanh toán
$sql_pttt = "SELECT * FROM phuong_thuc_thanh_toan";
$rs_pttt = $conn->query($sql_pttt);

// Lấy thông tin giỏ hàng
$sql_cart = "
    SELECT sp.SP_TEN, ct.CTGH_SOLUONG, sp.SP_GIA, (ct.CTGH_SOLUONG * sp.SP_GIA) AS thanh_tien
    FROM gio_hang gh
    JOIN chitiet_gh ct ON gh.GH_MA = ct.GH_MA
    JOIN san_pham sp ON sp.SP_MA = ct.SP_MA
    WHERE gh.KH_MA = {$khid}";
$rs_cart = $conn->query($sql_cart);

// Tính tổng tiền
$total_sql = "
    SELECT SUM(ct.CTGH_SOLUONG * sp.SP_GIA) AS tongtien
    FROM gio_hang gh
    JOIN chitiet_gh ct ON gh.GH_MA = ct.GH_MA
    JOIN san_pham sp ON sp.SP_MA = ct.SP_MA
    WHERE gh.KH_MA = {$khid}";
$total_rs = $conn->query($total_sql);
$total = $total_rs->fetch_assoc()["tongtien"];
?>

<!doctype html>
<html lang="en">
<?php include "head.php"; ?>
<body>
<?php include "header.php"; ?>

<div class="container">
    <h2>Xác nhận đơn hàng</h2>
    
    <h3>Thông tin khách hàng</h3>
    <p>Họ tên: <?php echo $row_kh["KH_TEN"]; ?></p>
    <p>Email: <?php echo $row_kh["KH_EMAIL"]; ?></p>
    <p>Số điện thoại: <?php echo $row_kh["KH_SDT"]; ?></p>

    <h3>Chọn đơn vị vận chuyển</h3>
    <form action="process_order.php" method="post">
        <select name="nvc_id">
            <?php while($row_nvc = $rs_nvc->fetch_assoc()): ?>
                <option value="<?php echo $row_nvc['NVC_MA']; ?>">
                    <?php echo $row_nvc['NVC_TEN']; ?> (Phí: <?php echo number_format($row_nvc['NVC_GIA']); ?>đ)
                </option>
            <?php endwhile; ?>
        </select>

        <h3>Chọn phương thức thanh toán</h3>
        <select name="pttt_id">
            <?php while($row_pttt = $rs_pttt->fetch_assoc()): ?>
                <option value="<?php echo $row_pttt['PTTT_MA']; ?>">
                    <?php echo $row_pttt['PTTT_TEN']; ?>
                </option>
            <?php endwhile; ?>
        </select>

        <h3>Chi tiết đơn hàng</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giá</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row_cart = $rs_cart->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row_cart['SP_TEN']; ?></td>
                        <td><?php echo $row_cart['CTGH_SOLUONG']; ?></td>
                        <td><?php echo number_format($row_cart['SP_GIA']); ?> đ</td>
                        <td><?php echo number_format($row_cart['thanh_tien']); ?> đ</td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-right">Tổng tiền:</td>
                    <td><?php echo number_format($total); ?> đ</td>
                </tr>
            </tfoot>
        </table>

        <button type="submit" class="btn btn-primary">Xác nhận đặt hàng</button>
    </form>
</div>

<?php include "footer.php"; ?>
</body>
</html>
