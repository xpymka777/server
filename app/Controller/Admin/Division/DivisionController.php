<?php

namespace Controller\Admin\Division;

use Model\Division;
use Src\View;

class DivisionController
{
    public function division(): string
    {
        $divisions = Division::all();
        return (new View())->render('site.admin.division.division', ['divisions' => $divisions]);
    }
}