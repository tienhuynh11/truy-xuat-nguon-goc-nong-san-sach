<?php 
$obj= new adminback();
    $links = $obj->display_links();
    $link = mysqli_fetch_assoc($links);
   

?>
<footer id="footer" class="footer layout-03" style="padding-bottom: 20px;">
        <div class="footer-content background-footer-03" style="padding-top: 0px;">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="separator sm-margin-top-62px xs-margin-top-40px"></div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                       <div class="copy-right-text"><p>©Bản quyền 2024 - Website được cung cấp bởi Nhóm 43 - CNM</p></div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="payment-methods">
                            <ul>
                                <li><a href="#" class="payment-link"><img src="assets/images/Logo-IUH.jpg" width="51" height="36" alt=""></a></li>
                                <li><a href="#" class="payment-link"><img src="assets/images/logo-hhtt.png" width="51" height="36" alt=""></a></li>
                                <li><a href="#" class="payment-link"><img src="assets/images/logo-htxv.png" width="51" height="36" alt=""></a></li>
                                <li><a href="#" class="payment-link"><img src="assets/images/logo-rdlt.png" width="51" height="36" alt=""></a></li>
                                <li><a href="#" class="payment-link"><img src="assets/images/logo-tdkn.png" width="51" height="36" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>