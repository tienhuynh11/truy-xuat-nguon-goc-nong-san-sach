<?php
@include("./assets/phpqrcode/qrlib.php");
class  adminback
{
    protected $connection;
    function __construct()
    {
        $dbhost = "localhost";
        $dbuser = "tien123";
        $dbpass = "123456";
        $dbname = "nongsanquenha";

        $this->connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
        mysqli_set_charset($this->connection, 'UTF8');
        if (!$this->connection) {
            die("Kết nối đến cơ sở dữ liệu bị lỗi!!!");
        }
    }

    function admin_login($data)
    {
        $admin_email = $data["email"];
        $admin_pass = md5($data['pass']);
        $query_check = "SELECT * FROM `taikhoan` WHERE email = '$admin_email'";
        $query = "SELECT * FROM `taikhoan` WHERE email = '$admin_email' AND matkhau = '$admin_pass'";
        $result_check = mysqli_query($this->connection, $query_check);
        $result = mysqli_query($this->connection, $query);
        if (mysqli_num_rows($result_check) > 0) {
            if (mysqli_num_rows($result) > 0) {
                $admin_info = mysqli_fetch_assoc($result);
                if ($admin_info['token'] == '' and $admin_info['xacthuc'] == 1) {
                    if ($admin_info['trangthai'] == 'hoatdong') {
                        header("location:../index.php");
                        session_start();
                        $_SESSION['admin_id'] = $admin_info['id_acc'];
                        $_SESSION['admin_email'] = $admin_info['email'];
                        $_SESSION['role'] = $admin_info['role'];
                        $_SESSION['username'] = $admin_info['hoten'];
                    } else {
                        $log_msg = 4;
                        return $log_msg;
                    }
                } else {
                    $log_msg = 1;
                    return $log_msg;
                }
            } else {
                $log_msg = 2;
                return $log_msg;
            }
        } else {
            $log_msg = 3;
            return $log_msg;
        }
    }


    function admin_logout()
    {
        unset($_SESSION['admin_id']);
        unset($_SESSION['admin_email']);
        unset($_SESSION['role']);
        header("location:../dangnhap.php");
        session_destroy();
    }

    function admin_password_recover($recover_email)
    {
        $query = "SELECT * FROM `taikhoan` WHERE `email`='$recover_email'";
        if (mysqli_query($this->connection, $query)) {
            $row =  mysqli_query($this->connection, $query);
            return $row;
        }
    }

    function update_admin_password($data)
    {
        $u_admin_id = $data['admin_update_id'];
        $u_admin_pass = md5($data['admin_update_password']);

        $query = "UPDATE `admin_info` SET `admin_pass`='$u_admin_pass' WHERE `admin_id`= $u_admin_id";

        if (mysqli_query($this->connection, $query)) {
            $update_mag = "You password updated successfull";
            return $update_mag;
        } else {
            return "Failed";
        }
    }

    function add_admin_user($data)
    {
        $user_hoten = $data['user_hoten'];
        $user_email = $data['user_name'];
        $user_pass = md5($data['user_password']);
        $user_phone = $data['user_sdt'];
        $user_adress = $data['user_adress'];
        $user_role = $data['user_role'];

        // Upload hình đại diện
        $hinhdaidien_name = $_FILES['hinhdaidien']['name'];
        $hinhdaidien_tmp = $_FILES['hinhdaidien']['tmp_name'];
        $hinhdaidien_path = "uploads/avatar/" . $hinhdaidien_name;

        move_uploaded_file($hinhdaidien_tmp, $hinhdaidien_path);

        $query = "INSERT INTO `taikhoan`( `hoten`, `email`, `matkhau`, `dienthoai`, `diachi`, `role`, `hinhdaidien`) VALUES ('$user_hoten','$user_email','$user_pass','$user_phone','$user_adress','$user_role','$hinhdaidien_name')";

        if (mysqli_query($this->connection, $query)) {
            echo '<script>
            alert("Thêm tài khoản thành công");
            window.location.href = "manage_account.php";
            </script>';
        }
    }

    function show_admin_user()
    {
        $query = "SELECT * FROM `taikhoan` ";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            return $result;
        }
    }

    function show_admin_user_by_id($user_id)
    {
        $query = "SELECT * FROM `taikhoan` WHERE `id_acc`='$user_id'";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            return $result;
        }
    }
    function show_admin_user_by_nhaxuong($nhaxuong)
    {
        $query = "SELECT * FROM `taikhoan` WHERE `nhaxuong`='$nhaxuong'";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            return $result;
        }
    }
    function update_hoso($data)
    {
        $u_id = $data['id_acc'];
        $name = $data['name'];
        $sdt = $data['sdt'];
        $diachi = $data['diachi'];
        $doanhnghiep = $data['doanhnghiep'];
        $vungsanxuat = $data['vungsanxuat'];
        $nhaxuong = $data['nhaxuong'];
        $thongtin = $data['thongtin'];
        // $trangthai = $data['trangthai'];

        if (!empty($_FILES['hinhdaidien']['tmp_name'])) {
            $hinhdaidien_name = $_FILES['hinhdaidien']['name'];
            $hinhdaidien_size = $_FILES['hinhdaidien']['size'];
            $hinhdaidien_tmp = $_FILES['hinhdaidien']['tmp_name'];
            $img_ext = pathinfo($hinhdaidien_name, PATHINFO_EXTENSION);
            list($width, $height) = getimagesize($hinhdaidien_tmp);

            if ($img_ext == "jpg" || $img_ext == 'jpeg' || $img_ext == "png") {
                if ($hinhdaidien_size <= 2e+6 && $width < 2701 && $height < 2701) {
                    $select_query = "SELECT * FROM `taikhoan` WHERE id_acc=$u_id";
                    $result = mysqli_query($this->connection, $select_query);
                    $row = mysqli_fetch_assoc($result);
                    $pre_img = $row['hinhdaidien'];
                    unlink("uploads/avatar/" . $pre_img);

                    $query = "UPDATE `taikhoan` SET `doanhnghiep` = '$doanhnghiep', `vungsanxuat` = '$vungsanxuat', `nhaxuong` = '$nhaxuong', `hoten` = '$name', `dienthoai` = '$sdt', `diachi` = '$diachi', `thongtin` = '$thongtin', `hinhdaidien` = '$hinhdaidien_name' WHERE `id_acc` = '$u_id';";

                    if (mysqli_query($this->connection, $query) && move_uploaded_file($hinhdaidien_tmp, "uploads/avatar/" . $hinhdaidien_name)) {
                        $msg = 1; // Thành công
                        return $msg;
                    } else {
                        $msg = 2; // Thất bại
                        return $msg;
                    }
                } else {
                    $msg = 3; // Kích thước hoặc định dạng không hợp lệ
                    return $msg;
                }
            } else {
                $msg = 4; // Định dạng file không hợp lệ
                return $msg;
            }
        } else {
            // Nếu không có tệp ảnh mới được chọn, chỉ cập nhật thông tin người dùng mà không cần di chuyển tệp ảnh cũ
            $query = "UPDATE `taikhoan` SET `doanhnghiep` = '$doanhnghiep', `vungsanxuat` = '$vungsanxuat', `nhaxuong` = '$nhaxuong', `hoten` = '$name', `dienthoai` = '$sdt', `diachi` = '$diachi', `thongtin` = '$thongtin' WHERE `id_acc` = '$u_id';";

            if (mysqli_query($this->connection, $query)) {
                $msg = 5; // Thành công
                return $msg;
            } else {
                $msg = 6; // Thất bại
                return $msg;
            }
        }
    }


    function update_admin($data)
    {
        $u_id = $data['user_id'];
        $u_email = $data['u-user-email'];
        $u_name = $data['u-user-name'];
        $u_phone = $data['u-user-phone'];
        $u_address = $data['u-user-address'];
        $u_role = $data['u_user_role'];


        // Kiểm tra xem có tập tin hình ảnh nào được tải lên không
        if (!empty($_FILES['hinhdaidien']['tmp_name'])) {
            $hinhdaidien_name = $_FILES['hinhdaidien']['name'];
            $hinhdaidien_size = $_FILES['hinhdaidien']['size'];
            $hinhdaidien_tmp = $_FILES['hinhdaidien']['tmp_name'];
            $img_ext = pathinfo($hinhdaidien_name, PATHINFO_EXTENSION);
            list($width, $height) = getimagesize($hinhdaidien_tmp);

            if ($img_ext == "jpg" || $img_ext == 'jpeg' || $img_ext == "png") {
                if ($hinhdaidien_size <= 2e+6 && $width < 2701 && $height < 2701) {
                    $select_query = "SELECT * FROM `taikhoan` WHERE id_acc=$u_id";
                    $result = mysqli_query($this->connection, $select_query);
                    $row = mysqli_fetch_assoc($result);
                    $pre_img = $row['hinhdaidien'];
                    unlink("uploads/avatar/" . $pre_img);

                    $query = "UPDATE `taikhoan` SET `hoten` = '$u_name', `email` = '$u_email', `dienthoai` = '$u_phone', `diachi` = '$u_address',`hinhdaidien`= '$hinhdaidien_name',`role` = '$u_role' WHERE `id_acc` = $u_id;";

                    if (mysqli_query($this->connection, $query) && move_uploaded_file($hinhdaidien_tmp, "uploads/avatar/" . $hinhdaidien_name)) {
                        echo '<script>
                            alert("Chỉnh sửa tài khoản thành công");
                            window.location.href = "manage_account.php";
                        </script>';
                    } else {
                        echo "Upload failed!";
                    }
                } else {
                    $msg = "Sorry !! Pdt image max height: 2701 px and width: 2701 px, but you are trying {$width} px and {$height} px";
                    return $msg;
                }
            } else {
                $msg = "File should be jpg or png format";
                return $msg;
            }
        } else {
            // Nếu không có tập tin hình ảnh mới được tải lên, giữ nguyên ảnh cũ và chỉ cập nhật thông tin khác của sản phẩm
            $query = "UPDATE `taikhoan` SET `hoten` = '$u_name', `email` = '$u_email', `dienthoai` = '$u_phone', `diachi` = '$u_address',`role` = '$u_role' WHERE `id_acc` = $u_id;";

            if (mysqli_query($this->connection, $query)) {
                echo '<script>
                    alert("Chỉnh sửa tài khoản thành công");
                    window.location.href = "manage_account.php";
                </script>';
            } else {
                echo "Cập nhật thất bại!";
            }
        }
    }

    function delete_admin($admin_id)
    {
        $sel_query = "DELETE FROM `taikhoan` WHERE `id_acc`=$admin_id";
        $query = mysqli_query($this->connection, $sel_query);
        $fetch = mysqli_fetch_assoc($query);
        $img_name = $fetch['hinhdaidien'];


        if (mysqli_query($this->connection, $query)) {
            unlink('uploads/avatar/' . $img_name);
            echo '<script>
            alert("Xóa tài khoản thành công");
            window.location.href = "manage_account.php";
            </script>';
        }
    }

    function add_catagory($data)
    {
        $ctg_name = $data['ctg_name'];
        $ctg_status = $data['ctg_status'];

        $query = "INSERT INTO `danhmuc`( `tendanhmuc`, `trangthai`) VALUES ('$ctg_name', '$ctg_status')";

        if (mysqli_query($this->connection, $query)) {
            echo '<script>
            alert("Thêm danh mục thành công");
            window.location.href = "manage_cata.php";
            </script>';
        } else {
            return "Thêm danh mục thất bại!";
        }
    }

    function display_catagory()
    {
        $query = "SELECT * FROM `danhmuc`";

        if (mysqli_query($this->connection, $query)) {
            $ctg_info = mysqli_query($this->connection, $query);
            return $ctg_info;
        }
    }

    function p_display_catagory()
    {
        $query = "SELECT * FROM `danhmuc` WHERE trangthai='hoatdong'";

        if (mysqli_query($this->connection, $query)) {
            $ctg_info = mysqli_query($this->connection, $query);
            return $ctg_info;
        }
    }

    function catagory_published($id)
    {
        $query = "UPDATE `danhmuc` SET `trangthai`= 'hoatdong' WHERE id_dm = $id";
        mysqli_query($this->connection, $query);
    }
    function catagory_unpublished($id)
    {
        $query = "UPDATE `danhmuc` SET `trangthai`= 'khonghoatdong' WHERE id_dm = $id";
        mysqli_query($this->connection, $query);
    }

    function delete_catagory($id)
    {
        $query = "DELETE FROM `danhmuc` WHERE  id_dm = $id";
        if (mysqli_query($this->connection, $query)) {
            echo '<script>
            alert("Xóa thành công");
            window.location.href = "manage_cata.php";
            </script>';
        }
    }

    function display_cataByID($id)
    {
        $query = "SELECT * FROM `danhmuc` WHERE id_dm = $id";

        if (mysqli_query($this->connection, $query)) {
            $cata_info = mysqli_query($this->connection, $query);
            return mysqli_fetch_assoc($cata_info);
        }
    }

    function show_taikhoanbyid($id)
    {
        $query = "SELECT * FROM `taikhoan` WHERE id_acc = $id";

        if (mysqli_query($this->connection, $query)) {
            $cata_info = mysqli_query($this->connection, $query);
            return mysqli_fetch_assoc($cata_info);
        }
    }

    function updata_catagory($data)
    {
        $u_ctg_id = $data['u_ctg_id'];
        $u_ctg_name = $data['u_ctg_name'];
        // $u_ctg_des = $data['u_ctg_des'];
        $u_ctg_status = $data['u_ctg_status'];

        $query = "UPDATE `danhmuc` SET `tendanhmuc`='$u_ctg_name',`trangthai`= '$u_ctg_status' WHERE id_dm =  $u_ctg_id";
        if (mysqli_query($this->connection, $query)) {
            echo '<script>
            alert(" Chỉnh sửa thành công");
            window.location.href = "manage_cata.php";
            </script>';
        }
    }

    function thayDoiChu($str)
    {
        // Mảng ánh xạ các ký tự có dấu thành không dấu
        $accentsMap = array(
            'á' => 'a', 'à' => 'a', 'ả' => 'a', 'ã' => 'a', 'ạ' => 'a',
            'ă' => 'a', 'ắ' => 'a', 'ằ' => 'a', 'ẳ' => 'a', 'ẵ' => 'a', 'ặ' => 'a',
            'â' => 'a', 'ấ' => 'a', 'ầ' => 'a', 'ẩ' => 'a', 'ẫ' => 'a', 'ậ' => 'a',
            'é' => 'e', 'è' => 'e', 'ẻ' => 'e', 'ẽ' => 'e', 'ẹ' => 'e',
            'ê' => 'e', 'ế' => 'e', 'ề' => 'e', 'ể' => 'e', 'ễ' => 'e', 'ệ' => 'e',
            'í' => 'i', 'ì' => 'i', 'ỉ' => 'i', 'ĩ' => 'i', 'ị' => 'i',
            'ó' => 'o', 'ò' => 'o', 'ỏ' => 'o', 'õ' => 'o', 'ọ' => 'o',
            'ô' => 'o', 'ố' => 'o', 'ồ' => 'o', 'ổ' => 'o', 'ỗ' => 'o', 'ộ' => 'o',
            'ơ' => 'o', 'ớ' => 'o', 'ờ' => 'o', 'ở' => 'o', 'ỡ' => 'o', 'ợ' => 'o',
            'ú' => 'u', 'ù' => 'u', 'ủ' => 'u', 'ũ' => 'u', 'ụ' => 'u',
            'ư' => 'u', 'ứ' => 'u', 'ừ' => 'u', 'ử' => 'u', 'ữ' => 'u', 'ự' => 'u',
            'ý' => 'y', 'ỳ' => 'y', 'ỷ' => 'y', 'ỹ' => 'y', 'ỵ' => 'y',
            'đ' => 'd',
            'Á' => 'A', 'À' => 'A', 'Ả' => 'A', 'Ã' => 'A', 'Ạ' => 'A',
            'Ă' => 'A', 'Ắ' => 'A', 'Ằ' => 'A', 'Ẳ' => 'A', 'Ẵ' => 'A', 'Ặ' => 'A',
            'Â' => 'A', 'Ấ' => 'A', 'Ầ' => 'A', 'Ẩ' => 'A', 'Ẫ' => 'A', 'Ậ' => 'A',
            'É' => 'E', 'È' => 'E', 'Ẻ' => 'E', 'Ẽ' => 'E', 'Ẹ' => 'E',
            'Ê' => 'E', 'Ế' => 'E', 'Ề' => 'E', 'Ể' => 'E', 'Ễ' => 'E', 'Ệ' => 'E',
            'Í' => 'I', 'Ì' => 'I', 'Ỉ' => 'I', 'Ĩ' => 'I', 'Ị' => 'I',
            'Ó' => 'O', 'Ò' => 'O', 'Ỏ' => 'O', 'Õ' => 'O', 'Ọ' => 'O',
            'Ô' => 'O', 'Ố' => 'O', 'Ồ' => 'O', 'Ổ' => 'O', 'Ỗ' => 'O', 'Ộ' => 'O',
            'Ơ' => 'O', 'Ớ' => 'O', 'Ờ' => 'O', 'Ở' => 'O', 'Ỡ' => 'O', 'Ợ' => 'O',
            'Ú' => 'U', 'Ù' => 'U', 'Ủ' => 'U', 'Ũ' => 'U', 'Ụ' => 'U',
            'Ư' => 'U', 'Ứ' => 'U', 'Ừ' => 'U', 'Ử' => 'U', 'Ữ' => 'U', 'Ự' => 'U',
            'Ý' => 'Y', 'Ỳ' => 'Y', 'Ỷ' => 'Y', 'Ỹ' => 'Y', 'Ỵ' => 'Y',
            'Đ' => 'D'
        );

        // Thay thế các ký tự có dấu thành không dấu
        $str = strtr($str, $accentsMap);
        // Loại bỏ các khoảng trắng
        $str = preg_replace('/\s+/', '', $str);
        // Loại bỏ các ký tự không phải chữ cái hoặc số
        $str = preg_replace('/[^a-zA-Z0-9]/', '', $str);
        // Trả về chuỗi đã được xử lý
        return $str;
    }
    function display_product()
    {
        $query = "SELECT * FROM `sanpham`";

        if (mysqli_query($this->connection, $query)) {
            $pdt_info = mysqli_query($this->connection, $query);
            return $pdt_info;
        }
    }

    function add_product($data)
    {
        $tensanpham = $data['tensanpham'];
        $pdt_ctg = $data['pdt_ctg'];
        $mavach = $this->thayDoiChu($data['tensanpham']);
        $pdt_price = $data['pdt_price'];
        $pdt_img_name = $_FILES['pdt_img']['name'];
        $pdt_img_size = $_FILES['pdt_img']['size'];
        $pdt_img_tmp = $_FILES['pdt_img']['tmp_name'];
        $img_ext = pathinfo($pdt_img_name, PATHINFO_EXTENSION);
        $xuatxu = $data['xuatxu'];
        $caygiong = $data['caygiong'];
        $vungsanxuat = $data['vungsanxuat'];
        $nhaxuongsanxuat = $data['nhaxuongsanxuat'];
        $nhasanxuat = $data['nhasanxuat'];
        $nhaxuatkhau = $data['nhaxuatkhau'];
        $nhanhapkhau = $data['nhanhapkhau'];
        $nhaphanphoi = $data['nhaphanphoi'];
        $nhavanchuyen = $data['nhavanchuyen'];
        $taikhoan = $data['taikhoan'];
        $dkbq = $data['dkbq'];
        $congdung = $data['congdung'];
        $hdsd = $data['hdsd'];
        $thanhphan = $data['thanhphan'];
        $pdt_des = $data['pdt_des'];

        //Tạo đường dẫn và tên qr code
        $path = 'uploads/qrcode_nongsan/';
        $qrcode_name = 'NSQN-' . $mavach . time() . ".png";
        $qrcode = $path . $qrcode_name;

        $hinhchungnhan_name = $_FILES['hinhchungnhan']['name'];
        $hinhchungnhan_size = $_FILES['hinhchungnhan']['size'];
        $hinhchungnhan_tmp = $_FILES['hinhchungnhan']['tmp_name'];
        $hinhchungnhan_ext = pathinfo($hinhchungnhan_name, PATHINFO_EXTENSION);

        $hinhkiemdinh_name = $_FILES['hinhkiemdinh']['name'];
        $hinhkiemdinh_size = $_FILES['hinhkiemdinh']['size'];
        $hinhkiemdinh_tmp = $_FILES['hinhkiemdinh']['tmp_name'];
        $hinhkiemdinh_ext = pathinfo($hinhkiemdinh_name, PATHINFO_EXTENSION);

        list($width, $height) = getimagesize("$pdt_img_tmp");
        if (!empty($mavach)) {
            if (($img_ext == "jpg" || $img_ext == 'jpeg' || $img_ext == "png") &&
                ($hinhchungnhan_ext == "jpg" || $hinhchungnhan_ext == 'jpeg' || $hinhchungnhan_ext == "png") &&
                ($hinhkiemdinh_ext == "jpg" || $hinhkiemdinh_ext == 'jpeg' || $hinhkiemdinh_ext == "png")
            ) {

                if ($pdt_img_size <= 2e+6 && $hinhchungnhan_size <= 2e+6 && $hinhkiemdinh_size <= 2e+6) {

                    if ($width < 2071 && $height < 2071) {
                        $query = "INSERT INTO `sanpham` (`taikhoan`, `danhmuc`, `caygiong`, `vungsanxuat`, `nhaxuong`, `nhasanxuat`, `nhaxuatkhau`,
                `nhanhapkhau`, `nhaphanphoi`, `nhavanchuyen`, `tensanpham`, `mavach`, `hinhanh`, `gia`, `xuatxu`,`maqr`, `mota`, `congdung`,
                `hdsd`, `thanhphan`, `dieukienbaoquan`, `hinhchungnhan`, `hinhkiemdinh`) VALUES ('$taikhoan', '$pdt_ctg', '$caygiong', '$vungsanxuat', 
                '$nhaxuongsanxuat', '$nhasanxuat', '$nhaxuatkhau','$nhanhapkhau', '$nhaphanphoi', '$nhavanchuyen', '$tensanpham', '$mavach', 
                '$pdt_img_name', '$pdt_price', '$xuatxu','$qrcode_name', '$pdt_des', '$congdung', '$hdsd', '$thanhphan', '$dkbq', '$hinhchungnhan_name', 
                '$hinhkiemdinh_name');";

                        if (mysqli_query($this->connection, $query)) {
                            move_uploaded_file($pdt_img_tmp, "uploads/" . $pdt_img_name);
                            move_uploaded_file($hinhchungnhan_tmp, "uploads/" . $hinhchungnhan_name);
                            move_uploaded_file($hinhkiemdinh_tmp, "uploads/" . $hinhkiemdinh_name);
                            //Lấy id vừa thêm gán vào qrcode
                            $new_insert_id = $this->connection->insert_id;
                            $url = "http://192.169.1.17/nongsan/chitietsanpham.php?id=" . $new_insert_id;
                            QRcode::png($url, $qrcode, 'L', 4, 4);
                            $msg = "Thêm nông sản thành công!!";
                            echo '<script>
                            alert("Thêm nông sản thành công");
                            window.location.href = "manage_product.php";
                            </script>';
                        } else {
                            $msg = "Lỗi: " . mysqli_error($this->connection);
                            return $msg;
                        }
                    } else {
                        $msg = "Sorry !! Pdt image max height: 2071 px and width: 2071 px, but you are trying {$width} px and {$height} px";
                        return $msg;
                    }
                } else {
                    $msg = "File size should not be larger than 2MB";
                    return $msg;
                }
            } else {
                $msg = "Files should be in jpg, jpeg, or png format";
                return $msg;
            }
        } else {
            $msg = "Vui lòng nhập mã vạch!!";
            return $msg;
        }
    }

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

    function published_product($id)
    {
        $query = "UPDATE `sanpham` SET `trangthai`='daxetduyet' WHERE id_sp=$id";
        if (mysqli_query($this->connection, $query)) {

            return "Successfully";
        }
    }

    function unpublished_product($id)
    {
        $query = "UPDATE `sanpham` SET `trangthai`='dangchoxetduyet' WHERE id_sp=$id";
        if (mysqli_query($this->connection, $query)) {

            return "Unpublished Successfully";
        }
    }

    function edit_product($id)
    {
        $query = "SELECT * FROM `sanpham` WHERE id_sp= $id";
        if (mysqli_query($this->connection, $query)) {
            $pdt_info = mysqli_query($this->connection, $query);
            return $pdt_info;
        }
    }

    function update_product($data)
    {
        $pdt_id = $data['pdt_id'];
        $taikhoan = $data['taikhoan'];
        $pdt_name = $data['u_pdt_name'];
        $pdt_price = $data['u_pdt_price'];
        $pdt_xx = $data['u_pdt_xx'];
        $pdt_des = $data['u_pdt_des'];
        $pdt_ctg = $data['u_pdt_ctg'];
        $caygiong = $data['caygiong'];
        $hdsd = $data['hdsd'];
        $thanhphan = $data['thanhphan'];
        $congdung = $data['congdung'];
        $dkbq = $data['dkbq'];
        $vungsanxuat = $data['vungsanxuat'];
        $nhaxuong = $data['nhaxuong'];
        $nhasanxuat = $data['nhasanxuat'];
        $nhaxuatkhau = $data['nhaxuatkhau'];
        $nhanhapkhau = $data['nhanhapkhau'];
        $nhaphanphoi = $data['nhaphanphoi'];
        $nhavanchuyen = $data['nhavanchuyen'];

        // Fetch existing product data
        $select_query = "SELECT * FROM `sanpham` WHERE id_sp=$pdt_id";
        $result = mysqli_query($this->connection, $select_query);
        $row = mysqli_fetch_assoc($result);
        $pre_img = $row['hinhanh'];
        $pre_hinhchungnhan = $row['hinhchungnhan'];
        $pre_hinhkiemdinh = $row['hinhkiemdinh'];

        // Check for new product image
        if (!empty($_FILES['u_pdt_img']['tmp_name'])) {
            $pdt_img_name = $_FILES['u_pdt_img']['name'];
            $pdt_img_size = $_FILES['u_pdt_img']['size'];
            $pdt_img_tmp = $_FILES['u_pdt_img']['tmp_name'];
            $img_ext = pathinfo($pdt_img_name, PATHINFO_EXTENSION);
            list($width, $height) = getimagesize($pdt_img_tmp);

            if ($img_ext == "jpg" || $img_ext == 'jpeg' || $img_ext == "png") {
                if ($pdt_img_size <= 2e+6 && $width < 2701 && $height < 2701) {
                    unlink("uploads/" . $pre_img); // Remove old image
                } else {
                    $msg = "Sorry !! Pdt image max height: 2701 px and width: 2701 px, but you are trying {$width} px and {$height} px";
                    return $msg;
                }
            } else {
                $msg = "File should be jpg or png format";
                return $msg;
            }
        } else {
            $pdt_img_name = $pre_img; // Retain old image if no new image uploaded
        }

        // Check for new hinhchungnhan image
        if (!empty($_FILES['hinhchungnhan']['tmp_name'])) {
            $hinhchungnhan_name = $_FILES['hinhchungnhan']['name'];
            $hinhchungnhan_size = $_FILES['hinhchungnhan']['size'];
            $hinhchungnhan_tmp = $_FILES['hinhchungnhan']['tmp_name'];
            $hinhchungnhan_ext = pathinfo($hinhchungnhan_name, PATHINFO_EXTENSION);

            if ($hinhchungnhan_ext == "jpg" || $hinhchungnhan_ext == 'jpeg' || $hinhchungnhan_ext == "png") {
                if ($hinhchungnhan_size <= 2e+6) {
                    unlink("uploads/" . $pre_hinhchungnhan); // Remove old image
                } else {
                    $msg = "File size should not be larger than 2MB";
                    return $msg;
                }
            } else {
                $msg = "File should be jpg or png format";
                return $msg;
            }
        } else {
            $hinhchungnhan_name = $pre_hinhchungnhan; // Retain old image if no new image uploaded
        }

        // Check for new hinhkiemdinh image
        if (!empty($_FILES['hinhkiemdinh']['tmp_name'])) {
            $hinhkiemdinh_name = $_FILES['hinhkiemdinh']['name'];
            $hinhkiemdinh_size = $_FILES['hinhkiemdinh']['size'];
            $hinhkiemdinh_tmp = $_FILES['hinhkiemdinh']['tmp_name'];
            $hinhkiemdinh_ext = pathinfo($hinhkiemdinh_name, PATHINFO_EXTENSION);

            if ($hinhkiemdinh_ext == "jpg" || $hinhkiemdinh_ext == 'jpeg' || $hinhkiemdinh_ext == "png") {
                if ($hinhkiemdinh_size <= 2e+6) {
                    unlink("uploads/" . $pre_hinhkiemdinh); // Remove old image
                } else {
                    $msg = "File size should not be larger than 2MB";
                    return $msg;
                }
            } else {
                $msg = "File should be jpg or png format";
                return $msg;
            }
        } else {
            $hinhkiemdinh_name = $pre_hinhkiemdinh; // Retain old image if no new image uploaded
        }

        // Move new files if they were uploaded
        if (!empty($_FILES['u_pdt_img']['tmp_name'])) {
            move_uploaded_file($pdt_img_tmp, "uploads/" . $pdt_img_name);
        }
        if (!empty($_FILES['hinhchungnhan']['tmp_name'])) {
            move_uploaded_file($hinhchungnhan_tmp, "uploads/" . $hinhchungnhan_name);
        }
        if (!empty($_FILES['hinhkiemdinh']['tmp_name'])) {
            move_uploaded_file($hinhkiemdinh_tmp, "uploads/" . $hinhkiemdinh_name);
        }

        // Update product information
        $query = "UPDATE `sanpham` SET `taikhoan` = '$taikhoan',`danhmuc` = '$pdt_ctg', `caygiong` = '$caygiong', `vungsanxuat` = '$vungsanxuat',`nhaxuong` = '$nhaxuong',  
    `nhasanxuat` = '$nhasanxuat',  `nhaxuatkhau` = '$nhaxuatkhau' , `nhanhapkhau` = '$nhanhapkhau', `nhaphanphoi` = '$nhaphanphoi', `nhavanchuyen` = '$nhavanchuyen',  
    `tensanpham` = '$pdt_name', `hinhanh` = '$pdt_img_name', `gia` = '$pdt_price', `xuatxu` = '$pdt_xx', `mota` = '$pdt_des', `congdung` = ' $congdung', 
    `hdsd` = '$hdsd', `thanhphan` = '$thanhphan', `dieukienbaoquan` = '$dkbq', `hinhchungnhan` = '$hinhchungnhan_name', `hinhkiemdinh` = '$hinhkiemdinh_name' 
    WHERE `id_sp` = '$pdt_id';";

        if (mysqli_query($this->connection, $query)) {
            echo '<script>
            alert("Chỉnh sửa sản phẩm thành công");
            window.location.href = "manage_product.php";
        </script>';
        } else {
            echo "Cập nhật thất bại!";
        }
    }


    function display_product_byCata($cataId)
    {
        $query = "SELECT * FROM `danhmuc` WHERE id_dm=$cataId AND trangthai='hoatdong' ";
        if (mysqli_query($this->connection, $query)) {
            $pdt_info = mysqli_query($this->connection, $query);
            return $pdt_info;
        }
    }

    function display_product_byId($pdtId)
    {
        $query = "SELECT * FROM `sanpham` WHERE id_sp= $pdtId";
        if (mysqli_query($this->connection, $query)) {
            $pdt_info = mysqli_query($this->connection, $query);
            return $pdt_info;
        }
    }

    function related_product($cataID)
    {
        $query = "SELECT * FROM `product_info_ctg` WHERE ctg_id=$cataID ORDER BY pdt_id DESC LIMIT 6";
        if (mysqli_query($this->connection, $query)) {
            $pdt_info = mysqli_query($this->connection, $query);
            return $pdt_info;
        }
    }

    function count_product()
    {
        $query = "SELECT COUNT(*) AS total_products FROM `sanpham`";

        $result = mysqli_query($this->connection, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $total_products = $row['total_products'];
            return $total_products;
        } else {
            return "Error: " . mysqli_error($this->connection);
        }
    }
    function count_product_daduyet()
    {
        $query = "SELECT COUNT(*) AS total_products_daduyet FROM `sanpham` WHERE `trangthai` = 'daxetduyet'";

        $result = mysqli_query($this->connection, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $total_products = $row['total_products_daduyet'];
            return $total_products;
        } else {
            return "Error: " . mysqli_error($this->connection);
        }
    }

    function ctg_by_id($cataID)
    {
        $query = "SELECT * FROM `product_info_ctg` WHERE ctg_id=$cataID";
        if (mysqli_query($this->connection, $query)) {
            $pdt_info = mysqli_query($this->connection, $query);
            $pdt_fetch = mysqli_fetch_assoc($pdt_info);
            return $pdt_fetch;
        }
    }


    function user_login($data)
    {
        $user_email = $_POST['user_email'];
        $user_password = md5($_POST['user_password']);

        $query = "SELECT * FROM `taikhoan` WHERE `email`='$user_email' AND `matkhau`='$user_password'";

        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            $user_info = mysqli_fetch_array($result);
            if ($user_info) {
                header("location:userprofile.php");
                session_start();
                $_SESSION['user_id'] = $user_info['id_acc'];
                $_SESSION['email'] = $user_info['email'];
                $_SESSION['mobile'] = $user_info['dienthoai'];
                $_SESSION['address'] = $user_info['diachi'];

                $_SESSION['username'] = $user_info['hoten'];
            } else {
                $logmsg = "Tên đăng nhập hoặc mật khẩu không chính xác!!";
                return $logmsg;
            }
        }
    }

    function user_logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);

        header("location:dangnhap.php");
        session_destroy();
    }

    function view_all_product()
    {
        $query = "SELECT * FROM `sanpham` where trangthai = 'daxetduyet' order by id_sp desc ";

        if (mysqli_query($this->connection, $query)) {
            $pdt_info = mysqli_query($this->connection, $query);
            return $pdt_info;
        }
    }

    function view_all_product_limit()
    {
        $query = "SELECT * FROM `sanpham` where trangthai = 'daxetduyet' order by id_sp desc limit 8";

        if (mysqli_query($this->connection, $query)) {
            $pdt_info = mysqli_query($this->connection, $query);
            return $pdt_info;
        }
    }

    function display_five_catagory()
    {
        $query = "SELECT * FROM `catagory` LIMIT 5";
        if (mysqli_query($this->connection, $query)) {
            $catagories = mysqli_query($this->connection, $query);
            return $catagories;
        }
    }

    function display_five_products($ctg_id)
    {
        $query = "SELECT * FROM `product_info_ctg` WHERE `ctg_id`=$ctg_id LIMIT 8";

        if (mysqli_query($this->connection, $query)) {
            $eight_product = mysqli_query($this->connection, $query);
            return $eight_product;
        }
    }

    function display_top_rated_pdt()
    {
        $query = "SELECT * FROM `sanpham` oder by id_sp LIMIT 12";

        if (mysqli_query($this->connection, $query)) {
            $top_rated = mysqli_query($this->connection, $query);
            return $top_rated;
        }
    }

    function search_nongsan($keyword)
    {
        $query = "SELECT * FROM `sanpham` inner join danhmuc on sanpham.danhmuc = danhmuc.id_dm WHERE `sanpham`.`tensanpham` LIKE '%$keyword%' or `danhmuc`.`tendanhmuc` LIKE '%$keyword%'";

        if (mysqli_query($this->connection, $query)) {
            $search_query = mysqli_query($this->connection, $query);
            return $search_query;
        }
    }
    function search_baiviet($keyword)
    {
        $query = "SELECT * FROM `baiviet` WHERE `tieude` LIKE '%$keyword%' or `id_bv` LIKE '%$keyword%'";

        if (mysqli_query($this->connection, $query)) {
            $search_query = mysqli_query($this->connection, $query);
            return $search_query;
        }
    }

    function search_vsx($keyword)
    {
        $query = "SELECT * FROM `vungsanxuat` WHERE `tenvung` LIKE '%$keyword%' or `mavung` LIKE '%$keyword%'";

        if (mysqli_query($this->connection, $query)) {
            $search_query = mysqli_query($this->connection, $query);
            return $search_query;
        }
    }
    function search_nhaxuong($keyword)
    {
        $query = "SELECT * FROM `nhaxuong` WHERE `tennhaxuong` LIKE '%$keyword%' or `manhaxuong` LIKE '%$keyword%'";

        if (mysqli_query($this->connection, $query)) {
            $search_query = mysqli_query($this->connection, $query);
            return $search_query;
        }
    }

    function search_caygiong($keyword)
    {
        $query = "SELECT * FROM `caygiong` WHERE `tencaygiong` LIKE '%$keyword%' or `id_cg` LIKE '%$keyword%'";

        if (mysqli_query($this->connection, $query)) {
            $search_query = mysqli_query($this->connection, $query);
            return $search_query;
        }
    }

    function search_nhatky($keyword)
    {
        $query = "SELECT * FROM `nhatky` WHERE `tennhatky` LIKE '%$keyword%' or `id_nk` LIKE '%$keyword%'";

        if (mysqli_query($this->connection, $query)) {
            $search_query = mysqli_query($this->connection, $query);
            return $search_query;
        }
    }

    function user_password_recover($recover_email)
    {
        $query = "SELECT * FROM `taikhoan` WHERE `email`='$recover_email'";
        if (mysqli_query($this->connection, $query)) {
            $row =  mysqli_query($this->connection, $query);
            return $row;
        }
    }

    function update_user_password($data)
    {

        $update_id = $data['update_user_id'];
        $update_password = md5($data['update_user_password']);

        // echo $update_id.$update_password;

        $query = "UPDATE `users` SET `user_password`='$update_password' WHERE `user_id`=$update_id";


        if (mysqli_query($this->connection, $query)) {
            $update_mag = "You password updated successfull";
            return $update_mag;
        } else {
            return "Please enter a correct email";
        }
    }


    function display_links()
    {
        $query = "SELECT * FROM header_info";

        if (mysqli_query($this->connection, $query)) {
            $ctg_info = mysqli_query($this->connection, $query);
            return $ctg_info;
        }
    }

    function display_link_ID($id)
    {
        $query = "SELECT * FROM header_info WHERE id = $id";

        if (mysqli_query($this->connection, $query)) {
            $cata_info = mysqli_query($this->connection, $query);
            return mysqli_fetch_assoc($cata_info);
        }
    }

    //Mynul created 

    function updata_links($data)
    {
        $link_id = $data['id'];
        $link_email = $data['email'];
        $link_tweeter = $data['tweeter'];
        $link_fb = $data['fb'];
        $link_pin = $data['pin'];
        $link_phone = $data['phone'];


        $query = "UPDATE header_info SET email='$link_email',tweeter='$link_tweeter',fb_link= '$link_fb', pinterest='$link_pin', phone='$link_phone' WHERE id = $link_id";
        if (mysqli_query($this->connection, $query)) {
            return "Link Update successfully";
        }
    }

    function display_logo()
    {
        $query = "SELECT * FROM add_logo";

        if (mysqli_query($this->connection, $query)) {
            $pdt_info = mysqli_query($this->connection, $query);
            return $pdt_info;
        }
    }



    function display_logo_ID($id)
    {
        $query = "SELECT * FROM add_logo WHERE id = $id";

        if (mysqli_query($this->connection, $query)) {
            $cata_info = mysqli_query($this->connection, $query);
            return mysqli_fetch_assoc($cata_info);
        }
    }

    function update_logo($data)
    {
        $lg_id = $data['id'];

        $lg_name = $_FILES['img']['name'];
        $lg_size = $_FILES['img']['size'];
        $lg_tmp = $_FILES['img']['tmp_name'];
        $lg_ext = pathinfo($lg_name, PATHINFO_EXTENSION);

        list($width, $height) = getimagesize("$lg_tmp");


        if ($lg_ext == "jpg" ||   $lg_ext == 'jpeg' ||  $lg_ext == "png") {
            if ($lg_size <= 2e+6) {

                if ($width < 136 && $height < 37) {

                    $select_query = "SELECT * FROM `add_logo` WHERE id=$lg_id";
                    $result = mysqli_query($this->connection, $select_query);
                    $row = mysqli_fetch_assoc($result);
                    $pre_img = $row['img'];
                    unlink("uploads/" . $pre_img);


                    $query = "UPDATE add_logo SET img='$lg_name' WHERE id=$lg_id";

                    if (mysqli_query($this->connection, $query)) {
                        move_uploaded_file($lg_tmp, "uploads/" . $lg_name);
                        $msg = "Logo  Updated successfully";
                        return $msg;
                    }
                } else {
                    $msg = "Sorry !! Logo max height: 135px and width:36px, but you are trying {$width} px and {$height} px";
                    return $msg;
                }
            } else {
                $msg = "File size should not be large 2MB";
                return $msg;
            }
        } else {
            $msg = "File shoul be jpg or png formate";
            return $msg;
        }
    }

    function vsxShow()
    {
        $query = "SELECT * FROM `vungsanxuat` order by id_vung desc";
        if (mysqli_query($this->connection, $query)) {
            $row = mysqli_query($this->connection, $query);
            return $row;
        }
    }

    function vsxShowlimit()
    {
        $query = "SELECT * FROM `vungsanxuat` limit 8";
        if (mysqli_query($this->connection, $query)) {
            $row = mysqli_query($this->connection, $query);
            return $row;
        }
    }

    function vsx_By_id($id)
    {
        $query = "SELECT * FROM `vungsanxuat` WHERE `id_vung`=$id";
        if (mysqli_query($this->connection, $query)) {
            $row = mysqli_query($this->connection, $query);
            return $row;
        }
    }

    function vsx_update($data)
    {
        $id_vung = $data['id_vung'];
        $nguoidang = $data['nguoidang'];
        $tenvung = $data['tenvung'];
        $mavung = $data['mavung'];
        $nhatky = $data['nhatky'];

        $sdt = $data['sdt'];
        $dc = $data['dc'];
        $bando = $data['bando'];
        $thoigiantrong = $data['thoigiantrong'];
        $dientich = $data['dientich'];
        $thongtin = $data['thongtin'];
        $thanhvien = json_encode($data['thanhvien']);
        // Kiểm tra xem có tập tin hình ảnh nào được tải lên không
        if (!empty($_FILES['img']['tmp_name'])) {
            $lg_name = $_FILES['img']['name'];
            $lg_size = $_FILES['img']['size'];
            $lg_tmp = $_FILES['img']['tmp_name'];
            $lg_ext = pathinfo($lg_name, PATHINFO_EXTENSION);
            list($width, $height) = getimagesize($lg_tmp);

            if ($lg_ext == "jpg" || $lg_ext == 'jpeg' || $lg_ext == "png") {
                if ($lg_size <= 2e+6 && $width < 1920 && $height < 1000) {
                    // Xóa ảnh cũ trước khi cập nhật ảnh mới
                    $select_query = "SELECT * FROM `vungsanxuat` WHERE `id_vung`='$id_vung'";
                    $result = mysqli_query($this->connection, $select_query);
                    $row = mysqli_fetch_assoc($result);
                    $pre_img = $row['hinhanh'];
                    unlink("uploads/" . $pre_img);

                    $query = "UPDATE `vungsanxuat` SET `nguoidang` = '$nguoidang',`nhatky` = '$nhatky',`thanhvien` = '$thanhvien',`tenvung` = '$tenvung', `mavung` = '$mavung', `hinhanh` = '$lg_name', `sdt` = '$sdt', `diachi` = '$dc', `bando` = '$bando', `thoigiannuoitrong` = '$thoigiantrong', `dientich` = '$dientich', `thongtin` = '$thongtin' WHERE `id_vung` = '$id_vung';";

                    if (mysqli_query($this->connection, $query) && move_uploaded_file($lg_tmp, "uploads/" . $lg_name)) {
                        echo ' ;<script>
                        alert("Cập nhật thành công");
                        window.location.href = "manage_vsx.php";
                      </script>';
                    } else {
                        echo "Đăng lên thất bại!";
                    }
                } else {
                    $msg = "Hình ảnh phải có chiều rộng ngắn hơn 1920px và chiều cao thấp hơn 1000px, nhưng của bạn rộng {$width} px và cao {$height} px";
                    return $msg;
                }
            } else {
                $msg = "Chỉ nhận ảnh dạng jpg, jpeg , png";
                return $msg;
            }
        } else {
            // Nếu không có tập tin hình ảnh mới được tải lên, giữ nguyên ảnh cũ và chỉ cập nhật thông tin khác của vùng sản xuất
            $query = "UPDATE `vungsanxuat` SET `nguoidang` = '$nguoidang', `nhatky` = '$nhatky',`thanhvien` = '$thanhvien',`tenvung` = '$tenvung', `mavung` = '$mavung', `sdt` = '$sdt', `diachi` = '$dc', `bando` = '$bando', `thoigiannuoitrong` = '$thoigiantrong', `dientich` = '$dientich', `thongtin` = '$thongtin' WHERE `id_vung` = '$id_vung';";

            if (mysqli_query($this->connection, $query)) {
                echo '<script>
                        alert("Cập nhật thành công");
                        window.location.href = "manage_vsx.php";
                      </script>';
            } else {
                echo "Update failed!";
            }
        }
    }


    function delete_Vungsanxuat($id)
    {
        $sel_query = "SELECT * FROM `vungsanxuat` WHERE id_vung=$id";
        $query = mysqli_query($this->connection, $sel_query);
        $fetch = mysqli_fetch_assoc($query);
        $img_name = $fetch['hinhanh'];
        $maqr = $fetch['maqr'];

        $del_query = "DELETE FROM `vungsanxuat` WHERE id_vung=$id";
        if (mysqli_query($this->connection, $del_query)) {
            unlink('uploads/' . $img_name);
            unlink('uploads/qrcode_vsx/' . $maqr);
            echo '<script>
                alert("Xóa thành công");
                window.location.href = "manage_vsx.php";
                </script>';
        }
    }

    function show_baiviet()
    {
        $query = "SELECT * FROM `baiviet`";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            return $result;
        }
    }

    function SliderShow()
    {
        $query = "SELECT * FROM `slider`";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            return $result;
        }
    }

    function show_baiviet_by_id($id_bv)
    {
        $query = "SELECT * FROM `baiviet` WHERE `id_bv`=$id_bv";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            return $result;
        }
    }
    function delete_baiviet($id_bv)
    {
        $sel_query = "SELECT * FROM `baiviet` WHERE `id_bv`=$id_bv";
        $query = mysqli_query($this->connection, $sel_query);
        $fetch = mysqli_fetch_assoc($query);
        $img_name = $fetch['hinhanh'];

        $del_query = "DELETE FROM `baiviet` WHERE `id_bv`=$id_bv";
        if (mysqli_query($this->connection, $del_query)) {
            unlink('uploads/baiviet/' . $img_name);
            echo '<script>
            alert("Xóa bài viết thành công");
            window.location.href = "manage_bv.php";
            </script>';
        }
    }
    function add_bv($data)
    {
        $nguoidang = $data['nguoidang'];
        $tieude = $data['tieude'];
        $noidung = $data['noidung'];

        $bv_img_name = $_FILES['hinhanh']['name'];
        $bv_img_size = $_FILES['hinhanh']['size'];
        $bv_img_tmp = $_FILES['hinhanh']['tmp_name'];
        $img_ext = pathinfo($bv_img_name, PATHINFO_EXTENSION);



        list($width, $height) = getimagesize("$bv_img_tmp");

        if ($img_ext == "jpg" ||  $img_ext == 'jpeg' || $img_ext == "png") {
            if ($bv_img_size <= 2e+6) {

                if ($width < 2071 && $height < 2071) {
                    $query = "INSERT INTO `baiviet` (`nguoidang`, `tieude`, `noidung`, `hinhanh`) VALUES (' $nguoidang', '$tieude', '$noidung', '$bv_img_name');";

                    if (mysqli_query($this->connection, $query)) {
                        move_uploaded_file($bv_img_tmp, "uploads/baiviet/" . $bv_img_name);
                        $msg = "Product uploaded successfully";
                        echo '<script>
                            alert(" Thêm  thành công");
                            window.location.href = "manage_bv.php";
                            </script>';
                    } else {
                        $msg = "Failed to upload product: " . mysqli_error($this->connection);
                        return $msg;
                    }
                } else {
                    $msg = "Sorry !! Pdt image max height: 2071 px and width: 2071 px, but you are trying {$width} px and {$height} px";
                    return $msg;
                }
            } else {
                $msg = "File size should not be large 2MB";
                return $msg;
            }
        } else {
            $msg = "File should be jpg or png format";
            return $msg;
        }
    }

    function update_baiviet($data)
    {
        $id_bv = $data['id_bv'];
        $nguoidang = $data['nguoidang'];
        $tieude = $data['tieude'];
        $noidung = $data['noidung'];

        // Kiểm tra xem có tập tin hình ảnh nào được tải lên không
        if (!empty($_FILES['bv_img']['tmp_name'])) {
            $bv_img_name = $_FILES['bv_img']['name'];
            $bv_img_size = $_FILES['bv_img']['size'];
            $bv_img_tmp = $_FILES['bv_img']['tmp_name'];
            $img_ext = pathinfo($bv_img_name, PATHINFO_EXTENSION);
            list($width, $height) = getimagesize($bv_img_tmp);

            if ($img_ext == "jpg" || $img_ext == 'jpeg' || $img_ext == "png") {
                if ($bv_img_size <= 2e+6 && $width < 2701 && $height < 2701) {
                    $select_query = "SELECT * FROM `baiviet` WHERE id_bv=$id_bv";
                    $result = mysqli_query($this->connection, $select_query);
                    $row = mysqli_fetch_assoc($result);
                    $pre_img = $row['hinhanh'];
                    unlink("uploads/baiviet/" . $pre_img);

                    $query = "UPDATE `baiviet` SET `nguoidang`='$nguoidang',`hinhanh`= '$bv_img_name',`tieude`= '$tieude', `noidung`= '$noidung'  WHERE `id_bv`= '$id_bv'";
                    if (mysqli_query($this->connection, $query) && move_uploaded_file($bv_img_tmp, "uploads/baiviet/" . $bv_img_name)) {
                        echo '<script>
                        alert("Chỉnh sửa bài viết thành công");
                        window.location.href = "manage_bv.php";
                    </script>';
                    } else {
                        echo "Upload failed!";
                    }
                } else {
                    $msg = "Sorry !! Pdt image max height: 2701 px and width: 2701 px, but you are trying {$width} px and {$height} px";
                    return $msg;
                }
            } else {
                $msg = "File should be jpg or png format";
                return $msg;
            }
        } else {
            // Nếu không có tập tin hình ảnh mới được tải lên, giữ nguyên ảnh cũ và chỉ cập nhật thông tin khác của bài viết
            $query = "UPDATE `baiviet` SET `nguoidang`='$nguoidang', `tieude`= '$tieude', `noidung`= '$noidung' WHERE `id_bv`= '$id_bv'";
            if (mysqli_query($this->connection, $query)) {
                echo '<script>
                alert("Chỉnh sửa bài viết thành công");
                window.location.href = "manage_bv.php";
            </script>';
            } else {
                echo "Update failed!";
            }
        }
    }

    function XoaSo($input)
    {
        // Sử dụng biểu thức chính quy để loại bỏ các phần có số dính với dấu gạch ngang
        $output = preg_replace('/\b\d+-/', '', $input);
        return $output;
    }
    function formatChu($input)
    {
        $input = mb_strtolower($input);
        $input = ucwords($input);
        return $input;
    }
    function add_vsx($data)
    {
        $nguoidang = $data['nguoidaidien'];
        $tenvung = $data['tenvung'];
        $mavung = $data['mavung'];
        $sdt = $data['sdt'];
        $province = $data['province'];
        $district = $data['district'];
        ucwords($district);
        $wards = $data['wards'];
        ucwords($wards);
        $ap = $data['diachi'];
        $nhatky = $data['nhatky'];
        $bando = $data['bando'];
        $dientich = $data['dientich'];
        $thongtin = $data['thongtin'];
        $thoigiantrong = $data['thoigiantrong'];
        $thanhvien = json_encode($data['thanhvien']);
        $img_name = $_FILES['img']['name'];
        $img_size = $_FILES['img']['size'];
        $img_tmp = $_FILES['img']['tmp_name'];
        $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
        list($width, $height) = getimagesize("$img_tmp");

        //Tạo đường dẫn và tên qr code
        $path = 'uploads/qrcode_vsx/';
        $qrcode_name = 'NSQN-' . time() . ".png";
        $qrcode = $path . $qrcode_name;

        if (isset($ap) && isset($wards) && isset($district) && isset($province) && isset($tenvung)) {
            $full_address = $wards . ', ' . $district . ', ' . $province;
            if ($img_ext == "jpg" ||  $img_ext == 'jpeg' || $img_ext == "png") {
                if ($img_size <= 2e+6) {

                    if ($width < 2071 && $height < 2071) {
                        $query = "INSERT INTO `vungsanxuat`(`nguoidang`,  `nhatky`,`thanhvien`, `tenvung`,  `mavung`,`hinhanh`,`maqr`, `sdt`,`ap`, `diachi`, `bando`, `thoigiannuoitrong`,`dientich`,`thongtin`) VALUES ('$nguoidang','$nhatky','$thanhvien','$tenvung','$mavung', '$img_name','$qrcode_name','$sdt','$ap','$full_address','$bando','$thoigiantrong','$dientich','$thongtin')";

                        if (mysqli_query($this->connection, $query)) {
                            move_uploaded_file($img_tmp, "uploads/" . $img_name);
                            $new_insert_id = $this->connection->insert_id;
                            $url = "http://192.169.1.17/nongsan/chitietvsx.php?id=" . $new_insert_id;
                            QRcode::png($url, $qrcode, 'L', 4, 4);
                            $msg = "Thêm vùng sản xuất thành công!!";
                            echo '<script>
                                alert(" Thêm Vùng sản xuất thành công");
                                window.location.href = "manage_vsx.php";
                                </script>';
                        } else {
                            $msg = "Lỗi upload ảnh: " . mysqli_error($this->connection);
                            return $msg;
                        }
                    } else {
                        $msg = "Sorry !! Pdt image max height: 2071 px and width: 2071 px, but you are trying {$width} px and {$height} px";
                        return $msg;
                    }
                } else {
                    $msg = "File size should not be large 2MB";
                    return $msg;
                }
            } else {
                $msg = "File should be jpg or png format";
                return $msg;
            }
        } else {
            $msg = "Vui lòng nhập đầy đủ thông tin!!";
            return $msg;
        }
    }
    function count_bv_manage($nguoidang, $role)
    {
        $query = "SELECT COUNT(*) AS dembv FROM `baiviet`";

        $result = mysqli_query($this->connection, $query);

        if ($result) {
            if ($role == "Admin") {
                //Đếm trang theo role Admin
                $row = mysqli_fetch_assoc($result);
                $dembv = $row['dembv'];
                return $dembv;
            } else {
                //Đếm trang theo các role khác
                $query = "SELECT COUNT(*) AS dembv FROM `baiviet` where nguoidang = $nguoidang";
                $result = mysqli_query($this->connection, $query);
                $row = mysqli_fetch_assoc($result);
                $dembv = $row['dembv'];
                return $dembv;
            }
        } else {
            return "Error: " . mysqli_error($this->connection);
        }
    }
    function count_dn()
    {
        $query = "SELECT COUNT(*) AS demdn FROM `doanhnghiep`";

        $result = mysqli_query($this->connection, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $demdg = $row['demdn'];
            return $demdg;
        } else {
            return "Error: " . mysqli_error($this->connection);
        }
    }
    function count_caygiong()
    {
        $query = "SELECT COUNT(*) AS demcg FROM `caygiong`";

        $result = mysqli_query($this->connection, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $demdg = $row['demcg'];
            return $demdg;
        } else {
            return "Error: " . mysqli_error($this->connection);
        }
    }
    function count_bv()
    {
        $query = "SELECT COUNT(*) AS dembv FROM `baiviet`";

        $result = mysqli_query($this->connection, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $dembv = $row['dembv'];
            return $dembv;
        } else {
            return "Error: " . mysqli_error($this->connection);
        }
    }
    function count_vsx()
    {
        $query = "SELECT COUNT(*) AS demvsx FROM `vungsanxuat`";

        $result = mysqli_query($this->connection, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $demvsx = $row['demvsx'];
            return $demvsx;
        } else {
            return "Error: " . mysqli_error($this->connection);
        }
    }
    public function get_product_details($product_id)
    {
        $query = "SELECT * FROM `sanpham` WHERE `id_sp` = $product_id";
        $result = mysqli_query($this->connection, $query);
        return $result;
    }
    function display_vsxbyID($id)
    {
        $query = "SELECT * FROM `vungsanxuat` WHERE id_vung = $id";

        if (mysqli_query($this->connection, $query)) {
            $vsx_info = mysqli_query($this->connection, $query);
            return mysqli_fetch_assoc($vsx_info);
        }
    }
    function display_dnbyID($id)
    {
        $query = "SELECT * FROM `doanhnghiep` WHERE id_dn = $id";

        if (mysqli_query($this->connection, $query)) {
            $vsx_info = mysqli_query($this->connection, $query);
            return mysqli_fetch_assoc($vsx_info);
        }
    }


    function show_caygiong()
    {
        $query = "SELECT * FROM `caygiong` order by id_cg desc";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            return $result;
        }
    }

    function show_caygiong_limit()
    {
        $query = "SELECT * FROM caygiong LIMIT 8;";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            return $result;
        }
    }

    function delete_caygiong($id_cg)
    {
        $sel_query = "SELECT * FROM `caygiong` WHERE `id_cg`=$id_cg";
        $query = mysqli_query($this->connection, $sel_query);
        $fetch = mysqli_fetch_assoc($query);
        $maqr = $fetch["maqr"];
        $img_name = $fetch["hinhanh"];
        $giaychungnhan = $fetch['$giaychungnhan'];
        $del_query = "DELETE FROM `caygiong` WHERE `id_cg`=$id_cg";
        if (mysqli_query($this->connection, $del_query)) {
            unlink('uploads/' . $img_name);
            unlink('uploads/' . $giaychungnhan);
            unlink('uploads/qrcode_caygiong/' . $maqr);
            echo '<script>
            alert("Xóa thành công");
            window.location.href = "manage_caygiong.php";
            </script>';
        }
    }

    function add_caygiong($data)
    {
        $nguoidang = $data['nguoidang'];
        $tencaygiong = $data['tencaygiong'];
        $macaygiong = $this->thayDoiChu($tencaygiong);
        $mota = $data['mota'];
        $nhasanxuat = $data['nhasanxuat'];
        $ngaysanxuat = date("d/m/Y", strtotime($data['ngaysanxuat']));
        $hansudung = $data['hansudung'];
        $phuongphaptrong = $data['phuongphaptrong'];
        $lienhe = $data['lienhe'];
        $nhaphanphoi = $data['nhaphanphoi'];
        $gia = $data['gia'];
        $hdsd = $data['hdsd'];
        $xuatxu = $data['xuatxu'];

        $img_name = $_FILES['hinhanh']['name'];
        $img_size = $_FILES['hinhanh']['size'];
        $img_tmp = $_FILES['hinhanh']['tmp_name'];
        $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
        list($width, $height) = getimagesize($img_tmp);

        $giaychungnhan_name = $_FILES['giaychungnhan']['name'];
        $giaychungnhan_size = $_FILES['giaychungnhan']['size'];
        $giaychungnhan_tmp = $_FILES['giaychungnhan']['tmp_name'];
        $giaychungnhan_ext = pathinfo($giaychungnhan_name, PATHINFO_EXTENSION);

        //Tạo đường dẫn và tên qr code
        $path = 'uploads/qrcode_caygiong/';
        $qrcode_name = 'NSQN-'. time() . ".png";
        $qrcode = $path . $qrcode_name;

        // Validate the main image
        if (($img_ext == "jpg" || $img_ext == 'jpeg' || $img_ext == "png") && ($giaychungnhan_ext == "jpg" || $giaychungnhan_ext == 'jpeg' || $giaychungnhan_ext == "png")) {
            if ($img_size <= 2e+6 && $giaychungnhan_size <= 2e+6) {
                if ($width < 2071 && $height < 2071) {
                    $query = "INSERT INTO `caygiong` (`nguoidang`, `nhasanxuat`, `nhaphanphoi`, `tencaygiong`, `macaygiong`, `maqr`,`mota`, `xuatxu`, `gia`, `ngaysanxuat`, `hansudung`, `hdsd`, `phuongphaptrong`, `hinhanh`, `lienhe`, `giaychungnhan`) 
                          VALUES ('$nguoidang', '$nhasanxuat', '$nhaphanphoi', '$tencaygiong', '$macaygiong','$qrcode_name', '$mota', '$xuatxu', '$gia', '$ngaysanxuat', '$hansudung', '$hdsd', '$phuongphaptrong', '$img_name', '$lienhe', '$giaychungnhan_name');";

                    if (mysqli_query($this->connection, $query)) {
                        move_uploaded_file($img_tmp, "uploads/" . $img_name);
                        move_uploaded_file($giaychungnhan_tmp, "uploads/" . $giaychungnhan_name);
                        //Lấy id vừa thêm gán vào qrcode
                        $new_insert_id = $this->connection->insert_id;
                        $url = "http://192.169.1.17/nongsan/chitietcaygiong.php?id=" . $new_insert_id;
                        QRcode::png($url, $qrcode, 'L', 4, 4);
                        echo '<script>
                            alert("Thêm thành công");
                            window.location.href = "manage_caygiong.php";
                          </script>';
                    } else {
                        $msg = "Lỗi upload ảnh: " . mysqli_error($this->connection);
                        return $msg;
                    }
                } else {
                    $msg = "Sorry !! Pdt image max height: 2071 px and width: 2071 px, but you are trying {$width} px and {$height} px";
                    return $msg;
                }
            } else {
                $msg = "File size should not be larger than 2MB";
                return $msg;
            }
        } else {
            $msg = "Files should be in jpg or png format";
            return $msg;
        }
    }

    function show_caygiong_by_id($id_cg)
    {
        $query = "SELECT * FROM `caygiong` WHERE `id_cg`=$id_cg";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            return $result;
        }
    }

    function update_caygiong($data)
    {
        $id_cg = $data['id_cg'];
        $tencaygiong = $data['tencaygiong'];
        $macaygiong = $data['macaygiong'];
        $mota = $data['mota'];
        $nhasanxuat = $data['nhasanxuat'];
        $ngaysanxuat = $data['ngaysanxuat'];
        $hansudung = $data['hansudung'];
        $phuongphaptrong = $data['phuongphaptrong'];
        $lienhe = $data['lienhe'];
        $nhaphanphoi = $data['nhaphanphoi'];
        $gia = $data['gia'];
        $hdsd = $data['hdsd'];
        $xuatxu = $data['xuatxu'];

        $img_name = $_FILES['hinhanh']['name'];
        $img_size = $_FILES['hinhanh']['size'];
        $img_tmp = $_FILES['hinhanh']['tmp_name'];

        $giaychungnhan_name = $_FILES['giaychungnhan']['name'];
        $giaychungnhan_size = $_FILES['giaychungnhan']['size'];
        $giaychungnhan_tmp = $_FILES['giaychungnhan']['tmp_name'];

        // Retrieve current images from the database
        $select_query = "SELECT * FROM `caygiong` WHERE id_cg=$id_cg";
        $result = mysqli_query($this->connection, $select_query);
        $row = mysqli_fetch_assoc($result);
        $pre_img = $row['hinhanh'];
        $pre_giaychungnhan = $row['giaychungnhan'];

        // Check and handle `hinhanh` upload
        if (!empty($img_tmp)) {
            $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);
            list($width, $height) = getimagesize($img_tmp);

            if ($img_ext == "jpg" || $img_ext == 'jpeg' || $img_ext == "png") {
                if ($img_size <= 2e+6 && $width < 2701 && $height < 2701) {
                    // Delete old image
                    unlink("uploads/" . $pre_img);
                    // Update image name
                    $new_img_name = $img_name;
                    move_uploaded_file($img_tmp, "uploads/" . $new_img_name);
                } else {
                    $msg = "Sorry !! Image max height: 2701 px and width: 2701 px, but you are trying {$width} px and {$height} px";
                    return $msg;
                }
            } else {
                $msg = "File should be jpg or png format";
                return $msg;
            }
        } else {
            // Keep old image
            $new_img_name = $pre_img;
        }

        // Check and handle `giaychungnhan` upload
        if (!empty($giaychungnhan_tmp)) {
            $giaychungnhan_ext = pathinfo($giaychungnhan_name, PATHINFO_EXTENSION);
            list($width, $height) = getimagesize($giaychungnhan_tmp);

            if ($giaychungnhan_ext == "jpg" || $giaychungnhan_ext == 'jpeg' || $giaychungnhan_ext == "png") {
                if ($giaychungnhan_size <= 2e+6 && $width < 2701 && $height < 2701) {
                    // Delete old certificate image
                    unlink("uploads/" . $pre_giaychungnhan);
                    // Update certificate image name
                    $new_giaychungnhan_name = $giaychungnhan_name;
                    move_uploaded_file($giaychungnhan_tmp, "uploads/" . $new_giaychungnhan_name);
                } else {
                    $msg = "Sorry !! Certificate image max height: 2701 px and width: 2701 px, but you are trying {$width} px and {$height} px";
                    return $msg;
                }
            } else {
                $msg = "Certificate file should be jpg or png format";
                return $msg;
            }
        } else {
            // Keep old certificate image
            $new_giaychungnhan_name = $pre_giaychungnhan;
        }

        // Update product information
        $query = "UPDATE `caygiong` SET  
                    `nhasanxuat` = '$nhasanxuat', 
                    `nhaphanphoi` = '$nhaphanphoi', 
                    `tencaygiong` = '$tencaygiong', 
                    `macaygiong` = '$macaygiong', 
                    `mota` = '$mota', 
                    `xuatxu` = '$xuatxu', 
                    `gia` = '$gia', 
                    `ngaysanxuat` = '$ngaysanxuat', 
                    `hansudung` = '$hansudung', 
                    `hdsd` = '$hdsd', 
                    `phuongphaptrong` = '$phuongphaptrong', 
                    `hinhanh` = '$new_img_name', 
                    `giaychungnhan` = '$new_giaychungnhan_name', 
                    `lienhe` = '$lienhe' 
                  WHERE `id_cg` = '$id_cg';";

        if (mysqli_query($this->connection, $query)) {
            echo '<script>
                    alert("Chỉnh sửa sản phẩm thành công");
                    window.location.href = "manage_caygiong.php";
                  </script>';
        } else {
            echo "Update failed!";
        }
    }

    function display_catagory_dn()
    {
        $query = "SELECT * FROM `danhmuc_dn`";

        if (mysqli_query($this->connection, $query)) {
            $ctg_info = mysqli_query($this->connection, $query);
            return $ctg_info;
        }
    }
    function delete_catagory_dn($id)
    {
        $query = "DELETE FROM `danhmuc_dn` WHERE  id_dmdn = $id";
        if (mysqli_query($this->connection, $query)) {
            echo '<script>
            alert("Xóa thành công");
            window.location.href = "manage_dm_dn.php";
            </script>';
        }
    }
    function show_dmdn_by_id($id_dmdn)
    {
        $query = "SELECT * FROM `danhmuc_dn` WHERE `id_dmdn`='$id_dmdn'";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            return $result;
        }
    }

    function show_dn_by_id($id_dn)
    {
        $query = "SELECT * FROM `doanhnghiep` WHERE `id_dn`='$id_dn'";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            return mysqli_fetch_assoc($result);
        }
    }

    function updata_catagory_dn($data)
    {
        $dn_ctg_id = $data['dn_ctg_id'];
        $dn_ctg_name = $data['dn_ctg_name'];
        $query = "UPDATE `danhmuc_dn` SET `tendoanhnghiep` = '$dn_ctg_name' WHERE `id_dmdn` = '$dn_ctg_id';";
        if (mysqli_query($this->connection, $query)) {
            echo '<script>
            alert(" Chỉnh sửa thành công");
            window.location.href = "manage_dm_dn.php";
            </script>';
        }
    }
    function add_catagory_dn($data)
    {
        $ctgdn_name = $data['ctgdn_name'];
        $query = "INSERT INTO `danhmuc_dn`( `tendoanhnghiep`) VALUES ('$ctgdn_name')";

        if (mysqli_query($this->connection, $query)) {
            echo '<script>
            alert("Thêm danh mục thành công");
            window.location.href = "manage_dm_dn.php";
            </script>';
        } else {
            return "Thêm danh mục thất bại!";
        }
    }

    function display_dn()
    {
        $query = "SELECT * FROM `doanhnghiep`";

        if (mysqli_query($this->connection, $query)) {
            $ctg_info = mysqli_query($this->connection, $query);
            return $ctg_info;
        }
    }
    function delete_dn($id_dn)
    {

        $sel_query = "SELECT * FROM `doanhnghiep` WHERE  id_dn = $id_dn";
        $query = mysqli_query($this->connection, $sel_query);
        $fetch = mysqli_fetch_assoc($query);
        $img_name = $fetch['hinhanh'];
        $giayphepkinhdoanh = $fetch['giayphepkinhdoanh'];
        $giaychungnhan = $fetch['giaychungnhan'];
        $giaykiemdinh = $fetch['giaykiemdinh'];
        $maqr = $fetch['maqr'];
        $del_query = "DELETE FROM `doanhnghiep` WHERE id_dn=$id_dn";
        if (mysqli_query($this->connection, $del_query)) {
            unlink('uploads/' . $img_name);
            unlink('uploads/' . $giayphepkinhdoanh);
            unlink('uploads/' . $giaychungnhan);
            unlink('uploads/' . $giaykiemdinh);
            unlink('uploads/qrcode_doanhnghiep/' . $maqr);
            echo '<script>
            alert("Xóa thành công");
            window.location.href = "manage_doanhnghiep.php";
            </script>';
        }
    }
    function update_dn($data)
    {
        $id_dn = $data['id_dn'];
        $danhmuc_dn = $data['danhmuc_dn'];
        $nguoidaidien = $data['nguoidaidien'];
        $tendoanhnghiep = $data['tendoanhnghiep'];
        $sdt = $data['sdt'];
        $email = $data['email'];
        $diachi = $data['diachi'];
        $masothue = $data['masothue'];
        $thongtinchung = $data['thongtinchung'];
        $thanhvien = json_encode($data['thanhvien']);
        // Xử lý tập tin hình ảnh doanh nghiệp nếu có
        if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] === UPLOAD_ERR_OK) {
            $dn_img_name = $_FILES['hinhanh']['name'];
            $dn_img_size = $_FILES['hinhanh']['size'];
            $dn_img_tmp = $_FILES['hinhanh']['tmp_name'];
            $img_ext = pathinfo($dn_img_name, PATHINFO_EXTENSION);

            list($width, $height) = getimagesize($dn_img_tmp);

            if ($img_ext == "jpg" ||  $img_ext == 'jpeg' || $img_ext == "png") {
                if ($dn_img_size <= 2e+6 && $width < 2701 && $height < 2701) {
                    // Di chuyển và cập nhật tập tin hình ảnh mới
                    $target_file = "uploads/" . $dn_img_name;
                    if (move_uploaded_file($dn_img_tmp, $target_file)) {
                        $dn_img = $dn_img_name;
                    } else {
                        echo "Upload failed!";
                        return;
                    }
                } else {
                    echo "Sorry !! Pdt image max height: 2701 px and width: 2701 px, but you are trying {$width} px and {$height} px";
                    return;
                }
            } else {
                echo "File should be jpg or png format";
                return;
            }
        }

        // Kiểm tra xem người dùng đã tải lên tập tin hình ảnh giấy phép kinh doanh mới không
        if (isset($_FILES['giayphepkinhdoanh']) && $_FILES['giayphepkinhdoanh']['error'] === UPLOAD_ERR_OK) {
            $giayphepkinhdoanh_img_name = $_FILES['giayphepkinhdoanh']['name'];
            $giayphepkinhdoanh_img_size = $_FILES['giayphepkinhdoanh']['size'];
            $giayphepkinhdoanh_img_tmp = $_FILES['giayphepkinhdoanh']['tmp_name'];
            $giayphepkinhdoanh_img_ext = pathinfo($giayphepkinhdoanh_img_name, PATHINFO_EXTENSION);

            // Xử lý tập tin hình ảnh giấy phép kinh doanh mới
            $target_dir = "uploads/";
            $giayphepkinhdoanh_img_new_name = uniqid() . '_' . $giayphepkinhdoanh_img_name;
            move_uploaded_file($giayphepkinhdoanh_img_tmp, $target_dir . $giayphepkinhdoanh_img_new_name);
        }

        // Kiểm tra xem người dùng đã tải lên tập tin hình ảnh giấy chứng nhận mới không
        if (isset($_FILES['giaychungnhan']) && $_FILES['giaychungnhan']['error'] === UPLOAD_ERR_OK) {
            $giaychungnhan_img_name = $_FILES['giaychungnhan']['name'];
            $giaychungnhan_img_size = $_FILES['giaychungnhan']['size'];
            $giaychungnhan_img_tmp = $_FILES['giaychungnhan']['tmp_name'];
            $giaychungnhan_img_ext = pathinfo($giaychungnhan_img_name, PATHINFO_EXTENSION);

            // Xử lý tập tin hình ảnh giấy chứng nhận mới
            $target_dir = "uploads/";
            $giaychungnhan_img_new_name = uniqid() . '_' . $giaychungnhan_img_name;
            move_uploaded_file($giaychungnhan_img_tmp, $target_dir . $giaychungnhan_img_new_name);
        }

        // Kiểm tra xem người dùng đã tải lên tập tin hình ảnh giấy kiểm định mới không
        if (isset($_FILES['giaykiemdinh']) && $_FILES['giaykiemdinh']['error'] === UPLOAD_ERR_OK) {
            $giaykiemdinh_img_name = $_FILES['giaykiemdinh']['name'];
            $giaykiemdinh_img_size = $_FILES['giaykiemdinh']['size'];
            $giaykiemdinh_img_tmp = $_FILES['giaykiemdinh']['tmp_name'];
            $giaykiemdinh_img_ext = pathinfo($giaykiemdinh_img_name, PATHINFO_EXTENSION);

            // Xử lý tập tin hình ảnh giấy kiểm định mới
            $target_dir = "uploads/";
            $giaykiemdinh_img_new_name = uniqid() . '_' . $giaykiemdinh_img_name;
            move_uploaded_file($giaykiemdinh_img_tmp, $target_dir . $giaykiemdinh_img_new_name);
        }

        // Thực hiện truy vấn UPDATE vào cơ sở dữ liệu
        $query = "UPDATE `doanhnghiep` SET `danhmuc_dn` = '$danhmuc_dn', `nguoidaidien` = '$nguoidaidien',`thanhvien` = '$thanhvien', `tendoanhnghiep` = '$tendoanhnghiep',";

        if (isset($dn_img)) {
            $query .= " `hinhanh` = '$dn_img',";
        }

        if (isset($giayphepkinhdoanh_img_new_name)) {
            $query .= " `giayphepkinhdoanh` = '$giayphepkinhdoanh_img_new_name',";
        }

        if (isset($giaychungnhan_img_new_name)) {
            $query .= " `giaychungnhan` = '$giaychungnhan_img_new_name',";
        }

        if (isset($giaykiemdinh_img_new_name)) {
            $query .= " `giaykiemdinh` = '$giaykiemdinh_img_new_name',";
        }

        $query .= "`sdt` = '$sdt', `email` = '$email', `diachi` = '$diachi', `masothue` = '$masothue', `thongtinchung` = '$thongtinchung' WHERE `id_dn` = '$id_dn'";

        if (mysqli_query($this->connection, $query)) {
            echo '<script>
            alert("Chỉnh sửa thành công");
            window.location.href = "manage_doanhnghiep.php";
        </script>';
        } else {
            echo "Update failed!";
        }
    }
    function add_dn($data)
    {
        $danhmuc_dn = $data['danhmuc_dn'];
        $nguoidaidien = $data['nguoidaidien'];
        $tendoanhnghiep = $data['tendoanhnghiep'];
        $sdt = $data['sdt'];
        $email = $data['email'];
        $province = $data['province'];
        $district = $data['district'];
        ucwords($district);
        $wards = $data['wards'];
        ucwords($wards);
        $ap = $data['diachi'];
        $masothue = $data['masothue'];
        $thongtinchung = $data['thongtinchung'];
        $nguoidang = $data['nguoidang'];

        $full_address = $wards . ', ' . $district . ', ' . $province;
        // Xử lý hình ảnh doanh nghiệp
        $dn_img_name = $_FILES['hinhanh']['name'];
        $dn_img_size = $_FILES['hinhanh']['size'];
        $dn_img_tmp = $_FILES['hinhanh']['tmp_name'];
        $img_ext = pathinfo($dn_img_name, PATHINFO_EXTENSION);

        list($width, $height) = getimagesize($dn_img_tmp);

        //Tạo đường dẫn và tên qr code
        $path = 'uploads/qrcode_doanhnghiep/';
        $qrcode_name = 'NSQN-' . time() . ".png";
        $qrcode = $path . $qrcode_name;

        if (in_array($img_ext, ['jpg', 'jpeg', 'png'])) {
            if ($dn_img_size <= 2e+6) {
                if ($width < 2071 && $height < 2071) {
                    move_uploaded_file($dn_img_tmp, "uploads/" . $dn_img_name);

                    // Xử lý hình ảnh giấy phép kinh doanh
                    $giayphepkinhdoanh_img_name = $_FILES['giayphepkinhdoanh']['name'];
                    $giayphepkinhdoanh_img_size = $_FILES['giayphepkinhdoanh']['size'];
                    $giayphepkinhdoanh_img_tmp = $_FILES['giayphepkinhdoanh']['tmp_name'];
                    $giayphepkinhdoanh_img_ext = pathinfo($giayphepkinhdoanh_img_name, PATHINFO_EXTENSION);

                    // Xử lý hình ảnh giấy chứng nhận
                    $giaychungnhan_img_name = $_FILES['giaychungnhan']['name'];
                    $giaychungnhan_img_size = $_FILES['giaychungnhan']['size'];
                    $giaychungnhan_img_tmp = $_FILES['giaychungnhan']['tmp_name'];
                    $giaychungnhan_img_ext = pathinfo($giaychungnhan_img_name, PATHINFO_EXTENSION);

                    // Xử lý hình ảnh giấy kiểm định
                    $giaykiemdinh_img_name = $_FILES['giaykiemdinh']['name'];
                    $giaykiemdinh_img_size = $_FILES['giaykiemdinh']['size'];
                    $giaykiemdinh_img_tmp = $_FILES['giaykiemdinh']['tmp_name'];
                    $giaykiemdinh_img_ext = pathinfo($giaykiemdinh_img_name, PATHINFO_EXTENSION);

                    // Kiểm tra và di chuyển hình ảnh giấy phép kinh doanh, giấy chứng nhận, giấy kiểm định
                    if (
                        in_array($giayphepkinhdoanh_img_ext, ['jpg', 'jpeg', 'png']) &&
                        in_array($giaychungnhan_img_ext, ['jpg', 'jpeg', 'png']) &&
                        in_array($giaykiemdinh_img_ext, ['jpg', 'jpeg', 'png'])
                    ) {

                        if (
                            $giayphepkinhdoanh_img_size <= 2e+6 &&
                            $giaychungnhan_img_size <= 2e+6 &&
                            $giaykiemdinh_img_size <= 2e+6
                        ) {

                            move_uploaded_file($giayphepkinhdoanh_img_tmp, "uploads/" . $giayphepkinhdoanh_img_name);
                            move_uploaded_file($giaychungnhan_img_tmp, "uploads/" . $giaychungnhan_img_name);
                            move_uploaded_file($giaykiemdinh_img_tmp, "uploads/" . $giaykiemdinh_img_name);

                            // Thực hiện truy vấn INSERT vào cơ sở dữ liệu
                            $thanhvien = json_encode($data['thanhvien']);
                            $query = "INSERT INTO `doanhnghiep` (`nguoidang`,`danhmuc_dn`, `nguoidaidien`, `thanhvien`, `tendoanhnghiep`, `hinhanh`, `maqr`,`sdt`, `email`,`ap`,`diachi`, `masothue`, `giayphepkinhdoanh`, `giaychungnhan`, `giaykiemdinh`, `thongtinchung`) VALUES ('$nguoidang','$danhmuc_dn', '$nguoidaidien','$thanhvien', '$tendoanhnghiep', '$dn_img_name','$qrcode_name', '$sdt', '$email','$ap', '$full_address', '$masothue', '$giayphepkinhdoanh_img_name', '$giaychungnhan_img_name', '$giaykiemdinh_img_name', '$thongtinchung')";

                            if (mysqli_query($this->connection, $query)) {
                                //Lấy id vừa thêm gán vào qrcode
                                $new_insert_id = $this->connection->insert_id;
                                $url = "http://192.169.1.17/nongsan/chitietdn.php?id=" . $new_insert_id;
                                QRcode::png($url, $qrcode, 'L', 4, 4);
                                $msg = "Thêm thành công";
                                echo '<script>
                                alert("' . $msg . '");
                                window.location.href = "manage_doanhnghiep.php";
                                </script>';
                            } else {
                                $msg = "Lỗi khi thêm vào cơ sở dữ liệu: " . mysqli_error($this->connection);
                                return $msg;
                            }
                        } else {
                            $msg = "Kích thước hình ảnh không được vượt quá 2MB";
                            return $msg;
                        }
                    } else {
                        $msg = "Hình ảnh phải ở định dạng JPG hoặc PNG";
                        return $msg;
                    }
                } else {
                    $msg = "Xin lỗi !! Chiều cao tối đa của ảnh là 2071 px và chiều rộng tối đa là 2071 px, nhưng bạn đang cố gắng với {$width} px và {$height} px";
                    return $msg;
                }
            } else {
                $msg = "Kích thước tệp không được lớn hơn 2MB";
                return $msg;
            }
        } else {
            $msg = "Tệp phải ở định dạng JPG hoặc PNG";
            return $msg;
        }
    }
    function show_nhaxuong()
    {
        $query = "SELECT * FROM `nhaxuong` order by id_nx desc";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            return $result;
        }
    }
    function show_nhatky()
    {
        $query = "SELECT * FROM `nhatky`";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            return $result;
        }
    }
    function delete_nhatky($id_nk)
    {
        $sel_query = "SELECT * FROM `nhatky` WHERE `id_nk`=$id_nk";
        $query = mysqli_query($this->connection, $sel_query);
        $fetch = mysqli_fetch_assoc($query);
        $img_name = $fetch['hinhanh'];

        $del_query = "DELETE FROM `nhatky` WHERE `id_nk`=$id_nk";
        if (mysqli_query($this->connection, $del_query)) {
            unlink('uploads/' . $img_name);
            echo '<script>
            alert("Xóa nhật ký sản phẩm thành công");
            window.location.href = "manage_nhatky.php";
            </script>';
        }
    }
    function show_nhatky_by_id($id_nk)
    {
        $query = "SELECT * FROM `nhatky` WHERE `id_nk`=$id_nk";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            return $result;
        }
    }


    function update_nhatky($data)
    {
        $id_nk = $data['id_nk'];
        $sanpham = $data['sanpham'];
        $tennhatky = $data['tennhatky'];
        $chitiet = $data['chitiet'];
        $vungsanxuat = $data['vungsanxuat'];
        $doanhnghiep = $data['doanhnghiep'];
        $thanhvien = json_encode($data['thanhvien']); // Mã hóa thành viên thành chuỗi JSON

        // Kiểm tra xem có tập tin hình ảnh nào được tải lên không
        if (!empty($_FILES['nk_img']['tmp_name'])) {
            $nk_img_name = $_FILES['nk_img']['name'];
            $nk_img_size = $_FILES['nk_img']['size'];
            $nk_img_tmp = $_FILES['nk_img']['tmp_name'];
            $img_ext = pathinfo($nk_img_name, PATHINFO_EXTENSION);
            list($width, $height) = getimagesize($nk_img_tmp);

            if ($img_ext == "jpg" || $img_ext == 'jpeg' || $img_ext == "png") {
                if ($nk_img_size <= 2e+6 && $width < 2701 && $height < 2701) {
                    // Xóa ảnh cũ
                    $select_query = "SELECT * FROM `nhatky` WHERE `id_nk`='$id_nk'";
                    $result = mysqli_query($this->connection, $select_query);
                    $row = mysqli_fetch_assoc($result);
                    $pre_img = $row['hinhanh'];
                    unlink("uploads/" . $pre_img);

                    // Cập nhật dữ liệu nhật ký và ảnh mới
                    $query = "UPDATE `nhatky` SET `sanpham` = '$sanpham', `vungsanxuat` = '$vungsanxuat', `doanhnghiep` = '$doanhnghiep', `tennhatky` = '$tennhatky', `chitiet` = '$chitiet', `hinhanh` = '$nk_img_name', `thanhvien` = '$thanhvien' WHERE `id_nk` ='$id_nk';";
                    if (mysqli_query($this->connection, $query) && move_uploaded_file($nk_img_tmp, "uploads/" . $nk_img_name)) {
                        return "Update successful!";
                    } else {
                        return "Update failed!";
                    }
                } else {
                    return "Sorry !! Pdt image max height: 2701 px and width: 2701 px, but you are trying {$width} px and {$height} px";
                }
            } else {
                return "File should be jpg or png format";
            }
        } else {
            // Nếu không có tập tin hình ảnh mới được tải lên, giữ nguyên ảnh cũ và chỉ cập nhật thông tin khác của bài viết
            $query = "UPDATE `nhatky` SET `sanpham` = '$sanpham', `vungsanxuat` = '$vungsanxuat', `doanhnghiep` = '$doanhnghiep', `tennhatky` = '$tennhatky', `chitiet` = '$chitiet', `thanhvien` = '$thanhvien' WHERE `id_nk` ='$id_nk';";
            if (mysqli_query($this->connection, $query)) {
                return "Update successful!";
            } else {
                return "Update failed!";
            }
        }
    }

    function add_nhatky($data)
    {
        $nguoidang = $data['nguoidang'];
        $sanpham = $data['sanpham'];
        $vungsanxuat = $data['vungsanxuat'];
        $doanhnghiep = $data['doanhnghiep'];
        $tennhatky = $data['tennhatky'];
        $chitiet = $data['chitiet'];

        $nk_img_name = $_FILES['nk_img']['name'];
        $nk_img_size = $_FILES['nk_img']['size'];
        $nk_img_tmp = $_FILES['nk_img']['tmp_name'];
        $img_ext = pathinfo($nk_img_name, PATHINFO_EXTENSION);

        list($width, $height) = getimagesize("$nk_img_tmp");

        if ($img_ext == "jpg" ||  $img_ext == 'jpeg' || $img_ext == "png") {
            if ($nk_img_size <= 2e+6) {
                if ($width < 2071 && $height < 2071) {
                    // Chuyển đổi danh sách các thành viên liên quan thành chuỗi JSON
                    $thanhvien = json_encode($data['thanhvien']);

                    $query = "INSERT INTO `nhatky` (`sanpham`, `vungsanxuat`, `doanhnghiep`, `nguoidang`, `tennhatky`, `chitiet`, `hinhanh`, `thanhvien`) VALUES ('$sanpham', '$vungsanxuat', '$doanhnghiep', '$nguoidang', '$tennhatky', '$chitiet', '$nk_img_name', '$thanhvien');";

                    if (mysqli_query($this->connection, $query)) {
                        move_uploaded_file($nk_img_tmp, "uploads/" . $nk_img_name);
                        echo '<script>
                                alert("Thêm thành công");
                                window.location.href = "manage_nhatky.php";
                              </script>';
                    } else {
                        $msg = "Failed to upload product: " . mysqli_error($this->connection);
                        return $msg;
                    }
                } else {
                    $msg = "Sorry !! Pdt image max height: 2071 px and width: 2071 px, but you are trying {$width} px and {$height} px";
                    return $msg;
                }
            } else {
                $msg = "File size should not be larger than 2MB";
                return $msg;
            }
        } else {
            $msg = "File should be jpg or png format";
            return $msg;
        }
    }


    function display_product_pagination($bat_dau, $ket_thuc, $nguoidang, $role)
    {
        $query = "SELECT * FROM `sanpham` order by id_sp desc LIMIT $bat_dau, $ket_thuc";
        $result = mysqli_query($this->connection, $query);
        if ($result) {
            //Nếu role là Admin thì sẽ hiển thị tất cả nông sản
            if ($role == "Admin") {
                return $result;
            } else {
                //Ngược lại, nếu không phải là admin thì hiển thị nông sản theo role
                $query = "SELECT * FROM `sanpham` where taikhoan = '$nguoidang' order by id_sp desc LIMIT $bat_dau, $ket_thuc";
                $result = mysqli_query($this->connection, $query);
                return $result;
            }
        } else {
            echo "Error: " . mysqli_error($this->connection);
            return false;
        }
    }
    function count_sp($nguoidang, $role)
    {
        $query = "SELECT COUNT(*) AS demsp FROM `sanpham`";

        $result = mysqli_query($this->connection, $query);

        if ($result) {
            if ($role == "Admin") {
                //Đếm trang theo role Admin
                $row = mysqli_fetch_assoc($result);
                $demsp = $row['demsp'];
                return $demsp;
            } else {
                //Đếm trang theo các role khác
                $query = "SELECT COUNT(*) AS demsp FROM `sanpham` where taikhoan = $nguoidang";
                $result = mysqli_query($this->connection, $query);
                $row = mysqli_fetch_assoc($result);
                $demsp = $row['demsp'];
                return $demsp;
            }
        } else {
            return "Error: " . mysqli_error($this->connection);
        }
    }
    function count_dn_manage($nguoidang, $role)
    {
        $query = "SELECT COUNT(*) AS demdn FROM `doanhnghiep`";

        $result = mysqli_query($this->connection, $query);

        if ($result) {
            if ($role == "Admin") {
                //Đếm trang theo role Admin
                $row = mysqli_fetch_assoc($result);
                $demdn = $row['demdn'];
                return $demdn;
            } else {
                //Đếm trang theo các role khác
                $query = "SELECT COUNT(*) AS demdn FROM `doanhnghiep` where nguoidang = $nguoidang";
                $result = mysqli_query($this->connection, $query);
                $row = mysqli_fetch_assoc($result);
                $demdn = $row['demdn'];
                return $demdn;
            }
        } else {
            return "Error: " . mysqli_error($this->connection);
        }
    }
    function display_user_pagination($bat_dau, $ket_thuc)
    {
        $query = "SELECT * FROM `taikhoan` LIMIT $bat_dau, $ket_thuc";
        $result = mysqli_query($this->connection, $query);
        if ($result) {
            return $result;
        } else {
            echo "Error: " . mysqli_error($this->connection);
            return false;
        }
    }
    function count_user()
    {
        $query = "SELECT COUNT(*) AS demacc FROM `taikhoan`";

        $result = mysqli_query($this->connection, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $demacc = $row['demacc'];
            return $demacc;
        } else {
            return "Error: " . mysqli_error($this->connection);
        }
    }
    function display_dm_pagination($bat_dau, $ket_thuc)
    {
        $query = "SELECT * FROM `danhmuc` LIMIT $bat_dau, $ket_thuc";
        $result = mysqli_query($this->connection, $query);
        if ($result) {
            return $result;
        } else {
            echo "Error: " . mysqli_error($this->connection);
            return false;
        }
    }
    function count_dm()
    {
        $query = "SELECT COUNT(*) AS demdm FROM `danhmuc`";

        $result = mysqli_query($this->connection, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $demdm = $row['demdm'];
            return $demdm;
        } else {
            return "Error: " . mysqli_error($this->connection);
        }
    }
    function display_dmdn_pagination($bat_dau, $ket_thuc)
    {
        $query = "SELECT * FROM `danhmuc_dn` LIMIT $bat_dau, $ket_thuc";
        $result = mysqli_query($this->connection, $query);
        if ($result) {
            return $result;
        } else {
            echo "Error: " . mysqli_error($this->connection);
            return false;
        }
    }
    function count_dmdn()
    {
        $query = "SELECT COUNT(*) AS demdmdn FROM `danhmuc_dn`";

        $result = mysqli_query($this->connection, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $demdmdn = $row['demdmdn'];
            return $demdmdn;
        } else {
            return "Error: " . mysqli_error($this->connection);
        }
    }
    function display_bv_pagination($bat_dau, $ket_thuc, $nguoidang, $role)
    {
        $query = "SELECT * FROM `baiviet` order by id_bv desc LIMIT $bat_dau, $ket_thuc";
        $result = mysqli_query($this->connection, $query);
        if ($result) {
            if ($role == "Admin") {
                return $result;
            } else {
                $query = "SELECT * FROM `baiviet` where nguoidang = '$nguoidang' order by id_bv desc LIMIT $bat_dau, $ket_thuc";
                $result = mysqli_query($this->connection, $query);
                return $result;
            }
        } else {
            echo "Error: " . mysqli_error($this->connection);
            return false;
        }
    }

    function display_dn_pagination($bat_dau, $ket_thuc, $nguoidang, $role)
    {
        $query = "SELECT * FROM `doanhnghiep` order by id_dn desc LIMIT $bat_dau, $ket_thuc";
        $result = mysqli_query($this->connection, $query);
        if ($result) {
            //Nếu role là Admin thì sẽ hiển thị tất cả nông sản
            if ($role == "Admin") {
                return $result;
            } else {
                //Ngược lại, nếu không phải là admin thì hiển thị nông sản theo role
                $query = "SELECT * FROM `doanhnghiep` where nguoidang = '$nguoidang' order by id_dn desc LIMIT $bat_dau, $ket_thuc";
                $result = mysqli_query($this->connection, $query);
                return $result;
            }
        } else {
            echo "Error: " . mysqli_error($this->connection);
            return false;
        }
    }
    function display_cg_pagination($bat_dau, $ket_thuc, $nguoidang, $role)
    {
        $query = "SELECT * FROM `caygiong` order by id_cg desc LIMIT $bat_dau, $ket_thuc";
        $result = mysqli_query($this->connection, $query);
        if ($result) {
            //Nếu role là Admin thì sẽ hiển thị tất cả nông sản
            if ($role == "Admin") {
                return $result;
            } else {
                //Ngược lại, nếu không phải là admin thì hiển thị nông sản theo role
                $query = "SELECT * FROM `caygiong` where nguoidang = '$nguoidang' order by id_cg desc LIMIT $bat_dau, $ket_thuc";
                $result = mysqli_query($this->connection, $query);
                return $result;
            }
        } else {
            echo "Error: " . mysqli_error($this->connection);
            return false;
        }
    }
    function count_cg_manage($nguoidang, $role)
    {
        $query = "SELECT COUNT(*) AS demcg FROM `caygiong`";

        $result = mysqli_query($this->connection, $query);

        if ($result) {
            if ($role == "Admin") {
                //Đếm trang theo role Admin
                $row = mysqli_fetch_assoc($result);
                $demcg = $row['demcg'];
                return $demcg;
            } else {
                //Đếm trang theo các role khác
                $query = "SELECT COUNT(*) AS demcg FROM `caygiong` where nguoidang = $nguoidang";
                $result = mysqli_query($this->connection, $query);
                $row = mysqli_fetch_assoc($result);
                $demcg = $row['demcg'];
                return $demcg;
            }
        } else {
            return "Error: " . mysqli_error($this->connection);
        }
    }
    function display_nksp_pagination($bat_dau, $ket_thuc, $nguoidang, $role)
    {
        $query = "SELECT * FROM `nhatky` order by id_nk desc LIMIT $bat_dau, $ket_thuc";
        $result = mysqli_query($this->connection, $query);
        if ($result) {
            //Nếu role là Admin thì sẽ hiển thị tất cả nông sản
            if ($role == "Admin") {
                return $result;
            } else {
                //Ngược lại, nếu không phải là admin thì hiển thị nông sản theo role
                $query = "SELECT * FROM `nhatky` where nguoidang = '$nguoidang' order by id_nk desc LIMIT $bat_dau, $ket_thuc";
                $result = mysqli_query($this->connection, $query);
                return $result;
            }
        } else {
            echo "Error: " . mysqli_error($this->connection);
            return false;
        }
    }
    function count_nksp_manage($nguoidang, $role)
    {
        $query = "SELECT COUNT(*) AS demnksp FROM `nhatky`";

        $result = mysqli_query($this->connection, $query);

        if ($result) {
            if ($role == "Admin") {
                //Đếm trang theo role Admin
                $row = mysqli_fetch_assoc($result);
                $demnksp = $row['demnksp'];
                return $demnksp;
            } else {
                //Đếm trang theo các role khác
                $query = "SELECT COUNT(*) AS demnksp FROM `nhatky` where nguoidang = $nguoidang";
                $result = mysqli_query($this->connection, $query);
                $row = mysqli_fetch_assoc($result);
                $demnksp = $row['demnksp'];
                return $demnksp;
            }
        } else {
            return "Error: " . mysqli_error($this->connection);
        }
    }
    function display_vsx_pagination($bat_dau, $ket_thuc, $nguoidang, $role)
    {
        $query = "SELECT * FROM `vungsanxuat` order by id_vung desc LIMIT $bat_dau, $ket_thuc";
        $result = mysqli_query($this->connection, $query);
        if ($result) {
            //Nếu role là Admin thì sẽ hiển thị tất cả nông sản
            if ($role == "Admin") {
                return $result;
            } else {
                //Ngược lại, nếu không phải là admin thì hiển thị nông sản theo role
                $query = "SELECT * FROM `vungsanxuat` where nguoidang = '$nguoidang' order by id_vung desc LIMIT $bat_dau, $ket_thuc";
                $result = mysqli_query($this->connection, $query);
                return $result;
            }
        } else {
            echo "Error: " . mysqli_error($this->connection);
            return false;
        }
    }
    function count_vsx_manage($nguoidang, $role)
    {
        $query = "SELECT COUNT(*) AS demvsx FROM `vungsanxuat`";

        $result = mysqli_query($this->connection, $query);

        if ($result) {
            if ($role == "Admin") {
                //Đếm trang theo role Admin
                $row = mysqli_fetch_assoc($result);
                $demvsx = $row['demvsx'];
                return $demvsx;
            } else {
                //Đếm trang theo các role khác
                $query = "SELECT COUNT(*) AS demvsx FROM `vungsanxuat` where nguoidang = $nguoidang";
                $result = mysqli_query($this->connection, $query);
                $row = mysqli_fetch_assoc($result);
                $demvsx = $row['demvsx'];
                return $demvsx;
            }
        } else {
            return "Error: " . mysqli_error($this->connection);
        }
    }
    function count_nhatky()
    {
        $query = "SELECT COUNT(*) AS demnk FROM `nhatky`";

        $result = mysqli_query($this->connection, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $demnk = $row['demnk'];
            return $demnk;
        } else {
            return "Error: " . mysqli_error($this->connection);
        }
    }
    function display_catagory_nx()
    {
        $query = "SELECT * FROM `danhmuc_nx`";

        if (mysqli_query($this->connection, $query)) {
            $ctg_info = mysqli_query($this->connection, $query);
            return $ctg_info;
        }
    }
    function delete_catagory_nx($id)
    {
        $query = "DELETE FROM `danhmuc_nx` WHERE  id_dmnx = $id";
        if (mysqli_query($this->connection, $query)) {
            echo '<script>
            alert("Xóa thành công");
            window.location.href = "manage_danhmuc_nx.php";
            </script>';
        }
    }
    function show_dmnx_by_id($id_dmnx)
    {
        $query = "SELECT * FROM `danhmuc_nx` WHERE `id_dmnx`='$id_dmnx'";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            return $result;
        }
    }
    function display_dmnx_pagination($bat_dau, $ket_thuc)
    {
        $query = "SELECT * FROM `danhmuc_nx` LIMIT $bat_dau, $ket_thuc";
        $result = mysqli_query($this->connection, $query);
        if ($result) {
            return $result;
        } else {
            echo "Error: " . mysqli_error($this->connection);
            return false;
        }
    }
    function count_dmnx()
    {
        $query = "SELECT COUNT(*) AS demdmnx FROM `danhmuc_nx`";

        $result = mysqli_query($this->connection, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $demdmnx = $row['demdmnx'];
            return $demdmnx;
        } else {
            return "Error: " . mysqli_error($this->connection);
        }
    }
    function add_catagory_nx($data)
    {
        $nhaxuong = $data['nhaxuong'];
        $query = "INSERT INTO `danhmuc_nx`( `loainhaxuong`) VALUES ('$nhaxuong')";

        if (mysqli_query($this->connection, $query)) {
            echo '<script>
            alert("Thêm danh mục thành công");
            window.location.href = "manage_danhmuc_nx.php";
            </script>';
        } else {
            return "Thêm danh mục thất bại!";
        }
    }
    function updata_catagory_nx($data)
    {
        $id_nx = $data['id_nx'];
        $nhaxuong = $data['nhaxuong'];
        $query = "UPDATE `danhmuc_nx` SET `loainhaxuong` = '$nhaxuong' WHERE `id_dmnx` = '$id_nx';";
        if (mysqli_query($this->connection, $query)) {
            echo '<script>
            alert(" Chỉnh sửa thành công");
            window.location.href = "manage_danhmuc_nx.php";
            </script>';
        }
    }
    function display_nx_pagination($bat_dau, $ket_thuc, $nguoidang, $role)
    {
        $query = "SELECT * FROM `nhaxuong` order by id_nx desc LIMIT $bat_dau, $ket_thuc";
        $result = mysqli_query($this->connection, $query);
        if ($result) {
            //Nếu role là Admin thì sẽ hiển thị tất cả nông sản
            if ($role == "Admin") {
                return $result;
            } else {
                //Ngược lại, nếu không phải là admin thì hiển thị nông sản theo role
                $query = "SELECT * FROM `nhaxuong` where nguoidang = '$nguoidang' order by id_nx desc LIMIT $bat_dau, $ket_thuc";
                $result = mysqli_query($this->connection, $query);
                return $result;
            }
        } else {
            echo "Error: " . mysqli_error($this->connection);
            return false;
        }
    }
    function count_nx_manage($nguoidang, $role)
    {
        $query = "SELECT COUNT(*) AS demnx FROM `nhaxuong`";

        $result = mysqli_query($this->connection, $query);

        if ($result) {
            if ($role == "Admin") {
                //Đếm trang theo role Admin
                $row = mysqli_fetch_assoc($result);
                $demnx = $row['demnx'];
                return $demnx;
            } else {
                //Đếm trang theo các role khác
                $query = "SELECT COUNT(*) AS demnx FROM `nhaxuong` where nguoidang = $nguoidang";
                $result = mysqli_query($this->connection, $query);
                $row = mysqli_fetch_assoc($result);
                $demnx = $row['demnx'];
                return $demnx;
            }
        } else {
            return "Error: " . mysqli_error($this->connection);
        }
    }
    function count_nx()
    {
        $query = "SELECT COUNT(*) AS demnx FROM `nhaxuong`";

        $result = mysqli_query($this->connection, $query);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $demnx = $row['demnx'];
            return $demnx;
        } else {
            return "Error: " . mysqli_error($this->connection);
        }
    }
    function delete_nx($id_nx)
    {
        $sel_query = "SELECT * FROM `nhaxuong` WHERE  id_nx = $id_nx";
        $query = mysqli_query($this->connection, $sel_query);
        $fetch = mysqli_fetch_assoc($query);
        $img_name = $fetch['hinhanh'];
        $maqr = $fetch['maqr'];
        $giayphepkinhdoanh = $fetch['giayphepkinhdoanh'];
        $giaychungnhan = $fetch['giaychungnhan'];
        $giaykiemdinh = $fetch['giaykiemdinh'];

        $del_query = "DELETE FROM `nhaxuong` WHERE  id_nx = $id_nx";
        if (mysqli_query($this->connection, $del_query)) {
            unlink('uploads/' . $giayphepkinhdoanh);
            unlink('uploads/' . $giaychungnhan);
            unlink('uploads/' . $giaykiemdinh);
            unlink('uploads/' . $img_name);
            unlink('uploads/qrcode_nhaxuong/' . $maqr);
            echo '<script>
            alert("Xóa thành công");
            window.location.href = "manage_nhaxuong.php";
            </script>';
        }
    }
    function add_nx($data)
    {
        $danhmuc_nx = $data['danhmuc_nx'];
        $nguoidaidien = $data['nguoidaidien'];
        $doanhnghiep = $data['doanhnghiep'];
        $vsx = $data['vsx'];
        $tennhaxuong = $data['tennhaxuong'];
        $manhaxuong = $data['manhaxuong'];
        $sdt = $data['sdt'];
        $email = $data['email'];
        $province = $data['province'];
        $district = $data['district'];
        ucwords($district);
        $wards = $data['wards'];
        ucwords($wards);
        $ap = $data['diachi'];
        $full_address = $wards . ', ' . $district . ', ' . $province;
        $dientichtongthe = $data['dientichtongthe'];
        $thongtin = $data['thongtin'];
        $nguoidang = $data['nguoidang'];


        $nx_img_name = $_FILES['hinhanh']['name'];
        $nx_img_size = $_FILES['hinhanh']['size'];
        $nx_img_tmp = $_FILES['hinhanh']['tmp_name'];
        $img_ext = pathinfo($nx_img_name, PATHINFO_EXTENSION);

        list($width, $height) = getimagesize($nx_img_tmp);

        //Tạo đường dẫn và tên qr code
        $path = 'uploads/qrcode_nhaxuong/';
        $qrcode_name = 'NSQN-' . time() . ".png";
        $qrcode = $path . $qrcode_name;

        if (in_array($img_ext, ['jpg', 'jpeg', 'png'])) {
            if ($nx_img_size <= 2e+6) {
                if ($width < 2071 && $height < 2071) {
                    move_uploaded_file($nx_img_tmp, "uploads/" . $nx_img_name);

                    // Xử lý hình ảnh giấy phép kinh doanh
                    $giayphepkinhdoanh_img_name = $_FILES['giayphepkinhdoanh']['name'];
                    $giayphepkinhdoanh_img_size = $_FILES['giayphepkinhdoanh']['size'];
                    $giayphepkinhdoanh_img_tmp = $_FILES['giayphepkinhdoanh']['tmp_name'];
                    $giayphepkinhdoanh_img_ext = pathinfo($giayphepkinhdoanh_img_name, PATHINFO_EXTENSION);

                    // Xử lý hình ảnh giấy chứng nhận
                    $giaychungnhan_img_name = $_FILES['giaychungnhan']['name'];
                    $giaychungnhan_img_size = $_FILES['giaychungnhan']['size'];
                    $giaychungnhan_img_tmp = $_FILES['giaychungnhan']['tmp_name'];
                    $giaychungnhan_img_ext = pathinfo($giaychungnhan_img_name, PATHINFO_EXTENSION);

                    // Xử lý hình ảnh giấy kiểm định
                    $giaykiemdinh_img_name = $_FILES['giaykiemdinh']['name'];
                    $giaykiemdinh_img_size = $_FILES['giaykiemdinh']['size'];
                    $giaykiemdinh_img_tmp = $_FILES['giaykiemdinh']['tmp_name'];
                    $giaykiemdinh_img_ext = pathinfo($giaykiemdinh_img_name, PATHINFO_EXTENSION);

                    // Kiểm tra và di chuyển hình ảnh giấy phép kinh doanh, giấy chứng nhận, giấy kiểm định
                    if (
                        in_array($giayphepkinhdoanh_img_ext, ['jpg', 'jpeg', 'png']) &&
                        in_array($giaychungnhan_img_ext, ['jpg', 'jpeg', 'png']) &&
                        in_array($giaykiemdinh_img_ext, ['jpg', 'jpeg', 'png'])
                    ) {

                        if (
                            $giayphepkinhdoanh_img_size <= 2e+6 &&
                            $giaychungnhan_img_size <= 2e+6 &&
                            $giaykiemdinh_img_size <= 2e+6
                        ) {

                            move_uploaded_file($giayphepkinhdoanh_img_tmp, "uploads/" . $giayphepkinhdoanh_img_name);
                            move_uploaded_file($giaychungnhan_img_tmp, "uploads/" . $giaychungnhan_img_name);
                            move_uploaded_file($giaykiemdinh_img_tmp, "uploads/" . $giaykiemdinh_img_name);
                            $thanhvien = json_encode($data['thanhvien']);
                            // Thực hiện truy vấn INSERT vào cơ sở dữ liệu
                            $query = "INSERT INTO `nhaxuong` (  `nguoidang`,`danhmuc_nx`, `nguoidaidien`, `doanhnghiep`, `vungsanxuat`, `thanhvien`, `tennhaxuong`, `manhaxuong`, `hinhanh`,`maqr`, `dienthoai`, `email`,`ap`, `diachi`, `dientichtongthe`, `giayphepkinhdoanh`, `giaychungnhan`, `giaykiemdinh`, `thongtin`) VALUES ('$nguoidang','$danhmuc_nx', '$nguoidaidien', '$doanhnghiep', '$vsx','$thanhvien', '$tennhaxuong', '$manhaxuong', '$nx_img_name','$qrcode_name', '$sdt', '$email','$ap', '$full_address', '$dientichtongthe', '$giayphepkinhdoanh_img_name', '$giaychungnhan_img_name', '$giaykiemdinh_img_name', '$thongtin');";

                            if (mysqli_query($this->connection, $query)) {
                                //Lấy id vừa thêm gán vào qrcode
                                $new_insert_id = $this->connection->insert_id;
                                $url = "http://192.169.1.17/nongsan/chitietnx.php?id=" . $new_insert_id;
                                QRcode::png($url, $qrcode, 'L', 4, 4);

                                $msg = "Thêm thành công";
                                echo '<script>
                                alert("' . $msg . '");
                                window.location.href = "manage_nhaxuong.php";
                                </script>';
                            } else {
                                $msg = "Lỗi khi thêm vào cơ sở dữ liệu: " . mysqli_error($this->connection);
                                return $msg;
                            }
                        } else {
                            $msg = "Kích thước hình ảnh không được vượt quá 2MB";
                            return $msg;
                        }
                    } else {
                        $msg = "Hình ảnh phải ở định dạng JPG hoặc PNG";
                        return $msg;
                    }
                } else {
                    $msg = "Xin lỗi !! Chiều cao tối đa của ảnh là 2071 px và chiều rộng tối đa là 2071 px, nhưng bạn đang cố gắng với {$width} px và {$height} px";
                    return $msg;
                }
            } else {
                $msg = "Kích thước tệp không được lớn hơn 2MB";
                return $msg;
            }
        } else {
            $msg = "Tệp phải ở định dạng JPG hoặc PNG";
            return $msg;
        }
    }
    function update_nx($data)
    {
        $id_nx = $data['id_nx'];
        $danhmuc_nx = $data['danhmuc_nx'];
        $nguoidaidien = $data['nguoidaidien'];
        $doanhnghiep = $data['doanhnghiep'];
        $vsx = $data['vsx'];
        $tennhaxuong = $data['tennhaxuong'];
        $manhaxuong = $data['manhaxuong'];
        $sdt = $data['sdt'];
        $email = $data['email'];
        $province = $data['province'];
        ucwords($province);
        $district = $data['district'];
        ucwords($district);
        $wards = $data['wards'];
        ucwords($wards);
        $ap = $data['diachi'];
        $dientichtongthe = $data['dientichtongthe'];
        $thongtin = $data['thongtin'];
        $thanhvien = json_encode($data['thanhvien']);

        $full_address = $wards . ', ' . $district . ', ' . $province;
        if (isset($_FILES['hinhanh']) && $_FILES['hinhanh']['error'] === UPLOAD_ERR_OK) {
            $nx_img_name = $_FILES['hinhanh']['name'];
            $nx_img_size = $_FILES['hinhanh']['size'];
            $nx_img_tmp = $_FILES['hinhanh']['tmp_name'];
            $img_ext = pathinfo($nx_img_name, PATHINFO_EXTENSION);

            list($width, $height) = getimagesize($nx_img_tmp);

            if ($img_ext == "jpg" ||  $img_ext == 'jpeg' || $img_ext == "png") {
                if ($nx_img_size <= 2e+6 && $width < 2701 && $height < 2701) {
                    // Di chuyển và cập nhật tập tin hình ảnh mới
                    $target_file = "uploads/" . $nx_img_name;
                    if (move_uploaded_file($nx_img_tmp, $target_file)) {
                        $nx_img = $nx_img_name;
                    } else {
                        echo "Upload failed!";
                        return;
                    }
                } else {
                    echo "Sorry !! Pdt image max height: 2701 px and width: 2701 px, but you are trying {$width} px and {$height} px";
                    return;
                }
            } else {
                echo "File should be jpg or png format";
                return;
            }
        }

        // Kiểm tra xem người dùng đã tải lên tập tin hình ảnh giấy phép kinh doanh mới không
        if (isset($_FILES['giayphepkinhdoanh']) && $_FILES['giayphepkinhdoanh']['error'] === UPLOAD_ERR_OK) {
            $giayphepkinhdoanh_img_name = $_FILES['giayphepkinhdoanh']['name'];
            $giayphepkinhdoanh_img_size = $_FILES['giayphepkinhdoanh']['size'];
            $giayphepkinhdoanh_img_tmp = $_FILES['giayphepkinhdoanh']['tmp_name'];
            $giayphepkinhdoanh_img_ext = pathinfo($giayphepkinhdoanh_img_name, PATHINFO_EXTENSION);

            // Xử lý tập tin hình ảnh giấy phép kinh doanh mới
            $target_dir = "uploads/";
            $giayphepkinhdoanh_img_new_name = uniqid() . '_' . $giayphepkinhdoanh_img_name;
            move_uploaded_file($giayphepkinhdoanh_img_tmp, $target_dir . $giayphepkinhdoanh_img_new_name);
        }

        // Kiểm tra xem người dùng đã tải lên tập tin hình ảnh giấy chứng nhận mới không
        if (isset($_FILES['giaychungnhan']) && $_FILES['giaychungnhan']['error'] === UPLOAD_ERR_OK) {
            $giaychungnhan_img_name = $_FILES['giaychungnhan']['name'];
            $giaychungnhan_img_size = $_FILES['giaychungnhan']['size'];
            $giaychungnhan_img_tmp = $_FILES['giaychungnhan']['tmp_name'];
            $giaychungnhan_img_ext = pathinfo($giaychungnhan_img_name, PATHINFO_EXTENSION);

            // Xử lý tập tin hình ảnh giấy chứng nhận mới
            $target_dir = "uploads/";
            $giaychungnhan_img_new_name = uniqid() . '_' . $giaychungnhan_img_name;
            move_uploaded_file($giaychungnhan_img_tmp, $target_dir . $giaychungnhan_img_new_name);
        }

        // Kiểm tra xem người dùng đã tải lên tập tin hình ảnh giấy kiểm định mới không
        if (isset($_FILES['giaykiemdinh']) && $_FILES['giaykiemdinh']['error'] === UPLOAD_ERR_OK) {
            $giaykiemdinh_img_name = $_FILES['giaykiemdinh']['name'];
            $giaykiemdinh_img_size = $_FILES['giaykiemdinh']['size'];
            $giaykiemdinh_img_tmp = $_FILES['giaykiemdinh']['tmp_name'];
            $giaykiemdinh_img_ext = pathinfo($giaykiemdinh_img_name, PATHINFO_EXTENSION);

            // Xử lý tập tin hình ảnh giấy kiểm định mới
            $target_dir = "uploads/";
            $giaykiemdinh_img_new_name = uniqid() . '_' . $giaykiemdinh_img_name;
            move_uploaded_file($giaykiemdinh_img_tmp, $target_dir . $giaykiemdinh_img_new_name);
        }

        // Thực hiện truy vấn UPDATE vào cơ sở dữ liệu
        $query = "UPDATE `nhaxuong` SET `danhmuc_nx` = '$danhmuc_nx', `nguoidaidien` = '$nguoidaidien', `doanhnghiep` = '$doanhnghiep', `vungsanxuat` = '$vsx',`thanhvien` = '$thanhvien', `tennhaxuong` = '$tennhaxuong', `manhaxuong` = '$manhaxuong',";

        if (isset($nx_img)) {
            $query .= " `hinhanh` = '$nx_img',";
        }

        if (isset($giayphepkinhdoanh_img_new_name)) {
            $query .= " `giayphepkinhdoanh` = '$giayphepkinhdoanh_img_new_name',";
        }

        if (isset($giaychungnhan_img_new_name)) {
            $query .= " `giaychungnhan` = '$giaychungnhan_img_new_name',";
        }

        if (isset($giaykiemdinh_img_new_name)) {
            $query .= " `giaykiemdinh` = '$giaykiemdinh_img_new_name',";
        }

        $query .= "`dienthoai` = '$sdt', `email` = '$email',`ap`='$ap', `diachi` = '$full_address', `dientichtongthe` = '$dientichtongthe', `thongtin` = '$thongtin' WHERE `id_nx` = $id_nx;";

        if (mysqli_query($this->connection, $query)) {
            echo '<script>
            alert("Chỉnh sửa thành công");
            window.location.href = "manage_nhaxuong.php";
        </script>';
        } else {
            echo "Update failed!";
        }
    }
    function show_nx_by_id($id_nx)
    {
        $query = "SELECT * FROM `nhaxuong` WHERE `id_nx`='$id_nx'";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            return mysqli_fetch_assoc($result);
        }
    }

    function shownx()
    {
        $query = "SELECT * FROM `nhaxuong` ";
        if (mysqli_query($this->connection, $query)) {
            $result = mysqli_query($this->connection, $query);
            return $result;
        }
    }
    function error404()
    {
        header('location: 404.php');
    }
}
