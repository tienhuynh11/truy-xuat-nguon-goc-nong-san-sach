
<?php 
    $catadn_info = $obj->display_catagory_dn();

    if(isset($_POST['add_dn'])){
        $rtn_msg = $obj->add_dn($_POST);
    }
?>

<h2>Thêm doanh nghiệp</h2>

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
        <input type="text" name="nguoidaidien" class="form-control"  >
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
    <input type="hidden" name="id_dn" value="">
    <div class="form-group">
        <label for="sdt"> Số điện thoại</label>
        <input type="text" name="sdt" class="form-control" >
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" >
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
        <input type="text" name="giayphepkinhdoanh" class="form-control" >
    </div>
    <div class="form-group">
        <label for="giaychungnhan">Giấy chứng nhận</label>
        <input type="text" name="giaychungnhan" class="form-control">
    <div class="form-group">
        <label for="giaykiemdinh">Giấy kiểm định</label>
        <input type="text" name="giaykiemdinh" class="form-control" >
    </div>
    <div class="form-group">
        <label for="thongtinchung">Thông tin chung</label>
        <input type="text" name="thongtinchung" class="form-control">
    </div>

    <input type="submit" value="Thêm doanh nghiệp" name="add_dn" class="btn btn-block btn-primary">
</form>