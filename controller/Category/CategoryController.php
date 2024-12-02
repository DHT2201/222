<?php 
include_once('model/Category.php');

class CategoryController {
    private $category;

    public function __construct() {
        $this->category = new Category();
    }
    
    public function getCategoryList() {
        $result = $this->category->getAllCategory();

        if (!$result) {
            die("Failed to retrieve category list: " . $this->category->getConnection()->error);
        }
        return $result;
    }
    //get name category by category_id
    public function getCategoryNameController($category_id) {
        $categoryName = $this->category->getCategoryName($category_id);
    
        if ($categoryName === null) {
            return "Category not found";
        }
        return $categoryName;
    }

}
?>
