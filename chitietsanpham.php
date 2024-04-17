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
    $pdtId = $_GET['id'];   
	$pdt_info = $obj->display_product_byId($pdtId);
	$pdt_fetch = mysqli_fetch_assoc($pdt_info);
	$pro_datas = array();
	$pro_datas[] = $pdt_fetch;
}






// if(isset($_POST['post_comment'])){
//     $cmt_msg = $obj->post_comment($_POST);
// }


// $cmt_fetch = $obj->view_comment_id($_GET['id']);
// if(isset($cmt_fetch)){
//     $cmt_row = mysqli_num_rows($cmt_fetch);
// }

?>


<style>
    /* Kích thước chữ mặc định */
    .tab-link {
        font-size: 16px;
    }

    /* Kích thước chữ trên các thiết bị lớn hơn */
    @media only screen and (min-width: 768px) {
        .tab-link {
            font-size: 25px;
        }
    }
    .desc-expand{
        font-size: 18px;
    }
    .sumary-product {
        border: #e3e3e3 solid 1px;
        border-radius: 5px;
        background-color: #ffff;
        padding: 10px 10px;
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
    <header id="header" class="header-area style-01 layout-03">

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
                    <?php
                    foreach ($pro_datas as $pro_data) {
                        $tendm = $obj->display_cataByID($pro_data['danhmuc']);
                        // echo $pro_data['tensanpham'];
                    }
                    ?>
                <!-- </h1>

               
            </div>
 -->



            <!--Navigation section-->
            <div class="container">
                <nav class="biolife-nav">
                    <ul>
                        <li class="nav-item"><a href="index.php" class="permal-link">Trang chủ</a></li>

                        <li class="nav-item"><span class="current-page">

                                <?php
                                foreach ($pro_datas as $pro_data) {
                                    $tendm = $obj->display_cataByID($pro_data['danhmuc']);
                                    $rel_pro = $obj->related_product($pro_data['danhmuc']);
                                    echo $tendm['tendanhmuc'];
                                }
                                ?>
                            </span></li>

                        <li class="nav-item"><span class="current-page">

                                <?php
                                foreach ($pro_datas as $pro_data) {
                                    echo $pro_data['tensanpham'];
                                }
                                ?>
                            </span></li>
                    </ul>
                </nav>


            </div>

            <div class="container">
                <div class="page-contain single-product">
                    <div class="container">

                        <!-- Main content -->
                        <div id="main-content" class="main-content">

                            <?php
                            foreach ($pro_datas as $pro_data) {


                            ?>



                                
                                    <!-- summary info -->
                                    

                                    <div class="sumary-product single-layout" style="text-align:center;display: flex; flex-direction: column;">
                                            <div class="media">
                                                <ul class="biolife-carousel slider-for" data-slick='{"arrows":false,"dots":false,"slidesMargin":30,"slidesToShow":1,"slidesToScroll":1,"fade":true,"asNavFor":".slider-nav"}'>
                                                    <img src="admin/uploads/<?php echo $pro_data['hinhanh'] ?>" alt=""  width="150" height="150">

                                                </ul>
                                                <!--<img style="margin-top: 5%; border: none;border-radius: none;" src="admin/uploads/4141709457821-.png" width="100" height="100" alt="">-->
                                            </div>
                                            <div class="product-attribute" style="margin-top: 0;">
                                                <div class="price" style="margin-top:0px">
                                                    <ins><span  style="font-size:30px;" class="price-amount"><span  class="currencySymbol"></span><?php echo $pro_data['tensanpham'] ?></span></ins>
                                                </div>
                                                <!-- <div class="rating">
                                                    <p class="star-rating"><span class="width-80percent"></span></p>
                                                    <span class="review-count">(04 Reviews)</span>
                                                    <span class="qa-text">Q&A</span>
                                                    <b class="category">By: <?php // echo $tendm['tendanhmuc'] ?></b>
                                                </div> -->
                                                <span class="sku">MÃ SẢN PHẨM</span>
                                                <!-- <span class="stock" style="margin-left: 200px;">Stock: <?php //echo $pro_data['product_stock'] ?> </span> -->
                                                <br>
                                                <span style="font-weight:bold;color: black;font-size:145%;"><?php echo $pro_data['masanpham'] ?></span>
                                                <br>
                                                <span style="font-size:130%;" >Xuất xứ: <?php echo $pro_data['xuatxu'] ?></span>
                                                <br>
                                                <span style="font-size:130%;" >Giá sản phẩm: <?php echo $pro_data['gia'] ?></span>

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
                                    <li class="tab-element"><a href="#tab_3rd" class="tab-link center"><i class="fa fa-paperclip"></i>Chuỗi liên kết</a></li>
                                    <li class="tab-element"><a href="#tab_4th" class="tab-link right"><i class="fa fa-check-square-o"></i>Kiểm định</a></li>
                                    <!-- <li class="tab-element"><a href="#tab_3rd" class="tab-link">Nhật ký</a></li> -->
                                    <!-- <li class="tab-element"><a href="#tab_4th" class="tab-link">Đánh giá khách hàng<sup>(3)</sup></a></li> -->
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div id="tab_1st" class="tab-contain desc-tab">
                                    <?php 
                                        if($pro_data['mota'] != null){
                                            echo '<div class="desc-expand" style="margin-top:0;">
                                                    <span class="title">Mô tả</span>
                                                    ';
                                                    
                                            // Chia chuỗi thành mảng các dòng
                                            $lines = explode("\n", $pro_data['mota']);

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
                                        if($pro_data['congdung'] != null){
                                            echo '<div style="text-align: justify;" class="desc-expand">
                                                    <span class="title">Công dụng</span>
                                                    ';
                                                    
                                            // Chia chuỗi thành mảng các dòng
                                            $lines = explode("\n", $pro_data['congdung']);

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
                                        if($pro_data['hdsd'] != null){
                                            echo '<div class="desc-expand">
                                                        <span class="title">Hướng dẫn sử dụng</span>
                                                        
                                                            
                                                            <br><span>' . $pro_data['hdsd'] . '</span> 
                                                    </div>
                                                    <hr>';
                                        }
                                    ?>
                                    
                                    <?php 
                                        if($pro_data['dieukienbaoquan'] != null){
                                            echo '<div class="desc-expand">
                                                        <span class="title">Điều kiện bảo quản</span>
                                                        <br><span>' . $pro_data['dieukienbaoquan'] . '</span>
                                                    </div>'; 
                                        }
                                    ?>
                                </div>

                                <div id="tab_3rd" style="padding: 5px 0;" class="tab-contain shipping-delivery-tab active ">
                                    <div class="accodition-tab biolife-accodition">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <div class="col-md-1">
                                                    <i class="fa fa-info"></i>
                                                </div>
                                                <div class="col-md-11">
                                                    <p style="font-size: 30px;">Nhà xưởng</p> 
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-6 col-sm-6" >
                                                <a class="btn btn-danger" style="float:right;" href="">Xem chi tiết</a>
                                            </div>
                                        </div>

                                        <!-- <ul class="tabs">
                                            <li class="tab-item">
                                                <div class="content">
                                                    
                                                </div>
                                            </li>
                                            <li class="tab-item">
                                                <span class="title btn-expand">How is the shipping cost calculated?</span>
                                                <div class="content">
                                                    <p>You will pay a shipping rate based on the weight and size of the order. Large or heavy items may include an oversized handling fee. Total shipping fees are shown in your shopping cart. Please refer to the following shipping table:</p>
                                                    <p>Note: Shipping weight calculated in cart may differ from weights listed on product pages due to size and actual weight of the item.</p>
                                                </div>
                                            </li>
                                            <li class="tab-item">
                                                <span class="title btn-expand">Why Didn’t My Order Qualify for FREE shipping?</span>
                                                <div class="content">
                                                    <p>We do not deliver to P.O. boxes or military (APO, FPO, PSC) boxes. We deliver to all 50 states plus Puerto Rico. Certain items may be excluded for delivery to Puerto Rico. This will be indicated on the product page.</p>
                                                </div>
                                            </li>
                                            <li class="tab-item">
                                                <span class="title btn-expand">Shipping Restrictions?</span>
                                                <div class="content">
                                                    <p>We do not deliver to P.O. boxes or military (APO, FPO, PSC) boxes. We deliver to all 50 states plus Puerto Rico. Certain items may be excluded for delivery to Puerto Rico. This will be indicated on the product page.</p>
                                                </div>
                                            </li>
                                            <li class="tab-item">
                                                <span class="title btn-expand">Undeliverable Packages?</span>
                                                <div class="content">
                                                    <p>Occasionally packages are returned to us as undeliverable by the carrier. When the carrier returns an undeliverable package to us, we will cancel the order and refund the purchase price less the shipping charges. Here are a few reasons packages may be returned to us as undeliverable:</p>
                                                </div>
                                            </li>
                                        </ul> -->
                                    </div>
                                </div>
                                <div id="tab_4th" class="tab-contain review-tab">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                                <div class="rating-info">
                                                    <p class="index"><strong class="rating">4.4</strong>out of 5</p>
                                                    <div class="rating">
                                                        <p class="star-rating"><span class="width-80percent"></span></p>
                                                    </div>
                                                    <p class="see-all">See all <?php echo $cmt_row?> reviews</p>
                                                    <ul class="options">
                                                        <li>
                                                            <div class="detail-for">
                                                                <span class="option-name">5stars</span>
                                                                <span class="progres">
                                                                    <span class="line-100percent"><span class="percent width-90percent"></span></span>
                                                                </span>
                                                                <span class="number">90</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail-for">
                                                                <span class="option-name">4stars</span>
                                                                <span class="progres">
                                                                    <span class="line-100percent"><span class="percent width-30percent"></span></span>
                                                                </span>
                                                                <span class="number">30</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail-for">
                                                                <span class="option-name">3stars</span>
                                                                <span class="progres">
                                                                    <span class="line-100percent"><span class="percent width-40percent"></span></span>
                                                                </span>
                                                                <span class="number">40</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail-for">
                                                                <span class="option-name">2stars</span>
                                                                <span class="progres">
                                                                    <span class="line-100percent"><span class="percent width-20percent"></span></span>
                                                                </span>
                                                                <span class="number">20</span>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="detail-for">
                                                                <span class="option-name">1star</span>
                                                                <span class="progres">
                                                                    <span class="line-100percent"><span class="percent width-10percent"></span></span>
                                                                </span>
                                                                <span class="number">10</span>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>



                                            <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                                                <?php
                                                if (isset($_SESSION['user_id'])) {
                                                ?>

                                                    <div class="review-form-wrapper">
                                                        <span class="title">Submit your review</span>
                                                        <form action="#" name="frm-review" method="post">
                                                            <div class="comment-form-rating">

                                                            <?php 
                                                                if(isset($cmt_msg)){
                                                                    echo '<script>alert("Thanks for your valuable feedback")</script>';
                                                                }
                                                            ?>
                                                                <label>1. Your Comment about this products:</label>




                                                            </div>




                                                            <p class="form-row">
                                                                <input type="hidden" value="<?php echo $_SESSION['user_id'] ?>" name="user_id">
                                                                <input type="hidden" value="<?php echo  $_SESSION['username'] ?>" name="user_name">
                                                                <input type="hidden" value="<?php echo $_GET['id'] ?>" name="pdt_id">

                                                                <textarea name="comment" id="txt-comment" cols="30" rows="10" placeholder="Write your review here..." required></textarea>
                                                            </p>


                                                            <p class="">
                                                                <input type="submit" name="post_comment" value="Post Comment" class="btn btn-success">
                                                            </p>




                                                        </form>
                                                    </div>


                                                <?php } ?>
                                            </div>

                                           


                                        </div>
                                        <div id="comments">
                                            <ol class="commentlist">

                                            <?php 
                                            
                                               
                                        while($cmtinfo=mysqli_fetch_assoc($cmt_fetch)){
                                                  
                                            
                                            ?>
                                                <li class="review">
                                                    <div class="comment-container">
                                                        <div class="row">
                                                            <div class="comment-content col-lg-8 col-md-9 col-sm-8 col-xs-12">

                                                            <p class="comment-in"><span class="post-name"></span>
                                                            <span class="post-date"><?php echo $cmtinfo['comment_date'] ?></span></p>
                                                              
                                                                
                                                                <p class="author">by: <b><?php echo $cmtinfo['user_name'] ?></b></p>

                                                                <p class="comment-text"><?php echo $cmtinfo['comment'] ?>.</p>

                                                            </div>
                                                            <div class="comment-review-form col-lg-3 col-lg-offset-1 col-md-3 col-sm-4 col-xs-12">
                                                                <span class="title">Was this review helpful?</span>
                                                                <ul class="actions">
                                                                    <li><a href="#" class="btn-act like" data-type="like"><i class="fa fa-thumbs-up" aria-hidden="true"></i>Yes (100)</a></li>
                                                                    <li><a href="#" class="btn-act hate" data-type="dislike"><i class="fa fa-thumbs-down" aria-hidden="true"></i>No (20)</a></li>
                                                                    <li><a href="#" class="btn-act report" data-type="dislike"><i class="fa fa-flag" aria-hidden="true"></i>Report</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>

                                                <?php     
                                            }
                                            ?>
                                                
                                            </ol>
                                            <div class="biolife-panigations-block version-2">
                                                <ul class="panigation-contain">
                                                    <li><span class="current-page">1</span></li>
                                                    <li><a href="#" class="link-page">2</a></li>
                                                    <li><a href="#" class="link-page">3</a></li>
                                                    <li><span class="sep">....</span></li>
                                                    <li><a href="#" class="link-page">20</a></li>
                                                    <li><a href="#" class="link-page next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                                </ul>
                                                <div class="result-count">
                                                    <p class="txt-count"><b>1-5</b> of <b>126</b> reviews</p>
                                                    <a href="#" class="link-to">See all<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
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
                                    if($r_pro['id_sp'] != $_GET['id']){

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

