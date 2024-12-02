<div class="col-md-12">
    <div class="section-header d-flex align-items-center gap-1 my-4">
        <form action="" method="post" class="m-0 d-flex gap-1">
            <?php 
            // $idc = $_REQUEST['idc'];
            // $namePage = $_REQUEST['page'];
            // $namePage = 'product';

            // if(isset($idc) && isset($namePage)){
            //     include_once('controller/CategoryAttribute/CategoryAttributeController.php');
            //     $categoryAttributeController = new CategoryAttributeController();

            //     $resultDatas = $categoryAttributeController->getCategoryAttributeByCategoryIdController($idc);

            //     foreach($resultDatas as $resultData){
            //         echo '
            //         <select name="" id="" class="form-select border-color">
            //             <option value="">'. $resultData['category_attribute_name'] .'</option>
            //             <option value="">Cao đến Thấp</option>
            //             <option value="">Thấp lên Cao</option>
            //         </select>
            //         ';
            //     }
            // }
            ?>
        </form>
        <!-- Nút hiển thị chỉ trên màn hình nhỏ -->
        <button class="btn btn-primary d-block d-md-none">Chọn tùy chọn</button>
    </div>
</div>
<style>
    @media (max-width: 768px) {
    .section-header .form-select {
        display: none;
    }
    .section-header .btn {
        display: block; /* Hiển thị nút trên màn hình nhỏ */
    }
}


</style>
