
<?php 
    if(isset($_GET['trangthai'])){
        if($_GET['trangthai']=='edit'){
            $id = $_GET['id'];
           $catadn = $obj->display_cata_dn_ByID($id);
        }
    }

    if(isset($_POST['update_ctg_dn'])){
        $up_msg = $obj->updata_catagory_dn($_POST);
    }
?>


<h2>Chỉnh sửa Danh mục danh nghiệp</h2>

<h6 class="">

</h6>

</h4>
<form action="" method="post">


    <div class="form-group">
        <label for="dn_ctg_name">Tên danh mục danh nghiệp</label>
        <input type="text" name="dn_ctg_name" class="form-control" value="<?php echo $catadn['tendoanhnghiep'] ?>">
    </div>
    
    <input type="hidden" name="dn_ctg_id" value="<?php echo $catadn['id_dmdn'] ?>" >

    <input type="submit" value="Cập nhật" name="update_ctg_dn" class="btn btn-primary" >

</form>


