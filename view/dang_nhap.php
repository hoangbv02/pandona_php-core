<?php
if (isset($_POST['submit'])) {
    $submitEmail = $_POST['email'];
    $email = filter_var($submitEmail, FILTER_SANITIZE_EMAIL);
    $mat_khau = md5($_POST['mat_khau']);
    $sqlAdmin = "SELECT * FROM admin where email = '$email' AND matkhau='$mat_khau'";
    $admin = executeList($sqlAdmin);
    $sqlKh = "SELECT * FROM khachhang where email = '$email' AND matkhau='$mat_khau'";
    $kh = executeList($sqlKh);
    if ($admin) {
        $_SESSION['login']['admin'] = $admin[0];
        echo '<script>alert("Đăng nhập thành công!")</script>';
        echo '<script>window.location="admin/index.php"</script>';
    } else if ($kh) {
        $_SESSION['login']['user'] = $kh[0];
        echo '<script>alert("Đăng nhập thành công!")</script>';
        echo '<script>window.location="index.php"</script>';
    } else {
        echo "<script>alert('Lỗi tài khoản không hợp lệ!')</script>";
    }
} ?>

<form action="" method="post" class="form">
    <h2>Đăng Nhập</h2>
    <div class="form__wrapper">
        <div class="form-control">
            <label for="email">Email</label>
            <input placeholder="Nhập email" class="form-input" type="email" required name="email" id="email">
        </div>
        <div class="form-control">
            <label for="matkhau">Mật khẩu</label>
            <input class="form-input" placeholder="Nhập mật khẩu" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Phải chứa ít nhất một số và một chữ cái viết hoa và viết thường và ít nhất 8 ký tự trở lên " required name="mat_khau" id="matkhau">
        </div>
    </div>
    <div>
        <input class="btn primary" type="submit" name="submit" value="Đăng Nhập">
        <input class="btn" type="reset" name="reset" value="Nhập lại">
    </div>
    <a href="?pages=dang_ky&author=khach_hang">Đăng ký tài khoản?</a>
    <a href="?pages=dang_ky&author=admin">Đăng ký quản trị viên?</a>
</form>