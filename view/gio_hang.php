<?php
$i = 0;
if (!isset($_SESSION["gio_hang"])) {
    $_SESSION["gio_hang"]['list_sp'] = [];
    $_SESSION["gio_hang"]['tongtien'] = 0;
}
if (isset($_GET['del_all_cart'])) {
    array_splice($_SESSION["gio_hang"]['list_sp'], 0);
    $_SESSION["gio_hang"]['tongtien'] = 0;
    echo '<script>window.location= "?pages=gio_hang" </script>';
};
if (isset($_POST['add'])) {
    $idsp = $_GET["idsp"];
    $sql = "SELECT * FROM sanpham WHERE idsp='$idsp'";
    $list = executeList($sql)[0];
    $fl = 0;
    if (isset($_SESSION["gio_hang"]['list_sp'])) {
        for ($i = 0; $i < count($_SESSION["gio_hang"]['list_sp']); $i++) {
            if ($_SESSION["gio_hang"]['list_sp'][$i]["idsp"] == $list["idsp"]) {
                $fl = 1;
                $soLuongNew = $_SESSION["gio_hang"]['list_sp'][$i]['soluong'] + 1;
                $_SESSION["gio_hang"]['list_sp'][$i]['soluong'] = $soLuongNew;
                echo '<script>alert("Cập nhật số lượng sản phẩm thành công!");</script>';
                echo '<script>window.location= "?pages=gio_hang" </script>';
                break;
            }
        }
    }
    if ($fl == 0) {
        $_SESSION["gio_hang"]['list_sp'][] = array(
            "idsp" => $list["idsp"],
            "idloai" => $list["idloai"],
            "tensp" => $list["tensp"],
            "soluong" => 1,
            "gia" => $list["gia"],
            "anh" => $list["anh"],
            "mota" => $list["mota"],
        );
        echo '<script>alert("Thêm sản phẩm vào giỏ hàng thành công!");</script>';
        echo '<script>window.location= "?pages=gio_hang" </script>';
    }
}
if (isset($_POST['chi_tiet_san_pham'])) {
    $idsp = $_GET["idsp"];
    $soLuong = $_POST["so_luong"];
    $sql = "SELECT * FROM sanpham WHERE idsp='$idsp'";
    $list = executeList($sql)[0];
    $fl = 0;
    if (isset($_SESSION["gio_hang"]['list_sp'])) {
        for ($i = 0; $i < count($_SESSION["gio_hang"]['list_sp']); $i++) {
            if ($_SESSION["gio_hang"]['list_sp'][$i]["idsp"] == $list["idsp"]) {
                $fl = 1;
                $soLuongNew = $_SESSION["gio_hang"]['list_sp'][$i]['soluong'] + $soLuong;
                $_SESSION["gio_hang"]['list_sp'][$i]['soluong'] = $soLuongNew;
                echo '<script>alert("Cập nhật số lượng sản phẩm thành công!");</script>';
                echo '<script>window.location= "?pages=gio_hang" </script>';
                break;
            }
        }
    }
    if ($fl == 0) {
        $_SESSION["gio_hang"]['list_sp'][] = array(
            "idsp" => $list["idsp"],
            "idloai" => $list["idloai"],
            "tensp" => $list["tensp"],
            "soluong" => $soLuong,
            "gia" => $list["gia"],
            "anh" => $list["anh"],
            "mota" => $list["mota"],
        );
        echo '<script>alert("Thêm sản phẩm vào giỏ hàng thành công!");</script>';
        echo '<script>window.location= "?pages=gio_hang" </script>';
    }
}
if (isset($_GET['action']) && isset($_GET['id_gh']) && isset($_GET['id_sp'])) {
    $id_gh = $_GET['id_gh'];
    $id_sp = $_GET['id_sp'];
    $sql = "SELECT * FROM `sanpham` WHERE idsp='$id_sp'";
    $list = executeList($sql)[0];
    switch ($_GET['action']) {
        case 'cong':
            $_SESSION["gio_hang"]['list_sp'][$id_gh]['soluong']++;
            if ($_SESSION["gio_hang"]['list_sp'][$id_gh]['soluong'] > $list['soluong']) $_SESSION["gio_hang"]['list_sp'][$id_gh]['soluong'] = $list['soluong'];
            echo '<script>window.location= "?pages=gio_hang" </script>';
            break;
        case 'tru':
            $_SESSION["gio_hang"]['list_sp'][$id_gh]['soluong']--;
            if ($_SESSION["gio_hang"]['list_sp'][$id_gh]['soluong'] < 0) $_SESSION["gio_hang"]['list_sp'][$id_gh]['soluong'] = 0;
            echo '<script>window.location= "?pages=gio_hang" </script>';
    }
}
?>
<form action="?pages=thanh_toan" method="post" class="cart">
    <h2>Giỏ hàng</h2>
    <table width="100%">
        <tr class="cart__row-header">
            <th colspan="5">Thông tin chi tiết sản phẩm</th>
            <th>Đơn giá</th>
            <th>Số lượng</th>
            <th>Tổng giá</th>
        </tr>
        <?php
        if (isset($_SESSION["gio_hang"]['list_sp'])) {
            if (count($_SESSION["gio_hang"]['list_sp']) > 0) {
                $tong = 0;
                $i = 0;
                foreach ($_SESSION["gio_hang"]['list_sp'] as $sp) {
                    $sp['tonggia'] = $sp['gia'] * $sp['soluong'];
                    $tong = $tong + $sp['tonggia'];
        ?>
                    <tr class="cart__row">
                        <td colspan="5">
                            <div class="cart__info">
                                <img src="assets/img/<?= $sp['anh'] ?>" alt="" />
                                <div class="cart__info-inner">
                                    <a class="cart__info-title" href="?pages=chi_tiet_san_pham&idsp=<?= $sp['idsp'] ?>">
                                        <?= $sp['tensp'] ?>
                                    </a>
                                    <a class="cart__info-del" href="?pages=gio_hang&id=<?= $i ?>"><i class="fa-solid fa-trash-can"></i></a>
                                </div>
                            </div>
                        </td>
                        <td><?= number_format($sp['gia'], 0, ',', '.') ?>đ</td>
                        <td>
                            <div class="cart__amount">
                                <a href="?pages=gio_hang&action=tru&id_gh=<?= $i ?>&id_sp=<?= $sp['idsp'] ?>">-</a>
                                <input type="number" disabled value=<?= $sp['soluong'] ?> />
                                <a href="?pages=gio_hang&action=cong&id_gh=<?= $i ?>&id_sp=<?= $sp['idsp'] ?>">+</a>
                            </div>
                        </td>
                        <td><?= number_format($sp['tonggia'], 0, ',', '.') ?>đ</td>
                    </tr>
        <?php
                    $_SESSION["gio_hang"]['list_sp'][$i]['tonggia'] = $sp['tonggia'];
                    $i++;
                }
                $_SESSION['gio_hang']['tongtien'] = $tong;
            } else {
                echo '<tr><td>Chưa có sản phẩm nào được thêm vào giỏ hàng!</td></tr>';
            }
        }
        ?>
    </table>
    <div class="cart__footer">
        <span name="tong">Tổng tiền:
            <?php
            if (isset($_SESSION['gio_hang']['tongtien'])) {
                echo number_format($_SESSION['gio_hang']['tongtien'], 0, ',', '.');
            } else echo '0'; ?>đ</span>
        <input type="hidden" name="tong_tien" id="" value=<?php if (isset($_SESSION['gio_hang']['tongtien'])) echo $_SESSION['gio_hang']['tongtien'] ?>>
        <div class="group-btn w-100 d-flex justify-content-between">
            <?php
            if (isset($_SESSION['gio_hang']['list_sp']) && count($_SESSION['gio_hang']['list_sp']) > 0) {
                echo '<a class="btn" href="?pages=gio_hang&del_all_cart=true">Xóa tất cả</a>';
            } else echo '<div></div>'; ?>
            <div class="cart__buy-mobile">
                <a class="btn" href="index.php">Tiếp tục mua hàng</a>
                <button class="btn primary" type="submit" name="thanh_toan">Thanh toán</button>
            </div>
        </div>
    </div>
</form>