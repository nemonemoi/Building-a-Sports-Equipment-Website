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
	.shopping-cart-menu {
    display: flex;
    margin-top: -30px;
    padding: 20px 0;
}

.steps {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0;
}

.step {
    padding: 15px 30px;
    font-size: 16px;
    font-weight: bold;
    text-transform: uppercase;
    color: white;
    background-color: #333;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    /* Tạo hình mũi tên */
    clip-path: polygon(0 0, calc(100% - 15px) 0, 100% 50%, calc(100% - 15px) 100%, 0 100%);
}

.step.current {
    background-color: #e60000;
}

.step:not(:last-child) {
    margin-right: -15px; /* Dính hai ô lại */
}

.step span {
    white-space: nowrap;
}

/* Tạo mũi tên nhọn cho bước tiếp theo */
.step::after {
    content: "";
    position: absolute;
    right: -15px;
    top: 0;
    bottom: 0;
    width: 15px;
    background-color: inherit;
    clip-path: polygon(0 0, 100% 50%, 0 100%);
}

</style>
    <section class="main-content-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						
					</div>
				</div>
			
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						
						<h2 class="page-title" style="margin-top: 20px;">Thông tin chi tiết giỏ hàng <span class="shop-pro-item">Số lượng sản phẩm trong giỏ hàng: <?php require "slsp_tronggh.php" ?> sản phẩm</span></h2>
						
					</div>	
					
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- SHOPING-CART-MENU START -->
						<div class="shopping-cart-menu">
    						<ul class="steps">
        						<li class="step current">
            						<span>Chi tiết giỏ hàng</span>
        						</li>
        						<li class="step">
            						<span>Xác nhận đơn hàng</span>
        						</li>
    						</ul>
						</div>


<!-- tu day ne -->	<div class="table-responsive">
							<table class="table table-bordered" id="cart-summary">
								<thead>
									<tr>
										<th class="cart-product">Sản phẩm</th>
										<th class="cart-description">Mô tả</th>
										<th class="cart-avail text-center">Trạng thái</th>
										<th class="cart-unit text-right">Giá</th>
										<th class="cart_quantity text-center">Số lượng</th>
										<th class="cart-delete">&nbsp;</th>
										<th class="cart-total text-right">Thành tiền</th>
									</tr>
								</thead>
					<?php
						
							$khid = $_SESSION["khid"];
							$sl = 0;
							$total = 0;
							$sql = "select gh.GH_MA, gh.KH_MA, ct.CTGH_SOLUONG, ct.SP_MA
									from gio_hang gh
									join chitiet_gh ct on ct.GH_MA = gh.GH_MA
									where gh.KH_MA = {$khid}";
							$rs = $conn->query($sql);
							foreach($rs as $sp){
								$sl += 1;
								$spid = $sp["SP_MA"];
								$query = "select * 
											from san_pham sp 
											join loai_sp lsp on sp.LSP_MA = lsp.LSP_MA 
											where sp.SP_MA = {$spid}";

								$result = $conn->query($query);
								foreach($result as $s){
									?>
							
								<tbody>	
									<tr>
										<td class="cart-product">
											<a href="single_products.php?id=<?php echo $s["SP_MA"] ?>"><img alt="Blouse" src="assets/img/product_img/<?php echo $s["SP_HINHANH"]; ?>"></a>
										</td>
										<td class="cart-description">
											<p class="product-name"><a href="single_products.php?id=<?php echo $s["SP_MA"] ?>"><?php  echo $s["SP_TEN"]?></a></p>
											<small><a href="category.php?maloaisp=<?php echo $s["LSP_MA"]; ?>">Loại sản phẩm: <?php echo $s["LSP_TEN"]; ?></a> </small>
											<small><a href="#">Màu: <?php echo $s["SP_MAUSAC"]; ?></a></small>
										</td>
										<td class="cart-avail"><span class="label label-success">Còn hàng</span></td>
										<td class="cart-unit">
											<ul class="price text-right">
												<li class="price"><?php echo number_format($s["SP_GIA"]); ?>đ</li>
											</ul>
										</td>

										<td class="cart_quantity text-center">
    									<form action="update_cart.php" method="post">
        									<input type="number" class="cart-plus-minus" name="qty" min="1" max="99" value="<?php echo $sp['CTGH_SOLUONG']; ?>">
        									<input type="hidden" name="idsprm" value="<?php echo $s['SP_MA']; ?>" />
        									<input type="submit" name="update" style="margin-top: 15px;" value="Cập nhật" class="btn btn-default" />
    									</form>
									</td>
									<td class="cart-delete text-center">
    									<form action="remove_cart2.php" method="post">
        									<input type="hidden" name="idsprm" value="<?php echo $s['SP_MA']; ?>" />
        									<input type="submit" name="remove" value="Xóa" class="btn btn-default pull-right" style="color: #000 !important;" />
    									</form>
									</td>


									</tr>
								</tbody>
							
							<?php
								}
							}
						
					?>
					<?php
							
							$khid = $_SESSION["khid"];
							$sl = 0;
							$total = 0;
							$sql = "select sum(ct.CTGH_SOLUONG*sp.SP_GIA) as tongtien
											from gio_hang gh
											join chitiet_gh ct on ct.GH_MA=gh.GH_MA
											join khach_hang kh on kh.KH_MA=gh.KH_MA
											join san_pham sp on sp.SP_MA=ct.SP_MA 
											where kh.KH_MA= {$khid}";
							$rs = $conn->query($sql);
							$tongtien = $rs->fetch_assoc()["tongtien"];
					?>
								<tfoot>										
									<tr class="cart-total-price">
										<td class="cart_voucher" colspan="3" rowspan="4"></td>
										<td class="text-right" colspan="3">TỔNG TIỀN</td>
										<td id="total_product" class="price" colspan="1"><?php echo number_format($tongtien); ?> đ</td>
									</tr>
									
								</tfoot>
		
							</table>
						</div>
						<!-- toi day ne -->
					</div>
					
							<?php
								$khid = $_SESSION["khid"];
								$sql_kh = "select * from khach_hang where KH_MA = {$khid}";
								$rs_kh = $conn->query($sql_kh);
								$row_kh = $rs_kh->fetch_assoc();
							?>
							<ul class="address">
								<li>
									<!-- <h3 class="page-subheading box-subheading">
										Thông tin khách hàng
									</h3> -->
								</li>
								<!-- <li><span class="text-secondary text-red">Họ và Tên: </span><span class="address_name"><?php echo $row_kh["KH_TEN"]; ?></span></li>
								<li><span class="address_company">Web development Company</span></li>
								<li><span class="address_address1">Dhaka</span></li>
								<li><span class="address_address2">Bonossri</span></li>
								<li><span class="">Dhaka-1205</span></li>
								<li><span class="">Rampura</span></li>
								<li><span class="address_phone">+880 1735161598</span></li>
								<li><span class="address_phone_mobile">+880 1975161598</span></li> -->
							</ul>	
							
						</div>
					</div> 
					
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<!-- RETURNE-CONTINUE-SHOP START -->
						<div class="returne-continue-shop">
							<a href="index.php" class="continueshoping"><i class="fa fa-chevron-left"></i>Tiếp tục mua hàng</a>
							<a href="checkouts-buoc3.php" class="procedtocheckout">Xác nhận đơn hàng<i class="fa fa-chevron-right"></i></a>
						</div>	
						<!-- RETURNE-CONTINUE-SHOP END -->						
					</div>
					
					
				</div>


<?php require 'featured_products.php' ?>
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
    <script>
    	document.querySelectorAll('.cart-plus-minus-button button').forEach(function(button) {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        let input = this.parentElement.querySelector('.cart-plus-minus');
        let value = parseInt(input.value) || 1;

        // Xử lý tăng hoặc giảm số lượng
        if (this.classList.contains('plus')) {
            input.value = value + 1;
        } else if (this.classList.contains('minus') && value > 1) {
            input.value = value - 1;
        }
    });
});

    </script>

    <!-- wow js -->
    <script src="js/wow.js"></script>
    <script>
    new WOW().init();
    </script>
    
   
    <!-- main js -->
    <script src="js/main.js"></script>

</body>

</html>