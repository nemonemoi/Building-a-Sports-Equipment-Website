
<!DOCTYPE php>
<php lang="en">

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
    Chi tiết đơn hàng
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
        <h6 class="font-weight-bolder text-dark mb-0">Trạng thái đơn hàng</h6>
    </nav>
</div>


       <!-- Đoạn này -->
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
             
          <?php require 'nav.php'; ?>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    
    
    <div class="container-fuild mx-3">
      <div class="col-12">
        <div class="row">
          <div class="col-9">
            <div class="row">
              <div class="col-12  px-4">
                  <div class="card mb-4">
                    <?php 
                      $mahd = $_POST["mahd"];
                      $avtkh = $_POST["avtkh"];
                      $tenkh = $_POST["tenkh"];
                      $diachikh = $_POST["diachikh"];
                      $emailkh = $_POST["emailkh"];
                      $sdtkh = $_POST["sdtkh"];
                      $tongtien = $_POST["tongtien"];
                      $ngaydat = $_POST["ngaydat"];
                      $trangthai = $_POST["trangthai"];
                      $tentrangthai = $_POST["tentrangthai"];
                      $ngaysinh = $_POST["ngaysinh"];
                      // $phuongthuc = $_POST["phuongthuc"];
                      $lidohuy = $_POST["lidohuy"];
                      
                    ?>
                    <form action="#" method="get">
                    <div class="card-header pb-2 d-flex align-items-center">
                        <div class="col-4">
                          <h6 class="">Thông tin khách hàng</h6>
                        </div>
                        <div class="col-9 d-flex align-items-center justify-content-end"></div>

                    </div>
                    </form>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                        <!-- table 5 cot -->
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mã đơn</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Khách hàng</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Liên hệ</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tổng tiền</th>
                                <!-- <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Phương thức thanh toán</th> -->
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Trạng thái</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- 1 hang -->
                            <tr class="height-100">
                                
                                        <!-- Ma hoa don -->
                                        <td class="align-middle text-center">
                                            <p class="text-sm font-weight-bold mb-0"><?php echo $mahd ?></p>
                                        </td>
                                        <td>
                                        <div class="d-flex px-1 py-1">
                                            <!-- hinh anh khach hang -->
                                            <div>
                                            <?php
                                                $avatar_url = "../assets/img/cus_img/" . $avtkh;
                                                echo "<img src='{$avatar_url}' class='rounded-circle avatar avatar-md me-3 mt-2' alt='cus'>";
                                            ?> 
                                            </div>
                                            <!-- ten kh -->
                                            <div class="d-flex flex-column justify-content-center">
                                            <h6 class="mb-0 text-sm"><?php echo $tenkh; ?></h6>
                                            <p class='text-xs text-secondary mb-0'>Ngày sinh: <?php echo $ngaysinh; ?></p>
                                            <p class='text-xs text-secondary mb-0'>Địa chỉ: <?php echo $diachikh; ?></p>
                                            </div>
                                        </div>
                                        </td>
                                        <!-- Lien he -->
                                        <td class="align-middle text-center"    >
                                        <p class="text-s font-weight-bold mb-0"><?php echo $emailkh; ?></p>
                                        <p class="text-s font-weight-bold mb-0"><?php echo $sdtkh; ?></p>
                                        </td>
                                        <!-- Tong tien-->
                                        <td>
                                        <p class="text-s text-success font-weight-bold mb-0"><?php echo number_format($tongtien);  ?> VNĐ</p>
                                        </td>
                                        <!-- phuong thuc -->
                                        <!-- <td class="align-middle text-center">
                                          <p class="text-xs font-weight-bold text-secondary mb-0"><?php echo $phuongthuc;  ?></p>
                                        </td> -->
                                        <!-- status-->
                                        <td class="align-middle text-center">
                                          <?php
                                              if ($trangthai==1) $style = "btn-warning";
                                              elseif ($trangthai==2) $style = "btn-primary";
                                              elseif ($trangthai==0) $style = "btn-danger";
                                              else $style = "btn-success";
                                          ?>
                                          <button class="btn text-xs font-weight-bold mb-0 <?php echo $style; ?>"><?php echo $tentrangthai ?></button>
                                        </td>
                                    </tr>
                            <!-- het 1 hang -->
                            </tbody>
                        </table>
                        </div>
                    </div>
                  </div>
              </div>
            </div> 
            <div class="row">
              <div class="col-12 px-4">
                <div class="card mb-4">
                  <div class="card-header pb-2 d-flex align-items-center">
                      <div class="col-4">
                          <h6 class="">Danh sách sản phẩm</h6>
                      </div>
                      <div class="col-5 d-flex align-items-center  justify-content-end"></div>
                      <div class="col-5 d-flex align-items-center justify-content-end" style="margin-left: -110px;">
                        Ngày đặt hàng: <span class="ms-2 text-secondary text-s text-center font-weight-bold"><?php echo date('d/m/Y', strtotime($ngaydat)); ?></span>
                      </div>
                  </div>
                  <div class="card-body px-0 pt-0 pb-2 px-4 py-4">
                      <table class="table align-items-center mb-0">
                      <?php
                          $sql="select * from chi_tiet_hd where HD_STT = {$mahd}";
                          $rs = $conn->query($sql);
                          $rs_all = $rs -> fetch_all(MYSQLI_ASSOC);
                          $stt=1;
                          foreach ($rs_all as $row){
                              $idsp = $row["SP_MA"];
                              $sql1 = "select * from san_pham where SP_MA = {$idsp}";
                              $rs1 = $conn->query($sql1);
                              $row1 = mysqli_fetch_assoc($rs1);
    
                              $anhsp = $row1["SP_HINHANH"];
                              $tensp = $row1["SP_TEN"];
                              $giasp = $row1["SP_GIA"];
    
                              // $sql2 = "select * from chitiet_pn where SP_MA = {$idsp}";
                              // $rs2 = $conn->query($sql2);
                              // $row2 = mysqli_fetch_assoc($rs2);
                              // $dvtsp = $row1["SP_DVT"];

                              $sql2 = "select * from chi_tiet_hd where HD_STT = {$mahd}";
                              $rs2 = $conn->query($sql2);
                              $row2 = mysqli_fetch_assoc($rs2);
                              $slsp = $row2["CTHD_SLB"];
                              $dongia = $row2["CTHD_DONGIA"];
    
                              ?>
                                  <tr class="height-100">
                                      <!-- STT -->
                                      <td>
                                          <p class="text-sm font-weight-bold mb-0"><?php echo $stt; ?></p>
                                      </td>
                                      <td class="w-30" >
                                            <div class="d-flex px-2 py-1">
                                                <!-- hinh anh san pham -->
                                              <div>
                                                <?php
                                                  $avatar_url = "../assets/img/product_img/" . $anhsp;
                                                  echo "<img src='{$avatar_url}' class='avatar avatar-xl me-3' alt='user1'>";
                                                ?> 
                                                
                                              </div>
                                              <!-- ten san pham -->
                                              <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-md"><?php echo $tensp; ?></h6>
                                                <!-- <p class='text-xs text-secondary mb-0'><?php echo $tennh; ?></p> -->
                                              </div>
                                            </div>
                                          </td>
                                          <!-- gia sp -->
                                          <td>
                                            <p class="text-xs font-weight-bold mb-0"><?php echo number_format($dongia, 0, '.', ' ') ; ?> VNĐ</p>
                                          </td>
                                          <!-- soluong sp -->
                                          <!-- dvt -->
                                          <td class="align-middle text-center">
                                            <p class="text-s text-primary font-weight-bold mb-0"><?php echo $slsp; ?></p>
                                          </td>
                                          <!-- thanhtien -->
                                          <!-- <td>
                                            <p class="text-xs text-secondary font-weight-bold mb-0 me-n5">Thành tiền:</p>
                                          </td> -->
                                          <td>
                                            <?php $thanhtien = $slsp*$dongia; ?>
                                            Thành tiền: <p class="text-s text-success font-weight-bold mb-0 me-n5"><?php echo number_format($thanhtien,0,'.', ' ') ;?> VNĐ</p>
                                          </td>
                                  </tr>
                                  
                              <?php
                              $stt++;
                          }
                      ?>
                      </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-3">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-2 d-flex align-items-center">
                    <div class="col-12">
                        <h6 class="">Thao tác đơn hàng</h6>
                    </div>
                </div>
                <div class="card-body px-0 pt-1 pb-2 px-4 py-4">
                    <form action="update_status_bill.php" method="post">
                        <div class="col-12 d-flex align-items-center justify-content-end">
                            <select id="mySelect" onchange="showTextarea()" class="form-control form-control-md" name="status">
                                <option value="<?php echo $trangthai; ?>" selected hidden><?php echo $tentrangthai; ?></option>
                                <?php
                                    $sqltt = "SELECT * FROM trang_thai";
                                    $resulttt = $conn->query($sqltt);
                                    if ($resulttt->num_rows > 0) {
                                        $resulttt = $conn->query($sqltt);
                                        $resulttt_all = $resulttt->fetch_all(MYSQLI_ASSOC);
                                        foreach ($resulttt_all as $rowtt) {
                                            echo "<option value=" . $rowtt["TT_MA"] . ">" . $rowtt["TT_TEN"] . "</option>";
                                        }
                                    } else {
                                        echo "<option value=''>Không có dữ liệu</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <!-- <div class="col-12 d-flex align-items-center mt-2">
                            <textarea id="myTextarea" style="display: <?php echo $dp ?>;" name="lido" class="form-control form-control-md"><?php echo $lidohuy ?></textarea>
                        </div> -->
                       <!--  <div class="col-12 d-flex align-items-center mt-2">
                            <select id="myTextarea1" style="display: <?php echo $dp1 ?>;" name="donvc" class="form form-control form-control-md">
                                <option value="" selected hidden disabled>- Chọn ĐVC -</option>
                                <?php
                                    $sql_dvc = "SELECT * FROM don_van_chuyen WHERE DVC_TGBATDAU >= sysdate()";
                                    $rs_dvc = $conn->query($sql_dvc);
                                    if ($rs_dvc->num_rows > 0) {
                                        $rs_dvc = $conn->query($sql_dvc);
                                        $rsnvc_all = $rs_dvc->fetch_all(MYSQLI_ASSOC);
                                        foreach ($rsnvc_all as $r_dvc) {
                                            echo "<option value=" . $r_dvc["DVC_MA"] . ">" . $r_dvc["DVC_MA"] . ' - ' . $r_dvc["DVC_DIACHI"] . ' - ' . date('d/m/Y', strtotime($r_dvc["DVC_TGBATDAU"])) . "</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div> -->
                        <div id="dvcName" class="col-12 d-flex align-items-center mt-2" style="display: none;"></div>
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <input type="hidden" name="mahd" value="<?php echo $mahd; ?>">
                            <button class="btn btn-primary text-white mt-2 ms-3" type="submit">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


                    <script>
                      function showTextarea() {
                        var selectValue = document.getElementById("mySelect").value;
                        if (selectValue == 0) {
                          document.getElementById("myTextarea").style.display = "block";
                        } else {
                          document.getElementById("myTextarea").style.display = "none";
                        }
                        if (selectValue == 2) {
                          document.getElementById("myTextarea1").style.display = "block";
                        } else {
                          document.getElementById("myTextarea1").style.display = "none";
                        }
                      }
                    </script>
                  </div>
                </div>
              </div>
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
function showTextarea() {
    var select = document.getElementById("mySelect");
    var textarea = document.getElementById("myTextarea");
    var selectDVC = document.getElementById("myTextarea1");
    var dvcName = document.getElementById("dvcName");
    if (select.value == "2") { // Giả sử "2" là mã trạng thái "Đang giao hàng"
        textarea.style.display = "none";
        selectDVC.style.display = "block";

        // Gửi yêu cầu AJAX đến server để lấy tên nhà vận chuyển
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "get_delivery_name.php?mahd=" + <?php echo $mahd; ?>, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                dvcName.innerHTML = xhr.responseText;
                dvcName.style.display = "block";
            }
        };
        xhr.send();
    } else if (select.value == "0") { // "0" có thể là trạng thái khác mà bạn muốn hiển thị textarea
        textarea.style.display = "block";
        selectDVC.style.display = "none";
        dvcName.style.display = "none";
    } else {
        textarea.style.display = "none";
        selectDVC.style.display = "none";
        dvcName.style.display = "none";
    }
}
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

</php>