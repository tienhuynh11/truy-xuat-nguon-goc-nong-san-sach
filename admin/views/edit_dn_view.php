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
    .select2-container--default .select2-selection--multiple .select2-selection__choice {
   
   color: #171717;
}
</style>
<?php 

ini_set("display_erros", "Off");
    $obj=new adminback();
    $catadn_info = $obj->display_catagory_dn();
    $users = $obj->show_admin_user();
     $id_dn = $_GET['id'];
        if($_GET['status']=='dnEdit'){
           $dn =$obj->show_dn_by_id($id_dn);

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
        <select name="danhmuc_dn" id="danhmuc_dn" class="form-control">
        <?php while($cata = mysqli_fetch_assoc($catadn_info)){ ?>
            <?php if ($cata['id_dmdn'] == $dn['danhmuc_dn']) { ?>
                <option value="<?php echo $cata['id_dmdn'] ?>" selected><?php echo $cata['tendoanhnghiep']?></option>
            <?php } else { ?>
                <option value="<?php echo $cata['id_dmdn'] ?>"><?php echo $cata['tendoanhnghiep'] ?></option>
            <?php } ?>
        <?php }?>
        </select>
    </div>
   
    <div class="form-group">
        <label for="lblnguoidaidien">Người đại diện</label>
        <select name="nguoidaidien" id="nguoidaidien" class="form-control">
            <?php foreach($users as $user): ?>
                <?php if ($user['id_acc']== $dn['nguoidaidien']) { ?>
                <option value="<?php echo $user['id_acc']?>" selected><?php echo $user['hoten']  .'-'. $user['dienthoai']?></option>
            <?php } else { ?>
                <option value="<?php echo $user['id_acc'] ?>"><?php echo $user['hoten']  .'-'.  $user['dienthoai'] ?></option>
            <?php } ?>
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
    <label for="thanhvien">Thành viên </label>
    <select name="thanhvien[]" id="thanhvien" class="form-control" multiple>
        <?php
       
       $selected_members_str = str_replace(['"', ''], '', $dn['thanhvien']);
       $selected_members = json_decode($selected_members_str, true);
        foreach($users as $user): ?>
            <?php if (in_array($user['id_acc'], $selected_members)) { ?>
                <option value="<?php echo $user['id_acc'] ?>" selected><?php echo $user['hoten'] ?></option>
            <?php } else { ?>
                <option value="<?php echo $user['id_acc'] ?>"><?php echo $user['hoten'] ?></option>
            <?php } ?>
        <?php endforeach; ?>
    </select>
</div>
    <div class="form-group">
        <label for="thongtinchung">Thông tin chung</label>
        <input type="text" name="thongtinchung" class="form-control" value="<?php echo $dn['thongtinchung']; ?>">
    </div>
    <input type="submit" value="Cập nhật" name="update_dn" class="btn btn-block btn-primary">
</form>

<script>
    $(document).ready(function() {
        $("#nguoidaidien").select2();
        $("#danhmuc_dn").select2();
        $("#thanhvien").select2();
    });
</script>