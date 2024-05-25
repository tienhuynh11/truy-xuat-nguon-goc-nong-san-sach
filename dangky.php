<?php
session_start();
include("admin/class/verify_email.php");
$obj = new Verify_email();

$cata_info = $obj->p_display_catagory();
$cataDatas = array();
while ($data = mysqli_fetch_assoc($cata_info)) {
    $cataDatas[] = $data;
}

if (isset($_POST['user_register_btn'])) {
    $reg_msg =  $obj->user_register($_POST);
}

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    if ($userId) {
        header('location:hoso.php');
    }
}

?>

<?php
include_once("includes/head.php");
?>

<body class="biolife-body">
    <!-- Preloader -->
    <?php if (!empty($reg_msg)) {
        if ($reg_msg == 1) {
    ?>
            <div class="alert success">
                <div class="process"></div>
                <ion-icon name="shield-checkmark-outline"></ion-icon>
                <span>Đăng ký thành công! Vui lòng xác nhận địa chỉ email!</span>
            </div>
        <?php } elseif ($reg_msg == 2) { ?>
            <div class="alert">
                <div class="process"></div>
                <ion-icon name="shield-checkmark-outline"></ion-icon>
                <span>Email đã tồn tại!</span>
            </div>
        <?php } elseif ($reg_msg == 3) { ?>
            <div class="alert">
                <div class="process"></div>
                <ion-icon name="shield-checkmark-outline"></ion-icon>
                <span>Vui lòng nhập đầy đủ thông tin!</span>
            </div>
        <?php } elseif ($reg_msg == 4) { ?>
            <div class="alert">
                <div class="process"></div>
                <ion-icon name="shield-checkmark-outline"></ion-icon>
                <span>Mật khẩu không trùng khớp!</span>
            </div>
        <?php } elseif ($reg_msg == 5) { ?>
            <div class="alert">
                <div class="process"></div>
                <ion-icon name="shield-checkmark-outline"></ion-icon>
                <span>Hình ảnh phải có định dạng là jpg hoặc png!</span>
            </div>
        <?php } ?>
    <?php } ?>

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

    </header>

    <!-- Page Contain -->
    <div class="page-contain">

        <!-- Main content -->
        <div id="main-content" class="main-content">


            <div class="container container-x">

                <h2 style="font-weight: bold;" class="text-center">Đăng ký</h2>
                <div class="row">


                    <!--Form Sign In-->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="signin-container">

                            <form action="" method="post" name="frm-register" enctype="multipart/form-data">

                                <p class="form-row">
                                    <label for="lbluser_role">Loại người dùng</label>
                                    <select name="user_role" class="form-control">
                                        <option value="Nongdan">Nông dân</option>
                                        <option value="Nguoidanhgia">Người đánh giá</option>
                                        <option value="Chuyengia">Chuyên gia</option>
                                        <option value="Chuyenvien">Chuyên viên</option>
                                        <option value="Kythuatvien">Kỹ thuật viên</option>
                                        <option value="Nguoikiemdinh">Người kiểm định</option>
                                        <option value="Nguoihotro">Người hỗ trợ</option>
                                        <option value="Chudoanhnghiep">Chủ doanh nghiệp</option>
                                        <option value="Thanhvien">Thành viên</option>
                                    </select>
                                </p>

                                <p class="form-row">
                                    <label for="user_lastname">Họ tên<span class="requite">*</span></label>
                                    <input type="text" id="hoten" name="hoten" oninput="checkInputs()" class="txt-input form-control">
                                <div id="errorText" style="color: red; display: none;"></div>
                                </p>

                                <p class="form-row">
                                    <label for="avatar">Avatar</label>
                                    <input style="padding:0;" type="file" name="avatar" id="avatar">
                                </p>

                                <p class="form-row">
                                    <label for="user_email">Email <span class="requite">*</span> </label>
                                    <input type="email" id="email" name="email" class="form-control" oninput="checkInputs()">
                                <div id="errorTextEmail" style="color: red; display: none;"></div>
                                </p>


                                <p class="form-row">
                                    <label for="user_password">Mật khẩu <span class="requite">*</span> </label>
                                    <input type="password" id="pass" name="pass" class="form-control" oninput="checkInputs()">
                                <div id="passwordRequirements">
                                    <span id="passwordLengthText" style="margin-right: 3px;">Mật khẩu cần ít nhất 8 ký tự</span><i id="passwordLengthIcon" class="fa fa-times"></i><br>
                                    <span id="passwordLetterText" style="margin-right: 3px;">Mật khẩu cần chứa ít nhất một chữ cái in hoa</span><i id="passwordLetterIcon" class="fa fa-times"></i><br>
                                    <span id="passwordNumberText" style="margin-right: 3px;">Mật khẩu cần chứa ít nhất một số</span><i id="passwordNumberIcon" class="fa fa-times"></i><br>
                                    <span id="passwordSpecialCharText" style="margin-right: 3px;">Mật khẩu cần chứa ít nhất một ký tự đặc biệt</span><i id="passwordSpecialCharIcon" class="fa fa-times"></i>
                                </div>
                                </p>

                                <p class="form-row">
                                    <label for="user_password">Nhập lại mật khẩu <span class="requite">*</span> </label>
                                    <input type="password" id="pass2" name="pass2" class="form-control" oninput="checkInputs()">
                                <div id="passwordMatchMessage" style="display: none; color: red;"></div>
                                </p>
                                <p class="form-row">
                                    <label for="user_mobile">Số điện thoại <span class="requite">*</span> </label>
                                    <input type="type" id="sdt" name="sdt" class="form-control">
                                </p>
                                <div class="row">
                                    <div class="col-md-4 form-row">
                                        <label for="lblprovince">Tỉnh/Thành phố</label>
                                        <select name="province" id="province" class="form-control" onchange="handleChange(this)">
                                            <option value="">Chọn tỉnh/thành phố</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 form-row">
                                        <label for="lbldistrict">Quận/Huyện</label>
                                        <select name="district" id="district" class="form-control" onchange="handleChangeDistrict(this)">
                                            <option value="">Chọn quận/huyện</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4 form-row">
                                        <label for="lblwards">Phường/Xã</label>
                                        <select name="wards" id="wards" class="form-control">
                                            <option value="">Chọn xã/phường</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-row">
                                    <label for="diachi">Địa chỉ</label>
                                    <input type="text" name="diachi" class="form-control">
                                </div>

                                <p class=" wrap-btn ">

                                    <input type="submit" value="Đăng ký" name="user_register_btn" class="btn btn-block btn-success" id="registerBtn" disabled>
                                </p>

                            </form>
                        </div>
                    </div>

                    <!--Go to Register form-->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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
    include_once("includes/script.php");
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


    $(document).ready(function() {
        $("#nguoidaidien").select2();
        $("#danhmuc_dn").select2();
        $("#province").select2();
        $("#district").select2();
        $("#wards").select2();
        $("#thanhvien").select2();
    });
</script>
<style>
    form {
        width: 70%;
        margin: 0 auto;
    }

    .register-in-container {
        padding-top: 20px;
        width: 70%;
        margin: 0 auto;
    }

    @media (max-width: 767px) {
        form {
            width: 100%;
        }

        .register-in-container {
            width: 100%;
        }
    }

    .fa-times {
        color: red;
    }

    .fa-check {
        color: green;
    }
</style>