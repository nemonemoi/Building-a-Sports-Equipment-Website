
<!DOCTYPE html>
<html lang="en">
<?php
  session_start();
?>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/logo.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/brands.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>
    Sản phẩm
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>
<body class="g-sidenav-show " style="background-color: #FFAEB9;">
<?php
    $active='sp';
    require 'aside.php';
  ?>
<div class="w3-container w3-padding-large" style="margin-top: -20px; margin-left: 20px;"> <!-- căn lề -->


  <main class="main-content position-relative border-radius-lg " style="margin-top: -25px;">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">

      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5" style="display: flex; flex-wrap: nowrap;">
          <li class="breadcrumb-item text-sm">
                <a class="opacity-5 text-dark" href="dashboard.php">Trang</a>
            </li>
            <li class="breadcrumb-item text-sm"><a href="products.php" class="text-dark">Sản Phẩm</li>
        </ol>
        <h6 class="font-weight-bolder text-dark mb-0">Danh sách sản phẩm</h6>
    </nav>
</div>

       <!-- Đoạn này -->
        <div style="margin-left: -300px; margin-top: 20px !important;" class="mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              
            </div>
          </div>
  
          <?php require 'nav.php'; ?>
        </div>

      </div>
    </nav>

      <div class="row">
        <div class="col-12">
          <div class="card mb-4" style="margin-left: 105px;">
            <div class="row px-2">
              <form action="#" method="get">
                <div class="px-3 col-12 pb-2 d-flex align-items-center">
                  <div class="col-1 mt-2 font-weight-bold d-flex align-items-center" style="white-space: nowrap;">
                    Danh sách sản phẩm: 
                  </div> 
                 
                  <div class="px-2 mt-n3 col-2"></div>
                  <div class="px-2 mt-n3 col-1 font-weight-bold"></div>
                 <div class="col-9 d-flex align-items-center  justify-content-end" style="margin-left: -50px; margin-top: 10px;">
                        <div class="input-group w-40 me-3" >
                      <input  type="text" name="timkiem" class="form-control" placeholder="Nhập tên sản phẩm cần tìm..">
                          <button style="background-color: lightpink;" type="submit" class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></button>
                    </div>
                   
                  </div>
                </div>
              </form>
              
            </div>
          </div>
        </div>
        <a href="products_add_form.php" class="btn btn-link text-dark mt-n3">+ Thêm sản phẩm</a>
      </div>
        <!-- Nguyên đống này la mot danh muc -->
        <?php
          $sql = "SELECT * FROM LOAI_SP";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
            $result = $conn->query($sql);
            $result_all = $result -> fetch_all(MYSQLI_ASSOC);
            foreach ($result_all as $rowlsp) {
              $lspid = $rowlsp["LSP_MA"];
              $sql = "SELECT * FROM san_pham where LSP_MA = {$lspid}";
                if(isset($_GET["timkiem"])){
                  $search = $_GET["timkiem"];
                  if ($search != null) {
                    $sql = "SELECT * FROM san_pham where LSP_MA = {$lspid} and SP_TEN LIKE '%".$search."%'";
                  }
                }
        ?>
              <div class="row">
    <div class="col-12">
        <div class="card mb-4" style="margin-left: 105px;">
            <div class="card-header pb-2">
                <?php echo "<h6>" . $rowlsp["LSP_TEN"] . "</h6>"; ?>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-0" style="max-height: 300px; overflow-y: auto; overflow-x: hidden;">
                    <!-- table 5 cot -->
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th style="width: 5%;" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-1">Mã</th>
                                <th style="width: 15%;" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Sản phẩm</th>
                                <th style="width: 5%;" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Số lượng</th>
                                <th style="width: 10%;" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Giá</th>
                                <th style="width: 5%;" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">MÀU SẮC</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- 1 hang -->
                            <?php
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                $result_all = $result->fetch_all(MYSQLI_ASSOC);
                                foreach ($result_all as $row) {
                                    $pdid = $row["SP_MA"];
                                    $soluong = $row["SP_SOLUONGTON"];
                                    $lsp = $rowlsp["LSP_TEN"];
                                    $mlsp = $rowlsp["LSP_MA"];
                                    $query = "SELECT ct.PN_STT AS stt_pn, pn.PN_NGAYNHAP AS ngaynhap
                                                FROM chitiet_pn ct
                                                JOIN phieu_nhap pn ON ct.PN_STT=pn.PN_STT
                                                JOIN san_pham sp ON ct.SP_MA=sp.SP_MA
                                                WHERE sp.SP_MA = {$pdid};";
                                    $rs = $conn->query($query);
                                    ?>
                                    <tr class="height-100">
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0"><?php echo $row["SP_MA"]; ?></p>
                                        </td>
                                        <td class="w-30">
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <?php
                                                    $file = ($row["SP_HINHANH"] == null) ? "default.jpg" : $row["SP_HINHANH"];
                                                    $avatar_url = "../assets/img/product_img/" . $file;
                                                    echo "<img src='{$avatar_url}' class='avatar avatar-xl me-3' alt='user1'>";
                                                    ?>
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-md"><?php echo $row["SP_TEN"]; ?></h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0"><?php echo $row["SP_SOLUONGTON"]; ?></p>
                                        </td>
                                        <td>
                                            <p class="text-s font-weight-bold mb-0"><?php echo number_format($row["SP_GIA"], 0); ?> VNĐ</p>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0"><?php echo $row["SP_MAUSAC"]; ?></p>
                                        </td>
                                        <td class="align-middle text-center">
                                            <div class="mt-3 d-flex col-sm-12">
                                                <div class="me-n1 align-middle col-4"></div>

                                                <div class="d-flex justify-content-center">
                                                  <form method="post" action="edit_product.php">
                                                    <input type="hidden" name="pdid" value="<?php echo $row["SP_MA"]; ?>">

                                                  
                                                        <input type="hidden" name="nsxsp" value="<?php echo $nsxsp; ?>">
                                                        <input type="hidden" name="mnsxsp" value="<?php echo $mnsxsp; ?>">
                                                        <input type="hidden" name="lsp" value="<?php echo $lsp; ?>">
                                                        <input type="hidden" name="mlsp" value="<?php echo $mlsp; ?>">
                                                        <input type="hidden" name="stt_pn" value="<?php echo $stt_pn; ?>">
                                                        <input type="hidden" name="tensp" value="<?php echo $row["SP_TEN"]; ?>">
                                                        <input type="hidden" name="kichthuocsp" value="<?php echo $row["SP_KICHTHUOC"]; ?>">
                                                        <input type="hidden" name="anhsp" value="<?php echo $row["SP_HINHANH"]; ?>">
                                                        <input type="hidden" name="slsp" value="<?php echo $row["SP_SOLUONGTON"]; ?>">
                                                        <input type="hidden" name="colorsp" value="<?php echo $row["SP_MAUSAC"]; ?>">
                                                        <input type="hidden" name="motasp" value="<?php echo $row["SP_MOTA"]; ?>">
                                                        <input type="hidden" name="chatlieusp" value="<?php echo $row["SP_CHATLIEU"]; ?>">
                                                        <input type="hidden" name="giasp" value="<?php echo $row["SP_GIA"]; ?>">

                                         
                                                        <button onclick="this.form.submit()"  class="btn btn-link text-primary font-weight-bold text-sm" > 
                                                            Sửa
                                                        </button>

                                                        
                                                    </form>
                                                </div>
                                                <div class="align-middle col-1">
                                                    <form method="post" action="del_product.php">
                                                        <input type="hidden" name="pdid" value="<?php echo $row["SP_MA"]; ?>">
                                                        <button type="submit" class="addmore-button btn btn-link text-warning text-secondary font-weight-bold text-sm">
                                                            Xóa
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                            <!-- het 1 hang -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

              <?php
            }                          
          } else {
            echo "<option value=''>Không có dữ liệu</option>";
          }
        ?>

      </div>
      
      
                     
      </div>
    </div>
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0 overflow-auto">
        

  <!--   Core JS Files   -->
  <style>
   
   .ps__thumb-x {
    display: none !important;
}
    .ps__rail-x {
    display: none !important;
}

   .table-condensed td, .table-condensed th {
    padding: -0.3rem;
  }
  .card {
    max-width: 1000px; /* Giới hạn chiều rộng */
  }
 

    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 99999;
      background: rgba(0, 0, 0, 0.5);
      display: none;
    }

    .my-box {
      width: 40%;
      height: 30%;
      background-color: #fff;
      border-radius: 10px;
      position: absolute;
      padding: 15px;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
    .description {
  white-space: normal; /* Cho phép văn bản xuống dòng */
  word-wrap: break-word; /* Gói gọn văn bản dài không bị cắt ngang */
  overflow-wrap: break-word; /* Đảm bảo rằng các từ dài không tràn ra ngoài */
  width: 400px; /* Điều chỉnh kích thước tối đa của đoạn văn để phù hợp với kích thước của ô */
}


  </style>
  <script>

    const productButtons = document.querySelectorAll('.addmore-button');

    productButtons.forEach(button => {
      button.addEventListener('click', showProductDetails);
    });

    function showProductDetails(event) {
      // Lấy ID của sản phẩm được click
      const productId = event.target.getAttribute('data-id');
      const product_img = event.target.getAttribute('data-img');
      const product_name = event.target.getAttribute('data-name');
      
      
      document.getElementById("temp_id").value = productId;

      // Hiển thị overlay
      const overlay = document.querySelector('.overlay');
      overlay.style.display = 'block';

      // Hiển thị thông tin chi tiết của sản phẩm
      const productName = document.querySelector('.product-name');
      productName.innerHTML = '<h6>' + product_name + '</h6>';
      const productImg = document.querySelector('.product-image');
      productImg.innerHTML = '<img src="' + product_img + '" class="avatar avatar-xxl" alt="product">';
      
    }


    //Tắt overlay
    const overlay = document.getElementById("overlay");
    overlay.addEventListener("click", function(event) {
      if (event.target === overlay) {
        overlay.style.display = "none";
      }
    });

  </script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
  <?php 
    $conn->close();
  ?>
</body>

</html>