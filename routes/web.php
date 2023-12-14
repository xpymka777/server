<?php

use Src\Route;

//user
Route::add('GET', '/', [\Controller\User\HomeController::class, 'home'])
    ->middleware('auth', 'can:user');

//login
Route::add(['GET', 'POST'], '/login', [\Controller\User\LoginController::class, 'login']);
Route::add('GET', '/logout', [\Controller\User\LogoutController::class, 'logout'])
    ->middleware('auth');


//admin
Route::add('GET', '/admin', [\Controller\Admin\HomeAdmin::class, 'homeAdmin'])
    ->middleware('auth', 'can:admin');

//division
Route::add('GET', '/admin/division', [\Controller\Admin\Division\DivisionController::class, 'division'])
    ->middleware('auth', 'can:admin');
Route::add(['GET', 'POST'], '/admin/create-division', [\Controller\Admin\Division\DivisionCreateController::class, 'createDivision'])
    ->middleware('auth', 'can:admin');
Route::add(['GET', 'POST'], '/admin/update-division', [\Controller\Admin\Division\DivisionUpdateController::class, 'updateDivision'])
    ->middleware('auth', 'can:admin');
Route::add(['GET', 'POST'], '/admin/delete-division', [\Controller\Admin\Division\DivisionDeleteController::class, 'deleteDivision'])
    ->middleware('auth', 'can:admin');

//discipline
Route::add('GET', '/admin/discipline', [\Controller\Admin\Discipline\DisciplineController::class, 'discipline'])
    ->middleware('auth', 'can:admin');
Route::add(['GET', 'POST'], '/admin/create-discipline', [\Controller\Admin\Discipline\DisciplineCreate::class, 'createDiscipline'])
    ->middleware('auth', 'can:admin');
Route::add(['GET', 'POST'], '/admin/delete-discipline', [\Controller\Admin\Discipline\DisciplineDelete::class, 'deleteDiscipline'])
    ->middleware('auth', 'can:admin');
Route::add(['GET', 'POST'], '/admin/update-discipline', [\Controller\Admin\Discipline\DisciplineUpdate::class, 'updateDiscipline'])
    ->middleware('auth', 'can:admin');

//users
Route::add('GET', '/admin/user', [\Controller\Admin\Users\UsersController::class, 'users'])
    ->middleware('auth', 'can:admin');
Route::add(['GET', 'POST'], '/admin/create-user', [\Controller\Admin\Users\UsersCreateController::class, 'createUser'])
    ->middleware('auth', 'can:admin');
Route::add(['GET', 'POST'], '/admin/delete-user', [\Controller\Admin\Users\UsersDeleteController::class, 'deleteUser'])
    ->middleware('auth', 'can:admin');