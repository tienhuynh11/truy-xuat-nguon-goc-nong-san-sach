
<?php 
    $obj=new adminback();
?>

<style>
.primary-menu ul li a{
    text-decoration: none;
}

.primary-menu .menu .menu-item a{
    font-weight: bold;
}
</style>

<?php 
    if(isset($del_msg)){
        echo "{$del_msg}";
    }
?>
<div class="header-middle biolife-sticky-object" style="background-color: #ffff;">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-2 col-md-6 col-xs-6">
                <a href="index.php" class="biolife-logo">


                    <img src="admin/uploads/logo-test1.png" alt="biolife logo" width="135" height="36">


                </a>
            </div>
            <div class="col-lg-6 col-md-7 hidden-sm hidden-xs">
                <div class="primary-menu">
                    <ul class="menu biolife-menu clone-main-menu clone-primary-menu" id="primary-menu" data-menuname="main menu">

                        <li class="menu-item"><a href="index.php">Bảng tin</a></li>
                        <!-- <li class="menu-item"><a href="index.php">Trang chủ</a></li> -->
                        <li class="menu-item"><a href="sanpham.php">Nông sản</a></li>
                        
                       
                        
                        <li class="menu-item"><a href="vungsanxuat.php">Vùng sản xuất</a></li>
                        <li class="menu-item"><a href="vungsanxuat.php">Cây giống</a></li>
                        <li class="menu-item"><a href="vungsanxuat.php">Nhật ký</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-md-6 col-xs-6">
                <div class="biolife-cart-info">
                    <div class="mobile-search">
                        <a href="javascript:void(0)" class="open-searchbox"><i class="biolife-icon icon-search"></i></a>
                        <div class="mobile-search-content">
                            <form action="#" class="form-search" name="mobile-seacrh" method="get">
                                <a href="#" class="btn-close"><span class="biolife-icon icon-close-menu"></span></a>
                                <input type="text" name="s" class="input-text" value="" placeholder="Tìm kiếm sản phẩm nào...">
                                <!-- <select name="category">
                                    <option value="-1" selected>All Categories</option>
                                    <option value="vegetables">Vegetables</option>
                                    <option value="fresh_berries">Fresh Berries</option>
                                    <option value="ocean_foods">Ocean Foods</option>
                                    <option value="butter_eggs">Butter & Eggs</option>
                                    <option value="fastfood">Fastfood</option>
                                    <option value="fresh_meat">Fresh Meat</option>
                                    <option value="fresh_onion">Fresh Onion</option>
                                    <option value="papaya_crisps">Papaya & Crisps</option>
                                    <option value="oatmeal">Oatmeal</option>
                                </select> -->
                                <button type="submit" class="btn-submit">Tìm kiếm</button>
                            </form>
                        </div>
                    </div>
                    <div class="wishlist-block hidden-sm hidden-xs">
                        <!-- <a href="#" class="link-to">
                            <span class="icon-qty-combine">
                                <i class="icon-heart-bold biolife-icon"></i>
                                <span class="qty">4</span>
                            </span>
                        </a> -->
                    </div>
                    <div class="mobile-menu-toggle">
                        <a class="btn-toggle" data-object="open-mobile-menu" href="javascript:void(0)">
                            <span></span>
                            <span></span>
                            <span></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>