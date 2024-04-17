
<?php 
   
    if(isset($_POST['add_cg'])){
        $rtn_msg = $obj->add_caygiong($_POST);
    }
?>

<h2>Thêm Cây giống</h2>


<form action="" method="post" enctype="multipart/form-data" class="form">
    <div class="form-group">
        <label for="tencaygiong">Tên cây giống</label>
        <input type="text" name="tencaygiong" class="form-control">
    </div>
    <div class="form-group">
        <label for="macaygiong">Mã cây giống</label>
        <input type="text" name="macaygiong" class="form-control">
    </div>

    <div class="form-group">
        <label for="mota">Mô tả</label>
        <textarea name="mota" id="" cols="30" rows="10" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="nhasanxuat">Nhà sản xuất</label>
        <input type="text" name="nhasanxuat" class="form-control">
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
        <input type="file" name="hinhanh" id="">
    </div>
    <div class="form-group">
        <label for="lienhe">Liên hệ</label>
        <input type="text" name="lienhe" class="form-control">
    </div>

    <input type="submit" value="Thêm cây giống" name="add_cg" class="btn btn-block btn-primary">
</form>