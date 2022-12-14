<div class="page__list row">
    <?php
    $listSP = executeList($sqlSP);
    $sum = count($listSP);
    $sumPage = ceil($sum / $limit);
    if ($page > 1) {
        echo '<a href="#" class="page__item-link"  data-set= ' . ($page - 1) . '><i class="fa-solid fa-angle-left"></i></a> ';
    }
    for ($i = 1; $i <= $sumPage && $sumPage > 1; $i++) {
        if ($i == $page) {
            echo '
                <a href="#" class="page__item-link active"" data-set= ' . $i . '>' . $i . '</a> 
                ';
        } else {
            echo '
                <a href="#" class="page__item-link "  data-set= ' . $i . '>' . $i . '</a> 
                ';
        }
    }
    if ($page < $sumPage) {
        echo '<a href="#" class="page__item-link"  data-set= ' . ($page + 1) . '><i class="fa-solid fa-angle-right"></i></a> ';
    }
    ?>
</div>
<script>
    var pages = document.querySelectorAll('.page__item-link');
    pages.forEach(function(page) {
        page.onclick = function(e) {
            const data = this.getAttribute('data-set');
            $('#ctproduct').load(`view/xu_ly_danh_muc_san_pham.php?page=${data}&price=${price}&type=${type}`)
        }
    })
</script>