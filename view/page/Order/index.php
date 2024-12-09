<?php
// Kết nối cơ sở dữ liệu
$conn = new mysqli('localhost', 'root', '', 'projectfinal');

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

include_once('controller/Cart/CartController.php');

// Kiểm tra khi nhấn nút "Xác Nhận Đặt Hàng"
if (isset($_POST['btndh'])) {
    // Lấy giỏ hàng từ CartController
    $cartController = new CartController();
    $cartItems = $cartController->getProductofCartList();  // Giả sử có phương thức này trong controller

    // Tính tổng tiền đơn hàng
    $totalOrderPrice = 0;
    foreach ($cartItems as $item) {
        $totalOrderPrice += $item['price'] * $item['quantity'];
    }

    // Thêm đơn hàng vào bảng `orders`
    date_default_timezone_set('Asia/Ho_Chi_Minh');// đặt lại múi h 
    $orderDate = date('Y-m-d H:i:s');
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;  // Lấy user_id từ session

    $sqli = "INSERT INTO `orders` (`user_id`, `order_date`, `total_amount`) 
             VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sqli);
    $stmt->bind_param("isi", $user_id, $orderDate, $totalOrderPrice);
    if ($stmt->execute()) {
        $last_order_id = $stmt->insert_id;  // Lấy ID của đơn hàng vừa thêm vào

        // Thêm chi tiết đơn hàng vào bảng `order_details`
        foreach ($cartItems as $item) {
            $product_id = $item['product_id'];
            $quantity = $item['quantity'];
            $price = $item['price'];
            $linetotal = $price * $quantity;

            // Thêm chi tiết sản phẩm vào bảng `order_details`
            $sqli2 = "INSERT INTO `order_details` (`order_id`, `product_id`, `quantity`, `price`, `linetotal`) 
                      VALUES (?, ?, ?, ?, ?)";
            $stmtDetails = $conn->prepare($sqli2);
            $currentTime = date('Y-m-d H:i:s');
            // Chỉnh sửa lại kiểu dữ liệu và số lượng tham số cho phù hợp
            $stmtDetails->bind_param("iiidd", $last_order_id, $product_id, $quantity, $price, $linetotal);
            $stmtDetails->execute();
        }
         // Sau khi lưu đơn hàng thành công, xóa giỏ hàng
         if ($cartController->clearCart($user_id)) {
            echo "Giỏ hàng đã được xóa sau khi đặt hàng.";
        } else {
            echo "Có lỗi khi xóa giỏ hàng.";
        }
    }
    // Sau khi hoàn thành, chuyển hướng đến trang đơn hàng
    header('Location: index.php?page=puchaseOrder');
    exit();

   

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đặt hàng</title>
    <?php
    include_once('view/layout/header/lib_cdn.php');
    ?>

</head>

<body>
<?php

include_once('controller/Cart/CartController.php');
// Khởi tạo controller và gọi hàm index
$cartController = new CartController();
$totalProducts = $cartController->getProductCount(); 

if ($totalProducts > 0) {
    $cartItems = $cartController->getProductofCartList();
}
?>
<?php
// Kết nối tới cơ sở dữ liệu
include_once("model/ConnectDatabase.php");

$userId = $_SESSION['user_id']; // Lấy user_id từ session

// Truy vấn thông tin người dùng
$query = "SELECT user_name, number_phone, email, address 
          FROM users 
          WHERE user_id = ?";

$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $recipient = $result->fetch_assoc(); // Lưu thông tin người nhận
} else {
    $recipient = [
        'user_name' => 'Chưa cập nhật',
        'number_phone' => 'Chưa cập nhật',
        'email' => 'Chưa cập nhật',
        'address' => 'Chưa cập nhật'
    ];
}
?>


<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card p-4 shadow" style="width: 100%; max-width: 80%;">
        <h2 class="text-center mb-4">Thông tin đặt Hàng</h2>
        <form action="#" method="post" id="registerForm">
            <div class="d-flex">
                <!-- Thông tin người nhận -->
                <div class="recipient-info me-4" style="width: 40%;">
                    <h4>Thông tin người nhận</h4>
                    <p><strong>Họ và tên:</strong><?= htmlspecialchars($recipient['user_name']) ?></p>
                    <p><strong>Email:</strong> <?= htmlspecialchars($recipient['number_phone']) ?></p>
                    <p><strong>Số điện thoại:</strong> <?= htmlspecialchars($recipient['email']) ?></p>
                    <p><strong>Địa chỉ:</strong>
                    <?= isset($user['address']) && $user['address'] ? htmlspecialchars($user['address']) : "Không có địa chỉ cụ thể"; ?>
                    </p>
                </div>

                <!-- Bảng danh sách sản phẩm -->
                <div style="width: 60%;">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="text-center">STT</th>
                                <th scope="col" class="text-center">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col" class="text-center">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $totalOrderPrice = 0; 
                            $stt = 1; 
                            foreach ($cartItems as $item): 
                                $productPrice = $item['price'];
                                $quantity = $item['quantity'];
                                $totalPrice = $productPrice * $quantity;
                                $totalOrderPrice += $productPrice * $quantity;
                            ?>
                            <tr>
                                <td class="text-center"><?= $stt++; ?></td>
                                <td class="text-center"><?= htmlspecialchars($item['product_name']) ?></td>
                                <td><?= number_format($productPrice, 0, ',', '.') ?> đồng</td>
                                <td class="text-center"><?= $quantity; ?></td>
                                <td class="text-center">
                                    <span id="total-price-<?= $item['product_id'] ?>">
                                        <?= number_format($totalPrice, 0, ',', '.') ?> đồng
                                    </span>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Tổng giá trị đơn hàng -->
            <h5 style="margin: 0;">Tổng giá trị đơn hàng:
                <span class="fw-bold text-danger">
                    <?= number_format($totalOrderPrice, 0, ',', '.') ?> đồng
                </span>
            </h5>

            <!-- Nút xác nhận đặt hàng -->
            <button type="submit" class="btn btn-primary w-100 mt-3" name="btndh" id="btndh">Xác Nhận Đặt Hàng</button>
        </form>
    </div>
</div>

    <script src="vendor/js/bootstrap.bundle.min.js"></script>
</body>

</html>