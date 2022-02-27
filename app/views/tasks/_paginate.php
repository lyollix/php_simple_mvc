<?php $page = $data[2]['page'] ?? 1 ?>

<div>
    <ul class="pagination">
        <?php if ($data[0] > 1) {
            for($i = 0; $i < $data[0]; $i++) {
                echo '<li class="page-item '.($page == $i+1 ? 'active' : '').'"><a class="page-link" href="?page='.($i+1).'">'.($i+1).'</a></li>';
            }
        } ?>
    </ul>
</div>