<?php
if (isset($_REQUEST['btnUpdateInfoUser']) && $_REQUEST['btnUpdateInfoUser'] === "btnUpdateInfoUser") {
    include_once('controller/Email/EmailController.php');
    $emailController = new EmailController();

    $emailAuthu = $_REQUEST['email'];
    $userNameAuthu = $_REQUEST['user_name'];

    $_SESSION['userName'] = $_REQUEST['user_name'];
    $_SESSION['nameUserName'] = $_REQUEST['user_name'];
    $_SESSION['emailUserName'] = $_REQUEST['email'];
    $_SESSION['numberPhoneUserName'] = $_REQUEST['number_phone'];
    $_SESSION['addressUserName'] = $_REQUEST['address'];
    $_SESSION['imageUser'] = $_FILES['imageUser']['name'];
    $_SESSION['imageUserError'] = $_FILES['imageUser']['error'];
    $_SESSION['imageUserTmp'] = $_FILES['imageUser']['tmp_name'];

    $emailController->sendEmailUpdateInfo($emailAuthu, $userNameAuthu);
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhập OTP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            margin-top: 100px;
            border-radius: 15px;
        }
    </style>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: auto;">
        <div class="card" style="width: 700px;">
            <div class="card-body">
                <h5 class="card-title text-center">Nhập Mã OTP</h5>
                <div class="alert alert-success mt-3" role="alert">
                    Mã OTP được gửi qua email. Vui lòng kiểm tra email trước khi nhập!
                </div>
                <form action="" method="post" class="mt-3">
                    <div class="mb-3">
                        <label for="otp" class="form-label">Mã OTP</label>
                        <input type="number" name="authuOtp" class="form-control" id="otp" placeholder="Nhập mã OTP của bạn">
                    </div>
                    <input type="submit" value="Xác Nhận" name="btnSubmitOtp" class="btn btn-primary w-100">
                </form>
                <?php
                var_dump($_SESSION);
                if (isset($_REQUEST['btnSubmitOtp'])) {

                    $authuOtp = (int)$_REQUEST['authuOtp'];
                    include_once('controller/User/UserController.php');
                    $userController = new UserController();

                    if(isset($_SESSION['email'])){

                        $user_id = $userController->getUserIdByEmailController($_SESSION['email']);

                        if ($_SESSION['otp'] === $authuOtp) {

                            if (isset($_FILES['imageUser']) && $_FILES['imageUser']['error'] == 0) {

                                $targetDir = "asset/image/user/";
                                $fileExtension = pathinfo($_FILES['imageUser']['name'], PATHINFO_EXTENSION);
                                $randomFileName = uniqid('user_', true) . '.' . $fileExtension;
                                $targetFile = $targetDir . $randomFileName;

                                $updateInfoUser = $userController->updateUserController($user_id, $user_name, $email, $number_phone, $address, $randomFileName);

                                if ($updateInfoUser) {
                                    if (move_uploaded_file($_FILES['imageUser']['tmp_name'], $targetFile)) {
                                        echo "
                                        <script>
                                            alert('Upload thành công!');
                                            window.location.href = 'index.php?page=setting'
                                        </script>";
                                        $_SESSION['email'] = $_REQUEST['email'];
                                    }
                                } else {
                                    echo "<script>alert('Upload thất bại!')</script>";
                                }
                            } else {
                                $updateInfoUser = $userController->updateUserController($user_id, $user_name, $email, $number_phone, $address, 'img-default.png');

                                if ($updateInfoUser) {
                                    $_SESSION['email'] = $_REQUEST['email'];
                                    echo "
                                    <script>
                                        alert('Upload thành công!');
                                        window.location.href = 'index.php?page=setting#'
                                    </script>";
                                } else {
                                    echo "<script>alert('Upload thất bại!')</script>";
                                }
                            }
                        } else {
                            echo "<script>alert('Mã OTP không hợp lệ hoặc chưa nhập!')</script>";
                        }
                    }else{
                        $user_id = $userController->getUserIdByEmailController($_SESSION['emailUserLoginGoogle']);

                        if ($_SESSION['otp'] === $authuOtp) {

                            include_once('controller/Email/EmailController.php');
                            $emailController = new EmailController();

                            //upload infomation user have image
                            if (isset($_SESSION['imageUser']) && $_SESSION['imageUserError'] == 0) {

                                $targetDir = "asset/image/user/";
                                $fileExtension = pathinfo($_SESSION['imageUser'], PATHINFO_EXTENSION);
                                $randomFileName = uniqid('user_', true) . '.' . $fileExtension;
                                $targetFile = $targetDir . $randomFileName;

                                $updateInfoUser = $userController->updateUserController( $user_id,$_SESSION['nameUserName'], $_SESSION['emailUserName'], $_SESSION['numberPhoneUserName'], $_SESSION['addressUserName'], $randomFileName);

                                if ($updateInfoUser) {
                                    if (move_uploaded_file($_SESSION["imageUserTmp"], "asset/image/user/". $randomFileName)) {

                                        $_SESSION['emailUserLoginGoogle'] = $_SESSION['emailUserName'];
                                        $emailController->sendEmailUpdateInfoImageSuccess($_SESSION['emailUserName'], $_SESSION['nameUserName'], $_SESSION['emailUserName'], $_SESSION['numberPhoneUserName'], $_SESSION['addressUserName'], $_SESSION['imageUser']);
                                        echo "
                                        <script>
                                            alert('Cập nhật thông tin thành công!');
                                            window.location.href = 'index.php?page=setting'
                                        </script>";
                                    }
                                    else {
                                        echo "<script>alert('Upload thất bại!')</script>";

                                        var_dump($targetDir, $fileExtension, $randomFileName, $targetFile);
                                        var_dump(move_uploaded_file($_SESSION["imageUserTmp"], "asset/image/user/". $randomFileName));
                                        var_dump(file_exists($_SESSION["imageUserTmp"]));
                                    }
                                }
                            } 
                            //upload infomation user not image
                            else {
                                $updateInfoUser = $userController->updateUserController( $user_id,$_SESSION['nameUserName'], $_SESSION['emailUserName'], $_SESSION['numberPhoneUserName'], $_SESSION['addressUserName'], 'img-default.png');
                                if ($updateInfoUser) {
                                    $_SESSION['emailUserLoginGoogle'] = $_SESSION['emailUserName'];
                                    $emailController->sendEmailUpdateInfoSuccess($_SESSION['emailUserName'], $_SESSION['nameUserName'], $_SESSION['emailUserName'], $_SESSION['numberPhoneUserName'], $_SESSION['addressUserName']);
                                    echo "
                                    <script>
                                        alert('Cập nhật thông tin thành công!');
                                        window.location.href = 'index.php?page=setting'
                                    </script>";
                                }
                            }
                        } else {
                            echo "<script>alert('Mã OTP không hợp lệ hoặc chưa nhập!')</script>";
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>