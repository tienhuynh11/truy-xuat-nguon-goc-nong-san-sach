
  

<?php 

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
   
    $dem=1;

?>
<div >
    <table class="table table-striped">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên danh mục</th>
                <th>Trạng thái</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
           <?php while($ctg = mysqli_fetch_assoc($catagories)){ ?>
            <tr>
                <td><?php echo $dem ?></td>
                <td><?php echo $ctg['tendanhmuc'] ?></td>
                
                <td>
                    <?php 
                    if($ctg['trangthai']=='hoatdong')
                    {
                    
                         ?> 
                        <a href="#"  class="btn btn-sm btn-primary" onclick="updateStatus(<?php echo $ctg['id_dm'] ?>,'khonghoatdong')" >Hoạt động</a>
                        <?php
                    } 
                    else{
                    
                    ?>
                    <a href="#"  class="btn btn-sm btn-warning" onclick="updateStatus(<?php echo $ctg['id_dm'] ?>,'hoatdong')" >Không hoạt động</a>
                        <?php 
                    }  
                    
                    ?>
                
                </td>
                <td>
                    <a href="edit_cata.php?trangthai=edit&&id=<?php echo $ctg['id_dm'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="confirmDelete(<?php echo $ctg['id_dm'] ?>)">Delete</a>
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
<script>
    function updateStatus(id, status) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "?trangthai=" + status + "&&id=" + id, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                location.reload(); 
            }
        };
        xhr.send();
    }
    
</script>