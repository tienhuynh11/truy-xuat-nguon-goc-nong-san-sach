<?php 
    if(isset($_GET['status'])){
        $id_bv = $_GET['id'];
        if($_GET['status']=="couponEdit"){
           $bv_info= $obj->show_baiviet_by_id($id_bv);
           $bv = mysqli_fetch_assoc($bv_info);
           $users = $obj->show_admin_user();
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
<form action="" method="POST" enctype="multipart/form-data">
<div class="form-group">
        <label for="nguoidang">Người đại diện</label>
        <select name="nguoidang" id="nguoidang" class="form-control">
            <?php foreach($users as $user): ?>
                <?php if ($user['id_acc']== $bv['nguoidang']) { ?>
                <option value="<?php echo $user['id_acc']?>" selected><?php echo $user['hoten']  .'-'. $user['dienthoai']?></option>
            <?php } else { ?>
                <option value="<?php echo $user['id_acc'] ?>"><?php echo $user['hoten']  .'-'.  $user['dienthoai'] ?></option>
            <?php } ?>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <h4>Tiêu đề</h4>
        <input type="text" name="tieude" class="form-control" value="<?php echo $bv['tieude'] ?>" required>
    </div>
    <input type="hidden" name="id_bv" value="<?php echo $bv['id_bv'] ?>">
    <div class="form-group">
        <h4>Nội dung</h4>
        <textarea name="noidung" id="" cols="30" rows="10" class="form-control" ><?php echo $bv['noidung'] ?></textarea>
    </div>
    <div class="form-group">
        <label for="bv_img">Hình ảnh </label>
        <div class="mb-3">
        <img src="uploads/baiviet/<?php echo $bv['hinhanh']?>" style="width: 80px;" >
    </div>
        <input type="file" name="bv_img" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit" name="update_baiviet" class="btn btn-primary" value="Sửa">
    </div>
</form>
</div>
<script>
    $(document).ready(function() {
        $("#nguoidang").select2();
    });
</script>
<style>
    .select2-container--default .select2-selection--single .select2-selection__rendered{
        padding: 0 0 0 0;
        padding: .5rem .75rem;
        line-height: normal;
        border-radius: 2px;
        border: 1px solid #ccc;
        background-color: #fff;
    }
    .select2-container--default .select2-selection--single{
        border: none;
    }
</style>