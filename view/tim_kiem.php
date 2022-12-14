    <?php
    if (isset($_POST['submit'])) {
        $timKiem = $_POST['tim_kiem'];
        if ($timKiem) {
            $sqlSanPham = "SELECT * FROM `sanpham` WHERE `tensp` like '%$timKiem%'";
            $listSanPham = executeList($sqlSanPham);
            if (count($listSanPham) > 0) { ?>
                <h2 class="text-center">Kết quả tìm kiếm: <?= $timKiem ?></h2>
                <h3>Sản phẩm phù hợp nhất</h3>
                <div class="body row">
                    <?php
                    foreach ($listSanPham as $sp) {
                    ?>
                        <div class="swiper-slide col-lg-3">
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
                    <?php } ?>
                </div>
    <?php
            } else {
                echo 'Không tìm thấy sản phẩm nào khớp với lựa chọn của bạn.';
            }
        }else{
            echo '<script>window.location="index.php"</script>';
        }
    }
    ?>