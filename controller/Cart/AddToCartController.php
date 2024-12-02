<?php
include_once(__DIR__ . '/../../model/Cart.php');

class AddToCartController {
  private $cart;

  public function __construct() {
      $this->cart = new Cart();
  }
  public function addToCart() {
 header('Content-Type: application/json; charset=utf-8'); // Đảm bảo mã hóa UTF-8

 // Nhận dữ liệu JSON từ yêu cầu
 $json = file_get_contents('php://input');

 // Giải mã JSON thành mảng
 $data = json_decode($json, true);


 if (isset($data['action']) && $data['action'] == 'add_to_cart') {
     $productId = $data['product_id'];
     $userId = $data['user_id'];
     $quantity = $data['quantity'];
     // Kiểm tra sản phẩm có trong giỏ hàng chưa
     $existingCartItem = $this->cart->getCartItemByUserAndProduct($userId, $productId);

     if ($existingCartItem) {
        $newQuantity=$existingCartItem['quantity'] + $quantity;
         $result = $this->cart->updateCartQuantity($userId, $productId, $newQuantity);

     } else {

     $result = $this->cart->addProductToCart($userId, $productId, $quantity);
     }
 // Kiểm tra kết quả và trả về JSON tương ứng
    if ($result) {
        $response=['success' => true];
    } else {
      $response=['success' => false, 'message' => 'Không thể thêm sản phẩm vào giỏ hàng'];
    }
    } else {
        $response=['success' => false, 'message' => 'Dữ liệu không hợp lệ'];
    }
    echo json_encode($response);
    exit;
    }
    }
    $addToCartController = new AddToCartController();
    $addToCartController->addToCart();
?>