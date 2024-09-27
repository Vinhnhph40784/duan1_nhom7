<?php $this->layoutPath = "LayoutTrangChu.php"; ?>
<section class="contact-img-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="con-text">
                    <h2 class="page-title">Bộ Sưu Tập</h2>
                    <p><a href="#">Home</a> | Thương hiệu</p>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="container">

    <section class="main">
        <section class="recently">
            <div class="title">
                <?php
                    $collections = $this->modelGetCollections(isset($_GET['id_sanpham'])? $_GET['id_sanpham'] : 0);
                    echo '<h1>' . $collections->name . '</h1>';
                ?>
            </div>
            <div class="product-recently">
                <div class="row">
                    <?php
                        foreach ($data as $item) {
                            echo '
                                <div class="col">
                                    <a href="single_product.php?id=' . $item->id . '">
                                        <img class="thumbnail" src="assets/images/' . $item->thumbnail . '" alt="">
                                        <div class="title">
                                            <p>' . $item->title . '</p>
                                        </div>
                                        <div class="price">
                                            <span>' . number_format($item->price, 0, ',', '.') . ' VNĐ</span>
                                        </div>
                                        <div class="more">
                                            <div class="star">
                                                <img src="assets/images/icon/icon-star.svg" alt="">
                                                <span>4.9</span>
                                            </div>
                                            <div class="time">
                                                <img src="assets/images/icon/icon-clock.svg" alt="">
                                                <span>99 comment</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                ';
                        }
                        ?>
                </div>
            </div>
        </section>
    </section>
</div>

