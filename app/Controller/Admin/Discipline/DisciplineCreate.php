<?php

namespace Controller\Admin\Discipline;

use Model\Discipline;
use Src\Request;
use Src\Validator\Validator;
use Src\View;

class DisciplineCreate
{
    public function createDiscipline(Request $request): string
    {
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'title' => ['required'],
//                'id' => ['required', 'unique:disciplines,id'],

            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально',
            ]);
            if ($validator->fails()) {
                return new View('site.admin.division.create',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }
            if (Discipline::create([
                'csrf_token' => $request->csrf_token,
                'title' => $request->title,
//                'id' => $request->id,
            ])) {
                app()->route->redirect('/admin/discipline');
                return false;
            }
        }
        return (new View())->render('site.admin.discipline.create');
    }
}