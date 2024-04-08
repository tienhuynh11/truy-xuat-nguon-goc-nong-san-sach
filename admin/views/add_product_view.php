
<?php 
    $cata_info = $obj-> p_display_catagory();

    if(isset($_POST['add_pdt'])){
        $rtn_msg = $obj->add_product($_POST);
    }
?>

<h2>Add Product</h2>
<h6 class="text-success">
   <?php 
     if(isset($rtn_msg)){
         echo $rtn_msg;
     }
   ?>

</h6>
<form action="" method="post" enctype="multipart/form-data" class="form">
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
        <label for="pdt_img">Product Image</label>
        <input type="file" name="pdt_img" class="form-control">
    </div>

    <div class="form-group">
        <label for="pdt_status">Trạng thái</label>
        <input type="text" name="pdt_status" class="form-control" readonly placeholder="Đang chờ xét duyệt" >
    </div>



    <input type="submit" value="Add Product" name="add_pdt" class="btn btn-block btn-primary">
</form>