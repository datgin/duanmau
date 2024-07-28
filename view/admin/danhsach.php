<?php
$i = 0;
foreach ($trangthai1 as $aaa) {
  $i++;
}
?>
<div class="Trash">
  <i class="far fa-trash-alt fa-lg"></i> Thùng rác(<?php echo $i ?>)
  <div class="item">
    <?php
    foreach ($trangthai1 as $trangthai) {
      extract($trangthai);
    ?>
      <div class="box">
        <div class="img"><img width="80" src="image/<?= $img ?>" alt=""></div>
        <div class="gia_name"><?= $name ?> <br><span><?= number_format($price) ?> đ</span> <br> <a href="?act=khoiphuc&id=<?= $id ?>">Khôi phục</a></div>
      </div>
    <?php } ?>
  </div>
</div>
<form class="mb form__search" action="?act=danhsach" method="post">
  <input name="key" type="text" placeholder=" Search...">
  <select name="iddm" id="">
    <?php foreach ($dsdm as $dm) {
      extract($dm); ?>
      <option hidden value="">Chọn loại</option>
      <option value="<?= $id ?>"><?= $dm_name ?></option>
    <?php } ?>
  </select>
  <button name="keyw" value="search" type="submit">Tìm kiếm</button>
</form>
<div class="boxtitle">DANH SÁCH SẢN PHẨM</div>
<div class="boxcontent">
  <table class="bang__sp">
    <tr>
      <th>Chọn</th>
      <th>Ảnh</th>
      <th>Tên sản phẩm</th>
      <th>Giá</th>
      <th>Loại</th>
      <th>Hành động</th>
    </tr>
    <?php
    $i = 0;
    foreach ($dssp as $allsp) {
      $i++;
      extract($allsp) ?>
      <tr>
        <td><input type="checkbox" /></td>
        <td><img src="image/<?= $img ?>" alt="Ảnh sản phẩm" width="100" /></td>
        <td><?= $name ?></td>
        <td><?= number_format($price) ?> đ</td>
        <td><?= $dm_name ?></td>
        <td><button><a href="index.php?act=edit&id=<?= $id ?>">Sửa</a></button><button onclick="return confirm('Bạn có chắn chắn muốn xóa không? ');"><a href="index.php?act=delete&id=<?= $id ?>">Xóa</a></button></td>
      </tr>
    <?php }
    ?>
    <h1 style="color: red;">Danh sách có (<?= $i ?>) sản phẩm</h1>
  </table>

</div>
<form class="form__dssp mt" action="" method="post">
  <button><a href="index.php?act=add">Nhập thêm</a></button>
  <button><a href="?act=add_loai"> Loại</a></button>
</form>
