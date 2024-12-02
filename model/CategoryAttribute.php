<?php 
    include_once('ConnectDatabase.php');

    class CategoryAttribute extends ConnectDatabase{
        private $conn;
        public function __construct(){
            parent::__construct();
            $this->conn = $this->getConnection();
        }
        //get all attribute category by category_id
        public function getCategoryAttributeByCategoryId($categoryId){

            $sql = "SELECT * FROM category_attributes WHERE category_id = '$categoryId'";

            $result = $this->conn->query($sql);
            
            if ($result === false) {
                die("Query failed: ". $this->conn->error);
            }
            return $result;
        }
    }
?>