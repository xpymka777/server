<nav class="list-group">
    <p>Пользователи</p>
    <div>
        <ul>
            <?php
            foreach ($users as $user) {
                echo '<li>' . '<div>' . $user->surname. '&nbsp;' .$user->name. '&nbsp;' .$user->patronymic. '&nbsp;' .$user->login . '&nbsp;' . $user->password  . '&nbsp;' . '<a href=' . app()->route->getUrl('/admin/delete-user') . '?id=' . $user->id . '>' . 'Удалить' . '</a>'.'</div>' . '</li>';
            }
            echo '<a href=' . app()->route->getUrl('/admin/create-user') . '>' . 'Создать' . '</a>';
            ?>
        </ul>
    </div>
</nav>