<?php $this->layoutPath = "LayoutTrangChu.php"; ?>

<section class="contact-img-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="con-text">
                    <h2 class="page-title">Shop</h2>
                    <p><a href="#">Home</a> | Shop</p>
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
                  $category = $this->modelGetCategory(isset($_GET['category_id'])? $_GET['category_id'] : 0);
                  if ($category) {
                    echo '<h1>' . $category->name . '</h1>';
                  }
              ?>
            </div>
            <div class="product-recently">
                <div class="row">
                    <?php
                        foreach ($data as $item) {
                            echo '
                                <div class="col">
                                    <a href="index.php?controller=products&action=detail&id=' . $item->id . '">
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
