<?php

namespace App\Controllers;

class Prad extends BaseController {
    public function index(){
        return view('application/header').view('adm/prad').view('application/footer');
    }

   
}