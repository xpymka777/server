<nav class="list-group">
    <p>Дисциплины содтрудника</p>
    <div>
        <ul>
            <?php
            foreach ($disciplines as $discipline) {
                echo '<li>' . '<div>' . $discipline->getDiscipline->title .'</div>' . '</li>';
            }?>
        </ul>
    </div>
</nav>