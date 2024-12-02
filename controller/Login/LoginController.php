<?php
include_once('model/Login.php');

class LoginController
{
    private $loginModel;

    public function __construct()
    {
        $this->loginModel = new Login();
    }

    public function loginUserController($email, $password)
    {
        $result = $this->loginModel->loginUser($email, $password);

        if ($result) {
            $_SESSION['user_id'] = $result['user_id'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['role'] = $result['role'];
            // $_SESSION['login'] = 1;

            $_SESSION['success_message'] = "Đăng nhập thành công!";

            sleep(4);
            header("Location: index.php?page=home");
            
            exit;
        } else {

            $_SESSION['error_message'] = "Email hoặc mật khẩu không đúng";
            header("Location: index.php?page=login"); 
            exit;
        }
    }
    //get user_name
    public function getUserNameController($email){
        $result = $this->loginModel->getUserName($email);
        return $result;
    }
}
