<?php
    //load MVC bang tay -> load file controller
    include "controllers/HeaderController.php";
    $obj = new HeaderController();
    $obj->index();
 ?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <!-- favicon
    ============================================ -->
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


    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script><!--link lấy icon -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <title>POLOBEE Store</title>
</head>
<body></body>
<!-----------------------HEARDER ----------------------------------------->
        <div id="preloder">
			<div class="loader"></div>
		</div>
        <!-- header section start -->
		<header class="pages-header">
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-sm-4">
                            <div class="left-header clearfix">
                                <ul>
                                    <li><p><i class="fa fa-phone" aria-hidden="true"></i>(+84) 9999 12345</p></li>
                                    <li class="hd-none"><p><i class="fa fa-clock-o" aria-hidden="true"></i>Thứ 2 - 6 : 9:00 AM - 7:00 PM</p></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-8">
                            <div class="right-header ">
                                <ul>
                                    <!-- <li><a href="my-account.html"><i class="fa fa-user"></i>My account</a></li> -->
                                    <li><a href="shopping-cart.php"><i class="fa fa-shopping-cart"></i>Giỏ hàng</a></li>
                                    <li><a href="checkout_product.php"><i class="fa fa-usd"></i>Thanh toán</a></li>
                                    <?php
                                    if(getLoggedInAdmin()) {

                                            echo '<li><a style="color:#00FFFF; font-weight: 500; text-transform: uppercase;" href=""><i class="fas fa-star" style="color: #f6fa05;"></i>' . $_COOKIE['tendangnhap'] . '</a>
                                                    <ul><div class="logout">';
                                            if (getLoggedInAdmin()->role == 'admin') {
                                                echo '
                                                <li><a href="admin/index.php"><i class="fas fa-user-edit"></i>Admin</a> <br></li>
                                                ';
                                            }
                                            echo '
                                                <li><a href="changePass.php"><i class="fas fa-exchange-alt"></i>Đổi mật khẩu</a> <br></li>
                                                <li><a href="checkout_product.php"><i class="fas fa-wallet"></i>Thanh Toán</a><br></li>
                                                <li><a href="history_product.php"><i class="fas fa-history"></i>Đơn Hàng</a><br></li>
                                                <li><a href="mailbox.php"><i class="fas fa-inbox"></i>Hộp Thư</a><br></li>
                                                <li><a href="index.php?controller=login&action=logout"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a></li>
                                                <li></li>
                                                </div></ul>';
                                    } else {
                                        echo '<li><a href="login.php"><i class="fa fa-lock"></i>Đăng nhập</a></li>
                                                <li><a href="signup.php"><i class="fa fa-user-plus"></i>Đăng ký</a></li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom" id="sticky-menu">
                <div class="container relative">
                    <div class="row">
                        <div class="col-sm-2 col-md-2 col-xs-4">
                            <div class="logo">
                                <a href="index.html"><img src="" alt="" /></a>
                            </div>
                        </div>
                        <div class="col-sm-10 col-md-10 col-xs-8 static">
                            <div class="all-manu-area">
                                <div class="mainmenu clearfix hidden-sm hidden-xs">
                                    <nav>
                                        <ul>
                                            <li><a href="index.php">Home</a></li>
                                            <li><a href="#">Shop</a>
                                                <ul>
                                                    <?php
                                                    $sql = "SELECT * from category";
                                                    $result = executeResult($sql);
                                                    foreach($result as $item){
                                                        echo '<li><a href="shop.php?id_category=' . $item['id'] . '">' . $item['name'] . '</a></li>';
                                                    }
                                                    ?>
                                                </ul>
                                            </li>
                                            <li><a href="#">Collection</a>
                                                <ul>
                                                    <?php
                                                    $sql = "SELECT * from collections";
                                                    $result = executeResult($sql);
                                                    foreach($result as $item){
                                                        echo '<li><a href="collection.php?id_sanpham=' . $item['id'] . '">' . $item['name'] . '</a></li>';
                                                    }
                                                    ?>
                                                </ul>
                                            </li>
                                            <li><a href="AboutUs.php">About US</a></li>
                                            <li><a href="#">Blog</a>
                                                    <ul>
                                                        <li><a href="blog_1.php">7 TIPS PHỐI ĐỒ VỚI VARSITY JACKET</a></li>
                                                        <li><a href="blog_2.php">CÚ BẮT TAY ĐẬM CHẤT VĂN HÓA ĐƯỜNG PHỐ</a></li>
                                                        <li><a href="blog_3.php">THÔNG TIN CHƯƠNG TRÌNH</a></li>
                                                    </ul>
                                            </li>
                                            <li><a href="contact_us.php">Contact</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- mobile menu start -->
                                <div class="mobile-menu-area hidden-lg hidden-md">
                                    <div class="mobile-menu">
                                        <nav id="dropdown">
                                            <ul>
                                                <li><a href="index.php">Home</a></li>
                                                <li><a href="#">Shop</a>
                                                    <ul>
                                                        <?php
                                                        $sql = "SELECT * from category";
                                                        $result = executeResult($sql);
                                                        foreach($result as $item){
                                                            echo '<li><a href="shop.php?id_category=' . $item['id'] . '">' . $item['name'] . '</a></li>';
                                                        }
                                                        ?>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Collection</a>
                                                    <ul>
                                                        <?php
                                                        $sql = "SELECT * from collections";
                                                        $result = executeResult($sql);
                                                        foreach($result as $item){
                                                            echo '<li><a href="collection.php?id_sanpham=' . $item['id'] . '">' . $item['name'] . '</a></li>';
                                                        }
                                                        ?>
                                                    </ul>
                                                </li>
                                                <li><a href="AboutUs.php">About US</a></li>
                                                <li><a href="#">Blog</a>
                                                        <ul>
                                                            <li><a href="blog_1.php">7 TIPS PHỐI ĐỒ VỚI VARSITY JACKET</a></li>
                                                            <li><a href="blog_2.php">CÚ BẮT TAY ĐẬM CHẤT VĂN HÓA ĐƯỜNG PHỐ</a></li>
                                                            <li><a href="blog_3.php">THÔNG TIN CHƯƠNG TRÌNH</a></li>
                                                        </ul>
                                                </li>
                                                <li><a href="contact_us.php">Contact</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <!-- mobile menu end -->
                                <div class="right-header re-right-header">
                                    <ul>
                                        <li class="re-icon tnm"><i class="fa fa-search" aria-hidden="true"></i>
                                            <form action="shop.php" method="GET" id="searchform">
                                                <input type="text" value="" name="search" id="ws" placeholder="Search product..." />
                                                <button type="submit"><i class="pe-7s-search"></i></button>
                                            </form>
                                        </li>
                                        <li><a href="shopping-cart.php"><i class="fa fa-shopping-cart"></i>
                                            <?php
                                            $cart = [];
                                            if (isset($_COOKIE['cart'])) {
                                                $json = $_COOKIE['cart'];
                                                $cart = json_decode($json, true);
                                            }
                                            $count = 0;
                                            foreach ($cart as $item) {
                                                $count += $item['num']; // đếm tổng số item
                                            }
                                            ?>
                                            <span class="color1"><?= $count ?></span></a>
                                            <ul class="drop-cart">
                                                <?php

                                                    $total = 0;
                                                    foreach ($cartList as $item) {
                                                        $num = 0;
                                                        foreach ($cart as $value) {
                                                            if ($value['id'] == $item['id']) {
                                                                $num = $value['num'];
                                                                break;
                                                            }
                                                        }
                                                        $total += $num * $item['price'];
                                                        echo '
                                                        <li style="text-align: center;">

                                                            <a">
                                                                <img src="admin/product/' . $item['thumbnail'] . '" alt="" style="width: 80px">
                                                            </a>
                                                            <div class="add-cart-text">
                                                                <p><a>' . $item['title'] . '</a></p>
                                                                <p>' . number_format($item['price'], 0, ',', '.') . ' x ' . $num . '<span> VNĐ</span></p>
                                                            </div>
                                                            <div class="pro-close">
                                                                <i class="pe-7s-close" onclick="deleteCart(' . $item['id'] . ')"></i>
                                                            </div>
                                                        </li>

                                                        ';
                                                    }
                                                ?>
                                                <li class="total-amount clearfix">
                                                            <span class="floatleft">total</span>
                                                            <span class="floatright"><strong><?= number_format($total, 0, ',', '.') ?><span> VNĐ</span></strong></span>

                                                </li>
                                                <li>
                                                    <div class="goto text-center">
                                                        <a href="shopping-cart.php"><strong>go to cart &nbsp;<i class="pe-7s-angle-right"></i></strong></a>
                                                    </div>
                                                </li>
                                                <li class="checkout-btn text-center">
                                                    <a href="checkout_product.php">Check out</a>
                                                </li>

                                            </ul>

                                        </li>

                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </header>
        <!-- pages-title-end --
   <!-- jquery latest version -->
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
<?php echo $this->view; ?>

<!--------------------FOOTER--------------------------- -->
<footer class="section-p1"><!--mục footer -->
    <div class="col">
        <h4>HỆ THỐNG CỬA HÀNG</h4><!--Hệ thông cửa hàng -->
        <p>Chi nhánh 1 </p>
        <p>Chi nhánh 2 </p>
        <p>Chi nhánh 3 </p>
        <p>Chi nhánh 4 </p>
    </div>
    <div class="col">
        <h4>THÔNG TIN LIÊN HỆ</h4><!--Thông tin liên hệ -->
        <p>Tuyển dụng:<a href ="liên kết "> link Website </a> </p>
        <p>Website:<a href ="liên kết "> link Website </a></p>
        <p>Liên hệ CSKH: support@<a href ="liên kết "> link Website </a></p>
        <p>For business: contact@<a href ="liên kết "> link Website </a></p>
    </div>
    <div class="col">
        <h4>FOLLOW US ON SOCIAL MEDIA</h4><!--Follow us on social media-->
        <li><i class="fa fa-facebook"></i></li>
        <li><i class="fa fa-instagram"></i></li>
        <li><i class="fa fa-youtube"></i></li>
    </div>
</footer>
<style>
/*----------------FOOTER--------------------*/

footer{
    background:rgb(0, 0, 0);
    display:flex;
    margin-top:0px;
    justify-content: space-around;
    margin-bottom:0px;
    padding-bottom: 20px;   /*chỉnh size background đen */
    padding-left:150px;

}
footer.col{

    display:flex;
    flex-direction:column;
    align-items: flex-start;
    margin-top: 100p;
}
footer h4{   /*chỉnh size chữ H4*/
    color:rgb(255, 255, 255);
    font-size: 16px;
    padding-bottom:30px;
    margin-top:40px;
    font-weight: bold;
}
footer p{  /*chỉnh size chữ P*/
    color:rgb(255, 255, 255);
    font-size: 13px;
    text-decoration:none;
    margin-bottom:15px;


}
footer li{ /*chỉnh icon fb,instagram,youtube*/
    color:#fff;
    margin-top: 3px;
    font-weight: bold;


}

</style>

<style>
