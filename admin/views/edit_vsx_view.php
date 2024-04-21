<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == "edit") {
        $slide_id = $_GET['id'];
    }
}

$row = $obj->vsx_By_id($slide_id);
$slide = mysqli_fetch_assoc($row);

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
        <label for="img">HÌnh ảnh <span class="text-warning">(Hỉnh ảnh phải rộng:1920px và cao: 550px )</span> </label>
        <div class="mb-3">
        <img src="uploads/<?php echo $slide['hinhanh']?>" style="width: 80px;" >
        <input type="file" name="img" class="form-control" required>
    </div>

   

    <div class="form-group">
        <label for="sdt">Số điện thoại</label>
        <input type="text" name="sdt" class="form-control" value="<?php echo $slide['sdt'] ?>">
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
        <label for="thongtin">Thông tin</label>
        <input type="text" name="thongtin" class="form-control" value="<?php echo $slide['thongtin'] ?>">
    </div>


    





    <input type="submit" value="Cập nhật" name="update_vsx_btn" class="btn btn-primary">

</form>