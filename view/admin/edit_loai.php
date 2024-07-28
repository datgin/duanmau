<?php
foreach ($name_dm as $dm) {
    extract($dm);
}
?>
<div class="boxtitle">EDIT LOẠI</div>
<div class="boxcontent">
    <form action="" method="post" class="mb form__search">
        <input type="text" name="name_loai" value="<?= $dm_name ?>">
        <button name="btn_sua_loai" value="Sửa" type="submit">Sửa</button>
    </form>
</div>