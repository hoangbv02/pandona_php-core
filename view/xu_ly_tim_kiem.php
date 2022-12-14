<?php
if (isset($_GET['q'])) {
    include '../config/dbhelper.php';
    $value = $_GET['q'];
    $sql = "SELECT * FROM `sanpham` WHERE `tensp` like '%$value%'";
    $list = executeList($sql);
    if ($list) {
        foreach ($list as $item) {
            echo '<div class="search__item" onmouseover="setValue(this)"><i class="my-2 mx-2 fa-solid fa-magnifying-glass"></i>' . $item["tensp"] . '</div>';
        }
    } else {
        echo '<div class="search__item">Không tìm thấy sản phẩm!</div>';
    }
}
