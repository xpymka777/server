<?php

namespace Controller\Admin\Users;

use Model\Division;
use Model\User;
use Src\Request;

class UsersDeleteController
{
    public function deleteUser(Request $request)
    {
        $user = User::where('id', $request->id)->first();
        if ($user->delete()) {
            app()->route->redirect('/admin/user');
        }
    }
}