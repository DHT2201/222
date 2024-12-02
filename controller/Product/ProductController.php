<?php
include_once('model/Product.php');

class ProductController
{
    private $product;
    public function __construct()
    {
        $this->product = new Product();
    }
    //get all product
    public function getAllProductController()
    {
        $result = $this->product->getAllProduct();

        if (!$result) {
            die("Failed to retrieve category list: " . $this->product->getConnection()->error);
        }
        return $result;
    }
    //join reviews
    public function getAllProductWithReviewsController()
    {
        $result = $this->product->getAllProductWithReviews();

        if (!$result) {
            die("Failed to retrieve product list: " . $this->product->getConnection()->error);
        }
        return $result;
    }
    //get product by hight view
    public function getProductByHightViewController()
    {
        $result = $this->product->getProductByHightView();

        if (!$result) {
            die("Failed to retrieve product list: " . $this->product->getConnection()->error);
        }
        return $result;
    }
    //cout product
    public function countProductController()
    {
        $result = $this->product->countProduct();

        if (!$result) {
            die("Failed to retrieve product list: " . $this->product->getConnection()->error);
        }
        return $result;
    }
    //get product_name by id
    public function getNameProductByIdController($id)
    {
        $result = $this->product->getNameProductById($id);

        if (!$result) {
            die("Failed to retrieve product list: " . $this->product->getConnection()->error);
        }
        return $result;
    }
    //get product by id
    public function getProductByIdController($id)
    {
        $result = $this->product->getProductById($id);

        if (!$result) {
            die("Failed to retrieve product list: " . $this->product->getConnection()->error);
        }
        return $result;
    }
    //get product by category_id
    public function getProductByCategoryIdController($categoryId)
    {
        $result = $this->product->getProductByCategory($categoryId);

        if (!$result) {
            die("Failed to retrieve product list: " . $this->product->getConnection()->error);
        }
        return $result;
    }
    //get product hightly appreciated
    public function getProductHightlyAppreciatedController()
    {
        $result = $this->product->getProductHightlyAppreciated();

        if (!$result) {
            die("Failed to retrieve product list: " . $this->product->getConnection()->error);
        }
        return $result;
    }
    //get product sell out
    public function getProductSellOutController()
    {
        $result = $this->product->getProductSellOut();

        if (!$result) {
            die("Failed to retrieve product list: " . $this->product->getConnection()->error);
        }
        return $result;
    }
     //Search

     public function searchProductController($keyword)
     {
         $result = $this->product->searchProduct($keyword);
 
         if (!$result) {
             die("Failed to retrieve search results: " . $this->product->getConnection()->error);
         }
         return $result;
     }
     // count search
     public function countProductsController($keyword)
 {
     return $this->product->countProducts($keyword);
 }
     
 
}
