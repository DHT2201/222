<!DOCTYPE html>
<html lang="en">

<head>
    <title>Thông báo</title>

    <?php
    include_once('view/layout/header/lib_cdn.php');
    ?>

</head>

<body>

    <!-- <div class="preloader-wrapper">
        <div class="preloader">
        </div>
    </div> -->

    <?php 
    include_once('view/layout/slidebar/slidebar.php');
    ?>

    <header>
        <?php
        include_once('view/layout/header/menu.php');
        ?>
    </header>

    <?php 
    include_once('view/layout/slider/slider.php');
    ?>


    <?php
    include_once('view/layout/pagination/index.php');
    ?>

    <section class="container pb-4 my-4 d-flex justify-content-center align-items-center" style="height: 50vh;">
        <div class="text-center" id="circle-notification">
            <img src="asset/image/general/list.png" alt="Thông báo" class="img-fluid notification-icon">
            <label class="notification-label">Chưa có thông báo nào</label>
        </div>
    </section>

    <style>
        #circle-notification {
            border: 1px solid #cacaca;
            height: 300px;
            width: 320px;
            border-radius: calc(40% + 30px);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 10px;
        }

        .notification-icon {
            width: 80px;
            height: 80px;
            opacity: 0.6;
        }
    </style>
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