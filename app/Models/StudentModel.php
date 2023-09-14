<?php

namespace App\Models;

use CodeIgniter\Database\Database;
use CodeIgniter\Database\Query;
use CodeIgniter\Model;
use PSpell\Config;

class StudentModel extends Model
{
    
    // select * from compraVenda cv 
    // join ticket t on t.idTicket = cv.idTicket
    // join usuario u on u.idUsuario = cv.idUsuario; 
    
    public function getTickets(){
        $db         = \Config\Database::connect();

        $user = session()->get('user');

        $query      = $db->table('compraVenda')
                    ->join('usuario', 'usuario.idUsuario = compraVenda.idUsuario')
                    ->join('ticket', 'ticket.idTicket = compraVenda.idTicket')
                    ->join('situacaoTicket','situacaoTicket.idSituacaoTicket = ticket.situacaoTicket')
                    ->where('usuario.idUsuario', $user->idUsuario)
                    ->orderBy('compraVenda.data','DESC')
                    ->get();

        $results = $query->getResult();

        return $results;

    }

}