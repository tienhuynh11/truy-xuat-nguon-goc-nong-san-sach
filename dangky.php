<?php
session_start();
include_once("admin/class/adminback.php");
$obj = new adminback();

$cata_info = $obj->p_display_catagory();
$cataDatas = array();
while ($data = mysqli_fetch_assoc($cata_info)) {
    $cataDatas[] = $data;
}

if (isset($_POST['user_register_btn'])) {
    $reg_msg =  $obj->user_register($_POST);
}

if(isset($_SESSION['user_id'])){
    $userId = $_SESSION['user_id'];
    if($userId){
        header('location:userprofile.php');
    }
}

?>

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

    </header>

    <!-- Page Contain -->
    <div class="page-contain">

        <!-- Main content -->
        <div id="main-content" class="main-content">


            <div  class="container">

                <h2 style="font-weight: bold;" class="text-center">Đăng ký</h2>

                <h4>
                    <?php if (isset($reg_msg)) {
                            echo $reg_msg;
                        } ?>
             </h4>


                <div class="row">
                    

                    <!--Form Sign In-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="signin-container">

                            <form action="" name="frm-register" method="POST">

                                <p class="form-row" >
                                    <label for="user_roles">Loại thành viên</label>
                                    <select name="user_roles" class="form-control" id="role">
                                        <option value="1">Nông dân</option>
                                        <option value="2">Người đánh giá</option>
                                        <option value="3">Chuyên gia</option>
                                        <option value="4">Chuyên viên</option>
                                        <option value="5">Kỹ thuật viên</option>
                                        <option value="6">Người kiểm định</option>
                                        <!-- Thêm các option khác nếu cần -->
                                    </select>
                                </p>
						   
                              <p class="form-row">
                                    <label for="user_lastname">Họ tên<span class="requite">*</span></label>
                                    <input type="text" name="user_lastname" class="txt-input form-control">
                                </p>
                                
                              <p class="form-row">
                                    <label for="user_firstname">Avatar</label>
                                    <input style="padding:0;" type="file" name="fileField" id="fileField">
                                </p>

                                <p class="form-row">
                                    <label for="user_email">Email <span class="requite">*</span> </label>
                                    <input type="email" name="user_email" class="form-control" required>
                                </p>

                                <p class="form-row">
                                    <label for="user_password">Mật khẩu <span class="requite">*</span> </label>
                                    <input type="password" id="fid-pass" name="user_password" class="form-control" required>
                                </p>
                                
                                <p class="form-row">
                                    <label for="user_password">Nhập lại mật khẩu <span class="requite">*</span> </label>
                                    <input type="password" id="fid-pass" name="user_password_again" class="form-control" required>
                                </p>

                                <p class="form-row">
                                    <label for="user_mobile">Số điện thoại <span class="requite">*</span> </label>
                                    <input type="tel" id="fid-pass" name="user_mobile"class="form-control" required>
                                </p>
                                <p class="form-row">
                                    <label for="user_address">Địa chỉ <span class="requite">*</span> </label>
                                    <textarea name="user_address" id="" cols="10" class="form-control"></textarea>
                                </p>

                              
                                <p class=" wrap-btn ">

                                    <input type="submit" value="Đăng ký" name="user_register_btn" class="btn btn-block btn-success">

                                </p>

                            </form>
                        </div>
                    </div>

                    <!--Go to Register form-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="register-in-container">
                            <div class="intro">
                                <h4 class="box-title">Bạn đã có tài khoản</h4>
                                <p class="sub-title">Hãy nhấn vào nút đăng nhập bên dưới!</p>
                                <!--<ul class="lis">
                                    <li>Check out faster</li>
                                    <li>Save multiple shipping anddesses</li>
                                    <li>Access your order history</li>
                                    <li>Track new orders</li>
                                    <li>Save items to your Wishlist</li>
                                </ul>
                                -->
                                <a href="dangnhap.php" class="btn btn-bold">Đăng nhập</a>
                            </div>
                        </div>
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