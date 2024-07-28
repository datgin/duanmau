<div class="thongTinUser">
  <div class="boxtitle">Thông tin người dùng</div>
  <div class="boxcontent">
    <form action="" method="post" enctype="multipart/form-data">
      <img id="avata" src="image/<?= (isset($_SESSION['file'])) ? $_SESSION['file'] : '' ?>" />
      <input type="file" id="file" name="file" />
      <input type="submit" value="Đăng" name="btn_dang">
    </form>

    <form action="" method="post">
      <div class="luoi">
        <div class="user mb">
          Tên người dùng <br>
          <input type="text" name="name" value="<?= $loadtk[0]['user'] ?>">
        </div>
        <div class="date mb">
          Ngày sinh <br>
          <input type="date" name="date" value="<?= $loadtk[0]['date'] ?>">
        </div>
        <div class="password mb">
          Mật khẩu <br>
          <input type="password" name="password" value="<?= $loadtk[0]['pass'] ?>">
          <input class="a" type="checkbox" onclick="togglePassword()">Show Password
        </div>
        <div class="sdt mb">
          Số điện thoại <br>
          <input type="number" name="sdt" value="<?= $loadtk[0]['tel'] ?>">
        </div>
        <div class="gender">
          Giới tính <br>
          <select name="gender">
            <option value="Nam" <?= (($loadtk['0']['gender']) == 'Nam') ? 'selected' : '' ?>>Nam</option>
            <option value="Nữ" <?= (($loadtk['0']['gender']) == 'Nữ') ? 'selected' : '' ?>>Nữ</option>
          </select>
        </div>
        <div class="email mb">
          Email <br>
          <input type="email" name="email" value="<?= $loadtk[0]['email'] ?>">
        </div>
        <div class="address mb">
          Địa chỉ <br>
          <input type="text" name="address" value="<?= $loadtk[0]['address'] ?>">
        </div>
      </div>
      <button type="submit" name="btn_update_user" value="update">Cập Nhật</button>
      <?= (isset($mess)) ? $mess : '' ?>
    </form>
  </div>
</div>
<script>
  const avatar = document.querySelector("#avata");
  const input = document.querySelector("#file");

  input.addEventListener("change", () => {
    avata.src = URL.createObjectURL(input.files[0]);
  });


  function togglePassword() {
  var password = document.querySelector('input[name="password"]');
  if (password.type === "password") {
    password.type = "text";
  } else {
    password.type = "password";
  }
}
</script>