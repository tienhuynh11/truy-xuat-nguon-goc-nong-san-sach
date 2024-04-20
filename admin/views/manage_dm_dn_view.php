
  

<?php 

$catagories_dn = $obj-> display_catagory_dn();

if(isset($_GET['trangthai'])){
    $get_id = $_GET['id'];
    if($_GET['trangthai']=="delete"){
        $obj->delete_catagory_dn($get_id);
    }
}

$dem=1;

?>
<div >
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
                <a href="edit_dm_dn.php?trangthai=edit&&id=<?php echo $ctgdn['id_dmdn'] ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="confirmDelete(<?php echo $ctgdn['id_dmdn'] ?>)">Delete</a>
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
        window.location.href = "?trangthai=delete&&id=" + id;
    }
}
</script>
