

<?php
require 'connect.php';

if(isset($_POST['tinh_ma'])) {
    $tinh_ma = $_POST['tinh_ma'];
    $sql = "SELECT HUYEN_MA, HUYEN_TEN FROM huyen WHERE TINH_MA = $tinh_ma";
    $result = $conn->query($sql);
    
    echo '<option value="">Chọn Quận/Huyện</option>'; // Dòng mặc định đầu tiên
    while ($row = $result->fetch_assoc()) {
        echo '<option value="'.$row['HUYEN_MA'].'">'.$row['HUYEN_TEN'].'</option>';
    }
}
?>
