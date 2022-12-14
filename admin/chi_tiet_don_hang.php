<?php
$iddh = '';
if (isset($_GET['iddh'])) {
    $iddh = $_GET['iddh'];
}
$sqlctdh = "SELECT *, chitietdonhang.soluong as sl FROM chitietdonhang, sanpham WHERE chitietdonhang.idsp= sanpham.idsp and chitietdonhang.iddh='$iddh'";
?>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h4 class="mb-4">Chi tiết đơn hàng</h4>
                <div class="table-responsive">
                    <table class="table table-dark text-center">
                        <thead>
                            <tr>
                                <th scope="col">Mã chi tiết đơn hàng</th>
                                <th scope="col">Mã đơn hàng</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $list = executeList($sqlctdh);
                            if (!$list) {
                                echo '<tr><td colspan="10">Không có sản phẩm nào!</td></tr>';
                            } else
                                foreach ($list as $ctdh) { ?>
                                <tr>
                                    <th scope="row"><?= $ctdh["idctdh"] ?></th>
                                    <td><?= $ctdh["iddh"] ?></td>
                                    <td><?= $ctdh["tensp"] ?></td>
                                    <td><?= number_format($ctdh["gia"], 0, ',', '.') ?>đ</td>
                                    <td><?= $ctdh["sl"] ?></td>
                                    <td><?= number_format($ctdh["tongtien"], 0, ',', '.') ?>đ</td>
                                </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>