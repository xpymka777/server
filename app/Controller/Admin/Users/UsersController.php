<?php

namespace Controller\Admin\Users;

use Model\Discipline;
use Model\DisciplinesUsers;
use Model\User;
use Src\View;

class UsersController
{
    public function users(): string
    {
        $users = User::all();
        return (new View())->render('site.admin.users.users', ['users' => $users]);
    }
    public function view()
    {
        $disciplines = DisciplinesUsers::where('id_user', $_GET['id'])->get();
        return (new View())->render('site.admin.users.view', ['disciplines' => $disciplines]);
    }
}