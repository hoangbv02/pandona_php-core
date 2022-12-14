<?php
if (isset($_GET['pages'])) {
    if ($_GET['pages'] === 'sua_don_hang') {
        $gidDh = $_GET['iddh'];
        $sqlct = "SELECT * FROM chitietdonhang WHERE iddh= '$gidDh'";
        $listct = executeList($sqlct)[0];
        $gidSp = $listct['idsp'];
        $gsoLuong = $listct['soluong'];
        $gidKh = $_GET['idkh'];
        $gsdt = $_GET['sdt'];
        $gdiaChi = $_GET['diachi'];
        $gngayDatHang = $_GET['ngaydathang'];
        $gtrangThai = $_GET['trangthai'];
        if (isset($_POST['submit'])) {
            $idKh = $_POST['id_kh'];
            $sqlsanpham = "SELECT * FROM sanpham WHERE idsp = '$gidSp'";
            $sanpham = executeList($sqlsanpham)[0];
            $soluong = $_POST['so_luong'];
            $gia = $sanpham['gia'];
            $tongtien = $gia * $soluong;
            $sdt = $_POST['sdt'];
            $diaChi = $_POST['dia_chi'];
            $ngayDatHang = $_POST['ngay_dat_hang'];
            $trangThai = $_POST['trang_thai'];
            $sqldh = "UPDATE `donhang` SET `idkh`='$idKh',`sdt`='$sdt',`diachi`='$diaChi',
            `ngaydathang`='$ngayDatHang',`trangthai`='$trangThai',`tongtien`='$tongtien' WHERE `iddh`= '$gidDh'";
            $sqlctdh = "UPDATE `chitietdonhang` SET `iddh`='$gidDh',`idsp`='$gidSp',`gia`='$gia',
            `soluong`='$soluong',`tongtien`='$tongtien' WHERE `iddh`= '$gidDh'";
            $resultdh = executeResult($sqldh);
            $resultctdh = executeResult($sqlctdh);
            if (!$resultdh && !$resultctdh) {
                echo '<script>alert("Lỗi cập nhật đơn hàng!")</script>';
            } else {
                echo '<script>alert("Cập nhật đơn hàng thành công!")</script>';
                echo '<script>window.location="?pages=danh_sach_don_hang"</script>';
            }
        }
?>
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Sửa đơn hàng</h6>
                        <form method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleInputIdkh" class="form-label">Khách hàng</label>
                                <select class="form-select mb-3" name="id_kh" required aria-label="Default select example" id="exampleInputIdkh">
                                    <option>--Chọn--</option>
                                    <?php
                                    $sqlkh = "SELECT * FROM khachhang";
                                    $listkh = executeList($sqlkh);
                                    foreach ($listkh as $kh) {
                                        $selectedkh = ($kh['idkh'] === $gidKh) ? "selected = 'selected'" : "";
                                        echo "
                                        <option " . $selectedkh . " value=" . $kh['idkh'] . ">" . $kh['tenkh'] . "(" . $kh['idkh'] . ")</option>
                                        ";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputIdsp" class="form-label">Sản phẩm</label>
                                <select class="form-select mb-3" name="id_sp" required aria-label="Default select example" id="exampleInputIdsp">
                                    <option>--Chọn--</option>
                                    <?php
                                    $sqlsp = "SELECT * FROM sanpham";
                                    $listsp = executeList($sqlsp);
                                    foreach ($listsp as $sp) {
                                        $selectedsp = ($sp['idsp'] === $gidSp) ? "selected = 'selected'" : "";
                                        echo "
                                        <option " . $selectedsp . " value=" . $sp['idsp'] . ">" . $sp['tensp'] . "</option>
                                        ";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputSoluong" class="form-label">Số lượng</label>
                                <input type="number" required name="so_luong" class="form-control" id="exampleInputSoluong" value="<?= $gsoLuong ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputSdt" class="form-label">Số điện thoại</label>
                                <input type="number" required name="sdt" class="form-control" id="exampleInputSdt" value="<?= $gsdt ?>">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputNgay" class="form-label">Ngày đặt hàng</label>
                                <input type="date" required name="ngay_dat_hang" class="form-control" id="exampleInputNgay" value="<?= $gngayDatHang ?>">
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" required name="dia_chi" id="floatingTextarea" style="height: 150px;"><?= $gdiaChi ?></textarea>
                                <label for="floatingTextarea">Địa chỉ</label>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputTrangThai" class="form-label">Trạng thái</label>
                                <select class="form-select mb-3" name="trang_thai" required aria-label="Default select example" id="exampleInputTrangThai">
                                    <option>--Chọn--</option>
                                    <option <?php if ($gtrangThai === '0') echo 'selected' ?> value="0">Đã đặt hàng</option>
                                    <option <?php if ($gtrangThai === '1') echo 'selected' ?> value="1">Đã giao hàng</option>
                                </select>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Sửa đơn hàng</button>
                            <button type="reset" class="btn btn-light">Nhập lại</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<?php }
}
?>