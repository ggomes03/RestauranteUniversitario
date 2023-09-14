<?php

namespace App\Controllers;
use App\Models\TicketsModel;
use App\Models\StudentModel;

class Student extends BaseController
{
    public function index(){
        return view('application/header').view('student/student').view('application/footer');
    }

    public function buyTickets(){

        $TicketsModel   = new TicketsModel();

        $tickets        = $TicketsModel->getTickets();

        $data = [ 
            'tickets' => $tickets
        ]; 
        
        return view('application/header').view('student/buytickets', $data).view('application/footer');
    }

    public function buy($idTicket){
        $session        = session();

        $user           = $session->get('user');
        $idUser         = $user->idUsuario;

        $ticketsModel   = new TicketsModel();

        $ticketsModel->buyTicket($idUser, $idTicket);

        return redirect()->to('buytickets');

    }

    public function extract(){

        $studentModel   = new StudentModel();

        $tickets        = $studentModel->getTickets();

        $data           = [
            'tickets'   => $tickets
        ];

        return view('application/header').view('student/extract', $data).view('application/footer');
    }
}

