<?php
session_start();
include 'config/dbhelper.php';
include 'view/layout/breadcrumb.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['gio_hang']['tongtien'] = $_SESSION['gio_hang']['tongtien'] - $_SESSION["gio_hang"]['list_sp'][$id]['tonggia'];
    array_splice($_SESSION["gio_hang"]['list_sp'], $id, 1);
    echo '<script>alert("Sản phẩm đã được xóa thành công!")</script>';
    echo '<script>window.location= "?pages=gio_hang" </script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
    <title><?php if (isset($_GET['pages'])) {
                $p = isset($subPage) ? $subPage : $page;
                echo $p;
            } else {
                echo 'Trang chủ';
            } ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/fontawesome/css/all.min.css" />
    <link rel="stylesheet" href="assets/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/responsive.css" />
    <link rel="stylesheet" href="assets/css/base.css" />

</head>

<body>
    <div class="container-fluid p-0">
        <?php include 'view/layout/header.php' ?>
        <?php include 'view/layout/navbar.php' ?>
        <?php
        if (isset($_GET['pages'])) { ?>
            <div class="breadcrumb">
                <div class="breadcrumb__wrapper container">
                    <a href="index.php">Trang chủ</a>
                    <span>/</span>
                    <a href=<?php if (isset($link)) echo $link ?>><?= $page ?></a>
                    <?php
                    if (isset($subPage)) { ?>
                        <a>/</a>
                        <a href=""><?= $subPage ?></a>
                    <?php }
                    ?>
                </div>
            </div>
        <?php } ?>
        <div class="container">
            <?php
            $pages = isset($_GET['pages']) ? $_GET['pages'] : 'trang_chu';
            include 'view/' . $pages . '.php';
            ?>
        </div>
        <?php include 'view/layout/footer.php' ?>
    </div>
    <a class="btn-top" href="#"><i class="fa-solid fa-arrow-up"></i></a>
    <?php
    if (!isset($_GET['pages'])) {
        echo '<script src="assets/js/slideShow.js"></script>';
    } else if (isset($_GET['pages']) && $_GET['pages'] == 'danh_muc_san_pham') {
        echo '<script src="assets/js/danh_muc_san_pham.js"></script>';
    }
    ?>
    <script src="assets/jquery/jquery-3.6.1.min.js"></script>
    <script src="assets/swiper/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>