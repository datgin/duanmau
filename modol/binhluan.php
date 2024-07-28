<?php
function load_binhluan($idsp = 0, $key = '')    
{
    $sql = "SELECT binhluan.id as idbl, binhluan.noidung, binhluan.ngaybinhluan, taikhoan.user, taikhoan.id, sanpham.name, sanpham.id as idsp FROM  `binhluan` 
    JOIN `taikhoan` ON binhluan.iduser = taikhoan.id 
    JOIN `sanpham` ON binhluan.idpro = sanpham.id  
    ";
    if ($idsp > 0) {
        $sql .= "WHERE sanpham.id = $idsp";
    }
    if ($key != '') {
        $sql .= "WHERE binhluan.noidung like '%" . $key . "%' OR taikhoan.user like '%" . $key . "%' OR sanpham.name like '%" . $key . "%' OR binhluan.ngaybinhluan like '%" . $key . "%'";
    }

    $binhluan = getdb($sql);
    return $binhluan;
}

function insert_binhluan($idpro, $iduser, $noidung)
{
    $date = date('Y-m-d');
    $sql = "
        INSERT INTO `binhluan`(`noidung`, `iduser`, `idpro`, `ngaybinhluan`) 
        VALUES ('$noidung','$iduser','$idpro','$date');
    ";
    getdb($sql);
}
function delete_bl($idbl)
{
    $conn = connect();
    $sql = $conn->prepare("DELETE FROM `binhluan` WHERE id = $idbl");
    $sql->execute();
}
