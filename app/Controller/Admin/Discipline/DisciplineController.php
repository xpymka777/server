<?php

namespace Controller\Admin\Discipline;

use Model\Discipline;
use Model\Division;
use Src\View;

class DisciplineController
{
    //просто отображает мне данные
    public function discipline(): string
    {
        $disciplines = Discipline::all();
        return (new View())->render('site.admin.discipline.discipline', ['disciplines' => $disciplines]);
    }
}

