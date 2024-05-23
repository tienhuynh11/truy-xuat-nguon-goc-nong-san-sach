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
    $dn = $obj->display_dn();
    $doanhnghiep = array();
    while($dn_ftecth = mysqli_fetch_assoc($dn)){
        $doanhnghiep[]=$dn_ftecth;
    }

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
        <label for="tensanpham">Tên sản phẩm</label>
        <input type="tensanpham" name="tensanpham" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="danhmuc">Danh mục</label>
        <select name="pdt_ctg" id="pdt_ctg" class="form-control">
            <option value="">Chọn danh mục nông sản</option>
            <?php while($cata = mysqli_fetch_assoc($cata_info)){ ?>
                <option value="<?php echo $cata['id_dm'] ?>"><?php echo $cata['tendanhmuc'] ?></option>
            <?php }?>
        </select>
    </div>
    <!-- <div class="form-group">
        <label for="mavach">Mã vạch</label>
        <input type="text" name="mavach" class="form-control" required>
    </div> -->
    <div class="form-group">
        <label for="pdt_price">Giá</label>
        <input type="text" name="pdt_price" class="form-control">
    </div>
    <div class="form-group">
        <label for="pdt_img">Hình ảnh</label>
        <input type="file" name="pdt_img" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="xuatxu">Xuất xứ</label>
        <input type="text" name="xuatxu" class="form-control">
    </div>
    <div class="form-group">
        <label for="caygiong">Cây giống</label>
        <select name="caygiong" id="caygiong" class="form-control">
            <option value="">Chọn cây giống</option>
            <?php while($cg = mysqli_fetch_assoc($caygiong)){ ?>
            <option value="<?php echo $cg['id_cg'] ?>"><?php echo $cg['tencaygiong'] ?></option>
            <?php }?>
        </select>
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
        <label for="nhaxuongsanxuat">Nhà xưởng sản xuất</label>
        <select name="nhaxuongsanxuat" id="nhaxuongsanxuat" class="form-control">
            <option value="">Chọn nhà xưởng sản xuất</option>
            <?php while($nx = mysqli_fetch_assoc($nhaxuong)){ ?>
                <option value="<?php echo $nx['id_nx'] ?>"><?php echo $nx['tennhaxuong'] ?></option>
            <?php }?>
        </select>
    </div>
    <div class="form-group">
        <label for="nhasanxuat">Nhà sản xuất</label>
        <select name="nhasanxuat" id="nhasanxuat" class="form-control">
            <option value="">Chọn nhà sản xuất</option>
            <?php foreach($doanhnghiep as $dn){ ?>
                <option value="<?php echo $dn['id_dn'] ?>"><?php echo $dn['tendoanhnghiep'] ?></option>
            <?php }?>
        </select>
    </div>
    <div class="form-group">
        <label for="nhaxuatkhau">Nhà xuất khẩu</label>
        <select name="nhaxuatkhau" id="nhaxuatkhau" class="form-control">
            <option value="">Chọn nhà xuất khẩu</option>
            <?php foreach($doanhnghiep as $dn){ ?>
                <option value="<?php echo $dn['id_dn'] ?>"><?php echo $dn['tendoanhnghiep'] ?></option>
            <?php }?>
        </select>
    </div>
    <div class="form-group">
        <label for="nhanhapkhau">Nhà nhập khẩu</label>
        <select name="nhanhapkhau" id="nhanhapkhau" class="form-control">
            <option value="">Chọn nhà nhập khẩu</option>
            <?php foreach($doanhnghiep as $dn){ ?>
                <option value="<?php echo $dn['id_dn'] ?>"><?php echo $dn['tendoanhnghiep'] ?></option>
            <?php }?>
        </select>
    </div>
    <div class="form-group">
        <label for="nhaphanphoi">Nhà phân phối</label>
        <select name="nhaphanphoi" id="nhaphanphoi" class="form-control">
            <option value="">Chọn nhà phân phối</option>
            <?php foreach($doanhnghiep as $dn){ ?>
                <option value="<?php echo $dn['id_dn'] ?>"><?php echo $dn['tendoanhnghiep'] ?></option>
            <?php }?>
        </select>
    </div>
    <div class="form-group">
        <label for="nhavanchuyen">Nhà vận chuyển</label>
        <select name="nhavanchuyen" id="nhavanchuyen" class="form-control">
            <option value="">Chọn nhà vận chuyển</option>
            <?php foreach($doanhnghiep as $dn){ ?>
                <option value="<?php echo $dn['id_dn'] ?>"><?php echo $dn['tendoanhnghiep'] ?></option>
            <?php }?>
        </select>
    </div>
    <div class="form-group">
        <label for="taikhoan">Người quản lý</label>
        <select name="taikhoan" id="taikhoan" class="form-control">
            <option value="">Chọn người quản lý</option>
            <?php foreach($users as $user): ?>
            <option value="<?php echo $user['id_acc'] ?>"><?php echo $user['hoten']  .' - '.  $user['dienthoai'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>    
    <div class="form-group">
        <label for="dkbq">Điều kiện bảo quản</label>
        <input type="text" name="dkbq" class="form-control">
    </div>
    <div class="form-group">
        <label for="congdung">Công dụng</label>
        <textarea name="congdung" cols="30" rows="5" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="hdsd">Hướng dẫn sử dụng</label>
        <textarea name="hdsd" cols="30" rows="5" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="thanhphan">Thành phần</label>
        <textarea name="thanhphan" cols="30" rows="5" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="pdt_des">Mô tả</label>
        <textarea name="pdt_des" cols="30" rows="5" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="hinhchungnhan">Hình chứng nhận</label>
        <input type="file" name="hinhchungnhan" class="form-control" required >
    </div><div class="form-group">
        <label for="hinhkiemdinh">Hình kiểm định</label>
        <input type="file" name="hinhkiemdinh" class="form-control" required>
    </div>
    <!-- <div class="form-group">
        <label for="pdt_status">Trạng thái</label>
        <input type="text" name="pdt_status" class="form-control" readonly placeholder="Đã xét duyệt" >
    </div> -->



    <input type="submit" value="Thêm nông sản" name="add_pdt" class="btn btn-block btn-primary">
</form>

<script>
    $(document).ready(function() {
        $("#pdt_ctg").select2();
        $("#caygiong").select2();
        $("#vungsanxuat").select2();
        $("#taikhoan").select2();
        $("#nhaxuongsanxuat").select2();
        $("#nhasanxuat").select2();
        $("#nhaxuatkhau").select2();
        $("#nhanhapkhau").select2();
        $("#nhaphanphoi").select2();
        $("#nhavanchuyen").select2();

    });
</script>