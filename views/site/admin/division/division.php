<nav class="list-group">
    <p>Подразделения</p>
    <div>
        <ul>
            <?php
            foreach ($divisions as $division) {
                echo '<li>' . '<div>' . $division->title . '&nbsp;' . '<a href=' . app()->route->getUrl('/admin/update-division') . '?id=' . $division->id . '>' . 'Обновить' . '</a>' . '&nbsp;' . '<a href=' . app()->route->getUrl('/admin/delete-division') . '?id=' . $division->id . '>' . 'Удалить' . '</a>' . '</div>' . '</li>';
            }
            echo '<a href=' . app()->route->getUrl('/admin/create-division') . '>' . 'Создать' . '</a>';
            ?>
        </ul>
    </div>
</nav>