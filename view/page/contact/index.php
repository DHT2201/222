<!DOCTYPE html>
<html lang="en">

<head>
    <title>Liên hệ</title>

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
    include_once('view/layout/slider/slider.php');
    ?>

    <?php
    include_once('view/layout/pagination/index.php');
    ?>

    <section class="container pb-4 my-4 text-black">
        <div class="container mt-5 card p-4 shadow-sm contact-form">

            <h1 class="text-center text-label-contact">Liên hệ với chúng tôi</h1>

            <form id="contact_form" name="contact_form" method="post" class="text-black">

                <?php
                include_once('controller/User/UserController.php');
                $userController = new UserController();

                if (isset($_SESSION['email'])) {
                    $user = $userController->getUserByEmailController($_SESSION['email']);

                    if ($user) {
                        echo '
                        <div class="mb-4">
                            <label for="first_name" class="form-label">Họ và tên<span class="text-danger">*</span></label>
                            <input type="text" class="text-black form-control input-form-contact border-color" id="first_name" name="userName" placeholder="Nhập họ và tên của bạn" value="' . $user["user_name"] . '">
                        </div>
                        <div class="mb-4 row">
                            <div class="col">
                                <label for="email_addr" class="form-label">Địa chỉ Email<span class="text-danger">*</span></label>
                                <input type="email" class="text-black form-control input-form-contact border-color" id="email_addr" name="email" placeholder="name@example.com" value="' . $user["email"] . '">
                            </div>
                            <div class="col">
                                <label for="phone_input" class="form-label">Số điện thoại<span class="text-danger">*</span></label>
                                <input type="tel" class="text-black form-control input-form-contact border-color" id="phone_input" name="phone" placeholder="Số điện thoại" value="' . $user["number_phone"] . '">
                            </div>
                        </div>
                        ';
                    }
                } else {
                    $user = $userController->getUserByEmailController($_SESSION['emailUserLoginGoogle']);

                    if ($user) {
                        echo '
                        <div class="mb-4">
                            <label for="first_name" class="form-label">Họ và tên<span class="text-danger">*</span></label>
                            <input type="text" class="text-black form-control input-form-contact border-color" id="first_name" name="userName" placeholder="Nhập họ và tên của bạn" value="' . $user["user_name"] . '">
                        </div>
                        <div class="mb-4 row">
                            <div class="col">
                                <label for="email_addr" class="form-label">Địa chỉ Email<span class="text-danger">*</span></label>
                                <input type="email" class="text-black form-control input-form-contact border-color" id="email_addr" name="email" placeholder="name@example.com" value="' . $user["email"] . '">
                            </div>
                            <div class="col">
                                <label for="phone_input" class="form-label">Số điện thoại<span class="text-danger">*</span></label>
                                <input type="tel" class="text-black form-control input-form-contact border-color" id="phone_input" name="phone" placeholder="Số điện thoại" value="' . $user["number_phone"] . '">
                            </div>
                        </div>
                        ';
                    }
                }
                ?>
                <div class="mb-4">
                    <label for="message" class="form-label">Tin nhắn<span class="text-danger">*</span></label>
                    <textarea class="form-control input-form-contact border-color" id="message" name="message" rows="5" placeholder="Nhập tin nhắn của bạn"></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100 btn-form-contact active" name="btnSubmitContact">Gửi</button>
            </form>

            <?php
            include_once('controller/Feedback/FeedbackController.php');
            include_once('controller/User/UserController.php');
            include_once('controller/Email/EmailController.php');

            $userController = new UserController();
            $feedbackController = new FeedbackController();
            $emailController = new EmailController();

            if (isset($_REQUEST['btnSubmitContact'])) {
                $message = $_REQUEST['message'];
                $userName = $_POST['userName'];

                if(isset($_SESSION['email'])){
                    $userId = $userController->getUserIdByEmailController($_SESSION['email']);
                    $addFeedback = $feedbackController->addFeedbackController($userId, $message);
                    if($addFeedback){
                        $emailController->sendEmailContactSuccess($_SESSION['email'], $userName, $message);
                    }
                } else {
                    $userId = $userController->getUserIdByEmailController($_SESSION['emailUserLoginGoogle']);
                    $addFeedback = $feedbackController->addFeedbackController($userId, $message);
                    if($addFeedback){
                        $emailController->sendEmailContactSuccess($_SESSION['emailUserLoginGoogle'], $userName, $message);
                    }
                }
            }
            ?>

        </div>
    </section>

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