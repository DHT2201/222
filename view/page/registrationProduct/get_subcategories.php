<?php
include_once('controller/CategoryItem/CategoryItemController.php');

if (isset($_GET['category_id'])) {
    $categoryId = $_GET['category_id'];
    $categoryItemController = new CategoryItemController();
    $datas = $categoryItemController->getAllListCategoryItemByCategoryController($categoryId);

    // Trả về dữ liệu JSON
    header('Content-Type: application/json');
    echo json_encode($datas);
    exit();
}
?>
