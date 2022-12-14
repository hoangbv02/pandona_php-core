<?php
if (isset($_GET['pages'])) {
    if ($_GET['pages'] === 'sua_user') {
        $gidKh = $_GET['idkh'];
        $gtenKh = $_GET['tenkh'];
        $gsdt = $_GET['sdt'];
        $ggioiTinh = $_GET['gioitinh'];
        $gngaySinh = $_GET['ngaysinh'];
        $gdiaChi = $_GET['diachi'];
        $gemail = $_GET['email'];
        if (isset($_POST['submit'])) {
            $ten_kh = $_POST['ten_kh'];
            $sdt = $_POST['sdt'];
            $gioi_tinh = $_POST['gioi_tinh'];
            $ngay_sinh = $_POST['ngay_sinh'];
            $dia_chi = $_POST['dia_chi'];
            $email = $_POST['email'];
            $mat_khau = $_POST['mat_khau'];
            $sql = "UPDATE `khachhang` SET `tenkh`='$ten_kh',`sdt`='$sdt',`gioitinh`='$gioi_tinh',`ngaysinh`='$ngay_sinh',`diachi`='$dia_chi',`Email`='$email',`matkhau`='$mat_khau' WHERE `idkh`='$gidKh'";
            $result = executeResult($sql);
            if (!$result) {
                echo '<script>alert("Lỗi cập nhật khách hàng!")</script>';
            } else {
                echo '<script>alert("Cập nhật khách hàng thành công!")</script>';
                echo '<script>window.location="?pages=danh_sach_user"</script>';
            }
        }
?>
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Sửa khách hàng</h6>
                        <form method="post">
                            <div class="mb-3">
                                <label for="exampleInputTenkh" class="form-label">Tên khách hàng</label>
                                <input type="text" value="<?= $gtenKh ?>" required name="ten_kh" class="form-control" id="exampleInputTenkh">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputSdt" class="form-label">Số điện thoại</label>
                                <input type="number" value=<?= $gsdt ?> required name="sdt" class="form-control" id="exampleInputSdt">
                            </div>
                            <fieldset class="mb-3">
                                <legend class="col-form-label col-sm-2 pt-0">Giới tính</legend>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" <?php if ($ggioiTinh === 'Nam') echo 'checked'; ?> required type="radio" name="gioi_tinh" id="gridRadios1" value="Nam">
                                        <label class="form-check-label" for="gridRadios1">
                                            Nam
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" <?php if ($ggioiTinh === 'Nữ') echo 'checked'; ?> required type="radio" name="gioi_tinh" id="gridRadios2" value="Nữ">
                                        <label class="form-check-label" for="gridRadios2">
                                            Nữ
                                        </label>
                                    </div>
                                </div>
                            </fieldset>
                            <div class="mb-3">
                                <label for="exampleInputNgaySinh" class="form-label">Ngày sinh</label>
                                <input type="date" value="<?= $gngaySinh ?>" required name="ngay_sinh" class="form-control" id="exampleInputNgaySinh">
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" required name="dia_chi" id="floatingTextarea" style="height: 150px;"><?= $gdiaChi ?></textarea>
                                <label for="floatingTextarea">Địa chỉ</label>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail" class="form-label">Email</label>
                                <input type="email" value="<?= $gemail ?>" required name="email" class="form-control" id="exampleInputEmail">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword" class="form-label">Mật khẩu</label>
                                <input type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Phải chứa ít nhất một số và một chữ cái viết hoa và viết thường và ít nhất 8 ký tự trở lên " name="mat_khau" class="form-control" id="exampleInputPassword" "Nhập mật khẩu">
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Sửa khách hàng</button>
                            <button type="reset" class="btn btn-light">Nhập lại</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
}
?>