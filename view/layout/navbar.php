<div class="navbar container">
    <div class="navbar__item">
        <a class="navbar__link <?php if (!isset($_GET['pages'])) {
                                    echo ' active';
                                } ?>" href="index.php">Trang chủ</a>
    </div>
    <div class="navbar__item">
        <a class="navbar__link <?php if (isset($_GET['pages'])) {
                                    if ($_GET['pages'] === 'danh_muc_san_pham') {
                                        echo ' active';
                                    }
                                } ?>" href="?pages=danh_muc_san_pham">Sản phẩm
            <i class="fa-sharp fa-solid fa-angle-down"></i></a>
        <ul class="menu__list">
            <?php
            $sql = 'SELECT * FROM loaisp';
            $list = executeList($sql);
            foreach ($list as $item) {
            ?>
                <li class="menu__item"><i class="fa-solid fa-angle-right"></i><a href="?pages=danh_muc_san_pham&type=<?= $item['idloai'] ?>"><?= $item['tenloai'] ?></a></li>
            <?php } ?>
        </ul>
    </div>
    <div class="navbar__item">
        <a class="navbar__link" href="">Tin tức</a>
    </div>
    <div class="navbar__item">
        <a class="navbar__link" href="">Giới thiệu</a>
    </div>
    <div class="navbar__item">
        <a class="navbar__link" href="">Liên hệ</a>
    </div>
</div>