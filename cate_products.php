<!-- Products theo loại -->
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
	<div class="col-xs-12">
		<!-- TAB-BG-PRODUCT-AREA START -->
		<div class="tab-bg-product-area">
			<!-- TAB PANES START -->
			<div class="tab-content bg-tab-content">

<!-- //////////////////////////////////////////////////////////////////// -->
				<!-- TABS ONE START-->
				<div role="tabpanel" class="tab-pane active" id="women-tab">
					<div class="bg-tab-content-area tab-carousel-1">
						<!-- TAB-SINGLE-ITEM START -->
						<?php
							require 'connect.php';
							$sql = "select *
												from san_pham sp 
												join loai_sp lsp on sp.LSP_MA=lsp.LSP_MA
												where lsp.LSP_MA=1";
													
							$result = $conn->query($sql);
							if($result->num_rows>0){
							while($row = $result->fetch_assoc()){						
							?>						
						<div class="item">
							<div class="single-product-item">
								<div class="product-image">
								<a href="single_products.php?id=<?php echo $row["SP_MA"] ?>"><img src="assets/img/product_img/<?php echo $row["SP_HINHANH"]?>" alt="product-image" /></a>
									<!-- <a href="#" class="new-mark-box">new</a> -->
									<div class="overlay-content">
										<ul>
											<li><a href="#" title="Quick view"><i class="fa fa-search"></i></a></li>
											<li><a href="add_carts.php" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
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
						</div>
						<?php
							}
						}
						?>
						<!-- TAB-SINGLE-ITEM END -->
					</div>
				</div>
				<!-- TABS ONE END-->


<!-- //////////////////////////////////////////////////////////////////// -->
				<!-- Loại 2 -->
				<!-- TABS TWO START-->
				<div role="tabpanel" class="tab-pane" id="tops-tab">
					<div class="bg-tab-content-area tab-carousel-2">
						<!-- TAB-SINGLE-ITEM START -->
						<?php
							require 'connect.php';
							$sql = "select *
												from san_pham sp 
												join loai_sp lsp on sp.LSP_MA=lsp.LSP_MA
												where lsp.LSP_MA=2";
													
							$result = $conn->query($sql);
							if($result->num_rows>0){
							while($row = $result->fetch_assoc()){						
							?>				
						<div class="item">
							<div class="single-product-item">
								<div class="product-image">
								<a href="single_products.php?id=<?php echo $row["SP_MA"] ?>"><img src="assets/img/product_img/<?php echo $row["SP_HINHANH"]?>" alt="product-image" /></a>
									<!-- <a href="#" class="new-mark-box">sale!</a> -->
									<div class="overlay-content">
										<ul>
											<li><a href="#" title="Quick view"><i class="fa fa-search"></i></a>
											</li>
											<li><a href="#" title="Quick view"><i class="fa fa-shopping-cart"></i></a></li>
											<li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a>
											</li>
											<li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a>
											</li>
										</ul>
									</div>
								</div>
								<div class="product-info">
									<!-- <div class="customar-comments-box">
										<div class="rating-box">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-half-empty"></i>
											<i class="fa fa-star-half-empty"></i>
										</div>
										<div class="review-box">
											<span>1 Review(s)</span>
										</div>
									</div> -->
									<a href="single_products.php?id=<?php echo $row["SP_MA"]?>"><?php echo $row["SP_TEN"]?></a>
                  <div class="price-box">
                    <span class="price"><?php echo $row["SP_GIA"] ?> VNĐ</span>
                  </div>  
								</div>
							</div>
						</div>
						<?php
							}
						}
						?>
						<!-- TAB-SINGLE-ITEM END -->
					</div>
				</div>
				<!-- TABS TWO END-->



<!-- //////////////////////////////////////////////////////////////////// -->
				<!-- Loại 3 -->
				<!-- TABS THREE START-->
				<div role="tabpanel" class="tab-pane" id="t-shirts">
					<div class="bg-tab-content-area tab-carousel-3">
						<!-- TAB-SINGLE-ITEM START -->
						<?php
							require 'connect.php';
							$sql = "select *
												from san_pham sp 
												join loai_sp lsp on sp.LSP_MA=lsp.LSP_MA
												where lsp.LSP_MA=3";
													
							$result = $conn->query($sql);
							if($result->num_rows>0){
							while($row = $result->fetch_assoc()){						
							?>	
						<div class="item">
							<div class="single-product-item">
								<div class="product-image">
									<a href="single_products.php?id=<?php echo $row["SP_MA"] ?>"><img src="assets/img/product_img/<?php echo $row["SP_HINHANH"]?>" alt="product-image" /></a>
									<!-- <a href="#" class="new-mark-box">new</a> -->
									<div class="overlay-content">
										<ul>
											<li><a href="#" title="Quick view"><i class="fa fa-search"></i></a>
											</li>
											<li><a href="add_carts.php?id=<?php echo $row["SP_MA"] ?>" title="Thêm vào giỏ hàng"><i class="fa fa-shopping-cart"></i></a></li>

											<li><a href="#" title="Quick view"><i class="fa fa-retweet"></i></a>
											</li>
											<li><a href="#" title="Quick view"><i class="fa fa-heart-o"></i></a>
											</li>
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
									<a href="single_products.php?id=<?php echo $row["SP_MA"]?>"><?php echo $row["SP_TEN"]?></a>
                  <div class="price-box">
                    <span class="price"><?php echo $row["SP_GIA"] ?> VNĐ</span>
                  </div> 
								</div>
							</div>
						</div>
						<!-- TAB-SINGLE-ITEM END -->
						<?php
							}
						}
						?>
					</div>
				</div>
				<!-- TABS THREE END-->
			</div>
			<!-- TAB PANES END -->

<!-- ****************** TAB TAG DATA ******************** -->
			<!-- TABS MENU START-->
			<div class="tab-carousel-menu">
				<ul class="nav nav-tabs product-bg-nav">
					<li class="active"><a href="#women-tab" data-toggle="tab">Bóng</a></li>
					<li><a href="#tops-tab" data-toggle="tab">Phụ kiện</a></li>
					<li><a href="#t-shirts" data-toggle="tab">Dụng cụ</a></li>
				</ul>
			</div>
			<!-- TABS MENU END-->
		</div>
		<!-- TAB-BG-PRODUCT-AREA END -->
	</div>
</div>