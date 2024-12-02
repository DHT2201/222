<?php
include_once(__DIR__ . '/../../model/Cart.php'); 
class UpdateController {
  private $cart;

    public function __construct() {
        $this->cart = new Cart();
    }

  public function updateCartQuantity() {
      header('Content-Type: application/json; charset=utf-8'); // Đảm bảo mã hóa UTF-8

      // Nhận dữ liệu JSON từ yêu cầu
      $json = file_get_contents('php://input');

      // Giải mã JSON thành mảng
      $data = json_decode($json, true);

      if (!isset($data['action']) || $data['action'] !== 'update_cart') {
          echo json_encode(['success' => false, 'message' => 'Hành động không hợp lệ']);
          exit;
      }
      // Lấy giá trị từ dữ liệu
      $userId = $data['userId'] ?? null;
      $productId = $data['productId'] ?? null;
      $quantity = $data['quantity'] ?? null;

      $result = $this->cart->updateCartQuantity($userId, $productId, $quantity);

        // Tạo phản hồi
        if ($result) {
            $product = $this->cart->getPriceProductById($productId);
            $price = $product['price'];
            $totalPrice = $price * $quantity; 
            $response = ["success" => true, "message" => "Cập nhật số lượng thành công!",
            "totalPrice" => $totalPrice];
        } else {
            $response = ["success" => false, "message" => "Cập nhật thất bại."];
        }

        // Trả về phản hồi JSON
        echo json_encode($response);
        exit; // Dừng thực thi
  }}
  $updateController = new UpdateController();
  $updateController->updateCartQuantity();

?>