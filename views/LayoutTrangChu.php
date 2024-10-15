<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- google fonts -->
    <link href='https://fonts.googleapis.com/css?family=Poppins:400,300,500,600,700' rel='stylesheet' type='text/css'>
    <!-- all css here -->
    <!-- bootstrap v3.3.6 css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- pe-icon-7-stroke -->
    <link rel="stylesheet" href="assets/css/pe-icon-7-stroke.min.css">
    <!-- jquery-ui.min css -->
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css">
    <!-- Image Zoom CSS
    ============================================ -->
    <link rel="stylesheet" href="assets/css/img-zoom/jquery.simpleLens.css">
    <!-- meanmenu css -->
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
    <!-- nivo slider CSS
    ============================================ -->
    <link rel="stylesheet" href="assets/lib/css/nivo-slider.css" type="text/css" />
    <link rel="stylesheet" href="assets/lib/css/preview.css" type="text/css" media="screen" />
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <!-- font-awesome css -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="assets/css/style_1.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>Shop</title>
</head>

<body class="index">

    <?php

    include "controllers/HeaderController.php";
    $obj = new HeaderController();
    $obj->index();
    ?>
    <?php echo $this->view; ?>
    <footer class="section-p1">
        <div class="col">
            <h4>HỆ THỐNG CỬA HÀNG</h4>
            <p>Chi nhánh 1 </p>
            <p>Chi nhánh 2 </p>
            <p>Chi nhánh 3 </p>
            <p>Chi nhánh 4 </p>
        </div>
        <div class="col">
            <h4>THÔNG TIN LIÊN HỆ</h4>
            <p>Tuyển dụng:<a href="liên kết "> link Website </a> </p>
            <p>Website:<a href="liên kết "> link Website </a></p>
            <p>Liên hệ CSKH: support@<a href="liên kết "> link Website </a></p>
            <p>For business: contact@<a href="liên kết "> link Website </a></p>
        </div>
        <div class="col">
            <h4>FOLLOW US ON SOCIAL MEDIA</h4>
            <li><i class="fa fa-facebook"></i></li>
            <li><i class="fa fa-instagram"></i></li>
            <li><i class="fa fa-youtube"></i></li>
        </div>
    </footer>
</body>
<script src="assets/js/vendor/jquery-1.12.0.min.js"></script>
<!-- bootstrap js -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- parallax js -->
<script src="assets/js/parallax.min.js"></script>
<!-- owl.carousel js -->
<script src="assets/js/owl.carousel.min.js"></script>
<!-- Img Zoom js -->
<script src="assets/js/img-zoom/jquery.simpleLens.min.js"></script>
<!-- meanmenu js -->
<script src="assets/js/jquery.meanmenu.js"></script>
<!-- jquery.countdown js -->
<script src="assets/js/jquery.countdown.min.js"></script>
<!-- Nivo slider js
============================================ -->
<script src="assets/lib/js/jquery.nivo.slider.js" type="text/javascript"></script>
<script src="assets/lib/home.js" type="text/javascript"></script>
<!-- jquery-ui js -->
<script src="assets/js/jquery-ui.min.js"></script>
<!-- sticky js -->
<script src="assets/js/sticky.js"></script>
<!-- plugins js -->
<script src="assets/js/plugins.js"></script>
<!-- main js -->
<script src="assets/js/main.js"></script>

</html>