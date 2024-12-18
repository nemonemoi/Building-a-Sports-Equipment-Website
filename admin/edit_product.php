
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
    Sửa sản phẩm
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
        <h6 class="font-weight-bolder text-dark mb-0">Sửa sản phẩm</h6>
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
    <style>
      .ps__thumb-x {
    display: none !important;
}
    .ps__rail-x {
    display: none !important;
}
    </style>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
    <div class="alert alert-success">Cập nhật sản phẩm thành công!</div>
<?php endif; ?>

    <div class="row">
    <?php
      require 'connect.php';


       $idsp = isset($_POST["pdid"]) ? $_POST["pdid"] : null;
$mnsxsp = isset($_POST["mnsxsp"]) ? $_POST["mnsxsp"] : null;
$stt_pn = isset($_POST["stt_pn"]) ? $_POST["stt_pn"] : null;
$lsp = isset($_POST["lsp"]) ? $_POST["lsp"] : null;
$mlsp = isset($_POST["mlsp"]) ? $_POST["mlsp"] : null;
$tensp = isset($_POST["tensp"]) ? $_POST["tensp"] : null;
$colorsp = isset($_POST["colorsp"]) ? $_POST["colorsp"] : null;
$motasp = isset($_POST["motasp"]) ? $_POST["motasp"] : null;
$chatlieusp = isset($_POST["chatlieusp"]) ? $_POST["chatlieusp"] : null;
$anhsp = isset($_POST["anhsp"]) ? $_POST["anhsp"] : null;
$slsp = isset($_POST["slsp"]) ? $_POST["slsp"] : null;
$kichthuocsp = isset($_POST["kichthuocsp"]) ? $_POST["kichthuocsp"] : null;
$giasp = isset($_POST["giasp"]) ? $_POST["giasp"] : null;



    ?>
        <div class="col-12">
          <div class="card mb-4" style="margin-left: 30px;">
            <div class="card-header pb-0">
              <h4>Sửa sản phẩm #<?php echo $idsp; ?> - <?php echo $tensp; ?></h4>
            </div>
            <div class="card-body px-2 pt-0 pb-2">
                <form role="form" method="post" action="update_edit_product.php" enctype="multipart/form-data">
                    <input type="hidden" name="idsp" value="<?php echo $idsp; ?>">
                    <!-- <input type="hidden" name="nsxsp" value="<?php echo $nsxsp; ?>">
                    <input type="hidden" name="mnsxsp" value="<?php echo $mnsxsp; ?>"> -->
                    <input type="hidden" name="lsp" value="<?php echo $lsp; ?>">
                    <input type="hidden" name="mlsp" value="<?php echo $mlsp; ?>">
                    <input type="hidden" name="stt_pn" value="<?php echo $stt_pn; ?>">
                    <input type="hidden" name="tensp" value="<?php echo $tensp; ?>">
                    <input type="hidden" name="colorsp" value="<?php echo $colorsp; ?>">
                    <input type="hidden" name="motasp" value="<?php echo $motasp; ?>">
                    <input type="hidden" name="chatlieusp" value="<?php echo $chatlieusp; ?>">
                    <input type="hidden" name="anhsp" value="<?php echo $anhsp; ?>">
                    <input type="hidden" name="slsp" value="<?php echo $slsp; ?>">
                    <input type="hidden" name="kichthuocsp" value="<?php echo $kichthuocsp; ?>">
                    <input type="hidden" name="giasp" value="<?php echo $giasp; ?>">



                    <div class="col-12 card-header pb-2 d-flex align-items-center">
                      <div class="mb-3 px-3 col-3">
                          Loại sản phẩm
                          <br>
                          <select class="form-control form-control-lg" name="lsp" id="lsp">
                          <option value="<?php echo $mlsp; ?>" selected hidden><?php echo $lsp; ?></option>
                          <?php
                            $sql = "SELECT * FROM LOAI_SP";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                              $result = $conn->query($sql);
                              $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                              foreach ($result_all as $row) {
                                echo "<option value=" .$row["LSP_MA"]. ">".$row["LSP_TEN"]. "</option>";
                              }                          
                            } else {
                              echo "<option value=''>Không có dữ liệu</option>";
                            }
                          ?>
                        </select>
                      </div>
                     <!--  <div class="mb-3 px-3 col-3">
                          Nhà sản xuất
                          <br>
                          <select class="form-control form-control-lg" name="nsxsp" id="nsxsp">
                          <option value="<?php echo $mnsxsp; ?>" selected hidden><?php echo $nsxsp; ?></option>
                          <?php
                            $sql = "SELECT * FROM nha_san_xuat";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                              $result = $conn->query($sql);
                              $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                              foreach ($result_all as $row) {
                                echo "<option value=" .$row["NSX_MA"]. ">".$row["NSX_TEN"]. "</option>";
                              }                          
                            } else {
                              echo "<option value=''>Không có dữ liệu</option>";
                            }
                          ?>
                        </select>
                      </div> -->

                        <div class="mb-3 px-3 col-3">
                          Giá (VNĐ)
                        <input min="0" max="10000000000" step="10000" type="number" name="giasp" class="form-control form-control-lg" value="<?php echo $giasp ?>">
                      </div>
                    </div>

                    <div class="col-12 mt-n4 card-header pb-2 d-flex align-items-center">                    
                      <div class="mb-3 px-3 col-8">
                          Tên sản phẩm
                        <input type="text" name="tensp" class="form-control form-control-lg" value="<?php echo $tensp; ?>">
                      </div>
                    </div>

                    <div class="col-12 mt-n4 card-header pb-2 d-flex align-items-center"> 
                      <div class="mb-3 px-3 col-3">
                            Số lượng
                          <input  min="1" max="10000" step="1" type="number" name="slsp" class="form-control form-control-lg" value="<?php echo $slsp ?>">
                      </div>                   
                      <div class="mb-3 px-3 col-3">
                          Màu sắc
                          <br>
                          <input  type="text" name="colorsp" class="form-control form-control-lg" value="<?php echo $colorsp ?>">
                      </div>
                      <div class="mb-3 px-3 col-3">
                          Chất liệu
                          <br>
                          <input  type="text" name="chatlieusp" class="form-control form-control-lg" value="<?php echo $chatlieusp ?>">
                      </div>
                      <div class="mb-3 px-3 col-3">
                          Kích thước
                          <br>
                          <input  type="text" name="kichthuocsp" class="form-control form-control-lg" value="<?php echo $kichthuocsp ?>">
                      </div>
                    </div>  
                      
                    
                    <div class="col-12 mt-n4 card-header pb-2 d-flex align-items-center">
                      <div class="mb-3 px-3 col-12">
                          Mô tả sản phẩm
                        <input type="text"  row="20" name="motasp" style="height: 150px;" class="form-control form-control-lg" value="<?php echo $motasp ?>">
                      </div>
                    </div>

                    <div class="col-12 mt-n4 card-header pb-2 d-flex align-items-center">                                        
                      <div class="mb-3 px-3 col-3"></div>
                      <div class="mb-3 px-3 col-3">
                          Tải ảnh sản phẩm:
                          <br>
                          <input type="hidden" name="old_productImg" value="<?php echo $anhsp;?>" accept="image/*">
                          <input class="mt-3" type="file" name="productImg" id="productImg" accept="image/*">
                      </div>
                      <div class="mb-3 px-3 col-3">
                          <div id="preview">
                            <img id="old_img" src="../assets/img/product_img/<?php echo $anhsp;?>" class="rounded-circle avatar avatar-xxl ms-4" alt="">
                          </div>
                          <script>
                            var input = document.getElementById("productImg");
                            var preview = document.getElementById("preview");

                            input.addEventListener("change", function() {
                              preview.innerHTML = ""; // clear previous preview
                              var files = this.files;
                              for (var i = 0; i < files.length; i++) {
                                var file = files[i];
                                if (!file.type.startsWith("image/")){ continue } // skip non-image files
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                  var img = document.createElement("img");
                                  img.src = e.target.result;
                                  img.width = 1000; // set width for preview images
                                  img.className = "avatar avatar-xxl me-3";
                                  preview.appendChild(img); // append image to preview div
                                };
                                reader.readAsDataURL(file); // read file as data url
                              }
                            });
                          </script>
                      </div>
                    </div>
                    <div class="col-12 mt-n4 card-header pb-2 d-flex align-items-center">                                                            
                      <div class="col-12 text-center px-3">
                        <button type="submit" style="background-color: black; color: #FFAEB9;" class="btn btn-lg btn-lg w-100 mt-4 mb-0"><strong>Cập nhật</button></strong>
                      </div>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </div>
    
      
    </div>

      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0 overflow-auto">
      
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