<?php 

    if(isset($_POST['add_ctg_nx'])){
      $rtnMsg =   $obj->add_catagory_nx($_POST);
    }
?>


<h2>Thêm danh mục nhà xưởng</h2>

<h4 class="text-success"> <?php if(isset($rtnMsg)){ echo $rtnMsg; } ?> 

</h4>
<form action="" method="post">


    <div class="form-group">
        <label for="nhaxuong">Loại nhà xưởng</label>
        <input type="text" name="nhaxuong" class="form-control">
    </div>
    <input type="submit" value="Thêm danh mục danh nghiệp" name="add_ctg_nx" class="btn btn-primary" >

</form>