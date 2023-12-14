<div class="div-form">
    <p>Редактирование подразделения</p>
    <h3><?= $message ?? ''; ?></h3>
    <form action="" method="post" enctype="multipart/form-data">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <label for="title"><input type="text" name="title" placeholder="Название"
                                  value="<?= $division['title'] ?>"></label>
        <label for="type"><input type="text" name="type" placeholder="Тип" value="<?= $division['type'] ?>"></label>
        <button>Редактировать</button>
    </form>
</div>