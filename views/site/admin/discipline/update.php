<div class="div-form">
    <p>Редактирование подразделения</p>
    <h3><?= $message ?? ''; ?></h3>
    <form action="" method="post" enctype="multipart/form-data">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <label for="title"><input type="text" name="title" placeholder="Название"
                                  value="<?= $discipline['title'] ?>"></label>
<!--        <label for="id"><input type="number" name="id" placeholder="Номер" value="--><?php //= $discipline['id'] ?><!--"></label>-->
        <button>Редактировать</button>
    </form>
</div>