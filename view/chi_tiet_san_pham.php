<?php
if (isset($_GET['idsp'])) {
    $idsp = $_GET['idsp'];
    $sql = "SELECT *,loaisp.mota as mtloai, sanpham.mota as mtsp FROM sanpham,loaisp WHERE sanpham.idloai= loaisp.idloai and idsp = '$idsp'";
    $list = executeList($sql)[0];
?>
    <div class="product__single">
        <div class="row">
            <div class="col-lg-6 col-12">
                <img src="assets/img/<?= $list['anh'] ?>" alt="" />
            </div>
            <div class="col-lg-6 col-12">
                <form action="?pages=gio_hang&idsp=<?= $list['idsp'] ?>&page=chi_tiet_san_pham" method="post" class="product__single-info">
                    <h2 class="product__single-title">
                        <?= $list['tensp'] ?>
                    </h2>
                    <p class="product__single-price"><?= number_format($list['gia'], 0, ',', '.') ?>đ</p>
                    <p class="product__single-type">Loại sản phẩm: <?= $list['tenloai'] ?></p>
                    <p class="product__single-type">Mô tả loại sản phẩm: <?= $list['mtloai'] ?></p>
                    <div class="product__single-quantity">
                        <label for="input-quantity">Số lượng :</label>
                        <span class="down">-</span>
                        <input type="text" value="1" id="input-quantity" name="so_luong" />
                        <span class="up">+</span>
                        <input type="hidden" value="<?= $list['gia'] ?>" name="gia" />
                        <input type="hidden" value="<?= $list['soluong'] ?>" name="sl" />
                        <input type="hidden" value="<?= $list['idsp'] ?>" name="idsp" />
                    </div>
                    <div class="product__single-btn">
                        <button type="submit" class="btn" name='chi_tiet_san_pham'>
                            Thêm vào giỏ
                        </button>
                        <button type="button" class="btn" name='thanh_toan'>
                            Mua ngay
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <script>
            const valueIdsp = document.querySelector('input[name="idsp"]').value;
            const soLuong = document.querySelector('input[name="so_luong"]');
            const valueGia = document.querySelector('input[name="gia"]').value;
            const valueSl = document.querySelector('input[name="sl"]').value;
            const btnThanhToan = document.querySelector('button[name="thanh_toan"]');
            const down = document.querySelector('.down');
            const up = document.querySelector('.up');
            var valueSoLuong = soLuong.value;
            down.addEventListener('click', function() {
                if (soLuong.value > 0) {
                    valueSoLuong = soLuong.value--;
                }
            })
            up.addEventListener('click', function() {
                if (valueSl - 1 > valueSoLuong)
                    valueSoLuong = soLuong.value++;
            })
            btnThanhToan.addEventListener('click', function() {
                window.location = `?pages=thanh_toan&idsp=${valueIdsp}&soluong=${soLuong.value}&gia=${valueGia}&chi_tiet_san_pham`
            })
        </script>
        <div class="product__single-description">
            <div class="title">
                <h3>
                    Mô tả
                </h3>
            </div>
            <p><?= $list['mtsp'] ?></p>
        </div>
    </div>
    <div class="product">
        <div class="product__heading">
            <h2 class="product__title">SẢN PHẨM LIÊN QUAN</h2>
        </div>
        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <?php
                $sqlSamPham = "SELECT * FROM sanpham WHERE idloai= " . $list['idloai'] . " and idsp !=" . $list['idsp'] . " LIMIT 10";
                $listSanPham = executeList($sqlSamPham);
                if (count($listSanPham) > 0) {
                    foreach ($listSanPham as $sp) {
                ?>
                        <div class="swiper-slide col-12 col-md-6 col-lg-3 m-0">
                            <form action="?pages=gio_hang&idsp=<?= $sp['idsp'] ?>" method="post" class="product__item">
                                <a href="?pages=chi_tiet_san_pham&idsp=<?= $sp['idsp'] ?>"><img src="assets/img/<?= $sp['anh'] ?> " alt="" class="item__img" /><a>
                                        <div class="item__body">
                                            <h3 class="title">
                                                <a href="?pages=chi_tiet_san_pham&idsp=<?= $sp['idsp'] ?>"><?= $sp['tensp'] ?></a>
                                            </h3>
                                            <div class="price"><?= number_format($sp['gia'], 0, ',', '.') ?>đ</div>
                                            <input type="submit" name="add" value="Thêm vào giỏ hàng" class="btn btn__prd">
                                        </div>
                            </form>
                        </div>
                <?php }
                } else {
                    echo 'Không có sản phẩm liên quan nào!';
                } ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
<?php } ?>