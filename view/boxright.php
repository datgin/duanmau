<div class="box_right">
    <div class="row mb">
        <form id="form__dn" class="form__dn" action="index.php?act=dangnhap" method="post">
            <div class="boxtitle">Tài khoản</div>
            <div class="boxcontent">
                <?php
                if (empty($_SESSION['user'])) { ?>
                    <div class="user mbb">
                        Tên tài khoản
                        <input type="text" name="name_dn">
                        <span><?= $name_dnErr ?></span>
                    </div>
                    <div class="password mbb">
                        Mật khẩu
                        <input type="password" name="password_dn">
                        <span><?= $password_dnErr ?></span>
                    </div>
                    <div class="boxluu mbb">
                        <input type="checkbox" name=""> Duy trì đăng nhập
                    </div>
                    <button class="mbb" name="btn_dn" value="Đăng nhập">Đăng nhập</button>
                    <a href="?act=quenmk">Quên mật khẩu</a>
                    <a href="index.php?act=dangky">Đăng ký thành viên</a>

                <?php  } else { ?>
                    Xin chào! <?= $_SESSION['user'] ?>
                    <button name="btn__dx" value="Đăng xuất" type="submit">Đăng xuất</button>
                <?php  }
                ?>
            </div>
        </form>
    </div>
    <div class="row mb">
        <div class="boxtitle">Danh mục</div>
        <div class="boxcontent2">
            <?php
            foreach ($dsdm as $dm) {
                extract($dm);
                $linkdm = "index.php?act=danhmuc&iddm=" . $id;
                echo '  <a href="' . $linkdm . '"><li>' . $dm_name . '</li></a>';
            }

            ?>

        </div>
        <div class="boxfooter">
            <input type="text" placeholder="Tìm kiếm..." />
        </div>
    </div>
    <div class="row mb">
        <div class="boxtitle">Top 10 yêu thích</div>
        <div class="boxcontent">
            <?php
            foreach ($top10 as $ten) {
                extract($ten);
                $linksp = "index.php?act=chitietsp&idsp=" . $id;
            ?>
                <a href="<?= $linksp ?>">
                    <img src="image/<?= $img ?>" alt="" width="30" />
                    <span><?= $name ?></span>
                </a>
            <?php  }

            ?>

        </div>
    </div>
</div>
<?php
if (isset($_POST['btn__app__cart'])) {
    if (!isset($_SESSION['user'])) { ?>
        <script>
            alert('Yêu cầu đăng nhâp.');
            document.getElementById("form__dn").style.border = "2px solid red";
            document.getElementById("form__dn").style.borderRadius = "5px";
        </script>
<?php }
}

?>