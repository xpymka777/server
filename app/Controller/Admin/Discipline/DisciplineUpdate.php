<?php

namespace Controller\Admin\Discipline;

use Model\Discipline;
use Src\Request;
use Src\Validator\Validator;
use Src\View;

class DisciplineUpdate
{
    public function updateDiscipline(Request $request): string
    {
        $discipline = Discipline::all();
        if ($request->method === 'GET') {
            $discipline = Discipline::where('id', $request->id)->first();
        }

        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'title' => ['required'],
//                'id' => ['required'],

            ], [
                'required' => 'Поле :field пусто',
            ]);
            if ($validator->fails()) {
                return new View('site.admin.discipline.update',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'discipline' => $discipline]);
            }
            if (Discipline::where('id', $request->id)->update([
                'csrf_token' => $request->csrf_token,
                'title' => $request->title,
//                'id' => $request->type,
            ])) {
                app()->route->redirect('/admin/discipline');
                return false;
            }
        }
        return (new View())->render('site.admin.discipline.update', ['discipline' => $discipline]);
    }
}