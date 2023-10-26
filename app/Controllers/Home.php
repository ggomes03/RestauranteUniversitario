<?php

namespace App\Controllers;

use App\Controllers\Login;

class Home extends BaseController
{
    public function index()
    {   

        $user = session()->get('user');
        if($user){
            if ($user->tipoUsuario == 1){
                return redirect('student');
            } else if($user->tipoUsuario == 2) {
                return redirect('prad');
            } 
        }

        return view('application/header').view('index').view('application/footer');
        
    }
}
