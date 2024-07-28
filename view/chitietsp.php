<main class="catalog mb">
    <div class="box_left mr">
        <div class="mb">
            <div class="boxtitle">CHI TIẾT SẢN PHẨM</div>
            <div class="boxcontent">
                <img id="sp" src="image/<?= $sp[0]['img'] ?>" width="80%">
            </div>
        </div>

        <div class="mb">
            <div class="boxtitle">BÌNH LUẬN</div>
            <div class="boxcontent2 product_portfolio binhluan">
                <table class="bang_bl">

                    <?php
                    foreach ($binh_luan as $bl) {
                        extract($bl); ?>
                        <form action="index.php?act=chitietsp&idsp=<?= $sp[0]['id'] ?>&idbl=<?= $idbl ?>" method="post">
                            <tr>
                                <td><?= $user . ':' ?></td>
                                <td><?= $noidung ?></td>
                                <td><?= date("d-m-Y", strtotime($ngaybinhluan)) ?> <?php if (isset($_SESSION['user'])) {
                                                                                        if ($user === $_SESSION['user'] && $_SESSION['user'] != 'Admin') { ?>
                                            <button onclick="return confirm('Bạn có chắc chắn muốn xóa không')" value="Xóa" name="delete_bl">Xóa</button>
                                    <?php  }
                                                                                    } ?>
                                </td>
                            </tr>
                        </form>
                    <?php }
                    ?>

                </table>
            </div>
            <?php
            ?>
            <?php
            if (isset($_SESSION['user'])) { ?>
                <div class="box_search">
                    <form action="index.php?act=chitietsp&idsp=<?= $sp[0]['id'] ?>" method="POST">
                        <input type="hidden" name="idpro" value="<?= $sp[0]['id'] ?>" />
                        <input type="text" name="noidung" />
                        <input type="submit" name="guibinhluan" value="Gửi bình luận" />
                    </form>
                </div>

            <?php  } else { ?>
                <span style="color: red;">Bạn cần đăng nhập để Comment*</span>
            <?php    }  ?>

        </div>

        <div class="mb">
            <div class="boxtitle">SẢN PHẨM CÙNG LOẠI</div>
            <div class="boxcontent">
                <?php
                foreach ($sp_cungloai as $cl) {
                    extract($cl) ?>
                    <a href="index.php?act=chitietsp&idsp=<?= $id ?>">
                        <li><?= $name ?></li>
                    </a>
                <?php }
                ?>

            </div>
        </div>
    </div>
    <?php
    include_once 'boxright.php';
    ?>
</main>
<style>
    tr td {
        padding: 0 10px;
    }
</style>
<script>
</script>