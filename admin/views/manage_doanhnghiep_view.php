<?php     
    $arry = $obj->display_dn();
    $catadn_info = $obj->display_catagory_dn();

    $catadn_array = array();
    while($catadn = mysqli_fetch_assoc($catadn_info)){
        $catadn_array[] = $catadn;
    }

  if(isset($_GET['status'])){
      $id_dn = $_GET['id'];
      if($_GET['status']=='delete'){
            $del_msg = $obj->delete_dn($id_dn);
      }
  }

?>      

<div style="padding-bottom: 5px;" class="row">
    <div class="col-md-6 col-sm-6">
        <h2>Quản lý doanh nghiệp</h2>
    </div>
    <div class="col-md-6 col-sm-6">
        <a style="float: right;" class="btn btn-primary" href="add_dn.php">Thêm doanh nghiệp</a>
    </div>
</div>

<div style="overflow-x: auto;">

    <table class="table table-bordered">
        <thead>

       
            <tr>
                <th>STT</th>
                <th>Loại doanh nghiệp</th>
                <th>Người đại diện </th>
                <th>Tên doanh nghiệp</th>
                <th>Hình ảnh</th>
                <th>Số điện thoại</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Mã số thuế</th>
                <th>Giấy phép kinh doanh</th>
                <th>Giấy chứng nhận</th>
                <th>Giấy kiểm định</th>
                <th>Thông tin chung</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
        <?php 
            $dem=1;
            while($dn = mysqli_fetch_assoc($arry)){
        ?>
            <tr>
                <td> <?php echo $dem ?> </td>
                <td> <?php 
                  
                        foreach($catadn_array as $catadn){
                            if($dn['danhmuc_dn'] == $catadn['id_dmdn'])
                            {
                                echo $catadn['tendoanhnghiep'];
                            }
                        }
                        
                            ?> </td>
                 <td> <?php echo $dn['nguoidaidien'] ?> </td>
                 <td> <?php echo $dn['tendoanhnghiep'] ?> </td>
                 <td><img style="height:60px" src="uploads/<?php echo $dn['hinhanh'] ?>" alt=""></td>
                 <td> <?php echo $dn['sdt'] ?> </td>
                 <td> <?php echo $dn['email'] ?> </td>
                 <td> <?php echo $dn['diachi'] ?> </td>
                 <td> <?php echo $dn['masothue'] ?> </td>
                 <td> <?php echo $dn['giayphepkinhdoanh'] ?> </td>
                 <td> <?php echo $dn['giaychungnhan'] ?> </td>
                 <td> <?php echo $dn['giaykiemdinh'] ?> </td>
                 <td> <?php echo $dn['thongtinchung'] ?> </td>
                
            
                <td>  
                    <a href="edit_dn.php?status=dnEdit&&id=<?php echo $dn['id_dn'] ?>" class="btn btn-sm btn-warning">Sửa </a>
                    <a href="javascript:void(0);" class="btn btn-sm btn-danger" onclick="confirmDelete(<?php echo $dn['id_dn'] ?>)">Xóa</a>

                </td>
            </tr>

           

            <?php
            $dem++;
        }?>
        </tbody>
    </table>
</div>


<script>
    function confirmDelete(id) {
        if (confirm("Bạn có chắc chắn muốn xóa tài khoản này không?")) {
            window.location.href = "?status=delete&&id=" + id;
        }
    }
</script>
