<?php     
    $so_ban_ghi_mot_trang = 5;
if(isset($_GET['trang'])){
    $trang_hien_tai = $_GET['trang'];
} else {
    $trang_hien_tai = 1;
}
$so_ban_ghi =$obj->count_user();
$tong_so_trang = ceil($so_ban_ghi / $so_ban_ghi_mot_trang);
$bat_dau = ($trang_hien_tai - 1) * $so_ban_ghi_mot_trang;
$ket_thuc = $bat_dau + $so_ban_ghi_mot_trang;
$arry  = $obj->display_user_pagination($bat_dau, $ket_thuc);

  if(isset($_GET['status'])){
      $admin_id = $_GET['id'];
      if($_GET['status']=='delete'){
            $obj->delete_admin($admin_id);
      }
  }

?>      
<div style="padding-bottom: 5px;" class="row">
    <div class="col-md-6 col-sm-6">
        <h2>Quản lý tài khoản</h2>
    </div>
    <div class="col-md-6 col-sm-6">
        <a style="float: right;" class="btn btn-primary" href="add_account.php">Thêm tài khoản</a>
    </div>
</div>
<div style="overflow-x: auto;">
    <table class="table table-bordered">
        <thead>

       
            <tr>
                <th>Stt</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Hình đại diện</th>
                <th>Vai trò</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        <?php 
        $dem=($trang_hien_tai - 1) * $so_ban_ghi_mot_trang + 1;
            while($user = mysqli_fetch_assoc($arry)){
        ?>
            <tr>
                <td> <?php echo $dem ?> </td>
                <td> <?php echo $user['hoten'] ?> </td>
                <td> <?php echo $user['email'] ?> </td>
                <td> <?php echo $user['dienthoai'] ?> </td>
                <td> <?php echo $user['diachi'] ?> </td>
                <td><img style="height:60px" src="uploads/avatar/<?php echo $user['hinhdaidien'] ?>" alt=""></td>
                <td> <?php if($user['role']=='Admin'){
                    echo "Admin";
                }else if($user['role']=='Nongdan'){
                    echo "Nông dân";
                }else if($user['role']=='Nguoidanhgia'){
                    echo "Người đánh giá";
                }else if($user['role']=='Chuyengia'){
                    echo "Chuyên gia";
                }else if($user['role']=='Chuyenvien'){
                    echo "Chuyên viên";
                }else if($user['role']=='Kythuatvien'){
                    echo "Kỹ thuật viên";
                }else if($user['role']=='Nguoikiemdinh'){
                    echo "Người kiểm định";
                }else if($user['role']=='Nguoihotro'){
                    echo "Người hỗ trợ";
                }else if($user['role']=='Chudoanhnghiep'){
                    echo "Chủ doanh nghiệp";
                }else if($user['role']=='Thanhvien'){
                    echo "Thành viên";
                }
                 ?> </td>
            
                <td>  
                    <a href="edit_admin.php?status=userEdit&&id=<?php echo $user['id_acc'] ?>" class="btn btn-sm btn-warning">Sửa </a>
                    <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="confirmDelete(<?php echo $user['id_acc'] ?>)">Xóa</a>

                </td>
            </tr>

           

            <?php $dem++;}
            
            ?>
        </tbody>
    </table>
</div>
<?php 
echo "<div class='pagination'  style='float: right;'> ";
if($trang_hien_tai > 1){
    echo "<a href='?trang=".($trang_hien_tai - 1)."' class='btn btn-white text-dark ti-angle-left' ></a>";
}
for($i = max(1, $trang_hien_tai - 2); $i <= min($tong_so_trang, $trang_hien_tai + 2); $i++){
    if ($i > 1) {
        echo "&nbsp;";
    }
    if ($i == $trang_hien_tai) {
        echo "<a href='?trang=".$i."' class='btn btn-white text-dark' style='font-weight: bold; background-color: gray;'>$i</a>";
    } else {
        echo "<a href='?trang=".$i."' class='btn btn-white text-dark'>$i</a>";
    }
}
if($trang_hien_tai < $tong_so_trang){
    echo "<a href='?trang=".($trang_hien_tai + 1)."' class='btn btn-white text-dark ti-angle-right'></a>";
}
echo "</div>";
?>
<script>
    function confirmDelete(id) {
        if (confirm("Bạn có chắc chắn muốn xóa tài khoản này không?")) {
            window.location.href = "?status=delete&&id=" + id;
        }
    }
</script>
