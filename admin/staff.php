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
    Danh sách nhân viên
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
    $active='nv';
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
        <h6 class="font-weight-bolder text-dark mb-0">Danh sách nhân viên</h6>
    </nav>
</div>
<style>
    .ps__thumb-x {
    display: none !important;
}
    .ps__rail-x {
    display: none !important;
}
</style>

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
              <div class="row">
                <div class="col-12">
                  <div class="card mb-4" style="margin-left: 60px; margin-top: -20px;" >
                    <form action="#" method="get">
                    <div class="card-header pb-2 d-flex align-items-center">
                      <div class="col-3">
                        <h6 class="">Danh sách nhân viên</h6>
                      </div>
                      <!-- <div class="col-6"></div> -->
                      <div class="col-9 d-flex align-items-center  justify-content-end">
                        <div class="input-group w-30 me-3">
                          
                          <input type="text" name="timkiem" class="form-control" placeholder="Nhập tên nhân viên cần tìm..">
                          <button type="submit" class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></button>
                        </div>
                        <button type="submit" class="btn btn-warning text-dark font-weight-bold text-md ms-0 mt-3">
                          Tất cả
                        </button>
                      </div>
                    </div>
                    </form>

                    <?php
                      $sql = "SELECT * FROM nhan_vien";
                      if(isset($_GET["timkiem"])){
                        $search = $_GET["timkiem"];
                        if ($search != null) {
                          $sql = "SELECT * FROM nhan_vien WHERE nv_ten LIKE '%".$search."%'";
                        }
                      }
                    ?>

                    <div class="card-body px-0 pt-0 pb-2">
                      <div class="table-responsive p-0">
                        <!-- table 5 cot -->
                        <table class="table align-items-center mb-0">
                          <thead>
                            <tr>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nhân viên</th>
                              <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th> -->
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Chức vụ</th>
                              <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">SĐT</th>
                              <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                              <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày tuyển</th> -->
                              <th class="text-secondary opacity-7"></th>
                              <th class="text-secondary opacity-7"></th>
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
                                  $tknvid = $row["NV_MA"];
                                  ?>
                                    <tr class="height-100">
                                      <td>
                                        <div class="d-flex px-1 py-1">
                                            <!-- hinh anh nhan vien -->
                                            <div>
                                            <?php
                                              $avatar_url = "../assets/img/staff_img/" . $row["NV_AVATAR"];
                                              echo "<img src='{$avatar_url}' class='avatar avatar-xl me-3' alt='cus'>";
                                            ?> 
                                          </div>

                                          <div>
                                            <!--?php
                                              if($row["NV_AVATAR"]==null){
                                                $file = "macdinh.jpg";
                                              } else {
                                                $file = $row["NV_AVATAR"];
                                              } 
                                              $avatar_url = "../assets/img/staff_img/" . $file;
                                            //   echo "<img src='{$avatar_url}' class='avatar avatar-xl me-3' alt='user1'>";
                                            ?--> 
                                            
                                          </div>
                                          <!-- ngaysinh -->
                                          <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm"><?php echo $row["NV_TEN"]; ?></h6>
                                            <p class='text-xs text-secondary mb-0'>Ngày sinh: <?php echo date('d/m/Y', strtotime($row["NV_NGAYSINH"])); ?></p>
                                          </div>
                                        </div>
                                      </td>
                                      <!-- id -->
                                     <!--  <td class="align-middle text-center">
                                        <p class="text-sm font-weight-bold mb-0"><?php echo $tknvid; ?></p>
                                      </td> -->
                                      <!-- vaitro -->
                                      <td>
                                        <?php
                                            if($row["CV_MA"] == "2") {
                                              ?>
                                                <p class="text-sm font-weight-bold mb-0">Nhân viên</p>
                                              <?php
                                            } else if($row["CV_MA"] == 3) {
                                              ?>
                                                <p class="text-sm font-weight-bold mb-0">Nhân viên</p>
                                              <?php
                                            } else{
                                              ?>
                                                <p class="text-sm font-weight-bold mb-0 text-success">Quản lý</p>
                                              <?php
                                            }
                                          ?>
                                      </td>
                                      <!-- SDT-->
                                      <td>
                                        <p class="text-sm font-weight-bold mb-0"><?php echo $row["NV_SDT"]; ?></p>
                                      </td>
                                      <!-- email-->
                                      <td>
                                        <p class="text-sm font-weight-bold mb-0"><?php echo $row["NV_EMAIL"]; ?></p>
                                      </td>
                                      <!-- ngay them -->
                                     <!--  <td class="align-middle text-center">
                                        <span class="text-secondary text-xs font-weight-bold"><?php echo date('d/m/Y', strtotime($row["NV_NGAYTUYEN"])); ?></span>
                                      </td> -->
                                      <td class="align-middle">
                                      <form method="post" action="edit_staff.php">
                                          <input type="hidden" name="nvid" value="<?php echo $row["NV_MA"]; ?>">
                                          <button onclick="this.form.submit()" class="mt-3 btn btn-link text-primary font-weight-bold text-sm">
                                            Sửa
                                          </button>
                                        </form>
                                      </td>
                                      <td class="align-middle">
                                        <form method="post" action="del_staff.php">
                                          <input type="hidden" name="nvid" value="<?php echo $row["NV_MA"]; ?>">
                                          <?php
                                            if($row["NV_MA"] == $_SESSION["nvid"]) {
                                              ?>
                                                <a style="margin-left: -37px !important;" class="mt-3 ms-n4 text-secondary font-weight-bold text-sm">
                                                  Xoá
                                                </a>
                                              <?php
                                            } else {
                                              ?>
                                                <button onclick="this.form.submit()" class="mt-3 ms-n5 btn btn-link text-warning text-secondary font-weight-bold text-sm">
                                                  Xoá
                                                </button>
                                              <?php
                                            }
                                          ?>
                                        </form>
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
        ?>
        <a href="add_staff.php" class="btn btn-link text-dark font-weight-bold mt-n3">+ Thêm nhân viên</a>
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