<?php
session_start();
ob_start();
include_once 'modol/PDO.php';
include_once 'view/header.php';
include_once 'modol/sanpham.php';
include_once 'modol/danhmuc.php';
include_once 'modol/binhluan.php';
include_once 'modol/dangky.php';
include_once 'modol/search.php';
include_once 'modol/validatedn.php';
include_once 'modol/thongke.php';

$kq = loadall_sp();
$dsdm = load_dm();
$top10 = load_sp_top10();
$dssp = loadall_dssp();

if (isset($_GET['act']) && !empty($_GET['act'])) {

    $act =  $_GET['act'];
    switch ($act) {
        case 'chitietsp':
            if (isset($_GET['idsp']) && isset($_GET['idsp']) > 0) {
                $sp = chitietsp($_GET['idsp']);
                $sp_cungloai = loadsp_cungloai($_GET['idsp'], $sp[0]['iddm']);

                if (isset($_POST['guibinhluan'])) {
                    insert_binhluan($_POST['idpro'], $_SESSION['iduser'], $_POST['noidung']);
                }
                if (isset($_POST['delete_bl'])) {
                    $idbl = $_GET['idbl'];
                    delete_bl($idbl);
                }
                $binh_luan = load_binhluan($_GET['idsp']);
                include_once 'view/chitietsp.php';
            }
            break;
        case 'admin_bl':
            if (isset($_GET['idsp']) && isset($_GET['idsp']) > 0) {
                $idsp = $_GET['idsp'];
            } else {
                $idsp = 0;
            }
            $key = '';
            if (isset($_POST['keyw'])) {
                if (isset($_POST['key'])) {
                    $key = $_POST['key'];
                } else {
                    $key = '';
                }
            }
            if (isset($_POST['btn_xoa_bl'])) {
                $idbl = $_GET['idbl'];
                delete_bl($idbl);
            }
            $binh_luan = load_binhluan($idsp, $key);
            include_once 'view/admin/binhluan.php';
            break;
        case 'dangky':
            include_once 'modol/validatedk.php';
            if (isset($_POST['btn'])) {
                $name = $_POST['name'];
                $nameErr = validateName($name);

                $email = $_POST['email'];
                $emailErr = validateEamil($email);

                $password = $_POST['password'];
                $passErr = validatePass($password);

                $address = $_POST['address'];
                $addressErr = validateAdress($address);

                $sdt = $_POST['sdt'];
                $sdtErr = validateSdt($sdt);

                $gender = $_POST['gender'];
                $genderErr = validateGender($gender);

                $enterpassword = $_POST['enter_password'];
                $enterpasswordErr = validateEnterPassword($enterpassword, $password);

                $date = $_POST['date'];
                $dateErr = validateDate($date);

                if (empty($nameErr) && empty($emailErr) && empty($passErr) && empty($addressErr) && empty($sdtErr) && empty($dateErr) && empty($enterpasswordErr) && empty($genderErr)) {
                    insert_dk($name, $password, $email, $address, $sdt, $gender, $date, 2);
                    echo ' <i class="fas fa-check-circle" style="color: #0eff0a;"></i>Đăng ký thành công';
                } else {
                    echo "<i class='fas fa-exclamation-triangle' style='color: #eae31f;'></i> Vui lòng kiểm tra lại thông tin";
                }
            }
            include_once 'view/dangky.php';
            break;
        case 'add_user':
            include_once 'modol/validatedk.php';
            if (isset($_POST['btn'])) {
                $name = $_POST['name'];
                $nameErr = validateName($name);

                $email = $_POST['email'];
                $emailErr = validateEamil($email);

                $password = $_POST['password'];
                $passErr = validatePass($password);

                $address = $_POST['address'];
                $addressErr = validateAdress($address);

                $sdt = $_POST['sdt'];
                $sdtErr = validateSdt($sdt);

                $gender = $_POST['gender'];
                $genderErr = validateGender($gender);

                $enterpassword = $_POST['enter_password'];
                $enterpasswordErr = validateEnterPassword($enterpassword, $password);

                $date = $_POST['date'];
                $dateErr = validateDate($date);
                if (empty($_POST['quyen'])) {
                    $role = 2;
                } else {
                    $role = $_POST['quyen'];
                }
                if (empty($nameErr) && empty($emailErr) && empty($passErr) && empty($addressErr) && empty($sdtErr) && empty($dateErr) && empty($enterpasswordErr) && empty($genderErr)) {
                    insert_dk($name, $password, $email, $address, $sdt, $gender, $date, $role);
                    echo ' <i class="fas fa-check-circle" style="color: #0eff0a;"></i>Đăng ký thành công';
                } else {
                    echo "<i class='fas fa-exclamation-triangle' style='color: #eae31f;'></i> Vui lòng kiểm tra lại thông tin";
                }
            }
            include_once 'view/admin/add_user.php';
            break;
        case 'danhmuc':
            $iddm = $_GET['iddm'];
            $loadsp_theo_id =  load_sp_cungloai_theo_id($iddm);
            include_once 'view/sp_danhmuc.php';
            break;
        case 'dangnhap':
            if (isset($_POST['btn_dn']) && $_POST['btn_dn']) {
                $name_dn = $_POST['name_dn'];
                $name_dnErr = validateName_dn($name_dn);
                $password_dn = $_POST['password_dn'];
                $password_dnErr = validatePass_dn($password_dn);
                if (empty($name_dnErr) && empty($password_dnErr)) {
                    checkdb_dn_name($name_dn, $password_dn);
                    $carts = show_cart($_SESSION['iduser']);
                    $_SESSION['total_cart'] = count($carts);
                }
            }
            if (isset($_POST['btn__dx']) && $_POST['btn__dx']) {
                unset($_SESSION['user']);
                unset($_SESSION['dem_cart']);
                unset($_SESSION['iduser']);
                unset($_SESSION['file']);
                unset($_SESSION['idcart']);
                unset($_SESSION['role']);
                header("Location: index.php?act=dangnhap");
            }
            include_once 'view/home.php';
            break;
        case 'search':
            if (isset($_POST['keyw']) && $_POST['keyw']) {
                if (empty($_POST['key'])) {
                    header("Location: index.php");
                } else {
                    $key = $_POST['key'];
                    $_SESSION['key'] = $key;
                    $search = search_name($key);
                    $_SESSION['dem'] = dem($key);

                    include_once 'view/sanpham.php';
                }
            }
            break;
        case 'add':
            if (isset($_POST['btn__add']) && $_POST['btn__add']) {
                if (empty($_POST['name_sp']) || empty($_POST['price_sp']) || empty($_FILES['img_sp']['name']) || empty($_POST['mota_sp'])) {
                    echo 'Các trường không được để trống!';
                } else {
                    $name_sp = $_POST['name_sp'];
                    $img_sp =  $_FILES['img_sp']['name'];
                    $price_sp = $_POST['price_sp'];
                    $mota_sp = $_POST['mota_sp'];
                    $iddm_sp = $_POST['iddm_sp'];

                    $tmp = $_FILES['img_sp']['tmp_name'];
                    $move = 'image/' . $img_sp;
                    move_uploaded_file($tmp, $move);
                    insert_sp($name_sp, $price_sp, $img_sp, $mota_sp, $iddm_sp);
                    header("Location: index.php?act=danhsach");
                }
            }
            include_once 'view/admin/add.php';
            break;
        case 'danhsach':
            if (isset($_POST['keyw'])) {
                if (isset($_POST['key'])) {
                    $key = $_POST['key'];
                } else {
                    $key = '';
                }
                if (isset($_POST['iddm'])) {
                    $iddm = $_POST['iddm'];
                } else {
                    $iddm = '';
                }

                $dssp = loadall_dssp($key, $iddm);
            }
            $trangthai1 = select_trangthai();
            include_once "view/admin/danhsach.php";
            break;
        case 'khoiphuc':
            $id = $_GET['id'];
            khoiphuc($id);
            $trangthai1 = select_trangthai();
            $dssp = loadall_dssp($key = '', $iddm = 0);
            include_once "view/admin/danhsach.php";
            break;
        case 'edit':
            $id = $_GET['id'];
            $load_sp_edit = load_sp_edit($id);
            if (isset($_POST['btn__edit']) && $_POST['btn__edit']) {
                if (empty($_FILES['img_sp_edit']['name'])) {
                    $hinh = $load_sp_edit[0]['img'];
                } else {
                    $hinh = $_FILES['img_sp_edit']['name'];
                    $tmp = $_FILES['img_sp_edit']['tmp_name'];
                    $move = 'image/' . $hinh;
                    move_uploaded_file($tmp, $move);
                }
                if (!empty($_POST['name_sp_edit']) && !empty($_POST['price_sp_edit']) && !empty($_POST['mota_sp_edit'])) {
                    $name_sp_edit = $_POST['name_sp_edit'];
                    $price_sp_edit = $_POST['price_sp_edit'];
                    $loai_sp_edit = $_POST['loai_sp_edit'];
                    $mota_sp_edit = $_POST['mota_sp_edit'];
                    update_sp($name_sp_edit, $price_sp_edit, $hinh, $mota_sp_edit, $loai_sp_edit, $id);
                    header("Location: index.php?act=danhsach");
                } else {
                    echo 'Các trường không được để trống!';
                }
            }
            include_once 'view/admin/edit.php';
            break;
        case 'delete':
            $id = $_GET['id'];
            delete_sp($id);
            header("Location: index.php?act=danhsach");
            break;
        case 'delete_cart':
            if (isset($_SESSION['user'])) {
                $_SESSION['dem_cart'] = dem_sp_cart($_SESSION['iduser']);
                if (isset($_GET['id'])) {
                    $idsp = $_GET['id'];
                    delete_cart($idsp);
                    $_SESSION['dem_cart'] = dem_sp_cart($_SESSION['iduser']);
                }
                $load_cart = show_cart($_SESSION['iduser']);
            }
            include_once 'view/cart.php';
            break;
        case 'list_Cart':
            if (isset($_SESSION['user'])) {
                $load_cart = show_cart($_SESSION['iduser']);
            }
            include_once 'view/cart.php';
            break;
        case 'add_cart':
            if (isset($_POST['id'])) {
                if (isset($_SESSION['iduser'])) {
                    $found = false;
                    $carts = show_cart($_SESSION['iduser']);

                    foreach ($carts as $value) {
                        if ($_POST['id'] == $value['idsp']) {
                            $found = true;
                            updateCart($_SESSION['iduser'], $_POST['id'], $value['quantity'] + 1);
                            break;
                        }
                    }

                    if (!$found) {
                        insert_cart($_POST['id'], $_SESSION['iduser'], 1);
                    }
                }
                $carts = show_cart($_SESSION['iduser']);
                $_SESSION['total_cart'] = count($carts);
            }

            include_once 'view/home.php';
            break;

        case 'thongke':
            $dsthongke = load_thongke_sanpham_danhmuc();
            include_once 'view/admin/bieudo.php';
            break;
        case 'tt_user':
            if (isset($_SESSION['user'])) {
                $name_dn = $_SESSION['user'];
                $loadtk = loadtk($name_dn);

                if (isset($_POST['btn_dang'])) {
                    if (!empty($_FILES['file']['name'])) {
                        $_SESSION['file'] = $_FILES['file']['name'];
                        $file = $_FILES['file']['name'];
                        $tmp = $_FILES['file']['tmp_name'];
                        $move = 'image/' . $file;
                        move_uploaded_file($tmp, $move);
                    }
                }
                if (isset($_POST['btn_update_user'])) {
                    if (empty($_POST['name']) || empty($_POST['password'])) {
                        echo '<script>alert("Các trường không được để trống")</script>';
                    } else {
                        $id = $_SESSION['iduser'];
                        $name = $_POST['name'];
                        $password = $_POST['password'];
                        $date = $_POST['date'];
                        $gender = $_POST['gender'];
                        $email = $_POST['email'];
                        $address = $_POST['address'];
                        $sdt = $_POST['sdt'];
                        update_user($name, $password, $date, $gender, $email, $address, $sdt, $id, $loadtk[0]['role']);
                        $mess = '<i class="fas fa-check-circle" style="color: #0eff0a;"></i>Cập nhật thành công.';
                    }
                }
                $loadtk = loadtk($name_dn);
                include_once 'view/tt_user.php';
            } else {
                include_once 'view/home.php';
            }

            break;
        case "quenmk":
            if (isset($_POST['guiemail'])) {
                $email = $_POST['email'];
                $sendMailMess = sendMail($email);
            }
            include_once "view/quenmk.php";
            break;
        case 'dstaikhoan':
            $key = '';
            if (isset($_POST['keyw'])) {
                if (isset($_POST['key'])) {
                    $key = $_POST['key'];
                } else {
                    $key = '';
                }
            }
            if (isset($_POST['btn_xoa_tk'])) {
                $id = $_GET['iduser'];
                delete_tk($id);
            }
            $ds_taikhoan = loadtk($key);
            include_once 'view/admin/taikhoan.php';
            break;
        case 'edit_user':
            if (isset($_POST['btn'])) {
                $name = $_POST['name'];

                $email = $_POST['email'];

                $password = $_POST['password'];

                $address = $_POST['address'];

                $sdt = $_POST['sdt'];

                $gender = $_POST['gender'];

                $date = $_POST['date'];

                $role = $_POST['quyen'];
                if (!empty($name) && !empty($email) && !empty($password) && !empty($address) && !empty($sdt) && !empty($date) && !empty($gender)) {
                    update_user($name, $password, $date, $gender, $email, $address, $sdt, $_GET['iduser'], $role);
                    echo ' <i class="fas fa-check-circle" style="color: #0eff0a;"></i>Đăng ký thành công';
                } else {
                    echo "<i class='fas fa-exclamation-triangle' style='color: #eae31f;'></i> Vui lòng kiểm tra lại thông tin";
                }
            }
            $tk = select_user_id($_GET['iduser']);
            include_once 'view/admin/edit_user.php';
            break;
        case 'add_loai':
            if (isset($_POST['btn_add_loai']) && $_POST['btn_add_loai']) {
                $name_loai = $_POST['name_loai'];
                insert_loai($name_loai);
            }
            if (isset($_POST['btn_xoa_loai'])) {
                $id = $_GET['id'];
                delete_loai($id);
            }
            $dsdm = load_dm();
            include_once 'view/admin/add_loai.php';
            break;
        case 'edit_loai':
            $iddm = $_GET['id'];
            $name_dm =  load_name_dm($iddm);
            if (isset($_POST['btn_sua_loai'])) {
                $name_loai = $_POST['name_loai'];
                update_loai_dm($iddm, $name_loai);
                header("Location: index.php?act=add_loai");
            }
            include_once 'view/admin/edit_loai.php';
            break;
        case 'thanhtoan':
            if (isset($_POST['mycheckbox'])) {
                $_SESSION['idcart'] = $_POST['mycheckbox'];
            }
            $buysp =  show_cart($_SESSION['iduser']);

            if (isset($_POST['name']) && isset($_POST['sdt']) && isset($_POST['address'])) {
                if (isset($_POST['btn_tt'])) {
                    $name = $_POST['name'];
                    $sdt = $_POST['sdt'];
                    $address = $_POST['address'];
                    if (isset($_POST['check'])) {
                        if (empty($_POST['name']) || empty($_POST['sdt']) || empty($_POST['address'])) {
                            echo "<script>alert('Các trường không được để trống!')</script>";
                        } else {
                            echo "<script>if(confirm('Xác nhận thông tin:  $name, $sdt, $address')){alert('Đặt hàng thành công.')}else{alert('Bạn đã hủy đơn hàng.')}</script>";
                        }
                    } else {
                        echo "<script>alert('Các trường không được để trống!')</script>";
                    }
                }
            }

            include_once 'view/thanhtoan.php';
            break;
    }
} else {
    include_once 'view/home.php';
}
include_once 'view/footer.php';
ob_end_flush();
