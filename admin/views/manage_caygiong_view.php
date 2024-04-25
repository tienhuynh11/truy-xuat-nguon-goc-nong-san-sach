<?php     
    

    $so_ban_ghi_mot_trang = 7;
    if(isset($_GET['trang'])){
        $trang_hien_tai = $_GET['trang'];
    } else {
        $trang_hien_tai = 1;
    }
    $so_ban_ghi =$obj->count_caygiong();
    $tong_so_trang = ceil($so_ban_ghi / $so_ban_ghi_mot_trang);
    $bat_dau = ($trang_hien_tai - 1) * $so_ban_ghi_mot_trang;
    $ket_thuc = $bat_dau + $so_ban_ghi_mot_trang;
    $show_cg = $obj->display_cg_pagination($bat_dau, $ket_thuc);


  if(isset($_GET['status'])){
      $id_cg = $_GET['id'];
      if($_GET['status']=='delete'){
            $del_msg = $obj->delete_caygiong($id_cg);
      }
  }

?>      

<div style="padding-bottom: 5px;" class="row">
    <div class="col-md-6 col-sm-6">
        <h2>Quản lý cây giống</h2>
    </div>
    <div class="col-md-6 col-sm-6">
        <a style="float: right;" class="btn btn-primary" href="add_caygiong.php">Thêm cây giống</a>
    </div>
</div>

<div style="overflow-x: auto;">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Stt</th>
                <th>Tên Cây giống</th>
                <th>Mã Cây giống</th>
                <th>Mô tả</th>
                <th>Nhà sản xuất</th>
                <th>Ngày sản xuất</th>
                <th>Hạn sử dụng</th>
                <th>Phương pháp trồng</th>
                <th>Hình ảnh</th>
                <th>Liên hệ</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        <?php 
           $dem=($trang_hien_tai - 1) * $so_ban_ghi_mot_trang + 1;
            while($cg = mysqli_fetch_assoc($show_cg)){
                
        ?>
            <tr>
                <td><?php echo $dem ?></td>
                <td> <?php echo $cg['tencaygiong']  ?> </td>
                <td> <?php echo  $cg['macaygiong'] ?> </td>
                <td> <?php echo $cg['mota'] ?> </td>
                <td> <?php echo  $cg['nhasanxuat'] ?> </td>
                <td> <?php echo  $cg['ngaysanxuat'] ?> </td>
                <td> <?php echo  $cg['hansudung'] ?> </td>
                <td> <?php echo  $cg['phuongphaptrong'] ?> </td>
                <td><img style="height:60px" src="uploads/<?php echo $cg['hinhanh'] ?>" alt=""></td>
                <td> <?php echo  $cg['lienhe'] ?> </td>
                
            
            
                <td>  
                    <a href="edit_caygiong.php?status=cgEdit&&id=<?php echo $cg['id_cg'] ?>" class="btn btn-sm btn-warning">Sửa </a>
                    <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="confirmDelete(<?php echo $cg['id_cg'] ?>)">Xóa</a>

                </td>
            </tr>

           

            <?php 
           $dem++;
             }
            
            ?>
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
        if (confirm("Bạn có chắc chắn muốn xóa cây giống này không?")) {
            window.location.href = "?status=delete&&id=" + id;
        }
    }
</script>