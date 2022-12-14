<?php
if (isset($_SESSION['login']['user'])) {
    $idkh = $_SESSION['login']['user']['idkh'];
    $sdt = $_SESSION['login']['user']['sdt'];
    $diachi = $_SESSION['login']['user']['diachi'];
    $ngayDatHang = date('Y-m-d');
    $trangThai = 0;
    $iddh = rand(0, 9999);
    if (isset($_GET['chi_tiet_san_pham'])) {
        $idsp = $_GET['idsp'];
        $gia = $_GET['gia'];
        $soluong = $_GET['soluong'];
        $tonggia = $_GET['soluong'] * $_GET['gia'];
        $tongtien = $tonggia;
        $sql = "INSERT INTO `donhang`(`iddh`, `idkh`, `sdt`, `diachi`, `ngaydathang`, `trangthai`, `tongtien`) 
                    VALUES ('$iddh','$idkh','$sdt','$diachi','$ngayDatHang', '$trangThai','$tongtien')";
        executeResult($sql);
        $sqlctdh = "INSERT INTO `chitietdonhang`(`iddh`, `idsp`, `gia`, `soluong`, `tongtien`) 
                                VALUES ('$iddh','$idsp','$gia','$soluong','$tonggia')";
        executeResult($sqlctdh);
    } else {
        if (count($_SESSION['gio_hang']['list_sp']) > 0) {
            $tongtien = $_SESSION['gio_hang']['tongtien'];
            $sql = "INSERT INTO `donhang`(`iddh`, `idkh`, `sdt`, `diachi`, `ngaydathang`, `trangthai`, `tongtien`) 
                            VALUES ('$iddh','$idkh','$sdt','$diachi','$ngayDatHang', '$trangThai','$tongtien')";
            executeResult($sql);
            foreach ($_SESSION['gio_hang']['list_sp'] as $sp) {
                $idsp = $sp['idsp'];
                $gia = $sp['gia'];
                $soluong = $sp['soluong'];
                $tonggia = $sp['tonggia'];
                $sqlctdh = "INSERT INTO `chitietdonhang`(`iddh`, `idsp`, `gia`, `soluong`, `tongtien`) 
                                        VALUES ('$iddh','$idsp','$gia','$soluong','$tonggia')";
                executeResult($sqlctdh);
            }
        } else {
            echo '<script>alert("Vui lòng thêm sản phẩm vào giỏ hàng để thanh toán!")</script>';
            echo '<script>window.location= "index.php" </script>';
        }
    }
    array_splice($_SESSION["gio_hang"]['list_sp'], 0);
    $_SESSION["gio_hang"]['tongtien'] = 0;
    echo 'Thanh toán thành công!';
} else {
    echo '<script>alert("Vui lòng đăng nhập để thanh toán!")</script>';
    echo '<script>window.location= "?pages=dang_nhap" </script>';
}
