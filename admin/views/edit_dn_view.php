<?php 

ini_set("display_erros", "Off");
    $obj=new adminback();
    $catadn_info = $obj->display_catagory_dn();
    $users = $obj->show_admin_user();
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
        <option value="<?php echo $cata['id_dmdn'] ?>"  ><?php echo $cata['tendoanhnghiep'] ?></option>

        <?php }?>
        </select>
    </div>
   
    <div class="form-group">
        <label for="lblnguoidaidien">Người đại diện</label>
        <select name="nguoidaidien" id="nguoidaidien" class="form-control">
            <?php foreach($users as $user): ?>
                <option value="<?= $user['id_acc'] ?>"><?= $user['hoten'] ?> - <?= $user['dienthoai'] ?></option>
            <?php endforeach; ?>
        </select>
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
        <img src="uploads/<?php echo $dn['giayphepkinhdoanh'];?>" style="width: 80px;" >
        <input type="file" name="giayphepkinhdoanh" class="form-control">
    </div>
    <div class="form-group">
        <label for="giaychungnhan">Giấy chứng nhận</label>
        <img src="uploads/<?php echo $dn['giaychungnhan'];?>" style="width: 80px;" >
        <input type="file" name="giaychungnhan" class="form-control">
    <div class="form-group">
        <label for="giaykiemdinh">Giấy kiểm định</label>
        <img src="uploads/<?php echo $dn['giaykiemdinh'];?>" style="width: 80px;" >
        <input type="file" name="giaykiemdinh" class="form-control">
    </div>
    <div class="form-group">
        <label for="thongtinchung">Thông tin chung</label>
        <input type="text" name="thongtinchung" class="form-control" value="<?php echo $dn['thongtinchung']; ?>">
    </div>
    <input type="submit" value="Cập nhật" name="update_dn" class="btn btn-block btn-primary">
</form>