<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h6 class="mb-4">Thêm đơn hàng</h6>
                <form method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputTensp" class="form-label">Tên sản phẩm</label>
                        <select class="form-select mb-3" name="id_sp" required aria-label="Default select example" id="exampleInputTensp">
                            <option>--Chọn--</option>
                            <?php
                            $sql = "SELECT * FROM sanpham";
                            $listsp = executeList($sql);
                            foreach ($listsp as $sp) {
                                echo "
                                <option value=" . $sp['idsp'] . ">" . $sp['tensp'] . "</option>
                                ";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputSoluong" class="form-label">Số lượng</label>
                        <input type="number" required name="so_luong" class="form-control" id="exampleInputSoluong" placeholder="Nhập số điện thoại">
                    </div>
                    
                    <button type="submit" name="submit" class="btn btn-primary">Thêm đơn hàng</button>
                    <button type="reset" class="btn btn-light">Nhập lại</button>
                </form>
            </div>
        </div>
    </div>
</div>