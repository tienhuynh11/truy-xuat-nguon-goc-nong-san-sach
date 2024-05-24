<?php
function delete_product($id)
    {
        $sel_query = "SELECT * FROM `sanpham` WHERE id_sp=$id";
        $query = mysqli_query($this->connection, $sel_query);
        $fetch = mysqli_fetch_assoc($query);
        $img_name = $fetch['hinhanh'];
        $hinhchungnhan = $fetch['hinhchungnhan'];
        $hinhkiemdinh = $fetch['hinhkiemdinh'];
        $maqr = $fetch['maqr'];

        $del_query = "DELETE FROM `sanpham` WHERE id_sp=$id";
        if (mysqli_query($this->connection, $del_query)) {
            unlink('uploads/' . $img_name);
            unlink('uploads/' . $hinhchungnhan);
            unlink('uploads/' . $hinhkiemdinh);
            unlink('uploads/qrcode_nongsan/' . $maqr);
            echo '<script>
                        alert("Xóa thành công");
                        window.location.href = "manage_product.php";
                        </script>';
        }
    }
    ?>