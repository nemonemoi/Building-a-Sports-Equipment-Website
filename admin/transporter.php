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
    Nhà vận chuyển
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
    $active='dvvc';
    require 'aside.php';
  ?>
<div class="w3-container w3-padding-large" style="margin-top: -20px; margin-left: 20px;"> <!-- căn lề -->
<body class="g-sidenav-show " style="background-color: #2E8B57;">

  <main class="main-content position-relative border-radius-lg " style="margin-top: -25px;">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">

      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5" style="display: flex; flex-wrap: nowrap;">
          <li class="breadcrumb-item text-sm">
                <a class="opacity-5 text-white" href="dashboard.php">Trang</a>
            </li>
            <li class="breadcrumb-item text-sm"><a href="transporter.php" class="text-white">Nhà vận chuyển</li>
        </ol>
        <h6 class="font-weight-bolder text-white mb-0">Danh sách nhà vận chuyển</h6>
    </nav>
</div>

       <!-- Đoạn này -->
        <div style="margin-left: -300px; margin-top: 20px !important;" class="mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
              
            </div>
          </div>
  
          <?php require 'nav-dark.php'; ?>
        </div>

      </div>
    </nav>
    <!-- End Navbar -->
    <?php
      require 'connect.php';
    ?>
    <div class="container-fluid py-4" style="overflow-x: hidden;">
      <div class="row">
        <div class="col-lg-9">
          <div class="row ">
            <div class="col-lg-12">
              <div class="card h-100" style="margin-left: 100px; margin-top: -20px; width: 1000px;">
                <div class="card-header pb-0 p-3">
                  <div class="row">
                    <div class="col-6 d-flex align-items-center">
                      <h6 class="mb-0">Danh sách nhà vận chuyển</h6>
                    </div>
                    <div class="col-6 text-end">
                      <?php
                        $sql = "select * from nha_van_chuyen";
                      ?>
                    </div>
                  </div>
                </div>
                <div class="card-body p-3 pb-0" >
                  <div class="p-0">
                        <!-- table 5 cot -->
                        <table class="table align-items-center mb-0">
                          <thead>
                            <tr class="col-12">
                              <!-- <th class="col-1 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Mã số</th> -->
                              <th class="col-4 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tên nhà vận chuyển</th>                              
                              <th class="col-6 text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Mô tả</th>  
                              <th class="col-1 text-secondary opacity-7"></th>

                            </tr>
                          </thead>
                         <tbody>             
    <?php
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $result = $conn->query($sql);
            $result_all = $result->fetch_all(MYSQLI_ASSOC);
            foreach ($result_all as $row) {
    ?>
    <tr class="height-100">
        <!-- <td class="align-middle text-center">
            
            <--?php echo $row["NVC_MA"] ?>
        </td> -->

        <td class="align-middle text-center text-bold">
            <!-- ten dt -->
            <?php echo $row["NVC_TEN"] ?>
        </td>

        <td class="align-middle text-left">
            <!-- mota dt -->
            <?php echo $row["NVC_MOTA"] ?>
        </td>
        
        <td class="align-middle text-center">
            <div class="mt-3 d-flex col-sm-12">
              <!-- Nút Xem bảng giá -->
              <a href="trans_price.php?nvc_ma=<?php echo $row['NVC_MA']; ?>" class="btn btn-link text-info font-weight-bold text-sm">
    Xem bảng giá
</a>


                <!-- Nút Sửa -->
                <button data-id="<?php echo $row["NVC_MA"];?>" data-name="<?php echo $row["NVC_TEN"];?>" data-des="<?php echo $row["NVC_MOTA"];?>" class="edit-btn btn btn-link text-success font-weight-bold text-sm">
                    Sửa
                </button>

                  <form method="POST" action="delete_trans.php" style="display:inline;"> 
                    <input type="hidden" name="nvc_ma" value="<?php echo $row['NVC_MA']; ?>"> 
                    <button type="submit" class="btn btn-link text-danger font-weight-bold text-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa nhà vận chuyển này không?')">Xóa</button> 
                  </form> 
                
            </div>
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
        <a href="add_trans_new.php" class="btn btn-link text-white font-weight-bold mt-n3">+ Thêm nhà vận chuyển</a>
      </div>
        
       
    </div>
  </main>
  <style>
    .ps__thumb-x {
    display: none !important;
}
    .ps__rail-x {
    display: none !important;
}
    .overlay { 
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 99999;
      background: rgba(0, 0, 0, 0.5);
      display: none;
    }

    .my-box {
      width: 30%;
      height: 42%;
      background-color: #fff;
      border-radius: 10px;
      position: absolute;
      padding: 15px;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }

  </style>
  <div class="overlay" id="overlay">
    <div class="my-box">
      <h5 class="ms-3 mt-3 text-success">Cập nhật thông tin đối tác</h5>
      <div class="row">
        <div class="col-12">
          <form action="update_transporter.php" method="post">
            <div class="row">
              <div class="col-12">
                <input type="hidden" name="temp_id" id="temp_id">
                <div class="mb-1 mt-1 px-2 name">
                  
                </div>
              </div>
              <div class="col-12">
                  <div class="mb-1 mt-1 px-2 des">
                    
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12 d-flex justify-content-center align-items-center" >
                  <button onclick="this.submit()" class="btn btn-success text-white font-weight-bold text-md ms-0 mt-4">
                    Cập nhật
                  </button>
                </div>
              </div>
            </div>
          </form>
      </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>

    const productButtons = document.querySelectorAll('.edit-btn');

    productButtons.forEach(button => {
      button.addEventListener('click', showProductDetails);
    });

    function showProductDetails(event) {
      // Lấy ID của sản phẩm được click
      const id = event.target.getAttribute('data-id');
      const name = event.target.getAttribute('data-name');
      const des = event.target.getAttribute('data-des');
      
      
      document.getElementById("temp_id").value = id;

      // Hiển thị overlay
      const overlay = document.querySelector('.overlay');
      overlay.style.display = 'block';

      // Hiển thị thông tin chi tiết của sản phẩm
      const productName = document.querySelector('.name');
      productName.innerHTML = 'Tên đối tác <input required value="' + name + '" type="text" name="name" class="form-control form-control-lg mt-3">';
      const productImg = document.querySelector('.des');
      productImg.innerHTML = 'Mô tả <textarea required id="myTextarea" name="des" class="form-control form-control-md mt-1">'+des+'</textarea>';
      
    }


    //Tắt overlay
    const overlay = document.getElementById("overlay");
    overlay.addEventListener("click", function(event) {
      if (event.target === overlay) {
        overlay.style.display = "none";
      }
    });

  </script>

  <script>
function deleteTransporter(id) {
    if (confirm('Bạn có chắc chắn muốn xóa nhà vận chuyển này?')) {
        // Tạo một form ẩn để gửi yêu cầu POST
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = 'delete_trans.php';

        // Thêm input ẩn với giá trị của mã nhà vận chuyển
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'id';
        input.value = id;
        form.appendChild(input);

        document.body.appendChild(form);
        form.submit();
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

</html>