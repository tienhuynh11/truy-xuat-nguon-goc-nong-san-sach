<style>
body{
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
.col-xs-12 {
    width: 100%;
    padding: 20px;
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
@import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
</style>
<?php 
session_start();
include_once("admin/class/adminback.php");
$obj = new adminback();


if(isset($_GET['search'])){
    $keyword = $_GET['keyword'];
    if(!empty($keyword)){
        $bv = $obj->search_baiviet($keyword);
        $baiviet = array();
        while($bv_ftecth = mysqli_fetch_assoc($bv)){
            $baiviet[]=$bv_ftecth;
        }
        $search_item =count($baiviet);
    }else{
        header('location:bangtin.php');
    }
}else{
    $bv = $obj->show_baiviet();

    $baiviet = array();
        while($bv_ftecth = mysqli_fetch_assoc($bv)){
            $baiviet[]=$bv_ftecth;
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
        <div class="container profile container-x" style="border-radius: 5px;margin-top: 0;">
            <!-- <div class="head-info text-center" style="padding-bottom: 0px;padding: 20px 0;">
                <div class="row" style="width: 100%;">
                    <div class="col-md-6 col-xs-6">
                        <div class="c-product-detail__title-sm" style="font-size: 18px;font-weight: bold;line-height: 33.6px;">Bảng tin</div>
                    </div>
                    <div class="col-md-6 col-xs-6">
                        <a href="add_nhatky.php" class="">
                            <button class="btn ht-btn btn-info">Thêm nhật ký</button>
                        </a>
                    </div>
                </div>
            </div> -->
            <?php
                    foreach($baiviet as $bv){
                        $tk = $obj->show_taikhoanbyid($bv["nguoidang"]);
                    ?>
                <div class="row" style=" margin-bottom:5px;">
                    
                    <div class="col-md-12">
                        <div class="panel panel-default" style="border-radius: 25px;" >
                        <div class="single-product-log">
                    <div class="row">
                        <div class="col-xs-12 col-sm-2 log__user-avatar" style="display: flex;justify-content: center;align-items: center;margin-top:10px">
                            <img style="display: block;width: 80px;height: 80px;object-fit: cover;border-radius: 50%;" src="admin/uploads/avatar/<?= $tk['hinhdaidien']?>" alt="">
                        </div>
                        <div class="col-xs-12 col-sm-10 log__main-content" >
                            <div class="row">
                                <div class="col-xs-12 log__main-top">
                                    <div class="log__user-info">
                                        <h4 class="log__user-info__title">
                                            <a style="color: #009900;font-weight: bold; margin-left: 20px;" href="#"><?= $tk['hoten']?></a>
                                            - <?php
                                                if($tk['role']=='Admin'){
                                                    echo '<span class="title-role">Admin</span>';
                                                }elseif($tk['role']=='Nongdan'){
                                                    echo '<span class="title-role">Nông dân</span>';
                                                }elseif($tk['role']=='Chuyengia'){
                                                    echo '<span class="title-role">Chuyên gia</span>';
                                                }elseif($tk['role']=='Nguoikiemdinh'){
                                                    echo '<span class="title-role">Người kiểm định</span>';
                                                }elseif($tk['role']=='Chuyenvien'){
                                                    echo '<span class="title-role">Chuyên viên</span>';
                                                }elseif($tk['role']=='Kythuatvien'){
                                                    echo '<span class="title-role">Kỹ thuật viên</span>';
                                                }elseif($tk['role']=='Nguoidanhgia'){
                                                    echo '<span class="title-role">Người đánh giá</span>';
                                                }
                                                   
                                                
                                            ?>
                                        </h4>
                                    </div>
                                    <div class="log__meta-info">
                                        <span class="log__user-info__meta" style="margin-left: 20px;"><?= $bv['ngaydang'] ?></span>
                                    </div>
                                </div>
                                <div class="col-xs-12 log__data">
                                    <div class="single-data">
                                        <div class="single-data__label" style="margin-left: 20px;">Công việc: <?= $bv['tieude']?></div>
                                        <div class="single-data__data">
                                            <a href="baiviet.php?id=<?= $bv['id_bv']?>" style="margin-left: 20px; ">
                                                <span style="color: #FF9933;display: inline-block;max-width: 100%;overflow: hidden;text-overflow: ellipsis;white-space: nowrap; padding-right: 30px;" class="data-view-title"><?= $bv['noidung']?></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 log__data" style="padding-bottom: 10px;">
                                    <div class="profile-img-list">
                                        <div class="profile-img-list-item main" style="border-radius: 25px; overflow: hidden;">
                                            <a href="baiviet.php?id=<?php echo $bv['id_bv'] ?>" data-lity="" class="profile-img-list-link">
                                                <span class="profile-img-content" style="background-image: url(admin/uploads/baiviet/<?php echo $bv['hinhanh'] ?>); margin-left: 20px;"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                        </div>
                    </div>
                    
                </div><?php
                    }
                    ?>
            </div>
            <div id="main-content" class="main-content">

          

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

