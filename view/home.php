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
                foreach ($kq as $value) {
                    extract($value) ?>
                    <div class="boxsp">
                        <div class="hidden">
                            <img src="image/<?= $img ?>" alt="" />
                            <div class="button">
                                <button data-id="<?= $id ?>" onclick="add_cart(<?= $id ?>)" value="Thêm vào giỏ hàng" type="submit">Thêm vào giỏ hàng</button>
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
    <input type="text" hidden value="<?= (isset($_SESSION['iduser'])) ? $_SESSION['iduser'] : 0 ?>" id="iduser">
    <?php
    include_once 'boxright.php';
    ?>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    var totalCart = document.querySelector('#slsp')
    var idUser = document.querySelector('#iduser').value

    function add_cart(id) {
        if (idUser == 0) {
            alert('Vui lòng đăng nhập để thực hiện chức năng!');
        } else {
            $.ajax({
                type: 'POST',
                url: "?act=add_cart",
                data: {
                    id: id
                },
                success: function(response) {
                    event.preventDefault();
                    location.reload();
                    alert('Đã thêm vào giỏ hàng')
                },
                error: function(error) {
                    console.log(error);
                }
            })
        }

    }
</script>