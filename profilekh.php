<?php
session_start();
require 'connect.php'; // Kết nối với cơ sở dữ liệu

$user_id = $_SESSION['khid']; // Lấy ID người dùng từ session
if (!$user_id) {
    echo "Bạn cần đăng nhập để xem thông tin cá nhân.";
    exit;
}

// Lấy thông tin người dùng từ cơ sở dữ liệu
$sql = "SELECT * FROM khach_hang WHERE KH_MA = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Kiểm tra nếu có ảnh đại diện mới trong session
if (isset($_SESSION['avt'])) {
    $avatar = $_SESSION['avt']; // Lấy ảnh từ session
} else {
    $avatar = 'default_avatar.jpg'; // Nếu không có ảnh trong session, dùng ảnh mặc định

}


?>

<!doctype html>
<html lang="en">

<?php include "head.php"; ?>

<body>
    <?php include "header.php"; ?>

    <style>
        #preview {
    text-align: center;
}

.avatar {
    width: 120px;
    height: 120px;
    object-fit: cover;
}

.form-label {
    font-weight: bold;
    margin-bottom: 5px;
}

        .profile-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
        }

        .profile-card {
            display: flex;
            gap: 20px;
            background: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .avatar-section {
            text-align: center;
        }

        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 10px;
            object-fit: cover;
        }

        .form-section {
            flex: 1;
        }

        .profile-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
            gap: 10px;
        }

        .edit-form {
            display: none;
            gap: 10px;
        }

        .edit-icon {
            cursor: pointer;
            color: #007bff;
        }

        .btn-primary {
            padding: 5px 10px;
            font-size: 14px;
        }
    </style>

    <div class="profile-container" style="margin-top: 20px;">
    <h2>Hồ Sơ Của Tôi</h2>

    <div class="profile-card">
        <!-- Avatar Section -->
        <form action="update_change_avatar.php" method="post" enctype="multipart/form-data">
    <div class="avatar-section">
        <!-- Hiển thị ảnh đại diện cũ -->
        <div id="preview">
            <img id="old_img" src="assets/img/cus_img/<?php echo $avatar; ?>" class="rounded-circle avatar avatar-xxl ms-4" alt="Avatar">
        </div>
        <!-- Chọn ảnh mới -->
        <input type="file" name="staffImg" id="staffImg" accept="image/*" class="form-control mt-3" style="margin-top: 10px;">
        <input type="hidden" name="old_avatar" value="<?php echo $avatar; ?>">
        <div class="text-center">
            <button type="submit" style="margin-top: 10px;" class="btn btn-lg btn-primary text-white btn-lg w-100 mt-4 mb-0" >Xác nhận thay đổi</button>
        </div>
    </div>
</form>

   


            <!-- Form Section -->
            <div class="form-section">
                <?php
                $fields = [
                    "KH_TENDANGNHAP" => "Tên đăng nhập",
                    "KH_TEN" => "Họ và tên",
                    "KH_EMAIL" => "Email",
                    "KH_SDT" => "Số điện thoại",
                    "KH_GIOITINH" => "Giới tính",
                    "KH_NGAYSINH" => "Ngày sinh"
                ];

                foreach ($fields as $field => $label) {
    $value = htmlspecialchars($user[$field]);
    $inputType = $field === "KH_EMAIL" ? "email" : ($field === "KH_NGAYSINH" ? "date" : "text");

    // Xử lý hiển thị giá trị cho giới tính
    if ($field === "KH_GIOITINH") {
        $value = ($value === "M") ? "Nam" : (($value === "F") ? "Nữ" : "Không xác định");
    }

    $extraInput = $field === "KH_GIOITINH"
        ? '<select name="' . $field . '" class="form-control">
            <option value="M"' . ($user[$field] == "M" ? " selected" : "") . '>Nam</option>
            <option value="F"' . ($user[$field] == "F" ? " selected" : "") . '>Nữ</option>
          </select>'
        : '<input type="' . $inputType . '" name="' . $field . '" value="' . htmlspecialchars($user[$field]) . '" class="form-control">';
?>
    <div class="profile-info">
        <label><?php echo $label; ?>:</label>
        <span id="display-<?php echo $field; ?>"><?php echo $value; ?></span>
        <i class="fas fa-edit edit-icon" onclick="editField('<?php echo $field; ?>')"></i>
    </div>
    <form id="form-<?php echo $field; ?>" class="edit-form" method="POST">
        <input type="hidden" name="field" value="<?php echo $field; ?>">
        <?php echo $extraInput; ?>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </form>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <?php include "footer.php"; ?>

    <script>
        function editField(field) {
            document.getElementById('display-' + field).style.display = 'none';
            document.getElementById('form-' + field).style.display = 'flex';
        }
    </script>
    <script>
    // JavaScript xử lý thay đổi ảnh và preview ảnh mới
    var input = document.getElementById("staffImg");
    var preview = document.getElementById("preview");

    input.addEventListener("change", function() {
        preview.innerHTML = ""; // clear previous preview
        var files = this.files;
        for (var i = 0; i < files.length; i++) {
            var file = files[i];
            if (!file.type.startsWith("image/")) {
                continue; // skip non-image files
            }
            var reader = new FileReader();
            reader.onload = function(e) {
                var img = document.createElement("img");
                img.src = e.target.result;
                img.className = "rounded-circle avatar avatar-xxl ms-4"; // Set class for styling
                preview.appendChild(img); // append image to preview div
            };
            reader.readAsDataURL(file); // read file as data url
        }
    });
</script>
</body>

</html>
