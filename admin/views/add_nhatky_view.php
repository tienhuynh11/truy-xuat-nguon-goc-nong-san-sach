<?php
    if(isset($_SESSION['admin_id'])) {
        $nguoidang_id = $_SESSION['admin_id'];
    } else {
        header("Location: login.php");
        exit();
    }

?>
<?php 
 $product_info = $obj->display_product();
    if(isset($_POST['add_nk'])){
       $nk_msg =  $obj->add_nhatky($_POST);
       
    }
?>

<h2>Thêm Nhật ký</h2>

<h6 class="text-success">
   <?php 
     if(isset($nk_msg)){
         echo $nk_msg;
     }
   ?>

</h6>

<div>
    <form action="" method="post" enctype="multipart/form-data" class="form">
    <div class="form-group">
        <label for="sanpham">Sản phẩm</label>
        <select name="sanpham" class="form-control">
        <option value="">Chọn Sản phẩm</option>

        <?php while($pro = mysqli_fetch_assoc($product_info)){ ?>
        <option value="<?php echo $pro['id_sp']; ?>"  ><?php echo $pro['tensanpham'] ?></option>

        <?php }?>
        </select>
    </div>
    <input type="hidden" name="nguoidang" value="<?php echo $nguoidang_id ?>">
    <div class="form-group">
        <label for="tennhatky">Tên nhật ký</label> 
        <input type="text" name="tennhatky" class="form-control">
    </div>

    <div class="form-group">
        <label for="chitiet">Chi tiết</label>
       <textarea name="chitiet" id="" cols="30" rows="10" class="form-control" ></textarea>
    </div>

    <div class="form-group">
        <label for="nk_img">Hình ảnh</label>
        <input type="file" name="nk_img" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit" name="add_nk" class="btn btn-primary">
    </div>




       
    </form>
</div>
