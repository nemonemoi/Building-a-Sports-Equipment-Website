
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/logo.png">
  <title>
    Sport Store Admin
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
<style>
  .bg-custom-gradient {
  background-image: linear-gradient(45deg, #B22222, #EE0000);
}
/* Màu sắc khi bật */
.form-check-input:checked {
  background-color: #C60000 !important; /* Màu nền khi bật */
  border-color: #4caf50 !important; /* Màu viền khi bật */
  box-shadow: none !important; /* Loại bỏ shadow mặc định của Bootstrap */
}

/* Màu sắc khi tắt */
.form-check-input {
  background-color: #ffffff !important; /* Màu nền khi tắt */
  border-color: #000000 !important; /* Màu viền khi tắt */
  box-shadow: none !important; /* Loại bỏ shadow mặc định của Bootstrap */
}

/* Màu sắc nút chuyển đổi khi bật */
.form-check-input:checked::before {
  background-color: #ffffff !important; /* Màu của nút chuyển đổi khi bật */
}

/* Hiệu ứng hover khi bật và tắt */
.form-check-input:hover {
  background-color: #ffffff !important; /* Màu nền khi hover (trạng thái tắt) */
  border-color: #000000 !important; /* Màu viền khi hover (trạng thái tắt) */
}

/* Hiệu ứng hover khi bật */
.form-check-input:checked:hover {
  background-color: #FF4500 !important; /* Màu nền khi hover và bật */
  border-color: #FF4500 !important; /* Màu viền khi hover và bật */
}

/* Trạng thái focus (khi nhấn vào switch) */
.form-check-input:focus {
  box-shadow: none !important; /* Loại bỏ shadow mặc định khi focus */
  outline: none !important; /* Loại bỏ viền ngoài khi focus */
}

/* Trạng thái active (khi click giữ vào switch) */
.form-check-input:active {
  background-color: #C60000 !important; /* Màu nền khi active (trạng thái tắt) */
  border-color: #C60000 !important; /* Màu viền khi active (trạng thái tắt) */
}

.form-check-input:checked:active {
  background-color: #C60000 !important; /* Màu nền khi active và bật */
  border-color: #C60000 !important; /* Màu viền khi active và bật */
}
</style>
<body class="">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
      </div>
    </div>
  </div>
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images7.alphacoders.com/344/thumb-1920-344223.jpg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom"> <!-- body -->
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-custom-gradient text-white p-3 shadow-primary border-radius-lg py-3 pe-1"> <!-- block dangnhap -->
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Đăng nhập trang quản trị</h4></p>
                  <img src="../assets/img/logo2.png" alt="sportstore logo" style="max-width: 100%; height: auto; display: block; margin: 0 auto;">
                  <!-- <h3 class="text-outline-primary font-weight-bolder text-center text-uppercase">じゃな、sportsman</h3> -->
                  <div class="row mt-3">
                   <!--  <div class="col-2 text-center ms-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-facebook text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center px-1">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-github text-white text-lg"></i>
                      </a>
                    </div>
                    <div class="col-2 text-center me-auto">
                      <a class="btn btn-link px-3" href="javascript:;">
                        <i class="fa fa-google text-white text-lg"></i>
                      </a>
                    </div> -->
                  </div>
                </div>
              </div>
              <div class="card-body">
                <form role="form" class="text-start"  method="post" action="log.php">
                  <div class="input-group input-group-outline my-3">
                    <!-- <label class="form-label">Username</label> -->
                    <input required type="text" name="usname" class="form-control form-control-lg" placeholder="Username" aria-label="Username">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <!-- <label class="form-label">Password</label> -->
                    <input required type="password" name="pass" class="form-control form-control-lg" placeholder="Password" aria-label="Password" id="passInput">
                  </div>
                  <div class="form-check form-switch d-flex align-items-center mb-3">
                    <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                    <label class="form-check-label mb-0 ms-3" for="rememberMe">Ghi nhớ tôi</label>
                  </div><br>


                  <div class="text-center">
                      <button type="submit" class="bg-custom-gradient btn btn-lg btn-primary btn-lg w-100 mt-n3 mb-0">Đăng nhập</button>
                    </div>
									<!-- <p class="mt-4 text-sm text-center">
                    Chưa có tài khoản?
                    <a href="../admin/sign-up.php" class="text-primary text-danger font-weight-bold">Đăng ký</a>
                  </p> -->

                  <p class="mt-4 text-sm text-center">
                    <a href="../index.php" class="text-primary text-danger font-weight-bold">Quay lại trang bán hàng</a>
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      
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
</body>

</html>