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
$users = $obj->show_admin_user();
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
    <div class="form-group">
        <label for="nguoidang">Người đại diện</label>
        <select name="nguoidang" id="nguoidang" class="form-control">
            <?php foreach($users as $user): ?>
                <?php if ($user['id_acc']== $nguoidang_id) { ?>
                <option value="<?php echo $user['id_acc']?>" selected><?php echo $user['hoten']  .'-'. $user['dienthoai']?></option>
            <?php } else { ?>
                <option value="<?php echo $user['id_acc'] ?>"><?php echo $user['hoten']  .'-'.  $user['dienthoai'] ?></option>
            <?php } ?>
            <?php endforeach; ?>
        </select>
    </div>
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
<script>
    $(document).ready(function() {
        $("#nguoidang").select2();
      
    });
</script>