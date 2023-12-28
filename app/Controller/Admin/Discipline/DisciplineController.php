<?php

namespace Controller\Admin\Discipline;

use Model\Discipline;
use Model\DisciplinesUsers;
use Src\View;

class DisciplineController
{
    //просто отображает мне данные
    public function discipline($request): string
    {
      $disciplines = Discipline::all();

        if ($request->method === "POST") {
            $discipline_list = Discipline::where('title', 'like', '%' . $request->title . '%')->get();
        } else {
            $discipline_list = Discipline::orderBy('title')->get();
        }

        return (new View())->render('site.admin.discipline.discipline', ['disciplines' => $disciplines,'discipline_list'=>$discipline_list]);
    }

    public function view()
    {
        $users = DisciplinesUsers::where('id_discipline', $_GET['id'])->get();
        return (new View())->render('site.admin.discipline.view', ['users' => $users]);
    }
}

