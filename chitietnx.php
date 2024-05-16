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
    $nxID = $_GET['id'];
    $nx_fetch = $obj->show_nx_by_id($nxID);
    $nx_datas = array();
    $nx_datas[] = $nx_fetch;
}

foreach ($nx_datas as $nx) {
    $id_nx= $nx['id_nx'];
    $danhmuc_nx = $nx['danhmuc_nx'];
    $nguoidaidien = $nx['nguoidaidien'];
    $doanhnghiep = $nx['doanhnghiep'];
    $vungsanxuat = $nx['vungsanxuat'];
    $tennhaxuong = $nx['tennhaxuong'];
    $manhaxuong = $nx['manhaxuong'];
    $hinhanh = $nx['hinhanh'];
    $dienthoai = $nx['dienthoai'];
    $email = $nx['email'];
    $diachi = $nx['diachi'];
    $dientichtongthe = $nx['dientichtongthe'];
    $giayphepkinhdoanh = $nx['giayphepkinhdoanh'];
    $giaychungnhan = $nx['giaychungnhan'];
    $giaykiemdinh = $nx['giaykiemdinh'];
    $thongtin = $nx['thongtin'];
}

$nguoidang_info = $obj->show_admin_user_by_id($nguoidaidien);
$nguoidang_fetch = mysqli_fetch_assoc($nguoidang_info);
$taikhoan = array();
$taikhoan[] = $nguoidang_fetch;

foreach ($taikhoan as $tk) {
    $hoten = $tk['hoten'];
    $avatar = $tk['hinhdaidien'];
    $nhaxuong = $tk['nhaxuong'];
}
$vsx_info = $obj->vsx_By_id($vungsanxuat);
$vsx_fetch = mysqli_fetch_assoc($vsx_info);
$vungsanxuat = array();
$vungsanxuat[] = $vsx_fetch;

foreach ($vungsanxuat as $vsx) {
    $tenvung = $vsx['tenvung'];
    $anhvsx = $vsx['hinhanh'];
}
$dmnx_info = $obj->show_dmnx_by_id($danhmuc_nx);
$dmnx_fetch = mysqli_fetch_assoc($dmnx_info);
$danhmucnx = array();
$danhmucnx[] = $dmnx_fetch;

foreach ($danhmucnx as $dmnx) {
    $loainhaxuong = $dmnx['loainhaxuong'];
}

$dn_fetch = $obj->show_dn_by_id($doanhnghiep);
$doanhnghiep = array();
$doanhnghiep[] = $dn_fetch;

foreach ($doanhnghiep as $dn) {
    $tendoanhnghiep = $dn['tendoanhnghiep'];
    $anhdoanhnghiep = $dn['hinhanh'];
}



?>

<?php
include_once("includes/head.php");
?>
<style>
    .slick-track{
        width: auto;
    }
    .map-container {
        position: relative;
        overflow: hidden;
        padding-top: 56.25%;
        /* 16:9 Aspect Ratio (56.25%) */
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
        display: none;
        /* Mặc định ẩn modal */
        position: fixed;
        /* Vị trí cố định */
        z-index: 1;
        /* Hiển thị trên các phần tử khác */
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        /* Cho phép cuộn nếu nội dung dài hơn kích thước màn hình */
        background-color: rgba(0, 0, 0, 0.9);
        /* Màu nền đen với độ trong suốt */
    }

    .modal-content {
        margin: auto;

        width: 300px;
        /* Thay đổi từ max-width thành width để căn giữa theo chiều ngang */
        max-height: 80%;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        /* Di chuyển modal về giữa màn hình */
    }

    .modal-content img {
        width: auto;
        /* Thay đổi từ max-width thành width để căn giữa theo chiều ngang */
        max-height: 80%;
        margin-bottom: 20px;
        /* Khoảng cách giữa hình ảnh và nút tải xuống */
    }

    .download-btn {
        position: absolute;
        bottom: 0px;
        /* Đặt vị trí nút dưới cùng */
        left: 50%;
        /* Canh giữa nút */
        transform: translateX(-50%);
        /* Canh giữa nút theo chiều ngang */
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
                <img src="admin/uploads/<?= $hinhanh ?>" alt="<?= $hinhanh ?>">
            </div>
            <div class="info-1">
                <h2><?= $tennhaxuong ?></h2>
                <span>Mã nhà xưởng: <strong><?= $manhaxuong ?></strong></span>
            </div>
            <div class="head-right">
                <div class="qrcode">
                    <a href="#"><img src="admin/uploads/QR.png" alt="aaaa"></a>
                </div>
            </div>
        </div>

        <div class="head-info">
            <?php
            if (!is_null($hinhanh)) { ?>
                <div class="content-vsx">
                    <div class="row" id="vsx" style="padding: 20px 0;">
                        <div class="col-md-3">
                            Hình ảnh:
                        </div>
                        <div class="col-md-9">
                            <img src="admin/uploads/<?= $hinhanh ?>" alt="<?= $hinhanh ?>">
                        </div>
                    </div>
                    <div class="row" id="vsx">
                        <div class="col-md-3">
                            Loại nhà xưởng:
                        </div>
                        <div class="col-md-9">
                            <p class="title"><?php echo $loainhaxuong ?></p>
                        </div>
                    </div>
                    <div class="row" id="vsx" style="padding: 20px 0;">
                        <div class="col-md-3">
                            Người đại diện:
                        </div>
                        <div class="col-md-9 ">
                            <div class="slick">
                                <div class="slick-item">
                                    <img src="admin/uploads/avatar/<?= $avatar ?>" alt="<?= $avatar ?>" >
                                </div>
                                <div class="slick-tilte">
                                    <span class="sli-tilte"><?php echo $hoten ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="vsx" style="padding: 20px 0;">
                        <div class="col-md-3">
                            Thuộc doanh nghiệp:
                        </div>
                        <div class="col-md-9" >
                        <div class="slick"  >
                                <div class="slick-item">
                                    <img src="admin/uploads/<?= $anhdoanhnghiep ?>" alt="<?= $anhdoanhnghiep ?>" >
                                </div>
                                <div class="slick-tilte">
                                    <span class="sli-tilte"><?php echo $tendoanhnghiep;?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row" id="vsx" style="padding: 20px 0;">
                        <div class="col-md-3">
                            Vùng sản xuất:
                        </div>
                        <div class="col-md-9">
                        <div class="slick" >
                                <div class="slick-item">
                                    <img src="admin/uploads/<?= $anhvsx ?>" alt="<?= $anhvsx ?>" >
                                </div>
                                <div class="slick-tilte">
                                    <span class="sli-tilte"><?php echo $tenvung;?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    <div class="row" id="vsx" >
                        <div class="col-md-3">
                            Email:
                        </div>
                        <div class="col-md-9">
                            <p class="title"><?php echo $email ?></p>
                        </div>
                    </div>
                    <div class="row" id="vsx">
                        <div class="col-md-3">
                            Số điện thoại:
                        </div>
                        <div class="col-md-9">
                            <p class="title"><?php echo $dienthoai ?></p>
                        </div>
                    </div>
                    <div class="row" id="vsx">
                        <div class="col-md-3">
                            Địa chỉ:
                        </div>
                        <div class="col-md-9">
                            <p class="title"><?php echo $diachi ?></p>
                        </div>
                    </div>
                    <div class="row" id="vsx">
                        <div class="col-md-3">
                            Diện tích tổng thể:
                        </div>
                        <div class="col-md-9">
                            <p class="title"><?php echo $dientichtongthe ?></p>
                        </div>
                    </div>

                    <div class="row" id="vsx" style="padding: 20px 0;">
                        <div class="col-md-3">
                            Giấy phép kinh doanh:
                        </div>
                        <div class="col-md-9">
                            <img src="admin/uploads/<?= $giayphepkinhdoanh ?>" alt="<?= $hinhanh ?>">
                        </div>
                    </div>
                    <div class="row" id="vsx" style="padding: 20px 0;">
                        <div class="col-md-3">
                            Giấy chứng nhận:
                        </div>
                        <div class="col-md-9">
                            <img src="admin/uploads/<?= $giaychungnhan ?>" alt="<?= $hinhanh ?>">
                        </div>
                    </div>
                    <div class="row" id="vsx" style="padding: 20px 0;">
                        <div class="col-md-3">
                            Giấy kiểm định:
                        </div>
                        <div class="col-md-9">
                            <img src="admin/uploads/<?= $giaykiemdinh ?>" alt="<?= $hinhanh ?>">
                        </div>
                    </div>
                    <div class="row" id="vsx">
                        <div class="col-md-3">
                            Thông tin:
                        </div>
                        <div class="col-md-9">
                            <p class="title"><?php echo $thongtin ?></p>
                        </div>
                    </div>
                    <div class="row" id="vsx" style="padding: 20px 0;">
                        <div class="col-md-3">
                            Danh sách thành viên:
                        </div>
                        <div class="col-md-9 slider-nguoidaidien" >
                            <?php 
                            $arry  = $obj->show_admin_user_by_nhaxuong($id_nx);
                             while($user = mysqli_fetch_assoc($arry)){ ?>
                            <div class="slick">
                                <div class="slick-item">
                                    <img src="admin/uploads/avatar/<?= $user['hinhdaidien'] ?>" alt="<?= $avatar ?>" >
                                </div>
                                <div class="slick-tilte">
                                    <span class="sli-tilte"><?php echo  $user['hoten'] ?></span>
                                </div>
                            </div>
                            <?php } ?>
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

<script>
    $(document).ready(function() {
        $('.slider-nguoidaidien').slick({
            arrows: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            focusOnSelect: true,
            infinite: false,

            responsive: [{
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    
                }
            }]
        });

    });
</script>