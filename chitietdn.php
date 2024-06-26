<?php

session_start();
include_once("admin/class/adminback.php");
$obj = new adminback();

if (isset($_GET['id'])) {
    $dnID = $_GET['id'];
    $dn_fetch = $obj->show_dn_by_id($dnID);
    $dn_datas = array();
    $dn_datas[] = $dn_fetch;
}
if (empty($dn_fetch)) {
    $obj->error404();
}

foreach ($dn_datas as $dn) {
    $id_dn = $dn['id_dn'];
    $danhmuc_dn = $dn['danhmuc_dn'];
    $nguoidaidien = $dn['nguoidaidien'];
    $tendoanhnghiep = $dn['tendoanhnghiep'];
    $maqr = $dn['maqr'];
    $sdt = $dn['sdt'];
    $email = $dn['email'];
    $diachi = $dn['diachi'];
    $masothue = $dn['masothue'];
    $thongtinchung = $dn['thongtinchung'];
    $nguoidang = $dn['nguoidang'];
    $hinhanh = $dn['hinhanh'];
    $giaychungnhan = $dn['giaychungnhan'];
    $giaykiemdinh = $dn['giaykiemdinh'];
    $giayphepkinhdoanh = $dn['giayphepkinhdoanh'];
    $thanhvien = $dn['thanhvien'];
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
$dmdn_info = $obj->show_dmdn_by_id($danhmuc_dn);
$dmdn_fetch = mysqli_fetch_assoc($dmdn_info);
$danhmucdn = array();
$danhmucdn[] = $dmdn_fetch;

foreach ($danhmucdn as $dmdn) {
    $loaidoanhnghiep = $dmdn['tendoanhnghiep'];
}




?>

<?php
include_once("includes/head.php");
?>
<style>
    .slick-track {
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
        display: block;
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
        height: 300px;
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
        top: -2px;
        right: 8px;
        color: black;
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
                <h2><?= $tendoanhnghiep ?></h2>
                <?php if (!empty($masothue)) : ?>
                    <span>Mã số thuế: <strong><?= $masothue ?></strong></span>
                <?php endif; ?>
            </div>
            <div class="head-right">
                <div class="qrcode">
                    <a href="#"><img src="admin/uploads/qrcode_doanhnghiep/<?= $maqr ?>" alt="<?= $maqr ?>"></a>
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
                            Loại doanh nghiệp:
                        </div>
                        <div class="col-md-9">
                            <p class="title"><?php echo $loaidoanhnghiep ?></p>
                        </div>
                    </div>
                    <?php if(!empty($avatar)) :?>
                    <div class="row" id="vsx" style="padding: 20px 0;">
                        <div class="col-md-3">
                            Người đại diện:
                        </div>
                        <div class="col-md-9 ">
                            <div class="slick">
                                <div class="box-item">
                                    <img src="admin/uploads/avatar/<?= $avatar ?>" alt="<?= $avatar ?>">
                                </div>
                                <div class="box-tilte">
                                    <span class="sli-tilte"><?php echo $hoten ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="row" id="vsx">
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
                            <p class="title"><?php echo $sdt ?></p>
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
                            <p class="title"><?php echo $thongtinchung ?></p>
                        </div>
                    </div>
                    <?php

                    if (!empty($thanhvien) && $thanhvien !== 'null') : ?>
                        <div class="row" id="vsx">
                            <div class="col-md-3">
                                Danh sách thành viên:
                            </div>
                            <div class="col-md-9">
                                <div id="related-members-slider" class="profile profile-img-list">
                                    <?php
                                    $relatedMembers = json_decode($thanhvien, true);
                                    foreach ($relatedMembers as $memberId) {
                                        $member = $obj->show_taikhoanbyid($memberId);
                                    ?>
                                        <div class="slick-item slick">
                                            <div class="member-container">
                                                <img src="admin/uploads/avatar/<?= $member['hinhdaidien']; ?>" alt="<?= $member['hoten']; ?>" class="profile-img" style="height: 70px;;">
                                                <div class="slick-title" style="text-align: center; height: 60px;  font-weight: bold;font-size: 14px;">
                                                    <?= $member['hoten']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>


        </div>
    <?php }
    ?>
    </div>
    </div>
    <!-- Tạo model -->
    <div id="qrcodeModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <img id="qrcodeImg">
            <div class="download-btn">
                <a id="downloadLink" download="<?= $maqr ?>.png"><button class="btn btn-info">Tải xuống</button></a>
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
        var slider = $('#related-members-slider');
        var totalItems = slider.find('.slick-item').length;

        slider.slick({
            infinite: false,
            slidesToShow: 4,
            slidesToScroll: 2,
            dots: false,
            arrows: false,
            responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 2
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 2
                    }
                }
            ]
        });

        if (totalItems < 4) {
            slider.slick('slickSetOption', {
                slidesToShow: totalItems,
                slidesToScroll: totalItems,
                infinite: false,
                dots: false,
                arrows: false
            }, true);
        }
    });
</script>