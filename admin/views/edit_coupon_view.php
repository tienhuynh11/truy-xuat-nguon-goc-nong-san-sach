<?php 
    if(isset($_GET['status'])){
        $id_bv = $_GET['id'];
        if($_GET['status']=="couponEdit"){
           $bv_info= $obj->show_baiviet_by_id($id_bv);
           $bv = mysqli_fetch_assoc($bv_info);
        }
    }

    if(isset($_POST['update_baiviet'])){
       $update_msg =  $obj->update_baiviet($_POST);
       if($update_msg == "Update successful!") {
        header("Location: manage_admin_user.php"); 
        exit(); 
    }
    }
?>

<div class="container">
    <h4>Chỉnh sửa thông tin tài khoản</h4>

    <h6>
        <?php 
            if(isset( $update_msg)){
                echo  $update_msg;
            }
        ?>
    </h6>
<form action="" method="POST">
    <div class="form-group">
        <h4>Người đăng</h4>
        <input type="text" name="nguoidang" class="form-control" value="<?php echo $bv['nguoidang'] ?>" required>
    </div>
    <div class="form-group">
        <h4>Sản phẩm</h4>
        <input type="text" name="sanpham" class="form-control" value="<?php echo $bv['sanpham'] ?>" required>
    </div>

    <div class="form-group">
        <h4>Tiêu đề</h4>
        <input type="text" name="tieude" class="form-control" value="<?php echo $bv['tieude'] ?>" required>
    </div>
    <input type="hidden" name="id_bv" value="<?php echo $bv['id_bv'] ?>">
    <div class="form-group">
        <h4>Nội dung</h4>
        <textarea name="noidung" id="" cols="30" rows="10" ><?php echo $bv['noidung'] ?></textarea>
    </div>
   
    <div class="form-group">
        <input type="submit" name="update_baiviet" class="btn btn-primary">
    </div>
</form>
</div>