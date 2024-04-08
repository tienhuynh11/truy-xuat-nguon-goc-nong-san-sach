
<?php 

    if(isset($_POST['add_vsx'])){
        $rtn_msg = $obj->add_vsx($_POST);
    }
?>

<h2>Thêm vùng sản xuất</h2>
<h6 class="text-success">
   <?php 
     if(isset($rtn_msg)){
         echo $rtn_msg;
     }
   ?>

</h6>
<form action="" method="post" enctype="multipart/form-data" class="form">
    <div class="form-group">
        <label for="pdt_name">Tên vùng sản xuất</label>
        <input type="text" name="vsx_ten" class="form-control">
    </div>

    <div class="form-group">
        <label for="pdt_price">Mã vùng</label>
        <input type="text" name="vsx_mavung" class="form-control">
    </div>

    <div class="form-group">
        <label for="pdt_des">Hình ảnh</label>
        <textarea name="vsx_hinhanh" cols="30" rows="10" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label for="pdt_img">Số điện thoại</label>
        <input type="text" name="vsx_sdt" class="form-control" max='10' min='10'>
    </div>


    <!-- <div class="form-group">
        <label for="pdt_ctg">Địa chỉ</label>
        <select name="pdt_ctg" class="form-control">
        <option value="">Select a Catagory</option>

        <?php // while($cata = mysqli_fetch_assoc($cata_info)){ ?>
        <option value="<?php // echo $cata['ctg_id'] ?>"><?php // echo $cata['ctg_name'] ?></option>

        <?php //}?>
        </select>
    </div> -->

    <div class="form-group">
        <label for="pdt_img">Địa chỉ</label>
        <input type="text" name="vsx_diachi" class="form-control">
    </div>

    <div class="form-group">
        <label for="pdt_img">Diện tích</label>
        <input type="text" name="vsx_dientich" class="form-control">
        <input type="hidden" name="vsx_nguoidang" value="<?php echo $nongdan_id; ?>">
    </div>

    <!-- <div class="form-group">
        <label for="pdt_status">Status</label>
        <select name="pdt_status" class="form-control">
            <option value="1">Published</option>
            <option value="0">Unpublished</option>
        </select>
    </div> -->



    <input type="submit" value="Tạo vùng sản xuất" name="add_vsx" class="btn btn-block btn-primary">
</form>