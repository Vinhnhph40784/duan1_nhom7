<?php $this->layoutPath = "LayoutTrangChu.php"; ?>
<!-- pages-title-start -->
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

<div class="login-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="tb-login-form ">
                    <h5 class="tb-title">Đăng ký</h5>
                    <p>Đăng ký tài khoản để có thể mua sắm tại POLOBEE</p>
                  
                    <form action="index.php?controller=account&action=registerPost" method="POST">
                        <p class="checkout-coupon top log a-an">
                            <label class="l-contact">
                            Họ và tên
                            <em>*</em>
                            </label>
                            <input type="text" name="hovaten" required>
                        </p>
                        <p class="checkout-coupon top-down log a-an">
                            <label class="l-contact">
                            Tên đăng nhập
                            <em>*</em>
                            </label>
                            <input type="text" name="tendangnhap" required>
                        </p>
                        <p class="checkout-coupon top-down log a-an">
                            <label class="l-contact">
                            Email
                            <em>*</em>
                            </label>
                            <input type="text" name="email" required>
                        </p>
                        <p class="checkout-coupon top-down log a-an">
                            <label class="l-contact">
                            Số điện thoại
                            <em>*</em>
                            </label>
                            <input type="text" name="dienthoai" required>
                        </p>
                        <p class="checkout-coupon top-down log a-an">
                            <label class="l-contact">
                            Mật khẩu
                            <em>*</em>
                            </label>
                            <input type="text" name="matkhau" required>
                        </p>
                        <p class="checkout-coupon top-down log a-an">
                            <label class="l-contact">
                            Địa chỉ
                            <em>*</em>
                            </label>
                            <input type="text" name="diachi" required>
                        </p>
                        
                        <p class="login-submit5">
                            <input class="button-primary" type="submit" name="dangky" value="Đăng ký">
                        </p>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>

<hr class="opacity-20">