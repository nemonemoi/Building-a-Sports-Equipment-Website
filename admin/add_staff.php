
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
    Thêm nhân viên mới
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
<?php
    $active='tnv';
    require 'aside.php';
  ?>
<div class="w3-container w3-padding-large" style="margin-top: -20px; margin-left: 20px;"> <!-- căn lề -->
<body class="g-sidenav-show " style="background-color: #FFC125;">


  <main class="main-content position-relative border-radius-lg " style="margin-top: -25px;">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">

      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5" style="display: flex; flex-wrap: nowrap;">
          <li class="breadcrumb-item text-sm">
                <a class="opacity-5 text-dark" href="dashboard.php">Trang</a>
            </li>
            <li class="breadcrumb-item text-sm"><a href="staff.php" class="text-dark">Nhân viên</li>
        </ol>
        <h6 class="font-weight-bolder text-dark mb-0">Thêm nhân viên</h6>
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
    <div class="row">
    <?php
      require 'connect.php';
    ?>
        <div class="col-12">
          <div class="card mb-4" style="margin-left: 25px; margin-top: -20px;">
            <div class="card-header pb-0">
              <h4>Thêm nhân viên mới</h4>
            </div>
            <div class="card-body px-2 pt-0 pb-2">
                <form role="form" method="post" action="upload_staff.php" enctype="multipart/form-data">
                    <div class="col-12 card-header pb-2 d-flex align-items-center">
                      <div class="mb-3 px-3 col-4">
                          Họ và tên
                        <input required type="text" name="staff_name" class="form-control form-control-lg" placeholder="Nhập họ và tên">
                      </div>
                      <div class="mb-3 px-3 col-4">
                        Ngày sinh
                        <input required type="date" name="staff_birth" id="staff_birth" class="form-control form-control-lg">
                      </div>
                      <div class="mb-3 px-3 col-4">
                        Giới tính
                        <select class="form-control form-control-lg" name="staff_sex" id="staff_sex">
                          <option value="" selected disabled hidden>-Chọn-</option>
                          <option value="m">Nam</option>
                          <option value="m">Nữ</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-12 card-header pb-2 d-flex align-items-center">
                      <div class="mb-3 px-3 col-6">
                          Số điện thoại
                        <input required type="text" name="staff_phone" class="form-control form-control-lg" placeholder="Nhập SĐT">
                      </div>
                      <div class="mb-3 px-3 col-6">
                          Email
                        <input required type="email" name="staff_mail" class="form-control form-control-lg" placeholder="Nhập email">
                      </div>
                    </div>
                    <div class="col-12 card-header pb-2 d-flex align-items-center">
                      <div class="mb-3 px-3 col-12">
                          Địa chỉ
                        <input required type="text" name="staff_address" class="form-control form-control-lg" placeholder="Nhập địa chỉ">
                      </div>
                    </div>
                    <div class="col-12 card-header pb-2 d-flex align-items-center">
                      <div class="mb-3 px-3 col-3">
                        Vai trò
                        <select class="form-control form-control-lg" name="staff_vaitro" id="staff_vaitro">
                          <option value="" selected disabled hidden>-Chọn-</option>
                          <option value="1">Quản lý</option>
                          <option value="2">Nhân viên duyệt đơn</option>
                          <!-- <option value="3">Nhân viên kế toán</option> -->
                        </select>
                      </div>
                      <div class="mb-3 px-3 col-3">
                          Tên đăng nhập
                        <input required type="text" name="staff_usname" class="form-control form-control-lg" placeholder="Nhập tên đang nhập">
                      </div>
                      <div class="mb-3 px-3 col-3">
                          Mật khẩu
                        <input required type="password" id="pw" name="staff_pass" class="form-control form-control-lg" placeholder="Nhập mật khẩu">
                      </div>
                      <div class="mb-3 px-3 col-3">
                          Nhập lại mật khẩu
                        <input required type="password" id="rpw" name="staff_repass" class="form-control form-control-lg" placeholder="Nhập lại mật khẩu">
                      </div>
                    </div>
                    <div class="col-12 card-header pb-2 d-flex align-items-center">
                      <div class="mb-3 px-3 col-3"></div>
                      <div class="mb-3 px-3 col-3">
                          Tải ảnh đại diện:
                          <br>
                          <input class="mt-3" type="file" name="staffImg" id="input" accept="image/*">
                      </div>
                      <div class="mb-3 px-3 col-3">
                          <div id="preview"></div>
                          <script>
                            var input = document.getElementById("input");
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
                                  img.width = 200; // set width for preview images
                                  img.className = "rounded-circle avatar avatar-xxl ms-4";
                                  preview.appendChild(img); // append image to preview div
                                };
                                reader.readAsDataURL(file); // read file as data url
                              }
                            });
                          </script>
                      </div>
                      <div class="mb-3 px-3 col-3"></div>
                    </div>

                    <!-- <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="rememberMe">
                      <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div> -->
                    <div class="text-center px-3">
                      <button type="submit" class="btn btn-lg btn-warning btn-lg w-100 mt-4 mb-0"><strong>Thêm</strong></button>
                    </div><br>
                </form>
            </div>
          </div>
        </div> 
      </div>
             

      </div>
    
    </div>
  <!-- </main>
  <div class="fixed-plugin">
    <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
      <i class="fa fa-cog py-2"> </i>
    </a>
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Argon Configurator</h5>
          <p>See our dashboard options.</p>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0 overflow-auto">
        <!-- Sidebar Backgrounds -->
        <!-- <div>
          <h6 class="mb-0">Sidebar Colors</h6>
        </div>
        <a href="javascript:void(0)" class="switch-trigger background-color">
          <div class="badge-colors my-2 text-start">
            <span class="badge filter bg-gradient-primary active" data-color="primary" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-dark" data-color="dark" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-info" data-color="info" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-success" data-color="success" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-warning" data-color="warning" onclick="sidebarColor(this)"></span>
            <span class="badge filter bg-gradient-danger" data-color="danger" onclick="sidebarColor(this)"></span>
          </div>
        </a> -->
        <!-- Navbar Fixed -->
        <!-- <hr class="horizontal dark my-sm-4">
        <div class="mt-2 mb-5 d-flex">
          <h6 class="mb-0">Light / Dark</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
      </div>
    </div>
  </div>  -->
  <!--   Core JS Files   -->
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