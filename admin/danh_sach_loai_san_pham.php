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
    $sqllsp = "SELECT * FROM loaisp WHERE tenloai LIKE '%$search%' LIMIT $start_from, $limit";
    $sql = "SELECT * FROM loaisp WHERE tenloai LIKE '%$search%'";
} else {
    $sqllsp = "SELECT * FROM loaisp LIMIT $start_from, $limit";
    $sql = "SELECT * FROM loaisp";
}
?>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">

            <div class="bg-secondary rounded h-100 p-4">
                <h4 class="mb-4">Danh sách loại sản phẩm</h4>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <a href="?pages=them_loai_san_pham" class="btn btn-outline-info m-2">Thêm loại sản phẩm<i class="ms-2 fa-solid fa-plus"></i></a>
                    <form class="d-md-flex w-50" method="get">
                        <input type="hidden" name="pages" value='danh_sach_loai_san_pham'>
                        <input class="form-control bg-dark border-0" type="search" name="search" placeholder="Tìm kiếm..." value="<?= $search ?>">
                        <button type="submit" class="btn btn-square btn-primary ms-2"><i class="fa-solid fa-search"></i></button>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-dark text-center">
                        <thead>
                            <tr>
                                <th scope="col">Mã loại</th>
                                <th scope="col">Tên loại</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $list = executeList($sqllsp);
                            if (!$list) {
                                echo '<tr><td colspan="10">Không có loại sản phẩm nào!</td></tr>';
                            } else {
                                foreach ($list as $lsp) { ?>
                                    <tr>
                                        <th scope="row"><?= $lsp["idloai"] ?></th>
                                        <td><?= $lsp["tenloai"] ?></td>
                                        <td><?= $lsp["mota"] ?></td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Mới
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a href="./xoa_loai_san_pham.php?idloai=<?= $lsp["idloai"] ?>" class="d-block btn btn-danger m-1">
                                                    <i class="fa-solid fa-trash me-3"></i>Xóa</a></li>
                                                    <li><a href="?pages=sua_loai_san_pham&idloai=<?= $lsp["idloai"] ?>&tenloai=<?= $lsp["tenloai"] ?>
                                                    &mota=<?= $lsp["mota"] ?>" class="d-block btn btn-light m-1"><i class="fa-solid fa-pen-to-square me-3"></i>Sửa</a></li>
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