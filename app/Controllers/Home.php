<?php

namespace App\Controllers;

use App\Controllers\Login;

class Home extends BaseController
{
    public function index(): string
    {   
        
        return view('application/header').view('index').view('application/footer');
    }
}
