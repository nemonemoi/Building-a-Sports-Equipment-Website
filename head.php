<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>



<?php
require 'connect.php';                       
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

    <title>Home</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        .custom-cursor {
    
    width: 40px;
    height: 40px;
    background: url('../img/icon.png') no-repeat center center;
    background-size: contain;
    position: absolute;
    pointer-events: none;
    z-index: 1000;
    transform: translate(-5%, 15%); /* Dịch chuyển icon xuống dưới con trỏ */
    transition: transform 0.1s ease-out;
    }
    </style>
    <div class="custom-cursor"></div>
    <!-- Favicon
		============================================ -->
        <link rel="icon" href="../img/icon.png" type="image/x-icon/">
    <!-- <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png"> -->
    <!-- FONTS
		============================================ -->
    <link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Bitter:400,700,400italic&amp;subset=latin,latin-ext'
        rel='stylesheet' type='text/css'>
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- FANCYBOX CSS
		============================================ -->
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <!-- BXSLIDER CSS
		============================================ -->
    <link rel="stylesheet" href="css/jquery.bxslider.css">
    <!-- MEANMENU CSS
		============================================ -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- JQUERY-UI-SLIDER CSS
		============================================ -->
    <link rel="stylesheet" href="css/jquery-ui-slider.css">
    <!-- NIVO SLIDER CSS
		============================================ -->
    <link rel="stylesheet" href="css/nivo-slider.css">
    <!-- OWL CAROUSEL CSS 	
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <!-- OWL CAROUSEL THEME CSS 	
		============================================ -->
    <link rel="stylesheet" href="css/owl.theme.css">
    <!-- BOOTSTRAP CSS 
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- FONT AWESOME CSS 
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- NORMALIZE CSS 
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- MAIN CSS 
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- STYLE CSS 
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- RESPONSIVE CSS 
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- IE CSS 
		============================================ -->
    <link rel="stylesheet" href="css/ie.css">
    <!-- MODERNIZR JS 
		============================================ -->
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    <script>
        // Lấy phần tử custom-cursor
        const cursor = document.querySelector('.custom-cursor');

        // Thêm sự kiện di chuyển chuột
        document.addEventListener('mousemove', (e) => {
            cursor.style.left = e.pageX + 'px';
            cursor.style.top = e.pageY + 'px';
        });
    </script>
</head>