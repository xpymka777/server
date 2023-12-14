<?php

namespace Controller\User;

use Model\DisciplinesUsers;
use Model\DivisionsUsers;
use Src\Auth\Auth;
use Src\View;

class HomeController
{
    public function home(): string
    {
        $divisionsUsers = DivisionsUsers::where('id_user', Auth::user()->id)->first();
        $disciplinesUsers = DisciplinesUsers::where('id_user', Auth::user()->id)->get();
        return (new View())->render('site.home', ['divisionsUsers' => $divisionsUsers, 'disciplinesUsers' => $disciplinesUsers]);
    }
}