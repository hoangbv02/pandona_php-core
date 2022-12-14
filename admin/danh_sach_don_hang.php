<?php
$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}
$limit = 10;
$start_from = ($page - 1) * $limit;
$search = null;
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sqldh = "SELECT *, dh.sdt as dienthoai, dh.diachi as dc, dh.tongtien as tt FROM donhang as dh, khachhang as kh WHERE dh.idkh= kh.idkh and kh.tenkh LIKE '%$search%' LIMIT $start_from, $limit";
    $sql = "SELECT *, dh.sdt as dienthoai, dh.diachi as dc, dh.tongtien as tt FROM donhang as dh, khachhang as kh WHERE dh.idkh= kh.idkh and kh.tenkh LIKE '%$search%'";
} else {
    $sqldh = "SELECT *, dh.sdt as dienthoai, dh.diachi as dc, dh.tongtien as tt FROM donhang as dh, khachhang as kh WHERE dh.idkh= kh.idkh LIMIT $start_from, $limit";
    $sql = "SELECT *, dh.sdt as dienthoai, dh.diachi as dc, dh.tongtien as tt FROM donhang as dh, khachhang as kh WHERE dh.idkh= kh.idkh";
}
?>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h4 class="mb-4">Danh sách đơn hàng</h4>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <a href="?pages=them_don_hang" class="btn btn-outline-info m-2">Thêm đơn hàng<i class="ms-2 fa-solid fa-plus"></i></a>
                    <form class="d-md-flex w-50" method="get">
                        <input type="hidden" name="pages" value='danh_sach_don_hang'>
                        <input class="form-control bg-dark border-0" type="search" name="search" placeholder="Tìm kiếm..." value="<?= $search ?>">
                        <button type="submit" class="btn btn-square btn-primary ms-2"><i class="fa-solid fa-search"></i></button>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-dark text-center">
                        <thead>
                            <tr>
                                <th scope="col">Mã đơn hàng</th>
                                <th scope="col">Tên khách hàng</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Ngày đặt hàng</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Tổng tiền</th>
                                <th scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $list = executeList($sqldh);
                            if (!$list) {
                                echo '<tr><td colspan="10">Không có đơn hàng nào!</td></tr>';
                            } else
                                foreach ($list as $dh) { ?>
                                <tr>
                                    <th scope="row"><?= $dh["iddh"] ?></th>
                                    <td><?= $dh["tenkh"] ?></td>
                                    <td><?= $dh["dienthoai"] ?></td>
                                    <td><?= $dh["dc"] ?></td>
                                    <td><?= $dh["ngaydathang"] ?></td>
                                    <td><?php if ($dh["trangthai"]) {
                                            echo "Đã giao hàng";
                                        } else {
                                            echo "Đã đặt hàng";
                                        } ?></td>
                                    <td><?= number_format($dh["tt"], 0, ',', '.') ?>đ</td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                Mới
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="?pages=chi_tiet_don_hang&iddh=<?= $dh["iddh"] ?>" class="d-block btn btn-info m-1">
                                                        <i class="fa-solid fa-eye me-3"></i>Xem</a></li>
                                                <li><a href="./xoa_don_hang.php?iddh=<?= $dh["iddh"] ?>" class="d-block btn btn-danger m-1">
                                                        <i class="fa-solid fa-trash me-3"></i>Xóa</a></li>
                                                <li><a href="?pages=sua_don_hang&iddh=<?= $dh["iddh"] ?>&idkh=<?= $dh["idkh"] ?>&sdt=<?= $dh["sdt"] ?>&diachi=<?= $dh["dc"] ?>&ngaydathang=<?= $dh["ngaydathang"] ?>&trangthai=<?= $dh["trangthai"] ?>&tongtien=<?= $dh["tongtien"] ?>" class="d-block btn btn-light m-1"><i class="fa-solid fa-pen-to-square me-3"></i>Sửa</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                    <?php include 'phan_trang.php'; ?>
                </div>
            </div>
        </div>
    </div>
</div>