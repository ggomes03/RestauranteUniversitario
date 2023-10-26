<?php

namespace App\Models;

use CodeIgniter\Database\Database;
use CodeIgniter\Database\Query;
use CodeIgniter\Model;
use PSpell\Config;

class ReportModel extends Model
{

    public function reportData(){
        $db = \Config\Database::connect();

        // $query = $db->table('compraVenda')
        //             ->select('SUM(ticket.valor) as valor, DATE(compraVenda.data) as dtVenda, SUM(promocoes.valor) as valorPromocao, COUNT(*) as qtdVendida')
        //             ->join('ticket', 'ticket.idTicket = compraVenda.idTicket')
        //             ->join('situacaoTicket', 'situacaoTicket.idSituacaoTicket = ticket.situacaoTicket')
        //             ->join('promocoes', 'promocoes.idpromocoes = ticket.idpromocao', 'left')
        //             ->groupBy('dtVenda')
        //             ->orderBy('qtdVendida', 'DESC')
        //             ->get();

        $query = $db->table('situacaoTicket st')
                    ->select('SUM(COALESCE(p.valor, t.valor)) as valor')
                    ->select('DATE(cv.data) as dtVenda')
                    ->select('SUM(p.valor) as valorPromocao')
                    ->select('COUNT(*) as qtdVendida')
                    ->join('ticket t', 't.situacaoTicket = st.idSituacaoTicket')
                    ->join('compraVenda cv', 'cv.idTicket = t.idTicket')
                    ->join('promocoes p', 'p.idpromocoes = t.idpromocao', 'left')
                    ->groupBy('dtVenda')
                    ->orderBy('qtdVendida', 'desc')
                    ->get();

    
        $result = $query->getResult();

        return $result;
    
    }

}