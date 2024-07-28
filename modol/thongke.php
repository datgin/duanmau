<?php
function load_thongke_sanpham_danhmuc() {
    $sql = "SELECT dm.id, dm.dm_name, COUNT(*) as soluong, MIN(price) as gia_min,
        Max(price) as gia_max, AVG(price) as gia_avg
        FROM danhmuc dm 
        JOIN sanpham sp 
        ON dm.id = sp.iddm
        GROUP BY dm.id, dm.dm_name
        ORDER BY soluong DESC";

    return getdb($sql);
}
?>