<?php
    if(isset($_SESSION['admin_id'])) {
        $nguoidang_id = $_SESSION['admin_id'];
    } else {
        header("Location: login.php");
        exit();
    }

?>
<?php 
    if(isset($_POST['bv_add'])){
       
       $bv_msg =  $obj->add_bv($_POST);
       
    }
?>

<h2>Thêm bài viết</h2>



<div>
    <form action=""method="post" enctype="multipart/form-data" class="form">
        
    <input type="hidden" name="nguoidang" value="<?php echo $nguoidang_id ?>">
    <div class="form-group">
        <label for="tieude">Tiêu đề</label> 
        <input type="text" name="tieude" class="form-control">
    </div>

    <div class="form-group">
        <label for="noidung">Nội Dung</label>
       <textarea name="noidung" id="" cols="30" rows="10" class="form-control" ></textarea>
    </div>

    <div class="form-group">
        <label for="hinhanh">Hình ảnh</label>
        <input type="file" name="hinhanh" class="form-control">
    </div>

   

    <div class="form-group">
       
        <input type="submit" name="bv_add" class="btn btn-primary">
    </div>




       
    </form>
</div>
