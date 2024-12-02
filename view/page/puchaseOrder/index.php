<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đơn mua</title>

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

    <?php 
    include_once('view/layout/slidebar/slidebar.php');
    ?>

    <header>
        <?php
        include_once('view/layout/header/menu.php');
        ?>
    </header>

    <?php
    include_once('view/layout/pagination/index.php');
    ?>
    <?php

include_once('controller/Cart/CartController.php');
// Khởi tạo controller và gọi hàm index
$cartController = new CartController();
$totalProducts = $cartController->getProductCount(); 

if ($totalProducts > 0) {
    $cartItems = $cartController->getProductofCartList();
?>
    <section class="container pb-4 my-4 text-black">
        <div class="container mt-5">
            <ul class="nav nav-tabs">
                <li class="nav-item nav-tabs-item col-lg-2 text-center fw-bold">
                    <a class="nav-link active" href="#" data-target="all-puchase">Tất cả</a>
                </li>
                <li class="nav-item nav-tabs-item col-lg-2 text-center fw-bold">
                    <a class="nav-link" href="#" data-target="waiting">Chờ xác nhận</a>
                </li>
                <li class="nav-item nav-tabs-item col-lg-2 text-center fw-bold">
                    <a class="nav-link" href="#" data-target="shipping">Chờ nhận hàng</a>
                </li>
                <li class="nav-item nav-tabs-item col-lg-2 text-center fw-bold">
                    <a class="nav-link" href="#" data-target="completed">Hoàn tất</a>
                </li>
                <li class="nav-item nav-tabs-item col-lg-2 text-center fw-bold">
                    <a class="nav-link" href="#" data-target="canceled-puchase">Đã huỷ</a>
                </li>
            </ul>

            <div class="tab-content mt-5" id="all-puchase">
                <div>
                <section class="container pb-4 my-4 d-flex justify-content-center align-items-center" style="height: 50vh;">
                    <table class="table text-black">
                        <thead>
                            <tr class="">
                                <!-- <th scope="col" class="text-center">Sản phẩm</th>
                                <th scope="col" class="text-center">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col" class="text-center">Thành tiền</th> -->
                            </tr>
                        </thead>
                            <tbody>
                                    <?php 
                                        foreach ($cartItems as $item): 
                                            $productImage = $item['image'];
                                            $productPrice = $item['price']; // Lấy giá sản phẩm từ giỏ hàng
                                            $quantity = $item['quantity']; // Lấy số lượng từ giỏ hàng
                                            $totalPrice = $productPrice * $quantity; // Tính tổng tiền
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
                                            <?= $quantity; ?>
                                            </td>
                                            <td class="text-center">
                                            <span id="total-price-<?= $item['product_id'] ?>">
                                                <?= number_format($totalPrice, 0, ',', '.') ?> đồng
                                                </span>
                                            </td>
                                    
                                        
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                    </table>
                    <?php
                    }
                    else{
                        echo '<div class="container mt-5">
                        <div class="text-center border border-3 rounded-circle">
                                            <img src="asset/image/general/list.png" alt="" class="img-fluid w-25 h-25"> <br>
                                            <label for="">Chưa có sản phẩm nào</label>
                        </div>';
                    }
                    ?>
                </section>
                </div>
            
</div>
            <div class="tab-content mt-5" id="waiting">
                <section class="container pb-4 my-4 d-flex justify-content-center align-items-center" style="height: 50vh;">
                    <div class="text-center border border-3 rounded-circle">
                        <img src="asset/image/general/list.png" alt="" class="img-fluid w-25 h-25"> <br>
                        <label for="">Chưa có sản phẩm nào</label>
                    </div>
                </section>
            </div>
            <div class="tab-content mt-5" id="shipping">
                <section class="container pb-4 my-4 d-flex justify-content-center align-items-center" style="height: 50vh;">
                    <div class="text-center border border-3 rounded-circle">
                        <img src="asset/image/general/list.png" alt="" class="img-fluid w-25 h-25"> <br>
                        <label for="">Chưa có sản phẩm nào</label>
                    </div>
                </section>
            </div>
            <div class="tab-content mt-5" id="completed">
                <section class="container pb-4 my-4 d-flex justify-content-center align-items-center" style="height: 50vh;">
                    <div class="text-center border border-3 rounded-circle">
                        <img src="asset/image/general/list.png" alt="" class="img-fluid w-25 h-25"> <br>
                        <label for="">Chưa có sản phẩm nào</label>
                    </div>
                </section>
            </div>
            <div class="tab-content mt-5" id="canceled-puchase">
                <section class="container pb-4 my-4 d-flex justify-content-center align-items-center" style="height: 50vh;">
                    <div class="text-center border border-3 rounded-circle">
                        <img src="asset/image/general/list.png" alt="" class="img-fluid w-25 h-25"> <br>
                        <label for="">Chưa có sản phẩm nào</label>
                    </div>
                </section>
            </div>
        </div>
    </section>
    
    <?php 
    include_once('script.php');
    ?>


    <?php 
    include_once('view/layout/header/button_backtotop.php');
    ?>


    <?php
    include_once('view/layout/footer/footer.php');
    ?>

    <?php
    include_once('view/layout/footer/lib-cdn-js.php');
    ?>
</body>

</html>