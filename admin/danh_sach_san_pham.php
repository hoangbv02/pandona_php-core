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
    $sqlsp = "SELECT *, sanpham.mota as mt FROM sanpham, loaisp WHERE sanpham.idloai= loaisp.idloai and tensp LIKE '%$search%' LIMIT $start_from, $limit";
    $sql = "SELECT *, sanpham.mota as mt FROM sanpham, loaisp WHERE sanpham.idloai= loaisp.idloai and tensp LIKE '%$search%'";
} else {
    $sqlsp = "SELECT *, sanpham.mota as mt FROM sanpham, loaisp WHERE sanpham.idloai= loaisp.idloai LIMIT $start_from, $limit";
    $sql = "SELECT *, sanpham.mota as mt FROM sanpham, loaisp WHERE sanpham.idloai= loaisp.idloai";
}
?>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h4 class="mb-4">Danh sách sản phẩm</h4>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <a href="?pages=them_san_pham" class="btn btn-outline-info m-2">Thêm sản phẩm<i class="ms-2 fa-solid fa-plus"></i></a>
                    <form class="d-md-flex w-50" method="get">
                        <input type="hidden" name="pages" value='danh_sach_san_pham'>
                        <input class="form-control bg-dark border-0" type="search" name="search" placeholder="Tìm kiếm..." value="<?= $search ?>">
                        <button type="submit" class="btn btn-square btn-primary ms-2"><i class="fa-solid fa-search"></i></button>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-dark text-center">
                        <thead>
                            <tr>
                                <th scope="col">Mã Sản phẩm</th>
                                <th scope="col">Ảnh sản phẩm</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Tên loại</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $list = executeList($sqlsp);
                            if (!$list) {
                                echo '<tr><td colspan="10">Không có sản phẩm nào!</td></tr>';
                            } else {
                                foreach ($list as $sp) { ?>
                                    <tr>
                                        <td scope="row"><?= $sp["idsp"] ?></td>
                                        <td><img src="../assets/img/<?= $sp["anh"] ?>" width="80px" height="80px" alt=""></td>
                                        <td><?= $sp["tensp"] ?></td>
                                        <td><?= $sp["tenloai"] ?></td>
                                        <td><?= $sp["soluong"] ?></td>
                                        <td><?= number_format($sp["gia"], 0, ',', '.') ?>đ</td>
                                        <td><?= $sp["mt"] ?></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Mới
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="xoa_san_pham.php?idsp=<?= $sp["idsp"] ?>&anh=<?= $sp["anh"] ?>" class="d-block btn btn-danger m-1"><i class="fa-solid fa-trash me-3"></i>Xóa</a></li>
                                                    <li><a href="?pages=sua_san_pham&idsp=<?= $sp["idsp"] ?>&idloai=<?= $sp["idloai"] ?>&anh=<?= $sp["anh"] ?>
                                                        &tensp=<?= $sp["tensp"] ?>&soluong=<?= $sp["soluong"] ?>&gia=<?= $sp["gia"] ?>&mota=<?= $sp["mota"] ?>" class="d-block btn btn-light m-1"><i class="fa-solid fa-pen-to-square me-3"></i>Sửa</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php include 'phan_trang.php' ?>
                </div>
            </div>
        </div>
    </div>
</div>