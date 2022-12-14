<?php
include '../config/dbhelper.php';
$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
$limit = 9;
$start_from = ($page - 1) * $limit;
$search = null;
$sqlSP = "SELECT * FROM sanpham ";
if (isset($_GET['sort_by'])) {
    switch ($_GET['sort_by']) {
        case 'priceLowToHigh':
            $sqlSP = "SELECT * FROM sanpham ORDER BY gia ASC ";
            break;
        case 'priceHighToLow':
            $sqlSP = "SELECT * FROM sanpham ORDER BY gia DESC ";
            break;
        case 'AtoZ':
            $sqlSP = "SELECT * FROM sanpham ORDER BY tensp ASC ";
            break;
        case 'ZtoA':
            $sqlSP = "SELECT * FROM sanpham ORDER BY tensp DESC ";
            break;
    }
}
if (isset($_GET['price']) && isset($_GET['type'])) {
    $price = $_GET['price'];
    $id_loai = $_GET['type'];
    echo "<script>
    type = '" . $_GET['type'] . "'
    price = '" . $_GET['price'] . "'
    </script>";
    if (!$id_loai) {
        switch ($price) {
            case 'all':
                $sqlSP = "SELECT * FROM sanpham ";
                break;
            case 'option1':
                $sqlSP = "SELECT * FROM sanpham WHERE gia < 1000000 ";
                break;
            case 'option2':
                $sqlSP = "SELECT * FROM sanpham WHERE gia BETWEEN 1000000 and 3000000 ";
                break;
            case 'option3':
                $sqlSP = "SELECT * FROM sanpham WHERE gia BETWEEN 3000000 and 7000000 ";
                break;
            case 'option4':
                $sqlSP = "SELECT * FROM sanpham WHERE gia BETWEEN 7000000 and 10000000 ";
                break;
            case 'option5':
                $sqlSP = "SELECT * FROM sanpham WHERE gia > 10000000 ";
                break;
        }
    } else {
        switch ($price) {
            case 'all':
                $sqlSP = "SELECT *FROM sanpham , loaisp WHERE loaisp.idloai = sanpham.idloai and sanpham.idloai='$id_loai' ";
                break;
            case 'option1':
                $sqlSP = "SELECT *FROM sanpham , loaisp WHERE loaisp.idloai = sanpham.idloai and sanpham.idloai='$id_loai' and gia < 1000000 ";
                break;
            case 'option2':
                $sqlSP = "SELECT *FROM sanpham , loaisp WHERE loaisp.idloai = sanpham.idloai and sanpham.idloai='$id_loai' and gia BETWEEN 1000000 and 3000000 ";
                break;
            case 'option3':
                $sqlSP = "SELECT *FROM sanpham , loaisp WHERE loaisp.idloai = sanpham.idloai and sanpham.idloai='$id_loai' and gia BETWEEN 3000000 and 7000000 ";
                break;
            case 'option4';
                $sqlSP = "SELECT *FROM sanpham , loaisp WHERE loaisp.idloai = sanpham.idloai and sanpham.idloai='$id_loai' and gia BETWEEN 7000000 and 10000000 ";
                break;
            case 'option5':
                $sqlSP = "SELECT *FROM sanpham , loaisp WHERE loaisp.idloai = sanpham.idloai and sanpham.idloai='$id_loai' and gia > 10000000 ";
                break;
        }
    }
}
$sql = $sqlSP . " LIMIT $start_from, $limit";
$list = executeList($sql);
if (isset($list)) {
    if (count($list) > 0) {
        for ($i = 0; $i < count($list); $i++) { ?>
            <div class="col-lg-4 col-md-6 col-6 p-2">
                <form action='?pages=gio_hang&idsp=<?= $list[$i]['idsp']; ?>' method="post" class="product__item">
                    <a href="?pages=chi_tiet_san_pham&idsp=<?= $list[$i]['idsp']; ?>"><img src="assets/img/<?= $list[$i]['anh'] ?>" alt="" class="item__img" /><a>
                            <div class="item__body">
                                <h3 class="title">
                                    <a href="?pages=chi_tiet_san_pham&idsp=<?= $list[$i]['idsp']; ?>"><?= $list[$i]['tensp'] ?></a>
                                </h3>
                                <div class="price"><?= number_format($list[$i]['gia'], 0, ',', '.') ?>đ</div>
                                <input type="submit" name="add" value="Thêm vào giỏ hàng" class="btn">
                            </div>
                </form>
            </div>
<?php }
    } else {
        echo '<div class="col">Không có sản phẩm nào!</div>';
    }
}  ?>
<?php include 'layout/phan_trang.php'; ?>