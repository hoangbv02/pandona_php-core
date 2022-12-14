        <div class="header">
            <div class="header__top container">
                <div class="header__top-left">
                    <div class="contact">
                        <span>Địa chỉ</span>
                        <p>Số 209 Xã Đàn, Nam Đồng, Đống Đa, Hà Nội</p>
                    </div>
                    <div class="contact">
                        <span>HOTLINE</span>
                        <p>086.780.2860</p>
                    </div>
                </div>
                <a href="index.php" class="header__top-center">
                    <img src="assets/img/logo.png" alt="" class="logo" />
                </a>
                <div class="header__top-right">
                    <form action="?pages=tim_kiem" method="post" class="header__top-search">
                        <input autocomplete="off" type="text" placeholder="Tìm kiếm..." name="tim_kiem" oninput="search(this.value)" />
                        <button type="submit" name="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                        <div id="search__box">
                        </div>
                    </form>
                    <div class="header__top-cart">
                        <a class="header__top-icon" href='?pages=gio_hang'>
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span><?php
                                    if (isset($_SESSION['gio_hang']['list_sp'])) {
                                        echo count($_SESSION['gio_hang']['list_sp']);
                                    } else {
                                        echo '0';
                                    }
                                    ?></span>
                        </a>
                        <div class="header__cart">
                            <h3>Giỏ hàng</h3>
                            <ul class="header__cart-list">
                                <?php
                                if (isset($_SESSION['gio_hang']['list_sp'])) {
                                    if (count($_SESSION['gio_hang']['list_sp']) > 0) {
                                        $i = 0;
                                        foreach ($_SESSION['gio_hang']['list_sp'] as $sp) {
                                            echo '
                                                <li class="header__cart-item">
                                                <a href="?pages=chi_tiet_san_pham&idsp=' . $sp['idsp'] . '">
                                                    <img src="assets/img/' . $sp['anh'] . '" alt="">
                                                    <div class="header__cart-info">
                                                        <h4>' . $sp['tensp'] . '</h4>
                                                        <p>Số lượng: ' . $sp['soluong'] . '</p>
                                                        <span>Giá: ' . number_format($sp['gia'], 0, ',', '.') . 'đ</span>
                                                        <a href="?id=' . $i . '"><i class="header__cart-icon fa-solid fa-trash-can"></i><a >
                                                    </div>
                                                </a>
                                            </li>
                                                ';
                                            $i++;
                                        }
                                    } else {
                                        echo '<li class="header__cart-item">Chưa có sản phẩm nào được thêm vào giỏ hàng!</li>';
                                    }
                                }
                                ?>
                            </ul>
                            <h4 class="header__cart-sum">Tạm tính : <?php if (isset($_SESSION['gio_hang']['tongtien'])) echo number_format($_SESSION['gio_hang']['tongtien'], 0, ',', '.');
                                                                    else {
                                                                        echo '0';
                                                                    } ?>đ</h4>
                            <div class="header__cart-btn">
                                <a href="?pages=gio_hang" class="btn">Xem giỏ hàng</a>
                                <a href="?pages=thanh_toan" class="btn primary">Thanh toán</a>
                            </div>
                        </div>
                    </div>
                    <div class="header__top-user">
                        <?php
                        if (isset($_SESSION['login']['user'])) { ?>
                            <div class="header__user-login">
                                <img src="assets/img/user.jpg" alt="logo">
                            </div>
                            <ul class="header__action-list">
                                <li class="header__action-item"><a href="?pages=thong_tin">Thông tin tài khoản</a></li>
                                <li class="header__action-item"><a href="view/dang_xuat.php">Đăng xuất</a></li>
                            </ul>
                        <?php
                        } else { ?>
                            <span class="header__top-icon">
                                <i class="fa-solid fa-user"></i>
                            </span>
                            <ul class="header__action-list">
                                <li class="header__action-item"><a href="?pages=dang_nhap">Đăng nhập</a></li>
                                <li class="header__action-item"><a href="?pages=dang_ky&author=user">Đăng ký tài khoản</a></li>
                            </ul>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
        </div>