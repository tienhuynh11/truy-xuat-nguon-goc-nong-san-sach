<?php


$so_ban_ghi_mot_trang = 5;
if (isset($_GET['trang'])) {
    $trang_hien_tai = $_GET['trang'];
} else {
    $trang_hien_tai = 1;
}
$so_ban_ghi = $obj->count_cg_manage($admin_id, $admin_role);
$tong_so_trang = ceil($so_ban_ghi / $so_ban_ghi_mot_trang);
$bat_dau = ($trang_hien_tai - 1) * $so_ban_ghi_mot_trang;
$ket_thuc = $bat_dau + $so_ban_ghi_mot_trang;
$show_cg = $obj->display_cg_pagination($bat_dau, $ket_thuc, $admin_id, $admin_role);

$dn_info = $obj->display_dn();
$user_info = $obj->show_admin_user();
$user_array = array();
while ($user = mysqli_fetch_assoc($user_info)) {
    $user_array[] = $user;
}

$dn_array = array();
while ($dn = mysqli_fetch_assoc($dn_info)) {
    $dn_array[] = $dn;
}
if (isset($_GET['status'])) {
    $id_cg = $_GET['id'];
    if ($_GET['status'] == 'delete') {
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
                <th>Người đăng</th>
                <th>Tên Cây giống</th>
                <th>Mã Cây giống</th>
                <th>Mã qr</th>
                <th>Mô tả</th>
                <th>Nhà sản xuất</th>
                <th>Nhà phân phối</th>
                <th>Ngày sản xuất</th>
                <th>Hạn sử dụng</th>
                <th>Phương pháp trồng</th>
                <th>Xuất xứ</th>
                <th>Giá</th>
                <th>Hướng dẫn sử dụng</th>
                <th>Hình ảnh</th>
                <th>Liên hệ</th>
                <th>Giấy chứng nhận</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $dem = ($trang_hien_tai - 1) * $so_ban_ghi_mot_trang + 1;
            while ($cg = mysqli_fetch_assoc($show_cg)) {

            ?>
                <tr>

                    <td><?php echo $dem ?></td>
                    <td> <?php

                            foreach ($user_array as $user) {
                                if ($cg['nguoidang'] == $user['id_acc']) {
                                    echo $user['hoten'];
                                }
                            }

                            ?> </td>
                    <td> <?php echo $cg['tencaygiong']  ?> </td>
                    <td> <?php echo  $cg['macaygiong'] ?> </td>
                    <td>
                        <div class="qrcode"><a href="#"><img style="height:60px" src="uploads/qrcode_caygiong/<?php echo $cg['maqr'] ?>" alt="<?= $cg['maqr'] ?>"></a></div>
                    </td>
                    <td> <?php echo $cg['mota'] ?> </td>
                    <td> <?php

                            foreach ($dn_array as $dn) {
                                if ($dn['id_dn'] == $cg['nhasanxuat']) {
                                    echo $dn['tendoanhnghiep'];
                                }
                            }

                            ?> </td>
                    <td> <?php

                            foreach ($dn_array as $dn) {
                                if ($dn['id_dn'] == $cg['nhaphanphoi']) {
                                    echo $dn['tendoanhnghiep'];
                                }
                            }

                            ?> </td>
                    <td> <?php echo  $cg['ngaysanxuat'] ?> </td>
                    <td> <?php echo  $cg['hansudung'] ?> </td>
                    <td> <?php echo  $cg['phuongphaptrong'] ?> </td>
                    <td> <?php echo  $cg['xuatxu'] ?> </td>
                    <td> <?php echo  $cg['gia'] ?> </td>
                    <td> <?php echo  $cg['hdsd'] ?> </td>
                    <td><img style="height:60px" src="uploads/<?php echo $cg['hinhanh'] ?>" alt=""></td>
                    <td> <?php echo  $cg['lienhe'] ?> </td>
                    <td><img style="height:60px" src="uploads/<?php echo $cg['giaychungnhan'] ?>" alt=""></td>


                    <td>
                        <a href="edit_caygiong.php?status=cgEdit&&id=<?php echo $cg['id_cg'] ?>" class="btn btn-sm btn-warning">Sửa </a>
                        <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="confirmDelete(<?php echo $cg['id_cg'] ?>)">Xóa</a>

                    </td>
                </tr>
                <!-- Tạo model -->
                <div id="qrcodeModal" class="modalx">
                    <div class="modal-contentx">
                        <span class="close">&times;</span>
                        <img style="height: 300px;" id="qrcodeImg">
                        <div class="download-btnx">
                            <a id="downloadLink" download="<?= $cg['macaygiong'] ?>-QRCODE.png"><button class="btn btn-info">Tải xuống</button></a>
                        </div>
                    </div>
                </div>


            <?php
                $dem++;
            }

            ?>
        </tbody>
    </table>
    <?php
    //dem ==1 đồng nghĩa với việc không có dữ liệu!
    if ($dem == 1) {
        echo '<p class="text-center">Không có dữ liệu!!</p>';
    }
    ?>
</div>
</div>
<?php
echo "<div class='pagination'  style='float: right;'> ";
if ($trang_hien_tai > 1) {
    echo "<a href='?trang=" . ($trang_hien_tai - 1) . "' class='btn btn-white text-dark ti-angle-left' ></a>";
}
for ($i = max(1, $trang_hien_tai - 2); $i <= min($tong_so_trang, $trang_hien_tai + 2); $i++) {
    if ($i > 1) {
        echo "&nbsp;";
    }
    if ($i == $trang_hien_tai) {
        echo "<a href='?trang=" . $i . "' class='btn btn-white text-dark' style='font-weight: bold; background-color: gray;'>$i</a>";
    } else {
        echo "<a href='?trang=" . $i . "' class='btn btn-white text-dark'>$i</a>";
    }
}
if ($trang_hien_tai < $tong_so_trang) {
    echo "<a href='?trang=" . ($trang_hien_tai + 1) . "' class='btn btn-white text-dark ti-angle-right'></a>";
}
echo "</div>";
?>
<script>
    function confirmDelete(id) {
        if (confirm("Bạn có chắc chắn muốn xóa cây giống này không?")) {
            window.location.href = "?status=delete&&id=" + id;
        }
    }
</script>