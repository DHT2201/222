<?php
include_once('model/Image.php');

class ImageController
{
    private $imageModel;
    public function __construct()
    {
        $this->imageModel = new Image();
    }
    //get image by product_id
    public function getImageByProductIdController($product_id)
    {
        $result = $this->imageModel->getImageByProductId($product_id);

        if (!$result) {
            die("Failed to retrieve product list: " . $this->imageModel->getConnection()->error);
        }
        return $result;
    }
}
