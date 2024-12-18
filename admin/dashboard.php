
<!DOCTYPE html>
<html lang="en">

<?php
  session_start();
  require 'connect.php';
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
    Trang quản lý Sport Store
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
<body class="g-sidenav-show " style="background-color: #FF8C00;">
  <style>
    .ps__thumb-x {
    display: none !important;
}
    .ps__rail-x {
    display: none !important;
}
    .page-title {
      text-align: center; /* Căn giữa */
      font-size: 2em; /* Kích thước chữ lớn */
      font-family: 'Helvetica'; /* Font chữ dễ đọc */
      color: black; /* Màu chữ tối hơn */
      font-weight: bold; /* In đậm */
      margin-top: 50px; /* Khoảng cách trên */
    }
  </style>
<body class="g-sidenav-show " style="background-color: #FFA54F;">
 
 
           <main class="main-content position-relative border-radius-lg " style="margin-top: -25px;">
     <h1 class="page-title">QUẢN LÝ CỬA HÀNG DỤNG CỤ THỂ THAO</h1>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4" style="margin-left: 140px">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card" style="min-height: 140px; display: flex;">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                  <?php
  // Khởi tạo tháng và năm hiện tại
  $thang = date('m');
  $nam = date('Y');
  
  // Kiểm tra kết nối và chuẩn bị câu truy vấn
  if ($conn) {
      // Truy vấn tất cả doanh thu với điều kiện TT_MA = 3
      $sql = "SELECT HD_TONGTIEN, HD_NGAYLAP FROM hoa_don WHERE TT_MA = 3";
      
      $rs = $conn->query($sql);

      // Kiểm tra kết quả của truy vấn
      if ($rs) {
          $tongdoanhthu = 0; // Khởi tạo biến tổng doanh thu
          
          // Duyệt qua từng dòng kết quả
          while ($row = $rs->fetch_assoc()) {
              // Chuyển đổi HD_NGAYLAP thành kiểu ngày để so sánh
              $ngayLap = date_create($row['HD_NGAYLAP']);
              $month = date_format($ngayLap, 'm');
              $year = date_format($ngayLap, 'Y');
              
              // Kiểm tra nếu tháng và năm của HD_NGAYLAP trùng với tháng và năm hiện tại
              if ($month == $thang && $year == $nam) {
                  // Cộng dồn doanh thu vào $tongdoanhthu
                  $tongdoanhthu += $row['HD_TONGTIEN'];
              }
          }
      } else {
          echo "Lỗi truy vấn: " . $conn->error;
          $tongdoanhthu = 0;
      }
  } else {
      echo "Lỗi kết nối: Không thể kết nối đến cơ sở dữ liệu.";
      $tongdoanhthu = 0;
  }
?>

<!-- Hiển thị doanh thu -->
<p class="text-sm mb-0 text-uppercase font-weight-bold">Doanh thu tháng <?php echo $thang . "/" . $nam ?></p>
<h4 class="font-weight-bolder">
  <?php echo number_format($tongdoanhthu); ?> VND
</h4>
                  
                  </div>
                </div>
                <div class="col-3 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-light border-radius-xl text-center">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
               
                
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card" style="min-height: 140px; display: flex;">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <?php
                      $sql = "select count(*) as sohd, count(case when month(HD_NGAYLAP) = month(sysdate()) then 1 end) as trongthang from hoa_don";
                      $rs = $conn->query($sql);
                      $row = mysqli_fetch_assoc($rs);
                      if ($row["sohd"] != null){
                        $message = "1";
                        $tongsohd = $row["sohd"];
                        $dat_trong_thang = $row["trongthang"];
                      }else {
                        $tongsohd = 0;
                        $dat_trong_thang = 0;
                      }
                    ?>
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Tổng đơn hàng</p>
                    <h4 class="font-weight-bolder">
                      <?php echo $tongsohd ?>
                    </h4>
                    <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">+<?php echo $dat_trong_thang ?></span>
                      trong tháng
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center border-radius-xl">
                    <i class="fas fa-file-invoice-dollar text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                  <!-- <img style="height:55px;" src="https://img.icons8.com/3d-fluency/94/null/bill.png"/> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
            <div class="card" style="min-height: 140px; display: flex;">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <?php
                      $sql_kh = "select count(KH_MA) as countkh, count(case when month(KH_NGAYDK) = month(sysdate()) then 1 end) as trongthang from khach_hang";
                      $rs_kh = $conn->query($sql_kh);
                      if ($rs_kh->num_rows > 0){
                        $row_kh = mysqli_fetch_assoc($rs_kh);
                        $countkh = $row_kh["countkh"];
                        $dk_trong_thang = $row_kh["trongthang"];
                      } else {
                        $countkh = 0;
                        $dk_trong_thang = 0;
                      }
                    ?>
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Tổng số khách hàng</p>
                    <h4 class="font-weight-bolder">
                      <?php echo $countkh ?>
                    </h4>
                    <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">+<?php echo $dk_trong_thang ?></span>
                      trong tháng
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center border-radius-xl ">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                  <!-- <img style="height:55px;" src="https://img.icons8.com/3d-fluency/94/null/businessman.png"/> -->
                </div>
              </div>
            </div>
          </div>
        </div>
        
                
                  <!-- <img style="height:55px;" src="https://img.icons8.com/3d-fluency/94/null/manager.png"/> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
  <div class="col-lg-12 mb-lg-0 mb-4">
    <div class="card z-index-2 h-100" style="margin-left: 20px;">
      <!-- Card Header -->
      <div class="card-header pb-0 pt-3 bg-transparent">
        <form action="#" method="get">
          <div class="row">
            <div class="col-4">
              <label for="start_date">Từ ngày:</label>
              <input type="date" class="form-control" name="start_date" id="start_date" value="<?php echo isset($_GET['start_date']) ? $_GET['start_date'] : ''; ?>" required>
              <!-- <input type="date" class="form-control" name="start_date" id="start_date" required> -->
            </div>
            <div class="col-4">
              <label for="end_date">Đến ngày:</label>
              <input type="date" class="form-control" name="end_date" id="end_date" value="<?php echo isset($_GET['end_date']) ? $_GET['end_date'] : ''; ?>" required>
              <!-- <input type="date" class="form-control" name="end_date" id="end_date" required> -->
            </div>
            <div class="col-2 d-flex align-items-end">
              <button style="margin-top: 30px; background-color: orange" type="submit" class="btn  text-white font-weight-bold text-md">
                Lọc
              </button>
            </div>
          </div>
        </form>
        <?php
$tongdt = 0; // Tổng doanh thu mặc định là 0
$json_data = json_encode(array_fill(1, 12, 0)); // Mảng doanh thu ban đầu trống

if (isset($_GET['start_date']) && isset($_GET['end_date'])) {
    $start_date = $_GET['start_date'];
    $end_date = $_GET['end_date'];

    // Truy vấn dữ liệu từ cơ sở dữ liệu
    $sql = "SELECT MONTH(HD_NGAYLAP) AS THANG, SUM(HD_TONGTIEN) AS DOANH_THU 
            FROM HOA_DON 
            WHERE TT_MA = 3 AND HD_NGAYLAP BETWEEN '{$start_date}' AND '{$end_date}'
            GROUP BY THANG";
    $result = mysqli_query($conn, $sql);

    // Kiểm tra kết quả truy vấn
    if ($result) {
        $months = array_fill(1, 12, 0); // Mảng dữ liệu doanh thu theo tháng
        while ($row = mysqli_fetch_assoc($result)) {
            $months[$row['THANG']] = $row['DOANH_THU']; // Cập nhật doanh thu từng tháng
            $tongdt += $row['DOANH_THU']; // Cộng dồn tổng doanh thu
        }
        $json_data = json_encode($months); // Chuyển đổi mảng doanh thu thành JSON
    } else {
        echo "<p class='text-danger'>Không thể truy vấn dữ liệu. Lỗi: " . mysqli_error($conn) . "</p>";
    }
}
?>

    <div id="myDataMonth" data-json='<?php echo $json_data; ?>'></div>
    <script>
        var div = document.querySelector(".chart-here");
        div.innerHTML = "<canvas id=\"myChart-y\" height=\"80%\" class=\"chart-canvas\"></canvas>";
    </script>

        

      <!-- Card Body -->
      <div class="card-body p-3">
        <div class="chart-here">
          <!-- Biểu đồ sẽ hiển thị ở đây -->
          <canvas id="myChart-y" style="height: 350px; width: 100%;"></canvas>
        </div>
      </div>
<div class="col-lg-12 d-flex flex-column align-items-center justify-content-center mt-4">
  <span class="fw-bold">Tổng doanh thu:</span>
  <h5 class="text-success mt-2"><?php echo number_format($tongdt, 0); ?> VNĐ</h5>
</div>

      </div>
    </div>
  </div>
</div>
<style>

  .card-body .col-lg-12 {
    text-align: center; /* Căn giữa text */
    justify-content: center; /* Căn giữa theo chiều ngang */
    align-items: center; /* Căn giữa theo chiều dọc */
    margin-top: -10px; /* Đẩy phần tử lên trên một chút */
  }

  .card-body .col-lg-12 span {
    margin-bottom: -40px; /* Khoảng cách giữa dòng chữ và tổng doanh thu */
  }

  .card-body .col-lg-12 h5 {
    margin: 0; /* Xóa margin thừa */
  }



  .chart-here {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 300px; /* Chiều cao cho biểu đồ */
    overflow: hidden; /* Đảm bảo không bị tràn */
  }

  .chart-here canvas {
    max-width: 100%; /* Đảm bảo canvas không tràn */
    max-height: 100%;
  }
</style>



              
        
              </div>
            </div>
          </div>
        </div>
      <!-- banner trong dashboard -->
      <!-- thong ke don hang theo loai -->
      <div class="row mt-4">
        <div class="col-lg-6 mb-lg-0 mb-4" style="margin-left: 50px;">
          <div class="card ">
            <div class="card-header pb-0 p-3">
              <div class="d-flex justify-content-between">
                <h6 class="mb-2">Đơn theo loại hàng</h6>
              </div>
            </div>
            <?php
              $sql_android="select count(ct.cthd_slb) as tongspandroid
                      from chi_tiet_hd ct
                      inner join san_pham sp on sp.SP_MA = ct.SP_MA
                      inner join loai_sp l on l.LSP_MA = sp.LSP_MA
                      where l.LSP_MA=1";
              $rs = $conn->query($sql_android);
              $row = mysqli_fetch_assoc($rs);
              $tongsp_android = $row["tongspandroid"];

              $sql_iphone="select count(ct.cthd_slb) as tongspip
                        from chi_tiet_hd ct
                        inner join san_pham sp on sp.SP_MA = ct.SP_MA
                        inner join loai_sp l on l.LSP_MA = sp.LSP_MA
                        where l.LSP_MA=2";
              $rs = $conn->query($sql_iphone);
              $row = mysqli_fetch_assoc($rs);
              $tongsp_iphone = $row["tongspip"];

              $sql_tt="select count(ct.cthd_slb) as tongsp
                        from chi_tiet_hd ct
                        inner join san_pham sp on sp.SP_MA = ct.SP_MA
                        inner join loai_sp l on l.LSP_MA = sp.LSP_MA
                        where l.LSP_MA=3";
              $rs = $conn->query($sql_tt);
              $row = mysqli_fetch_assoc($rs);
              $tongsp_tt = $row["tongsp"];

             $sql = "SELECT SUM(SAN_PHAM.SP_GIA * CHI_TIET_HD.CTHD_SLB) AS TONG_TIEN
                                    FROM SAN_PHAM
                                    JOIN LOAI_SP ON SAN_PHAM.LSP_MA = LOAI_SP.LSP_MA
                                    JOIN CHI_TIET_HD ON SAN_PHAM.SP_MA = CHI_TIET_HD.SP_MA
                                    GROUP BY LOAI_SP.LSP_TEN";

              $result = $conn->query($sql);
              
              $row1 = $result->fetch_assoc();
              if ($row1) {
                  $tt_android = $row1['TONG_TIEN'];
              } else {
                  $tt_android = 0;
              }

              $row2 = $result->fetch_assoc();
              if ($row2) {
                  $tt_iphone = $row2['TONG_TIEN'];
              } else {
                  $tt_iphone = 0;
              }

              $row3 = $result->fetch_assoc();
              if ($row3) {
                  $tt_tt = $row3['TONG_TIEN'];
              } else {
                  $tt_tt = 0;
              }

              


            ?>
            <div class="table-responsive">
              <table class="table align-items-center ">
                <tbody>
                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                        <div class="icon icon-shape bg-gradient-primary shadow-warning text-center rounded-circle">
                        <i class="fa-brands fa-superpowers"></i>
                        </div>
                        <div class="ms-4">
                          <p class="text-xs font-weight-bold mb-0">Loại:</p>
                          <h6 class="text-sm mb-0">Bóng</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Đã bán:</p>
                        <h6 class="text-sm mb-0"><?php echo $tongsp_android . " đơn" ;?></h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Tổng thu:</p>
                        <h6 class="text-sm mb-0"><?php echo number_format($tt_android, 0) ; ?>đ</h6>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                        <div class="icon icon-shape bg-gradient-success shadow-warning text-center rounded-circle">
                        <i class="fa-brands fa-grav"></i>
                        </div>
                        <div class="ms-4">
                          <p class="text-xs font-weight-bold mb-0">Loại:</p>
                          <h6 class="text-sm mb-0">Phụ kiện thể thao</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Đã bán:</p>
                        <h6 class="text-sm mb-0"><?php echo $tongsp_iphone . " đơn" ; ?></h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Tổng thu:</p>
                        <h6 class="text-sm mb-0"><?php echo number_format($tt_iphone, 0); ?>đ</h6>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td class="w-30">
                      <div class="d-flex px-2 py-1 align-items-center">
                        <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                        <i class="fa-brands fa-deviantart"></i>
                        </div>
                        <div class="ms-4">
                          <p class="text-xs font-weight-bold mb-0">Loại:</p>
                          <h6 class="text-sm mb-0">Dụng cụ thể thao</h6>
                        </div>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Đã bán:</p>
                        <h6 class="text-sm mb-0"><?php echo $tongsp_tt . " đơn" ; ?></h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Tổng thu:</p>
                        <h6 class="text-sm mb-0"><?php echo number_format($tt_tt, 0); ?>đ</h6>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-lg-5">
          <div class="card">
            <?php
              $sql = "select sp.sp_ma as id, sp.sp_ten as ten, sp.SP_HINHANH as anh, sum(ct.cthd_slb) as so_ban, count(distinct ct.hd_stt) as so_hd
                      from san_pham sp
                      join chi_tiet_hd ct on sp.sp_ma = ct.sp_ma
                      group by sp.sp_ma, sp.sp_ten
                      order by so_ban desc
                      limit 4";

              $result = $conn->query($sql);
              $row1 = $result->fetch_assoc();
              $row2 = $result->fetch_assoc();
              $row3 = $result->fetch_assoc();
              $row4 = $result->fetch_assoc();

              $top1_id = $row1["id"];
              $top1_ten = $row1["ten"];
              $top1_soban = $row1["so_ban"];
              $top1_anh = $row1["anh"];
              $top1_hd = $row1["so_hd"];

              $top2_id = $row2["id"];
              $top2_ten = $row2["ten"];
              $top2_soban = $row2["so_ban"];
              $top2_anh = $row2["anh"];
              $top2_hd = $row2["so_hd"];

              $top3_id = $row3["id"];
              $top3_ten = $row3["ten"];
              $top3_soban = $row3["so_ban"];
              $top3_anh = $row3["anh"];
              $top3_hd = $row3["so_hd"];

              $top4_id = $row4["id"];
              $top4_ten = $row4["ten"];
              $top4_soban = $row4["so_ban"];
              $top4_anh = $row4["anh"];
              $top4_hd = $row4["so_hd"];

            ?>
            <div class="card-header pb-0 p-3">
              <h6 class="mb-0">Sản phẩm bán chạy</h6>
            </div>
            <div class="card-body p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm mb-3 me-3 bg-gradient-dark shadow text-center">
                      <img class="avatar avatar-md" src="../assets/img/product_img/<?php echo $top1_anh ?>" alt="">
                    </div>
                    <div class="ms-2 d-flex flex-column">
                      <h6 class="mb-1 text-dark text-md"><?php echo $top1_ten ?></h6>
                      <span class="text-sm font-weight-bold">Số đơn hàng: <?php echo $top1_hd ?> - Sản phẩm đã bán: <?php echo $top1_soban ?> </span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <img src="../assets/img/gold_cup.png" style="height:40px; margin-right: 5px;" alt="">
                    <a href="../single_products.php?id=<?php echo $top1_id; ?>"><button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button></a>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm mb-3 me-3 bg-gradient-dark shadow text-center">
                      <img class="avatar avatar-md" src="../assets/img/product_img/<?php echo $top2_anh ?>" alt="">
                    </div>
                    <div class="ms-2 d-flex flex-column">
                      <h6 class="mb-1 text-dark text-md"><?php echo $top2_ten ?></h6>
                      <span class="text-sm font-weight-bold">Số đơn hàng: <?php echo $top2_hd ?> - Sản phẩm đã bán: <?php echo $top2_soban ?> </span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <img src="../assets/img/silver_cup.png" style="height:40px; margin-right: 5px;" alt="">
                    <a href="../single_products.php?id=<?php echo $top2_id; ?>"><button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button></a>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm mb-3 me-3 bg-gradient-dark shadow text-center">
                      <img class="avatar avatar-md" src="../assets/img/product_img/<?php echo $top3_anh ?>" alt="">
                    </div>
                    <div class="ms-2 d-flex flex-column">
                      <h6 class="mb-1 text-dark text-md"><?php echo $top3_ten ?></h6>
                      <span class="text-sm font-weight-bold">Số đơn hàng: <?php echo $top3_hd ?> - Sản phẩm đã bán: <?php echo $top3_soban ?> </span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <img src="../assets/img/copper_cup.png" style="height:40px; margin-right: 5px;" alt="">
                    <a href="../single_products.php?id=<?php echo $top3_id; ?>"><button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button></a>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                  <div class="d-flex align-items-center">
                    <div class="icon icon-shape icon-sm mb-3 me-3 bg-gradient-dark shadow text-center">
                      <img class="avatar avatar-md" src="../assets/img/product_img/<?php echo $top4_anh ?>" alt="">
                    </div>
                    <div class="ms-2 d-flex flex-column">
                      <h6 class="mb-1 text-dark text-md"><?php echo $top4_ten ?></h6>
                      <span class="text-sm font-weight-bold">Số đơn hàng: <?php echo $top4_hd ?> - Sản phẩm đã bán: <?php echo $top4_soban ?> </span>
                    </div>
                  </div>
                  <div class="d-flex">
                    <img src="../assets/img/medal4.png" style="height:40px; margin-right: 5px;" alt="">
                    <a href="../single_products.php?id=<?php echo $top4_id; ?>"><button class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i class="ni ni-bold-right" aria-hidden="true"></i></button></a>
                  </div>
                </li>
              </ul>
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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
  <!-- chart by month -->
  <script>
    var ctx = document.getElementById('myChart-m').getContext('2d');
    var chart = new Chart(ctx, {
      type: 'bar',
      data: {
        let labels = [],
        for (let month = 1; month <= 12; month++) {
          let daysInMonth = new Date(2023, month, 0).getDate();
          for (let day = 1; day <= daysInMonth; day++) {
            labels.push(`${day}/${month}`);
          }
        }
        datasets: [{
          label: 'Doanh thu',
          // data: [2500000, 1950000, 2500000, 1800000, 2000000, 2900000, 3100000, 1800000, 2600000, 2155000 ,2200000, 1500000],
          let data = [];
          for (let i = 0; i < daysInMonth; i++) {
            data.push(Math.floor(Math.random() * 1000000));
          }
          backgroundColor: 'rgba(0, 128, 255, 0.6)',
          borderColor: 'rgba(0, 128, 255, 0.6)',
          borderWidth: 3,
          borderRadius: 5,
        }]
      },
      options: {
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true
            }
          }]
        }
      }
    });
  </script>
  <!-- chart by year -->
  
<script>
    const jsonData = document.getElementById('myDataMonth').getAttribute('data-json');
    const revenueData = JSON.parse(jsonData);

    const labels = Object.keys(revenueData).map(month => `Tháng ${month}`);
    const data = Object.values(revenueData);

    const ctx = document.getElementById('myChart-y').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Doanh thu',
                data: data,
                backgroundColor: "rgba(255, 165, 0, 0.5)", // Màu cam nhạt
      borderColor: "rgba(255, 165, 0, 1)", // Màu cam đậm
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

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
              padding: 10,
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
              padding: 20,
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
  <?php
    $conn->close();
  ?>
</body>
</html>