
<?php     
    $show_nhatky = $obj->show_nhatky();
    $nguoidang_info = $obj->show_admin_user();
    $sanpham_info = $obj->display_product();
    // Lưu trữ kết quả truy vấn vào một mảng
    $nguoidang_array = array();
    while($nguoidang = mysqli_fetch_assoc($nguoidang_info)){
        $nguoidang_array[] = $nguoidang;
    }
    $sanpham_array = array();
    while($sanpham = mysqli_fetch_assoc($sanpham_info)){
        $sanpham_array[] = $sanpham;
    }
    if(isset($_GET['status'])){
        $id_nk = $_GET['id'];
        if($_GET['status']=='delete'){
            $del_msg = $obj->delete_nhatky($id_nk);
        }
    }
?>      

<div style="padding-bottom: 5px;" class="row">
    <div class="col-md-6 col-sm-6 col-xl-6">
        <h2>Quản lý nhật ký</h2>
    </div>
    <div class="col-md-6 col-sm-6 col-xl-6">
        <a style="float: right;" class="btn btn-primary" href="add_nhatky.php">Thêm nhật ký</a>
    </div>
</div>

<div style="overflow-x: auto;">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Stt</th>
                    <th>Sản phẩm</th>
                    <th>người đăng</th>
                    <th>Tên nhật ký</th>
                    <th>Chi tiết</th>
                    <th>Hình ảnh</th>
                    <th>Thời gian tạo</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $dem=1;
                while($nk = mysqli_fetch_assoc($show_nhatky)){
                    ?>
                    <tr>
                        <td><?php echo $dem;?></td>
                        <td>
                            <?php 
                            foreach($sanpham_array as $sanpham){
                                if($nk['sanpham'] == $sanpham['id_sp']){
                                    echo $sanpham['tensanpham'];
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <?php 
                            foreach($nguoidang_array as $nguoidang){
                                if($nk['nguoidang'] == $nguoidang['id_acc']){
                                    echo $nguoidang['hoten'];
                                }
                            }
                            ?>
                        </td>
                        <td><?php echo $nk['tennhatky'] ?></td>
                        <td><?php echo $nk['chitiet'] ?></td>
                        <td><img style="height:60px" src="uploads/<?php echo $nk['hinhanh'] ?>" alt=""></td>
                        <td><?php echo $nk['thoigiantao'] ?></td>
                        <td>  
                            <a href="edit_nhatky.php?status=nkEdit&&id=<?php echo $nk['id_nk'] ?>" class="btn btn-sm btn-warning">Sửa</a>
                            <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="confirmDelete(<?php echo $nk['id_nk'] ?>)">Xóa</a>
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
        if (confirm("Bạn có chắc chắn muốn xóa không?")) {
            window.location.href = "?status=delete&&id=" + id;
        }
    }
</script>
