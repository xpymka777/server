<nav class="list-group">
    <p>Пользователи</p>
    <div>
        <ul>
            <?php
            foreach ($users as $user) {
                echo '<li>' . '<div>' . '<a href=' . app()->route->getUrl('/admin/view-user') . '?id=' . $user->id . '>'. '&nbsp;' . $user->surname. '&nbsp;' . $user->name . '&nbsp;' .  '<a href=' . app()->route->getUrl('/admin/update-user') . '?id=' . $user->id . '>' . 'Обновить' . '</a>' . '&nbsp;' . '<a href=' . app()->route->getUrl('/admin/delete-user') . '?id=' . $user->id . '>' . 'Удалить' . '</a>'.'</div>' . '</li>';
            }
            echo '<a href=' . app()->route->getUrl('/admin/create-user') . '>' . 'Создать' . '</a>';
            ?>
        </ul>
    </div>
</nav>