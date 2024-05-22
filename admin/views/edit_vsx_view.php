<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == "edit") {
        $slide_id = $_GET['id'];
    }
}
$users = $obj->show_admin_user();
$row = $obj->vsx_By_id($slide_id);
$slide = mysqli_fetch_assoc($row);
$nk_info=$obj->show_nhatky();
if (isset($_POST['update_vsx_btn'])) {
    $slider_msg =  $obj->vsx_update($_POST);
}
?>

<h2>Chỉnh sửa vùng sản xuất</h2>


<form action="" method="post" enctype="multipart/form-data" class="form">


    <h4>Vùng số: <?php echo $slide['id_vung'] ?></h4>

    <input type="hidden" value="<?php echo $slide['id_vung'] ?>" name="id_vung">
    <div class="form-group">
        <label for="tenvung">Tên vùng</label>
        <input type="text" name="tenvung" class="form-control" value="<?php echo $slide['tenvung'] ?>">
    </div>

    <div class="form-group">
        <label for="mavung">Mã vùng</label>
        <input type="text" name="mavung" class="form-control" value="<?php echo $slide['mavung'] ?>">
    </div>
    <div class="form-group">
    <label for="nguoidang">Người đại diện</label>
        <select name="nguoidang" id="nguoidang" class="form-control">
        <?php while($user = mysqli_fetch_assoc($users)) { ?>
            <?php if ($user['id_acc'] == $slide['nguoidang']) { ?>
                <option value="<?php echo $user['id_acc'] ?>" selected><?php echo $user['hoten'].'-'.$user['dienthoai']  ?></option>
            <?php } else { ?>
                <option value="<?php echo $user['id_acc'] ?>"><?php echo $user['hoten'].'-'.$user['dienthoai']  ?></option>
            <?php } ?>
        <?php } ?>
        </select>
    </div>
    <div class="form-group">
    <label for="nhatky">Nhật ký</label>
        <select name="nhatky" id="nhatky" class="form-control">
        <?php while($nk = mysqli_fetch_assoc($nk_info)) { ?>
            <?php if ($nk['id_nk'] == $slide['nhatky']) { ?>
                <option value="<?php echo $nk['id_nk'] ?>" selected><?php echo $nk['tennhatky'] ?></option>
            <?php } else { ?>
                <option value="<?php echo $nk['id_nk'] ?>"><?php echo $nk['tennhatky'] ?></option>
            <?php } ?>
        <?php } ?>
        </select>
    </div>


    <div class="form-group">
        <label for="img">HÌnh ảnh <span class="text-warning">(Hỉnh ảnh phải rộng:1920px và cao: 550px )</span> </label>
        <div class="mb-3">
            <img src="uploads/<?php echo $slide['hinhanh']?>" style="width: 80px;" >
            <input type="file" name="img" class="form-control" value="<?= $slide['hinhanh']?>">
        </div>
    </div>

   

    <div class="form-group">
        <label for="bando">Bản đồ</label>
        <textarea name="bando" id="bando" class="form-control" cols="20" rows="5"><?php echo $slide['bando'] ?></textarea>
    </div>
    <div class="form-group">
        <label for="sdt">Số điện thoại</label>
        <input type="text" name="sdt" class="form-control" value="<?php echo $slide['sdt'] ?>">
    </div>
    <div class="form-group">
        <label for="thoigiantrong">Thời gian nuôi trồng</label>
        <input type="text" name="thoigiantrong" class="form-control" value="<?php echo $slide['thoigiannuoitrong'] ?>">
    </div>

    <div class="form-group">
        <label for="dc">Địa chỉ</label>
        <input type="text" name="dc" class="form-control" value="<?php echo $slide['diachi'] ?>">
    </div>
    <div class="form-group">
        <label for="dientich">Diện tích</label>
        <input type="text" name="dientich" class="form-control" value="<?php echo $slide['dientich'] ?>">
    </div>
    <div class="form-group">
    <label for="thanhvien">Thành viên </label>
    <select name="thanhvien[]" id="thanhvien" class="form-control" multiple>
        <?php
      
       $selected_members_str = str_replace(['"', ''], '', $slide['thanhvien']);
       $selected_members = json_decode($selected_members_str, true);
        foreach($users as $user): ?>
            <?php if (in_array($user['id_acc'], $selected_members)) { ?>
                <option value="<?php echo $user['id_acc'] ?>" selected><?php echo $user['hoten'] ?></option>
            <?php } else { ?>
                <option value="<?php echo $user['id_acc'] ?>"><?php echo $user['hoten'] ?></option>
            <?php } ?>
        <?php endforeach; ?>
    </select>
</div>
    <div class="form-group">
        <label for="thongtin">Thông tin</label>
        <input type="text" name="thongtin" class="form-control" value="<?php echo $slide['thongtin'] ?>">
    </div>
    <input type="submit" value="Cập nhật" name="update_vsx_btn" class="btn btn-primary">

</form>
<script>
    $(document).ready(function() {
        $("#nguoidang").select2();
        $("#nhatky").select2();
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
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
   
   color: #171717;
}
</style>