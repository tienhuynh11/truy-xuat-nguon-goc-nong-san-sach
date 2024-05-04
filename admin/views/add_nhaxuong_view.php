
<?php 
    $catanx_info = $obj->display_catagory_nx();
    $dn_info=$obj->display_dn();
    $users = $obj->show_admin_user();
    $vsx_info=$obj->vsxShow();
    $user_array = array();
    while($user = mysqli_fetch_assoc($users)){
        $user_array[] = $user;
    }     
    if(isset($_POST['add_nx'])){
        $rtn_msg = $obj->add_nx($_POST);
    }
    
?>

<h2>Thêm nhà xưởng</h2>

<form action="" method="post" enctype="multipart/form-data" class="form">
<div class="form-group">
    <div class="form-group">
        <label for="danhmuc_nx">Danh mục nhà xưởng</label>
        <select name="danhmuc_nx" id="danhmuc_nx" class="form-control" >
        <?php while($cata = mysqli_fetch_assoc($catanx_info)){ ?>
        <option value="<?php echo $cata['id_dmnx'] ?>"  ><?php echo $cata['loainhaxuong'] ?></option>

        <?php }?>
        </select>
    </div>

    <?php if (!empty($user_array)): ?>
    <div class="form-group">
        <label for="lblnguoidaidien">Người đại diện</label>
        <select name="nguoidaidien" id="nguoidaidien" class="form-control" >
            <?php foreach($users as $user): ?>
                <option value="<?= $user['id_acc'] ?>"><?= $user['hoten'] ?> - <?= $user['dienthoai'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <?php endif; ?>
    
    <div class="form-group">
        <label for="doanhnghiep">Doanh nghiệp</label>
        <select name="doanhnghiep" id="doanhnghiep" class="form-control" >
        <?php while($dn = mysqli_fetch_assoc($dn_info)){ ?>
        <option value="<?php echo $dn['id_dn'] ?>"  ><?php echo $dn['tendoanhnghiep'] ?></option>

        <?php }?>
        </select>
    </div>
    <div class="form-group">
        <label for="vsx">Vùng sản xuất</label>
        <select name="vsx"  id="vsx" class="form-control" >
        <?php while($vsx = mysqli_fetch_assoc($vsx_info)){ ?>
        <option value="<?php echo $vsx['id_vung'] ?>"  ><?php echo $vsx['tenvung'] ?></option>

        <?php }?>
        </select>
    </div>
    <div class="form-group">
        <label for="tennhaxuong">Tên nhà xưởng</label>
        <input type="text" name="tennhaxuong" class="form-control"  >
    </div>
    <div class="form-group">
        <label for="manhaxuong">Mã nhà xưởng</label>
        <input type="text" name="manhaxuong" class="form-control"  >
    </div>
    <div class="form-group">
        <label for="hinhanh">Hình ảnh </label>
        <div class="mb-3">
        <input type="file" name="hinhanh" class="form-control" required >
    </div>
    <div class="form-group">
        <label for="sdt"> Số điện thoại</label>
        <input type="text" name="sdt" class="form-control" >
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" >
    </div>
    <div class="form-group">
        <label for="diachi">Địa chỉ</label>
        <input type="text" name="diachi" class="form-control" >
    </div>
    <div class="form-group">
        <label for="dientichtongthe">Diện tích tổng thể</label>
        <input type="text" name="dientichtongthe" class="form-control" >
    </div>
    <div class="form-group">
        <label for="giayphepkinhdoanh">Giấy phép kinh doanh</label>
        <input type="file" name="giayphepkinhdoanh" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="giaychungnhan">Giấy chứng nhận</label>
        <input type="file" name="giaychungnhan" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="giaykiemdinh">Giấy kiểm định</label>
        <input type="file" name="giaykiemdinh" class="form-control" required>
    </div>
    <div class="form-group">
        <label for="thongtin">Thông tin chung</label>
        <input type="text" name="thongtin" class="form-control" >
    </div>

    <input type="submit" value="Thêm nhà xưởng" name="add_nx" class="btn btn-block btn-primary">
</form>
<script>
    $(document).ready(function() {
        $("#danhmuc_nx").select2();
        $("#nguoidaidien").select2();
        $("#doanhnghiep").select2();
        $("#vsx").select2();
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