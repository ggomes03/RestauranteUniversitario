<?php 

namespace App\Controllers\Tests;

use App\Controllers\BaseController;
use App\Models\TicketsModel;

use function PHPSTORM_META\type;

class TicketsTest extends BaseController{
    public function index(){
      $TicketsModel = new TicketsModel();
        echo "<pre>";
        var_dump($TicketsModel->getTickets(5));


    }

    
    
}