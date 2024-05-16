<?php 

 
    $product_info=$obj->display_product();
    $vungsanxuat=$obj->vsxShow();
 $doanhnghiep = $obj->display_dn();
 


 
 
    if(isset($_GET['status'])){
        $id_nk = $_GET['id'];
        if($_GET['status']=="nkEdit"){
            
             $all_members = $obj->show_admin_user();
           $nk_info= $obj->show_nhatky_by_id($id_nk);
           $nk = mysqli_fetch_assoc($nk_info);
        }
    }

    if(isset($_POST['update_nhatky'])){
        $update_msg = $obj->update_nhatky($_POST);
        if($update_msg == "Update successful!") {
            echo '<script>
            alert("cập nhật nhật ký sản phẩm thành công");
            window.location.href = "manage_nhatky.php";
            </script>';
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
        <label for="vungsanxuat">Vùng sản xuất</label>
        <select name="vungsanxuat" id="vungsanxuat" class="form-control">
            <?php foreach($vungsanxuat as $vsx): ?>
                <?php if ($vsx['id_vung']== $nk['vungsanxuat']) { ?>
                <option value="<?php echo $vsx['id_vung']?>" selected><?php echo $vsx['tenvung']?></option>
            <?php } else { ?>
                <option value="<?php echo $vsx['id_vung'] ?>"><?php echo $vsx['tenvung'] ?></option>
            <?php } ?>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="doanhnghiep">Doanh nghiệp</label>
        <select name="doanhnghiep" id="doanhnghiep" class="form-control">
            <?php foreach($doanhnghiep as $dn): ?>
                <?php if ($dn['id_dn']== $nk['doanhnghiep']) { ?>
                <option value="<?php echo $dn['id_dn']?>" selected><?php echo $dn['tendoanhnghiep']?></option>
            <?php } else { ?>
                <option value="<?php echo $dn['id_dn']  ?>"><?php echo $dn['tendoanhnghiep'] ?></option>
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
    <label for="thanhvien">Thành viên </label>
    <select name="thanhvien[]" id="thanhvien" class="form-control" multiple>
        <?php
       
       $selected_members_str = str_replace(['"', ''], '', $nk['thanhvien']);
       $selected_members = json_decode($selected_members_str, true);
        foreach($all_members as $member): ?>
            <?php if (in_array($member['id_acc'], $selected_members)) { ?>
                <option value="<?php echo $member['id_acc'] ?>" selected><?php echo $member['hoten'] ?></option>
            <?php } else { ?>
                <option value="<?php echo $member['id_acc'] ?>"><?php echo $member['hoten'] ?></option>
            <?php } ?>
        <?php endforeach; ?>
    </select>
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
        $("#thanhvien").select2();
        $("#vungsanxuat").select2();
        $("#doanhnghiep").select2();
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
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
   
    color: #171717;
}
</style>