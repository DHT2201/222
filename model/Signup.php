<?php
include_once('ConnectDatabase.php');

class Signup extends ConnectDatabase
{

    private $conn;

    public function __construct()
    {
        parent::__construct();
        $this->conn = $this->getConnection();
    }
    //add account
    public function signUp($user_name, $number_phone, $email, $password)
    {
        $stmt = $this->conn->prepare("INSERT INTO signup (user_name, number_phone, email, password, type_signup_id) VALUES (?, ?, ?, ?, 1)");

        $stmt->bind_param("ssss", $user_name, $number_phone, $email, $password);
        
        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error: " . $stmt->error;
            return false;
        }
    }
}
