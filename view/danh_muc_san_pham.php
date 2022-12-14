<div class="banner" id="banner">
    <div class="banner__conatiner row">
        <div class="banner__block col-lg-4">
            <img src="assets/img/banner-1.png" alt="" class="banner__img" />
            <div class="banner__inner">
                <div class="banner__content">
                    <h2>TRANG SỨC BẠC</h2>
                    <span>Giảm 50%</span>
                    <a href="" class="btn primary btn__banner">Xem ngay</a>
                </div>
            </div>
        </div>
        <div class="banner__block col-lg-4">
            <img src="assets/img/banner-2.png" alt="" class="banner__img" />
            <div class="banner__inner">
                <div class="banner__content">
                    <h2>TRANG SỨC HOT 2022</h2>
                    <span>Giảm 20%</span>
                    <a href="" class="btn primary btn__banner">Xem ngay</a>
                </div>
            </div>
        </div>
        <div class="banner__block col-lg-4">
            <img src="assets/img/banner-3.png" alt="" class="banner__img" />
            <div class="banner__inner">
                <div class="banner__content">
                    <h2>TRANG SỨC NỮ</h2>
                    <span>Giảm 40%</span>
                    <a href="" class="btn primary btn__banner">Xem ngay</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="body row">
    <div class="category col-lg-3">
        <div class="sidebar">
            <div class="sidebar__filter">
                <h3 class="sidebar__price-range">Khoảng giá</h3>
                <ul class="sidebar__price-list">
                    <li class="sidebar__price-item">
                        <input type="checkbox" value="all" id="option0" class="sidebar__form-input" checked />
                        <label for="option0">Tất cả</label>
                    </li>
                    <li class="sidebar__price-item">
                        <input type="checkbox" value="option1" id="option1" class="sidebar__form-input" />
                        <label for="option1">Nhỏ hơn 1.000.000₫</label>
                    </li>
                    <li class="sidebar__price-item">
                        <input type="checkbox" value="option2" id="option2" class="sidebar__form-input" />
                        <label for="option2">Từ 1.000.000₫ - 3.000.000₫</label>
                    </li>
                    <li class="sidebar__price-item">
                        <input type="checkbox" value="option3" id="option3" class="sidebar__form-input" />
                        <label for="option3">
                            Từ 3.000.000₫ - 7.000.000₫</label>
                    </li>
                    <li class="sidebar__price-item">
                        <input type="checkbox" value="option4" id="option4" class="sidebar__form-input" />
                        <label for="option4">Từ 7.000.000₫ - 10.000.000₫</label>
                    </li>
                    <li class="sidebar__price-item">
                        <input type="checkbox" value="option5" id="option5" class="sidebar__form-input" />
                        <label for="option5">
                            Lớn hơn 10.000.000₫</label>
                    </li>
                </ul>
            </div>
            <div class="sidebar__filter">
                <h3 class="sidebar__price-range">
                    Loại sản phẩm
                </h3>
                <ul class="sidebar__filter-list">
                    <?php
                    $sqlType = 'SELECT * FROM loaisp';
                    $listType = executeList($sqlType);
                    foreach ($listType as $item) {
                    ?>
                        <li class="sidebar__filter-item">
                            <input type="checkbox" value=<?= $item['idloai'] ?> id=<?= $item['idloai'] ?> class="sidebar__input-type" />
                            <label for=<?= $item['idloai'] ?>><?= $item['tenloai'] ?></label>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
    <div class="ctproduct col-lg-9">
        <div class="ctproduct__head">
            <h2 class="ctproduct__title">Sản phẩm</h2>
            <div class="ctproduct__head-right">
                <select name="sap_xep" id="sort">
                    <option value="">
                        --Lọc theo--
                    </option>
                    <option <?php if (isset($_GET['sort_by'])) {
                                if ($_GET['sort_by'] === 'priceLowToHigh') echo 'selected';
                            } ?> value="priceLowToHigh">
                        Giá từ thấp tới cao
                    </option>
                    <option <?php if (isset($_GET['sort_by'])) {
                                if ($_GET['sort_by'] === 'priceHighToLow') echo 'selected';
                            } ?> value="priceHighToLow">
                        Giá từ cao tới thấp
                    </option>
                    <option <?php if (isset($_GET['sort_by'])) {
                                if ($_GET['sort_by'] === 'AtoZ') echo 'selected';
                            } ?> value="AtoZ">
                        Theo bảng chữ cái từ A-Z
                    </option>
                    <option <?php if (isset($_GET['sort_by'])) {
                                if ($_GET['sort_by'] === 'ZtoA') echo 'selected';
                            } ?>value="ZtoA">
                        Theo bảng chữ cái từ Z-A
                    </option>
                </select>
            </div>
        </div>
        <div class="row" id="ctproduct">
        </div>
    </div>
</div>
</div>
<?php
if (isset($_GET['type'])) {
    echo "<script>
        var getType= '" . $_GET['type'] . "' 
        </script>";
}
?>