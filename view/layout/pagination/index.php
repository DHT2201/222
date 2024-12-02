<section class="container pb-4 my-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb text-black">
            <li class="breadcrumb-item">
                <a href="index.php?page=home" class="text-decoration-underline">Trang chủ</a>
            </li>
            <li class="breadcrumb-item">
                <?php 
                    $pageName = $page;

                    switch ($pageName) {
                        case 'cart':
                            echo '<a href="index.php?page=' . $page . '" class="text-decoration-none"> Giỏ hàng </a>';
                            break;
                        case 'whistlist':
                            echo '<a href="index.php?page=' . $page . '" class="text-decoration-none"> Sản phẩm yêu thích </a>';
                            break;    
                        case 'notification':
                            echo '<a href="index.php?page=' . $page . '" class="text-decoration-none"> Thông báo </a>';
                            break;
                        case 'registration_product':
                            echo '<a href="index.php?page=' . $page . '" class="text-decoration-none"> Đăng tin </a>';
                            break; 
                        case 'contact':
                            echo '<a href="index.php?page=' . $page . '" class="text-decoration-none"> Liên hệ </a>';
                            break;
                        case 'member':
                            echo '<a href="index.php?page=' . $page . '" class="text-decoration-none"> Thành viên </a>';
                            break; 
                        case 'puchaseOrder':
                            echo '<a href="index.php?page=' . $page . '" class="text-decoration-none"> Đơn mua </a>';
                            break; 
                        case 'sellOrder':
                            echo '<a href="index.php?page=' . $page . '" class="text-decoration-none"> Đơn bán </a>';
                            break; 
                        case 'registrationProduct':
                            echo '<a href="index.php?page=' . $page . '" class="text-decoration-none"> Đăng tin bán sản phẩm </a>';
                            break; 
                        case 'review':
                            echo '<a href="index.php?page=' . $page . '" class="text-decoration-none"> Đánh giá từ tôi </a>';
                            break;
                        case 'setting':
                            echo '<a href="index.php?page=' . $page . '" class="text-decoration-none"> Cài đặt </a>';
                            break; 
                        case 'clause':
                            echo '<a href="index.php?page=' . $page . '" class="text-decoration-none"> Chính sách điều khoản và bảo mật </a>';
                            break;  
                        case 'detailProduct':
                            echo 'Chi tiết sản phẩm';
                            break;  
                        case 'product':
                            echo '<a href="index.php?page=' . $page . '&idc='. $_REQUEST['idc'] .'" class="text-decoration-none"> Sản phẩm </a>';
                            break; 
                        default:
                            # code...
                            break;
                    }
                ?>
            </li>
            <?php 
                if($_REQUEST['page'] == 'detailProduct'){

                    $idp = $_REQUEST['idp'];
                    include_once('controller/Product/ProductController.php');
                    $productController = new ProductController();

                    echo '<li class="breadcrumb-item">'. $productController->getNameProductByIdController($idp). '</li>';

                }elseif($_REQUEST['page'] == 'product' && isset($_REQUEST['idc'])){
                    $idc = $_REQUEST['idc'];
                    include_once('controller/Category/CategoryController.php');
                    $productController = new CategoryController();

                    $categoryName = $productController->getCategoryNameController($idc);
                    
                    echo '<li class="breadcrumb-item">' . htmlspecialchars($categoryName) . '</li>';

                }
            ?>
        </ol>
    </nav>
</section>