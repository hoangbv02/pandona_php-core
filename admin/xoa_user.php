<?php
include '../config/dbhelper.php';
$idKh = $_GET["idkh"];
$sql = "DELETE FROM `khachhang` WHERE `idkh`='$idKh'";
$result = executeResult($sql);
if (!$result) {
    echo '<script>alert("Lỗi xóa khách hàng!")</script>';
} else {
    echo '<script>alert("Xóa khách hàng thành công!")</script>';
    echo '<script>window.location="index.php?pages=danh_sach_user"</script>';
}
