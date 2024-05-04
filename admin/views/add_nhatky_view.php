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
 $product_info = $obj->display_product();
    if(isset($_POST['add_nk'])){
       $nk_msg =  $obj->add_nhatky($_POST);
       
    }
?>

<h2>Thêm Nhật ký</h2>

<h6 class="text-success">
   <?php 
     if(isset($nk_msg)){
         echo $nk_msg;
     }
   ?>

</h6>

<div>
    <form action="" method="post" enctype="multipart/form-data" class="form">
    <div class="form-group">
        <label for="sanpham">Sản phẩm</label>
        <select name="sanpham" id="sp" class="form-control">
        <?php while($pro = mysqli_fetch_assoc($product_info)){ ?>
        <option value="<?php echo $pro['id_sp']; ?>"  ><?php echo $pro['tensanpham'] ?></option>

        <?php }?>
        </select>
    </div>
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
        <label for="tennhatky">Tên nhật ký</label> 
        <input type="text" name="tennhatky" class="form-control">
    </div>

    <div class="form-group">
        <label for="chitiet">Chi tiết</label>
       <textarea name="chitiet" id="" cols="30" rows="10" class="form-control" ></textarea>
    </div>

    <div class="form-group">
        <label for="nk_img">Hình ảnh</label>
        <input type="file" name="nk_img" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit" name="add_nk" class="btn btn-primary">
    </div>




       
    </form>
</div>
<script>
    $(document).ready(function() {
        $("#sp").select2();
        $("#nguoidang").select2();
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