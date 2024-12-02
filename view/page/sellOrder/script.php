<script>
    document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("all-sell").classList.add("active");

    document.querySelectorAll(".nav-link").forEach(function(link) {
        link.addEventListener("click", function(event) {
            event.preventDefault();

            document.querySelectorAll(".nav-link").forEach(function(nav) {
                nav.classList.remove("active");
            });
            document.querySelectorAll(".tab-content").forEach(function(content) {
                content.classList.remove("active");
            });

            link.classList.add("active");
            const targetId = link.getAttribute("data-target");
            document.getElementById(targetId).classList.add("active");
        });
    });
});
</script>