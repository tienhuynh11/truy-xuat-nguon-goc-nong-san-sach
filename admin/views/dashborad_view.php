<?php
date_default_timezone_set("Asia/Dhaka");
$total_products = $obj->count_product();
$total_products_daduyet = $obj->count_product_daduyet();
$dembaiviet = $obj->count_bv();
$demdn = $obj->count_dn();
$demvsx = $obj->count_vsx();
$demcg = $obj->count_caygiong();
$demnx = $obj->count_nx();

?>
<style>
    .mydiv {
        width: 200px;
        position: absolute;
        right: 38px;
        overflow: hidden;
    }
</style>
<h2>Bảng điều khiển</h2>


<!-- <div class="mydiv">
<form action="" class="form">
    <select name="filterDate" id="filterDate" class="form-control">
        <option value="<?php echo date("Y/m/d") ?>" >Today</option>
        <option value="<?php echo date('Y-m-d', strtotime('-7 days')) ?>" >This week</option>
        <option value="<?php echo date('Y-m-d', strtotime('-30 days')) ?>" >This Month</option>
        <option value="<?php echo date('Y-m-d', strtotime('-365 days')) ?>" >This Year</option>
        <option value="2020-01-01" >Life Time</option>
    </select>
</form>
</div> -->


<script>
    $(document).ready(function() {


        $("#filterDate").change(function() {
            var filterId = this.value;

            $.ajax({
                url: "json/dashboard_json.php",
                method: "POST",
                data: {
                    action: 'load_allorder',
                    did: filterId
                },
                success: function(data) {
                    var html = data;

                    $('#totalOrder').text(data);
                }
            });

            $.ajax({
                url: "json/dashboard_json.php",
                method: "POST",
                data: {
                    action: 'load_allsell',
                    did: filterId
                },
                success: function(data) {
                    var html = data;

                    $('#totalSell').text(data);
                }
            });

            $.ajax({
                url: "json/dashboard_json.php",
                method: "POST",
                data: {
                    action: 'load_allcustomer',
                    did: filterId
                },
                success: function(data) {
                    var html = data;

                    $('#totalCustomer').text(data);
                }
            });

            $.ajax({
                url: "json/dashboard_json.php",
                method: "POST",
                data: {
                    action: 'load_delivered_order',
                    did: filterId
                },
                success: function(data) {
                    var html = data;

                    $('#DeliverOrder').text(data);
                }
            });
            $.ajax({
                url: "json/dashboard_json.php",
                method: "POST",
                data: {
                    action: 'load_processing_order',
                    did: filterId
                },
                success: function(data) {
                    var html = data;

                    $('#processingOrder').text(data);
                }
            });

            $.ajax({
                url: "json/dashboard_json.php",
                method: "POST",
                data: {
                    action: 'load_pending_order',
                    did: filterId
                },
                success: function(data) {
                    var html = data;

                    $('#pendingOrder').text(data);
                }
            });



        })
    })
</script>


<br> <br> <br>
<div class="row">



    <!-- order-card start -->

    <div class="col-md-6 col-xl-3">
        <a href="manage_product.php">
            <div class="card bg-c-blue order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Nông sản:</h6>
                    <h2 class="text-right"><i class="ti-package f-left"></i><span id="totalOrder"><?php echo  $total_products; ?></span></h2>
                    <p class="m-b-0"><span class="f-right"></span></p>
                </div>
            </div>
        </a>
    </div>


    <div class="col-md-6 col-xl-3">
        <a href="manage_product.php">
            <div class="card bg-c-green order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Nông sản đã xét duyệt:</h6>
                    <h2 class="text-right"><i class="ti-check f-left"></i><span id="totalSell"><?php echo $total_products_daduyet; ?></span></h2>
                    <p class="m-b-0"><span class="f-right"></span></p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-6 col-xl-3">
        <a href="manage_product.php">
            <div class="card bg-c-yellow order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Đang chờ xét duyệt</h6>
                    <h2 class="text-right"><i class="ti-time f-left"></i><span id="totalCustomer"><?php echo  $total_products - $total_products_daduyet; ?></span></h2>
                    <p class="m-b-0"><span class="f-right"></span></p>
                </div>
            </div>
        </a>
    </div>
    <div class="col-md-6 col-xl-3">
        <a href="manage_bv.php">
            <div class="card bg-c-pink order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Bài viết</h6>
                    <h2 class="text-right"><i class="ti-book f-left"></i><span id="DeliverOrder"><?php echo  $dembaiviet; ?></span></h2>
                    <p class="m-b-0"><span class="f-right"></span></p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 col-xl-3">
        <a href="manage_doanhnghiep.php">
            <div class="card bg-c-pink order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Doanh nghiệp</h6>
                    <h2 class="text-right"><i class="ti-user f-left"></i><span id="processingOrder"><?php echo  $demdn; ?></span></h2>
                    <p class="m-b-0"><span class="f-right"></span></p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 col-xl-3">
        <a href="manage_nhaxuong.php">
            <div class="card bg-c-yellow order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Vùng sản xuất</h6>
                    <h2 class="text-right"><i class="ti-map-alt f-left"></i><span id="pendingOrder"><?php echo  $demvsx; ?></span></h2>
                    <p class="m-b-0"><span class="f-right"></span></p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 col-xl-3">
        <a href="manage_caygiong.php">
            <div class="card bg-c-blue order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Cây giống</h6>
                    <h2 class="text-right"><i class="ti-wand f-left"></i><span id="pendingOrder"><?php echo  $demcg; ?></span></h2>
                    <p class="m-b-0"><span class="f-right"></span></p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-6 col-xl-3">
        <a href="manage_nhaxuong.php">
            <div class="card bg-c-blue order-card">
                <div class="card-block">
                    <h6 class="m-b-20">Nhà xưởng</h6>
                    <h2 class="text-right"><i class="fa fa-industry f-left"></i><span id="pendingOrder"><?php echo  $demnx; ?></span></h2>
                    <p class="m-b-0"><span class="f-right"></span></p>
                </div>
            </div>
        </a>
    </div>


    <!-- order-card end -->


    <!-- users visite and profile start -->

    <!-- users visite and profile end -->

</div>
</div>