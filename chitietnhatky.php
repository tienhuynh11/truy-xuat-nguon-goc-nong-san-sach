<style>
body{
    margin-top:20px;
    background:#eee;
}
.profile .profile-img-list {
    list-style-type: none;
    margin: -0.1rem;
    padding: 0;
}

.profile .profile-img-list .profile-img-list-item.main {
    width: 50%;
}
.profile .profile-img-list:after, .profile .profile-img-list:before {
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

.profile .profile-img-list .profile-img-list-item .profile-img-list-link .profile-img-content, .profile .profile-img-list .profile-img-list-item .profile-img-list-link img {
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

.profile .profile-img-list .profile-img-list-item .profile-img-list-link .profile-img-content:before, .profile .profile-img-list .profile-img-list-item .profile-img-list-link img:before {
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

.profile .profile-img-list:after, .profile .profile-img-list:before {
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

.media img {
    max-width: 100%; /* Đảm bảo hình ảnh không vượt quá kích thước của phần tử cha */
    height: auto; /* Tự động điều chỉnh chiều cao để giữ tỷ lệ khung hình */
}
</style>
<?php 

session_start();
    include_once ("admin/class/adminback.php");
    $obj = new adminback();

    $cata_info = $obj-> p_display_catagory();
    $cataDatas = array();
    while($data = mysqli_fetch_assoc($cata_info)){
        $cataDatas[]=$data;
    }

    $nk = $obj->show_nhatky_by_id($_REQUEST['id']);

    $nhatky = array();   
        
while($pdt_ftecth = mysqli_fetch_assoc($nk)){
            $nhatky[] = $pdt_ftecth;
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
    <div class="page-contain container" style="padding: 0 0;">

        <!-- Main content -->
        <div id="main-content" style="padding: 1% 7%;" class="main-content">

                            <?php
                            foreach ($nhatky as $nk) {
                                $tk = $obj->show_taikhoanbyid($nk["nguoidang"]);
                                
                            ?>



                                
                                    <!-- summary info -->
                                     

                                    <div class="single-layout border" style="display: flex; flex-direction: column;border-radius: 10px;margin-top:10px;">
                                            <div class="product-attribute" style="padding: 15px 15px;">
                                            <div class="d-flex align-items-center mb-3" style="font-size: 16px;">
                                    <a href="#"><img src="admin/uploads/avatar/<?php echo $tk['hinhdaidien'] ?>" alt="" width="50" style="width: 50px;height: 50px;" class="rounded-circle" /></a>
                                    <div class="flex-fill ps-2" style="font-weight: bold;margin-left:10px;">
                                        <div class="fw-bold"><a href="#" class="text-decoration-none"><?= $tk['hoten'];?></a> - <i class="text-decoration-none">
                                            <?php 
                                            if($tk['role'] == 'Nongdan'){
                                                echo 'Nông dân';
                                            }elseif($tk['role'] == 'Admin'){
                                                echo 'Quản trị';
                                            }elseif($tk['role'] == 'Khachhang'){
                                                echo 'Người đánh giá';
                                            }
                                            ?>
                                        </i></div>
                                        <div class="small text-body text-opacity-50"><?= date('d-m-Y H:i', strtotime($nk["thoigiantao"])) ?></div>
                                    </div>
                                </div>
                                                
                                                <div class="price" style="margin-top:0px">
                                                    <span  style="font-weight: bold;font-size:35px;" class="price-amount"><span  class="currencySymbol"></span>Công việc: <?php echo $nk['tennhatky']; ?></span>
                                                </div>
                                                <span class="float-left" style="font-size: 15px;"><?= date('d-m-Y H:i', strtotime($nk["thoigiantao"])) ?></span>
                                                <!-- <span class="stock" style="margin-left: 200px;">Stock: <?php //echo $pro_data['product_stock'] ?> </span> -->
                                                <br>
                                                <div class="media" style="display: block;">
                                                    <ul class="biolife-carousel slider-for" data-slick='{"arrows":false,"dots":false,"slidesMargin":30,"slidesToShow":1,"slidesToScroll":1,"fade":true,"asNavFor":".slider-nav"}'>
                                                        <img src="admin/uploads/<?php echo $nk['hinhanh'] ?>" style="object-fit: contain;" alt="" width="100%" height="auto">

                                                    </ul>
                                                    <!--<img style="margin-top: 5%; border: none;border-radius: none;" src="admin/uploads/4141709457821-.png" width="100" height="100" alt="">-->
                                                </div>

                                                <br>
                                                <span style="font-size:200%;" >
                                                <?php 
                                                    if($nk['chitiet'] != null){
                                                                
                                                        // Chia chuỗi thành mảng các dòng
                                                        $lines = explode("\n", $nk['chitiet']);

                                                        // Duyệt qua từng dòng và tạo thẻ <li>
                                                        foreach ($lines as $line) {
                                                            echo '<span>' . $line . '</span> <br>';
                                                        }

                                                        echo '
                                                            </div>
                                                            <hr>';
                                                    }
                                                ?>

                                                <!-- <div class="shipping-info">
                                                    <p class="shipping-day">3-Day Shipping</p>
                                                    <p class="for-today">Pree Pickup Today</p>
                                                </div> -->
                                            </div>
                                        <?php }?>
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">