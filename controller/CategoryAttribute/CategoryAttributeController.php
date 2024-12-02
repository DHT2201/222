<?php 
    include_once('model/CategoryAttribute.php');
    class CategoryAttributeController {
        private $categoryAttributeModel;
        public function __construct(){
            $this->categoryAttributeModel = new CategoryAttribute();
        }
        // //get all attribute category by category_id
        public function getCategoryAttributeByCategoryIdController($categoryId){
            $result = $this->categoryAttributeModel->getCategoryAttributeByCategoryId($categoryId);

            if (!$result) {
                die("Failed to retrieve attribute list: ". $this->categoryAttributeModel->getConnection()->error);
            }
            return $result;  
        }
    }
?>