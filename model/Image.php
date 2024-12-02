<?php
include_once('ConnectDatabase.php');

class Image extends ConnectDatabase
{
    private $conn;
    public function __construct()
    {
        parent::__construct();
        $this->conn = $this->getConnection();
    }
    //get image by product_id
    public function getImageByProductId($product_id)
    {
        $query = "SELECT image_name FROM images WHERE product_id = '$product_id'";
        $result = $this->conn->query($query);
        if ($result === false) {
            die("Query failed: " . $this->conn->error);
        }
        return $result;
    }
}
