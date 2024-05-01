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
</style>
<?php 

session_start();
    include_once ("admin/class/adminback.php");
    $obj = new adminback();
    if(isset($_GET['search'])){
        $keyword = $_GET['keyword'];
        if(!empty($keyword)){
            $search_query = $obj->search_product($keyword);
    
       
        
        $search_results = array();
        while($search = mysqli_fetch_assoc($search_query)){
            $search_results[]=$search;
        }
    
        }else{
            header('location:nhatky.php');
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

            
    </div>
                          
            <div class="container profile border" style="border-radius: 5px;margin-top: 10px; ">
            <?php $search_item =count($search_results);
                echo "{$search_item} nhật ký được tìm thấy"; ?>  
            <style>
                @import url('https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css');
                @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css');
            </style>
                <div class="row" style="margin-top:15px; margin-bottom:5px;">
                    <?php
                        foreach($search_results as $search_nk){
                            $tk = $obj->show_taikhoan($search_nk["nguoidang"]);
                    ?>
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-body">
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
                                        <div class="small text-body text-opacity-50"><?= date('d-m-Y H:i', strtotime($search_nk["thoigiantao"])) ?></div>
                                    </div>
                                </div>
            
                                <a href="chitietnhatky.php?id=<?php
                                echo $search_nk['id_nk']
                                // $search_nk_old = $search_nk['tieude'] ;
                                // $search_nk_change = str_replace(array(' ',' - '), '-', $search_nk_old);
                                //  echo $search_nk_change;
                                 
                                 ?>">
                                    <p style="margin-bottom: 5px;text-transform: uppercase;font-weight: bold;color: #000;font-size: 16px;max-height: 100px ;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">Công việc: <?= $search_nk['tennhatky'] ?></p>
                                </a>
                                <p style="margin-bottom: -2px;color: #000;font-size: 16px;max-height: 100px ;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;"><?= $search_nk['chitiet'] ?></p>
                                <a href="chitietnhatky.php?id=<?php
                                echo $search_nk['id_nk']
                                // $search_nk_old = $search_nk['tieude'] ;
                                // $search_nk_change = str_replace(array(' ',' - '), '-', $search_nk_old);
                                //  echo $search_nk_change;
                                 
                                 ?>">
                                    <p style="color: #FFA500;font-size: 16px;max-height: 100px ;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">Xem thêm..</p>
                                </a>
                                <div class="profile-img-list">
                                <div class="profile-img-list-item main">
                                    <a href="nhatky.php?id=<?php
                                echo $search_nk['id_nk']
                                // $search_nk_old = $search_nk['tieude'] ;
                                // $search_nk_change = str_replace(array(' ',' - '), '-', $search_nk_old);
                                //  echo $search_nk_change;
                                 
                                 ?>" data-lity="" class="profile-img-list-link">
                                        <span class="profile-img-content" style="background-image: url(admin/uploads/<?php echo $search_nk['hinhanh'] ?>);"></span>
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


