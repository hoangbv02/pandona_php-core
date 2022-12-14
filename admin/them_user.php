<?php
if (isset($_POST['submit'])) {
    $tenKh = $_POST['ten_kh'];
    $sdt = $_POST['sdt'];
    $gioiTinh = $_POST['gioi_tinh'];
    $ngaySinh = $_POST['ngay_sinh'];
    $diaChi = $_POST['dia_chi'];
    $submitEmail = $_POST['email'];
    $email = filter_var($submitEmail, FILTER_SANITIZE_EMAIL);
    $matKhau = md5($_POST['mat_khau']);
    $sql = "INSERT INTO `khachhang`( `tenkh`, `sdt`, `gioitinh`, `ngaysinh`, `diachi`, `Email`, `matkhau`) 
            VALUES ('$tenKh','$sdt','$gioiTinh','$ngaySinh','$diaChi','$email','$matKhau')";
    $result = executeResult($sql);
    if (!$result) {
        echo '<script>alert("Lỗi thêm khách hàng!")</script>';
    } else {
        echo '<script>alert("Thêm khách hàng thành công!")</script>';
        echo '<script>window.location="?pages=danh_sach_user"</script>';
    }
}
?>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Thêm khách hàng</h6>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="exampleInputTenkh" class="form-label">Tên khách hàng</label>
                        <input type="text" required name="ten_kh" class="form-control" id="exampleInputTenkh" placeholder="Nhập tên khách hàng">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputSdt" class="form-label">Số điện thoại</label>
                        <input type="number" required name="sdt" class="form-control" id="exampleInputSdt" placeholder="Nhập số điện thoại">
                    </div>
                    <fieldset class="mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Giới tính</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" required type="radio" name="gioi_tinh" id="gridRadios1" value="nam">
                                <label class="form-check-label" for="gridRadios1">
                                    Nam
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" required type="radio" name="gioi_tinh" id="gridRadios2" value="nữ">
                                <label class="form-check-label" for="gridRadios2">
                                    Nữ
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    <div class="mb-3">
                        <label for="exampleInputNgaySinh" class="form-label">Ngày sinh</label>
                        <input type="date" required name="ngay_sinh" class="form-control" id="exampleInputNgaySinh">
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" required name="dia_chi" id="floatingTextarea" style="height: 150px;"></textarea>
                        <label for="floatingTextarea">Địa chỉ</label>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail" class="form-label">Email</label>
                        <input type="email" required name="email" class="form-control" id="exampleInputEmail" placeholder="Nhập email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword" class="form-label">Mật khẩu</label>
                        <input type="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Phải chứa ít nhất một số và một chữ cái viết hoa và viết thường và ít nhất 8 ký tự trở lên " name="mat_khau" class="form-control" id="exampleInputPassword" placeholder="Nhập mật khẩu">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Thêm khách hàng</button>
                    <button type="reset" class="btn btn-light">Nhập lại</button>
                </form>
            </div>
        </div>
    </div>
</div>