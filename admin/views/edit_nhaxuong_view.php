<?php 

ini_set("display_erros", "Off");
    $obj=new adminback();
    $catanx_info = $obj->display_catagory_nx();
    $dn_info=$obj->display_dn(); 
    $vsx_info=$obj->vsxShow();
    $users = $obj->show_admin_user();
     $id_nx = $_GET['id'];
        if($_GET['status']=='nxEdit'){
           $nx_info= $obj->show_nx_by_id($id_nx);
           $nx = mysqli_fetch_assoc($nx_info);

        }
    

    if(isset($_POST['update_nx'])){
        $update_msg = $obj->update_nx($_POST); 
    }


?>
<h4>Cập nhật nhà xưởng</h4>


<form action="" method="post" enctype="multipart/form-data" class="form">
    <div class="form-group">
    <div class="form-group">
        <label for="danhmuc_nx">Danh mục nhà xưởng</label>
        <select name="danhmuc_nx" id="danhmuc_nx" class="form-control">
        <?php while($cata = mysqli_fetch_assoc($catanx_info)){ ?>
            <?php if ($cata['id_dmnx'] == $nx['danhmuc_nx']) { ?>
                <option value="<?php echo $cata['id_dmnx'] ?>" selected><?php echo $cata['loainhaxuong']?></option>
            <?php } else { ?>
                <option value="<?php echo $cata['id_dmnx'] ?>"><?php echo $cata['loainhaxuong'] ?></option>
            <?php } ?>
        <?php }?>
        </select>
    </div>
   
    <div class="form-group">
        <label for="lblnguoidaidien">Người đại diện</label>
        <select name="nguoidaidien" id="nguoidaidien" class="form-control">
            <?php foreach($users as $user): ?>
                <?php if ($user['id_acc']== $nx['nguoidaidien']) { ?>
                <option value="<?php echo $user['id_acc']?>" selected><?php echo $user['hoten']  .'-'. $user['dienthoai']?></option>
            <?php } else { ?>
                <option value="<?php echo $user['id_acc'] ?>"><?php echo $user['hoten']  .'-'.  $user['dienthoai'] ?></option>
            <?php } ?>
            <?php endforeach; ?>
        </select>
    </div>
                

    <div class="form-group">
        <label for="doanhnghiep">Doanh nghiệp</label>
        <select name="doanhnghiep" id="doanhnghiep" class="form-control">
        <?php while($dn = mysqli_fetch_assoc($dn_info)){ ?>
            <?php if ($dn['id_dn'] == $nx['doanhnghiep']) { ?>
                <option value="<?php echo $dn['id_dn'] ?>" selected><?php echo $dn['tendoanhnghiep']?></option>
            <?php } else { ?>
                <option value="<?php echo $dn['id_dn'] ?>"><?php echo $dn['tendoanhnghiep'] ?></option>
            <?php } ?>
        <?php }?>
        </select>
    </div>
    <div class="form-group">
        <label for="vsx">Vùng sản xuất</label>
        <select name="vsx" id="vsx" class="form-control">
        <?php while($vsx = mysqli_fetch_assoc($vsx_info)){ ?>
            <?php if ($vsx['id_vung'] == $nx['vungsanxuat']) { ?>
                <option value="<?php echo $vsx['id_vung'] ?>" selected><?php echo $vsx['tenvung']?></option>
            <?php } else { ?>
                <option value="<?php echo $vsx['id_vung'] ?>"><?php echo $vsx['tenvung']?></option>
            <?php } ?>
        <?php }?>
        </select>
    </div>
    <div class="form-group">
        <label for="tennhaxuong">Tên nhà xưởng</label>
        <input type="text" name="tennhaxuong" class="form-control" value="<?php echo $nx['tennhaxuong']; ?>">
    </div>
    <div class="form-group">
        <label for="manhaxuong">Mã nhà xưởng</label>
        <input type="text" name="manhaxuong" class="form-control" value="<?php echo $nx['manhaxuong']; ?>">
    </div>
    <div class="form-group">
        <label for="hinhanh">Hình ảnh </label>
        <div class="mb-3">
        <img src="uploads/<?php echo $nx['hinhanh'];?>" style="width: 80px;" >
    </div>
        <input type="file" name="hinhanh" class="form-control">
    </div>
    <input type="hidden" name="id_nx" value="<?php echo $nx['id_nx']; ?>">
    <div class="form-group">
        <label for="sdt"> Số điện thoại</label>
        <input type="text" name="sdt" class="form-control" value="<?php echo $nx['dienthoai']; ?>">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" value="<?php echo $nx['email']; ?>">
    </div>
    <div class="form-group">
        <label for="diachi">Địa chỉ</label>
        <input type="text" name="diachi" class="form-control" value="<?php echo $nx['diachi']; ?>">
    </div>
    <div class="form-group">
        <label for="dientichtongthe">Diện tích tổng thể</label>
        <input type="text" name="dientichtongthe" class="form-control" value="<?php echo $nx['dientichtongthe']; ?>">
    </div>
    <div class="form-group">
        <label for="giayphepkinhdoanh">Giấy phép kinh doanh</label>
        <img src="uploads/<?php echo $nx['giayphepkinhdoanh'];?>" style="width: 80px;" >
        <input type="file" name="giayphepkinhdoanh" class="form-control">
    </div>
    <div class="form-group">
        <label for="giaychungnhan">Giấy chứng nhận</label>
        <img src="uploads/<?php echo $nx['giaychungnhan'];?>" style="width: 80px;" >
        <input type="file" name="giaychungnhan" class="form-control">
    <div class="form-group">
        <label for="giaykiemdinh">Giấy kiểm định</label>
        <img src="uploads/<?php echo $nx['giaykiemdinh'];?>" style="width: 80px;" >
        <input type="file" name="giaykiemdinh" class="form-control">
    </div>
    <div class="form-group">
        <label for="thongtin">Thông tin</label>
        <input type="text" name="thongtin" class="form-control" value="<?php echo $nx['thongtin']; ?>">
    </div>
    <input type="submit" value="Cập nhật" name="update_nx" class="btn btn-block btn-primary">
</form>


<script>
    $(document).ready(function() {
        $("#danhmuc_nx").select2();
        $("#nguoidaidien").select2();
        $("#doanhnghiep").select2();
        $("#vsx").select2();
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