<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật đơn hàng</title>
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
    <!-- Latest compiled JavaScript -->
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
                            class="text-info">POLOBEE</span>STORE</h3>
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
                        <!-- Divider -->
                        <hr class="navbar-divider my-3 opacity-20">

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

                    </ul>
                    <!-- Divider -->
                    <hr class="navbar-divider my-18 opacity-20">

                    <!-- Push content down -->
                    <div class="mt-auto"></div>
                    <!-- User (md) -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">
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
                                    <img src="../assets/images/logo.jpg" width="60"> POLOBEE Store
                                </h1>
                            </div>

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
                            <h2 class="mb-0">Chi tiết đơn hàng</h2>
                        </div>
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">1.Thông tin đơn hàng</h5>
                        </div>
                        <div class="table-responsive">
                            <form action="<?= $action ?>" method="POST">
                                <!-- Section 1: Order Status and Customer Information -->
                                <?php
                                $groupedRecords = [];

                                // Group records by customer
                                foreach ($record as $item) {
                                    if (!isset($groupedRecords[$item->phone_number])) {
                                        $groupedRecords[$item->phone_number] = [
                                            'fullname' => $item->fullname,
                                            'phone_number' => $item->phone_number,
                                            'address' => $item->address,
                                            'orders' => [],
                                            'status' => $item->status // Assuming status is the same for all orders of a customer
                                        ];
                                    }
                                    $groupedRecords[$item->phone_number]['orders'][] = $item->order_id;
                                }
                                ?>

                                <table class="table table-hover table-nowrap">
                                    <tbody>
                                        <?php foreach ($groupedRecords as $customer) { ?>
                                        <tr>
                                            <td class="text-heading font-semibold">Tên Khách Hàng</td>
                                            <td><?php echo htmlspecialchars($customer['fullname']); ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-heading font-semibold">Số Điện Thoại</td>
                                            <td><?php echo htmlspecialchars($customer['phone_number']); ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-heading font-semibold">Địa Chỉ</td>
                                            <td><?php echo htmlspecialchars($customer['address']); ?></td>
                                        </tr>
                                        <tr>
                                            <td class="text-heading font-semibold">Trạng Thái</td>
                                            <td>
                                                <select class="form-control" name="status" id="status"
                                                    onchange="updateStatus([<?php echo implode(',', $customer['orders']); ?>])">
                                                    <?php if ($customer['status'] == 'Đang chờ xác nhận') { ?>
                                                    <option value="Đang chờ xác nhận"
                                                        <?php echo $customer['status'] == 'Đang chờ xác nhận' ? 'selected' : ''; ?>>
                                                        Đang chờ xác nhận</option>
                                                    <option value="Đã xác nhận">Đã xác nhận</option>
                                                    <option value="Đã hủy">Đã hủy</option>
                                                    <?php } elseif ($customer['status'] == 'Đã xác nhận') { ?>
                                                    <option value="Đã xác nhận"
                                                        <?php echo $customer['status'] == 'Đã xác nhận' ? 'selected' : ''; ?>>
                                                        Đã xác nhận</option>
                                                    <option value="Đang giao">Đang giao</option>
                                                    <?php } elseif ($customer['status'] == 'Đang giao') { ?>
                                                    <option value="Đang giao"
                                                        <?php echo $customer['status'] == 'Đang giao' ? 'selected' : ''; ?>>
                                                        Đang giao</option>
                                                    <option value="Giao hàng thành công">Giao hàng thành công</option>
                                                    <option value="Giao hàng thất bại">Giao hàng thất bại</option>
                                                    <?php } elseif ($customer['status'] == 'Đã hủy') { ?>
                                                    <option value="Đã hủy" selected disabled>Đã hủy</option>
                                                    <?php } elseif ($customer['status'] == 'Giao hàng thành công') { ?>
                                                    <option value="Giao hàng thành công" selected disabled>Giao hàng
                                                        thành công</option>
                                                    <?php } elseif ($customer['status'] == 'Giao hàng thất bại') { ?>
                                                    <option value="Giao hàng thất bại" selected disabled>Giao hàng thất
                                                        bại</option>
                                                    <?php } ?>
                                                </select>
                                            </td>
                                        </tr>

                                        <?php } ?>
                                    </tbody>
                                </table>

                                <script>
                                function updateStatus(orderIds) {
                                    // JavaScript function to update the status of all orders of a customer
                                    // You can implement the AJAX request to send the status update to your server here
                                }
                                </script>
                                <br>
                                <br>



                                <!-- Section 2: Product Details -->

                                <table class="table table-hover table-nowrap">
                                    <div class="card-header d-flex justify-content-between align-items-center">
                                        <h5 class="mb-0">2.Thông tin sản phẩm</h5>
                                    </div>
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Số Thứ Tự</th>
                                            <th scope="col">Tên Sản Phẩm</th>
                                            <th scope="col">Đơn Giá</th>
                                            <th scope="col">Số Lượng</th>
                                            <th scope="col">Thành Tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($record as $index => $item) { ?>
                                        <tr>
                                            <td class="text-heading font-semibold"><?= ++$index ?></td>
                                            <td class="text-heading font-semibold"><?= $item->title ?></td>
                                            <td class="text-heading font-semibold">
                                                <?= number_format($item->price, 0, ',', '.') ?> VNĐ</td>
                                            <td class="text-heading font-semibold"><?= $item->num ?></td>
                                            <td class="text-heading font-semibold">
                                                <?= number_format($item->price * $item->num, 0, ',', '.') ?> VNĐ</td>
                                        </tr>
                                        <?php } ?>
                                        <!-- Calculate Total Amount -->
                                        <tr>
                                            <td colspan="4" class="text-end font-semibold">Tổng Tiền</td>
                                            <td class="text-heading font-semibold">
                                                <?php
                                                $total = 0;
                                                foreach ($record as $item) {
                                                    $total += $item->price * $item->num;
                                                }
                                                echo number_format($total, 0, ',', '.') . ' VNĐ';
                                                ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="index.php?controller=orders" class="btn btn-warning">Back</a>
                                <button type="submit" class="btn btn-success">Lưu</button>

                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>