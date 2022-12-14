<h3 class="text-center mb-5 ">Tài khoản của bạn</h3>
<div class="row info">
    <div class="col-lg-4 col-12">
        <div class="info__acc">
            <h4>Thông tin tài khoản</h4>
            <p>Tên: <span><?= $_SESSION['login']['user']['tenkh'] ?></span></p>
            <p>Giới tính: <span><?= $_SESSION['login']['user']['gioitinh'] ?></span></p>
            <p>Số điện thoại: <span><?= $_SESSION['login']['user']['sdt'] ?></span></p>
            <p>Email: <span><?= $_SESSION['login']['user']['email'] ?></span></p>
            <p>Ngày sinh: <span><?= $_SESSION['login']['user']['ngaysinh'] ?></span></p>
            <p>Địa chỉ: <span><?= $_SESSION['login']['user']['diachi'] ?></span></p>
            <a href="?pages=doi_mat_khau" class="btn primary">Đổi mật khẩu</a>
        </div>
    </div>
    <div class="col-lg-8 col-12">
        <div class="info_history">
            <h4>Lịch sử giao dịch</h4>
            <?php
            $sqldh = "select * from donhang";
            $listdh = executeList($sqldh);
            if (count($listdh) > 0) {
            ?>
                <table width="100%">
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Ngày đặt hàng</th>
                        <th>Trạng thái</th>
                        <th>Tổng tiền</th>
                    </tr>
                    <?php
                    foreach ($listdh as $dh) {
                    ?>
                        <tr>
                            <td>
                                <?php
                                $sqlctdh = "select sanpham.gia, chitietdonhang.idsp, sanpham.tensp, sanpham.anh, chitietdonhang.soluong from chitietdonhang, sanpham where chitietdonhang.iddh= " . $dh['iddh'] . " and chitietdonhang.idsp= sanpham.idsp";
                                $listctdh = executeList($sqlctdh);
                                foreach ($listctdh as $ctdh) {
                                    echo '<div class="info__sub">
                                <img src="assets/img/' . $ctdh['anh'] . '" alt="">
                                <div class="info__sub-inner">
                                    <a href="?pages=chi_tiet_san_pham&idsp=' . $ctdh['idsp'] . '">' . $ctdh["tensp"] . '</a>' . ' 
                                    <p>Số lượng: ' . $ctdh["soluong"] . '</p>
                                    <p>Giá: ' . number_format($ctdh["gia"], 0, ',', '.') . 'đ</p>
                                </div>
                                </div>';
                                }
                                ?>
                            </td>
                            <td><?= $dh['ngaydathang'] ?></td>
                            <td><?php if ($dh["trangthai"]) {
                                    echo "Đã giao hàng";
                                } else {
                                    echo "Đã đặt hàng";
                                } ?></td>
                            <td><?= number_format($dh['tongtien'], 0, ',', '.') ?>đ</td>
                        </tr>
                    <?php } ?>
                </table>
            <?php } else {
                echo 'Bạn chưa có đơn hàng nào!';
            } ?>
        </div>
    </div>
</div>