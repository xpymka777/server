<nav class="list-group">
    <p>Дисциплины</p>
    <div>
        <ul>
            <?php
            foreach ($disciplines as $discipline) {
                echo '<li>' . '<div>' . $discipline->title . '&nbsp;' . '<a href=' . app()->route->getUrl('/admin/update-discipline') . '?id=' . $discipline->id . '>' . 'Обновить' . '</a>' . '&nbsp;' . '<a href=' . app()->route->getUrl('/admin/delete-discipline') . '?id=' . $discipline->id . '>' . 'Удалить' . '</a>' . '</div>' . '</li>';
            }
            echo '<a href=' . app()->route->getUrl('/admin/create-discipline') . '>' . 'Создать' . '</a>';
            ?>
        </ul>
    </div>
</nav>