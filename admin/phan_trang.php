<div class="btn-toolbar" role="toolbar">
    <div class="btn-group me-2" role="group" aria-label="First group">
        <?php
        $pages = $_GET["pages"];
        $sum = count(executeList($sql));
        $sumPage = ceil($sum / $limit);
        $isAfter = false;
        $isBefore = false;
        $pageAvailable = [1, 2, $page - 1, $page, $page + 1, $sumPage - 1, $sumPage];
        if ($page > 1) {
            echo '
                <a href="?pages=' . $pages . '&page=' . ($page - 1) . '&search=' . $search . '" class="btn btn-light"><i class="fa-solid fa-chevron-left"></i></a>
                ';
        }
        for ($i = 1; $i <= $sumPage && $sumPage > 1; $i++) {
            if (!in_array($i, $pageAvailable)) {
                if ($i < $page && !$isAfter) {
                    echo '
                        <a href="?pages=' . $pages . '&page=' . ($page - 2) . '" class="btn ">...</a>
                        ';
                    $isAfter = true;
                }
                if ($i > $page && !$isBefore) {
                    echo '
                        <a href="?pages=' . $pages . '&page=' . ($page + 2) . '" class="btn ">...</a>
                        ';
                    $isBefore = true;
                }
                continue;
            }
            if ($i == $page) {
                echo '
                    <a href="?pages=' . $pages . '&page=' . $i . '&search=' . $search . '" class="btn btn-primary">' . $i . '</a>
                    ';
            } else {
                echo '
                    <a href="?pages=' . $pages . '&page=' . $i . '&search=' . $search . '" class="btn ">' . $i . '</a>
                    ';
            }
        }
        if ($page < $sumPage) {
            echo '
                <a href="?pages=' . $pages . '&page=' . ($page + 1) . '&search=' . $search . '" class="btn btn-light"><i class="fa-solid fa-chevron-right"></i></a>                                             
                ';
        }
        ?>
    </div>
</div>