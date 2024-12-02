<?php
include_once(__DIR__ . '/../../model/Cart.php'); 

class CartController {
    private $cart;

    public function __construct() {
        $this->cart = new Cart();
    }

    // Lấy sản phẩm trong giỏ hàng
    public function getProductofCartList() {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (isset($_SESSION["user_id"])) {
            $userId = $_SESSION['user_id'];
        } else {
            return [];  // Trả về mảng rỗng nếu không có user_id trong session
        }
    
        // Lấy danh sách sản phẩm trong giỏ hàng của người dùng
        $cartItems = $this->cart->getCartItems($userId);
    
        // Kiểm tra nếu giỏ hàng trống
        if (empty($cartItems)) {
            return ["error" => "Giỏ hàng của bạn hiện tại đang trống."];
        }
        foreach ($cartItems as &$item) {
            $productId = $item['product_id'];
            $image = $this->cart->getProductImage($productId);
                $item['image'] = $image['image_name'];  // Lấy tên hình ảnh
        }
        // Trả về danh sách sản phẩm trong giỏ hàng mà không cần thêm hình ảnh
        return $cartItems;
    }
    
    

    // Đếm số lượng sản phẩm trong giỏ hàng
    public function getProductCount() {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (isset($_SESSION["user_id"])) {
            // Nếu đã đăng nhập, lấy userId từ session
            $userId = $_SESSION['user_id'];
            // Giả sử bạn gọi hàm countProductInCart để đếm số sản phẩm trong giỏ hàng của người dùng
            return $this->cart->countProductInCart($userId);
        } else {
            // Nếu chưa đăng nhập, trả về 0 hoặc xử lý theo yêu cầu (giỏ hàng trống)
            return 0;
        }
    }

    public function clearCart() {
        if (isset($_SESSION["user_id"])) {
            $userId = $_SESSION['user_id'];

            if ($this->cart->clearCart($userId)) {
                return ['success' => true, 'message' => 'Giỏ hàng đã được xóa thành công.'];
            } else {
                return ['success' => false, 'message' => 'Có lỗi khi xóa giỏ hàng.'];
            }
        } else {
            return ['success' => false, 'message' => 'Người dùng chưa đăng nhập.'];
        }
    }
    
    }
   
?>
