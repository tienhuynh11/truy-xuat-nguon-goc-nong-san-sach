<?php 
 $users = $obj->show_admin_user();
    $product_info=$obj->display_product();
    if(isset($_GET['status'])){
        $id_nk = $_GET['id'];
        if($_GET['status']=="nkEdit"){
           
           $nk_info= $obj->show_nhatky_by_id($id_nk);
           $nk = mysqli_fetch_assoc($nk_info);
        }
    }

    if(isset($_POST['update_nhatky'])){
       $update_msg =  $obj->update_nhatky($_POST);
       if($update_msg == "Update successful!") {
        header("Location: manage_nhatky.php"); 
        exit(); 
    }
    }
?>

<div class="container">
    <h4>Chỉnh sửa nhật ký sản phẩm </h4>

   
<form action="" method="POST" enctype="multipart/form-data">
    <!-- <div class="form-group">
        <h4>Người đăng</h4>
        <input type="text" name="nguoidang" class="form-control" value="" required>
    </div> -->

    <div class="form-group">
    <label for="sanpham">Nông sản</label>
        <select name="sanpham" id="sp" >
        <?php while($pdt = mysqli_fetch_assoc($product_info)) { ?>
            <?php if ($pdt['id_sp'] == $nk['sanpham']) { ?>
                <option value="<?php echo $pdt['id_sp'] ?>" selected><?php echo $pdt['tensanpham'] ?></option>
            <?php } else { ?>
                <option value="<?php echo $pdt['id_sp'] ?>"><?php echo $pdt['tensanpham'] ?></option>
            <?php } ?>
        <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="nguoidang">Người đại diện</label>
        <select name="nguoidang" id="nguoidaidien" class="form-control">
            <?php foreach($users as $user): ?>
                <?php if ($user['id_acc']== $nk['nguoidang']) { ?>
                <option value="<?php echo $user['id_acc']?>" selected><?php echo $user['hoten']  .'-'. $user['dienthoai']?></option>
            <?php } else { ?>
                <option value="<?php echo $user['id_acc'] ?>"><?php echo $user['hoten']  .'-'.  $user['dienthoai'] ?></option>
            <?php } ?>
            <?php endforeach; ?>
        </select>
    </div>
    <input type="hidden" name="id_nk" value="<?php echo $nk['id_nk'] ?>">
    <div class="form-group">
        <h4>Tên nhật ký</h4>
        <textarea name="tennhatky" id="" cols="30" rows="10" class="form-control" ><?php echo $nk['tennhatky'] ?></textarea>
    </div>
    <div class="form-group">
        <h4>Chi tiết</h4>
        <textarea name="chitiet" id="" cols="30" rows="10" class="form-control" ><?php echo $nk['chitiet'] ?></textarea>
    </div>
    <div class="form-group">
        <label for="nk_img">Hình ảnh </label>
        <div class="mb-3">
        <img src="uploads/<?php echo $nk['hinhanh']?>" style="width: 80px;" >
    </div>
        <input type="file" name="nk_img" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit" name="update_nhatky" class="btn btn-primary" value="Cập nhật nhật ký">
    </div>
</form>
</div>

<script>
    $(document).ready(function() {
        $("#sp").select2();
        $("#nguoidaidien").select2();
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