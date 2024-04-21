<?php 
    if(isset($_GET['status'])){
        $id_dmdn = $_GET['id'];
        if($_GET['status']=="dmdnedit"){
           $dmdn_info= $obj->show_dmdn_by_id($id_dmdn);
           $dmdn = mysqli_fetch_assoc($dmdn_info);
        }
    }

    if(isset($_POST['update_dmdn'])){
       $update_msg =  $obj->updata_catagory_dn($_POST);
       if($update_msg == "Update successful!") {
        header("Location: manage_dmdn.php"); 
        exit(); 
    }
    }
?>

<div class="container">
    <h4>Chỉnh sửa danh mục doanh nghiệp</h4>

    <h6>
        <?php 
            if(isset( $update_msg)){
                echo  $update_msg;
            }
        ?>
    </h6>
<form action="" method="POST"  enctype="multipart/form-data" class="form" >
    <div class="form-group">
        <h4>Tên danh mục danh nghiệp</h4>
        <input type="text" name="dn_ctg_name" class="form-control" value="<?php echo $dmdn['tendoanhnghiep'] ?>" required>
    </div>

    <input type="hidden" name="dn_ctg_id" value="<?php echo $dmdn['id_dmdn'] ?>">
 
    <div class="form-group">
        <input type="submit" name="update_dmdn" class="btn btn-primary" value="Cập nhật">
    </div>
</form>
</div>