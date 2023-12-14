<nav class="list-group">
    <p>Подразделения</p>
    <div>
        <ul>
            <?php
            echo '<li>' . '<div>' . $divisionsUsers->getDivision->title . '</div>' . '</li>';
            ?>
        </ul>
    </div>
</nav>
<nav class="list-group">
    <p>Дисциплины</p>
    <div>
        <ul>
            <?php
            foreach ($disciplinesUsers as $disciplinesUser) {
                echo '<li>' . '<div>' . $disciplinesUser->getDiscipline->title . '</div>' . '</li>';
            }
            ?>
        </ul>
    </div>
</nav>
