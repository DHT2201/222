<?php
include_once('model/Review.php');

class ReviewController
{
    private $reviewModel;
    public function __construct()
    {
        $this->reviewModel = new Review();
    }
    //get review by product_id
    public function getReviewByProductIdController($productId)
    {
        $result = $this->reviewModel->getReviewByProductId($productId);

        if (!$result) {
            die("Failed to retrieve product list: " . $this->reviewModel->getConnection()->error);
        }
        return $result;
    }
    //count review by product_id
    public function countReviewByProductIdController($productId)
    {
        return $this->reviewModel->countReviewByProductId($productId);
    }
}
?>

