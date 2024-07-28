<?php
foreach ($load_sp_edit as $sp_edit) {
}
?>
<div class="boxtitle">SỬA SẢN PHẨM</div>
<form class="form__add" action="" method="post" enctype="multipart/form-data">
  <div class="boxcontent">
    <div class="name__sp mb">
      <input type="hidden" name="id_sp" value="<?= $sp_edit['id'] ?>">
      <label for="">Tên sản phẩm</label>
      <input type="text" name="name_sp_edit" id="" value="<?= $sp_edit['name'] ?>" placeholder="Nhập vào tên" />
    </div>
    <div class="image__sp mb">
      <label for="">Ảnh sản phẩm</label>
      <img src="image/<?= $sp_edit['img'] ?>" alt="Ảnh sản phẩm" width="150"> <input type="file" name="img_sp_edit" >
    </div>
    <div class="price__sp mb">
      <label for="">Giá sản phẩm</label>
      <input min="0" type="number" value="<?= $sp_edit['price'] ?>" name="price_sp_edit" id="" placeholder="Nhập vào giá" />
    </div>
    <div class="loai_sp mb">
      <label for="">Loại sản phẩm</label>
      <select name="loai_sp_edit" id="">
        <?php
        foreach ($dsdm as $load_dm) {
          extract($load_dm) ?>
          <option value="<?= $id ?>" <?= ($id == $sp_edit['iddm']) ? 'selected' : '' ?>><?= $dm_name ?></option>
        <?php   }
        ?>
      </select>
    </div>
    <div class="mota__sp mb">
      <label for="">Mô tả</label>
      <textarea name="mota_sp_edit" id="" cols="108" rows="5" placeholder="Nhập vào mô tả"><?= $sp_edit['mota'] ?></textarea>
    </div>
  </div>
  <div class="btn__add mt">
    <button type="submit" name="btn__edit" value="Sửa sản phẩm">Sửa sản phẩm</button>
    <button><a href="index.php?act=danhsach">Danh sách</a></button>
  </div>
</form>