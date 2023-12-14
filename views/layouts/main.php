<?php

use Src\Auth\Auth;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/server/public/assets/css/main.css">
    <link rel="stylesheet" href="/server/public/assets/css/form.css">
    <title>Учебно-методическое управление</title>
</head>
<body>
<header>
    <nav class="link">
        <?php
        if (app()->auth::check() && Auth::user()->getRole->title === 'user'): ?>
            <a href="<?= app()->route->getUrl('/') ?>">Главная</a>
        <?php endif; ?>
        <?php
        if (app()->auth::check() && Auth::user()->getRole->title === 'admin'): ?>
            <a href="<?= app()->route->getUrl('/admin') ?>">Главная</a>
        <?php endif; ?>
        <?php if (app()->auth::check() && Auth::user()->getRole->title === 'admin'): ?>
            <a href="<?= app()->route->getUrl('/admin/division') ?>">Подразделения</a>
            <a href="<?= app()->route->getUrl('/admin/discipline') ?>">Дисциплины</a>
            <a href="<?= app()->route->getUrl('/admin/user') ?>">Сотрудники</a>
        <?php endif; ?>
        <?php
        if (!app()->auth::check()):
            ?>
            <a href="<?= app()->route->getUrl('/login') ?>">Вход</a>
        <?php
        else:
            ?>
            <a href="<?= app()->route->getUrl('/logout') ?>">Выход (<?= app()->auth::user()->login ?>)</a>
        <?php
        endif;
        ?>
    </nav>
</header>
<main>
    <?= $content ?? '' ?>
</main>
<footer>
    <nav class="link"></nav>
</footer>
</body>
</html>