<h1>Show Page</h1>

<ul>
    <?php
        foreach ($data as $key => $value) {
            if ($key=='status') {
                $value = $value ? 'Выполнено' : 'Не выполнено';
            }
            echo '<li>'.$key.': '.$value.'</li>';
        }
            
    ?>

    <a href="/" class="btn btn-outline-secondary mt-3">Назад</a>
</ul>