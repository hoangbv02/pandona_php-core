<?php
if (isset($_GET['pages'])) {
    if ($_GET['pages'] === 'sua_san_pham') {
        $gidsp = $_GET['idsp'];
        $gidloai = $_GET['idloai'];
        $ganh = $_GET['anh'];
        $gtensp = $_GET['tensp'];
        $gsoluong = $_GET['soluong'];
        $ggia = $_GET['gia'];
        $gmota = $_GET['mota'];
        if (isset($_POST['submit'])) {
            $anh = basename($_FILES['anh']['name']);
            $anh_tmp = $_FILES['anh']['tmp_name'];
            $idLoai = $_POST['id_loai'];
            $tenSanPham = $_POST['ten_san_pham'];
            $soLuong = $_POST['so_luong'];
            $gia = $_POST['gia'];
            $moTa = $_POST['mo_ta'];
            move_uploaded_file($anh_tmp, '../assets/img/' . $anh);
            $sql = "UPDATE sanpham SET idloai='$idLoai', tensp='$tenSanPham', soluong='$soLuong', gia='$gia', anh='$anh', mota='$moTa' 
            WHERE idsp='$gidsp'";
            $result = executeResult($sql);
            if (!$result) {
                echo '<script>alert("Lỗi cập nhật sản phẩm!")</script>';
            } else {
                echo '<script>alert("Cập nhật sản phẩm thành công!")</script>';
                echo '<script>window.location="?pages=danh_sach_san_pham"</script>';
            }
        }
?>
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Sửa sản phẩm</h6>
                        <form method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleInputTenloai" class="form-label">Tên loại</label>
                                <select class="form-select mb-3" name="id_loai" required aria-label="Default select example" id="exampleInputTenloai">
                                    <option>--Chọn--</option>
                                    <?php
                                    $sqlLSP = "SELECT * FROM loaisp";
                                    $listLSP = executeList($sqlLSP);
                                    foreach ($listLSP as $loaisp) {
                                        $selected = ($gidloai == $loaisp['idloai']) ? "selected='selected'" : '';
                                        echo "<option value=" . $loaisp['idloai'] . " " . $selected . ">" . $loaisp['tenloai'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputTensp" class="form-label">Tên sản phẩm</label>
                                <input type="text" required name="ten_san_pham" value="<?= $gtensp ?>" class="form-control" id="exampleInputTensp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputSoLuong" class="form-label">Số lượng</label>
                                <input type="number" required name="so_luong" value="<?= $gsoluong ?>" class="form-control" id="exampleInputSoLuong">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputGia" class="form-label">Giá</label>
                                <input type="number" required name="gia" value="<?= $ggia ?>" class="form-control" id="exampleInputGia">
                            </div>
                            <div class="mb-3">
                                <label for="formFile" required class="form-label">Ảnh</label>
                                <input class="form-control bg-dark" name="anh" type="file"  id="formFile">
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="mo_ta" id="floatingTextarea" style="height: 150px;"><?= $gmota ?></textarea>
                                <label for="floatingTextarea">Mô tả</label>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Sửa sản phẩm</button>
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