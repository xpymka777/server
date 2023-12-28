<nav class="list-group">
    <form method="post" class="search-from">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <input type="text" name="title" placeholder="Поиск" class="search">
        <button>Search</button>
    </form>
    <?php
    foreach ($discipline_list as $search){
        echo '<li>'.$search->title.'</li>';
    }
    ?>
    <p>Дисциплины</p>
    <div>
        <ul>
            <?php
            foreach ($disciplines as $discipline) {
                echo '<li>' . '<div>'   . '<a href=' . app()->route->getUrl('/admin/view-discipline') . '?id=' . $discipline->id .  '>'. '&nbsp;' . $discipline->title . '</a>' . '&nbsp;' . '<a href=' . app()->route->getUrl('/admin/update-discipline') . '?id=' . $discipline->id . '>' . 'Обновить' . '</a>' . '&nbsp;' . '<a href=' . app()->route->getUrl('/admin/delete-discipline') . '?id=' . $discipline->id . '>' . 'Удалить' . '</a>' . '</div>' . '</li>';
            }
            echo '<a href=' . app()->route->getUrl('/admin/create-discipline') . '>' . 'Создать' . '</a>';
            ?>
        </ul>
    </div>
</nav>