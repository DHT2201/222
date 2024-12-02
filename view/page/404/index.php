<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sản phẩm yêu thích</title>

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

    <section class="container pb-4 my-4 text-black">
        <div class="container mt-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="text-center fade-in" id="fade-in">
                    <div class="error-title" id="error-title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="90" height="90" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                            <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                        </svg> 
                        404
                    </div>
                    <h1>Không tìm thấy trang</h1>
                    <p class="lead">Rất tiếc, trang bạn tìm không tồn tại.</p>
                    <a href="index.php?page=home" class="btn btn-primary active">Quay về trang chủ</a>
                </div>
            </div>
        </div>
    </section>

    <style>
        
    </style>

    

    <?php
        include_once('view/layout/footer/footer.php');
    ?>

    <?php
        include_once('view/layout/footer/lib-cdn-js.php');
    ?>
</body>

</html>