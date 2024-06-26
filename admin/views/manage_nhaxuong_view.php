<?php

$catanx_info = $obj->display_catagory_nx();
$user_info = $obj->show_admin_user();
$dn_info = $obj->display_dn();
$vsx_info = $obj->vsxShow();

$so_ban_ghi_mot_trang = 5;
if (isset($_GET['trang'])) {
    $trang_hien_tai = $_GET['trang'];
} else {
    $trang_hien_tai = 1;
}
$so_ban_ghi = $obj->count_nx_manage($admin_id, $admin_role);
$tong_so_trang = ceil($so_ban_ghi / $so_ban_ghi_mot_trang);
$bat_dau = ($trang_hien_tai - 1) * $so_ban_ghi_mot_trang;
$ket_thuc = $bat_dau + $so_ban_ghi_mot_trang;
$arry = $obj->display_nx_pagination($bat_dau, $ket_thuc, $admin_id, $admin_role);

$catanx_array = array();
while ($catanx = mysqli_fetch_assoc($catanx_info)) {
    $catanx_array[] = $catanx;
}
$user_array = array();
while ($user = mysqli_fetch_assoc($user_info)) {
    $user_array[] = $user;
}
$dn_array = array();
while ($dn = mysqli_fetch_assoc($dn_info)) {
    $dn_array[] = $dn;
}
$vsx_array = array();
while ($vsx = mysqli_fetch_assoc($vsx_info)) {
    $vsx_array[] = $vsx;
}

if (isset($_GET['status'])) {
    $id_nx = $_GET['id'];
    if ($_GET['status'] == 'delete') {
        $del_msg = $obj->delete_nx($id_nx);
    }
}

?>

<div style="padding-bottom: 5px;" class="row">
    <div class="col-md-6 col-sm-6">
        <h2>Quản lý nhà xưởng</h2>
    </div>
    <div class="col-md-6 col-sm-6">
        <a style="float: right;" class="btn btn-primary" href="add_nhaxuong.php">Thêm nhà xưởng</a>
    </div>
</div>

<div style="overflow-x: auto;">

    <table class="table table-bordered">
        <thead>


            <tr>
                <th>STT</th>
                <th>Tên nhà xưởng</th>
                <th>Mã nhà xưởng</th>
                <th>Người đăng</th>
                <th>Danh mục nhà xưởng</th>

                <th>Người đại diện </th>
                <th>Mã qr</th>
                <th>Doanh nghiệp</th>
                <th>Vùng sản xuất</th>

                <th>Hình ảnh</th>

                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Diện tích tổng thể</th>
                <th>Giấy phép kinh doanh</th>
                <th>Giấy chứng nhận</th>
                <th>Giấy kiểm định</th>
                <th>Thông tin</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $dem = ($trang_hien_tai - 1) * $so_ban_ghi_mot_trang + 1;
            while ($nx = mysqli_fetch_assoc($arry)) {
            ?>
                <tr>
                    <td> <?php echo $dem ?> </td>
                    <td> <?php echo $nx['tennhaxuong'] ?> </td>
                    <td> <?php echo $nx['manhaxuong'] ?> </td>
                    <td> <?php

                            foreach ($user_array as $user) {
                                if ($nx['nguoidang'] == $user['id_acc']) {
                                    echo $user['hoten'];
                                }
                            }

                            ?> </td>
                    <td> <?php

                            foreach ($catanx_array as $catanx) {
                                if ($nx['danhmuc_nx'] == $catanx['id_dmnx']) {
                                    echo $catanx['loainhaxuong'];
                                }
                            }

                            ?> </td>
                    <td> <?php

                            foreach ($user_array as $user) {
                                if ($nx['nguoidaidien'] == $user['id_acc']) {
                                    echo $user['hoten'] . '-' . $user['dienthoai'];
                                }
                            }

                            ?> </td>
                    <td><div class="qrcode"><a href="#"><img style="height:60px" src="uploads/qrcode_nhaxuong/<?php echo $nx['maqr'] ?>" alt="<?= $nx['maqr'] ?>"></a></div></td>
                    <td> <?php

                            foreach ($dn_array as $dn) {
                                if ($dn['id_dn'] == $nx['doanhnghiep']) {
                                    echo $dn['tendoanhnghiep'];
                                }
                            }

                            ?> </td>
                    <td> <?php

                            foreach ($vsx_array as $vsx) {
                                if ($vsx['id_vung'] == $nx['vungsanxuat']) {
                                    echo $vsx['tenvung'];
                                }
                            }

                            ?> </td>

                    <td><img style="height:60px" src="uploads/<?php echo $nx['hinhanh'] ?>" alt=""></td>

                    <td> <?php echo $nx['dienthoai'] ?> </td>
                    <td> <?php echo $nx['email'] ?> </td>
                    <td>
                        <?php
                        $result = $obj->XoaSo($nx['diachi']);
                        $result = mb_convert_encoding($result, "UTF-8", "auto");
                        if (!empty($nx['ap'])) {
                            echo $nx['ap'] . ', ' . $obj->formatChu($result);
                        } else {
                            echo $obj->formatChu($result);
                        }
                        ?>
                    </td>
                    <td> <?php echo $nx['dientichtongthe'] ?> </td>
                    <td><img style="height:60px" src="uploads/<?php echo $nx['giayphepkinhdoanh'] ?>" alt=""></td>
                    <td><img style="height:60px" src="uploads/<?php echo $nx['giaychungnhan'] ?>" alt=""></td>
                    <td><img style="height:60px" src="uploads/<?php echo $nx['giaykiemdinh'] ?>" alt=""></td>
                    <td> <?php echo $nx['thongtin'] ?> </td>


                    <td>
                        <a href="edit_nhaxuong.php?status=nxEdit&&id=<?php echo $nx['id_nx'] ?>" class="btn btn-sm btn-warning">Sửa </a>
                        <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="confirmDelete(<?php echo $nx['id_nx'] ?>)">Xóa</a>

                    </td>
                </tr>

                <div id="qrcodeModal" class="modalx">
                    <div class="modal-contentx">
                        <span class="close">&times;</span>
                        <img style="height: 300px;" id="qrcodeImg">
                        <div class="download-btnx">
                            <a id="downloadLink" download="<?= $nx['maqr'] ?>-QRCODE.png"><button class="btn btn-info">Tải xuống</button></a>
                        </div>
                    </div>
                </div>

            <?php
                $dem++;
            } ?>
        </tbody>
    </table>
    <?php
    //dem ==1 đồng nghĩa với việc không có dữ liệu!
    if ($dem == 1) {
        echo '<p class="text-center">Không có dữ liệu!!</p>';
    }
    ?>
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
        if (confirm("Bạn có chắc chắn muốn xóa tài khoản này không?")) {
            window.location.href = "?status=delete&&id=" + id;
        }
    }
</script>