<?php
    if(isset($_SESSION['admin_id'])) {
        $nguoidang_id = $_SESSION['admin_id'];
    } else {
        header("Location: login.php");
        exit();
    }

?>
<?php 
    $cata_info = $obj-> p_display_catagory();
    $caygiong=$obj->show_caygiong();
    $vungsanxuat=$obj->vsxShow();
    if(isset($_POST['add_pdt'])){
        $rtn_msg = $obj->add_product($_POST);
    }
?>

<h2>Thêm nông sản</h2>
<h6 class="text-success">
   <?php 
     if(isset($rtn_msg)){
         echo $rtn_msg;
     }
   ?>

</h6>
<form action="" method="post" enctype="multipart/form-data" class="form">
    <input type="hidden" name="taikhoan" value="<?php echo $nguoidang_id ?>">
    <div class="form-group">
        <label for="pdt_name">Tên sản phẩm</label>
        <input type="text" name="pdt_name" class="form-control">
    </div>
    <div class="form-group">
        <label for="pdt_code">Mã sản phẩm</label>
        <input type="text" name="pdt_code" class="form-control">
    </div>
    <div class="form-group">
        <label for="pdt_price">Giá</label>
        <input type="text" name="pdt_price" class="form-control">
    </div>

    <div class="form-group">
        <label for="pdt_des">Mô tả</label>
        <textarea name="pdt_des" cols="30" rows="10" class="form-control"></textarea>
    </div>


    <div class="form-group">
        <label for="pdt_ctg">Danh mục</label>
        <select name="pdt_ctg" class="form-control">
        <option value="">Chọn danh mục</option>

        <?php while($cata = mysqli_fetch_assoc($cata_info)){ ?>
        <option value="<?php echo $cata['id_dm'] ?>"><?php echo $cata['tendanhmuc'] ?></option>

        <?php }?>
        </select>
    </div>
    
    <div class="form-group">
        <label for="pdt_ctg">Cây giống</label>
        <select name="pdt_ctg" class="form-control">
        <option value="">Chọn cây giống</option>

        <?php while($cg = mysqli_fetch_assoc($caygiong)){ ?>
        <option value="<?php echo $cg['id_cg'] ?>"><?php echo $cg['tencaygiong'] ?></option>

        <?php }?>
        </select>
    </div>
    <div class="form-group">
        <label for="pdt_ctg">Vùng sản xuất</label>
        <select name="pdt_ctg" class="form-control">
        <option value="">Chọn vùng sản xuất</option>

        <?php while($vsx = mysqli_fetch_assoc($vungsanxuat)){ ?>
        <option value="<?php echo $vsx['id_vung'] ?>"><?php echo $vsx['tenvung'] ?></option>

        <?php }?>
        </select>
    </div>

    <div class="form-group">
        <label for="hdsd">Hướng dẫn sử dụng</label>
        <input type="text" name="hdsd" class="form-control">
    </div>
    <div class="form-group">
        <label for="pdt_img">Hình ảnh</label>
        <input type="file" name="pdt_img" class="form-control">
    </div>

    <div class="form-group">
        <label for="pdt_status">Trạng thái</label>
        <input type="text" name="pdt_status" class="form-control" readonly placeholder="Đang chờ xét duyệt" >
    </div>



    <input type="submit" value="Thêm nông sản" name="add_pdt" class="btn btn-block btn-primary">
</form>