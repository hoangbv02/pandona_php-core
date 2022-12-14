<div class="slider ">
    <div class="slide__list">
        <img src="assets/img/slider_1.png" alt="" class="slide__item" />
        <img src="assets/img/slider_2.png" alt="" class="slide__item" />
        <img src="assets/img/slider_3.png" alt="" class="slide__item" />
        <img src="assets/img/slider_4.png" alt="" class="slide__item" />
    </div>
    <button type="button" class="btn__prev">
        <i class="fa-solid fa-angle-left"></i>
    </button>
    <button type="button" class="btn__next">
        <i class="fa-solid fa-angle-right"></i>
    </button>
</div>

<div class="product">
    <div class="product__heading">
        <h2 class="product__title">SẢN PHẨM MỚI NHẤT</h2>
        <div class="icon-flower">
            <div class="img-inner">
                <img src="assets/img/icon-flower.png" alt="" />
            </div>
        </div>
    </div>
    <!-- Swiper -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <?php
            $sqlSamPham = 'SELECT * FROM sanpham ORDER by ngaytao DESC LIMIT 10';
            $listSanPham = executeList($sqlSamPham);
            foreach ($listSanPham as $sp) {
            ?>
                <div class="swiper-slide col-12 col-md-6 col-lg-3 m-0">
                    <form action="?pages=gio_hang&idsp=<?= $sp['idsp'] ?>" method="post" class="product__item">
                        <a href="?pages=chi_tiet_san_pham&idsp=<?= $sp['idsp'] ?>"><img src="assets/img/<?= $sp['anh'] ?>" alt="" class="item__img" /><a>
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
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
</div>
<div class="section">
    <img src="assets/img/slider_4.png" alt="">
    <div class="box">
        <div class="sub-box">
        </div>
        <div class="section__info">
            <p>Sản phẩm hot</p>
            <h2>Sản phẩm mùa hè</h2>
            <a class="btn primary" href="">Xem sản phẩm</a>
        </div>
    </div>
</div>
<div class="banner">
    <div class="banner__conatiner row">
        <div class="banner__block col-12 col-md-6 col-lg-4">
            <img src="assets/img/banner-1.png" alt="" class="banner__img" />
            <div class="banner__inner">
                <div class="banner__content">
                    <h2>TRANG SỨC BẠC</h2>
                    <span>Giảm 50%</span>
                    <a href="" class="btn primary btn__banner">Xem ngay</a>
                </div>
            </div>
        </div>
        <div class="banner__block col-12 col-md-6 col-lg-4">
            <img src="assets/img/banner-2.png" alt="" class="banner__img" />
            <div class="banner__inner">
                <div class="banner__content">
                    <h2>TRANG SỨC HOT 2022</h2>
                    <span>Giảm 20%</span>
                    <a href="" class="btn primary btn__banner">Xem ngay</a>
                </div>
            </div>
        </div>
        <div class="banner__block col-12 col-md-6 col-lg-4">
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

<div class="product">
    <div class="product__heading">
        <h2 class="product__title">SẢN PHẨM NỔI BẬT</h2>
        <div class="icon-flower">
            <div class="img-inner">
                <img src="assets//img/icon-flower.png" alt="" />
            </div>
        </div>
    </div>
    <!-- Swiper -->
    <div class="swiper mySwiperProdAuto">
        <div class="swiper-wrapper">
            <?php
            $sqlSamPham = 'SELECT * FROM sanpham LIMIT 10';
            $listSanPham = executeList($sqlSamPham);
            foreach ($listSanPham as $sp) {
            ?>
                <div class="swiper-slide col-lg-3 col-md-6 col-12 m-0">
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
        <div class="swiper-pagination"></div>
    </div>
</div>
<div class="product">
    <div class="product__heading">
        <h2 class="product__title">SẢN PHẨM KHÁC</h2>
        <div class="icon-flower">
            <div class="img-inner">
                <img src="assets//img/icon-flower.png" alt="" />
            </div>
        </div>
    </div>
    <div class="product__container row">
        <div class="product__block col-lg-3 col-md-6 col-12 p-0">
            <a href=""><img src="assets/img/cate2.jpg" alt="" class="product__img" /></a>
            <div class="product__inner">
                <h2>Túi sách</h2>
                <span>7 loại</span>
            </div>
        </div>
        <div class="product__block col-lg-3 col-md-6 col-12 p-0">
            <a href=""><img src="assets/img/cate3.jpg" alt="" class="product__img" /></a>
            <div class="product__inner">
                <h2>Váy - Đầm</h2>
                <span>3 loại</span>
            </div>
        </div>
        <div class="product__block col-lg-3 col-md-6 col-12 p-0">
            <a href=""><img src="assets/img/cate.jpg" alt="" class="product__img" /></a>
            <div class="product__inner">
                <h2>Mắt kính</h2>
                <span>5 loại</span>
            </div>
        </div>
        <div class="product__block col-lg-3 col-md-6 col-12 p-0">
            <a href=""><img src="assets/img/cate4.jpg" alt="" class="product__img" /></a>
            <div class="product__inner">
                <h2>Vòng đeo tay</h2>
                <span>15 loại</span>
            </div>
        </div>
    </div>
</div>
</div>
<div class="vts">
    <div class="vts__title">
        <h2>Về Trang Sức Pandona</h2>
        <span></span>
    </div>
    <p>Mỗi một người phụ nữ đều mang trong mình nét đẹp riêng & xứng đáng được ngưỡng mộ, được tôn vinh và được tự tin với chính con người mình. Phụ nữ luôn xứng đáng với những điều trọn vẹn nhất cho cuộc sống của mình: Hạnh phúc trọn vẹn, vẻ đẹp trọn vẹn và còn nhiều hơn thế. Pandona hơn cả một thương hiệu trang sức, mà còn là đại diện cho một phong cách sống của những giá trị hoàn mỹ xứng đáng nhất dành cho phụ nữ.
    </p>
    <p>"TRANG SỨC PANDONA – CHO PHỤ NỮ LUÔN TRỌN VẸN"</p>
    <a href="" class="btn">Chi tiết <i class="fa-solid fa-arrow-right"></i></a>
</div>
<div class="container">
    <div class="product">
        <div class="product__heading">
            <h2 class="product__title">TIN TỨC</h2>
            <div class="icon-flower">
                <div class="img-inner">
                    <img src="assets//img/icon-flower.png" alt="" />
                </div>
            </div>
        </div>
        <div class="product__container row">
            <a href="" class="product__card-item col-lg-4 col-md-6 col-12 p-0">
                <div class="product__card-img">
                    <img src="assets/img/nes3.jpg" alt="" />
                </div>
                <div class="card__body">
                    <h3>Vòng tay hình rắn đẹp ngỡ ngàng</h3>
                    <p>
                        Bạn có nghĩ rằng, rắn cũng có thể mang đến vẻ
                        đẹp quyến rũ cho đôi tay của bạn? Rắn là một
                        trong những biểu ...
                    </p>
                </div>
            </a>
            <a href="" class="product__card-item col-lg-4 col-md-6 col-12 p-0">
                <div class="product__card-img">
                    <img src="assets/img/news11.jpg" alt="" />
                </div>
                <div class="card__body">
                    <h3>
                        Lý Nhã Kỳ xuất hiện gợi cảm với váy cúp ngực và
                        trang sức kim cương
                    </h3>
                    <p>
                        Người đẹp Lý Nhã Kỳ xuất hiện với phong cách quý
                        phái, gợi cảm trong triển lãm kim cương tối
                        28/7. Tối 28/7, Lý Nhã Kỳ khai ...
                    </p>
                </div>
            </a>
            <a href="" class="product__card-item col-lg-4 col-md-6 col-12 p-0">
                <div class="product__card-img">
                    <img src="assets/img/news22.jpg" alt="" />
                </div>
                <div class="card__body">
                    <h3>
                        Ngọc trai – Phụ kiện đang được sao Việt mê mẩn
                        những ngày đầu năm 2019
                    </h3>
                    <p>
                        Bộ sưu tập “Bí mật đại dương” của thương hiệu
                        Long Beach Pearl vừa ra mắt nhận được sự ủng hộ
                        nhiệt tình từ các ...
                    </p>
                </div>
            </a>
        </div>
    </div>
</div>