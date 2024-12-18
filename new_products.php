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
<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <!-- NEW-PRODUCT-AREA START -->
    <div class="new-product-area">
        <div class="left-title-area">
            <h2 class="left-title">SẢN PHẨM MỚI</h2>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <!-- NEW-PRO-CAROUSEL START -->
                    <div class="new-pro-carousel">
                        <?php
                        require 'connect.php';

                        // Truy vấn sản phẩm mới nhất
                        $sql = "SELECT * 
                                FROM SAN_PHAM 
                                ORDER BY SP_NGAYTAO DESC 
                                LIMIT 5";

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <!-- NEW-PRODUCT-SINGLE-ITEM START -->
                                <div class="item">
                                    <div class="new-product">
                                        <div class="single-product-item">
                                            <div class="product-image">
                                                <a href="single_products.php?id=<?php echo $row['SP_MA']; ?>">
                                                    <img src="assets/img/product_img/<?php echo $row['SP_HINHANH']; ?>" alt="product-image" />
                                                </a>
                                                <a href="#" class="new-mark-box">new</a>
                                                <div class="overlay-content">
                                                    <ul>
                                                        <li><a href="#" title="Quick view"><i class="fa fa-search"></i></a></li>
                                                        <li><a href="add_carts.php?id=<?php echo $row['SP_MA']; ?>" title="Thêm vào giỏ hàng"><i class="fa fa-shopping-cart"></i></a></li>
                                                        <li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a></li>
                                                        <li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                               <!--  <div class="customar-comments-box">
                                                    <div class="rating-box">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-half-empty"></i>
                                                    </div>
                                                    <div class="review-box">
                                                        <span>1 Review (s)</span>
                                                    </div>
                                                </div> -->
                                                <a href="single_products.php?id=<?php echo $row['SP_MA']; ?>" class="product-name">
                                                    <?php echo $row['SP_TEN']; ?>
                                                </a>
                                                <div class="price-box">
                                                    <span class="price"><?php echo $row["SP_GIA"] ?> VNĐ</span>
                                                    <!-- <span class="price"><?php echo number_format($row['SP_GIA'], 0, ',', '.'); ?> VNĐ</span> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- NEW-PRODUCT-SINGLE-ITEM END -->
                        <?php
                            }
                        } else {
                            echo "<p>Không có sản phẩm mới nào.</p>";
                        }
                        ?>
                    </div>
                    <!-- NEW-PRO-CAROUSEL END -->
                </div>
            </div>
        </div>
    </div>
</div>
