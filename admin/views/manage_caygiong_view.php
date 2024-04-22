<?php     
    $show_cg = $obj->show_caygiong();
  if(isset($_GET['status'])){
      $id_cg = $_GET['id'];
      if($_GET['status']=='delete'){
            $del_msg = $obj->delete_caygiong($id_cg);
      }
  }

?>      

<div style="padding-bottom: 5px;" class="row">
    <div class="col-md-6 col-sm-6">
        <h2>Quản lý cây giống</h2>
    </div>
    <div class="col-md-6 col-sm-6">
        <a style="float: right;" class="btn btn-primary" href="add_caygiong.php">Thêm cây giống</a>
    </div>
</div>

<div style="overflow-x: auto;">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Stt</th>
                <th>Tên Cây giống</th>
                <th>Mã Cây giống</th>
                <th>Mô tả</th>
                <th>Nhà sản xuất</th>
                <th>Ngày sản xuất</th>
                <th>Hạn sử dụng</th>
                <th>Phương pháp trồng</th>
                <th>Hình ảnh</th>
                <th>Liên hệ</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        <?php 
            $dem=1;
            while($cg = mysqli_fetch_assoc($show_cg)){
                
        ?>
            <tr>
                <td><?php echo $dem ?></td>
                <td> <?php echo $cg['tencaygiong']  ?> </td>
                <td> <?php echo  $cg['macaygiong'] ?> </td>
                <td> <?php echo $cg['mota'] ?> </td>
                <td> <?php echo  $cg['nhasanxuat'] ?> </td>
                <td> <?php echo  $cg['ngaysanxuat'] ?> </td>
                <td> <?php echo  $cg['hansudung'] ?> </td>
                <td> <?php echo  $cg['phuongphaptrong'] ?> </td>
                <td><img style="height:60px" src="uploads/<?php echo $cg['hinhanh'] ?>" alt=""></td>
                <td> <?php echo  $cg['lienhe'] ?> </td>
                
            
            
                <td>  
                    <a href="edit_caygiong.php?status=cgEdit&&id=<?php echo $cg['id_cg'] ?>" class="btn btn-sm btn-warning">Sửa </a>
                    <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="confirmDelete(<?php echo $cg['id_cg'] ?>)">Xóa</a>

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
        if (confirm("Bạn có chắc chắn muốn xóa cây giống này không?")) {
            window.location.href = "?status=delete&&id=" + id;
        }
    }
</script>