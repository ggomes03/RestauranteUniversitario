<?php

namespace App\Controllers;
use App\Models\ReportModel;

class Prad extends BaseController {
    public function index(){
        if(session()->get('user')->tipoUsuario == 1 ){
            return redirect('/');
        } else {
            return view('application/header').view('adm/prad');
        }
    }

    public function report(){

        $data = [
            'reports' => $this->getDataToReport()
        ];

        return view('application/header').view('adm/report', $data);
    }
    
    public function getDataToReport(){
        
        $ReportModel = new ReportModel();

        $data = $ReportModel->reportData();
        
        return $data;
    }
}