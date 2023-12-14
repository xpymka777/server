<?php

namespace Controller\Admin\Discipline;

use Model\Discipline;
use Model\Division;
use Src\Request;

class DisciplineDelete
{
    //удаляет выбранное
    public function deleteDiscipline(Request $request)
    {
        $discipline = Discipline::where('id', $request->id)->first();
        if ($discipline->delete()) {
            app()->route->redirect('/admin/discipline');
        }
    }
}