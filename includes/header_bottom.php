<?php

$obj = new adminback();
$links = $obj->display_links();
$link = mysqli_fetch_assoc($links);

?>



<div class="header-bottom hidden-sm hidden-xs">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-12 col-md-12 padding-top-2px" style="display: flex;justify-content: center;align-items: center;">

                <?php
                include_once("search_bar.php")
                ?>

                <!-- <div class="live-info">
                    <p class="telephone"><i class="fa fa-phone" aria-hidden="true"></i><b class="phone-number"> <?php //echo $link['phone'] ?> </b></p>
                    <p class="working-time">Hợp tác với chúng tôi</p>
                </div> -->
            </div>
        </div>
    </div>
</div>