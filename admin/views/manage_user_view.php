<?php     
    $arry = $obj->show_admin_user();
    
  if(isset($_GET['status'])){
      $admin_id = $_GET['id'];
      if($_GET['status']=='delete'){
            $del_msg = $obj->delete_admin($admin_id);
      }
  }

?>      
<div style="padding-bottom: 5px;" class="row">
    <div class="col-md-6 col-sm-6">
        <h2>Quản lý tài khoản</h2>
    </div>
    <div class="col-md-6 col-sm-6">
        <a style="float: right;" class="btn btn-primary" href="add_user.php">Thêm tài khoản</a>
    </div>
</div>
<div style="overflow-x: auto;">
    <table class="table table-bordered">
        <thead>

       
            <tr>
                <th>User Id</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Vai trò</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        <?php 
            while($user = mysqli_fetch_assoc($arry)){
        ?>
            <tr>
                <td> <?php echo $user['id_acc'] ?> </td>
                <td> <?php echo $user['hoten'] ?> </td>
                <td> <?php echo $user['email'] ?> </td>
                <td> <?php echo $user['dienthoai'] ?> </td>
                <td> <?php echo $user['diachi'] ?> </td>
                <td> <?php if($user['role']=='Admin'){
                    echo "Admin";
                }else if($user['role']=='Khachhang'){
                    echo "Khách hàng";
                }else{
                    echo"Nông dân";
                }
                 ?> </td>
            
                <td>  
                    <a href="edit_admin.php?status=userEdit&&id=<?php echo $user['id_acc'] ?>" class="btn btn-sm btn-warning">Sửa </a>
                    <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="confirmDelete(<?php echo $user['id_acc'] ?>)">Xóa</a>

                </td>
            </tr>

           

            <?php }?>
        </tbody>
    </table>
</div>

<script>
    function confirmDelete(id) {
        if (confirm("Bạn có chắc chắn muốn xóa tài khoản này không?")) {
            window.location.href = "?status=delete&&id=" + id;
        }
    }
</script>
