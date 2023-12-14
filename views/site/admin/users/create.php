<div class="div-form">
    <p>Создание пользователя</p>
    <h3><?= $message ?? ''; ?></h3>
    <form action="" method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <label for="login"><input type="text" name="login" placeholder="Логин"></label>
        <label for="password"><input type="password" name="password" placeholder="Пароль"></label>
        <label for="surname"><input type="text" name="surname" placeholder="Фамилия"></label>
        <label for="name"><input type="text" name="name" placeholder="Имя"></label>
        <label for="patronymic"><input type="text" name="patronymic" placeholder="Отчество"></label>
        <label for="gender"><input type="text" name="gender" placeholder="Пол"></label>
        <label for="address"><input type="text" name="address" placeholder="Адресс"></label>
        <label for="date"><input type="date" name="date" placeholder="Дата рождения"></label>
        <button>Создать</button>
    </form>
</div>