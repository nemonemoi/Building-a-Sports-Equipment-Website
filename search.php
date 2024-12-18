<!doctype html>
<html lang="en">

<?php include "head.php" ?>

<body>
    <?php include "header.php"; ?>
     <style>
         .bhbhg {
            fsdjkfhfg
            fnkjsdfh
         }
     </style>
     <style>
    .gategory-product {
        display: flex;
        flex-wrap: wrap;
        justify-content: center; /* Căn giữa các sản phẩm */
        padding: 0 100px; /* Thêm khoảng padding để tránh trống hai bên */
        gap: 15px; /* Khoảng cách giữa các sản phẩm */
    }

    .gategory-product-list {
     width: calc(25% - 15px); /* Đảm bảo 4 sản phẩm mỗi hàng */
        margin-bottom: 30px;
        text-align: center;
    }

    @media (max-width: 1200px) {
        .gategory-product {
        padding: 0 30px; /* Giảm padding trên màn hình nhỏ hơn */
        }
    }

    @media (max-width: 992px) {
        .gategory-product-list {
        width: calc(33.33% - 15px); /* 3 sản phẩm mỗi hàng trên màn hình nhỏ hơn */
        }
    }

    @media (max-width: 768px) {
        .gategory-product-list {
        width: calc(50% - 15px); /* 2 sản phẩm mỗi hàng trên màn hình nhỏ */
        }
    }

    @media (max-width: 576px) {
        .gategory-product-list {
        width: 100%; /* 1 sản phẩm trên màn hình rất nhỏ */
        }
    }
    .gategory-product:after {
            content: "";
            flex: auto;
    }

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

    .pagination {
        text-align: center; 
        justify-content: center; 
        margin-left: 625px;
    }
    
    </style>
    <!--<style>

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

        .gategory-product {
            display: flex;
            flex-wrap: wrap;
            justify-content: center; /* Căn giữa các sản phẩm */
            padding: 0 100px; /* Thêm khoảng padding để tránh trống hai bên */
            gap: 15px; /* Khoảng cách giữa các sản phẩm */
        }

        .gategory-product-list {
            width: calc(25% - 15px); /* Đảm bảo 4 sản phẩm mỗi hàng */
            margin-bottom: 30px;
            text-align: center;
        }

        @media (max-width: 1200px) {
            .gategory-product {
                padding: 0 30px; /* Giảm padding trên màn hình nhỏ hơn */
            }
        }

        @media (max-width: 992px) {
            .gategory-product-list {
                width: calc(33.33% - 15px); /* 3 sản phẩm mỗi hàng trên màn hình nhỏ hơn */
            }
        }

        @media (max-width: 768px) {
            .gategory-product-list {
                width: calc(50% - 15px); /* 2 sản phẩm mỗi hàng trên màn hình nhỏ */
            }
        }

        @media (max-width: 576px) {
            .gategory-product-list {
                width: 100%; /* 1 sản phẩm trên màn hình rất nhỏ */
            }
        }

        /* Đảm bảo các sản phẩm cuối được căn giữa */
        .gategory-product:after {
            content: "";
            flex: auto;
        }
    </style-->


    <!-- main -->
    <div style="margin-left:170px;" class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
        <!-- hình đầu trang web -->
        <div class="right-all-product">
            <!-- PRODUCT-CATEGORY-HEADER START -->
            <div class="product-category-header">
                <?php require 'slider.php' ?>
            </div>
            <!-- PRODUCT-CATEGORY-HEADER END -->

            <!-- ALL GATEGORY-PRODUCT START -->
            <div class="all-gategory-product">
                <div class="row">
                    <ul class="gategory-product">
                        <!-- SINGLE ITEM START -->
                        <?php 
                            require 'connect.php';

                            // Lấy dữ liệu từ form search
                            $search = $_GET["txtSearch"] ?? '';
                            $cateSearch = $_GET["catsearch"] ?? '';

                            // Truy vấn SQL
                            if ($cateSearch == "") {
                                $sql = "SELECT * FROM san_pham WHERE SP_TEN LIKE '%$search%'";
                            } else {
                                $sql = "SELECT * FROM san_pham WHERE SP_TEN LIKE '%$search%' AND NSX_MA = '$cateSearch'";
                            }

                            $result = $conn->query($sql);

                            // Hiển thị kết quả sản phẩm
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <li class="gategory-product-list col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="single-product-item">
                                            <div class="product-image">
                                                <a href="single_products.php?id=<?php echo $row["SP_MA"] ?>"><img src="assets/img/product_img/<?php echo $row["SP_HINHANH"]?>" alt="product-image" /></a>
                                                <div class="overlay-content">
                                                    <ul>
                                                        <li><a href="#" title="Quick view"><i class="fa fa-search"></i></a></li>
                                                        <li><a href="add_carts.php?id=<?php echo $row["SP_MA"] ?>" title="Thêm vào giỏ hàng"><i class="fa fa-shopping-cart"></i></a></li>
                                                        <!-- <li><a href="#" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li> -->
                                                        <li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a></li>
                                                        <li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="product-info">
                                              
                                                <a href="single_products.php?id=<?php echo $row["SP_MA"]?>" product-name><?php echo $row["SP_TEN"]?></a>
                                                <div class="price-box">
                                                    <span class="price"><?php echo $row["SP_GIA"] ?> VNĐ</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- SINGLE ITEM END -->
                                    <?php
                                }
                            } else {
                                echo "<li>Không có sản phẩm nào phù hợp</li>";
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <!-- ALL GATEGORY-PRODUCT END -->

        </div> <!-- Đóng div phần hiển thị sản phẩm -->
    </div>

    <!-- Thêm div clearfix để ngăn phần hãng bị kéo lên -->
    <div class="clearfix"></div>

    <!-- Bắt đầu phần hiển thị hãng sau phần sản phẩm -->
    <div class="brand-section">
        <?php 
            include "brand.php";
        ?>
    </div>

    <?php 
        include "company.php";
        include "footer.php";
    ?>

    <!-- JS ================================================ -->
    <script src="js/vendor/jquery-1.11.3.min.js"></script>
    <script src="js/jquery.fancybox.js"></script>
    <script src="js/jquery.bxslider.min.js"></script>
    <script src="js/jquery.meanmenu.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.nivo.slider.js"></script>
    <script src="js/jqueryui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.js"></script>
    <script>new WOW().init();</script>
    <script src="js/main.js"></script>
</body>
</html>