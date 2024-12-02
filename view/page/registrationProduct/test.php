<div class="mb-3">
    <label for="category" class="form-label">Danh mục cấp 1 <span class="text-danger">*</span></label>
    <select class="form-select border-color" id="category" name="category" required onchange="this.form.submit()">
        <option value="">Chọn danh mục</option>
        <?php
        include_once('controller/Category/CategoryController.php');
        $categoryController = new CategoryController();
        $categories = $categoryController->getCategoryList();

        foreach ($categories as $category) {
            echo '<option value="' . $category['category_id'] . '" selected>' . $category['category_name'] . '</option>';
        }
        ?>
        <!-- <option value="do-dien-tu" <?php //if ($selectedCategory == 'do-dien-tu') echo 'selected'; 
                                        ?>>Đồ điện tử</option>
                                    <option value="sach" <?php //if ($selectedCategory == 'sach') echo 'selected'; 
                                                            ?>>Sách</option> -->
    </select>
</div>

<div class="mb-3" id="subcategoryContainer" style="display: <?php echo $selectedCategory ? 'block' : 'none'; ?>">

    <label for="subcategory" class="form-label">Danh mục cấp 2 <span class="text-danger">*</span></label>

    <select class="form-select border-color" id="subcategory" name="subcategory" required onchange="toggleFields()">
        <option value="">Chọn danh mục cấp 2</option>

        <?php
        include_once('controller/CategoryItem/CategoryItemController.php');
        $categoryItemController = new CategoryItemController();

        $idCategory = $_REQUEST['idc'];

        $datas = $categoryItemController->getAllListCategoryItemByCategoryController($idCategory);

        foreach ($datas as $data) {
            echo '
            <option value="' . $data['category_item_id'] . '" selected>' . $data['category_item_name'] . '</option>
            ';
        }
        ?>

        <?php if ($selectedCategory == 'do-dien-tu'): ?>
            <option value="smartphone" <?php if ($selectedSubCategory == 'smartphone') echo 'selected'; ?>>Smartphone</option>
            <option value="tablet" <?php if ($selectedSubCategory == 'tablet') echo 'selected'; ?>>Tablet</option>
        <?php elseif ($selectedCategory == 'sach'): ?>
            <option value="fiction" <?php if ($selectedSubCategory == 'fiction') echo 'selected'; ?>>Tiểu thuyết</option>
            <option value="non-fiction" <?php if ($selectedSubCategory == 'non-fiction') echo 'selected'; ?>>Phi hư cấu</option>
        <?php endif; ?>

    </select>
</div>