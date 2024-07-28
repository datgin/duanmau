<?php
function validateName_dn($name_dn)
{
    $check_name = check_name($name_dn);
    if (empty($name_dn)) {
        return 'Tên không được trống!';
    } else {
        return $check_name;
    }
    return '';
}

function validatePass_dn($password_dn)
{
    if (empty($password_dn)) {
        return 'Mật khẩu không được trống!';
    }
    return '';
}



$name_dn = $password_dn  = '';
$name_dnErr = $password_dnErr = '';
