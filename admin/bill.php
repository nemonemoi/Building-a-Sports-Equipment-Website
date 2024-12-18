
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
  <style>
    #myTable tbody tr:nth-child(odd) {
      background-color: #ffffff;
    }
    #myTable tbody tr {
      height: 10px;
    }
  </style>
  <title>
    Hoá đơn
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
    $active='hd';
    require 'aside.php';
  ?>
<div class="w3-container w3-padding-large" style="margin-top: -20px; margin-left: 20px;"> <!-- căn lề -->
<body class="g-sidenav-show " style="background-color: #8EE5EE;">
  <main class="main-content position-relative border-radius-lg " style="margin-top: -25px;">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
          <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="dashboard.php">Trang</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Hoá đơn</li>
          </ol>
          <h6 class="font-weight-bolder text-dark mb-0">Hoá đơn</h6>
        </nav>
        <!-- Đoạn này -->
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              <!-- <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
              <input type="text" class="form-control" placeholder="Type here..."> -->
            </div>
          </div>
        
          <?php require 'nav.php'; ?>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <?php
      require 'connect.php';
    ?>



<div class="container-fluid py-4">
  <div class="row">
    <div class="col-lg-8">
      <div class="row">
        <div class="col-4">
          <!-- Nội dung của col-4 nếu cần -->
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-lg-8" style="margin-left: 20px; margin-top: -60px;">
      <div class="card h-70">
        <div class="card-header pb-0 p-3">
          <div class="row">
            <div class="col-6 d-flex align-items-center">
              <h6 class="mb-0">Danh sách hoá đơn</h6>
            </div>
            <div class="col-6 text-end">
              <?php
              $sql = "SELECT * FROM hoa_don WHERE TT_MA = 3;";
              ?>
            </div>
          </div>
        </div>
        <div class="card-body p-3 pb-0">
          <div class="table-responsive p-0">
            <!-- Table -->
            <table id="myTable" class="display table align-items-center mb-0">
              <thead>
                <tr>
                  <th class="col-1 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mã hoá đơn</th>
                  <th class="col-2 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày hoàn thành</th>
                  <th class="col-1 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Số lượng SP</th>
                  <th class="col-3 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">PT Thanh toán</th>
                  <th class="col-3 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tổng tiền</th>
                  <th class="col-2 text-secondary opacity-7"></th>
                </tr>
              </thead>
              <tbody>
                <?php
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  $result_all = $result->fetch_all(MYSQLI_ASSOC);
                  foreach ($result_all as $row) {
                ?>
                <tr class="h-50">
                  <td class="align-middle text-center"><?php echo $row["HD_STT"]; ?></td>
                  <td class="align-middle text-center"><?php echo date('d/m/Y', strtotime($row["HD_NGAYLAP"])); ?></td>
                  <td class="align-middle text-center">
                    <?php
                    $sql_sl = "SELECT COUNT(*) AS soluong FROM chi_tiet_hd WHERE HD_STT = " . $row["HD_STT"] . ";";
                    $rssl = $conn->query($sql_sl);
                    $rowsl = mysqli_fetch_assoc($rssl);
                    echo $rowsl["soluong"];
                    ?>
                  </td>
                  <td class="align-middle text-xs text-center">
                    <?php
                    $idpttt = $row["PTTT_MA"];
                    $sqlpt = "SELECT PTTT_TEN FROM phuong_thuc_thanh_toan WHERE PTTT_MA = {$idpttt}";
                    $rspt = $conn->query($sqlpt);
                    $rowpt = mysqli_fetch_assoc($rspt);
                    echo $rowpt["PTTT_TEN"];
                    ?>
                  </td>
                  <td class="align-middle font-weight-bold text-success text-center">
                    <?php echo number_format($row["HD_TONGTIEN"], 0); ?>đ
                  </td>
                  <td class="align-middle text-center">
                    <form action="" method="get">
                      <input type="hidden" name="hd_id" value="<?php echo $row["HD_STT"]; ?>">
                      <button type="submit" class="view-btn btn btn-outline-primary text-primary font-weight-bold text-xs mt-3 p-1">
                        Xem chi tiết >
                      </button>
                    </form>
                  </td>
                </tr>
                <?php
                  }
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="col-lg-4" style="margin-left: 800px; margin-top: -900px;">
        <?php
          if(isset($_GET["hd_id"])){
            $hdid = $_GET["hd_id"];
            
            $sql = "select hd.HD_STT as mahd, hd.HD_NGAYLAP as ngay, kh.KH_MA as makh, kh.KH_TEN as tenkh, kh.KH_SDT as sdtkh, kh.KH_DIACHI as dckh, nv.NV_MA as manv, nv.NV_TEN as tennv
                    from gio_hang gh
                    inner join khach_hang kh on kh.KH_MA = gh.KH_MA
                    inner join hoa_don hd on hd.GH_MA = hd.GH_MA
                    inner join nhan_vien nv on hd.NV_MA = nv.NV_MA
                    where hd.HD_STT={$hdid};";
            $rs = $conn->query($sql);
            $row = mysqli_fetch_assoc($rs);
            ?>
          <div class="card" >
            <div class="card-header pb-0 p-3">
              <div class="row">
                <div class="col-6 d-flex align-items-center">
                  <h6 class="mb-0">Chi tiết hoá đơn</h6>
                </div>
                <div class="col-3 text-end me-n3">
                  <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-5"><i class="fas fa-print text-sm me-1"></i> In</button>
                </div>
                <div class="col-3 text-end">
                  <button class="btn btn-link text-dark text-sm mb-0 px-0 ms-1"><i class="fas fa-file-pdf text-sm me-1"></i> Xuất PDF</button>
                </div>
              </div>
            </div>
            <div class="card-body p-3 pb-3">
              <div class="row">
                <div class="col-12"  id="printable-content">
                  <!-- title -->
                  <div class="row text-center fs-5 font-weight-bold">
                    <div class="col-12">
                      HOÁ ĐƠN
                    </div>
                  </div>
                  <!-- ngay -->
                  <div class="row text-center fs- font-weight-bold"> 
                    <div class="col-12">
                      Mã đơn: <?php echo $row["mahd"]; ; $mahd = $row["mahd"]; ?> - Ngày đặt: <?php echo date('d/m/Y', strtotime($row["ngay"])) ?>
                    </div>
                  </div>
                  <!-- thongtin khachhang -->
                  <div class="row mt-3">
                    <div class="col-md-12">
                      <h6>Thông tin khách hàng:</h6>
                      <!-- 1 hang -->
                      <div class="row px-2 mt-2">
                        <div class="col-6">
                          <h6>Mã khách hàng: </h6>
                        </div>
                        <div class="col-6">
                          <p><?php echo $row["makh"] ?></p>
                        </div>
                      </div>
                      <!-- 1 hang -->
                      <div class="row px-2 mt-n3">
                        <div class="col-6">
                          <h6>Tên khách hàng: </h6>
                        </div>
                        <div class="col-6">
                          <p><?php echo $row["tenkh"] ?></p>
                        </div>
                      </div>
                      <!-- 1 hang -->
                      <div class="row px-2 mt-n3">
                        <div class="col-6">
                          <h6>SĐT: </h6>
                        </div>
                        <div class="col-6">
                          <p><?php echo $row["sdtkh"] ?></p>
                        </div>
                      </div>
                      <!-- 1 hang -->
                      <div class="row px-2 mt-n3">
                        <div class="col-6">
                          <h6>Địa chỉ: </h6>
                        </div>
                        <div class="col-6">
                          <p><?php echo $row["dckh"] ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- thongtin nhanvien -->
                  <div class="row mt-3">
                    <div class="col-md-12">
                      <h6>Thông tin nhân viên:</h6>
                      <!-- 1 hang -->
                      <div class="row px-2 mt-2">
                        <div class="col-6">
                          <h6>Mã nhân viên: </h6>
                        </div>
                        <div class="col-6">
                          <p><?php echo $row["manv"] ?></p>
                        </div>
                      </div>
                      <!-- 1 hang -->
                      <div class="row px-2 mt-n3">
                        <div class="col-4">
                          <h6>Tên nhân viên: </h6>
                        </div>
                        <div class="col-8">
                          <p><?php echo $row["tennv"] ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-12">
                      <h6>Danh sách sản phẩm:</h6>
                      <table>
                        <thead>
                          <tr class="col-12">
                            <th class="col-7 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ten SP</th>
                            <th class="col-2 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">SL</th>
                            <th class="col-3 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ĐG</th>
                            <th class="col-3 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">T.Tiền</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                            $sql = "select sp.SP_TEN as tensp, sp.SP_GIA as giasp , ct.CTHD_SLB as slsp, (ct.CTHD_SLB*sp.SP_GIA) as tongtien 
                                    from chi_tiet_hd ct 
                                    join hoa_don hd on hd.HD_STT = ct.HD_STT 
                                    join san_pham sp on sp.SP_MA = ct.SP_MA 
                                    where hd.HD_STT = {$row["mahd"]}; ";

                            $rs = $conn->query($sql);
                            $rs_all = $rs -> fetch_all(MYSQLI_ASSOC);
                            foreach($rs_all as $row){
                              ?>
                              <tr>
                                <td colspan="4">
                                  <hr style="height:1px;border-width:0;color:gray;background-color:gray">
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <?php echo $row["tensp"] ?>
                                </td>
                                <td>
                                  <?php echo $row["slsp"] ?>
                                </td>
                                <td>
                                  <?php echo number_format($row["giasp"], 0) ?>
                                </td>
                                <td>
                                  <?php echo number_format($row["tongtien"], 0) ?>
                                </td>
                              </tr>
                              <?php
                            }

                          ?>
                          <tr>
                            <td colspan="4">
                              <hr style="height:1px;border-width:0;color:gray;background-color:gray">
                            </td>
                          </tr>
                          <tr>
                            <td colspan="4" class="text-end">
                              <?php
                                $sql = "select sum(ct.CTHD_SLB*sp.SP_GIA) as tongtien 
                                        from chi_tiet_hd ct 
                                        join hoa_don hd on hd.HD_STT = ct.HD_STT 
                                        join san_pham sp on sp.SP_MA = ct.SP_MA 
                                        where hd.HD_STT = {$mahd}; ";
                                $rs = $conn->query($sql);
                                $row = mysqli_fetch_assoc($rs);
                              ?>
                              <h7>Thành tiền:</h7>
                              <h6 class="fs-4 mt-n2">
                                <?php echo number_format($row["tongtien"], 0)." đ" ?>
                              </h6> 
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
          <?php 
            } else {
          ?>
              <div class="card">
              <div class="card-header pb-0 p-3">
              <div class="card-body p-3 pb-0">
                <div class="row">
                  <div class="col-12 pt-4 pb-5 text-center">
                    <h5>                      
                      Thông tin chi tiết sẽ xuất hiện ở đây
                    </h5>
                  </div>
                </div>
              </div>
          <?php
            }
          
          ?>
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