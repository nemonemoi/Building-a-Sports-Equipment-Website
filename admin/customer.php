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
    Danh sách khách hàng
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap">
</head>
<?php
    $active='hd';
    require 'aside.php';
  ?>
<div class="w3-container w3-padding-large" style="margin-top: -20px; margin-left: 20px;"> <!-- căn lề -->
<body class="g-sidenav-show " style="background-color: #8EE5EE;">
  <main class="main-content position-relative border-radius-lg " style="margin-top: -35px;">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">

      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5" style="display: flex; flex-wrap: nowrap;">
          <li class="breadcrumb-item text-sm">
                <a class="opacity-5 text-dark" href="dashboard.php">Trang</a>
            </li>
            <li class="breadcrumb-item text-sm"><a href="customer.php" class="text-dark">Danh sách khách hàng</li>
        </ol>
        <h6 class="font-weight-bolder text-dark mb-0">Danh sách khách hàng</h6>
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
    <!-- End Navbar -->
    <div class="container-fluid py-4"> 
    <div class="row">
    <?php
      require 'connect.php';
    ?>
        
        <!-- Nguyên đống này la mot danh muc -->
        <style>
          .ps__thumb-x {
    display: none !important;
}
    .ps__rail-x {
    display: none !important;
}
        </style>
              <div class="row">
                <div class="col-12">
                  <div class="card mb-4" style="margin-left: 60px;">
                    <form action="#" method="get">
                    <div class="card-header pb-2 d-flex align-items-center">
                      <div class="col-3">
                        <h6 class="">Danh sách khách hàng</h6>
                      </div>
                      <!-- <div class="col-6"></div> -->
                      <div class="col-9 d-flex align-items-center  justify-content-end">
                        <div class="input-group w-30 me-3">
                          
                          <input type="text" name="timkiem" class="form-control" placeholder="Nhập tên khách hàng cần tìm..">
                          <button type="submit" class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></button>
                        </div>
                        
                        <!-- <button type="submit" class="btn btn-primary text-white font-weight-bold text-md ms-0 mt-3">
                          Tìm
                        </button> -->
                        <button type="submit" style="background-color: #8EE5EE;" class="btn text-dark font-weight-bold text-md ms-0 mt-3">
                          Tất cả
                        </button>
                      </div>
                    </div>
                    </form>

                    <?php
                      $sql = "SELECT * FROM khach_hang";
                      if(isset($_GET["timkiem"])){
                        $search = $_GET["timkiem"];
                        if ($search != null) {
                          $sql = "SELECT * FROM khach_hang WHERE kh_ten LIKE '%".$search."%'";
                        // } else {
                        //   $message = "Không có tên khách hàng bạn vừa nhập, vui lòng nhập lại.";
                        //   echo "<script type='text/javascript'>alert('$message');</script>";
                        //   header('Refresh: 0;url=custommer.php');
                        }
                      }
                    ?>

                    <div class="card-body px-0 pt-0 pb-2">
                      <div class="table-responsive p-0" style="max-height: 400px; overflow-y: auto;"> <!-- Đặt chiều cao và cuộn dọc -->
                        <!-- table 5 cot -->
                        <table class="table align-items-center mb-0">
                          <thead>
                            <tr>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Khách hàng</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Địa chỉ</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">SĐT</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                              <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày đăng ký</th> -->
                              <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Liên hệ</th> -->
                            </tr>
                          </thead>
                          <tbody>
                            <!-- 1 hang -->
                            <?php
                              $result = $conn->query($sql);
                              if ($result->num_rows > 0) {
                                $result = $conn->query($sql);
                                $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                                foreach ($result_all as $row) {
                                  $tkkhid = $row["KH_MA"];
                                  ?>
                                    <tr class="height-100">
                                      <td>
                                        <div class="d-flex px-1 py-1">
                                            <!-- hinh anh khach hang -->
                                          <div>
                                            <?php
                                              $avatar_url = "../assets/img/cus_img/" . $row["KH_AVATAR"];
                                              echo "<img src='{$avatar_url}' class='avatar avatar-xl me-3' alt='cus'>";
                                            ?> 
                                          </div>
                                          <!-- ten kh -->
                                          <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm text-bold"><?php echo $row["KH_TEN"]; ?></h6>
                                            <p class='text-xs text-secondary mb-0'>Ngày sinh: <?php echo $row["KH_NGAYSINH"]; ?></p>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                      <p class="text-sm font-weight-bold mb-0"><?php echo $row["KH_DIACHI"]; ?></p>
                                      </td>
                                      <!-- SDT-->
                                      <td>
                                        <p class="text-sm font-weight-bold mb-0"><?php echo $row["KH_SDT"]; ?></p>
                                      </td>
                                      <!-- email-->
                                      <td>
                                        <p class="text-sm font-weight-bold mb-0"><?php echo $row["KH_EMAIL"]; ?></p>
                                      </td>
                                      <!-- ngay them -->
                                      <!-- <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold"><?php echo date('d/m/Y', strtotime($row["KH_NGAYDK"])); ?></span>
                                      </td> -->
                                      <!-- <td class="align-middle">
                                      <form method="post" action="edit_staff.php">
                                          <input type="hidden" name="nvid" value="<?php echo $row["KH_MA"]; ?>">
                                          <button onclick="this.form.submit()" class="mt-3 btn btn-link text-primary font-weight-bold text-sm">
                                            Gửi email
                                          </button>
                                        </form>
                                      </td> -->
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
        ?>
        <!-- <a href="staff_add.php" class="btn btn-link mt-n3">+ Thêm nhân viên</a> -->
      </div>
     
    </div>
 
      </div>
      <hr class="horizontal dark my-1">
      <div class="card-body pt-sm-3 pt-0 overflow-auto">
       
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