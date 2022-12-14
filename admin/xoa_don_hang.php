<?php
include('../config/dbhelper.php');
$idDh = $_GET["iddh"];
$sqldh = "DELETE FROM `donhang` WHERE `iddh`='$idDh'";
$sqlctdh = "DELETE FROM `chitietdonhang` WHERE `iddh`='$idDh'";
$resultdh = executeResult($sqldh);
$resultctdh = executeResult($sqlctdh);
if (!$resultdh && !$resultctdh) {
    echo '<script>alert("Lỗi xóa đơn hàng!")</script>';
} else {
    echo '<script>alert("Xóa đơn hàng thành công!")</script>';
    echo '<script>window.location="index.php?pages=danh_sach_don_hang"</script>';
}
