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
        <label for="user_role">Role</label>
        <select name="user_role" class="form-control">
        <option value="">Chọn role</option>
        <option value="Admin">Admin</option>
        <option value="Khachhang">Khách hàng</option>
        <option value="Nongdan">Nông dân</option>
        </select>
    </div>

    <input type="submit" value="Add User" name="add_user" class="btn btn-block btn-primary">
</form>
</div>