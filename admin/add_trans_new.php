<?php
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nvc_ten = $_POST['nvc_ten'];
    $nvc_mota = $_POST['nvc_mota'];
    $don_gia = $_POST['don_gia'];

    echo "<pre>";
    print_r($don_gia); // In ra để kiểm tra cấu trúc mảng đơn giá
    echo "</pre>";

    $sql_insert_nvc = "INSERT INTO nha_van_chuyen (NVC_TEN, NVC_MOTA) VALUES ('$nvc_ten', '$nvc_mota')";
    if ($conn->query($sql_insert_nvc) === TRUE) {
        $nvc_ma = $conn->insert_id;

        // Kiểm tra giá trị LSP_MA trong bảng loai_sp
        $valid_lsp_mas = [];
        $sql_check_lsp = "SELECT LSP_MA FROM loai_sp";
        $result_check_lsp = $conn->query($sql_check_lsp);
        while ($row = $result_check_lsp->fetch_assoc()) {
            $valid_lsp_mas[] = $row['LSP_MA'];
        }
        echo "Valid LSP_MA values: ";
        print_r($valid_lsp_mas);

        foreach ($don_gia as $kv_ma => $lsp_dongia) {
            foreach ($lsp_dongia as $lsp_ma => $dgvc_dongia) {
                if (in_array($lsp_ma, $valid_lsp_mas)) {
                    $sql_don_gia = "INSERT INTO don_gia_van_chuyen (NVC_MA, KV_MA, LSP_MA, DGVC_DONGIA)
                                    VALUES ('$nvc_ma', '$kv_ma', '$lsp_ma', '$dgvc_dongia')";
                    if ($conn->query($sql_don_gia) === FALSE) {
                        echo "Lỗi khi lưu đơn giá: " . $conn->error . "<br>";
                        echo "SQL: " . $sql_don_gia . "<br>";
                        exit();
                    }
                } else {
                    echo "Mã loại sản phẩm không hợp lệ: " . $lsp_ma . "<br>";
                    exit();
                }
            }
        }

        echo "<script>alert('Thêm nhà vận chuyển thành công!'); window.location.href = 'transporter.php';</script>";
    } else {
        echo "Lỗi: " . $sql_insert_nvc . "<br>" . $conn->error;
    }
}

$sql_kv = "SELECT * FROM khu_vuc";
$result_kv = $conn->query($sql_kv);

$sql_lsp = "SELECT * FROM loai_sp";
$result_lsp = $conn->query($sql_lsp);

$conn->close();
?>

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
    Thêm nhà vận chuyển
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
        <h6 class="font-weight-bolder text-white mb-0">Thêm nhà vận chuyển</h6>
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

<body>
<div class="col-12">
          <div class="card mb-4" style="margin-left: 25px; margin-top: 10px;">
            <div class="card-header pb-0">
                <h4>Thêm nhà vận chuyển mới</h4>
            </div>
    <div class="card-body px-2 pt-0 pb-2">
    <form method="POST">
        <!-- <div class="mb-3"> -->
            <label for="nvc_ten" class="form-label" style="font-size: 17px;">Tên nhà vận chuyển</label>
            <input type="text" class="form-control" id="nvc_ten" name="nvc_ten" required>
        </div>

        <div class="mb-3 px-3 col-12">
            <label for="nvc_mota" class="form-label" style="font-size: 17px;">Mô tả</label>
            <textarea class="form-control" id="nvc_mota" name="nvc_mota" rows="3"></textarea>
        </div>

        <div class="card-header pb-0">
                <h4>Thiết lập Đơn Giá Vận Chuyển</h4>
            </div>
        <div class="mb-3 px-3 col-12" style="margin-top: 30px;">
            <table class="table table-bordered">
                <thead class=" text-center text-white" style="background-color: #67BF7F">
                    <tr>
                        <strong><th>Loại Sản Phẩm</th></strong>
                        <strong><th>Khu vực Bắc</th></strong>
                        <strong><th>Khu vực Trung</th></strong>
                        <strong><th>Khu vực Nam</th></strong>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($lsp = $result_lsp->fetch_assoc()): ?>
                    <tr>
                        <td><strong><?php echo $lsp['LSP_TEN']; ?></td></strong>
                        <td>
                            <input type="number" class="form-control" name="don_gia[BAC][<?php echo $lsp['LSP_MA']; ?>]" placeholder="Nhập giá (VND)">
                        </td>
                        <td>
                            <input type="number" class="form-control" name="don_gia[TRUNG][<?php echo $lsp['LSP_MA']; ?>]" placeholder="Nhập giá (VND)">
                        </td>
                        <td>
                            <input type="number" class="form-control" name="don_gia[NAM][<?php echo $lsp['LSP_MA']; ?>]" placeholder="Nhập giá (VND)">
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
        <!-- <div class="text-center px-3">
                      <button type="submit" class="btn btn-lg btn-warning btn-lg w-100 mt-4 mb-0"><strong>Thêm</strong></button>
                    </div><br> -->
        <div class="text-center px-3">
            <button type="submit" class="btn text-white text-bold " style="background-color: #67BF7F; justify-content: center;"><strong>Thêm</button></strong>
        </div>
    </form>
</div>
</body>
</html>
