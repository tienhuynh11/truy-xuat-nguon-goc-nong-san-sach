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
    .select2-container--default .select2-selection--multiple .select2-selection__rendered {
    box-sizing: border-box;
    list-style: none;
    margin: 0;
    padding: .5rem .75rem;
    width: 100%;
    height: 25px;
}
.select2-container--default .select2-selection--multiple .select2-selection__choice {
    color: #1b1919;
}
</style>
<?php 
    $catadn_info = $obj->display_catagory_dn();

    $users = $obj->show_admin_user();
    if(isset($_SESSION['admin_id'])) {
        $nguoidang_id = $_SESSION['admin_id'];
    } else {
        header("Location:../dangnhap.php");
        exit();
    }
    $user_array = array();
    while($user = mysqli_fetch_assoc($users)){
        $user_array[] = $user;
    }  
    
    if(isset($_POST['add_dn'])){
        $rtn_msg = $obj->add_dn($_POST);
    }
    
?>

<h2>Thêm doanh nghiệp</h2>

<form action="" method="post" enctype="multipart/form-data" class="form">
<div class="form-group">
    <div class="form-group">
        <label for="danhmuc_dn">Danh mục doanh nghiệp</label>
        <select name="danhmuc_dn" id="danhmuc_dn" class="form-control">
        <?php while($cata = mysqli_fetch_assoc($catadn_info)){ ?>
        <option value="<?php echo $cata['id_dmdn'] ?>"  ><?php echo $cata['tendoanhnghiep'] ?></option>

        <?php }?>
        </select>
    </div>
    <div class="form-group">
        <input type="hidden" name="nguoidang" class="form-control" value="<?php echo $nguoidang_id?>">
    </div>
    <div class="form-group">
        <label for="nguoidaidien">Người đại diện</label>
        <select name="nguoidaidien" id="nguoidaidien" class="form-control">
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
        <label for="tendoanhnghiep">Tên doanh nghiệp</label>
        <input type="text" name="tendoanhnghiep" class="form-control"  >
    </div>
    <div class="form-group">
        <label for="hinhanh">Hình ảnh </label>
        <div class="mb-3">
        <input type="file" name="hinhanh" class="form-control">
    </div>
    <div class="form-group">
        <label for="sdt"> Số điện thoại</label>
        <input type="text" name="sdt" class="form-control" >
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" >
    </div>

    <div class="row">
        <div class="col-md-4 form-group">
            <label for="lblprovince">Tỉnh/Thành phố</label>
            <select name="province" id="province" class="form-control" onchange="handleChange(this)">
                <option value="">Chọn tỉnh/thành phố</option>
            </select>
        </div>
        <div class="col-md-4 form-group">
            <label for="lbldistrict">Quận/Huyện</label>
            <select name="district" id="district" class="form-control" onchange="handleChangeDistrict(this)">
                <option value="">Chọn quận/huyện</option>
            </select>
        </div>
        <div class="col-md-4 form-group">
            <label for="lblwards">Phường/Xã</label>
            <select name="wards" id="wards" class="form-control">
                <option value="">Chọn xã/phường</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="diachi">Địa chỉ</label>
        <input type="text" name="diachi" class="form-control" >
    </div>
    <div class="form-group">
        <label for="masothue">Mã số thuế</label>
        <input type="text" name="masothue" class="form-control" >
    </div>
    <div class="form-group">
        <label for="giayphepkinhdoanh">Giấy phép kinh doanh</label>
        <input type="file" name="giayphepkinhdoanh" class="form-control" >
    </div>
    <div class="form-group">
        <label for="giaychungnhan">Giấy chứng nhận</label>
        <input type="file" name="giaychungnhan" class="form-control">
    </div>
    <div class="form-group">
        <label for="giaykiemdinh">Giấy kiểm định</label>
        <input type="file" name="giaykiemdinh" class="form-control" >
    </div>
    <div class="form-group">
        <label for="thanhvien">Thành viên liên quan</label>
                            <select name="thanhvien[]" id="thanhvien" class="form-control" multiple>
                                <?php foreach ($users as $user) { ?>
                                    <option value="<?php echo $user['id_acc']; ?>"><?php echo $user['hoten']; ?></option>
                                <?php } ?>
                            </select>
    </div>  
    <div class="form-group">
        <label for="thongtinchung">Thông tin chung</label>
        <input type="text" name="thongtinchung" class="form-control">
    </div>

    <input type="submit" value="Thêm doanh nghiệp" name="add_dn" class="btn btn-block btn-primary">
</form>
<script>
    $(document).ready(function() {
        $("#nguoidaidien").select2();
        $("#danhmuc_dn").select2();
        $("#province").select2();
        $("#district").select2();
        $("#wards").select2();
        $("#thanhvien").select2();
    });
</script>