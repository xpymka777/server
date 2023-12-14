<?php

namespace Controller\User;

use Src\Auth\Auth;
use Src\Request;

class LogoutController
{
    public function logout(Request $request): void
    {
        if (!Auth::attempt($request->all())) {
            $token = null;
            Auth::user()->update([
                'token' => $token
            ]);
        }
        Auth::logout();
        app()->route->redirect('/');
    }
}