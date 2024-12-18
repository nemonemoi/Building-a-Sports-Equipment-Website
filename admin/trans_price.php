<?php
// Kết nối cơ sở dữ liệu
require 'connect.php';

// Lấy mã nhà vận chuyển từ form hoặc thiết lập mặc định
$nvc_id = isset($_GET['nvc_ma']) ? intval($_GET['nvc_ma']) : 1; // Lấy từ GET hoặc gán mặc định là 1
$nvc_ten = "Không xác định"; // Giá trị mặc định nếu không tìm thấy

// Lấy tên nhà vận chuyển
$query = "SELECT NVC_TEN FROM nha_van_chuyen WHERE NVC_MA = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $nvc_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nvc_ten = $row['NVC_TEN'];
}

// Lấy dữ liệu từ bảng don_gia_van_chuyen
$sql = "SELECT KV_MA, LSP_MA, DGVC_DONGIA FROM don_gia_van_chuyen WHERE NVC_MA = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $nvc_id);
$stmt->execute();
$result = $stmt->get_result();

// Định dạng dữ liệu
$data = [];
while ($row = $result->fetch_assoc()) {
    $data[$row['LSP_MA']][$row['KV_MA']] = $row['DGVC_DONGIA'];
}
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
    Đơn giá vận chuyển
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
        <h6 class="font-weight-bolder text-white mb-0">Đơn giá vận chuyển</h6>
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

<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header text-center text-white" style="background-color: #67BF7F">
                <!-- Tiêu đề -->
                <div class="d-flex justify-content-between align-items-center" style="margin-top: -10px;">
                    <h2 class="text-start text-white">
                        Cước dịch vụ chuyển phát <?php echo htmlspecialchars($nvc_ten); ?>
                    </h2>
                    <p class="text-end" style="margin-top: 20px; color: #EEEEEE;">(Giá cước đã bao gồm thuế VAT, Đơn vị tính: VND)</p>
                </div>
            </div>

            <!-- Hiển thị thông báo -->
            <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
                <script>
                    alert("Cập nhật giá thành công!");
                </script>
            <?php endif; ?>

            <!-- Bảng giá -->
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead class="bg-light">
                        <tr>
                            <th>Loại Sản Phẩm</th>
                            <th>Miền Bắc</th>
                            <th>Miền Trung</th>
                            <th>Miền Nam</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td >Bóng (410g - 450g)</td>
                            <td id="bac-1"><?php echo isset($data[1]['BAC']) ? number_format($data[1]['BAC'], 0, '.', ',') : '-'; ?></td>
                            <td id="trung-1"><?php echo isset($data[1]['TRUNG']) ? number_format($data[1]['TRUNG'], 0, '.', ',') : '-'; ?></td>
                            <td id="nam-1"><?php echo isset($data[1]['NAM']) ? number_format($data[1]['NAM'], 0, '.', ',') : '-'; ?></td>
                            <td>
                                <button class="btn text-white" style="background-color: #67BF7F;" onclick="editPrice(1, 'Bóng')">Chỉnh sửa</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Phụ kiện thể thao (100g - 400g)</td>
                            <td id="bac-2"><?php echo isset($data[2]['BAC']) ? number_format($data[2]['BAC'], 0, '.', ',') : '-'; ?></td>
                            <td id="trung-2"><?php echo isset($data[2]['TRUNG']) ? number_format($data[2]['TRUNG'], 0, '.', ',') : '-'; ?></td>
                            <td id="nam-2"><?php echo isset($data[2]['NAM']) ? number_format($data[2]['NAM'], 0, '.', ',') : '-'; ?></td>
                            <td>
                                <button class="btn text-white" style="background-color: #67BF7F;" onclick="editPrice(2, 'Phụ kiện thể thao')">Chỉnh sửa</button>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-right: 1px solid #dee2e6;">Dụng cụ thể thao (≥500g)</td>
                            <td style="border-right: 1px solid #dee2e6;" id="bac-3"><?php echo isset($data[3]['BAC']) ? number_format($data[3]['BAC'], 0, '.', ',') : '-'; ?></td>
                            <td style="border-right: 1px solid #dee2e6;" id="trung-3"><?php echo isset($data[3]['TRUNG']) ? number_format($data[3]['TRUNG'], 0, '.', ',') : '-'; ?></td>
                            <td style="border-right: 1px solid #dee2e6;" id="nam-3"><?php echo isset($data[3]['NAM']) ? number_format($data[3]['NAM'], 0, '.', ',') : '-'; ?></td>
                            <td>
                                <button class="btn text-white" style="background-color: #67BF7F;" onclick="editPrice(3, 'Dụng cụ thể thao')">Chỉnh sửa</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="container mt-4">
    <div class="card">
        <div class="card-header text-center text-white" style="background-color: #67BF7F">
            <!-- Tiêu đề -->
            <div class="d-flex justify-content-between align-items-center" style="margin-top: -10px;">
                <h2 class="text-start text-white">
                    Địa Danh Theo Miền
                </h2>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-bordered text-center" style="table-layout: fixed; word-wrap: break-word;">
                <thead class="bg-light">
                    <tr>
                        <th>Miền Bắc (28 tỉnh)</th>
                        <th>Miền Trung (11 tỉnh)</th>
                        <th>Miền Nam (24 tỉnh)</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: left; border-right: 1px solid #dee2e6;">
                            Bắc Cạn, Cao Bằng, Hà Giang, Lạng Sơn,<br>
                            Tuyên Quang, Điện Biên, Lào Cai,<br>
                            Lai Châu, Phú Thọ, Sơn La, Yên Bái,<br>
                            Bắc Giang, Thái Nguyên, Vĩnh Phúc,<br>
                            Bắc Ninh, Hòa Bình, Hải Dương, Hà Nam,<br>
                            Hải Phòng, Hưng Yên, Nam Định, Ninh Bình,<br>
                            Quảng Ninh, Thái Bình, Hà Nội, Hà Tĩnh,<br>
                            Nghệ An, Thanh Hóa
                        </td>
                        <td style="text-align: left; border-right: 1px solid #dee2e6;">
                            Quảng Bình, Quảng Trị, Thừa Thiên-Huế,<br>
                            Đà Nẵng, Quảng Nam, Quảng Ngãi,<br>
                            Kon Tum, Gia Lai, Khánh Hòa, Phú Yên,<br>
                            Bình Định
                        </td>
                        <td style="text-align: left;">
                            Bình Thuận, Ninh Thuận, Đắk Lắk, Lâm Đồng,<br>
                            Bình Dương, Bình Phước, Bến Tre, Đắk Nông,<br>
                            Đồng Nai, Long An, Tiền Giang, Tây Ninh,<br>
                            Bà Rịa-Vũng Tàu, Hồ Chí Minh, Trà Vinh,<br>
                            Vĩnh Long, An Giang, Bạc Liêu, Cà Mau,<br>
                            Cần Thơ, Đồng Tháp, Hậu Giang,<br>
                            Kiên Giang, Sóc Trăng
                        </td>
                    </tr>
                </tbody>
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="modalTitle" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered" style="margin-left: 640px;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="color: white;" class="modal-title" id="modalTitle">Chỉnh sửa giá</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" id="lsp_ma" />
                    <div class="mb-3">
                        <label for="kv_ma" class="form-label">Khu vực</label>
                        <select id="kv_ma" class="form-control">
                            <option value="BAC">Miền Bắc</option>
                            <option value="TRUNG">Miền Trung</option>
                            <option value="NAM">Miền Nam</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="dongia" class="form-label">Đơn giá</label>
                        <input type="text" id="dongia" class="form-control" />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="button" id="saveButton" style="background-color: #43CD80;" class="btn text-white">Lưu</button>

            </div>
        </div>
    </div>
</div>

    </table>

</div>

            </table>
        </div>
    </div>
</div>

</body>

<style>
    .modal-content {
    border-radius: 8px; /* Bo góc cho modal */
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2); /* Hiệu ứng nổi */
}

.modal-header {
    background-color: #43CD80; /* Màu tiêu đề */
    color: white; /* Màu chữ tiêu đề */
}

.modal-footer {
    justify-content: center; /* Căn giữa các nút ở chân modal */
}

</style>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    function editPrice(lsp_ma, loai_sp) {
    // Hiển thị tiêu đề
    document.getElementById('modalTitle').innerText = `Chỉnh sửa giá cho ${loai_sp}`;

    // Lấy các giá trị cho từng khu vực
    const bac = document.getElementById(`bac-${lsp_ma}`).innerText.replace(/,/g, '');
    const trung = document.getElementById(`trung-${lsp_ma}`).innerText.replace(/,/g, '');
    const nam = document.getElementById(`nam-${lsp_ma}`).innerText.replace(/,/g, '');

    // Gán giá trị mặc định cho khu vực và giá
    document.getElementById('lsp_ma').value = lsp_ma;
    document.getElementById('kv_ma').value = 'BAC'; // Mặc định là Miền Bắc
    document.getElementById('dongia').value = bac;

    // Gán sự kiện khi thay đổi khu vực
    const kvMaDropdown = document.getElementById('kv_ma');
    kvMaDropdown.onchange = function () {
        const selectedRegion = kvMaDropdown.value;
        let price = '';
        if (selectedRegion === 'BAC') {
            price = bac;
        } else if (selectedRegion === 'TRUNG') {
            price = trung;
        } else if (selectedRegion === 'NAM') {
            price = nam;
        }
        document.getElementById('dongia').value = price;
    };

    // Hiển thị modal
    const modal = new bootstrap.Modal(document.getElementById('editModal'));
    modal.show();
}

</script>
    <script>
        document.getElementById('saveButton').addEventListener('click', function () {
    // Lấy dữ liệu từ modal
    const lspMa = document.getElementById('lsp_ma').value;
    const kvMa = document.getElementById('kv_ma').value;
    const dongia = document.getElementById('dongia').value;

    // Kiểm tra dữ liệu
    if (!dongia || isNaN(dongia)) {
        alert("Vui lòng nhập đúng đơn giá!");
        return;
    }

    // Gửi dữ liệu qua AJAX
    fetch('update_price.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ lsp_ma: lspMa, kv_ma: kvMa, dongia: dongia }),
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Ẩn modal ngay lập tức
                const modal = bootstrap.Modal.getInstance(document.getElementById('editModal'));
                modal.hide(); // Đảm bảo modal được ẩn

                // Cập nhật giá trên giao diện
                document.getElementById(`${kvMa.toLowerCase()}-${lspMa}`).innerText = parseInt(dongia).toLocaleString();

                // Hiển thị thông báo sửa thành công
                alert('Cập nhật giá thành công!');
            } else {
                alert('Cập nhật giá thất bại!');
            }
        })
        .catch(error => {
            console.error('Lỗi:', error);
            alert('Có lỗi xảy ra khi cập nhật!');
        });
});

// Đảm bảo rằng nút "Tắt" cũng đóng modal
document.querySelector('.btn-close').addEventListener('click', function() {
    const modal = bootstrap.Modal.getInstance(document.getElementById('editModal'));
    modal.hide();  // Đảm bảo modal đóng khi bấm nút "Tắt"
});

    </script>
    <script>
    // Tự động ẩn thông báo sau 3 giây
    const successAlert = document.querySelector('.alert-success');
    if (successAlert) {
        setTimeout(() => {
            successAlert.style.display = 'none';
        }, 3000); // 3000ms = 3 giây
    }
</script>

</body>
</html>
