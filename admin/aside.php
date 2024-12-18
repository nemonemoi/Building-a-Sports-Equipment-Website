<?php
    $db="";
    $hd="";
    $dh="";
    $kh="";
    $sl="";
    $nv="";
    $tnv="";
    $nh="";
    $dvvc="";
    $dvc="";
    $sp="";
    $tsp="";
    $dg="";
    $tt="";
    $tttk="";

    switch ($active){
        case 'db':
            $db = "active bg-info";
            break;
        case 'hd':
            $hd = "active bg-info";
            break;
        case 'dh':
            $dh = "active bg-info";
            break;
        case 'kh':
            $kh = "active bg-info";
            break;
        case 'sl':
            $sl = "active bg-info";
            break;
        case 'nv':
            $nv = "active bg-info";
            break;
        case 'tnv':
            $tnv = "active bg-info";
            break;
        case 'nh':
            $nh = "active bg-info";
            break;
        case 'dvvc':
            $dvvc = "active bg-info";
            break;
        case 'dvc':
            $dvc = "active bg-info";
            break;
        case 'sp':
            $sp = "active bg-info";
            break;
        case 'tsp':
            $tsp = "active bg-info";
            break;
        case 'dg':
            $dg = "active bg-info";
            break;
        case 'tt':
            $tt = "active bg-info";
            break;
        case 'tttk':
            $tttk = "active bg-info";
            break;

    }

?>

<header>
  <!-- Thêm vào phần <head> -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">



</header>
<style>
  /* CSS cho phần aside */
.sidenav {
  width: 300px; /* Chiều rộng mặc định */
  transition: width 0.3s; /* Thời gian chuyển đổi khi hover */
}

.sidenav:hover {
  width: 250px; /* Chiều rộng khi hover */
}

.custom-logo {
  margin-left: 10px;
  margin-top: 20px;
    height: 80px;
    width: 230px; 

}


    .navbar-nav .nav-item .nav-link.active,
    .navbar-nav .nav-item .nav-link.active:focus,
    .navbar-nav .nav-item .nav-link.active:hover {
      background-color: transparent !important; /* Loại bỏ màu nền */
      color: inherit !important; /* Giữ nguyên màu chữ */
      box-shadow: none !important; /* Loại bỏ hiệu ứng đổ bóng nếu có */
    }

    .navbar-nav .nav-item .nav-link:hover {
      background-color: #f0f0f0; /* Màu nền nhẹ hơn khi hover */
      color: #007bff; /* Màu chữ khi hover */
    }

    /* Định nghĩa chiều rộng cố định cho sidebar */
.sidebar {
    width: 250px; /* Điều chỉnh giá trị này theo ý bạn */
    position: fixed; /* Để giữ sidebar cố định ở bên cạnh */
    top: 0;
    left: 0;
    height: 100%;
    overflow-y: auto;
    background-color: #f8f9fa; /* Tùy chọn: Thêm màu nền */
}

/* Điều chỉnh nội dung chính để phù hợp với chiều rộng của sidebar */
.main-content {
    margin-left: 250px; /* Giá trị này nên khớp với chiều rộng của sidebar */
    padding: 20px; /* Tùy chọn: Thêm khoảng cách padding */
}


</style>

<body>
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 bg-white" id="sidenav-main">
  <div class="sidenav-header">
    <!-- <a class="navbar-brand m-0 text-center" href="#" target="_blank"> -->
      <img src="../assets/img/logo2.png" class="custom-logo justify-content-center"  alt="main_logo">
      <!-- <span class="ms-1 font-weight-bold">Quản lý じゃな、sportsman</span> -->
    </a>
  </div><br>
  <ul class="navbar-nav">

     <li class="nav-item mt-3" >
      
    </li>
    

    <!-- Tổng quan -->
   
        <li class="nav-item">
      <a class="nav-link dropdown-toggle" data-toggle="collapse" href="#tongQuan" aria-expanded="false" aria-controls="tongQuan">
        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
          <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
        </div>
        <span class="nav-link-text ms-1">Tổng quan</span>
      </a>
       <ul class="collapse" id="tongQuan">
        <!-- <li class="nav-item">
          <a class="nav-link <?php echo $nv ?>" href="../admin/billing.php">
            <span class="nav-link-text ms-4">Hóa đơn</span>
          </a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link <?php echo $tnv ?>" href="../admin/dashboard.php">
            <span class="nav-link-text ms-4">Thống kê</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?php echo $tnv ?>" href="../admin/billing.php">
            <span class="nav-link-text ms-4">Hóa đơn</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?php echo $tnv ?>" href="../admin/products_wait.php">
            <span class="nav-link-text ms-4">Đơn hàng</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?php echo $nv ?>" href="../admin/customer.php">
            <span class="nav-link-text ms-4">Khách hàng</span>
          </a>
        </li>

       <!--  <li class="nav-item">
          <a class="nav-link <?php echo $tnv ?>" href="../admin/news.php">
            <span class="nav-link-text ms-4">Tin tức</span>
          </a>
        </li> -->
      </ul>
    </li>

    <!-- Quản lý nhân viên -->
    <li class="nav-item">
      <a class="nav-link dropdown-toggle" data-toggle="collapse" href="#quanLyNhanVien" aria-expanded="false" aria-controls="quanLyNhanVien">
        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
          <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
        </div>
        <span class="nav-link-text ms-1">Quản lý nhân viên</span>
      </a>
      <ul class="collapse" id="quanLyNhanVien">
        <li class="nav-item">
          <a class="nav-link <?php echo $nv ?>" href="../admin/staff.php">
            <span class="nav-link-text ms-4">Danh sách nhân viên</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $tnv ?>" href="../admin/add_staff.php">
            <span class="nav-link-text ms-4">Thêm nhân viên</span>
          </a>
        </li>
      </ul>
    </li>

    <!-- Quản lý đối tác -->
    <li class="nav-item">
      <a class="nav-link dropdown-toggle" data-toggle="collapse" href="#quanLyDoiTac" aria-expanded="false" aria-controls="quanLyDoiTac">
        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
          <i class="fas fa-truck text-success text-sm opacity-10"></i>
          <!-- <i class="ni fa-truck text-warning text-sm opacity-10"></i> -->
        </div>
        <span class="nav-link-text ms-1">Quản lý đối tác</span>
      </a>
      <ul class="collapse" id="quanLyDoiTac">
        <li class="nav-item">
          <a class="nav-link <?php echo $nv ?>" href="../admin/transporter.php">
            <span class="nav-link-text ms-4">Đơn vị vận chuyển</span>
          </a>
        </li>
      </ul>
        <!-- Quản lý sản phẩm -->
      <li class="nav-item">
      <a class="nav-link dropdown-toggle" data-toggle="collapse" href="#quanLySanPham" aria-expanded="false" aria-controls="quanLySanPham">
        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
          <i class="fas fa-cart-plus text-secondary text-sm opacity-10"></i>
        </div>
        <span class="nav-link-text ms-1">Quản lý sản phẩm</span>
      </a>
      <ul class="collapse" id="quanLySanPham">
        <!-- <li class="nav-item">
          <a class="nav-link <?php echo $nv ?>" href="../admin/trans_bill.php">
            <span class="nav-link-text ms-4">Đơn vận chuyển</span>
          </a>
        </li> -->

        <li class="nav-item">
          <a class="nav-link <?php echo $nv ?>" href="../admin/products.php">
            <span class="nav-link-text ms-4">Sản phẩm</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?php echo $nv ?>" href="../admin/products_add_form.php">
            <span class="nav-link-text ms-4">Thêm sản phẩm</span>
          </a>
        </li>
      </ul>
<!-- tài khoản -->
      <li class="nav-item">
      <a class="nav-link <?php echo $tttk ?>" href="../admin/profile.php">
        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
          <i class="fas fa-user text-danger text-sm opacity-10"></i>
        </div>
        <span class="nav-link-text ms-1">Thông tin tài khoản</span>
      </a>
    </li>
<!-- đăng xuất -->
      <li class="nav-item">
      <a class="nav-link"  href="log_out.php" aria-expanded="false" aria-controls="quanLySanPham">
        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
          <i class="fas fa-sign-out-alt text-dark text-sm opacity-10"></i>
        </div>
        <span class="nav-link-text ms-1">Đăng xuất</span>
      </a>
  </ul>
</aside>
<!-- Thêm vào phần cuối của <body> -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>




 <!-- <aside style="size: 300px;" class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 bg-white" id="sidenav-main">
    <div class="sidenav-header">
      
    
        
        <!-?php
          if($_SESSION["cv"] == '1')
            {
              echo "<li class=\"nav-item mt-3\">\n"; 
              echo " <h6 class=\"ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6\">Quản lý nhân viên</h6>\n"; 
              echo "</li>\n"; echo "<li class=\"nav-item\">\n"; 
              echo " <a class=\"nav-link <?php echo $nv ?> \" href=\"../admin/staff.php\">\n"; 
              echo " <div class=\"icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center\">\n"; 
              echo " <i class=\"ni ni-single-copy-04 text-warning text-sm opacity-10\"></i>\n"; 
              echo " </div>\n"; 
              echo " <span class=\"nav-link-text ms-1\">Danh sách nhân viên</span>\n"; 
              echo " </a>\n"; 
              echo "</li>\n"; 
              echo "<li class=\"nav-item\">\n"; 
              echo " <a class=\"nav-link <?php echo $tnv ?>\" href=\"../admin/add_staff.php\">\n"; 
              echo " <div class=\"icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center\">\n"; 
              echo " <i class=\"fas fa-user-plus text-primary text-sm opacity-10\"></i>\n"; 
              echo " </div>\n"; echo " <span class=\"nav-link-text ms-1\">Thêm nhân viên</span>\n"; 
              echo " </a>\n"; 
              echo "</li>";
              echo '<li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Quản lý đối tác</h6>
                    </li>
                    
                    
                    
                    </div>
                    
                    </a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link ' .$dvvc. '" href="../admin/transporter.php">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fas fa-truck text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Đơn vị vận chuyển</span>
                    </a>
                    </li>';
            }
        ?>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Quản lý sản phẩm</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $dvc ?>" href="../admin/trans_bill.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-truck-loading text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Đơn vận chuyển</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $sp ?>" href="../admin/products.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-mobile text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Sản phẩm</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link <?php echo $tsp ?>" href="../admin/products_add_form.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-cart-plus text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Nhập sản phẩm</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $dg ?>" href="../admin/rating.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-star-half-alt text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Đánh giá</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $tt ?>" href="../admin/news.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="far fa-newspaper text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Tin tức</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Quản lý tài khoản</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php echo $tttk ?>" href="../admin/profile.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fas fa-user-tag text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Thông tin tài khoản</span>
          </a>
        </li>
      </ul>
     </div> 
  </aside>
