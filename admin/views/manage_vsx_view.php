<?php
 $rows = $obj->vsxShow();
 $nguoidang_info = $obj-> show_admin_user();  
 $nguoidang_array = array();
    while($nguoidang = mysqli_fetch_assoc($nguoidang_info)){
        $nguoidang_array[] = $nguoidang;
    }     
 if(isset($_GET['status'])){
    $id = $_GET['id'];
    if($_GET['status']=="delete"){
     $del_msg = $obj->delete_Vungsanxuat($id);
 }
}
?>

<h2>Quản lý vùng sản xuất</h2>
<div style="overflow-x: auto;">
    
<table class="table">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên vùng</th>
            <th>Mã vùng</th>
            <th>Hình ảnh</th>    
            <th>Người đăng</th>
            <th>Số điện thoại </th>
            <th>Địa chỉ</th>
            <th>Diện tích</th>
            <th>Thông tin</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>

    <?php 
    $dem=1;
        while($row = mysqli_fetch_assoc($rows)){
    ?>
    
        <tr>
            <td> <?php echo $dem ?></td>
            <td> <?php echo $row['tenvung'] ?></td>

      
            <td> <?php echo $row['mavung'] ?></td>
    
     
            <td> <img src="uploads/<?php echo $row['hinhanh'] ?>" width="60px"> </td>
       
            <td>  <?php foreach($nguoidang_array as $nguoidang){
                                if($row['nguoidang'] == $nguoidang['id_acc']){
                                    echo $nguoidang['hoten'];
                                }
                            }?></td>
        
            <td> <?php echo $row['sdt'] ?></td>
            <td> <?php echo $row['diachi'] ?></td>
            <td> <?php echo $row['dientich'] ?></td>
            <td> <?php echo $row['thongtin'] ?></td>                
            <td>
            <a href="edit_vsx.php?status=edit&&id=<?php echo $row['id_vung'] ?>" class="btn btn-sm btn-warning">Edit</a>
            <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="confirmDelete(<?php echo $row['id_vung'] ?>)">Delete</a>

               
            </td>
        </tr>

        <?php
        $dem++;
    } ?>
    </tbody>
</table>

</div>
<script>
    function confirmDelete(id) {
        if (confirm("Bạn có chắc chắn muốn xóa vùng sản xuất này không?")) {
            window.location.href = "?status=delete&&id=" + id;
        }
    }
</script>