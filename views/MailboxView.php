<?php $this->layoutPath = "LayoutTrangChu.php"; ?>
<section class="contact-img-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div class="con-text">
                                <h2 class="page-title">Liên hệ</h2>
                                <p><a href="#">Home</a> | Liên hệ</p>
                            </div>
                        </div>
                    </div>
                </div>
</section>
<body >
<hr class="opacity-20">
<body>

<div class="container">
    <h2>Mailbox đã gửi</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Họ Tên</th>
                <th scope="col">Email</th>
                <th scope="col">Message</th>
                <th scope="col">Ngày Tạo</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $pg = 1;
            // Lấy danh sách Sản Phẩm
            if (isset($_GET['page'])) {
                $pg = $_GET['page'];
            }
            foreach ($data as $item) {
                echo '  <tr>
                    <td class="text-heading font-semibold">' . $item->hoten . '</td>
                    <td class="text-heading font-semibold">' . $item->email . '</td>
                    <td class="text-heading font-semibold">' . $item->message_contact . '</td>
                    <td class="text-heading font-semibold">' . $item->created_at . '</td>
                </tr>';
            }

        ?>
        </tbody>
    </table>
    <div class="card-footer border-0 py-5">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
            <?php
            $current_page = ceil($numPage / 5);
            for ($i = 1; $i <= $current_page; $i++) {
                // Nếu là trang hiện tại thì hiển thị thẻ span
                // ngược lại hiển thị thẻ a
                if ($i == $current_page) {
                    echo '
            <li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
                } else {
                    echo '
            <li class="page-item"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>
                    ';
                }
            }
        ?>
            </ul>
        </nav>
    </div>
</div>


<!-- Bootstrap JS và Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


