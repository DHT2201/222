<?php 
    include_once('ConnectDatabase.php');

    class StatusProduct extends ConnectDatabase{

        private $conn;

        public function __construct(){
            parent::__construct();
            $this->conn = $this->getConnection();
        }
        //get distinct status product
        public function getStatusProduct(){

            $sql = "SELECT DISTINCT status_product_name FROM status_products";

            $result = $this->conn->query($sql);
            if ($result === false) {
                die("Query failed: ". $this->conn->error);
            }
            return $result;
        }
    }
?>