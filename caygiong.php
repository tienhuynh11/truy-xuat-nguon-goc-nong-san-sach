<?php

session_start();
include_once("admin/class/adminback.php");
$obj = new adminback();


if (isset($_GET['search'])) {
    $keyword = $_GET['keyword'];
    if (!empty($keyword)) {
        $cg_info = $obj->search_caygiong($keyword);



        $cg_datas = array();
        while ($cg_ftecth = mysqli_fetch_assoc($cg_info)) {
            $cg_datas[] = $cg_ftecth;
        }
        $search_item = count($cg_datas);
    } else {
        header('location:caygiong.php');
    }
} else {
    $cg_info = $obj->show_caygiong();

    $cg_datas = array();

    while ($cg_ftecth = mysqli_fetch_assoc($cg_info)) {
        $cg_datas[] = $cg_ftecth;
    }
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
        include_once("includes/header_bottom.php");
        ?>

    </header>

    <!-- Page Contain -->
    <div class="page-contain">

        <!-- Main content -->
        <div id="main-content" class="main-content">

            <!--Hero Section-->



            <!--Navigation section-->



            <!-- Product -->
            <div class="container">

                <div class="product-category grid-style">
                    <?php if (isset($search_item)) {
                        echo "{$search_item} cây giống được tìm thấy!";
                    } ?>
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
                                                <img style="border-radius: 10px; width: 270px; height: 270px; object-fit: contain;" src="admin/uploads/<?php echo $cg_data['hinhanh'] ?>" alt="dd" class="product-thumnail">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <?php
                                            $tencaygiong = $cg_data['tencaygiong']; // Lấy nội dung từ biến $pdt_data
                                            $max_length = 35; // Độ dài tối đa cho chuỗi

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

                    <!-- Pagination block -->

                    <!-- <div class="biolife-panigations-block">
                        <ul class="panigation-contain">
                            <li><span class="current-page">1</span></li>
                            <li><a href="#" class="link-page">2</a></li>
                            <li><a href="#" class="link-page">3</a></li>
                            <li><span class="sep">....</span></li>
                            <li><a href="#" class="link-page">20</a></li>
                            <li><a href="#" class="link-page next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                        </ul>
                    </div> -->

                </div>
            </div>
        </div>
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