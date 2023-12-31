<?php

namespace App\Controllers;
use App\Models\TicketsModel;
use PhpParser\Node\Stmt\Echo_;

class Tickets extends BaseController
{
    public function index(){
        if(session()->get('user')->tipoUsuario == 1 ){
            return redirect('/');
        } else {
            return view('application/header').view('tickets/tickets').view('application/footer');

        }
    }

    public function defineQuantitiesView(){
        if(session()->get('user')->tipoUsuario == 1 ){
            return redirect('/');
        } else {
            return view('application/header').view('tickets/definequantities').view('application/footer');
        }
    }

    public function defineQuantities(){
        
        $ticketsModel = new TicketsModel();
        
        $session    = session();
        $user       = $session->get('user');

        $idUser                 = intval($user->idUsuario);
        $allowedAmountSale      = intval($this->request->getPost('allowedAmountSale'));
        $allowedAmountValidate  = intval($this->request->getPost('allowedAmountValidate'));


        if($allowedAmountSale <= 0 ){
            $session->setFlashdata('error', 'O campo de compra não pode ser zero ou negativo!');
        } else if($allowedAmountValidate <= 0) {
            $session->setFlashdata('error', 'O campo de validação não pode ser zero ou negativo!');
        } else {
            $ticketsModel->postAllowedAmount($idUser, $allowedAmountSale, $allowedAmountValidate);
        }

        return redirect()->to('defineQuantitiesView');
        
    }

    public function insertTickets(){
        $valueTicket    = $this->request->getPost('valueTicket');
        $validity       = $this->request->getPost('validity');
        $quantity       = $this->request->getPost('quantity');
        $idSale         = $this->request->getPost('idSale');

        $ticketsModel = new TicketsModel();

        $ticketsModel->insertTickets($valueTicket, $validity, $quantity, $idSale);

        $session = session();

        $session->setFlashdata('success', 'Tickets Inseridos com Sucesso');
        
        return redirect()->to('createTickets');

    }

    public function sale(){
        return view('application/header').view('tickets/sale').view('application/footer');
    }

    public function createSale(){
        $valueSale      = $this->request->getPost('valueSale');
        $dateStart      = $this->request->getPost('dateStart');
        $dateEnd        = $this->request->getPost('dateEnd');

        $ticketsModel = new TicketsModel();

        $session = session();

        $ticketsModel->createSale($valueSale, $dateStart, $dateEnd);

        $session->setFlashdata('success', 'Promoção Criada sucesso');

        return redirect()->to('sale');
    }

    public function validateTicketsView(){
        if(session()->get('user')->tipoUsuario == 1 ){
            return redirect('/');
        } else {
            return view('application/header').view('tickets/validateticket').view('application/footer');
        }
        
    }

    public function validateTicket(){
        
        $ticketsModel       = new TicketsModel();

        $idTicket           = $this->request->getPost('codTicket');

        $ticket             = $ticketsModel->getTicket($idTicket);

        if($ticket != NULL) {
            $situacaoTicket     = $ticket[0]->situacaoTicket;
            $codTicket          = $ticket[0]->cod;

            $user = session()->get('user');

            $ruleValidate       = $ticketsModel->getQuantities()[0]->quantidadePermitidaValidacao;
            $ticketsValidatedToday = $ticketsModel->getTicketsValidatedToday($user->idUsuario);
        
            switch ($situacaoTicket){
                case 1:
                    if($ruleValidate > count($ticketsValidatedToday)) {
                        $ticketsModel->validateTicket($codTicket);
                        session()->setFlashdata('success', 'Ticket Validado');
                    } else {
                        session()->setFlashdata('error', 'Quantidade máxima de validação diária atingida!');
                    }
                    break;
                case 2:
                    session()->setFlashdata('error', 'Ticket já vencido');
                    break;
                case 3:
                    session()->setFlashdata('error', 'Ticket ainda não foi vendido');
                    break;
                case 4:
                    session()->setFlashdata('error', 'Ticket já validado');
                    break;
            }
        } else {
            session()->setFlashdata('error', 'Este ticket não existe.');
        }
        

        return redirect()->to('validateTicket');
    }
}