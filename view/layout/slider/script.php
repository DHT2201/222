<script>
    const images = document.querySelectorAll(".banner-image");

    let index = 0;

    function slideImages() {
        index++;

        if (index >= images.length) {
            index = 0;
        }

        images.forEach((img, i) => {
            img.style.transform = `translateX(-${index * 100}%)`;
        });
    }

    setInterval(slideImages, 2000);
</script>