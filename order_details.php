<!doctype html>
<html lang="en">


<?php include "head.php" ?>

<body>
    <?php
        include "header.php";
    ?>

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
                    <!-- BSTORE-BREADCRUMB START -->
                    <div class="bstore-breadcrumb">
                        <a href="index.html">HOME</a>
                        <span><i class="fa fa-caret-right   "></i></span>
                        <span>Thông tin đơn hàng</span>
                    </div>
                    <!-- BSTORE-BREADCRUMB END -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2 class="page-title">Thông tin đơn hàng</h2>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- SHOPING-CART-MENU START -->
                    <div class="shoping-cart-menu">
                            <ul class="step">
                                <li class="step-todo first">
                                    <span>Tóm tắt</span>
                                </li>
                                <li class="step-todo second">
                                    <span>Xác nhận đơn hàng</span>
                                </li>
                                <li class="step-current third">
                                    <span>Đơn hàng</span>
                                </li>
                                <!-- <li class="step-todo four">
                                    <span>04. Thanh toán</span>
                                </li>
                                <li class="step-todo last" id="step_end">
                                    <span>05. Đơn hàng</span>
                                </li> -->
                            </ul>                                   
                        </div>
                    <!-- SHOPING-CART-MENU END -->
                </div>

                   
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
            
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">Thông tin khách hàng</div>
                        <div class="panel-body">
                            <div class="col-md-4">
                                <img src="assets/img/cus_img/<?php echo $_SESSION["avt"]; ?>" alt="" style="height:auto; width:auto; object-fit: cover;">
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
                        </div>
                    </div>

                    <div class="panel panel-default" style="margin-top: 30px;">
    <div class="panel-heading">Thông tin giao hàng</div>
    <div class="panel-body">
        <label>Tỉnh/Thành phố:</label>
        <span><?php echo $_SESSION["tinh_ten"]; ?></span>
        <br>
        <label>Quận/Huyện:</label>
        <span><?php echo $_SESSION["huyen_ten"]; ?></span>
        <br>
        <label>Phường/Xã:</label>
        <span><?php echo $_SESSION["xa_ten"]; ?></span>
        <br>
        <label>Địa chỉ cụ thể:</label>
        <span><?php echo $_SESSION["diachi"]; ?></span>
        <br>
        <label>Nhà vận chuyển:</label>
        <span><?php echo $_SESSION["nhavanchuyen_ten"]; ?></span> <!-- Hiển thị tên nhà vận chuyển -->
        <br>
        <label>Phí vận chuyển:</label>
        <span><?php echo number_format($dongia_vanchuyen); ?> VNĐ</span>
    </div>
</div>


                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    <div class="panel panel-default">
        <div class="panel-heading">Danh sách sản phẩm</div>
        <div class="panel-body">
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
                            $total = 0;

                            // Lấy danh sách sản phẩm trong giỏ hàng
                            $sql = "SELECT ct.SP_MA, ct.CTGH_SOLUONG, gh.GH_MA
                                    FROM chitiet_gh ct 
                                    JOIN gio_hang gh ON ct.GH_MA = gh.GH_MA
                                    WHERE gh.KH_MA = {$khid}";
                            $rs = $conn->query($sql);

                            foreach ($rs as $sp) {
                                $sl += 1;
                                $spid = $sp["SP_MA"];
                                $sp_array[] = $spid;

                                $query = "SELECT * FROM san_pham s WHERE s.SP_MA = $spid";
                                $result = $conn->query($query);
                                foreach ($result as $s) {
                        ?>                  
                                <tr>
                                    <td><?php echo $s["SP_TEN"]; ?></td>
                                    <td><?php echo $sp["CTGH_SOLUONG"]; ?></td>
                                    <td><?php echo number_format($s["SP_GIA"]); ?></td>
                                    <td><?php echo number_format($sp["CTGH_SOLUONG"] * $s["SP_GIA"]); ?></td>                   
                                </tr>   
                        <?php
                                    $total += $sp["CTGH_SOLUONG"] * $s["SP_GIA"];
                                }
                            }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"><span>Tổng tiền sản phẩm</span></td>
                            <td colspan="1"><h4><?php echo number_format($total); ?> VNĐ</h4></td>
                        </tr>
                        <tr>
                            <td colspan="3"><span>Phí vận chuyển</span></td>
                            <td colspan="1"><h4><?php echo number_format($dongia_vanchuyen); ?> VNĐ</h4></td>
                        </tr>
                        <tr>
                            <td colspan="3"><span>Tổng tiền thanh toán</span></td>
                            <td colspan="1"><h4><?php echo number_format($tong_tien_van_chuyen); ?> VNĐ</h4></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>


            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="returne-continue-shop ship-address">
                    <a href="index.php" class="continueshoping"><i class="fa fa-chevron-left"></i>Tiếp tục mua hàng</a>
                </div>	
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

  


    <!-- main js -->
    <script src="js/main.js"></script>

</body>

</html>