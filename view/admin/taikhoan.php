<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css/stylee.css" />
</head>

<body>
    <form class="mb form__search" action="?act=dstaikhoan" method="post">
        <input name="key" type="text" placeholder=" Search...">
        <button name="keyw" value="search" type="submit">Tìm kiếm</button>
    </form>
    <div class="boxtitle">DANH SÁCH TÀI KHOẢN</div>
    <div class="boxcontent">
        <table class="bang__sp">
            <tr>
                <th>STT</th>
                <th>Tài Khoản</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Hành động</th>
            </tr>
            <?php $i = 1;
            foreach ($ds_taikhoan as $taikhoan) {
                extract($taikhoan); ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $user ?></td>
                    <td><?= $email ?></td>
                    <td><?= $address ?></td>
                    <td><form action="?act=dstaikhoan&iduser=<?=$id?>" method="post"><button name="btn_sua_tk" value="Sua" type="submit"><a href="?act=edit_user&iduser=<?=$id?>">Sửa</a></button><button onclick="return confirm('Xóa tài khoản <?=$user?> này?')" name="btn_xoa_tk" value="Xóa" type="submit">Xóa</button></form></td>
                </tr>
            <?php } ?>
            <p style="color:red"> Danh sách có (<?=$i - 1?>) tài khoản</p>
           
        </table>
    </div>
    <form class="form__dssp mt" action="?act=add_user" method="post">
        <button>Chọn tất cả</button>
        <button>Bỏ tất cả</button>
        <button>Nhập thêm</button>
    </form>
</body>

</html>