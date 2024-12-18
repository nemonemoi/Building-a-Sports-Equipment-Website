<!doctype html>
<html lang="en">
<head>
    <title>Danh sách đơn hàng</title>
    <?php include "head.php"; ?>
</head>
<body>
    <?php include "header.php"; ?>

    <section class="main-content-section" style="margin-top: 20px; margin-bottom: 20px; margin-left: 180px;">
        <div class="container2">
            <div class="order-list">
                <?php
                $khid = $_SESSION["khid"]; // Lấy mã khách hàng từ session

                // Truy vấn để lấy thông tin đơn hàng và trạng thái
                $sql = "SELECT hd.HD_STT, hd.HD_NGAYLAP, hd.HD_TONGTIEN, tt.TT_TEN
        FROM hoa_don hd
        JOIN trang_thai tt ON hd.TT_MA = tt.TT_MA
        WHERE hd.KH_MA = $khid
        ORDER BY hd.HD_NGAYLAP DESC"; // Thêm câu lệnh ORDER BY để sắp xếp theo ngày giảm dần


                $result = $conn->query($sql);

                if ($result === false) {
                    echo "Lỗi truy vấn SQL (hoa_don): " . $conn->error;
                } elseif ($result->num_rows > 0) {
                    // Xử lý dữ liệu nếu có đơn hàng
                    while ($row = $result->fetch_assoc()) {
                        $orderId = $row['HD_STT'];
                        $orderDate = $row['HD_NGAYLAP'];
                        $totalAmount = number_format($row['HD_TONGTIEN']);
                        $status = $row['TT_TEN'];

                        echo "<div class='order-container'>";
                        echo "<div class='order-header'>";
                        echo "<span>Đơn hàng #$orderId - Ngày đặt: $orderDate</span>";
                        echo "<span class='order-status'>$status</span>";
                        echo "</div>";
                        echo "<div class='order-summary'>";
                        echo "<strong>Tổng tiền:</strong> $totalAmount VNĐ";
                        echo "</div>";

                        // Truy vấn để lấy danh sách sản phẩm trong đơn hàng
                        $sql_products = "SELECT sp.SP_TEN, sp.SP_HINHANH, cthd.CTHD_SLB, cthd.CTHD_DONGIA 
                                         FROM chi_tiet_hd cthd
                                         JOIN san_pham sp ON cthd.SP_MA = sp.SP_MA
                                         WHERE cthd.HD_STT = $orderId";
                        $result_products = $conn->query($sql_products);

                        if ($result_products === false) {
                            echo "<div class='error'>Lỗi truy vấn SQL cho sản phẩm: " . $conn->error . "</div>";
                        } elseif ($result_products->num_rows > 0) {
                            echo "<div class='order-details' id='details-$orderId' style='display: none;'>";
                            while ($product = $result_products->fetch_assoc()) {
                                $productName = $product['SP_TEN'];
                                $productImage = $product['SP_HINHANH']; // Đường dẫn ảnh sản phẩm
                                $productQuantity = $product['CTHD_SLB'];
                                $productPrice = number_format($product['CTHD_DONGIA']);

                                echo "<div class='product-item'>";
                                echo "<img src='assets/img/product_img/$productImage' alt='$productName' class='product-image' />";
                                echo "<span>$productName (x$productQuantity) - $productPrice VNĐ</span>";
                                echo "</div>";
                            }
                            echo "</div>";

                            // Nút Xem thêm/Thu gọn
                            echo "<button id='btn-$orderId' class='toggle-btn' onclick='toggleDetails($orderId)'>Xem thêm</button>";
                        } else {
                            echo "<div class='no-products'>Không có sản phẩm nào trong đơn hàng này.</div>";
                        }

                        echo "</div>";
                    }
                } else {
                    echo "<p>Không có đơn hàng nào.</p>";
                }
                ?>
            </div>
        </div>
    </section>

    <?php include "footer.php"; ?>
    
    <script>
    function toggleDetails(orderId) {
        var detailsDiv = document.getElementById('details-' + orderId);
        var button = document.getElementById('btn-' + orderId);

        if (detailsDiv.style.display === 'none') {
            detailsDiv.style.display = 'block';
            button.innerText = 'Thu gọn';
        } else {
            detailsDiv.style.display = 'none';
            button.innerText = 'Xem thêm';
        }
    }
    </script>

    <style>
    .container2 {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .order-list {
        max-height: 500px; /* Giới hạn chiều cao của danh sách đơn hàng */
        overflow-y: scroll; /* Thêm thanh trượt dọc */
        width: 100%;
    }

    .order-container {
        border: 1px solid #ddd;
        padding: 10px;
        margin: 10px 0;
        width: 1000px;
        border-radius: 8px;
        background-color: #f9f9f9;
    }

    .order-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .order-status {
        color: #007bff;
        font-weight: bold;
    }

    .order-summary {
        font-size: 16px;
        margin-bottom: 10px;
    }

    .product-item {
        padding: 5px 0;
        display: flex;
        align-items: center;
    }

    .product-image {
        width: 50px;
        height: 50px;
        margin-right: 10px;
        border-radius: 5px;
    }

    .toggle-btn {
        background-color: red;
        color: white;
        padding: 5px 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .toggle-btn:hover {
        background-color: darkred;
    }
    </style>
</body>
</html>
