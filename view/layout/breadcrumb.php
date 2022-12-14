<?php
if (isset($_GET['pages'])) {
    switch ($_GET['pages']) {
        case 'dang_ky':
            $page = 'Đăng ký';
            break;
        case 'dang_nhap':
            $page = 'Đăng nhập';
            break;
        case 'thong_tin':
            $page = 'Thông tin';
            break;
        case 'doi_mat_khau':
            $page = 'Đổi mật khẩu';
            break;
        case 'tim_kiem':
            $page = 'Tìm kiếm';
            break;
        case 'danh_muc_san_pham':
            if (isset($_GET['type'])) {
                $sql = "SELECT * FROM loaisp WHERE idloai= " . $_GET['type'] . "";
                $list = executeList($sql)[0];
                $page = $list['tenloai'];
            } else {
                $page = 'Sản phẩm';
            }
            break;
        case 'gio_hang':
            $page = "Giỏ hàng";
            break;
        case 'chi_tiet_san_pham':
            if (isset($_GET['idsp'])) {
                $sql = "SELECT * FROM sanpham,loaisp WHERE sanpham.idloai = loaisp.idloai and idsp= " . $_GET['idsp'] . "";
                $list = executeList($sql)[0];
                $page = $list['tenloai'];
                $subPage = $list['tensp'];
                $link = '?pages=danh_muc_san_pham&type=' . $list['idloai'] . '';
            }
            break;
        case 'thanh_toan':
            $page = "Thanh toán";
            break;
    }
}
