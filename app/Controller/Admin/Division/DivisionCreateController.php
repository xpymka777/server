<?php

namespace Controller\Admin\Division;

use Model\Division;
use Src\Request;
use Src\Validator\Validator;
use Src\View;

class DivisionCreateController
{
    public function createDivision(Request $request): string
    {
        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'title' => ['required'],
                'type' => ['required', 'unique:divisions,type'],

            ], [
                'required' => 'Поле :field пусто',
                'unique' => 'Поле :field должно быть уникально',
            ]);
            if ($validator->fails()) {
                return new View('site.admin.division.create',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }
            if (Division::create([
                'csrf_token' => $request->csrf_token,
                'title' => $request->title,
                'type' => $request->type,
            ])) {
                app()->route->redirect('/admin/division');
                return false;
            }
        }
        return (new View())->render('site.admin.division.create');
    }
}