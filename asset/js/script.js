document.addEventListener('DOMContentLoaded', function() {
    var tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');

    tooltipTriggerList.forEach(function(tooltipTriggerEl) {
        new bootstrap.Tooltip(tooltipTriggerEl);
    });
});

document.addEventListener("DOMContentLoaded", function() {
    const swiper = new Swiper('#brand-category-carousel', {
        loop: true, 
        slidesPerView: 'auto',
        autoplay: {
            delay: 3000, 
            disableOnInteraction: false, 
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
});
