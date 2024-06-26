<?php
if (isset($_SESSION['admin_id'])) {
    $nguoidang_id = $_SESSION['admin_id'];
} else {
    header("Location:../dangnhap.php");
    exit();
}
$catanx_info = $obj->display_catagory_nx();
$dn_info = $obj->display_dn();
$users = $obj->show_admin_user();
$vsx_info = $obj->vsxShow();
$user_array = array();
while ($user = mysqli_fetch_assoc($users)) {
    $user_array[] = $user;
}
if (isset($_POST['add_nx'])) {
    $rtn_msg = $obj->add_nx($_POST);
}

?>

<h2>Thêm nhà xưởng</h2>

<form action="" method="post" enctype="multipart/form-data" class="form">
    <div class="form-group">
        <div class="form-group">
            <input type="hidden" name="nguoidang" class="form-control" value="<?php echo $nguoidang_id ?>">
        </div>
        <div class="form-group">
            <label for="danhmuc_nx">Danh mục nhà xưởng</label>
            <select name="danhmuc_nx" id="danhmuc_nx" class="form-control">
                <?php while ($cata = mysqli_fetch_assoc($catanx_info)) { ?>
                    <option value="<?php echo $cata['id_dmnx'] ?>"><?php echo $cata['loainhaxuong'] ?></option>

                <?php } ?>
            </select>
        </div>

        <?php if (!empty($user_array)) : ?>
            <div class="form-group">
                <label for="lblnguoidaidien">Người đại diện</label>
                <select name="nguoidaidien" id="nguoidaidien" class="form-control">
                    <option value="">Chọn người đại diện</option>
                    <?php foreach ($users as $user) : ?>
                        <option value="<?= $user['id_acc'] ?>"><?= $user['hoten'] ?> - <?= $user['dienthoai'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        <?php endif; ?>

        <div class="form-group">
            <label for="doanhnghiep">Thuộc doanh nghiệp</label>
            <select name="doanhnghiep" id="doanhnghiep" class="form-control">
            <option value="">Chọn doanh nghiệp</option>
                <?php while ($dn = mysqli_fetch_assoc($dn_info)) { ?>
                    <option value="<?php echo $dn['id_dn'] ?>"><?php echo $dn['tendoanhnghiep'] ?></option>

                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="vsx">Thuộc vùng sản xuất</label>
            
            <select name="vsx" id="vsx" class="form-control">
            <option value="">Chọn vùng sản xuất</option>
                <?php while ($vsx = mysqli_fetch_assoc($vsx_info)) { ?>
                    <option value="<?php echo $vsx['id_vung'] ?>"><?php echo $vsx['tenvung'] ?></option>

                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="tennhaxuong">Tên nhà xưởng</label>
            <input type="text" name="tennhaxuong" class="form-control">
        </div>
        <div class="form-group">
            <label for="manhaxuong">Mã nhà xưởng</label>
            <input type="text" name="manhaxuong" class="form-control">
        </div>
        <div class="form-group">
            <label for="hinhanh">Hình ảnh </label>
            <div class="mb-3">
                <input type="file" name="hinhanh" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="sdt"> Số điện thoại</label>
                <input type="text" name="sdt" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control">
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
                <input type="text" name="diachi" class="form-control">
            </div>
            <div class="form-group">
                <label for="dientichtongthe">Diện tích tổng thể</label>
                <input type="text" name="dientichtongthe" class="form-control">
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
                <label for="thanhvien">Thành viên liên quan</label>
                                    <select name="thanhvien[]" id="thanhvien" class="form-control" multiple>
                                        <?php foreach ($users as $user) { ?>
                                            <option value="<?php echo $user['id_acc']; ?>"><?php echo $user['hoten']; ?></option>
                                        <?php } ?>
                                    </select>
            </div>  
            <div class="form-group">
                <label for="thongtin">Thông tin chung</label>
                <textarea name="thongtin" id="thongtin" rows="10" class="form-control"></textarea>
            </div>

            <input type="submit" value="Thêm nhà xưởng" name="add_nx" class="btn btn-block btn-primary">
</form>
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
<script>
    $(document).ready(function() {
        $("#thanhvien").select2();
    });
</script>