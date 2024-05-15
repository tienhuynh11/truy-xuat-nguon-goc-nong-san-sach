<?php 
function display_product_pagination($bat_dau, $ket_thuc,$nguoidang,$role)
{
    $query = "SELECT * FROM `sanpham` order by id_nx desc LIMIT $bat_dau, $ket_thuc";
    $result = mysqli_query($this->connection, $query);
    if ($result) {
        //Nếu role là Admin thì sẽ hiển thị tất cả nông sản
        if($role == "Admin") {
            return $result;
        } else {
            //Ngược lại, nếu không phải là admin thì hiển thị nông sản theo role
            $query = "SELECT * FROM `sanpham` where taikhoan = '$nguoidang' order by id_nx desc LIMIT $bat_dau, $ket_thuc";
            $result = mysqli_query($this->connection, $query);
            return $result;
        }
    } else {
        echo "Error: " . mysqli_error($this->connection);
        return false;
    }
}
function count_nx_manage($nguoidang,$role)
{
    $query = "SELECT COUNT(*) AS demnx FROM `sanpham`";

    $result = mysqli_query($this->connection, $query);

    if ($result) {
        if($role == "Admin") {
            //Đếm trang theo role Admin
            $row = mysqli_fetch_assoc($result);
            $demnx = $row['demnx'];
            return $demnx;
        } else {
            //Đếm trang theo các role khác
            $query = "SELECT COUNT(*) AS demnx FROM `sanpham` where taikhoan = $nguoidang";
            $result = mysqli_query($this->connection, $query);
            $row = mysqli_fetch_assoc($result);
            $demnx = $row['demnx'];
            return $demnx;   
        }
        
    } else {
        return "Error: " . mysqli_error($this->connection);
    }
}
?>