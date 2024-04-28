
  

<?php 
$so_ban_ghi_mot_trang = 7;
if(isset($_GET['trang'])){
    $trang_hien_tai = $_GET['trang'];
} else {
    $trang_hien_tai = 1;
}
$so_ban_ghi =$obj->count_dmnx();
$tong_so_trang = ceil($so_ban_ghi / $so_ban_ghi_mot_trang);
$bat_dau = ($trang_hien_tai - 1) * $so_ban_ghi_mot_trang;
$ket_thuc = $bat_dau + $so_ban_ghi_mot_trang;
$catagories_nx = $obj->display_dmnx_pagination($bat_dau, $ket_thuc);

if(isset($_GET['status'])){
    $get_id = $_GET['id'];
    if($_GET['status']=="delete"){
        $obj->delete_catagory_nx($get_id);
    }
}

$dem=($trang_hien_tai - 1) * $so_ban_ghi_mot_trang + 1;

?>

<div style="padding-bottom: 5px;" class="row">
    <div class="col-md-6 col-sm-6">
        <h2>Quản lý danh mục nhà xưởng</h2>
    </div>
    <div class="col-md-6 col-sm-6">
        <a style="float: right;" class="btn btn-primary" href="add_danhmuc_nx.php">Thêm danh mục nhà xưởng</a>
    </div>
</div>

<div style="overflow-x: auto;">
<table class="table table-striped">
    <thead>
        <tr>
            <th>STT</th>
            <th>Loại nhà xưởng</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
       <?php while($ctg = mysqli_fetch_assoc($catagories_nx)){ ?>
        <tr>
            <td><?php echo $dem ?></td>
            <td><?php echo $ctg['loainhaxuong'] ?></td> 
            <td>
                <a href="edit_danhmuc_nx.php?status=dmnxedit&&id=<?php echo $ctg['id_dmnx'] ?>" class="btn btn-sm btn-warning">Sửa</a>
                <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="confirmDelete(<?php echo $ctg['id_dmnx'] ?>)">Xóa</a>
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
    if (confirm("Bạn có chắc chắn muốn xóa danh mục này không?")) {
        window.location.href = "?status=delete&&id=" + id;
    }
}
</script>