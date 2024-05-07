<?php

session_start();
include_once("admin/class/adminback.php");
$obj = new adminback();

if (isset($_POST['user_login_btn'])) {
    $logmsg = $obj->admin_login($_POST);
}


if (isset($_SESSION['admin_id'])) {
    $userId = $_SESSION['admin_id'];
    if ($userId) {
        header('location:admin/');
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

    <?php if (!empty($logmsg)) {
        if ($logmsg == 1) {
    ?>
            <div class="alert">
                <div class="process"></div>
                <ion-icon name="shield-checkmark-outline"></ion-icon>
                <span>Vui lòng xác nhận email trước khi tiến hành đăng nhập!!</span>
            </div>
        <?php } elseif ($logmsg == 2) { ?>
            <div class="alert">
                <div class="process"></div>
                <ion-icon name="shield-checkmark-outline"></ion-icon>
                <span>Nhập sai email hoặc mật khẩu!</span>
            </div>
        <?php } elseif ($logmsg == 3) { ?>
            <div class="alert">
                <div class="process"></div>
                <ion-icon name="shield-checkmark-outline"></ion-icon>
                <span>Tài khoản không tồn tại!</span>
            </div>
        <?php } ?>
    <?php } ?>

    <!-- HEADER -->
    <header id="" class="header-area style-01 layout-03">

        <?php
        include_once("includes/header_top.php");
        ?>

        <?php
        include_once("includes/header_middle.php");
        ?>

    </header>

    <!-- Page Contain -->
    <div class="page-contain">

        <!-- Main content -->
        <div id="main-content" class="main-content">


            <div class="container container-x">
                <h2 style="font-weight: bold;" class="text-center">Đăng nhập</h2>
                <div class="row">

                    <!--Form Sign In-->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="signin-container">
                            <form action="" name="frm-login" method="post">
                                <p class="form-row">
                                    <label for="email">Email</label>
                                    <input type="email" id="fid-name" name="email" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="user_password">Mật khẩu:</label>
                                    <input type="password" name="pass" class="txt-input">
                                </p>
                                <p class="wrap-btn">
                                    <input type="submit" value="Đăng nhập" name="user_login_btn" class="btn btn-success">
                                    <a href="user_password_recover.php" class="link-to-help">Quên mật khẩu?</a>
                                </p>
                            </form>
                        </div>
                    </div>

                    <!--Go to Register form-->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="register-in-container">
                            <div class="intro">
                                <h4 class="box-title">Tạo một tài khoản</h4>
                                <p style="line-height: normal;" class="sub-title">Chào mừng bạn đến với trang web truy xuất nguồn gốc nông sản sạch! Nếu chưa có tài khoản, hãy nhấn nút Đăng ký bên dưới!!</p>
                                <!-- <ul class="lis"> 
                                    <li>Check out faster</li>
                                    <li>Save multiple shipping anddesses</li>
                                    <li>Access your order history</li>
                                    <li>Track new orders</li>
                                    <li>Save items to your Wishlist</li>
                                </ul> -->
                                <a href="dangky.php" class="btn btn-bold">Đăng ký</a>
                            </div>
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
<script>
    var alertElement = document.querySelector('.alert');

    if (alertElement) {
        setTimeout(function() {
            alertElement.style.display = 'none';
        }, 5000);
    }
</script>