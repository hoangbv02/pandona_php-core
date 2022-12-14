<?php
include('../config/dbhelper.php');
$idsp = $_GET["idsp"];
$anh = $_GET["anh"];
unlink('../assets/img/' . $anh);
$sql = "DELETE FROM `sanpham` WHERE `idsp`='$idsp'";
$result = executeResult($sql);
if (!$result) {
    echo '<script>alert("Lỗi xóa sản phẩm!")</script>';
} else {
    echo '<script>alert("Xóa sản phẩm thành công!")</script>';
    echo '<script>window.location="index.php?pages=danh_sach_san_pham"</script>';
}
