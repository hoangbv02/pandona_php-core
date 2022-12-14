<?php
$sql_kh = 'SELECT * FROM khachhang';
$sql_sp = 'SELECT * FROM sanpham';
$sql_da_dat_hang = 'SELECT * FROM donhang WHERE trangthai = "0"';
$sql_da_giao = 'SELECT * FROM donhang WHERE trangthai = "1"';
$list_kh = executeList($sql_kh);
$list_sp = executeList($sql_sp);
$list_da_dat_hang = executeList($sql_da_dat_hang);
$list_da_giao = executeList($sql_da_giao);
$sum_kh = count($list_kh);
$sum_sp = count($list_sp);
$sum_da_dat_hang = count($list_da_dat_hang);
$sum_da_giao = count($list_da_giao);
?>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa-solid fa-users fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Tổng số người</p>
                    <h6 class="mb-0"><?= $sum_kh ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Tổng số sản phẩm</p>
                    <h6 class="mb-0"><?= $sum_sp ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
            <i class="fa-regular fa-calendar-minus fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Tổng số đơn hàng chưa xử lý</p>
                    <h6 class="mb-0"><?= $sum_da_dat_hang ?></h6>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa-solid fa-circle-check fa-3x text-primary"></i>
                <div class="ms-3">
                    <p class="mb-2">Tổng số đơn hàng đã giao thành công</p>
                    <h6 class="mb-0"><?= $sum_da_giao ?></h6>
                </div>
            </div>
        </div>
    </div>
</div>