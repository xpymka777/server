<?php

namespace Controller\Admin\Division;

use Model\Division;
use Src\Request;

class DivisionDeleteController
{
    public function deleteDivision(Request $request)
    {
        $division = Division::where('id', $request->id)->first();
        if ($division->delete()) {
            app()->route->redirect('/admin/division');
        }
    }
}