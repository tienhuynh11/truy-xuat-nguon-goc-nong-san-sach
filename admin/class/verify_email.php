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
        $user_address = $data['diachi'];
        $user_roles = $data['user_role'];


        $user_check = "SELECT * FROM `taikhoan` WHERE email ='$user_email'";

        $mysqli_result = mysqli_query($this->connection, $user_check);

        $row = mysqli_num_rows($mysqli_result);
        if(empty($username) || empty($user_email) || empty($user_password) || empty($user_password2)){
            $msg = 3;
            return $msg;
        }else{
            if($user_password !== $user_password2){
                $msg = 4;
                return $msg;
            }else{
                if ($row == 1) {
                    $msg = 2;
                    return $msg;
                } else {
                    $mail = new PHPMailer(true);
                    try {
                        $random = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                        $token = substr(str_shuffle($random), 0, 30);
                        $query = "INSERT INTO `taikhoan`( `hoten`, `email`, `matkhau`, `dienthoai`, `diachi`,`token`,`role`) VALUES ('$username','$user_email','$user_password','$user_mobile','$user_address','$token','$user_roles')";
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
                        $mail->Body    = '
                        Đây là email xác nhận tài khoản của website NÔNG SẢN QUÊ NHÀ<br><br>
        
                        Vui lòng nhấn vào liên kết dưới đây để xác nhận tài khoản của bạn:<br>
                        <a class="btn btn-success" href="http://localhost/nongsan/xacnhan_email.php?email=' . $user_email . '&token=' . $token . '">Xác nhận tài khoản của bạn tại đây.</a><br><br>
                        
                        Cảm ơn bạn!<br>
                        Đội ngũ NÔNG SẢN QUÊ NHÀ
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
            $this->checkEmailToken();
        } else {
            $this->checkEmailToken();
        }
    }

    function emailSupport($data){
        
    }
}
