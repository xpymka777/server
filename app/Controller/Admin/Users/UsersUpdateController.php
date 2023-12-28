<?php

namespace Controller\Admin\Users;

use Model\Discipline;
use Model\DisciplinesUsers;
use Model\Division;
use Model\DivisionsUsers;
use Model\Position;
use Model\User;
use Src\Request;
use Src\Validator\Validator;
use Src\View;

class UsersUpdateController
{
    public function updateUser(Request $request): string
    {
        $user = User::all();
        $divisions = Division::all();
        $positions = Position::all();
        $disciplines = Discipline::all();
        if ($request->method === 'GET') {
            $user = User::where('id', $request->id)->first();
        }

        if ($request->method === 'POST') {
            $validator = new Validator($request->all(), [
                'login' => ['required'],
                'password' => ['required'],
                'surname' => ['required'],
                'name' => ['required'],
                'patronymic' => ['required'],
                'gender' => ['required'],
                'address' => ['required'],
                'date' => ['required'],
            ], [
                'required' => 'Поле :field пусто'
            ]);

            if ($validator->fails()) {
                return new View('site.admin.users.update',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), ['user' => $user, 'divisions' => $divisions, 'positions' => $positions, 'disciplines' => $disciplines]]);

            }


            if (User::where('id', $request->id)->update([
                    'csrf_token' => $request->csrf_token,
                    'login' => $request->login,
                    'password' => $request->password,
                    'surname' => $request->surname,
                    'name' => $request->name,
                    'patronymic' => $request->patronymic,
                    'gender' => $request->gender,
                    'address' => $request->address,
                    'date' => $request->date,
                    'id_position' => $request->id_position,
                ]) && DivisionsUsers::create([
                    'id_division' => $request->id_division,
                    'id_user' => $_GET['id']
                ])
                && DisciplinesUsers::create([
                    'id_discipline' => $request->id_discipline,
                    'id_user' => $_GET['id']
                ])
            ) {
                app()->route->redirect('/admin/user');
                return false;
            }
        }
        return (new View())->render('site.admin.users.update', ['user' => $user, 'divisions' => $divisions, 'positions' => $positions, 'disciplines' => $disciplines]);
    }
}