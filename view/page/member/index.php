<!DOCTYPE html>
<html lang="en">

<head>
    <title>Thành viên nhóm</title>

    <?php
    include_once('view/layout/header/lib_cdn.php');
    ?>

</head>

<body>


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


    <div class="container-xxl py-5 bg-primary hero-header mb-5" 
        style="
            background-image: url(asset/image/banner/banner-general.png); 
            background-size: cover; 
            background-repeat: no-repeat; 
            background-position: center; 
        ">
        <div class="container text-center my-5 pt-5 pb-4">
            <h1 class="display-3 mb-3 title-panigation">THÀNH VIÊN NHÓM</h1>
            <style>
                .title-panigation{
                    color: #6bb252;
                    font-weight: bold;
                }
            </style>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-center text-uppercase title-panigation">
                    <li class="breadcrumb-item"><a href="">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        <a class="text-decoration-none" href="">Thành viên</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>


    

    <section class="container-fluid pb-4 my-4 text-black">
        <div class="mt-5">
            <table class="table text-black">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Chức danh</th>
                        <th scope="col">Mã số sinh viên</th>
                        <th scope="col">Họ và tên</th>
                        <th scope="col">Mô tả công việc thực hiện</th>

                        <th scope="col">Giao diện</th>
                        <th scope="col">Nhập liệu</th>
                        <th scope="col">Code 1.1</th>
                        <th scope="col">Code 1.2</th>
                        <th scope="col">Đánh giá</th>
                        <th scope="col">Tổng kết</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Nhóm trưởng</td>
                        <td>21070601</td>
                        <td>Nguyễn Nguyễn Phong</td>
                        <td>
                            <ul>
                                <li>Nhập liệu vào CSDL</li>
                                <li>Hiển thị thông tin trên trang chủ</li>
                                <li>Đăng ký</li>
                                <li>Đăng nhập</li>
                                <li>Gửi email thông báo</li>
                                <li>Thêm sản phẩm vào danh sách yêu thích</li>
                                <li>Quản lý tài khoản</li>
                                <li>Quản lý đơn mua</li>
                                <li>Quản lý đơn bán</li>
                            </ul>
                        </td>
                        <td>100%</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>Thư ký</td>
                        <td>21082021</td>
                        <td>Phan Văn Toàn</td>
                        <td>
                            <ul>
                                <li>Nhập liệu vào CSDL</li>
                                <li>Tìm kiếm sản phẩm</li>
                                <li>Đặt hàng</li>
                            </ul>
                        </td>
                        <td>87%</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Thành viên</td>
                        <td>21003275</td>
                        <td>Nguyễn Nhật Cường</td>
                        <td>
                            <ul>
                                <li>Nhập liệu vào CSDL</li>
                                <li>Huỷ đơn hàng</li>
                            </ul>
                        </td>
                        <td>60%</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Thành viên</td>
                        <td>21069981</td>
                        <td>Trần Tuấn Anh</td>
                        <td>
                            <ul>
                                <li>Nhập liệu vào CSDL</li>
                                <li>Đánh giá sản phẩm</li>
                                <li>Gửi tin nhắn cho người bán</li>
                                <li>Quản lý sản phẩm bán</li>
                            </ul>
                        </td>
                        <td>95%</td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>Thư ký</td>
                        <td>21076421</td>
                        <td>Nguyễn Hữu Phước</td>
                        <td>
                            <ul>
                                <li>Nhập liệu vào CSDL</li>
                                <li>Quản lý thông báo</li>
                                <li>Hỗ trợ người dùng</li>
                            </ul>
                        </td>
                        <td>100%</td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>Thành viên</td>
                        <td>20064751</td>
                        <td>Hà Tùng Dương</td>
                        <td>
                            <ul>
                                <li>Nhập liệu vào CSDL</li>
                                <li>Quản lý giỏ hàng</li>
                                <li>Quản lý danh mục sản phẩm</li>
                            </ul>
                        </td>
                        <td>80%</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <?php 
    include_once('view/layout/header/button_backtotop.php');
    ?>

    <?php
    include_once('view/layout/footer/footer.php');
    ?>

    <?php
    include_once('view/layout/footer/lib-cdn-js.php');
    ?>
</body>

</html>