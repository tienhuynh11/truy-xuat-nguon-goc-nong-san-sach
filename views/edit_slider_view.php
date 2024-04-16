<?php
if (isset($_GET['status'])) {
    if ($_GET['status'] == "edit") {
        $slide_id = $_GET['id'];
    }
}

$row = $obj->slide_By_id($slide_id);
$slide = mysqli_fetch_assoc($row);

if (isset($_POST['update_slider_btn'])) {
    $slider_msg =  $obj->slider_update($_POST);
}
?>

<h2>Edit Slider</h2>


<h4>
    <?php
    if (isset($slider_msg)) {
        echo $slider_msg;
    }
    ?>
</h4>

<form action="" method="post" enctype="multipart/form-data">


    <h4>Vùng số: <?php echo $slide['id_vung'] ?></h4>

    <input type="hidden" value="<?php echo $slide['id_vung'] ?>" name="id_vung">


    <div class="form-group">
        <label for="first_line">Mã vùng</label>
        <input type="text" name="mavung" class="form-control" value="<?php echo $slide['mavung'] ?>">
    </div>

    <div class="form-group">
        <label for="slider_img">HÌnh ảnh <span class="text-warning">(Hỉnh ảnh phải rộng:1920px và cao: 550px )</span> </label>
        <input type="file" name="img" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="third_line">Người đăng  </label>
        <input type="text" name="nguoidang" class="form-control" value="<?php echo $slide['nguoidang'] ?>">
    </div>

    <div class="form-group">
        <label for="btn_left">Số điện thoại</label>
        <input type="text" name="sdt" class="form-control" value="<?php echo $slide['sdt'] ?>">
    </div>

    <div class="form-group">
        <label for="btn_right">Địa chỉ</label>
        <input type="text" name="dc" class="form-control" value="<?php echo $slide['diachi'] ?>">
    </div>


    





    <input type="submit" value="Cập nhật" name="update_slider_btn" class="btn btn-primary">

</form>