<div class="boxtitle">FORM ĐĂNG KÝ</div>
<div class="boxcontent ct">
    <form class="form__dk" action="index.php?act=add_user" method="post">
        <div class="text">
            <div class="name mb">
                <label for="">Tên đăng nhập*</label>
                <input type="text" name="name">
                <span><?= $nameErr ?></span>
            </div>
            <div class="sdt mb">
                <label for="">Số điện thoại*</label>
                <input type="text" name="sdt">
                <span><?= $sdtErr ?></span>
            </div>
            <div class="gender mb">
                <label for="">Giới tính*</label>
                <select class="genderr" name="gender">
                    <option hidden value="">Chọn giới tính</option>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                </select>
                <span><?= $genderErr ?></span>
            </div>
            <div class="date mb">
                <label for="">Ngày sinh*</label>
                <input type="date" name="date">
                <span><?= $dateErr ?></span>
            </div>
            <div class="email mb">
                <label for="">Email*</label>
                <input type="text" name="email">
                <span><?= $emailErr ?> </span>
            </div>
            <div class="pass">
                <label for="">Mật khẩu*</label>
                <input type="password" name="password">
                <span><?= $passErr ?></span>
            </div>
            <div class="address">
                <label for="">Địa chỉ</label>
                <input type="text" name="address">
                <span><?= $addressErr ?></span>
            </div>
            <div class="enter-pass">
                <label for="">Nhập mật khẩu*</label>
                <input type="password" name="enter_password">
                <span><?= $enterpasswordErr ?></span>
            </div>
            <div class="quyen">
                <label for="">Quyền*</label>
                <select class="genderr" name="quyen" id="">
                    <option hidden value="">Chọn quyền</option>
                    <option value="1">Quản trị viên</option>
                    <option value="2">Thành viên</option>
                </select>
            </div>
        </div>
        <div class="btn__dk mt">
            <button name="btn" type="submit" value="Đăng ký">Đăng ký</button>
            <button><a href="index.php?act=dangky">Nhập lại</a></button>
        </div>
        <div class="location">
            <p>Bạn đã có tài khoản <a href="index.php?act=dangnhap">đăng nhập</a></p>
        </div>

    </form>
</div>