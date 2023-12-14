<div class="div-form">
    <p>Создание подразделения</p>
    <h3><?= $message ?? ''; ?></h3>
    <form action="" method="post">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <label for="title"><input type="text" name="title" placeholder="Название"></label>
        <label for="type"><input type="text" name="type" placeholder="Тип"></label>
        <button>Создать</button>
    </form>
</div>