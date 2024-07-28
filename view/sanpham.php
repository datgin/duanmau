<?php
if(isset($_SESSION['key'])){ ?>
kết quả tìm kiếm của từ khóa "<?=$_SESSION['key']?>" (<?= $_SESSION['dem']?>) sản phẩm
<?php }
?>

<div class="row mb">
    <div class="mr">
        <div class="row">
            <div class="khoi2">
                <?php
                foreach ($search as $value) {
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
</div>