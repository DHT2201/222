<section class="py-5 overflow-hidden">
    <div class="container-lg">
        <div class="row">
            <div class="col-md-12">
                <div
                    class="section-header d-flex flex-wrap justify-content-between mb-5">
                    <h2 class="section-title">Các brand nổi tiếng</h2>
                </div>
            </div>
        </div>
        <style>
            .card-logo {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100%;
                text-align: center;
            }

            .logo-img {
                width: 130px;
                height: 50px;
                object-fit: contain;
            }
        </style>

        <div class="row">
            <div class="col-md-12">

                <div class="category-carousel swiper">
                    <div class="swiper-wrapper">

                        <?php
                        $logoDir = 'asset/image/logo';

                        $logosToShow = ['logo-samsung.png', 'logo-yadea.png', 'logo-trek.png', 'logo-grant.png', 'logo-apple.png', 'logo-canon.png', 'logo-dell.jpg', 'logo-honda.jpg', 'logo-mes.jpg', 'logo-panasonic.png', 'logo-sym.jpg', 'logo-thongnhat.png', 'logo-toshiba.png', 'logo-vinfast.jpg', 'logo-xiaomi.png'];

                        foreach ($logosToShow as $logo) {

                            if (file_exists($logoDir . '/' . $logo)) {
                                echo '<a href="#" class="nav-link swiper-slide text-center card card-logo p-4">';
                                echo '<img src="' . $logoDir . '/' . $logo . '" class="logo-img-brand" alt="Logo ' . htmlspecialchars(basename($logo, '.png')) . '">';
                                echo '</a>';
                            }
                        }
                        ?>
                    </div>
                    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
                    <script>
                        const swiper = new Swiper('.swiper', {
                            loop: true, 
                            autoplay: {
                                delay: 3000, 
                                disableOnInteraction: false, 
                            },
                            slidesPerView: 'auto', 
                            spaceBetween: 20, 
                            navigation: {
                                nextEl: '.swiper-button-next',
                                prevEl: '.swiper-button-prev',
                            },
                        });
                    </script>

                </div>
            </div>
        </div>
    </div>
</section>