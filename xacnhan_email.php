
<?php
include("includes/head.php");
include("admin/class/verify_email.php");
$ve = new Verify_email();
if (!isset($_GET['email']) || !isset($_GET['token'])) {
    $ve->checkEmailToken();
} else {
    echo 'Xác thực thành công';
    $ve->confirmEmailToken($_GET);
}

?>