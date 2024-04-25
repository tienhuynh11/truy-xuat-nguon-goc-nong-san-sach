<?php 
    if(isset($_GET['status'])){
        $id_dmnx = $_GET['id'];
        if($_GET['status']=="dmnxedit"){
           $dmnx_info= $obj->show_dmnx_by_id($id_dmnx);
           $dmnx = mysqli_fetch_assoc($dmnx_info);
        }
    }

    if(isset($_POST['update_dmnx'])){
       $update_msg =  $obj->updata_catagory_nx($_POST);
       if($update_msg == "Update successful!") {
        header("Location: manage_dmnx.php"); 
        exit(); 
    }
    }
?>

<div class="container">
    <h4>Chỉnh sửa danh mục nhà xưởng</h4>

    <h6>
        <?php 
            if(isset( $update_msg)){
                echo  $update_msg;
            }
        ?>
    </h6>
<form action="" method="POST"  enctype="multipart/form-data" class="form" >
    <div class="form-group">
        <h4>Loại nhà xưởng</h4>
        <input type="text" name="nhaxuong" class="form-control" value="<?php echo $dmnx['loainhaxuong'] ?>" required>
    </div>

    <input type="hidden" name="id_nx" value="<?php echo $dmnx['id_dmnx'] ?>">
 
    <div class="form-group">
        <input type="submit" name="update_dmnx" class="btn btn-primary" value="Cập nhật">
    </div>
</form>
</div>