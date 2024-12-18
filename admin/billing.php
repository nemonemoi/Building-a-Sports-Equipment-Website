
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
          <h6 class="font-weight-bolder text-dark mb-0">Danh sách hoá đơn</h6>
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
           <div class="row mt-4 " >
            <div class="col-lg-12">
              <div class="card h-102" style="margin-top: -22px; margin-left: 30px;">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Danh sách hoá đơn</h6>
                    </div>
                    <div class="col-6 text-end">
                      <?php
  // Thêm câu lệnh sắp xếp
  $sql = "SELECT * FROM hoa_don WHERE TT_MA = 1 ORDER BY HD_NGAYLAP DESC;";
?>

                      
                    </div>
                  </div>
                </div>
                <div class="card-body p-3 pb-0">
                  <div class="table-responsive p-0" style="max-height: 520px; overflow-y: auto;"> <!-- Đặt chiều cao và cuộn dọc -->
                        <!-- table 5 cot -->
                        <table id="myTable" class="display" class="table align-items-center mb-0">
                          <thead>
                            <tr class="col-12">
                              <th class="col-1 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mã hoá đơn</th>
                              <th class="col-2 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Ngày đặt hàng</th>
                              <!-- <th class="col-1 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Số lượng SP</th> -->
                              <th class="col-3 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Khách hàng</th>
                              <th class="col-3 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tổng tiền</th>
                              <th class="col-2 text-secondary opacity-7"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <!-- 1 hang -->
                            <?php
                              // $sql = "select * from hoa_don";
                              $result = $conn->query($sql);
                              if ($result->num_rows > 0) {
                                $result = $conn->query($sql);
                                $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                                foreach ($result_all as $row) {

                                  ?>
                                  <tr class="h-50">
                                    <td class="align-middle text-center" >
                                      <!-- ma hd -->
                                      <?php echo $row["HD_STT"] ?>
                                    </td>
                                    <td class="align-middle text-center">
                                      
                                      <?php echo date('d/m/Y', strtotime($row["HD_NGAYLAP"])) ?>
                                    </td>
                                   
                                    <td class="align-middle font-weight-bold">
                                      <?php
          // Truy vấn thông tin khách hàng, bao gồm ảnh đại diện
          $kh_ma = $row["KH_MA"]; // Đảm bảo cột KH_MA có trong bảng hoa_don
          $sql_kh = "SELECT KH_TEN, KH_AVATAR FROM khach_hang WHERE KH_MA = {$kh_ma}";
          $rs_kh = $conn->query($sql_kh);
          $row_kh = mysqli_fetch_assoc($rs_kh);

          // Hiển thị ảnh đại diện và tên khách hàng
          if (!empty($row_kh["KH_AVATAR"])) {
            echo '<img src="../assets/img/cus_img/' . $row_kh["KH_AVATAR"] . '" alt="Avatar" class="avatar avatar-md me-3 " style="width: 30px; height: 30px; object-fit: cover;">';
          } else {
            echo '<img src="path/to/default-avatar.png" alt="Default Avatar" class="avatar avatar-md me-3 " style="width: 30px; height: 30px; object-fit: cover;">';
          }
          echo htmlspecialchars($row_kh["KH_TEN"]); // Hiển thị tên khách hàng
          ?>
                          </td>
                                    

                                    <td class="align-middle font-weight-bold text-success text-center">
                                      <!-- tongtien -->
                                      <?php echo number_format($row["HD_TONGTIEN"], 0) ?>đ
                                    </td>
                                    <td class="align-middle text-center">
                                      <form action="" method="get">
                                        <input type="hidden" name="hd_id" value="<?php echo $row["HD_STT"] ?>">
                                        <button onclick="this.form.submit()" class="view-btn btn btn-outline-primary text-primary font-weight-bold text-xs mt-3 p-1">
                                          Xem chi tiết >
                                        </button>
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
        </div>
        <div class="col-lg-4">
            <?php
      if (isset($_GET["hd_id"])) {
        $hdid = $_GET["hd_id"];
      $sql = "SELECT 
            hd.HD_STT AS mahd, 
            hd.HD_NGAYLAP AS ngay, 
            kh.KH_MA AS makh, 
            kh.KH_TEN AS tenkh,
            kh.KH_EMAIL AS mailkh, 
            kh.KH_SDT AS sdtkh, 
            dvc.DVC_DIACHI AS diachi_giao
        FROM 
            hoa_don hd
        INNER JOIN 
            gio_hang gh ON gh.GH_MA = hd.GH_MA
        INNER JOIN 
            khach_hang kh ON kh.KH_MA = gh.KH_MA
        LEFT JOIN 
            don_van_chuyen dvc ON dvc.DVC_MA = hd.DVC_MA
        WHERE 
            hd.HD_STT = {$hdid};";
$rs = $conn->query($sql);
$row = mysqli_fetch_assoc($rs);
?>

          <div class="card">
            <div class="card-header pb-0 p-3">
              <div style="display: flex; justify-content: space-between; align-items: center;">
                <div >
                  <h6>Chi tiết hoá đơn</h6>
                </div>
                
                <div>
                  <button style="width: 100px; height: 50px; background-color: #8EE5EE; border-radius: 20px; border: none; font-weight: bold;" onclick="sendEmail()">Gửi email </button>
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
                      <h6 class="font-weight-bolder">Thông tin khách hàng:</h6>
                      <!-- 1 hang -->
                      <div class="row px-2 mt-2">
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
                          <h6>Email khách hàng: </h6>
                        </div>
                        <div class="col-6">
                          <p><?php echo $row["mailkh"] ?></p>
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
                      
                       <!-- Hàng 3: Địa chỉ giao hàng -->
    <div class="row px-2 mt-n3">
    <div class="col-6">
        <h6>Địa chỉ giao hàng: </h6>
    </div>
    <div class="col-6">
        <p>
            <?php 
            echo $row["diachi_giao"] ? $row["diachi_giao"] : "Không có thông tin địa chỉ giao hàng."; 
            ?>
        </p>
    </div>
</div>


                    </div>
                  </div>
                 
                  <div class="row mt-3">
    <div class="col-md-12">
        <h6 class="font-weight-bolder">Danh sách sản phẩm:</h6>
        <table>
            <thead>
                <tr class="col-12">
                    <th class="col-7 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tên SP</th>
                    <th class="col-2 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">SL</th>
                    <th class="col-3 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">ĐG</th>
                    <th class="col-3 text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">T.Tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Truy vấn để lấy danh sách sản phẩm
                $sql = "SELECT 
                            sp.SP_TEN AS tensp, 
                            sp.SP_GIA AS giasp, 
                            ct.CTHD_SLB AS slsp, 
                            (ct.CTHD_SLB * sp.SP_GIA) AS tongtien 
                        FROM chi_tiet_hd ct 
                        JOIN hoa_don hd ON hd.HD_STT = ct.HD_STT 
                        JOIN san_pham sp ON sp.SP_MA = ct.SP_MA 
                        WHERE hd.HD_STT = {$row['mahd']}";

                $rs = $conn->query($sql);
                $rs_all = $rs->fetch_all(MYSQLI_ASSOC);
                foreach ($rs_all as $row) {
                    ?>
                    <tr>
                        <td colspan="4">
                            <hr style="height:1px;border-width:0;color:gray;background-color:gray">
                        </td>
                    </tr>
                    <tr>
                        <td class="font-weight-bolder">
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
                <!-- <tr>
                    <td colspan="4" class="text-end">
                        <--?php
                        // Truy vấn để lấy tổng tiền từ bảng hoa_don
                        $sql_total = "SELECT HD_TONGTIEN FROM hoa_don WHERE HD_STT = {$mahd}";
                        $result_total = $conn->query($sql_total);
                        $row_total = $result_total->fetch_assoc();
                        $tongtien = $row_total["HD_TONGTIEN"];
                        ?>
                        <h7>Thành tiền:</h7>
                        <h6 class="fs-4 mt-n2">
                            <--?php echo number_format($tongtien, 0) . " đ" ?>
                        </h6>
                    </td>
                </tr> -->
                
              <tr>
    <tr>
    <td colspan="4" class="text-end">
        <?php
        // Truy vấn Thành tiền
        $sql = "SELECT SUM(ct.CTHD_SLB * sp.SP_GIA) AS tongtien 
                FROM chi_tiet_hd ct 
                JOIN hoa_don hd ON hd.HD_STT = ct.HD_STT 
                JOIN san_pham sp ON sp.SP_MA = ct.SP_MA 
                WHERE hd.HD_STT = {$mahd};";
        $rs = $conn->query($sql);
        $row = mysqli_fetch_assoc($rs);
        $thanhTien = $row["tongtien"];
        ?>
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <span><strong>Thành tiền:</strong></span>
            <span style="font-weight: bold;"><?php echo number_format($thanhTien, 0) . " đ"; ?></span>
        </div>
    </td>
</tr>
<tr>
    <td colspan="4" class="text-end">
        <?php
        // Truy vấn Tổng tiền
        $sql_total = "SELECT HD_TONGTIEN FROM hoa_don WHERE HD_STT = {$mahd}";
        $result_total = $conn->query($sql_total);
        if ($result_total) {
            $row_total = $result_total->fetch_assoc();
            $tongTien = $row_total["HD_TONGTIEN"];
        } else {
            $tongTien = 0; // Gán mặc định nếu truy vấn thất bại
            echo "Truy vấn tổng tiền không hợp lệ: " . $conn->error;
        }

        // Tính Phí vận chuyển
        $phiVanChuyen = $tongTien - $thanhTien;
        ?>
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <span><strong>Phí vận chuyển:</strong></span>
            <span style="font-weight: bold;"><?php echo number_format($phiVanChuyen, 0) . " đ"; ?></span>
        </div>
    </td>
</tr>

<tr>
  <td colspan="4" class="text-end">
  <div style="display: flex; justify-content: space-between; align-items: center; color: red; font-size: 25px;">
            <span><strong>Tổng tiền:</strong></span>
            <span style="font-weight: bold; color: red;"><?php echo number_format($tongTien, 0) . " đ"; ?></span>
        </div>
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
            </div>
          </div>
          <?php 
            } else {
          ?>
              <div class="card">
              <div class="card-header pb-0 p-3"></div>
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
  </main>

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
  <script>
    function sendEmail() {
    if (confirm("Bạn có chắc chắn muốn gửi hóa đơn qua email?")) {
        // Chuyển đến một endpoint PHP để xử lý
      window.location.href = "/draft/admin/send_invoice_mail.php?mahd=<?php echo $mahd; ?>";

    }
}
  </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
  include 'send_invoice_mail.php';

</body>

</html>
