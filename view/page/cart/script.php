<script>
function updateCartQuantity(productId, quantity) {
    
    const userId = <?= json_encode($_SESSION['user_id']); ?>;
    const quantityInt = parseInt(quantity, 10);
    
    fetch('controller/Cart/UpdateController.php', {
    method: "POST",
    headers: {
        "Content-Type": "application/json",
    },
    body: JSON.stringify({action: 'update_cart',  userId, productId, quantity: quantityInt }),
})
   .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        console.log(data); 
        const totalPriceElement = document.querySelector(`#total-price-${productId}`);
        totalPriceElement.textContent = `${data.totalPrice.toLocaleString()} đồng`;
    })
    .catch(error => {
        console.error('Error:', error);
    });
}
function confirmDelete(productId) {
    // Hiển thị hộp thoại xác nhận
    var isConfirmed = confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?");
    const userId = <?= json_encode($_SESSION['user_id']); ?>;
    // Nếu người dùng xác nhận xóa
    if (isConfirmed) {
        // Sử dụng fetch để gửi yêu cầu xóa
        fetch('controller/Cart/DeleteProductController.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify({action: 'delete_product_cart',  userId,
             productId,
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Sản phẩm đã được xóa!');
                location.reload();  // Tải lại trang hoặc xóa phần tử khỏi DOM
            } else {
                alert('Có lỗi xảy ra khi xóa sản phẩm.');
            }
        })
        .catch(error => {
            console.error('Có lỗi xảy ra:', error);
            alert('Đã có lỗi xảy ra, vui lòng thử lại!');
        });
    }
}

$('.by_checked').change(function(){
    var id_cart = $(this).val();
    alert("hihi");
    if ($(this).is(':checked')) {
        var cart_status = 0;
        $.ajax({
            url: 'ajax/stick_by.php',
            data: { id_cart: id_cart, cart_status: cart_status },
            type: 'POST',
            success: function(response) {
                alert('Check mua hàng thành công');
            },
            error: function(xhr, status, error) {
                console.log("AJAX Error:");
                console.log("Status: " + status);
                console.log("Error: " + error);
                console.log(xhr.responseText); // Log the response
            }
        });
    }else{
        var cart_status = 1;
        $.ajax({
            url: 'ajax/stick_by.php',
            data: { id_cart: id_cart, cart_status: cart_status },
            type: 'POST',
            success: function(response) {
                alert('Check bo mua hàng thành công');
            },
            error: function(xhr, status, error) {
                console.log("AJAX Error:");
                console.log("Status: " + status);
                console.log("Error: " + error);
                console.log(xhr.responseText); // Log the response
            }
        });
        
    }
});



</script>