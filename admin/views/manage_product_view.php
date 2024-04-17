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
                     data-id="<?= $pdt['id_sp'] ?>" data-name="<?= $pdt['tensanpham'] ?>"  data-masp="<?= $pdt['masanpham'] ?>"
                      data-gia="<?= $pdt['gia'] ?>" data-xuatxu="<?= $pdt['xuatxu'] ?>" data-hinhanh="<?= $pdt['hinhanh'] ?>" 
                      data-congdung="<?= $pdt['congdung'] ?>" data-caygiong="<?= $pdt['caygiong'] ?>" data-dieukienbaoquan="<?= $pdt['dieukienbaoquan'] ?>"
                       data-maqr="<?= $pdt['maqr'] ?>" data-mota="<?= $pdt['mota'] ?>" data-hdsd="<?= $pdt['hdsd'] ?>" 
                     data-danhmuc="<?= $pdt['danhmuc'] ?>" data-taikhoan="<?= $pdt['taikhoan'] ?>" 
                     data-vungsanxuat="<?= $pdt['vungsanxuat'] ?>">Chi tiết</a>

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
        var masp = $('#xemchitiet').data('masp');
        var hinhanh = $('#xemchitiet').data('hinhanh');
        var mota = $('#xemchitiet').data('mota');
        var hdsd = $('#xemchitiet').data('hdsd');
        var taikhoan = $('#xemchitiet').data('taikhoan');
        var vungsanxuat = $('#xemchitiet').data('vungsanxuat');
        var xuatxu = $('#xemchitiet').data('xuatxu');
        var maqr = $('#xemchitiet').data('maqr');
        var danhmuc = $('#xemchitiet').data('danhmuc');
        var caygiong = $('#xemchitiet').data('caygiong');
        var trangthai = $('#xemchitiet').data('trangthai');
        var dieukienbaoquan = $('#xemchitiet').data('dieukienbaoquan');
        var gia = $('#xemchitiet').data('gia');
        $('#id_sp').text(id);
        $('#tensanpham').text(name);
        $('#congdung').text(congdung);
        $('#edit_id').text(id);
        $('#masanpham').text(masp);
        $('#hinhanh').html('<img src="uploads/' + hinhanh + '" style="height: 100px;">');
        $('#mota').text(mota);
        $('#hdsd').text(hdsd);
        $('#taikhoan').text(taikhoan);
        $('#vungsanxuat').text(vungsanxuat);
        $('#xuatxu').text(xuatxu);
        $('#maqr').text(maqr);
        $('#danhmuc').text(danhmuc);
        $('#caygiong').text(caygiong);
        $('#trangthai').text(trangthai);
        $('#dieukienbaoquan').text(dieukienbaoquan);
        $('#gia').text(gia);

    });

    // Click vào nút xem
    $('.editbtn').on('click',function (){
        var id = $(this).data('id');
        var name = $(this).data('name');
        var congdung = $(this).data('congdung');
        var masp = $(this).data('masp');
        var hinhanh = $(this).data('hinhanh');
        var mota = $(this).data('mota');
        var hdsd = $(this).data('hdsd');
        var taikhoan = $(this).data('taikhoan');
        var vungsanxuat = $(this).data('vungsanxuat');
        var xuatxu = $(this).data('xuatxu');
        var maqr = $(this).data('maqr');
        var danhmuc = $(this).data('danhmuc');
        var caygiong = $(this).data('caygiong');
        var trangthai = $(this).data('trangthai');
        var dieukienbaoquan = $(this).data('dieukienbaoquan');
        var gia = $(this).data('gia');

        $('#xemchitiet').data('id', id);
        $('#xemchitiet').data('name', name);
        $('#xemchitiet').data('congdung', congdung);
        $('#xemchitiet').data('masp', masp);
        $('#xemchitiet').data('hinhanh', hinhanh);
        $('#xemchitiet').data('mota', mota);
        $('#xemchitiet').data('hdsd', hdsd);
        $('#xemchitiet').data('taikhoan', taikhoan);
        $('#xemchitiet').data('vungsanxuat', vungsanxuat);
        $('#xemchitiet').data('xuatxu', xuatxu);
        $('#xemchitiet').data('danhmuc', danhmuc);
        $('#xemchitiet').data('caygiong', caygiong);
        $('#xemchitiet').data('maqr', maqr);
        $('#xemchitiet').data('trangthai', trangthai);
        $('#xemchitiet').data('dieukienbaoquan', dieukienbaoquan);
        $('#xemchitiet').data('gia', gia);
        // Lưu id vào data-id của modal
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
            <table class="table">
                <tr>
                    <th>Tên nông sản:</th>
                    <td id="tensanpham"></td>
                </tr>
                <tr>
                    <th>Mã nông sản:</th>
                    <td id="masanpham"></td>
                </tr>
                <tr>
                    <th>Mã QR:</th>
                    <td id="maqr"></td>
                </tr>
                <tr>
                    <th>Giá:</th>
                    <td id="gia"></td>
                </tr>
                <tr>
                    <th>Mô tả:</th>
                    <td id="mota"></td>
                </tr>
                <tr>
                    <th>Danh mục:</th>
                    <td id="danhmuc"></td>
                </tr>
                <tr>
                    <th>Công dụng:</th>
                    <td id="congdung" ></td>
                </tr>
                <tr>
                    <th>Hình ảnh:</th>
                    <td id="hinhanh"  > </td>
                </tr>
                <tr>
                    <th>Hướng dẫn sử dụng:</th>
                    <td id="hdsd" ></td>
                </tr>
                <tr>
                    <th>Vùng sản xuất:</th>
                    <td id="vungsanxuat" ></td>
                </tr>
                <tr>
                    <th>Xuất xứ:</th>
                    <td id="xuatxu" ></td>
                </tr>
                <tr>
                    <th>Điều kiện bảo quản:</th>
                    <td id="dieukienbaoquan" ></td>
                </tr>
                <tr>
                    <th>Cây giống:</th>
                    <td id="caygiong"></td>
                </tr>
                <tr>
                    <th>Người đăng:</th>
                    <td id="taikhoan" ></td>
                </tr>
            </table>
            </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
       
      </div>

		</div>
	</div>
</div>

<style>
  #xemchitiet .modal-dialog {
    max-width: 80%; /* Thiết lập kích thước tối đa cho modal */
    
}

#xemchitiet .modal-body {
    max-height: 550px; /* Thiết lập chiều cao tối đa cho modal body */
    overflow-y: auto; /* Hiển thị thanh cuộn dọc khi cần thiết */
    word-wrap: break-word; /* Xuống hàng khi cần thiết */
    overflow-wrap: break-word; /* Xuống hàng khi cần thiết (phù hợp với các trình duyệt mới hơn) */
}

</style>

