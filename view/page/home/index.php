<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trang chủ</title>
    <?php
    include_once('view/layout/header/lib_cdn.php');
    ?>
</head>

<body>


    <?php
    // include_once('view/layout/body/svg.php');
    ?>

    <div class="preloader-wrapper">
        <div class="preloader">
        </div>
    </div>

    <?php
    include_once('view/layout/slidebar/slidebar.php');
    ?>

    <header>
        <?php
        include_once('view/layout/header/menu.php');
        ?>
    </header>

    <!-- Introduction -->
    <?php
    include_once('introduction.php');
    ?>
    <!-- Explore category -->
    <?php
    include_once('explore_category.php');
    ?>

    <!-- Best selling -->
    <?php
    include_once('best_selling.php');
    ?>

    <!-- Famous brands -->
    <?php
    include_once('brands.php');
    ?>

    <!-- Favorite product -->
    <?php
    include_once('favorite_product.php');
    ?>

    <section>
        <div class="container-lg">

            <div class="bg-secondary text-light py-5 my-5"
                style="background: url('images/banner-newsletter.jpg') no-repeat; background-size: cover;">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-5 p-3">
                            <div class="section-header">
                                <h2 class="section-title display-5 text-light">Get 25%
                                    Discount on your first purchase</h2>
                            </div>
                            <p>Just Sign Up & Register it now to become member.</p>
                        </div>
                        <div class="col-md-5 p-3">
                            <form action="" method="post">
                                <div class="mb-3">
                                    <label for="name" class="form-label d-none">Họ và
                                        tên</label>
                                    <input type="text"
                                        class="form-control form-control-md rounded-0" name="name"
                                        id="name" placeholder="Họ và tên">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label d-none">Email</label>
                                    <input type="email"
                                        class="form-control form-control-md rounded-0"
                                        name="email" id="email" placeholder="Địa chỉ email">
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit"
                                        class="btn btn-dark btn-md rounded-0">Đăng ký</button>
                                </div>
                            </form>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>

    <?php 
    include_once('highly_appreciated.php');
    ?>

    <?php 
    include_once('sold_out.php');
    ?>

    <section class="py-4">
        <div class="container-lg">
            <h2 class="my-4">Từ khoá phổ biến</h2>
            <a href="#" class="btn btn-warning me-2 mb-2">Blue diamon almonds</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Angie’s Boomchickapop
                Corn</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Salty kettle Corn</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Chobani Greek Yogurt</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Sweet Vanilla Yogurt</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Foster Farms Takeout
                Crispy wings</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Warrior Blend Organic</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Chao Cheese Creamy</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Chicken meatballs</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Blue diamon almonds</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Angie’s Boomchickapop
                Corn</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Salty kettle Corn</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Chobani Greek Yogurt</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Sweet Vanilla Yogurt</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Foster Farms Takeout
                Crispy wings</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Warrior Blend Organic</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Chao Cheese Creamy</a>
            <a href="#" class="btn btn-warning me-2 mb-2">Chicken meatballs</a>
        </div>
    </section>

    <?php 
    include_once('ad.php');
    ?>

    <section class="py-5">
        <div class="container-lg">
            <div class="row row-cols-1 row-cols-sm-3 row-cols-lg-5">
                <div class="col">
                    <div class="card mb-3 border border-dark-subtle p-3">
                        <div class="text-dark mb-3">
                            <svg width="32" height="32">
                                <use phẩm sắp cháy hàng
                                    xlink:href="#package"></use>
                            </svg>
                        </div>
                        <div class="card-body p-0">
                            <h5>Chất lượng sản phẩm</h5>
                            <p class="card-text">Các sản phẩm được bán trên website đều đạt
                                tiêu chuẩn chất lượng tốt.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-3 border border-dark-subtle p-3">
                        <div class="text-dark mb-3">
                            <svg width="32" height="32">
                                <use
                                    xlink:href="#secure"></use>
                            </svg>
                        </div>
                        <div class="card-body p-0">
                            <h5>Độ tin cậy và minh bạch</h5>
                            <p class="card-text">Cung cấp thông tin rõ ràng về sản phẩm.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-3 border border-dark-subtle p-3">
                        <div class="text-dark mb-3">
                            <svg width="32" height="32">
                                <use
                                    xlink:href="#quality"></use>
                            </svg>
                        </div>
                        <div class="card-body p-0">
                            <h5>Trải nghiệm người dùng</h5>
                            <p class="card-text">Thiết kế website thân thiện, dễ sử dụng và
                                tối ưu hóa cho cả thiết bị di động.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-3 border border-dark-subtle p-3">
                        <div class="text-dark mb-3">
                            <svg width="32" height="32">
                                <use
                                    xlink:href="#savings"></use>
                            </svg>
                        </div>
                        <div class="card-body p-0">
                            <h5>Chiến lược truyền thông</h5>
                            <p class="card-text">Nội dung hấp dẫn và tương tác thường xuyên
                                sẽ tạo ra sự gắn kết với thương hiệu.</p>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-3 border border-dark-subtle p-3">
                        <div class="text-dark mb-3">
                            <svg width="32" height="32">
                                <use
                                    xlink:href="#offers"></use>
                            </svg>
                        </div>
                        <div class="card-body p-0">
                            <h5>Giá trị bền vững</h5>
                            <p class="card-text">Nhấn mạnh lợi ích của việc mua sắm đồ cũ
                                như tiết kiệm chi phí, bảo vệ môi trường và hỗ trợ nền kinh tế
                                tuần hoàn.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php
    include_once('view/layout/footer/footer.php');
    ?>


    <?php
    include_once('view/layout/footer/lib-cdn-js.php');
    ?>

</body>

</html>