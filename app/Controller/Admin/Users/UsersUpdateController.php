<?php

namespace Controller\Admin\Users;

use Model\Division;
use Model\DivisionsUsers;
use Model\User;
use Src\Request;
use Src\Validator\Validator;
use Src\View;

class UsersUpdateController
{
    public function updateUser(Request $request): string
    {
        $user = User::all();

        if ($request->method === 'GET') {
            $user = User::where('id', $request->id)->first();
        }

        $validator = new Validator($request->all(), [
            'login' => ['required','unique:users,login'],
            'password' => ['required','unique:users,password'],
            'surname'=> ['required'],
            'name'=> ['required'],
            'patronymic'=> ['required'],
            'gender' => ['required'],
            'address'=> ['required'],
            'date'=> ['required'],
        ], [
            'required' => 'Поле :field пусто',
            'unique' => 'Поле :field должно быть уникально',
        ]);
        if ($validator->fails()) {
            return new View('site.admin.users.update',
                ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);

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
                'position' =>$request->id_position,
            ]) ||
            DivisionsUsers::create([
                'id_division'=>$request->id_division,
                'id_user'=>$request->id,
                ])) {
                app()->route->redirect('/admin/division');
                return false;
            }
        return (new View())->render('site.admin.division.update', ['division' => $division]);
    }
}