<div class="row mb">
    <div class="box_left mr">
        <div class="row">
            <div class="banner">
                <img id="img" src="image/banner.jpg" alt="" />
                <div class="slide">
                    <button class="pre" onclick="pre()">&#10094;</button>
                    <button class="next" onclick="next()">&#10095;</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="khoi">
                <?php
                foreach ($loadsp_theo_id as $value) {
                    extract($value) ?>
                    <div class="boxsp">
                        <div class="hidden">
                            <img src="image/<?= $img ?>" alt="" />
                            <div class="button">
                                <button>Thêm vào giỏ hàng</button>
                                <a href="index.php?act=chitietsp&idsp=<?= $id ?>">
                                    <button>Xem chi tiết</button>
                                </a>
                            </div>
                        </div>
                        <p><?= $price ?>$</p>
                        <?= $name ?>
                    </div>
                <?php  } ?>
            </div>
        </div>
    </div>
    <?php
    include_once 'boxright.php';
    ?>
</div>