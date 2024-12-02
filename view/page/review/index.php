<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đánh giá từ tôi</title>

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

    <section class="container pb-4 my-4 text-black">
        <div class="container mt-5">
            <ul class="nav nav-tabs">
                <li class="nav-item nav-tabs-item col-6 text-center fw-bold">
                    <a class="nav-link active" href="#" data-target="review-buyer">Người mua (0)</a>
                </li>
                <li class="nav-item nav-tabs-item col-6 text-center fw-bold">
                    <a class="nav-link" href="#" data-target="review-seller">Người bán (0)</a>
                </li>
            </ul>

            <div class="tab-content mt-5" id="review-buyer">
                <section class="container pb-4 my-4 d-flex justify-content-center align-items-center" style="height: 50vh;">
                    <div class="text-center border border-3 rounded-circle">
                        <img src="asset/image/general/comments.png" alt="" class="img-fluid w-25 h-25"> <br>
                        <label for="">Chưa có đánh giá nào!</label>
                    </div>
                </section>
            </div>
            <div class="tab-content mt-5" id="review-seller">
                <section class="container pb-4 my-4 d-flex justify-content-center align-items-center" style="height: 50vh;">
                    <div class="text-center border border-3 rounded-circle">
                        <img src="asset/image/general/comments.png" alt="" class="img-fluid w-25 h-25"> <br>
                        <label for="">Chưa có đánh giá nào!</label>
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