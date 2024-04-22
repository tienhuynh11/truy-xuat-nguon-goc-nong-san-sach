<?php     
    $show_baiviet = $obj->show_baiviet();
    $nguoidang_info = $obj->show_admin_user();

    // Lưu trữ kết quả truy vấn vào một mảng
    $nguoidang_array = array();
    while($nguoidang = mysqli_fetch_assoc($nguoidang_info)){
        $nguoidang_array[] = $nguoidang;
    }

    if(isset($_GET['status'])){
        $id_bv = $_GET['id'];
        if($_GET['status']=='delete'){
            $del_msg = $obj->delete_baiviet($id_bv);
        }
    }
?>      

<div style="padding-bottom: 5px;" class="row">
    <div class="col-md-6 col-sm-6">
        <h2>Quản lý bài viết</h2>
    </div>
    <div class="col-md-6 col-sm-6">
        <a style="float: right;" class="btn btn-primary" href="add_bv.php">Thêm bài viết</a>
    </div>
</div>


<div style="overflow-x: auto;">
    
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Stt</th>
                    <th>Người đăng</th>
                    <th>Tiêu đề</th>
                    <th>Nội dung </th>
                    <th>Hình ảnh </th>
                    <th>Ngày đăng</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $dem=1;
                while($bv = mysqli_fetch_assoc($show_baiviet)){
                    ?>
                    <tr>
                        <td><?php echo $dem;?></td>
                        <td>
                            <?php 
                            foreach($nguoidang_array as $nguoidang){
                                if($bv['nguoidang'] == $nguoidang['id_acc']){
                                    echo $nguoidang['hoten'];
                                }
                            }
                            ?>
                        </td>
                        <td><?php echo $bv['tieude'] ?></td>
                        <td><?php echo $bv['noidung'] ?></td>
                        <td><img style="height:60px" src="uploads/<?php echo $bv['hinhanh'] ?>" alt=""></td>
                        <td><?php echo $bv['ngaydang'] ?></td>
                        <td>  
                            <a href="edit_bv.php?status=couponEdit&&id=<?php echo $bv['id_bv'] ?>" class="btn btn-sm btn-warning">Sửa </a>
                            <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="confirmDelete(<?php echo $bv['id_bv'] ?>)">Xóa</a>
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
        if (confirm("Bạn có chắc chắn muốn xóa nông sản này không?")) {
            window.location.href = "?status=delete&&id=" + id;
        }
    }
</script>
