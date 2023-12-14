<?php

namespace Controller\Admin;

use Src\View;

class HomeAdmin
{
    public function homeAdmin(): string
    {
        return (new View())->render('site.admin.home');
    }
}