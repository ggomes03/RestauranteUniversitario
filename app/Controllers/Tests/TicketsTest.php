<?php 

namespace App\Controllers\Tests;

use App\Controllers\BaseController;
use App\Models\TicketsModel;

use function PHPSTORM_META\type;

class TicketsTest extends BaseController{
    public function index(){
       echo '<pre>';
       var_dump($this->teste1(1));
       echo '<pre>';
       var_dump($this->teste2(1));

       echo '<pre>';
       var_dump($this->teste3(581641651)[0]);
       echo '<pre>';
       var_dump($this->teste3(32140923));
    }

    public function teste1($idUser){

        $ticketsModel = new TicketsModel();


        $results = $ticketsModel->getTicketsValidatedToday($idUser);

        return $results;
    }


    public function teste2($idUser){

        $ticketsModel = new TicketsModel();

        $results       = $ticketsModel->getQuantities()[0]->quantidadePermitidaValidacao;

        // $results = $ticketsModel->getTicketsValidatedToday($idUser);

        return $results;
    }

    
    public function teste3 ($idTicket){
        $ticketsModel = new TicketsModel();
        
        $result = $ticketsModel->getTicket($idTicket);

        return $result;

    }
}