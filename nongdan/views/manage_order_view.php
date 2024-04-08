
  <h2>Quản lý vùng sản xuất</h2>

<?php 

// $catagories = $obj-> display_catagory();

// if(isset($_GET['status'])){
//     $get_id = $_GET['id'];
//     if($_GET['status']=="published"){
//         $obj->catagory_published($get_id);
//     }elseif($_GET['status']=="unpublished"){
//         $obj->catagory_unpublished($get_id);
//     }elseif($_GET['status']=="delete"){
//         $obj->delete_catagory($get_id);
//     }
// }

$vsx = $obj-> display_vsx($nongdan_id);



?>
<div >
<div style="overflow-x: auto;">
<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên vùng</th>
            <th>Mã vùng</th>
            <th>Thông tin</th>
            <th>Số điện thoại</th>
            <th>Địa chỉ</th>
            <th>Diện tích</th>
            <th>Hình ảnh</th>
            <th>Hành động</th>
        </tr>
    </thead>

    <tbody>
    <?php
        $dem = 1;
        while($v = mysqli_fetch_assoc($vsx)){ ?>
            <tr>
                <td><?php echo $dem ?></td>
                <td><?php echo $v['tenvung'] ?></td>
                <td><?php echo $v['mavung'] ?></td>
                <td><?php echo $v['thongtin'] ?></td>
                <td><?php echo $v['sdt'] ?></td>
                <td><?php echo $v['diachi'] ?></td>
                <td><?php echo $v['dientich'] ?>
                <td><img width="100" height="100" src="./assets/images/<?php echo $v['hinhanh'] ?>" alt="<?php echo $v['hinhanh'] ?>"></td>
                
                <td>
                    <a href="edit_cata.php?trangthai=edit&&id=<?php echo $ctg['v'] ?>" class="btn btn-sm btn-warning">Chỉnh sửa</a>
                    <a href="?trangthai=delete&&id=<?php echo $ctg['v'] ?>" class="btn btn-sm btn-danger">Xóa</a>
                </td>
            </tr>
        <?php
            $dem++; 
        }
        ?>
       
    </tbody>
</table>
</div>
</div>

<script>
function updateStatus(id, status) {
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "?trangthai=" + status + "&&id=" + id, true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            location.reload(); // Tải lại trang sau khi cập nhật thành công
        }
    };
    xhr.send();
}
</script>