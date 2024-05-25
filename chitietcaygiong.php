<?php

session_start();
include_once("admin/class/adminback.php");
$obj = new adminback();

$cata_info = $obj->p_display_catagory();
$cataDatas = array();
while ($data = mysqli_fetch_assoc($cata_info)) {
    $cataDatas[] = $data;
}


if (isset($_GET['id'])) {
    $id_cg = $_GET['id'];
    $cg_info = $obj->show_caygiong_by_id($id_cg);
    $cg_fetch = mysqli_fetch_assoc($cg_info);
    $cg_datas = array();
    $cg_datas[] = $cg_fetch;
}

if(empty($cg_fetch)){
    $obj->error404();
}
?>


<style>
    /* Kích thước chữ mặc định */
    .media img {
        max-width: 100%;
        height: auto;
    }

    .tab-link {
        font-size: 16px;
    }

    /* Kích thước chữ trên các thiết bị lớn hơn */
    @media only screen and (min-width: 768px) {
        .tab-link {
            font-size: 25px;
        }
    }

    .desc-expand {
        font-size: 18px;
    }

    .sumary-product {
        border: #e3e3e3 solid 1px;
        border-radius: 5px;
        background-color: #ffff;
        padding: 10px 10px;
    }

    .accodition-tab .row .col-md-12 {
        padding: 0;
    }

    .production-area-box {
        border: 1px solid #ccc;
        padding: 20px;
        margin-bottom: 20px;
    }

    :root {
        --main--color: #A0C438;
    }

    .serviceBox {
        color: var(--main--color);
        background: var(--main--color);
        font-family: 'Raleway', sans-serif;
        text-align: center;
        border-radius: 0 0 20px 20px;
        padding: 20px 20px 25px;
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.3);
        overflow: hidden;
        position: relative;
        z-index: 1;
        margin-bottom: 10px;
    }

    .serviceBox:before,
    .serviceBox:after {
        content: "";
        width: calc(100% - 25px);
        transform: translateX(-50%);
        position: absolute;
        left: 50%;
    }

    .serviceBox:before {
        background: #fff;
        height: calc(100% - 15px);
        top: 15px;
        z-index: -1;
    }

    .serviceBox:after {
        border: 12px solid var(--main--color);
        height: 100px;
        border-radius: 0 0 100px 100px;
        top: 0;
    }

    .serviceBox .service-icon {
        font-size: 40px;
        margin: 0 0 35px;
        display: inline-block;
    }

    .serviceBox .title {
        font-size: 26px;
        font-weight: 700;
        margin: 0 0 5px;
        padding-top: 10px;
    }

    .serviceBox h5 {
        font-size: 20px;
        margin: 0;
        margin-bottom: 2px;
    }

    .serviceBox .title-sub {
        text-align: left;
        font-weight: bold;
    }

    .serviceBox .description {
        text-align: left;
        color: #888;
        font-size: 13.2px;
        margin: 0;
        font-weight: bold;
        text-align: justify;
        line-height: -0.9px;
    }

    .serviceBox a {
        margin-top: 2px;
    }

    .product-tabs .tab-content .serviceBox p {
        line-height: normal;
    }

    .product-tabs.single-layout .tab-content {
        padding: 0;
    }

    .serviceBox.pink {
        --main--color: #FA68A0;
    }

    .serviceBox.blue {
        --main--color: #01748E;
    }

    .serviceBox.nhaxuong {
        --main--color: #795548;
    }

    .serviceBox.nhaphanphoi {
        --main--color: #FF9900;
    }

    .serviceBox.green {
        --main--color: #06BD7F;
    }

    @media only screen and (max-width: 1199px) {
        .serviceBox {
            margin: 0 0 20px;
        }
    }
</style>

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

            <!--Hero Section-->
            <!-- <div class="hero-section hero-background">
                <h1 class="page-title"> -->
            <!-- </h1>

               
            </div>
 -->



            <!--Navigation section-->
            <div class="container container-x">
                <nav class="biolife-nav">
                    <ul>
                        <li class="nav-item"><a href="index.php" class="permal-link">Trang chủ</a></li>

                        <li class="nav-item"><a href="caygiong.php" class="permal-link">Cây giống</a></li>

                        <li class="nav-item"><span class="current-page">

                                <?php
                                foreach ($cg_datas as $cg_data) {
                                    echo $cg_data['tencaygiong'];
                                }
                                ?>
                            </span></li>
                    </ul>
                </nav>


            </div>

            <div class="container">
                <div class="page-contain single-product">
                    <div class="container container-x">

                        <!-- Main content -->
                        <div id="main-content" class="main-content">

                            <?php
                            foreach ($cg_datas as $cg_data) {
                                $formatted_id_cg = 'NSQN' . str_pad($cg_data['id_cg'], 5, '0', STR_PAD_LEFT);

                            ?>




                                <!-- summary info -->


                                <div class="sumary-product single-layout" style="text-align:center;display: flex; flex-direction: column;">
                                    <div class="media">
                                        <ul class="biolife-carousel slider-for" data-slick='{"arrows":false,"dots":false,"slidesMargin":30,"slidesToShow":1,"slidesToScroll":1,"fade":true,"asNavFor":".slider-nav"}'>
                                            <img src="admin/uploads/<?php echo  $cg_data['hinhanh'] ?>" alt="" width="150" height="150">

                                        </ul>
                                        <!--<img style="margin-top: 5%; border: none;border-radius: none;" src="admin/uploads/4141709457821-.png" width="100" height="100" alt="">-->
                                    </div>
                                    <div class="product-attribute" style="margin-top: 0;">
                                        <div class="price" style="margin-top:0px">
                                            <ins><span class="price-amount"><span class="currencySymbol"></span><?php echo $cg_data['tencaygiong'] ?></span></ins>
                                        </div>
                                        <!-- <div class="rating">
                                                    <p class="star-rating"><span class="width-80percent"></span></p>
                                                    <span class="review-count">(04 Reviews)</span>
                                                    <span class="qa-text">Q&A</span>
                                                    <b class="category">By: <?php // echo $tendm['tendanhmuc'] 
                                                                            ?></b>
                                                </div> -->
                                        <span class="sku">MÃ CÂY GIỐNG</span>
                                        <!-- <span class="stock" style="margin-left: 200px;">Stock: <?php //echo $pro_data['product_stock'] 
                                                                                                    ?> </span> -->
                                        <br>
                                        <span style="font-weight:bold;color: black;font-size:135%;"><?php echo $formatted_id_cg ?></span>
                                        <br>
                                        <span style="font-size:130%;">Xuất xứ: <?php echo $cg_data['xuatxu'] ?></span>
                                        <br>
                                        <span style="font-size:130%;">Giá sản phẩm: <?php echo $cg_data['gia'] ?></span>
                                        <!-- <div class="shipping-info">
                                                    <p class="shipping-day">3-Day Shipping</p>
                                                    <p class="for-today">Pree Pickup Today</p>
                                                </div> -->
                                    </div>
                                </div>

                                <!-- Tab info -->
                                <div style="margin-top: 5px;" class="product-tabs single-layout biolife-tab-contain">
                                    <div class="tab-head text-center">
                                        <ul class="tabs">
                                            <li class="tab-element active"><a href="#tab_1st" class="tab-link"><i class="fa fa-tags"></i>Thông tin</a></li>
                                            <li class="tab-element"><a href="#tab_2nd" class="tab-link center"><i class="fa fa-paperclip"></i>Chuỗi liên kết</a></li>
                                            <li class="tab-element"><a href="#tab_3rd" class="tab-link right"><i class="fa fa-check-square-o"></i>Kiểm định</a></li>
                                            <!-- <li class="tab-element"><a href="#tab_3rd" class="tab-link">Nhật ký</a></li> -->
                                            <!-- <li class="tab-element"><a href="#tab_4th" class="tab-link">Đánh giá khách hàng<sup>(3)</sup></a></li> -->
                                        </ul>
                                    </div>
                                    <div class="tab-content" style="border: none;background-color:transparent;padding: 0;">
                                        <div id="tab_1st" style="background-color: #fff;border: #e3e3e3 solid 1px;" class="tab-contain desc-tab  active">
                                            <?php
                                            if (!empty($cg_data['mota'])) {
                                                echo '<div class="desc-expand" style="margin-top:0;">
                                                    <span class="title">Mô tả</span>
                                                    ';

                                                // Chia chuỗi thành mảng các dòng
                                                $lines = explode("\n", $cg_data['mota']);

                                                // Duyệt qua từng dòng và tạo thẻ <li>
                                                foreach ($lines as $line) {
                                                    echo '<br><span>' . $line . '</span> ';
                                                }

                                                echo '
                                                </div>
                                                <hr>';
                                            }
                                            ?>
                                            <?php
                                            if (!empty($cg_data['lienhe'])) {
                                                echo '<div style="text-align: justify;" class="desc-expand">
                                                    <span class="title">Liên hệ</span>
                                                    ';

                                                // Chia chuỗi thành mảng các dòng
                                                $lines = explode("\n", $cg_data['lienhe']);

                                                // Duyệt qua từng dòng và tạo thẻ <li>
                                                foreach ($lines as $line) {
                                                    echo '<br><span>' . $line . '</span> ';
                                                }

                                                echo '
                                                </div>
                                                <hr>';
                                            }
                                            ?>
                                            <?php
                                            if (!empty($cg_data['ngaysanxuat'])) {
                                                echo '<div style="text-align: justify;" class="desc-expand">
                                                    <span class="title">Ngày sản xuất</span>
                                                    ';

                                                // Chia chuỗi thành mảng các dòng
                                                $lines = explode("\n", $cg_data['ngaysanxuat']);

                                                // Duyệt qua từng dòng và tạo thẻ <li>
                                                foreach ($lines as $line) {
                                                    echo '<br><span>' . $line . '</span> ';
                                                }

                                                echo '
                                                </div>
                                                <hr>';
                                            }
                                            ?>

                                            <?php
                                            if (!empty($cg_data['hansudung'])) {
                                                echo '<div class="desc-expand">
                                                        <span class="title">Hạn sử dụng</span>
                                                        
                                                            
                                                            <br><span>' . $cg_data['hansudung'] . '</span> 
                                                    </div>
                                                    <hr>';
                                            }
                                            ?>

                                            <?php
                                            if ($cg_data['xuatxu'] != null) {
                                                echo '<div class="desc-expand">
                                                        <span class="title">Xuất xứ</span>
                                                        
                                                            
                                                            <br><span>' . $cg_data['xuatxu'] . '</span> 
                                                    </div>
                                                    <hr>';
                                            }
                                            ?>
                                            <?php
                                            if ($cg_data['gia'] != null) {
                                                echo '<div class="desc-expand">
                                                        <span class="title">Giá</span>
                                                        
                                                            
                                                            <br><span>' . $cg_data['gia'] . '</span> 
                                                    </div>
                                                    <hr>';
                                            }
                                            ?>
                                            <?php
                                            if ($cg_data['hdsd'] != null) {
                                                echo '<div class="desc-expand">
                                                        <span class="title">Hướng dẫn sử dụng</span>
                                                        
                                                            
                                                            <br><span>' . $cg_data['hdsd'] . '</span> 
                                                    </div>
                                                    <hr>';
                                            }
                                            ?>

                                            <?php
                                            if ($cg_data['phuongphaptrong'] != null) {
                                                echo '<div class="desc-expand">
                                                        <span class="title">Phương pháp trồng</span>
                                                        <br><span>' . $cg_data['phuongphaptrong'] . '</span>
                                                    </div>';
                                            }
                                            ?>
                                        </div>

                                        <div id="tab_2nd" class="tab-contain">
                                            <div class="accodition-tab biolife-accodition">
                                                <div class="row" style="margin: 0 -10px;">
                                                    <?php if (!empty($cg_data['nhasanxuat'])) : ?>
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="serviceBox">
                                                                <div class="service-icon">
                                                                    <span><i class="fa fa-globe"></i></span>
                                                                </div>
                                                                <h3 class="title">Nhà sản xuất</h3>
                                                                <h5 class="title-sub">Tên nhà sản xuất</h5>
                                                                <p class="description">
                                                                    <?php
                                                                    foreach ($cg_datas as $cg_data) {
                                                                        $tenvsx = $obj->display_dnbyID($cg_data['nhasanxuat']);
                                                                        echo $tenvsx['tendoanhnghiep'];
                                                                    }
                                                                    ?>
                                                                </p>
                                                                <h5 class="title-sub">Địa chỉ</h5>
                                                                <p class="description"> <?php
                                                                                        foreach ($cg_datas as $cg_data) {
                                                                                            $nsx = $obj->display_dnbyID($cg_data['nhasanxuat']);
                                                                                            $result = $obj->XoaSo($nsx['diachi']);
                                                                                            if (!empty($nsx['ap'])) {
                                                                                                echo $nsx['ap'] . ', ' . $obj->formatChu($result);
                                                                                            } else {
                                                                                                echo $obj->formatChu($result);
                                                                                            }
                                                                                        }
                                                                                        ?></p>
                                                                <a class="btn btn-info" href="chitietdn.php?id=<?= $cg_data['nhasanxuat'] ?>">Xem chi tiết</a>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                    <?php if (!empty($cg_data['nhaphanphoi'])) : ?>
                                                        <div class="col-md-12 col-sm-12">
                                                            <div class="serviceBox nhaxuong">
                                                                <div class="service-icon">
                                                                    <span><i class="fa fa-industry"></i></span>
                                                                </div>
                                                                <h3 class="title">Nhà phân phối</h3>
                                                                <h5 class="title-sub">Tên nhà phân phối</h5>
                                                                <p class="description"><?php
                                                                                        foreach ($cg_datas as $cg_data) {
                                                                                            $tennpp = $obj->display_dnbyID($cg_data['nhaphanphoi']);
                                                                                            echo $tennpp['tendoanhnghiep'];
                                                                                        }
                                                                                        ?> </p>
                                                                <h5 class="title-sub">Địa chỉ</h5>
                                                                <p class="description"><?php
                                                                                        foreach ($cg_datas as $cg_data) {
                                                                                            $tennpp = $obj->display_dnbyID($cg_data['nhaphanphoi']);
                                                                                            $result = $obj->XoaSo($tennpp['diachi']);
                                                                                            if (!empty($tennpp['ap'])) {
                                                                                                echo $tennpp['ap'] . ', ' . $obj->formatChu($result);
                                                                                            } else {
                                                                                                echo $obj->formatChu($result);
                                                                                            }
                                                                                        }
                                                                                        ?></p>
                                                                <a class="btn btn-info" href="chitietdn.php?id=<?= $cg_data['nhaphanphoi'] ?>">Xem chi tiết</a>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="tab_3rd" class="tab-contain review-tab" style="background-color: #fff;border: #e3e3e3 1px;">
                                            <div class="accodition-tab biolife-accodition">
                                                <?php if (!empty($cg_data['giaychungnhan'])) : ?>
                                                    <div class="row" id="vsx" style="padding: 20px 0;">
                                                        <div class="col-md-3">
                                                            Giấy chứng nhận:
                                                        </div>
                                                        <div class="col-md-9">
                                                            <a href="#"><img src="admin/uploads/<?= $cg_data['giaychungnhan'] ?>" alt="<?= $pro_data['hinhkiemdinh'] ?>" style="height: 180px;" data-toggle="modal" data-target="#imageModal" class="zoom-img"></a>
                                                        </div>
                                                    </div>
                                            </div>
                                        <?php endif; ?>

                                        </div>


                                    </div>
                                </div>
                        </div>

                        <!-- related products -->
                        <div class="product-related-box single-layout">
                            <div class="biolife-title-box lg-margin-bottom-26px-im">
                                <span class="biolife-icon icon-organic"></span>
                                <span class="subtitle">"Trải nghiệm nông sản nguyên chất - Mỗi sản phẩm đều có câu chuyện của riêng nó."</span>
                                <!-- <h3 class="main-title">Sản phẩm tương tự</h3> -->
                            </div>
                            <!-- <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":0,"slidesToShow":5, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":20 }},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":10}}]}'>
                            

                                <?php while ($r_pro = mysqli_fetch_assoc($rel_pro)) {
                                    $tendm = $obj->display_cataByID($r_pro['danhmuc']);
                                    if ($r_pro['id_sp'] != $_GET['id']) {

                                ?>

                                    <li class="product-item">
                                        <div class="contain-product layout-default">
                                            <div class="product-thumb">
                                                <a href="single_product.php?status=singleproduct&&id=<?php echo $r_pro['pdt_id'] ?>" class="link-to-product">
                                                    <img src="admin/uploads/<?php echo $r_pro['hinhanh'] ?>" alt="dd" width="270" height="270" class="product-thumnail">
                                                </a>
                                            </div>
                                            <div class="info">
                                                <b class="categories"><?php echo $tendm['tendanhmuc'] ?></b>
                                                <h4 class="product-title"><a href="single_product.php?status=singleproduct&&id=<?php echo $r_pro['id_sp'] ?>" class="pr-name"> <?php echo $r_pro['tensanpham'] ?> </a></h4>
                                                
                                                <div class="slide-down-box">
                                                    <p class="message">All products are carefully selected to ensure food safety.</p>

                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                <?php }
                                } ?>
                            </ul> -->
                        </div>
                    </div>




                <?php } ?>
                </div>
            </div>
        </div>

    </div>



    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="" alt="" id="modalImage" class="img-responsive" style="height: 632px; margin: auto;">
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.zoom-img').on('click', function() {
                $('#modalImage').attr('src', $(this).attr('src'));
                $('#modalImage').removeClass('zoom-in zoom-out');
            });

            $('#modalImage').on('click', function() {
                if ($(this).hasClass('zoom-in')) {
                    $(this).removeClass('zoom-in');
                    $(this).addClass('zoom-out');
                    $(this).css('cursor', 'zoom-in');
                } else {
                    $(this).removeClass('zoom-out');
                    $(this).addClass('zoom-in');
                    $(this).css('cursor', 'zoom-out');
                }
            });
        });
    </script>
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