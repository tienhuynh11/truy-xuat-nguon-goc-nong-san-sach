
  

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
   
    $catagories = $obj-> display_catagory();

    if(isset($_GET['trangthai'])){
        $get_id = $_GET['id'];
        if($_GET['trangthai']=="hoatdong"){
            $obj->catagory_published($get_id);
        }elseif($_GET['trangthai']=="khonghoatdong"){
            $obj->catagory_unpublished($get_id);
        }elseif($_GET['trangthai']=="delete"){
             $obj->delete_catagory($get_id);
        }
    }
    

?>
<div >
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên danh mục</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
        </thead>

        <tbody>
        <?php
            $dem = 1;
            while($ctg = mysqli_fetch_assoc($catagories)){ ?>
                <tr>
                    <td><?php echo $dem ?></td>
                    <td><?php echo $ctg['tendanhmuc'] ?></td>
                    <td>
                        <?php 
                        if($ctg['trangthai'] == 'khonghoatdong') {
                        ?> 
                            <a href="#" class="btn btn-sm btn-success" onclick="updateStatus(<?php echo $ctg['id_dm'] ?>, 'hoatdong')">Không hoạt động</a>
                        <?php
                        } else {
                        ?>
                            <a href="#" class="btn btn-sm btn-warning" onclick="updateStatus(<?php echo $ctg['id_dm'] ?>, 'khonghoatdong')">Hoạt động</a>
                        <?php 
                        }  
                        ?>
                    </td>
                    <td>
                        <a href="edit_cata.php?trangthai=edit&&id=<?php echo $ctg['id_dm'] ?>" class="btn btn-sm btn-warning">Chỉnh sửa</a>
                        <a href="?trangthai=delete&&id=<?php echo $ctg['id_dm'] ?>" class="btn btn-sm btn-danger">Xóa</a>
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