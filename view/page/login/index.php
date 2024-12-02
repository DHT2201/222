<?php

include_once('controller/Login/LoginController.php');

$loginController = new LoginController();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btnLogin'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $loginController->loginUserController($email, $password);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng nhập</title>
    <?php
    include_once('view/layout/header/lib_cdn.php');
    ?>

</head>

<body>
    <div class="preloader-wrapper">
        <div class="preloader">
        </div>
    </div>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow" style="width: 100%; max-width: 40%;">
            <h2 class="text-center mb-4">Đăng Nhập</h2>
            <p class="text-black">Bạn chưa có tài khoản? <a href="index.php?page=signup" class="text-primary">Đăng ký</a></p>


            <?php
            if (isset($_SESSION['error_message'])) {

                echo '
                <div class="alert alert-danger" role="alert">
                    ' . $_SESSION['error_message'] . '
                </div>
                ';
                unset($_SESSION['error_message']);
            }
            ?>

            <form action="index.php?page=login" method="post">

                <div class="mb-3">
                    <label for="email" class="form-label text-black">Email<span class="text-danger">*</span></label>
                    <input type="email" class="form-control text-black border-color" id="email" name="email" placeholder="Nhập email">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label text-black">Mật khẩu<span class="text-danger">*</span></label>
                    <input type="password" class="form-control border-color" id="password" name="password" placeholder="Nhập mật khẩu">
                </div>

                <div class="mb-3 d-flex align-items-center">
                    <input type="checkbox" class="form-check-input me-2 text-black border-color" id="confirmPassword" checked>
                    <label for="confirmPassword" class="form-check-label text-black">
                        Ghi nhớ đăng nhập
                    </label>
                </div>

                <button type="submit" class="btn btn-primary w-100 mb-3" name="btnLogin">Đăng nhập</button>

                <div class="d-flex align-items-center mb-3">
                    <hr class="flex-grow-1">
                    <span class="mx-2">hoặc</span>
                    <hr class="flex-grow-1">
                </div>

                <a href="" class="btn btn-outline-secondary w-100">
                    <img src="asset/image/logo/logo-google.png" /> Đăng nhập bằng Google
                </a>
            </form>
        </div>
    </div>
    



    <script src="vendor/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <?php
    include_once('view/layout/footer/lib-cdn-js.php');
    ?>
</body>

</html>