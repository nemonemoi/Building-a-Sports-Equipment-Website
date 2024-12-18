<!-- RELATED-PRODUCTS-AREA START -->
<div class="row">
    <style>
    .product-name {
        display: block; /* Đảm bảo mỗi tên sản phẩm là một khối riêng */
        height: 40px; /* Chiều cao cố định cho tên sản phẩm */
        overflow: hidden; /* Ẩn phần chữ dư thừa */
        text-overflow: ellipsis; /* Thêm dấu "..." nếu quá dài */
        white-space: normal; /* Cho phép xuống dòng */
        word-wrap: break-word; /* Ngắt dòng nếu quá dài */
        font-size: 16px; /* Đặt kích thước chữ phù hợp */
        line-height: 20px; /* Đảm bảo căn chỉnh dòng hợp lý */
    }
    </style>
    <div class="col-sm-12">
        <div class="left-title-area">
            <h2 class="left-title">sản phẩm tương tự</h2>
        </div>
    </div>
    <div class="related-product-area featured-products-area">
        <div class="col-sm-12">
            <div class="row">
                <!-- RELATED-CAROUSEL START -->
                <div class="related-product">
                    <!-- SINGLE-PRODUCT-ITEM START -->
                    <?php
                        require 'connect.php';

                        // Lấy thông tin môn thể thao của sản phẩm hiện tại
                        $sp_id = $_GET['id']; // ID sản phẩm hiện tại
                        $query = "SELECT SP_THETHAO FROM san_pham WHERE SP_MA = '$sp_id'";
                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            $current_sport = $result->fetch_assoc()['SP_THETHAO'];

                            // Truy vấn các sản phẩm cùng môn thể thao
                            $related_query = "SELECT SP_MA, SP_TEN, SP_GIA, SP_HINHANH 
                                              FROM san_pham 
                                              WHERE SP_THETHAO = '$current_sport' AND SP_MA != '$sp_id'
                                              LIMIT 10";
                            $related_result = $conn->query($related_query);

                            if ($related_result->num_rows > 0) {
                                while ($row = $related_result->fetch_assoc()) {
                    ?>

                    <div class="item">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="single_products.php?id=<?php echo $row['SP_MA']; ?>">
                                    <img src="assets/img/product_img/<?php echo $row['SP_HINHANH']; ?>" alt="product-image" />
                                </a>
                            </div>
                            <div class="product-info">
                               <!--  <div class="customar-comments-box">
                                    <div class="review-box">
                                        <span>1 Review(s)</span>
                                    </div>
                                </div> -->
                                <a href="single_products.php?id=<?php echo $row['SP_MA']; ?>" class="product-name">
                                    <?php echo $row['SP_TEN']; ?>
                                </a>
                                <div class="price-box">
                                    <span class="price"><?php echo number_format($row['SP_GIA']); ?> VNĐ</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                                }
                            } else {
                                echo "<p>Không có sản phẩm tương tự.</p>";
                            }
                        } else {
                            echo "<p>Không tìm thấy thông tin môn thể thao.</p>";
                        }
                    ?>
                    <!-- SINGLE-PRODUCT-ITEM END -->
                </div>
                <!-- RELATED-CAROUSEL END -->
            </div>
        </div>
    </div>
</div>
<!-- RELATED-PRODUCTS-AREA END -->
