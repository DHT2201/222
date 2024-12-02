<?php
include_once('ConnectDatabase.php');

class User extends ConnectDatabase
{

    private $conn;
    public function __construct()
    {
        parent::__construct();
        $this->conn = $this->getConnection();
    }

    //count user
    public function countUser()
    {
        $query = "SELECT COUNT(*) as total FROM users";
        $result = $this->conn->query($query);

        if ($result === false) {
            die("Query failed: " . $this->conn->error);
        }
        $row = $result->fetch_assoc();
        return $row['total'];
    }
    //count role seller
    public function countRoleSeller()
    {
        $query = "SELECT COUNT(role_seller_id) as count_seller FROM users";
        $result = $this->conn->query($query);

        if ($result === false) {
            die("Query failed: " . $this->conn->error);
        }
        $row = $result->fetch_assoc();
        return $row['count_seller'];
    }
    //get user by product_id
    public function getUserbyProduct($product_id)
    {
        $query = "SELECT * 
                    FROM users AS u 
                    JOIN products AS p ON u.user_id = p.user_id 
                    WHERE p.product_id = '$product_id';
                    ";
        $result = $this->conn->query($query);

        if ($result === false) {
            die("Query failed: " . $this->conn->error);
        }
        return $result;
    }
    //get user_id by email
    public function getUserIdByEmail($email)
    {
        $query = "SELECT user_id FROM users WHERE email = ?";
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            die("Prepare statement failed: " . $this->conn->error);
        }

        $stmt->bind_param("s", $email);
        if (!$stmt->execute()) {
            die("Execution failed: " . $stmt->error);
        }

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();

        return $row['user_id'] ?? null;
    }
    //get user by email
    public function getUserByEmail($email)
    {
        $query = "SELECT * FROM users WHERE email = ?";
        
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            die("Prepare statement failed: " . $this->conn->error);
        }
    
        $stmt->bind_param('s', $email);
    
        if (!$stmt->execute()) {
            die("Execution failed: " . $stmt->error);
        }
    
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        
        return $row;
    }
    //update user_name, email, number_phone, address, image
    public function updateUser($user_id, $user_name, $email, $number_phone, $address, $image)
    {
        $query = "UPDATE users 
                    SET user_name =?, email =?, number_phone =?, address =?, image =?
                    WHERE user_id =?";

        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            die("Prepare statement failed: ". $this->conn->error);
        }

        $stmt->bind_param("sssssi", $user_name, $email, $number_phone, $address, $image, $user_id);

        if (!$stmt->execute()) {
            die("Execution failed: ". $stmt->error);
        }

        $stmt->close();
        return true;
    }
    

}