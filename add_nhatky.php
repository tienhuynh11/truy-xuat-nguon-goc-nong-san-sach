<?php

session_start();
include_once("admin/class/adminback.php");
$obj = new adminback();


$users = $obj->show_admin_user();
 $product_info = $obj->display_product();
    if(isset($_POST['add_nk'])){
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
    .desc-expand{
        font-size: 18px;
    }
    .sumary-product {
        border: #e3e3e3 solid 1px;
        border-radius: 5px;
        background-color: #ffff;
        padding: 10px 10px;
    }
    .accodition-tab .row .col-md-12{
        padding: 0;
    }
    .production-area-box {
    border: 1px solid #ccc;
    padding: 20px;
    margin-bottom: 20px;
    }

    :root{ --main-color: #A0C438; }
    .serviceBox{
        color: var(--main-color);
        background: var(--main-color);
        font-family: 'Raleway', sans-serif;
        text-align: center;
        border-radius: 0 0 20px 20px;
        padding: 20px 20px 25px;
        box-shadow: 5px 5px 10px rgba(0,0,0,0.3);
        overflow: hidden;
        position: relative;
        z-index: 1;
        margin-bottom: 10px;
    }
    .serviceBox:before,
    .serviceBox:after{
        content: "";
        width: calc( 100% - 25px);
        transform: translateX(-50%);
        position: absolute;
        left: 50%;
    }
    .serviceBox:before{
        background: #fff;
        height: calc( 100% - 15px);
        top: 15px;
        z-index: -1;
    }
    .serviceBox:after{
        border: 12px solid var(--main-color);
        height: 100px;
        border-radius: 0 0 100px 100px;
        top: 0;
    }
    .serviceBox .service-icon{
        font-size: 40px;
        margin: 0 0 35px;
        display: inline-block;
    }
    .serviceBox .title{
        font-size: 26px;
        font-weight: 700;
        margin: 0 0 5px;
        padding-top: 10px;
    }
    .serviceBox h5{
        font-size: 20px;
        margin: 0;
        margin-bottom: 2px;
    }
    .serviceBox .title-sub{
        text-align: left;
        font-weight: bold;
    }
    .serviceBox .description{
        text-align: left;
        color: #888;
        font-size: 13.2px;
        margin: 0;
        font-weight: bold;
        text-align: justify;
        line-height: -0.9px;
    }
    .serviceBox a{
        margin-top: 2px;
    }
    .product-tabs .tab-content .serviceBox p {
        line-height: normal;
    }
    .product-tabs.single-layout .tab-content{
        padding: 0;
    }
    .serviceBox.pink{ --main-color: #FA68A0; }
    .serviceBox.blue{ --main-color: #01748E; }
    .serviceBox.green{ --main-color: #06BD7F; }
    @media only screen and (max-width: 1199px){
    .serviceBox{
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

            <!--Navigation section-->
            <div class="container">
               
            
                <h2>Thêm Nhật ký</h2>
<div>
    <form action="" method="post" enctype="multipart/form-data" class="form">
    <div class="form-group">
        <label for="sanpham">Sản phẩm</label>
        <select name="sanpham" id="sp" class="form-control">
        <?php while($pro = mysqli_fetch_assoc($product_info)){ ?>
        <option value="<?php echo $pro['id_sp']; ?>"  ><?php echo $pro['tensanpham'] ?></option>

        <?php }?>
        </select>
    </div>
    <div class="form-group">
        <label for="nguoidang">Người đại diện</label>
        <select name="nguoidang" id="nguoidang" class="form-control">
            <?php foreach($users as $user): ?>
                <?php if ($user['id_acc']== $nguoidang_id) { ?>
                <option value="<?php echo $user['id_acc']?>" selected><?php echo $user['hoten']  .'-'. $user['dienthoai']?></option>
            <?php } else { ?>
                <option value="<?php echo $user['id_acc'] ?>"><?php echo $user['hoten']  .'-'.  $user['dienthoai'] ?></option>
            <?php } ?>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="tennhatky">Tên nhật ký</label> 
        <input type="text" name="tennhatky" class="form-control">
    </div>

    <div class="form-group">
        <label for="chitiet">Chi tiết</label>
       <textarea name="chitiet" id="" cols="30" rows="10" class="form-control" ></textarea>
    </div>

    <div class="form-group">
        <label for="nk_img">Hình ảnh</label>
        <input type="file" name="nk_img" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit" name="add_nk" class="btn btn-primary">
    </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        $("#sp").select2();
        $("#nguoidang").select2();
    });
</script>  
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



