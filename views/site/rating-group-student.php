<nav class="info-student">
    <p>Оценки студента - <?= $student_names['surname'] . ' ' . $student_names['name'] ?>&emsp;( Группа - <?= $groups['number'] ?> )</p>
    <div>
        <p>Дисциплина</p>
        <p>Часы</p>
        <p>Семестр</p>
        <p>Контроль</p>
        <p>Оценка</p>
    </div>
    <nav>
        <div>
            <ul>
                <?php
                foreach ($rating_disciplines as $rating_discipline) {
                    echo '<li>' . '<div>' . $rating_discipline->ratingDisciplines->title. '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
        <div>
            <ul>
                <?php
                foreach ($rating_disciplines as $rating_discipline) {
                    echo '<li>' . '<div>' . $rating_discipline->ratingDisciplines->semester . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
        <div>
            <ul>
                <?php
                foreach ($rating_disciplines as $rating_discipline) {
                    echo '<li>' . '<div>' . $rating_discipline->ratingDisciplines->hours . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
        <div>
            <ul>
                <?php
                foreach ($rating_disciplines as $rating_discipline) {
                    echo '<li>' . '<div>' . $rating_discipline->ratingDisciplines->controlDisciplines->title . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
        <div>
            <ul>
                <?php
                foreach ($rating_disciplines as $rating_discipline) {
                    echo '<li>' . '<div>' . $rating_discipline->rating . '</div>' . '</li>';
                }
                ?>
            </ul>
        </div>
    </nav>
</nav>
