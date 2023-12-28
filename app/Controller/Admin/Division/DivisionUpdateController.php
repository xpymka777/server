<?php

namespace Controller\Admin\Division;

use Model\Discipline;
use Model\Division;
use Model\DivisionsDisciplines;
use Src\Request;
use Src\Validator\Validator;
use Src\View;

class DivisionUpdateController
{
    public function updateDivision(Request $request): string
    {
        $division = Division::all();
        $disciplines = Discipline::all();
        if ($request->method === 'GET') {
            $division = Division::where('id', $request->id)->first();
        }

        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'title' => ['required'],
                'type' => ['required'],

            ], [
                'required' => 'Поле :field пусто',
            ]);
            if ($validator->fails()) {
                return new View('site.admin.division.update',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), ['division' => $division, 'disciplines' => $disciplines]]);
            }
            if (Division::where('id', $request->id)->update([
                    'csrf_token' => $request->csrf_token,
                    'title' => $request->title,
                    'type' => $request->type,
                ]) && DivisionsDisciplines::create([
                    'id_division' => $_GET['id'],
                    'id_discipline' => $request->id_discipline
                ])

            ) {
                app()->route->redirect('/admin/division');
                return false;
            }
        }
        return (new View())->render('site.admin.division.update', ['division' => $division, 'disciplines' => $disciplines]);
    }
}