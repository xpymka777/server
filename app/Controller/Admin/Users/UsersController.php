<?php

namespace Controller\Admin\Users;

use Model\User;
use Src\View;

class UsersController
{
    public function users(): string
    {
        $users = User::all();
        return (new View())->render('site.admin.users.users', ['users' => $users]);
    }
}