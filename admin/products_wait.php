
<!DOCTYPE html>
<html lang="en">

<?php
  session_start();
  require 'connect.php';
?>

<head>
<meta charset="utf-8" />
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
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
	<script>
		$(document).ready( function () {
			$('#myTable').DataTable();
		} );
	</script>
  <style>
    <style>
   table th, table td {
    padding: 4px 8px; /* Giảm padding giữa các ô */
    font-size: 12px;
    max-width: 150px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.ps__thumb-x {
    display: none !important;
}
    .ps__rail-x {
    display: none !important;
}

.avatar-md {
    width: 30px; /* Giảm kích thước avatar */
    height: 30px;
}

    #myTable tbody tr:nth-child(odd) {
      background-color: #ffffff;
    }
    #myTable tbody tr {
      height: 10px;
    }
    /* Giảm kích thước font của bảng */
    .table td, .table th {
      font-size: 12px;
      padding: 5px;
    }
    /* Giới hạn chiều rộng từng cột */
    .table .short-col {
      max-width: 50px; 
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
</style>

    
  <title>
    Đơn hàng
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
    $active='dh';
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
            <li class="breadcrumb-item text-sm"><a href="products_wait.php" class="text-dark">Đơn hàng</li>
        </ol>
        <h6 class="font-weight-bolder text-dark mb-0">Danh sách đơn hàng</h6>
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
    <div class="row"> 
        <div class="col-12 px-4 my-3">
              <div class="card mb-4" style="margin-left: 20px;">
                <form action="#" method="get">
                  <div class="card-header pb-2 d-flex align-items-center">
                    <div class="col-3">
                      <h5>Danh sách đơn hàng</h5>
                    </div>
                    <div class="col-4"></div>
                    <div class="col-2 me-2" style="margin-left: 180px;">
                      <select class="form-control form-control-md" name="status" id="status">
                        <option value="" selected disabled hidden>- Trạng thái -</option>
                        <?php
                          $sql = "SELECT * FROM trang_thai WHERE TT_MA BETWEEN 0 and 4";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) {
                            $result = $conn->query($sql);
                            $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                            foreach ($result_all as $row) {
                              echo "<option value=" .$row["TT_MA"]. ">".$row["TT_TEN"]. "</option>";
                            }                          
                          } else {
                            echo "<option value=''>Không có dữ liệu</option>";
                          }
                        ?>
                      </select>
                    </div>
                    <!-- <div class="col-2">
                      <select class="form-control form-control-md" name="method" id="method">
                        <option value="" selected disabled hidden>- Phương thức thanh toán -</option>
                        <?php
                          $sql = "SELECT * FROM phuong_thuc_thanh_toan";
                          $result = $conn->query($sql);
                          if ($result->num_rows > 0) {
                            $result = $conn->query($sql);
                            $result_all = $result -> fetch_all(MYSQLI_ASSOC);
                            foreach ($result_all as $row) {
                              echo "<option value=" .$row["PTTT_MA"]. ">".$row["PTTT_TEN"]. "</option>";
                            }                          
                          } else {
                            echo "<option value=''>Không có dữ liệu</option>";
                          }
                        ?>
                      </select>
                    </div> -->
                    <div class="px-2 col-1 font-weight-bold">
                      <button type="submit" style="background-color: #8EE5EE;" class="btn text-dark font-weight-bold text-md ms-0 mt-3">
                        Lọc
                      </button>
                      <!-- đổi lại button -->
                    </div>
                  </div>
                </form>
                

                <?php
    $sql = "SELECT * FROM hoa_don WHERE TT_MA BETWEEN 0 AND 2";
    if (isset($_GET["status"])) {
        $sql = "SELECT * FROM hoa_don WHERE TT_MA = {$_GET["status"]}";
    }
    $sql .= " ORDER BY HD_STT DESC";
?>            
<div class="card-body px-0 pt-0 pb-2">
    <div class="table-responsive p-0" style="max-height: 400px; overflow-y: auto;"> <!-- Đặt chiều cao và cuộn dọc -->
    <!-- table 5 cot -->
    <table class="table align-items-center mb-0">
        <thead>
            <tr>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Mã đơn</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 short-col">Khách hàng</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nhân viên tiếp nhận</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tổng tiền</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Ngày đặt hàng</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng thái</th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7"></th>
            </tr>
        </thead>
        <tbody>
        <!-- 1 hang -->
        <?php
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $result_all = $result->fetch_all(MYSQLI_ASSOC);
                foreach ($result_all as $row) {
                    $nvid = $row["NV_MA"];
                    $lidohuy = $row["HD_LIDOHUY"];

                    // Sửa lại câu truy vấn lấy thông tin khách hàng dựa trên từng hóa đơn
                    $sql_kh = "SELECT kh.KH_MA AS makh, kh.KH_TEN, kh.KH_DIACHI, kh.KH_SDT, kh.KH_EMAIL, kh.KH_GIOITINH, kh.KH_NGAYSINH, kh.KH_AVATAR
                               FROM khach_hang kh
                               JOIN gio_hang gh ON kh.KH_MA = gh.KH_MA
                               JOIN hoa_don hd ON gh.GH_MA = hd.GH_MA
                               WHERE hd.HD_STT = {$row["HD_STT"]}";

                    $result1 = $conn->query($sql_kh);
                    if ($result1->num_rows > 0) {
                        $row1 = $result1->fetch_assoc();

                        $sql_tt = "SELECT * FROM trang_thai WHERE TT_MA = {$row["TT_MA"]}";
                        $result3 = $conn->query($sql_tt);
                        $row3 = mysqli_fetch_assoc($result3);
        ?>
        <tr class="height-100">
            <!-- Ma hoa don -->
            <td class="align-middle text-center ">
                <p class="text-sm font-weight-bold mb-0"><?php echo $row["HD_STT"]; ?></p>
            </td>
            <td>
                <div class="d-flex px-1 py-1">
                    <!-- hinh anh khach hang -->
                    <div>
                        <?php
                            $avatar_url = "../assets/img/cus_img/" . $row1["KH_AVATAR"];
                            echo "<img src='{$avatar_url}' class='avatar avatar-md me-3 mt-3' alt='cus'>";
                        ?> 
                    </div>
                    <!-- ten kh -->
                    <div class="d-flex flex-column justify-content-center">
                        <h6 class="mb-0 text-sm"><?php echo $row1["KH_TEN"]; ?></h6>
                        <p class="text-xs text-secondary mb-0">Ngày sinh: <?php echo $row1["KH_NGAYSINH"]; ?></p>
                        <p class="text-xs text-secondary mb-0">Địa chỉ: <?php echo $row1["KH_DIACHI"]; ?></p>
                    </div>
                </div>
            </td>

            <!-- Nhan vien tiep nhan -->
            <td>
                <?php
                if ($nvid != null) {
                    $sqlnv = "SELECT NV_TEN FROM nhan_vien WHERE NV_MA = {$nvid}";
                    $rsnv = $conn->query($sqlnv);
                    $rownv = mysqli_fetch_assoc($rsnv);
                    $tennv = $rownv["NV_TEN"];
                } else {
                    $tennv = "Chưa được duyệt!";
                }
                ?>
                <p class="text-xs font-weight-bold mb-0"><?php echo $tennv; ?></p>
            </td>
            <!-- Tong tien-->
            <td>
                <p class="text-s text-success font-weight-bold mb-0"><?php echo number_format($row["HD_TONGTIEN"], 0) ?> VNĐ</p>
            </td>
            
            <!-- ngay them -->
            <td class="align-middle text-center">
                <span class="text-secondary text-xs font-weight-bold"><?php echo date('d/m/Y', strtotime($row["HD_NGAYLAP"])); ?></span>
            </td>
            <!-- status-->
            <td class="align-middle text-center">
                <?php
                    if ($row3["TT_MA"] == 1) $style = "btn-warning";
                    elseif ($row3["TT_MA"] == 2) $style = "btn-primary";
                    elseif ($row3["TT_MA"] == 0) $style = "btn-danger";
                    else $style = "text-success";
                ?>
                <button class="btn text-xs font-weight-bold mb-0 <?php echo $style; ?>"><?php echo $row3["TT_TEN"]; ?></button>
            </td>
            <td class="align-middle">
                <form action="detail-pdwait.php" method="post">
                    <input type="hidden" name="mahd" value="<?php echo $row["HD_STT"]; ?>">
                    <input type="hidden" name="madvc" value="<?php echo $row["DVC_MA"]; ?>">
                    <input type="hidden" name="avtkh" value="<?php echo $row1["KH_AVATAR"]; ?>">
                    <input type="hidden" name="tenkh" value="<?php echo $row1["KH_TEN"]; ?>">
                    <input type="hidden" name="ngaysinh" value="<?php echo $row1["KH_NGAYSINH"]; ?>">
                    <input type="hidden" name="diachikh" value="<?php echo $row1["KH_DIACHI"]; ?>">
                    <input type="hidden" name="sdtkh" value="<?php echo $row1["KH_SDT"]; ?>">
                    <input type="hidden" name="emailkh" value="<?php echo $row1["KH_EMAIL"]; ?>">
                    <input type="hidden" name="tongtien" value="<?php echo $row["HD_TONGTIEN"]; ?>">
                    <input type="hidden" name="ngaydat" value="<?php echo $row["HD_NGAYLAP"]; ?>">
                    <input type="hidden" name="trangthai" value="<?php echo $row3["TT_MA"]; ?>">
                    <input type="hidden" name="tentrangthai" value="<?php echo $row3["TT_TEN"]; ?>">
                    <input type="hidden" name="lidohuy" value="<?php echo $lidohuy; ?>">
                    
                    <button type="submit" class="mt-4 btn btn-link text-primary font-weight-bold text-xs">
                        Xem chi tiết ->
                    </button>
                </form>
            </td>
        </tr>
        <?php
                    }
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
</main>

  
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 5,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 10,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
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