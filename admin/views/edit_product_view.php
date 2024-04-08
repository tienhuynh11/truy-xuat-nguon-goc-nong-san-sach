<?php 

ini_set("display_erros", "Off");
    $obj=new adminback();
    $cata_info = $obj-> p_display_catagory();
    if(isset($_GET['trangthai'])){
        $id = $_GET['id'];
        if($_GET['trangthai']=='edit'){
           $pdt_info= $obj->edit_product($id);
           $pdt = mysqli_fetch_assoc($pdt_info);

        }
    }

    if(isset($_POST['update_pdt'])){
        $update_msg = $obj->update_product($_POST); 
    }


?>
<h4>Cập nhật nông sản</h4>

<?php 
    if(isset($update_msg)){
        echo $update_msg;
    }
?>
<form action="" method="post" enctype="multipart/form-data" class="form">
    <div class="form-group">
        <label for="pdt_name">Tên sản phẩm</label>
        <input type="text" name="u_pdt_name" class="form-control" value="<?php echo $pdt['tensanpham'] ?>" >
    </div>
    <div class="form-group">
        <label for="pdt_code">mã sản phẩm</label>
        <input type="text" name="u_pdt_code" class="form-control" value="<?php echo $pdt['masanpham'] ?>" >
    </div>
    <input type="hidden" name="pdt_id" value="<?php echo $pdt['id_sp'] ?>">
    <div class="form-group">
        <label for="pdt_price"> Giá</label>
        <input type="text" name="u_pdt_price" class="form-control" value="<?php echo $pdt['gia'] ?>">
    </div>
    <div class="form-group">
        <label for="pdt_xx">Xuất xứ</label>
        <input type="text" name="u_pdt_xx" class="form-control" value="<?php echo $pdt['xuatxu'] ?>">
    </div>
    <div class="form-group">
        <label for="pdt_des">Mô tả</label>
        <textarea name="u_pdt_des" cols="30" rows="10" class="form-control" ><?php echo $pdt['mota']?> </textarea>
    </div>
    <div class="form-group">
        <label for="pdt_ctg">Danh mục</label>
        <select name="u_pdt_ctg" class="form-control">
        <option value="">Chọn danh mục</option>

        <?php while($cata = mysqli_fetch_assoc($cata_info)){ ?>
        <option value="<?php echo $cata['id_dm'] ?>"  ><?php echo $cata['tendanhmuc'] ?></option>

        <?php }?>
        </select>
    </div>

   

    <div class="form-group">
        <label for="pdt_img">Hình ảnh </label>
        <div class="mb-3">
        <img src="uploads/<?php echo $pdt['hinhanh']?>" style="width: 80px;" >
    </div>
        <input type="file" name="u_pdt_img" class="form-control">
    </div>

    

    <input type="submit" value="Update Product" name="update_pdt" class="btn btn-block btn-primary">
</form>