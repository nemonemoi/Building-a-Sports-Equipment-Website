<!doctype html>
<html lang="en">

<?php include "head.php" ?>

<body>
    <?php
		include "header.php";
	?>
    <!-- main -->
    <!-- MAIN-CONTENT-SECTION START -->
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
    <section class="main-content-section">
      <div class="container">
				<!-- HIỂN THỊ TÊN TRANG WEB -->
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- BSTORE-BREADCRUMB START -->
						<div class="bstore-breadcrumb">
							<a href="index.html">Home</a>
							<span><i class="fa fa-caret-right"></i></span>
							<span>Điện thoại</span>
						</div>
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>

      <?php include "slidebar.php" ?>

			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
				<!-- hình đầu trang web -->
						<div class="right-all-product">
							<!-- PRODUCT-CATEGORY-HEADER START -->
							<div class="product-category-header">
								<!-- <div class="category-header-image">
									<img src="assets/img/slides/slide2.png" alt="category-header" />									
								</div> -->
								<?php require 'slider.php' ?>
							</div>
							<!-- PRODUCT-CATEGORY-HEADER END -->

							<!-- ======================================================= -->
							
						<!-- ======================================================================================== -->
						<!-- ALL GATEGORY-PRODUCT START -->
						<div class="all-gategory-product">
							<div class="row">
								<ul class="gategory-product">
									<!-- SINGLE ITEM START -->
										<?php 
											require 'connect.php';
											//lay san pham theo id
											$result = mysqli_query($conn, 'select count(SP_MA) as total from san_pham');
											$row = mysqli_fetch_assoc($result);
											$total_records = $row['total'];
											if($row['total'] === 0)
											{
												$message = "Loại điện thoại rỗng, hãy chọn loại điện thoại khác.";
												echo "<script type='text/javascript'>alert('$message');</script>";
												header('Location: products.php');
											}					   
											$offset =1;
											// BƯỚC 3: TÌM LIMIT VÀ CURRENT_PAGE
											$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
											$limit = 16;
											// BƯỚC 4: TÍNH TOÁN TOTAL_PAGE VÀ START
											// tổng số trang
											$total_page = ceil($total_records / $limit);
											 
											// Giới hạn current_page trong khoảng 1 đến total_page
											if ($current_page > $total_page){
												$current_page = $total_page;
											}
											else if ($current_page < 1){
												$current_page = 1;
											}
											// Tìm Start
											$start = ($current_page - 1) * $limit;
											// BƯỚC 5: TRUY VẤN LẤY DANH SÁCH
											// Có limit và start rồi thì truy vấn CSDL lấy danh Sách
											
											$result = mysqli_query($conn, "SELECT * FROM san_pham LIMIT $start, $limit " );
											// output data of each row
											while ($row = mysqli_fetch_assoc($result)){
													?>
									<li class="gategory-product-list col-lg-3 col-md-5 col-sm-6 col-xs-12" style="height: 330px;" >
										<div class="single-product-item">
											<div class="product-image">
											<a href="single_products.php?id=<?php echo $row["SP_MA"] ?>"><img src="assets/img/product_img/<?php echo $row["SP_HINHANH"]?>" alt="product-image" /></a> 
											<!-- <a href="#" class="new-mark-box">new</a> -->
												<div class="overlay-content">
													<ul>
														<li><a href="#" title="Quick view"><i class="fa fa-search"></i></a></li>
														<li><a href="add_carts.php?id=<?php echo $row["SP_MA"] ?>" title="Thêm vào giỏ hàng"><i class="fa fa-shopping-cart"></i></a></li>
														<li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a></li>
														<li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a></li>
													</ul>
												</div>
											</div>
											<div class="product-info">
												<!-- <div class="customar-comments-box">
													<div class="rating-box">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-half-empty"></i>
													</div>
													<div class="review-box">
														<span>1 Review(s)</span>
													</div>
												</div> -->
												<a href="single_products.php?id=<?php echo $row["SP_MA"]?>" class="product-name"><?php echo $row["SP_TEN"]?></a>
                        <div class="price-box">
                          <span class="price"><?php echo $row["SP_GIA"] ?> VNĐ</span>
                        </div>
											</div>
										</div>						
									</li>
									<!-- SINGLE ITEM END -->
									<?php
												}
											?>	
								</ul>
							</div>
						</div>
						<!-- ALL GATEGORY-PRODUCT END -->

						<!-- Tính số trang và chuyển trang -->
						<!-- PRODUCT-SHOOTING-RESULT START -->
						<div class="product-shooting-result product-shooting-result-border">
							<!-- <form action="#">
								<button class="btn compare-button">
									Compare (<strong class="compare-value">1</strong>)
									<i class="fa fa-chevron-right"></i>
								</button>
							</form>  -->
							 <div class="showing-item">
								<!-- <span>Hiển thị <?php echo $total_page; ?> </span> -->
							</div> 
							<div class="showing-next-prev" style="margin-left:0px;">
								<ul class="pagination-bar" style="float: right; margin-right: 0px;">
								<?php
									// PHẦN HIỂN THỊ PHÂN TRANG
									// BƯỚC 7: HIỂN THỊ PHÂN TRANG
									// nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
									for ($i = 1; $i <= $total_page; $i++){
										if ($i == $current_page){
											?>
											<li class="disabled">
										<!-- <a href="#" ><i class="fa fa-chevron-left"></i></a> -->
									</li>
									<li class="active">
										<span><a class="pagi-num" href="#"><?php echo $i  ?></a></span>
									</li>
									<?php } ?>

									<?php
										if($i != $current_page){
									?>
									<li>
										<span><?php echo '<a class="pagi-num" href="products.php?&page='.$i.'">'.$i.'</a> '; ?></span>
									</li>
									
									<?php
										}
									}
								?>
									
								</ul>
								<form>
									<!-- <button class="btn showall-button">Show all</button> -->
								</form>
							</div>
						</div>		
						<!-- hết tính số trang -->
						<!-- PRODUCT-SHOOTING-RESULT END -->
					</div>
				</div>





      </div>
    </section>
    <!-- MAIN-CONTENT-SECTION END -->


    <?php 
include "brand.php";
?>

<?php include "company.php" ?>

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

    <!-- Google Map js -->
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>
    function initialize() {
        var mapOptions = {
            zoom: 8,
            scrollwheel: false,
			center: new google.maps.LatLng(10.031157, 105.769171)
        };
        var map = new google.maps.Map(document.getElementById('googleMap'),
            mapOptions);
        var marker = new google.maps.Marker({
            position: map.getCenter(),
            map: map
        });

    }
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    <!-- main js -->
    <script src="js/main.js"></script>

</body>

</html>