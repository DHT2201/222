<section class="py-5 overflow-hidden">
    <div class="container-lg">
        <div class="row">
            <div class="col-md-12">

                <div
                    class="section-header d-flex flex-wrap justify-content-between mb-5">
                    <h2 class="section-title">Khám phá danh mục</h2>

                    <div class="d-flex align-items-center">
                        <a href="#" class="btn btn-primary me-2">Xem tất cả</a>
                        <div class="swiper-buttons">
                            <button
                                class="swiper-prev category-carousel-prev btn btn-yellow">❮</button>
                            <button
                                class="swiper-next category-carousel-next btn btn-yellow">❯</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="category-carousel swiper">
                    <div class="swiper-wrapper">
                        <?php
                        include_once('controller/Category/CategoryController.php');
                        $getCategory = new CategoryController();
                        $datas = $getCategory->getCategoryList();

                        foreach ($datas as $data) {
                            echo '
                                <a href="index.php?page=product&idc=' . $data['category_id'] . '"
                                    class="nav-link swiper-slide text-center">
                                    <img src="asset/image/category/' . $data['image'] . '" height="120" width="120" class="rounded" alt="' . $data['category_name'] . '">
                                    <h4 class="fs-6 mt-3 fw-normal category-title">' . $data['category_name'] . '</h4>
                                </a>
                                ';
                        }
                        ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>