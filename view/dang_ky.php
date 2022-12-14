<?php
if (isset($_POST['submit'])) {
    $ten = $_POST['ten'];
    $sdt = $_POST['sdt'];
    $gioi_tinh = $_POST['gioi_tinh'];
    $ngay_sinh = $_POST['ngay_sinh'];
    $dia_chi = $_POST['dia_chi'];
    $submitEmail = $_POST['email'];
    $email = filter_var($submitEmail, FILTER_SANITIZE_EMAIL);
    $mat_khau = md5($_POST['mat_khau']);
    $nhap_lai_mat_khau = md5($_POST['nhap_lai_mat_khau']);
    if ($mat_khau === $nhap_lai_mat_khau) {
        if ($_GET['author'] == 'admin') {
            $sqlAd = "SELECT * FROM admin";
            $listAd = executeList($sqlAd);
            foreach ($listAd as $ad) {
                if ($ad['email'] == $email) {
                    echo "<script>alert('Email đã đăng ký tài khoản thành viên!')</script>";
                    break;
                } else {
                    $sql = "INSERT INTO `admin`( `tenad`, `sdt`, `gioitinh`, `ngaysinh`, `diachi`, `email`, `matkhau`) 
                    VALUES ('$ten','$sdt','$gioi_tinh','$ngay_sinh','$dia_chi','$email','$mat_khau')";
                    executeResult($sql);
                    echo "<script>alert('Đăng ký tài khoản thành công')</script>";
                    echo '<script>window.location="?pages=dang_nhap"</script>';
                }
            }
        } else {
            $sqlKh = "SELECT * FROM khachhang";
            $listKh = executeList($sqlKh);
            foreach ($listKh as $kh) {
                if ($kh['email'] == $email) {
                    echo "<script>alert('Email đã đăng ký tài khoản!')</script>";
                    break;
                } else {
                    $sql = "INSERT INTO `khachhang`( `tenkh`, `sdt`, `gioitinh`, `ngaysinh`, `diachi`, `email`, `matkhau`) 
                    VALUES ('$ten','$sdt','$gioi_tinh','$ngay_sinh','$dia_chi','$email','$mat_khau')";
                    executeResult($sql);
                    echo "<script>alert('Đăng ký tài khoản thành công')</script>";
                    echo '<script>window.location="?pages=dang_nhap"</script>';
                }
            }
        }
    } else {
        echo "<script>alert('Mật khẩu không khớp!')</script>";
    }
}
?>
<form action="" method="post" class="form">
    <h2>Đăng ký</h2>
    <div class="form__wrapper">
        <div class="form-control">
            <label for="ten">Tên</label>
            <input class="form-input" required type="text" name="ten" id="ten" placeholder="Nhập tên">
        </div>
        <div class="form-control">
            <label for="sdt">Số điện thoại</label>
            <input class="form-input" pattern="[0-9]{10,11}" required type="text" name="sdt" id="sdt" placeholder="Nhập số điện thoại">
        </div>
        <div class="form-gender">
            <label for="gioitinh">Giới tính:</label>
            <div>
                Nam: <input type="radio" name="gioi_tinh" value="Nam" id="gioitinh">
                Nữ: <input type="radio" name="gioi_tinh" value="Nữ" id="gioitinh">
            </div>
        </div>
        <div class="form-control">
            <label for="ngaysinh">Ngày sinh</label>
            <input class="form-input" type="date" name="ngay_sinh" id="ngaysinh">
        </div>
        <div class="form-address">
            <label for="diachi">Địa chỉ</label>
            <textarea class="" required name="dia_chi" id="diachi" style="height: 100px; width: 70%;border: 1px solid var(--primary-color-text);"></textarea>
        </div>
        <div class="form-control">
            <label for="email">Email</label>
            <input class="form-input" type="email" required name="email" id="email" placeholder="Nhập email">
        </div>
        <div class="form-control">
            <label for="matkhau">Mật khẩu</label>
            <input class="form-input" type="password" placeholder="Nhập mật khẩu" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Phải chứa ít nhất một số và một chữ cái viết hoa và viết thường và ít nhất 8 ký tự trở lên " required name="mat_khau" id="matkhau">
        </div>
        <div class="form-control">
            <label for="nhaplaimatkhau">Nhập lại mật khẩu</label>
            <input class="form-input" type="password" placeholder="Nhập lại mật khẩu" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Phải chứa ít nhất một số và một chữ cái viết hoa và viết thường và ít nhất 8 ký tự trở lên " required name="nhap_lai_mat_khau" id="nhaplaimatkhau">
        </div>
    </div>
    <div class="form__btn">
        <input class="btn primary" type="submit" name="submit" value="Đăng ký">
        <input class="btn" type="reset" name="reset" value="Nhập lại">
    </div>
    <a href="?pages=dang_nhap">Đã có tài khoản!</a>
</form>