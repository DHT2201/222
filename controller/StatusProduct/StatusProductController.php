<?php 
    include_once('model/StatusProduct.php');

    class StatusProductController{
        private $statusProductModel;

        public function __construct(){
            $this->statusProductModel = new StatusProduct();
        }
        //get distinct status_product
        public function getStatusProductController(){

            $result = $this->statusProductModel->getStatusProduct();
            
            if (!$result) {
                die("Failed to retrieve product list: " . $this->statusProductModel->getConnection()->error);
            }
            return $result;
        }
    }
?>