<?php
include_once('model/Whistlist.php');

class WhistlistController
{
    private $whistlist;

    public function __construct()
    {
        $this->whistlist = new Whistlist();
    }
    //count product in whistlist
    public function countProductInWhistlistController()
    {
        return $this->whistlist->countProductInWhistlist();
    }
    //add product to whistlist
    public function addToWhistlistController($productId, $userId)
    {
        $exists = $this->whistlist->checkIfExistWhistlist($productId, $userId);

        if ($exists) {
            return false; 
        }

        $result = $this->whistlist->addToWhistlist($productId, $userId);

        if (!$result) {
            die("Failed to add product to wishlist: " . $this->whistlist->getConnection()->error);
        }
        return $result;
    }

    //check
    public function checkIfExistWhistlistController($productId, $userId)
    {

        $result = $this->whistlist->checkIfExistWhistlist($productId, $userId);

        return $result;
    }
    // //get all whistlist by user_id
    public function getAllWhistlistByUserIdController($userId)
    {
        $result = $this->whistlist->getAllWhistlistByUserId($userId);

        if (!$result) {
            die("Failed to get all product in wishlist: " . $this->whistlist->getConnection()->error);
        }
        return $result;
    }
    //remove product from whistlist
    public function removeFromWhistlistController($whistlist_id)
    {
        $result = $this->whistlist->removeFromWhistlist($whistlist_id);

        if (!$result) {
            die("Failed to delete product in wishlist: " . $this->whistlist->getConnection()->error);
        }
        return $result;

    }
}
