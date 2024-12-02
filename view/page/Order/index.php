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

    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow" style="width: 100%; max-width: 40%;">
            <h2 class="text-center mb-4">Thông tin đặt Hàng </h2>
            <form action="#" method="post" id="registerForm">
            <table>
                <thead>
                    <tr class="">
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
                                        $stt = 1; // Khởi tạo số thứ tự
                                        foreach ($cartItems as $item): 
                                            $productPrice = $item['price']; // Lấy giá sản phẩm từ giỏ hàng
                                            $quantity = $item['quantity']; // Lấy số lượng từ giỏ hàng
                                            $totalPrice = $productPrice * $quantity;
                                            $totalOrderPrice += $productPrice * $quantity; // Tính tổng tiền
                                    ?>
                                  <tr>
                                            <td class="text-center"><?= $stt++; ?></td>
                                            <td class="text-center"><?= $item['product_name'] ?></td class="text-center">
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
            <h5 style="margin: 0;">Tổng giá trị đơn hàng: 
                    <span class="fw-bold text-danger">
                        <?= number_format($totalOrderPrice, 0, ',', '.') ?> đồng
                    </span>
            <button type="submit" class="btn btn-primary w-100 mb-3" name="btndh" id="btndh">Xác Nhận Đặt Hàng </button>
            </form>

            <?php
            //include_once('script.php');
            ?>
        </div>
    </div>
    <script src="vendor/js/bootstrap.bundle.min.js"></script>
</body>

</html>