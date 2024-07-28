<form class="form_tt" action="?act=thanhtoan" method="post">
    <div class="left">
        <div class="namee mb">
            <label for="name">Tên </label> <br>
            <input type="text" name="name" id="name">
        </div>
        <div class="sdt mb">
            <label for="sdt">Số điện thoại</label> <br>
            <input type="number" name="sdt" id="sdt">
        </div>
        <div class="address mb">
            <label for="address">Địa chỉ</label> <br>
            <input type="text" name="address" id="address">
        </div>
    </div>
    <div class="right">
        <?php
        foreach ($buysp as $buysp) { ?>
            <div class="rightt">
                <div class="img"><img width="80" src="image/<?= $buysp['img'] ?>" alt=""></div>
                <div class="tt">
                    <span><?= $buysp['name'] ?></span>
                    <span><?= number_format($buysp['price']) ?> đ</span>
                    <small>x<?= $buysp['quantity'] ?></small>
                </div>

            </div>
        <?php }
        ?>

        <p style="margin-bottom: 10px; color:gray">Phương thức thanh toán:</p>
        <input type="radio" name="check" value="1"> Thanh toán bằng thẻ <br>
        <input type="radio" name="check" value="2"> Thanh toán khi nhận hàng
        <button class="btn_tt" name="btn_tt" value="buy">Thanh Toán</button>
    </div>
</form>