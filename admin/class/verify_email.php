<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include("adminback.php");
include("./admin/assets/PHPMailer-master/src/PHPMailer.php");
include("./admin/assets/PHPMailer-master/src/SMTP.php");
include("./admin/assets/PHPMailer-master/src/Exception.php");
class Verify_email extends adminback
{
    function user_register($data)
    {

        $username = $data['hoten'];
        $user_email = $data['email'];
        $user_password = md5($data['pass']);
        $user_password2 = md5($data['pass2']);
        $user_mobile = $data['sdt'];
        $province = $data['province'];
        $district = $data['district'];
        ucwords($district);
        $wards = $data['wards'];
        ucwords($wards);
        $ap = $data['diachi'];
        $user_roles = $data['user_role'];
        $img_name = $_FILES['avatar']['name'];
        $img_tmp = $_FILES['avatar']['tmp_name'];
        $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);


        $user_check = "SELECT * FROM `taikhoan` WHERE email ='$user_email'";

        $mysqli_result = mysqli_query($this->connection, $user_check);

        $row = mysqli_num_rows($mysqli_result);

        if (empty($img_name)) {
            if (empty($username) || empty($user_email) || empty($user_password) || empty($user_password2)) {
                $msg = 3;
                return $msg;
            } else {
                if ($user_password !== $user_password2) {
                    $msg = 4;
                    return $msg;
                } else {
                    if ($row == 1) {
                        $msg = 2;
                        return $msg;
                    } else {
                        $full_address = $wards . ', ' . $district . ', ' . $province;
                        $mail = new PHPMailer(true);
                        try {
                            $random = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                            $token = substr(str_shuffle($random), 0, 30);
                            $query = "INSERT INTO `taikhoan`( `hoten`, `email`, `matkhau`, `dienthoai`,`ap`, `diachi`,`token`,`role`) VALUES ('$username','$user_email','$user_password','$user_mobile','$ap','$full_address','$token','$user_roles')";
                            mysqli_query($this->connection, $query);
                            $mail->SMTPOptions = array(
                                'ssl' => array(
                                    'verify_peer' => false,
                                    'verify_peer_name' => false,
                                    'allow_self_signed' => true
                                )
                            );
                            //Server settings
                            $mail->SMTPDebug = 0;                      // Enable verbose debug output
                            $mail->isSMTP();                                            // Send using SMTP
                            $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through
                            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                            $mail->Username   = 'nongsanquenha20@gmail.com';                     // SMTP username
                            $mail->Password   = 'xkku fkst ivpb fjva';                               // SMTP password
                            $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                            $mail->Port       = 587;                                    // TCP port to connect to
                            $mail->CharSet = 'UTF-8';
                            //Recipients
                            $mail->setFrom('nongsanquenha20@gmail.com', 'Nông sản quê nhà');
                            $mail->addAddress($user_email, $username);     // Add a recipient

                            // Content
                            $mail->isHTML(true);                                  // Set email format to HTML
                            $mail->Subject = '<nongsanquenha> BẠN CÓ MÃ XÁC NHẬN EMAIL';
                            $mail->Body = '
                                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                <html xmlns="http://www.w3.org/1999/xhtml">
                                <head>
                                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                                <title>Vui lòng xác nhận địa chỉ email của bạn</title>
                                <style type="text/css" rel="stylesheet" media="all">
                                    /* Base ------------------------------ */
                                    *:not(br):not(tr):not(html) {
                                    font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
                                    -webkit-box-sizing: border-box;
                                    box-sizing: border-box;
                                    }
                                    body {
                                    width: 100% !important;
                                    height: 100%;
                                    margin: 0;
                                    line-height: 1.4;
                                    background-color: #F5F7F9;
                                    color: #839197;
                                    -webkit-text-size-adjust: none;
                                    }
                                    a {
                                    color: #414EF9;
                                    }

                                    /* Layout ------------------------------ */
                                    .email-wrapper {
                                    width: 100%;
                                    margin: 0;
                                    padding: 0;
                                    background-color: #F5F7F9;
                                    }
                                    .email-content {
                                    width: 100%;
                                    margin: 0;
                                    padding: 0;
                                    }

                                    /* Masthead ----------------------- */
                                    .email-masthead {
                                    padding: 25px 0;
                                    text-align: center;
                                    }
                                    .email-masthead_logo {
                                    max-width: 400px;
                                    border: 0;
                                    }
                                    .email-masthead_name {
                                    font-size: 16px;
                                    font-weight: bold;
                                    color: #839197;
                                    text-decoration: none;
                                    text-shadow: 0 1px 0 white;
                                    }

                                    /* Body ------------------------------ */
                                    .email-body {
                                    width: 100%;
                                    margin: 0;
                                    padding: 0;
                                    border-top: 1px solid #E7EAEC;
                                    border-bottom: 1px solid #E7EAEC;
                                    background-color: #FFFFFF;
                                    }
                                    .email-body_inner {
                                    width: 570px;
                                    margin: 0 auto;
                                    padding: 0;
                                    }
                                    .email-footer {
                                    width: 570px;
                                    margin: 0 auto;
                                    padding: 0;
                                    text-align: center;
                                    }
                                    .email-footer p {
                                    color: #839197;
                                    }
                                    .body-action {
                                    width: 100%;
                                    margin: 30px auto;
                                    padding: 0;
                                    text-align: center;
                                    }
                                    .body-sub {
                                    margin-top: 25px;
                                    padding-top: 25px;
                                    border-top: 1px solid #E7EAEC;
                                    }
                                    .content-cell {
                                    padding: 35px;
                                    }
                                    .align-right {
                                    text-align: right;
                                    }

                                    /* Type ------------------------------ */
                                    h1 {
                                    margin-top: 0;
                                    color: #292E31;
                                    font-size: 19px;
                                    font-weight: bold;
                                    text-align: left;
                                    }
                                    h2 {
                                    margin-top: 0;
                                    color: #292E31;
                                    font-size: 16px;
                                    font-weight: bold;
                                    text-align: left;
                                    }
                                    h3 {
                                    margin-top: 0;
                                    color: #292E31;
                                    font-size: 14px;
                                    font-weight: bold;
                                    text-align: left;
                                    }
                                    p {
                                    margin-top: 0;
                                    color: #839197;
                                    font-size: 16px;
                                    line-height: 1.5em;
                                    text-align: left;
                                    }
                                    p.sub {
                                    font-size: 12px;
                                    }
                                    p.center {
                                    text-align: center;
                                    }

                                    /* Buttons ------------------------------ */
                                    .button {
                                    display: inline-block;
                                    width: 200px;
                                    background-color: #414EF9;
                                    border-radius: 3px;
                                    color: #ffffff;
                                    font-size: 15px;
                                    line-height: 45px;
                                    text-align: center;
                                    text-decoration: none;
                                    -webkit-text-size-adjust: none;
                                    mso-hide: all;
                                    }
                                    .button--green {
                                    background-color: #28DB67;
                                    }
                                    .button--red {
                                    background-color: #FF3665;
                                    }
                                    .button--blue {
                                    background-color: #414EF9;
                                    }

                                    /*Media Queries ------------------------------ */
                                    @media only screen and (max-width: 600px) {
                                    .email-body_inner,
                                    .email-footer {
                                        width: 100% !important;
                                    }
                                    }
                                    @media only screen and (max-width: 500px) {
                                    .button {
                                        width: 100% !important;
                                    }
                                    }
                                </style>
                                </head>
                                <body>
                                <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0">
                                    <tr>
                                    <td align="center">
                                        <table class="email-content" width="100%" cellpadding="0" cellspacing="0">
                                        <!-- Logo -->
                                        <tr>
                                            <td class="email-masthead">
                                            <a class="email-masthead_name">NÔNG SẢN QUÊ NHÀ</a>
                                            </td>
                                        </tr>
                                        <!-- Email Body -->
                                        <tr>
                                            <td class="email-body" width="100%">
                                            <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0">
                                                <!-- Body content -->
                                                <tr>
                                                <td class="content-cell">
                                                    <h1>Xác nhận địa chỉ email</h1>
                                                    <p>Vui lòng nhấn vào liên kết dưới đây để xác nhận tài khoản của bạn:</p>
                                                    <!-- Action -->
                                                    <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td align="center">
                                                        <div>
                                                            <!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://localhost/nongsan/xacnhan_email.php?email='.$user_email.'&token='.$token.'" style="height:45px;v-text-anchor:middle;width:200px;" arcsize="7%" stroke="f" fill="t">
                                                            <v:fill type="tile" color="#414EF9" />
                                                            <w:anchorlock/>
                                                            <center style="color:#ffffff;font-family:sans-serif;font-size:15px;">Verify Email</center>
                                                        </v:roundrect><![endif]-->
                                                            <a href="http://localhost/nongsan/xacnhan_email.php?email='.$user_email.'&token='.$token.'" style="font-weight:bold;color:white;" class="button button--blue">Xác nhận Email</a>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                    </table>
                                                    <p>Cảm ơn,<br>Đội ngũ NÔNG SẢN QUÊ NHÀ</p>
                                                </td>
                                                </tr>
                                            </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0">
                                                <tr>
                                                <td class="content-cell">
                                                    <p class="sub center">
                                                    IUH
                                                    <br>12 Nguyễn Văn Bảo, Phường 4, Quận Gò Vấp, Thành phố Hồ Chí Minh
                                                    </p>
                                                </td>
                                                </tr>
                                            </table>
                                            </td>
                                        </tr>
                                        </table>
                                    </td>
                                    </tr>
                                </table>
                                </body>
                                </html>
                                ';

                            $mail->send();
                            $msg = 1;
                            return $msg;
                        } catch (Exception $e) {
                            echo "Đã xảy ra lỗi! Vui lòng thử lại";
                        }

                        // if (mysqli_query($this->connection, $query)) {
                        //     $msg = "Đăng ký thành công!!";
                        //     return $msg;
                        // }
                    }
                }
            }
        } else {
            if ($img_ext == "jpg" ||  $img_ext == 'jpeg' || $img_ext == "png") {
                if (empty($username) || empty($user_email) || empty($user_password) || empty($user_password2)) {
                    $msg = 3;
                    return $msg;
                } else {
                    if ($user_password !== $user_password2) {
                        $msg = 4;
                        return $msg;
                    } else {
                        if ($row == 1) {
                            $msg = 2;
                            return $msg;
                        } else {
                            $full_address = $wards . ', ' . $district . ', ' . $province;
                            $mail = new PHPMailer(true);
                            try {
                                $random = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                $token = substr(str_shuffle($random), 0, 30);
                                $query = "INSERT INTO `taikhoan`( `hoten`, `email`, `matkhau`, `dienthoai`,`ap`, `diachi`,`hinhdaidien`,`token`,`role`) VALUES ('$username','$user_email','$user_password','$user_mobile','$ap','$full_address','$img_name','$token','$user_roles')";
                                mysqli_query($this->connection, $query);
                                move_uploaded_file($img_tmp, "admin/uploads/avatar/" . $img_name);
                                $mail->SMTPOptions = array(
                                    'ssl' => array(
                                        'verify_peer' => false,
                                        'verify_peer_name' => false,
                                        'allow_self_signed' => true
                                    )
                                );
                                //Server settings
                                $mail->SMTPDebug = 0;                      // Enable verbose debug output
                                $mail->isSMTP();                                            // Send using SMTP
                                $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through
                                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                                $mail->Username   = 'nongsanquenha20@gmail.com';                     // SMTP username
                                $mail->Password   = 'xkku fkst ivpb fjva';                               // SMTP password
                                $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
                                $mail->Port       = 587;                                    // TCP port to connect to
                                $mail->CharSet = 'UTF-8';
                                //Recipients
                                $mail->setFrom('nongsanquenha20@gmail.com', 'Nông sản quê nhà');
                                $mail->addAddress($user_email, $username);     // Add a recipient

                                // Content
                                $mail->isHTML(true);                                  // Set email format to HTML
                                $mail->Subject = '<nongsanquenha> BẠN CÓ MÃ XÁC NHẬN EMAIL';
                                
                                $mail->Body = '
                                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                <html xmlns="http://www.w3.org/1999/xhtml">
                                <head>
                                <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                                <title>Vui lòng xác nhận địa chỉ email của bạn</title>
                                <style type="text/css" rel="stylesheet" media="all">
                                    /* Base ------------------------------ */
                                    *:not(br):not(tr):not(html) {
                                    font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
                                    -webkit-box-sizing: border-box;
                                    box-sizing: border-box;
                                    }
                                    body {
                                    width: 100% !important;
                                    height: 100%;
                                    margin: 0;
                                    line-height: 1.4;
                                    background-color: #F5F7F9;
                                    color: #839197;
                                    -webkit-text-size-adjust: none;
                                    }
                                    a {
                                    color: #414EF9;
                                    }

                                    /* Layout ------------------------------ */
                                    .email-wrapper {
                                    width: 100%;
                                    margin: 0;
                                    padding: 0;
                                    background-color: #F5F7F9;
                                    }
                                    .email-content {
                                    width: 100%;
                                    margin: 0;
                                    padding: 0;
                                    }

                                    /* Masthead ----------------------- */
                                    .email-masthead {
                                    padding: 25px 0;
                                    text-align: center;
                                    }
                                    .email-masthead_logo {
                                    max-width: 400px;
                                    border: 0;
                                    }
                                    .email-masthead_name {
                                    font-size: 16px;
                                    font-weight: bold;
                                    color: #839197;
                                    text-decoration: none;
                                    text-shadow: 0 1px 0 white;
                                    }

                                    /* Body ------------------------------ */
                                    .email-body {
                                    width: 100%;
                                    margin: 0;
                                    padding: 0;
                                    border-top: 1px solid #E7EAEC;
                                    border-bottom: 1px solid #E7EAEC;
                                    background-color: #FFFFFF;
                                    }
                                    .email-body_inner {
                                    width: 570px;
                                    margin: 0 auto;
                                    padding: 0;
                                    }
                                    .email-footer {
                                    width: 570px;
                                    margin: 0 auto;
                                    padding: 0;
                                    text-align: center;
                                    }
                                    .email-footer p {
                                    color: #839197;
                                    }
                                    .body-action {
                                    width: 100%;
                                    margin: 30px auto;
                                    padding: 0;
                                    text-align: center;
                                    }
                                    .body-sub {
                                    margin-top: 25px;
                                    padding-top: 25px;
                                    border-top: 1px solid #E7EAEC;
                                    }
                                    .content-cell {
                                    padding: 35px;
                                    }
                                    .align-right {
                                    text-align: right;
                                    }

                                    /* Type ------------------------------ */
                                    h1 {
                                    margin-top: 0;
                                    color: #292E31;
                                    font-size: 19px;
                                    font-weight: bold;
                                    text-align: left;
                                    }
                                    h2 {
                                    margin-top: 0;
                                    color: #292E31;
                                    font-size: 16px;
                                    font-weight: bold;
                                    text-align: left;
                                    }
                                    h3 {
                                    margin-top: 0;
                                    color: #292E31;
                                    font-size: 14px;
                                    font-weight: bold;
                                    text-align: left;
                                    }
                                    p {
                                    margin-top: 0;
                                    color: #839197;
                                    font-size: 16px;
                                    line-height: 1.5em;
                                    text-align: left;
                                    }
                                    p.sub {
                                    font-size: 12px;
                                    }
                                    p.center {
                                    text-align: center;
                                    }

                                    /* Buttons ------------------------------ */
                                    .button {
                                    display: inline-block;
                                    width: 200px;
                                    background-color: #414EF9;
                                    border-radius: 3px;
                                    color: #ffffff;
                                    font-size: 15px;
                                    line-height: 45px;
                                    text-align: center;
                                    text-decoration: none;
                                    -webkit-text-size-adjust: none;
                                    mso-hide: all;
                                    }
                                    .button--green {
                                    background-color: #28DB67;
                                    }
                                    .button--red {
                                    background-color: #FF3665;
                                    }
                                    .button--blue {
                                    background-color: #414EF9;
                                    }

                                    /*Media Queries ------------------------------ */
                                    @media only screen and (max-width: 600px) {
                                    .email-body_inner,
                                    .email-footer {
                                        width: 100% !important;
                                    }
                                    }
                                    @media only screen and (max-width: 500px) {
                                    .button {
                                        width: 100% !important;
                                    }
                                    }
                                </style>
                                </head>
                                <body>
                                <table class="email-wrapper" width="100%" cellpadding="0" cellspacing="0">
                                    <tr>
                                    <td align="center">
                                        <table class="email-content" width="100%" cellpadding="0" cellspacing="0">
                                        <!-- Logo -->
                                        <tr>
                                            <td class="email-masthead">
                                            <a class="email-masthead_name">NÔNG SẢN QUÊ NHÀ</a>
                                            </td>
                                        </tr>
                                        <!-- Email Body -->
                                        <tr>
                                            <td class="email-body" width="100%">
                                            <table class="email-body_inner" align="center" width="570" cellpadding="0" cellspacing="0">
                                                <!-- Body content -->
                                                <tr>
                                                <td class="content-cell">
                                                    <h1>Xác nhận địa chỉ email</h1>
                                                    <p>Vui lòng nhấn vào liên kết dưới đây để xác nhận tài khoản của bạn:</p>
                                                    <!-- Action -->
                                                    <table class="body-action" align="center" width="100%" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td align="center">
                                                        <div>
                                                            <!--[if mso]><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://localhost/nongsan/xacnhan_email.php?email='.$user_email.'&token='.$token.'" style="height:45px;v-text-anchor:middle;width:200px;" arcsize="7%" stroke="f" fill="t">
                                                            <v:fill type="tile" color="#414EF9" />
                                                            <w:anchorlock/>
                                                            <center style="color:#ffffff;font-family:sans-serif;font-size:15px;">Verify Email</center>
                                                        </v:roundrect><![endif]-->
                                                            <a href="http://localhost/nongsan/xacnhan_email.php?email='.$user_email.'&token='.$token.'" style="font-weight:bold;color:white;" class="button button--blue">Xác nhận Email</a>
                                                        </div>
                                                        </td>
                                                    </tr>
                                                    </table>
                                                    <p>Cảm ơn,<br>Đội ngũ NÔNG SẢN QUÊ NHÀ</p>
                                                </td>
                                                </tr>
                                            </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                            <table class="email-footer" align="center" width="570" cellpadding="0" cellspacing="0">
                                                <tr>
                                                <td class="content-cell">
                                                    <p class="sub center">
                                                    IUH
                                                    <br>12 Nguyễn Văn Bảo, Phường 4, Quận Gò Vấp, Thành phố Hồ Chí Minh
                                                    </p>
                                                </td>
                                                </tr>
                                            </table>
                                            </td>
                                        </tr>
                                        </table>
                                    </td>
                                    </tr>
                                </table>
                                </body>
                                </html>
                                ';

                                $mail->send();
                                $msg = 1;
                                return $msg;
                            } catch (Exception $e) {
                                echo "Đã xảy ra lỗi! Vui lòng thử lại";
                            }

                            // if (mysqli_query($this->connection, $query)) {
                            //     $msg = "Đăng ký thành công!!";
                            //     return $msg;
                            // }
                        }
                    }
                }
            } else {
                $msg = 5; //"Hình ảnh phải có định dạng là jpg hoặc png";
                return $msg;
            }
        }
    }

    function checkEmailToken()
    {
        header('location: dangky.php');
        exit();
    }

    function confirmEmailToken($data)
    {
        $email = $data['email'];
        $token2 = $data['token'];
        $query = "SELECT * FROM taikhoan WHERE email = '$email' AND xacthuc=0 AND token = '$token2'";
        $results = mysqli_query($this->connection, $query);

        if (mysqli_fetch_assoc($results) > 0) {
            $query = "UPDATE taikhoan SET xacthuc=1, token = '' WHERE email = '$email'";
            mysqli_query($this->connection, $query);
            header('refresh:3; url=dangnhap.php');
        } else {
            $this->checkEmailToken();
        }
    }

    function emailSupport($data)
    {
    }
}
