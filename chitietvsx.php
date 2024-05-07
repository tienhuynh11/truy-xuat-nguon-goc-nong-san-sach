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
    $vsxID = $_GET['id'];   
	$vsx_info = $obj->vsx_By_id($vsxID);
	$vsx_fetch = mysqli_fetch_assoc($vsx_info);
	$vsx_datas = array();
	$vsx_datas[] = $vsx_fetch;
}

foreach($vsx_datas as $vsx){
    $tenvung = $vsx['tenvung'];
    $mavung = $vsx['mavung'];
    $hinhanh = $vsx['hinhanh'];
    $nguoidang = $vsx['nguoidang'];
    $diachi = $vsx['diachi'];
    $bando = $vsx['bando'];
    $dientich = $vsx['dientich'];
    $thoigiannuoitrong = $vsx['thoigiannuoitrong'];
    $thongtin = $vsx['thongtin'];
}

    $nguoidang_info = $obj->show_admin_user_by_id($nguoidang);
	$nguoidang_fetch = mysqli_fetch_assoc($nguoidang_info);
	$taikhoan = array();
	$taikhoan[] = $nguoidang_fetch;

foreach($taikhoan as $tk){
    $hoten = $tk['hoten'];
    $email = $tk['email'];
    $dienthoai = $tk['dienthoai'];
}



// if(isset($_POST['post_comment'])){
//     $cmt_msg = $obj->post_comment($_POST);
// }


// $cmt_fetch = $obj->view_comment_id($_GET['id']);
// if(isset($cmt_fetch)){
//     $cmt_row = mysqli_num_rows($cmt_fetch);
// }

?>

<?php
include_once("includes/head.php");
?>
<style>
    .map-container {
    position: relative;
    overflow: hidden;
    padding-top: 56.25%; /* 16:9 Aspect Ratio (56.25%) */
    }

    .map-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 0;
    }
    /* CSS cho modal */
    .modal {
    display: none; /* Mặc định ẩn modal */
    position: fixed; /* Vị trí cố định */
    z-index: 1; /* Hiển thị trên các phần tử khác */
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto; /* Cho phép cuộn nếu nội dung dài hơn kích thước màn hình */
    background-color: rgba(0,0,0,0.9); /* Màu nền đen với độ trong suốt */
    }

    .modal-content {
    margin: auto;
    display: block;
    width: 300px; /* Thay đổi từ max-width thành width để căn giữa theo chiều ngang */
    max-height: 80%;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%); /* Di chuyển modal về giữa màn hình */
    }

    .modal-content img {
    width: auto; /* Thay đổi từ max-width thành width để căn giữa theo chiều ngang */
    max-height: 80%;
    margin-bottom: 20px; /* Khoảng cách giữa hình ảnh và nút tải xuống */
    }

    .download-btn {
    position: absolute;
    bottom: 0px; /* Đặt vị trí nút dưới cùng */
    left: 50%; /* Canh giữa nút */
    transform: translateX(-50%); /* Canh giữa nút theo chiều ngang */
    padding-bottom: 5px;
    }

    /* Đóng modal khi nhấn vào nút đóng hoặc nền đen */
    .modal .close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #fff;
    font-size: 30px;
    font-weight: bold;
    cursor: pointer;
    }
</style>
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


    <div class="container container-x">
        <div class="head-info">
            <div class="head-left">
                <img src="admin/uploads/<?= $hinhanh?>" alt="<?= $hinhanh?>">
            </div>
            <div class="info-1">
                    <h2><?= $tenvung?></h2>
                    <span>Mã vùng: <strong><?= $mavung?></strong></span>
                </div>
            <div class="head-right">
                <div class="qrcode">
                    <a href="#"><img src="admin/uploads/QR.png" alt="<?= $qrcode?>"></a>
                </div>
            </div>
        </div>

        <div class="head-info">
            <?php 
                if(!is_null($hinhanh)){?>
                    <div class="content-vsx">
                        <div class="row" id="vsx" style="padding: 20px 0;">
                            <div class="col-md-3">
                                Hình ảnh:
                            </div>
                            <div class="col-md-9">
                                <img src="admin/uploads/<?= $hinhanh?>" alt="<?= $hinhanh?>">
                            </div>
                        </div>
                        <div class="row" id="vsx">
                            <div class="col-md-3">
                                Người đại diện:
                            </div>
                            <div class="col-md-9">
                                <p class="title"><?php echo $hoten?></p>
                            </div>
                        </div>
                        <div class="row" id="vsx">
                            <div class="col-md-3">
                                Email:
                            </div>
                            <div class="col-md-9">
                                <p class="title"><?php echo $email?></p>
                            </div>
                        </div>
                        <div class="row" id="vsx">
                            <div class="col-md-3">
                                Số điện thoại:
                            </div>
                            <div class="col-md-9">
                                <p class="title"><?php echo $dienthoai?></p>
                            </div>
                        </div>
                        <div class="row" id="vsx">
                            <div class="col-md-3">
                                Địa chỉ:
                            </div>
                            <div class="col-md-9">
                                <p class="title"><?php echo $diachi?></p>
                            </div>
                        </div>
                        <div class="row" id="vsx">
                            <div class="col-md-3">
                                Bản đồ vùng sản xuất:
                            </div>
                            <div class="map-container">
                                <div><?= $bando?></div>
                            </div>
                        </div>
                        <div class="row" id="vsx">
                            <div class="col-md-3">
                                Diện tích:
                            </div>
                            <div class="col-md-9">
                                <p class="title"><?php echo $dientich?></p>
                            </div>
                        </div>
                        <div class="row" id="vsx">
                            <div class="col-md-3">
                                Thời gian nuôi trồng:
                            </div>
                            <div class="col-md-9">
                                <p class="title"><?php echo $thoigiannuoitrong?></p>
                            </div>
                        </div>
                        <div class="row" id="vsx">
                            <div class="col-md-3">
                                Thông tin:
                            </div>
                            <div class="col-md-9">
                                <p class="title"><?php echo $thongtin?></p>
                            </div>
                        </div>
                    </div>
                <?php }
            ?>
        </div>
    </div>
    <!-- Tạo model -->
    <div id="qrcodeModal" class="modal">
        <span class="close">&times;</span>
        <div class="modal-content">
            <img id="qrcodeImg">
            <div class="download-btn">
                <a id="downloadLink" download="QRCode.png"><button class="btn btn-info">Tải xuống</button></a>
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

