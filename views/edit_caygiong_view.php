<?php 
    if(isset($_GET['status'])){
        $id_cg = $_GET['id'];
        if($_GET['status']=="cgEdit"){
           $cg_info= $obj->show_caygiong_by_id($id_cg);
           $cg = mysqli_fetch_assoc($cg_info);
        }
    }

    if(isset($_POST['update_cg'])){
       $update_msg =  $obj->update_caygiong($_POST);
       if($update_msg == "Update successful!") {
        header("Location: manage_caygiong.php"); 
        exit(); 
    }
    }
?>

<div class="container" >
    <h4>Chỉnh sửa thông tin Cây giống</h4>
<form action="" method="POST" enctype="multipart/form-data" class="form">
    <div class="form-group">
        <h4>Tên Cây giống</h4>
        <input type="text" name="tencaygiong" class="form-control" value="<?php echo $cg['tencaygiong'] ?>" required>
    </div>
    <div class="form-group">
        <h4>Mã cây giống</h4>
        <input type="text" name="macaygiong" class="form-control" value="<?php echo $cg['macaygiong'] ?>" required>
    </div>

    <div class="form-group">
        <h4>Mô tả</h4>
        <textarea name="mota" id="" cols="30" rows="10" class="form-control" > <?php echo $cg['mota'] ?></textarea>
    </div>
    <input type="hidden" name="id_cg" value="<?php echo $cg['id_cg'] ?>">
    <div class="form-group">
        <h4>Nhà sản xuất</h4>
        <input type="text" name="nhasanxuat" class="form-control" value="<?php echo $cg['nhasanxuat'] ?>" required>
    </div>
    <div class="form-group">
        <h4>Ngày sản xuất</h4>
        <input type="text" name="ngaysanxuat" class="form-control" value="<?php echo $cg['ngaysanxuat'] ?>" required>
    </div>
    <div class="form-group">
        <h4>Hạn sử dụng</h4>
        <input type="text" name="hansudung" class="form-control" value="<?php echo $cg['hansudung'] ?>" required>
    </div>
    <div class="form-group">
        <h4>Phương pháp trồng</h4>
        <input type="text" name="phuongphaptrong" class="form-control" value="<?php echo $cg['phuongphaptrong'] ?>" required>
    </div>
    <div class="form-group">
        <label for="img">Hình ảnh </label>
        <div class="mb-3">
        <img src="uploads/<?php echo $cg['hinhanh']?>" style="width: 80px;" >
    </div>
        <input type="file" name="hinhanh" class="form-control">
    </div>
    <div class="form-group">
        <h4>Liên hệ</h4>
        <input type="text" name="lienhe" class="form-control" value="<?php echo $cg['lienhe'] ?>" required>
    </div>
   
    <div class="form-group">
        <input type="submit" name="update_cg" class="btn btn-primary">
    </div>
</form>
</div>