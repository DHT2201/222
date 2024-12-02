<?php
include_once('ConnectDatabase.php');

class Category extends ConnectDatabase
{
    private $conn;
    public function __construct()
    {
        parent::__construct(); 
        $this->conn = $this->getConnection(); 
    }

    public function getAllCategory()
    {
        $query = "SELECT * FROM categories";
        $result = $this->conn->query($query);

        if ($result === false) {
            die("Query failed: " . $this->conn->error);
        }

        return $result;
    }
    //get name category by category_id
    public function getCategoryName($category_id)
    {

        $query = "SELECT category_name FROM categories WHERE category_id = ?";
        $stmt = $this->conn->prepare($query);
    
        if (!$stmt) {
            die("Error in preparing statement: " . $this->conn->error);
        }

        $stmt->bind_param("i", $category_id);
    
        $stmt->execute();
    
        $result = $stmt->get_result();
    
        if ($result->num_rows === 0) {
            return null;
        }

        $category = $result->fetch_assoc();
        return $category['category_name'];
    }
    
}
