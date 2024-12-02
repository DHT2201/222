<?php
$selectedCategory = isset($_POST['category']) ? $_POST['category'] : '';
$selectedSubCategory = isset($_POST['subcategory']) ? $_POST['subcategory'] : '';
$showError = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($selectedSubCategory)) {
        $showError = true;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng tin sản phẩm bán</title>

    <?php
    include_once('view/layout/header/lib_cdn.php');
    ?>

</head>


<body>

    <!-- Svg -->
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

    <?php
    include_once('view/layout/pagination/index.php');
    ?>


    <section class="container pb-4 my-4 text-black">
        <div class="container mt-5 shadow-sm rounded p-4">

            <!-- Processing to registrate -->
            <!-- <div class="position-relative m-4 mb-5">
                <div class="progress" style="height: 3px;">
                    <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <button type="button" class="active position-absolute top-0 start-0 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">1</button>
                <button type="button" class="active position-absolute top-0 start-50 translate-middle btn btn-sm btn-primary rounded-pill" style="width: 2rem; height:2rem;">2</button>
                <button type="button" class="position-absolute top-0 start-100 translate-middle btn btn-sm btn-secondary rounded-pill" style="width: 2rem; height:2rem;">3</button>
            </div> -->

            <!-- Alert notification -->
            <!-- <div class="alert alert-danger d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-exclamation-triangle-fill me-2" viewBox="0 0 16 16" role="image">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5m.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                </svg>
                <div>
                    Thông tin còn thiếu. Vui lòng nhập đầy đủ thông tin!
                </div>
            </div> -->

            <header>
                <h1 class="text-center">Đăng tin bán sản phẩm</h1>
            </header>

            <main class="mt-4">

                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label for="category" class="form-label">Danh mục cấp 1 <span class="text-danger">*</span></label>
                                <select class="form-select border-color" id="category" name="category" required onchange="this.form.submit()">
                                    <option value="">Chọn danh mục</option>
                                    <?php 
                                    include_once('controller/Category/CategoryController.php');
                                    $categoryController = new CategoryController();
                                    $categories = $categoryController->getCategoryList();

                                    foreach($categories as $category){
                                        echo '<option value="'. $category['category_id'] .'" selected>'. $category['category_name'] .'</option>';
                                    }
                                    ?>
                                    <!-- <option value="do-dien-tu" <?php //if ($selectedCategory == 'do-dien-tu') echo 'selected'; ?>>Đồ điện tử</option>
                                    <option value="sach" <?php //if ($selectedCategory == 'sach') echo 'selected'; ?>>Sách</option> -->
                                </select>
                            </div>

                            <div class="mb-3" id="subcategoryContainer" style="display: <?php echo $selectedCategory ? 'block' : 'none'; ?>">

                                <label for="subcategory" class="form-label">Danh mục cấp 2 <span class="text-danger">*</span></label>
                                
                                <select class="form-select border-color" id="subcategory" name="subcategory" required onchange="toggleFields()">
                                    <option value="">Chọn danh mục cấp 2</option>
                                    <?php if ($selectedCategory == 'do-dien-tu'): ?>
                                        <option value="smartphone" <?php if ($selectedSubCategory == 'smartphone') echo 'selected'; ?>>Smartphone</option>
                                        <option value="tablet" <?php if ($selectedSubCategory == 'tablet') echo 'selected'; ?>>Tablet</option>
                                    <?php elseif ($selectedCategory == 'sach'): ?>
                                        <option value="fiction" <?php if ($selectedSubCategory == 'fiction') echo 'selected'; ?>>Tiểu thuyết</option>
                                        <option value="non-fiction" <?php if ($selectedSubCategory == 'non-fiction') echo 'selected'; ?>>Phi hư cấu</option>
                                    <?php endif; ?>

                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Hình ảnh và Video sản phẩm <span class="text-danger">*</span></label>

                                <input type="file" class="form-control border-color" name="imageUpload[]" accept="image/*" multiple onchange="previewImages(this)">
                                <small class="form-text text-muted">Chọn từ 1 đến 6 hình ảnh.</small>
                                <div class="image-preview" id="imagePreview"></div>

                                <input type="file" class="form-control mt-3 border-color" name="videoUpload" accept="video/*" onchange="previewVideo(this)">
                                <small class="form-text text-muted">Chọn 1 video.</small>
                                <div class="video-preview" id="videoPreview"></div>
                            </div>

                            <?php
                            include_once('script.php');
                            ?>

                        </div>

                        <div class="col" id="productFields" style="display: 
                            <?php
                            echo !empty($selectedSubCategory) ? 'block' : 'none';
                            ?>">

                            <?php
                            if ($selectedCategory == 'do-dien-tu'):
                            ?>
                                <h4>Thông tin sản phẩm</h4>
                                <div class="mb-3">
                                    <input type="text" class="form-control border-color" name="status" placeholder="Tình trạng">
                                </div>
                                <select class="form-select mb-3 mt-4 border-color">
                                    <option selected>Chọn hãng</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <div class="mb-3 mt-4">
                                    <input type="text" class="form-control border-color" name="color" placeholder="Màu sắc">
                                </div>
                                <div class="mb-3 mt-4">
                                    <input type="text" class="form-control border-color" name="capacity" placeholder="Dung lượng">
                                </div>
                                <div class="mb-3 mt-4">
                                    <input type="text" class="form-control border-color" name="warranty" placeholder="Chính sách bảo hành">
                                </div>
                                <div class="mb-3 mt-4">
                                    <input type="number" class="form-control border-color" name="price" placeholder="Giá">
                                </div>
                                <h4>Tiêu đề đăng tin và Mô tả chi tiết</h4>
                                <div class="mb-3 mt-4">
                                    <input type="text" class="form-control border-color" name="title" placeholder="Tiêu đề đăng tin">
                                </div>
                                <div class="mb-3 mt-4">
                                    <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                                    <textarea class="form-control border-color" id="exampleFormControlTextarea1" rows="5"></textarea>
                                </div>
                                <h4>Thông tin người bán</h4>
                                <div class="mb-3 mt-4">
                                    <input type="text" class="form-control border-color" name="address" placeholder="Địa chỉ">
                                </div>
                            <?php
                            elseif ($selectedCategory == 'sach'):
                            ?>
                                <h4>Thông tin sản phẩm</h4>
                                <div class="mb-3">
                                    <input type="text" class="form-control border-color" name="status" placeholder="Tình trạng">
                                </div>
                                <div class="mb-3 mt-4">
                                    <input type="text" class="form-control border-color" name="author" placeholder="Tác giả">
                                </div>
                                <div class="mb-3 mt-4">
                                    <input type="text" class="form-control border-color" name="publisher" placeholder="Nhà xuất bản">
                                </div>
                                <div class="mb-3 mt-4">
                                    <input type="text" class="form-control border-color" name="isbn" placeholder="Mã ISBN">
                                </div>
                                <div class="mb-3 mt-4">
                                    <input type="text" class="form-control border-color" name="language" placeholder="Ngôn ngữ">
                                </div>
                                <div class="mb-3 mt-4">
                                    <input type="number" class="form-control border-color" name="price" placeholder="Giá">
                                </div>
                                <div class="mb-3 mt-4">
                                    <label for="exampleFormControlTextarea2" class="form-label">Mô tả</label>
                                    <textarea class="form-control border-color" id="exampleFormControlTextarea2" rows="5"></textarea>
                                </div>
                                <h4>Tiêu đề đăng tin và Mô tả chi tiết</h4>
                                <div class="mb-3 mt-4">
                                    <input type="text" class="form-control border-color" name="title" placeholder="Tiêu đề đăng tin">
                                </div>
                                <div class="mb-3 mt-4">
                                    <label for="exampleFormControlTextarea1" class="form-label">Mô tả</label>
                                    <textarea class="form-control border-color" id="exampleFormControlTextarea1" rows="5"></textarea>
                                </div>
                                <h4>Thông tin người bán</h4>
                                <div class="mb-3 mt-4">
                                    <input type="text" class="form-control border-color" name="address" placeholder="Địa chỉ">
                                </div>
                            <?php
                            endif;
                            ?>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="col">
                            <button type="reset" class="btn btn-outline-danger w-100">Huỷ bỏ</button>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary w-100 active">Đăng tin</button>
                        </div>
                    </div>
                </form>
            </main>
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