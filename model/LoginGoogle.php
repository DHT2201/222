<?php
include_once('ConnectDatabase.php');

class LoginGoogle extends ConnectDatabase
{
    private $conn;

    public function __construct()
    {
        parent::__construct();
        $this->conn = $this->getConnection();
    }
    //add account google
    public function addUserSignupGoogle($user_name, $email, $password)
    {
        $stmt = $this->conn->prepare("INSERT INTO signup (user_name, email, password, type_signup_id) VALUES (?, ?, ?, 2)");

        $stmt->bind_param("sss", $user_name, $email, $password);
        
        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            echo "Error: " . $stmt->error;
            return false;
        }
    }
    //update avatar for user table
    public function updateAvatar($email, $avatar)
    {
        $stmt = $this->conn->prepare(
            "UPDATE users AS u
            JOIN signup AS s ON u.user_id = s.user_id
            SET u.image = ?
            WHERE s.email = ?"
        );

        $stmt->bind_param("ss", $avatar, $email);

        if ($stmt->execute()) {
            $stmt->close();
            return true;
        } else {
            echo "Error: " . $stmt->error;
            return false;
        }
    }
    //check email of user login by google account
    public function checkEmail($email)
    {
        $stmt = $this->conn->prepare("SELECT s.email FROM signup AS s JOIN users AS u ON s.user_id = u.user_id WHERE s.email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->num_rows > 0;
    }

}
