<?php

namespace App\Models;

use CodeIgniter\Database\Database;
use CodeIgniter\Database\Query;
use CodeIgniter\Model;
use PSpell\Config;

class TicketsModel extends Model
{

    public function postAllowedAmount($idUsuario, $allowedAmountSale, $allowedAmountValidate){
        $db = \Config\Database::connect();

        $data = [
            'idUsuario'                     => $idUsuario,
            'quantidadePermitidaVenda'      => $allowedAmountSale,
            'quantidadePermitidaValidacao'  => $allowedAmountValidate,
            'data'                          => date('y-m-d h:m:s')
        ];

        $builder = $db->table('quantidadePermitida');
        $builder->insert($data);
        
    } 

    public function insertTickets($valueTicket, $validity, $quantity, $idSale){
        $db = \Config\Database::connect();


        $date = date('dmy');

        $data = [
            'situacaoTicket'    => 3,
            'valor'             => $valueTicket,
            'cod'               => 0,
            'vencimento'        => $validity
        ];

        if($idSale != 0){
            $data['idpromocao'] = $idSale;
        }

        for($count = 1; $count <= $quantity; $count++){
            
            $data['cod'] = $count . $date;

            $builder = $db->table('ticket');
            $builder->insert($data);
        }
        
    }

    public function createSale($valueSale, $dateStart, $dateEnd){
        $db = \Config\Database::connect();

        $timestampStart = strtotime($dateStart);
        $timestampEnd = strtotime($dateEnd);

        $data = [
            'inicioPromocao'    => date('Y-m-d',$timestampStart),
            'fimPromocao'       => date('Y-m-d',$timestampEnd),
            'valor'             => $valueSale
        ];

        $builder = $db->table('promocoes');
        $builder->insert($data);
    }

    public function getSales() {
        $db = \Config\Database::connect();
    
        $currentDate    = date('Y-m-d');
    
        $query          = $db->table('promocoes')
                        ->where('inicioPromocao <=', $currentDate)
                        ->where('fimPromocao >=', $currentDate)
                        ->get();
    
        $results = $query->getResult();
        return $results;
    }

    public function getTickets($top=0){
        $db = \Config\Database::connect();

        $currentDate        = date('Y-m-d');

        if($top == 0) {
            $query              = $db->table('ticket')
                                ->where('vencimento >=', $currentDate)
                                ->get();
        } else {
            $query              = $db->table('ticket')
                                ->where('vencimento >=', $currentDate)
                                ->where('situacaoTicket', 3)
                                ->limit($top)
                                ->get();
        }

        $results = $query->getResult();

        return $results;
    }
    
    public function buyTicket($idUser, $quantitieTickets){
        $db = \Config\Database::connect();

        $date = date('Y-m-d h:m:s');

        $chosenTickets = $this->getTickets($quantitieTickets);


        // echo('<pre>');
        // var_dump($chosenTickets);
        // die();

        if($chosenTickets) {
            foreach($chosenTickets as $choseTicket){
                $data = [
                    'data'          => $date,
                    'idTicket'      => $choseTicket->idTicket,
                    'idUsuario'     => $idUser
                ];
    
                $buyed                      = count($this->getBuyed());
                $quantitiesAllowedSale      = $this->getQuantities()[0];
                
                if( $buyed >= $quantitiesAllowedSale->quantidadePermitidaVenda){
                    session()->setFlashdata('error', 'Usuário com limite máximo de tickets ativos!');  
                    break;
                } else {
                    $builder = $db->table('compraVenda');
                    $builder->insert($data);
            
                    $dataTicket = [
                        'situacaoTicket' => 1
                    ];
            
                    $builderTicket = $db->table('ticket');
                    $builderTicket->where('idTicket', $choseTicket->idTicket);
                    $builderTicket->set($dataTicket)->update();
                }
            } 
        } else {
            session()->setFlashdata('error', 'Nenhum Ticket disponível para venda!');
        }

        
    }

    public function getBuyed(){
        $db = \Config\Database::connect();
        
        $user = session()->get('user');

        $query = $db->table('compraVenda')
                ->join('ticket', 'ticket.idTicket = compraVenda.idTicket')
                ->where('idUsuario', $user->idUsuario)
                ->where('situacaoTicket', 1)
                ->get();

        $results = $query->getResult();

        return $results;
    }


    public function getQuantities(){
        $db = \Config\Database::connect();

        $query = $db->table('quantidadePermitida')
                ->orderBy('data', 'desc')
                ->limit(1)
                ->get();


        $result = $query->getResult();

        return $result;
    }

    public function getTicket($codTicket){
        $db = \Config\Database::connect();

        $query = $db->table('ticket')
                -> where('cod', $codTicket)
                ->get();

        $result = $query->getResult();

        return $result;
    }

    public function validateTicket($codTicket){
        
        $db = \Config\Database::connect();

        $data = [
            'situacaoTicket' => 4,
            'dataValidacao'  => date('Y-m-d')
        ];

        $builder = $db->table('ticket');
        $builder->where('cod', $codTicket); 
        $builder->set($data)->update();
        
    }


    //essa funcao retorna os tickets que o usuário validou naquele dia
    public function getTicketsValidatedToday($idUser){
        $db = \Config\Database::connect();

        $date = date('Y-m-d');
        

        $query = $db->table('compraVenda')
                    ->join('ticket', 'ticket.idTicket = compraVenda.idTicket')
                    ->where('compraVenda.idUsuario', $idUser)
                    ->where('ticket.dataValidacao', $date)
                    ->get();

        $results = $query->getResult();
        
        return $results;
    }


}