<?php 

ini_set("display_erros", "Off");
    $obj=new adminback();
    $cata_info = $obj-> p_display_catagory();
    $caygiong=$obj->show_caygiong();
    $users = $obj->show_admin_user();
    $vungsanxuat=$obj->vsxShow();
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
    <label for="taikhoan">Người đại diện</label>
        <select name="taikhoan" id="taikhoan" class="form-control">
        <?php while($user = mysqli_fetch_assoc($users)) { ?>
            <?php if ($user['id_acc'] == $pdt['taikhoan']) { ?>
                <option value="<?php echo $user['id_acc'] ?>" selected><?php echo $user['hoten'].'-'.$user['dienthoai']  ?></option>
            <?php } else { ?>
                <option value="<?php echo $user['id_acc'] ?>"><?php echo $user['hoten'].'-'.$user['dienthoai']  ?></option>
            <?php } ?>
        <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="pdt_ctg">Danh mục</label>
        <select name="u_pdt_ctg" id="pdt_ctg" class="form-control">
     

        <?php while($cata = mysqli_fetch_assoc($cata_info)){ ?>
            <?php if ($cata['id_dm'] == $pdt['danhmuc']) { ?>
                <option value="<?php echo $cata['id_dm'] ?>" selected><?php echo $cata['tendanhmuc'] ?></option>
            <?php } else { ?>
                <option value="<?php echo $cata['id_dm'] ?>"><?php echo $cata['tendanhmuc'] ?></option>
            <?php } ?>
        <?php }?>
        </select>
    </div>
    <div class="form-group">
        <label for="caygiong">Cây giống</label>
        <select name="caygiong" id="caygiong" class="form-control">
        <?php while($cg = mysqli_fetch_assoc($caygiong)){ ?>
            <?php if ($cg['id_cg'] == $pdt['caygiong']) { ?>
                <option value="<?php echo $cg['id_cg'] ?>" selected><?php echo $cg['tencaygiong'] ?></option>
            <?php } else { ?>
                <option value="<?php echo $cg['id_cg'] ?>"><?php echo $cg['tencaygiong'] ?></option>
            <?php } ?>
        <?php }?>
        </select>
    </div>
    <div class="form-group">
        <label for="vungsanxuat">Vùng sản xuất</label>
        <select name="vungsanxuat" id="vungsanxuat" class="form-control">
        <?php while($vsx = mysqli_fetch_assoc($vungsanxuat)){ ?>
            <?php if ($vsx['id_vung'] == $pdt['vungsanxuat']) { ?>
                <option value="<?php echo $vsx['id_vung'] ?>" selected><?php echo $vsx['tenvung'] ?></option>
            <?php } else { ?>
                <option value="<?php echo $vsx['id_vung'] ?>"><?php echo $vsx['tenvung'] ?></option>
            <?php } ?>
        <?php }?>
        </select>
    </div>
    <div class="form-group">
        <label for="hdsd">Hướng dẫn sử dụng</label>
        <input type="text" name="hdsd" class="form-control" value="<?php echo $pdt['hdsd'] ?>">
    </div>
    
    <div class="form-group">
        <label for="dkbq">Điều kiện bảo quản</label>
        <input type="text" name="dkbq" class="form-control" value="<?php echo $pdt['dieukienbaoquan'] ?>">
    </div>
    <div class="form-group">
        <label for="congdung">Công dụng</label>
        <input type="text" name="congdung" class="form-control" value="<?php echo $pdt['congdung'] ?>" >
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

<script>
    $(document).ready(function() {
        $("#pdt_ctg").select2();
        $("#caygiong").select2();
        $("#vungsanxuat").select2();
        $("#taikhoan").select2();
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