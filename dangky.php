<?php
session_start();
include_once("admin/class/adminback.php");
$obj = new adminback();

if (isset($_POST['user_register_btn'])) {
    $reg_msg =  $obj->user_register($_POST);
}

if(isset($_SESSION['user_id'])){
    $userId = $_SESSION['user_id'];
    if($userId){
        header('location:hoso.php');
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

                            <form action="" method="post" enctype="multipart/form-data">

                                <p class="form-row" >
                                    <label for="user_role">Role</label>
                                    <select name="user_role" class="form-control">
                                        <option value="Nongdan">Nông dân</option>
                                        <option value="Nguoidanhgia">Người đánh giá</option>
                                        <option value="Chuyengia">Chuyên gia</option>
                                        <option value="Chuyenvien">Chuyên viên</option>
                                        <option value="Kythuatvien">Kỹ thuật viên</option>
                                        <option value="Nguoikiemdinh">Người kiểm định</option>
                                    </select>
                                </p>
						   
                              <p class="form-row">
                                    <label for="user_lastname">Họ tên<span class="requite">*</span></label>
                                    <input type="text" id="hoten" name="hoten" oninput="checkTenEmail(this)" class="txt-input form-control">
                                    <div id="errorText" style="color: red; display: none;"></div>
                                </p>
                                
                              <p class="form-row">
                                    <label for="user_firstname">Avatar</label>
                                    <input style="padding:0;" type="file" name="fileField" id="fileField">
                                </p>

                                <p class="form-row">
                                    <label for="user_email">Email <span class="requite">*</span> </label>
                                    <input type="email" id="email" name="email" class="form-control" oninput="checkTenEmail(this)">
                                    <div id="errorTextEmail" style="color: red; display: none;"></div>
                                </p>

                                <p class="form-row">
                                    <label for="user_password">Mật khẩu <span class="requite">*</span> </label>
                                    <input type="password" id="pass" name="pass" class="form-control" oninput="checkDangKy(this)">
                                    <div id="passwordRequirements">
                                        <span id="passwordLengthText" style="margin-right: 3px;">Mật khẩu cần ít nhất 8 ký tự</span><i id="passwordLengthIcon" class="fa fa-times"></i><br>
                                        <span id="passwordLetterText" style="margin-right: 3px;">Mật khẩu cần chứa ít nhất một chữ cái in hoa</span><i id="passwordLetterIcon" class="fa fa-times"></i><br>
                                        <span id="passwordNumberText" style="margin-right: 3px;">Mật khẩu cần chứa ít nhất một số</span><i id="passwordNumberIcon" class="fa fa-times"></i><br>
                                        <span id="passwordSpecialCharText" style="margin-right: 3px;">Mật khẩu cần chứa ít nhất một ký tự đặc biệt</span><i id="passwordSpecialCharIcon" class="fa fa-times"></i>
                                    </div>
                                </p>
                                
                                <p class="form-row">
                                    <label for="user_password">Nhập lại mật khẩu <span class="requite">*</span> </label>
                                    <input type="password" id="pass2" name="pass2" class="form-control" oninput="checkPasswordsMatch()">
                                    <div id="passwordMatchMessage" style="display: none; color: red;"></div>
                                </p>

                                <p class="form-row">
                                    <label for="user_mobile">Số điện thoại <span class="requite">*</span> </label>
                                    <input type="type" id="sdt" name="sdt"class="form-control" required>
                                </p>
                                <p class="form-row">
                                    <label for="user_address">Địa chỉ <span class="requite">*</span> </label>
                                    <textarea name="diachi" id="diachi" cols="10" class="form-control"></textarea>
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
<script>
function checkTenEmail(input){
    var hoten = document.getElementById("hoten");
    var errorText = document.getElementById("errorText");
    var errorTextEmail = document.getElementById("errorTextEmail");
    var email = document.getElementById("email");
    

    if(hoten.value != ""){
        var kytu = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;
        if(kytu.test(hoten.value)){
            errorText.innerHTML = "Họ tên không được chứa ký tự đặc biệt!";
            errorText.style.display = "block";
        }else{
            errorText.style.display = "none";
        }
    }else{
        errorText.innerHTML = "Vui lòng điền đầy đủ họ tên!!";
        errorText.style.display = "block";
    }
    if(email.value != ""){
        errorTextEmail.style.display = "none";
    }else{
        errorTextEmail.innerHTML = "Vui lòng điền địa chỉ email!";
        errorTextEmail.style.display = "block";
    }
}

function checkDangKy(input) {
    var password = input.value;
    var passwordLengthText = document.getElementById("passwordLengthText");
    var passwordLetterText = document.getElementById("passwordLetterText");
    var passwordNumberText = document.getElementById("passwordNumberText");
    var passwordSpecialCharText = document.getElementById("passwordSpecialCharText");
    var passwordLengthIcon = document.getElementById("passwordLengthIcon");
    var passwordLetterIcon = document.getElementById("passwordLetterIcon");
    var passwordNumberIcon = document.getElementById("passwordNumberIcon");
    var passwordSpecialCharIcon = document.getElementById("passwordSpecialCharIcon");

    if (password.length < 8) {
        
        passwordLengthIcon.className = "fa fa-times";
    } else {
        
        passwordLengthIcon.className = "fa fa-check";
    }

    if (!/[A-Z]/.test(password)) {
        
        passwordLetterIcon.className = "fa fa-times";
    } else {
        
        passwordLetterIcon.className = "fa fa-check";
    }

    if (!/\d/.test(password)) {
        
        passwordNumberIcon.className = "fa fa-times";
    } else {
        
        passwordNumberIcon.className = "fa fa-check";
    }

    if (!/[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/.test(password)) {
        
        passwordSpecialCharIcon.className = "fa fa-times";
    } else {
        
        passwordSpecialCharIcon.className = "fa fa-check";
    }
}

function checkPasswordsMatch() {
    var password = document.getElementById("pass").value;
    var confirmPassword = document.getElementById("pass2").value;
    var passwordMatchMessage = document.getElementById("passwordMatchMessage");

    if(confirmPassword != ""){
        if (password !== confirmPassword) {
        passwordMatchMessage.innerHTML = "Mật khẩu không trùng khớp!";
        passwordMatchMessage.style.color = 'red';
        passwordMatchMessage.style.display = "block"; // Hiển thị thông báo
        } else {
            passwordMatchMessage.innerHTML = "Mật khẩu trùng khớp!";
            passwordMatchMessage.style.color = '#66FF00';
            passwordMatchMessage.style.display = "block"; // Ẩn thông báo
        }
    }else{
        passwordMatchMessage.innerHTML = "Vui lòng nhập lại mật khẩu!!";
        passwordMatchMessage.style.color = 'red';
        passwordMatchMessage.style.display = "block"; // Hiển thị thông báo
    }
    
}
</script>
<style>
    .fa-times {
    color: red;
    }

    .fa-check {
        color: green;
    }
</style>