<script>
        function toggleFields() {
            var subcategory = document.getElementById('subcategory').value;
            var productFields = document.getElementById('productFields');
            if (subcategory) {
                productFields.style.display = 'block';
            } else {
                productFields.style.display = 'none';
            }
        }
        function previewImages(input) {
            const imagePreview = document.getElementById('imagePreview');
            imagePreview.innerHTML = '';
            const files = input.files;

            if (files.length > 6) {
                alert('Bạn chỉ có thể chọn tối đa 6 hình ảnh.');
                input.value = '';
                return;
            }

            for (let i = 0; i < files.length; i++) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('img-thumbnail', 'me-2');
                    img.style.width = '100px';
                    imagePreview.appendChild(img);
                };
                reader.readAsDataURL(files[i]);
            }
        }

        function previewVideo(input) {
            const videoPreview = document.getElementById('videoPreview');
            videoPreview.innerHTML = '';
            const file = input.files[0];

            if (file) {
                const video = document.createElement('video');
                video.src = URL.createObjectURL(file);
                video.controls = true;
                video.style.width = '300px';
                videoPreview.appendChild(video);
            }
        }
    </script>