<?php 

    if(isset($_POST['add_user'])){
        $add_msg = $obj->add_admin_user($_POST);
    }
?>

<div class="container">
<h2>Thêm tài khoản mới</h2>
<br>
<h6 class="text-success">
    <?php 
        if(isset($add_msg)){
            echo $add_msg;
        }
    ?>
</h6>
<form action="" method="post" enctype="multipart/form-data" class="form">
    <div class="form-group">
        <label for="user_hoten">Họ tên</label>
        <input type="text" name="user_hoten" class="form-control">
    </div>
    <div class="form-group">
        <label for="user_name">Email</label>
        <input type="email" name="user_name" class="form-control">
    </div>
    <div class="form-group">
        <label for="user_password">Mật khẩu</label>
        <input type="password" name="user_password" class="form-control">
    </div>

    <div class="form-group">
        <label for="user_sdt">Số điện thoại</label>
        <input type="text" name="user_sdt" class="form-control">
    </div>
    <div class="form-group">
        <label for="user_adress">Địa chỉ</label>
        <input type="text" name="user_adress" class="form-control">
    </div>
    <div class="form-group">
    <label for="hinhdaidien">Hình đại diện</label>
    <input type="file" name="hinhdaidien" class="form-control" accept="image/*">
</div>

    <div class="form-group">
        <label for="user_role">Role</label>
        <select name="user_role" class="form-control">
            <option value="Admin">Admin</option>
            <option value="Nongdan">Nông dân</option>
            <option value="Nguoidanhgia">Người đánh giá</option>
            <option value="Chuyengia">Chuyên gia</option>
            <option value="Chuyenvien">Chuyên viên</option>
            <option value="Kythuatvien">Kỹ thuật viên</option>
            <option value="Nguoikiemdinh">Người kiểm định</option>
            <option value="Nguoihotro">Người hỗ trợ</option>
            <option value="Chudoanhnghiep">Chủ doanh nghiệp</option>
            <option value="Thanhvien">Thành viên</option>
        </select>
    </div>

    <input type="submit" value="Thêm tài khoản" name="add_user" class="btn btn-block btn-primary">
</form>
</div>