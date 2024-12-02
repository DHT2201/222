<?php
include_once('model/Signup.php');

class SignupController
{
    private $signup;
    function __construct()
    {
        $this->signup = new Signup();
    }

    public function signUpController($user_name, $number_phone, $email, $password)
    {
        if (empty($user_name) || empty($email) || empty($number_phone) || empty($password)) {

            $_SESSION['error_message'] = "Vui lòng điền đầy đủ thông tin!";

            header("Location: index.php?page=signup");
            exit;

        } else {

            $result = $this->signup->signUp($user_name, $number_phone, $email, $password);

            if ($result) {

                $_SESSION['success_message'] = "Đăng ký thành công!";

                $_SESSION['fullName'] = $_REQUEST['fullname'];
                

                sleep(4);
                header("Location: index.php?page=home");
                exit;
            } else {

                $_SESSION['error_message'] = "Thông tin không lợp lệ. Vui lòng nhập lại!";
                header("Location: index.php?page=signup");
                exit;
            }
        }
    }
}
