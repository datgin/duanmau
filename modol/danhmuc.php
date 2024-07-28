<?php
function load_dm()
{
    $sql = 'SELECT * FROM `danhmuc` ORDER BY id desc';
    $kq = getdb($sql);
    return $kq;
}

function load_name_dm($iddm)
{
    $sql = 'SELECT * FROM `danhmuc` WHERE id=' . $iddm;
    $dm = getdb($sql);
    return $dm;
}
function insert_loai($loai)
{
    $sql = "INSERT INTO `danhmuc`(`dm_name`) VALUES ('$loai')";
    insertdb($sql);
}
function delete_loai($id)
{
    $sql = "DELETE FROM `danhmuc` WHERE id = $id";
    insertdb($sql);
}
function update_loai_dm($id, $loai)
{
    $sql = "UPDATE `danhmuc` SET `dm_name`='$loai' WHERE id = $id";
    insertdb($sql);
}
