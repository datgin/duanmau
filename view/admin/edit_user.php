<div class="boxtitle">CẬP NHẬT TÀI KHOẢN</div>
<div class="boxcontent ct">
    <form class="form__dk" action="" method="post">
        <div class="text">
            <div class="name mb">
                <label for="">Tên đăng nhập*</label>
                <input type="text" name="name" value="<?=$tk[0]['user']?>">
                
            </div>
            <div class="sdt mb">
                <label for="">Số điện thoại*</label>
                <input type="text" name="sdt" value="<?=$tk[0]['tel']?>">
                
            </div>
            <div class="gender mb">
                <label for="">Giới tính*</label>
                <select class="genderr" name="gender">
                    <option hidden value="">Chọn giới tính</option>
                    <option value="Nam" <?=($tk[0]['gender']) == 'Nam' ? 'selected' : ''?>>Nam</option>
                    <option value="Nữ" <?=($tk[0]['gender']) == 'Nu' ? 'selected' : ''?>>Nữ</option>
                </select>
                
            </div>
            <div class="date mb">
                <label for="">Ngày sinh*</label>
                <input type="date" name="date" value="<?=$tk[0]['date']?>">
                
            </div>
            <div class="email mb">
                <label for="">Email*</label>
                <input type="text" name="email" value="<?=$tk[0]['email']?>">
               
            </div>
            <div class="pass">
                <label for="">Mật khẩu*</label>
                <input type="password" name="password" value="<?=$tk[0]['pass']?>">
                
            </div>
            <div class="address">
                <label for="">Địa chỉ</label>
                <input type="text" name="address" value="<?=$tk[0]['address']?>">
                
            </div>
            <div class="quyen">
                <label for="">Quyền*</label>
                <select class="genderr" name="quyen" id="">
                    <option hidden value="">Chọn quyền</option>
                    <option value="1" <?=($tk[0]['role']) == 1 ? 'selected' : ''?>>Quản trị viên</option>
                    <option value="2" <?=($tk[0]['role']) == 2 ? 'selected' : ''?>>Thành viên</option>
                </select>
            </div>
        </div>
        <div class="btn__dk mt">
            <button name="btn" type="submit" value="Đăng ký">Cập Nhật</button>
        </div>
        <div class="location">
            <p>Bạn đã có tài khoản <a href="index.php?act=dstaikhoan">Quay lại</a></p>
        </div>

    </form>
</div>