<?php

session_start();
include_once("admin/class/adminback.php");
$obj = new adminback();
$users = $obj->show_admin_user();
if (isset($_SESSION['admin_id'])) {
    $nguoidang_id = $_SESSION['admin_id'];
} else {
    header("Location: dangnhap.php");
    exit();
}

$vungsanxuat=$obj->vsxShow();
 $dn = $obj->display_dn();
 while($dn_ftecth = mysqli_fetch_assoc($dn)){
    $doanhnghiep[]=$dn_ftecth;
}
$product_info = $obj->display_product();
if (isset($_POST['add_nk'])) {
    $nk_msg =  $obj->add_nhatky($_POST);
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
        --main-color: #A0C438;
    }

    .serviceBox {
        color: var(--main-color);
        background: var(--main-color);
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
        border: 12px solid var(--main-color);
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
        --main-color: #FA68A0;
    }

    .serviceBox.blue {
        --main-color: #01748E;
    }

    .serviceBox.green {
        --main-color: #06BD7F;
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
    // include_once("includes/preloader.php");
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
            <!-- Navigation section -->
            <div class="container container-x">
                <div>
                    <form action="nhatky.php" method="post" enctype="multipart/form-data" class="form">
                        <h2>Thêm Nhật ký</h2>
                        <div class="form-group col-md-6">
                            <label for="sanpham">Sản phẩm liên quan</label>
                            <select name="sanpham" id="sp" class="form-control">
                                <?php while ($pro = mysqli_fetch_assoc($product_info)) { ?>
                                    <option value="<?php echo $pro['id_sp']; ?>"><?php echo $pro['tensanpham'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                       

                        <div class="form-group col-md-6">
                            <label for="tennhatky">Tên nhật ký</label>
                            <input type="text" name="tennhatky" class="form-control">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="vungsanxuat">Vùng sản xuất</label>
                            <select name="vungsanxuat" id="vungsanxuat" class="form-control">
                                <option value="">Chọn vùng sản xuất</option>
                                <?php while($vsx = mysqli_fetch_assoc($vungsanxuat)) { ?>
                                    <option value="<?php echo $vsx['id_vung']; ?>"><?php echo $vsx['tenvung']; ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="doanhnghiep">Doanh nghiệp</label>
                            <select name="doanhnghiep" id="doanhnghiep" class="form-control">
                                <option value="">Chọn nhà sản xuất</option>
                                <?php foreach($doanhnghiep as $dn) { ?>
                                    <option value="<?php echo $dn['id_dn']; ?>"><?php echo $dn['tendoanhnghiep']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                            <!-- Thêm mục thành viên liên quan -->
                            <div class="form-group col-md-12">
                            <label for="thanhvien">Thành viên liên quan</label>
                            <select name="thanhvien[]" id="thanhvien" class="form-control" multiple>
                                <?php foreach ($users as $user) { ?>
                                    <option value="<?php echo $user['id_acc']; ?>"><?php echo $user['hoten']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="nk_img">Hình ảnh</label>
                            <input type="file" name="nk_img" class="form-control">
                        </div>

                        <div class="form-group col-md-12">
                            <label for="chitiet">Chi tiết</label>
                            <textarea name="chitiet" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>

                        <div class="form-group col-md-12">
                            <input type="submit" name="add_nk" class="btn btn-primary" value="Thêm">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Include footer -->
        <?php include_once("includes/footer.php"); ?>
        <!-- Include footer for mobile -->
        <?php include_once("includes/mobile_footer.php"); ?>
        <?php include_once("includes/mobile_global.php"); ?>

        <!-- Scroll Top Button -->
        <a class="btn-scroll-top"><i class="biolife-icon icon-left-arrow"></i></a>

        <!-- Include script -->
        <?php include_once("includes/script.php"); ?>
        <!-- Include Select2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#sp").select2();
                $("#vungsanxuat").select2();
                $("#doanhnghiep").select2();
                $('#thanhvien').select2({
                placeholder: "Chọn thành viên liên quan",
                allowClear: true,
                width: '100%' // Đảm bảo phần tử select chiếm hết chiều rộng của cột
            });
            });
        </script>
    </div>
</body>

</html>