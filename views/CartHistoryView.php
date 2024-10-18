<?php $this->layoutPath = "LayoutTrangChu.php";
$cartList = $this->modelGetCart();
?>
<section class="contact-img-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="con-text">
                    <h2 class="page-title">LỊCH SỬ ĐƠN HÀNG</h2>
                    <p><a href="#">Home</a> | Lịch sử đơn hàng</p>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="shopping-cart-area s-cart-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <div class="s-cart-all">
                    <div class="cart-form table-responsive">
                        <?php
                        if (!isset($_COOKIE['tendangnhap'])) {
                            echo '<p style="font-weight: bold; text-align: center; font-size: 16px;">Vui lòng đăng nhập trước khi truy cập lịch sử đơn hàng.</p>
                                        <hr class="opacity-20">
                                        <div class="row">
                                            <div class="second-all-class">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="wc-proceed-to-checkout" style="text-align: center;">
                                                        <p class="return-to-shop">
                                                            <a class="button wc-backward" href="index.php?controller=account&action=login">Đăng nhập để tiếp tục</a>
                                                        </p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    <div>
                </div>
            </div>
            </div>
    </div>
</div>   ';
                        } else {
                        ?>
                            <table id="shopping-cart-table" class="data-table cart-table">
                                <tr>
                                    <th class="low8">STT</th>
                                    <th class="low1">Ảnh Sản Phẩm</th>
                                    <th class="low1">Tên Sản Phẩm</th>
                                    <th class="low7">Giá</th>
                                    <th class="low7">Số Lượng</th>
                                    <th class="low7">Tổng Tiền</th>
                                    <th class="low7">Trạng Thái</th>

                                </tr>
                                <tr>
                                    <?php
                                    if (getLoggedInUser()) {
                                        $userId = getLoggedInUser()->id_user;

                                        $order_details_List = $this->modelGetCartHistory();
                                        $total = 0;
                                        $count = 0;
                                        foreach ($order_details_List as $item) {
                                            echo '
                                            <tr style="text-align: center;">
                                                <td width="50px">' . (++$count) . '</td>
                                                <td class="sop-cart an-shop-cart">
                                                    <a><img src="assets/images/' . $item->thumbnail . '" alt=""></a>
                                                </td>
                                                <td class="sop-cart an-shop-cart">
                                                    <a style="font-weight:600;">' . $item->title . '</a>
                                                </td>
                                                <td class="b-500 red">
                                                    <span class="gia none">' . number_format($item->price, 0, ',', '.') . '</span>
                                                    <span> VNĐ</span>
                                                </td>
                                                <td class="sop-cart an-sh">
                                                    <div class="quantity ray">
                                                        ' . $item->num . '
                                                    </div>
                                                </td>

                                                <td class="b-500 red" style="color:#CC0033; font-weight:600;">
                                                    ' . number_format($item->num * $item->price, 0, ',', '.') . '
                                                    <span> VNĐ</span>
                                                </td>
                                                <td style="color:green; font-weight:600;">
                                                    ' . $item->status . '
                                                </td>
                                            </tr>
                                            ';
                                        }
                                    }
                                    ?>

                                </tr>

                            </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
                        }
?>
<script>
    function addToCart(button) {
        var itemId = button.getAttribute('data-item-id');
        var num = document.getElementById(itemId + '_num').value;

        $.post('index.php?controller=cart&action=update', {
            'id': itemId.split('_')[1],
            'num': num
        }, function(data) {
            location.reload();
        });
    }

    function updatePrice(itemId, itemPrice) {
        // Kiểm tra nếu giá trị nhập vào không phải là số hoặc là số nguyên âm
        var priceId = itemId + '_price';
        var num = document.getElementById(itemId + '_num').value;
        if (isNaN(num) || num <= 0) {
            // Nếu không hợp lệ, đặt giá trị mặc định là 1
            numInput.value = 1;
            num = 1;
        }
        var tong = itemPrice * num; // Tính tổng giá trị mới của sản phẩm
        document.getElementById(priceId).innerHTML = tong.toLocaleString();
        updateGrandTotal(); // Gọi hàm cập nhật tổng giá trị mới của đơn hàng
    }


    function updateGrandTotal() {
        var grandTotal = 0;
        var itemPrices = document.querySelectorAll('.gia.none');
        var itemQuantities = document.querySelectorAll('.input-text.qty.text');
        for (var i = 0; i < itemPrices.length; i++) {
            var price = itemPrices[i].innerText.match(/\d/g).join("");
            var quantity = itemQuantities[i].value;
            grandTotal += price * quantity;
        }
        document.querySelector('.order-total .amount').innerText = grandTotal.toLocaleString();
    }
</script>
<hr class="opacity-20">
<hr class="opacity-20">