<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css/stylee.css" />
</head>

<body>
    <form class="mb form__search" action="?act=admin_bl" method="post">
        <input name="key" type="text" placeholder=" Search...">
        <button name="keyw" value="search" type="submit">Tìm kiếm</button>
    </form>
    <div class="boxtitle">DANH SÁCH Bình Luận</div>
    <div class="boxcontent">
        <table class="bang__sp">
            <tr>
                <th>STT</th>
                <th>Tài Khoản</th>
                <th>Nội Dung</th>
                <th>Ngày Bình Luận</th>
                <th>Sản Phẩm</th>
                <th>Hành động</th>
            </tr>
            <?php $i = 1;
            foreach ($binh_luan as $binhluan) {
                extract($binhluan); ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $user ?></td>
                    <td><?= $noidung ?></td>
                    <td><?= $ngaybinhluan ?></td>
                    <td><a href="?act=chitietsp&idsp=<?=$idsp?>"><?=$name?></a></td>
                    <td><form action="?act=admin_bl&idbl=<?=$idbl?>" method="post"><button onclick="return confirm('Xóa tài khoản <?=$user?> này?')" name="btn_xoa_bl" value="Xóa" type="submit">Xóa</button></form></td>
                </tr>
            <?php } ?>
            <p style="color:red"> Tất cả có (<?=$i - 1?>) bình luận</p>
           
        </table>
    </div>
    <form class="form__dssp mt" action="" method="post">
        <button>Chọn tất cả</button>
        <button>Bỏ tất cả</button>
        <button>Nhập thêm</button>
    </form>
</body>

</html>