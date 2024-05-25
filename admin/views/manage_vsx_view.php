<style>
    iframe {
        width: 250px;
        height: 150px;
    }
</style>
<?php
$so_ban_ghi_mot_trang = 2;
if (isset($_GET['trang'])) {
    $trang_hien_tai = $_GET['trang'];
} else {
    $trang_hien_tai = 1;
}
$so_ban_ghi = $obj->count_vsx_manage($admin_id, $admin_role);
$tong_so_trang = ceil($so_ban_ghi / $so_ban_ghi_mot_trang);
$bat_dau = ($trang_hien_tai - 1) * $so_ban_ghi_mot_trang;
$ket_thuc = $bat_dau + $so_ban_ghi_mot_trang;
$rows = $obj->display_vsx_pagination($bat_dau, $ket_thuc, $admin_id, $admin_role);

$nguoidang_info = $obj->show_admin_user();
$nguoidang_array = array();
while ($nguoidang = mysqli_fetch_assoc($nguoidang_info)) {
    $nguoidang_array[] = $nguoidang;
}
$nhatky_info = $obj->show_nhatky();
$nnhatky_array = array();
while ($nk = mysqli_fetch_assoc($nhatky_info)) {
    $nhatky_array[] = $nk;
}
if (isset($_GET['status'])) {
    $id = $_GET['id'];
    if ($_GET['status'] == "delete") {
        $del_msg = $obj->delete_Vungsanxuat($id);
    }
}
?>
<div style="padding-bottom: 5px;" class="row">
    <div class="col-md-6 col-sm-6">
        <h2>Quản lý vùng sản xuất</h2>
    </div>
    <div class="col-md-6 col-sm-6">
        <a style="float: right;" class="btn btn-primary" href="add_vsx.php">Thêm vùng sản xuất</a>
    </div>
</div>


<div style="overflow-x: auto;">

    <table class="table">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên vùng</th>
                <th>Mã vùng</th>
                <th>Nhật ký</th>
                <th>Mã QR</th>
                <th>Hình ảnh</th>
                <th>Người đăng</th>
                <th>Số điện thoại </th>
                <th>Địa chỉ</th>
                <th style="width: 200px;">Bản đồ</th>
                <th>Thời gian nuôi trồng</th>
                <th>Diện tích</th>
                <th>Thông tin</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>

            <?php
            $dem = ($trang_hien_tai - 1) * $so_ban_ghi_mot_trang + 1;
            while ($row = mysqli_fetch_assoc($rows)) {
            ?>

                <tr>
                    <td> <?php echo $dem ?></td>
                    <td> <?php echo $row['tenvung'] ?></td>
                    <td> <?php echo $row['mavung'] ?></td>
                    <td> <?php foreach ($nhatky_array as $nk) {
                                if ($row['nhatky'] == $nk['id_nk']) {
                                    echo $nk['tennhatky'];
                                }
                            } ?></td>
                    <td><div class="qrcode"><a href="#"><img style="height:60px" src="uploads/qrcode_vsx/<?php echo $row['maqr'] ?>" alt="<?= $row['maqr'] ?>"></a></div></td>
                    <td> <img src="uploads/<?php echo $row['hinhanh'] ?>" width="60px"> </td>

                    <td> <?php foreach ($nguoidang_array as $nguoidang) {
                                if ($row['nguoidang'] == $nguoidang['id_acc']) {
                                    echo $nguoidang['hoten'];
                                }
                            } ?></td>

                    <td> <?php echo $row['sdt'] ?></td>
                    <td>
                        <?php
                        $result = $obj->XoaSo($row['diachi']);
                        $diachi = mb_convert_encoding($result, "UTF-8", "auto");
                        if (!empty($row['ap'])) {
                            echo $row['ap'] . ', ' . $obj->formatChu($result);
                        } else {
                            echo $obj->formatChu($result);
                        }
                        ?></td>
                    <td style="width: 200px;"><?php echo $row['bando'] ?></td>
                    <td> <?php echo $row['thoigiannuoitrong'] ?></td>
                    <td> <?php echo $row['dientich'] ?></td>
                    <td> <?php echo $row['thongtin'] ?></td>
                    <td>
                        <a href="edit_vsx.php?status=edit&&id=<?php echo $row['id_vung'] ?>" class="btn btn-sm btn-warning">Sửa</a>
                        <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="confirmDelete(<?php echo $row['id_vung'] ?>)">Xóa</a>


                    </td>
                </tr>
                <div id="qrcodeModal" class="modalx">
                    <div class="modal-contentx">
                        <span class="close">&times;</span>
                        <img style="height: 300px;" id="qrcodeImg">
                        <div class="download-btnx">
                            <a id="downloadLink" download="<?= $row['maqr'] ?>-QRCODE.png"><button class="btn btn-info">Tải xuống</button></a>
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
        if (confirm("Bạn có chắc chắn muốn xóa vùng sản xuất này không?")) {
            window.location.href = "?status=delete&&id=" + id;
        }
    }
</script>