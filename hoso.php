<?php
 
session_start();
include_once("admin/class/adminback.php");
$obj = new adminback();

$cata_info = $obj->p_display_catagory();
$cataDatas = array();
while ($data = mysqli_fetch_assoc($cata_info)) {
    $cataDatas[] = $data;
}

// if (isset($_POST['user_login_btn'])) {
//     $logmsg = $obj->user_login($_POST);
// }

$userid = $_SESSION['user_id'];
$username = $_SESSION['username'];

if (empty($userid)) {
    header("location:dangnhap.php");
}

if (isset($_GET['logout'])) {
    if ($_GET['logout'] == "logout") {
        $obj->user_logout();
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
        include_once("includes/header_bottom.php");
        ?>

    </header>

    <!-- Page Contain -->
    <div class="page-contain">

        <!-- Main content -->
        <div id="main-content" class="main-content">




            <div class="container">


                <div class="row">
                    <div class="col-md-2">
                        <h4>Hello <?php
                                    if (isset($username)) {
                                        echo $username;
                                    }
                                    ?></h4>
                        <a href="?logout=logout">Đăng xuất</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
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