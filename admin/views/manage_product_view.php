<?php 
$obj=new adminback();
$so_ban_ghi_mot_trang = 7;
if(isset($_GET['trang'])){
    $trang_hien_tai = $_GET['trang'];
} else {
    $trang_hien_tai = 1;
}
$so_ban_ghi =$obj->count_sp();
$tong_so_trang = ceil($so_ban_ghi / $so_ban_ghi_mot_trang);
$bat_dau = ($trang_hien_tai - 1) * $so_ban_ghi_mot_trang;
$ket_thuc = $bat_dau + $so_ban_ghi_mot_trang;
$product_info = $obj->display_product_pagination($bat_dau, $ket_thuc);
$nguoidang_info = $obj->show_admin_user();

$nguoidang_array = array();
    while($nguoidang = mysqli_fetch_assoc($nguoidang_info)){
        $nguoidang_array[] = $nguoidang;
    }

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
<div style="padding-bottom: 5px;" class="row">
    <div class="col-md-6 col-sm-6">
        <h2>Quản lý nông sản</h2>
    </div>
    <div class="col-md-6 col-sm-6">
        <a style="float: right;" class="btn btn-primary" href="add_product.php">Thêm nông sản</a>
    </div>
</div>
<div style="overflow-x: auto;">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>STT</th>      
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
            $dem=($trang_hien_tai - 1) * $so_ban_ghi_mot_trang + 1;
            ?>
            <?php while($pdt = mysqli_fetch_assoc($product_info)) {
                $formatted_id_sp = 'NSQN'.str_pad($pdt['id_sp'], 5, '0', STR_PAD_LEFT);

                $danhmuc= $obj->display_cataByID($pdt['danhmuc']);

                $vung= $obj->vsx_By_id($pdt['vungsanxuat']);
                $vsx = mysqli_fetch_assoc($vung);

                $caygiong = $obj->show_caygiong_by_id($pdt['caygiong']);
                $cg = mysqli_fetch_assoc($caygiong);

                $taikhoan = $obj->show_admin_user_by_id($pdt['taikhoan']);
                $tk = mysqli_fetch_assoc($taikhoan);

                $nx = $obj->show_nx_by_id($pdt['nhaxuong']);
                
                $nsx=$obj->display_dnbyID($pdt['nhasanxuat']);
                $npp=$obj->display_dnbyID($pdt['nhaphanphoi']);
                $nxk=$obj->display_dnbyID($pdt['nhaxuatkhau']);
                $nnk=$obj->display_dnbyID($pdt['nhanhapkhau']);
                $nvc=$obj->display_dnbyID($pdt['nhavanchuyen']);
                
                ?>
                    
                <tr>
                    <td><?php echo $dem ?></td>
                    <td><?php echo $pdt['tensanpham'] ?></td>
                    <td><?php echo $formatted_id_sp ?></td>
                    
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
                        data-id="<?= $pdt['id_sp'] ?>" data-name="<?= $pdt['tensanpham'] ?>"  data-masp="<?php echo  $formatted_id_sp?>"
                        data-gia="<?= $pdt['gia'] ?>" data-xuatxu="<?= $pdt['xuatxu'] ?>" data-hinhanh="<?= $pdt['hinhanh'] ?>" 
                        data-congdung="<?= $pdt['congdung'] ?>" data-caygiong="<?= $cg['tencaygiong'] ?>" data-dieukienbaoquan="<?= $pdt['dieukienbaoquan'] ?>"
                        data-maqr="<?= $pdt['maqr'] ?>" data-mota="<?= $pdt['mota'] ?>" data-hdsd="<?= $pdt['hdsd'] ?>" 
                        data-danhmuc="<?= $danhmuc['tendanhmuc'] ?>" data-taikhoan="<?= $tk['hoten'] ?>" data-nhasanxuat="<?= $nsx['tendoanhnghiep'] ?>"
                        data-nhaxuatkhau="<?= $nxk['tendoanhnghiep'] ?>"  data-nhanhapkhau="<?= $nnk['tendoanhnghiep'] ?>"  data-nhaphanphoi="<?= $npp['tendoanhnghiep'] ?>" 
                        data-nhavanchuyen="<?= $nvc['tendoanhnghiep'] ?>"  data-nhaxuong="<?= $nx['tennhaxuong'] ?>"
                        data-vungsanxuat="<?= $vsx['tenvung'] ?>">Chi tiết</a>

                        <!-- <a class="btn btn-sm btn-success" href="#" data-toggle="modal" data-target="#exampleModalCenter" data-id="<?php echo $pdt['id_sp'] ?>">Chi tiết</a> -->
                        <a href="edit_product.php?trangthai=edit&&id=<?php echo $pdt['id_sp'] ?>" class="btn btn-sm btn-warning">Sửa</a>
                        <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="confirmDelete(<?php echo $pdt['id_sp'] ?>)">Xóa</a>
                    </td>
                </tr>
                <?php 
                    $dem++;
                }
                
                
                
                ?>
        </tbody>
    </table>
</div>
<?php 
echo "<div class='pagination'  style='float: right;'> ";
if($trang_hien_tai > 1){
    echo "<a href='?trang=".($trang_hien_tai - 1)."' class='btn btn-white text-dark ti-angle-left' ></a>";
}
for($i = max(1, $trang_hien_tai - 2); $i <= min($tong_so_trang, $trang_hien_tai + 2); $i++){
    if ($i > 1) {
        echo "&nbsp;";
    }
    if ($i == $trang_hien_tai) {
        echo "<a href='?trang=".$i."' class='btn btn-white text-dark' style='font-weight: bold; background-color: gray;'>$i</a>";
    } else {
        echo "<a href='?trang=".$i."' class='btn btn-white text-dark'>$i</a>";
    }
}
if($trang_hien_tai < $tong_so_trang){
    echo "<a href='?trang=".($trang_hien_tai + 1)."' class='btn btn-white text-dark ti-angle-right'></a>";
}
echo "</div>";
?>
 
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

        var nhaxuong = $('#xemchitiet').data('nhaxuong');
        var nhasanxuat = $('#xemchitiet').data('nhasanxuat');
        var nhanhapkhau = $('#xemchitiet').data('nhanhapkhau');
        var nhaphanphoi = $('#xemchitiet').data('nhaphanphoi');
        var nhavanchuyen = $('#xemchitiet').data('nhavanchuyen');
        var nhaxuatkhau = $('#xemchitiet').data('nhaxuatkhau');


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
        $('#maqr').html('<img src="uploads/' + maqr + '" style="height: 100px;">');
        $('#danhmuc').text(danhmuc);
        $('#caygiong').text(caygiong);
        $('#trangthai').text(trangthai);
        $('#dieukienbaoquan').text(dieukienbaoquan);
        $('#gia').text(gia);
        $('#nhasanxuat').text(nhasanxuat);
        $('#nhaxuong').text(nhaxuong);
        $('#nhanhapkhau').text(nhanhapkhau);
        $('#nhaphanphoi').text(nhaphanphoi);
        $('#nhavanchuyen').text(nhavanchuyen);
        $('#nhaxuatkhau').text(nhaxuatkhau);

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
        var nhaxuatkhau = $(this).data('nhaxuatkhau');
        var nhavanchuyen = $(this).data('nhavanchuyen');
        var nhanhapkhau = $(this).data('nhanhapkhau');
        var nhasanxuat = $(this).data('nhasanxuat');
        var nhaphanphoi = $(this).data('nhaphanphoi');
        var nhaxuong = $(this).data('nhaxuong');

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
        $('#xemchitiet').data('nhaxuatkhau', nhaxuatkhau);
        $('#xemchitiet').data('nhavanchuyen', nhavanchuyen);
        $('#xemchitiet').data('nhanhapkhau', nhanhapkhau);
        $('#xemchitiet').data('nhasanxuat', nhasanxuat);
        $('#xemchitiet').data('nhaphanphoi', nhaphanphoi);
        $('#xemchitiet').data('nhaxuong', nhaxuong);
        // Lưu id vào data-id của modal
    });
});
</script>



<div class="modal custom-modal fade" id="xemchitiet" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Thông tin chi tiết</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button> -->
            </div>
            <div class="modal-body" id="productDetails">
                                        <div class="row form-group">
                                            <label  class="col-3">Tên nông sản</label>
                                            <div class="col-9" id="tensanpham">   
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label  class="col-3">Mã sản phẩm</label>
                                            <div class="col-9" id="masanpham">   
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label  class="col-3">Mã QR</label>
                                            <div class="col-9" id="maqr">   
                                            </div>
                                        </div>
                                        <div class="row form-group" style="padding-bottom: 5px;">
                                            <label  class="col-3">Hình ảnh</label>
                                            <div class="col-9" id="hinhanh">   
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label  class="col-3">Giá</label>
                                            <div class="col-9" id="gia">   
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label  class="col-3">Mô tả</label>
                                            <div style="white-space: pre-line;" class="col-9" id="mota">   
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label  class="col-3">Danh mục</label>
                                            <div class="col-9" id="danhmuc">  
                                             
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label  class="col-3">Công dụng</label>
                                            <div class="col-9" style="white-space: pre-line;" id="congdung">   
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label  class="col-3">Hướng dẫn sử dụng</label>
                                            <div class="col-9" id="hdsd">   
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label  class="col-3">Vùng sản xuất</label>
                                            <div class="col-9" id="vungsanxuat">   
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label  class="col-3">Xuất xứ</label>
                                            <div class="col-9" id="xuatxu">   
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label  class="col-3">Điều kiện bảo quản</label>
                                            <div class="col-9" id="dieukienbaoquan">   
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label  class="col-3">Cây giống</label>
                                            <div class="col-9" id="caygiong">   
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label  class="col-3">Nhà sản xuất</label>
                                            <div class="col-9" id="nhasanxuat">   
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label  class="col-3">Nhà phân phối</label>
                                            <div class="col-9" id="nhaphanphoi">   
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label  class="col-3">Nhà nhập khẩu</label>
                                            <div class="col-9" id="nhanhapkhau">   
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label  class="col-3">Nhà xuất khẩu</label>
                                            <div class="col-9" id="nhaxuatkhau">   
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label  class="col-3">Nhà vận chuyển</label>
                                            <div class="col-9" id="nhavanchuyen">   
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <label  class="col-3">Nhà xưởng</label>
                                            <div class="col-9" id="nhaxuong">   
                                            </div>
                                        </div>
                                        <div class="row form-group" style="border-bottom: none">
                                            <label  class="col-3">Người đăng </label>
                                            <div class="col-9" id="taikhoan"> 
                                            <?php 
                                                foreach($nguoidang_array as $nguoidang){
                                                    if($pdt['taikhoan'] == $nguoidang['id_acc']){
                                                        echo $nguoidang['hoten'];
                                                    }
                                                }
                                                ?>  
                                            </div>
                                        </div>
            </div>
            <div class="modal-footer">
        <button type="button" class="btn btn-success" data-dismiss="modal">Đóng</button>
       
      </div>

		</div>
	</div>
</div>

<style>
  #xemchitiet .modal-dialog {
    max-width: 80%; /* Thiết lập kích thước tối đa cho modal */
    
}

@media (max-width: 576px) {
    #xemchitiet .modal-dialog {
        margin: 0 auto; /* Canh giữa modal */
        max-width: calc(100% - 20px); /* Độ rộng tối đa của modal */
    }
}

@media (min-width: 576px) {
    .modal-dialog {
        max-width: 500px;
        margin: 0 auto;
        margin-top: 10px;
    }
}
#xemchitiet .modal-body {
    max-height: 550px; /* Thiết lập chiều cao tối đa cho modal body */
    overflow-y: auto; /* Hiển thị thanh cuộn dọc khi cần thiết */
    word-wrap: break-word; /* Xuống hàng khi cần thiết */
    overflow-wrap: break-word; /* Xuống hàng khi cần thiết (phù hợp với các trình duyệt mới hơn) */
}

.form-group{
    border-bottom: 1px dotted #ccc;
}

</style>


