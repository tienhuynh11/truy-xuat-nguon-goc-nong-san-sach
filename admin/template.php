<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Allow-Methods: *")?>
<?php 

    include("class/adminback.php");
    $obj= new adminback();

    session_start();
    $admin_id = $_SESSION['admin_id'];
    $admin_email = $_SESSION['admin_email'];
    $admin_role = $_SESSION['role'];
    if($admin_id==null){
        header("location:../dangnhap.php");
    }

    if(isset($_GET['adminLogout'])){
        if($_GET['adminLogout']=="logout"){
            $obj->admin_logout();
        }
    }
?>

<?php 
    include ("includes/head.php")
?>

  <body>
  <body>
	  <div class="fixed-button">
		
	  </div>
       <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

         <?php include_once ("includes/headernav.php") ?>


            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                   
                <?php include_once ("includes/sidenav.php") ?>


                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                     
        
                                <?php 
                                    if($views){
                                        if($views=="dashboard"){
                                            include ('views/dashborad_view.php');
                                        }elseif($views=="add-cata" && $admin_role== "Admin"){
                                            include ("views/add_cata_view.php");
                                        }elseif($views=="manage-cata" && $admin_role== "Admin"){
                                            include ("views/manage_cata_view.php");
                                        }elseif($views=="add-product"){
                                            include ("views/add_product_view.php");
                                        }elseif($views=="manage-product"){
                                            include ("views/manage_product_view.php");
                                        }elseif($views=="add-account" && $admin_role== "Admin"){
                                            include ("views/add_account_view.php");
                                        }elseif($views=="manage-account" && $admin_role== "Admin"){
                                            include ("views/manage_account_view.php");
                                        }elseif($views=="edit_cata" && $admin_role== "Admin"){
                                            include ("views/edit_cata_view.php");
                                        }elseif($views=="edit_product"){
                                            include ("views/edit_product_view.php");
                                        }elseif($views=="manage_order"){
                                            include ("views/manage_order_view.php");
                                        }elseif($views=="add_link"){
                                            include ("views/add_links_view.php");
                                        }elseif($views=="edit_logo" && $admin_role== "Admin"){
                                            include ("views/edit_logo_view.php");
                                        }elseif($views=="add_logo" && $admin_role== "Admin"){
                                            include ("views/add_logo_view.php");
                                        }elseif($views=="edit_links"){
                                            include ("views/edit_links_view.php");
                                        }elseif($views=="manage_vsx"){
                                            include ("views/manage_vsx_view.php");
                                        }elseif($views=="edit_vsx"){
                                            include ("views/edit_vsx_view.php");
                                        }elseif($views=="add_order"){
                                            include ("views/add_order_view.php");
                                        }elseif($views=="add_bv"){
                                            include ("views/add_bv_view.php");
                                        }elseif($views=="manage_bv"){
                                            include ("views/manage_bv_view.php");
                                        }elseif($views=="edit_bv"){
                                            include ("views/edit_bv_view.php");                                   
                                        }elseif($views=="customer_feedback"){
                                            include ("views/customer_feedback_view.php");
                                        }elseif($views=="edit_comment"){
                                            include ("views/edit_comment_view.php");
                                        }elseif($views=="add-admin-user" && $admin_role== "Admin"){
                                            include ("views/add_admin_user_view.php");
                                        }elseif($views=="edit_admin" && $admin_role== "Admin"){
                                            include ("views/edit_admin_view.php");
                                        }elseif($views=="make_report"){
                                            include ("views/make_report_view.php");
                                        }elseif($views=="add-vsx"){
                                            include ("views/add_vsx_view.php");
                                        }elseif($views=="manage_caygiong"){
                                            include ("views/manage_caygiong_view.php");
                                        }elseif($views=="edit_caygiong"){
                                            include ("views/edit_caygiong_view.php");
                                        }elseif($views=="add_caygiong"){
                                            include ("views/add_caygiong_view.php");
                                        }elseif($views=="add_dm_dn" && $admin_role== "Admin"){
                                            include ("views/add_dm_dn_view.php");
                                        }elseif($views=="manage_dm_dn" && $admin_role== "Admin"){
                                            include ("views/manage_dm_dn_view.php");
                                        }elseif($views=="edit_dm_dn" && $admin_role== "Admin"){
                                            include ("views/edit_dm_dn_view.php");
                                        }elseif($views=="edit_dn"){
                                            include ("views/edit_dn_view.php");
                                        }elseif($views=="add_dn"){
                                            include ("views/add_dn_view.php");
                                        }elseif($views=="manage_dn"){
                                            include ("views/manage_doanhnghiep_view.php");
                                        }elseif($views=="manage_nhatky"){
                                            include ("views/manage_nhatky_view.php");
                                        }elseif($views=="add_nhatky"){
                                            include ("views/add_nhatky_view.php");
                                        }elseif($views=="edit_nhatky"){
                                            include ("views/edit_nhatky_view.php");
                                        }elseif($views=="manage_nhaxuong"){
                                            include ("views/manage_nhaxuong_view.php");
                                        }elseif($views=="add_nhaxuong"){
                                            include ("views/add_nhaxuong_view.php");
                                        }elseif($views=="edit_nhaxuong"){
                                            include ("views/edit_nhaxuong_view.php");
                                        }elseif($views=="edit_danhmuc_nx" && $admin_role== "Admin"){
                                            include ("views/edit_danhmuc_nx_view.php");
                                        }elseif($views=="add_danhmuc_nx" && $admin_role== "Admin"){
                                            include ("views/add_danhmuc_nx_view.php");
                                        }elseif($views=="manage_danhmuc_nx" && $admin_role== "Admin"){
                                            include ("views/manage_danhmuc_nx_view.php");
                                        }elseif($views=="thong-tin"){
                                            include ("views/thongtinhoso.php");
                                        }else{
                                            echo '<script>
                                            window.location.href = "http://localhost/nongsan/admin/dashboard.php";
                                            </script>';
                                        }

                                    }
                                ?>


                                    <div id="styleSelector">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Warning Section Starts -->
        <!-- Older IE warning message -->
    <!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jquery -->

<?php 
    include ("includes/script.php")
?>