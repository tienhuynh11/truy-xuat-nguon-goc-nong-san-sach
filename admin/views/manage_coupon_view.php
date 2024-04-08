<?php     
    $show_baiviet = $obj->show_baiviet();
    
  if(isset($_GET['status'])){
      $id_bv = $_GET['id'];
      if($_GET['status']=='delete'){
            $del_msg = $obj->delete_baiviet($id_bv);
      }
  }

?>      

<div class="container">
    <h2>Quản lý bài viết</h2>

    <table class="table table-bordered">
        <thead>

       
            <tr>
                <th>Stt</th>
                <th>Người đăng</th>
                <th>Sản phẩm</th>
                <th>tiêu đề</th>
                <th>Ngày đăng</th>
                
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        <?php 
            while($bv = mysqli_fetch_assoc($show_baiviet)){
        ?>
            <tr>
                <td>1</td>
                <td> <?php echo $bv['nguoidang'] ?> </td>
                <td> <?php echo $bv['sanpham'] ?> </td>
                <td> <?php echo $bv['tieude'] ?> </td>
                <td> <?php echo $bv['ngaydang'] ?> </td>
                
            
            
                <td>  
                    <a href="edit_coupon.php?status=couponEdit&&id=<?php echo $bv['id_bv'] ?>" class="btn btn-sm btn-warning">Edit </a>
                    <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="confirmDelete(<?php echo $bv['id_bv'] ?>)">Delete</a>

                </td>
            </tr>

           

            <?php }?>
        </tbody>
    </table>
</div>

<script>
    function confirmDelete(id) {
        if (confirm("Bạn có chắc chắn muốn xóa nông sản này không?")) {
            window.location.href = "?status=delete&&id=" + id;
        }
    }
</script>