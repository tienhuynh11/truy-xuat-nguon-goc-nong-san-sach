<?php
$users = $obj->show_admin_user();
    if(isset($_SESSION['admin_id'])) {
        $nguoidang_id = $_SESSION['admin_id'];
    } else {
        header("Location: login.php");
        exit();
    }

?>
<?php 
 $vungsanxuat=$obj->vsxShow();
 $dn = $obj->display_dn();

 $product_info = $obj->display_product();
 if(isset($_SESSION['admin_id'])) {
    $nguoidang_id = $_SESSION['admin_id'];
} else {
    header("Location: login.php");
    exit();
}
while($dn_ftecth = mysqli_fetch_assoc($dn)){
    $doanhnghiep[]=$dn_ftecth;
}

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
        <select name="sanpham" id="sp" class="form-control">
        <?php while($pro = mysqli_fetch_assoc($product_info)){ ?>
        <option value="<?php echo $pro['id_sp']; ?>"  ><?php echo $pro['tensanpham'] ?></option>

        <?php }?>
        </select>
    </div>
    <!-- <div class="form-group">
        <label for="nguoidang">Người đại diện</label>
        <select name="nguoidang" id="nguoidang" class="form-control">
            <?php foreach($users as $user): ?>
                <?php if ($user['id_acc']== $nguoidang_id) { ?>
                <option value="<?php echo $user['id_acc']?>" selected><?php echo $user['hoten']  .'-'. $user['dienthoai']?></option>
            <?php } else { ?>
                <option value="<?php echo $user['id_acc'] ?>"><?php echo $user['hoten']  .'-'.  $user['dienthoai'] ?></option>
            <?php } ?>
            <?php endforeach; ?>
        </select>
    </div> -->
    <input type="hidden" name="nguoidang" value="<?php echo $nguoidang_id ?>">
    <div class="form-group">
        <label for="tennhatky">Tên nhật ký</label> 
        <input type="text" name="tennhatky" class="form-control">
    </div>
    <div class="form-group">
        <label for="vungsanxuat">Vùng sản xuất</label>
        <select name="vungsanxuat" id="vungsanxuat" class="form-control">
            <option value="">Chọn vùng sản xuất</option>
            <?php while($vsx = mysqli_fetch_assoc($vungsanxuat)){ ?>
            <option value="<?php echo $vsx['id_vung'] ?>"><?php echo $vsx['tenvung'] ?></option>
            <?php }?>
        </select>
    </div>   
        
    <div class="form-group">
        <label for="doanhnghiep">Thuộc doanh nghiệp</label>
        <select name="doanhnghiep" id="doanhnghiep" class="form-control">
            <option value="">Chọn nhà sản xuất</option>
            <?php foreach($doanhnghiep as $dn){ ?>
                <option value="<?php echo $dn['id_dn'] ?>"><?php echo $dn['tendoanhnghiep'] ?></option>
            <?php }?>
        </select>
    </div>    
    <div class="form-group">
        <label for="thanhvien">Thành viên liên quan</label>
                            <select name="thanhvien[]" id="thanhvien" class="form-control" multiple>
                                <?php foreach ($users as $user) { ?>
                                    <option value="<?php echo $user['id_acc']; ?>"><?php echo $user['hoten']; ?></option>
                                <?php } ?>
                            </select>
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
<script>
    $(document).ready(function() {
        $("#sp").select2();
        $("#vungsanxuat").select2();
        $("#doanhnghiep").select2();
        $("#thanhvien").select2();
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
    .select2-container--default .select2-selection--multiple .select2-selection__rendered {
    box-sizing: border-box;
    list-style: none;
    margin: 0;
    padding: .5rem .75rem;
    width: 100%;
    height: 20px;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice {
    color: #1b1919;
}
</style>