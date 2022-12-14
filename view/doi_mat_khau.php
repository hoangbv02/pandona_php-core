<?php
if (isset($_POST['submit'])) {
    $idkh = $_SESSION['login']['user']['idkh'];
    $submitEmail = $_SESSION['login']['user']['email'];
    $email = filter_var($submitEmail, FILTER_SANITIZE_EMAIL);
    $mat_khau_cu = md5($_POST['mat_khau_cu']);
    $sqlmk = "SELECT * FROM khachhang WHERE email='$email' and matkhau='$mat_khau_cu'";
    $kh = executeList($sqlmk)[0];
    if ($kh) {
        $mat_khau = md5($_POST['mat_khau']);
        $nhap_lai_mat_khau = md5($_POST['nhap_lai_mat_khau']);
        if ($mat_khau === $nhap_lai_mat_khau) {
            $sql = "UPDATE `khachhang` SET `matkhau`='$mat_khau' WHERE `idkh` = '$idkh'";
            executeResult($sql);
            unset($_SESSION['login']['user']);
            echo "<script>alert('Đổi mật khẩu thành công')</script>";
            echo '<script>window.location="?pages=dang_nhap"</script>';
        } else {
            echo "<script>alert('Mật khẩu không khớp!')</script>";
        }
    }
}
?>
<form action="" method="post" class="form">
    <h2>Đổi mật khẩu</h2>
    <div class="form__wrapper">
        <div class="form-control">
            <label for="matkhau">Mật khẩu cũ</label>
            <input class="form-input" type="password" placeholder="Nhập mật khẩu cũ" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Phải chứa ít nhất một số và một chữ cái viết hoa và viết thường và ít nhất 8 ký tự trở lên " required name="mat_khau_cu" id="matkhau">
        </div>
        <div class="form-control">
            <label for="matkhau">Mật khẩu mới</label>
            <input class="form-input" type="password" placeholder="Nhập mật khẩu mới" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Phải chứa ít nhất một số và một chữ cái viết hoa và viết thường và ít nhất 8 ký tự trở lên " required name="mat_khau" id="matkhau">
        </div>
        <div class="form-control">
            <label for="nhaplaimatkhau">Nhập lại mật khẩu</label>
            <input class="form-input" type="password" placeholder="Nhập lại mật khẩu" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Phải chứa ít nhất một số và một chữ cái viết hoa và viết thường và ít nhất 8 ký tự trở lên " required name="nhap_lai_mat_khau" id="nhaplaimatkhau">
        </div>
    </div>
    <div class="form__btn">
        <input class="btn primary" type="submit" name="submit" value="Đổi mật khẩu">
        <input class="btn" type="reset" name="reset" value="Nhập lại">
    </div>
</form>