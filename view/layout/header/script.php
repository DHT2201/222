<script>
    window.addEventListener("scroll", function() {
        const backToTop = document.getElementById("backToTop");
        if (window.scrollY > 200) {
            backToTop.classList.add("show");
        } else {
            backToTop.classList.remove("show");
        }
    });

    document.getElementById("backToTop").addEventListener("click", function(e) {
        e.preventDefault();
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });

    
    function checkLogin(event) {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        <?php if (!isset($_SESSION["user_id"])) { ?>
            event.preventDefault(); 
            alert("Bạn cần đăng nhập để xem giỏ hàng.");
        <?php } ?>
    }

</script>