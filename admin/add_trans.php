<?php
session_start();
require 'connect.php';

$sql = "SELECT MAX(NVC_MA) AS maxid FROM nha_van_chuyen;";
if ($conn->query($sql) == true) {
    $rs = $conn->query($sql);
    $row = mysqli_fetch_assoc($rs);
    $id = $row["maxid"] + 1;
} else {
    echo "<br>Error: " . $sql . "<br>" . $conn->error;
    exit();
}

$ten = $_POST["ten"];
$mota = $_POST["mota"];

$sql = "INSERT INTO nha_van_chuyen (NVC_MA, NVC_TEN, NVC_MOTA) VALUES ($id, '$ten', '$mota');";

if ($conn->query($sql) == true) {
    $message = "Thêm đối tác " . $ten . " thành công!";
    echo "<br><script type='text/javascript'>alert('$message');</script>";
    header('Refresh: 0; url=transporter.php');
} else {
    echo "<br>Error: " . $sql . "<br>" . $conn->error;
}
?>
