<!doctype html>
<html lang="en">


<?php include "head.php" ?>

<body>
    <?php
        include "header.php";
    ?>
<style>
    .shopping-cart-menu {
    display: flex;
    margin-top: -30px;
    padding: 20px 0;
}

.steps {
    display: flex;
    list-style: none;
    padding: 0;
    margin: 0;
}

.step {
    padding: 15px 30px;
    font-size: 16px;
    font-weight: bold;
    text-transform: uppercase;
    color: white;
    background-color: #333;
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    /* Tạo hình mũi tên */
    clip-path: polygon(0 0, calc(100% - 15px) 0, 100% 50%, calc(100% - 15px) 100%, 0 100%);
}

.step.current {
    background-color: #e60000;
}

.step:not(:last-child) {
    margin-right: -15px; /* Dính hai ô lại */
}

.step span {
    white-space: nowrap;
}

/* Tạo mũi tên nhọn cho bước tiếp theo */
.step::after {
    content: "";
    position: absolute;
    right: -15px;
    top: 0;
    bottom: 0;
    width: 15px;
    background-color: inherit;
    clip-path: polygon(0 0, 100% 50%, 0 100%);
}

</style>
    <!-- <?php
    // if($soluonggiohang == 0){
    //  $message = "Giỏ hàng rỗng, hãy thêm sản phẩm vào giỏ hàng.";
    //     echo "<script type='text/javascript'>alert('$message');</script>";
    //     header('Location: products.php');
    // }
?> -->

    <!-- MAIN-CONTENT-SECTION START -->
    <section class="main-content-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2 class="page-title" style="margin-top: 20px;">Xác nhận đơn hàng</h2>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- SHOPING-CART-MENU START -->
                    <div class="shopping-cart-menu">
                            <ul class="steps">
                                <li class="step ">
                                    <a href="cart.php" ><span style="color: white;">Chi tiết giỏ hàng</span></a>
                                </li>
                                <li class="step current">
                                    <span>Xác nhận đơn hàng</span>
                                </li>
                            </ul>
                        </div>
                    <!-- SHOPING-CART-MENU END -->
                </div>
                <!-- ADDRESS AREA START -->
                <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
                    <div class="form-group primary-form-group p-info-group deli-address-group">
                        <h3 class="page-subheading box-subheading">Thông tin địa chỉ của bạn</h3>
                    </div>
                </div>
                <div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
                    <div class="form-group primary-form-group p-info-group deli-address-group">
                        <h3 class="page-subheading box-subheading">Thông tin đơn hàng</h3>
                    </div>
                </div>
            </div>

            <form method="post" action="luudonhang.php">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Thông tin khách hàng</div>
                            <div class="panel-body">
                                <div class="col-md-4">
                                    <img src="assets/img/cus_img/<?php echo $_SESSION["avt"] ?>" alt="" style="heigh:auto; width:auto; object-fit: cover;">
                                </div>
                                <label>Tên khách hàng : </label><span> <?php echo $_SESSION["name"]?></span>
                                <div class="col-mb-8">
                                    <label>Điện thoại: </label><span> <?php echo $_SESSION["sdt"]?></span>
                                </div>
                                <div class="col-mb-8">
                                    <label>Email:</label><span> <?php echo $_SESSION["email"]?></span>
                                </div>
                                 <div class="col-mb-8">
                                    <label>Ngày đặt hàng: <input type="text" readonly class="form-control" value="<?php echo date('d-m-Y'); ?>" name="date" id="datechoose" required></label>
                                </div>
                                

                                <!-- Thông tin địa chỉ giao hàng -->
                <div class="panel panel-default" style="margin-top: 30px;">
                    <div class="panel-heading">Thông tin giao hàng</div>
                    <div class="panel-body">
                        <!-- Chọn Tỉnh -->
                        <div class="form-group">
                            <label for="tinh">Tỉnh/Thành phố:</label>
                            <select class="form-control" id="tinh" name="tinh" required>
                                <option value="">Chọn Tỉnh/Thành phố</option>
                                <?php
                                $sql = "SELECT * FROM tinh";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()) {
                                    echo "<option value='".$row['TINH_MA']."'>".$row['TINH_TEN']."</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Chọn Huyện -->
                        <div class="form-group">
                            <label for="huyen">Quận/Huyện:</label>
                            <select class="form-control" id="huyen" name="huyen" required>
                                <option value="">Chọn Quận/Huyện</option>
                                <?php
                                $sql = "SELECT * FROM huyen";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()) {
                                    echo "<option value='".$row['HUYEN_MA']."'>".$row['HUYEN_TEN']."</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Chọn Xã -->
                        <div class="form-group">
                            <label for="xa">Phường/Xã:</label>
                            <select class="form-control" id="xa" name="xa" required>
                                <option value="">Chọn Phường/Xã</option>
                                <?php
                                $sql = "SELECT * FROM xa";
                                $result = $conn->query($sql);
                                while($row = $result->fetch_assoc()) {
                                    echo "<option value='".$row['XA_MA']."'>".$row['XA_TEN']."</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <!-- Nhập địa chỉ cụ thể -->
                        <div class="form-group">
                            <label for="diachi">Địa chỉ cụ thể:</label>
                            <input type="text" class="form-control" id="diachi_cu_the" name="diachi_cu_the" placeholder="Nhập địa chỉ cụ thể" required>
                        </div>
                    </div>
                </div>

                               
                                <div class="col-mb-8" >
                                    <label>Hình thức thanh toán
                                        <select class="form-control" name="hinhthuctt">
                                            <?php
                                            $sql="SELECT * from phuong_thuc_thanh_toan ";
                                            $result = $conn->query($sql); 
                                            if ($result->num_rows > 0) {
                                                while($row = $result->fetch_assoc()) {
                                        ?>
                                            <option value="<?php echo $row["PTTT_MA"] ?>"><?php echo $row["PTTT_TEN"] ?></option>
                                            <?php
                                                }
                                            }
                                        ?>
                                        </select>
                                    </label>
                                </div>


                                <div class="col-mb-8" >
                                    
                                    </label>
                                   <!-- Chọn Nhà vận chuyển -->
<div class="form-group">
    <label for="nhavanchuyen">Chọn Nhà vận chuyển:</label>
    <select class="form-control" id="nhavanchuyen" name="nhavanchuyen" required>
        <option value="">Chọn Nhà vận chuyển</option>
        <?php
        $sql = "SELECT NVC_MA, NVC_TEN FROM nha_van_chuyen";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
            echo "<option value='".$row['NVC_MA']."'>".$row['NVC_TEN']."</option>";
        }
        ?>
    </select>
</div>
<div class="form-group">
    <label>Phí vận chuyển:</label>
    <span id="shipping-fee">0</span> VNĐ
</div>

                                </div>
                                

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Danh sách các sản phẩm</div>
                            <div class="panel-body">
                                <!-- tu day -->
                                <div class="col-md-12">
                                    <div class="table-responsive">          
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th>Tên sản phẩm</th>
                                                <th>SL</th>
                                                <th>Giá</th>
                                                <th>Tổng</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php   
                                                        $sp_array = array();
                                                        $slsp_array = array();
                                                        $khid = $_SESSION["khid"];
                                                        $sl = 0;
                                                        $sql = "select ct.SP_MA, ct.CTGH_SOLUONG, gh.GH_MA
                                                                    from chitiet_gh ct 
                                                                    join gio_hang gh on ct.GH_MA=gh.GH_MA
                                                                    WHERE gh.KH_MA={$khid}";
                                                        $rs = $conn->query($sql);
                                                        $total = 0;
                                                        foreach ($rs as $sp) {
                                                            $sl += 1;
                                                            $spid = $sp["SP_MA"];
                                                            $sp_array[] = $spid;
                                                            $query = "SELECT * from san_pham s WHERE  s.SP_MA  = $spid";
                                                            $result = $conn->query($query);
                                                            foreach ($result as $s) {
                                                        ?>                  
                                                        <tr>
                                                            <td><?php  echo $s["SP_TEN"]?></td>
                                                            <td><?php echo $sp["CTGH_SOLUONG"]?></td>
                                                            <td><?php  echo number_format($s["SP_GIA"])?> </td>
                                                            <td><?php echo number_format($sp["CTGH_SOLUONG"]*$s["SP_GIA"])?></td>                   
                                                            <?php $slsp_array[] = $sp["CTGH_SOLUONG"] ?>
                                                        </tr>   
                                                    <?php
                                                        $total += $sp["CTGH_SOLUONG"]*$s["SP_GIA"];
                                                            }
                                                        }
                                                        $queryString = http_build_query($sp_array);
                                                        $queryString1 = http_build_query($slsp_array);
                                                    ?>
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td colspan="3">
                                                    <span>Tổng</span>
                                                </td>
                                                <td colspan="1">
                                                    <h4><?php echo number_format($total);  ?> VNĐ</h4>
                                                </td>
                                            </tr>
                                            </tfoot>

                                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                                        </table>
                                    </div>
                                    <!-- <h4>TỔNG </h4> <h4><?php echo number_format($total,0);  ?> VNĐ</h4>  -->
                                    <input type="hidden" name="total" value="<?php echo $total ?>">
                                    <input type="hidden" name="dongia" value="<?php echo $s["SP_GIA"] ?>">
                                    <input type="hidden" name="ghma" value="<?php echo $sp["GH_MA"] ?>">
                                    <input type="hidden" name="sparray" value="<?php echo $queryString; ?>">
                                    <input type="hidden" name="slarray" value="<?php echo $queryString1; ?>">
                                    <input type="hidden" id="shipping-fee-input" name="shipping_fee" value="0">
                                    <input type="hidden" id="final-total-input" name="final_total" value="<?php echo $total; ?>">
                                     <!-- Hiển thị phí vận chuyển -->
                
                                     <!-- Tổng tiền thanh toán -->
                                     
                                   <!--  <div class="form-group" style="background-color: black; text-align: center; height: 35px;">
                                        <label style="color: white; justify-content: center; padding-top: 5px;">Tổng tiền thanh toán:</label>
                                        <span id="total-price" style="color: white;"><--?php echo number_format($total); ?> VNĐ</span>
                                        <input type="hidden" id="final-total-input" name="final_total" value="<--?php echo $total; ?>">
                                    </div> -->
                                    
                <!-- Cập nhật lại tổng tiền -->
            <tr>
                <div class="form-group" style="background-color: black; text-align: center; height: 35px;">
                    <label style="color: white; justify-content: center; padding-top: 5px;">Tổng tiền thanh toán:</label>
                    <span id="total-price" style="color: white;"><?php echo number_format($total); ?> VNĐ</span>
                </div>
            </tr>
                                    <input style="margin-left:220px; background-color: #e60000; color: white;" type="submit" name="Dat" value="Đặt hàng" class="btn btn-1" />   
                                    
                                </div>
                                <!-- tới đây -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="add-new-address">
                        <!-- <a href="my-cart-step-2-info.html" class="new-address-link">Add a new address<i class="fa fa-chevron-right"></i></a>
                        <div class="form-group p-info-group type-address-group">
                            <label>If you would like to add a comment about your order, please write it in the field below.</label>
                            <textarea class="form-control input-feild " name="addcomment"></textarea>
                        </div> -->
                    </div>
                    <div class="returne-continue-shop ship-address">
                        <a href="index.php" class="continueshoping"><i class="fa fa-chevron-left"></i>Tiếp tục mua hàng</a>
                        <!-- <a href="checkout.php" class="procedtocheckout">Proceed to checkout<i class="fa fa-chevron-right"></i></a> -->
                        
                    </div>  
                </div>
                </form>
            </div>
       
    </div>

    </section>
    <!-- MAIN-CONTENT-SECTION END -->



    <?php 
include "brand.php";
?>


    <?php include "company.php" ?>

    <?php 
include "footer.php";
?>

    <!-- JS 
        ===============================================-->
    <!-- jquery js -->
    <script src="js/vendor/jquery-1.11.3.min.js"></script>

    <!-- fancybox js -->
    <script src="js/jquery.fancybox.js"></script>

    <!-- bxslider js -->
    <script src="js/jquery.bxslider.min.js"></script>

    <!-- meanmenu js -->
    <script src="js/jquery.meanmenu.js"></script>

    <!-- owl carousel js -->
    <script src="js/owl.carousel.min.js"></script>

    <!-- nivo slider js -->
    <script src="js/jquery.nivo.slider.js"></script>

    <!-- jqueryui js -->
    <script src="js/jqueryui.js"></script>

    <!-- bootstrap js -->
    <script src="js/bootstrap.min.js"></script>

    <!-- wow js -->
    <script src="js/wow.js"></script>
    <script>
    new WOW().init();
    </script>

    <!-- Google Map js -->
    <script src="https://maps.googleapis.com/maps/api/js"></script>
    <script>
    function initialize() {
        var mapOptions = {
            zoom: 8,
            scrollwheel: false,
            center: new google.maps.LatLng(10.031157, 105.769171)
        };
        var map = new google.maps.Map(document.getElementById('googleMap'),
            mapOptions);
        var marker = new google.maps.Marker({
            position: map.getCenter(),
            map: map
        });

    }
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>

   <script>
    $(document).ready(function() {
        // Khi chọn tỉnh
        $('#tinh').change(function() {
            var tinhMa = $(this).val();
            $.ajax({
                url: 'get_huyen.php',
                type: 'POST',
                data: { tinh_ma: tinhMa },
                success: function(data) {
                    $('#huyen').html(data);
                    $('#xa').html('<option value="">Chọn Phường/Xã</option>'); // Reset xã khi thay đổi huyện
                }
            });
        });

        // Khi chọn huyện
        $('#huyen').change(function() {
            var huyenMa = $(this).val();
            $.ajax({
                url: 'get_xa.php',
                type: 'POST',
                data: { huyen_ma: huyenMa },
                success: function(data) {
                    $('#xa').html(data);
                }
            });
        });
    });
</script>

<script>
// Lưu tổng tiền ban đầu (chưa bao gồm phí vận chuyển)
var originalTotal = parseFloat($('#final-total-input').val());

// Cập nhật phí vận chuyển và tổng tiền khi thay đổi nhà vận chuyển
$('#nhavanchuyen').change(function() {
    var nvc_ma = $(this).val();
    var tinh_ma = $('#tinh').val();

    if (nvc_ma && tinh_ma) {
        $.ajax({
            url: 'get_shipping_fee.php',
            type: 'POST',
            data: {nvc_ma: nvc_ma, tinh_ma: tinh_ma},
            success: function(response) {
                var data = JSON.parse(response);
                if (data.success) {
                    var shippingFee = parseFloat(data.dongia);

                    // Cập nhật phí vận chuyển hiển thị
                    $('#shipping-fee').text(shippingFee.toLocaleString('vi-VN')); // Hiển thị phí vận chuyển
                    
                    // Tính tổng tiền mới (tổng ban đầu + phí vận chuyển mới)
                    var totalWithShipping = originalTotal + shippingFee;
                    
                    // Cập nhật giá trị vào hidden input
                    $('#shipping-fee-input').val(shippingFee);
                    $('#final-total-input').val(totalWithShipping);

                    // Cập nhật tổng tiền thanh toán hiển thị
                    $('#total-price').text(totalWithShipping.toLocaleString('vi-VN') + ' VNĐ');
                }
            }
        });
    }
});


</script>



    <!-- main js -->
    <script src="js/main.js"></script>

</body>

</html>