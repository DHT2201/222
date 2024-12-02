<?php 
    include_once('ConnectDatabase.php');
    // model/Cart.php
class Cart extends ConnectDatabase {
    private $conn;

    public function __construct() {
        parent::__construct(); 
        $this->conn = $this->getConnection(); 
    }
    // Lấy tất cả các sản phẩm trong giỏ hàng
    

    // Lấy hình ảnh của sản phẩm từ bảng images
    public function getProductImage($productId) {
        $query = "SELECT image_name FROM images WHERE product_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function getCartItems($userId) {
        $query = "SELECT c.cart_id, p.product_id, c.quantity, p.product_name, p.price, p.status
                  FROM carts c
                  JOIN products p ON c.product_id = p.product_id
                  WHERE c.user_id = ?
                  ORDER BY c.create_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    // Lấy tất cả sản phẩm trong giỏ hàng của người dùng
    public function getAllProductofCart($userId) {
        $query = "SELECT * FROM carts WHERE user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        return $stmt->get_result();
    }

    // Đếm số lượng sản phẩm trong giỏ hàng của người dùng
    public function countProductInCart($userId) {
        $query = "SELECT SUM(quantity) as total FROM carts WHERE user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        // Lấy tổng số lượng sản phẩm và trả về
        $row = $result->fetch_assoc();
        return $row ? $row['total'] : 0;
    }
    public function getPriceProductById($productId) {
        $query = "SELECT price, status FROM products WHERE product_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $productId);
    
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            return $result->fetch_assoc(); // Trả về thông tin sản phẩm
        }
    }
    public function updateCartQuantity($userId, $productId, $quantity) {
        $product = $this->getPriceProductById($productId);
        $price = $product['price']; 
        $total = $price * $quantity;
        $query = "UPDATE carts SET quantity = ?, total = ? WHERE user_id = ? AND product_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iiii", $quantity, $total, $userId, $productId);
    
        if ($stmt->execute()) {
            return true; // Trả về true nếu cập nhật thành công
        }
        return false; // Trả về false nếu cập nhật thất bại
    }
    
    public function getCartItemByUserAndProduct($userId, $productId) {
        $query = "SELECT * FROM carts WHERE user_id = ? AND product_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $userId, $productId);
    
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
            } 
        }
        return false; 
    }
    

    // Thêm sản phẩm vào giỏ hàng
    public function addProductToCart($userId, $productId, $quantity) {
        $product = $this->getPriceProductById($productId);
        $price = $product['price']; 
        $status = $product['status']; 
        $total = $price * $quantity;
        $query = "INSERT INTO carts (user_id, product_id, quantity, total, status) 
                    VALUES (?, ?, ?, ?, ?)";  
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iiiis", $userId, $productId, $quantity, $total, $status);

        if ($stmt->execute()) {
            return true;  // Thêm thành công
        } else {
            return false;  // Thêm thất bại
        }
    }
    // xóa sản phẩm trong giỏ hàng 
    public function deleteProductFromCart($userId, $productId) {
        $query = "DELETE FROM carts WHERE user_id = ? AND product_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $userId, $productId);
        if ($stmt->execute()) {
            return true; // Trả về true nếu xóa thành công
        }
        return false; // Trả về false nếu xóa thất bại
    }

    // Phương thức xóa tất cả sản phẩm trong giỏ hàng
    
    public function clearCart($userId) {
        $query = "DELETE FROM carts WHERE user_id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $userId);
        if ($stmt->execute()) {
            return true; // Trả về true nếu xóa thành công
        }
        return false; // Trả về false nếu xóa thất bại
    }
    
    
}

?>