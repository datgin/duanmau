<?php
function  search_name($key)
{
    $sql = "SELECT * FROM `sanpham` WHERE name LIKE '%$key%'";
    $search =  getdb($sql);
    return $search;
}
function dem($key)
{
    $conn = connect();
    $sql = $conn->prepare("SELECT * FROM `sanpham` WHERE name LIKE '%$key%'");
    $sql->execute();
    $dem =  $sql->rowCount();
    return $dem;
}
