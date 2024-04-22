
  

<?php 

$catagories_dn = $obj-> display_catagory_dn();

if(isset($_GET['status'])){
    $get_id = $_GET['id'];
    if($_GET['status']=="delete"){
        $obj->delete_catagory_dn($get_id);
    }
}

$dem=1;

?>

<div style="padding-bottom: 5px;" class="row">
    <div class="col-md-6 col-sm-6">
        <h2>Quản lý danh mục DN</h2>
    </div>
    <div class="col-md-6 col-sm-6">
        <a style="float: right;" class="btn btn-primary" href="add_dm_dn.php">Thêm danh mục DN</a>
    </div>
</div>

<div style="overflow-x: auto;">
<table class="table table-striped">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên danh mục doanh nghiệp</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
       <?php while($ctgdn = mysqli_fetch_assoc($catagories_dn)){ ?>
        <tr>
            <td><?php echo $dem ?></td>
            <td><?php echo $ctgdn['tendoanhnghiep'] ?></td> 
            <td>
                <a href="edit_dm_dn.php?status=dmdnedit&&id=<?php echo $ctgdn['id_dmdn'] ?>" class="btn btn-sm btn-warning">Sửa</a>
                <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="confirmDelete(<?php echo $ctgdn['id_dmdn'] ?>)">Xóa</a>
            </td>
           
        </tr>
        <?php 
            $dem++;   
        }
        ?>
       
    </tbody>
</table>
</div>
<script>
function confirmDelete(id) {
    if (confirm("Bạn có chắc chắn muốn xóa danh mục này không?")) {
        window.location.href = "?status=delete&&id=" + id;
    }
}
</script>
