<main class="catalog mb">
    <div class="box_left mr">
        <div class="boxtitle">Quên mật khẩu</div>
        <div class="boxcontent form_account">
            <form class="form__qmk" action="index.php?act=quenmk" method="post">
                <div>
                    <p>Email</p>
                    <input class="emaill" type="email" name="email" placeholder="Mời nhập email">
                </div>
                <div class="mt btn_qmk">
                    <input type="submit" value="Gửi" name="guiemail">
                    <input type="reset" value="Nhập lại">
                </div>
                <br>
                <?php if (isset($sendMailMess) && $sendMailMess != '') {
                    echo $sendMailMess;
                } ?>
            </form>
        </div>
    </div>
    <?php
    include_once 'boxright.php';
    ?>
</main>