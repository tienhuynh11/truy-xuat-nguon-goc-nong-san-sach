<?php
$hoso = $obj->show_admin_user_by_id($admin_id);
$user = mysqli_fetch_assoc($hoso);

if (isset($_POST['update_user'])) {
    $reg_msg = $obj->update_hoso($_POST);
}

$dn_info = $obj->display_dn();
$vungsanxuat = $obj->vsxShow();
$nx_info = $obj->show_nhaxuong();
?>

<?php if (!empty($reg_msg)) {
    if ($reg_msg == 1 || $reg_msg == 5) {
?>
        <div class="alert success">
            <div class="process"></div>
            <ion-icon name="shield-checkmark-outline"></ion-icon>
            <span>Cập nhật thành công!</span>
        </div>
    <?php } elseif ($reg_msg == 2 || $reg_msg == 6) { ?>
        <div class="alert">
            <div class="process"></div>
            <ion-icon name="shield-checkmark-outline"></ion-icon>
            <span>Cập nhật thất bại!</span>
        </div>
    <?php } elseif ($reg_msg == 3) { ?>
        <div class="alert">
            <div class="process"></div>
            <ion-icon name="shield-checkmark-outline"></ion-icon>
            <span>Chiều cao tối đa của ảnh là 2701px và chiều rộng là 2701px!</span>
        </div>
    <?php } elseif ($reg_msg == 4) { ?>
        <div class="alert">
            <div class="process"></div>
            <ion-icon name="shield-checkmark-outline"></ion-icon>
            <span>Tệp phải có định dạng .jpg, .jpeg hoặc .png!</span>
        </div>
    <?php } ?>
<?php } ?>
<form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
    <div class="form-body">
        <div class="form-group">
            <div class="col-md-3">
                <h2>Thông tin hồ sơ</h2>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Họ tên</label>
            <div class="col-md-6">
                <input type="text" name="name" class="form-control" placeholder="Điền tên" value="<?= $user['hoten'] ?>">
                <input type="hidden" value="<?= $user['id_acc'] ?>" name="id_acc" id="id_acc">
            </div>
        </div>
        <?php if (!($admin_role == 'Admin')) { ?>
            <div class="form-group">
                <label class="col-md-3 control-label">Loại thành viên</label>
                <div class="col-md-6">
                    <select name="u_user_role" class="form-control">
                        <!-- <option disabled selected>--Select--</option> -->

                        <?php
                        if ($user['role'] == 'Admin') {
                            echo '<option value="Admin" <?php if ($user["role"] == "Admin") {
                                echo "Selected";
                            } ?>Admin</option>';
                        }
                        ?>
                        <option value="Nguoidanhgia" <?php if ($user['role'] == 'Nguoidanhgia') {
                                                            echo "Selected";
                                                        } ?>>Người đánh giá</option>
                        <option value="Nongdan" <?php if ($user['role'] == 'Nongdan') {
                                                    echo "Selected";
                                                } ?>>Nông dân</option>
                        <option value="Chuyengia" <?php if ($user['role'] == 'Chuyengia') {
                                                        echo "Selected";
                                                    } ?>>Chuyên gia</option>
                        <option value="Chuyenvien" <?php if ($user['role'] == 'Chuyenvien') {
                                                        echo "Selected";
                                                    } ?>>Chuyên viên</option>
                        <option value="Kythuatvien" <?php if ($user['role'] == 'Kythuatvien') {
                                                        echo "Selected";
                                                    } ?>>Kỹ thuật viên</option>
                        <option value="Nguoikiemdinh" <?php if ($user['role'] == 'Nguoikiemdinh') {
                                                            echo "Selected";
                                                        } ?>>Người kiểm định</option>
                    </select>
                </div>
            </div>
        <?php } ?>

        <div class="form-group">
            <label class="control-label col-md-3">Ảnh</label>
            <div class="col-md-9">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-new thumbnail">
                        <input type="hidden" name="id_acc" value="<?= $admin_id ?>">
                        <input id="layimg" type="hidden" value="uploads/avatar/<?= $user['hinhdaidien'] ?>">
                        <img src="uploads/avatar/<?= $user['hinhdaidien'] ?>" alt="" style="max-width: 300px; max-height: 300px;object-fit: contain;">
                    </div>
                    <div>
                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 300px; max-height: 300px;object-fit: contain;"></div>
                        <label class="btn btn-success">
                            Chọn ảnh <input type="file" name="hinhdaidien" onchange="showImage(event)" style="display: none;">
                        </label>
                        <label class="btn btn-warning" onclick="deleteImage()">
                            <a href="javascript:void(0)" class="fileinput-exists" data-dismiss="fileinput">Xóa</a>
                        </label>

                    </div>
                </div>
                <div class="clearfix margin-top-10"></div>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Số điện thoại</label>
            <div class="col-md-6">
                <input type="text" name="sdt" class="form-control" placeholder="Điền số điện thoại" value="<?= $user['dienthoai'] ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Email</label>
            <div class="col-md-6">
                <input type="email" name="email" class="form-control" placeholder="Điền số điện thoại" value="<?= $user['email'] ?>" disabled>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Địa chỉ</label>
            <div class="col-md-6">
                <input type="text" name="diachi" class="form-control" placeholder="Điền số điện thoại" value="<?= $user['diachi'] ?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Thuộc doanh nghiệp</label>
            <div class="col-md-6">
                <select name="doanhnghiep" id="doanhnghiep" class="form-control">
                    <option value="" selected>Chọn doanh nghiệp</option>
                    <?php foreach ($dn_info as $dn) : ?>
                        <?php if ($dn['id_dn'] == $user['doanhnghiep']) { ?>
                            <option value="<?php echo $dn['id_dn'] ?>" selected><?php echo $dn['tendoanhnghiep'] ?></option>
                        <?php } else { ?>
                            <option value="<?php echo $dn['id_dn'] ?>"><?php echo $dn['tendoanhnghiep']   ?></option>
                        <?php } ?>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Thuộc vùng sản xuất</label>
            <div class="col-md-6">
                <select name="vungsanxuat" id="vungsanxuat" class="form-control">
                    <option value="" selected>Chọn vùng sản xuất</option>
                    <?php foreach ($vungsanxuat as $vsx) : ?>
                        <?php if ($vsx['id_vung'] == $user['vungsanxuat']) { ?>
                            <option value="<?php echo $vsx['id_vung'] ?>" selected><?php echo $vsx['tenvung'] ?></option>
                        <?php } else { ?>
                            <option value="<?php echo $vsx['id_vung'] ?>"><?php echo $vsx['tenvung']   ?></option>
                        <?php } ?>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Nhà xưởng</label>
            <div class="col-md-6">
                <select name="nhaxuong" id="nhaxuong" class="form-control">
                    <option value="" selected>Chọn nhà xưởng</option>
                    <?php while ($nx = mysqli_fetch_assoc($nx_info)) { ?>
                        <?php if ($nx['id_nx'] == $user['nhaxuong']) { ?>
                            <option value="<?php echo $nx['id_nx'] ?>" selected><?php echo $nx['tennhaxuong'] ?></option>
                        <?php } else { ?>
                            <option value="<?php echo $nx['id_nx'] ?>"><?php echo $nx['tennhaxuong'] ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </div>

        </div>

        <div class="form-group">
            <label class="col-md-3 control-label">Thông tin chung</label>
            <div class="col-md-6">
                <textarea name="thongtin" id="thongtin" class="form-control"><?= $user['thongtin'] ?></textarea>
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-offset-3 col-md-9">
                <input type="submit" class="btn btn-success" name="update_user" value="Lưu">
            </div>
        </div>
    </div>
</form>


<script>
    $(document).ready(function() {
        $("#doanhnghiep").select2();
        $("#vungsanxuat").select2();
        $("#nhaxuong").select2();
    });
    // Biến toàn cục để lưu trạng thái hiện tại của hình ảnh
    var currentImage = '';

    // Hàm được gọi khi người dùng chọn file
    function showImage(event) {
        var input = event.target;
        var reader = new FileReader();

        // Đọc file
        reader.onload = function() {
            var dataURL = reader.result;
            var preview = document.querySelector('.fileinput-new img');

            // Cập nhật hình ảnh mới
            preview.src = dataURL;

            // Lưu tên của hình ảnh hiện tại vào biến toàn cục
            currentImage = input.files[0].name;
        };

        // Đọc file dưới dạng URL
        reader.readAsDataURL(input.files[0]);
    }

    // Hàm được gọi khi người dùng nhấn nút "Xóa"
    function deleteImage() {
        // Đặt lại giá trị của input file thành rỗng
        var input = document.querySelector('input[type="file"]');
        input.value = '';

        // Cập nhật hình ảnh hiển thị về hình ảnh mặc định hoặc ảnh cũ
        var defaultImageUrl = document.getElementById('layimg').value;
        var preview = document.querySelector('.fileinput-new img');
        preview.src = defaultImageUrl;

        // Kiểm tra nếu có hình ảnh mới được tải lên, gán tên của hình ảnh mới vào biến toàn cục
        if (currentImage) {
            document.getElementById('new_image_name').value = currentImage;
        } else {
            // Nếu không có hình ảnh mới, gán tên của hình ảnh cũ cho trường ẩn new_image_name
            document.getElementById('new_image_name').value = '';
        }
    }
    var alertElement = document.querySelector('.alert');

    if (alertElement) {
        setTimeout(function() {
            alertElement.style.display = 'none';
        }, 5000);
    }
</script>

<style>
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        padding: 0 0 0 0;
        padding: .5rem .75rem;
        line-height: normal;
        border-radius: 2px;
        border: 1px solid #ccc;
        background-color: #fff;
    }

    .select2-container--default .select2-selection--single {
        border: none;
    }

    :root {
        --main-color: red;
    }

    .alert.success {
        --main-color: green;
    }

    .alert {
        width: 300px;
        height: 70px;
        display: flex;
        align-items: center;
        position: absolute;
        top: 10px;
        /* Điều chỉnh vị trí đỉnh */
        right: 10px;
        /* Điều chỉnh vị trí bên phải */
        border-radius: 10px;
        /* Bo góc */
        padding: 10px 20px;
        /* Khoảng cách bên trong */
        background-color: #fff;
        box-shadow: 0px 0px 10px var(--main-color);
        /* Hiệu ứng bóng */
        overflow: hidden;
        transition: all 0.4s;
    }

    .process {
        height: 70px;
        border-left: 10px solid var(--main-color);
        top: 0;
        left: 0;
        position: absolute;
        transition: all 0.25s;
    }

    .alert ion-icon {
        padding: 0px 10px;
        font-size: 20px;
        color: var(--main-color);
    }
</style>