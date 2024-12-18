<?php
session_start();
    require 'connect.php';
    if (!isset($_SESSION["khid"])){
        $message = "Vui lòng đăng nhập để thêm vào giỏ hàng!";
        echo "<script type='text/javascript'>alert('$message');</script>";
        header('Refresh: 0;url=registration.php');
    } else {
            $spid = $_GET["id"];
            $slsp = 1;
            $khid = $_SESSION["khid"];

            $check_exist = "select count(*) as tontai from chitiet_gh ct join gio_hang gh on ct.GH_MA=gh.GH_MA where gh.KH_MA = {$khid} and ct.SP_MA = {$spid}";
            $rs_chk = $conn->query($check_exist);
            $r = mysqli_fetch_assoc($rs_chk);
            if ($r["tontai"]>0) {
                $sql_gh = "select gh.GH_MA 
                            from gio_hang gh
                            join chitiet_gh ctgh on ctgh.GH_MA=gh.GH_MA 
                            where  gh.KH_MA= {$khid} and ctgh.SP_MA= {$spid}";

                $result_magh = $conn->query($sql_gh);
                $row = $result_magh->fetch_assoc();
                $ghma = $row["GH_MA"];
                if($conn->query($sql_gh) == true){
                    $sql = "update chitiet_gh set CTGH_SOLUONG = CTGH_SOLUONG + {$slsp}
                            where GH_MA = {$ghma} and SP_MA = {$spid}";
                    if($conn->query($sql)==true){
                         $message = "Cập nhật giỏ hàng thành công";
                         echo "<script type='text/javascript'>alert('$message');</script>";
                         header('Refresh: 0;url=index.php');
                    } else{
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                   
                } else{
                    echo "Error: " . $sql_gh . "<br>" . $conn->error;
                }         
            } else {
                $sql_maxgh = "select max(GH_MA) as maxgh from gio_hang;";
                $result_maxgh = $conn->query($sql_maxgh);
                $maxgh = $result_maxgh->fetch_assoc()["maxgh"];
                $idgh = $maxgh+1;
                $sql_insert = "INSERT INTO gio_hang (GH_MA, KH_MA) 
               VALUES ('".$idgh."', '".$khid."')";

                // $sql_insert = "INSERT INTO gio_hang VALUES ('".$idgh."', '".$khid."')";
                if($conn->query($sql_insert)==true){
                    $sql_ctgh = "insert into chitiet_gh values('".$spid."', '".$idgh."', '".$slsp."')";
                    if($conn->query($sql_ctgh) == true){
                        $message = "Thêm vào giỏ hàng thành công";
                        echo "<script type='text/javascript'>alert('$message');</script>";
                        header('Refresh: 0;url=index.php');
                    } else{
                        echo "Error: " . $sql_ctgh . "<br>" . $conn->error;
                    }
                } else{
                    echo "Error: " . $sql_insert . "<br>" . $conn->error;
                }        
            }
        
    }
?>
