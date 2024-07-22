<div class="infouser_container">
    <div class="profile_box">
        <div class="profile_box_left">
            <div class="profile_img">
                <img src="public/img/avt/<?= $arrData['0']['img'] ?>" alt=""><br>
                <button>THAY ĐỔI</button>
            </div>
            <div class="profile_nav">
                <div>
                    <a href="#">Tài khoản</a><br>
                    <a href="#">Giỏ hàng</a><br>
                    <a href="#">Đơn hàng</a><br>
                    <a href="#">Kho voucher</a><br>
                    <a href="#">Thông báo</a><br>
                    <a href="http://localhost:3000/logout">Đăng xuất</a><br>
                </div>
            </div>
        </div>
        <div class="profile_box_right">
            <div class="info_box">
                <form action="">
                    <div class="row">
                        <label for="">Mã tài khoản</label>
                        <p><?= $arrData['0']['id'] ?></p>
                    </div>
                    <div class="row">
                        <label for="name">Họ và tên</label>
                        <input name="name" id="name" type="text" value="<?= $arrData['0']['name'] ?>">
                    </div>
                    <div class="row">
                        <label for="email">Email</label>
                        <input name="email" id="email" type="email" value="<?= $arrData['0']['email'] ?>">
                    </div>
                    <div class="row">
                        <label for="phone">Số điện thoại</label>
                        <input name="phone" id="phone" type="number" value="<?= $arrData['0']['phone'] ?>">
                    </div>
                    <div class="row">
                        <label for="">Giới tính</label>
                        <select class="gender" name="gender">
                            <option value="0" <?= $gender_1 ?> >Nam</option>
                            <option value="1" <?= $gender_2 ?> >Nữ</option>
                        </select>
                    </div>
                    <div class="row">
                        <label for="">Ngày sinh</label>
                        <input type="date" value="<?= $arrData['0']['day_of_birth'] ?>">
                    </div>
                    <div style="border: none;" class="row">
                        <label for="address">Địa chỉ</label>
                        <input name="address" id="address" type="text" value="<?= $arrData['0']['address'] ?>">
                    </div>
                    <input class="profile_save_btn" type="submit" value="Lưu"><br>
                    <a class="a_change_pass" href="#">Đổi mật khẩu</a>
                </form>
                <?php?>
            </div>
        </div>
    </div>
</div>