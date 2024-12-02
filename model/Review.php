<?php
include_once('ConnectDatabase.php');

class Review extends ConnectDatabase
{
    private $conn;
    public function __construct()
    {
        parent::__construct();
        $this->conn = $this->getConnection();
    }
    //get review by product_id
    public function getReviewByProductId($productId)
    {
        $query = "SELECT rating_star FROM reviews WHERE product_id = '$productId'";
        $result = $this->conn->query($query);
        if ($result === false) {
            die("Failed to retrieve review list: " . $this->conn->error);
        }
        return $result;
    }
    //count review by product_id
    public function countReviewByProductId($productId)
    {
        $query = "SELECT COUNT(*) as total FROM reviews WHERE product_id = '$productId'";
        $result = $this->conn->query($query);

        if ($result === false) {
            die("Failed to retrieve review count: " . $this->conn->error);
        }
        $row = $result->fetch_assoc();
        return $row['total'];
    }
}
