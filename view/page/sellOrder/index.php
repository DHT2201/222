<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đơn mua</title>

    <?php
    include_once('view/layout/header/lib_cdn.php');
    ?>

</head>

<body>

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

    <section class="container pb-4 my-4 text-black">
        <div class="container mt-5">
            <ul class="nav nav-tabs">
                <li class="nav-item nav-tabs-item col-lg-2 text-center fw-bold">
                    <a class="nav-link active" href="#" data-target="all-sell">Chờ xác nhận</a>
                </li>
                <li class="nav-item nav-tabs-item col-lg-2 text-center fw-bold">
                    <a class="nav-link" href="#" data-target="processing">Đang xử lý</a>
                </li>
                <li class="nav-item nav-tabs-item col-lg-2 text-center fw-bold">
                    <a class="nav-link" href="#" data-target="deliverying">Đang giao</a>
                </li>
                <li class="nav-item nav-tabs-item col-lg-2 text-center fw-bold">
                    <a class="nav-link" href="#" data-target="deliveried">Đã giao</a>
                </li>
                <li class="nav-item nav-tabs-item col-lg-2 text-center fw-bold">
                    <a class="nav-link" href="#" data-target="canceled-sell">Hoàn tiền/Đã huỷ</a>
                </li>
            </ul>

            <div class="tab-content mt-5" id="all-sell">
                <section class="container pb-4 my-4 d-flex justify-content-center align-items-center" style="height: 50vh;">
                    <div class="text-center border border-3 rounded-circle">
                        <img src="asset/image/general/list.png" alt="" class="img-fluid w-25 h-25"> <br>
                        <label for="">Chưa có sản phẩm nào</label>
                    </div>
                </section>
            </div>
            <div class="tab-content mt-5" id="processing">
                <section class="container pb-4 my-4 d-flex justify-content-center align-items-center" style="height: 50vh;">
                    <div class="text-center border border-3 rounded-circle">
                        <img src="asset/image/general/list.png" alt="" class="img-fluid w-25 h-25"> <br>
                        <label for="">Chưa có sản phẩm nào</label>
                    </div>
                </section>
            </div>
            <div class="tab-content mt-5" id="deliverying">
                <section class="container pb-4 my-4 d-flex justify-content-center align-items-center" style="height: 50vh;">
                    <div class="text-center border border-3 rounded-circle">
                        <img src="asset/image/general/list.png" alt="" class="img-fluid w-25 h-25"> <br>
                        <label for="">Chưa có sản phẩm nào</label>
                    </div>
                </section>
            </div>
            <div class="tab-content mt-5" id="deliveried">
                <section class="container pb-4 my-4 d-flex justify-content-center align-items-center" style="height: 50vh;">
                    <div class="text-center border border-3 rounded-circle">
                        <img src="asset/image/general/list.png" alt="" class="img-fluid w-25 h-25"> <br>
                        <label for="">Chưa có sản phẩm nào</label>
                    </div>
                </section>
            </div>
            <div class="tab-content mt-5" id="canceled-sell">
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
    include_once('view/layout/header/button_backtotop.php');
    ?>

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
