

<?php 
    $cmt_info = $obj->view_comment_all();

    if(isset($_GET['status'])){
        $comment_id = $_GET['id'];
        if($_GET['status']=='deletecomment'){
            
           $del_msg =  $obj->delete_comment($comment_id);
          

        }
    }


?>
<h2>Quản lý đánh giá</h2>


<h5 class="text-danger">
<?php 
    if(isset($del_msg)){
        echo $del_msg;
    }

?>
</h5>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Id đánh giá</th>
            
            <th>Người đánh giá</th>
            <th>Sản phẩm</th>
            <th>Nội dung</th>
            <th>Số sao</th>
            <th>Ngày đăng</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        <?php 
            while($cmt_row = mysqli_fetch_assoc($cmt_info)){
        ?>
        <tr>
            <td>
                <?php echo $cmt_row['id_dg']?>
            </td>

           

            <td>
                <?php echo $cmt_row['nguoidang']?>
            </td>

            <td>
                <?php echo $cmt_row['sanpham']?>
            </td>
            <td>
                <?php echo $cmt_row['noidung']?>
            </td>
            <td>
                <?php echo $cmt_row['sosao']?>
            </td>
            <td>
                <?php echo $cmt_row['ngaydang']?>
            </td>
            <td>
                <a href="edit_comment.php?status=editcomment&&id= <?php echo $cmt_row['id_dg']?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="confirmDelete(<?php echo $cmt_row['id_dg'] ?>)">Delete</a>
            </td>



        </tr>

        <?php }?>
    </tbody>
</table>


<script>
    function confirmDelete(id) {
        if (confirm("Bạn có chắc chắn muốn xóa đánh giá này không?")) {
            window.location.href = "?status=deletecomment&&id=" + id;
        }
    }
</script>