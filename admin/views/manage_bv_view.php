<?php     
   $so_ban_ghi_mot_trang = 7;
   if(isset($_GET['trang'])){
       $trang_hien_tai = $_GET['trang'];
   } else {
       $trang_hien_tai = 1;
   }
   $so_ban_ghi =$obj->count_bv();
   $tong_so_trang = ceil($so_ban_ghi / $so_ban_ghi_mot_trang);
   $bat_dau = ($trang_hien_tai - 1) * $so_ban_ghi_mot_trang;
   $ket_thuc = $bat_dau + $so_ban_ghi_mot_trang;
   $show_baiviet = $obj->display_bv_pagination($bat_dau, $ket_thuc);
    $nguoidang_info = $obj->show_admin_user();

    // Lưu trữ kết quả truy vấn vào một mảng
    $nguoidang_array = array();
    while($nguoidang = mysqli_fetch_assoc($nguoidang_info)){
        $nguoidang_array[] = $nguoidang;
    }

    if(isset($_GET['status'])){
        $id_bv = $_GET['id'];
        if($_GET['status']=='delete'){
            $del_msg = $obj->delete_baiviet($id_bv);
        }
    }
?>      

<div style="padding-bottom: 5px;" class="row">
    <div class="col-md-6 col-sm-6">
        <h2>Quản lý bài viết</h2>
    </div>
    <div class="col-md-6 col-sm-6">
        <a style="float: right;" class="btn btn-primary" href="add_bv.php">Thêm bài viết</a>
    </div>
</div>


<div style="overflow-x: auto;">
    
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Stt</th>
                    <th>Người đăng</th>
                    <th>Tiêu đề</th>
                    <th>Nội dung </th>
                    <th>Hình ảnh </th>
                    <th>Ngày đăng</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $dem=($trang_hien_tai - 1) * $so_ban_ghi_mot_trang + 1;
                while($bv = mysqli_fetch_assoc($show_baiviet)){
                    ?>
                    <tr>
                        <td><?php echo $dem;?></td>
                        <td>
                            <?php 
                            foreach($nguoidang_array as $nguoidang){
                                if($bv['nguoidang'] == $nguoidang['id_acc']){
                                    echo $nguoidang['hoten'];
                                }
                            }
                            ?>
                        </td>
                        <td style="white-space: normal;"><?php echo $bv['tieude'] ?></td>
                        <td style="white-space: normal;"><?php 
                                        if($bv['noidung'] != null){
                                            // Chia chuỗi thành mảng các dòng
                                            $lines = explode("\n", $bv['noidung']);

                                            // Duyệt qua từng dòng và tạo thẻ <li>
                                            foreach ($lines as $line) {
                                                echo $line.'<br>';
                                            }
                                        }
                                    ?></td>
                        <td><img style="height:60px" src="uploads/baiviet/<?php echo $bv['hinhanh'] ?>" alt=""></td>
                        <td><?php echo $bv['ngaydang'] ?></td>
                        <td>  
                            <a href="edit_bv.php?status=couponEdit&&id=<?php echo $bv['id_bv'] ?>" class="btn btn-sm btn-warning">Sửa </a>
                            <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="confirmDelete(<?php echo $bv['id_bv'] ?>)">Xóa</a>
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
        if (confirm("Bạn có chắc chắn muốn xóa nông sản này không?")) {
            window.location.href = "?status=delete&&id=" + id;
        }
    }
</script>
