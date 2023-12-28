<div class="div-form">
    <p>Редактирование пользователя</p>
    <h3><?= $message ?? ''; ?></h3>
    <form action="" method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <label for="login"><input type="text" name="login" placeholder="Логин" value="<?= $user['login'] ?>"></label>
        <label for="password"><input type="password" name="password" placeholder="Пароль" value="<?= $user['password'] ?>"></label>
        <label for="surname"><input type="text" name="surname" placeholder="Фамилия" value="<?= $user['surname'] ?>"></label>
        <label for="name"><input type="text" name="name" placeholder="Имя" value="<?= $user['name'] ?>"></label>
        <label for="patronymic"><input type="text" name="patronymic" placeholder="Отчество" value="<?= $user['patronymic'] ?>"></label>
        <label for="gender"><input type="text" name="gender" placeholder="Пол" value="<?= $user['gender'] ?>"></label>
        <label for="address"><input type="text" name="address" placeholder="Адресс" value="<?= $user['address'] ?>"></label>
        <label for="date"><input type="date" name="date" placeholder="Дата рождения" value="<?= $user['date'] ?>"></label>
        <!--       должности -->
        <label for="id_position">
            <select id="id_position" name="id_position">
                <?php foreach ($positions as $position) { ?>
                    <option value="<?= $position->id ?>"><?= $position->title ?></option>
                <?php } ?>
            </select>
        </label>
        <!--        подразделения-->
        <label for="id_division">
            <select id="id_division" name="id_division">
                <?php foreach ($divisions as $division) { ?>
                    <option value="<?= $division->id ?>"><?= $division->title ?></option>
                <?php } ?>
            </select>
        </label>
        <!--        дисциплины-->
        <label for="id_division">
            <select id="id_discipline" name="id_discipline">
                <?php foreach ($disciplines as $discipline) { ?>
                    <option value="<?= $discipline->id ?>"><?= $discipline->title ?></option>
                <?php } ?>
            </select>
        </label>
        <button>Редактировать</button>
    </form>
</div>