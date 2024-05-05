<style>
    body {
        margin-top: 20px;
        background: #eee;
    }

    .profile .profile-img-list {
        list-style-type: none;
        margin: -0.1rem;
        padding: 0;
    }

    .profile .profile-img-list .profile-img-list-item.main {
        width: 50%;
    }

    .profile .profile-img-list:after,
    .profile .profile-img-list:before {
        content: "";
        display: table;
        clear: both;
    }

    .profile .profile-img-list .profile-img-list-item {
        width: 25%;
        padding: 0.1rem;
        float: left;
    }

    .profile .profile-img-list .profile-img-list-item .profile-img-list-link {
        display: block;
        padding-top: 75%;
        overflow: hidden;
        position: relative;
    }

    .profile .profile-img-list .profile-img-list-item .profile-img-list-link .profile-img-content,
    .profile .profile-img-list .profile-img-list-item .profile-img-list-link img {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        max-width: 100%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }

    .profile .profile-img-list .profile-img-list-item .profile-img-list-link .profile-img-content:before,
    .profile .profile-img-list .profile-img-list-item .profile-img-list-link img:before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        border: 1px solid rgba(0, 0, 0, 0.1);
    }

    .profile .profile-img-list .profile-img-list-item {
        width: 25%;
        padding: 0.1rem;
        float: left;
    }

    .profile .profile-img-list:after,
    .profile .profile-img-list:before {
        content: "";
        display: table;
        clear: both;
    }

    .profile .profile-img-list .profile-img-list-item.with-number .profile-img-number {
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        color: #000;
        font-size: 1.53125rem;
        font-weight: 600;
        line-height: 1.625rem;
        margin-top: -0.765625rem;
        text-align: center;
        text-shadow: 2px 2px #fff;
    }

    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
</style>
<?php

session_start();
include_once("admin/class/adminback.php");
$obj = new adminback();

$cata_info = $obj->p_display_catagory();
$cataDatas = array();
while ($data = mysqli_fetch_assoc($cata_info)) {
    $cataDatas[] = $data;
}

$bv = $obj->show_baiviet();

$baiviet = array();

while ($pdt_ftecth = mysqli_fetch_assoc($bv)) {
    $baiviet[] = $pdt_ftecth;
}

$cg_info = $obj->show_caygiong_limit();

$cg_datas = array();

while ($cg_ftecth = mysqli_fetch_assoc($cg_info)) {
    $cg_datas[] = $cg_ftecth;
}

$pdt_info = $obj->view_all_product_limit();

$pdt_datas = array();

while ($pdt_ftecth = mysqli_fetch_assoc($pdt_info)) {
    $pdt_datas[] = $pdt_ftecth;
}

$vung = $obj->vsxShowlimit();

    $vungsanxuat = array();   
            
    while($vung_ftecth = mysqli_fetch_assoc($vung)){
                $vungsanxuat[] = $vung_ftecth;
}



?>




<?php
include_once("includes/head.php");
?>

<body class="biolife-body">
    <!-- Preloader -->

    <?php
    include_once("includes/preloader.php");
    ?>

    <!-- HEADER -->
    <header id="" class="header-area style-01 layout-03">

        <?php
        include_once("includes/header_top.php");
        ?>

        <?php
        include_once("includes/header_middle.php");
        ?>

        <?php
        // include_once("includes/header_bottom.php");
        ?>

    </header>
    <!-- Page Contain -->
    <div class="page-contain">

        <!-- Main content -->
        <div id="main-content" class="main-content">

            <!--Block 01: Main Slide-->

            <?php
            include_once("includes/slider_main.php")
            ?>

            <!--Block 02: Banners-->

            <?php
            // include_once("includes/banner_slider.php")
            ?>

            <!--Block 03: Product Tabs-->
            <?php
            // include_once("includes/home_related_product.php")
            ?>


            <!--Block 06: Products-->


            <!--Block 07: Brands-->
            <?php
            // include_once("includes/brands.php");
            ?>

        </div>
    </div>

    <div class="container container-x">
        <div class="home-section__header">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="home-section__title text-center" style="font-weight: bold;">Nông sản tiêu biểu</h2>
                    <div class="underlined"></div>
                </div>
            </div>
        </div>
        <div class="product-category grid-style">
            <div class="row">
                <ul class="products-list">

                    <?php
                    foreach ($pdt_datas as $pdt_data) {
                        $formatted_id_sp = 'NSQN' . str_pad($pdt_data['id_sp'], 5, '0', STR_PAD_LEFT);
                    ?>

                        <li class="product-item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                            <div class="contain-product layout-default">
                                <div class="product-thumb">
                                    <a href="chitietsanpham.php?id=<?php echo $pdt_data['id_sp'] ?>" class="link-to-product">
                                        <img style="border-radius: 10px; width: 270px; height: 200px; object-fit: contain;" src="admin/uploads/<?php echo $pdt_data['hinhanh'] ?>" alt="dd" width="270" height="270" class="product-thumnail">
                                    </a>
                                </div>
                                <div class="info">

                                    <?php
                                    $tennongsan = $pdt_data['tensanpham']; // Lấy nội dung từ biến $pdt_data
                                    $max_length = 35; // Độ dài tối đa cho chuỗi

                                    // Kiểm tra độ dài của chuỗi
                                    if (strlen($tennongsan) > $max_length) {
                                        // Nếu độ dài vượt quá $max_length, thực hiện cắt chuỗi
                                        $tenrutgon = substr($tennongsan, 0, $max_length);

                                        // Kiểm tra xem chuỗi có bị cắt giữa từ một từ không
                                        $last_space = strrpos($tenrutgon, ' ');
                                        if ($last_space !== false) {
                                            $tenrutgon = substr($tenrutgon, 0, $last_space); // Loại bỏ phần sau từ cuối cùng nếu có
                                        }

                                        // Hiển thị phần đã cắt của chuỗi
                                        echo '<h4 style="padding-bottom: 2px;" class="product-title"><a href="chitietsanpham.php?id=' . $pdt_data['id_sp'] . '" class="pr-name">' . $tenrutgon . '...</a></h4>';
                                    } else {
                                        // Nếu độ dài không vượt quá $max_length, hiển thị chuỗi nguyên gốc
                                        echo '<h4 style="padding-bottom: 2px;" class="product-title"><a href="chitietsanpham.php?id=' . $pdt_data['id_sp'] . '" class="pr-name">' . $tennongsan . '</a></h4>';
                                    }
                                    ?>
                                    <div class="price">

                                        <ins><span style="color: #808080;" class="price-amount"><?php echo $formatted_id_sp ?></span></ins>

                                    </div>
                                    <!-- <div class="shipping-info">
                                                <p class="shipping-day">3-Day Shipping</p>
                                                <p class="for-today">Pree Pickup Today</p>
                                            </div> -->
                                    <div class="slide-down-box">
                                        <p class="message">Tất cả các sản phẩm đều được lựa chọn kỹ lưỡng để đảm bảo an toàn thực phẩm.</p>

                                    </div>
                                </div>
                            </div>
                        </li>

                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="home-section__footer">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <a href="sanpham.php" class="btn btn-warning">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container container-x">
        <div class="home-section__header">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="home-section__title text-center" style="font-weight: bold;">Vùng sản xuất</h2>
                    <div class="underlined"></div>
                </div>
            </div>
        </div>

        <div class="product-category grid-style">
            <div class="row">
                <ul class="products-list">

                    <?php
                    foreach ($vung as $vsx) {
                        // $formatted_id_cg = 'NSQN' . str_pad($vsx['id_vung'], 5, '0', STR_PAD_LEFT);
                    ?>

                        <li class="product-item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                            <div class="contain-product layout-default">
                                <div class="product-thumb">
                                    <a href="chitietvsx.php?id=<?php echo $vsx['id_vung'] ?>" class="link-to-product">
                                        <img style="border-radius: 10px; width: 270px; height: 200px; object-fit: contain;" src="admin/uploads/<?php echo $vsx['hinhanh'] ?>" alt="dd" class="product-thumnail">
                                    </a>
                                </div>
                                <div class="info">
                                    <?php
                                    $tenvung = $vsx['tenvung']; // Lấy nội dung từ biến $pdt_data
                                    $max_length = 25; // Độ dài tối đa cho chuỗi

                                    // Kiểm tra độ dài của chuỗi
                                    if (strlen($tenvung) > $max_length) {
                                        // Nếu độ dài vượt quá $max_length, thực hiện cắt chuỗi
                                        $tenrutgon = substr($tenvung, 0, $max_length);

                                        // Kiểm tra xem chuỗi có bị cắt giữa từ một từ không
                                        $last_space = strrpos($tenrutgon, ' ');
                                        if ($last_space !== false) {
                                            $tenrutgon = substr($tenrutgon, 0, $last_space); // Loại bỏ phần sau từ cuối cùng nếu có
                                        }

                                        // Hiển thị phần đã cắt của chuỗi
                                        echo '<h4 style="padding-bottom: 2px;" class="product-title"><a href="chitietvsx.php?id=' . $vsx['id_vung'] . '" class="pr-name">' . $tenrutgon . '...</a></h4>';
                                    } else {
                                        // Nếu độ dài không vượt quá $max_length, hiển thị chuỗi nguyên gốc
                                        echo '<h4 style="padding-bottom: 2px;" class="product-title"><a href="chitietvsx.php?id=' . $vsx['id_vung'] . '" class="pr-name">' . $tenvung . '</a></h4>';
                                    }
                                    ?>

                                    <div class="price">

                                        <ins><span style="color: #808080;" class="price-amount"><?php echo $vsx['mavung']; ?></span></ins>

                                    </div>
                                    <!-- <div class="shipping-info">
                                                <p class="shipping-day">3-Day Shipping</p>
                                                <p class="for-today">Pree Pickup Today</p>
                                            </div> -->
                                    <div class="slide-down-box">
                                        <p class="message">Tất cả các sản phẩm đều được lựa chọn kỹ lưỡng để đảm bảo an toàn chất lượng.</p>

                                    </div>
                                </div>
                            </div>
                        </li>

                    <?php } ?>


                </ul>
            </div>
        </div>
        <div class="home-section__footer">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <a href="vungsanxuat.php" class="btn btn-warning">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container container-x">
        <div class="home-section__header">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="home-section__title text-center" style="font-weight: bold;">Cây giống</h2>
                    <div class="underlined"></div>
                </div>
            </div>
        </div>

        <div class="product-category grid-style">
            <div class="row">
                <ul class="products-list">

                    <?php
                    foreach ($cg_datas as $cg_data) {
                        $formatted_id_cg = 'NSQN' . str_pad($cg_data['id_cg'], 5, '0', STR_PAD_LEFT);
                    ?>

                        <li class="product-item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                            <div class="contain-product layout-default">
                                <div class="product-thumb">
                                    <a href="chitietcaygiong.php?id=<?php echo $cg_data['id_cg'] ?>" class="link-to-product">
                                        <img style="border-radius: 10px; width: 270px; height: 200px; object-fit: contain;" src="admin/uploads/<?php echo $cg_data['hinhanh'] ?>" alt="dd" class="product-thumnail">
                                    </a>
                                </div>
                                <div class="info">
                                    <?php
                                    $tencaygiong = $cg_data['tencaygiong']; // Lấy nội dung từ biến $pdt_data
                                    $max_length = 25; // Độ dài tối đa cho chuỗi

                                    // Kiểm tra độ dài của chuỗi
                                    if (strlen($tencaygiong) > $max_length) {
                                        // Nếu độ dài vượt quá $max_length, thực hiện cắt chuỗi
                                        $tenrutgon = substr($tencaygiong, 0, $max_length);

                                        // Kiểm tra xem chuỗi có bị cắt giữa từ một từ không
                                        $last_space = strrpos($tenrutgon, ' ');
                                        if ($last_space !== false) {
                                            $tenrutgon = substr($tenrutgon, 0, $last_space); // Loại bỏ phần sau từ cuối cùng nếu có
                                        }

                                        // Hiển thị phần đã cắt của chuỗi
                                        echo '<h4 style="padding-bottom: 2px;" class="product-title"><a href="chitietcaygiong.php?id=' . $cg_data['id_cg'] . '" class="pr-name">' . $tenrutgon . '...</a></h4>';
                                    } else {
                                        // Nếu độ dài không vượt quá $max_length, hiển thị chuỗi nguyên gốc
                                        echo '<h4 style="padding-bottom: 2px;" class="product-title"><a href="chitietcaygiong.php?id=' . $cg_data['id_cg'] . '" class="pr-name">' . $tencaygiong . '</a></h4>';
                                    }
                                    ?>

                                    <div class="price">

                                        <ins><span style="color: #808080;" class="price-amount"><?php echo $formatted_id_cg; ?></span></ins>

                                    </div>
                                    <!-- <div class="shipping-info">
                                                <p class="shipping-day">3-Day Shipping</p>
                                                <p class="for-today">Pree Pickup Today</p>
                                            </div> -->
                                    <div class="slide-down-box">
                                        <p class="message">Tất cả các sản phẩm đều được lựa chọn kỹ lưỡng để đảm bảo an toàn chất lượng.</p>

                                    </div>
                                </div>
                            </div>
                        </li>

                    <?php } ?>


                </ul>
            </div>
        </div>
        <div class="home-section__footer">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <a href="caygiong.php" class="btn btn-warning">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>  

    <div class="container container-x profile border" style="border-radius: 5px;margin-top: 10px; ">
        <div class="row" style="margin-top:15px; margin-bottom:5px;">
            <?php
            foreach ($baiviet as $bv) {
                $tk = $obj->show_taikhoanbyid($bv["nguoidang"]);
            ?>
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="d-flex align-items-center mb-3 row" style="font-size: 16px;margin-bottom: 10px;">
                                <a href="" class="d-block mr-2 col-md-2 col-xs-3">
                                    <img src="admin/uploads/avatar/<?php echo $tk['hinhdaidien'] ?>" alt="" width="50" style="width: 50px;height: 50px;" class="img-circle" />
                                </a>
                                <div class="flex-fill ps-2 col-md-10 col-xs-9" style="font-weight: bold;">
                                    <div class="fw-bold mb-1">
                                        <a href="#" class="text-decoration-none"><?= $tk['hoten']; ?></a> - <span class="text-muted">
                                            <?php
                                            if ($tk['role'] == 'Nongdan') {
                                                echo 'Nông dân';
                                            } elseif ($tk['role'] == 'Admin') {
                                                echo 'Quản trị';
                                            } elseif ($tk['role'] == 'Khachhang') {
                                                echo 'Người đánh giá';
                                            }
                                            ?>
                                        </span>
                                    </div>
                                    <div class="small text-body text-muted"><?= date('d-m-Y H:i', strtotime($bv["ngaydang"])) ?></div>
                                </div>
                            </div>

                            <a href="baiviet.php?id=<?php echo $bv['id_bv'] ?>">
                                <p style="margin-bottom: 5px;text-transform: uppercase;font-weight: bold;color: #000;font-size: 16px;max-height: 100px ;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?= $bv['tieude'] ?></p>
                            </a>
                            <p style="margin-bottom: -2px;color: #000;font-size: 16px;max-height: 100px ;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?= $bv['noidung'] ?></p>
                            <a href="baiviet.php?id=<?php echo $bv['id_bv'] ?>">
                                <p style="color: #FFA500;font-size: 16px;max-height: 100px ;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">Xem thêm..</p>
                            </a>
                            <div class="profile-img-list">
                                <div class="profile-img-list-item main">
                                    <a href="baiviet.php?id=<?php echo $bv['id_bv'] ?>" data-lity="" class="profile-img-list-link">
                                        <span class="profile-img-content" style="background-image: url(admin/uploads/baiviet/<?php echo $bv['hinhanh'] ?>);"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <div id="main-content" class="main-content">

        <!--Block 01: Main Slide-->

        <?php
        // include_once("includes/slider_main.php")
        ?>

        <!--Block 02: Banners-->

        <?php
        // include_once("includes/banner_slider.php")
        ?>

        <!--Block 03: Product Tabs-->
        <?php
        // include_once("includes/top_rated_produc.php")
        ?>


        <!--Block 06: Products-->


        <!--Block 07: Brands-->
        <?php
        // include_once("includes/brands.php");
        ?>

    </div>

    <!-- FOOTER -->

    <?php
    include_once("includes/footer.php");
    ?>

    <!--Footer For Mobile-->
    <?php
    include_once("includes/mobile_footer.php");
    ?>

    <?php
    include_once("includes/mobile_global.php")
    ?>


    <!-- Scroll Top Button -->
    <a class="btn-scroll-top"><i class="biolife-icon icon-left-arrow"></i></a>

    <?php
    include_once("includes/script.php")
    ?>
</body>

</html>