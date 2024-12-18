<!doctype html>
<html lang="en">

<?php include "head.php" ?>

<body>
    <?php
		include "header.php";
	?>
    <?php
$name = "" ;
$email = "" ;
$dt= "";
$mk= "";
$kqdk ="";
$repass ="";

?>
    <!-- main -->
    <!-- MAIN-CONTENT-SECTION START -->
    <section class="main-content-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!-- BSTORE-BREADCRUMB START -->
                    <div class="bstore-breadcrumb">
                        <a href="index.php">Home</a>
                        <span><i class="fa fa-caret-right"></i></span>
                        <span>Đăng nhập / Đăng ký tài khoản</span>
                    </div>
                    <!-- BSTORE-BREADCRUMB END -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2 class="page-title">Đăng nhập / Đăng ký</h2>
                </div>
                <!-- Đăng nhập tài khoản -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="primari-box registered-account">
                        <form class="new-account-box" id="ff1" name="form1" method="POST" action="login.php">
                            <h3 style="color: black;" class="box-subheading">Đăng nhập</h3>
                            <div class="form-content" style="color: black;">
                                <div class="form-group">
                                    Tên đăng nhập
                                    <input type="text" class="form-control" placeholder="Tài khoản" name="txtus" required >
                                </div>
                                <div class="form-group">
                                    Mật khẩu
                                    <input type="password" class="form-control" placeholder="Mật khẩu" name="password"required >
                                </div>
                                <div  class="forget-password">
                                    <p style="color: black;"><a href="#">Forgot your password?</a></p>
                                </div>
                                <div class="submit-button">
                                    <button type="submit" name="submit" class="btn btn-danger" name="login" id="login">Đăng nhập</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Đăng ký tài khoản -->
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="create-new-account">
                        <form class="new-account-box primari-box" id="ff2" name="form2" method="post" action="sign_up.php" enctype="multipart/form-data">
                            <h3 style="color: black;" class="box-subheading">Đăng ký tài khoản</h3>
                            <div class="form-content" style="color: black;">
                                <div class="form-group">
                                    Họ Tên
                                    <input type="text" class="form-control" placeholder="Nhập họ và tên" name="fullname" id="firstname" value="<?php echo $name;?>" required>
                                </div>
                                <div class="form-group">
                                    Email
                                    <input type="email" class="form-control" placeholder="Nhập địa chỉ email" name="email" id="email" value="<?php echo $email;?>" required>
                                </div>
                                <div class="form-group">
                                    Điện thoại
                                    <input type="text" class="form-control" placeholder="Nhập số điện thoại" name="phone" id="phone" value="<?php echo $dt;?>" required>
                                </div>
                                <div class="form-group">
                                    Ngày sinh
                                    <input type="date" class="form-control" name="birthday" id="birthday" required>
                                </div>
                                <div class="form-group">
                                    Giới tính
                                    <select class="form-control" name="sex" id="sex" required>
                                        <option value="" selected disabled hidden>-Chọn-</option>
                                        <option value="m">Nam</option>
                                        <option value="f">Nữ</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    Địa chỉ
                                    <input type="text" class="form-control" placeholder="Địa chỉ liên hệ" name="position" id="position" required>
                                </div>
                                <div class="form-group">
                                    Tải ảnh đại diện:
                                    <br>
                                    <input class="mt-3" type="file" name="cusImg" id="input" accept="image/*" required>
                                </div>
                                <div class="mb-3 px-3 col-3">
                                    <div id="preview"></div>
                                    <script>
                                    var input = document.getElementById("input");
                                    var preview = document.getElementById("preview");

                                    input.addEventListener("change", function() {
                                        preview.innerHTML = ""; // clear previous preview
                                        var files = this.files;
                                        for (var i = 0; i < files.length; i++) {
                                            var file = files[i];
                                            if (!file.type.startsWith("image/")) {
                                                continue
                                            } // skip non-image files
                                            var reader = new FileReader();
                                            reader.onload = function(e) {
                                                var img = document.createElement("img");
                                                img.src = e.target.result;
                                                img.width = 100; // set width for preview images
                                                img.className = "rounded-circle avatar avatar-xxl ms-4";
                                                preview.appendChild(img); // append image to preview div
                                            };
                                            reader.readAsDataURL(file); // read file as data url
                                        }
                                    });
                                    </script>
                                </div>
                                <div class="form-group">
                                    Tên đăng nhập
                                    <input type="text" class="form-control" placeholder="Nhập tên đăng nhập" name="account" id="account">
                                </div>
                                <div class="form-group">
                                    Mật khẩu
                                    <input type="password" class="form-control" placeholder="Mật khẩu" name="password" id="password" value="<?php echo $mk;?>" required>
                                </div>
                                <div class="form-group">
                                    Xác nhận mật khẩu
                                    <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="repass" id="repass" value="<?php echo $repass;?>" required>
                                </div>
                                <button type="submit" name="dangky" class="btn btn-danger">Đăng ký</button>
                                <P style="color:red"><?php echo $kqdk; ?></p>
                        </form>

                    </div>
                    </form>
                </div>
                <!-- CREATE-NEW-ACCOUNT END -->
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