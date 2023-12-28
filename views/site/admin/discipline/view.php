<nav class="list-group">
    <p>Сотрудники дисциплины</p>
    <div>
        <ul>
            <?php
            foreach ($users as $user) {
                echo '<li>' . '<div>' . $user->getUser->name . '</div>' . '</li>';
            }
            ?>
        </ul>
    </div>
</nav>