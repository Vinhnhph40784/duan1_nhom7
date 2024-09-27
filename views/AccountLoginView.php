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
<div class="login-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="tb-login-form ">
                    <h5 class="tb-title">Đăng nhập</h5>
                    <p>Đăng nhập tài khoản để trải nghiệm mua sắm tại POLOBEE</p>
                  
                    <form action="index.php?controller=account&action=loginPost" method="POST">
                        <p class="checkout-coupon top log a-an">
                            <label class="l-contact">
                            Tên đăng nhập
                            <em>*</em>
                            </label>
                            <input type="text" name="tendangnhap" required>
                        </p>
                        <p class="checkout-coupon top-down log a-an">
                            <label class="l-contact">
                            Mật khẩu
                            <em>*</em>
                            </label>
                            <input type="password" name="matkhau" required>
                        </p>
                        <div class="forgot-password1">
                            <label class="inline2">
                            <input type="checkbox" name="rememberme7">
                            Remember me! <em>*</em>
                            </label>
                            <a class="forgot-password" href="#">Forgot Your password?</a>
                        </div>
                        <p class="login-submit5">
                            <input class="button-primary" type="submit" name="submit" value="Đăng nhập">
                        </p>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>

<hr class="opacity-20">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>