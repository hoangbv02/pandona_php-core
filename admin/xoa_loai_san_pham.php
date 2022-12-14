<?php
include('../config/dbhelper.php');
if (isset($_GET['idloai'])) {
    $idLoai = $_GET["idloai"];
    $sql = "DELETE FROM `loaisp` WHERE `idloai`='$idLoai'";
    $result = executeResult($sql);
    if (!$result) {
        echo '<script>alert("Lỗi xóa loại sản phẩm!")</script>';
    } else {
        echo '<script>alert("Xóa loại sản phẩm thành công!")</script>';
        echo '<script>window.location="index.php?pages=danh_sach_loai_san_pham"</script>';
    }
}
