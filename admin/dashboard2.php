<!-- phần còn lại của dashboard -->
<?php require 'nav.php'; ?>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <?php
                      $thang = date('m');
                      $nam = date('Y');
                      $sql = "select 
                                  sum(case 
                                          when month(HD_NGAYLAP) = month(now()) and year(HD_NGAYLAP) = year(now()) and (TT_MA = 3) then hd_tongtien 
                                          else 0 
                                      end) as doanh_thu_thang_hien_tai, 
                                  sum(case 
                                          when month(HD_NGAYLAP) = month(date_sub(now(), interval 1 month)) and year(HD_NGAYLAP) = year(now()) and (TT_MA = 3) then HD_TONGTIEN 
                                          else 0 
                                      end) as doanh_thu_thang_truoc
                              from hoa_don;
                              ";
                      $rs = $conn->query($sql);
                      $row = mysqli_fetch_assoc($rs);
                      if ($row["doanh_thu_thang_hien_tai"] != null){
                        $message = "1";
                        $tongdoanhthu = $row["doanh_thu_thang_hien_tai"];
                        $dt_thangtruoc = $row["doanh_thu_thang_truoc"];
                      }else {
                        $tongdoanhthu = 0;
                        $dt_thangtruoc = 0;
                      }
                    ?>
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Doanh thu tháng <?php echo $thang ."/". $nam ?></p>
                    <!-- <h4 class="font-weight-bolder">
                      <?php echo number_format($tongdoanhthu); ?> VND
                    </h4> -->
                  </div>
                </div>
                <div class="col-3 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-light border-radius-xl text-center">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
                <h4 class="font-weight-bolder">
                  <?php echo number_format($tongdoanhthu); ?> VND
                </h4>
                <?php
                      if($dt_thangtruoc<$tongdoanhthu){
                        $perc = round(($dt_thangtruoc / $tongdoanhthu)*100, 2);
                        ?>                        
                        <p class="mb-0">
                          <span class="text-success text-sm font-weight-bolder">+<?php echo $perc ?>% </span>so với tháng trước
                        </p>
                        <?php
                      } else {
                        $dt = ($tongdoanhthu / $dt_thangtruoc)*100;
                        $perc = round($dt, 2);
                        ?>                        
                        <p class="mb-0">
                          <span class="text-danger text-sm font-weight-bolder">-<?php echo $perc ?>% </span>so với tháng trước
                        </p>
                        <?php
                      }
                    ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
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
          <div class="card">
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
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <?php
                      $sql_nv = "select count(NV_MA) as countnv, count(case when month(NV_NGAYTUYEN) = month(sysdate()) then 1 end) as trongthang from nhan_vien";
                      $rs_nv = $conn->query($sql_nv);
                      if ($rs_nv->num_rows > 0){
                        $row_nv = mysqli_fetch_assoc($rs_nv);
                        $countnv = $row_nv["countnv"];
                        $tuyen_trong_thang = $row_nv["trongthang"];
                      } else {
                        $countnv = 0;
                        $tuyen_trong_thang = 0;
                      }
                    ?>
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Tổng số nhân viên</p>
                    <h4 class="font-weight-bolder">
                      <?php echo $countnv ?>
                    </h4>
                    <p class="mb-0">
                      <span class="text-success text-sm font-weight-bolder">+<?php echo $tuyen_trong_thang ?></span> trong tháng
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center border-radius-xl">
                    <i class="fas fa-users text-lg opacity-10"></i>
                  </div>
                  <!-- <img style="height:55px;" src="https://img.icons8.com/3d-fluency/94/null/manager.png"/> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-8 mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header col-12 pb-0 pt-3 bg-transparent">
                <?php
                  // Đoạn này tính doanh thu 12 tháng
                  if(isset($_GET["year"])){
                    $y = $_GET["year"];
                    $sql = "SELECT MONTH(HD_NGAYLAP) AS THANG, SUM(HD_TONGTIEN) AS DOANH_THU 
                            FROM HOA_DON 
                            WHERE TT_MA = 3 AND YEAR(HD_NGAYLAP)={$y}
                            GROUP BY THANG";
                    $result = mysqli_query($conn, $sql);
                    // Lấy dữ liệu từ kết quả truy vấn
                    $data = array();
                    while ($row = mysqli_fetch_assoc($result)) {
                        $data[] = $row;
                    } 
                    // Khởi tạo mảng các biến tháng
                      $thang_1 = 0;
                      $thang_2 = 0;
                      $thang_3 = 0;
                      $thang_4 = 0;
                      $thang_5 = 0;
                      $thang_6 = 0;
                      $thang_7 = 0;
                      $thang_8 = 0;
                      $thang_9 = 0;
                      $thang_10 = 0;
                      $thang_11 = 0;
                      $thang_12 = 0;

                      $tongdt=0;
                      // Duyệt qua các phần tử của mảng kết quả
                      foreach ($data as $row) {
                          // Lấy giá trị của cột THANG
                          $thang = $row['THANG'];

                          // Lấy giá trị của cột DOANH_THU
                          $doanh_thu = $row['DOANH_THU'];

                          //Tính tổng doanh thu năm
                          $tongdt += $doanh_thu;

                          // Gán giá trị của cột DOANH_THU vào biến tháng tương ứng
                          switch ($thang) {
                              case 1:
                                  $thang_1 = $doanh_thu;
                                  break;
                              case 2:
                                  $thang_2 = $doanh_thu;
                                  break;
                              case 3:
                                  $thang_3 = $doanh_thu;
                                  break;
                              case 4:
                                  $thang_4 = $doanh_thu;
                                  break;
                              case 5:
                                  $thang_5 = $doanh_thu;
                                  break;
                              case 6:
                                  $thang_6 = $doanh_thu;
                                  break;
                              case 7:
                                  $thang_7 = $doanh_thu;
                                  break;
                              case 8:
                                  $thang_8 = $doanh_thu;
                                  break;
                              case 9:
                                  $thang_9 = $doanh_thu;
                                  break;
                              case 10:
                                  $thang_10 = $doanh_thu;
                                  break;
                              case 11:
                                  $thang_11 = $doanh_thu;
                                  break;
                              case 12:
                                  $thang_12 = $doanh_thu;
                                  break;
                          }
                      }

                      // Tạo mảng chứa các giá trị của các biến
                      $data_month = array(
                        'thang_1' => $thang_1,
                        'thang_2' => $thang_2,
                        'thang_3' => $thang_3,
                        'thang_4' => $thang_4,
                        'thang_5' => $thang_5,
                        'thang_6' => $thang_6,
                        'thang_7' => $thang_7,
                        'thang_8' => $thang_8,
                        'thang_9' => $thang_9,
                        'thang_10' => $thang_10,
                        'thang_11' => $thang_11,
                        'thang_12' => $thang_12
                      );
                      // Chuyển đổi mảng thành đối tượng JSON
                      $json_data = json_encode($data_month);
                    ?>
                      <div id="myDataMonth" data-json='<?php echo $json_data; ?>'></div>
                      <script>
                        var div = document.querySelector(".chart-here");
                        var dtnam = document.querySelector(".doanhthunam")
                        div.innerHTML = "<canvas id=\"myChart-y\" height=\"80%\" class=\"chart-canvas\"></canvas>";
                      </script>
                    <?php
                  } else {
                    $sql = "SELECT MONTH(HD_NGAYLAP) AS THANG, SUM(HD_TONGTIEN) AS DOANH_THU 
                            FROM HOA_DON 
                            WHERE TT_MA = 3 AND YEAR(HD_NGAYLAP)=2023
                            GROUP BY THANG";
                    $result = mysqli_query($conn, $sql);
                    // Lấy dữ liệu từ kết quả truy vấn
                    $data = array();
                    while ($row = mysqli_fetch_assoc($result)) {
                        $data[] = $row;
                    } 
                    // Khởi tạo mảng các biến tháng
                      $thang_1 = 0;
                      $thang_2 = 0;
                      $thang_3 = 0;
                      $thang_4 = 0;
                      $thang_5 = 0;
                      $thang_6 = 0;
                      $thang_7 = 0;
                      $thang_8 = 0;
                      $thang_9 = 0;
                      $thang_10 = 0;
                      $thang_11 = 0;
                      $thang_12 = 0;

                      // Duyệt qua các phần tử của mảng kết quả
                      $tongdt = 0;
                      foreach ($data as $row) {
                        // Lấy giá trị của cột THANG
                        $thang = $row['THANG'];
                        
                        // Lấy giá trị của cột DOANH_THU
                        $doanh_thu = $row['DOANH_THU'];
                        
                        //Tính tổng doanh thu năm
                        $tongdt += $doanh_thu;

                          // Gán giá trị của cột DOANH_THU vào biến tháng tương ứng
                          switch ($thang) {
                              case 1:
                                  $thang_1 = $doanh_thu;
                                  break;
                              case 2:
                                  $thang_2 = $doanh_thu;
                                  break;
                              case 3:
                                  $thang_3 = $doanh_thu;
                                  break;
                              case 4:
                                  $thang_4 = $doanh_thu;
                                  break;
                              case 5:
                                  $thang_5 = $doanh_thu;
                                  break;
                              case 6:
                                  $thang_6 = $doanh_thu;
                                  break;
                              case 7:
                                  $thang_7 = $doanh_thu;
                                  break;
                              case 8:
                                  $thang_8 = $doanh_thu;
                                  break;
                              case 9:
                                  $thang_9 = $doanh_thu;
                                  break;
                              case 10:
                                  $thang_10 = $doanh_thu;
                                  break;
                              case 11:
                                  $thang_11 = $doanh_thu;
                                  break;
                              case 12:
                                  $thang_12 = $doanh_thu;
                                  break;
                          }
                      }

                      // Tạo mảng chứa các giá trị của các biến
                      $data_month = array(
                        'thang_1' => $thang_1,
                        'thang_2' => $thang_2,
                        'thang_3' => $thang_3,
                        'thang_4' => $thang_4,
                        'thang_5' => $thang_5,
                        'thang_6' => $thang_6,
                        'thang_7' => $thang_7,
                        'thang_8' => $thang_8,
                        'thang_9' => $thang_9,
                        'thang_10' => $thang_10,
                        'thang_11' => $thang_11,
                        'thang_12' => $thang_12
                      );
                      // Chuyển đổi mảng thành đối tượng JSON
                      $json_data = json_encode($data_month);
                    ?>
                      <div id="myDataMonth" data-json='<?php echo $json_data; ?>'></div>
                      <script>
                        var div = document.querySelector(".chart-here");
                        div.innerHTML = "<canvas id=\"myChart-y\" height=\"80%\" class=\"chart-canvas\"></canvas>";
                      </script>
                    <?php
                  }
                ?>
              <div class="row">
                <div class="col-lg-2">
                  <div class="doanhthunam mt-1">
                    <h5 class="text-capitalize">Doanh thu</h5>
                  </div>
                  <!-- <p class="text-sm mb-0">
                    <i class="fa fa-arrow-up text-success"></i>
                    <span class="font-weight-bold">4% more</span> in 2021
                  </p> -->
                </div>
                <div class="col-lg-4">
                  <form action="#" method="get">
                    <?php
                      if (isset($_GET["year"])){
                        $year = $_GET["year"];
                      } else {
                        $year = "- Năm -";
                      }
                    ?>
                    <div class="row">
                      <div class="col-8">
                        <select class="form-control form-control-md" name="year" id="year">
                          <option value="" selected disabled hidden><?php echo $year; ?></option>
                          <option value="2022">2022</option>
                          <option value="2023">2023</option>
                          <option value="2024">2024</option>
                        </select>
                      </div>
                      <div class="col-1">
                        <button type="submit" class="btn btn-primary text-white font-weight-bold text-md">
                          Lọc
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="col-lg-6 d-flex text-end align-items-center justify-content-end mt-n4 ">
                  <span>Tổng doanh thu: </span><h5 class="text-success ms-2 mt-1"><?php echo number_format($tongdt, 0) ?> VNĐ</h5>
                </div>
              </div>
            </div>
            <div class="card-body p-3">
              <div class="chart mt-n2"> 
                <style>
                  canvas {
                    -moz-user-select: none;
                    -webkit-user-select: none;
                    -ms-user-select: none;
                  }

                  canvas .bar{
                    width: 50px;
                  }

                </style>
                <div class="chart_here">
                  <canvas id="myChart-y" height="80%" class="chart-canvas"></canvas>
                  <!-- <canvas id="chart-line" class="chart-canvas" height="300"></canvas> -->
                </div>
                <!-- <div class="d-flex text-center align-items-center justify-content-center mt-3">
                  <span>Tổng doanh thu: </span><h4 class="text-success ms-2 mt-1"><?php echo number_format($tongdt, 0) ?> VNĐ</h4>
                </div> -->
                
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card card-carousel overflow-hidden h-100 p-0">
            <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
              <div class="carousel-inner border-radius-lg h-100">
                <div class="carousel-item h-100 active" style="background-image: url('../assets/img/carousel-1.jpg');background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="ni ni-camera-compact text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-white mb-1">Get started with Argon</h5>
                    <p>There’s nothing I really wanted to do in life that I wasn’t able to get good at.</p>
                  </div>
                </div>
                <div class="carousel-item h-100" style="background-image: url('../assets/img/carousel-2.jpg'); background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="ni ni-bulb-61 text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-white mb-1">Faster way to create web pages</h5>
                    <p>That’s my skill. I’m not really specifically talented at anything except for the ability to learn.</p>
                  </div>
                </div>
                <div class="carousel-item h-100" style="background-image: url('../assets/img/carousel-3.jpg');background-size: cover;">
                  <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                      <i class="ni ni-trophy text-dark opacity-10"></i>
                    </div>
                    <h5 class="text-white mb-1">Share with us your design tips!</h5>
                    <p>Don’t be afraid to be wrong because you can’t learn anything from a compliment.</p>
                  </div>
                </div>
              </div>
              <button class="carousel-control-prev w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next w-5 me-3" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- thong ke don hang theo loai -->
      <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
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
                        <i class="fa-brands fa-android"></i>
                        </div>
                        <div class="ms-4">
                          <p class="text-xs font-weight-bold mb-0">Loại:</p>
                          <h6 class="text-sm mb-0">ANDROID</h6>
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
                        <i class="fa-brands fa-apple"></i>
                        </div>
                        <div class="ms-4">
                          <p class="text-xs font-weight-bold mb-0">Loại:</p>
                          <h6 class="text-sm mb-0">iPHONE (IOS)</h6>
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
                        <i class="fa-thin fa-mobile-retro"></i>
                        </div>
                        <div class="ms-4">
                          <p class="text-xs font-weight-bold mb-0">Loại:</p>
                          <h6 class="text-sm mb-0">ĐIỆN THOẠI THÔNG DỤNG</h6>
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
      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
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
    // Lấy đối tượng JSON từ thuộc tính dữ liệu của phần tử div
    var data = JSON.parse(document.getElementById("myDataMonth").getAttribute("data-json"));
    var thang_1 = data.thang_1;
    var thang_2 = data.thang_2;
    var thang_3 = data.thang_3;
    var thang_4 = data.thang_4;
    var thang_5 = data.thang_5;
    var thang_6 = data.thang_6;
    var thang_7 = data.thang_7;
    var thang_8 = data.thang_8;
    var thang_9 = data.thang_9;
    var thang_10 = data.thang_10;
    var thang_11 = data.thang_11;
    var thang_12 = data.thang_12;
    var year = document.getElementById('slyear')
    var ctx = document.getElementById('myChart-y').getContext('2d');
    var chart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
        datasets: [{
          label: 'Doanh thu',
          data: [thang_1, thang_2, thang_3, thang_4, thang_5, thang_6, thang_7, thang_8, thang_9, thang_10 ,thang_11, thang_12],
          
          backgroundColor: 'rgba(0, 128, 255, 0.6)',
          borderColor: 'rgba(0, 128, 255, 0.6)',
          borderWidth: 3,
          borderRadius: 5,
          lineTension: 0.4, //độ cong
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