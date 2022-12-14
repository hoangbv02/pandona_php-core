<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h4 class="mb-4">Thống kê sản phẩm</h4>
                <div class="table-responsive">
                    <table class="table table-dark text-center">
                        <thead>
                            <tr>
                                <th scope="col">Loại sản phẩm</th>
                                <th scope="col">Số lượng mặt hàng</th>
                                <th scope="col">Tổng số sản phẩm</th>
                                <th scope="col">Giá cao nhất</th>
                                <th scope="col">Giá thấp nhất</th>
                                <th scope="col">Giá trung binh</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $page = 1;
                            if (isset($_GET['page'])) {
                                $page = $_GET['page'];
                            }
                            $limit = 10;
                            $start_from = ($page - 1) * $limit;
                            $sql = "select loaisp.tenloai, COUNT(*) as 'soluong',SUM(soluong) as 'soluong1', MAX(sanpham.gia) as 'giacao', 
                            MIN(sanpham.gia) as 'giathap',  AVG(sanpham.gia) as 'giatb' from LoaiSP JOIN sanpham ON LoaiSP.idloai = sanpham.idloai GROUP BY loaiSP.idloai";
                            $list = executeList($sql);
                            if (!$list) {
                                echo '<tr><td colspan="10">Không có sản phẩm nào!</td></tr>';
                            } else {
                                foreach ($list as $row) { ?>
                                    <tr>
                                        <th scope="row"><?= $row["tenloai"] ?></th>
                                        <td><?= $row["soluong"] ?></td>
                                        <td><?= $row["soluong1"] ?></td>
                                        <td><?= number_format($row['giacao'], 0, ',', '.') ?>đ</td>
                                        <td><?= number_format($row['giathap'], 0, ',', '.') ?>đ</td>
                                        <td><?= number_format(round($row['giatb']), 0, ',', '.') ?>đ</td>
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