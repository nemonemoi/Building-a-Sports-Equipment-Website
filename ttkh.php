<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$user_id = $_SESSION['KH_MA'] ?? null;

if (!$user_id) {
    echo "Bạn cần đăng nhập để xem thông tin cá nhân.";
    exit;
}

require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $field = $_POST['field'];
    $value = $_POST[$field];

    $update_sql = "UPDATE khach_hang SET $field = ? WHERE KH_MA = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("si", $value, $user_id);
    $update_stmt->execute();

    header("Location: profilekh.php");
    exit;
}

$sql = "SELECT * FROM khach_hang WHERE KH_MA = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
?>

<!doctype html>
<html lang="en">

<?php include "head.php"; ?>

<body>
    <?php include "header.php"; ?>
    <style>
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
    }
    .profile-info label {
        font-weight: bold;
    }
    .edit-icon {
        cursor: pointer;
        color: #007bff;
    }
    .edit-form {
        display: none;
    }
    </style>

    <div class="profile-container" style="margin-top: 20px;">
        <h2>Hồ Sơ Của Tôi</h2>
        <p>Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
        <div class="profile-card">
            <div class="avatar-section">
                <img src="uploads/<?php echo $user['KH_AVATAR'] ?: 'default-avatar.png'; ?>" alt="Avatar" class="profile-avatar">
                <button class="btn btn-primary" onclick="document.getElementById('avatarInput').click();">Chọn Ảnh</button>
                <input type="file" id="avatarInput" name="KH_AVATAR" style="display: none;">
                <p>Dung lượng file tối đa 1 MB. Định dạng: .JPEG, .PNG</p>
            </div>
            <div class="form-section" style="flex: 1;">
                <div class="profile-info">
                    <label>Tên đăng nhập:</label>
                    <span id="display-KH_TENDANGNHAP" style="margin-left:auto; margin-right:auto;"><?php echo htmlspecialchars($user['KH_TENDANGNHAP']); ?></span>
                </div>
                <div class="profile-info">
                    <label>Họ và tên:</label>
                    <span id="display-ten"><?php echo htmlspecialchars($user['KH_TEN']); ?></span>
                    <i class="fas fa-edit edit-icon" onclick="editField('KH_TEN')"></i>
                </div>
                <form id="form-KH_TEN" class="edit-form" method="POST">
                    <input type="hidden" name="field" value="KH_TEN">
                    <input type="text" name="KH_TEN" value="<?php echo htmlspecialchars($user['KH_TEN']); ?>" required class="form-control">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </form>

                <div class="profile-info">
                    <label>Email:</label>
                    <span id="display-KH_EMAIL"><?php echo htmlspecialchars($user['KH_EMAIL']); ?></span>
                    <i class="fas fa-edit edit-icon" onclick="editField('KH_EMAIL')"></i>
                </div>
                <form id="form-KH_EMAIL" class="edit-form" method="POST">
                    <input type="hidden" name="field" value="KH_EMAIL">
                    <input type="email" name="KH_EMAIL" value="<?php echo htmlspecialchars($user['KH_EMAIL']); ?>" required class="form-control">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </form>

                <div class="profile-info">
                    <label>Số điện thoại:</label>
                    <span id="display-KH_SDT"><?php echo htmlspecialchars($user['KH_SDT']); ?></span>
                    <i class="fas fa-edit edit-icon" onclick="editField('KH_SDT')"></i>
                </div>
                <form id="form-KH_SDT" class="edit-form" method="POST">
                    <input type="hidden" name="field" value="KH_SDT">
                    <input type="text" name="KH_SDT" value="<?php echo htmlspecialchars($user['KH_SDT']); ?>" required class="form-control">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </form>

                <div class="profile-info">
                    <label>Giới tính:</label>
                    <span id="display-KH_GIOITINH"><?php echo htmlspecialchars($user['KH_GIOITINH'] == 'M' ? 'Nam' : 'Nữ'); ?></span>
                    <i class="fas fa-edit edit-icon" onclick="editField('KH_GIOITINH')"></i>
                </div>
                <form id="form-KH_GIOITINH" class="edit-form" method="POST">
                    <input type="hidden" name="field" value="KH_GIOITINH">
                    <select name="KH_GIOITINH" required class="form-control">
                        <option value="M" <?php if ($user['KH_GIOITINH'] == 'M') echo 'selected'; ?>>Nam</option>
                        <option value="F" <?php if ($user['KH_GIOITINH'] == 'F') echo 'selected'; ?>>Nữ</option>
                    </select>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </form>

                <div class="profile-info">
                    <label>Ngày sinh:</label>
                    <span id="display-KH_NGAYSINH"><?php echo htmlspecialchars($user['KH_NGAYSINH']); ?></span>
                    <i class="fas fa-edit edit-icon" onclick="editField('KH_NGAYSINH')"></i>
                </div>
                <form id="form-KH_NGAYSINH" class="edit-form" method="POST">
                    <input type="hidden" name="field" value="KH_NGAYSINH">
                    <input type="date" name="KH_NGAYSINH" value="<?php echo htmlspecialchars($user['KH_NGAYSINH']); ?>" required class="form-control">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </form>
            </div>
        </div>
    </div>

    <?php include "footer.php"; ?>
    
    <script>
    function editField(field) {
        document.getElementById('display-' + field).style.display = 'none';
        document.getElementById('form-' + field).style.display = 'block';
    }
    </script>
</body>

</html>
