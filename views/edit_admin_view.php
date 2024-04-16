<?php 
    if(isset($_GET['status'])){
        $user_id = $_GET['id'];
        if($_GET['status']=="userEdit"){
           $admin_info= $obj->show_admin_user_by_id($user_id);
           $admin = mysqli_fetch_assoc($admin_info);
        }
    }

    if(isset($_POST['update_user'])){
       $update_msg =  $obj->update_admin($_POST);
       if($update_msg == "Update successful!") {
        header("Location: manage_admin_user.php"); 
        exit(); 
    }
    }
?>

<div class="container">
    <h4>Chỉnh sửa thông tin tài khoản</h4>

    <h6>
        <?php 
            if(isset( $update_msg)){
                echo  $update_msg;
            }
        ?>
    </h6>
<form action="" method="POST">
    <div class="form-group">
        <h4>Email</h4>
        <input type="email" name="u-user-email" class="form-control" value="<?php echo $admin['email'] ?>" required>
    </div>
    <div class="form-group">
        <h4>Họ Tên</h4>
        <input type="text" name="u-user-name" class="form-control" value="<?php echo $admin['hoten'] ?>" required>
    </div>
    <!-- <div class="form-group">
        <h4>Password</h4>
        <input type="password" name="user_password" class="form-control" required>
    </div> -->
    <div class="form-group">
        <h4>Số điện thoại</h4>
        <input type="text" name="u-user-phone" class="form-control" value="<?php echo $admin['dienthoai'] ?>" required>
    </div>
    <input type="hidden" name="user_id" value="<?php echo $admin['id_acc'] ?>">
    <div class="form-group">
        <h4>Địa chỉ</h4>
        <input type="text" name="u-user-address" class="form-control" value="<?php echo $admin['diachi'] ?>" required>
    </div>
    <div class="form-group">
        <h4>Role</h4>
       <select name="u_user_role" class="form-control">
           <!-- <option disabled selected>--Select--</option> -->
           
           <option value="1" <?php  if($admin['role']=='Admin'){echo "Selected";  } ?> >Admin</option>
           <option value="2" <?php  if($admin['role']=='Khachhang'){echo "Selected";  } ?> >Khách hàng</option>
           <option value="2" <?php  if($admin['role']=='Nongdan'){echo "Selected";  } ?> >Nông dân</option>
       </select>
    </div>

    <div class="form-group">
        <input type="submit" name="update_user" class="btn btn-primary">
    </div>
</form>
</div>