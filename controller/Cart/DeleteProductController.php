<?php
include_once(__DIR__ . '/../../model/Cart.php');

class DeleteProductController {
  private $cart;

  public function __construct() {
      $this->cart = new Cart();
  }
  public function deleteProductFromCart() {
    header('Content-Type: application/json; charset=utf-8'); 

    $json = file_get_contents('php://input');

    $data = json_decode($json, true);

    if (isset($data['action']) && $data['action'] == 'delete_product_cart' && isset($data['userId']) && isset($data['productId'])) {
        $userId = $data['userId'];
        $productId = $data['productId'];
       
        if ($this->cart->deleteProductFromCart($userId, $productId)) {
            echo json_encode(['success' => true, 'message' => 'Sản phẩm đã được xóa khỏi giỏ hàng.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Có lỗi khi xóa sản phẩm.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Dữ liệu không hợp lệ hoặc action không đúng.']);
    }
    exit;
    }
    }
    $deleteProductController = new DeleteProductController();
    $deleteProductController->deleteProductFromCart();
?>