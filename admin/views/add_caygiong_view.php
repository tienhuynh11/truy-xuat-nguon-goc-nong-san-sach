
<?php 
    $dn_info=$obj->display_dn();

    if(isset($_POST['add_cg'])){
        $rtn_msg = $obj->add_caygiong($_POST);
    }

    if(isset($_SESSION['admin_id'])) {
        $nguoidang_id = $_SESSION['admin_id'];
    } else {
        header("Location:../dangnhap.php");
        exit();
    }
    $dn_array = array();
    while($dn = mysqli_fetch_assoc($dn_info)){
        $dn_array[] = $dn;
    }  
?>

<h2>Thêm Cây giống</h2>


<form action="" method="post" enctype="multipart/form-data" class="form">
    <div class="form-group">
        <label for="tencaygiong">Tên cây giống</label>
        <input type="text" name="tencaygiong" class="form-control" required>
    </div>
    <div class="form-group">
        <input type="hidden" name="nguoidang" class="form-control" value="<?php echo $nguoidang_id?>">
    </div>

    <div class="form-group">
        <label for="macaygiong">Mã cây giống</label>
        <input type="text" name="macaygiong" class="form-control">
    </div>

    <div class="form-group">
        <label for="mota">Mô tả</label>
        <textarea name="mota" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <?php if (!empty($dn_array)): ?>
    <div class="form-group">
        <label for="nhasanxuat">Nhà sản xuất</label>
        <select name="nhasanxuat" id="nhasanxuat" class="form-control" >
            <?php foreach($dn_info as $dn): ?>
                <option value="<?= $dn['id_dn'] ?>"><?=$dn['tendoanhnghiep']?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <?php endif; ?>
    <?php if (!empty($dn_array)): ?>
    <div class="form-group">
        <label for="nhaphanphoi">Nhà phân phối</label>
        <select name="nhaphanphoi" id="nhaphanphoi" class="form-control" >
            <?php foreach($dn_info as $dn): ?>
                <option value="<?= $dn['id_dn'] ?>"><?=$dn['tendoanhnghiep']?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <?php endif; ?>

    <div class="form-group">
        <label for="gia">Giá</label>
        <input type="text" name="gia" class="form-control">
    </div>

    <div class="form-group">
        <label for="xuatxu">Xuất xứ</label>
        <input type="text" name="xuatxu" class="form-control">
    </div>
    <div class="form-group">
        <label for="hdsd">Hướng dẫn sử dụng</label>
        <input type="text" name="hdsd" class="form-control">
    </div>
    <div class="form-group">
        <label for="ngaysanxuat">Ngày sản xuất</label>
        <input type="text" name="ngaysanxuat" class="form-control">
    </div>
    <div class="form-group">
        <label for="hansudung">Hạn sử dụng</label>
        <input type="text" name="hansudung" class="form-control">
    </div>
    <div class="form-group">
        <label for="phuongphaptrong">Phương pháp trồng</label>
        <input type="text" name="phuongphaptrong" class="form-control">
    </div>
    <div class="form-group">
        <label for="hinhanh">Hình ảnh</label>
        <input type="file" name="hinhanh" id="" required>
    </div>
    <div class="form-group">
        <label for="lienhe">Liên hệ</label>
        <input type="text" name="lienhe" class="form-control">
    </div>

    <input type="submit" value="Thêm cây giống" name="add_cg" class="btn btn-block btn-primary">
</form>
<script>
    $(document).ready(function() {
        $("#nhasanxuat").select2();
        $("#nhaphanphoi").select2();
       
    });
</script>
<style>
    .select2-container--default .select2-selection--single .select2-selection__rendered{
        padding: 0 0 0 0;
        padding: .5rem .75rem;
        line-height: normal;
        border-radius: 2px;
        border: 1px solid #ccc;
        background-color: #fff;
    }
    .select2-container--default .select2-selection--single{
        border: none;
    }
</style>