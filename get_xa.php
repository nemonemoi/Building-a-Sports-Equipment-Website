<?php
require 'connect.php';

if(isset($_POST['huyen_ma'])) {
    $huyen_ma = $_POST['huyen_ma'];
    $sql = "SELECT XA_MA, XA_TEN FROM xa WHERE HUYEN_MA = $huyen_ma";
    $result = $conn->query($sql);
    
    echo '<option value="">Chọn Phường/Xã</option>'; // Dòng mặc định đầu tiên
    while ($row = $result->fetch_assoc()) {
        echo '<option value="'.$row['XA_MA'].'">'.$row['XA_TEN'].'</option>';
    }
}
?>

