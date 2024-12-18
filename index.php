

<!doctype html>
<html lang="en">
<style>
         .video-container {
            display: flex; /* Sử dụng Flexbox để xếp các video cạnh nhau */
            justify-content: center; /* Canh giữa các video theo chiều ngang */
            align-items: center; /* Canh giữa các video theo chiều dọc */
            gap: 40px; /* Khoảng cách giữa các video */
            padding: 20px; /* Khoảng cách từ các video đến viền của container */
            background-color: transparent; /* Màu nền của khu vực chứa video */
        }

        /* Thiết lập kích thước video */
        .video-banner {
            width: 100%; /* Cho video chiếm toàn bộ chiều rộng của phần tử cha */
            max-width: 550px; /* Giới hạn chiều rộng tối đa của mỗi video */
            height: auto; /* Để video tự điều chỉnh chiều cao */
       }
       

    </style>            

<?php include "head.php" ?>
<link rel="icon" href="../img/icon.png" type="image/x-icon/">
<body>
    <?php
		include "header.php";
	?>

    
    
    <!-- Thêm video vào đầu trang và bao quanh bằng thẻ div có class video-container -->
    <div class="video-container">
        <!-- Video đầu tiên -->
        <video class="video-banner" controls loop autoplay muted>
            <source src="video/first.mp4" type="video/mp4">
            Trình duyệt của bạn không hỗ trợ thẻ video.
        </video>

        <!-- Video thứ hai -->
        <video class="video-banner" controls loop autoplay muted>
            <source src="video/mit.mp4" type="video/mp4">
            Trình duyệt của bạn không hỗ trợ thẻ video.
        </video>
    </div>
    <!-- main -->
    <!-- MAIN-CONTENT-SECTION START -->
    <section style="margin-top: -10px;" class="main-content-section">
        <div class="container">
            <!-- MAIN-SLIDER-AREA START -->
            <?php include "slider.php"; ?>
            <!-- MAIN-SLIDER-AREA END -->

            <!-- TOW-COLUMN-PRODUCT START -->
            <div class="row tow-column-product">
                <?php include "new_products.php" ?>

                <?php include "sale_products.php" ?>
            </div>

            <!-- TOW-COLUMN-PRODUCT END -->
            <div class="row">
                <!-- ADD-TWO-BY-ONE-COLUMN START -->
                <div class="add-two-by-one-column">
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="tow-column-add zoom-img">  <!-- banner 2-->
                            <a href="#"><img src="assets/img/slides/slidee7.jpg" alt="shope-add" /></a> <!-- banner 2-->
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="one-column-add zoom-img">
                            <a href="#"><img src="assets/img/slides/ban1.jpg" alt="shope-add" /></a>
                        </div>
												
                    </div>
                </div>
                <!-- ADD-TWO-BY-ONE-COLUMN END -->
            </div>

						<!-- sản phẩm nổi bật -->
						<?php include "featured_products.php" ?>

						<!-- Products theo loại co bg moi them-->
						<?php include "cate_products.php" ?> 


					<?php include "selling_products.php" ?>

					<!-- Images shop now -->
            <div class="row">
                <!-- IMAGE-ADD-AREA START -->
                <div class="image-add-area">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <!-- ONEHALF-ADD START -->
                        <div class="onehalf-add-shope zoom-img">
                            <a href="#"><img src="assets/img/slides/shop_now0.jpg" alt="shope-add" /></a>
                        </div>
                        <!-- ONEHALF-ADD END -->
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <!-- ONEHALF-ADD START -->
                        <div class="onehalf-add-shope zoom-img">
                            <a href="#"><img src="assets/img/slides/shop_now1.jpg" alt="shope-add" /></a>
                        </div>
                        <!-- ONEHALF-ADD END -->
                    </div>
                </div>
                <!-- IMAGE-ADD-AREA END -->
            </div>
        </div>
    </section>
    <!-- MAIN-CONTENT-SECTION END -->

   

    <?php 
require 'tintuc.php';
?>

    <?php 
include "brand.php";
?>

    <?php 
include "footer.php";
?>

    <!-- JS 
		===============================================-->
    <!-- jquery js -->
    <script src="js/vendor/jquery-1.11.3.min.js"></script>

    <!-- fancybox js -->
    <script src="js/jquery.fancybox.js"></script>

    <!-- bxslider js -->
    <script src="js/jquery.bxslider.min.js"></script>

    <!-- meanmenu js -->
    <script src="js/jquery.meanmenu.js"></script>

    <!-- owl carousel js -->
    <script src="js/owl.carousel.min.js"></script>

    <!-- nivo slider js -->
    <script src="js/jquery.nivo.slider.js"></script>

    <!-- jqueryui js -->
    <script src="js/jqueryui.js"></script>

    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>

    <!-- wow js -->
    <script src="js/wow.js"></script>
    <script>
    new WOW().init();
    </script>


    <!-- main js -->
    <script src="js/main.js"></script>

</body>

</html>