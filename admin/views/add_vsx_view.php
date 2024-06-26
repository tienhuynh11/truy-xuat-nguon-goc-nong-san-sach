<?php
if (isset($_SESSION['admin_id'])) {
    $nguoidang_id = $_SESSION['admin_id'];
} else {
    header("Location: login.php");
    exit();
}

?>
<style>
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        padding: 0 0 0 0;
        padding: .5rem .75rem;
        line-height: normal;
        border-radius: 2px;
        border: 1px solid #ccc;
        background-color: #fff;
    }

    .select2-container--default .select2-selection--single {
        border: none;
    }
    .select2-container--default .select2-selection--multiple .select2-selection__rendered {
    box-sizing: border-box;
    list-style: none;
    margin: 0;
    padding: .5rem .75rem;
    width: 100%;
    height: 25px;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice {
    color: #1b1919;
}
</style>
<?php


if (isset($_POST['add_vsx'])) {
    $rtn_msg = $obj->add_vsx($_POST);
}

$doanhnghiep = $obj->display_dn();
$doanhnghiep_array = array();
while ($dn = mysqli_fetch_assoc($doanhnghiep)) {
    $doanhnghiep_array[] = $dn;
}

$users = $obj->show_admin_user();
$user_array = array();
while ($user = mysqli_fetch_assoc($users)) {
    $user_array[] = $user;
}

$nhatky = $obj->show_nhatky();
$nhatkyarray = array();
while ($nk = mysqli_fetch_assoc($nhatky)) {
    $nhatky_array[] = $nk;
}

?>

<h2>Thêm vùng sản xuất</h2>
<h6 class="text-success">
    <?php
    if (isset($rtn_msg)) {
        echo $rtn_msg;
    }
    ?>

</h6>

<form action="" method="post" enctype="multipart/form-data" class="form">
    <div class="form-group">
        <label for="tenvung">Tên vùng</label>
        <input type="text" name="tenvung" class="form-control">
    </div>
    <div class="form-group">
        <label for="pdt_name">Mã vùng</label>
        <input type="text" name="mavung" class="form-control">
    </div>
    <div class="form-group">
        <label for="img">Hình ảnh:</label>
        <input type="file" name="img" class="form-control">
    </div>
    <div class="form-group">
        <label for="nguoidaidien">Người đại diện</label>
        <select name="nguoidaidien" id="nguoidaidien" class="form-control">
            <?php foreach ($users as $user) : ?>
                <?php if ($user['id_acc'] == $nguoidang_id) { ?>
                    <option value="<?php echo $user['id_acc'] ?>" selected><?php echo $user['hoten']  . '-' . $user['dienthoai'] ?></option>
                <?php } else { ?>
                    <option value="<?php echo $user['id_acc'] ?>"><?php echo $user['hoten']  . '-' .  $user['dienthoai'] ?></option>
                <?php } ?>
            <?php endforeach; ?>
        </select>
    </div>
    <?php if (!empty($user_array)) : ?>
        <div class="form-group">
            <label for="lblnhatky">Nhật ký</label>
            <select name="nhatky" id="nhatky" class="form-control">
                <option value="">Chọn nhật ký</option>
                <?php foreach ($nhatky as $nk) : ?>
                    <option value="<?= $nk['id_nk'] ?>"><?= $nk['tennhatky'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    <?php endif; ?>


    <div class="form-group">
        <label for="lbldienthoai">Điện thoại liên hệ</label>
        <input type="text" name="sdt" class="form-control">
    </div>
    <div class="row">
        <div class="col-md-4 form-group">
            <label for="lblprovince">Tỉnh/Thành phố</label>
            <select name="province" id="province" class="form-control" onchange="handleChange(this)">
                <option value="">Chọn tỉnh/thành phố</option>
            </select>
        </div>
        <div class="col-md-4 form-group">
            <label for="lbldistrict">Quận/Huyện</label>
            <select name="district" id="district" class="form-control" onchange="handleChangeDistrict(this)">
                <option value="">Chọn quận/huyện</option>
            </select>
        </div>
        <div class="col-md-4 form-group">
            <label for="lblwards">Phường/Xã</label>
            <select name="wards" id="wards" class="form-control">
                <option value="">Chọn xã/phường</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="diachi">Địa chỉ</label>
        <input class="form-control" type="text" name="diachi" id="diachi">
    </div>
    <div class="form-group">
        <label for="bando">Bản đồ</label>
        <textarea name="bando" id="bando" class="form-control" cols="30" rows="10"></textarea>
    </div>
    <!-- <div class="form-group">
        <label for="lblemail">Email</label>
        <input type="email" name="email" class="form-control">
    </div> -->

    <div class="form-group">
        <label for="dientich">Diện tích (ha)</label>
        <input type="text" name="dientich" class="form-control">
    </div>
    <!-- <div class="form-group">
        <label for="sanluong">Sản lượng (tấn)</label>
        <input type="text" name="sanluong" class="form-control">
    </div>
    <div class="form-group">
        <label for="soluongcay">Số lượng cây con</label>
        <input type="text" name="soluongcay" class="form-control">
    </div> -->
    <div class="form-group">
        <label for="thoigiantrong">Thời gian trồng</label>
        <input type="text" name="thoigiantrong" class="form-control">
    </div>
    <!-- <?php if (!empty($doanhnghiep_array)) : ?>
        <div class="form-group">
            <label for="lbldoanhnghiep">Thuộc doanh nghiệp</label>
            <select name="doanhnghiep" id="doanhnghiep" class="form-control">
                <?php foreach ($doanhnghiep as $dn) : ?>
                    <option value="<?= $dn['id_dn'] ?>"><?= $dn['tendoanhnghiep'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    <?php endif; ?> -->
    <div class="form-group">
        <label for="thanhvien">Thành viên liên quan</label>
                            <select name="thanhvien[]" id="thanhvien" class="form-control" multiple>
                                <?php foreach ($users as $user) { ?>
                                    <option value="<?php echo $user['id_acc']; ?>"><?php echo $user['hoten']; ?></option>
                                <?php } ?>
                            </select>
    </div> 
    <div class="form-group">
        <label for="thongtin">Thông tin</label>
        <textarea name="thongtin" id="thongtin" class="form-control" cols="30" rows="10"></textarea>
    </div>

    <!-- <div class="form-group">
        <label for="pdt_des">Mô tả</label>
        <textarea name="mota" cols="30" rows="10" class="form-control"></textarea>
    </div> -->

    <input type="submit" value="Thêm vùng sản xuất" name="add_vsx" class="btn btn-block btn-primary">
</form>
<script>
    $(document).ready(function() {
        
        $("#thanhvien").select2();
    });
</script>