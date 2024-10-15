<?php $this->layoutPath = "LayoutTrangChu.php"; ?>
<!-- pages-title-start -->
<section class="contact-img-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="con-text">
                    <h2 class="page-title">ĐỔI MẬT KHẨU</h2>
                    <p><a href="#">Home</a> | Đổi mật khẩu</p>
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
                    <h5 class="tb-title">Đổi mật khẩu</h5>
                    <p>Đổi mật khẩu tài khoản để trải nghiệm mua sắm tại POLOBEE</p>

                    <form action="index.php?controller=account&action=changePassPost" method="POST">
                        <p class="checkout-coupon top log a-an">
                            <label class="l-contact">
                            Mật khẩu hiện tại
                            <em>*</em>
                            </label>
                            <input type="password" name="password" required>
                        </p>
                        <p class="checkout-coupon top-down log a-an">
                            <label class="l-contact">
                            Mật khẩu mới
                            <em>*</em>
                            </label>
                            <input type="password" name="newpassword" required>
                        </p>
                        <p class="checkout-coupon top-down log a-an">
                            <label class="l-contact">
                            Nhập lại mật khẩu mới
                            <em>*</em>
                            </label>
                            <input type="password" name="renewpassword" required>
                        </p>
                        <div class="forgot-password1">
                            <a class="forgot-password" href="#">Forgot Your password?</a>
                        </div>
                        <p class="login-submit5">
                            <input class="button-primary" type="submit" name="submit" value="Đổi mật khẩu">
                        </p>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>

<hr class="opacity-20">