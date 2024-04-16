
<?php 
    if(isset($_GET['trangthai'])){
        if($_GET['trangthai']=='edit'){
            $id = $_GET['id'];
           $cata = $obj->display_cataByID($id);
        }
    }

    if(isset($_POST['update_ctg'])){
        $up_msg = $obj->updata_catagory($_POST);
    }
?>


<h2>Chỉnh sửa Danh mục</h2>

<h6 class="">
    <?php if(isset($up_msg)){ echo $up_msg;} ?>
</h6>

</h4>
<form action="" method="post">


    <div class="form-group">
        <label for="u_ctg_name">Tên danh mục</label>
        <input type="text" name="u_ctg_name" class="form-control" value="<?php echo $cata['tendanhmuc'] ?>">
    </div>

    <!-- <div class="form-group">
        <label for="u_ctg_des">Catagory descriptioon</label>
        <input type="text" name="u_ctg_des" class="form-control"  value="<?php echo $cata['ctg_des'] ?>">
    </div> -->

    <div class="form-group">
        <label for="u_ctg_status">Trạng thái danh mục</label>
        <select name="u_ctg_status" class="form-control">
            <option value="hoatdong">Hoạt động </option>
            <option value="khonghoatdong">Không hoạt động</option>
        </select>
    </div>

    <input type="hidden" name="u_ctg_id" value="<?php echo $cata['id_dm'] ?>" >

    <input type="submit" value="Cập nhật" name="update_ctg" class="btn btn-primary" >

</form>


