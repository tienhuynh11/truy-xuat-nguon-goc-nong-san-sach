<?php
 $rows = $obj->SlideShow();
 $admin_info = $obj-> show_admin_user();       
 if(isset($_GET['status'])){
    $id = $_GET['id'];
    if($_GET['status']=="delete"){
     $del_msg = $obj->delete_Vungsanxuat($id);
 }
}
?>

<h2>Quản lý vùng sản xuất</h2>

<table class="table">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã vùng</th>
            <th>Hình ảnh</th>    
            <th>Người đăng</th>
            <th>Số điện thoại </th>
            <th>Địa chỉ</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>

    <?php 
        while($row = mysqli_fetch_assoc($rows)){
    ?>
    
        <tr>
            <td> <?php echo $row['id_vung'] ?></td>
        

      
            <td> <?php echo $row['mavung'] ?></td>
    
     
            <td> <img src="uploads/<?php echo $row['hinhanh'] ?>" width="200px"> </td>
       
            <td>  <?php while($admin = mysqli_fetch_assoc($admin_info)){ 
                                                if($row['nguoidang'] == $admin['id_acc']){
                                                    echo $admin['hoten'];
                                                }else{
                                                    echo "Không rõ";
                                                }
                                        }?></td>
        
            <td> <?php echo $row['sdt'] ?></td>
            <td> <?php echo $row['diachi'] ?></td>
            

            <td>
            <a href="edit_slider.php?status=edit&&id=<?php echo $row['id_vung'] ?>" class="btn btn-sm btn-warning">Edit</a>
            <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="confirmDelete(<?php echo $row['id_vung'] ?>)">Delete</a>

               
            </td>
        </tr>

        <?php } ?>
    </tbody>
</table>

<script>
    function confirmDelete(id) {
        if (confirm("Bạn có chắc chắn muốn xóa vùng sản xuất này không?")) {
            window.location.href = "?status=delete&&id=" + id;
        }
    }
</script>