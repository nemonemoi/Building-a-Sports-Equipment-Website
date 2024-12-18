<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>


		 
		  <style>
		  	 body {
            background-image: url('img/bg-bright1.jpg'); 
            background-size: cover; /* Ảnh sẽ bao phủ toàn bộ màn hình */
            background-repeat: no-repeat; /* Không lặp lại ảnh nền */
            background-attachment: fixed; /* Giữ ảnh nền cố định khi cuộn trang */
            background-position: center; /* Canh giữa ảnh nền */
            color: black;
    		transition: background-color 0.3s, color 0.3s; /* Hiệu ứng chuyển đổi mượt */
        }
        body.dark-mode {
    background-image: url('img/bg-dark1.jpg');
    color: white;
}

		body.dark-mode h1,
		body.dark-mode h2,
		body.dark-mode p,
		body.dark-mode a,
		body.dark-mode h3,
		body.dark-mode li,
		body.dark-mode span {
    	color: white;
}
body.dark-mode .latest-news-area .center-title-area h2.center-title a {
    color: white !important;
}


button {
    padding: 2px 2px;
    margin: 0px;
    cursor: pointer;
}

/* Phong cách mặc định cho bảng (chế độ sáng) */
.table-data-sheet {
    width: 100%;
    border-collapse: collapse;
    background-color: white; /* Nền trắng cho chế độ sáng */
    color: black; /* Chữ đen cho chế độ sáng */
}

/* Phong cách cho các hàng và ô trong bảng */
.table-data-sheet tr {
    border-bottom: 1px solid #ddd; /* Đường viền dưới mỗi hàng */
}

.table-data-sheet td {
    padding: 10px;
    color: inherit; /* Kế thừa màu chữ từ phần tử cha */
}

/* Chế độ tối */
body.dark-mode .table-data-sheet {
    background-color: black; /* Nền đen cho chế độ tối */
    color: white; /* Chữ trắng cho chế độ tối */
}

/* Đảm bảo màu chữ trong bảng vẫn là trắng khi ở chế độ tối */
body.dark-mode .table-data-sheet tr td {
    color: white; /* Chữ trắng cho chế độ tối */
}
/* Thay đổi màu nền khi hover vào các liên kết trong dropdown */
.dropdown-mega-menu a:hover {
    background-color: #CC0000 !important; /* Đặt màu nền khi hover */
    
}
body.dark-mode .owl-controls {
    background-color: transparent !important; /* Nền trong suốt */
    color: white !important; /* Màu chữ và biểu tượng trắng nếu cần */
}

body.dark-mode .owl-buttons {
    background-color: transparent !important; /* Nền trong suốt cho các nút */
    color: white !important; /* Đổi màu biểu tượng thành màu trắng */
}
body.dark-mode .owl-controls .owl-buttons i {
    color: white !important; /* Đổi màu biểu tượng thành trắng */
}

body.dark-mode .owl-controls .owl-buttons:before {
    color: white !important; /* Nếu biểu tượng được tạo bằng pseudo-element như :before */
}


/* Ẩn menu theo mặc định */
.dropdown-mega-menu {
    display: none; /* Ẩn dropdown */
    position: absolute;
    background-color: #444444;
    z-index: 1000;
    width: 194px;
}

/* Hiển thị menu khi người dùng hover vào mục 'Danh mục sản phẩm' */
.mega-menu li:hover .dropdown-mega-menu {
    display: block; /* Hiển thị dropdown khi hover */
}

/* Đảm bảo các link trong dropdown có màu chữ phù hợp */
.dropdown-mega-menu a {
    color: black; /* Chữ đen */
    text-decoration: none;
}




/* CSS cho menu thả xuống */
.header-right-menu .dropdown {
    position: relative;
}

.header-right-menu .dropdown-menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background-color: white;
    list-style: none;
    padding: 0;
    margin: 0;
    border: 1px solid #ccc;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.header-right-menu .dropdown:hover .dropdown-menu {
    display: block;
}

.header-right-menu .dropdown-menu li {
    padding: 8px 16px;
}

.header-right-menu .dropdown-menu li a {
    color: black;
    text-decoration: none;
}

.header-right-menu .dropdown-menu li a:hover {
    background-color: #f1f1f1;
}

		  </style>
<!-- HEADER-TOP START -->
<div class="header-top">
			<div class="container">
				<div class="row">
					<!-- HEADER-LEFT-MENU START -->
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="header-left-menu">
							
							
							 <button id="toggleButton" style="width: 140px; height: 30px; background-color: darkred; color: white; border-radius: 20px; border: none; text-align: center;"><strong>Chế độ: Sáng🌞/Tối🌜<strong></button>
							 <script src="js/script.js"></script>
						</div>
					</div>
					<!-- HEADER-LEFT-MENU END -->

					<!-- HEADER-RIGHT-MENU START -->
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<!-- <div class="header-right-menu">
							<nav>
								<ul class="list-inline">
									<li><a href="checkout.php">Check Out</a></li>
									<li><a href="wishlist.php">Wishlist</a></li>
									<li><a href="my-account.php">My Account</a></li>
									<li><a href="cart.php">My Cart</a></li>
									<li><a href="registration.php">Sign in</a></li>
									
								</ul>									
							</nav>
						</div> -->
					</div>
					<!-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
						<div class="header-right-menu">
					<nav>
					<ul class="list-inline">
							<?php
							 // require "login.php";
							 
							      if(!isset($_SESSION["id"])) // If session is not set then redirect to Login Page
							       {
							           printf(' <li><a href="registration.php"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a></li>');
							       }
							       else{
							       	echo '<li>  Xin chào ' ; echo '<span style="color:Tomato;"><a href="profilekh.php"><b>' . $_SESSION['name'] . '</b></a></span></li>' ;
									echo '<li><span class="glyphicon glyphicon-log-out"></span><a href="logout.php"> Đăng xuất!</a></li>';
							       }

							?>
							
							</ul>
							</nav>
							</div>
					</div> -->
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
    <div class="header-right-menu">
        <nav>
            <ul class="list-inline">
                <?php
                if (!isset($_SESSION["id"])) {
                    echo '<li><a href="registration.php"><span class="glyphicon glyphicon-log-in"></span> Đăng nhập</a></li>';
                } else {
                    echo '<li class="dropdown">Xin chào ';
                    echo '<span style="color:Tomato;"><a href="profilekh.php"><b>' . $_SESSION['name'] . '</b></a></span>';
                    echo '<ul class="dropdown-menu">';
                    echo '<li><a href="profilekh.php">Trang cá nhân</a></li>';
                    echo '<li><a href="don_hang.php">Xem đơn hàng</a></li>';
                    echo '</ul>';
                    echo '</li>';
                    echo '<li><span class="glyphicon glyphicon-log-out"></span><a href="logout.php"> Đăng xuất!</a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>
</div>

					<!-- HEADER-RIGHT-MENU END -->
				</div>
			</div>
		</div>
		<!-- HEADER-TOP END -->
		
    <!-- HEADER-MIDDLE START -->

		<section class="header-middle">
			<div class="container " style="background-color: darkred; width: 1500px;">
				<div class="row">
					<div class="col-sm-12">
						<!-- LOGO START -->
						<div class="logo" style="margin-left: 90px;">
							<a href="index.php"><img src="img/logo.png" alt="sportstore logo" /></a>
						</div>
						<!-- LOGO END -->
						<!-- HEADER-RIGHT-CALLUS START -->
						<div class="header-right-callus" style="margin-right: 190px;">
							<h3>Liên hệ</h3>
							<span>078-964-3614</span>
						</div>
						<!-- HEADER-RIGHT-CALLUS END -->
						<!-- CATEGORYS-PRODUCT-SEARCH START -->
						<div class="categorys-product-search" style="margin-left: 180px;">
							<form action="search.php" method="get" class="search-form-cat"> 
								<div class="search-product form-group">
								
									

									<input style="width: 480px;" type="text" class="form-control search-form" name="txtSearch" placeholder="Nhập từ khóa... " />
									<button class="search-button" type="submit">
										<i class="fa fa-search"></i>
									</button>				
								</div>
							</form>
						</div>
						<!-- CATEGORYS-PRODUCT-SEARCH END -->
					</div>
				</div>
			</div>
		</section>
		<!-- HEADER-MIDDLE END -->

    <!-- MAIN-MENU-AREA START -->
		<header class="main-menu-area">
			<div class="container">
				<div class="row">
					<!-- SHOPPING-CART START -->
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 pull-right shopingcartarea">
						<div class="shopping-cart-out pull-right">
							<div class="shopping-cart">
							
								<a class="shop-link" href="cart.php" title="View my shopping cart">
									<i class="fa fa-shopping-cart cart-icon"></i>
									<b>Giỏ hàng</b>
									<span class="ajax-cart-quantity"><?php require "slsp_tronggh.php" ?></span>
								</a>
								<!-- hien thi san pham trong gio hang -->
								<div class="shipping-cart-overly" style="height:auto; width: 35	0px;">
									<?php
										if(isset($_SESSION["khid"])){
											$khid = $_SESSION["khid"];
											$sql = "select sp.SP_TEN, sp.SP_GIA, ct.CTGH_SOLUONG, sp.SP_HINHANH, sp.SP_MA
														from san_pham sp 
														join chitiet_gh ct on ct.SP_MA=sp.SP_MA
														join gio_hang gh on gh.GH_MA=ct.GH_MA
														join khach_hang kh on kh.KH_MA=gh.KH_MA
														where kh.KH_MA = {$khid}";
											
											$result = $conn->query($sql);
											if($result->num_rows>0){
												while($row = mysqli_fetch_assoc($result)){
									?>
												
									<!-- 	<div class="shipping-item">
											<span class="cross-icon"><i class="fa fa-times-circle"></i></span>
											<div class="shipping-item-image">
												<a href="single_products.php?id=<?php echo $row["SP_MA"]; ?>"><img src="assets/img/product_img/<?php echo $row["SP_HINHANH"] ?>" alt="shopping image" style="width: 20%;" /></a>
											</div>
											<div class="shipping-item-text">
												<span><?php echo $row["CTGH_SOLUONG"]; ?> <span class="pro-quan-x">x</span> <a href="single_products.php?id=<?php echo $row["SP_MA"]; ?>" class="pro-cat"><?php echo $row["SP_TEN"]; ?></a></span>
												
												<p>Giá <?php echo number_format($row["SP_GIA"]) ?>đ</p>
											</div>
										</div> -->		
										<div class="shipping-item">
    										<span class="cross-icon remove-product" data-id="<?php echo $row['SP_MA']; ?>"><i class="fa fa-times-circle"></i></span>
    										<div class="shipping-item-image">
        										<a href="single_products.php?id=<?php echo $row["SP_MA"]; ?>"><img src="assets/img/product_img/<?php echo $row["SP_HINHANH"] ?>" alt="shopping image" style="width: 20%;" /></a>
    										</div>
    										<div class="shipping-item-text">
        										<span><?php echo $row["CTGH_SOLUONG"]; ?> <span class="pro-quan-x">x</span> <a href="single_products.php?id=<?php echo $row["SP_MA"]; ?>" class="pro-cat"><?php echo $row["SP_TEN"]; ?></a></span>
        										<p>Giá <?php echo number_format($row["SP_GIA"]) ?>đ</p>
    										</div>
										</div>
																							
								<?php	
										}													
									} 
									$sql_tt = "select sum(ct.CTGH_SOLUONG*sp.SP_GIA) as tongtien from chitiet_gh ct
													join gio_hang gh on ct.GH_MA=gh.GH_MA
													join khach_hang kh on kh.KH_MA=gh.KH_MA
													join san_pham sp on sp.SP_MA=ct.SP_MA
													where kh.KH_MA= {$khid}";
									$rs = $conn->query($sql_tt);
									$tong = $rs->fetch_assoc()["tongtien"];
								?>
										
										<div class="shipping-total-bill">
											<!-- <div class="cart-prices">
												<span class="shipping-cost">$2.00</span>
												<span>Shipping</span>
											</div> -->
											<div class="total-shipping-prices">
												<span class="shipping-total text-success"><?php echo number_format($tong) ?>đ</span>
												<span>Tổng</span>
											</div>										
										</div>
										<div class="shipping-checkout-btn">
											<a href="cart.php">Check out <i class="fa fa-chevron-right"></i></a>
										</div>	
								<?php								
								}
								?>				
													
								</div>
							</div>
						</div>
					</div>	
					<!-- SHOPPING-CART END -->
					<!-- MAINMENU START -->
					<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 no-padding-right menuarea">
						<div class="mainmenu">
							<nav>
								<ul class="list-inline mega-menu">
									<li><a href="index.php">Home</a></li>
									<li>
										<a href="#">Danh mục sản phẩm</a>
										<!-- DRODOWN-MEGA-MENU START -->
										<div class="dropdown-mega-menu" >
   										 <div class="left-mega col-xs-0">
       										 <div class="mega-menu-list" >

													
													<ul>
													<?php
														require 'connect.php';
														$sql = "select LSP_MA as maloaisp, LSP_TEN from loai_sp";
														$result = $conn->query($sql);
														if($result->num_rows > 0){
															$result = $conn->query($sql);
															$result_all = $result->fetch_all(MYSQLI_ASSOC);
															foreach($result_all as $row){
														?>
														<li><a href="category.php?maloaisp=<?php echo $row["maloaisp"]?>"><?php echo $row["LSP_TEN"]?></a></li>
														<?php 
																}
															}
														?>
													</ul>
												</div>
											</div>
											
									</li>
									
									<li><a href="contact1.php">Contact</a></li>
									<li><a href="aboutus.php">About</a></li>
								</ul>
							</nav>
						</div>
					</div>
					<!-- MAINMENU END -->
				</div>
				  
       			
			</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.remove-product').on('click', function() {
            var spid = $(this).data('id'); // Lấy ID sản phẩm từ thuộc tính data-id
            var $productItem = $(this).closest('.shipping-item'); // Lấy phần tử cha của sản phẩm để xóa

            $.post('remove_cart.php', { idsprm: spid, remove: true }, function(response) {
                alert(response); // Hiển thị thông báo từ server
                $productItem.remove(); // Xóa sản phẩm khỏi giao diện
                updateCartTotal(); // Cập nhật tổng số lượng và giá
            });
        });
    });

    function updateCartTotal() {
        // Hàm này sẽ thực hiện AJAX để lấy lại tổng số lượng và giá
        $.get('slsp_tronggh.php', function(data) {
            $('.ajax-cart-quantity').html(data); // Cập nhật số lượng sản phẩm trong giỏ
        });
    }
</script>


		</header>
		<!-- MAIN-MENU-AREA END -->