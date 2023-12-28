<div class="div-form">
    <p>Редактирование подразделения</p>
    <h3><?= $message ?? ''; ?></h3>
    <form action="" method="post" enctype="multipart/form-data">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <label for="title"><input type="text" name="title" placeholder="Название"
                                  value="<?= $division['title'] ?>"></label>
        <label for="type"><input type="text" name="type" placeholder="Тип" value="<?= $division['type'] ?>"></label>
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