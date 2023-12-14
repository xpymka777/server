<?php

namespace Controller\Admin\Users;

use Model\User;
use Src\Request;
use Src\Validator\Validator;
use Src\View;

class UsersCreateController
{
    public function createUser(Request $request): string
    {
        if ($request->method === 'POST') {
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
                return new View('site.admin.users.create',
                    ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE)]);
            }
            if (User::create([
                'csrf_token' => $request->csrf_token,
                'login' => $request->login,
                'password' => $request->password,
                'surname' => $request->surname,
                'name' => $request->name,
                'patronymic' => $request->patronymic,
                'gender' => $request->gender,
                'address' => $request->address,
                'date' => $request->date,
            ])) {
                app()->route->redirect('/admin/user');
                return false;
            }
        }
        return (new View())->render('site.admin.users.create');
    }
}