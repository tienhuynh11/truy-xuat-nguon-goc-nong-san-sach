
<?php 
   
    if(isset($_POST['add_user'])){
        $rtn_msg = $obj->add_admin_user($_POST);
    }
?>

<h2>Thêm người dùng</h2>
<h6 class="text-success">
   <?php 
     if(isset($rtn_msg)){
         echo $rtn_msg;
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
        <input type="text" name="user_name" class="form-control">
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
        <option value="Admin">Admin</option>
        <option value="Khachhang">Khách hàng</option>
        <option value="Nongdan">Nông dân</option>
        </select>
    </div>

    <input type="submit" value="Add User" name="add_user" class="btn btn-block btn-primary">
</form>