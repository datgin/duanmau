<div class="boxtitle">Giỏ hàng</div>
<div class="boxcontent">
    <table class="bang__cart">
        <tr>
            <th>STT</th>
            <th>Ảnh đại diện</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Thành tiền</th>
            <th>Hành động</th>
        </tr>
        <?php $sum = 0;
        if (isset($_SESSION['user'])) { ?>
            <?php
            $i = 1;
            $sum = 0;

            foreach ($load_cart as $cart) {
                extract($cart);
                $sum += $price * $quantity;
            ?>

                <tr>
                    <td><?= $i++ ?></td>
                    <td><img width="80" src="image/<?= $img ?>" alt="Ảnh sản phẩm" /></td>
                    <td><?= $name ?></td>
                    <td><?= $quantity ?></td>
                    <td><?= number_format($price) ?> đ</td>
                    <td><?= number_format($price * $quantity) ?> đ</td>
                    <td>
                        <a href="?act=delete_cart&id=<?= $id ?>"> <button onclick="return confirm('Bạn có chắc chắn muốn xóa không');" name="delete_cart" value="Xóa" type="submit">Xoa</button></a>
                    </td>
                </tr>

            <?php }
            ?>
        <?php  } else { ?>
            <tr>
                <td colspan="8">Không có sản phẩm nào</td>
            </tr>
        <?php } ?>
    </table>


    <h1 style="font-size: 1.5vw;" class="mt">Tổng tiền: <?= number_format($sum) ?> VNĐ</h1>
</div>

<a href="?act=thanhtoan"><input style="margin-top: 20px; padding: 10px; border-radius: 5px; " type="submit" name="btn_tt" value="Mua Ngay"></a>


<script>

</script>