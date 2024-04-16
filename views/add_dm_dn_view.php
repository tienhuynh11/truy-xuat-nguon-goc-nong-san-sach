<?php 

    if(isset($_POST['add_ctg_dn'])){
      $rtnMsg =   $obj->add_catagory_dn($_POST);
    }
?>


<h2>Thêm danh mục danh nghiệp</h2>

<h4 class="text-success"> <?php if(isset($rtnMsg)){ echo $rtnMsg; } ?> 

</h4>
<form action="" method="post">


    <div class="form-group">
        <label for="ctgdn_name">Tên danh mục</label>
        <input type="text" name="ctgdn_name" class="form-control">
    </div>
    <input type="submit" value="Thêm danh mục danh nghiệp" name="add_ctg_dn" class="btn btn-primary" >

</form>