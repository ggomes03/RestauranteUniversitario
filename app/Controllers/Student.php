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

    public function buy(){
        $session        = session();

        $user           = $session->get('user');
        $idUser         = $user->idUsuario;

        $quantitieTickets = $this->request->getPost('quantitie');

        $ticketsModel   = new TicketsModel();

        $ticketsModel->buyTicket($idUser, $quantitieTickets);

        return redirect()->to('buytickets');

    }

    public function extract(){

        $studentModel   = new StudentModel();

        $tickets        = $studentModel->getTickets();

        $data           = [
            'tickets'   => $tickets
        ];

        return view('application/header').view('student/extract', $data);
    }
}

