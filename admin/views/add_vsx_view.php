<?php
    if(isset($_SESSION['admin_id'])) {
        $nguoidang_id = $_SESSION['admin_id'];
    } else {
        header("Location: login.php");
        exit();
    }

?>
<?php 
    

    if(isset($_POST['add_pdt'])){
        $rtn_msg = $obj->add_vsx($_POST);
    }
?>

<h2 class="" style="text-alin : center;">Thêm vùng sản xuất</h2>
<h6 class="text-success">
   <?php 
     if(isset($rtn_msg)){
         echo $rtn_msg;
     }
   ?>

</h6>
<form action="" method="post" enctype="multipart/form-data" class="form">
<div class="form-group">
        <label for="tenvung">Tên vùng:</label>
        <input type="text" name="tenvung" class="form-control">
    </div>
    <input type="hidden" name="nguoidang" value="<?php echo $nguoidang_id ?>">
    <div class="form-group">
        <label for="pdt_name">Mã vùng:</label>
        <input type="text" name="mavung" class="form-control">
    </div>
    <div class="form-group">
        <label for="img">Hình ảnh:</label>
        <input type="file" name="img" class="form-control">
    </div>
    <div class="form-group">
        <label for="sdt">Số điện thoại:</label>
        <input type="text" name="sdt" class="form-control">
    </div>
    <div class="form-group">
        <label for="pdt_price">Địa chỉ:</label>
        <input type="text" name="diachi" class="form-control">
    </div>
    <div class="form-group">
        <label for="dientich">Diện tích:</label>
        <input type="text" name="dientich" class="form-control">
    </div>
    <div class="form-group">
        <label for="thongtin">Thông tin:</label>
        <input type="text" name="thongtin" class="form-control">
    </div>

    <!-- <div class="form-group">
        <label for="pdt_des">Mô tả</label>
        <textarea name="mota" cols="30" rows="10" class="form-control"></textarea>
    </div> -->

    <input type="submit" value="Thêm vùng sản xuất" name="add_pdt" class="btn btn-block btn-primary">
</form>