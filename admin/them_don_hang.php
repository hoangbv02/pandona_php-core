<?php
if (isset($_POST['submit'])) {
    $iddh = rand(0, 9999);
    $idKh = $_POST['id_kh'];
    $idsp = $_POST['id_sp'];
    $soluong = $_POST['so_luong'];
    $sdt = $_POST['sdt'];
    $diaChi = $_POST['dia_chi'];
    $ngayDatHang = $_POST['ngay_dat_hang'];
    $trangThai = $_POST['trang_thai'];
    $sqlsanpham = "SELECT * FROM sanpham WHERE idsp = '$idsp'";
    $sanpham = executeList($sqlsanpham)[0];
    $gia = $sanpham['gia'];
    $tongtien = $gia * $soluong;
    $sql = "INSERT INTO `donhang`(`iddh`,`idkh`, `sdt`, `diachi`, `ngaydathang`, `trangthai`, `tongtien`) 
    VALUES ('$iddh','$idKh', '$sdt','$diaChi','$ngayDatHang','$trangThai','$tongtien')";
    $sqlct = "INSERT INTO `chitietdonhang`( `iddh`, `idsp`, `gia`, `soluong`, `tongtien`) 
    VALUES ('$iddh','$idsp','$gia','$soluong','$tongtien')";
    $result = executeResult($sql);
    $resultct = executeResult($sqlct);
    if (!$result && !$resultct) {
        echo '<script>alert("Lỗi thêm đơn hàng!")</script>';
    } else {
        echo '<script>alert("Thêm đơn hàng thành công!")</script>';
        echo '<script>window.location="?pages=danh_sach_don_hang"</script>';
    }
}
?>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Thêm đơn hàng</h6>
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputIdkh" class="form-label">Khách hàng</label>
                        <select class="form-select mb-3" name="id_kh" required aria-label="Default select example" id="exampleInputIdkh">
                            <option>--Chọn--</option>
                            <?php
                            $sqlkh = "SELECT * FROM khachhang";
                            $listkh = executeList($sqlkh);
                            foreach ($listkh as $kh) {
                                echo "
                                <option value=" . $kh['idkh'] . ">" . $kh['tenkh'] . "(" . $kh['idkh'] . ")</option>
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
                                echo "
                                <option value=" . $sp['idsp'] . ">" . $sp['tensp'] . "</option>
                                ";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputSoluong" class="form-label">Số lượng</label>
                        <input type="number" required name="so_luong" class="form-control" id="exampleInputSoluong" placeholder="Nhập số lượng">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputSdt" class="form-label">Số điện thoại</label>
                        <input type="number" required name="sdt" class="form-control" id="exampleInputSdt" placeholder="Nhập số điện thoại">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputNgay" class="form-label">Ngày đặt hàng</label>
                        <input type="date" required name="ngay_dat_hang" class="form-control" id="exampleInputNgay" >
                            </div>
                    <div class=" form-floating mb-3">
                        <textarea class="form-control" required name="dia_chi" id="floatingTextarea" style="height: 150px;"></textarea>
                        <label for="floatingTextarea">Địa chỉ</label>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputTrangThai" class="form-label">Trạng thái</label>
                        <select class="form-select mb-3" name="trang_thai" required aria-label="Default select example" id="exampleInputTrangThai">
                            <option>--Chọn--</option>
                            <option value="0">Đã đặt hàng</option>
                            <option value="1">Đã giao hàng</option>
                        </select>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Thêm đơn hàng</button>
                    <button type="reset" class="btn btn-light">Nhập lại</button>
                </form>
            </div>
        </div>
    </div>
</div>