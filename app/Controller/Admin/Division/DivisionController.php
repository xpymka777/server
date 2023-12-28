<?php

namespace Controller\Admin\Division;

use Model\DisciplinesUsers;
use Model\Division;
use Model\DivisionsUsers;
use Src\View;

class DivisionController
{
    public function division(): string
    {
        $divisions = Division::all();
        return (new View())->render('site.admin.division.division', ['divisions' => $divisions]);
    }
    public function view()
    {
        $users = DivisionsUsers::where('id_division', $_GET['id'])->get();
        return (new View())->render('site.admin.division.view', ['users' => $users]);
    }
}