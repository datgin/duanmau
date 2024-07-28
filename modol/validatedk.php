<?php
function validateName($name)
{
    $sql =  checkdb_dk_name($name);
    if (empty($name)) {
        return 'Tên không được trống!';
    } else {
        if (strlen($name) < 8) {
            return 'Đồ dài không hợp lệ';
        }
        if ($sql->rowCount() > 0) {
            return 'Tài khoản đã tồn tại.';
        }
    }
    return '';
}

function validateEamil($email)
{
    $sql =  checkdb_dk_email($email);
    if (empty($email)) {
        return 'Eamil không được trống!';
    } else {
        if (!preg_match("/^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i", $email)) {
            return 'Email không đúng định dạng.';
        }
        if ($sql->rowCount() > 0) {
            return 'Eamil đã tồn tại.';
        }
    }
    return '';
}
function validatePass($password)
{
    if (empty($password)) {
        return 'Mật khẩu không được trống!';
    } else {
        if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).{8,20}$/", $_POST['password'])) {
            return 'Password không đúng định dạng.';
        }
    }
    return '';
}

function validateAdress($address)
{
    if (empty($address)) {
        return 'Địa chỉ không được trống!';
    }
    return '';
}
function validateSdt($sdt)
{
    if (empty($sdt)) {
        return 'Số điện thoại không được trống!';
    } else {
        if (!preg_match("/^0[0-9]{9}$/", $sdt)) {
            return 'Số điện thoại không đúng định dạng.';
        }
    }
    return '';
}

function validateDate($date)
{
    if (empty($date)) {
        return 'Ngày sinh không được trống!';
    }
    return '';
}

function validateGender($gender)
{
    if (empty($gender)) {
        return 'Giới tính không được trống!';
    }
    return '';
}
function validateEnterPassword($enterpassword, $password)
{
    if (empty($enterpassword)) {
        return 'Nhập mật khẩu không được trống!';
    } else {
        if ($enterpassword != $password) {
            return 'Nhập mật khẩu không trùng khớp.';
        }
    }
    return '';
}


$name = $email = $pass = $address = $sdt = $gender = $enterpassword = $date = '';
$nameErr = $emailErr = $passErr =  $addressErr = $sdtErr = $genderErr = $enterpasswordErr = $dateErr = '';


