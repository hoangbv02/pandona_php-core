<?php
if (isset($_GET['pages'])) {
    if ($_GET['pages'] === 'sua_loai_san_pham') {
        $idLoai = $_GET["idloai"];
        $tenLoai = $_GET["tenloai"];
        $moTa = $_GET["mota"];
        if (isset($_POST["submit"])) {
            $ten_loai = $_POST["ten_loai"];
            $mo_ta = $_POST["mo_ta"];
            $sql = "UPDATE `loaisp` SET `tenloai`='$ten_loai',`mota`='$mo_ta' WHERE `idloai`='$idLoai'";
            $result = executeResult($sql);
            if (!$result) {
                echo '<script>alert("Lỗi cập nhật loại sản phẩm!")</script>';
            } else {
                echo '<script>alert("Cập nhật loại sản phẩm thành công!")</script>';
                echo '<script>window.location="?pages=danh_sach_loai_san_pham"</script>';
            }
        }
?>
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-secondary rounded h-100 p-4">
                        <h6 class="mb-4">Sửa loại sản phẩm</h6>
                        <form method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleInputTensp" class="form-label">Tên loại sản phẩm</label>
                                <input type="text" required name="ten_loai" class="form-control" value="<?= $tenLoai ?>" id="exampleInputTensp">
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" name="mo_ta" id="floatingTextarea" style="height: 150px;"><?= $moTa ?></textarea>
                                <label for="floatingTextarea">Mô tả</label>
                            </div>
                            <button type="submit" name="submit" class="btn btn-primary">Sửa loại sản phẩm</button>
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