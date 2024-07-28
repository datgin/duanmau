<div class="boxtitle">Thêm mới sản phẩm</div>
<form class="form__add" action="" method="post" enctype="multipart/form-data">
  <div class="boxcontent">
    <div class="name__sp mb">
      <label for="">Tên sản phẩm</label>
      <input type="text" name="name_sp" id="" placeholder="Nhập vào tên" />
    </div>
    <div class="image__sp mb">
      <label for="">Ảnh sản phẩm</label>
      <input type="file" name="img_sp" id="">
    </div>
    <div class="price__sp mb">
      <label for="">Giá sản phẩm</label>
      <input min="0" type="number" name="price_sp" id="" placeholder="Nhập vào giá" />
    </div>
    <div class="loai_sp mb">
      <label for="">Loại sản phẩm</label>
      <select name="iddm_sp" id="">
        <?php
        foreach ($dsdm as $load_dm) {
          extract($load_dm) ?>
          <option value="<?= $id ?>"><?= $dm_name ?></option>
        <?php   }
        ?>
      </select>
    </div>
    <div class="mota__sp mb">
      <label for="">Mô tả</label>
      <textarea name="mota_sp" id="" cols="108" rows="5" placeholder="Nhập vào mô tả"></textarea>
    </div>
  </div>
  <div class="btn__add mt">
    <button name="btn__add" value="Thêm mới" type="submit">Thêm mới</button>
    <button>Nhập lại</button>
    <button><a href="index.php?act=danhsach">Danh sách</a></button>
  </div>
</form>