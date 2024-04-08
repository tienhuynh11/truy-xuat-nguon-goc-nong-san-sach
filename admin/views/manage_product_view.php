<?php 
$obj=new adminback();
$product_info =  $obj->display_product();

if(isset($_GET['trangthai'])){
    $id = $_GET['id'];
    if($_GET['trangthai']=='daxetduyet'){
        $obj->published_product($id);
    } elseif($_GET['trangthai']=='dangchoxetduyet') {
        $obj->unpublished_product($id);
    } elseif($_GET['trangthai']=="delete") {
        $del_msg = $obj->delete_product($id);
    }
}
?>
<h2>Quản lý nông sản</h2> 
<br>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>STT</th>      
            <th>Test ID</th>
            <th>Tên sản phẩm</th>      
            <th>Mã sản phẩm</th>
            <th>QR code</th>
            <th>Trạng thái</th> 
            <th>Hành động</th> 

        </tr>
    </thead>

    <tbody>
        <?php 
        if(isset($del_msg)){
            echo "{$del_msg}";
        }
        $dem=1;
        ?>
        <?php while($pdt = mysqli_fetch_assoc($product_info)) {?>
            <tr>
                <td><?php echo $dem ?></td>
                <td><?php echo $pdt['id_sp'] ?></td>
                <td><?php echo $pdt['tensanpham'] ?></td>
                <td><?php echo $pdt['masanpham'] ?></td>
                
                <td><img style="height:60px" src="uploads/<?php echo $pdt['maqr'] ?>" alt=""></td>
                <td> 
                    <?php if($pdt['trangthai']=='dangchoxetduyet'){ ?>
                        <a href="#"  class="btn btn-sm btn-primary" onclick="updateStatus(<?php echo $pdt['id_sp'] ?>,'daxetduyet')">Đang chờ xét duyệt</a>
                    <?php } else { ?>
                        <a href="#" class="btn btn-sm btn-warning" onclick="updateStatus(<?php echo $pdt['id_sp'] ?>,'dangchoxetduyet')">Đã xét duyệt</a>
                    <?php } ?>
                </td>
                
                <td>
                    <!-- Ở đây m muốn hiển thị dữ liệu nào thì thêm data-tênbiến = "<?= $pdt['tên biến cần lấy'] ?>" bỏ vô dưới -->

                    <a class="btn btn-sm btn-success editbtn" href="#" data-toggle="modal" data-target="#xemchitiet"
                     data-id="<?= $pdt['id_sp'] ?>" data-name="<?= $pdt['tensanpham'] ?>"  data-masp="<?= $pdt['masanpham'] ?>" data-hinhanh="<?= $pdt['hinhanh'] ?>" data-congdung="<?= $pdt['congdung'] ?>">Chi tiết</a>

                    <!-- <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#exampleModalCenter" data-id="<?php echo $pdt['id_sp'] ?>">Chi tiết</a> -->
                    <a href="edit_product.php?trangthai=edit&&id=<?php echo $pdt['id_sp'] ?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="confirmDelete(<?php echo $pdt['id_sp'] ?>)">Delete</a>
                </td>
            </tr>
            <?php 
                $dem++;
            }?>
    </tbody>
</table>
  
<script>
    function confirmDelete(id) {
        if (confirm("Bạn có chắc chắn muốn xóa nông sản này không?")) {
            window.location.href = "?trangthai=delete&&id=" + id;
        }
    }

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

    $(document).ready(function(){
    // Gán giá trị khi modal được hiển thị
    $('#xemchitiet').on('shown.bs.modal', function () {
        var id = $('#xemchitiet').data('id');
        var name = $('#xemchitiet').data('name');
        var congdung = $('#xemchitiet').data('congdung');
        $('#id_sp').text(id);
        $('#tensanpham').text(name);
        $('#congdung').text(congdung);
        $('#edit_id').text(id);
    });

    // Click vào nút xem
    $('.editbtn').on('click',function (){
        var id = $(this).data('id');
        var name = $(this).data('name');
        var congdung = $(this).data('congdung');
        $('#xemchitiet').data('id', id);
        $('#xemchitiet').data('name', name);
        $('#xemchitiet').data('congdung', congdung);  // Lưu id vào data-id của modal
    });
});
</script>



<div class="modal custom-modal fade" id="xemchitiet" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Thông tin chi tiết</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="productDetails">
                
        <!-- Dưa dữ liệu vào đây, ví dụ nè -->
            <p id="congdung"></p><!-- Tức là sẽ lấy cái id trên cái script trên bỏ xuống-->
            </div>
		</div>
	</div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Thông tin chi tiết</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="productDetails">
            <div class="form-group">
                <label for="" class="control-label col-md -12"><b>Tên nông sản:</b> <?php echo $pdt['tensanpham'] ;?> </label>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md -12"><b>Mã nông sản: </b><?php echo $pdt['masanpham'] ;?> </label>
            </div>
            <div class="form-group">
            <div class="form-group">
                <label for="" class="control-label col-md -12"><b>Mã QR : </b><?php echo $pdt['maqr'] ;?> </label>
            </div>
                <label for="" class="control-label col-md -12"><b>Giá: </b><?php echo $pdt['gia'] ;?> </label>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md -12"><b>Mô tả: </b> <?php echo $pdt['mota'] ;?></label>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md -12"><b>Danh mục:</b> 
                        <?php while($cata = mysqli_fetch_assoc($cata_info)){ 
                                if($pdt['danhmuc'] == $cata['id_dm']){
                                    echo $cata['tendanhmuc'];
                                }
                        }?>
                        
                </label>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md -12"><b>Hình ảnh: </b> <img src="uploads/<?php echo $pdt['hinhanh']?>" style="width: 80px;" > </label>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md -12"><b>Xuất xứ: </b> <?php echo $pdt['xuatxu'] ;?></label>
            </div>
            <div class="form-group">
                <label for="" class="control-label col-md -12"><b>Hướng dẫn sử dụng:</b>  <?php echo $pdt['hdsd'] ;?></label>
            </div>             
            <div class="form-group">
                <label for="" class="control-label col-md -12"><b>Người đăng:  </b>
                <?php while($admin = mysqli_fetch_assoc($admin_info)){ 
                                if($pdt['taikhoan'] == $admin['id_acc']){
                                    echo $admin['hoten'];
                                }
                        }?>
            
            </label>
            </div>        
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>