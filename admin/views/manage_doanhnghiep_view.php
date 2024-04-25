<?php     
   
    $catadn_info = $obj->display_catagory_dn();
    $user_info = $obj->show_admin_user();

    $so_ban_ghi_mot_trang = 7;
if(isset($_GET['trang'])){
    $trang_hien_tai = $_GET['trang'];
} else {
    $trang_hien_tai = 1;
}
$so_ban_ghi =$obj->count_dn();
$tong_so_trang = ceil($so_ban_ghi / $so_ban_ghi_mot_trang);
$bat_dau = ($trang_hien_tai - 1) * $so_ban_ghi_mot_trang;
$ket_thuc = $bat_dau + $so_ban_ghi_mot_trang;
$arry = $obj->display_dn_pagination($bat_dau, $ket_thuc);

    $catadn_array = array();
    while($catadn = mysqli_fetch_assoc($catadn_info)){
        $catadn_array[] = $catadn;
    }
    $user_array = array();
    while($user = mysqli_fetch_assoc($user_info)){
        $user_array[] = $user;
    }

  if(isset($_GET['status'])){
      $id_dn = $_GET['id'];
      if($_GET['status']=='delete'){
            $del_msg = $obj->delete_dn($id_dn);
      }
  }

?>      

<div style="padding-bottom: 5px;" class="row">
    <div class="col-md-6 col-sm-6">
        <h2>Quản lý doanh nghiệp</h2>
    </div>
    <div class="col-md-6 col-sm-6">
        <a style="float: right;" class="btn btn-primary" href="add_dn.php">Thêm doanh nghiệp</a>
    </div>
</div>

<div style="overflow-x: auto;">

    <table class="table table-bordered">
        <thead>

       
            <tr>
                <th>STT</th>
                <th>Loại doanh nghiệp</th>
                <th>Người đại diện </th>
                <th>Tên doanh nghiệp</th>
                <th>Hình ảnh</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Mã số thuế</th>
                <th>Giấy phép kinh doanh</th>
                <th>Giấy chứng nhận</th>
                <th>Giấy kiểm định</th>
                <th>Thông tin chung</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        <?php 
           $dem=($trang_hien_tai - 1) * $so_ban_ghi_mot_trang + 1;
            while($dn = mysqli_fetch_assoc($arry)){
        ?>
            <tr>
                <td> <?php echo $dem ?> </td>
                <td> <?php 
                  
                        foreach($catadn_array as $catadn){
                            if($dn['danhmuc_dn'] == $catadn['id_dmdn'])
                            {
                                echo $catadn['tendoanhnghiep'];
                            }
                        }
                        
                            ?> </td>
                 <td> <?php 
                  
                  foreach($user_array as $user){
                      if($dn['nguoidaidien'] == $user['id_acc'])
                      {
                          echo $user['hoten'] . '-' . $user['dienthoai'];
                      }
                  }
                  
                      ?> </td>
                 <td> <?php echo $dn['tendoanhnghiep'] ?> </td>
                 <td><img style="height:60px" src="uploads/<?php echo $dn['hinhanh'] ?>" alt=""></td>
                 <td> <?php echo $dn['sdt'] ?> </td>
                 <td> <?php echo $dn['email'] ?> </td>
                 <td style="white-space: normal;"> <?php echo $dn['diachi'] ?> </td>
                 <td> <?php echo $dn['masothue'] ?> </td>
                 <td><img style="height:60px" src="uploads/<?php echo $dn['giayphepkinhdoanh'] ?>" alt=""></td>
                 <td><img style="height:60px" src="uploads/<?php echo $dn['giaychungnhan'] ?>" alt=""></td>
                 <td><img style="height:60px" src="uploads/<?php echo $dn['giaykiemdinh'] ?>" alt=""></td>
                 <td style="white-space: normal;"> <?php echo $dn['thongtinchung'] ?> </td>
                
            
                <td>  
                    <a href="edit_dn.php?status=dnEdit&&id=<?php echo $dn['id_dn'] ?>" class="btn btn-sm btn-warning">Sửa </a>
                    <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="confirmDelete(<?php echo $dn['id_dn'] ?>)">Xóa</a>

                </td>
            </tr>

           

            <?php
            $dem++;
        }?>
        </tbody>
    </table>
</div>

<?php 
echo "<div class='pagination'  style='float: right;'> ";
if($trang_hien_tai > 1){
    echo "<a href='?trang=".($trang_hien_tai - 1)."' class='btn btn-primary ti-angle-left'></a>";
}
for($i = 1; $i <= $tong_so_trang; $i++){
    echo "<a href='?trang=".$i."' class='btn btn-primary'>$i</a>";
}
if($trang_hien_tai < $tong_so_trang){
    echo "<a href='?trang=".($trang_hien_tai + 1)."' class='btn btn-primary ti-angle-right'></a>";
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
