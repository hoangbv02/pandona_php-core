<?php 
if (isset($_POST['submit'])) {
    $tenLoai = $_POST['ten_loai'];
    $moTa = $_POST['mo_ta'];
    $sql = "INSERT INTO `loaisp`(`tenloai`, `mota`) VALUES ('$tenLoai','$moTa')";
    $result = executeResult($sql);
    if (!$result) {
        echo '<script>alert("Lỗi thêm loại sản phẩm!")</script>';
    } else {
        echo '<script>alert("Thêm loại sản phẩm thành công!")</script>';
        echo '<script>window.location="?pages=danh_sach_loai_san_pham"</script>';
    }
}
?>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Thêm loại sản phẩm</h6>
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputTensp" class="form-label">Tên loại sản phẩm</label>
                        <input type="text" name="ten_loai" required class="form-control" id="exampleInputTensp" placeholder="Nhập tên loại sản phẩm">
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" name="mo_ta" id="floatingTextarea" style="height: 150px;"></textarea>
                        <label for="floatingTextarea">Mô tả</label>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Thêm loại sản phẩm</button>
                    <button type="reset" class="btn btn-light">Nhập lại</button>
                </form>
            </div>
        </div>
    </div>
</div>
