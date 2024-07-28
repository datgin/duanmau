 <form class="mb form__search" action="?act=add_loai" method="post">
     <input type="text" placeholder="Nhập tên loại" name="name_loai">
     <button name="btn_add_loai" value="search" type="submit">Thêm</button>
 </form>
 <div class="boxtitle">DANH SÁCH LOẠI</div>
 <div class="boxcontent">
     <table class="bang__sp">
         <tr>
             <th>STT</th>
             <th>Tên loại</th>
             <th>Hành động</th>
         </tr>
         <?php $i = 1;
            foreach ($dsdm as $dm) {
                extract($dm); ?>
             <tr>
                 <td><?= $i++ ?></td>
                 <td><?= $dm_name ?></td>
                 <td>
                     <button><a href="?act=edit_loai&id=<?= $id ?>">Sửa</a></button>
                     <form style="display: inline-block;" action="?act=add_loai&id=<?= $id ?>" method="post"><button onclick="return confirm('Bạn có muốn xóa danh mục (<?= $dm_name ?>)?')" name="btn_xoa_loai" value="Xóa">Xóa</button></form>
                 </td>
             </tr>
         <?php } ?>
     </table>
 </div>
 <form class="form__dssp mt" action="" method="post">
     <button><a href="?act=danhsach">Danh sách</a></button>
 </form>