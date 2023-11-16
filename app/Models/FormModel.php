<?php

namespace App\Models;

use CodeIgniter\Model;

class FormModel extends Model
{
    protected $tbl = 'pergunta';

    public function getPerguntas()
    {
        try {
            $query = $this->db->table($this->tbl)->select('questao, idPergunta')->get();
            return $query->getResult();
        } 
        catch (\Exception $e) {
            // Lida com erros de consulta do banco de dados
            log_message('error', 'Erro ao obter perguntas: ' . $e->getMessage());
            return [];
        }
    }

    protected $table = 'alternativas';

    public function getAlternativas()
    {
        try {
            $query = $this->db->table($this->table)->select('resposta, idAlternativas')->get();
            return $query->getResult();
        } catch (\Exception $e) {
            // Lida com erros de consulta do banco de dados
            log_message('error', 'Erro ao obter alternativas: ' . $e->getMessage());
            return [];
        }
    }
    public function salvarRespostas($idPergunta, $idAlternativas){
        $this->db->query("INSERT INTO feedback(idPergunta, idAlternativas) 
        VALUES ($idPergunta, $idAlternativas)", [$idPergunta, $idAlternativas]);
    }
    
}