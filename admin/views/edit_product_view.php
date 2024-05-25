<?php

ini_set("display_erros", "Off");
$obj = new adminback();
$cata_info = $obj->p_display_catagory();
$caygiong = $obj->show_caygiong();
$users = $obj->show_admin_user();
$vungsanxuat = $obj->vsxShow();
$dn_info = $obj->display_dn();
$nx_info = $obj->show_nhaxuong();
if (isset($_GET['trangthai'])) {
    $id = $_GET['id'];
    if ($_GET['trangthai'] == 'edit') {
        $pdt_info = $obj->edit_product($id);
        $pdt = mysqli_fetch_assoc($pdt_info);
    }
}

if (isset($_POST['update_pdt'])) {
    $update_msg = $obj->update_product($_POST);
}


?>
<h4>Cập nhật nông sản</h4>

<?php
if (isset($update_msg)) {
    echo $update_msg;
}
?>
<form action="" method="post" enctype="multipart/form-data" class="form">
    <div class="form-group">
        <label for="pdt_name">Tên sản phẩm</label>
        <input type="text" name="u_pdt_name" class="form-control" value="<?php echo $pdt['tensanpham'] ?>">
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
        <textarea name="u_pdt_des" cols="30" rows="10" class="form-control"><?php echo $pdt['mota'] ?> </textarea>
    </div>
    <div class="form-group">
        <label for="nhasanxuat">Nhà sản xuất</label>
        <select name="nhasanxuat" id="nhasanxuat" class="form-control">
            <option value="">Chọn nhà sản xuất</option>
            <?php foreach ($dn_info as $dn) : ?>
                <?php if ($dn['id_dn'] == $pdt['nhasanxuat']) { ?>
                    <option value="<?php echo $dn['id_dn'] ?>" selected><?php echo $dn['tendoanhnghiep'] ?></option>
                <?php } else { ?>
                    <option value="<?php echo $dn['id_dn'] ?>"><?php echo $dn['tendoanhnghiep']   ?></option>
                <?php } ?>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="nhaxuatkhau">Nhà xuất khẩu</label>
        <select name="nhaxuatkhau" id="nhaxuatkhau" class="form-control">
            <option value="">Chọn nhà xuất khẩu</option>
            <?php foreach ($dn_info as $dn) : ?>
                <?php if ($dn['id_dn'] == $pdt['nhaxuatkhau']) { ?>
                    <option value="<?php echo $dn['id_dn'] ?>" selected><?php echo $dn['tendoanhnghiep'] ?></option>
                <?php } else { ?>
                    <option value="<?php echo $dn['id_dn'] ?>"><?php echo $dn['tendoanhnghiep']   ?></option>
                <?php } ?>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="nhanhapkhau">Nhà nhập khẩu</label>
        <select name="nhanhapkhau" id="nhanhapkhau" class="form-control">
            <option value="">Chọn nhà nhập khẩu</option>
            <?php foreach ($dn_info as $dn) : ?>
                <?php if ($dn['id_dn'] == $pdt['nhanhapkhau']) { ?>
                    <option value="<?php echo $dn['id_dn'] ?>" selected><?php echo $dn['tendoanhnghiep'] ?></option>
                <?php } else { ?>
                    <option value="<?php echo $dn['id_dn'] ?>"><?php echo $dn['tendoanhnghiep']   ?></option>
                <?php } ?>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="nhaphanphoi">Nhà phân phối</label>
        <select name="nhaphanphoi" id="nhaphanphoi" class="form-control">
            <option value="">Chọn nhà phân phối</option>
            <?php foreach ($dn_info as $dn) : ?>
                <?php if ($dn['id_dn'] == $pdt['nhaphanphoi']) { ?>
                    <option value="<?php echo $dn['id_dn'] ?>" selected><?php echo $dn['tendoanhnghiep'] ?></option>
                <?php } else { ?>
                    <option value="<?php echo $dn['id_dn'] ?>"><?php echo $dn['tendoanhnghiep']   ?></option>
                <?php } ?>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="nhavanchuyen">Nhà vận chuyển</label>
        <select name="nhavanchuyen" id="nhavanchuyen" class="form-control">
            <option value="">Chọn nhà vận chuyển</option>
            <?php foreach ($dn_info as $dn) : ?>
                <?php if ($dn['id_dn'] == $pdt['nhavanchuyen']) { ?>
                    <option value="<?php echo $dn['id_dn'] ?>" selected><?php echo $dn['tendoanhnghiep'] ?></option>
                <?php } else { ?>
                    <option value="<?php echo $dn['id_dn'] ?>"><?php echo $dn['tendoanhnghiep']   ?></option>
                <?php } ?>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="nhaxuong">Nhà xưởng</label>
        <select name="nhaxuong" id="nhaxuong" class="form-control">
            <option value="">Chọn nhà xưởng</option>
            <?php while ($nx = mysqli_fetch_assoc($nx_info)) { ?>
                <?php if ($nx['id_nx'] == $pdt['nhaxuong']) { ?>
                    <option value="<?php echo $nx['id_nx'] ?>" selected><?php echo $nx['tennhaxuong'] ?></option>
                <?php } else { ?>
                    <option value="<?php echo $nx['id_nx'] ?>"><?php echo $nx['tennhaxuong'] ?></option>
                <?php } ?>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="taikhoan">Người đại diện</label>
        <option value="">Chọn người đại diện</option>
        <select name="taikhoan" id="taikhoan" class="form-control">
            <?php while ($user = mysqli_fetch_assoc($users)) { ?>
                <?php if ($user['id_acc'] == $pdt['taikhoan']) { ?>
                    <option value="<?php echo $user['id_acc'] ?>" selected><?php echo $user['hoten'] . '-' . $user['dienthoai']  ?></option>
                <?php } else { ?>
                    <option value="<?php echo $user['id_acc'] ?>"><?php echo $user['hoten'] . '-' . $user['dienthoai']  ?></option>
                <?php } ?>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="pdt_ctg">Danh mục</label>
        <select name="u_pdt_ctg" id="pdt_ctg" class="form-control">
            <?php while ($cata = mysqli_fetch_assoc($cata_info)) { ?>
                <?php if ($cata['id_dm'] == $pdt['danhmuc']) { ?>
                    <option value="<?php echo $cata['id_dm'] ?>" selected><?php echo $cata['tendanhmuc'] ?></option>
                <?php } else { ?>
                    <option value="<?php echo $cata['id_dm'] ?>"><?php echo $cata['tendanhmuc'] ?></option>
                <?php } ?>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="caygiong">Cây giống</label>
        <select name="caygiong" id="caygiong" class="form-control">
            <option value="">Chọn cây giống</option>
            <?php while ($cg = mysqli_fetch_assoc($caygiong)) { ?>
                <?php if ($cg['id_cg'] == $pdt['caygiong']) { ?>
                    <option value="<?php echo $cg['id_cg'] ?>" selected><?php echo $cg['tencaygiong'] ?></option>
                <?php } else { ?>
                    <option value="<?php echo $cg['id_cg'] ?>"><?php echo $cg['tencaygiong'] ?></option>
                <?php } ?>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="vungsanxuat">Vùng sản xuất</label>
        <select name="vungsanxuat" id="vungsanxuat" class="form-control">
            <option value="">Chọn vùng sản xuất</option>
            <?php while ($vsx = mysqli_fetch_assoc($vungsanxuat)) { ?>
                <?php if ($vsx['id_vung'] == $pdt['vungsanxuat']) { ?>
                    <option value="<?php echo $vsx['id_vung'] ?>" selected><?php echo $vsx['tenvung'] ?></option>
                <?php } else { ?>
                    <option value="<?php echo $vsx['id_vung'] ?>"><?php echo $vsx['tenvung'] ?></option>
                <?php } ?>
            <?php } ?>
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
        <input type="text" name="congdung" class="form-control" value="<?php echo $pdt['congdung'] ?>">
    </div>
    <div class="form-group">
        <label for="thanhphan">Thành phần</label>
        <input type="text" name="thanhphan" class="form-control" value="<?php echo $pdt['thanhphan'] ?>">
    </div>
    <div class="form-group">
        <label for="pdt_img">Hình ảnh </label>
        <div class="mb-3">
            <img src="uploads/<?php echo $pdt['hinhanh'] ?>" style="width: 80px;">
        </div>
        <input type="file" name="u_pdt_img" class="form-control">
    </div>
    <div class="form-group">
        <label for="hinhchungnhan">Hình chứng nhận </label>
        <div class="mb-3">
            <img src="uploads/<?php echo $pdt['hinhchungnhan'] ?>" style="width: 80px;">
        </div>
        <input type="file" name="hinhchungnhan" class="form-control">
    </div>
    <div class="form-group">
        <label for="hinhkiemdinh">Hình kiểm định </label>
        <div class="mb-3">
            <img src="uploads/<?php echo $pdt['hinhkiemdinh'] ?>" style="width: 80px;">
        </div>
        <input type="file" name="hinhkiemdinh" class="form-control">
    </div>



    <input type="submit" value="Cập nhật nông sản" name="update_pdt" class="btn btn-block btn-primary">
</form>

<script>
    $(document).ready(function() {
        $("#pdt_ctg").select2();
        $("#caygiong").select2();
        $("#vungsanxuat").select2();
        $("#taikhoan").select2();
        $("#nhasanxuat").select2();
        $("#nhaxuong").select2();
        $("#nhaxuatkhau").select2();
        $("#nhanhapkhau").select2();
        $("#nhaphanphoi").select2();
        $("#nhavanchuyen").select2();
    });
</script>
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
</style>