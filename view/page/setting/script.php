<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("info").classList.add("active");

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

    function previewImagesUser(input) {
        const imagePreview = document.getElementById('imagePreviewImageUser');
        imagePreview.innerHTML = ''; 

        const files = input.files;

        if (files.length === 0) {
            alert('Vui lòng chọn ít nhất một hình ảnh!');
            return;
        }

        for (let i = 0; i < files.length; i++) {
            const file = files[i];

            if (!file.type.startsWith('image/')) {
                alert('Tệp được chọn không phải là hình ảnh.');
                continue;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.classList.add('img-thumbnail', 'me-2', 'mt-2'); 
                img.style.width = '100px'; 
                img.style.height = '100px'; 
                img.style.objectFit = 'cover'; 
                imagePreview.appendChild(img);
            };

            reader.readAsDataURL(file); 
        }
    }
</script>