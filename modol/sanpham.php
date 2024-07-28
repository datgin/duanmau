<?php
function loadall_sp()
{
    $sql = "SELECT * FROM `sanpham` WHERE trangthai = 0 ORDER BY id desc limit 0,9";
    $kq = getdb($sql);
    return $kq;
}
function load_sp_top10()
{
    $sql = "SELECT * FROM `sanpham` WHERE trangthai = 0 ORDER BY luotxem desc limit 0, 10";
    $top10 = getdb($sql);
    return $top10;
}

function chitietsp($idsp)
{
    $sql = "SELECT * FROM `sanpham` WHERE id = $idsp";
    $spchitiet = getdb($sql);
    return $spchitiet;
}
// function buy_sp($idsp)
// {
//     $sql = "SELECT * FROM `giohang` WHERE id = $idsp";
//     $spchitiet = getdb($sql);
//     return $spchitiet;
// }
function loadsp_cungloai($id, $iddm)
{
    $sql = "SELECT * FROM `sanpham` WHERE iddm = $iddm and id <> $id";
    $sp_cungloai = getdb($sql);
    return $sp_cungloai;
}
function loadall_dssp($key = '', $iddm = 0)
{
    $sql = "SELECT sanpham.id,sanpham.img,sanpham.name,sanpham.price,danhmuc.dm_name FROM `sanpham` JOIN `danhmuc` ON sanpham.iddm = danhmuc.id WHERE sanpham.trangthai = 0 ";
    if ($key != '' && $iddm > 0) {
        $sql .= " AND sanpham.name LIKE '%$key%' AND danhmuc.id =$iddm";
    }
    if ($key == '' && $iddm > 0) {
        $sql .= " AND sanpham.iddm = $iddm";
    }
    if ($key != '' && $iddm < 0) {
        $sql .= " AND sanpham.name LIKE '%$key%'";
    }

    $dssp = getdb($sql);
    return $dssp;
}

function delete_sp($id)
{
    $sql = "UPDATE `sanpham` SET `trangthai` = 1 WHERE id = $id";
    getdb($sql);
}
function select_trangthai()
{
    $sql = "SELECT * FROM `sanpham` WHERE trangthai = 1";
    $trangthai = getdb($sql);
    return $trangthai;
}
function khoiphuc($id)
{
    $sql = "UPDATE `sanpham` SET `trangthai` = 0 WHERE id = $id";
    insertdb($sql);
}
function load_sp_edit($id)
{
    $sql = "SELECT sanpham.id,sanpham.img,sanpham.name,sanpham.price,danhmuc.dm_name,sanpham.iddm,sanpham.mota FROM `sanpham` JOIN `danhmuc` ON sanpham.iddm = danhmuc.id WHERE sanpham.id= $id";
    $load_sp_edit = getdb($sql);
    return $load_sp_edit;
}

function insert_sp($name_sp, $price_sp, $img_sp, $mota_sp, $iddm_sp)
{
    $sql = "INSERT INTO `sanpham`(`id`, `name`, `price`, `img`, `mota`, `iddm`) VALUES (null,'$name_sp','$price_sp','$img_sp','$mota_sp','$iddm_sp')";
    insertdb($sql);
}

function update_sp($name_sp_edit, $price_sp_edit, $hinh, $mota_sp_edit, $loai_sp_edit, $id)
{
    $conn = connect();
    $sql = $conn->prepare("UPDATE `sanpham` SET `name`='$name_sp_edit',`price`='$price_sp_edit',`img`='$hinh',`mota`='$mota_sp_edit',`iddm`='$loai_sp_edit' WHERE sanpham.id ='$id'");
    $sql->execute();
}

function load_sp_cungloai_theo_id($iddm)
{
    $sql = "SELECT * FROM `sanpham` WHERE iddm = '$iddm'";
    $loadsp_id = getdb($sql);
    return $loadsp_id;
}
function insert_cart($idsp, $iduser, $quantity)
{
    $conn = connect();
    $sql = $conn->prepare("INSERT INTO `giohang`(`idsp`, `iduser`, `quantity`) VALUES ('$idsp','$iduser','$quantity')");
    $sql->execute();
}
function show_cart($iduser)
{
    $sql = "SELECT sanpham.*, giohang.quantity, giohang.id, giohang.idsp as idgiohang, giohang.iduser, giohang.idsp FROM `giohang` JOIN `sanpham` ON giohang.idsp = sanpham.id WHERE giohang.iduser = '$iduser'";
    $load_cart = getdb($sql);
    return $load_cart;
}
function dem_sp_cart($iduser)
{
    $conn = connect();
    $sql = $conn->prepare("SELECT * FROM `giohang` WHERE iduser='$iduser'");
    $sql->execute();
    $dem = $sql->rowCount();
    return $dem;
}
function delete_cart($idsp)
{
    $conn = connect();
    $sql = $conn->prepare("DELETE FROM `giohang` WHERE id = '$idsp'");
    $sql->execute();
}
function updateCart($iduser, $idsp, $quantity)
{
    $conn = connect();
    $sql = $conn->prepare("UPDATE `giohang` SET `quantity` = '$quantity' WHERE idsp = '$idsp' AND iduser = '$iduser'");
    $sql->execute();
}
