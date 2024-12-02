<div class="container-fluid">
    <div class="row py-3 border-bottom">
        <div
            class="col-sm-4 col-lg-2 text-center text-sm-start d-flex gap-3 justify-content-center justify-content-md-start">
            <div class="d-flex align-items-center my-3 my-sm-0">
                <a href="index.php?page=home">
                    <img src="asset/image/logo/logo-website.png" alt="logo" class="img-fluid"
                        style="width: 60; height: 60px;">
                </a>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" title="Menu">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                </svg>
            </button>

        </div>

        <div class="col-sm-6 offset-sm-2 offset-md-0 col-lg-4">
            <div class="search-bar row bg-light p-2 rounded-4">
                <div class="col-md-4 d-none d-md-block">
                    <select class="form-select border-0 bg-transparent">
                        <option>Danh mục</option>
                        <?php 
                            include_once('controller/Category/CategoryController.php');
                            $getCategory = new CategoryController();
                            $datas = $getCategory->getCategoryList();
                            
                            foreach ($datas as $data){
                                echo '<option value="'.$data['category_id'].'">'.$data['category_name'].'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="col-11 col-md-7">

                <form id="search-form" class="text-center" action="index.php" method="GET">
                        <input type="hidden" name="page" value="product">
                        
                        <input type="text" class="form-control border-0 bg-transparent" placeholder="Tìm kiếm..." name="keyword" value="<?php echo isset($_SESSION['search_keyword']) ? $_SESSION['search_keyword']: ''; ?>">
                     
                </form>

                </div>
                <div class="col-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <ul class="navbar-nav list-unstyled d-flex flex-row gap-3 gap-lg-5 justify-content-center flex-wrap align-items-center mb-0 fw-bold text-uppercase text-dark">
                <li class="nav-item active">
                    <a href="index.php?page=home" class="nav-link btn-link">Trang chủ</a>
                </li>
                <li class="nav-item active">
                    <a href="index.php?page=contact" class="nav-link btn-link">Liên hệ</a>
                </li>
                <li class="nav-item active btn btn-outline-primary fw-bold">
                    <a href="index.php?page=registrationProduct" class="nav-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                            fill="currentColor" class="bi bi-card-list"
                            viewBox="0 0 16 16">
                            <path
                                d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z" />
                            <path
                                d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8m0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0" />
                        </svg> &nbsp;
                        Đăng tin
                    </a>
                </li>
            </ul>
        </div>

        <div class="col-sm-8 col-lg-2 d-flex gap-5 align-items-center justify-content-center justify-content-sm-end">
            <ul class="d-flex justify-content-end list-unstyled m-0">
                <li>
                    <a href="index.php?page=notification" class="p-2 mx-1 btn btn-primary position-relative active" data-bs-toggle="tooltip" data-bs-placement="left" title="Thông báo">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6" />
                        </svg>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">
                            <?php 
                                if(isset($_SESSION['success_message'])){
                                    include_once('controller/Notification/NotificationController.php');
                                    $notification = new Notification();
                                    $userId = isset($_SESSION['user_id']);
                                    if($userId){
                                        echo $notification->countNotificationByUserId($userId);
                                    }
                                }else{
                                    echo 0;
                                }
                            ?>
                            
                            <span class="visually-hidden">unread messages</span>
                        </span>
                    </a>
                </li>
                <li>
                    <div class="dropdown" id="dropdown-user">
                        <a href="#" class="account-icon p-2 mx-1" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php 
                                if(!isset($_SESSION['success_message'])){
                                    
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-person-exclamation" viewBox="0 0 16 16">
                                            <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m.256 7a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                                            <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-3.5-2a.5.5 0 0 0-.5.5v1.5a.5.5 0 0 0 1 0V11a.5.5 0 0 0-.5-.5m0 4a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1"/>
                                        </svg>';
                                }
                                else {
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
                                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                                            <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                                        </svg>';
                                }
                            ?>
                        </a>

                        <ul class="dropdown-menu" id="dropdown-menu-user">

                            <li class="d-flex align-items-center p-2" data-bs-toggle="tooltip" data-bs-placement="top" title="
                            <?php
                            include_once('controller/Login/LoginController.php');
                            $loginController = new LoginController();

                            if (!isset($_SESSION['email'])) {
                                echo 'Người dùng chưa đăng nhập';
                            } else {
                                $fullname = $_SESSION['email'];
                                echo $loginController->getUserNameController($fullname);
                            }
                            ?>">
                                <img src="asset/image/user/img-default.png" alt="Ảnh mặc định" class="img-fluid me-2" style="width: 30px; height: 30px; border-radius: 50%;">
                                <a class="dropdown-item m-0 p-0 text-black text-truncate dropdown-menu-name-user-item" href="#" title="">
                                    <?php 
                                       include_once('controller/Login/LoginController.php');
                                       $loginController = new LoginController();
           
                                       if (!isset($_SESSION['email'])) {
                                           echo 'Người dùng chưa đăng nhập';
                                       } else {
                                           $fullname = $_SESSION['email'];
                                           echo $loginController->getUserNameController($fullname);
                                       }
                                   ?>
                                </a>
                                
                                <?php 
                                if(!isset($_SESSION['success_message'])){
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293z"/>
                                        </svg>';
                                }
                                else{
                                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#6bb252" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                        </svg>';
                                }
                                ?>
                            </li>
                            <li>
                                <a class="dropdown-item text-black dropdown-menu-user-item" href="index.php?page=puchaseOrder">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#6bb252" class="bi bi-bag-fill" viewBox="0 0 16 16">
                                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4z" />
                                    </svg>
                                    &nbsp;Đơn mua
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-black dropdown-menu-user-item" href="index.php?page=sellOrder">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#6bb252" class="bi bi-ticket-perforated-fill" viewBox="0 0 16 16">
                                        <path d="M0 4.5A1.5 1.5 0 0 1 1.5 3h13A1.5 1.5 0 0 1 16 4.5V6a.5.5 0 0 1-.5.5 1.5 1.5 0 0 0 0 3 .5.5 0 0 1 .5.5v1.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 11.5V10a.5.5 0 0 1 .5-.5 1.5 1.5 0 1 0 0-3A.5.5 0 0 1 0 6zm4-1v1h1v-1zm1 3v-1H4v1zm7 0v-1h-1v1zm-1-2h1v-1h-1zm-6 3H4v1h1zm7 1v-1h-1v1zm-7 1H4v1h1zm7 1v-1h-1v1zm-8 1v1h1v-1zm7 1h1v-1h-1z" />
                                    </svg>
                                    &nbsp;Đơn bán
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-black dropdown-menu-user-item" href="index.php?page=review">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#6bb252" class="bi bi-send-check-fill" viewBox="0 0 16 16">
                                        <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 1.59 2.498C8 14 8 13 8 12.5a4.5 4.5 0 0 1 5.026-4.47zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471z" />
                                        <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-1.993-1.679a.5.5 0 0 0-.686.172l-1.17 1.95-.547-.547a.5.5 0 0 0-.708.708l.774.773a.75.75 0 0 0 1.174-.144l1.335-2.226a.5.5 0 0 0-.172-.686" />
                                    </svg>
                                    &nbsp;Đánh giá từ tôi
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-black dropdown-menu-user-item" href="index.php?page=help">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#6bb252" class="bi bi-person-up" viewBox="0 0 16 16">
                                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.354-5.854 1.5 1.5a.5.5 0 0 1-.708.708L13 11.707V14.5a.5.5 0 0 1-1 0v-2.793l-.646.647a.5.5 0 0 1-.708-.708l1.5-1.5a.5.5 0 0 1 .708 0M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                                        <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z" />
                                    </svg>
                                    &nbsp;Trợ giúp
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-black dropdown-menu-user-item" href="index.php?page=setting">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#6bb252" class="bi bi-gear-fill" viewBox="0 0 16 16">
                                        <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                                    </svg>
                                    &nbsp;Cài đặt
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item text-black dropdown-menu-user-item" href="index.php?page=contributeComment">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#6bb252" class="bi bi-ui-checks" viewBox="0 0 16 16">
                                        <path d="M7 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zM2 1a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2zm0 8a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h2a2 2 0 0 0 2-2v-2a2 2 0 0 0-2-2zm.854-3.646a.5.5 0 0 1-.708 0l-1-1a.5.5 0 1 1 .708-.708l.646.647 1.646-1.647a.5.5 0 1 1 .708.708zm0 8a.5.5 0 0 1-.708 0l-1-1a.5.5 0 0 1 .708-.708l.646.647 1.646-1.647a.5.5 0 0 1 .708.708zM7 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm0-5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0 8a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5" />
                                    </svg>
                                    &nbsp;Đóng góp ý kiến
                                </a>
                            </li>
                            <li>
                                <?php 
                                if(!isset($_SESSION['success_message'])){
                                    echo '';
                                }else{
                                    echo '<a href="index.php?page=logout" class="text-black fw-bold dropdown-item border-top border-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#6bb252" class="bi bi-box-arrow-in-left" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M10 3.5a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2A1.5 1.5 0 0 1 9.5 14h-8A1.5 1.5 0 0 1 0 12.5v-9A1.5 1.5 0 0 1 1.5 2h8A1.5 1.5 0 0 1 11 3.5v2a.5.5 0 0 1-1 0z" />
                                                <path fill-rule="evenodd" d="M4.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H14.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                                            </svg>
                                            &nbsp;Đăng xuất
                                        </a>';
                                }
                                ?>
                                
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="index.php?page=whistlist" class="p-2 mx-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Sản phẩm yêu thích của bạn">
                        <?php  
                            include_once('controller/Whistlist/WhistlistController.php');
                            $whistlistController = new WhistlistController();
                            $productCountWhistlist = $whistlistController->countProductInWhistlistController();
                            
                            if($productCountWhistlist = 0){
                                echo '<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-bag-heart" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0M14 14V5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1M8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"/>
                                    </svg>';
                            }
                            else {
                                echo '<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-bag-heart-fill" viewBox="0 0 16 16">
                                        <path d="M11.5 4v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m0 6.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132"/>
                                    </svg>';
                            }
                        ?>
                    </a>
                </li>
                <li>
                    <a href="index.php?page=cart" class="p-2 mx-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Giỏ hàng"
                     onclick="checkLogin(event)">
                        <?php  
                            include_once('controller/Cart/CartController.php');
                            $cartController = new CartController();
                            $productCount = $cartController->getProductCount();
                            
                            if($countProductInCart = 0){
                                echo '<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-basket3-fill" viewBox="0 0 16 16">
                                        <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM2.468 15.426.943 9h14.114l-1.525 6.426a.75.75 0 0 1-.729.574H3.197a.75.75 0 0 1-.73-.574z"/>
                                    </svg>';
                            }
                            else {
                                echo '<svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-basket3" viewBox="0 0 16 16">
                                        <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H.5a.5.5 0 0 1-.5-.5v-1A.5.5 0 0 1 .5 6h1.717L5.07 1.243a.5.5 0 0 1 .686-.172zM3.394 15l-1.48-6h-.97l1.525 6.426a.75.75 0 0 0 .729.574h9.606a.75.75 0 0 0 .73-.574L15.056 9h-.972l-1.479 6z"/>
                                    </svg>';
                            }
                        ?>
                    </a>
                </li>

                <li>
                    <?php 
                        if(!isset($_SESSION['success_message'])){
                            echo '<a href="index.php?page=login" class="p-2 mx-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Đăng nhập">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                                        <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                                    </svg>
                                </a>';
                        }
                        else{
                            echo '<a href="index.php?page=logout" class="p-2 mx-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Đăng xuất">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
                                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z"/>
                                    </svg>
                                </a>';
                        }
                    ?>
                </li>

            </ul>
        </div>
    </div>
    <?php
        include_once('script.php');
    ?>
</div>