<?php 

ini_set("display_erros", "Off");
    $obj=new adminback();
    $catadn_info = $obj->display_catagory_dn();

     $id_dn = $_GET['id'];
        if($_GET['status']=='dnEdit'){
           $dn_info= $obj->show_dn_by_id($id_dn);
           $dn = mysqli_fetch_assoc($dn_info);

        }
    

    if(isset($_POST['update_dn'])){
        $update_msg = $obj->update_dn($_POST); 
    }


?>
<h4>Cập nhật doanh nghiệp</h4>


<form action="" method="post" enctype="multipart/form-data" class="form">
    <div class="form-group">
    <div class="form-group">
        <label for="danhmuc_dn">Danh mục doanh nghiệp</label>
        <select name="danhmuc_dn" class="form-control">
        <option value="">Chọn danh mục</option>

        <?php while($cata = mysqli_fetch_assoc($catadn_info)){ ?>
        <option value="<?php echo $cata['id_dmdn'] ?>"  ><?php echo $cata['tendanhnghiep'] ?></option>

        <?php }?>
        </select>
    </div>
        <label for="nguoidaidien">Người đại diện</label>
        <input type="text" name="nguoidaidien" class="form-control" value="<?php echo $dn['nguoidaidien']; ?>" >
    </div>

    <div class="form-group">
        <label for="tendoanhnghiep">Tên doanh nghiệp</label>
        <input type="text" name="tendoanhnghiep" class="form-control" value="<?php echo $dn['tendoanhnghiep']; ?>" >
    </div>
    <div class="form-group">
        <label for="hinhanh">Hình ảnh </label>
        <div class="mb-3">
        <img src="uploads/<?php echo $dn['hinhanh'];?>" style="width: 80px;" >
    </div>
        <input type="file" name="hinhanh" class="form-control">
    </div>
    <input type="hidden" name="id_dn" value="<?php echo $dn['id_dn']; ?>">
    <div class="form-group">
        <label for="sdt"> Số điện thoại</label>
        <input type="text" name="sdt" class="form-control" value="<?php echo $dn['sdt']; ?>">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="<?php echo $dn['email']; ?>">
    </div>
    <div class="form-group">
        <label for="diachi">Địa chỉ</label>
        <input type="text" name="diachi" class="form-control" value="<?php echo $dn['diachi']; ?>">
    </div>
    <div class="form-group">
        <label for="masothue">Mã số thuế</label>
        <input type="text" name="masothue" class="form-control" value="<?php echo $dn['masothue']; ?>">
    </div>
    <div class="form-group">
        <label for="giayphepkinhdoanh">Giấy phép kinh doanh</label>
        <input type="text" name="giayphepkinhdoanh" class="form-control" value="<?php echo $dn['giayphepkinhdoanh']; ?>">
    </div>
    <div class="form-group">
        <label for="giaychungnhan">Giấy chứng nhận</label>
        <input type="text" name="giaychungnhan" class="form-control" value="<?php echo $dn['giaychungnhan']; ?>">
    <div class="form-group">
        <label for="giaykiemdinh">Giấy kiểm định</label>
        <input type="text" name="giaykiemdinh" class="form-control" value="<?php echo $dn['giaykiemdinh']; ?>">
    </div>
    <div class="form-group">
        <label for="thongtinchung">Thông tin chung</label>
        <input type="text" name="thongtinchung" class="form-control" value="<?php echo $dn['thongtinchung']; ?>">
    </div>
    <input type="submit" value="Cập nhật" name="update_dn" class="btn btn-block btn-primary">
</form>