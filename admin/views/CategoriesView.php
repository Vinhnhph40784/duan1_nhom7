<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard SHOP BEE Store</title>
    <style>
        @import url(https://unpkg.com/@webpixels/css@1.1.5/dist/index.css);
        /* Bootstrap Icons */
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css");
    </style>
    <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScrseipt -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <script src="../script.js"></script>
</head>

<body>
    <!-- Dashboard -->
    <div class="d-flex flex-column flex-lg-row h-lg-full bg-surface-secondary">
        <!-- Vertical Navbar -->
        <nav class="navbar show navbar-vertical h-lg-screen navbar-expand-lg px-0 py-3 navbar-light bg-white border-bottom border-bottom-lg-0 border-end-lg"
            id="navbarVertical">
            <div class="container-fluid">
                <!-- Toggler -->
                <button class="navbar-toggler ms-n2" type="button" data-bs-toggle="collapse"
                    data-bs-target="#sidebarCollapse" aria-controls="sidebarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- Brand -->
                <a class="navbar-brand py-lg-2 mb-lg-5 px-lg-6 me-0" href="#">
                    <h3 class="text-success"><img src="../assets/images/logo.jpg" width="40"><span
                            class="text-info">SHOP BEE</span>STORE</h3>
                </a>

                <!-- Divider -->
                <hr class="navbar-divider my-18 opacity-20">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidebarCollapse">
                    <!-- Navigation -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">
                                <i class="bi bi-speedometer2"></i> Dashboard
                            </a>
                        </li>
                        <hr class="navbar-divider my-3 opacity-20">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=products">
                                <i class="bi bi-bag-heart"></i>Quản Lý Sản Phẩm
                            </a>
                        </li>
                        <hr class="navbar-divider my-3 opacity-20">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=orders">
                                <i class="bi bi-cash-stack"></i>Quản Lý Đơn Hàng
                            </a>
                        </li>

                        <hr class="navbar-divider my-3 opacity-20">

                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=categories">
                                <i class="bi bi-bag-heart"></i>Quản Lý Danh Mục
                            </a>
                        </li>
                        <hr class="navbar-divider my-3 opacity-20">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=collections">
                                <i class="bi bi-collection"></i>Quản Lý Thương Hiệu
                            </a>
                        </li>
                    </ul>
                    <!-- Divider -->
                    <hr class="navbar-divider my-18 opacity-20">

                    <!-- Push content down -->
                    <div class="mt-auto"></div>
                    <!-- User (md) -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="../../index.php">
                                <i class="bi bi-house-heart-fill"></i></i> Trang chủ
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?controller=login&action=logout"
                                onclick="return confirm('Are you sure you want to logout?')">
                                <i class="bi bi-box-arrow-left"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Main content -->
        <div class="h-screen flex-grow-1 overflow-y-lg-auto">
            <!-- Header -->
            <header class="bg-surface-primary border-bottom pt-6">
                <div class="container-fluid">
                    <div class="mb-npx">
                        <div class="row align-items-center">
                            <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                                <!-- Title -->
                                <h1 class="h2 mb-0 ls-tight">
                                    <img src="../assets/images/logo.jpg" width="60"> SHOP BEE Store
                                </h1>
                            </div>
                            <!-- Actions -->

                        </div>

                    </div>
                </div>
            </header>
            <!-- Main -->
            <main class="py-6 bg-surface-secondary">
                <div class="container-fluid">
                    <!-- Card stats -->
                    <div class="row g-6 mb-6">
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">Sản
                                                Phẩm</span>
                                            <span class="h3 font-bold mb-0">
                                                <?php
                                                $product = $this->modelFeatureProducts();
                                                echo '<span>' . count($product) . '</span>';
                                                ?>
                                            </span>

                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-tertiary text-white text-lg rounded-circle">
                                                <i class="bi bi-credit-card"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">Khách
                                                Hàng</span>
                                            <span class="h3 font-bold mb-0">
                                                <?php
                                                $user = $this->modelFeatureUser();
                                                echo '<span>' . count($user) . '</span>';
                                                ?>
                                            </span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                                <i class="bi bi-people"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">Đơn
                                                Hàng</span>
                                            <span class="h3 font-bold mb-0">
                                                <?php
                                                $order = $this->modelFeatureOrderDetail();
                                                echo '<span>' . count($order) . '</span>';
                                                ?>
                                            </span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                                <i class="bi bi-clock-history"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 col-12">
                            <div class="card shadow border-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <span class="h6 font-semibold text-muted text-sm d-block mb-2">Danh
                                                Mục</span>
                                            <span class="h3 font-bold mb-0">
                                                <?php
                                                $category = $this->modelGetCategories();
                                                echo '<span>' . count($category) . '</span>';
                                                ?>
                                            </span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-warning text-white text-lg rounded-circle">
                                                <i class="bi bi-minecart-loaded"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow border-0 mb-7">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">Danh Mục Sản Phẩm</h5>
                            <a href="index.php?controller=categories&action=create"
                                class="btn d-inline-flex btn-sm btn-primary mx-1">
                                <span class=" pe-2">
                                    <i class="bi bi-plus"></i>
                                </span>
                                <span>Thêm Danh Mục</span>
                            </a>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-hover table-nowrap">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Số Thứ Tự</th>
                                        <th scope="col">Danh Mục</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <tr>
                                        <?php
                                        // Lấy danh sách Sản Phẩm
                                        $pg = 1;
                                        if (isset($_GET['page'])) {
                                            $pg = $_GET['page'];
                                        }
                                        foreach ($data as $key => $item): ?>
                                    <tr>
                                        <td> <?= ++$key ?></td>
                                        <td class='text-heading font-semibold'><?= $item->name ?></td>
                                        <td>
                                            <a href="index.php?controller=categories&action=update&id=<?= $item->id ?>">
                                                <button class='btn btn-warning'>Sửa</button>
                                            </a>
                                        </td>
                                        <td>
                                            <a href="index.php?controller=categories&action=delete&id=<?= $item->id ?>"
                                                onclick="return window.confirm('Are you sure?');">
                                                <button class='btn btn-danger'>Xoá</button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer border-0 py-5">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <?php
                                    for ($i = 1; $i <= $numPage; $i++) {
                                        // Nếu là trang hiện tại thì hiển thị thẻ span
                                        // ngược lại hiển thị thẻ a
                                        if ($i == $numPage) {
                                            echo '
                            <li class="page-item"><a class="page-link" href="index.php?controller=categories&page=' . $i . '">' . $i . '</a></li>';
                                        } else {
                                            echo '
                            <li class="page-item"><a class="page-link" href="index.php?controller=categories&page=' . $i . '">' . $i . '</a></li>
                                    ';
                                        }
                                    }
                                    ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script type="text/javascript">
        function deleteCategory(id) {
            var option = confirm('Bạn có chắc chắn muốn xoá danh mục này không?')
            if (!option) {
                return;
            }
            console.log(id)
            $.post('ajax.php', {
                'id': id,
                'action': 'delete'
            }, function(data) {
                location.reload()
            })
        }
    </script>

</body>

</html>