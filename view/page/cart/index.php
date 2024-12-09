

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Giỏ hàng</title>

    <?php
    include_once('view/layout/header/lib_cdn.php');
    ?>

</head>

<body>

    <!-- Svg -->
    <?php
    // include_once('view/layout/body/svg.php');
    ?>

    <div class="preloader-wrapper">
        <div class="preloader">
        </div>
    </div>

    <div class="offcanvas offcanvas-start" tabindex="-1"
        id="offcanvasNavbar">

        <div class="offcanvas-header justify-content-between">
            <h4 class="fw-normal text-uppercase fs-6">Menu</h4>
            <button type="button" class="btn-close"
                data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>

        <div class="offcanvas-body">

            <ul
                class="navbar-nav justify-content-end menu-list list-unstyled d-flex gap-md-3 mb-0">
                <li class="nav-item border-dashed active">
                    <a href="index.html"
                        class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <use xlink:href="#fruits"></use>
                        </svg>
                        <span>Fruits and vegetables</span>
                    </a>
                </li>
                <li class="nav-item border-dashed">
                    <a href="index.html"
                        class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <use xlink:href="#dairy"></use>
                        </svg>
                        <span>Dairy and Eggs</span>
                    </a>
                </li>
                <li class="nav-item border-dashed">
                    <a href="index.html"
                        class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <use xlink:href="#meat"></use>
                        </svg>
                        <span>Meat and Poultry</span>
                    </a>
                </li>
                <li class="nav-item border-dashed">
                    <a href="index.html"
                        class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <use xlink:href="#seafood"></use>
                        </svg>
                        <span>Seafood</span>
                    </a>
                </li>
                <li class="nav-item border-dashed">
                    <a href="index.html"
                        class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <use xlink:href="#bakery"></use>
                        </svg>
                        <span>Bakery and Bread</span>
                    </a>
                </li>
                <li class="nav-item border-dashed">
                    <a href="index.html"
                        class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <use xlink:href="#canned"></use>
                        </svg>
                        <span>Canned Goods</span>
                    </a>
                </li>
                <li class="nav-item border-dashed">
                    <a href="index.html"
                        class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <use xlink:href="#frozen"></use>
                        </svg>
                        <span>Frozen Foods</span>
                    </a>
                </li>
                <li class="nav-item border-dashed">
                    <a href="index.html"
                        class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <use xlink:href="#pasta"></use>
                        </svg>
                        <span>Pasta and Rice</span>
                    </a>
                </li>
                <li class="nav-item border-dashed">
                    <a href="index.html"
                        class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <use xlink:href="#breakfast"></use>
                        </svg>
                        <span>Breakfast Foods</span>
                    </a>
                </li>
                <li class="nav-item border-dashed">
                    <a href="index.html"
                        class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <use xlink:href="#snacks"></use>
                        </svg>
                        <span>Snacks and Chips</span>
                    </a>
                </li>
                <li class="nav-item border-dashed">
                    <button
                        class="btn btn-toggle dropdown-toggle position-relative w-100 d-flex justify-content-between align-items-center text-dark p-2"
                        data-bs-toggle="collapse"
                        data-bs-target="#beverages-collapse"
                        aria-expanded="false">
                        <div class="d-flex gap-3">
                            <svg width="24" height="24" viewBox="0 0 24 24">
                                <use xlink:href="#beverages"></use>
                            </svg>
                            <span>Beverages</span>
                        </div>
                    </button>
                    <div class="collapse" id="beverages-collapse">
                        <ul
                            class="btn-toggle-nav list-unstyled fw-normal ps-5 pb-1">
                            <li class="border-bottom py-2"><a
                                    href="index.html"
                                    class="dropdown-item">Water</a></li>
                            <li class="border-bottom py-2"><a
                                    href="index.html"
                                    class="dropdown-item">Juice</a></li>
                            <li class="border-bottom py-2"><a
                                    href="index.html"
                                    class="dropdown-item">Soda</a></li>
                            <li class="border-bottom py-2"><a
                                    href="index.html"
                                    class="dropdown-item">Tea</a></li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item border-dashed">
                    <a href="index.html"
                        class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <use xlink:href="#spices"></use>
                        </svg>
                        <span>Spices and Seasonings</span>
                    </a>
                </li>
                <li class="nav-item border-dashed">
                    <a href="index.html"
                        class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <use xlink:href="#baby"></use>
                        </svg>
                        <span>Baby Food and Formula</span>
                    </a>
                </li>
                <li class="nav-item border-dashed">
                    <a href="index.html"
                        class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <use xlink:href="#health"></use>
                        </svg>
                        <span>Health and Wellness</span>
                    </a>
                </li>
                <li class="nav-item border-dashed">
                    <a href="index.html"
                        class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <use xlink:href="#household"></use>
                        </svg>
                        <span>Household Supplies</span>
                    </a>
                </li>
                <li class="nav-item border-dashed">
                    <a href="index.html"
                        class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <use xlink:href="#personal"></use>
                        </svg>
                        <span>Personal Care</span>
                    </a>
                </li>
                <li class="nav-item border-dashed">
                    <a href="index.html"
                        class="nav-link d-flex align-items-center gap-3 text-dark p-2">
                        <svg width="24" height="24" viewBox="0 0 24 24">
                            <use xlink:href="#pet"></use>
                        </svg>
                        <span>Pet Food and Supplies</span>
                    </a>
                </li>
            </ul>

        </div>

    </div>

    <header>
        <?php
        include_once('view/layout/header/menu.php');
        ?>
    </header>


    <?php
        include_once('view/layout/pagination/index.php');
    ?>


    <!-- <section class="container pb-4 my-4 d-flex justify-content-center align-items-center" style="height: 50vh;">
        <div class="text-center border border-3 rounded-circle">
            <img src="asset/image/general/list.png" alt="" class="img-fluid w-25 h-25"> <br>
            <label for="">Chưa có sản phẩm nào</label>
        </div>
    </section> -->
    <?php

    include_once('controller/Cart/CartController.php');
    // Khởi tạo controller và gọi hàm index
    $cartController = new CartController();
    $totalProducts = $cartController->getProductCount(); 
   
    if ($totalProducts > 0) {
        $cartItems = $cartController->getProductofCartList();
    ?>

    <section class="container pb-4 my-4">
        <div class="container mt-2">
            <table class="table text-black">
                <thead>
                    <tr class="">
                        <th scope="col" class="text-center">Sản phẩm</th>
                        <th scope="col" class="text-center">Tên sản phẩm</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col" class="text-center">Thành tiền</th>
                        <th scope="col" class="text-center">Tình trạng</th>
                        <th scope="col" class="text-center">Mua Hàng </th>
                        <th scope="col" class="text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $totalOrderPrice = 0; // Biến lưu tổng giá trị đơn hàng
                    foreach ($cartItems as $item): 
                        $productImage = $item['image'];
                        $productPrice = $item['price'];  // Lấy giá sản phẩm
                        $quantity = $item['quantity'];   // Lấy số lượng
                        $totalPrice = $productPrice * $quantity; // Tính thành tiền
                        $productStatus = $item['status']; // Lấy tình trạng sản phẩm
                        $totalOrderPrice += $productPrice * $quantity;
                        
                ?>
                    <tr>
                            <td class="text-center">
                            <img src="asset/image/product/<?= htmlspecialchars($productImage); ?>" alt="Hình ảnh sản phẩm"
                            style="width: 100px; height: 100px;">
                            </td>
                            <td class="text-center">
                            <?= $item['product_name'] ?> 
                            </td class="text-center">
                            <td><?= number_format($productPrice, 0, ',', '.') ?> đồng</td>
                            <td class="text-center">
                                <input type="number" class="form-control" value="<?= $quantity ?>" min="1" style="width: 80px;"
                                onchange="updateCartQuantity(<?= $item['product_id'] ?>, this.value)">
                            </td>
                            <td class="text-center">
                            <span id="total-price-<?= $item['product_id'] ?>">
                                <?= number_format($totalPrice, 0, ',', '.') ?> đồng
                                </span>
                            </td>
                        <td class="text-center">
                        <?php
                            if ($productStatus == 1) {
                                echo '<span class="badge bg-primary">Còn hàng</span>';
                            } else {
                                echo '<span class="badge bg-secondary">Hết hàng</span>';
                            }
                            ?>
                        </td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input by_checked" 
                                <?php echo $item['status']==0?'checked':''?>
                                type="checkbox" value="<?php echo $item['cart_id'] ?>" 
                                id="flexCheckDefault" style="  border: 2px solid #000;">
                                <label class="form-check-label " for="flexCheckDefault">
                                    Mua hàng
                                </label>
                            </div>
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-danger active" style="background-color: rgb(255, 87, 87); color: white;"
                            onclick="confirmDelete(<?= $item['product_id'] ?>)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0" />
                                </svg>
                                Xóa
                            </button>
                           
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <div class="d-flex justify-content-between align-items-center mt-4" style="gap: 10px;">
                <!-- <h5 style="margin: 0;">Tổng giá trị đơn hàng: 
                    <span class="fw-bold text-danger">
                        <?= number_format($totalOrderPrice, 0, ',', '.') ?> đồng
                    </span>
                </h5> -->
                <a href="index.php?page=Order" class="btn btn-primary rounded-1 p-2 fs-7 btn-cart" 
                style="margin-left: auto; padding: 5px 10px;">
                    Đặt Hàng
                </a>
            </div>



        </div>
    </section>
    <?php
} else {
    echo '<div class="container mt-5">
    <div class="alert alert-warning alert-dismissible fade show mx-auto text-center" style="max-width: 600px;" role="alert">
        <strong  style="font-size: 20px; font-weight: bold;">Không có sản phẩm nào trong giỏ hàng.</strong>
    </div>
    <div class="text-center">
        <a href="index.php" class="btn btn-lg btn-primary">Quay lại trang chủ</a>
    </div>
  </div>';
}
?>
<script>
   

</script>
    <?php
        include_once('script.php');
    ?>
    <?php
    include_once('view/layout/footer/footer.php');
    ?>
    <?php
    include_once('view/layout/footer/lib-cdn-js.php');
    ?>
</body>

</html>