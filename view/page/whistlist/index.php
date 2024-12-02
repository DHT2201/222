<?php
include_once('controller/User/UserController.php');
include_once('controller/Whistlist/WhistlistController.php');

$whistlistController = new WhistlistController();
$userController = new UserController();

if (isset($_REQUEST['productId']) && isset($_SESSION['email']) && isset($_SESSION['success_message'])) {

    $getUserId = $userController->getUserIdByEmailController($_SESSION['email']);

    $checkProduct = $whistlistController->checkIfExistWhistlistController($_REQUEST['productId'], $getUserId);

    if ($checkProduct === false) {
        $result = $whistlistController->addToWhistlistController($_REQUEST['productId'], $getUserId);
        if ($result === true) {
            $_SESSION['whistlist_success_message'] = true;
        }
    }
    echo '<script>window.location.href = "index.php?page=home";</script>';
    exit;
} else {

    if (isset($_REQUEST['productId']) && !empty($_REQUEST['productId'])) {
        $getUserId = $userController->getUserIdByEmailController($_SESSION['emailUserLoginGoogle']);

        $checkProduct = $whistlistController->checkIfExistWhistlistController($_REQUEST['productId'], $getUserId);

        if ($checkProduct === false) {
            $result = $whistlistController->addToWhistlistController($_REQUEST['productId'], $getUserId);
            if ($result === true) {
                $_SESSION['whistlist_success_message'] = true;
            }
        }
        echo '<script>window.location.href = "index.php?page=home";</script>';
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sản phẩm yêu thích</title>

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


    <!-- <section class="container pb-4 my-4 d-flex justify-content-center align-items-center" style="height: 50vh;">
        <div class="text-center border border-3 rounded-circle">
            <img src="asset/image/general/list.png" alt="" class="img-fluid w-25 h-25"> <br>
            <label for="">Chưa có sản phẩm nào</label>
        </div>
    </section> -->


    <?php


    ?>
    <section class="container pb-4 my-4 text-black">
        <div class="container mt-5">
            <table class="table table-borderless">
                <tr class="text-black text-uppercase fw-bold">
                    <td>Sản phẩm</td>
                    <td></td>
                    <td>Số lượng</td>
                    <td>Giá</td>
                    <td>Thành tiền</td>
                    <td>Trạng thái</td>
                    <td>Thao tác</td>
                </tr>

                <?php
                include_once('controller/Whistlist/WhistlistController.php');
                include_once('controller/User/UserController.php');

                $whistlistController = new WhistlistController();
                $userController = new UserController();

                if (isset($_SESSION['email'])) {
                    $getUserId = $userController->getUserIdByEmailController($_SESSION['email']);

                    $dataWhistlistUsers = $whistlistController->getAllWhistlistByUserIdController($getUserId);

                    foreach ($dataWhistlistUsers as $dataWhistlistUser) {
                        echo '
                        <tr class="text-black">
                            <td><img src="asset/image/product/' . $dataWhistlistUser['image_name'] . '" alt="' . $dataWhistlistUser['product_name'] . '" height="50" width="50" class="img-fluid"></td>
                            <td>' . $dataWhistlistUser['product_name'] . '</td>
                            <td>1</td>
                            <td>' . number_format($dataWhistlistUser['price'], 0, ',', '.') . '</td>
                            <td>' . number_format($dataWhistlistUser['price'], 0, ',', '.') . '</td>
                            <td>
                                <span class="badge bg-primary">Còn hàng</span>
                            </td>
                            <td>
                                <form method="POST" action="index.php?page=whistlist">
                                    <input type="hidden" name="whistListInput" value="' . $dataWhistlistUser['whistlist_id'] . '"> 
                                    <button name="btnDeleteWhistlist" type="submit" class="btn btn-danger text-white" style="background-color: #dc3444">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                        </svg>&nbsp;Xoá
                                    </button>
                                </form>
                            </td>
                        </tr>
                        ';
                    }
                } else {
                    $getUserId = $userController->getUserIdByEmailController($_SESSION['emailUserLoginGoogle']);

                    $dataWhistlistUsers = $whistlistController->getAllWhistlistByUserIdController($getUserId);

                    foreach ($dataWhistlistUsers as $dataWhistlistUser) {
                        echo '
                        <tr class="text-black">
                            <td><img src="asset/image/product/' . $dataWhistlistUser['image_name'] . '" alt="' . $dataWhistlistUser['product_name'] . '" height="50" width="50" class="img-fluid"></td>
                            <td>' . $dataWhistlistUser['product_name'] . '</td>
                            <td>1</td>
                            <td>' . number_format($dataWhistlistUser['price'], 0, ',', '.') . '</td>
                            <td>' . number_format($dataWhistlistUser['price'], 0, ',', '.') . '</td>
                            <td>
                                <span class="badge bg-primary">Còn hàng</span>
                            </td>
                            <td>
                                <form method="POST" action="index.php?page=whistlist">
                                    <input type="hidden" name="whistListInput" value="' . $dataWhistlistUser['whistlist_id'] . '"> 
                                    <button name="btnDeleteWhistlist" type="submit" class="btn btn-danger text-white" style="background-color: #dc3444">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"/>
                                        </svg>&nbsp;Xoá
                                    </button>
                                </form>
                            </td>
                        </tr>
                        ';
                    }
                }
                ?>
            </table>
        </div>
    </section>

    <?php
    if (isset($_REQUEST['btnDeleteWhistlist']) && isset($_REQUEST['whistListInput'])) {
        include_once('controller/Whistlist/WhistlistController.php');

        $whistlistController = new WhistlistController();

        $result = $whistlistController->removeFromWhistlistController($_REQUEST['whistListInput']);
        if ($result === true) {
            $_SESSION['whistlist_success_message'] = true;
        }
    }
    ?>
    <!-- notification of whistlist is add product success -->
    <?php if (isset($_SESSION['whistlist_success_message']) && $_SESSION['whistlist_success_message'] === true): ?>

        <div class="modal fade border-color shadow-sm" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <p class="modal-title font-monospace text-black" id="staticBackdropLabel">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#198753" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </svg>
                            <small>
                                Xoá sản phẩm khỏi danh sách yêu thích thành công!
                            </small>
                        </p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const modalElement = document.getElementById('staticBackdrop');
                const modalInstance = new bootstrap.Modal(modalElement);

                modalInstance.show();

                setTimeout(() => {
                    modalInstance.hide();
                    window.location.href = "index.php?page=whistlist";
                }, 2000);
            });
        </script>

        <?php
        unset($_SESSION['whistlist_success_message']);
        ?>

    <?php endif; ?>


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