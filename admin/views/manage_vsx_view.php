<style>
    iframe {
        width: 250px;
        height: 150px;
    }
</style>
<?php
 $so_ban_ghi_mot_trang = 2;
 if(isset($_GET['trang'])){
     $trang_hien_tai = $_GET['trang'];
 } else {
     $trang_hien_tai = 1;
 }
 $so_ban_ghi =$obj->count_vsx();
 $tong_so_trang = ceil($so_ban_ghi / $so_ban_ghi_mot_trang);
 $bat_dau = ($trang_hien_tai - 1) * $so_ban_ghi_mot_trang;
 $ket_thuc = $bat_dau + $so_ban_ghi_mot_trang;
 $rows = $obj->display_vsx_pagination($bat_dau, $ket_thuc);

 $nguoidang_info = $obj-> show_admin_user();  
 $nguoidang_array = array();
    while($nguoidang = mysqli_fetch_assoc($nguoidang_info)){
        $nguoidang_array[] = $nguoidang;
    }     
 $nhatky_info = $obj-> show_nhatky();  
 $nnhatky_array = array();
    while($nk = mysqli_fetch_assoc($nhatky_info)){
        $nhatky_array[] = $nk;
    }     
 if(isset($_GET['status'])){
    $id = $_GET['id'];
    if($_GET['status']=="delete"){
     $del_msg = $obj->delete_Vungsanxuat($id);
 }
}
?>
<div style="padding-bottom: 5px;" class="row">
    <div class="col-md-6 col-sm-6">
        <h2>Quản lý vùng sản xuất</h2>
    </div>
    <div class="col-md-6 col-sm-6">
        <a style="float: right;" class="btn btn-primary" href="add_vsx.php">Thêm vùng sản xuất</a>
    </div>
</div>


<div style="overflow-x: auto;">
    
<table class="table">
    <thead>
        <tr>
            <th>STT</th>
            <th >Tên vùng</th>
            <th>Mã vùng</th>
            <th>Nhật ký</th>
            <th>Mã QR</th>
            <th>Hình ảnh</th>    
            <th>Người đăng</th>
            <th>Số điện thoại </th>
            <th>Địa chỉ</th>
            <th style="width: 200px;">Bản đồ</th>
            <th>Thời gian nuôi trồng</th>
            <th>Diện tích</th>
            <th>Thông tin</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>

    <?php 
     $dem=($trang_hien_tai - 1) * $so_ban_ghi_mot_trang + 1;
        while($row = mysqli_fetch_assoc($rows)){
    ?>
    
        <tr>
            <td> <?php echo $dem ?></td>
            <td style="white-space: normal;"> <?php echo $row['tenvung'] ?></td>
            <td> <?php echo $row['mavung'] ?></td>
            <td>  <?php foreach($nhatky_array as $nk){
                                if($row['nhatky'] == $nk['id_nk']){
                                    echo $nk['tennhatky'];
                                }
                            }?></td>
            <td> <?php echo $row['maqr'] ?></td>
            <td> <img src="uploads/<?php echo $row['hinhanh'] ?>" width="60px"> </td>
       
            <td>  <?php foreach($nguoidang_array as $nguoidang){
                                if($row['nguoidang'] == $nguoidang['id_acc']){
                                    echo $nguoidang['hoten'];
                                }
                            }?></td>
        
            <td> <?php echo $row['sdt'] ?></td>
            <td style="white-space: normal;"> <?php echo $row['diachi'] ?></td>
            <td style="width: 200px;"><?php echo $row['bando'] ?></td>
            <td > <?php echo $row['thoigiannuoitrong'] ?></td>
            <td> <?php echo $row['dientich'] ?></td>
            <td style="white-space: normal;"> <?php echo $row['thongtin'] ?></td>                
            <td>
            <a href="edit_vsx.php?status=edit&&id=<?php echo $row['id_vung'] ?>" class="btn btn-sm btn-warning">Sửa</a>
            <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="confirmDelete(<?php echo $row['id_vung'] ?>)">Xóa</a>

               
            </td>
        </tr>

        <?php
        $dem++;
    } ?>
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
        if (confirm("Bạn có chắc chắn muốn xóa vùng sản xuất này không?")) {
            window.location.href = "?status=delete&&id=" + id;
        }
    }
</script>