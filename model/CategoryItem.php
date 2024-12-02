<?php
include_once('ConnectDatabase.php');

class CategoryItem extends ConnectDatabase
{
    private $conn;
    public function __construct()
    {
        parent::__construct();
        $this->conn = $this->getConnection();
    }
    //get all product in category
    public function getAllListCategoryItemByCategory($categoryId)
    {
        $query = "SELECT * FROM category_items WHERE category_id = '$categoryId'";
        $result = $this->conn->query($query);
        if ($result === false) {
            die("Query failed: " . $this->conn->error);
        }
        return $result;
    }
    //join categories table
    public function joinCategoriesTable()
    {
        $query = "SELECT c.category_name, c.category_id, ci.category_item_name, ci.category_item_id FROM category_items ci INNER JOIN categories c ON ci.category_id = c.category_id";
        $result = $this->conn->query($query);
        if ($result === false) {
            die("Query failed: " . $this->conn->error);
        }
        return $result;
    }
}
