<script>
  function addToCart(productId) {
    const userId = <?php echo isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 'null'; ?>;
    // Kiểm tra xem người dùng đã đăng nhập hay chưa
    if (!userId) {
        alert('Bạn cần đăng nhập để thêm vào giỏ hàng!');
        return;
    }

    // Gửi yêu cầu AJAX đến server
    fetch('controller/Cart/AddToCartController.php', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify({
        action: 'add_to_cart',
        product_id: productId,
        user_id: userId,
        quantity: 1, 
    }),
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        alert('Sản phẩm đã thêm vào giỏ hàng!');
        console.log(data); 
    })
    .catch(error => {
        console.error('Error:', error);
    });

}
</script>
