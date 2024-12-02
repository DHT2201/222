<section style="background-image: url(''); background-repeat: no-repeat; background-size: 100;">
    <div class="container-lg">
        <div class="row">
            <div class="col-lg-6 pt-5 mt-5">
                <h2 class="display-1 ls-1"><span
                        class="fw-bold text-primary">Sành điệu</span> không cần đắt
                    <span
                        class="fw-bold">Thoải mái mua sắm</span>
                </h2>
                <p class="fs-4">Cảm Nhận Sự Khác Biệt Từ Đồ Cũ!</p>
                <div class="d-flex gap-3">
                    <a href="index.php?page=product" class="btn btn-primary text-uppercase fs-6 rounded-pill px-4 py-3 mt-3">
                        Bắt đầu mua sắm
                    </a>
                    <a href="#" class="btn btn-dark text-uppercase fs-6 rounded-pill px-4 py-3 mt-3">
                        Đăng ký ngay
                    </a>
                </div>
                <div class="row my-5">
                    <div class="col">
                        <div class="row text-dark">
                            <div class="col-auto">
                                <p class="fs-1 fw-bold lh-sm mb-0">
                                    <?php
                                    include_once('controller/Product/ProductController.php');
                                    $productController = new ProductController();

                                    echo $productController->countProductController();
                                    ?>K+
                                </p>
                            </div>
                            <div class="col">
                                <p class="text-uppercase lh-sm mb-0">Sản phẩm
                                    các loại</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row text-dark">
                            <div class="col-auto">
                                <p class="fs-1 fw-bold lh-sm mb-0">
                                    <?php
                                    include_once('controller/User/UserController.php');
                                    $userController = new UserController();

                                    echo $userController->countUserController();
                                    ?>K+
                                </p>
                            </div>
                            <div class="col">
                                <p class="text-uppercase lh-sm mb-0">Khách
                                    hàng chọn lựa</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="row text-dark">
                            <div class="col-auto">
                                <p class="fs-1 fw-bold lh-sm mb-0">
                                    <?php
                                    include_once('controller/User/UserController.php');
                                    $userController = new UserController();

                                    echo $userController->countRoleSellerController();
                                    ?>K+
                                </p>
                            </div>
                            <div class="col">
                                <p class="text-uppercase lh-sm mb-0">Cửa hàng
                                    đã đăng bán</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="row row-cols-1 row-cols-sm-3 row-cols-lg-3 g-0 justify-content-center">
            <div class="col">
                <div class="card border-0 bg-primary rounded-0 p-4 text-light">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                                <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2zm3.564 1.426L5.596 5 8 5.961 14.154 3.5zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z"/>
                            </svg>
                        </div>
                        <div class="col-md-9">
                            <div class="card-body p-0">
                                <h5 class="text-light">Chất lượng sản phẩm/dịch vụ</h5>
                                <p class="card-text">Chất lượng cao sẽ tạo dựng lòng tin và
                                    sự trung thành từ khách hàng.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 bg-secondary rounded-0 p-4 text-light">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-pin-map-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8z"/>
                                <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"/>
                            </svg>
                        </div>
                        <div class="col-md-9">
                            <div class="card-body p-0">
                                <h5 class="text-light">Định vị thương hiệu</h5>
                                <p class="card-text">Thông điệp thương hiệu và các giá trị
                                    cốt lõi mà thương hiệu muốn truyền tải.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card border-0 bg-danger rounded-0 p-4 text-light">
                    <div class="row">
                        <div class="col-md-3 text-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person-arms-up"  viewBox="0 0 16 16">
                                <path d="M8 3a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3" />
                                <path d="m5.93 6.704-.846 8.451a.768.768 0 0 0 1.523.203l.81-4.865a.59.59 0 0 1 1.165 0l.81 4.865a.768.768 0 0 0 1.523-.203l-.845-8.451A1.5 1.5 0 0 1 10.5 5.5L13 2.284a.796.796 0 0 0-1.239-.998L9.634 3.84a.7.7 0 0 1-.33.235c-.23.074-.665.176-1.304.176-.64 0-1.074-.102-1.305-.176a.7.7 0 0 1-.329-.235L4.239 1.286a.796.796 0 0 0-1.24.998l2.5 3.216c.317.316.475.758.43 1.204Z" />
                            </svg>
                        </div>
                        <div class="col-md-9">
                            <div class="card-body p-0">
                                <h5 class="text-light">Trải nghiệm khách hàng</h5>
                                <p class="card-text">Sự hài lòng của khách hàng góp phần xây
                                    dựng thương hiệu mạnh mẽ.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>