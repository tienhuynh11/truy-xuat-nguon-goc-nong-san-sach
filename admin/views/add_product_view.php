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

<?php
    if(isset($_SESSION['admin_id'])) {
        $nguoidang_id = $_SESSION['admin_id'];
    } else {
        header("Location: login.php");
        exit();
    }

?>
<?php 
    $users = $obj->show_admin_user();
    $cata_info = $obj-> p_display_catagory();
    $caygiong=$obj->show_caygiong();
    $vungsanxuat=$obj->vsxShow();
    $nhaxuong=$obj->shownx();
    if(isset($_POST['add_pdt'])){
        $rtn_msg = $obj->add_product($_POST);
    }
?>

<h2>Thêm nông sản</h2>
<h6 class="text-success">
   <?php 
     if(isset($rtn_msg)){
         echo $rtn_msg;
     }
   ?>

</h6>
<form action="" method="post" enctype="multipart/form-data" class="form">
    <div class="form-group">
        <label for="pdt_name">Tên sản phẩm</label>
        <input type="text" name="pdt_name" class="form-control">
    </div>
    <div class="form-group">
        <label for="pdt_ctg">Danh mục</label>
        <select name="pdt_ctg" id="pdt_ctg" class="form-control">
        <?php while($cata = mysqli_fetch_assoc($cata_info)){ ?>
        <option value="<?php echo $cata['id_dm'] ?>"><?php echo $cata['tendanhmuc'] ?></option>
        <?php }?>
        </select>
    </div>
    <!-- <div class="form-group">
        <label for="pdt_code">Mã vạch</label>
        <input type="text" name="pdt_code" class="form-control">
    </div> -->
    <div class="form-group">
        <label for="pdt_price">Giá</label>
        <input type="text" name="pdt_price" class="form-control">
    </div>
    <div class="form-group">
        <label for="xuatxu">Xuất xứ</label>
        <input type="text" name="xuatxu" class="form-control">
    </div>
    <div class="form-group">
        <label for="caygiong">Cây giống</label>
        <select name="caygiong" id="caygiong" class="form-control">
        <?php while($cg = mysqli_fetch_assoc($caygiong)){ ?>
        <option value="<?php echo $cg['id_cg'] ?>"><?php echo $cg['tencaygiong'] ?></option>
        <?php }?>
        </select>
    </div>
    <div class="form-group">
        <label for="vungsanxuat">Vùng sản xuất</label>
        <select name="vungsanxuat" id="vungsanxuat" class="form-control">
        <?php while($vsx = mysqli_fetch_assoc($vungsanxuat)){ ?>
        <option value="<?php echo $vsx['id_vung'] ?>"><?php echo $vsx['tenvung'] ?></option>
        <?php }?>
        </select>
    </div>
    <div class="form-group">
        <label for="vungsanxuat">Nhà xưởng sản xuất</label>
        <select name="nhaxuongsanxuat" id="nhaxuongsanxuat" class="form-control">
        <?php while($nx = mysqli_fetch_assoc($nhaxuong)){ ?>
            <option value="<?php echo $nx['id_nx'] ?>"><?php echo $nx['tennhaxuong'] ?></option>
        <?php }?>
        </select>
    </div>
    <div class="form-group">
        <label for="taikhoan">Người đại diện</label>
        <select name="taikhoan" id="taikhoan" class="form-control">
            <?php foreach($users as $user): ?>
                <?php if ($user['id_acc']== $nguoidang_id) { ?>
                <option value="<?php echo $user['id_acc']?>" selected><?php echo $user['hoten']  .' - '. $user['dienthoai']?></option>
            <?php } else { ?>
                <option value="<?php echo $user['id_acc'] ?>"><?php echo $user['hoten']  .' - '.  $user['dienthoai'] ?></option>
            <?php } ?>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="hdsd">Hướng dẫn sử dụng</label>
        <input type="text" name="hdsd" class="form-control">
    </div>
    
    <div class="form-group">
        <label for="dkbq">Điều kiện bảo quản</label>
        <input type="text" name="dkbq" class="form-control">
    </div>
    <div class="form-group">
        <label for="congdung">Công dụng</label>
        <input type="text" name="congdung" class="form-control">
    </div>
    <div class="form-group">
        <label for="pdt_des">Mô tả</label>
        <textarea name="pdt_des" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="pdt_img">Hình ảnh</label>
        <input type="file" name="pdt_img" class="form-control">
    </div>

    <div class="form-group">
        <label for="pdt_status">Trạng thái</label>
        <input type="text" name="pdt_status" class="form-control" readonly placeholder="Đang chờ xét duyệt" >
    </div>



    <input type="submit" value="Thêm nông sản" name="add_pdt" class="btn btn-block btn-primary">
</form>

<script>
    $(document).ready(function() {
        $("#pdt_ctg").select2();
        $("#caygiong").select2();
        $("#vungsanxuat").select2();
        $("#taikhoan").select2();
        $("#nhaxuongsanxuat").select2();
    });
</script>