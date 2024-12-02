<?php
include_once('ConnectDatabase.php');


class Login extends ConnectDatabase
{
    private $conn;

    public function __construct()
    {
        parent::__construct();
        $this->conn = $this->getConnection();
    }

    //Login
    public function loginUser($email, $password)
    {
        $stmt = $this->conn->prepare("SELECT s.email, s.password ,s.user_id FROM signup AS s
                                                JOIN users AS u ON s.user_id = u.user_id
                                                JOIN roles AS r ON u.role_id = r.role_id
                                            WHERE s.email = ? AND s.password = ?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }
    //get user_name
    public function getUserName($email){
        $stmt = $this->conn->prepare("SELECT s.email, s.user_name FROM signup AS s
                                                JOIN users AS u ON s.user_id = u.user_id
                                            WHERE s.email =?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc()['user_name'];
        } else {
            return null;
        }
    }
  

}
