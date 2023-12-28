<div class="div-form">
    <p>Создание дисциплины</p>
    <h3><?= $message ?? ''; ?></h3>
    <form action="" method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <label for="title"><input type="text" name="title" placeholder="Название"></label>
        <button>Создать</button>
    </form>
</div>