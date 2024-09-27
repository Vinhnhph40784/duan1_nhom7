<div id="preloder">
    <div class="loader"></div>
</div>

<header class="pages-header">
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-4">
                    <div class="left-header clearfix">
                        <ul>
                            <li>
                                <p><i class="fa fa-phone" aria-hidden="true"></i>(+84) 9999 12345</p>
                            </li>
                            <li class="hd-none">
                                <p><i class="fa fa-clock-o" aria-hidden="true"></i>Thứ 2 - 6 : 9:00 AM - 7:00 PM</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-sm-8">
                    <div class="right-header ">
                        <ul>
                            
                            <li><a href="index.php?controller=cart"><i class="fa fa-shopping-cart"></i>Giỏ hàng</a></li>
                            <li><a href="index.php?controller=cart&action=checkout"><i class="fa fa-usd"></i>Thanh toán</a></li>
                            <?php
                                if(getLoggedInUser()) {
                                        echo '<li><a style="color:#00FFFF; font-weight: 500; text-transform: uppercase;" href=""><i class="fas fa-star" style="color: #f6fa05;"></i>' . getLoggedInUser()->tendangnhap . '</a>
                                                <ul><div class="logout">';
                                        if (getLoggedInUser()->role) {
                                            echo '
                                            <li><a href="admin/index.php"><i class="fas fa-user-edit"></i>Admin</a> <br></li>
                                            ';
                                        }
                                        echo '
                                            <li><a href="index.php?controller=account&action=changePass"><i class="fas fa-exchange-alt"></i>Đổi mật khẩu</a> <br></li>
                                            <li><a href="index.php?controller=cart&action=checkout"><i class="fas fa-wallet"></i>Thanh Toán</a><br></li>
                                            <li><a href="index.php?controller=cart&action=history"><i class="fas fa-history"></i>Đơn Hàng</a><br></li>
                                            <li><a href="index.php?controller=contactus&action=mailbox"><i class="fas fa-inbox"></i>Hộp Thư</a><br></li>
                                            <li><a href="index.php?controller=account&action=logout"><i class="fas fa-sign-out-alt"></i>Đăng xuất</a></li>
                                            <li></li>
                                            </div></ul>';
                                } else {
                                    echo '<li><a href="index.php?controller=account&action=login"><i class="fa fa-lock"></i>Đăng nhập</a></li>
                                            <li><a href="index.php?controller=account&action=register"><i class="fa fa-user-plus"></i>Đăng ký</a></li>';
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
                                    <li>
                                        <a href="#">Shop</a>
                                        <ul>
                                            <?php
                                                $categories = $this->modelGetCategories();
                                                foreach($categories as $item){
                                                    echo '<li><a href="index.php?controller=products&action=categories&category_id=' . $item->id . '">' . $item->name . '</a></li>';
                                                }
                                                ?>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="#">Collection</a>
                                        <ul>
                                            <?php
                                                $collections = $this->modelGetCollections();
                                                foreach($collections as $item){
                                                    echo '<li><a href="index.php?controller=products&action=collection&id_sanpham=' . $item->id . '">' . $item->name . '</a></li>';
                                                }
                                                ?>
                                        </ul>
                                    </li>
                                    <li><a href="index.php?controller=aboutus">About US</a></li>
                                    <li>
                                        <a href="#">Blog</a>
                                        <ul>
                                            <li><a href="index.php?controller=blog&type=1">POLOBEE</a></li>
                                            <li><a href="index.php?controller=blog&type=2">XU HƯỚNG POLO</a></li>
                                            <li><a href="index.php?controller=blog&type=3">THÔNG TIN CHƯƠNG TRÌNH</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="index.php?controller=contactus">Contact</a></li>
                                </ul>
                            </nav>
                        </div>

                        <div class="mobile-menu-area hidden-lg hidden-md">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul>
                                        <li><a href="index.php">Home</a></li>
                                        <li>
                                            <a href="#">Shop</a>
                                            <ul>
                                                <?php
                                                    $categories = $this->modelGetCategories();
                                                    foreach($categories as $item){
                                                        echo '<li><a href="index.php?controller=products&action=categories&category_id=' . $item->id . '">' . $item->name . '</a></li>';
                                                    }
                                                    ?>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">Collection</a>
                                            <ul>
                                                <?php
                                                    $collections = $this->modelGetCollections();
                                                    foreach($collections as $item){
                                                        echo '<li><a href="collection.php?id_sanpham=' . $item->id . '">' . $item->name . '</a></li>';
                                                    }
                                                    ?>
                                            </ul>
                                        </li>
                                        <li><a href="index.php?controller=aboutus">About US</a></li>
                                        <li>
                                            <a href="#">Blog</a>
                                            <ul>
                                                <li><a href="index.php?controller=blog&type=1">POLO BEE</a></li>
                                                <li><a href="index.php?controller=blog&type=2">SỰ RA ĐỜI CỦA POLOBEE</a></li>
                                                <li><a href="index.php?controller=blog&type=3">THÔNG TIN CHƯƠNG TRÌNH</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="index.php?controller=contactus">Contact</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <div class="right-header re-right-header">
                            <ul>
                                <li class="re-icon tnm">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    <form action="index.php?controller=products&action=categories" method="GET" id="searchform">
                                        <input type="text" value="" name="search" id="ws" placeholder="Search product..." />
                                        <button type="submit"><i class="pe-7s-search"></i></button>
                                    </form>
                                </li>
                                <li>
                                    <a href="index.php?controller=cart"><i class="fa fa-shopping-cart"></i>
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
                                            $cartList = $this->modelGetCart();
                                            $total = 0;
                                            foreach ($cartList as $item) {
                                                $num = 0;
                                                foreach ($cart as $value) {
                                                    if ($value['id'] == $item->id) {
                                                        $num = $value['num'];
                                                        break;
                                                    }
                                                }
                                                $total += $num * $item->price;
                                                echo '
                                                <li style="text-align: center;">

                                                    <a">
                                                        <img src="assets/images/' . $item->thumbnail . '" alt="" style="width: 80px">
                                                    </a>
                                                    <div class="add-cart-text">
                                                        <p><a>' . $item->title . '</a></p>
                                                        <p>' . number_format($item->price, 0, ',', '.') . ' x ' . $num . '<span> VNĐ</span></p>
                                                    </div>
                                                    <div class="pro-close">
                                                        <a href="index.php?controller=cart&action=delete&id='. $item->id .'"><i class="pe-7s-close"></i></a>
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
                                                <a href="index.php?controller=cart"><strong>go to cart &nbsp;<i class="pe-7s-angle-right"></i></strong></a>
                                            </div>
                                        </li>
                                        <li class="checkout-btn text-center">
                                            <a href="index.php?controller=cart&action=checkout">Check out</a>
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
