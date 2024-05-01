<div class="header-search-bar layout-01">
    <?php
        $tranghientai = basename($_SERVER['PHP_SELF']); // Lấy tên của trang hiện tại
        // Thiết lập action của form dựa trên trang hiện tại
        if ($tranghientai === 'sanpham.php') {
            echo '<form action="sanpham.php" class="form-search" name="desktop-seacrh" method="get">';
        } elseif ($tranghientai === 'vungsanxuat.php') {
            echo '<form action="vungsanxuat.php" class="form-search" name="desktop-seacrh" method="get">';
        } elseif ($tranghientai === 'caygiong.php') {
            echo '<form action="caygiong.php" class="form-search" name="desktop-seacrh" method="get">';
        } elseif ($tranghientai === 'nhatky.php') {
            echo '<form action="nhatky.php" class="form-search" name="desktop-seacrh" method="get">';
        }
    ?>
        <input type="text" name="keyword" class="input-text"  placeholder="Nhập nội dung cần tìm...">

        <input type="submit" class="btn-submit" value="Tìm kiếm" name="search" style="margin-top: 8px;font-size:16px;">
        
        <!-- <input type="submit" class="btn-submit"><i class="biolife-icon icon-search"></i></button> -->
    </form>
</div>