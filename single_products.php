<!doctype html>
<html lang="en">

<?php include "head.php" ?>

<body>
    <?php
		include "header.php";
	?>
    <!-- main -->
    <!-- MAIN-CONTENT-SECTION START -->
		<section class="main-content-section">
			<div class="container">
				<?php
					require 'connect.php';
					$idsp = $_GET["id"];
					$stmt = $conn->prepare("SELECT * FROM san_pham sp
                        JOIN loai_sp lsp ON lsp.LSP_MA = sp.LSP_MA
                        WHERE sp.SP_MA = ?");
					$stmt->bind_param("i", $idsp);
					$stmt->execute();
					$result = $stmt->get_result();
					$row = $result->fetch_assoc();


					// $idsp = $_GET["id"];
					// $sql = "SELECT * FROM san_pham sp
					// 		join loai_sp lsp on lsp.LSP_MA=sp.LSP_MA
					// 		where sp.SP_MA=".$idsp;
					// $result=$conn->query($sql);
					// $row=$result->fetch_assoc();
					// $maloaisp = $row["LSP_MA"];
				?>
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- -BREADCRUMB START -->
						 <div class="bstore-breadcrumb">
							
						</div> 
						<!-- BSTORE-BREADCRUMB END -->
					</div>
				</div>				
				<div class="row">
					<div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
						<!-- SINGLE-PRODUCT-DESCRIPTION START -->
						<div class="row">
							<div class="col-lg-5 col-md-5 col-sm-4 col-xs-12">
								<div class="single-product-view">
									  <!-- Tab panes -->
									<div class="tab-content">
										<div class="tab-pane active" id="thumbnail_1">
											<div class="single-product-image">
												<img src="assets/img/product_img/<?php echo $row["SP_HINHANH"] ?>" alt="single-product-image" />
												<a class="new-mark-box" href="#">new</a>
												<a class="fancybox" href="assets/img/product_img/<?php echo $row["SP_HINHANH"] ?>" data-fancybox-group="gallery"><span class="btn large-btn text-dark">Phóng to <i class="fa fa-search-plus"></i></span></a>
											</div>	
										</div>
										<!-- Hiển thị nhiều ảnh -->
										<!-- <div class="tab-pane" id="thumbnail_2">
											<div class="single-product-image">
												<img src="img/product/sale/3.jpg" alt="single-product-image" />
												<a class="new-mark-box" href="#">new</a>
												<a class="fancybox" href="img/product/sale/3.jpg" data-fancybox-group="gallery"><span class="btn large-btn">View larger <i class="fa fa-search-plus"></i></span></a>
											</div>	
										</div> -->
									</div>										
								</div>
							</div>
							<div class="col-lg-7 col-md-7 col-sm-8 col-xs-12">
								<div class="single-product-descirption">
									<h2><?php echo $row["SP_TEN"]; ?></h2>
									<!-- //<div class="single-product-social-share">
										<ul>
											<li><a href="#" class="twi-link"><i class="fa fa-twitter"></i>Tweet</a></li>
											<li><a href="#" class="fb-link"><i class="fa fa-facebook"></i>Share</a></li>
											<li><a href="#" class="g-plus-link"><i class="fa fa-google-plus"></i>Google+</a></li>
											<li><a href="#" class="pin-link"><i class="fa fa-pinterest"></i>Pinterest</a></li>
										</ul>
									</div>
									<div class="single-product-review-box">
										<div class="rating-box">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-half-empty"></i>
										</div>
										<div class="read-reviews">
											<a href="#">Read reviews (1)</a>
										</div>
										<div class="write-review">
											<a href="#">Write a review</a>
										</div>		
									</div> -->
									<div class="single-product-condition">
										<p>Phân loại: <span class="text-uppercase"></span><?php echo $row["LSP_TEN"]; ?></span></p>
										<p>Tình trạng: <span>Mới</span></p>
										
										<div class="product-in-stock">
										<p>Còn lại: <span><?php echo $row["SP_SOLUONGTON"]; ?></span></p>
										</div>
									</div>
								<form name="form3" id="ff3" method="post" action="add_cart.php">
									<div class="single-product-price">
										<h2><?php echo number_format($row["SP_GIA"]); ?> VND</h2>
									</div>
									<div class="single-product-quantity">
										<p class="small-title">Số lượng</p> 
										<div class="cart-quantity">
											<!-- <div class="cart-plus-minus-button single-qty-btn"> -->
												<input class="cart-plus-minus sing-pro-qty" min=1 max=99 type="number" id="slsp" name="slsp" value="1" style="margin-left: -50px;">
											<!-- </div> -->
										</div>
									</div>
									<div class="single-product-add-cart">
										<!-- <a class="add-cart-text" title="Add to cart" href="#">Thêm vào giỏ hàng</a> -->
										<input type="submit" name="submit" id="add-to-cart" class="btn btn-2" value="Thêm vào giỏ hàng" / style="background-color: #55c65e; color:white;">
										<!-- <a href="#" style="margin-top: -1px; background-color: #55c65e" class="btn btn-info mt-n2" data-toggle="modal" data-target="#myModal">Mua ngay</a> -->
										<input type="hidden" name="acction" value="them vao gio hang" />
										<input type="hidden" name="idsp" value="<?php echo $row["SP_MA"] ?>" />
										
									</div>
								</form>
								</div>
							</div>
						</div>
						<!-- SINGLE-PRODUCT-DESCRIPTION END -->
						

						<!-- SINGLE-PRODUCT INFO TAB START -->
						<div class="row">
							<div class="col-sm-12">
								<div class="product-more-info-tab">
									<!-- Nav tabs -->
									<ul class="nav nav-tabs more-info-tab" >
										<li class="active"><a href="#moreinfo" data-toggle="tab" >Mô tả</a></li>
										<li><a href="#datasheet" data-toggle="tab" >Thông tin sản phẩm</a></li>
										<!-- <li><a href="#review" data-toggle="tab" >Đánh giá</a></li> -->
									</ul>
									  <!-- Tab panes -->
									<div class="tab-content">
										<div class="tab-pane active" id="moreinfo">
											
											<div class="tab-description">
												<div innerHTML><p><?php echo $row["SP_MOTA"]; ?></p></div>
											</div>
										</div>
										
										<div class="tab-pane" id="datasheet">
											<div class="deta-sheet">
												<table class="table-data-sheet">			
													<tbody>
														<tr class="odd">
															<td>Chất liệu:</td>
															<td><?php echo $row["SP_CHATLIEU"]; ?></td>
														</tr>
														<tr class="even">
															<td class="td-bg">Kích Thước:</td>
															<td class="td-bg"><?php echo $row["SP_KICHTHUOC"]; ?></td>
														</tr>
														<tr class="odd">
															<td>Màu sắc:</td>
															<td><?php echo $row["SP_MAUSAC"]; ?></td>
														</tr>
														<tr class="even">
															<td class="td-bg">Thời gian bảo hành:</td>
															<td class="td-bg"><?php echo $row["SP_TGBH"]; ?></td>
														</tr>
														
														
													</tbody>
												</table>				
											</div>
										</div>
										<div class="tab-pane" id="review">
											<div class="row tab-review-row">
												<div class="col-xs-5 col-sm-4 col-md-4 col-lg-3 padding-5">
													<div class="tab-rating-box">
														<span>Đỗ Văn Đoàn</span>
														<div class="rating-box">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-half-empty"></i>
														</div>	
														<div class="review-author-info">
															<strong>Ngày đánh giá</strong>
															<span>10/10/2002</span>
														</div>															
													</div>
												</div>
												<div class="col-xs-7 col-sm-8 col-md-8 col-lg-9 padding-5">
													<div class="write-your-review">
														<p><strong>Nội dung</strong></p>
														<p>write A REVIEW</p>
														<span class="usefull-comment">Was this comment useful to you? <span>Yes</span><span>No</span></span>
														<a href="#">Report abuse </a>
													</div>
												</div>
												<a href="#" class="write-review-btn">Write your review!</a>
											</div>
										</div>
									</div>									
								</div>
							</div>
						</div>
						<!-- SINGLE-PRODUCT INFO TAB END -->
						
						<!-- SẢN PHẨM TƯƠNG TỰ -->
						<?php require 'related_products.php' ?>

					</div>
					<!-- RIGHT SIDE BAR START -->
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<!-- SINGLE SIDE BAR START -->
						<div class="single-product-right-sidebar">
							<h2 class="left-title">Có thể bạn sẽ thích?</h2>
							<ul>
								<?php
								$sql = "select * from san_pham ORDER BY RAND() LIMIT 4";
								$result = $conn->query($sql);
								if($result->num_rows>0){
								while($row = $result->fetch_assoc()){
								?>
								
								<li>
									<a href="single_products.php?id=<?php echo $row["SP_MA"]; ?>"><img src="assets/img/product_img/<?php echo $row["SP_HINHANH"]; ?>" alt="" style="width:45%" /></a>
									<div class="product-info">
										<h3><a href="single_products.php?id=<?php echo $row["SP_MA"]; ?>"><?php echo $row["SP_TEN"]; ?></a></h3>
										</br>
										<!-- <p style="color:blue"></p><?php echo number_format($row["SP_GIA"]);?> VND</p> -->
									</div>
								</li>
								<?php }}?>
							</ul>
						</div>	
						<!-- SINGLE SIDE BAR END -->
						<!-- SINGLE SIDE BAR START -->
						<div class="single-product-right-sidebar clearfix">
							<h2 class="left-title">Tags </h2>
							<div class="category-tag">
								<a href="#">Bóng rổ</a>
								<a href="#">Bóng chuyền</a>
								<a href="#">Vợt</a>
								<a href="#">Bóng tennis</a>
								<a href="#">Băng gối</a>
								<a href="#">Giá rẻ</a>
							</div>							
						</div>	
						<!-- SINGLE SIDE BAR END -->
						<!-- SINGLE SIDE BAR START -->						
						<!-- <div class="single-product-right-sidebar">
							<div class="slider-right zoom-img">
								<a href="#"><img class="img-responsive" src="img/product/cms11.jpg" alt="sidebar left" /></a>
							</div>							
						</div> -->
					</div>
					<!-- SINGLE SIDE BAR END -->				
				</div>
			</div>
		</section>
		<!-- MAIN-CONTENT-SECTION END -->
		<!-- Mua ngay -->
						<div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog">
							<!-- Modal content-->
								<div class="modal-content" style="padding: 3rem;">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal">&times;</button>
										<h1 class="modal-title" style="text-align: center; color: red; font-weight: bold;">THÔNG TIN KHÁCH HÀNG</h1>
									</div>
									<div class="modal-body">
										<p>Chức năng mua ngay mà không cần đăng nhập tài khoản.</p>
										<form name="form8" id="ff8" method="POST" action="luumuangay.php">
											<div class="form-group">
												<input type="text" class="form-control" placeholder="Họ và tên:" name="name" id="name" required>
											</div>
											<div class="form-group">
												<input type="email" class="form-control" placeholder="Địa chỉ email:" name="email" id="email" required>
											</div>
											<div class="form-group">
												<input type="tel" class="form-control" placeholder="Điện thoại:" name="phone" id="phone" required>
											</div>
											<div class="form-group">
												<input type="text" class="form-control" placeholder="Địa chỉ nhận hàng:" name="txtdiachi" id="txtdiachi" required>
											</div>
											<div class="form-group">
												<input type="number" class="form-control" placeholder="Số lượng:" name="txtsoluong" id="txtsoluong" required>
											</div>
											<div class="form-group">
											<!-- <label><input type="date" class="form-control" placeholder="Ngày giao:" name="date" id="datechoose"  required ></label> -->
											</div>
											<div class="form-group">
												<label> Hình thức thanh toán:
													<select class="form-control" name="hinhthuctt">
														<?php
														$sql="SELECT * from phuong_thuc_thanh_toan ";
														$result = $conn->query($sql); 
														if ($result->num_rows > 0) {
															while($row_pt = $result->fetch_assoc()) {
													?>
														<option value="<?php echo $row_pt["PTTT_MA"] ?>"><?php echo $row_pt["PTTT_TEN"] ?></option>
														<?php
															}
														}
													?>
													</select>
												</lable>
											</div>

											<?php
												$idsp = $_GET["id"];
												$sql = "SELECT * FROM san_pham sp
														join loai_sp lsp on lsp.LSP_MA=sp.LSP_MA
														where sp.SP_MA=".$idsp;
												$result=$conn->query($sql);
												$row=$result->fetch_assoc();
												$maloaisp = $row["LSP_MA"];
											?>
				
											<input type="hidden" name="idsp" value="<?php echo $row["SP_MA"] ?>" />
											<input type="hidden" name="gia" value="<?php echo $row["SP_GIA"] ?>" />
											<button type="submit" name="muangay"  class="btn btn-1" style="background-color: #55c65e;">Đặt hàng</button>
										</form>
        							</div>
        							<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
      							</div>
    						</div>
						</div>
						<!-- Mua ngay -->

		

    <?php 
include "brand.php";
?>

<?php include "company.php" ?>

    <?php 
include "footer.php";
?>

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">         
          <div class="modal-body">                
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
	

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