<?php $this->layoutPath = "LayoutTrangChu.php"; ?>
<style>
section.main {
    padding: 0 0;
    width: 100%;
    margin: 0px auto;
}

section.main a {
    text-decoration: none;
}

section.main section.recently .link a {
    text-decoration: none;
    color: black;
    font-size: 20px;
}

section.main section.recently .product-recently {
    padding-top: 2rem;
}

section.main section.recently .product-recently .row {
    display: grid;
    grid-template-columns: auto auto auto auto;
    grid-column-gap: 30px;
    grid-row-gap: 30px;
}

section.main section.recently .product-recently .row .col img {
    width: 100%;
    border-radius: 10px;
}

section.main section.recently .product-recently .row .col img.thumbnail {
    border: 1px solid rgb(76, 78, 85);
    transition: 0.1s;
}

section.main section.recently .product-recently .row .col img.thumbnail:hover {
    box-shadow: 0px 0px 5px 0px grey;
}

section.main section.recently .product-recently .row .col .title p {
    font-size: 20px;
    font-weight: 600;
    padding: 0px;
    margin: 5px 0;
    color: black;
    font-family: "Encode Sans SC", sans-serif;
}

section.main section.recently .product-recently .row .col .price span {
    padding: 10px 0;
    color: #676767;
    font-size: 20px;
    font-weight: 600;
    color: rgba(207, 16, 16, 0.815);
    font-family: "Bebas Neue", cursive;
}

section.main section.recently .product-recently .row .col .dish span {
    padding: 10px 0;
    color: #676767;
}

section.main section.recently .product-recently .row .col .more {
    display: flex;
    color: #676767;
    padding: 5px 0;
    font-size: 18px;
}

section.main section.recently .product-recently .row .col .more .star {
    display: flex;
    align-items: center;
    justify-content: center;
}

section.main section.recently .product-recently .row .col .more .star img {
    width: 25px;
    height: 25px;

}

section.main section.recently .product-recently .row .col .more .time {
    display: flex;
    padding: 0 10px;

}

section.main section.recently .product-recently .row .col .more .time img {
    width: 24px;
    height: 24px;
}

section.main section.recently .title h1 {
    font-size: 35px;
    margin: 0px;
    padding: 30px;
    color: black;
    text-align: center;
}

section.main section.recently {
    padding-bottom: 3rem;
    padding-left: 3rem;
    padding-right: 3rem;
}
</style>
<section class="slider-main-area">
    <div class="main-slider an-si">
        <div class="bend niceties preview-2 hm-ver-1">
            <div id="ensign-nivoslider-2" class="slides">
                <img src="assets/images/banner_2.jpg" alt="" title="#slider-direction-3" />
                <img src="assets/images/banner_1.jpg" alt="" title="#slider-direction-1" />
            </div>
            <!-- direction 1 -->
            <div id="slider-direction-3" class="t-cn slider-direction Builder">
                <div class="slide-all">
                    <!-- layer 1 -->

                    <!-- layer 3 -->
                    <div class="layer-3">
                        <a class="min1" href="index.php?controller=products&action=categories&category_id=1">Shop
                            Now</a>
                    </div>
                </div>
            </div>
            <div id="slider-direction-1" class="t-cn slider-direction Builder">
                <div class="slide-all slide2">
                    <!-- layer 1 -->

                    <div class="layer-3">
                        <a class="min1" href="index.php?controller=products&action=categories&category_id=3">Shop
                            Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- collection section start -->
<div class="banner-area">
    <div class="container">
        <div class="section-padding1">

        </div>
    </div>
</div>

<section class="featured-products single-products section-padding-top">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-title">
                    <h3>SẢN PHẨM TIÊU BIỂU</h3>
                    <div class="section-icon">
                        <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="product-tab nav nav-tabs">
                    <ul>
                        <li class="active"><a data-toggle="tab" href="#all">Tất cả sản phẩm</a></li>
                        <?php
                        $categories = $this->modelGetCategories();
                        foreach ($categories as $category) {
                            echo '<li><a data-toggle="tab" href="#' . $category->name . '">' . $category->name . '</a></li>';
                        }
                        ?>
                    </ul>

                </div>
            </div>
        </div>
        <div class="row tab-content">
            <div class="tab-pane  fade in active" id="all">
                <div id="tab-carousel-1" class="re-owl-carousel owl-carousel product-slider owl-theme">
                    <?php
                    $feature_product = $this->modelFeatureProducts();
                    foreach ($feature_product as $item) {
                        echo '
                        <div class="col-xs-12">
                            <div class="single-product">
                                <div class="product-img">
                                    <div class="pro-type">
                                        <span>sale</span>
                                    </div>
                                    <a href="index.php?controller=products&action=detail&id=' . $item->id . '">
                                        <img class="thumbnail" src="assets/images/' . $item->thumbnail . '" alt="' . $item->title . '" />
                                        <img class="secondary-image" alt="' . $item->title . '" src="assets/images/' . $item->thumbnail . '">
                                    </a>
                                </div>
                                <div class="product-dsc">
                                    <h3><a href="#">' . $item->title . '</a></h3>
                                    <div class="star-price">
                                        <span class="price-left">' . number_format($item->price, 0, ',', '.') . ' VNĐ</span>
                                        <span class="star-right">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-half-o"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="actions-btn">

                                </div>
                            </div>

                        </div>';
                    }
                    ?>
                </div>
            </div>
            <!-- Hoodie product end -->
            <?php
            $categories = $this->modelGetCategories();
            foreach ($categories as $category) {
                echo '<div class="tab-pane fade in" id="' . $category->name . '">';
                echo '<div id="tab-carousel-' . $category->id . '" class="owl-carousel product-slider owl-theme">';

                $category_products = $this->modelGetProducts($category->id);
                foreach ($category_products as $product) { // Sửa biến $item thành $product
                    echo '<div class="col-xs-12">
                        <div class="single-product">
                            <div class="product-img">
                                <div class="pro-type">
                                    <span>sale</span>
                                </div>
                                <a href="index.php?controller=products&action=detail&id=' . $product->id . '">
                                    <img class="thumbnail" src="assets/images/' . $product->thumbnail . '" alt="' . $product->title . '" /> <!-- Sửa $item thành $product -->
                                    <img class="secondary-image" alt="' . $product->title . '" src="assets/images/' . $product->thumbnail . '"> <!-- Sửa $item thành $product -->
                                </a>
                            </div>
                            <div class="product-dsc">
                                <h3><a href="#">' . $product->title . '</a></h3> <!-- Sửa $item thành $product -->
                                <div class="star-price">
                                    <span class="price-left">' . number_format($product->price, 0, ',', '.') . ' VNĐ</span> <!-- Sửa $item thành $product -->
                                    <span class="star-right">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="actions-btn">

                            </div>
                        </div>

                    </div>';
                }

                echo '</div></div>';
            }
            ?>

        </div>
    </div>
</section>

<div id="banner2">

    <div class="box-left">
        <h2>
            <span>SUMMER</span>
        </h2>
        <a href="thucdon_2.php?id_sanpham=2">
            <button>Mua ngay </button>
        </a>
    </div>
</div>

<section class="new-products single-products section-padding-top">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="section-title">
                    <h3>SẢN PHẨM HOT</h3>
                    <div class="section-icon">
                        <i class="fa fa-dot-circle-o" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div id="new-products" class="owl-carousel product-slider owl-theme">
                <?php
                $productList = $this->modelHotProducts();
                foreach ($productList as $item) {
                    echo '
                            <div class="col-xs-12">
                                <div class="single-product">
                                    <div class="product-img">
                                        <div class="pro-type">
                                            <span>sale</span>
                                        </div>
                                        <a href="index.php?controller=products&action=detail&id=' . $item->product_id . '">
                                            <img class="thumbnail" src="assets/images/' . $item->thumbnail . '" alt="' . $item->title . '" />
                                            <img class="secondary-image" alt="' . $item->title . '" src="assets/images/' . $item->thumbnail . '">
                                        </a>
                                    </div>
                                    <div class="product-dsc">
                                        <h3><a href="#">' . $item->title . '</a></h3>
                                        <div class="star-price">
                                            <span class="price-left">' . number_format($item->price, 0, ',', '.') . ' VNĐ</span>
                                            <span class="star-right">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-half-o"></i>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="actions-btn">

                                    </div>
                                </div>
                            </div>';
                }
                ?>
            </div>
        </div>
    </div>
</section>

<div id="banner3">

    <div class="box-left">
        <a href="thucdon_2.php?id_sanpham=3">
            <button>Mua ngay </button>
        </a>
    </div>
</div>


<!--------------------BANNER SALE--------------------------- -->

</section>